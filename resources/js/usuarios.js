$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    
});
$(document).ready(function(){

    $('#usuarios').DataTable(
        {
            "language": {
                "lengthMenu": "Mostrar _MENU_",
                "zeroRecords": "Nothing found - sorry",
                "info": "Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "Buscar:",
                "sPrevious": "Anterior",
                "sNext": "Siguiente"
            }
        }
    );
   
 })  

 $('.usuario').click(function(){
    
    usuarios($(this).val());
   // $('#nombre').val("Miguel Angel Garcia Servin");
    //$('#celular').val("7292915047");
    //$('#correo').val("miguelgs63@hotmail.com");
   });

   function usuarios(id){
    
    $.ajax({
        url:'rest/edit?id_usuario='+id,
        type:'post',
        success:  function (response) {
           $('#editar').attr('action', '/usuarios/'+response['objeto']['id']);
           
           $('#nombre').val(response['objeto']['nombre']+" "+response['objeto']['ap_paterno']+" "+response['objeto']['ap_materno']);
           $('#celular').val(response['objeto']['celular']);
           $('#correo').val(response['objeto']['email']);
           $("#negocio option[value='"+response['objeto']['id_membresia']+"']").attr("selected", true);
                 

 
            if(response['objeto']['id_tipo_usuario']==3){
                $('#vendedor').css('visibility','collapse');
                $('#lvendedor').css('visibility','collapse');
            }
            if(response['objeto']['id_tipo_usuario']==4){
             $('#vendedor').css('visibility','visible');
             $('#lvendedor').css('visibility','visible');
            // alert(response['objeto']['id']);
             $("#vendedor option[value='"+response['objeto']['id_vendedor']+"']").attr("selected", true);
            }
            var arrayDeCadenas = response['objeto']['fecha_membresia'].split('T');
            $('#finalizacion').val(arrayDeCadenas[0]);  
           

        },
        statusCode: {
           404: function() {
              alert('web not found');
           }
        },
        error:function(x,xs,xt){
           window.open(JSON.stringify(x));
           //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
     });
    }