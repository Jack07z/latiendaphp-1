@extends('layouts.principal')

@section('contenido')
    <form class="col s8">
        <div class="row">
            <div class="col s8">
                <h1 class="blue-text text-darken-2">
                    Nuevo Producto
                </h1>
            </div>
        </div>
      <div class="row">
        <div class="input-field col s8">
          <input placeholder="Nombre del producto" 
          id="nombre" 
          type="text" 
          class="validate">
          <label for="nombre">
              Nombre del producto
            </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input
          id="desc" 
          type="text" 
          class="validate">
          <label for="desc">Descripcion</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number" 
          class="validate">
          <label for="precio">Precio</label>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option>
              Elija su marca
            </option>
            @foreach($marca as $marca)
            <option>{{ $marca->nombre }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
      <div class="file-field input-field">
      <div class="btn">
        <span>Ingrese Imagen...</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" 
        type="text">
      </div>
      </div>
      <div class="row">
        <div class="col s12">
        <a class="waves-effect waves-light btn">Guardar</a>
          </div>
        </div>
    </form>
  @endsection