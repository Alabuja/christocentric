@extends('layouts.app2')

@section('title', '| SUBMIT SONGS')

@section('content')
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <p class="submitSongs">Submit Songs</p>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<section id="facts" class="padding">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<p id="introSubmitSongs">You can submit songs even without registering on the site</p>
        	@include('layouts.alerts')
            <form role="form" action="{{ url('add-lyrics') }}" method="POST">
	            {{ csrf_field() }}
	            <div class="col-md-6">
	            	<div class="form-group {{ $errors->has('fullname') ? 'has-error': ''}} required">
		                <label for="fullname">Fullname</label>
		                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Type Your Fullname" required>
		                @if($errors->has('fullname'))
		                    <span class="help-block">{{ $errors->first('fullname') }}</span>
		                @endif
		            </div>
		            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                    <label for="email">E-Mail Address</label>
	                    <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}">
	                    @if ($errors->has('email'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
	                </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
	                    <label for="phone_number" >Phone Number</label>
	                    <input id="phone_number" type="number" placeholder="Phone Number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
	                    @if ($errors->has('phone_number'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('phone_number') }}</strong>
	                        </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('twitter_name') ? ' has-error' : '' }}">
	                    <label for="twitter_name" >Twitter Handle</label>
	                    <input id="twitter_name" type="text" placeholder="Twitter Handle" class="form-control" name="twitter_name" value="{{ old('twitter_name') }}">

	                    @if ($errors->has('twitter_name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('twitter_name') }}</strong>
	                        </span>
	                    @endif
	                </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="form-group{{ $errors->has('facebook_name') ? ' has-error' : '' }}">
	                    <label for="facebook_name">Facebook Name</label>
						
						<input id="facebook_name" type="text" placeholder="Facebook Name" class="form-control" name="facebook_name" value="{{ old('facebook_name') }}">

	                    @if ($errors->has('facebook_name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('facebook_name') }}</strong>
	                        </span>
	                    @endif
	                </div>
		            <div class="form-group {{ $errors->has('song_title') ? 'has-error': ''}} required">
		                <label for="song_title">Song Title</label>
		                <input type="text" name="song_title" class="form-control" id="song_title" placeholder="Song Title" value="{{ old('song_title') }}" required>
		                @if($errors->has('song_title'))
		                    <span class="help-block">{{ $errors->first('song_title') }}</span>
		                @endif
		            </div>
	            </div>
	            <div class="col-md-6">
	            	<div class="form-group {{ $errors->has('artiste_name') ? 'has-error': ''}} required">
		                <label for="artiste_name">Artiste Name</label>
		                <input type="text" name="artiste_name" class="form-control" id="artiste_name" placeholder="Artiste Name" value="{{ old('artiste_name') }}" required>
		                @if($errors->has('artiste_name'))
		                    <span class="help-block">{{ $errors->first('artiste_name') }}</span>
		                @endif
		            </div>
		            <div class="form-group {{ $errors->has('download_link') ? 'has-error': ''}} required">
		                <label for="download_link">Download Link</label>
		                <input type="text" name="download_link" class="form-control" id="download_link" placeholder="Download Link" value="{{ old('download_link') }}" required>
		                @if($errors->has('download_link'))
		                    <span class="help-block">{{ $errors->first('download_link') }}</span>
		                @endif
		            </div>
	            </div>
	            <div class="col-md-12">
	            	<div class="form-group {{ $errors->has('lyrics') ? 'has-error': ''}} required">
					    <label for="lyrics">Enter Lyrics Here</label>
					    <textarea placeholder="Enter Artiste Biography" name="lyrics" rows="7" value="{{ old('lyrics') }}">
					    </textarea>

					    @if($errors->has('lyrics'))
					        <span class="help-block">{{$errors->first('lyrics') }}</span>
					    @endif
					</div>
	            </div>
	            <div class="form-group col-md-8">
		            <button type="submit" class="btn btn-default">
		                Submit Song
		            </button>
		        </div>
            </form>
        </div>
    </div>
</div>
</section>
@include('footer')
@endsection