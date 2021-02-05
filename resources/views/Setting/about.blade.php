<?php
use App\Models\Setting;
    $text = Setting::all()->where('user_id',Auth::user()->id);
?>
<style>
    .tabletest{
        margin-left: auto;
        margin-right: auto;
        margin-top: 3%;
    }
    .pedit{
        font-size: 180%;
        margin: 1%;
        margin-top: 10%;
        text-align: center;
    }
    @media only screen and (max-width: 1000px) {
        .pedit{
            margin: 3%;
            margin-top: 20%;
            font-size: 130%;
            text-align: center;
            font-weight: bold;
        }
    }
</style>
@extends('layouts.app')
@section('title','about')
@section('header')

@endsection
@section('content')
    @foreach ($text as $text)
    <div style="text-align: center">
        <table class="tabletest col-md-4">
            <tr>
                <th scope="col"><p class="pedit" style="text-align: left;color:{{$text->textcolor}}">Version</p></th>
                <th scope="col"><p class="pedit" style="text-align: right;color:{{$text->textcolor}}">1.0.0(2/4/2021)</p></th>
            </tr>
            <tr>
                <th colspan="2"><a href="{{route('report.create')}}"><p class="pedit" style="text-align: left;color:{{$text->textcolor}}">Report Problem</p></a></th>
            </tr>
            <tr>
                <th colspan="2"><a href="{{route('contact')}}"><p class="pedit" style="text-align: left;color:{{$text->textcolor}}">Contact Dev.</p></a></th>
            </tr>
        </table>
    </div>
    @endforeach
@endsection

