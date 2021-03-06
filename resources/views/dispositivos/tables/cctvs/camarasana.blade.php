@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Cámaras Analógicas @can ('camarasanas.create') <a href="/form_camaraana"> +</a>  @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/camarasana")
                Habilitadas / <a href="/camarasana_disable">Deshabilitadas</a> / <a href="/camarasana_stock">Stock</a>
                @break
            @case("/camarasana_disable")
                <a href="/camarasana">Habilitadas</a> / Deshabilitadas / <a href="/camarasana_stock">Stock</a>
                @break
            @case("/camarasana_stock")
                <a href="/camarasana">Habilitadas</a> / <a href="/camarasana_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Afectado</th>
                <th scope="col">Grabando</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('camarasanas.only') <td><a href="/only_camaraana/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}</td>
                    <td> @if (!is_null($host->host)) @can ('dvrs.only')  <a href="/only_dvr/{{$host->host->id}}">{{$host->host->name}}</a> @else {{$host->host->name}} @endcan </td> @endif
                    <td>{{$host->modelo->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable({
                "order": [[ 0, "desc" ]]
              });
                } );
      </script>
    </div>
</div>
@endsection
