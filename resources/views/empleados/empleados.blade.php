@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type = "text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type = "text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type = "text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type = "text/javascript" src="{{ asset('js/usuarios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script> 
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Empleado</div>
        
                <div class="card-body" >
                    
                    <div class="m-5">   
                        <a  class="btn btn-primary mr-2" href="/empleados/index"> Crear Empleado<a>
                    </div>
    
                        <table class="table table-striped" id="usuarios" class="usuarios">
                            <thead class="bg-primary text-light align-content-center">
                                <tr>
                               
                                    <th scope="col">Nombre</th>    
                                    <th scope="col">Fecha de Nacimiento</th>    
                                    <th scope="col">Correo</th>     
                                    <th scope="col">Genero</th> 
                                    <th scope="col">Telefono</th> 
                                    <th scope="col">Celular</th>  
                                    <th scope="col">Fecha de ingreso</th> 
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Empresa</th>                                 
                                    <th scope="col"><center>Opciones</center></th> 
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach($empleado as $id =>$empleado)                       
                                <tr>                                  
                            <td> 
                                {{$empleado->nombre}}                  
                         </td>
                         <td> 
                            {{$empleado->nacimiento}}                  
                     </td>
                     <td> 
                        {{$empleado->correo}}                  
                 </td>
                     <td> 
                        {{$empleado->genero}}                  
                 </td>
                 <td> 
                    {{$empleado->telefono}}                  
             </td>
             <td> 
                {{$empleado->celular}}                  
         </td>
         <td> 
            {{$empleado->ingreso}}                  
     </td>
     <td> 
        {{$empleado->depto}}                  
 </td>
                    
                         <td> 
                            {{$empleado->empresa}}                  
                     </td>
                         <td>                                              
                                   
                                 <form action=" {{ route('empleado.destroy',[$empleado->id])}}" method="POST">
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type = "text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type = "text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type = "text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script type = "text/javascript" src="{{ asset('js/usuarios.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script> 

@endsection
