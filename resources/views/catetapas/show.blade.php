@extends('layouts.app')
@section('title',config('app.name').' | Catetapas' )
@section('content')
    <section class="content-header">
        <h1>
            Catetapa
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                <table class="table table-striped table-bordered detail-view" id="catetapas-table">
                  <tbody>
                    @include('catetapas.show_fields')
                    </tbody>
                  </table>
                    <a href="{!! route('catetapas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
