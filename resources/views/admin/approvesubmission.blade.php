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
            <div class="col-lg-10">

                <div class="box">
                    <div class="box-header">
                        
                        View Lecturers
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Artiste Name</th>
                                <th>Song Title</th>
                                <th>Lyrics</th>
                                <th>Download Link</th>                                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($approvesubmission as $submission)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$submission->artiste->artiste_name}}</td>
                                    <td>{{$submission->song_name}}</td>
                                    <td>{{substr(strip_tags($submission->lyrics), 0, 250)}}{{strlen(strip_tags($submission->lyrics)) > 250 ? "..." : ""}}</td>
                                    <td style="word-wrap: break-word; max-width: 150px;">{{$submission->download_link}}</td>
                                    {{-- <td>{{$song->user->fullname}}</td> --}}
                                    <td><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                    
                                </tr>
                                <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $approvesubmission->links() }}
                    </div><!-- /.box-body -->

                </div>



            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin.footer')

    {{-- @include('admin.newlecturer')
    @include('admin.newlecturers') --}}

@endsection