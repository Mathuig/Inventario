@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">{{$host->name}}</div>
        <div class="card-body">
          <form action="/edit_comunicator/{{$host->id}}" method="get" name="form-edit">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" value="{{$host->name}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" value="{{$host->modelo->name}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="serial">Serial</label>
                <input type="text" class="form-control" value="{{$host->serial}}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">SIM I</label>

                <input type="text" class="form-control" id="name" value=@if (!is_null($host->sim_i))
                {{$host->sim_i->line_phone}} @else "" @endif readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="modelo">SIM II</label>
                <input type="text" class="form-control" id="modelo" value=@if (!is_null($host->sim_ii))
                {{$host->sim_ii->line_phone}} @else "" @endif readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="serial">SIM III</label>
                <input type="text" class="form-control" id="serial" value=@if (!is_null($host->sim_iii))
                {{$host->sim_iii->line_phone}} @else "" @endif readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="cctv">Conectado</label>
                <input type="text" class="form-control"
                  value="{{$host->host->id}} - AB: {{$host->host->abonado->numero}} - C: {{$host->host->abonado->departament->cliente->name}}"
                  name="zona" readonly>
              </div>
              <div class="form-group col-md-5">
                <label for="cctv">Ubicacion</label>
                <input type="text" class="form-control" value="{{$host->zona}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" value="{{$host->valor}}" name="valor" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" class="form-control" id="comentario"
                  readonly>{{$host->comentario}} </textarea>
              </div>
            </div>
            @can ('comunicators.edit') <button class="btn btn-dark">Modificar</button> @endcan
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
