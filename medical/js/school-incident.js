 // Global variables
        let currentStep = 1;
        
        // Set default date and time
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('incidentDate').valueAsDate = new Date();
            const now = new Date();
            const timeString = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
            document.getElementById('incidentTime').value = timeString;
            document.querySelector('.severity-dot[data-severity="Medium"]').click();
        });
        
        // Disaster type selection
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
                alert('Please select a school incident type.');
                return;
            }
            navigateToStep(2);
        });
        
        document.getElementById('nextToStep3').addEventListener('click', () => {
            if (!severityInput.value) {
                alert('Please select a severity level.');
                return;
            }
            navigateToStep(3);
        });
        
        document.getElementById('nextToStep4').addEventListener('click', () => navigateToStep(4));
        
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
        
        // Form submission
        document.getElementById('schoolIncidentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
            submitBtn.disabled = true;
            
            const refId = 'DRRM-SCH-' + Date.now().toString().slice(-6) + Math.random().toString(36).substring(2, 5).toUpperCase();
            
            setTimeout(() => {
                document.getElementById('refId').textContent = refId;
                document.getElementById('successMessage').classList.remove('d-none');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                document.getElementById('modalRefId').textContent = refId;
                document.getElementById('confirmationModal').style.display = 'flex';
                
                console.log('School Incident Report Data:', Object.fromEntries(new FormData(this)));
            }, 1500);
        });
        
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('confirmationModal').style.display = 'none';
            window.location.href = '../index.php';
        });
        
        document.getElementById('printReport').addEventListener('click', () => {
            alert('Printable report: ' + document.getElementById('modalRefId').textContent);
        });