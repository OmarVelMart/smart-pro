@extends('adminlte::page')

@section('title', 'Computadoras')
@section('content_header')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="" :active="request()->routeIs('user')" aria-selected="true">Computadoras</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="" :active="request()->routeIs('create')" aria-selected="false">Subir</a>
    </li>
</ul>
@stop
@section('content')
    <div class="card">
        <div class="card-body text.primary">
            <div class="row">
                <div class="col">
                    <table id="computadora" class="table table-striped table-bordered display nowrap small" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Cpu</th>
                                <th>Ram</th>
                                <th>Rom</th>
                                <th>Version Office</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Cantidad</th>
                                <th>Condición</th>
                                <th>Detalles</th>
                                <th>Area</th>
                                <th>Estatus</th>
                                <th>Usuario asignado</th>
                                <th>Alta</th>
                                <th>Actualizado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compu as $pc)
                            <tr>
                                <td>{{$pc->id}}</td>
                                <td>{{$pc->type}}</td>
                                <td>{{$pc->cpu}}</td>
                                <td>{{$pc->ram}}</td>
                                <td>{{$pc->storage}}</td>
                                <td>{{$pc->version_office}}</td>
                                <td>{{$pc->model}}</td>
                                <td>{{$pc->mark}}</td>
                                <td>{{$pc->quantity}}</td>
                                <td>{{$pc->condition}}</td>
                                <td>{{$pc->details}}</td>
                                <td>{{$pc->area}}</td>
                                <td>{{$pc->status}}</td>
                                <td>{{$pc->employees->name}}</td>
                                <td>{{$pc->created_at}}</td>
                                <td>{{$pc->updated_at}}</td>
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
<script>
    $('#computadora').DataTable({
        "autoWidth": true,
        responsive: true,
        fixedColumns: {
        leftColumns: 10
    },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
        }
        
        
    });
</script>
@stop