<?php 

session_start();
include 'cabecalho.php';

include 'conexao.php';

include 'acesso_restrito.php';




?>
<?php
            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        ?>


<?php
$_SESSION['cd_leito'] = filter_input(INPUT_GET, 'cd_leito', FILTER_SANITIZE_NUMBER_INT);

include 'sql_editar_leito.php';
?>

<h11><i class="fas fa-pen"></i> Editar Leito</h11>
<span class="espaco_pequeno" style="width: 6px;" ></span>
<h27> <a href='pesquisar_leito.php' style="color: #444444; text-decoration: none;"> <i class="fa fa-reply" aria-hidden="true"></i> Voltar </a> </h27> 

<div class="div_br"> </div>

<form autocomplete="off"  method="post" action = "prc_editar_leito.php"> 
    <div class="row">
        <div class="col-md-3">
            Código do leito:
            <input type="tetx" class="form-control" value="<?php echo @$_SESSION['cd_leito'];?>" disabled>
        </div>

        <div class="col-md-4">
            Tipo  acomodação:
            <?php 

                //CLASSE BOTAO
                $classe_botao = 'fas fa-search';

                //PLACEHOLDER BOTAO
               
                $placeholder_botao= $row_acom['DS_TIP_ACOM'];
              

                //CONSULTA_LISTA
                $consulta_lista_acom = "SELECT DISTINCT acom.*
                                FROM leito lei
                                INNER JOIN tip_acom acom
                                    ON acom.CD_TIP_ACOM = lei.CD_TIP_ACOM
                                ";

                $result_lista_acom = oci_parse($conn_ora, $consulta_lista_acom);																									

                //EXECUTANDO A CONSULTA SQL (ORACLE)
                oci_execute($result_lista_acom);            

            ?>

            <script>

                //LISTA
                var countries_acom = [     
                    <?php
                        while($row_lista_acom = oci_fetch_array($result_lista_acom)){	
                            echo '"'. $row_lista_acom['DS_TIP_ACOM'] .'"'.',';                
                        }
                    ?>
                ];

            </script>

            <div class="input-group col-12" style="padding: 0 !important;">
                <input id="input_valor_acom" name="input_valor_acom" type="text" class="form-control" 
                    value="<?php echo $placeholder_botao;?>">
            </div>

            <?php
                //AUTOCOMPLETE
                include 'autocomplete_acom.php';

            ?>
                                    
            <!--FIM CAIXA AUTOCOMPLETE-->   
        </div>

        <div class="col-md-4">
            Unidade de Internação:
            <?php 

                //CLASSE BOTAO
                $classe_botao = 'fas fa-search';

                //PLACEHOLDER BOTAO
                    $placeholder_botao_uni= trim($row_uni_int['DS_UNID_INT']);
                

                //CONSULTA_LISTA
                $consulta_lista_uni = "SELECT DISTINCT uni.*
                                FROM leito lei
                                INNER JOIN unid_int uni
                                    ON uni.CD_UNID_INT = lei.CD_UNID_INT
                                ";

                $result_lista_uni = oci_parse($conn_ora, $consulta_lista_uni);																									

                //EXECUTANDO A CONSULTA SQL (ORACLE)
                oci_execute($result_lista_uni);            

            ?>

            <script>

                //LISTA
                var countries_uni = [     
                    <?php
                        while($row_lista_uni = oci_fetch_array($result_lista_uni)){	
                            echo '"'. $row_lista_uni['DS_UNID_INT'] .'"'.',';                
                        }
                    ?>
                ];

            </script>

            <div class="input-group col-12" style="padding: 0 !important;">
                <input id="input_valor_uni_int" name="input_valor_uni_int" type="text" class="form-control" 
                    value="<?php echo $placeholder_botao_uni;?>" onkeypress="return ApenasLetras(event,this)" >
            </div>

            <?php
                //AUTOCOMPLETE
                include 'autocomplete_uni_int.php';

            ?>
                                    
            <!--FIM CAIXA AUTOCOMPLETE-->  
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            Descrição enfermaria:
            <input class="form-control" type="text" id="id_ds_enfermaria" name="ds_enfermaria" value="<?php echo $row_edit_leito['DS_ENFERMARIA'];?>"></input>
        </div>
        <div class="col-md-3">
            Descrição leito:
            <input class="form-control" type="text" id="id_ds_leito" name="ds_leito" value="<?php echo $row_edit_leito['DS_LEITO'];?>"></input>
        </div>
        <div class="col-md-3">
            Descrição copa:
            <?php 

                //CLASSE BOTAO
                $classe_botao = 'fas fa-search';

                //PLACEHOLDER BOTAO
                    $placeholder_botao_copa= $row_copa['DS_COPA'];
                

                //CONSULTA_LISTA
                $consulta_lista_copa = "SELECT DISTINCT cp.*
                                        FROM leito lei
                                        INNER JOIN copa cp
                                            ON cp.CD_COPA = lei.CD_COPA
                                ";

                $result_lista_copa = oci_parse($conn_ora, $consulta_lista_copa);																									

                //EXECUTANDO A CONSULTA SQL (ORACLE)
                oci_execute($result_lista_copa);            

            ?>

            <script>

                //LISTA
                var countries_copa = [     
                    <?php
                        while($row_lista_copa = oci_fetch_array($result_lista_copa)){	
                            echo '"'. $row_lista_copa['DS_COPA'] .'"'.',';                
                        }
                    ?>
                ];

            </script>

            <div class="input-group col-12" style="padding: 0 !important;">
                <input id="input_valor_copa" name="input_valor_copa" type="text" class="form-control" 
                    value="<?php echo $placeholder_botao_copa;?>">
            </div>

            <?php
                //AUTOCOMPLETE
                include 'autocomplete_copa.php';

            ?>
                                    
            <!--FIM CAIXA AUTOCOMPLETE-->
        </div>
        <div class="col-md-3">
        Tipo de acomodação SUS:
            <?php
            //CLASSE BOTAO
                $classe_botao = 'fas fa-search';

                //PLACEHOLDER BOTAO
                    $placeholder_botao_sus= @$row_sus['DS_TIP_ACOM_UTI_SUS'];
                

                //CONSULTA_LISTA
                $consulta_lista_sus = "SELECT DISTINCT sus.*
                                     from tip_acom_uti_sus sus

                                ";

                $result_lista_sus = oci_parse($conn_ora, $consulta_lista_sus);																									

                //EXECUTANDO A CONSULTA SQL (ORACLE)
                oci_execute($result_lista_sus);            

            ?>

            <script>

                //LISTA
                var countries_sus = [     
                    <?php
                        while($row_lista_sus = oci_fetch_array($result_lista_sus)){	
                            echo '"'. $row_lista_sus['DS_TIP_ACOM_UTI_SUS'] .'"'.',';                
                        }
                    ?>
                ];

            </script>

            <div class="input-group col-12" style="padding: 0 !important;">
                <input id="input_valor_sus" name="input_valor_sus" type="text" class="form-control" 
                    value="<?php echo $placeholder_botao_sus;?>">
            </div>

            <?php
                //AUTOCOMPLETE
                include 'autocomplete_sus.php';

            ?>
                                    
            <!--FIM CAIXA AUTOCOMPLETE--> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Extra:
            </br>
            <?php 
            if($SN_EXTRA == 'S'){
                ?>
                <input type="checkbox" id="id_extra" name="extra" value="on" checked></input>
            <?php
            }else{ ?>
                <input type="checkbox" id="id_extra" name="extra" value="off"></input>
           <?php }        

        ?>
        </div>
        <div class="col-md-2">
        </br>
            Ativo:
           <?php 
            if($TP_SITUACAO == 'A'){
                ?>
                <input type="checkbox" id="id_ativo" name="ativo" value="on" checked></input>
            <?php
            }else{ ?>
                <input type="checkbox" id="id_ativo" name="ativo" value="off"></input>
           <?php }        

        ?>
            
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-md-2">
            </br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button> 
        </div>
    </div>
</form>

<?php 

include 'rodape.php';

?>