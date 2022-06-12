@extends('layouts.app', ['activePage' => 'departaments', 'titlePage' => __('departaments')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Lista de Gerencias</h4>
                                    <p class="card-category"></p>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                      {{ session('success') }}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                          @can('departament_create')
                                          <a href="{{ route('departaments.create') }}" class="btn btn-sm btn-twitter">Registar Oficina</a>
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
                                            <tbody>
                                                @if (count($departaments) > 0)
                                                    @foreach ($departaments as $departament)
                                                        <tr>
                                                            <td> {{ $departament->id }} </td>
                                                            <td> {{ $departament->name }}</td>
                                                            <td class="td-actions text-right">
                                                                <a href="{{ route('departaments.edit', $departament->id) }}"
                                                                    class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></i></a>
                                                                <form action="{{ route('departaments.destroy', $departament->id) }}" method="post"
                                                                    style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger btn-circle btn-sm" type="submit"
                                                                        onclick="return confirm('¿Seguro que deseas eliminar este registro?')"> <i class="fa fa-trash" aria-hidden="true"></i></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                            @else
                                            <tbody>
                                                <tr>
                                                    <td align="center" colspan="3">
                                                        <h6>NO SE ENCONTRARON REGISTROS</h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endif
                                     
                                      </table>
                                    </div>
                                    <div class="card-footer mr-auto">
                                        {{ $departaments->links() }}
                                      </div>
                                  </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>



















    @endsection
