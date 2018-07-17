@extends('admin.layouts.master') 
@section('title') Topics @endsection 
@section ('content')
<div class="container">
    <h1>Topics</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\TopicsController@create') }}">Add new</a>
        {{ Form::open(['url' => action('Admin\TopicsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $topics as $topic)
        <li data-id="{{ $topic->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\TopicsController@edit', [$topic->id]) }}">
                        {{ $topic->order }} - {{ $topic->title }}
                    </a>
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $topic->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $topic->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $topic->id }}" method="POST" action="{{ action('Admin\TopicsController@destroy', [$topic->id])}}">
                            {{ csrf_field() }} 
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection