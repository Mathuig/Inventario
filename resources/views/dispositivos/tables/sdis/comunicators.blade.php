@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h1>Comunicadores <a href="/form_comunicator"> +</a></h1>
            <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Panel</th>
                <th scope="col">Abonado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Zonas</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    <td><a href="/only_comunicator/{{$host->id}}">{{$host->name}}</a></td>
                    <td><a href="/only_panel_alarm/{{$host->host->id}}">{{$host->host->name}}</td>
                    <td>{{$host->host->abonado->numero}}</td>
                    <td>{{$host->host->abonado->cliente->name}}</td>
                    <td>{{$host->cantzona}}</td>
                    <td>{{$host->host->modelo->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>


      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
