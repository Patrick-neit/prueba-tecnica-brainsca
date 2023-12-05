<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalarioRequest;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function calcularSalarioEmpleado(SalarioRequest $request){
        try {
            $dataRequest = (object)$request->all();
            $salarioBasico = $dataRequest->salario_base;
            $diasTrabajados = $dataRequest->dias_trabajados;
            $totalVentas = $dataRequest->total_ventas;

            $verificarComisionEmpleado = verificarComisionEmpleado($salarioBasico,$totalVentas);
            $salarioCalculado = $verificarComisionEmpleado[0];
            $comisionEmpleado = $verificarComisionEmpleado[1];
            $porcentajeProrrateo =  verificarProrrateoEmpleado($diasTrabajados,$salarioBasico);

            $dataSalarioCalculado = [
                'salario_basico' => $salarioBasico,
                'dias_trabajados' => $diasTrabajados,
                'valor_total_ventas' => $totalVentas,
                'salario_calculado' => $salarioCalculado,
                'comision_ganada' => $comisionEmpleado,
                'porcentaje_prorrateo' => $porcentajeProrrateo
            ];

            return responseJson('Salario Cliente Listado', $dataSalarioCalculado, 200);

        } catch (\Exception $e) {
            return responseJson('Server Error',[
                'message' => $e->getMessage(),
                'code'=> $e->getCode()
            ],500);
        }
    }
}
