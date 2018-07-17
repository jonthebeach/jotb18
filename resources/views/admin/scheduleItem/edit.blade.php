@extends('admin.layouts.master')
@section('title') ScheduleItem @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $scheduleItem->title }}</h1>
		{{ Form::model($scheduleItem, ['method' => 'PATCH', 'action' => ['Admin\ScheduleItemController@update', $scheduleItem->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.scheduleItem.partials.form')
		{{ Form::close() }}
	</div>
@endsection
