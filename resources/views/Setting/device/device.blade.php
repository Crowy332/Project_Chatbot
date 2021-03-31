<style>
    .table{

        margin-left: auto;
        margin-right: auto;
        margin-top: 1%;
        display: block;
        height: 20vw;
        overflow-y: auto;
    }
    #style-2::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #919191;
    }
</style>
<?php
use App\Models\Setting;
    $text = Setting::all()->where('user_id',Auth::user()->id);
?>
@extends('layouts.app')
@section('title','Device')
@section('header')

@endsection
@section('content')
    <div>
    <a href="{{route('Devices.create')}}"  class ="btn btn-primary" style="margin-top:2%;">Add Device</a>
        <div class="table-responsive-md" >
            <table class="table table-hover col-md-4 table" id="style-2">
                @foreach ($text as $text)
                <thead>
                <tr class="table-active">
                    <th scope="col" style="color:{{$text->textcolor}}">No.</th>
                    <th scope="col" style="color:{{$text->textcolor}}; width: 200px;">Name</th>
                    <th scope="col" style="color:{{$text->textcolor}}">Type</th>
                    <th scope="col" style="color:{{$text->textcolor}}; width: 150px;">Status</th>
                    <th scope="col" style="color:{{$text->textcolor}}">Edit</th>
                    <th scope="col" style="color:{{$text->textcolor}}">Delete</th>
                </tr>
                </thead>

                <?php
                    $i=1;
                ?>
                @foreach ($data as $row)
                <tbody>
                <tr>
                    <td style="color:{{$text->textcolor}}">{{$i++}}</td>
                    <td style="color:{{$text->textcolor}}">{{$row->name}}</td>
                    <td style="color:{{$text->textcolor}}">{{$row->device_type->name}}</td>
                    <td style="color:{{$text->textcolor}}">
                        @if ($row->status_device === FALSE)
                            {{ __('ปิดอยู่') }}
                        @elseif($row->status_device === TRUE)
                            {{ __('เปิดอยู่') }}
                        @else
                            {{ __('อุปกรณ์ผิดพลาด') }}
                        @endif
                        </td>
                    <td>
                        <a href="{{route('Devices.edit',$row->id)}}" class ="btn btn-success">edit</a>
                    </td>
                    <td>
                        <form action="{{route('Devices.destroy',$row->id)}}" method="POST">
                            @csrf @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger" onclick="return confirm('you want to delete {{$row->name}} ?')">
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
                @endforeach
            </table>
        </div>
    </div>
@endsection

