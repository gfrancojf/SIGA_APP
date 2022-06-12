@extends('layouts.app', ['activePage' => 'departaments', 'titlePage' => 'Oficinas'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('departaments.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Registrar  Oficina</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
                   <div class="row">
                <label for="name" 
                class="col-sm-2 col-form-label">Nombre de la Oficina</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="name" 
                  placeholder="Ingrese su nombre de la Oficina" 
                  value="{{ old('name') }}" autofocus>
                  @if ($errors->has('name'))
                    <span class="error text-danger" 
                    for="input-name">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              </div>
            
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
