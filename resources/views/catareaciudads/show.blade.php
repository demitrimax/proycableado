@extends('layouts.app')
@section('title',config('app.name').' | Catareaciudads' )
@section('content')
    <section class="content-header">
        <h1>
            Catareaciudad
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('catareaciudads.show_fields')
                    <a href="{!! route('catareaciudads.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
