@extends('layouts.app3')

@section('content')
 @include('layouts.slider')
    <!--Fun Facts-->
    <section id="facts" class="padding">
        <h3 id="latestSongs">Latest Songs</h3>
        <div class="container">
            @if($newSongs)
                <div class="row">
                    @foreach($newSongs as $song)
                        <div class="col-md-3 col-sm-5 col-xs-6 text-layer">
                            
                                <a href="artiste/{{$song->artiste->slug}}/{{$song->slug}}" target="_blank">
                                    <img src="{{$song->file_url}}" class="img-responsive image" width="100%" height="100%" >
                                    <p class="nameSong">{{$song->song_name}} - {{substr(strip_tags($song->artiste->artiste_name), 0, 7)}}{{strlen(strip_tags($song->artiste->artiste_name)) > 7 ? "..." : ""}} </p>
                                    
                                </a>
                            
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        {{-- {{$newSongs->links() }} --}}
    </section>
    @include('footer')
@endsection
 