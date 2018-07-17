@extends('admin.layouts.master') 
@section('title') Topics @endsection 
@section ('content')
<div class="container">
	<h1>Create topic</h1>
	{{ Form::open(['url' => action('Admin\TopicsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.topics.partials.form')
	{{ Form::close() }}
</div>
@endsection
