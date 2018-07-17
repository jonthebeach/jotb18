@extends('admin.layouts.master') 
@section('title') Members @endsection 
@section ('content')
<div class="container">
	<h1>Create member</h1>
	{{ Form::open(['url' => action('Admin\MembersController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.members.partials.form')
	{{ Form::close() }}
</div>
@endsection
