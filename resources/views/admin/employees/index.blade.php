@extends('adminlte::page')

@section('title', 'Empleados')
@section('content_header')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{route('admin.employees.index')}}" :active="request()->routeIs('index')" aria-selected="true">Empleados</a>
    </li>
    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#btn-update">Agregar</button>
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
<!--MODAL CREATE NEW EMPLOYEE-->
<div class="modal fade" id="btn-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card border-light">
                    <div class="card-body text.primary">
                        <form class="row g-6" action="{{route('admin.employees.store')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">Nombre</label>
                                <input name="name" type="name" class="form-control" placeholder="Ingresa un nombre completo">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Correo</label>
                                <input name="email" type="email" class="form-control" id="inputPassword4" placeholder="Ingresa un correo de smart tracker">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="fdetail" class="form-label">Domicilio</label>
                                <textarea class="form-control" name="address" id="idaddress" rows="1"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="lblcol" class="form-label">Colonia</label>
                                <input name="col" type="col" class="form-control" id="idcol" placeholder="Ingresa la colonia">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-9">
                                <label for="lbldeleg" class="form-label">Delegación/Municipio</label>
                                <input name="deleg" type="deleg" class="form-control" id="iddeleg" placeholder="Ingresa la delegación o municipio">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="lblcp" class="form-label">C.P</label>
                                <input name="cp" type="cp" class="form-control" id="idcp" placeholder="Ingresa el C.P">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="lblcd" class="form-label">Ciudad</label>
                                <input name="cd" type="cd" class="form-control" id="idcd" placeholder="Ingresa la ciudad">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="lbltelcel" class="form-label">Tel. Celular</label>
                                <input name="telcel" type="telcel" class="form-control" id="idtelcel" placeholder="Ingresa el número de celular">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="lbltelhome" class="form-label">Tel. Casa</label>
                                <input name="phonehome" type="text" class="form-control" id="idphonehome" placeholder="Ingresa un telefono de casa">
                            </div>
                            <div class="col-md-12">
                                <label for="lblrfc" class="form-label">RFC</label>
                                <input name="rfc" type="text" class="form-control" id="idrfc" placeholder="Ingresa el RFC">
                            </div>
                            <div class="col-md-12">
                                <label for="lblcurp" class="form-label">CURP</label>
                                <input name="curp" type="text" class="form-control" id="idcurp" placeholder="Ingresa el CURP">
                            </div>
                            <div class="col-md-12">
                                <label for="lblescivil" class="form-label">Estado Civil</label>
                                <br>
                                <select name="escivil" class="form-control">
                                    <option selected>Soltero(a)</option>
                                    <option>Casado(a)</option>
                                    <option>Viudo(a)</option>
                                    <option>Divorciado(a)</option>
                                    <option>Concubino(a)</option>
                                </select>
                            </div>
                            <div class="input-group date">
                                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>

                            <div class="col-md-4">
                                <label for="area" class="form-label">Area</label>
                                <br>
                                <select name="area" class="form-control">
                                    <option selected>TI</option>
                                    <option>Laboratorio</option>
                                    <option>RRHH</option>
                                    <option>Cobranza</option>
                                    <option>Ventas</option>
                                    <option>Control</option>
                                    <option>Monitoreo</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">Estatus</label>
                                <select name="status" class="form-control" id="status">
                                    <option selected value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputZip" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input name="password" type="password" class="form-control pwd">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <br>
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
    $(document).ready(function() {
        var tblEmployees =
            $('#tbl-employees').DataTable({

                serverSide: true,
                ajax: {
                    url: "{{route('admin.employees.index')}}"
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'area',
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'statusemp',
                    },
                    {
                        data: 'password'
                    },
                    {
                        data: 'url'
                    },
                    {
                        data: 'actual'
                    },
                    {
                        data: 'update'
                    },
                    {
                        data: 'action'
                    }
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    if (aData.statusemp == "Inactivo") {
                        $('td:eq(5)', nRow).html('<span style="background: orange; border-radius: 5px">Inactivo</span>')

                    } else if (aData.statusemp == "Activo") {
                        $('td:eq(5)', nRow).html('<span style="background: chartreuse; border-radius: 5px" >Activo</span>');
                    }
                },
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json'
                }
            })
    });
</script>

<script>
    $('.tbl-employees').on('click', function(e) {
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
</script>

<script>
</script>
@stop