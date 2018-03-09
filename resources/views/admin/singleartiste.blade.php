@extends('admin.layouts.app')
     
@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Single Staff Details
                <small>Dasboard</small>
            </h1>
            <ol class="breadcrumb">
            	<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Single Staff Details</li> 
            </ol>
        </section>

        <!-- Main content -->
        <section class="content clearfix">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-10">

                <div class="box">
                    <div class="box-header">
                        <h3>Single Artiste Details</h3>
                        <p><img src=""></p> {{-- Source to Image --}}
                    </div>

                    <div class="box-body">
                    	<div class="col-md-4">
                    		<p><strong>Name</strong><br>
                    			@foreach($songs as $i => $song)
                    				@if($i == 0)
                    					{{$song->artiste_name}}
                    				@endif
                    			@endforeach
                    		</p>
                    	</div>
                    	<div class="col-md-4">
                    		<p style="text-align: justify;"><strong>Biography</strong><br>
                    			@foreach($songs as $i => $song)
                    				@if($i == 0)
                    					{{$song->biography}}
                    				@endif
                    			@endforeach
                    		</p>
                    	</div>
                    	<div class="col-md-4">
                    		<p><strong>Songs</strong><br>@foreach($songs as $song){{$song->song_name}}<br>@endforeach</p>
                    		{{-- Put the list of Songs here from the songs table --}}
                    	</div>
                    </div><!-- /.box-body -->

                </div>

            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

  <!-- /.content-wrapper -->
    @include('admin.footer')

@endsection