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
echo $insert_log_antigo;
$result_log_antigo = ociparse($conn_ora,$insert_log_antigo);
oci_execute($result_log_antigo);

$v_valor_novo = $v_valor_antigo;

//VALIDA CD TIP ACOM/////////////////////////////////////////


$TIP_ACOM = $_POST['input_valor_acom'];

$consulta_acom = "SELECT DISTINCT acom.*
                    FROM leito lei
                    INNER JOIN tip_acom acom
                        ON acom.CD_TIP_ACOM = lei.CD_TIP_ACOM
                    WHERE acom.DS_TIP_ACOM = '$TIP_ACOM'";
echo '</br>' . $consulta_acom;
$resulta_acom = ociparse($conn_ora,$consulta_acom);
oci_execute($resulta_acom);
$row_acom = oci_fetch_array($resulta_acom);

$CD_TIP_ACOM_if = $row_acom['CD_TIP_ACOM'];
echo '</br> Tip acom:' . $CD_TIP_ACOM_if;
if($CD_TIP_ACOM_if == '' || $CD_TIP_ACOM_if == NULL){
    $CD_TIP_ACOM_novo = $TIP_ACOM_antigo;
    echo '</br> Tip acom novo if:' . $CD_TIP_ACOM_novo;
}else{
    $CD_TIP_ACOM_novo = $CD_TIP_ACOM_if;
    echo '</br> Tip acom novo else:' . $CD_TIP_ACOM_novo;
}

///////////////////////////////////////////////////////////////

//VALIDA CD_UNID_INT//////////////////////////////////////////

$UNID_INT = trim($_POST['input_valor_uni_int']);

$consulta_unid_int = "SELECT DISTINCT uni.*
                        FROM leito lei
                        INNER JOIN unid_int uni
                            ON uni.CD_UNID_INT = lei.CD_UNID_INT
                        WHERE uni.DS_UNID_INT = '$UNID_INT'";
echo '</br>' . $consulta_unid_int;
$resulta_uni_int = ociparse($conn_ora,$consulta_unid_int);
oci_execute($resulta_uni_int);
$row_uni_int = oci_fetch_array($resulta_uni_int);

$CD_UNID_INT = $row_uni_int['CD_UNID_INT'];
if($CD_UNID_INT == '' || $CD_UNID_INT == NULL){
    $CD_UNID_INT_novo = $UNID_INT_antigo;
}else{
    $CD_UNID_INT_novo = $CD_UNID_INT;
}
///////////////////////////////////////////////////////////////

//VALIDA DS ENFERMARIA////////////////////////////////
$DS_ENFERMARIA = $_POST['ds_enfermaria'];
if($DS_ENFERMARIA == '' || $DS_ENFERMARIA == NULL){
    $DS_ENFERMARIA_novo = $DS_ENFERMARIA_antigo;
}else{
    $DS_ENFERMARIA_novo = $DS_ENFERMARIA;
}
//////////////////////////////////////////////////////

//VALIDA DS LEITO/////////////////////////
$DS_LEITO = $_POST['ds_leito'];
if($DS_LEITO == '' || $DS_LEITO == NULL){
    $DS_LEITO_novo = $DS_LEITO_antigo;
}else{
    $DS_LEITO_novo = $DS_LEITO;
}
//////////////////////////////////////////

//VALIDA TP SITUAÇÃO///////////////////////////////////
$DT_DESATIVACAO = $DT_ATIVACAO_antigo;

if(isset($_POST['ativo'])){
    $TP_SITUACAO = 'on';
}else{
    $TP_SITUACAO = 'off';
}
echo '</br>TP Situação:'. $TP_SITUACAO;
if ($TP_SITUACAO == 'on'){
    $TP_SITUACAO_novo = 'A';
    $DT_DESATIVACAO_novo = '';
    $DT_DESATIVACAO_novo = $DT_DESATIVACAO_antigo;
}else{
    $TP_SITUACAO_novo = 'I';
    if($DT_DESATIVACAO == '' || $DT_DESATIVACAO === NULL){
    $DT_DESATIVACAO_novo = 'SYSDATE';
    }else{
        $DT_DESATIVACAO_novo = $DT_DESATIVACAO_antigo;
    }
}
echo '</br>TP Situação novo:' . $TP_SITUACAO_novo;
//////////////////////////////////////////////////////

//VALIDA CD COPA/////////////////////////////////////////////
$DS_COPA = trim($_POST['input_valor_copa']);
echo $DS_COPA;
$consulta_copa = "SELECT DISTINCT cp.*
                        FROM leito lei
                        INNER JOIN copa cp
                            ON cp.CD_COPA = lei.CD_COPA
                        WHERE cp.DS_COPA = '$DS_COPA'";
echo '</br>' . $consulta_copa;
$resulta_copa = ociparse($conn_ora,$consulta_copa);
oci_execute($resulta_copa);
$row_copa = oci_fetch_array($resulta_copa);

$CD_COPA = $row_copa['CD_COPA'];
echo "a".$CD_COPA;
if($CD_COPA == '' || $CD_COPA == NULL){
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
echo '</br> SN Extra novo:' . $SN_EXTRA_novo;

//VALIDA TIP ACOM UTI SUS
$DS_TIP_ACOM_UTI_SUS = trim($_POST['input_valor_sus']);

if ($DS_TIP_ACOM_UTI_SUS != ''|| $DS_TIP_ACOM_UTI_SUS != NULL){
    $consulta_sus = "SELECT DISTINCT sus.* from tip_acom_uti_sus sus where 
    DS_TIP_ACOM_UTI_SUS = '$DS_TIP_ACOM_UTI_SUS'";
    echo '</br>' . $consulta_sus;
    @$resulta_sus = ociparse($conn_ora,@$consulta_sus);
    @oci_execute(@$resulta_sus);
    @$row_sus = oci_fetch_array(@$resulta_sus);

    $CD_TIP_ACOM_UTI_SUS = $row_sus['CD_TIP_ACOM_UTI_SUS'];
    if($CD_TIP_ACOM_UTI_SUS == '' || $CD_TIP_ACOM_UTI_SUS == NULL){
        $CD_TIP_ACOM_UTI_SUS_novo = $CD_TIP_ACOM_UTI_SUS_antigo;
    }else{
        $CD_TIP_ACOM_UTI_SUS_novo = $CD_TIP_ACOM_UTI_SUS;
    }
}else{
    $CD_TIP_ACOM_UTI_SUS_novo = '';
}
//Validações////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////

//UPDATE LEITO

$update_leito="UPDATE leito set 
CD_TIP_ACOM = '$CD_TIP_ACOM_novo',
CD_UNID_INT = '$CD_UNID_INT_novo',
DS_ENFERMARIA = '$DS_ENFERMARIA_novo',
DS_LEITO = '$DS_LEITO_novo',
TP_SEXO = '$TP_SEXO_antigo',
TP_OCUPACAO = '$TP_OCUPACAO_antigo',
TP_SITUACAO = '$TP_SITUACAO_novo',
DS_RESUMO = '$DS_RESUMO_antigo',
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
echo $update_leito;
$result_leito = ociparse($conn_ora,$update_leito);
oci_execute($result_leito);

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
                '$DS_RESUMO_antigo' AS DS_RESUMO,
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
echo '</br>' . $insert_log_novo;
$result_log_novo = ociparse($conn_ora,$insert_log_novo);
$valida_insert = oci_execute($result_log_novo);
$codigo = 'editar_leito.php?cd_leito='.$_SESSION['cd_leito'];

if (!$valida_insert) {   
    $erro = oci_error($result_tb_os) . oci_error($result_tb_os) ;																							
    $_SESSION['msgerro'] = htmlentities($erro['message']);
    header('location: '.$codigo); 
    return 0;
  }else {
    $_SESSION['msg'] = 'Leito n° ' . $v_valor_novo . ' editado com sucesso!';
    header('location: pesquisar_leito.php'); 
    return 0;
  }

?>