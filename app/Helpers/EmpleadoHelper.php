<?php

function responseJson( $description, $content, $success ) {
    return response()->json( [
        'description'=> $description,
        'content'=> $content,
        'success' => $success
    ] );
}

function verificarComisionEmpleado($salariobase,$totalVentas){
    $comision = 0;
    if ($totalVentas <= 1000) {
        $comision = $salariobase * 0.01;
        $salariobase = $salariobase + $comision;
    }elseif ($totalVentas > 1000 && $totalVentas < 5000) {
        $comision = $salariobase * 0.05;
        $salariobase = $salariobase + $comision;
    }else{
        $comision = $salariobase * 0.1;
        $salariobase = $salariobase + $comision;
    }

    return [$salariobase,$comision];
}

function verificarProrrateoEmpleado($diasTrabajados,$salariobase){
    $salarioDiario = 0;
    $salarioProrrateado = 0;
    $porcentajeProrrateo = 0;
    if ($diasTrabajados < 30) {
        $salarioDiario = $salariobase / $diasTrabajados;
        $porcentajeProrrateo = ($salarioDiario * $diasTrabajados) /$diasTrabajados;
        return number_format($porcentajeProrrateo,2) ;
    }else{
        return $porcentajeProrrateo;
    }
}
