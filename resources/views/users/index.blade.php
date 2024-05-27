<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Top</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="{{asset('/js/follow.js')}}"></script>
    </head>
    <body>
        <x-app-layout>
          @foreach($users as $user)
            @if(!Auth::user()->isFollowed($user))
                <div>
                    <button onclick="follow({{$user->id}})">{{$user->name}}をフォローする</button>
                </div>
            @else
                <div>
                    <button onclick="destroy({{$user->id}})">{{$user->name}}のフォローを解除する</button>
                </div>
            @endif
          @endforeach
          <div id="follower"></div>         
        </x-app-layout>
    </body>
</html>
