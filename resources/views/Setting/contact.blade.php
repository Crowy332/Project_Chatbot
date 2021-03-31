<?php
use App\Models\Setting;
    $text = Setting::all()->where('user_id',Auth::user()->id);
?>
<style>
    .pedit{
        font-size: 180%;
        margin: 1%;
        margin-top: 1%;
        text-align: center;
    }
    @media only screen and (max-width: 1000px) {
        .pedit{
            margin: 3%;
            margin-top: 5%;
            font-size: 130%;
            text-align: center;
            font-weight: bold;
        }
    }
</style>
@extends('layouts.app')
@section('title','Contect')
@section('header')

@endsection
@section('content')
@foreach ($text as $text)
<div style="text-align:center" >
    <div style="margin-top: 2%">
        <p class="pedit" style="color:{{$text->textcolor}}">Email</p>
        <p class="pedit" style="color:{{$text->textcolor}}">contect@Crowyexam.co.th</p><br>
    </div>
    <div>
        <p class="pedit" style="color:{{$text->textcolor}}">Tel.</p>
        <p class="pedit" style="color:{{$text->textcolor}}">063-2543042</p><br>
    </div>
    <div>
        <p class="pedit" style="color:{{$text->textcolor}}">Place</p>
        <p class="pedit" style="color:{{$text->textcolor}}">Blank</p><br>
    </div>

</div>
@endforeach
@endsection

