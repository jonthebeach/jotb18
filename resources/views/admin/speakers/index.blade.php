@extends('admin.layouts.master') @section('title') Speakers @endsection @section ('content')
<div class="container">
    <h1>Speakers</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\SpeakersController@create') }}">Create speaker</a>
        {{ Form::open(['url' => action('Admin\SpeakersController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $speakers as $speaker)
        <li data-id="{{ $speaker->id }}" class="list-group-item" style="cursor:move">
            <a href="{{ action('Admin\SpeakersController@edit', [$speaker->id]) }}">
                {{ $speaker->order }} - {{ ucwords($speaker->getFullName()) }}
            </a>
            <div class="float-right">
                <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); 
                        confirm('Delete `{{ $speaker->getFullName() }}`, are you sure?') ? document.getElementById('logout-form-{{ $speaker->id }}').submit() : '';">
                    Delete
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form id="logout-form-{{ $speaker->id }}" method="POST" action="{{ action('Admin\SpeakersController@destroy', [$speaker->id])}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection