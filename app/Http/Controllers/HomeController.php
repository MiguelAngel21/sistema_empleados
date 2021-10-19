<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresas = Empresa::all();
        $deptos =  DB::select('SELECT departamentos.id,departamentos.nombre,empresas.nombre as empresa FROM departamentos,empresas WHERE id_empresa=empresas.id'); 
      //  return view('deptos.nuevodepto')
        return view('home')->with('empresas',$empresas)->with('deptos',$deptos);
    }
}
