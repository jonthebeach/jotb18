@extends('admin.layouts.master') @section('title') BlogItems @endsection @section ('content')
<div class="container">
	<h1>Create blogItem</h1>
	{{ Form::open(['url' => action('Admin\BlogItemsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.blogItems.partials.form')
	{{ Form::close() }}
</div>
@endsection
