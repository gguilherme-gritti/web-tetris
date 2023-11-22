<!DOCTYPE html>
<html lang="pt-BR">
<?php
include '../../backend/valid_authentication.php';
?>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Tetris | Perfil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Globals -->
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/reset.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='perfil.css'>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- SWAL -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="../../js/utils.js"></script>
    <script src="./perfil.js"></script>

</head>

<body>
    <nav class="main-nav">
        <div class="row h-100">
            <div class="col-md-10 p-0">
                <ul class="navbar">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="../game/game.php">Jogar</a></li>
                    <li><a href="../ranking/ranking.php">Ranking</a></li>
                </ul>
            </div>
            <div class="col-md-2 off align-all-center">
                <a href="../../index.html">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container-sm perfil-container">
        <div class="perfil-content">
            <form id="updatePlayer">
                <h3>Meus dados cadastrais</h3>
                <div class="row">
                    <div class="col">
                        <label class="input-label">Meu Ranking</label>
                        <input id="myRanking" class="input-main w-100" type="text" disabled placeholder="1">
                    </div>
                    <div class="col">
                        <label class="input-label">Meu Recorde</label>
                        <input id="myHighScore" class="input-main w-100" type="text" disabled placeholder="2345">
                    </div>
                </div>
                <label class="input-label">Nome Completo</label>
                <input id="completeName" class="input-main" type="text" placeholder="Phineas & Ferb">

                <label class="input-label">Data de Nascimento</label>
                <input id="birthday" class="input-main" type="date">

                <label class="input-label">Usuário/Username</label>
                <input id="nickname" class="input-main" type="text" placeholder="KickButtowski">

                <label class="input-label">Senha</label>
                <input id="password" class="input-main" type="password" placeholder="***********">

                <label class="input-label">Confirmar Senha</label>
                <input id="confirmPassword" class="input-main" type="password" placeholder="***********">

                <label class="input-label">Sobre você:</label>
                <textarea id="aboutMe" class="input-main" rows="5"> </textarea>

                <button type="submit" class="standard-button mt-1">Atualizar Dados</button>
            </form>
        </div>

    </div>
</body>


</html>