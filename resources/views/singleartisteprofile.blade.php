@extends('layouts.app2')

<?php $ArtisteName = htmlspecialchars($artiste->artiste_name); ?>
@if($songs)
@foreach($songs as $song)
@section('title', "| $ArtisteName")
@section('twitter:title',$song->song_name)
@section('twitter:image',$song->file_url)

@section('content')
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <p class="artisteProfileName">{{$artiste->artiste_name}}</p>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->

<section id="facts" class="padding">
<div class="container">
    {{-- {{$songs->approve->slug}} --}}
    
        
        <p class="artisteProfileBio">{!!$artiste->biography or ''!!}</p>
        <div class="row" id="displayImages">
            
                <a href="/artiste/{{$artiste->slug}}/{{$song->slug}}"> {{-- Get the slug from the artistes table then get slug from the songs table--}}
                    <div class="col-md-3 col-sm-6">

                        {{-- <img src="{{asset('uploads/'.$song->song_image)}}" class="img-responsive" /> --}}
                            <img src="{{$song->file_url}}" class="img-responsive" width="100%" height="100%">
                        <p class="artisteProfileSongName">{{$song->song_name}}</p>
                    </div>
                </a>
            
        </div>

    </div>
</section>
@include('footer')
@endsection
@endforeach
@endif

{{-- DONE WITH THIS PLACE --}}