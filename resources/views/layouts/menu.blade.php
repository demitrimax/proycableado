<li class="menu-title">Menu</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{url('home')}}" class="waves-effect"><i class="mdi mdi-home"></i><span> Dashboard <span class="badge badge-primary pull-right">1</span></span></a>
</li>
@can('proyectos-list')
<li>
    <a href="{{route('proyectos.index')}}" class="waves-effect"><i class="mdi mdi-bookmark-check"></i><span> Proyectos <span class="badge badge-primary pull-right">NEW</span></span></a>
</li>
@endcan
@can('tareas-list')
<li class="{{ Request::is('tareas*') ? 'active' : '' }}">
    <a href="{!! route('tareas.index') !!}"><i class="mdi mdi-checkbox-marked-circle"></i><span>Tareas {!! $nuevastareas->count()>0 ? '<span class="badge badge-primary pull-right">'.$nuevastareas->count().'</span></a>' : '' !!}</span></a>
</li>
@endcan
@can('asistencia')
<li class="{{ Request::is('asistencia*') ? 'active' : '' }}">
    <a href="{!! route('asistencia') !!}"><i class="mdi mdi-book-minus"></i><span>Asistencia </span></a>
</li>
@endcan

<li class="has_sub">
  @php
  if( Request::is('inventario*') || Request::is('productos*') || Request::is('categorias*')
      || Request::is('bodegas*') || Request::is('clientes*') ) {
      $varActive = "active";
  } else {
    $varActive = "";
  }
  @endphp
    <a href="javascript:void(0);" class="waves-effect {{$varActive}}"><i class="mdi mdi-cube"></i><span> Inventario </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
    <ul class="list-unstyled">
        @can('productos-list')
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{{route('productos.index')}}">Productos</a></li>
        @endcan
        @can('categorias-list')
        <li class="{{ Request::is('categorias*') ? 'active' : '' }}"><a href="{{route('categorias.index')}}">Categorias</a></li>
        @endcan
        @can('bodegas-list')
        <li class="{{ Request::is('bodegas*') ? 'active' : '' }}"><a href="{{route('bodegas.index')}}">Bodegas</a></li>
        @endcan
        @can('clientes-list')
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}"><a href="{{route('clientes.index')}}">Clientes</a></li>
        @endcan

    </ul>
</li>


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
        @can('documentos-list')
        <li class="{{ Request::is('documentos*') ? 'active' : '' }}">
            <a href="{!! route('documentos.index') !!}"><span>Documentos</span></a>
        </li>
        @endcan
        @can('empleados-list')
        <li class="{{ Request::is('empleados*') ? 'active' : '' }}">
            <a href="{!! route('empleados.index') !!}"><span>Empleados</span></a>
        </li>
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
