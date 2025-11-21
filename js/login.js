document.addEventListener('DOMContentLoaded', function() {
    
    const form = document.getElementById('loginForm');
    const senhaInput = document.getElementById('senhaInput');
    const toggleSenha = document.getElementById('toggleSenha');
    const emailInput = document.getElementById('emailInput');

    
    if (toggleSenha) {
        toggleSenha.addEventListener('click', function () {
            
            const type = senhaInput.getAttribute('type') === 'password' ? 'text' : 'password';
            senhaInput.setAttribute('type', type);
            
            
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    
    if (form) {
        form.addEventListener('submit', function (event) {
            
            if (!emailInput.value.trim()) {
                event.preventDefault(); 
                alert('Por favor, preencha o campo Email.');
                emailInput.focus();
                return;
            }

            
            if (!senhaInput.value.trim()) {
                event.preventDefault(); 
                alert('Por favor, preencha o campo Senha.');
                senhaInput.focus();
                return;
            }
            
           
        });
    }

});