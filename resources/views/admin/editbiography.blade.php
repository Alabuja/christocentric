@extends('admin.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Manage Lecturers
                <small>Dasboard</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Manage Lecturers</li> 
            </ol>
        </section>

        <!-- Main content -->
        <section class="content clearfix">
            <!-- Small boxes (Stat box) -->
            <div class="col-lg-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header">
                        
                    </div>
                    @include('layouts.alerts')
                    <div class="box-body">
                            
                            <form role="form" method="POST" action="{{ url('admin/artiste/' . $artistesBiography->id) }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('artiste_name') ? ' has-error' : '' }} required">
                                    <label for="artiste_name">Edit Coach</label>
                                    <input id="artiste_name" type="text" class="form-control" name="artiste_name" value="{!! $artistesBiography->artiste_name !!}" style="text-transform: capitalize;">

                                    @if ($errors->has('artiste_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('artiste_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('biography') ? 'has-error': ''}}">
                                    <label>Artiste Biography</label>
                                    <textarea placeholder="Enter Artiste Biography" name="biography" rows="7">
                                        {!! $artistesBiography->biography !!}
                                    </textarea>

                                    @if($errors->has('biography'))
                                        <span class="help-block">{{$errors->first('biography') }}</span>
                                    @endif
                                </div>

                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Edit Artistes </button>
                                </div>
                            </form>
                    </div>
                        
                    </div><!-- /.box-body -->

                </div>



            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin.footer')

    {{-- @include('admin.newlecturer')
    @include('admin.newlecturers') --}}

@endsection