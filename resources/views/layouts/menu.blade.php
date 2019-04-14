<li class="menu-title">Menu</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{url('home')}}" class="waves-effect"><i class="mdi mdi-home"></i><span> Dashboard <span class="badge badge-primary pull-right">1</span></span></a>
</li>

<li>
    <a href="calendar.html" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Calendar <span class="badge badge-primary pull-right">NEW</span></span></a>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-assistant"></i><span> Catálogos </span><span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
    <ul class="list-unstyled">
        @can('catpaisdivisions-list')
        <li class="{{ Request::is('catpaisdivisions*') ? 'active' : '' }}"><a href="{{route('catpaisdivisions.index')}}">País División</a></li>
        @endcan
        <li><a href="layouts-smallmenu.html">Menu Small</a></li>
        <li><a href="layouts-menu2.html">Menu Style 2</a></li>
    </ul>
</li>
@hasrole('administrador')
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> Configuración </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
    <ul class="list-unstyled">
        <li class="{{ Request::is('user*') ? 'active' : '' }}"><a href="{{url('user')}}">Usuarios</a></li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{url('roles')}}">Roles</a></li>
        <li class="{{ Request::is('permissions*') ? 'active' : '' }}"><a href="{{url('permissions')}}">Permisos</a></li>
    </ul>
</li>
@endhasrole
