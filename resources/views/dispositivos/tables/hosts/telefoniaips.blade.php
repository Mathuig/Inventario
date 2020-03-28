@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Telefonía IP @can ('phoneips.create') <a href="/form_telefonoip"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/telefoniaip")
                Habilitadas / <a href="/telefoniaip_disable">Deshabilitadas</a> / <a href="/telefoniaip_stock">Stock</a>
                @break
            @case("/telefoniaip_disable")
                <a href="/telefoniaip">Habilitadas</a> / Deshabilitadas / <a href="/telefoniaip_stock">Stock</a>
                @break
            @case("/telefoniaip_stock")
                <a href="/telefoniaip">Habilitadas</a> / <a href="/telefoniaip_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP Address</th>
                <th scope="col">Interno</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('phoneips.only') <td><a href="/only_telefonoip/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>@endcan
                    <td>{{$host->ip_local}}</td>
                    <td>{{$host->interno}}</td>
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
