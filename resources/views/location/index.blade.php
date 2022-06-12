@extends('layouts.app', ['activePage' => 'locations', 'titlePage' => 'Estanterias'])
@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Estanterias</h4>
                    <p class="card-category">Registro de Las Estanterias</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        @can('location_create')
                        <a href="{{ route('locations.create') }}" class="btn btn-sm btn-facebook">Añadir Ubicacion</a>
                        @endcan
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          <th>Nombre</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($locations as $locations)
                            <tr>
                              <td>{{ $locations->id }}</td>
                       <td>{{ $locations->name }}</td>
                            
                             
                              <td>
                              
                              <td class="td-actions text-right">
                             
                                @can('location_edit')
                                <a href="{{ route('locations.edit', $locations->id) }}" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                @endcan
                                @can('locations_destroy')
                                <form action="{{ route('locations.destroy', $locations->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer mr-auto">
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
