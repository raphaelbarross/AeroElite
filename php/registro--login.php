<?php
include('conexao.php');

if (isset($_POST['cadastro'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $verificaEmail = $conexao->query("SELECT email FROM usuario WHERE email = '$email'");

    if ($verificaEmail->num_rows > 0) {
        echo "Email já cadastrado";
    } else {
        $conexao->query("INSERT INTO usuario(email, senha) VALUES ('$email', '$senha_hash')");
        header("location: /AEROELITE/paginas/index.html");
    }
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $verificaEmail = $conexao->query("SELECT senha FROM usuario WHERE email = '$email'");

    if ($verificaEmail->num_rows > 0) {
        $usuario = $verificaEmail->fetch_assoc();
        $senha_hash_armazenada = $usuario["senha"];

        if (password_verify($senha, $senha_hash_armazenada)) {
            header("location: /AEROELITE/paginas/index.html");
        } else {
            header("location: /AEROELITE/paginas/login.html");
        }
    } else {
        header("location: /AEROELITE/paginas/registrar.html");
    }
    exit();
}
?>