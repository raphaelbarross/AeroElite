<?php
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 0);
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
}

$id = $_SESSION['id'];

include('../php/conexao.php');

$sql = $conexao->query("SELECT * FROM usuario WHERE id = $id");
$usuario = $sql->fetch_assoc();

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$tel = $_POST['telefone'];
$nasc = $_POST['nascimento'];

if (!empty($_FILES['foto']['name'])) {

    $foto = time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../assents/" . $foto);
    
    $conexao->query("UPDATE usuario SET foto='$foto' WHERE id=$id");
    $_SESSION['foto'] = $foto;
}

$conexao->query("UPDATE usuario SET nome='$nome',genero='$genero',telefone='$tel',data_nasc='$nasc'WHERE id=$id");

$_SESSION['nome'] = $nome;

header("Location: ../paginas/perfil.php");
?>