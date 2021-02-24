@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.employees.index')}}" :active="request()->routeIs('admin.employes.index')" aria-selected="false">Empleados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{route('admin.employees.create')}}" :active="request()->routeIs('admin.employees.create')" aria-selected="true">Crear</a>
    </li>
</ul>
@stop

@section('content')
<div class="card border-light">
    <div class="card-body text.primary">
        <form class="row g-3" action="{{route('admin.employees.store')}}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nombre</label>
                <input name="name" type="name" class="form-control" placeholder="Ingresa un nombre completo">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Correo</label>
                <input name="email" type="email" class="form-control" id="inputPassword4" placeholder="Ingresa un correo de smart tracker">
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
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
                <label for="telefono" class="form-label">Teléfono</label>
                <input name="phone" type="text" class="form-control" id="inputAddress2" placeholder="Ingresa un número telefónico">
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

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script>
<script>
    var slcchange = document.getElementById("status");
    slcchange.addEventListener("change", function() {})
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@stop