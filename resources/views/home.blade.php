@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Empresas y Departamentos</div>
            <div class="row">  
                <div class="card-body col-6">
                    
                    <div class="m-5">   
                        <a  class="btn btn-primary mr-2" href="empresas"> Crear Empresa<a>
                    </div>
    
                        <table class="table table-striped" >
                            <thead class="bg-primary text-light align-content-center">
                                <tr>
                               
                                    <th scope="col">Nombre</th>                                 
                                    <th scope="col"><center>Opciones</center></th> 
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach($empresas as $id =>$empresas)                       
                                <tr>                                  
                            <td> 
                                {{$empresas->nombre}}                  
                         </td>
                         <td>                                              
                                   
                                 <form action=" {{ route('empresa.destroy',[$empresas->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a  class="btn btn-secondary mr-2" href="/empresas/{{$empresas->id}}/edit"> Modificar<a>
                                        <input type="submit" class="btn btn-danger" value="Eliminar"/>
                                 </form>
                                     
                        </td>
                     </tr>
                     @endforeach
       
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body col-6">
                        <div class="m-5">   
                            <a  class="btn btn-primary mr-2" href="/departamento/create"> Crear departamento<a>
                        </div>
        
                            <table  class="table table-striped" >
                                <thead class="bg-primary text-light align-content-center">
                                    <tr>
                                   
                                        <th scope="col">Nombre</th> 
                                        <th scope="col">Empresa</th>                                 
                                        <th scope="col">Opciones</th> 
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach($deptos as $id =>$deptos)                       
                                    <tr>                                  
                                <td> 
                                    {{$deptos->nombre}}                  
                             </td>
                             <td> 
                                {{$deptos->empresa}}                  
                         </td>
                             <td>                                              
                                       
                                     <form action=" {{ route('departamento.destroy',[$deptos->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                           <input type="submit" class="btn btn-danger" value="Eliminar"/>
                                     </form>
                                         
                            </td>
                         </tr>
                         @endforeach
           
                                </tbody>
                            </table>
                        </div>
                
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
