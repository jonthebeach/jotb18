@extends('admin.layouts.master')
@section('title') VideoGroups @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $videoGroup->title }}</h1>
		{{ Form::model($videoGroup, ['method' => 'PATCH', 'action' => ['Admin\VideoGroupsController@update', $videoGroup->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.videoGroups.partials.form')
		{{ Form::close() }}
	</div>
@endsection
