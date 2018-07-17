@extends('admin.layouts.master')
@section('title') Sponsors @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $sponsor->title }}</h1>
		{{ Form::model($sponsor, ['method' => 'PATCH', 'action' => ['Admin\SponsorsController@update', $sponsor->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.sponsors.partials.form')
		{{ Form::close() }}
	</div>
@endsection
