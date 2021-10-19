<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado =  DB::select('SELECT empleados.*,departamentos.nombre as depto,empresas.nombre as empresa
        FROM empleados, departamentos,empresas
        WHERE empleados.id_departamento= departamentos.id
        AND departamentos.id_empresa = empresas.id'); 

        return view('empleados.empleados')->with('empleado',$empleado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
  
        return view('empleados.crearem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' =>'required',
            'nacimiento' =>'required',
            'correo' =>'required',
            'ingreso' =>'required'
        ]);
        if($request['telefono']==null){
            $request['telefono']=0;
        }
        if($request['celular']==null){
            $request['celular']=0;
        }
        DB::table('empleados')->insert([
            'nombre' =>$data['nombre'],
            'nacimiento' =>$data['nacimiento'],
            'correo' =>$data['correo'],
            'ingreso' =>$data['ingreso'],
            'telefono' =>$request['telefono'],
            'celular' =>$request['celular'],
            'genero' =>$request['genero'],
            'id_departamento' =>1
           

        ]);
        $empleado =  DB::select('SELECT empleados.*,departamentos.nombre as depto,empresas.nombre as empresa
        FROM empleados, departamentos,empresas
        WHERE empleados.id_departamento= departamentos.id
        AND departamentos.id_empresa = empresas.id'); 

        return view('empleados.empleados')->with('empleado',$empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleados $empleados)
    {
        $empleados->delete();
        $empleado =  DB::select('SELECT empleados.*,departamentos.nombre as depto,empresas.nombre as empresa
        FROM empleados, departamentos,empresas
        WHERE empleados.id_departamento= departamentos.id
        AND departamentos.id_empresa = empresas.id'); 

        return view('empleados.empleados')->with('empleado',$empleado);
      
    }
}
