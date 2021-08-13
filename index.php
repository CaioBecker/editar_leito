<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo/icone_santa_casa_sjc_colorido.png">
    <title>Editar Leitos</title>
    <!--SESSION-->
    <?php 
        session_start();
    ?>
    <!--CSS-->
    <?php 
        include 'css/style.php';
        include 'css/style_mobile.php';
    ?>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome --> 
    <script src="https://kit.fontawesome.com/a3000fd09d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <header> 
    </header>
    
    <main>

        <div class="conteudo_login" style="min-height: 100vh; height: 100vh;">
            <div class="container" style="position: relative; top: 50%; transform: translateY(-50%); ">

                <!--TELA LOGIN -->

                <div class="row justify-content-center " style="" >
                    <div class="col-10" style="border-bottom: 1px solid #e7e7e7; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                        
                        <h14>Editar Leitos</h14>

                    </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-md-5 col-lg-5 d-none d-md-block" style="border-right: 1px solid #e7e7e7; border-bottom-left-radius: 5px;">

                        <img class="img_redimensionada" src="img/logo_santa_casa_sjc.gif" />

                    </div>
                    <div class="col-10 col-sm-10 col-md-5 col-lg-5 col-xl-5" style="text-align: left; border-bottom-right-radius: 5px;">
                        <form method="POST" action="valida_login.php">
                            <div class="form-group">

                                <!--TITULO-->
                                <div class="centralizar">
                                    <h13><i class="fa fa-user-o" aria-hidden="true"></i> Acesso</h13>
                                </div>

                                <div class="div_br"> </div>

                                <label for="login"><h12>Login:</h12></label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="form-group">
                                <label for="senha"><h12>Senha:</h12></label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <button type="submit" class="botao_home" style="padding-top: 14px; padding-bottom: 14px;"> <i class="fa fa-key" aria-hidden="true"></i> Acessar</button>
                        </form>
                        <!--MENSAGENS-->
                        <?php
                            include 'js/mensagens.php';
                            include 'js/mensagens_usuario.php';
                        ?>

                    </div>
                </div>         

            </div> <!-- FIM CLASS CONTEUDO -->
        </div> <!-- FIM CLASS CONTAINER -->


    </main>

    <!--RODAPE -->
    <footer>
    </footer>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

     <!-- Bootstrap JAVASCRIPT -->  
     <script src="bootstrap/js/bootstrap.min.js"></script> 

    <!--JAVASCRIPTS-->
    <script src="js/scripts.js"></script>  
   
    <!-- Paralax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>

</body>
</html>