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
                        <form method="POST" action="{{ route('employees.update', $employee->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('employee.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
