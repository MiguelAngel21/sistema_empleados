<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('deptos.nuevodepto')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('deptos.create');
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
            'nombre' =>'required'
        ]);

        DB::table('departamentos')->insert([
            'nombre'=>$data['nombre'],
            'id_empresa'=>1

        ]);
        $empresas = Empresa::all();
        return view('deptos.nuevodepto')->with('empresas',$empresas);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $empresas = Empresa::all();
        
       return view('deptos.nuevodepto')->with('empresas',$empresas);
        //->with('empresas',$empresas)->with('depto',$departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
    
        $empresas = Empresa::all();
        $deptos =  DB::select('SELECT departamentos.id,departamentos.nombre,empresas.nombre as empresa FROM departamentos,empresas WHERE id_empresa=empresas.id'); 
      //  return view('deptos.nuevodepto')
        return view('home')->with('empresas',$empresas)->with('deptos',$deptos);
    }
}
