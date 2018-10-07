<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>QuickrMock - @yield('title')</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
        @include('partials._header')
        @section('main')
  <div id="index-banner" class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br><br>
          <h2 class="header center indigo-text text-lighten-1" style="margin-bottom: 5.80rem">Sell or Advertise anything online with QuickrMock</h2>
          <div class="center">
            <a href="{{ route('post') }}" id="download-button" class="btn-large waves-effect waves-light indigo darken-2">Post Free Advertise</a>
        </div>
        <br><br>
    </div>
  </div>
  <div class="parallax"><img src="{{asset('images/background1.jpg')}}" alt="Unsplashed background img 1"></div>
</div>

        @show
        @include('partials._footer')
</body>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('js/materialize.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>
</html>