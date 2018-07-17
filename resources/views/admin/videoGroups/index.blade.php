@extends('admin.layouts.master') @section('title') VideoGroups @endsection @section ('content')
<div class="container">
    <h1>VideoGroups</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\VideoGroupsController@create') }}">Create videoGroup</a>
        {{ Form::open(['url' => action('Admin\VideoGroupsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $videoGroups as $videoGroup)
        <li data-id="{{ $videoGroup->id }}" class="list-group-item" style="cursor:move">
            <a href="{{ action('Admin\VideoGroupsController@edit', [$videoGroup->id]) }}">
                {{ $videoGroup->order }} - {{ ucwords($videoGroup->title) }}
            </a>
            <div class="float-right">
                <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); 
                        confirm('Delete `{{ $videoGroup->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $videoGroup->id }}').submit() : '';">
                    Delete
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form id="logout-form-{{ $videoGroup->id }}" method="POST" action="{{ action('Admin\VideoGroupsController@destroy', [$videoGroup->id])}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection