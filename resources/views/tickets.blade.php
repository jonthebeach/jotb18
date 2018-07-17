@extends('layouts.master') 
@section('title') Tickets @endsection
@section('metaDescription') Get access to all talks, discounts on workshops, breakfast and lunch and a great closing party with free beers! Buy your tickets now! @endsection
@section ('content')
@php

@endphp
<div id="tickets">
    <section class="tickets-list">
        <div class="container">
            <h1>Get your tickets now</h1>
            <div class="row">
                <div class="col">
                    <!-- Ticket Tailor Widget. Paste this in to your website where you want the widget to appear. Do no change the code or the widget may not work properly. -->
                    <div class="tt-widget">
                        <div class="tt-widget-fallback"><p>
                            <a href="https://www.tickettailor.com/all-tickets/37054/e44e/ref/website_widget/" target="_blank">Click here to buy tickets</a>
                            <br /><small><a href="http://www.tickettailor.com?rf=wdg" class="tt-widget-powered">Sell tickets online with Ticket Tailor</a>
                            </small></p>
                        </div>
                        <script class="script-tailor" src="https://dc161a0a89fedd6639c9-03787a0970cd749432e2a6d3b34c55df.ssl.cf3.rackcdn.com/tt-widget.js" data-url="https://www.tickettailor.com/all-tickets/37054/e44e/ref/website_widget/" data-type="inline" data-inline-minimal="false" data-inline-show-logo="true"  data-inline-bg-fill="true"></script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modules.mainTopics')
    @include('modules.newsletter', ['form' => 'tickets'])
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection