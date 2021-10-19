
$(document).ready(function(){
   $('#membresia1').val('0');
   $('#membresia1').attr('disabled','true');
   //$('#actualizar').attr('disabled','true');
 
 
})   
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#negocio').click(function(){
  
  var tipo =  $('#negocio').val();
  $("#id_categoria_venta").val(tipo);
   consultarInformacion(tipo);
   $('#membresia1').addClass('disabled')
    });

$('#cancelar').click(function(){
 
  var  tipo =  $('#negocio').val();
   consultarInformacion(tipo);
  
});


function consultarInformacion(tipo){
  
   if(tipo!=0){
   $.ajax({
      url:'finanzas',
      data:{'tipo':tipo},
      type:'post',
      success:  function (response) {
         $("#com_pro_pot_prem").val(response[10]['valor_fijo']);
         $("#com_nom_pot_prem").val(response[8]['valor_fijo']);
         $("#com_pro_pot").val(response[5]['valor_fijo']);
         $("#com_nom_pot").val(response[3]['valor_fijo']);
         $("#com_pro_int_prem").val(response[11]['valor_fijo']);
         $("#com_nom_int_prem").val(response[9]['valor_fijo']);
         $("#com_pro_int").val(response[4]['valor_fijo']);
         $("#com_nom_int").val(response[2]['valor_fijo']);
         $("#fij_pro_ven_prem").val(response[6]['valor_fijo']);
         $("#fij_nom_ven_prem").val(response[7]['valor_fijo']);
         $("#fij_pro_ven").val(response[1]['valor_fijo']);
         $("#fij_nom_ven").val(response[0]['valor_fijo']);

         $("#por_pro_ven_prem").val(response[6]['valor_porcentual']);
         $("#por_nom_ven_prem").val(response[7]['valor_porcentual']);
         $("#por_pro_ven").val(response[1]['valor_porcentual']);
         $("#por_nom_ven").val(response[0]['valor_porcentual']);



         $("#id_pro_pot_prem").val(response[10]['id']);
         $("#id_nom_pot_prem").val(response[8]['id']);
         $("#id_pro_pot").val(response[5]['id']);
         $("#id_nom_pot").val(response[3]['id']);
         $("#id_pro_int_prem").val(response[11]['id']);
         $("#id_nom_int_prem").val(response[9]['id']);
         $("#id_pro_int").val(response[4]['id']);
         $("#id_nom_int").val(response[2]['id']);
         $("#id_pro_ven_prem").val(response[6]['id']);
         $("#id_nom_ven_prem").val(response[7]['id']);
         $("#id_pro_ven").val(response[1]['id']);
         $("#id_nom_ven").val(response[0]['id']);
 
         $('#actualizar').removeClass('disabled');
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
}else{
   $("#prosfijo").val('');
         $("#venfijo").val('');
         $("#proafijo").val('');
         $("#prosporcen").val('');
         $("#venporcen").val('');
         $("#proaporcen").val('');
         $("#id1").val('');
         $("#id2").val('');
         $("#id3").val('');
         $('#actualizar').addClass('disabled')
       //  $('#actualizar').attr('disabled','true');

}
}
