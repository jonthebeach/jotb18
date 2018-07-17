@extends('layouts.master') 
@section('title') Jobs @endsection
@section('metaDescription') Learn about the most attractive job opportunities for software developers in Big Data from top companies and apply now! @endsection
@section ('content')
<div id="jobs">
    @include('modules.headerJobs')
    <section class="companies invert">
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('modules.sponsors', ['sponsorsGroups' => $sponsorsGroups])
                </div>
            </div>
        </div>
    </section>
    @include('modules.numbers')
    <section class="content">
        <div class="container">
            <h2>Become a sponsor and post your job offers here!</h2>
            <p class="main">Don´t miss the opportunity to grow your big data<br/>dream team</p>
            <a target="_blank" class="button" href="/files/Sponsorships_Packages_JOTB18.pdf">Become a sponsor</a>
        </div>
    </section>
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection