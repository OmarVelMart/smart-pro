@extends('adminlte::page')

@section('title', 'Computadoras')
@section('content_header')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="" :active="request()->routeIs('user')" aria-selected="true">Computadoras</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('admin.computers.create')}}" :active="request()->routeIs('create')" aria-selected="false">Subir</a>
    </li> -->
    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#btn-update">Agregar</button>
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
<!--Modal Update Computers-->
<div class="modal fade" id="btn-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Computadora</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card border-light">
                    <div class="card-body text.primary">
                        <form class="row g-3" action="{{route('admin.computers.store')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label for="area" class="form-label">Tipo</label>
                                <br>
                                <select name="type" class="custom-select">
                                    <option selected>PC</option>
                                    <option>Laptop</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="fcpu" class="form-label">CPU</label>
                                <input name="cpu" type="text" class="form-control" id="inputPassword4" placeholder="Ingresa el CPU">
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="fram" class="form-label">RAM</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="ram" class="custom-select">
                                        <option selected>2</option>
                                        <option>4</option>
                                        <option>6</option>
                                        <option>8</option>
                                        <option>16</option>
                                        <option>32</option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">GB</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="from" class="form-label">ROM</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="storage" class="custom-select">
                                        <option selected>120</option>
                                        <option>240</option>
                                        <option>320</option>
                                        <option>500</option>
                                        <option>980</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <select class="custom-select">
                                            <option selected>GB</option>
                                            <option>TB</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="fvoffice" class="form-label">Version Office</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="version_office" class="custom-select">
                                        <option selected>2013</option>
                                        <option>2016</option>
                                        <option>2019</option>
                                        <option>365</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="fmodel" class="form-label">Modelo</label>
                                <input name="model" type="text" class="form-control" placeholder="Modelo de PC/Laptop">
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="fmark" class="form-label">Marca</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="mark" class="custom-select">
                                        <option selected>Lenovo</option>
                                        <option>HP</option>
                                        <option>Acer</option>
                                        <option>Apple</option>
                                        <option>Toshiba</option>
                                        <option>Dell</option>
                                        <option>Asus</option>
                                        <option>Samsung</option>
                                        <option>Gateway</option>
                                        <option>Sony</option>
                                        <option>MSI</option>
                                        <option>LG</option>
                                        <option>Lanix</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="fquntity" class="form-label">Cantidad</label>
                                <input name="quantity" type="text" class="form-control" placeholder="Cantidad">
                            </div>
                            <div class="col-md-12">
                                <label for="fcondition" class="form-label">Condición</label>
                                <textarea class="form-control" name="condition" id="idcondition" rows="2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="fdetail" class="form-label">Detalles</label>
                                <textarea class="form-control" name="details" id="iddetail" rows="2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="farea" class="form-label">Area</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="area" class="custom-select">
                                        <option selected>TI</option>
                                        <option>Laboratorio</option>
                                        <option>RRHH</option>
                                        <option>Cobranza</option>
                                        <option>Ventas</option>
                                        <option>Control</option>
                                        <option>Monitoreo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="fstatus" class="form-label">Estatus</label>
                                <select name="status" class="form-control" id="status">
                                    <option selected value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                </div>
                                <label for="fuserassign" class="form-label">Asignar Usuario</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select name="employees_id" class="custom-select">
                                        @foreach ($empl as $employee)
                                        <option selected>{{$employee->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
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