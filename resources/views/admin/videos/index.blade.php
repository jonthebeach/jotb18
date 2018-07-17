@extends('admin.layouts.master') @section('title') Videos @endsection @section ('content')
<div class="container">
    <h1>Videos</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\VideosController@create') }}">Create video</a>
        {{ Form::open(['url' => action('Admin\VideosController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $videos as $video)
            <li data-id="{{ $video->id }}" class="list-group-item" style="cursor:move">
                <a href="{{ action('Admin\VideosController@edit', [$video->id]) }}">
                    {{ $video->order }} - {{ ucwords($video->getVideoTitle()) }} - {{ $video->videoGroups->title }}
                </a>
                <div class="float-right">
                    <a class="btn btn-danger" href="#"
                        onclick="event.preventDefault(); 
                            confirm('Delete `{{ $video->getVideoTitle() }}`, are you sure?') ? document.getElementById('logout-form-{{ $video->id }}').submit() : '';">
                        Delete
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <form id="logout-form-{{ $video->id }}" method="POST" action="{{ action('Admin\VideosController@destroy', [$video->id])}}">
                        {{ csrf_field() }} 
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection