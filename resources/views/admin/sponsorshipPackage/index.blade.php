@extends('admin.layouts.master') @section('title') Members @endsection @section ('content')
<div class="container">
	<h1>Upload sponsorship package</h1>
	{{ Form::open(['url' => action('Admin\SponsorshipPackageController@store'), 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('sponsorship', 'Sponsorship package:') }} 
            {!! Form::file('sponsorship', array('class' => 'sponsorship')) !!}
        </div>
        <div class="form-group">
            {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
        </div>
	{{ Form::close() }}
</div>
@endsection
