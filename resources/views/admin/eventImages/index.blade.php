@extends('admin.layouts.master') @section('title') EventImages @endsection @section ('content')
<div class="container">
    <h1>Event images categories</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\EventImagesController@create') }}">Create event image category</a>
        {{ Form::open(['url' => action('Admin\EventImagesController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $eventImages as $eventImage)
        <li data-id="{{ $eventImage->id }}" class="list-group-item" style="cursor:move">
            <a href="{{ action('Admin\EventImagesController@edit', [$eventImage->id]) }}">
                {{ $eventImage->order }} - {{ ucwords($eventImage->title) }}
            </a>
            <div class="float-right">
                <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); 
                        confirm('Delete `{{ $eventImage->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $eventImage->id }}').submit() : '';">
                    Delete
                </a>
                <form id="logout-form-{{ $eventImage->id }}" method="POST" action="{{ action('Admin\EventImagesController@destroy', [$eventImage->id])}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection