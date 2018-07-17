@extends('admin.layouts.master')
@section('title') Workshop @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $workshop->title }}</h1>
		{{ Form::model($workshop, ['method' => 'PATCH', 'action' => ['Admin\WorkshopsController@update', $workshop->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.workshops.partials.form')
		{{ Form::close() }}
	</div>
@endsection
