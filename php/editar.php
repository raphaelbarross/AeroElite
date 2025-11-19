<?php
session_start();
include "conexao.php";

if (!isset($_SESSION['id'])) {
    die("Erro: usuário não logado.");
}

$id = $_SESSION['id'];

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$tel = $_POST['telefone'];
$nasc = $_POST['nascimento'];

if (!empty($_FILES['foto']['name'])) {

    $foto = time() . "_" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "../assents/" . $foto);

    $conexao->query("UPDATE usuario SET foto='$foto' WHERE id=$id");
}

$query = "
UPDATE usuarios SET 
    nome='$nome',
    genero='$genero',
    telefone='$tel',
    data_nasc='$nasc'
WHERE id=$id
";

if ($conexao->query($query)) {
    header("Location: ../paginas/perfil.php?edit=ok");
    exit;
} else {
    echo "Erro SQL: " . $conexao->error;
}
?>