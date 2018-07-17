@extends('admin.layouts.master') @section('title') SponsorsGroups @endsection @section ('content')
<div class="container">
    <h1>Sponsors Groups</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\SponsorsGroupsController@create') }}">Add new</a>
        {{ Form::open(['url' => action('Admin\SponsorsGroupsController@order'), 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" name="order" id="order" value="" />
            <input type="submit" value="Change order" /> 
            <input type="button" value="Reset" onclick="window.location.reload(); return false;" /></a>
        {{ Form::close() }}
    </p>
    <ul id="sortable" class="list-group">
        @foreach( $sponsorsGroups as $sponsorsGroup)
        <li data-id="{{ $sponsorsGroup->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\SponsorsGroupsController@edit', [$sponsorsGroup->id]) }}">
                        {{ $sponsorsGroup->order }} - {{ $sponsorsGroup->title }}
                    </a>
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $sponsorsGroup->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $sponsorsGroup->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $sponsorsGroup->id }}" method="POST" action="{{ action('Admin\SponsorsGroupsController@destroy', [$sponsorsGroup->id])}}">
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