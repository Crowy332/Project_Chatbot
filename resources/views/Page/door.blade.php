<style>
    .table{

        margin-left: auto;
        margin-right: auto;
        margin-top: 1%;
        display: block;
        height: 160%;
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
use App\Models\Device;
    $text = Setting::all()->where('user_id',Auth::user()->id);

    $data = Device::where('user_id',Auth::user()->id)
                        ->where( 'device_type_id','=','2')
                        ->get();

    $reference = $db->getReference('Door/');
    $snapshot = $reference->getSnapshot();
    $value =  $snapshot->getValue();
    $detect =  $snapshot->numChildren();
    $door1 =  $db->getReference('Door/Door1')->getValue();
    $door2 =  $db->getReference('Door/Door2')->getValue();
?>
@extends('layouts.app')
@section('title','Door')
@section('header')

@endsection
@section('content')
@foreach ($text as $text)
    <div style="margin-top:5%">
        @if (empty($data) ||  $data == "[]")
            <h1 style="color:{{$text->textcolor}}">You don't have Door </h1>
            <h1 style="color:{{$text->textcolor}}">if you want to add click add device</h1>
        @elseif (isset($data) && $data != "[]")
        <table class="table table-hover col-md-4 table" id="style-2">
            <thead>
            <tr class="table-active">
                <th scope="col" style="color:{{$text->textcolor}}">No.</th>
                <th scope="col" style="color:{{$text->textcolor}}; width: 200px;">Name</th>
                <th scope="col" style="color:{{$text->textcolor}}">Type</th>
                <th scope="col" style="color:{{$text->textcolor}}; width: 150px;">Status</th>
                <th scope="col" style="color:{{$text->textcolor}}; width: 23%;" >Edit</th>
            </tr>
            </thead>

            <?php
                $i=1;
                $count = 0;
                $counter = 0;
                $status = "";
            ?>
            @foreach ($data as $row)
            @foreach ($value as $test)
            @if ($row->name == $row->name && $count == $counter)
            <tbody>
            <tr>
                <td style="color:{{$text->textcolor}}">{{$i++}}</td>
                <td style="color:{{$text->textcolor}}">{{$row->name}}</td>
                <td style="color:{{$text->textcolor}}">{{$row->device_type->name}}</td>
                <td style="color:{{$text->textcolor}}" >


                            @if ($test === 3 || $test ===1)
                                <?php
                                    echo"ประตูปิดอยู่";
                                    $status = "เปิดประตู"
                                ?>
                            @elseif ($test === 4 || $test === 2)
                                <?php
                                    echo"ประตูเปิดอยู่";
                                    $status = "ปิดประตู";
                                ?>
                            @else
                                <?php echo"ระบบผิดพลาด"; ?>
                            @endif
                </td>
                    @if (isset($_GET['name']))
                        @if(($_GET['name']) == 2)

                            @if($door1 == 0 || $door1 == 4)
                                <?php
                                    $reference = $db->getReference('Door/Door1')->set(1);
                                    header("refresh: 0; url=/homepage/Door");
                                    exit(0);
                                ?>
                            @else
                                <?php
                                    $reference = $db->getReference('Door/Door1')->set(2);
                                    header("refresh: 0; url=/homepage/Door");
                                    exit(0);
                                ?>
                            @endif
                        @endif
                        @if(($_GET['name']) == 3)
                            @if($door2 == 0 || $door2 == 4 )
                                <?php
                                    $reference = $db->getReference('Door/Door2')->set(1);
                                    header("refresh: 0; url=/homepage/Door");
                                    exit(0);
                                ?>
                            @else
                                <?php
                                    $reference = $db->getReference('Door/Door2')->set(2);
                                    header("refresh: 0; url=/homepage/Door");
                                    exit(0);
                                ?>
                            @endif
                        @endif
                    @endif


                <td>
                    <form method="post">
                    <a href="{{route('Door.index')}}?name={{$i}}"
                    class ="
                    @if ($test === 3 || $test === 1)
                        btn btn-success
                    @else
                        btn btn-danger
                    @endif
                    " >{{$status}}</a>
                </td>
            </tr>
            </tbody>
            @endif
            <?php
                $count++;
            ?>
            @endforeach
            <?php
                $counter = $counter + $detect + 1 ;
            ?>
            @endforeach
        </table>
        @endif
        <a href="{{route('Devices.index')}}"><p class="btn btn-primary" style="margin-top:2%">add device<p></a>
    </div>
@endforeach
@endsection
