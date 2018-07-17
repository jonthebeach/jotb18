@extends('admin.layouts.master') @section('title') VideoGroups @endsection @section ('content')
<div class="container">
	<h1>Create videoGroup</h1>
	{{ Form::open(['url' => action('Admin\VideoGroupsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.videoGroups.partials.form')
	{{ Form::close() }}
</div>
@endsection
