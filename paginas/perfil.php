<?php
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 0);
session_start();
include("../php/conexao.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.html");
}

$id = $_SESSION['id'];

$proximas = $conexao->query("SELECT * FROM voo WHERE id_cliente = $id AND checkin = 0");


$historico = $conexao->query("SELECT * FROM voo WHERE id_cliente = $id AND checkin = 1");
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
    <div class="conteudo">
      <section class="usuario">
        <img class="usuario__foto"src="../assents/<?php echo $_SESSION['foto'] ?: 'perfil.png'; ?>"alt="Foto de perfil">
        <h2 class="usuario__nome"><?php echo $_SESSION['nome']; ?></h2>
       <!-- <p class="usuario__status">Status: <strong>Gold</strong></p>
        <p class="usuario__milhas">Milhas acumuladas: <strong>52.340</strong></p>!-->
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
                <option value="Nopinar">Não opinar</option>
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



      <section class="viagens">

    <h2 class="titulo__secao">Próximas Viagens</h2>

    <?php if ($proximas->num_rows == 0): ?>
        <p class="aviso">Você ainda não possui viagens agendadas.</p>
    <?php else: ?>
        <?php while ($v = $proximas->fetch_assoc()): ?>
            <div class="cartao__viagem">

                <h3 class="rota"><?= $v['partida'] ?> → <?= $v['destino'] ?></h3>

                <p class="info"><strong>Data:</strong> <?= $v['data'] ?></p>
                <p class="info"><strong>Hora:</strong> <?= $v['hora'] ?></p>
                <p class="info"><strong>Nave:</strong> <?= $v['nave'] ?></p>

                <form action="../php/checking.php" method="POST">
                    <input type="hidden" name="id_voo" value="<?= $v['id_voo'] ?>">
                    <button class="btn__checkin">Fazer Check-in</button>
                </form>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>


    <h2 class="titulo__secao">Histórico de Viagens</h2>

    <?php if ($historico->num_rows == 0): ?>
        <p class="aviso">Nenhuma viagem finalizada ainda.</p>
    <?php else: ?>
        <?php while ($h = $historico->fetch_assoc()): ?>
            <div class="cartao__viagem historico">

                <h3 class="rota"><?= $h['partida'] ?> → <?= $h['destino'] ?></h3>

                <p class="info"><strong>Data:</strong> <?= $h['data'] ?></p>
                <p class="info"><strong>Hora:</strong> <?= $h['hora'] ?></p>
                <p class="info"><strong>Nave:</strong> <?= $h['nave'] ?></p>

                <span class="finalizado">✔ Check-in realizado</span>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</section>
</div>

    </main>
    <script src="../js/perfil.js"></script>
</body>
</html>
