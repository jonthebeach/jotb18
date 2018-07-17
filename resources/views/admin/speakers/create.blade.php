@extends('admin.layouts.master') @section('title') Speakers @endsection @section ('content')
<div class="container">
	<h1>Create speaker</h1>
	{{ Form::open(['url' => action('Admin\SpeakersController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.speakers.partials.form')
	{{ Form::close() }}
</div>
@endsection
