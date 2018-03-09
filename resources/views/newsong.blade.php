@extends('layouts.app2')

@section("title", "| NEW SONG")

@section('content')
<!--Page Header-->

<section id="facts" class="padding">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" action="{{ url('submit-song') }}" method="POST">
	            {{ csrf_field() }}
				<div class="form-group {{ $errors->has('song_title') ? 'has-error': ''}} required">
	                <label for="song_title">Song Title</label>
	                <input type="text" name="song_title" class="form-control" id="song_title" placeholder="Song Title" required>
	                @if($errors->has('song_title'))
	                    <span class="help-block">{{ $errors->first('song_title') }}</span>
	                @endif
	            </div><div class="form-group {{ $errors->has('artiste_name') ? 'has-error': ''}} required">
	                <label for="artiste_name">Artiste Name</label>
	                <input type="text" name="artiste_name" class="form-control" id="artiste_name" placeholder="Artiste Name" required>
	                @if($errors->has('artiste_name'))
	                    <span class="help-block">{{ $errors->first('artiste_name') }}</span>
	                @endif
	            </div>
	            <div class="form-group {{ $errors->has('download_link') ? 'has-error': ''}} required">
	                <label for="download_link">Download Link</label>
	                <input type="text" name="download_link" class="form-control" id="download_link" placeholder="Download Link" required>
	                @if($errors->has('download_link'))
	                    <span class="help-block">{{ $errors->first('download_link') }}</span>
	                @endif
	            </div>
	            <div class="form-group{{ $errors->has('lyrics') ? 'has-error': ''}}">
				    <label for="lyrics">Enter Lyrics Here</label>
				    <textarea placeholder="Enter Lyrics Here" name="lyrics" rows="7" id="lyrics" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
				    </textarea>

				    @if($errors->has('lyrics'))
				        <span class="help-block">{{$errors->first('lyrics') }}</span>
				    @endif
				</div>
	                            
	            <div class="form-group">
		            <button type="submit" class="btn btn-default">
		                Add Song
		            </button>
		        </div>
            </form>
        </div>
    </div>
</div>
</section>
@include('footer')
@endsection