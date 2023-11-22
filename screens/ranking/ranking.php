<!DOCTYPE html>
<html lang="pt-BR">

<?php
include '../../backend/valid_authentication.php';
include '../../backend/get_ranking.php';
?>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Tetris | Ranking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Globals -->
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/reset.css'>

    <link rel='stylesheet' type='text/css' media='screen' href='ranking.css'>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- SWAL -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="main-nav">
        <div class="row h-100">
            <div class="col-md-10 p-0">
                <ul class="navbar">
                    <li><a href="../perfil/perfil.php">Perfil</a></li>
                    <li><a href="../game/game.php">Jogar</a></li>
                    <li><a href="#">Ranking</a></li>
                </ul>
            </div>
            <div class="col-md-2 off align-all-center">
                <a href="../../index.html">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container-sm ranking-container">
        <div class="ranking-content">
            <div class="row ranking-title">
                <div class="col-sm-4 h-100 align-all-center">
                    <img src="../../assets/img/ranking-icon.png" alt="Logo Tetris">
                </div>
                <div class="col-sm-8 align-all-center h-100">
                    <h2>Ranking de Jogadores</h2>
                </div>
            </div>
            <div class="row ranking-body ">
                <div class="col-sm-4 ranking-number">
                    <h3>Ranking</h3>
                    <?php foreach ($topRankingArray as $rk) { ?>
                        <h2><?= $rk["rank"] ?></h2>
                    <?php } ?>
                </div>
                <div class="col-sm-8 ranking-players mt">
                    <?php foreach ($topRankingArray as $rk) { ?>
                        <div class="ranking-card">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            <p><?= $rk["nickname"] ?> : <?= $rk["score"] ?> </p>
                        </div>
                    <?php } ?>
                    <h3> <?= (count($topRankingArray)) == 0 ? 'Sem histórico de pontuação' : '' ?></h3>

                </div>
            </div>
        </div>

    </div>
</body>


</html>