@section('css')
<!-- Summernote css -->
<link href="{{asset('appzia/plugins/summernote/summernote.css')}}" rel="stylesheet" />

@endsection
<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => '35']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control summernote', 'required']) !!}
</div>
@php

  $vencimiento = null;

    if (isset($tareas->vencimiento))
    {
      $vencimiento = date('Y-m-d', strtotime($tareas->vencimiento));
    }


@endphp
<!-- Vencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vencimiento', 'Vencimiento:') !!}
    {!! Form::date('vencimiento', $vencimiento, ['class' => 'form-control','id'=>'vencimiento']) !!}
</div>


<!-- User Id Field se refiere al usuario que se le asignará la tarea -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Asignar tarea a:') !!}
    {!! Form::select('user_id', $usuarios, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tareas.index') !!}" class="btn btn-default">Cancelar</a>
</div>

@section('scripts')

        <!--Summernote js-->
        <script src="{{asset('appzia/plugins/summernote/summernote.min.js')}}"></script>
        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

            });
        </script>


@endsection
