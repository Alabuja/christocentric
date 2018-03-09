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
                        <form role="form" action="{{ url('admin/new-artiste') }}" method="POST">

	                        {{ csrf_field() }}

	                        {{-- <div class="box-body"> --}}
	                        <div class="form-group{{ $errors->has('artiste_name') ? 'has-error': '' }} required">
                                <label for="artiste_name">Artiste Name</label>
	                            <select class="form-control" name="artiste_name" id="artiste_name" required>
                                    
                                    @foreach($artistes as $artiste)
                                        <option value="{{$artiste->artiste_name}}">{{$artiste->artiste_name}}</option>
                                    @endforeach
                                </select>
	                            @if($errors->has('artiste_name'))
	                                <span class="help-block">{{ $errors->first('artiste_name') }}</span>
	                            @endif
                            </div>
	                        <div class="form-group {{ $errors->has('biography') ? 'has-error': ''}}">
				                <label>Artiste Biography</label>
				                <textarea placeholder="Enter Artiste Biography" name="biography" rows="7">
				                </textarea>

				                @if($errors->has('biography'))
				                	<span class="help-block">{{$errors->first('biography') }}</span>
				                @endif
				            </div>
	                            
	                            <div class="form-group">
		                            <button type="submit" class="btn btn-primary">
		                                Add New Artiste
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