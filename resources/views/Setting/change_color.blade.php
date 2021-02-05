@extends('Layouts.app')
@section('title','Setting')
@section('header')

@endsection
@section('content')

    @foreach ($data as $row)
    <form method="POST" action="{{ route('ChangeColor.update',$row->user_id)}}">
        @csrf
        <div class="form-group row" style="margin: 1%">
            <label for="colorBG1" class="col-md-5 col-form-label text-md-right text-color" style="font-size:130%">{{ __('Backgroud color1') }}</label>
            <div class="col-md-3">
                <input id="color1" type="color" class="form-control" name="color1" value="{{$row->color1}}">
            </div>
        </div>
        <div class="form-group row" style="margin: 1%">
            <label for="colorBG2" class="col-md-5 col-form-label text-md-right text-color" style="font-size:130%">{{ __('Backgroud color2') }}</label>
            <div class="col-md-3">
                <input id="color2" type="color" class="form-control" name="color2" value="{{$row->color2}}">
            </div>
        </div>
        <div class="form-group row" style="margin: 1%">
            <label for="color3" class="col-md-5 col-form-label text-md-right text-color" style="font-size:130%">{{ __('Manu color1') }}</label>
            <div class="col-md-3">
                <input id="color3" type="color" class="form-control" name="color3" value="{{$row->color3}}">
            </div>
        </div>
        <div class="form-group row" style="margin: 1%">
            <label for="color4" class="col-md-5 col-form-label text-md-right text-color" style="font-size:130%">{{ __('Manu color2') }}</label>
            <div class="col-md-3">
                <input id="color4" type="color" class="form-control" name="color4" value="{{$row->color4}}">
            </div>
        </div>
        <div class="form-group row" style="margin: 1%">
            <label for="colortext" class="col-md-5 col-form-label text-md-right text-color" style="font-size:130%">{{ __('Text color') }}</label>
            <div class="col-md-3">
                <input id="textcolor" type="color" class="form-control" name="textcolor" value="{{$row->textcolor}}">
            </div>
        </div>
        {{ method_field('PUT') }}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-3" style="margin-top: 3%;">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>

    @endforeach

@endsection
