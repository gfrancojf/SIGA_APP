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
                                        <a href="{{ route('employees.create') }}" class="btn btn-sm btn-twitter">Registar
                                            Oficina</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Nombre </th>
                                            <th>Cedula</th>
                                            <th>Gender</th>
                                            <th>Company Id</th>
                                            <th>Departament Id</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->dni }}</td>

                                                <td>{{ $employee->birthday }}</td>
                                                <td>{{ $employee->gender }}</td>

                                                <td>{{ $employee->company_id }}</td>
                                                <td>{{ $employee->departament_id }}</td>
                                                <td>
                                                    <form action="{{ route('employees.destroy', $employee->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('employees.show', $employee->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('employees.edit', $employee->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer mr-auto">
                            {!! $employees->links() !!}
                        </div>
                    </div>

                </div>
            </div>
            
        </div>

    </div>
@endsection
