@extends('layouts.app2')

<?php $SongName = htmlspecialchars($singleSong->song_name); ?>
<?php $ArtisteName = htmlspecialchars($singleSong->artiste_name); ?>

@section('title', "| $SongName - $ArtisteName")

@section('content')
@if($singleSong)
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content" id="singleSong">
        <p class="singleSongName">{{$singleSong->song_name}} - {{$singleSong->artiste_name}}</p>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<section id="facts" class="padding">
<div class="container">
    <div class="row">
      @include('socialshare')
        <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="{{$singleSong->file_url}}" class="img-responsive" id="singleSongImage">
            {{-- <button class="btn btn-default" id="singleSongDownload">  --}}
                <a href="{{$singleSong->download_link}}" download="download" class="btn btn-default" id="singleSongDownload" target="_blank">  <i class="fa fa-download"></i> Download</a> 
            {{-- </button> --}}
        </div>
        <div class="col-md-8 col-sm-8 col-xs-8">
            <p>{!!$singleSong->lyrics!!}</p>
        </div>
    </div>
    <div id="fb-comments">
      <h5>What Do you Have To Say About This Song?</h5>
    </div>
    <div class="fb-comments"></div>
</div>
</section>
@include('footer')
@endif
@endsection

{{-- DONE WITH THIS PLACE --}}
