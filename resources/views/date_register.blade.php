@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register a new date</div>

                <div class="card-body">
                    @if (session('flash_message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('flash_message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('date_register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" value="{{old('name')}}" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{old('email')}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoned" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" value="{{old('phone')}}" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register_at" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="register_at" value="{{old('register_at')}}"  class="form-control{{ $errors->has('register_at') ? ' is-invalid' : '' }}" min="{{ date('Y-m-d') }}" require readonly>
                                @if ($errors->has('register_at'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('register_at') }}</strong>
                                    </span>
                                @endif
		                        <div id="dtBox"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('More Information') }}</label>

                            <div class="col-md-6">
                                <textarea name="info" id="info" cols="30" class="form-control{{ $errors->has('info') ? ' is-invalid' : '' }}" rows="10">{{old('info')}}</textarea>
                                @if ($errors->has('info'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('info') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
