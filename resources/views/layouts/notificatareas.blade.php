<li class="dropdown hidden-xs">
    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light notification-icon-box" data-toggle="dropdown" aria-expanded="true">
        <i class="mdi mdi-checkbox-marked-circle"></i> <span class="badge badge-xs badge-danger"></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg noti-list-box">
        <li class="text-center notifi-title">Tareas <span class="badge badge-xs badge-success">{{$vartareas->count()}}</span></li>
        <li class="list-group">
          @foreach($vartareas as $tarea)
           <!-- list item-->
           <a href="{{ url('tareas/'.$tarea->id) }}" class="list-group-item">
              <div class="media">
                 <div class="media-heading">{{$tarea->nombre}}</div>
                 <p class="m-0">
                   <small>{!! str_limit(strip_tags($tarea->descripcion), $limit = 50, $end = '...') !!}</small>
                 </p>
              </div>
           </a>
           @endforeach

           <!-- last list item -->
            <a href="{{url('/profile')}}" class="list-group-item">
              <small class="text-primary">Ver todas las tareas</small>
            </a>
        </li>
    </ul>
</li>
