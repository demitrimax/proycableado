@extends('layouts.app')
@section('title',config('app.name').' | Contratistas' )
@section('content')
    <section class="content-header">
        <h1>
            Contratistas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contratistas.show_fields')
                    <a href="{!! route('contratistas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
