$(document).ready(function(){
    var tblEmployees =
    $('#tbl-employees').DataTable({
       
        serverSide: true,
        ajax:{
          url:   "{{route('admin.employees.index')}}"
        },
        columns:[
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data: 'area'},
            {data: 'phone'},
            {data: 'statusemp'},
            {data: 'password'},
            {data: 'url'},
            {data: 'actual'},
            {data: 'update'},
            {data: 'action'}
        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            if ( aData.statusemp == "Inactivo" ) //si la edad es menor de 40
            {
                $('td:eq(5)',nRow).css({'color':'#ff9300'});
            }else if (aData.statusemp == "Activo") {
                $('td:eq(5)',nRow).css('color','#4cff4f');

            }
        },
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        }
    })
});
