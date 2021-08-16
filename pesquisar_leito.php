<?php
    @session_start();


    include 'cabecalho.php';

    include 'conexao.php';

    include 'acesso_restrito.php';

    include 'sql_consulta_leito.php';
?>

<?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>

<h11><i class="fa fa-list-ul"></i>Pesquisar Leitos</h11>
<span class="espaco_pequeno" style="width: 6px;" ></span>
<h27> <a href="home.php" style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27> 

<div class="div_br"> </div>     

<form method="Post">
    <div class="row-md">

    <div class="col-md-12">
         <label> Código do Leito: </label>
    </div>

        <div class="col-md-5 input-group">
            
            <input class="form-control input-group" type="text" id="id_cd_leito" name="cd_leito" placeholder="Digite o código do leito"> </input>
            <button type="submit" class="btn btn-primary" id="btn_pesquisar" style=""> <i class="fa fa-search" aria-hidden="true"></i></button>		
        </div>
    </div>


    
</form>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    if (@$_POST['cd_leito'] == '') {
				
        $_SESSION['msgerro'] = "Insira um valor válido.";
                        
        header('Location: pesquisar_leito.php');
    }else if(@$row_leito['count'] =  '0'){
        $_SESSION['msgerro'] = "Valor não encontrado.";
                        
        header('Location: pesquisar_leito.php');
    }else{
        $temp_v_valor = @$_POST['cd_leito'];						
    
        header('Location: pesquisar_leito.php?pagina=1&filtro=' . $temp_v_valor);	
    }
    
}

?>



        </br>
		
<?php
		
		echo "<div class='table-responsive col-md-12'>
              <table class='table table-striped' cellspacing='0' cellpadding='0'>" . "<thead><tr>"; 
				
		echo "<th class='align-middle' style='text-align: center;'> Código Leito</th>			  
		      <th class='align-middle' style='text-align: center;'> Descrição Leito</th>
              <th class='align-middle' style='text-align: center;'> Situação</th>
              <th class='align-middle' style='text-align: center;'> Opções</th>";
        

        while ($row_leito = oci_fetch_array($resulta_leito)) {
				$cd_leito = $row_leito['CD_LEITO'];		
            echo "</tr></thead>";		
            echo "<td style='text-align: center;'>" . $cd_leito . "<br>" . "</td>";
            echo "<td style='text-align: center;'>" . $row_leito['DS_LEITO'] . "<br>" . "</td>";
            if (strtoupper($row_leito['TP_SITUACAO']) == 'A') { echo "<td style='text-align: center;'>" . "<i style='color:green' class='fa fa-check' aria-hidden='true'></i>" . "<br>" . "</td>"; } 
			else { echo "<td style='text-align: center;'>" . "<i style='color:red' class='fa fa-times' aria-hidden='true'></i>" . "<br>" . "</td>"; }
            echo "<td style='text-align: center;'>" . "<a class='btn btn-primary' href='editar_leito.php?cd_leito=" . $cd_leito . "'>" . "<i class='fas fa-pen'></i>" . "</a> "; 		
 
         echo "</tr>";
        }

        echo "</table></div>";

        


?>



<?php 
    include 'rodape.php';
?>