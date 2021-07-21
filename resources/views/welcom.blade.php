@extends('layouts.admin')

@section('home', 'home画面')

@section('content')
  <body>
        <div class="button-area">
            @if (Route::has('login'))
                
                    @auth
                        <button class="btn-home btn--blue btn--border-double" type="button" onclick="location.href='{{ url('/home') }}'">Home</button>
                    @else
                        <button class="btn-home btn--blue btn--border-double btn-primary" type="button" onclick="location.href='{{ route('login') }}'">Login</button>

                        @if (Route::has('register'))
                            <button class="btn-home btn--blue btn--border-double" type="button" onclick="location.href='{{ route('register') }}'">Register</button>
                        @endif
                    @endauth
            @endif    
        </div>
  </body>
 @endsection 