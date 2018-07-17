@extends('admin.layouts.master') @section('title') Sponsors @endsection @section ('content')
<div class="container">
	<h1>Create sponsor</h1>
	{{ Form::open(['url' => action('Admin\SponsorsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.sponsors.partials.form')
	{{ Form::close() }}
</div>
@endsection
