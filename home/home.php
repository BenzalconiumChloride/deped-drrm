<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>

<div class="container">
    <div class="mb-4 pb-4 border-bottom">
        <label class="fw-semibold text-center d-flex">Incident Category <span class="required">*</span></label>
        <p class="text-muted small text-center">Select the main category of the incident</p>

        <div class="row g-3">
            <div class="col-lg-4 col-md-6">
                <div class="incident-category" data-category="Disaster">
                    <a href="<?php echo WEB_ROOT; ?>disaster/">
                        <div class="category-icon mb-2">
                            <i class="bi bi-exclamation-diamond"></i>
                        </div>
                        <h3 class="h5">Disaster</h3>
                        <p class="small">Natural or man-made disasters affecting the school</p>
                        <p class="category-examples">e.g., typhoon, flood, earthquake, fire</p>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="incident-category">
                    <a href="<?php echo WEB_ROOT; ?>school-incident/">
                        <div class="category-icon mb-2">
                            <i class="fas fa-school"></i>
                        </div>
                        <h3 class="h5">School Incident</h3>
                        <p class="small">Incidents occurring within school premises</p>
                        <p class="category-examples">e.g., structural damage, utility failure, security breach</p>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="incident-category" >
                    <a href="<?php echo WEB_ROOT; ?>medical-accident/">
                    <div class="category-icon mb-2">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <h3 class="h5">Medical Accident</h3>
                    <p class="small">Health-related incidents involving students or staff</p>
                    <p class="category-examples">e.g., injury, illness, medical emergency</p>
                    </a>
                </div>
            </div>
        </div>
        <input type="hidden" id="incidentCategory" name="incidentCategory" required>
    </div>
</div>