<?php
// Prevent any accidental output before JSON
ob_start();

require_once '../global-library/database.php';

// Clear any output from database.php (like connection errors that are echoed)
$unexpectedOutput = ob_get_clean();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Log received data for debugging (optional, can be removed)
        // error_log("Received POST data: " . print_r($_POST, true));

        // Collect form data
        $referenceId = $_POST['referenceId'] ?? '';
        $incidentCategory = $_POST['incidentCategory'] ?? 'Disaster';
        $disasterType = $_POST['disasterType'] ?? '';
        $incidentDate = $_POST['incidentDate'] ?? '';
        $incidentTime = $_POST['incidentTime'] ?? '';
        $location = $_POST['location'] ?? '';
        $severity = $_POST['severity'] ?? '';
        $description = $_POST['description'] ?? '';

        $studentsAffected = $_POST['studentsAffected'] ?? 0;
        $staffAffected = $_POST['staffAffected'] ?? 0;
        $casualtyDetails = $_POST['casualtyDetails'] ?? '';
        $propertyDamage = $_POST['propertyDamage'] ?? '';
        $evacuationStatus = $_POST['evacuationStatus'] ?? '';
        $suspensionStatus = $_POST['suspensionStatus'] ?? '';

        $schoolName = $_POST['schoolName'] ?? '';
        $schoolAddress = $_POST['schoolAddress'] ?? '';
        $reporterName = $_POST['reporterName'] ?? '';
        $contactNumber = $_POST['contactNumber'] ?? '';
        $emailAddress = $_POST['emailAddress'] ?? '';
        $additionalInfo = $_POST['additionalInfo'] ?? '';

        // Handle File Uploads
        $uploadedPhotoNames = [];
        $uploadErrors = [];
        if (isset($_FILES['incidentPhotos'])) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0777, true)) {
                    $uploadErrors[] = "Failed to create upload directory.";
                }
            }

            foreach ($_FILES['incidentPhotos']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['incidentPhotos']['error'][$key] === UPLOAD_ERR_OK) {
                    $originalName = $_FILES['incidentPhotos']['name'][$key];
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $newName = $referenceId . '_' . $key . '_' . time() . '.' . $extension;
                    $targetPath = $uploadDir . $newName;

                    if (move_uploaded_file($tmpName, $targetPath)) {
                        $uploadedPhotoNames[] = $newName;
                    } else {
                        $uploadErrors[] = "Failed to move uploaded file: $originalName";
                    }
                } else if ($_FILES['incidentPhotos']['error'][$key] !== UPLOAD_ERR_NO_FILE) {
                    $uploadErrors[] = "Photo upload error code: " . $_FILES['incidentPhotos']['error'][$key];
                }
            }
        }
        $photosJson = json_encode($uploadedPhotoNames);

        // Prepare SQL
        // Prepare SQL - Use PDO for safety
        if (!isset($conn)) {
            throw new Exception("Database connection failed: " . ($unexpectedOutput ?: "Unknown error"));
        }

        $sql = "INSERT INTO tbl_disaster (
            reference_id, incident_category, disaster_type, incident_date, incident_time, 
            location, severity, description, students_affected, staff_affected, 
            casualty_details, property_damage, evacuation_status, suspension_status, 
            uploaded_photos, school_name, school_address, reporter_name, 
            contact_number, email_address, additional_info
        ) VALUES (
            :reference_id, :incident_category, :disaster_type, :incident_date, :incident_time, 
            :location, :severity, :description, :students_affected, :staff_affected, 
            :casualty_details, :property_damage, :evacuation_status, :suspension_status, 
            :uploaded_photos, :school_name, :school_address, :reporter_name, 
            :contact_number, :email_address, :additional_info
        )";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':reference_id' => $referenceId,
            ':incident_category' => $incidentCategory,
            ':disaster_type' => $disasterType,
            ':incident_date' => $incidentDate,
            ':incident_time' => $incidentTime,
            ':location' => $location,
            ':severity' => $severity,
            ':description' => $description,
            ':students_affected' => $studentsAffected,
            ':staff_affected' => $staffAffected,
            ':casualty_details' => $casualtyDetails,
            ':property_damage' => $propertyDamage,
            ':evacuation_status' => $evacuationStatus,
            ':suspension_status' => $suspensionStatus,
            ':uploaded_photos' => $photosJson,
            ':school_name' => $schoolName,
            ':school_address' => $schoolAddress,
            ':reporter_name' => $reporterName,
            ':contact_number' => $contactNumber,
            ':email_address' => $emailAddress,
            ':additional_info' => $additionalInfo
        ]);

        echo json_encode([
            'status' => 'success',
            'message' => 'Report submitted successfully!',
            'referenceId' => $referenceId,
            'uploadWarnings' => $uploadErrors
        ]);

    } catch (Exception $e) {
        // http_response_code(500); // Remove this to ensure JSON is always parsed as success/fail object if desired, or keep for REST.
        echo json_encode([
            'status' => 'error',
            'message' => 'System error: ' . $e->getMessage(),
            'debug' => $unexpectedOutput
        ]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>