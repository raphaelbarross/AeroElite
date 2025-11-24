<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../paginas/login.html");
    exit;
}

include("conexao.php");

$id_voo = $_POST['id_voo'];


$conexao->query("UPDATE voo SET checkin = 1 WHERE id_voo = $id_voo");


header("Location: ../paginas/perfil.php");
exit;
?>
