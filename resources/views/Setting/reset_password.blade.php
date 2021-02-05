@extends('layouts.app')
@section('title','Add Device')
@section('header')

@endsection
@section('content')
    <form method="POST" action="{{ route('Resetpassword.update',$data->id) }}" style="margin-top: 3%">
        @csrf
        <div class="form-group row">
            <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        {{ method_field('PUT') }}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-3" >
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection

