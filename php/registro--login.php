<?php
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 0);
session_start();
include('conexao.php');

if (isset($_POST['cadastro'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $verificaEmail = $conexao->query("SELECT email FROM usuario WHERE email = '$email'");

    if ($verificaEmail->num_rows > 0) {
        echo "Email já cadastrado";
        header("location: /AEROELITE/paginas/login.html");
    }
    $inserir = $conexao->query("INSERT INTO usuario (email, senha)VALUES ('$email', '$senha')");
    header("location: /AEROELITE/paginas/index.html");
    exit();
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = $conexao->query("SELECT * FROM usuario WHERE email = '$email'");

    if ($query->num_rows > 0) {

        $usuario = $query->fetch_assoc();

        if ($usuario["senha"] === $senha) {

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['foto'] = $usuario['foto'];
            $_SESSION['usuario'] = $usuario;

            header("Location: ../paginas/perfil.php");
            exit();
        } 
        
        header("Location: ../paginas/login.html");
        exit();
    } 
    
    header("Location: ../paginas/registrar.html?err=email");
    exit();
}

?>