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

 