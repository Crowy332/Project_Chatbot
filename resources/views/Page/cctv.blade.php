<?php
use App\Models\Setting;
    $text = Setting::all()->where('user_id',Auth::user()->id);
?>
@extends('layouts.app')
@section('title','CCTV')
@section('header')

@endsection
@section('content')
@foreach ($text as $text)
    <div style="margin-top:5%">
        @if (empty($data) ||  $data == "[]")
            <h1 style="color:{{$text->textcolor}}">You don't have CCTV </h1>
            <h1 style="color:{{$text->textcolor}}">if you want to add click add device</h1>
        @elseif (isset($data) && $data != "[]")
            <h1 style="color:{{$text->textcolor}}">have device</h1>
        @endif
        <a href="/homepage/Setting/AddDevice"><p class="btn btn-primary" style="margin-top:2%">add device<p></a>
    </div>
@endforeach
@endsection
