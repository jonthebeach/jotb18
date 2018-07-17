@extends('admin.layouts.master') @section('title') Supporters @endsection @section ('content')
<div class="container">
	<h1>Create supporter</h1>
	{{ Form::open(['url' => action('Admin\SupportersController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.supporters.partials.form')
	{{ Form::close() }}
</div>
@endsection
