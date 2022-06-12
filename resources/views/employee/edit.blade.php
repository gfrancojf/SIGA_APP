@extends('layouts.app', ['activePage' => 'employees', 'titlePage' => 'Editar Oficina'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('employees.update', $employees->id) }}" method="post" class="form-horizontal">
          @csrf
          @method('PUT')
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">Oficinas</h4>
              <p class="card-category">Editar datos</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ $employees->name }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Dirección</label>
                        <input type="text" class="form-control" name="address" value="{{ $employees->address }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Teléfono</label>
                        <input type="text" class="form-control" name="phone" value="{{ $employees->phone }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Correo Electrónico</label>
                        <input type="text" class="form-control" name="email" value="{{ $employees->email }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Cargo</label>
                        <input type="text" class="form-control" name="position" value="{{ $employees->position }}">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
            
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
