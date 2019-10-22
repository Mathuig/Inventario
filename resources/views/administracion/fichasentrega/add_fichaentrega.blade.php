@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Generar entrega de equipamiento tecnologico <span style="float:right;color:red;font-weight: bold;">{{$last}}</span></div>
            <div class="card-body">
                <form action="/add_ficha_entrega" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-9">
                      <label for="user_host_id">Usuario</label>
                      <select class="form-control" name="user_host_id">
                        @foreach ($userhosts as $userhost)
                          <option value="{{$userhost->id}}">{{$userhost->name}} {{$userhost->apellido}} | {{$userhost->departament->name}} - {{$userhost->departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="serial">Fecha de entrega</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                  </div>
                  <div class="card-header">Detalle de la entrega</div>
                  <table class="table table-hover" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width:15%">Cant</th>
                        <th scope="col"style="width:40%">Marca/Modelo/SN</th>
                        <th scope="col"style="width:55%">Observaciones</th>
                      </tr>
                    </thead>
                    <tbody>
                          @for ($i=0; $i <= 4; $i++)
                          <tr>
                            <td><input type="number" class="form-control" id="cantidad_01" placeholder="" name="detalle[{{ $i }}][cantidad]" ></td>
                            <td><select class="form-control" name="detalle[{{ $i }}][host_id]">
                              <option value=""></option>
                                @foreach ($hosts as $host)
                                  <option value="{{$host->id}}">{{$host->modelo->name}} |  {{$host->modelo->marca}}  |  {{$host->serial}}</option>
                                @endforeach
                              </select></td>
                            <td><input type="text"  class="form-control" id="obs_01" placeholder="" name="detalle[{{ $i }}][obs]" ></td>
                          </tr>
                           @endfor
                    </tbody>
                  </table>
                  <input type="text" class="form-control" value=1 name="reddi" hidden>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>
@endsection