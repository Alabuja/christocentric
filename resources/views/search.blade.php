@extends('layouts.app2')

@section('content')

		<div class="container-fluid">

            <h6>
              Search results for: <i>{{ $query }}</i>
            </h6><br>
			@if (count($search) === 0) 
                No products found
            @elseif (count($search) >= 1)
                @foreach($search as $query)
                @endforeach
			@endif

@endsection