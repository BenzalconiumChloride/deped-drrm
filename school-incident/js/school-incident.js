// Global variables
let currentStep = 1;

// Set default date and time
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('incidentDate').valueAsDate = new Date();
    const now = new Date();
    const timeString = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
    document.getElementById('incidentTime').value = timeString;
    document.querySelector('.severity-dot[data-severity="Medium"]').click();
    
    // Add suspension toggle handler
    setupSuspensionToggle();
});

// Suspension toggle functionality
function setupSuspensionToggle() {
    const suspensionYes = document.getElementById('classSuspensionYes');
    const suspensionNo = document.getElementById('classSuspensionNo');
    const suspensionDetails = document.getElementById('suspensionDetails');
    
    suspensionYes.addEventListener('change', function() {
        if (this.checked) {
            suspensionDetails.classList.remove('d-none');
            document.getElementById('suspensionDate').required = true;
            document.getElementById('suspensionBasis').required = true;
        }
    });
    
    suspensionNo.addEventListener('change', function() {
        if (this.checked) {
            suspensionDetails.classList.add('d-none');
            document.getElementById('suspensionDate').required = false;
            document.getElementById('suspensionBasis').required = false;
            document.getElementById('suspensionDate').value = '';
            document.getElementById('suspensionBasis').value = '';
        }
    });
}

// Incident type selection
const disasterTypes = document.querySelectorAll('.incident-type');
const disasterTypeInput = document.getElementById('disasterType');

disasterTypes.forEach(type => {
    type.addEventListener('click', function() {
        disasterTypes.forEach(t => t.classList.remove('selected'));
        this.classList.add('selected');
        disasterTypeInput.value = this.getAttribute('data-type');
    });
});

// Severity level selection
const severityDots = document.querySelectorAll('.severity-dot');
const severityInput = document.getElementById('severity');

severityDots.forEach(dot => {
    dot.addEventListener('click', function() {
        severityDots.forEach(d => d.classList.remove('selected'));
        this.classList.add('selected');
        severityInput.value = this.getAttribute('data-severity');
    });
});

// Navigation
document.getElementById('nextToStep2').addEventListener('click', () => {
    if (!disasterTypeInput.value) {
        showAlert('Please select a school incident type.', 'warning');
        return;
    }
    navigateToStep(2);
});

document.getElementById('nextToStep3').addEventListener('click', () => {
    if (!severityInput.value) {
        showAlert('Please select a severity level.', 'warning');
        return;
    }
    navigateToStep(3);
});

document.getElementById('nextToStep4').addEventListener('click', () => {
    const suspensionYes = document.getElementById('classSuspensionYes');
    const suspensionNo = document.getElementById('classSuspensionNo');
    
    if (!suspensionYes.checked && !suspensionNo.checked) {
        showAlert('Please indicate if there is a class/school suspension.', 'warning');
        return;
    }
    
    if (suspensionYes.checked) {
        const suspensionDate = document.getElementById('suspensionDate').value;
        const suspensionBasis = document.getElementById('suspensionBasis').value;
        
        if (!suspensionDate || !suspensionBasis) {
            showAlert('Please fill in the suspension date and basis.', 'warning');
            return;
        }
    }
    
    navigateToStep(4);
});

document.getElementById('backToStep1').addEventListener('click', () => navigateToStep(1));
document.getElementById('backToStep2').addEventListener('click', () => navigateToStep(2));
document.getElementById('backToStep3').addEventListener('click', () => navigateToStep(3));

function navigateToStep(step) {
    document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));
    document.getElementById(`section${step}`).classList.add('active');
    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    document.getElementById(`step${step}`).classList.add('active');
    currentStep = step;
    document.querySelector('.form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// File upload preview
document.getElementById('incidentPhotos').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('previewContainer');
    
    if (file) {
        // Validate file size (5MB)
        if (file.size > 5242880) {
            showAlert('File size must be less than 5MB', 'danger');
            this.value = '';
            return;
        }
        
        // Validate file type
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            showAlert('Only JPG, JPEG, PNG, and GIF files are allowed', 'danger');
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `
                <div class="position-relative d-inline-block">
                    <img src="${e.target.result}" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2" onclick="clearPhoto()">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="mt-2 small text-muted">${file.name} (${(file.size / 1024).toFixed(2)} KB)</div>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});

function clearPhoto() {
    document.getElementById('incidentPhotos').value = '';
    document.getElementById('previewContainer').innerHTML = '';
}

// Alert function
function showAlert(message, type = 'info') {
    alert(message);
}

// Form submission with fetch
document.getElementById('schoolIncidentForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const submitBtn = document.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
    submitBtn.disabled = true;
    
    // Prepare form data
    const formData = new FormData(this);
    
    try {
        // Send data to server
        const response = await fetch('api/submit-incident.php', {
            method: 'POST',
            body: formData
        });
        
        // Parse JSON response
        const data = await response.json();
        
        if (data.success) {
            // Success - show success message and modal
            document.getElementById('refId').textContent = data.refId;
            document.getElementById('successMessage').classList.remove('d-none');
            document.getElementById('modalRefId').textContent = data.refId;
            document.getElementById('confirmationModal').style.display = 'flex';
            
            // Scroll to success message
            document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            // Log success
            console.log('School Incident Report submitted successfully:', data);
            
        } else {
            // Error from server
            showAlert(data.message || 'An error occurred while submitting the report.', 'danger');
            console.error('Submission error:', data);
        }
        
    } catch (error) {
        // Network or parsing error
        console.error('Fetch error:', error);
        showAlert('Failed to submit the report. Please check your internet connection and try again.', 'danger');
        
    } finally {
        // Re-enable submit button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
});

// Modal close button
document.getElementById('closeModal').addEventListener('click', () => {
    document.getElementById('confirmationModal').style.display = 'none';
    resetForm();
});

// Print report button
document.getElementById('printReport').addEventListener('click', () => {
    window.print();
});

// Reset form function
function resetForm() {
    document.getElementById('schoolIncidentForm').reset();
    
    // Reset incident type selection
    disasterTypes.forEach(t => t.classList.remove('selected'));
    disasterTypeInput.value = '';
    
    // Reset severity selection to Medium
    document.querySelector('.severity-dot[data-severity="Medium"]').click();
    
    // Clear photo preview
    document.getElementById('previewContainer').innerHTML = '';
    
    // Hide success message
    document.getElementById('successMessage').classList.add('d-none');
    
    // Reset to step 1
    navigateToStep(1);
    
    // Reset date and time to current
    document.getElementById('incidentDate').valueAsDate = new Date();
    const now = new Date();
    const timeString = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
    document.getElementById('incidentTime').value = timeString;
    
    // Hide suspension details
    document.getElementById('suspensionDetails').classList.add('d-none');
}

// Drag and drop functionality for file upload
const uploadArea = document.getElementById('uploadArea');

uploadArea.addEventListener('click', () => {
    document.getElementById('incidentPhotos').click();
});

uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.style.borderColor = 'var(--primary-blue)';
    uploadArea.style.backgroundColor = 'rgba(0, 123, 255, 0.05)';
});

uploadArea.addEventListener('dragleave', (e) => {
    e.preventDefault();
    uploadArea.style.borderColor = '#dee2e6';
    uploadArea.style.backgroundColor = 'transparent';
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.style.borderColor = '#dee2e6';
    uploadArea.style.backgroundColor = 'transparent';
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(files[0]);
        document.getElementById('incidentPhotos').files = dataTransfer.files;
        
        const event = new Event('change', { bubbles: true });
        document.getElementById('incidentPhotos').dispatchEvent(event);
    }
});

// Prevent default drag behavior on document
document.addEventListener('dragover', (e) => {
    e.preventDefault();
});

document.addEventListener('drop', (e) => {
    e.preventDefault();
});