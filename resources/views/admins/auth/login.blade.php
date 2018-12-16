@extends('layouts.admin-app')

@section('content')

<div class = "container-fluid admin-login">
    <div class = "admin-login-div ">
<form action = "{{route('admin.login.submit')}}" method="POST">
    @csrf
    <div class = "form-group row">
        <div class = "col-sm-4">
            <label class = "form-label">Email</label>
        </div>
        <div class = "col-sm-6">
            <input type = "email" name = "email" class = "form-control" required>
        </div>
    </div>
    
    <div class = "form-group row">
            <div class = "col-sm-4">
                <label class = "form-label">Password</label>
            </div>
            <div class = "col-sm-6">
                <input type = "password" name = "password" class = "form-control" required>
            </div>
        </div>
        <div class = "form-group row">
            <div class = "col-md-6">
                    <button type = "submit" class = "btn btn-primary">Login</button>
            </div>
            <div class = "col-md-6">
                    @if (Route::has('admin.password.request'))
                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
            
        </div>
   
</form>
    </div>
    </div>
</div>

@endsection
