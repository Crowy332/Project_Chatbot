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
@section('title','Report')
@section('header')

@endsection
@section('content')
@foreach ($text as $text)
    <div style="text-align: center">
        <table class="tabletest col-md-4">
            <tr>
                <th><p class="pedit" style="text-align: left;color:{{$text->textcolor}}">write you report</p></th>
                <th>
                    <form method="POST" action="{{route('report.store')}}" id="report">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        {{ method_field('POST') }}
                        <div class="form-group row mb-0" style="margin-top: 2%">
                            <div class="col-md-6 offset-md-0" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <textarea rows="10" cols="50" name="report" form="report"> </textarea>
                </th>
            </tr>
        </table>
    </div>
    @endforeach
@endsection

