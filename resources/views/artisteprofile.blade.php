@extends('layouts.app')

@section('title', '| ARTISTES PROFILE')

@section('twitter:title',"View All Artistes")

@section('content')
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <p class="allArtistes">Artistes Profile</p>
      </div>
    </div>
  </div>
</section> 
<!--Page Header-->
<section id="facts" class="padding">
<div class="container">
    <h3 id="allArtistes">All Artistes</h3>
    @if($artisteProfiles)
        <div class="row">
            @foreach($artisteProfiles as $artisteList)
                <a href="/artiste/{{$artisteList->artiste->slug}}"> {{-- URL should be directed to a single song and get the lyrics from there. Also, add an image inside the col-md-3 div for each song --}}
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <span>{{$artisteList->artiste->artiste_name}}</span> {{$artisteList->song_name}}
                    </div> 
                </a>
            @endforeach
        </div>
    @endif
    </div>
</section>
@include('footer')
@endsection
