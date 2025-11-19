document.addEventListener('DOMContentLoaded', function() {
    
    const form = document.getElementById('registroForm');
    const senhaInput = document.getElementById('senhaInput');
    const confirmaSenhaInput = document.getElementById('confirmaSenhaInput');
    const senhaErro = document.getElementById('senhaErro');

    function setupPasswordToggle(toggleId, inputId) {
        const toggleIcon = document.getElementById(toggleId);
        const inputField = document.getElementById(inputId);

        if (toggleIcon && inputField) {
            toggleIcon.addEventListener('click', function () {
                const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                inputField.setAttribute('type', type);
                
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    }

    setupPasswordToggle('toggleSenha1', 'senhaInput');
    setupPasswordToggle('toggleSenha2', 'confirmaSenhaInput');


    function checarSenhas() {
        if (senhaInput.value !== confirmaSenhaInput.value) {
            senhaErro.textContent = "As senhas não coincidem!";
            senhaErro.style.color = 'red';
            confirmaSenhaInput.setCustomValidity("Senhas diferentes");
        } else {
            senhaErro.textContent = "";
            confirmaSenhaInput.setCustomValidity("");
        }
    }

    if (senhaInput && confirmaSenhaInput) {
        senhaInput.addEventListener('input', checarSenhas);
        confirmaSenhaInput.addEventListener('input', checarSenhas);
    }


    if (form) {
        form.addEventListener('submit', function (event) {
            checarSenhas(); 

            if (senhaInput.value !== confirmaSenhaInput.value) {
                event.preventDefault();
                alert('Erro: Por favor, corrija os campos de senha antes de prosseguir.');
                confirmaSenhaInput.focus();
            }
        });
    }
});