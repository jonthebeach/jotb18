@extends('admin.layouts.master')
@section('title') Jobs @endsection
@section ('content')
	<div class="container">
		<h1>Edit Job: {{ $job->title }}</h1>
		{{ Form::model($job, ['method' => 'PATCH', 'action' => ['Admin\JobsController@update', $job->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.jobs.partials.form')
		{{ Form::close() }}
	</div>
@endsection
