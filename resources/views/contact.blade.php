@extends('layouts.master')
@section('title') Contact @endsection
@section('metaDescription') We'd love to hear from you! There are a many different ways to reach us, so pick the one that works best for you, and let's start the conversation! @endsection
@section ('content')
<div id="contact">
    <section class="form">
        <div class="container">
            <h1>We love meeting interesting people</h1>
            @if(session()->has('message.level'))
                <br />
                <div class="alert alert-{{ session('message.level') }}"> 
                    {!! session('message.content') !!}
                </div>
            @endif
            @include ("layouts.errors")
            {{ Form::open(['url' => action('MailchimpController@newsletter'), 'enctype' => 'multipart/form-data', 'class' => 'validate']) }}
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="col-md-8">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <input type="submit" value="Tell us something">
                    </div>
                </div>
                <input type="hidden" name="form" value="contact" />
                @include ("layouts.spam")
            {{ Form::close() }}
        </div>
    </section>
    @include('modules.map') 
    @include('modules.previousEditions')
</div>
@endsection