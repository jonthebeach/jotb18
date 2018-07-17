@extends('admin.layouts.master') @section('title') BlogItems @endsection @section ('content')
<div class="container">
    <h1>BlogItems</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\BlogItemsController@create') }}">Create blogItem</a>
        {{ Form::open(['url' => action('Admin\BlogItemsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $blogItems as $blogItem)
        <li data-id="{{ $blogItem->id }}" class="list-group-item" style="cursor:move">
            <a href="{{ action('Admin\BlogItemsController@edit', [$blogItem->id]) }}">
                {{ $blogItem->order }} - {{ ucwords($blogItem->title) }}
            </a>
            <div class="float-right">
                <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); 
                        confirm('Delete `{{ $blogItem->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $blogItem->id }}').submit() : '';">
                    Delete
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form id="logout-form-{{ $blogItem->id }}" method="POST" action="{{ action('Admin\BlogItemsController@destroy', [$blogItem->id])}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection