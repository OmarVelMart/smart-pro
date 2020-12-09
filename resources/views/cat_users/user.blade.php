@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content_header')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href=" {{route('user')}}" :active="request()->routeIs('user')" aria-selected="true">Usuarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('create')}}" :active="request()->routeIs('create')" aria-selected="false">Crear</a>
    </li>
</ul>
@stop
@section('content')
<div class="card">
    <div class="card-body">
        <table id="usuarios" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Área</th>
                    <th>Teléfono</th>
                    <th>Estatus</th>
                    <th>Alta</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->area}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm fas fa-edit"></button>
                        <button class="btn btn-outline-danger btn-sm fas fa-trash-alt"></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
    $('#usuarios').DataTable({
        responsive: true
    });
</script>
@stop