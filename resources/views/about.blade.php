@extends('layouts.master') 
@section('title') About @endsection
@section('metaDescription') J On The Beach is a pure technical conference with workshops, a hackathon and technical talks where top speakers will share the latest trends in technologies related to Big Data. From data collection and stream processing to architectures, microservices, container systems, etc. @endsection
@section ('content')
<div id="about">
    @include('modules.headerAbout')
    
    <!-- INTRO -->
    @include('modules.contentAbout')

    <!-- BANNER A-->
    <section class="banner dark">
        <div class="container">
            <div class="content">
                Building on the success of previous events, 
                JOTB preserves the ambience and simplicity of its previous editions and 
                is <b>limited to 400 attendees</b>
            </div>
        </div>
    </section>

    <!-- REASONS -->
    <section class="reasons">
        <div class="container">
            <h2>Reasons for organising this event</h2>
            <div class="items">
                <div class="row">
                    @foreach($reasons AS $reason)
                        <div class="col-md-3 col-sm-6">
                            <div class="item">
                                <figure>
                                    <img src="{{ $reason->imagePath }}" alt="{{ $reason->title }} " />
                                </figure>
                                <footer>
                                    <p>{{ $reason->description }} </p>
                                </footer>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <!-- BANNER B -->
    <section class="banner">
        <div class="container">
            Currently JOTB is a perfect example of joint forces with the same purposes:
            <b>Educate, Share, Spread and Learn</b>
        </div>
    </section>

    <!-- MEMBERS -->
    <section class="speakers">
        <div class="container">
            <header>
                <h2>Organising Committee</h2>
            </header>
            @include("modules.members", ['members' => $members])
            <header>
                <p>All members above are committed to ensuring the compliance of the <a target="_blank" href="http://yeswetech.org/eventos/community-code-of-conduct/">Yes We Tech code of conduct</a></p>
            </header>
        </div>
    </section>

    <!-- NUMBERS -->
    @include('modules.numbers')

    <!-- VENUE -->
    <section class="venue">
        <div class="container">
            <h2>The venue - Málaga, La Térmica</h2>
            <div class="row mt-5">
                @foreach ($venueImages as $venueImage)
                    @foreach ($venueImage as $thumbnail=>$original)
                    <div class="col-md-3 py-2 px-2">
                        <a class="fancybox" href="#{{ $thumbnail . $original }}">
                            <img src="{{ $thumbnailsDir }}/img{{ $thumbnail }}.png" alt="">
                        </a>
                        <div class="hidden-xl-down">
                            <div id="{{ $thumbnail . $original }}">
                                <div class="popup">
                                    <div class="row m-0">
                                        <div class="col-md px-0">
                                            <figure>
                                                <img src="{{ $originalDir }}/img{{ $original }}.jpg" alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection