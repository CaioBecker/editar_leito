<?php

$v_valor = $_SESSION['cd_leito'];

$consulta_leito="SELECT *
FROM leito
 WHERE CD_LEITO = $v_valor
 ORDER BY tp_situacao
";
//echo $consulta_leito;
$resulta_leito= ociparse($conn_ora,$consulta_leito);
oci_execute($resulta_leito); 
$row_edit_leito = oci_fetch_array($resulta_leito);

$TIP_ACOM = $row_edit_leito['CD_TIP_ACOM'];
$UNID_INT = $row_edit_leito['CD_UNID_INT'];
$DS_ENFERMAGEM = $row_edit_leito['DS_ENFERMARIA'];
$DS_LEITO = $row_edit_leito['DS_LEITO'];
$TP_SEXO = $row_edit_leito['TP_SEXO'];
$TP_OCUPACAO= $row_edit_leito['TP_OCUPACAO'];
$TP_SITUACAO = $row_edit_leito['TP_SITUACAO'];
$DS_RESUMO = $row_edit_leito['DS_RESUMO'];
$CD_LEITO_AIH = $row_edit_leito['CD_LEITO_AIH'];
$CD_COPA = $row_edit_leito['CD_COPA'];
$SN_EXTRA = $row_edit_leito['SN_EXTRA'];
$SN_ALTA_MEDICA = $row_edit_leito['SN_ALTA_MEDICA'];
$DT_ATIVACAO = $row_edit_leito['DT_ATIVACAO'];
$DT_DESATIVACAO = $row_edit_leito['DT_DESATIVACAO'];
$CD_TIP_ACOM_UTI_SUS = $row_edit_leito['CD_TIP_ACOM_UTI_SUS'];
$NR_RAMAL = $row_edit_leito['NR_RAMAL'];
$CD_LEITO_INTEGRA = $row_edit_leito['CD_LEITO_INTEGRA'];
$CD_SEQ_INTEGRA = $row_edit_leito['CD_SEQ_INTEGRA'];
$DT_INTEGRA = $row_edit_leito['DT_INTEGRA'];
$CD_LEITO_PAI = $row_edit_leito['CD_LEITO_PAI'];
//$TP_ETAPA = $row_edit_leito['TP_ETAPA'];

//echo '</br> CD LEITO </br>'. $v_valor;

$_SESSION['CD_LEITO'] = $v_valor;
$_SESSION['TIP_ACOM_ANT'] = $TIP_ACOM;
$_SESSION['UNID_INT_ANT'] = $UNID_INT;
$_SESSION['DS_ENFERMAGEM_ANT'] = $DS_ENFERMAGEM;
$_SESSION['DS_LEITO_ANT'] = $DS_LEITO;
$_SESSION['TP_SEXO_ANT'] = $TP_SEXO;
$_SESSION['TP_OCUPACAO_ANT'] = $TP_OCUPACAO;
$_SESSION['TP_SITUACAO_ANT'] = $TP_SITUACAO;
$_SESSION['DS_RESUMO_ANT'] = $DS_RESUMO;
$_SESSION['CD_LEITO_AIH_ANT'] = $CD_LEITO_AIH;
$_SESSION['CD_COPA_ANT'] = $CD_COPA;
$_SESSION['SN_EXTRA_ANT'] = $SN_EXTRA;
$_SESSION['SN_ALTA_MEDICA_ANT'] = $SN_ALTA_MEDICA;
$_SESSION['DT_ATIVACAO_ANT'] = $DT_ATIVACAO;
$_SESSION['DT_DESATIVACAO_ANT'] = $DT_DESATIVACAO;
$_SESSION['CD_TIP_ACOM_UTI_SUS_ANT'] = $CD_TIP_ACOM_UTI_SUS;
$_SESSION['NR_RAMAL_ANT'] = $NR_RAMAL;
$_SESSION['CD_LEITO_INTEGRA_ANT'] = $CD_LEITO_INTEGRA;
$_SESSION['CD_SEQ_INTEGRA_ANT'] = $CD_SEQ_INTEGRA;
$_SESSION['DT_INTEGRA_ANT'] = $DT_INTEGRA;
$_SESSION['CD_LEITO_PAI_ANT'] = $CD_LEITO_PAI;
//$_SESSION['TP_ETAPA_ANT'] = $TP_ETAPA;

$consulta_acom = "SELECT DISTINCT acom.*
                    FROM leito lei
                    INNER JOIN tip_acom acom
                        ON acom.CD_TIP_ACOM = lei.CD_TIP_ACOM
                    WHERE acom.CD_TIP_ACOM = $TIP_ACOM";
//echo '</br> tip acom: </br>'. $consulta_acom;
$resulta_acom = ociparse($conn_ora,$consulta_acom);
oci_execute($resulta_acom);
$row_acom = oci_fetch_array($resulta_acom);
//echo '</br> row tip acom: </br>'. $row_acom['DS_TIP_ACOM'];

$consulta_unid_int = "SELECT DISTINCT uni.*
                        FROM leito lei
                        INNER JOIN unid_int uni
                            ON uni.CD_UNID_INT = lei.CD_UNID_INT
                        WHERE uni.CD_UNID_INT = $UNID_INT";
//echo '</br> unid int: </br>'. $consulta_unid_int;
$resulta_uni_int = ociparse($conn_ora,$consulta_unid_int);
oci_execute($resulta_uni_int);
$row_uni_int = oci_fetch_array($resulta_uni_int);
//echo '</br> row unid int: </br>'. $row_uni_int['DS_UNID_INT'];


$consulta_copa = "SELECT DISTINCT cp.*
                        FROM leito lei
                        INNER JOIN copa cp
                            ON cp.CD_COPA = lei.CD_COPA
                        WHERE cp.CD_COPA = $CD_COPA";
//echo '</br> copa: </br>'. $consulta_copa;
$resulta_copa = ociparse($conn_ora,$consulta_copa);
oci_execute($resulta_copa);
$row_copa = oci_fetch_array($resulta_copa);
//echo '</br> row copa: </br>'. $row_copa['DS_COPA'];


$consulta_sus = "SELECT DISTINCT sus.*
FROM leito lei
INNER JOIN tip_acom_uti_sus sus
    ON sus.CD_tip_acom_uti_sus = lei.CD_UNID_INT
WHERE sus.CD_tip_acom_uti_sus = $CD_TIP_ACOM_UTI_SUS";
//echo '</br> sus: </br>'. $consulta_sus;
@$resulta_sus = ociparse($conn_ora,@$consulta_sus);
@oci_execute(@$resulta_sus);
@$row_sus = oci_fetch_array(@$resulta_sus);
//echo '</br> row sus: </br>'. @$row_sus['DS_TIP_ACOM_UTI_SUS'];
?>