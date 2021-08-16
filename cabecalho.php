
<?php
    //PHP GERAL

    //PAGINA ATUAL
    $_SESSION['pagina_acesso'] = substr($_SERVER["PHP_SELF"],1,30);

    //CORRIGE PROBLEMAS DE HEADER (LIMPAR O BUFFER)
    ob_start();

    //VARIAVEIS NOME
    @$nome = @$_SESSION['usuarioLogin'];
    @$pri_nome = substr(@$nome, 0, strpos(@$nome, ' '));

    //ACESSO RESTRITO
    //include 'acesso_restrito.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo/icone_santa_casa_sjc_colorido.png">
    <title>Leitos</title>
    <!--CSS-->
    <?php 
        include 'css/style.php';
        include 'css/style_mobile.php';
    ?>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a3000fd09d.js" crossorigin="anonymous"></script>
    <!--GRAFICOS CHART JS-->  
    <script src="js/Chart.js-2.9.4/dist/Chart.js"></script>
</head>
<body>
    <header>    

        <nav class="navbar navbar-expand-md navbar-dark bg-color">
            <a class="navbar-brand" href="home.php">
                <img src="img/logo/icone_santa_casa_sjc_branco.png" height="28px" width="28px" class="d-inline-block align-top" alt="Santa Casa de São José dos Campos">
                <h10>Leitos</h10>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExample06">
                <ul class="navbar-nav">          
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                </li>
                <div class="menu_azul_claro">
                    <li class="nav-item">
                        <h10><a class="nav-link" href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Faq</a></h10>
                    </li>
                </div>
                <div class="menu_preto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i> Menu</a></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown06">

                            <!--Menu
                            <a class="dropdown-item" style="background-color: #f5f5f5;" href="javascript:void(0)" ><i class="fas fa-pills"></i> Medicamentos</a>-->

							<a class="dropdown-item" href="home.php"><i class="fas fa-home"></i> Home</a>
                            <a class="dropdown-item" href="pesquisar_leito.php"><i class="fas fa-search"></i> Pesquisar Leito</a>

        <div class="div_br"> </div>

                        </div>
                </div>
                </li>
                <div class="menu_perfil">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $pri_nome ?></a></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown06">
                        <a class="dropdown-item" href="sair.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                        </div>
                    </li>
                <div class="menu_vermelho">
                </ul>
            </div>
        </nav>

    <!--DIRETORIO-->
    <!--<div class="diretorio">
        <a class="diretorio_link" href="index.php"> 
            <i class="fa fa-home" aria-hidden="true"></i> Home 
        </a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <a class="diretorio_link" href="#"> 
            <?php 
            //$nome_pagina = str_replace('_',' ',$_SERVER['PHP_SELF']);
            //echo ucwords(substr(basename($nome_pagina),0,-4)); ?>
        </a>
    </div>-->

    </header>
    
    <main>

        <div class="conteudo">
            <div class="container">