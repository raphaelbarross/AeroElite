document.addEventListener('DOMContentLoaded', function() {
    
    const form = document.getElementById('registroForm');
    const senhaInput = document.getElementById('senhaInput');
    const confirmaSenhaInput = document.getElementById('confirmaSenhaInput');
    const senhaErro = document.getElementById('senhaErro');

    // Funções para Mostrar/Esconder Senha
    function setupPasswordToggle(toggleId, inputId) {
        const toggleIcon = document.getElementById(toggleId);
        const inputField = document.getElementById(inputId);

        if (toggleIcon && inputField) {
            toggleIcon.addEventListener('click', function () {
                // Alterna o atributo 'type' entre 'password' e 'text'
                const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                inputField.setAttribute('type', type);
                
                // Alterna o ícone (olho fechado/aberto)
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    }

    // Aplica o toggle de senha para os dois campos
    setupPasswordToggle('toggleSenha1', 'senhaInput');
    setupPasswordToggle('toggleSenha2', 'confirmaSenhaInput');


    // --- Validação 1: Comparação de Senhas ao digitar ---
    
    // Verifica a comparação sempre que a Senha ou a Confirma Senha muda
    function checarSenhas() {
        if (senhaInput.value !== confirmaSenhaInput.value) {
            senhaErro.textContent = "As senhas não coincidem!";
            senhaErro.style.color = 'red';
            confirmaSenhaInput.setCustomValidity("Senhas diferentes"); // Bloqueia o submit HTML5
        } else {
            senhaErro.textContent = "";
            confirmaSenhaInput.setCustomValidity(""); // Libera o submit HTML5
        }
    }

    // Adiciona o listener para checar imediatamente
    if (senhaInput && confirmaSenhaInput) {
        senhaInput.addEventListener('input', checarSenhas);
        confirmaSenhaInput.addEventListener('input', checarSenhas);
    }


    // --- Validação 2: Prevenção de Envio (Confirmação Final) ---
    if (form) {
        form.addEventListener('submit', function (event) {
            // Garante que a checagem final seja feita antes de enviar
            checarSenhas(); 

            if (senhaInput.value !== confirmaSenhaInput.value) {
                event.preventDefault(); // Impede o envio se as senhas não coincidirem
                alert('Erro: Por favor, corrija os campos de senha antes de prosseguir.');
                confirmaSenhaInput.focus();
            }
            // Se as senhas baterem, o formulário será enviado normalmente
        });
    }
});