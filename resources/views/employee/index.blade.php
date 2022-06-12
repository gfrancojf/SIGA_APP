@extends('layouts.app', ['activePage' => 'employees', 'titlePage' => 'Expedientes'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4 ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">Listado de Empleados Activos</h4>
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
                                    @can('employee_create')
                                  <a href="{{ route('employees.create') }}" class="btn btn-sm btn-twitter">Registar Oficina</a>
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
                                       
                                    </tbody>
                                
                                  
                             
                              </table>
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
