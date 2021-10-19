@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empleados</div>
                <div class="m-5">   
                    <a  class="btn btn-primary mr-2" href="/empleado"> Volver<a>
                </div>
<h2  class="text-center mb-5">
    Crear empresa
</h2>
            <div class="row justify-content-center mt-5">
                <form method="POST" action="{{route('empleado.store')}}">
                    @csrf
                    <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror " id="nombre" placeholder="Nombre"/>
                    <label for="nacimiento">Fecha de nacimiento</label>
                    <input type="date" name="nacimiento" class="form-control @error('nacimiento') is-invalid @enderror " id="nacimiento"/>
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" class="form-control @error('correo') is-invalid @enderror " id="correo"/>
                    <label for="Genero">Correo</label>
                    <select class="form-control" id="genero" name="genero"> 
                        <option value="Masculino" >Masculino</option>   
                        <option value="Femenino" >Femenino</option>                                            
                      </select>   
                    <label for="telefono">Telefono</label>
                    <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror " id="telefono"/>
                    <label for="celular">Celular</label>
                    <input type="number" name="celular" class="form-control @error('celular') is-invalid @enderror " id="celular"/>
                    
                    <label for="ingreso">Fecha de ingreso</label>
                    <input type="date" name="ingreso" class="form-control @error('ingreso') is-invalid @enderror " id="ingreso"/>
                    
                    <label for="ingreso">Departamento</label>
                    <select class="form-control" id="deptos" name="deptos"> 
                          
                        @foreach($deptos as $id =>$deptos)
        
                       
                        <option value="{{$deptos->id}}">{{$deptos->nombre}}/{{$deptos->empresa}}</option>
                   
                        @endforeach
                      </select>   
                    </div>
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
                @enderror
                @error('nacimiento')
                <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
            @enderror
            @error('correo')
            <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
        @enderror
        @error('ingreso')
        <span class="invalid-feedback d-block" role="alert">{{$message}}</span>
    @enderror
                        
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" value="Agregar empresa"/>
                    </div>
               
                    
                </form>

            </div>
                
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection