@extends('admin.layouts.master') @section('title') Supporters @endsection @section ('content')
<div class="container">
    <h1>Supporters and organizers</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\SupportersController@create') }}">Add new</a>
    </p>
    <ul class="list-group">
        @foreach( $supporters as $supporter)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\SupportersController@edit', [$supporter->id]) }}">
                        {{ ucwords($supporter->title) }}
                    </a>
                </div>
                <div class="col-md">
                    {{ $supporter->type }}
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $supporter->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $supporter->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $supporter->id }}" method="POST" action="{{ action('Admin\SupportersController@destroy', [$supporter->id])}}">
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