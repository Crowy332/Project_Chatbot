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
use App\Models\Device;
    $data = Device::where('user_id',Auth::user()->id)
                        ->where( 'device_type_id','=','1')
                        ->get();
?>
@extends('layouts.app')
@section('title','CCTV')
@section('header')

@endsection
@section('content')
@foreach ($text as $text)
    <div style="margin-top:5%" >
        @if (empty($data) ||  $data == "[]")
            <h1 style="color:{{$text->textcolor}}">You don't have CCTV </h1>
            <h1 style="color:{{$text->textcolor}}">if you want to add click add device</h1>
        @elseif (isset($data) && $data != "[]")
            <a href="{{route('Devices.index')}}"><p class="btn btn-primary" style="margin-top:-2%">add device<p></a>
            <table class="table table-hover col-md-4 " id="style-2">
                <thead>
                <tr class="table-active">
                    @foreach ($data as $row)
                    <th scope="col" style="color:{{$text->textcolor}}">No.</th>
                    <th scope="col" style="color:{{$text->textcolor}}; width: 200px;">Name</th>
                    <th scope="col" style="color:{{$text->textcolor}}; width: 150px;">Status</th>
                    <th scope="col" style="color:{{$text->textcolor}}; width: 150px;">Turn On/Off</th>
                </tr>
                </thead>
                <?php
                    $i=1;
                ?>
                <tbody>
                <tr>
                    <td style="color:{{$text->textcolor}}">{{$i++}}</td>
                    <td style="color:{{$text->textcolor}}">{{$row->name}}</td>
                    <td style="color:{{$text->textcolor}}">
                        @if ($row->status_device === FALSE)
                            {{ __('ปิดอยู่') }}
                        @elseif($row->status_device === TRUE)
                            {{ __('เปิดอยู่') }}
                        @else
                            {{ __('อุปกรณ์ผิดพลาด') }}
                        @endif
                        </td>
                        <td style="width: 150px;">
                            <form method="POST" action="{{ route('CCTV.update',$row->id) }}">
                                @csrf
                                <input type="hidden" name="user_id" value=
                                    @if($row->status_device === FALSE)
                                        TRUE
                                    @elseif($row->status_device === TRUE)
                                        FALSE
                                    @else

                                    @endif
                                >
                                {{ method_field('PUT') }}
                                <button type="submit"
                                    @if($row->status_device === FALSE)
                                        class="btn btn-danger"
                                    @elseif($row->status_device === TRUE)
                                        class ="btn btn-success"
                                    @else
                                        class="btn btn-secondary"
                                    @endif
                                    >
                                    @if($row->status_device === FALSE)
                                        {{ __('ปิดอยู่') }}
                                    @elseif($row->status_device === TRUE)
                                        {{ __('เปิดอยู่') }}
                                    @else
                                        {{ __('อุปกรณ์ผิดพลาด') }}
                                    @endif
                                </button>
                            </form>
                        </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        @endif
    </div>
@endforeach
@endsection
