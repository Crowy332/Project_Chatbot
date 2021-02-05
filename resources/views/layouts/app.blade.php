<?php
use App\Models\Setting;
    $data = Setting::all()->where('user_id',Auth::user()->id);
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    * {
        margin: 0;
        padding: 0;
    }
    body {
        overflow: hidden;
    }
    .circle {
        height: 15vw;
        width: 15vw;
        text-align: center;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    @media only screen and (max-width: 1000px) {
        .circle {
            height: 40vw;
            width: 40vw;
            text-align: center;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    }
    /* แต่งตัวอักษร */
    .divmain {
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 1;
    }
    /* แต่งพื้นหลังส่วนบน */
    .headerlogo {
        width: 100%;
        height: 40%;
        padding-top: 2%;
        position: absolute;
        text-align: center;
        z-index: 1;
    }
    /* แต่งพื้นหลังส่วนล่าง */
    .content{
        width: 100%;
        height: 60%;
        position: absolute;
        z-index: 1;
    }
    /* แต่งพื้นอนิเมชั่น */

    .box-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    .box-area li {
        position: absolute;
        display: block;
        list-style: none;
        width: 10%;
        height: 50%;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 20s linear infinite;
        bottom: -150px;
    }
    .box-area li:nth-child(1) {
        left: 86%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }
    .box-area li:nth-child(2) {
        left: 12%;
        width: 30px;
        height: 30px;
        animation-delay: 1.5s;
        animation-duration: 10s;
    }
    .box-area li:nth-child(3) {
        left: 70%;
        width: 100px;
        height: 100px;
        animation-delay: 5.5s;
    }
    .box-area li:nth-child(4) {
        left: 42%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 15s;
    }
    .box-area li:nth-child(5) {
        left: 65%;
        width: 40px;
        height: 40px;
        animation-delay: 0s;
    }
    .box-area li:nth-child(6) {
        left: 15%;
        width: 110px;
        height: 110px;
        animation-delay: 3.5s;
    }
    @keyframes animate {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
        }
        100% {
            transform: translateY(-800px) rotate(360deg);
            opacity: 0;
        }
    }

    /* css homepage*/
    .phomepage{
        margin-top: 110%;
        font-size: 130%;
        text-align: center;
    }
    .manu{
        height: 10vw;
        width: 10vw;
        margin: 2%;
        margin-top: 10%;
        background: linear-gradient(to left, #07d3f7, #3553d6);
        border-radius: 50%;
        display: inline-block;
    }
    @media only screen and (max-width: 1000px) {
        .phomepage{
        margin-top: 110%;
        font-size: 230%;
        text-align: center;
        font-weight: bold;
        }
        .manu{
        height: 30vw;
        width: 30vw;
        margin: 5%;
        margin-top: 5%;
        background: linear-gradient(to left, #26bcd6, #3553d6);
        border-radius: 50%;
        display: inline-block;
        }
    }
    </style>

</head>
@foreach ($data as $row)
<body style="color:{{$row->textcolor}}">
    <div id="app">
        <div class="divmain">
            <div class="container">
                @guest
                    @if (Route::has('login'))
                    @endif
                    @if (Route::has('register'))
                    @endif
                    @else
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                @endguest
            </div>
        </div>
        <div class="headerlogo">
            <span class="circle" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});">
                <a href="{{ route('Homepage') }}">
                    <img class="circle" src="https://static.thenounproject.com/png/2722197-200.png" alt="test photo">
                </a>
            </span>
                @yield('welcome')
            <div class="content" style="color:{{$row->textcolor}}">
                @yield('content')
            </div>
        </div>
    </div>

    <div style="background: linear-gradient(to left,{{$row->color1}}, {{$row->color2}}); width: 100%;height: 400vh;">
        <ul class="box-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    @endforeach
</body>
</html>
