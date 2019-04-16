@extends('layouts.applogin')

@section('content')
<div class="panel panel-color panel-primary panel-pages">

                <div class="panel-body">
                    <h3 class="text-center m-t-0 m-b-15">
                        <a href="index.html" class="logo"><img src="{{asset('logos/logoammex_white.png')}}" alt="logo-img"></a>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>{{ __('Register') }}</b></h4>

                    <form class="form-horizontal m-t-20" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="name"  name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" required="" value="{{ old('name') }}" placeholder="{{ __('Name') }}" autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" required="" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" name="password" class="form-control" type="password" required="" placeholder="{{ __('Password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password-confirm" name="password_confirmation" class="form-control" type="password" required="" placeholder="{{ __('Confirm Password') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" checked="checked">
                                    <label for="checkbox-signup">
                                        Acepto los <a href="#">Terminos y Condiciones</a>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">{{ __('Register') }}</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12 text-center">
                                <a href="{{route('login')}}" class="text-muted">Ya tengo una cuenta</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
@endsection
