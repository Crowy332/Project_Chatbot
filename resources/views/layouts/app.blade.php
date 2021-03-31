<?php
use App\Models\Setting;
    $data = Setting::all()->where('user_id',Auth::user()->id);
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo.png') }}">

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
    <!--<link rel="stylesheet" href="{{ asset('js/Chat/build/botui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/Chat/build/botui-theme-default.css') }}"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/botui/build/botui.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/botui/build/botui-theme-default.css" />


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
    .logo {
        height: 13vw;
        width: 13vw;
        text-align: center;
        border-radius: 50%;
        display: inline-block;
        margin-top:5%;
        margin-right:6%;
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
        .logo {
        height: 35vw;
        width: 35vw;
        text-align: center;
        border-radius: 50%;
        display: inline-block;
        margin-top:3%;
        margin-right:6%;
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


    #click{
        display: none;
    }
    label{
        position: absolute;
        right: 30px;
        bottom: 20px;
        height: 55px;
        width: 55px;
        text-align: center;
        line-height: 55px;
        border-radius: 50px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
    }
    label i{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.4s ease;
    }
    label i.fas{
        opacity: 0;
        pointer-events: none;
    }
    #click:checked ~ label i.fas{
        opacity: 1;
        pointer-events: auto;
        transform: translate(-50%, -50%) rotate(180deg);
    }
    #click:checked ~ label i.fab{
        opacity: 0;
        pointer-events: none;
        transform: translate(-50%, -50%) rotate(180deg);
    }
    .wrapper{
        position: absolute;
        right: 20px;
        bottom: 0px;
        width: 400px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
        opacity: 0;
        pointer-events: none;
        transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
    #click:checked ~ .wrapper{
        opacity: 1;
        bottom: 85px;
        pointer-events: auto;
    }
    .chatbox {
        height: 3vw;
        width: 3vw;
        text-align: center;
        border-radius: 50%;
        display: inline-block;
        margin-top:5%;
        margin-right:6%;
    }
    @media only screen and (max-width: 1000px) {
        .wrapper{
        position: absolute;
        right: 20px;
        bottom: 0px;
        max-width: 300vw;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
        opacity: 0;
        pointer-events: none;
        transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    }
        .chatbox {
        height: 12vw;
        width: 12vw;
        text-align: center;
        border-radius: 50%;
        display: inline-block;
        margin-top:3%;
        margin-right:6%;
        }
    }
    .popup{
        position: fixed;
        right: 1vw;
        bottom: 1vw;
    }

    .chatbot-area .chatarea-main{float: left;}
.chatarea.user {
    float: right;
    width: 40%;
    padding: 20px 0;
}

.chatarea-inner {
    float: left;
    width: 60%;
    padding: 10px;
    color: #fff;
    position: relative;
    margin: 5px 0;
}
.chatarea-inner.user{
    background: #6522A4;
    margin-left: 2vw;
}
.chatarea-inner.chatbot{
    background: #466EB6;
    float: right;
    margin-right: 2vw;
}
.chatarea-inner.user:before {
    content: '';
    position: absolute;
    border-right: 20px solid #6522A4;
    border-top: 20px solid transparent;
    border-bottom: 0px solid transparent;
    bottom: 0;
    left: -20px;
}
.chatarea-inner.chatbot:before {
    content: '';
    position: absolute;
    border-left: 20px solid #466EB6;
    border-top: 20px solid transparent;
    border-bottom: 0px solid transparent;
    bottom: 0;
    right: -20px;
}

.chatbot-area .chatarea-inner{float: left;}
    </style>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <img class="logo" src="{{ asset('img/logo.png') }}" alt="test photo">
                </a>
            </span>
                @yield('welcome')
            <div class="content" style="color:{{$row->textcolor}}">
                <div class="popup">
                    <input type="checkbox" id="click" >
                        <label for="click" style="background: linear-gradient(to left, {{$row->color3}}, {{$row->color4}});">
                            <i class="fab "><img class="chatbox" src="{{ asset('img/logo.png') }}" alt="test photo"></i>
                            <i class="fas"><img class="chatbox" src="{{ asset('img/Cancle.png') }}" alt="test photo"></i>
                        </label>
                        <div class="wrapper">

                            <div >
                                <div style="height: 40px; line-height: 30px; font-size: 20px; display: flex; justify-content: space-between; padding: 5px 0px 5px 20px;  color: rgb(255, 255, 255); cursor: pointer; box-sizing: content-box;">
                                    <div style="display: flex; align-items: center; padding: 0px 50% 0px 0px; font-size: 15px; font-weight: normal; color: rgb(51, 51, 51);">Crowy</div>
                                        <div>
                                            <svg fill="#FFFFFF" height="15" viewBox="0 0 15 15" width="15" xmlns="http://www.w3.org/2000/svg" style="margin-right: 15px; margin-top: 6px; vertical-align: middle;">
                                                <line x1="1" y1="15" x2="15" y2="1" stroke="white" stroke-width="1"></line>
                                                <line x1="1" y1="1" x2="15" y2="15" stroke="white" stroke-width="1"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div style="display: block; height: 450px;">
                                        <iframe id="chatBotManFrame" src="/botman/chat?conf=%7B%22chatServer%22%3A%22%2Fbotman%22%2C%22frameEndpoint%22%3A%22%2Fbotman%2Fchat%22%2C%22timeFormat%22%3A%22HH%3AMM%22%2C%22dateTimeFormat%22%3A%22m%2Fd%2Fyy%20HH%3AMM%22%2C%22title%22%3A%22BotMan%20Widget%22%2C%22cookieValidInDays%22%3A1%2C%22introMessage%22%3A%22%22%2C%22placeholderText%22%3A%22Send%20a%20message...%22%2C%22displayMessageTime%22%3Atrue%2C%22sendWidgetOpenedEvent%22%3Afalse%2C%22widgetOpenedEventData%22%3A%22%22%2C%22mainColor%22%3A%22%23408591%22%2C%22headerTextColor%22%3A%22%23333%22%2C%22bubbleBackground%22%3A%22%23408591%22%2C%22bubbleAvatarUrl%22%3A%22%22%2C%22desktopHeight%22%3A450%2C%22desktopWidth%22%3A370%2C%22mobileHeight%22%3A%22100%25%22%2C%22mobileWidth%22%3A%22300px%22%2C%22videoHeight%22%3A160%2C%22aboutLink%22%3A%22https%3A%2F%2Fbotman.io%22%2C%22aboutText%22%3A%22%E2%9A%A1%20Powered%20by%20BotMan%22%2C%22chatId%22%3A%22%22%2C%22userId%22%3A%22%22%2C%22alwaysUseFloatingButton%22%3Afalse%2C%22wrapperHeight%22%3A450%7D" width="100%" height="100%" frameborder="0" allowtransparency="true" style="background-color: transparent;">
                                        </iframe>
                                    </div>
                                </div>

                        </div>
                    </div>
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

    <!--<script src="{{ asset('js/Chat/build/botui.js') }}"></script>
    <script src="{{ asset('js/Chat/js/chat.js') }}"></script>-->
    <script src="https://cdn.jsdelivr.net/vue/latest/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/botui/build/botui.js"></script>



</body>
</html>
<script>
    var botui = new BotUI('my-chatbot-app');
    botui.message.add({
        content: 'Hello World from bot!'
      }).then(function () { // wait till previous message has been shown.

        botui.message.add({
          delay: 1000,
          human: true,
          content: 'Hello World from human!'
        });
      });

  </script>
