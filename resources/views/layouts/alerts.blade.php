@if (Session::has('success'))
	<div class="alert alert-success">{!! Session::get('success') !!}</div>
@endif
@if (Session::has('failure'))
	<div class="alert alert-danger">{!! Session::get('failure') !!}</div>
@endif