@extends('admin.layouts.master') 
@section('title') Talk @endsection 
@section ('content')
<div class="container">
    <h1>Talks</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\TalkController@create') }}">Add new</a>
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $talk as $talk)
        <li data-id="{{ $talk->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\TalkController@edit', [$talk->id]) }}">
                        {{ $talk->title }}
                    </a>
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $talk->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $talk->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $talk->id }}" method="POST" action="{{ action('Admin\TalkController@destroy', [$talk->id])}}">
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