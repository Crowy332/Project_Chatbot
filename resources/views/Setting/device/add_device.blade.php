@extends('layouts.app')
@section('title','Add Device')
@section('header')

@endsection
@section('content')
    <form method="POST" action="{{ route('Devices.store') }}" style="margin-top: 3%">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Device name') }}</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control" name="name" required autocomplete="Device name">
            </div>
        </div>

        <div class="form-group row">
            <label for="device_type_id" class="col-md-5 col-form-label text-md-right">{{ __('Device type') }}</label>
            <div  class="col-md-3 " >
                <select name="device_type_id" id="device_type_id" class="custom-select my-1 mr-sm-2">
                    <option value="1" class="form-control">
                        <label for="1" class="col-md-4 col-form-label text-md-right">{{ __('CCTV') }}</label>
                    </option>
                    <option value="2" class="form-control">
                        <label for="2" class="col-md-4 col-form-label text-md-right">{{ __('Door') }}</label>
                    </option>
                    <option value="3" class="form-control">
                        <label for="3" class="col-md-4 col-form-label text-md-right">{{ __('Aircondition') }}</label>
                    </option>
                    <option value="4" class="form-control">
                        <label for="4" class="col-md-4 col-form-label text-md-right">{{ __('Light') }}</label>
                    </option>
                </select>
            </div>
        </div>
        {{ method_field('POST') }}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-3" >
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </form>
@endsection

