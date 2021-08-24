<?php

            include 'js/mensagens.php';
            include 'js/mensagens_usuario.php';
        
@session_start();

include 'conexao.php';


$v_valor_antigo = $_SESSION['CD_LEITO'];
$TIP_ACOM_antigo = $_SESSION['TIP_ACOM_ANT'];
$UNID_INT_antigo = $_SESSION['UNID_INT_ANT'];
$DS_ENFERMARIA_antigo = $_SESSION['DS_ENFERMAGEM_ANT'];
$DS_LEITO_antigo = $_SESSION['DS_LEITO_ANT'];
$TP_SEXO_antigo = $_SESSION['TP_SEXO_ANT'];
$TP_OCUPACAO_antigo = $_SESSION['TP_OCUPACAO_ANT'];
$TP_SITUACAO_antigo = $_SESSION['TP_SITUACAO_ANT'];
$DS_RESUMO_antigo = $_SESSION['DS_RESUMO_ANT'];
$CD_LEITO_AIH_antigo = $_SESSION['CD_LEITO_AIH_ANT'];
$CD_COPA_antigo = $_SESSION['CD_COPA_ANT'];
$SN_EXTRA_antigo = $_SESSION['SN_EXTRA_ANT'];
$SN_ALTA_MEDICA_antigo = $_SESSION['SN_ALTA_MEDICA_ANT'];
$DT_ATIVACAO_antigo = $_SESSION['DT_ATIVACAO_ANT'];
$DT_DESATIVACAO_antigo = $_SESSION['DT_DESATIVACAO_ANT'];
$CD_TIP_ACOM_UTI_SUS_antigo = $_SESSION['CD_TIP_ACOM_UTI_SUS_ANT'];
$NR_RAMAL_antigo = $_SESSION['NR_RAMAL_ANT'];
$CD_LEITO_INTEGRA_antigo = $_SESSION['CD_LEITO_INTEGRA_ANT'];
$CD_SEQ_INTEGRA_antigo = $_SESSION['CD_SEQ_INTEGRA_ANT'];
$DT_INTEGRA_antigo = $_SESSION['DT_INTEGRA_ANT'];
$CD_LEITO_PAI_antigo = $_SESSION['CD_LEITO_PAI_ANT'];
$usu_antigo = $_SESSION['usuarioLogin'];


$codigo = 'editar_leito.php?cd_leito='.$_SESSION['cd_leito'];


//VALIDA CD TIP ACOM/////////////////////////////////////////


$TIP_ACOM = $_POST['input_valor_acom'];

$consulta_acom = "SELECT DISTINCT acom.*
                    FROM leito lei
                    INNER JOIN tip_acom acom
                        ON acom.CD_TIP_ACOM = lei.CD_TIP_ACOM
                    WHERE acom.DS_TIP_ACOM = '$TIP_ACOM'";
echo '</br> consulta acom: </br>' . $consulta_acom;
$resulta_acom = ociparse($conn_ora,$consulta_acom);
oci_execute($resulta_acom);
$row_acom = oci_fetch_array($resulta_acom);

@$CD_TIP_ACOM_if = @$row_acom['CD_TIP_ACOM'];
echo '</br> Tip acom: </br>' . $CD_TIP_ACOM_if;
if($CD_TIP_ACOM_if == '' || $CD_TIP_ACOM_if == NULL){
    $CD_TIP_ACOM_novo = $TIP_ACOM_antigo;
    echo '</br> Tip acom novo errado:</br>' . $CD_TIP_ACOM_novo;																						
    $_SESSION['msgerro'] = 'Tipo  de acomodação não existe! ';
    header('location: '.$codigo);
    return 0;
}else{
    $CD_TIP_ACOM_novo = $CD_TIP_ACOM_if;
    echo '</br> Tip acom novo: </br>' . $CD_TIP_ACOM_novo;
}

///////////////////////////////////////////////////////////////

//VALIDA CD_UNID_INT//////////////////////////////////////////

$UNID_INT = trim($_POST['input_valor_uni_int']);

$consulta_unid_int = "SELECT DISTINCT uni.*
                        FROM leito lei
                        INNER JOIN unid_int uni
                            ON uni.CD_UNID_INT = lei.CD_UNID_INT
                        WHERE uni.DS_UNID_INT = '$UNID_INT'";
echo '</br> consulta unid int: </br>' . $consulta_unid_int;
$resulta_uni_int = ociparse($conn_ora,$consulta_unid_int);
oci_execute($resulta_uni_int);
$row_uni_int = oci_fetch_array($resulta_uni_int);

@$CD_UNID_INT = @$row_uni_int['CD_UNID_INT'];
if($CD_UNID_INT == '' || $CD_UNID_INT == NULL){
    $CD_UNID_INT_novo = $UNID_INT_antigo;
    $erro = oci_error($resulta_uni_int);																							
    $_SESSION['msgerro'] = 'Unidade de internação não existe! ';
    header('location: '.$codigo);
    return 0;
}else{
    $CD_UNID_INT_novo = $CD_UNID_INT;
}
///////////////////////////////////////////////////////////////

//VALIDA DS ENFERMARIA////////////////////////////////
$DS_ENFERMARIA = $_POST['ds_enfermaria'];
if($DS_ENFERMARIA == '' || $DS_ENFERMARIA == NULL){
 																							
    $_SESSION['msgerro'] = 'Descrição de enfermaria não pode ser vazia! ';
    header('location: '.$codigo);
    return 0;
    $DS_ENFERMARIA_novo = $DS_ENFERMARIA_antigo;
}else{
    $DS_ENFERMARIA_novo = $DS_ENFERMARIA;
}
//////////////////////////////////////////////////////

//VALIDA DS RESUMO////////////////////////////////
$DS_RESUMO = $_POST['ds_resumida'];
if($DS_RESUMO == '' || $DS_RESUMO == NULL){
 																							
    $_SESSION['msgerro'] = 'Descrição resumida não pode ser vazia! ';
    header('location: '.$codigo);
    return 0;
    $DS_RESUMO_novo = $DS_RESUMO_antigo;
}else{
    $DS_RESUMO_novo = $DS_RESUMO;
}
//////////////////////////////////////////////////////

//VALIDA DS LEITO/////////////////////////
$DS_LEITO = $_POST['ds_leito'];
if($DS_LEITO == '' || $DS_LEITO == NULL){
    																							
    $_SESSION['msgerro'] = 'Descrição de leito não pode ser vazia! ';
    header('location: '.$codigo);
    return 0;
    $DS_LEITO_novo = $DS_LEITO_antigo;
}else{
    $DS_LEITO_novo = $DS_LEITO;
}
//////////////////////////////////////////

//VALIDA TP SITUAÇÃO///////////////////////////////////

echo '</br> dt desativa antigo:'. $DT_DESATIVACAO_antigo;
$DT_DESATIVACAO = $DT_DESATIVACAO_antigo;
echo '</br> dt desativa:'. $DT_DESATIVACAO;
if(isset($_POST['ativo'])){
    $TP_SITUACAO = 'on';
}else{
    $TP_SITUACAO = 'off';
}
//$TP_SITUACAO = $_POST['ativo'];
echo '</br>TP Situação:'. $TP_SITUACAO;
if ($TP_SITUACAO == 'on'){
    $TP_SITUACAO_novo = 'A';
    $DT_DESATIVACAO_novo = '';
    echo '</br> if ativo';
    //$DT_DESATIVACAO_novo = $DT_DESATIVACAO_antigo;
}else{
    $TP_SITUACAO_novo = 'I';
    echo '</br> if inativo';
    if($DT_DESATIVACAO == '' || $DT_DESATIVACAO === NULL){
    echo'</br> if vazio';
        $DT_DESATIVACAO_novo = date('d-M-y');
    }else{
        echo'</br> if cheio';
        $DT_DESATIVACAO_novo = $DT_DESATIVACAO_antigo;
    }
}
echo '</br>TP Situação novo:' . $TP_SITUACAO_novo;
echo '</br>DT desativa novo:'. $DT_DESATIVACAO_novo;
echo '</br>teste data: </br>'. date('d-M-y');
//////////////////////////////////////////////////////

//VALIDA CD COPA/////////////////////////////////////////////
$DS_COPA = trim($_POST['input_valor_copa']);
echo '</br>ds copa:</br>'. $DS_COPA;
$consulta_copa = "SELECT DISTINCT cp.*
                        FROM leito lei
                        INNER JOIN copa cp
                            ON cp.CD_COPA = lei.CD_COPA
                        WHERE cp.DS_COPA = '$DS_COPA'";
echo '</br> consulta copa </br>' . $consulta_copa;
$resulta_copa = ociparse($conn_ora,$consulta_copa);
oci_execute($resulta_copa);
$row_copa = oci_fetch_array($resulta_copa);

@$CD_COPA = @$row_copa['CD_COPA'];
echo '</br> cd copa </br>:'. $CD_COPA;
if($CD_COPA == '' || $CD_COPA == NULL){																							
    $_SESSION['msgerro'] = 'A copa que você digitou não exite! ';
    header('location: '.$codigo);
    return 0;
    $CD_COPA_novo = $CD_COPA_antigo;
}else{
    $CD_COPA_novo = $CD_COPA;
}
////////////////////////////////////////////////////////////

//VALIDA SN EXTRA/////////////////////////////////////////////////
if(isset($_POST['extra'])){
    $SN_EXTRA = 'on';
}else{
    $SN_EXTRA = 'off';
}
if ($SN_EXTRA == 'on'){
    $SN_EXTRA_novo = 'S';
}else{
    $SN_EXTRA_novo = 'N';
}
echo '</br> SN Extra novo: </br>' . $SN_EXTRA_novo;

//VALIDA TIP ACOM UTI SUS
$DS_TIP_ACOM_UTI_SUS = trim($_POST['input_valor_sus']);

if ($DS_TIP_ACOM_UTI_SUS != ''|| $DS_TIP_ACOM_UTI_SUS != NULL){
    $consulta_sus = "SELECT DISTINCT sus.* from tip_acom_uti_sus sus where 
                    DS_TIP_ACOM_UTI_SUS = '$DS_TIP_ACOM_UTI_SUS'";
    echo '</br> consulta sus: </br>' . $consulta_sus;
    @$resulta_sus = ociparse($conn_ora,@$consulta_sus);
    @oci_execute(@$resulta_sus);
    @$row_sus = oci_fetch_array(@$resulta_sus);

    $CD_TIP_ACOM_UTI_SUS = $row_sus['CD_TIP_ACOM_UTI_SUS'];
    if($CD_TIP_ACOM_UTI_SUS == '' || $CD_TIP_ACOM_UTI_SUS == NULL){	
        $_SESSION['msgerro'] = 'Tipo de acomodação SUS não exite! ';
        header('location: '.$codigo);
        return 0;
        $CD_TIP_ACOM_UTI_SUS_novo = $CD_TIP_ACOM_UTI_SUS_antigo;
    }else{
        $CD_TIP_ACOM_UTI_SUS_novo = $CD_TIP_ACOM_UTI_SUS;
    }
}else{
    $CD_TIP_ACOM_UTI_SUS_novo = '';
}
//Validações////////////////////////////////////////////////////////

$count_tip_acom="SELECT COUNT (*) AS QTD
                    FROM (Select DISTINCT acom.* from leito lei
                    INNER JOIN tip_acom acom
                    ON acom.CD_TIP_ACOM = lei.CD_TIP_ACOM
                    WHERE acom.DS_TIP_ACOM = 'ENFERMARIA')
                    ";
echo '</br> count tip acom :</br>'. $count_tip_acom;
$result_cont_tip_acom = ociparse($conn_ora, $count_tip_acom);
oci_execute($result_cont_tip_acom);
$row_count_acom = oci_fetch_array($result_cont_tip_acom);
echo '</br> qtd tip acom: </br>'. $row_count_acom['QTD'];
$qtd_acom = $row_count_acom['QTD'];
///////////////////////////////////////////////////////////////////

//INSERT LOG
$insert_log_antigo="INSERT INTO leito_log
                SELECT $v_valor_antigo AS CD_LEITO,
                $TIP_ACOM_antigo AS CD_TIP_ACOM,
                $UNID_INT_antigo AS CD_UNID_INT,
                '$DS_ENFERMARIA_antigo' AS DS_ENFERMARIA,
                '$DS_LEITO_antigo' AS DS_LEITO,
                '$TP_SEXO_antigo' AS TP_SEXO,
                '$TP_OCUPACAO_antigo' AS TP_OCUPACAO,
                '$TP_SITUACAO_antigo' AS TP_SITUACAO,
                '$DS_RESUMO_antigo' AS DS_RESUMO,
                '$CD_LEITO_AIH_antigo' AS CD_LEITO_AIH,
                $CD_COPA_antigo AS CD_COPA,
                '$SN_EXTRA_antigo' AS SN_EXTRA,
                '$SN_ALTA_MEDICA_antigo' AS SN_ALTA_MEDICA,
                '$DT_ATIVACAO_antigo' AS DT_ATIVACAO,
                '$DT_DESATIVACAO_antigo' AS DT_DESATIVACAO,
                '$CD_TIP_ACOM_UTI_SUS_antigo' AS CD_TIP_ACOM_UTI_SUS,
                '$NR_RAMAL_antigo' AS NR_RAMAL,
                '$CD_LEITO_INTEGRA_antigo' AS CD_LEITO_INTEGRA,
                '$CD_SEQ_INTEGRA_antigo' AS CD_SEQ_INTEGRA,
                '$DT_INTEGRA_antigo' AS DT_INTEGRA,
                '$CD_LEITO_PAI_antigo' AS CD_LEITO_PAI,
                'A' AS TP_ETAPA,
                SYSDATE,
                UPPER('$usu_antigo') 
                from DUAL";
echo '</br> log antigo: </br>'. $insert_log_antigo;
$result_log_antigo = ociparse($conn_ora,$insert_log_antigo);
oci_execute($result_log_antigo);

$v_valor_novo = $v_valor_antigo;




//UPDATE LEITO

$update_leito="UPDATE leito set 
CD_TIP_ACOM = '$CD_TIP_ACOM_novo',
CD_UNID_INT = '$CD_UNID_INT_novo',
DS_ENFERMARIA = '$DS_ENFERMARIA_novo',
DS_LEITO = '$DS_LEITO_novo',
TP_SEXO = '$TP_SEXO_antigo',
TP_OCUPACAO = '$TP_OCUPACAO_antigo',
TP_SITUACAO = '$TP_SITUACAO_novo',
DS_RESUMO = '$DS_RESUMO_novo',
CD_LEITO_AIH = '$CD_LEITO_AIH_antigo',
CD_COPA = '$CD_COPA_novo',
SN_EXTRA = '$SN_EXTRA_novo',
SN_ALTA_MEDICA = '$SN_ALTA_MEDICA_antigo',
DT_ATIVACAO = '$DT_ATIVACAO_antigo',
DT_DESATIVACAO = '$DT_DESATIVACAO_novo',
CD_TIP_ACOM_UTI_SUS = '$CD_TIP_ACOM_UTI_SUS_novo',
NR_RAMAL = '$NR_RAMAL_antigo',
CD_LEITO_INTEGRA = '$CD_LEITO_INTEGRA_antigo',
CD_SEQ_INTEGRA = '$CD_SEQ_INTEGRA_antigo',
DT_INTEGRA = '$DT_INTEGRA_antigo',
CD_LEITO_PAI = '$CD_LEITO_PAI_antigo' where CD_LEITO = '$v_valor_antigo'";
echo '</br> update leito: </br>'.  $update_leito;
$result_leito = ociparse($conn_ora,$update_leito);
$valida_insert_upadte = oci_execute($result_leito);

//INSERT NOVO LOG/////////////////////////////////////////////////
$insert_log_novo = "INSERT INTO leito_log
                SELECT $v_valor_novo AS CD_LEITO,
                $CD_TIP_ACOM_novo AS CD_TIP_ACOM,
                $CD_UNID_INT_novo AS CD_UNID_INT,
                '$DS_ENFERMARIA_novo' AS DS_ENFERMARIA,
                '$DS_LEITO_novo' AS DS_LEITO,
                '$TP_SEXO_antigo' AS TP_SEXO,
                '$TP_OCUPACAO_antigo' AS TP_OCUPACAO,
                '$TP_SITUACAO_novo' AS TP_SITUACAO,
                '$DS_RESUMO_novo' AS DS_RESUMO,
                '$CD_LEITO_AIH_antigo' AS CD_LEITO_AIH,
                $CD_COPA_novo AS CD_COPA,
                '$SN_EXTRA_novo' AS SN_EXTRA,
                '$SN_ALTA_MEDICA_antigo' AS SN_ALTA_MEDICA,
                '$DT_ATIVACAO_antigo' AS DT_ATIVACAO,
                '$DT_DESATIVACAO_novo' AS DT_DESATIVACAO,
                '$CD_TIP_ACOM_UTI_SUS_novo' AS CD_TIP_ACOM_UTI_SUS,
                '$NR_RAMAL_antigo' AS NR_RAMAL,
                '$CD_LEITO_INTEGRA_antigo' AS CD_LEITO_INTEGRA,
                '$CD_SEQ_INTEGRA_antigo' AS CD_SEQ_INTEGRA,
                '$DT_INTEGRA_antigo' AS DT_INTEGRA,
                '$CD_LEITO_PAI_antigo' AS CD_LEITO_PAI,
                'D' AS TP_ETAPA,
                SYSDATE,
                UPPER('$usu_antigo') 
                FROM DUAL";


$result_log_novo = ociparse($conn_ora,$insert_log_novo);
oci_execute($result_log_novo);



if (!$valida_insert_upadte) {   

    $erro = oci_error($valida_insert_upadte);																							
    $_SESSION['msgerro'] = 'Erro ao atualizar o leito! ' . htmlentities($erro['message']);
    header('location: '.$codigo);
    return 0;

  }else {

    $_SESSION['msg'] = 'Leito n° ' . $v_valor_novo . ' editado com sucesso!';
    header('location: pesquisar_leito.php'); 
    return 0;
    
}

?>