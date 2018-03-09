@extends('admin.layouts.app')

@section('content')

	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Change Password 
                <small>Dasboard</small>
            </h1>
            <ol class="breadcrumb">
            	<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Change Password</li> 
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
                        <form role="form" action="{{ url('admin/password-update') }}" {{-- class="col-md-8 col-md-offset-2" --}} method="POST">

	                        {{ csrf_field() }}

	                        {{-- <div class="box-body"> --}}
	                            <div class="form-group {{ $errors->has('old') ? 'has-error': ''}} required">
	                                <label for="old">Current Password</label>
	                                <input type="password" name="old" class="form-control" id="old" placeholder="Current Password" required>
	                                @if($errors->has('old'))
	                                    <span class="help-block">{{ $errors->first('old') }}</span>
	                                @endif
	                            </div>
	                            <div class="form-group {{ $errors->has('password') ? 'has-error': ''}} required">
	                                <label for="password">New Password</label>
	                                <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
	                                @if($errors->has('password'))
	                                    <span class="help-block">{{ $errors->first('password') }}</span>
	                                @endif
	                            </div>

	                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error': ''}} required">
	                                <label for="password_confirm">Confirm Password</label>
	                                <input type="password" name="password_confirmation" class="form-control" id="password_confirm" placeholder="Confirm Password" required>
	                                @if($errors->has('password_confirmation'))
	                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
	                                @endif
	                            </div>

	                            <div class="form-group">
		                            <button type="submit" class="btn btn-primary">
		                                Update
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