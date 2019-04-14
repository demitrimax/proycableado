@extends('layouts.applogin')

@section('content')
<div class="panel panel-color panel-primary panel-pages">

    <div class="panel-body">
        <h3 class="text-center m-t-0 m-b-15">
            <a href="{{url('/')}}" class="logo"><img src="{{asset('logos/logoammex_white.png')}}" alt="logo-img"></a>
        </h3>
        <h4 class="text-muted text-center m-t-0"><b>Iniciar Sesión</b></h4>

        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <div class="col-xs-12">
                    <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" required="" placeholder="{{ __('E-Mail Address') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" placeholder="{{ __('Password') }}">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox-signup" type="checkbox" checked>
                        <label for="checkbox-signup">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                </div>
            </div>

            <div class="form-group m-t-30 m-b-0">
              @if (Route::has('password.request'))
              <div class="col-sm-7">
                  <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> {{ __('Forgot Your Password?') }}</a>
              </div>
              @endif
                <div class="col-sm-5 text-right">
                    <a href="pages-register.html" class="text-muted">Crear una cuenta</a>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
