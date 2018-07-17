@extends('layouts.master') 
@section('title') Speakers @endsection
@section('metaDescription') Learn about all speakers giving talks and workshops at JOTB2018. From creators of programming languages to code explorers. @endsection
@section ('content')
<div id="speakers">
    @if (count($speakers) > 0)
        <section class="speakers-list">
            <div class="container">
                <header class="header-list">
                    <h2>Speakers</h2>
                    <p>No unicorns, no caticorns, just software development</p>
                </header>
                <div class="row">
                    @foreach ($speakers as $speaker)
                    <div class="col-md-6 my-2 px-2">
                        <a class="speaker-img-{{ $speaker->id }} fancybox" href="#{{ $speaker->id }}" data-id="{{ $speaker->id }}" data-name="{{ urlencode($speaker->getFullName()) }}">
                            <div class="speaker">
                                <div class="row m-0">
                                        <div class="col-sm-5 p-0">
                                            <figure class="hidden-xs-down" style="background: url({{ $speaker->imagePath }}) no-repeat; background-size: cover; background-position: center;height:100%">
                                                <div class="overlay"></div>
                                            </figure>
                                            <img class="hidden-sm-up" src="{{ $speaker->imagePath }}" alt="">
                                        </div>
                                        <div class="col-sm-7 p-0">
                                            <div class="styled-content">
                                                <header>
                                                    <h2>{{ $speaker->getFullName() }}</h2>
                                                    @if (!empty($speaker->twitter))
                                                        {{ '@' . $speaker->twitter }}
                                                    @endif
                                                    <p class="position">{{ $speaker->position }}</p>
                                                </header>
                                                @if(count($speaker->talks) > 0)
                                                    @foreach($speaker->talks AS $talk)
                                                        <h3 class="talk-title">{{ $talk->title }}</h3>
                                                    @endforeach
                                                @else
                                                    <article>{!! strip_tags($speaker->description) !!}</article>
                                                @endif
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </a>
                        <div class="hidden-xl-down">
                            <div id="{{ $speaker->id }}">
                                @include("partials.speakerPopup")
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @include('modules.numbers')
    @include('modules.newsletter', ['form' => 'speakers']))
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection