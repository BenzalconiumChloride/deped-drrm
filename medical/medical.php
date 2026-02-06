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
            <form id="schoolIncidentForm" action="submit_school_incident.php" method="POST">
                <input type="hidden" name="incidentCategory" value="School Incident">
                
                <!-- Step 1: Disaster Type -->
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
                        <input type="hidden" id="disasterType" name="incidentType" required>
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
                                <input type="date" class="form-control" id="incidentDate" name="incidentDate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="incidentTime" class="form-label fw-semibold">Time of Incident <span class="required">*</span></label>
                                <input type="time" class="form-control" id="incidentTime" name="incidentTime" required>
                            </div>
                            <div class="col-12">
                                <label for="location" class="form-label fw-semibold">Specific Location <span class="required">*</span></label>
                                <input type="text" class="form-control" id="location" name="location" required placeholder="e.g., School Gymnasium, Classroom Building, School Grounds">
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
                        <label for="description" class="form-label fw-semibold">Incident Description <span class="required">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="5" required placeholder="Provide a detailed description of what happened..."></textarea>
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
                                        <input type="number" class="form-control" id="studentsAffected" name="studentsAffected" min="0" value="0" placeholder="0">
                                    </div>
                                    <div class="col-6">
                                        <label for="staffAffected" class="form-label small">Staff/Teachers</label>
                                        <input type="number" class="form-control" id="staffAffected" name="staffAffected" min="0" value="0" placeholder="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="casualtyDetails" class="form-label">Casualty/Injury Details</label>
                                <textarea class="form-control" id="casualtyDetails" name="casualtyDetails" rows="4" placeholder="Brief description of casualties or injuries..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <label for="propertyDamage" class="form-label fw-semibold">Property Damage</label>
                        <textarea class="form-control" id="propertyDamage" name="propertyDamage" rows="3" placeholder="Description of property damage (buildings, equipment, facilities), including estimated cost if known..."></textarea>
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
                    
                    <div class="mb-4">
                        <label for="immediateActions" class="form-label fw-semibold">Immediate Actions Taken</label>
                        <textarea class="form-control" id="immediateActions" name="immediateActions" rows="3" placeholder="Evacuation procedures, emergency services called, first aid provided, etc..."></textarea>
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
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="schoolName" class="form-label fw-semibold">School Name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="schoolName" name="schoolName" required placeholder="e.g. Silay City National High School">
                            </div>
                            <div class="col-md-6">
                                <label for="schoolId" class="form-label fw-semibold">School ID <span class="required">*</span></label>
                                <input type="text" class="form-control" id="schoolId" name="schoolId" required placeholder="e.g. 123456">
                            </div>
                            <div class="col-md-6">
                                <label for="district" class="form-label fw-semibold">District <span class="required">*</span></label>
                                <select class="form-select" id="district" name="district" required>
                                    <option value="">Select District</option>
                                    <option value="Silay District I">Silay District I</option>
                                    <option value="Silay District II">Silay District II</option>
                                    <option value="Silay District III">Silay District III</option>
                                    <option value="Silay District IV">Silay District IV</option>
                                    <option value="Silay District V">Silay District V</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="schoolAddress" class="form-label fw-semibold">School Address</label>
                                <input type="text" class="form-control" id="schoolAddress" name="schoolAddress" placeholder="Complete school address">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <h3 class="h6 mb-3" style="color: var(--primary-blue);">Reporting Person Information</h3>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="reporterName" class="form-label fw-semibold">Reporting Person <span class="required">*</span></label>
                                <input type="text" class="form-control" id="reporterName" name="reporterName" required placeholder="Full name of person reporting">
                            </div>
                            <div class="col-md-6">
                                <label for="reporterPosition" class="form-label fw-semibold">Position <span class="required">*</span></label>
                                <select class="form-select" id="reporterPosition" name="reporterPosition" required>
                                    <option value="">Select Position</option>
                                    <option value="School Principal">School Principal</option>
                                    <option value="Assistant Principal">Assistant Principal</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="DRRM Coordinator">DRRM Coordinator</option>
                                    <option value="School Nurse">School Nurse</option>
                                    <option value="Guidance Counselor">Guidance Counselor</option>
                                    <option value="School Security">School Security</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="contactNumber" class="form-label fw-semibold">Contact Number <span class="required">*</span></label>
                                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required placeholder="e.g. 09123456789">
                            </div>
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="email@example.com">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 pb-4 border-bottom">
                        <label for="assistanceNeeded" class="form-label fw-semibold">Assistance Needed from DRRM Division</label>
                        <textarea class="form-control" id="assistanceNeeded" name="assistanceNeeded" rows="4" placeholder="What assistance is needed? (e.g., structural assessment, emergency supplies, temporary shelter, medical support)"></textarea>
                    </div>
                    
                    <div class="mb-4">
                        <label for="additionalInfo" class="form-label fw-semibold">Additional Information</label>
                        <textarea class="form-control" id="additionalInfo" name="additionalInfo" rows="4" placeholder="Any other relevant information, observations, or context about the disaster..."></textarea>
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