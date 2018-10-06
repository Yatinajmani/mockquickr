@extends('master')

@section('main')
@parent
<div class="total-ads main-grid-border">
	<div class="container">
		<div class="select-box">
			<form action="{{ route('search_ads') }}" method="post">
				@csrf
				<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select class="selectpicker show-tick" data-live-search="true" name="category">
						<option data-tokens="Mobiles" value="0">All</option>
						@foreach($categories as $category)
						<option data-tokens="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="search-product ads-list">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class="form-control input-lg" name="title" placeholder="Enter Title" />
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="all-categories">
			<h3> Select your category and find the perfect ad</h3>
			<ul class="all-cat-list">
				@foreach($categories as $category)
				<li><a href="{{ route('cat_ads',[$category->name]) }}">{{ $category->name }}<span class="num-of-ads"> {{$category->Post()->count()}}</span></a></li>
				@endforeach
			</ul>
		</div>
		<div class="ads-grid">							
			<div class="ads-display">
				<div class="wrapper">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div>
									<div id="container">
										<div class="clearfix"></div>
										<ul class="slist">
											@forelse($posts as $post)
											<a href="{{ route('single_post',[$post->id]) }}" style="text-decoration: none;">
												<li>
													<img width="300px" height="150px" src="{{route('imageFile',[$post->image_path]) }}" title="" alt="" class="pull-left" />
													<section class="list-left">
														<h5 class="title">{{ $post->title }}</h5>
														<span class="adprice">Current bid higest : {{ $post->Bid->max('bid') }}</span>
														<p class="catpath">{{ $post->Category->name }}</p>
													</section>
													<section class="list-right">
														<span class="date"></span>
														<span class="cityname">Starting Bid : {{$post->Starting_bid}}</span>
													</section>
													<div class="clearfix"></div>
												</li> 
											</a>
											@empty
										    <p>No Posts Available</p>
											@endforelse
									</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>	
</div>
@endsection