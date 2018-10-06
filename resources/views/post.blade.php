@extends('master')

@section('main')
@parent
<div class="single-page main-grid-border">
	<div class="container">
		<div class="product-desc">
			<div class="col-md-7 product-view">
				<h2>{{ $post->title }}</h2>
				<div class="flexslider">
					<img src="{{route('imageFile',[$post->image_path]) }}" />
				</div>
				<div class="product-details">
					<h4>Category : <a href="#">{{ $post->category->name }}</a></h4>
					<h4>Starting Bid : <strong>{{ $post->Starting_bid }}</strong></h4>
					<p><strong>Summary</strong> : {{ $post->description }}.</p>
					<a href="{{ route('like',[$post->id]) }}" style="font-weight: 400;font-size: 18px;cursor: pointer;">
					@if(Auth::User())
					@if(!$post->Bid()->filterByUserId(Auth::User()->id)->first())
					Like
					@else
						@if($post->Bid()->filterByUserId(Auth::User()->id)->first()->is_liked==1)
						Liked
						@else
						Like
						@endif
					@endif
					@else
					Like
					@endif
				</a>
				{{$post->Bid()->isLiked()->count()}}
				</div>
			</div>
			<div class="col-md-5 product-details-grid">
				<form action="{{ route('submit_bid') }}" method="post">
					@csrf
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Current Highest Bid</p>
							<h3 class="rate">$@if($post->bid->max('bid')){{$post->bid->max('bid')}}@else {{$post->Starting_bid}}@endif</h3>
							<div class="clearfix"></div>
						</div>						
						<div class="condition">
							<p class="p-price">Your Bid</p>
							<input class="form-control" style="width:100px;" placeholder="Enter Bid" @if($post->bid->max('bid'))min="{{ $post->bid->max('bid')}}" @else min="{{$post->Starting_bid}}" @endif  type="number" name="bid">
							<input type="hidden" name="post_id" value="{{$post->id}}">
							<div class="clearfix"></div>
						</div>
						<div class="itemtype text-center">
							<button type="submit" class="btn btn-success">Make Bid</button>						
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
		<br/>
		<!-- Comments Form -->
		@if(Auth::User())
		<div class="well">
			<h4>Leave a Comment:</h4><br>
			<form role="form" method="post" action="{{ route('add_comment',[$post->id]) }}">
				@csrf
				<div class="form-group">
					<textarea class="form-control" rows="3" name="comment" placeholder="Enter Comment"></textarea>
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
		@else
		<div class="alert alert-info" role="alert">
			<strong>Hey!</strong> If you already have an account <a href="{{ route('login') }}" class="alert-link">Login</a> now to make the comments you want. If you do not have an account yet you're welcome to <a href="{{ route('register') }}" class="alert-link"> create an account.</a>
		</div>
		@endif

		<hr>
		<!-- Posted Comments -->

		<!-- Comment -->
		@forelse($comments as $comment)
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading">
					{{ $comment->User->name }}
				</h4>
				<p>{{ $comment->comment }}</p>
				<a style="font-weight: 400;font-size: 18px" role="button" data-toggle="collapse" href="#reply{{$comment->id}}"aria-expanded="false" aria-controls="collapseExample">
					@if($comment->Reply->count())
					View Replies
					@else
					Add Reply
					@endif
				</a>
				<br>
				<br>
				<div class="collapse" id="reply{{$comment->id}}">
					@foreach($comment->Reply as $reply)
					<div class="media pull-right col-md-11">
						<div class="media-body">
							<h4 class="media-heading">
								{{ $reply->User->name }}
							</h4>
							<p>{{ $reply->reply }}</p>
						</div>
					</div>
					@endforeach

					<br>
					<br>
					<br>

					@if(Auth::User())
					<div class="well pull-right col-md-11">
						<h4>Leave a Reply:</h4><br>
						<form role="form" method="post" action="{{ route('add_reply',[$comment->id]) }}">
							@csrf
							<div class="form-group">
								<textarea class="form-control" rows="3" name="reply" placeholder="Enter Reply"></textarea>
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
					@else
					<div class="alert alert-info" role="alert">
						<strong>Hey!</strong> If you already have an account <a href="{{ route('login') }}" class="alert-link">Login</a> now to make the reply you want. If you do not have an account yet you're welcome to <a href="{{ route('register') }}" class="alert-link"> create an account.</a>
					</div>
					@endif
				</div>
			</div>
		</div>
		@empty
		<p>No Comments Yet.</p>
		@endforelse
	</div>
</div>
@endsection