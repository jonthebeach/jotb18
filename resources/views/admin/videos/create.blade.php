@extends('admin.layouts.master') @section('title') Videos @endsection @section ('content')
<div class="container">
	<h1>Create video</h1>
	{{ Form::open(['url' => action('Admin\VideosController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.videos.partials.form')
	{{ Form::close() }}
</div>
@endsection
