// Global variables
        let currentStep = 1;
        let affectedPersonCount = 0;
        
        // Set default date and time
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('incidentDate').valueAsDate = new Date();
            
            const now = new Date();
            const timeString = now.getHours().toString().padStart(2, '0') + ':' + 
                              now.getMinutes().toString().padStart(2, '0');
            document.getElementById('incidentTime').value = timeString;
            
            // Set default severity to Medium
            document.querySelector('.severity-dot[data-severity="Medium"]').click();
        });
        
        // Incident category selection
        const incidentCategories = document.querySelectorAll('.incident-category');
        const incidentCategoryInput = document.getElementById('incidentCategory');
        
        incidentCategories.forEach(category => {
            category.addEventListener('click', function() {
                incidentCategories.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                const selectedCategory = this.getAttribute('data-category');
                incidentCategoryInput.value = selectedCategory;
                document.getElementById('nextToStep2').disabled = false;
            });
        });
        
        // Incident type selection
        let incidentTypes = [];
        const incidentTypeInput = document.getElementById('incidentType');
        
        function setupIncidentTypeSelection(containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;
            
            container.classList.remove('d-none');
            incidentTypes = container.querySelectorAll('.incident-type');
            
            incidentTypes.forEach(type => {
                type.addEventListener('click', function() {
                    document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));
                    this.classList.add('selected');
                    incidentTypeInput.value = this.getAttribute('data-type');
                });
            });
        }
        
        function hideAllIncidentTypeContainers() {
            document.getElementById('disasterTypes').classList.add('d-none');
            document.getElementById('schoolIncidentTypes').classList.add('d-none');
            document.getElementById('medicalAccidentTypes').classList.add('d-none');
            document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));
            incidentTypeInput.value = '';
        }
        
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
        
        // Step navigation
        document.getElementById('nextToStep2').addEventListener('click', function() {
            if (!incidentCategoryInput.value) {
                alert('Please select an incident category.');
                return;
            }
            
            hideAllIncidentTypeContainers();
            
            if (incidentCategoryInput.value === 'Disaster') {
                setupIncidentTypeSelection('disasterTypes');
            } else if (incidentCategoryInput.value === 'School Incident') {
                setupIncidentTypeSelection('schoolIncidentTypes');
            } else if (incidentCategoryInput.value === 'Medical Accident') {
                setupIncidentTypeSelection('medicalAccidentTypes');
            }
            
            navigateToStep(2);
        });
        
        document.getElementById('nextToStep3').addEventListener('click', function() {
            if (!incidentTypeInput.value) {
                alert('Please select an incident type.');
                return;
            }
            
            if (!severityInput.value) {
                alert('Please select a severity level.');
                return;
            }
            
            const medicalDetailsSection = document.getElementById('medicalDetailsSection');
            const nonMedicalSection = document.getElementById('nonMedicalSection');
            
            if (incidentCategoryInput.value === 'Medical Accident') {
                medicalDetailsSection.style.display = 'block';
                nonMedicalSection.classList.add('d-none');
                
                if (affectedPersonCount === 0) {
                    addAffectedPerson();
                }
            } else {
                medicalDetailsSection.style.display = 'none';
                nonMedicalSection.classList.remove('d-none');
            }
            
            navigateToStep(3);
        });
        
        document.getElementById('nextToStep4').addEventListener('click', function() {
            if (incidentCategoryInput.value === 'Medical Accident') {
                const personRows = document.querySelectorAll('.affected-person-row');
                if (personRows.length === 0) {
                    alert('Please add at least one affected person for medical accidents.');
                    return;
                }
                
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
        
        // Back navigation
        document.getElementById('backToStep1').addEventListener('click', function() {
            navigateToStep(1);
        });
        
        document.getElementById('backToStep2').addEventListener('click', function() {
            navigateToStep(2);
        });
        
        document.getElementById('backToStep3').addEventListener('click', function() {
            navigateToStep(3);
        });
        
        // Navigation function
        function navigateToStep(step) {
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });
            
            document.getElementById(`section${step}`).classList.add('active');
            
            document.querySelectorAll('.step').forEach(stepEl => {
                stepEl.classList.remove('active');
            });
            document.getElementById(`step${step}`).classList.add('active');
            
            currentStep = step;
            
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
            
            personRow.querySelector('.person-number').textContent = affectedPersonCount;
            
            const removeBtn = personRow.querySelector('.remove-person-btn');
            removeBtn.addEventListener('click', function() {
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
        
        // Form submission
        document.getElementById('incidentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const schoolName = document.getElementById('schoolName').value;
            const schoolId = document.getElementById('schoolId').value;
            const district = document.getElementById('district').value;
            const reporterName = document.getElementById('reporterName').value;
            const reporterPosition = document.getElementById('reporterPosition').value;
            const contactNumber = document.getElementById('contactNumber').value;
            
            if (!schoolName || !schoolId || !district || !reporterName || !reporterPosition || !contactNumber) {
                alert('Please fill in all required fields in the School Information section.');
                return;
            }
            
            const submitBtn = document.querySelector('.btn-primary-custom[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
            submitBtn.disabled = true;
            
            const refId = 'DRRM-' + Date.now().toString().slice(-6) + 
                         Math.random().toString(36).substring(2, 5).toUpperCase();
            
            setTimeout(function() {
                document.getElementById('refId').textContent = refId;
                document.getElementById('successMessage').classList.remove('d-none');
                document.getElementById('errorMessage').classList.add('d-none');
                
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                document.getElementById('modalRefId').textContent = refId;
                document.getElementById('confirmationModal').style.display = 'flex';
                
                const formData = new FormData(document.getElementById('incidentForm'));
                const data = Object.fromEntries(formData);
                console.log('Incident Report Data:', data);
                console.log('Reference ID:', refId);
            }, 1500);
        });
        
        // Modal buttons
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('confirmationModal').style.display = 'none';
            resetForm();
        });
        
        document.getElementById('printReport').addEventListener('click', function() {
            alert('A printable report would be generated with Reference ID: ' + 
                  document.getElementById('modalRefId').textContent);
        });
        
        // Reset form function
        function resetForm() {
            document.getElementById('incidentForm').reset();
            
            incidentCategories.forEach(c => c.classList.remove('selected'));
            incidentCategoryInput.value = '';
            
            document.querySelectorAll('.incident-type').forEach(t => t.classList.remove('selected'));
            incidentTypeInput.value = '';
            
            document.querySelector('.severity-dot[data-severity="Medium"]').click();
            
            document.getElementById('affectedPersonsContainer').innerHTML = '';
            affectedPersonCount = 0;
            
            document.getElementById('successMessage').classList.add('d-none');
            document.getElementById('errorMessage').classList.add('d-none');
            
            navigateToStep(1);
            
            document.getElementById('incidentDate').valueAsDate = new Date();
            
            const now = new Date();
            const timeString = now.getHours().toString().padStart(2, '0') + ':' + 
                              now.getMinutes().toString().padStart(2, '0');
            document.getElementById('incidentTime').value = timeString;
        }