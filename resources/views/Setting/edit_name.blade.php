@extends('layouts.app')
@section('title','Add Device')
@section('header')

@endsection
@section('content')
    <form method="POST" action="{{ route('Privacy.update',$data->id) }}" style="margin-top: 3%">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Your name') }}</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}">
            </div>
        </div>
        {{ method_field('PUT') }}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-3" >
                <button type="submit" class="btn btn-primary">
                    {{ __('chage name') }}
                </button>
            </div>
        </div>
    </form>
@endsection

