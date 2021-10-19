@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empresas</div>
                <div class="m-5">   
                    <a  class="btn btn-primary mr-2" href="/empresas"> Volver<a>
                </div>
<h2  class="text-center mb-5">
    Modificar empresa
</h2>
            <div class="row justify-content-center mt-5">
                <form method="POST" action="{{route('empresa.update',[$empresa->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" value="{{$empresa->nombre}}" name="nombre" class="form-control @error('nombre') is-invalid @enderror " id="nombre" placeholder="Nombre"/>
                    </div>
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                @enderror
                        
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Modificar empresa"/>
                    </div>
               
                    
                </form>

            </div>
                
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
