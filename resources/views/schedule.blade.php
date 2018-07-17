@extends('layouts.master') 
@section('title') Schedule @endsection
@section('metaDescription') Schedule @endsection
@section ('content')
<div id="schedule">
    <div class="container">
        <h1>Event Schedule</h1>
        <!--**********-->
        <!-- Days     -->
        <!--**********-->
        <section class="tabs">
            <div class="row">
                <div class="col-lg-2">&nbsp;</div>
                <div class="col-lg-10">
                    <ul class="row">
                        <li class="col-4 p-1 hidden-xs-up">
                            <a href="#table"></a>
                        </li>
                        <li class="col-4 p-1">
                            <a href="/schedule/May21-23" class="day">
                                21st-23th <span class="hidden-md-down">May</span>
                            </a>
                        </li>
                        @foreach(App\Day::all() AS $day)
                            <li class="col-4 p-1">
                                <a href="/schedule/{{ strtotime($day) }}" class="tab">
                                    <span class="hidden-md-down">{{ date_format(date_create($day), 'l') }}</span>
                                    {{ date_format(date_create($day), 'd') }}th
                                    <span class="hidden-md-down">{{ date_format(date_create($day), 'F') }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!--**********-->
        <!-- Table    -->
        <!--**********-->
        <section id="table" class="tables">
        </section>

        <!--****************-->
        <!-- Footer colors -->
        <!--****************-->
        <div class="row">
            <div class="col-lg-2">&nbsp;</div>
            <div class="col-lg-10 p-lg-0">
                <div class="row">
                    <!-- Topics -->
                    <div class="col-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="topics">
                                    @foreach ($topics->slice(0, 4) AS $i => $topic)
                                        <li class="topic">
                                            <span class="icon icon-bookmark" style="color: {{ $topic->color }}"></span> {{ $topic->title }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="topics">
                                    @foreach ($topics->slice(4) AS $i => $topic)
                                        <li class="topic">
                                            <span class="icon icon-bookmark" style="color: {{ $topic->color }}"></span> {{ $topic->title }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Levels -->
                    <div class="col-4">
                        <ul class="levels">
                            @foreach ($levels AS $level)
                            <li class="level">
                                <span class="whole-word">{{ $level }}</span>
                                <div class="initial-letter">
                                    <span class="icon icon-bookmark-o"></span>
                                    <span class="first-letter">{{ substr($level, 0, 1)}}</span> 
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection