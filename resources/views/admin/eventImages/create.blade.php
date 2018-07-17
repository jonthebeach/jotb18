@extends('admin.layouts.master') @section('title') EventImages @endsection @section ('content')
<div class="container">
	<h1>Create event image category</h1>
	{{ Form::open(['url' => action('Admin\EventImagesController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.eventImages.partials.form')
	{{ Form::close() }}
</div>
@endsection
