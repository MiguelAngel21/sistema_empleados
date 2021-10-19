$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    
});
var hola = "check"
$(".check").click(function(){
  
    var id =  $(this).val();
    if($(this).attr('checked')){
        var estatus = 0
       
    }else{
        var estatus = 1
       
    }
    modificar(id,estatus);
    
    });

    $(".modificar").click(function(){
        profesion($(this).val())
      }); 

function modificar(mod,estatus){
    
$.ajax({
    url:'profesiones/'+mod,
    data:{'Estatus':estatus},
    type:'post',
    success:  function (response) {
       // $('#profesiones').load('profesiones');
        location.reload();
      // $('#actualizar').attr('disabled','false');
      // $("#prospecto").attr("action", "{{route ('finanzas.update',"+response[0]['id']+")}}");
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


function profesion(mod){
    
    $.ajax({
        url:'profesiones/'+mod+'/edit',
        type:'get',
        success:  function (response) {
            $("#Profesion").val(response['Profesion']);
            $("#Descripcion").val(response['Descripcion']);
            $("#id").val(response['Id']);
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