@extends('layouts.master') 
@section('title') Event images @endsection
@section('metaDescription') Event images @endsection
@section ('content')
<div id="videos">
    <section class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Videos</h1>
                    <ul class="row">
                        @foreach ($videoGroups AS $videoGroup)
                            <li class="col p-1">
                                <a href="/videos/{{ $videoGroup->id }}" class="tab">
                                    {{ $videoGroup->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('modules.map')
    @include('modules.newsletter', ['form' => 'videos']))
</div>
@endsection