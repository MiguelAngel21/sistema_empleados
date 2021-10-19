@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departamentos</div>
              
                    <a  class="btn btn-primary mr-2" href="/home"> Volver<a>
            
<h2  class="text-center mb-5">
    Crear departamento
</h2>
            <div class="row justify-content-center mt-5">
                <form method="POST" action="{{route('departamento.store')}}">
                    @csrf
                    <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror " id="nombre" placeholder="Nombre"/>
                    <select class="form-control" id="empresas" name="empresas"> 
                          
                    @foreach($empresas as $id =>$empresas)
    
                   
                    <option value="{{$empresas->id}}">{{$empresas->nombre}}</option>
               
                    @endforeach
                  </select>   
                </div>
                  
                       
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                @enderror
                @error('empresa')
                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
            @enderror
                        
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Agregar departamento"/>
                    </div>
               
                    
                </form>

            </div>
                
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
