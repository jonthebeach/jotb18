@extends('admin.layouts.master') @section('title') Jobs @endsection @section ('content')
<div class="container">
    <h1>Jobs</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\JobsController@create') }}">Add new</a>
        {{ Form::open(['url' => action('Admin\JobsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $jobs as $job)
        <li data-id="{{ $job->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\JobsController@edit', [$job->id]) }}">
                        {{ $job->order }} - {{ $job->title }}
                    </a>
                </div>
                <div class="col-md">
                    <a href="{{ action('Admin\SponsorsController@edit', [$job->sponsors->id]) }}">
                        {{ $job->sponsors->title }}
                    </a>
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $job->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $job->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $job->id }}" method="POST" action="{{ action('Admin\JobsController@destroy', [$job->id])}}">
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