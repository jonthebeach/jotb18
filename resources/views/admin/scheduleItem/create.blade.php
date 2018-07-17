@extends('admin.layouts.master') 
@section('title') ScheduleItem @endsection 
@section ('content')
<div class="container">
	<h1>Create scheduleItem</h1>
	{{ Form::open(['url' => action('Admin\ScheduleItemController@store'), 'enctype' => 'multipart/form-data']) }}
		@include('admin.scheduleItem.partials.form')
	{{ Form::close() }}
</div>
@endsection
