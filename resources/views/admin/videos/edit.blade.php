@extends('admin.layouts.master')
@section('title') Videos @endsection
@section ('content')
	<div class="container">
		<h1>Edit - {{ $video->getVideoTitle() }}</h1>
		{{ Form::model($video, ['method' => 'PATCH', 'action' => ['Admin\VideosController@update', $video->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.videos.partials.form')
		{{ Form::close() }}
	</div>
@endsection
