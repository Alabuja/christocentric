@extends('layouts.app2')

@section('title', '| SONGS')

@section('content')
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
         <p class="allSongs">All Songs</p>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<section id="facts" class="padding">
<div class="container">
    @if($Lyrics)
        <div class="row">
            @foreach($Lyrics as $newsong)
                <div class="col-md-3 col-sm-5 col-xs-6 text-layer">
                    <div class="content_img">
                      <a href="/artiste/{{$newsong->artiste->slug}}/{{$newsong->slug}}">
                          <img src="{{$newsong->file_url}}" class="img-responsive" width="100%" height="100%">

                          <div class="nameSong">{{$newsong->song_name}} - {{$newsong->artiste->artiste_name}} </div>
                      </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{$Lyrics->links() }}
    </div>
    
</section>
@include('footer')
@endsection
