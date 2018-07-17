@extends('layouts.master') 
@section('title') Event images @endsection
@section('metaDescription') Event images @endsection
@section ('content')
<div id="event-images">
    <section class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Pictures</h1>
                    <ul class="row">
                        @foreach ($eventImagesGroups AS $eventImageGroup)
                            <li class="col p-1">
                                <a href="/pictures/{{ $eventImageGroup->id }}" class="tab">
                                    {{ $eventImageGroup->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('modules.map')
    @include('modules.newsletter', ['form' => 'pictures']))
</div>
@endsection