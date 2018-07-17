@extends('admin.layouts.master')
@section('title') Talk @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $talk->title }}</h1>
		{{ Form::model($talk, ['method' => 'PATCH', 'action' => ['Admin\TalkController@update', $talk->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.talk.partials.form')
		{{ Form::close() }}
	</div>
@endsection
