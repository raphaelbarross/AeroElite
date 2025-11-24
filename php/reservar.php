<?php
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 0);
session_start();
include('conexao.php');


if (!isset($_SESSION['id'])) {
    header("Location: ../paginas/login.html");
    exit;
}

$id_cliente = $_SESSION['id'];

$partida = $_POST['partida'];
$destino = $_POST['destino'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$nave = $_POST['nave'];


$sql = "INSERT INTO voo (id_cliente, partida, destino, data, hora, nave)VALUES ('$id_cliente', '$partida', '$destino', '$data', '$hora', '$nave')";

if ($conexao->query($sql) === TRUE) {
    header("Location: ../paginas/perfil.php");
    exit;
} else {
    echo "Erro ao reservar voo: " . $conexao->error;
}
?>
