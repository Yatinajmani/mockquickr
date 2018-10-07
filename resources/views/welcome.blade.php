@extends('master')
@section('title','Home')

@section('main')
@parent
<div class="row" style="margin-top: 15px;margin-left: 70px;">
  <div class="col s12 m3 l3">
    <div class="card-panel indigo lighten-5 z-depth-1">
      <div class="row black-text">
        <h5 class="indigo-text center text-darken-4">All Categories</h5>
        <ul class="center" style="overflow : auto; max-height: 233px;">
            @foreach($categories as $category)
            <li>
            @if($category->name=='mobile')
            <i class="material-icons">local_phone</i>                
            @elseif($category->name=='car')
            <i class="material-icons">directions_car</i>                
            @elseif($category->name=='bike')
            <i class="material-icons">directions_bike</i>                
            @elseif($category->name=='pet')
            <i class="material-icons">pets</i>                
            @elseif($category->name=='furniture')
            <i class="material-icons">home</i>                
            @elseif($category->name=='sport')
            <i class="material-icons">golf_course</i>                
            @else
            <i class="material-icons">{{$category->name}}</i>
            @endif
            <a style="text-transform: capitalize;" class="indigo-text text-darken-2" href="{{ route('cat_ads',[$category->name]) }}">{{$category->name}}</a></li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>
    <div class="col m8 l8 s12 card-panel indigo lighten-5 z-depth-3" style="margin-left: 25px">
        <h4 class="center indigo-text text-darken-4">Recently Added Posts</h4>
        <div id="carouselContainer">
            <div class="carousel" id="carousel3" style="height: 300px">
                @forelse($posts as $post)
                <div class="carousel-item">
                    <a class="indigo-text text-darken-4" href="{{route('single_post',[$post->id])}}">
                    <img src="{{route('imageFile',[$post->image_path])}}">
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->Starting_bid }}</p>
                    <p>Current Highest Bid : Rs. 
                    @if($post->Bid->max('bid'))
                        {{ $post->Bid->max('bid') }}
                        @else
                        0
                    @endif
                    </p>
                    </a>
                </div>
                @empty
                <div class="carousel-item">
                    No Post Yet
                </div>
                @endforelse                
            </div>
        </div>
    </div>
</div>
@endsection