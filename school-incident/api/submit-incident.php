<?php

require_once '../../global-library/database.php';

header('Content-Type: application/json');


try {

    // ===============================
    // AUTH (Optional - Remove if public submission)
    // ===============================
    // if (empty($_SESSION['user_id'])) {
    //     throw new Exception('Unauthorized');
    // }

    // ===============================
    // INPUTS
    // ===============================
    $incident_type      = trim($_POST['incident_type'] ?? '');
    $incident_date      = trim($_POST['incident_date'] ?? '');
    $incident_time      = trim($_POST['incident_time'] ?? '');
    $incident_location  = trim($_POST['incident_location'] ?? '');
    $incident_level     = trim($_POST['incident_level'] ?? '');
    $affected_student   = intval($_POST['affected_student'] ?? 0);
    $affected_staff     = intval($_POST['affected_staff'] ?? 0);
    $suspension         = intval($_POST['suspension'] ?? 0);
    $suspension_date    = trim($_POST['suspension_date'] ?? '');
    $suspension_basis   = trim($_POST['suspension_basis'] ?? '');
    $reporting_person   = trim($_POST['reporting_person'] ?? '');
    $contact_number     = trim($_POST['contact_number'] ?? '');
    $email_add          = trim($_POST['email_add'] ?? '');
    $school_add         = trim($_POST['school_add'] ?? '');
    $sDescription       = trim($_POST['sDescription'] ?? '');

    // Validate required fields
    if (!$incident_type || !$incident_date || !$incident_time || !$incident_location || !$incident_level) {
        throw new Exception('Incident details are required');
    }

    if (!$reporting_person || !$contact_number || !$school_add) {
        throw new Exception('Reporter and school information are required');
    }

    // Validate severity level
    if (!in_array($incident_level, ['Low', 'Medium', 'High', 'Critical'])) {
        throw new Exception('Invalid severity level');
    }

    // Validate suspension fields
    if ($suspension === 1 && (!$suspension_date || !$suspension_basis)) {
        throw new Exception('Suspension date and basis are required when suspension is declared');
    }

    if ($suspension !== 1) {
        $suspension_date = null;
        $suspension_basis = null;
    }

    // ===============================
    // FILE UPLOAD (Single Image)
    // ===============================
    $sThumbnail = null;

    if (!empty($_FILES['sThumbnail']['name'])) {

        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        $uploadDir = SRV_ROOT . 'uploads/incidents/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Check for upload errors
        if ($_FILES['sThumbnail']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error');
        }

        // Validate MIME type
        $tmpName = $_FILES['sThumbnail']['tmp_name'];
        $mime = mime_content_type($tmpName);

        if (!in_array($mime, $allowed)) {
            throw new Exception('Invalid image type. Only JPG, PNG, and GIF are allowed');
        }

        // Validate file size (5MB)
        if ($_FILES['sThumbnail']['size'] > 5 * 1024 * 1024) {
            throw new Exception('File size exceeds 5MB limit');
        }

        // Generate unique filename
        $ext = pathinfo($_FILES['sThumbnail']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('incident_', true) . '.' . $ext;

        // Move file
        if (move_uploaded_file($tmpName, $uploadDir . $filename)) {
            $sThumbnail = $filename;
        } else {
            throw new Exception('Failed to upload file');
        }
    }

    // ===============================
    // INSERT (MATCHES tbl_school_incident)
    // ===============================
    $stmt = $conn->prepare("
        INSERT INTO tbl_school_incident (
            incident_type,
            incident_date,
            incident_time,
            incident_location,
            incident_level,
            affected_student,
            affected_staff,
            suspension,
            suspension_date,
            suspension_basis,
            reporting_person,
            contact_number,
            email_add,
            school_add,
            sThumbnail,
            sDescription,
            acted,
            acted_by
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NULL)
    ");

    $stmt->execute([
        $incident_type,
        $incident_date,
        $incident_time,
        $incident_location,
        $incident_level,
        $affected_student,
        $affected_staff,
        $suspension,
        $suspension_date,
        $suspension_basis,
        $reporting_person,
        $contact_number,
        $email_add ?: null,
        $school_add,
        $sThumbnail,
        $sDescription ?: null
    ]);

    $incidentId = $conn->lastInsertId();

    // Generate reference ID
    $refId = 'DRRM-SCH-' . str_pad($incidentId, 6, '0', STR_PAD_LEFT);

    echo json_encode([
        'success' => true,
        'message' => 'School incident report submitted successfully',
        'refId' => $refId,
        'incidentId' => $incidentId
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

?>