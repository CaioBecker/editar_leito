<?php

$v_valor = filter_input(INPUT_GET,'filtro');


if ($v_valor != ""){

$consulta_leito="
 Select * from leito
 where CD_LEITO = $v_valor
 order by tp_situacao

";
//echo $consulta_leito;
$resulta_leito= ociparse($conn_ora,$consulta_leito);
oci_execute($resulta_leito); 
}else{
    $consulta_leito="
 Select * from leito

 order by tp_situacao
";
//echo $consulta_leito;
$resulta_leito= ociparse($conn_ora,$consulta_leito);
oci_execute($resulta_leito);
}

?>