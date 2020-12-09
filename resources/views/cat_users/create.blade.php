@extends('adminlte::page')

@section('title', 'Usuarios')
@section('content_header')
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" href=" {{route('user')}}" :active="request()->routeIs('user')" aria-selected="true">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('create')}}" :active="request()->routeIs('create')" aria-selected="false">Crear</a>
  </li>
</ul>
@stop
@section('content')
<div class="card">
  <div class="card-body">
    <form action="" method="post">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputEmail4">Nombre</label>
          <input type="name" class="form-control" id="inputEmail4" placeholder="Ingresa el nombre">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Correo</label>
          <input type="email" class="form-control" id="inputPassword4" placeholder="Ingresa un correo">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputState">Área</label>
          <select id="inputState" class="form-control">

            <option selected>TI</option>
            <option>Cobranza</option>

          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="inputAddress">Teléfono</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Ingresa un numero telefónico">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Estatus</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Activo, Inactivo, Pendiente">
        </div>
      </div>
      <div class="form-group">
      </div>
      <button type="submit" class="btn btn-primary">Agregar</button>
      <div>
      </div>
      @stop

      @section('css')
      <link rel="stylesheet" href="/css/admin_custom.css">
      @stop


      @section('js')

      @stop