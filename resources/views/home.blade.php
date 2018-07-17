@extends('layouts.master') 
@section('title') Home @endsection 
@section('metaDescription') 
A Big Data conference for developers
& DevOps on the beach! Málaga 23rd-25th May 2018. If you are into distributed systems, Big Data Architectures, microservices,
IoT and functional programming buy your tickets now! 
@endsection 
@section ('content')
<div id="home">
    <!-- BRANDBOX -->
    <section class="brandbox">
        <img src="/images/home/brandbox.png" alt="JOTB18">
        <div class="content">
            <div class="inner">
                <img src="/images/home/logo_brandbox.png" alt="Logo">
                <p>MÁLAGA, SPAIN / 23RD - 25TH MAY 2018</p>
                <p class="subtext">Bringing developers and DevOps together around Big Data</p>
            </div>
        </div>
    </section>

    <!-- INTRO -->
    @include('modules.contentHome')

    <!-- MAIN TOPICS -->
    @include('modules.mainTopics')

    <!-- SPEAKERS -->
    <section class="speakers">
        <div class="container">
            <header>
                <h2>Speakers</h2>
                <p>No unicorns, no caticorns, just software development</p>
            </header>
            @include("modules.speakers", ['speakers' => $speakers])
            <div class="text-center">
                <a href="{{ action('SpeakersPageController@index') }}" class="button">See all</a>
                <a href="#" class="button disabled">Call For Papers Closed</a>
            </div>
        </div>
    </section>

    <!-- NUMBERS -->
    @include("modules.numbers")

    <!-- YWT -->
    <section class="ywt">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 p-0">
                    <a class="logo" target="_blank" href="http://yeswetech.org/eventos/community-code-of-conduct/" >
                        <img src="/images/home/ywt-blue.png" alt="YWT">
                    </a>
                </div>
                <div class="col-md-8 p-0">
                    <div class="content">
                        <div class="styled-content">
                            <h3>Diversity Programme</h3>
                            <p>JOTB2018 is committed to supporting members of underrepresented groups who may not otherwise have the opportunity to attend the event for financial, social or any other reasons. This includes (but is not limited to): <strong>immigrants, LGBTQIA+ people, women and disabled people.</strong></p>

                            <p>Our goal for this year is to provide <strong>4 free tickets</strong>, a <strong>50% discount</strong> to all these communities and if necessary will try our best to support their accommodation.</p>

                            <p>Send an email at <a href="mailto:organiza@yeswetech.com"><strong>organiza@yeswetech.com</strong></a> explaining a bit about yourself and why you&rsquo;d like to attend the conference</p>
                        </div>
                        <a target="_blank" href="http://yeswetech.org/eventos/community-code-of-conduct/" class="button invert-dark">We follow the YWT code of conduct</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SPON-SORS (COMPANIES) -->
    <section class="companies">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('modules.sponsors')
                </div>
            </div>
            <!-- Supporters -->
            <div class="row">
                @if(count($supporters))
                    <div class="col-6 my-2">
                        <div class="row">
                            <div class="col-12">
                                <h2>Supporters</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <article class="group">
                                    <h3>Supporters</h3>
                                    <div class="row mx-1">
                                        @foreach($supporters as $supporter)
                                            <div class="col-lg-4 col-md-6 col-sm-4 px-1">
                                                <div class="item">
                                                    <a href="{{ $supporter->url }}" target="_blank">
                                                        <img src="{{ $supporter->imagePath }}" alt="{{ $supporter->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif
                @if(count($organizers))
                    <!-- Organizers -->
                    <div class="col-6 my-2">
                        <div class="row">
                            <div class="col-12">
                                <h2>Organizers</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <article class="group">
                                    <h3>Organizers</h3>
                                    <div class="row mx-1">
                                        @foreach($organizers as $organizer)
                                            <div class="col-lg-4 col-md-6 col-sm-4 px-1">
                                                <div class="item">
                                                    <a href="{{ $organizer->url }}" target="_blank">
                                                        <img src="{{ $organizer->imagePath }}" alt="{{ $organizer->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('modules.companiesSupport')
                </div>
            </div>
        </div>
    </section>

    <!-- BECOME SPONSOR -->
    <section class="become-sponsor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>The perfect event to be in touch with developers and DevOps</p>
                    <a class="button" href="{{ action('SponsorsPageController@index') }}">Become a sponsor</a>
                </div>
            </div>
        </div>
    </section>

    @include('modules.newsletter', ['form' => 'home'])
    @include('modules.map')
    @include('modules.previousEditions')
    </div>
    @endsection
