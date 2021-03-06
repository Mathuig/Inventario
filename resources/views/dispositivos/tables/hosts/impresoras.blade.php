@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Impresoras @can ('impresoras.create') <a href="/form_impresora"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/impresoras")
                Habilitadas / <a href="/impresoras_disable">Deshabilitadas</a> / <a href="/impresoras_stock">Stock</a>
                @break
            @case("/impresoras_disable")
                <a href="/impresoras">Habilitadas</a> / Deshabilitadas / <a href="/impresoras_stock">Stock</a>
                @break
            @case("/impresoras_stock")
                <a href="/impresoras">Habilitadas</a> / <a href="/impresoras_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP address</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('impresoras.only') <td><a href="/only_impresora/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                    <td>{{$host->ip_local}}</td>
                    <td>{{$host->departament->name}} - {{$host->departament->cliente->name}}</td>
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
