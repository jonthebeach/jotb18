@extends('layouts.master') 
@section('title') Workshops @endsection
@section('metaDescription') Enhance your programming skills and learn about best practices and latest trends in the Big Data sector. From distributed systems to best DevOps tools. Buy your workshop now! @endsection
@section ('content')
<div id="workshops">
    <section class="overview">
        <div class="container">
            @if($workshopsGroups->count() == 0)
            <div class="text-center">
                <h2>COMING SOON!</h2>
            </div>
            @endif
            @foreach ($workshopsGroups as $workshopGroup => $workshops)
            <div class="group">
                <h2>{{ $workshopGroup }} workshops</h2>
                <div class="row">
                    @foreach ($workshops as $workshop)
                    <div class="col-lg-4 col-sm-6 my-3">
                        <div class="item workshop">
                            <h3>{{ $workshop->title }}</h3>
                            <hr>
                            @foreach ($workshop->speakers AS $speaker)
                                <div class="line"><span class="label">Speaker: </span>{{ $speaker->getFullName() }}</div>
                            @endforeach
                            <div class="line"><span class="label">Topics: </span>{!! $workshop->topics !!}</div>
                            <div class="line"><span class="label">Hours/Date: </span>{{ $workshop->date }} {{ $workshop->time }}</div>
                            <div class="line"><span class="label">Atttendees: </span>{{ $workshop->attendees }}</div>
                            <hr>
                            <div class="line">{!! $workshop->intro !!}</div>
                            <footer>
                                <hr>
                                <p class="price"><span>€</span>{{ number_format($workshop->price) }}</p>
                                <br />
                                <a href="{{ action('WorkshopsPageController@detail', ['workshop' => $workshop->id]) }}" class="button invert">More details</a>
                            </footer>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- MAIN TOPICS -->
    @include("modules.mainTopics")
    @include('modules.newsletter', ['form' => 'workshops'])
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection