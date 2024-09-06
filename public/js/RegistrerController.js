// public/js/form-controller.js

let currentStep = 1;

function showStep(step) {
    document.querySelectorAll('.form-step').forEach((element, index) => {
        if (index + 1 === step) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    });
}

function nextStep() {
    if (currentStep < 3) {
        currentStep++;
        showStep(currentStep);
    }
}

function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}

// Mostrar el primer paso al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    showStep(currentStep);
});
