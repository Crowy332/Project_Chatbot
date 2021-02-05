<style>
    .table{
        border: 3px solid black;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1%;
    }
</style>
@extends('layouts.app')
@section('title','Device')
@section('header')

@endsection
@section('content')
    <div>
    <a href="{{route('Devices.create')}}"  class ="btn btn-primary" style="margin-top:2%;">Add Device</a>
        <div class="table-responsive-md">
            <table class="table table-hover col-md-4 table">
                <thead>
                <tr class="table-active">
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <?php
                    $i=1;
                ?>
                @foreach ($data as $row)
                <tbody>
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->device_type->name}}</td>
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
            </table>
        </div>
    </div>
@endsection

