<?php

function salario_bruto($salario, $retencion, $comision) {
    $salario += $comision;
    $retencion = $salario*($retencion/100);
    $salario -= $retencion;
    
    return $salario;
}

?>