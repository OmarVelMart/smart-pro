@extends('adminlte::page')

@section('title', 'Computadoras')

@section('content_header')
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.computers.index')}}" :active="request()->routeIs('user')" aria-selected="true">Computadoras</a>
    </li>
   <!--  <li class="nav-item">
        <a class="nav-link active" href="{{route('admin.computers.create')}}" :active="request()->routeIs('create')" aria-selected="false">Subir</a>
    </li> -->
</ul>
@stop

@section('content')
<div class="card border-light">
    <div class="card-body text.primary">
        <form class="row g-3" action="{{route('admin.computers.store')}}" method="post">
            @csrf
            <div class="col-md-3">
                <label for="area" class="form-label">Tipo</label>
                <br>
                <select name="type" class="custom-select">
                    <option selected>PC</option>
                    <option>Laptop</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="fcpu" class="form-label">CPU</label>
                <input name="cpu" type="text" class="form-control" id="inputPassword4" placeholder="Ingresa el CPU">
            </div>
            <div class="col-md-3">
                <div class="input-group">
                </div>
                <label for="fram" class="form-label">RAM</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select name="fram" class="custom-select">
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

            <div class="col-md-3">
                <div class="input-group">
                </div>
                <label for="from" class="form-label">ROM</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select name="fram" class="custom-select">
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
            <div class="col-md-3">
                <div class="input-group">
                </div>
                <label for="fvoffice" class="form-label">Version Office</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select name="fram" class="custom-select">
                        <option selected>2013</option>
                        <option>2016</option>
                        <option>2019</option>
                        <option>365</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label for="fmodel" class="form-label">Modelo</label>
                <input name="model" type="text" class="form-control"  placeholder="Modelo de PC/Laptop">
            </div>
            <div class="col-md-3">
                <div class="input-group">
                </div>
                <label for="fmarca" class="form-label">Marca</label>
                <div class="input-group mb-2 mr-sm-2">
                    <select name="fmarca" class="custom-select">
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
            <div class="col-md-3">
                <label for="fquntity" class="form-label">Cantidad</label>
                <input name="quantity" type="text" class="form-control" placeholder="Cantidad">
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
    console.log('Hi!');
</script>
@stop