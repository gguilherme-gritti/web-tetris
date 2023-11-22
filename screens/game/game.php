<html>
<?php
include '../../backend/valid_authentication.php';
?>

<head>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel='stylesheet' type='text/css' media='screen' href='game.css'>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- SWAL -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Globals -->
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/reset.css'>
    <script src="../../js/utils.js"></script>

</head>

<body>
    <nav class="main-nav">
        <div class="row h-100">
            <div class="col-md-10 p-0">
                <ul class="navbar">
                    <li><a href="../perfil/perfil.php">Perfil</a></li>
                    <li><a href="#">Jogar</a></li>
                    <li><a href="../ranking/ranking.php">Ranking</a></li>
                </ul>
            </div>
            <div class="col-md-2 off align-all-center">
                <a href="../../backend/logout.php">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container-sm game-container">
        <div class="game-content w-100">
            <div class="game-nav">
                <div class="row p-4 h-100">
                    <div class="col-sm-4 align-all-center flex-column">
                        <h3>Pontuacao</h3>
                        <p id="score">0</p>
                    </div>
                    <div class="col align-all-center flex-column">
                        <button id="playbutton" class="standard-button w-100" data-bs-toggle="modal" data-bs-target="#tabGame">Iniciar</button>
                        <p id="timer">00:00:00</p>
                    </div>
                    <div class="col-sm-4 align-all-center flex-column">
                        <h3>Linhas</h3>
                        <p id="lines">0</p>
                    </div>
                </div>
            </div>
            <div class="align-all-center">
                <div id="wrapper">
                    <div id="game-container">
                        <img src="../../assets/game/background.png" id="background">
                        <canvas id="game-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE TABULEIRO -->
    <div class="modal fade" id="tabGame" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Escolha do Tabuleiro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-4">
                        <button class="standard-button " data-bs-dismiss="modal" onclick="playButtonClicked()"> 10 x
                            20</button>
                    </div>
                    <div class="row p-4">
                        <button class="standard-button " data-bs-dismiss="modal" onclick="playButtonClicked(true)"> 22 x
                            44</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="outlined-button border" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/tetris.js"></script>
    <script src="../../js/controller.js"></script>
    <script src="../../js/render.js"></script>
    <script src="../../js/timer.js"></script>
</body>

</html>