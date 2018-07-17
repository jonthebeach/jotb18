@extends('admin.layouts.master')
@section('title') Supporters @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $supporter->title }}</h1>
		{{ Form::model($supporter, ['method' => 'PATCH', 'action' => ['Admin\SupportersController@update', $supporter->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.supporters.partials.form')
		{{ Form::close() }}
	</div>
@endsection
