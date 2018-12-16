@extends('layouts.app')

@section('content')

<div class = "container  mt-5 content-size">
   @if(Session::get('sent') != null)
<div class = "alert alert-success"><h5 class = "text-center">{{Session::get('sent')}}</h5></div>
   @endif
    <div class ="career">
            <h1 class = "text-center">Careers</h1><hr>
    <form method = "post" action = "{{route('career.mail')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                        <div class="col-md-6">
                            <input id="name" type="name" class="custom-form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                        <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                <div class="col-md-6">
                                    <input id="email" type="email" class="custom-form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="cv" class="col-sm-4 col-form-label text-md-right">{{ __('CV') }}</label>
                    
                                    <div class="col-md-6">
                                        <input id="cv" type="file" class="custom-form-control{{ $errors->has('cv') ? ' is-invalid' : '' }}" name="cv" value="{{ old('cv') }}" required autofocus>
                    
                                        
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit') }}
                                            </button>
                        
                                       
                                    </div>
                                </div>
                    
        </form>
    </div>
</div>
@endsection