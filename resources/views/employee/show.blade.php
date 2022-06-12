@extends('layouts.app', ['activePage' => 'employees', 'titlePage' => 'Expedientes'])
@section('content')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $employee->name }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $employee->dni }}
                        </div>
                        <div class="form-group">
                            <strong>First Lastname:</strong>
                            {{ $employee->first_lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Second Lastname:</strong>
                            {{ $employee->second_lastname }}
                        </div>
                        <div class="form-group">
                            <strong>Birthday:</strong>
                            {{ $employee->birthday }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $employee->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $employee->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Cell Phone:</strong>
                            {{ $employee->cell_phone }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $employee->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departament Id:</strong>
                            {{ $employee->departament_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Admission:</strong>
                            {{ $employee->date_of_admission }}
                        </div>
                        <div class="form-group">
                            <strong>Date Of Egress:</strong>
                            {{ $employee->date_of_egress }}
                        </div>
                        <div class="form-group">
                            <strong>Files:</strong>
                            {{ $employee->files }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
