<?php
session_start();

if (!isset($_SESSION['id'])) {
    die("Usuário não logado.");
}

$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head> <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AeroElite</title>
<link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
  <section class="inicio">
    <header>
     <div class="borda">
      <div class="left">
        <a href="index.html"><img class="logo" src="../assents/logo.png" alt="AeroElite"></a>
        <h3>AeroElite</h3>
        </div>
        <nav class="nav-links"> 
          <a href="frota.html">Frota</a>
          <a href="servicos.html">Serviços</a>
          <a href="sobre.html">Sobre</a>
          <a href="contato.html">Contato</a>
          <a class="reserva" href="reserva.html">Reserve Já</a>
          <a href="perfil.php"><img class="perfil" src="../assents/perfil.png" alt="perfil"></a>
        </nav>
      </div>
    </header>

    <main>
      <section class="usuario">
        <img class="usuario__foto"src="../assents/<?php echo $_SESSION['foto'] ?: 'perfil.png'; ?>"alt="Foto de perfil">
        <h2 class="usuario__nome"><?php echo $_SESSION['nome']; ?></h2>
        <p class="usuario__status">Status: <strong>Gold</strong></p>
        <p class="usuario__milhas">Milhas acumuladas: <strong>52.340</strong></p>
        <button id="botao__Editar" class="usuario__botao">Editar Perfil</button>
      </section>

      <div id="modal__Editar" class="modal">

    <div class="modal__info">
        <span class="close">&times;</span>

        <h2>Editar Perfil</h2>

        <form action="../php/editar.php" method="POST"enctype="multipart/form-data">

            <label>Nome:</label>
            <input type="text" name="nome" required placeholder="Nome: ">

            <label>Gênero:</label>
            <select name="genero" required>
                <option value="Masculino" >Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Nbinario">GLS</option>
            </select>

            <label>Telefone:</label>
            <input type="tel" name="telefone" required placeholder="celular">

            <label>Data de nascimento:</label>
            <input type="date" name="nascimento" required>

            <label>Foto de perfil:</label>
            <input type="file" name="foto">

            <button type="submit" name="btn__salvar" class="btn-salvar">Salvar Alterações</button>
        </form>
    </div>

</div>

<script src="../js/perfil.js"></script>

      <section class="viagens">  </section>

    </main>
</body>
</html>
