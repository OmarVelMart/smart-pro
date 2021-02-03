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
@if(session('info'))
<div id="deleted-employee" class="alert alert-success">
<strong>{{session('info')}}</strong>
</div>

@endif
<div class="card border-light">
    <div class="card-body text.primary">
        <div class="row">
            <div class="col">
                <table id="empleados" class="table table-striped table-bordered table-responsive nowrap small" style="width:100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Área</th>
                            <th>Teléfono</th>
                            <th>Estatus</th>
                            <th>Contraseña</th>
                            <th>Alta</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emp as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->area}}</td>
                            <td>{{$employee->phone}}</td>
                            <td id="employee-status">{{$employee->status}}</td>
                            <td>{{$employee->password}}</td>
                            <td>{{$employee->created_at}}</td>
                            <td>{{$employee->updated_at}}</td>
                            <td>
                                <form action="{{route('admin.employees.destroy', $employee)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-outline-info btn-sm fas fa-edit" href="{{route('admin.employees.edit',$employee)}}"></a>
                                <button onclick="alert()" type="submit" class="btn btn-outline-danger btn-sm fas fa-trash-alt"></button>
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

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


<script>
    $('#empleados').DataTable({
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        }
    });
    
   var status = document.getElementById("employee-status").innerText;
    if (status == 1) {
        document.getElementById("employee-status").innerHTML = "Activo";
    }else if (status == 0) {
        document.getElementById("employee-status").innerHTML = "Inactivo";
    } 

    function alert(){
        var message;
        var option = confirm("¿Esta seguro de eliminar este empleado?");
        if (option == true){
            message = "El emplado se ha eliminado correctamente";
        } else {
            message = "Decida su eleccion"
        }

        document.getElementById("deleted-employee").innerHTML = message;

    }


    
</script>
@stop