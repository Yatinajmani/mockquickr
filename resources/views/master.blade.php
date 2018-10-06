<!DOCTYPE html>
<html>
<head>
<title>Resale a Business Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link rel="stylesheet" href="{{asset('w3layouts/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('w3layouts/css/bootstrap-select.css')}}">
<link href="{{asset('w3layouts/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('w3layouts/css/flexslider.css')}}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{asset('w3layouts/css/font-awesome.min.css')}}" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="{{asset('w3layouts/js/jquery.min.js')}}"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('w3layouts/js/bootstrap.min.js')}}"></script>
<script src="{{asset('w3layouts/js/bootstrap-select.js')}}"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="{{asset('w3layouts/js/jquery.leanModal.min.js')}}"></script>
<link href="{{asset('w3layouts/css/jquery.uls.css')}}" rel="stylesheet"/>
<link href="{{asset('w3layouts/css/jquery.uls.grid.css')}}" rel="stylesheet"/>
<link href="{{asset('w3layouts/css/jquery.uls.lcd.css')}}" rel="stylesheet"/>
<!-- Source -->
<script src="{{asset('w3layouts/js/jquery.uls.data.js')}}"></script>
<script src="{{asset('w3layouts/js/jquery.uls.data.utils.js')}}"></script>
<script src="{{asset('w3layouts/js/jquery.uls.lcd.js')}}"></script>
<script src="{{asset('w3layouts/js/jquery.uls.languagefilter.js')}}"></script>
<script src="{{asset('w3layouts/js/jquery.uls.regionfilter.js')}}"></script>
<script src="{{asset('w3layouts/js/jquery.uls.core.js')}}"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
</head>
<body>
        @include('partials._header')
        @section('main')
        <div class="main-banner banner text-center">
  <div class="container">    
    <h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with Resale</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
    <a href="{{ route('post') }}">Post Free Ad</a>
  </div>
</div>

        @show
        @include('partials._footer')
</body>


</html>