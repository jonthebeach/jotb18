@extends('layouts.master') 
@section('title') {{ $sponsor->title }} @endsection
@section('metaDescription') {{ strip_tags($sponsor->description) }} @endsection
@section ('content')
<div id="company-detail">
    <!-- SPON-SOR -->
    <section class="spon-sor">
        <div class="container">
            <figure class="{{ $sponsor->id == 13 ? 'black': ''}}">
                <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->title }}">
            </figure>
            <div class="styled-content">
                {!! $sponsor->description !!}
            </div>
        </div>
    </section>
    <!-- JOB DETAIL -->
    @if (count($sponsor->jobs) > 0)
        <section class="jobs-list">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">Our jobs</h2>
                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                    @foreach ($sponsor->jobs as $job)
                        <ul class="toggleable">
                            <li>
                                <header>
                                    {{ $job->title }}
                                </header>
                                <div class="styled-content">
                                    {!! $job->description !!}
                                    <footer>
                                        <a href="{{ $job->url }}" class="button" target="_blank">APPLY</a>
                                    </footer>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
                </div>
            </div>
        </section>
    @endif
    @include('modules.numbers')
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection