<?php
use App\Models\Setting;
    $text = Setting::all()->where('user_id',Auth::user()->id);
?>
<style>
    .p-setting{
        font-size: 200%;
        margin: 1%;
        text-align: center;
    }
    @media only screen and (max-width: 1000px) {
        .p-setting{
            margin: 3%;
            margin-top: 8%;
            font-size: 150%;
            text-align: center;
            font-weight: bold;
        }
    }
</style>
@extends('Layouts.app')
@section('title','Setting')
@section('header')

@endsection
@section('content')
    @foreach ($text as $row)
    <a href="{{route('ChangeColor.edit',$row->user_id)}}"><p class="p-setting" style="color:{{$row->textcolor}}">{{ __('Change color') }}</p></a>
    <a href="{{route('Devices.index')}}" ><p class="p-setting" style="color:{{$row->textcolor}}">{{ __('Add Device') }}</p></a>
    <!--<a href="{{route('TechBot')}}"><p class="p-setting" style="color:{{$row->textcolor}}">{{ __('Tech bot') }}</p></a>-->
    <a href="{{route('Privacy.index')}}"><p class="p-setting" style="color:{{$row->textcolor}}">{{ __('Privacy') }}</p></a>
    <a href="{{route('About')}}"><p class="p-setting" style="color:{{$row->textcolor}}">{{ __('About') }}</p></a>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <p class="p-setting" style="color:{{$row->textcolor}}">{{ __('Logout') }}</p>
    </a>
    <form id="logout-form" action="{{ route('login') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endforeach
@endsection
