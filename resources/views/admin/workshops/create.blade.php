@extends('admin.layouts.master') @section('title') Workshop @endsection @section ('content')
<div class="container">
	<h1>Create workshop</h1>
	{{ Form::open(['url' => action('Admin\WorkshopsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.workshops.partials.form')
	{{ Form::close() }}
</div>
@endsection
