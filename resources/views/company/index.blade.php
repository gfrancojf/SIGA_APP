@extends('layouts.app', ['activePage' => 'branches', 'titlePage' => __('Dashboard')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Registro Empresas</h4>
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
                                          @can('branch_create')
                                          <a href="{{ route('branches.create') }}" class="btn btn-sm">Añadir Empresas</a>
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
                                                @if (count($branches) > 0)
                                                    @foreach ($branches as $branch)
                                                        <tr>
                                                            <td> {{ $branch->id }} </td>
                                                            <td> {{ $branch->name }}</td>
                                                            <td class="td-actions text-right">
                                                                <a href="{{ route('branches.edit', $branch->id) }}"
                                                                    class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                                <form action="{{ route('branches.destroy', $branch->id) }}" method="post"
                                                                    style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger btn-circle btn-sm" type="submit"
                                                                        onclick="return confirm('¿Seguro que deseas eliminar este registro?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                                  </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>



















    @endsection
