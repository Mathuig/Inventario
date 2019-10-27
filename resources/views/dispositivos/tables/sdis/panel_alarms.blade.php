@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h1>Paneles de alarma @can ('panelalarms.create') <a href="/form_panel_alarm"> +</a>  @endcan</h1>
            <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
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
                    @can ('panelalarms.only') <td><a href="/only_panel_alarm/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->abonado->numero}}</td>
                    <td>{{$host->abonado->cliente->name}}</td>
                    <td>{{$host->cantzona}}</td>
                    <td>{{$host->modelo->name}}</td>
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
