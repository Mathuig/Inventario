@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Agregar Abonado</div>
        <div class="card-body">
          <form action="/add_abonado" method="post" name="form">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="type">Número</label>
                <input type="text" class="form-control uppercase" name="numero" required>
              </div>
              <div class="form-group col-md-4">
                <label for="departament_id">Departamento/Cliente </label> <a href="/departaments" target=_blank> +</a>
                <select class="form-control" name="departament_id" required>
                  <option value="">- - - Seleccione - - -</option>
                  @foreach ($departaments as $departament)
                  <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="cliente_id">Plataforma</label> <a href="/plataformas" target=_blank>+</a>
                <select class="form-control" name="plataforma_id" required>
                  <option value="">- - - Seleccione - - -</option>
                  @foreach ($plataformas as $plataforma)
                  <option value="{{$plataforma->id}}">{{$plataforma->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="cliente_id">Tipo de abonado</label> <a href="/abonado_types" target=_blank>+</a>
                <select class="form-control" name="abonadotype_id" required>
                  <option value="">- - - Seleccione - - -</option>
                  @foreach ($abonado_types as $abonado_type)
                  <option value="{{$abonado_type->id}}">{{$abonado_type->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" required>
              </div>
              <div class="form-group col-md-4">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" required>
              </div>
              <div class="form-group col-md-2">
                <label for="localidad">Localidad</label>
                <input type="text" class="form-control" name="localidad" required>
              </div>
              <div class="form-group col-md-2">
                <label for="localidad">Teléfono</label>
                <input type="number" min="10000" class="form-control" name="telefono" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="partido">Partido</label>
                <input type="text" class="form-control" name="partido" required>
              </div>
              <div class="form-group col-md-3">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" name="provincia" required>
              </div>
              <div class="form-group col-md-3">
                <label for="cp">Código Postal</label>
                <input type="number" min=1 class="form-control" name="cp" required>
              </div>
              <div class="form-group col-md-3">
                <label for="partido">Palabra Clave</label>
                <input type="text" class="form-control uppercase" name="palabra_clave" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" min="10" class="form-control" name="comentario"> </textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-dark">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
