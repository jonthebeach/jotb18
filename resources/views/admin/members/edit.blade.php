@extends('admin.layouts.master')
@section('title') Members @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $member->getFullName() }}</h1>
		{{ Form::model($member, ['method' => 'PATCH', 'action' => ['Admin\MembersController@update', $member->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.members.partials.form')
		{{ Form::close() }}
	</div>
@endsection
