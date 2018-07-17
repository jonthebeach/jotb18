@extends('admin.layouts.master') @section('title') SponsorsGroups @endsection @section ('content')
<div class="container">
	<h1>Create sponsorsGroup</h1>
	{{ Form::open(['url' => action('Admin\SponsorsGroupsController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.sponsorsGroups.partials.form')
	{{ Form::close() }}
</div>
@endsection
