@extends('admin.layouts.master')
@section('title') BlogItems @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $blogItem->title }}</h1>
		{{ Form::model($blogItem, ['method' => 'PATCH', 'action' => ['Admin\BlogItemsController@update', $blogItem->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.blogItems.partials.form')
		{{ Form::close() }}
	</div>
@endsection
