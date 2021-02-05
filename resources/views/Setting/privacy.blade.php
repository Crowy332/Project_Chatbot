<style>
    .tableedit{
        margin-left: auto;
        margin-right: auto;
        margin-top: 3%;
    }
</style>
@extends('layouts.app')
@section('title','Privacy')
@section('header')

@endsection
@section('content')
<div class="table-responsive-md" style="margin-top: 2%">
    @foreach ($data as $row)
    <table class="col-md-4 tableedit">
        <tr>
            <th scope="col">name</th>
            <th scope="col">{{ Auth::user()->name }}</th>
            <th scope="col">
                <a href="{{route('Privacy.edit',$row->id)}}" class ="btn btn-primary" style="width: 100%">edit</a>
            </th>
        </tr>
        <tr>
            <th colspan="2">Reset password</th>
            <th scope="col">
                <a href="{{route('Resetpassword.edit',$row->id)}}" class ="btn btn-primary" style="width: 100%">reset</a>
            </th>
        </tr>
    </table>
    @endforeach
@endsection

