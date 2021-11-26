@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-30">
 
<div style="padding-left: 1010px;">
                <a class="navbar-brand brand  "  href="index.html"><img src="{{asset('assets/admin/assets/images/q.png')}}" class="rounded float-end" style="width: 250px; height:150px; background-color:#; float: right;" alt=""></a>
                
            </div>
            </div>
            </div>
            <div class="row">
    <div class="col-md-12 mb-30">
 
<div style="padding-right: 1010px; margin-top: -160px; margin-left: 100px;">
                <a class="navbar-brand brand  "  href="index.html"><img src="{{asset('assets/admin/assets/images/n.png')}}" class="rounded float-end" style="width: 200px; height:160px; background-color:#; float: right;" alt=""></a>
                
            </div>
            </div>
            </div>
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="   background: #faffd1; ">{{ __('Login') }}</div>
              

                <div class="card-body"  style="   background: #faffd1; ">
                    <form method="POST" action="{{ route('login') }}">
               
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
