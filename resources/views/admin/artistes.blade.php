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
                                <th>Biography</th>                                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($artistes as $artiste)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$artiste->artiste->artiste_name}}</td>
                                    <td>{{$artiste->artiste->biography}}</td>
                                    <td><a href="/admin/artistes/{{$artiste->artiste->id}}">View Profile</a></td>
                                    
                                </tr>
                                <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $artistes->links() }}
                    </div><!-- /.box-body -->

                </div>



            </div><!-- /.row -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin.footer')

    {{-- @include('admin.newlecturer')
    @include('admin.newlecturers') --}}

@endsection