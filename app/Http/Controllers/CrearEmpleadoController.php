<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class CrearEmpleadoController extends Controller{

    public function index()
    {
        $deptos =  DB::select('SELECT departamentos.id,departamentos.nombre,empresas.nombre as empresa 
        FROM departamentos,empresas WHERE id_empresa=empresas.id'); 
  
        return view('empleados.crearem')->with('deptos',$deptos);
    }
}
