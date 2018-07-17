@extends('admin.layouts.master')
@section('title') Speakers @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $speaker->getFullName() }}</h1>
		{{ Form::model($speaker, ['method' => 'PATCH', 'action' => ['Admin\SpeakersController@update', $speaker->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.speakers.partials.form')
		{{ Form::close() }}
	</div>
@endsection
