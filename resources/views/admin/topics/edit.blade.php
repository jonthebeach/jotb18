@extends('admin.layouts.master')
@section('title') Topics @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $topic->title }}</h1>
		{{ Form::model($topic, ['method' => 'PATCH', 'action' => ['Admin\TopicsController@update', $topic->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.topics.partials.form')
		{{ Form::close() }}
	</div>
@endsection
