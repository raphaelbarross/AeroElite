<?php
include('conexao.php');
session_start();
$usuario_id = $_SESSION['id'];

$select = $conexao ->query("SELECT * FROM 'usuario' WHERE id = '$usuario_id'");
if ($select->num_rows > 0){
    $buscar = mysqli_fetch_assoc($select);
}
if($buscar['foto'] == ''){
    echo '<img src="../assents/perfil.png">';
}else{
    echo '<img src="../assents/novaFoto/'.$buscar[foto].'">'; 
}
?>