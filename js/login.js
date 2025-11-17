document.addEventListener('DOMContentLoaded', function() {
    // 1. Variáveis para acesso aos elementos
    const form = document.getElementById('loginForm');
    const senhaInput = document.getElementById('senhaInput');
    const toggleSenha = document.getElementById('toggleSenha');
    const emailInput = document.getElementById('emailInput');

    // --- Funcionalidade 1: Mostrar/Esconder Senha ---
    if (toggleSenha) {
        toggleSenha.addEventListener('click', function () {
            // Alterna o atributo 'type' entre 'password' e 'text'
            const type = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
            senhaInput.setAttribute('type', type);
            
            // Alterna o ícone (olho fechado/aberto)
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    // --- Funcionalidade 2: Validação Básica no Submit ---
    if (form) {
        form.addEventListener('submit', function (event) {
            // Verifica se o campo Email está vazio
            if (!emailInput.value.trim()) {
                event.preventDefault(); // Impede o envio do formulário
                alert('Por favor, preencha o campo Email.');
                emailInput.focus();
                return;
            }

            // Verifica se o campo Senha está vazio
            if (!senhaInput.value.trim()) {
                event.preventDefault(); // Impede o envio do formulário
                alert('Por favor, preencha o campo Senha.');
                senhaInput.focus();
                return;
            }
            
            // Se tudo estiver preenchido, o formulário será enviado
            // (Você pode adicionar validações mais complexas aqui, se precisar)
        });
    }

});