@extends('admin.layouts.master')
@section('title') Workshop @endsection
@section ('content')
<div class="container">
    <h1>Workshops</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\WorkshopsController@create') }}">Add new</a>
        {{ Form::open(['url' => action('Admin\WorkshopsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $workshops as $workshop)
        <li data-id="{{ $workshop->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\WorkshopsController@edit', [$workshop->id]) }}">
                    {{ $workshop->order }} - {{ ucwords($workshop->title) }}
                    </a>
                </div>
                <div class="col-md">
                    {{ $workshop->type }}
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $workshop->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $workshop->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $workshop->id }}" method="POST" action="{{ action('Admin\WorkshopsController@destroy', [$workshop->id])}}">
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