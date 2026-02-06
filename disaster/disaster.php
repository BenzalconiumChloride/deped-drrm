<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>disaster/css/disaster.css">

<div class="container">
    <!-- Back to Categories -->
    <div class="mb-3">
        <a href="<?php echo WEB_ROOT; ?>" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left me-2"></i> Back to Categories
        </a>
    </div>

    <!-- Alert Banner -->
    <div class="alert alert-banner d-flex align-items-center mb-4" role="alert">
        <i class="fas fa-volcano fs-5 me-3"></i>
        <div>
            <strong>Disaster Incident Report:</strong> Use this form to report natural or man-made disasters affecting
            your school.
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="alert alert-success d-none" role="alert">
        <i class="fas fa-check-circle me-2"></i><strong>Success!</strong> Your disaster incident report has been
        submitted successfully. Reference ID: <span id="refId"></span>
    </div>

    <!-- Step Indicator -->
    <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
        <div class="step active text-center" id="step1">
            <div class="step-circle mx-auto mb-2">1</div>
            <div class="step-label">Disaster Type</div>
        </div>
        <div class="step text-center" id="step2">
            <div class="step-circle mx-auto mb-2">2</div>
            <div class="step-label">Incident Details</div>
        </div>
        <div class="step text-center" id="step3">
            <div class="step-circle mx-auto mb-2">3</div>
            <div class="step-label">Impact Assessment</div>
        </div>
        <div class="step" id="step4">
            <div class="step-circle">4</div>
            <div class="step-label">Photo Evidence</div>
        </div>
        <div class="step" id="step5">
            <div class="step-circle">5</div>
            <div class="step-label">School Information</div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="form-container p-4 p-md-5 mb-4">
        <form id="incidentForm" action="submit_disaster.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="incidentCategory" name="incidentCategory" value="Disaster">

            <!-- Step 1: Disaster Type -->
            <div class="form-section active" id="section1">
                <h2 class="form-title mb-4 d-flex align-items-center gap-2">
                    <i class="fas fa-volcano"></i> 1. Select Disaster Type
                </h2>

                <div class="mb-4 pb-4 border-bottom">
                    <label class="form-label fw-semibold">Disaster Type <span class="required">*</span></label>
                    <p class="text-muted small">Select the type of disaster that occurred</p>

                    <div id="disasterTypes" class="row g-3">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Typhoon">
                                <div class="incident-icon mb-2"><i class="fas fa-wind"></i></div>
                                <div class="small">Typhoon</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Flood">
                                <div class="incident-icon mb-2"><i class="fas fa-water"></i></div>
                                <div class="small">Flood</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Earthquake">
                                <div class="incident-icon mb-2"><i class="fas fa-mountain"></i></div>
                                <div class="small">Earthquake</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Fire">
                                <div class="incident-icon mb-2"><i class="fas fa-fire"></i></div>
                                <div class="small">Fire</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Landslide">
                                <div class="incident-icon mb-2"><i class="fas fa-mountain"></i></div>
                                <div class="small">Landslide</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Volcanic Activity">
                                <div class="incident-icon mb-2"><i class="fas fa-volcano"></i></div>
                                <div class="small">Volcanic Activity</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Tsunami">
                                <div class="incident-icon mb-2"><i class="fas fa-water"></i></div>
                                <div class="small">Tsunami</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Storm Surge">
                                <div class="incident-icon mb-2"><i class="fas fa-wind"></i></div>
                                <div class="small">Storm Surge</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Drought">
                                <div class="incident-icon mb-2"><i class="fas fa-sun"></i></div>
                                <div class="small">Drought</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Lightning Strike">
                                <div class="incident-icon mb-2"><i class="fas fa-bolt"></i></div>
                                <div class="small">Lightning Strike</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Tornado">
                                <div class="incident-icon mb-2"><i class="fas fa-tornado"></i></div>
                                <div class="small">Tornado</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                            <div class="incident-type" data-type="Other Natural Disaster">
                                <div class="incident-icon mb-2"><i class="fas fa-exclamation-triangle"></i></div>
                                <div class="small">Other Natural Disaster</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="incidentType" name="disasterType" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary-custom btn-lg" id="nextToStep2">
                        Next <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Incident Details -->
            <div class="form-section" id="section2">
                <h2 class="form-title mb-4 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle"></i> 2. Incident Details
                </h2>

                <div class="mb-4 pb-4 border-bottom">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="incidentDate" class="form-label fw-semibold">Date of Incident <span
                                    class="required">*</span></label>
                            <input type="date" class="form-control" id="incidentDate" name="incidentDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="incidentTime" class="form-label fw-semibold">Time of Incident <span
                                    class="required">*</span></label>
                            <input type="time" class="form-control" id="incidentTime" name="incidentTime" required>
                        </div>
                        <div class="col-12">
                            <label for="location" class="form-label fw-semibold">Specific Location <span
                                    class="required">*</span></label>
                            <input type="text" class="form-control" id="location" name="location" required
                                placeholder="e.g., School Gymnasium, Classroom Building, School Grounds">
                        </div>
                    </div>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <label class="form-label fw-semibold">Severity Level <span class="required">*</span></label>
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <div class="severity-dot low" data-severity="Low" title="Low Severity"></div>
                            <span class="small fw-semibold">Low (Minor)</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="severity-dot medium" data-severity="Medium" title="Medium Severity"></div>
                            <span class="small fw-semibold">Medium (Moderate)</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="severity-dot high" data-severity="High" title="High Severity"></div>
                            <span class="small fw-semibold">High (Serious)</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="severity-dot critical" data-severity="Critical" title="Critical Severity"></div>
                            <span class="small fw-semibold">Critical (Emergency)</span>
                        </div>
                    </div>
                    <input type="hidden" id="severity" name="severity" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Incident Description <span
                            class="required">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="5" required
                        placeholder="Provide a detailed description of what happened..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary btn-lg" id="backToStep1">
                        <i class="fas fa-arrow-left me-2"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary-custom btn-lg" id="nextToStep3">
                        Next <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3: Impact Assessment -->
            <div class="form-section" id="section3">
                <h2 class="form-title mb-4 d-flex align-items-center gap-2">
                    <i class="fas fa-chart-bar"></i> 3. Impact Assessment
                </h2>

                <div class="mb-4 pb-4 border-bottom">
                    <h3 class="h6 mb-3" style="color: var(--secondary-blue);">
                        <i class="fas fa-users me-2"></i> Casualties/Injuries Information
                    </h3>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Number of Casualties/Injuries</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <label for="studentsAffected" class="form-label small">Students</label>
                                    <input type="number" class="form-control" id="studentsAffected"
                                        name="studentsAffected" min="0" value="0" placeholder="0">
                                </div>
                                <div class="col-6">
                                    <label for="staffAffected" class="form-label small">Staff/Teachers</label>
                                    <input type="number" class="form-control" id="staffAffected" name="staffAffected"
                                        min="0" value="0" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="casualtyDetails" class="form-label">Casualty/Injury Details</label>
                            <textarea class="form-control" id="casualtyDetails" name="casualtyDetails" rows="4"
                                placeholder="Brief description of casualties or injuries..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <label for="propertyDamage" class="form-label fw-semibold">Property Damage</label>
                    <textarea class="form-control" id="propertyDamage" name="propertyDamage" rows="3"
                        placeholder="Description of property damage (buildings, equipment, facilities), including estimated cost if known..."></textarea>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <label for="evacuationStatus" class="form-label fw-semibold">Evacuation Status</label>
                    <select class="form-select" id="evacuationStatus" name="evacuationStatus">
                        <option value="">Select Status</option>
                        <option value="No Evacuation">No Evacuation</option>
                        <option value="Partial Evacuation">Partial Evacuation</option>
                        <option value="Full Evacuation">Full Evacuation</option>
                        <option value="School Closed">School Closed</option>
                    </select>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <label for="suspensionStatus" class="form-label fw-semibold">Suspension Status</label>
                    <select class="form-select" id="suspensionStatus" name="suspensionStatus">
                        <option value="">Select Status</option>
                        <option value="No Suspension">No Suspension</option>
                        <option value="Full Suspension">Full Suspension</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary btn-lg" id="backToStep2">
                        <i class="fas fa-arrow-left me-2"></i> Back
                    </button>
                    <button type="button" class="btn btn-primary-custom btn-lg" id="nextToStep4">
                        Next <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Hidden containers for JS compatibility -->
            <div id="schoolIncidentTypes" style="display:none"></div>
            <div id="medicalAccidentTypes" style="display:none"></div>
            <div id="medicalDetailsSection" style="display:none"></div>
            <div id="nonMedicalSection" style="display:none"></div>
            <div id="affectedPersonsContainer" style="display:none"></div>
            <button type="button" id="addPersonBtn" style="display:none"></button>

            <!-- Step 4: Photo Evidence -->
            <div class="form-section" id="section4">
                <h2 class="form-title"><i class="fas fa-camera"></i> 4. Photo Evidence (Optional but Recommended)</h2>

                <div class="form-group">
                    <div class="photo-upload-section">
                        <div class="upload-instructions">
                            <h3 style="color: #2a5298; margin-bottom: 10px;">
                                <i class="fas fa-info-circle"></i> Upload Photos as Evidence
                            </h3>
                            <p>Photos help DRRM Division assess the incident accurately. Please follow these guidelines:
                            </p>
                            <ul>
                                <li>Upload clear, well-lit photos of the incident</li>
                                <li>Maximum file size: <strong>5MB per photo</strong></li>
                                <li>Maximum number of photos: <strong>10</strong></li>
                                <li>Accepted formats: JPG, JPEG, PNG, GIF</li>
                                <li>Do not include sensitive personal information in photos</li>
                                <li>Photos should be relevant to the reported incident</li>
                            </ul>
                        </div>

                        <div class="upload-area" id="uploadArea">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="upload-text">Drag & Drop Photos Here</div>
                            <div class="upload-subtext">or click to browse files</div>
                            <button type="button" class="browse-btn" id="browseBtn">
                                <i class="fas fa-folder-open"></i> Browse Files
                            </button>
                            <input type="file" id="photoInput" class="file-input" accept="image/*" multiple>
                        </div>

                        <div class="upload-progress" id="uploadProgress">
                            <div class="progress-bar" id="progressBar"></div>
                        </div>

                        <div class="upload-status" id="uploadStatus"></div>

                        <div class="preview-container" id="previewContainer">
                            <!-- Photo previews will be added here -->
                        </div>

                        <input type="hidden" id="uploadedPhotos" name="uploadedPhotos" value="">
                    </div>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="btn btn-reset" id="backToStep3">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button type="button" class="btn btn-submit" id="nextToStep5">
                        Next <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 5: School Information -->
            <div class="form-section" id="section5">
                <h2 class="form-title"><i class="fas fa-school"></i> 5. School Information</h2>

                <div class="form-group">
                    <div class="form-row">
                        <div class="form-col">
                            <label for="schoolName">School Name <span class="required">*</span></label>
                            <input type="text" id="schoolName" name="schoolName" required
                                placeholder="e.g. Silay City National High School">
                        </div>
                        <div class="form-col">
                            <label for="schoolAddress">School Address</label>
                            <input type="text" id="schoolAddress" name="schoolAddress"
                                placeholder="Complete school address">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <h3 style="color: #1e3c72; margin-bottom: 15px;">Reporting Person Information</h3>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="reporterName">Reporting Person <span class="required">*</span></label>
                            <input type="text" id="reporterName" name="reporterName" required
                                placeholder="Full name of person reporting">
                        </div>

                    </div>

                    <div class="form-row" style="margin-top: 15px;">
                        <div class="form-col">
                            <label for="contactNumber">Contact Number <span class="required">*</span></label>
                            <input type="tel" id="contactNumber" name="contactNumber" required
                                placeholder="e.g. 09123456789">
                        </div>
                        <div class="form-col">
                            <label for="emailAddress">Email Address</label>
                            <input type="email" id="emailAddress" name="emailAddress" placeholder="email@example.com">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="additionalInfo">Additional Information</label>
                    <textarea id="additionalInfo" name="additionalInfo" rows="4"
                        placeholder="Any other relevant information, observations, or context about the incident..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-reset" id="backToStep4">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-paper-plane"></i> Submit Incident Report
                    </button>
                </div>
            </div>
        </form>
    </div>

    <footer>
        <p>Department of Education - Division of Silay City | Disaster Risk Reduction and Management</p>
        <p>This system is for official use only. All reports are confidential and protected under the Data Privacy Act.
        </p>
        <p>© 2023 DepEd Silay City DRRM. All rights reserved.</p>
    </footer>
</div>

<div id="confirmationModal" class="confirmation-modal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h2>Report Submitted Successfully!</h2>
        <p>Your incident report has been received by the DRRM Division.</p>
        <p><strong>Reference ID: <span id="modalRefId">XXXXXX</span></strong></p>
        <p>Please save this reference ID for future follow-up.</p>
        <div class="modal-buttons">
            <button class="btn btn-submit" id="closeModal">Close</button>
            <button class="btn btn-reset" id="printReport">Print Report</button>
        </div>
    </div>
</div>

<!-- Template for affected person row -->
<template id="affectedPersonTemplate">
    <div class="affected-person-row" data-person-index="0">
        <div class="affected-person-header">
            <h4>Affected Person <span class="person-number">1</span></h4>
            <button type="button" class="remove-person-btn">
                <i class="fas fa-times"></i> Remove
            </button>
        </div>
        <div class="form-row">
            <div class="form-col">
                <label>Person Type <span class="required">*</span></label>
                <select class="person-type" name="affectedPersonType[]" required>
                    <option value="">Select Type</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Staff">Staff</option>
                    <option value="Visitor">Visitor</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-col">
                <label>Full Name <span class="required">*</span></label>
                <input type="text" class="person-name" name="affectedPersonName[]" required placeholder="Full name">
            </div>
        </div>
        <div class="form-row" style="margin-top: 10px;">
            <div class="form-col">
                <label>Age</label>
                <input type="number" class="person-age" name="affectedPersonAge[]" min="0" max="120" placeholder="Age">
            </div>
            <div class="form-col">
                <label>Grade/Position</label>
                <input type="text" class="person-grade" name="affectedPersonGrade[]"
                    placeholder="Grade level or position">
            </div>
        </div>
        <div class="form-row" style="margin-top: 10px;">
            <div class="form-col">
                <label>Gender</label>
                <select class="person-gender" name="affectedPersonGender[]">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer not to say">Prefer not to say</option>
                </select>
            </div>
            <div class="form-col">
                <label>Parent/Guardian Contact (if student)</label>
                <input type="text" class="parent-contact" name="affectedPersonParentContact[]"
                    placeholder="Contact number">
            </div>
        </div>
        <div class="form-row" style="margin-top: 10px;">
            <div class="form-col">
                <label>Nature of Injury/Illness <span class="required">*</span></label>
                <input type="text" class="person-injury" name="affectedPersonInjury[]" required
                    placeholder="e.g., broken arm, fever, cut on forehead">
            </div>
        </div>
        <div class="form-row" style="margin-top: 10px;">
            <div class="form-col">
                <label>Condition</label>
                <select class="person-condition" name="affectedPersonCondition[]">
                    <option value="">Select Condition</option>
                    <option value="Stable">Stable</option>
                    <option value="Serious">Serious</option>
                    <option value="Critical">Critical</option>
                    <option value="Treated and Released">Treated and Released</option>
                    <option value="Hospitalized">Hospitalized</option>
                </select>
            </div>
            <div class="form-col">
                <label>Taken to Hospital?</label>
                <select class="person-hospitalized" name="affectedPersonHospitalized[]">
                    <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        <div class="form-row" style="margin-top: 10px;">
            <div class="form-col">
                <label>Additional Medical Notes</label>
                <textarea class="person-notes" name="affectedPersonNotes[]" rows="2"
                    placeholder="Additional medical information or notes"></textarea>
            </div>
        </div>
    </div>
</template>

<script src="<?php echo WEB_ROOT; ?>disaster/js/disaster.js"></script>