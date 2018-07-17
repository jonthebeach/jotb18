@extends('admin.layouts.master') 
@section('title') Talk @endsection 
@section ('content')
<div class="container">
	<h1>Create talk</h1>
	{{ Form::open(['url' => action('Admin\TalkController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.talk.partials.form')
	{{ Form::close() }}
</div>
@endsection
