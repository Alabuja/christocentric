@extends('admin.layouts.app')

@section('content')

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Artiste 
                <small>Dasboard</small>
            </h1>
            <ol class="breadcrumb">
            	<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">New Artiste</li> 
            </ol>
        </section>

        <!-- Main content -->
        <section class="content clearfix">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header">
						@include('layouts.alerts')
                    </div>

                    <div class="box-body">
                        <form role="form" action="{{ url('admin/approve-artiste') }}" method="POST" enctype="multipart/form-data">

	                        {{ csrf_field() }}

	                        {{-- <div class="box-body"> --}}
	                        <div class="form-group{{ $errors->has('artiste_id') ? 'has-error': '' }} required">
                                <label for="artiste_id">Artiste Name</label>
	                            <select class="form-control" name="artiste_id" id="artiste_id" required>
                                    <option value="">Select an option</option>
                                    @foreach($approveartiste as $artiste)
                                        <option value="{{$artiste->id}}">{{$artiste->artiste_name}}</option>
                                    @endforeach
                                </select>
	                            @if($errors->has('artiste_id'))
	                                <span class="help-block">{{ $errors->first('artiste_id') }}</span>
	                            @endif
                            </div>
	                        <div class="form-group {{ $errors->has('song_name') ? 'has-error': ''}} required">
				                <label for="song_name">Song Name</label>
	                            <input type="text" name="song_name" class="form-control" id="song_name" placeholder="Song Name" required>
	                            @if($errors->has('song_name'))
	                                <span class="help-block">{{ $errors->first('song_name') }}</span>
	                            @endif
				            </div>
				            <div class="form-group {{ $errors->has('song_image') ? 'has-error': ''}} required">
				                <label for="song_image">Song Image</label>
	                            <input type="file" name="song_image" class="form-control" id="song_image" required>
	                            @if($errors->has('song_image'))
	                                <span class="help-block">{{ $errors->first('song_image') }}</span>
	                            @endif
				            </div>
				            <div class="form-group {{ $errors->has('download_link') ? 'has-error': ''}} required">
				                <label for="download_link">Download Link</label>
	                            <input type="text" name="download_link" class="form-control" id="download_link" placeholder="Download Link" required>
	                            @if($errors->has('download_link'))
	                                <span class="help-block">{{ $errors->first('download_link') }}</span>
	                            @endif
				            </div>
				            <div class="form-group {{ $errors->has('lyrics') ? 'has-error': ''}} required">
				                <label>Song Lyrics</label>
				                <textarea class="form-control" placeholder="Enter Song Lyrics" name="lyrics">
				                </textarea>

				                @if($errors->has('lyrics'))
				                	<span class="help-block">{{$errors->first('lyrics') }}</span>
				                @endif
				            </div>
	                            
	                            <div class="form-group">
		                            <button type="submit" class="btn btn-primary">
		                                Approve Artiste
		                            </button>
		                        </div>
                        </form>

                    </div><!-- /.box-body -->

                </div>

            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- /.content-wrapper -->
    @include('admin.footer')

@endsection