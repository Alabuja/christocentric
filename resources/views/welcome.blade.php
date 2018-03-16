@extends('layouts.app3')

@section('content')
 @include('layouts.slider')
    <!--Fun Facts-->
    <section id="facts" class="padding">
        <h3 id="latestSongs">Latest Songs</h3>
        <div class="container">
            @if($welcome)
                <div class="row">
                    @foreach($welcome as $song)
                        <div class="col-md-3 col-sm-5 col-xs-6 text-layer">
                            <div class="content_img">
                                <a href="artiste/{{$song->artiste->slug}}/{{$song->slug}}">
                                    <img src="{{$song->file_url}}" class="img-responsive image" width="100%" height="100%" >
                                    <div class="nameSong">{{$song->song_name}} - {{$song->artiste->artiste_name}} </div>
                                    
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- {{$newSongs->links() }} --}}
        </div>
    </section>
    @include('footer')
@endsection


{{-- <style type="text/css">
    
</style> --}}