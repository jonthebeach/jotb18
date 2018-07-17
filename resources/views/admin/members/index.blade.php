@extends('admin.layouts.master')
@section('title') Members @endsection
@section ('content')
<div class="container">
    <h1>Members</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\MembersController@create') }}">Create member</a>
    </p>
    <ul class="list-group">
        @foreach( $members as $member)
        <li class="list-group-item">
            <a href="{{ action('Admin\MembersController@edit', [$member->id]) }}">
                {{ ucwords($member->getFullName()) }}
            </a>
            <div class="float-right">
                    <a class="btn btn-danger" href="#"
                    onclick="event.preventDefault(); 
                        confirm('Delete `{{ $member->getFullName() }}`, are you sure?') ? document.getElementById('logout-form-{{ $member->id }}').submit() : '';">
                    Delete
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <form id="logout-form-{{ $member->id }}" method="POST" action="{{ action('Admin\MembersController@destroy', [$member->id])}}">
                    {{ csrf_field() }} 
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection