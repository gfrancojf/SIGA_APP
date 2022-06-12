@extends('layouts.app', ['activePage' => 'users', 'titlePage' => 'Nuevo usuario'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
       
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuario</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">

            
                <form method="POST" action="{{ route('employees.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                            @include('employee.form')


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 



@endsection
