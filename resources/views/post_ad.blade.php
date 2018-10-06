@extends('master')

@section('main')
<div class="submit-ad main-grid-border sign-in-wrapper">
	<div class="container">
		<h2 class="head">Post an Ad</h2>
		<div class="post-ad-form">
			<form enctype="multipart/form-data" action="{{ route('add_post') }}" method="post">
				@csrf
				<label>Select Category <span>*</span></label>
				<select class="selectpicker show-tick" data-live-search="true" name="category" required>
					<option data-tokens="Mobiles">All</option>
					@foreach($categories as $category)
					<option data-tokens="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				<div class="clearfix"></div>
				<label>Ad Title <span>*</span></label>
				<input type="text" class="phone" name="title" placeholder="Enter Title">
				<div class="clearfix"></div>
				<label>Starting Bid <span>*</span></label>
				<input type="number" class="phone" name="Starting_bid">
				<div class="clearfix"></div>
				<label>Ad Description <span>*</span></label>
				<textarea class="mess" placeholder="Write few lines about your product" name="description"></textarea>
				<div class="clearfix"></div>
				<div class="upload-ad-photos">
					<label>Photos for your ad :</label>	
					<div class="photos-upload-view">
						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000"/>
						<div>
							<input type="file" id="fileselect" name="file" accept="image/png, image/jpeg"/>
							<div id="filedrag">or drop files here</div>
						</div>

						<div id="submitbutton">
							<button type="submit">Upload Files</button>
						</div>
						<div id="messages">
							<p>Status Messages</p>
						</div>
					</div>
					<script src="{{asset('w3layouts/js/filedrag.js')}}"></script>
				</div>
				<input type="submit" value="Post">					
				<div class="clearfix"></div>
			</form>
		</div>
	</div>	
</div>
@endsection
