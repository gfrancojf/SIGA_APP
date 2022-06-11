<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
  <a href="#" class="simple-text logo-normal">
      {{ __('.:: SIGA - HIDROVEN ::.') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
   <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Setting') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <i><img style="width:25px" src="{{ asset('material') }}/img/angular.png"></i>
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Mi Perfil') }} </span>
              </a>
            </li>

            @can('user_index')
            <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('users.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>Usuarios</p>
              </a>
            </li>
            @endcan           
            @can('permission_index')
            <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('permissions.index') }}">
                <i class="material-icons">bubble_chart</i>
                <p>{{ __('Permissions') }}</p>
              </a>
            </li>
            @endcan
            @can('role_index')
            <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="material-icons">location_ons</i>
                  <p>{{ __('Roles') }}</p>
              </a>
            </li>
            @endcan
         
          </ul>
        </div>
      </li>

   
    </ul>
  </div>
</div>
