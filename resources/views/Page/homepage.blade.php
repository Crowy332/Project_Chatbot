<?php
use App\Models\Setting;
    $data = Setting::all()->where('user_id',Auth::user()->id);
?>
<style>
    .pforhomepage{
        margin-top: 30%;
        font-size: 180%;
        text-align: center;
    }
    .pforhomepageA{
        margin-top: 30%;
        font-size: 165%;
        text-align: center;
    }
    .manuforhomepage{
        height: 10vw;
        width: 10vw;
        margin: 2%;
        margin-top: 6%;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .imgforhomepage{
        height: 6vw;
        width: 6vw;
        margin: 2%;
        margin-top: 17%;
    }
    @media only screen and (max-width: 800px) {
        .pforhomepage{
        margin-top: 30%;
        font-size: 110%;
        text-align: center;
        font-weight: bold;
        }
        .pforhomepageA{
        margin-top: 30%;
        font-size: 95%;
        text-align: center;
        font-weight: bold;
        }
        .manuforhomepage{
        height: 25vw;
        width: 25vw;
        margin: 5%;
        margin-top: 2%;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .imgforhomepage{
        height: 17vw;
        width: 17vw;
        margin: 2%;
        margin-top: 13%;
        }
    }
</style>
@extends('layouts.app')
@section('title','Homepage')
@section('header')
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
@endsection
@section('welcome')
<p style="font-size:200%;margin-top:0.5%;">Welcome {{ Auth::user()->name }}</p>
@endsection
@section('content')
@foreach ($data as $row)
    <a href="{{route('CCTV.index')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/CCTV.png') }}"><p class="pforhomepage" style="color:{{$row->textcolor}}">{{ __('CCTV') }}</p></span></a>
    <a href="{{route('Door.index')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/door.png') }}"><p class="pforhomepage" style="color:{{$row->textcolor}}">{{ __('DOOR') }}</p></span></a>
    <a href="{{route('Aircondition.index')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/aircondition.png') }}"><p class="pforhomepageA" style="color:{{$row->textcolor}}">{{ __('AIRCONDITION') }}</p></span></a>
    <a href="{{route('Light.index')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/light.png') }}"><p class="pforhomepage" style="color:{{$row->textcolor}}">{{ __('LIGHT') }}</p></span></a>
    <a href="{{route('Setting')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/setting.png') }}"><p class="pforhomepage" style="color:{{$row->textcolor}}">{{ __('SETTING') }}</p></span></a>
    <a href="{{route('Dashboard')}}"><span class="manuforhomepage" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});"><img class="imgforhomepage" src="{{ asset('img/dashborad.png') }}"><p class="pforhomepage" style="color:{{$row->textcolor}}">{{ __('DASHBOARD') }}</p></span></a>
    @endforeach
@endsection
