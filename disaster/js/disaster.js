
// Global variables
let currentStep = 1;
let affectedPersonCount = 0;
let uploadedFiles = [];
const MAX_FILES = 10;
const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB in bytes
const ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];

// Set default date and time
document.addEventListener('DOMContentLoaded', function () {
    const incidentDate = document.getElementById('incidentDate');
    if (incidentDate) incidentDate.valueAsDate = new Date();

    const now = new Date();
    const timeString = now.getHours().toString().padStart(2, '0') + ':' +
        now.getMinutes().toString().padStart(2, '0');
    const incidentTime = document.getElementById('incidentTime');
    if (incidentTime) incidentTime.value = timeString;

    // Initialize all incident type containers
    setupIncidentTypeSelection('disasterTypes');
    setupIncidentTypeSelection('schoolIncidentTypes');
    setupIncidentTypeSelection('medicalAccidentTypes');

    // Hide containers initially (except what might be needed for current category)
    hideAllIncidentTypeContainers();
    const incidentCategoryInput = document.getElementById('incidentCategory');
    if (incidentCategoryInput && incidentCategoryInput.value === 'Disaster') {
        const disasterTypes = document.getElementById('disasterTypes');
        if (disasterTypes) disasterTypes.style.display = 'flex';
    }

    // Initialize category selection
    initializeCategorySelection();

    // Initialize severity selection
    initializeSeveritySelection();

    // Set default severity to Medium
    const mediumSeverity = document.querySelector('.severity-dot[data-severity="Medium"]');
    if (mediumSeverity) mediumSeverity.click();

    // Initialize district dropdown
    initializeDistricts();

    // Initialize photo upload functionality
    initializePhotoUpload();
});

// Incident category selection
function initializeCategorySelection() {
    const incidentCategories = document.querySelectorAll('.incident-category');
    const incidentCategoryInput = document.getElementById('incidentCategory');
    const nextToStep2 = document.getElementById('nextToStep2');

    if (!incidentCategoryInput || !incidentCategories.length) return;

    incidentCategories.forEach(category => {
        category.addEventListener('click', function () {
            // Remove selected class from all categories
            incidentCategories.forEach(c => c.classList.remove('selected'));

            // Add selected class to clicked category
            this.classList.add('selected');

            // Set the hidden input value
            const selectedCategory = this.getAttribute('data-category');
            incidentCategoryInput.value = selectedCategory;

            // Enable next button
            if (nextToStep2) nextToStep2.disabled = false;
        });
    });
}

// Function to set up incident type selection
function setupIncidentTypeSelection(containerId) {
    const container = document.getElementById(containerId);
    const incidentTypeInput = document.getElementById('incidentType');

    if (!container || !incidentTypeInput) return;

    container.style.display = 'flex'; // Restore as flex to maintain Bootstrap row layout
    const incidentTypes = container.querySelectorAll('.incident-type');

    incidentTypes.forEach(type => {
        type.addEventListener('click', function () {
            // Remove selected class from all types in all containers
            document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));

            // Add selected class to clicked type
            this.classList.add('selected');

            // Set the hidden input value
            incidentTypeInput.value = this.getAttribute('data-type');
        });
    });
}

// Hide all incident type containers initially
function hideAllIncidentTypeContainers() {
    document.getElementById('disasterTypes').style.display = 'none';
    document.getElementById('schoolIncidentTypes').style.display = 'none';
    document.getElementById('medicalAccidentTypes').style.display = 'none';

    // Clear any selected incident type - Removed to prevent wiping selection on step transition
    // document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));
    // incidentTypeInput.value = '';
}

// Severity level selection - logic moved to initializeSeveritySelection

// Step navigation
if (document.getElementById('nextToStep2')) {
    document.getElementById('nextToStep2').addEventListener('click', function () {
        const incidentCategoryInput = document.getElementById('incidentCategory');
        if (!incidentCategoryInput || !incidentCategoryInput.value) {
            alert('Please select an incident category.');
            return;
        }

        // Show appropriate incident types based on category
        hideAllIncidentTypeContainers();

        if (incidentCategoryInput.value === 'Disaster') {
            const disasterTypes = document.getElementById('disasterTypes');
            if (disasterTypes) disasterTypes.style.display = 'flex';
        } else if (incidentCategoryInput.value === 'School Incident') {
            const schoolIncidentTypes = document.getElementById('schoolIncidentTypes');
            if (schoolIncidentTypes) schoolIncidentTypes.style.display = 'flex';
        } else if (incidentCategoryInput.value === 'Medical Accident') {
            const medicalAccidentTypes = document.getElementById('medicalAccidentTypes');
            if (medicalAccidentTypes) medicalAccidentTypes.style.display = 'flex';
        }

        navigateToStep(2);
    });
}

if (document.getElementById('nextToStep3')) {
    document.getElementById('nextToStep3').addEventListener('click', function () {
        const incidentTypeInput = document.getElementById('incidentType');
        const severityInput = document.getElementById('severity');
        const incidentCategoryInput = document.getElementById('incidentCategory');

        if (!incidentTypeInput || !incidentTypeInput.value) {
            alert('Please select an incident type.');
            return;
        }

        if (!severityInput || !severityInput.value) {
            alert('Please select a severity level.');
            return;
        }

        // Show/hide appropriate sections for step 3
        const medicalDetailsSection = document.getElementById('medicalDetailsSection');
        const nonMedicalSection = document.getElementById('nonMedicalSection');

        if (incidentCategoryInput && incidentCategoryInput.value === 'Medical Accident') {
            if (medicalDetailsSection) medicalDetailsSection.style.display = 'block';
            if (nonMedicalSection) nonMedicalSection.style.display = 'none';

            // Initialize with one affected person
            if (affectedPersonCount === 0) {
                addAffectedPerson();
            }
        } else {
            if (medicalDetailsSection) medicalDetailsSection.style.display = 'none';
            if (nonMedicalSection) nonMedicalSection.style.display = 'block';
        }

        navigateToStep(3);
    });
}

if (document.getElementById('nextToStep4')) {
    document.getElementById('nextToStep4').addEventListener('click', function () {
        const incidentCategoryInput = document.getElementById('incidentCategory');
        const category = incidentCategoryInput ? incidentCategoryInput.value : '';

        // For medical accidents, validate that at least one affected person is added
        if (category === 'Medical Accident') {
            const personRows = document.querySelectorAll('.affected-person-row');
            if (personRows.length === 0) {
                alert('Please add at least one affected person for medical accidents.');
                return;
            }

            // Validate each affected person form
            let valid = true;
            personRows.forEach(row => {
                const type = row.querySelector('.person-type').value;
                const name = row.querySelector('.person-name').value;
                const injury = row.querySelector('.person-injury').value;

                if (!type || !name || !injury) {
                    valid = false;
                }
            });

            if (!valid) {
                alert('Please fill in all required fields for affected persons.');
                return;
            }
        }

        navigateToStep(4);
    });
}

if (document.getElementById('nextToStep5')) {
    document.getElementById('nextToStep5').addEventListener('click', function () {
        // Photo upload is optional, so no validation needed
        navigateToStep(5);
    });
}

// Back navigation
const backToStep1 = document.getElementById('backToStep1');
if (backToStep1) {
    backToStep1.addEventListener('click', function () {
        navigateToStep(1);
    });
}

const backToStep2 = document.getElementById('backToStep2');
if (backToStep2) {
    backToStep2.addEventListener('click', function () {
        navigateToStep(2);
    });
}

const backToStep3 = document.getElementById('backToStep3');
if (backToStep3) {
    backToStep3.addEventListener('click', function () {
        navigateToStep(3);
    });
}

const backToStep4 = document.getElementById('backToStep4');
if (backToStep4) {
    backToStep4.addEventListener('click', function () {
        navigateToStep(4);
    });
}

// Navigation function
function navigateToStep(step) {
    // Hide all sections
    document.querySelectorAll('.form-section').forEach(section => {
        section.classList.remove('active');
    });

    // Show target section
    document.getElementById(`section${step}`).classList.add('active');

    // Update step indicator
    document.querySelectorAll('.step').forEach(stepEl => {
        stepEl.classList.remove('active');
    });
    document.getElementById(`step${step}`).classList.add('active');

    currentStep = step;

    // Scroll to top of form
    document.querySelector('.form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Affected person management
document.getElementById('addPersonBtn').addEventListener('click', addAffectedPerson);

function addAffectedPerson() {
    affectedPersonCount++;

    const template = document.getElementById('affectedPersonTemplate');
    const clone = template.content.cloneNode(true);

    const personRow = clone.querySelector('.affected-person-row');
    personRow.setAttribute('data-person-index', affectedPersonCount);

    // Update person number
    personRow.querySelector('.person-number').textContent = affectedPersonCount;

    // Add remove functionality
    const removeBtn = personRow.querySelector('.remove-person-btn');
    removeBtn.addEventListener('click', function () {
        personRow.remove();
        updatePersonNumbers();
    });

    document.getElementById('affectedPersonsContainer').appendChild(personRow);
}

function updatePersonNumbers() {
    const personRows = document.querySelectorAll('.affected-person-row');
    affectedPersonCount = personRows.length;

    personRows.forEach((row, index) => {
        row.querySelector('.person-number').textContent = index + 1;
        row.setAttribute('data-person-index', index + 1);
    });
}

// Photo upload functionality
function initializePhotoUpload() {
    const uploadArea = document.getElementById('uploadArea');
    const browseBtn = document.getElementById('browseBtn');
    const photoInput = document.getElementById('photoInput');
    const previewContainer = document.getElementById('previewContainer');
    const uploadedPhotosInput = document.getElementById('uploadedPhotos');

    if (!uploadArea || !browseBtn || !photoInput) return;

    // Click on upload area to trigger file input
    uploadArea.addEventListener('click', function (e) {
        if (e.target !== browseBtn) {
            photoInput.click();
        }
    });

    // Click on browse button
    browseBtn.addEventListener('click', function () {
        photoInput.click();
    });

    // File input change event
    photoInput.addEventListener('change', handleFileSelect);

    // Drag and drop events
    uploadArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function () {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function (e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');

        if (e.dataTransfer.files.length) {
            handleFileSelect({ target: { files: e.dataTransfer.files } });
        }
    });

    // Handle file selection
    function handleFileSelect(e) {
        const files = Array.from(e.target.files);

        // Check total file count
        if (uploadedFiles.length + files.length > MAX_FILES) {
            showUploadStatus(`Maximum ${MAX_FILES} photos allowed. You can upload ${MAX_FILES - uploadedFiles.length} more.`, 'error');
            return;
        }

        // Process each file
        files.forEach(file => {
            // Validate file
            if (!validateFile(file)) return;

            // Add to uploaded files array
            uploadedFiles.push(file);

            // Create preview
            createPreview(file);
        });

        // Update hidden input with file names
        updateUploadedPhotosInput();

        // Clear file input
        photoInput.value = '';
    }

    // Validate file
    function validateFile(file) {
        // Check file type
        if (!ALLOWED_TYPES.includes(file.type)) {
            showUploadStatus(`File "${file.name}" is not a supported image format. Please upload JPG, PNG, or GIF files.`, 'error');
            return false;
        }

        // Check file size
        if (file.size > MAX_FILE_SIZE) {
            showUploadStatus(`File "${file.name}" is too large. Maximum size is 5MB.`, 'error');
            return false;
        }

        return true;
    }

    // Create preview for uploaded file
    function createPreview(file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const preview = document.createElement('div');
            preview.className = 'photo-preview';
            preview.setAttribute('data-filename', file.name);

            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Incident photo evidence';

            const overlay = document.createElement('div');
            overlay.className = 'photo-overlay';

            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-photo';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.title = 'Remove photo';

            removeBtn.addEventListener('click', function () {
                removePhoto(file.name);
                preview.remove();
            });

            overlay.appendChild(removeBtn);

            const info = document.createElement('div');
            info.className = 'photo-info';
            info.textContent = `${file.name} (${formatFileSize(file.size)})`;

            preview.appendChild(img);
            preview.appendChild(overlay);
            preview.appendChild(info);

            previewContainer.appendChild(preview);
        };

        reader.readAsDataURL(file);
    }

    // Remove photo from uploaded files
    function removePhoto(filename) {
        uploadedFiles = uploadedFiles.filter(file => file.name !== filename);
        updateUploadedPhotosInput();
        showUploadStatus(`Photo "${filename}" removed.`, 'success');
    }

    // Update hidden input with file names
    function updateUploadedPhotosInput() {
        const fileNames = uploadedFiles.map(file => file.name);
        uploadedPhotosInput.value = JSON.stringify(fileNames);

        // Show upload status
        if (uploadedFiles.length > 0) {
            showUploadStatus(`${uploadedFiles.length} photo(s) ready for upload.`, 'success');
        } else {
            showUploadStatus('No photos selected.', 'info');
        }
    }

    // Show upload status
    function showUploadStatus(message, type) {
        const statusElement = document.getElementById('uploadStatus');
        statusElement.textContent = message;
        statusElement.className = 'upload-status ' + type;
        statusElement.style.display = 'block';

        // Hide after 5 seconds for success/info messages
        if (type !== 'error') {
            setTimeout(() => {
                statusElement.style.display = 'none';
            }, 5000);
        }
    }

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';

        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));

        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
}

// Form submission
const reportForm = document.getElementById('incidentForm');
if (reportForm) {
    reportForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Validate final step
        const schoolName = document.getElementById('schoolName').value;
        const reporterName = document.getElementById('reporterName').value;
        const contactNumber = document.getElementById('contactNumber').value;

        if (!schoolName || !reporterName || !contactNumber) {
            alert('Please fill in all required fields (School Name, Reporting Person, and Contact Number).');
            return;
        }

        // Show loading state
        const submitBtn = document.querySelector('.btn-submit[type="submit"]');
        if (!submitBtn) {
            console.error('Submit button not found');
            return;
        }
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Uploading & Submitting...';
        submitBtn.disabled = true;

        // Show upload progress
        const progressBar = document.getElementById('progressBar');
        const uploadProgress = document.getElementById('uploadProgress');
        const uploadStatus = document.getElementById('uploadStatus');

        uploadProgress.style.display = 'block';
        progressBar.style.width = '0%';
        uploadStatus.textContent = 'Starting upload...';
        uploadStatus.className = 'upload-status';
        uploadStatus.style.display = 'block';

        // Create FormData for file upload
        const formData = new FormData(document.getElementById('incidentForm'));

        // Add all uploaded files to FormData
        uploadedFiles.forEach((file, index) => {
            formData.append(`incidentPhotos[]`, file);
        });

        // Generate a reference ID
        const refId = 'DRRM-' + Date.now().toString().slice(-6) +
            Math.random().toString(36).substring(2, 5).toUpperCase();

        // Add reference ID to form data
        formData.append('referenceId', refId);

        // Simulate upload progress
        let progress = 0;
        const progressInterval = setInterval(() => {
            progress += 5;
            if (progress <= 90) {
                progressBar.style.width = progress + '%';
            }
        }, 100);

        // Actual AJAX call to backend
        fetch('submit_disaster.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                clearInterval(progressInterval);
                if (data.status === 'success') {
                    progressBar.style.width = '100%';
                    uploadStatus.textContent = 'Submission complete!';
                    uploadStatus.className = 'upload-status success';

                    // Show success message and ref ID
                    const refIdElement = document.getElementById('refId');
                    if (refIdElement) refIdElement.textContent = data.referenceId;

                    const successMsg = document.getElementById('successMessage');
                    if (successMsg) successMsg.style.display = 'block';

                    const errorMsg = document.getElementById('errorMessage');
                    if (errorMsg) errorMsg.style.display = 'none';

                    // Reset button state
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;

                    // Hide progress bar after delay
                    setTimeout(() => {
                        uploadProgress.style.display = 'none';
                        uploadStatus.style.display = 'none';
                    }, 2000);

                    // Show confirmation modal
                    const modalRefId = document.getElementById('modalRefId');
                    if (modalRefId) modalRefId.textContent = data.referenceId;

                    const confModal = document.getElementById('confirmationModal');
                    if (confModal) confModal.style.display = 'flex';
                } else {
                    throw new Error(data.message || 'Unknown error occurred');
                }
            })
            .catch(error => {
                clearInterval(progressInterval);
                console.error('Submission error:', error);

                progressBar.className = 'progress-bar bg-danger';
                uploadStatus.textContent = 'Error: ' + error.message;
                uploadStatus.className = 'upload-status error';

                const errorMsg = document.getElementById('errorMessage');
                if (errorMsg) {
                    errorMsg.textContent = 'Error submitting report: ' + error.message;
                    errorMsg.style.display = 'block';
                }

                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
    });
}

// Modal buttons
document.getElementById('closeModal').addEventListener('click', function () {
    document.getElementById('confirmationModal').style.display = 'none';
    resetForm();
});

document.getElementById('printReport').addEventListener('click', function () {
    // In a real implementation, generate a printable report
    alert('A printable report would be generated with Reference ID: ' +
        document.getElementById('modalRefId').textContent);
});

// Hide all incident type containers initially
function hideAllIncidentTypeContainers() {
    const disasterTypes = document.getElementById('disasterTypes');
    const schoolIncidentTypes = document.getElementById('schoolIncidentTypes');
    const medicalAccidentTypes = document.getElementById('medicalAccidentTypes');

    if (disasterTypes) disasterTypes.style.display = 'none';
    if (schoolIncidentTypes) schoolIncidentTypes.style.display = 'none';
    if (medicalAccidentTypes) medicalAccidentTypes.style.display = 'none';
}

// Severity level selection
function initializeSeveritySelection() {
    const severityDots = document.querySelectorAll('.severity-dot');
    const severityInput = document.getElementById('severity');

    if (!severityDots.length || !severityInput) return;

    severityDots.forEach(dot => {
        dot.addEventListener('click', function () {
            // Remove selected class from all dots
            severityDots.forEach(d => d.classList.remove('selected'));

            // Add selected class to clicked dot
            this.classList.add('selected');

            // Set the hidden input value
            severityInput.value = this.getAttribute('data-severity');
        });
    });
}
// Call it in DOMContentLoaded
// ... (I'll move the call into the DOMContentLoaded listener in the next step or here)

// Reset form function
function resetForm() {
    const form = document.getElementById('incidentForm');
    if (form) form.reset();

    // Reset selections
    document.querySelectorAll('.incident-category').forEach(c => c.classList.remove('selected'));
    const categoryInput = document.getElementById('incidentCategory');
    if (categoryInput) categoryInput.value = 'Disaster'; // Default back to Disaster

    document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));
    const typeInput = document.getElementById('incidentType');
    if (typeInput) typeInput.value = '';

    const mediumSeverity = document.querySelector('.severity-dot[data-severity="Medium"]');
    if (mediumSeverity) mediumSeverity.click();

    // Clear affected persons
    document.getElementById('affectedPersonsContainer').innerHTML = '';
    affectedPersonCount = 0;

    // Clear uploaded photos
    uploadedFiles = [];
    document.getElementById('previewContainer').innerHTML = '';
    document.getElementById('uploadedPhotos').value = '';
    document.getElementById('uploadProgress').style.display = 'none';
    document.getElementById('uploadStatus').style.display = 'none';

    // Hide messages
    document.getElementById('successMessage').style.display = 'none';
    document.getElementById('errorMessage').style.display = 'none';

    // Reset to step 1
    navigateToStep(1);

    // Set default date and time
    document.getElementById('incidentDate').valueAsDate = new Date();

    const now = new Date();
    const timeString = now.getHours().toString().padStart(2, '0') + ':' +
        now.getMinutes().toString().padStart(2, '0');
    document.getElementById('incidentTime').value = timeString;
}

// Initialize district dropdown
function initializeDistricts() {
    const districts = [
        "Silay District I", "Silay District II", "Silay District III",
        "Silay District IV", "Silay District V", "Silay District VI",
        "Silay District VII", "Silay District VIII"
    ];

    const districtSelect = document.getElementById('district');
    if (!districtSelect) return;

    districts.forEach(district => {
        const option = document.createElement('option');
        option.value = district;
        option.textContent = district;
        districtSelect.appendChild(option);
    });
}