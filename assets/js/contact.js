// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.needs-validation');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    }

    // Add animation to form inputs
    const formInputs = document.querySelectorAll('.form-control, .form-select');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.closest('.mb-3').style.transform = 'translateX(5px)';
            this.style.transition = 'all 0.3s ease';
            this.style.borderColor = 'var(--primary)';
        });

        input.addEventListener('blur', function() {
            this.closest('.mb-3').style.transform = 'translateX(0)';
            if (!this.value) {
                this.style.borderColor = '';
            }
        });
    });

    // Add smooth scroll for quick links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
