<?php 


    @session_start();	

    //CABECALHO
    include 'conexao.php';

    //CABECALHO
    include 'cabecalho.php';

    //ACESSO RESTRITO
    include 'acesso_restrito.php';

?>

<div class="div_br"> </div>


        <?php 

            //echo 'Administrador: ' . $_SESSION['sn_admin'];
           // echo '</br> Importar Arquivos: ' . $_SESSION['sn_importar_arquivos'];
            //echo '</br> Cadastrar Pendencias: ' . $_SESSION['sn_pendencias_prontuario'];
            //echo '</br></br>';

        ?>

         <!--MENSAGENS-->
         <?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>

        <?php //echo $_SESSION['usuarioADM']; ?>

            <!--TITULO-->
            <h11><i class="fa fa-home" aria-hidden="true"></i> Home</h11>
        
        <div class="div_br"> </div>
            
        <!--<h12>Bem vindo Heitor Scalabrini Sampaio</h12>-->
    
        <div class="div_br"> </div>
            
        <!--BOTOES-->
        <a href="pesquisar_leito.php" class="botao_home" type="submit"><h21><i class="fas fa-edit"></i> Pesquisar Leito </h21></a></td></tr>
		<span class="espaco_pequeno"></span>
        </br>       

        </br>
        <!--TITULO-->
        <!--<h11><i class="fa fa-cogs" aria-hidden="true"></i> Administrativo</h11>
        -->
        <div class="div_br"> </div>

        <!--BOTOES ADM-->
        <!--<a href="#" class="botao_home_adm" type="submit"><h21><i class="fa fa-question-circle-o" aria-hidden="true"></i> Botão 1 </h21></a></td></tr>
        -->
        </br>
        </br>

<?php
    //RODAPE
    include 'rodape.php';
?>
