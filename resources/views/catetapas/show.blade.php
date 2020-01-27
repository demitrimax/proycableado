@extends('layouts.app')
@section('title',config('app.name').' | Etapa de Proyecto' )
@section('content')
    <section class="content-header">
        <h1>
            Etapa
        </h1>
    </section>
    <div class="content">
      @component('components.cardv2', ['title'=>'Etapa'])

                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="catetapas-table">
                  <tbody>
                    @include('catetapas.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('catetapas.index') !!}" class="btn btn-default">Regresar</a>
                </div>

        @endcomponent
    </div>
@endsection
