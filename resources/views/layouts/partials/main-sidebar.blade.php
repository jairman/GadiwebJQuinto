
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('panel.index')}}" class="brand-link">
    <img src="/panel/img/logo.png" alt="logomarca" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!--img src="/panel/img/profile.png" class="img-circle elevation-2" alt="User Image"-->
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"            data-accordion="false">


        @if(auth()->user()->can('edit', [App\User::class, auth()->user()]))
        <li class="nav-item has-treeview menu-close">
          <a class="nav-link {{ (Route::currentRouteName() == 'panel.Registro.index' || Route::currentRouteName() == 'panel.Registro.show') ? 'active' : ''}}"
            href="#">
            <i class="nav-icon fas fa-server blue"></i>
            <p>
              Reportes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link {{ (Route::currentRouteName() == 'panel.Registro.index') ? 'active' : ''}}" href="{{route('panel.Registro.index')}}">
                <i class="nav-icon fas fa-car blue"></i>
                <p>Por Marcas </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Route::currentRouteName() == 'panel.Registro.show') ? 'active' : ''}}" href="{{route('panel.Registro.show', $item='1')}}">
                <i class="nav-icon fas  fa-list-ul blue"></i>
                <p>General</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

           @if(auth()->user()->can('edit', [App\User::class, auth()->user()]))
        <li class="nav-item has-treeview menu-close">
          <a class="nav-link {{ (Route::currentRouteName() == 'panel.Clientes.index' || Route::currentRouteName() == 'panel.categoria.index') ? 'active' : ''}}"
            href="#">
            <i class="nav-icon fas fa-cogs blue"></i>
            <p>
              Administración
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link {{ (Route::currentRouteName() == 'panel.Clientes.index') ? 'active' : ''}}" href="{{route('panel.Clientes.index')}}">
                <i class="nav-icon fas fa-user blue"></i>
                <p>Clientes </p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (Route::currentRouteName() == 'panel.Marca.index') ? 'active' : ''}}" href="{{route('panel.Marca.index')}}">
                <i class="nav-icon fas  fa-list-ul blue"></i>
                <p>Marcas</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
      
       
        <li class="nav-item">
          <a href="{{route('panel.Registro.create')}}"
            class="nav-link {{ (Route::currentRouteName() == 'panel.Registro.create') ? 'active' : ''}}">
            <i class="nav-icon fas fa-car  blue"></i>
            <p>
              Registro
            </p>
          </a>
        </li>
       
       <li class="nav-item">
          <a href="{{route('panel.Clientes.show', $item='1')}}"
            class="nav-link {{ (Route::currentRouteName() == 'panel.Clientes.show') ? 'active' : ''}}">
            <i class="nav-icon fas fa-user blue"></i>
            <p>
              Demo
            </p>
          </a>
        </li>

        @if(auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-power-off red"></i>
            <p>
              {{ __('Logout') }}
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @endif







      </ul>
    </nav>

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


