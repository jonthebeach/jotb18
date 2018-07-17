@extends('admin.layouts.master') @section('title') Jobs @endsection @section ('content')
<div class="container">
	<h1>Create job</h1>
	{{ Form::open(['url' => action('Admin\JobsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.jobs.partials.form')
	{{ Form::close() }}
</div>
@endsection
