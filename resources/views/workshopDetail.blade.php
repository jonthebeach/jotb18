@extends('layouts.master') 
@section('title') Workshops @endsection
@section('metaDescription') {{ strip_tags($workshop->intro) }} @endsection
@section ('content')
<div id="workshop">
    <section class="detail">
        <div class="container">
            <!-- Workshop description -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="content">
                        <header>
                            <h1>{{ $workshop->title }}</h1>
                            <p>{!! $workshop->intro !!}</p>
                        </header>
                        @if($workshop->type != 'hackathon')
                            @include("partials.workshopDetailSpeakers", ["speakers" => $workshop->speakers])
                        @endif
                        <section>
                            @if (isset($workshop->learn))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <article>
                                            <h3>What the attendees will learn</h3>
                                            <div>
                                                {!! $workshop->learn !!}
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="row">
                                <div class="col-md-6">
                                    @if (isset($workshop->requirements))
                                        <article>
                                            <h3>Requirements</h3>
                                            <div>
                                                {!! $workshop->requirements !!}
                                            </div>
                                        </article>
                                    @endif
                                    @if (isset($workshop->companies))
                                        <article>
                                            <h3>Companies that use this technology</h3>
                                            <div>
                                                {!! $workshop->companies !!}
                                            </div>
                                        </article>
                                    @endif
                                    @if (isset($workshop->careers))
                                        <article>
                                            <h3>Requirements</h3>
                                            <div>
                                                {!! $workshop->careers !!}
                                            </div>
                                        </article>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if (isset($workshop->plan))
                                        <article>
                                            <h3>Workshop plan</h3>
                                            <div>
                                                {!! $workshop->plan !!}
                                            </div>
                                        </article>
                                    @endif
                                    @if (isset($workshop->resources))
                                        <article>
                                            <h3>Resources to prepare the workshop</h3>
                                            <div>
                                                {!! $workshop->resources !!}
                                            </div>
                                        </article>
                                    @endif
                                    @if (isset($workshop->materials))
                                        <article>
                                            <h3>What materials will be given</h3>
                                            <div>
                                                {!! $workshop->materials !!}
                                            </div>
                                        </article>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <!-- Workshop details -->
                <div class="col-lg-4">
                    <div class="info">
                        <h2>{{ $workshop->title }}</h2>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 col-md-4">
                                <h5>Date and time:</h5>
                                <p>{!! $workshop->date !!}</p>
                                <p>{!! $workshop->time !!}</p>
                            </div>
                            <div class="col-lg-12 col-md-4">
                                <h5>Topics:</h5>
                                <p>{!! $workshop->topics !!}</p>
                            </div>
                            <div class="col-lg-12 col-md-4">
                                <h5>Target audience roles:</h5>
                                <p>{!! $workshop->target !!}</p>
                            </div>
                            <div class="col-lg-12 col-md-4">
                                <h5>Attendees:</h5>
                                <p>{!! $workshop->attendees !!}</p>
                            </div>
                            <div class="col-lg-12 col-md-4">
                                <h5>Included:</h5>
                                <p>{!! $workshop->included !!}</p>
                            </div>
                        </div>
                        <hr>
                        <footer>
                            <div class="price">
                                <span class="euro">€</span>{{ number_format($workshop->price) }}
                            </div>
                        </footer>
                    </div>
                    @if($workshop->type == 'hackathon')
                        <div class="hackathon-speakers">
                            <h2>Organizers</h2>
                            @include("partials.hackathonSpeakers", ["speakers" => $workshop->speakers])
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- MAIN TOPICS -->
    @include("modules.mainTopics")
    @include('modules.newsletter', ['form' => 'workshops'])
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection