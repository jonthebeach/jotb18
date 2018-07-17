@extends('admin.layouts.master')
@section('title') EventImages @endsection
@section ('content')
	<div class="container">
		<h1>Edit {{ $eventImage->title }}</h1>
		{{ Form::model($eventImage, ['method' => 'PATCH', 'action' => ['Admin\EventImagesController@update', $eventImage->id], 'enctype' => 'multipart/form-data']) }}
			@include('admin.eventImages.partials.form')
		{{ Form::close() }}
		<hr />
		@if(isset($eventImage))
			<div class="row">
				@foreach($eventImage->getImages() as $eventImagesFile)
					<div class="col-2 p-2">
						<figure>
							<img class="w-100" src="{{ $eventImagesFile->thumbnailPath }}" alt="" />
						</figure>
						<div>
							<form id="logout-form-{{ $eventImagesFile->id }}" method="POST" action="{{ action('Admin\EventImagesFilesController@destroy', [$eventImagesFile->id])}}">
								{{ csrf_field() }} 
								{{ method_field('DELETE') }}
								<input type="submit" class="btn btn-danger w-100" role="button" value="Delete" />
							</form>
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>
@endsection
