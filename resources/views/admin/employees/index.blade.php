@extends('adminlte::page')

@section('title', 'Empleados')
@section('content_header')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('admin.employees.index')}}" :active="request()->routeIs('index')" aria-selected="true">Empleados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.employees.create')}}" :active="request()->routeIs('create')" aria-selected="false">Crear</a>
    </li>
</ul>
@stop
@section('content')
<div class="card border-light">
    <div class="card-body text.primary">
        <div class="row">
            <div class="col">
                <table id="tbl-employees" class="table table-striped table-bordered nowrap small" style="width:100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Área</th>
                            <th>Teléfono</th>
                            <th>Estatus</th>
                            <th>Contraseña</th>
                            <th>Foto</th>
                            <th>Alta</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src=" https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js "></script>
<script src=" https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js "></script>

@if(session('eliminar') == 'ok')
<script>
    Swal.fire(
        '¡Eliminado!',
        'El empleado se eliminó con éxito.',
        'success',
    )
</script>

@endif
@if(session('guardado') == 'ok')
<script>
    Swal.fire(
        '¡Guardado!',
        'El empleado se guardo con éxito.',
        'success',
    )
</script>

@endif



<script>
$(document).ready(function(){
    var tblEmployees =
    $('#tbl-employees').DataTable({
        processing: true,
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
            {data: 'status'},
            {data: 'password'},
            {data: 'url'},
            {data: 'actual'},
            {data: 'update'},
            {data: 'action'}
        ],
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        }
    })

});

</script>

<script>
    $('.tbl-employees').on('click',function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro de eliminar a este empleado?',
            text: "¡La acción ya no podra ser revertida!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        })
    })

    
$datos = document.getElementById('tbl-employees').getElementsByTagName('td')[5].innerHTML;
console.log($datos);

</script>
@stop