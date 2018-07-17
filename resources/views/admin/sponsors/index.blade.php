@extends('admin.layouts.master') @section('title') Sponsors @endsection @section ('content')
<div class="container">
    <h1>Sponsors</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\SponsorsController@create') }}">Add new</a>
    </p>
    <ul class="list-group">
        @foreach( $sponsors as $sponsor)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\SponsorsController@edit', [$sponsor->id]) }}">
                        {{ $sponsor->title }}
                    </a>
                </div>
                <div class="col-md">
                    {{ isset($sponsor->sponsorsGroups) ? $sponsor->sponsorsGroups->title : $sponsor->sponsors_groups_id . ' - WITHOUT GROUP'}}
                </div>
                <div class="col-md">
                    <div class="float-right">
                            <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $sponsor->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $sponsor->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $sponsor->id }}" method="POST" action="{{ action('Admin\SponsorsController@destroy', [$sponsor->id])}}">
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