<li class="menu-title">Menu</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{url('home')}}" class="waves-effect"><i class="mdi mdi-home"></i><span> Dashboard <span class="badge badge-primary pull-right">1</span></span></a>
</li>
@can('proyectos-list')
<li>
    <a href="{{route('proyectos.index')}}" class="waves-effect"><i class="mdi mdi-basket"></i><span> Proyectos <span class="badge badge-primary pull-right">NEW</span></span></a>
</li>
@endcan


<li class="has_sub">
  @php
  if( Request::is('catpaisdivisions*') || Request::is('catareaciudads*') || Request::is('contratistas*')  ) {
      $varActive = "active";
  } else {
    $varActive = "";
  }
  @endphp
    <a href="javascript:void(0);" class="waves-effect {{$varActive}}"><i class="mdi mdi-assistant"></i><span> Catálogos </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
    <ul class="list-unstyled">
        @can('catpaisdivisions-list')
        <li class="{{ Request::is('catpaisdivisions*') ? 'active' : '' }}"><a href="{{route('catpaisdivisions.index')}}">País División</a></li>
        @endcan
        @can('catareaciudads-list')
        <li class="{{ Request::is('catareaciudads*') ? 'active' : '' }}"><a href="{{route('catareaciudads.index')}}">Área Ciudad</a></li>
        @endcan
        @can('contratistas-list')
        <li class="{{ Request::is('contratistas*') ? 'active' : '' }}"><a href="{{route('contratistas.index')}}">Contratistas</a></li>
        @endcan
        @can('catproductos-list')
        <li class="{{ Request::is('catproductos*') ? 'active' : '' }}"><a href="{{route('catproductos.index')}}">Productos</a></li>
        @endcan
    </ul>
</li>

<li class="has_sub">
  @hasrole('administrador')
    @php
    if( Request::is('user*') || Request::is('permissions*') || Request::is('roles*')  ) {
        $varActive = "active";
    } else {
      $varActive = "";
    }
    @endphp
    <a href="javascript:void(0);" class="waves-effect {{$varActive}}"><i class="mdi mdi-album"></i> <span> Configuración </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
    <ul class="list-unstyled">
        <li class="{{ Request::is('user*') ? 'active' : '' }}"><a href="{{url('user')}}">Usuarios</a></li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{url('roles')}}">Roles</a></li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}"><a href="{{url('permissions')}}">Permisos</a></li>
    </ul>
</li>
@endhasrole
