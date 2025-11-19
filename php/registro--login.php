<?php
include('conexao.php');

if (isset($_POST['cadastro'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $verificaEmail = $conexao->query("SELECT email FROM usuario WHERE email = '$email'");

    if ($verificaEmail->num_rows > 0) {
        echo "Email já cadastrado";
        header("location: /AEROELITE/paginas/login.html");
    }
    exit();
}

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $senha = $_POST['senha'];

   $verificaEmail = $conexao->query("SELECT * FROM usuario WHERE email = '$email'");

   if ($verificaEmail->num_rows > 0) {
      $usuario = $verificaEmail->fetch_assoc();

      if ($usuario["senha"] === $senha) {
         header("location: ../paginas/index.html");
      } else {
         header("location: ../paginas/login.html");
      }
   } else {
      header("location: ../paginas/registrar.html");
   }
   exit();
}

?>

