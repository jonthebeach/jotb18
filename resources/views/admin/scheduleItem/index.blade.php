@extends('admin.layouts.master') 
@section('title') ScheduleItem @endsection 
@section ('content')
<div class="container">
    <h1>Schedule Items</h1>
    <p>
        <a class="btn btn-primary" href="{{ action('Admin\ScheduleItemController@create') }}">Add new</a>
    </p>
    <ul class="list-group">
        @foreach( $scheduleItem as $scheduleItem)
        <li data-id="{{ $scheduleItem->id }}" class="list-group-item">
            <div class="row">
                <div class="col-md">
                    <a href="{{ action('Admin\ScheduleItemController@edit', [$scheduleItem->id]) }}">
                        {{ date_format(date_create($scheduleItem->start_time), "d M - H:i") }} to 
                        {{ date_format(date_create($scheduleItem->end_time), "H:i") }}
                    </a>
                </div>
                @if(!$scheduleItem->break)
                    <div class="col-md">
                        {{ $scheduleItem->hall }}
                    </div>
                @endif
                <div class="col-md">
                    @if($scheduleItem->break)
                        <span class="badge badge-warning">break</span>
                    @else
                        @if(!empty($scheduleItem->talk))
                            {{ $scheduleItem->talk->title }}
                        @endif
                    @endif
                </div>
                <div class="col-md">
                    <div class="float-right">
                        <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); 
                                confirm('Delete `{{ $scheduleItem->title }}`, are you sure?') ? document.getElementById('logout-form-{{ $scheduleItem->id }}').submit() : '';">
                            Delete
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <form id="logout-form-{{ $scheduleItem->id }}" method="POST" action="{{ action('Admin\ScheduleItemController@destroy', [$scheduleItem->id])}}">
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