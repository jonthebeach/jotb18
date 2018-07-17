@extends('admin.layouts.master')
@section('title') SponsorsGroups @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $sponsorsGroup->title }}</h1>
		{{ Form::model($sponsorsGroup, ['method' => 'PATCH', 'action' => ['Admin\SponsorsGroupsController@update', $sponsorsGroup->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.sponsorsGroups.partials.form')
		{{ Form::close() }}
	</div>
@endsection
