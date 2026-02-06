<div class="container">
        <!-- Back to Categories -->
        <div class="mb-3">
            <a href="<?php echo WEB_ROOT; ?>" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left me-2"></i> Back to Categories
            </a>
        </div>
        
        <!-- Alert Banner -->
        <div class="alert alert-banner d-flex align-items-center mb-4" role="alert">
            <i class="fas fa-school fs-5 me-3"></i>
            <div>
                <strong>School Incident Report:</strong> Use this form to report incidents occurring within school premises.
            </div>
        </div>
        
        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success d-none" role="alert">
            <i class="fas fa-check-circle me-2"></i><strong>Success!</strong> Your school incident report has been submitted successfully. Reference ID: <span id="refId"></span>
        </div>
        
        <!-- Step Indicator -->
        <div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
            <div class="step active text-center" id="step1">
                <div class="step-circle mx-auto mb-2">1</div>
                <div class="step-label">School Incident Type</div>
            </div>
            <div class="step text-center" id="step2">
                <div class="step-circle mx-auto mb-2">2</div>
                <div class="step-label">Incident Details</div>
            </div>
            <div class="step text-center" id="step3">
                <div class="step-circle mx-auto mb-2">3</div>
                <div class="step-label">Impact Assessment</div>
            </div>
            <div class="step text-center" id="step4">
                <div class="step-circle mx-auto mb-2">4</div>
                <div class="step-label">School Information</div>
            </div>
        </div>
        
        <!-- Form Container -->
        <div class="form-container p-4 p-md-5 mb-4">
            <form id="schoolIncidentForm" enctype="multipart/form-data" method="POST">
                
                <!-- Step 1: Incident Type -->
                <div class="form-section active" id="section1">
                    <h2 class="form-title mb-4 d-flex align-items-center gap-2">
                        <i class="fas fa-school"></i> 1. Select School Incident Type
                    </h2>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <label class="form-label fw-semibold">School Incident Type <span class="required">*</span></label>
                        <p class="text-muted small">Select the type of school incident that occurred</p>
                        
                        <div class="row g-3">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Structural Damage">
                                    <div class="incident-icon mb-2"><i class="fas fa-building"></i></div>
                                    <div class="small">Structural Damage</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Utility Failure">
                                    <div class="incident-icon mb-2"><i class="fas fa-bolt"></i></div>
                                    <div class="small">Utility Failure</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Security Breach">
                                    <div class="incident-icon mb-2"><i class="fas fa-shield-alt"></i></div>
                                    <div class="small">Security Breach</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Accident (Non-medical)">
                                    <div class="incident-icon mb-2"><i class="fas fa-car-crash"></i></div>
                                    <div class="small">Accident (Non-medical)</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Chemical Spill">
                                    <div class="incident-icon mb-2"><i class="fas fa-flask"></i></div>
                                    <div class="small">Chemical Spill</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Gas Leak">
                                    <div class="incident-icon mb-2"><i class="fas fa-smog"></i></div>
                                    <div class="small">Gas Leak</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Water Pipe Burst">
                                    <div class="incident-icon mb-2"><i class="fas fa-tint"></i></div>
                                    <div class="small">Water Pipe Burst</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Power Outage">
                                    <div class="incident-icon mb-2"><i class="fas fa-plug"></i></div>
                                    <div class="small">Power Outage</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Vandalism">
                                    <div class="incident-icon mb-2"><i class="fas fa-spray-can"></i></div>
                                    <div class="small">Vandalism</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Theft">
                                    <div class="incident-icon mb-2"><i class="fas fa-user-secret"></i></div>
                                    <div class="small">Theft</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Elevator Malfunction">
                                    <div class="incident-icon mb-2"><i class="fas fa-sort"></i></div>
                                    <div class="small">Elevator Malfunction</div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                                <div class="incident-type" data-type="Other School Incident">
                                    <div class="incident-icon mb-2"><i class="fas fa-school"></i></div>
                                    <div class="small">Other School Incident</div>
                                </div>
                            </div>
                        </div>
                        <!-- DB field: incident_type -->
                        <input type="hidden" id="disasterType" name="incident_type" required>
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
                                <label for="incidentDate" class="form-label fw-semibold">Date of Incident <span class="required">*</span></label>
                                <!-- DB field: incident_date (varchar 20) -->
                                <input type="date" class="form-control" id="incidentDate" name="incident_date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="incidentTime" class="form-label fw-semibold">Time of Incident <span class="required">*</span></label>
                                <!-- DB field: incident_time (varchar 20) -->
                                <input type="time" class="form-control" id="incidentTime" name="incident_time" required>
                            </div>
                            <div class="col-12">
                                <label for="location" class="form-label fw-semibold">Specific Location <span class="required">*</span></label>
                                <!-- DB field: incident_location (varchar 100) -->
                                <input type="text" class="form-control" id="location" name="incident_location" required placeholder="e.g., School Gymnasium, Classroom Building, School Grounds">
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
                        <!-- DB field: incident_level (varchar 20) -->
                        <input type="hidden" id="severity" name="incident_level" required>
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
                                <label class="form-label fw-semibold">Number of Affected Persons</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label for="studentsAffected" class="form-label small">Students</label>
                                        <!-- DB field: affected_student (int 20) -->
                                        <input type="number" class="form-control" id="studentsAffected" name="affected_student" min="0" value="0" placeholder="0">
                                    </div>
                                    <div class="col-6">
                                        <label for="staffAffected" class="form-label small">Staff/Teachers</label>
                                        <!-- DB field: affected_staff (int 20) -->
                                        <input type="number" class="form-control" id="staffAffected" name="affected_staff" min="0" value="0" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <label class="form-label fw-semibold">Class/School Suspension Information</label>
                        
                        <div class="mb-3">
                            <label for="classSuspension" class="form-label">Is there an official declaration of Class/School Suspension? <span class="required">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="suspension" id="classSuspensionYes" value="1" required>
                                <label class="form-check-label" for="classSuspensionYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="suspension" id="classSuspensionNo" value="0" required>
                                <label class="form-check-label" for="classSuspensionNo">No</label>
                            </div>
                        </div>
                        
                        <!-- Conditional fields that appear when suspension = Yes -->
                        <div id="suspensionDetails" class="d-none">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="suspensionDate" class="form-label">Date of Suspension</label>
                                    <!-- DB field: suspension_date (varchar 20) -->
                                    <input type="date" class="form-control" id="suspensionDate" name="suspension_date">
                                </div>
                                <div class="col-md-6">
                                    <label for="suspensionBasis" class="form-label">Basis for Suspension</label>
                                    <!-- DB field: suspension_basis (varchar 20) -->
                                    <select class="form-select" id="suspensionBasis" name="suspension_basis">
                                        <option value="">Select Basis</option>
                                        <option value="DepEd Order">DepEd Order</option>
                                        <option value="LGU Order">LGU Order</option>
                                        <option value="School Decision">School Decision</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                
                <!-- Step 4: School Information -->
                <div class="form-section" id="section4">
                    <h2 class="form-title mb-4 d-flex align-items-center gap-2">
                        <i class="fas fa-school"></i> 4. School Information
                    </h2>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <h3 class="h6 mb-3" style="color: var(--primary-blue);">School Details</h3>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="schoolAddress" class="form-label fw-semibold">School Name & Address <span class="required">*</span></label>
                                <!-- DB field: school_add (varchar 100) -->
                                <input type="text" class="form-control" id="schoolAddress" name="school_add" required placeholder="Complete school name and address">
                                <small class="text-muted">e.g., Silay City National High School, Balaring St, Silay City</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <h3 class="h6 mb-3" style="color: var(--primary-blue);">Reporting Person Information</h3>
                        
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="reporterName" class="form-label fw-semibold">Reporting Person <span class="required">*</span></label>
                                <!-- DB field: reporting_person (varchar 100) -->
                                <input type="text" class="form-control" id="reporterName" name="reporting_person" required placeholder="Full name of person reporting">
                            </div>
                           
                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label fw-semibold">Contact Number <span class="required">*</span></label>
                                <!-- DB field: contact_number (int 20) -->
                                <input type="tel" class="form-control" id="contactNumber" name="contact_number" required placeholder="e.g. 09123456789" pattern="[0-9]+">
                            </div>
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label fw-semibold">Email Address</label>
                                <!-- DB field: email_add (varchar 50) -->
                                <input type="email" class="form-control" id="emailAddress" name="email_add" placeholder="email@example.com">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <label for="incidentPhotos" class="form-label fw-semibold">Upload Incident Photos</label>
                        <div class="upload-area" id="uploadArea">
                            <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i>
                            <p>Drag & drop photos here or click to browse</p>
                            <!-- DB field: sThumbnail (varchar 50) - stores filename -->
                            <input type="file" id="incidentPhotos" name="sThumbnail" accept="image/*" class="d-none">
                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="document.getElementById('incidentPhotos').click()">Browse Files</button>
                        </div>
                        <div id="previewContainer" class="mt-3"></div>
                        <small class="text-muted">Upload the main incident photo. Additional photos can be attached after submission.</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="additionalInfo" class="form-label fw-semibold">Additional Information / Description</label>
                        <!-- DB field: sDescription (text) -->
                        <textarea class="form-control" id="additionalInfo" name="sDescription" rows="4" placeholder="Any other relevant information, observations, or context about the incident..."></textarea>
                    </div>
                    
                    <div class="d-flex justify-content-between gap-3 flex-wrap">
                        <button type="button" class="btn btn-secondary btn-lg" id="backToStep3">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </button>
                        <button type="submit" class="btn btn-primary-custom btn-lg">
                            <i class="fas fa-paper-plane me-2"></i> Submit School Incident Report
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="confirmation-modal">
        <div class="modal-content-custom">
            <div class="modal-icon mb-3">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="h4">Report Submitted Successfully!</h2>
            <p>Your school incident report has been received by the DRRM Division.</p>
            <p><strong>Reference ID: <span id="modalRefId">XXXXXX</span></strong></p>
            <p class="text-muted">Please save this reference ID for future follow-up.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button class="btn btn-primary-custom" id="closeModal">Close</button>
                <button class="btn btn-secondary" id="printReport">Print Report</button>
            </div>
        </div>
    </div>

    
    <script src="<?php echo WEB_ROOT; ?>school-incident/js/school-incident.js"></script>