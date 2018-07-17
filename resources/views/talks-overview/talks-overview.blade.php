@extends('talks-overview.master') 
@section('title') Timeline @endsection
@section('metaDescription') Timelie of all the talks of the event @endsection
@section ('content')
    <div class="content">
        @include('talks-overview.nav')
        <div class="row">
            @php
                $i = 0;
            @endphp
            @foreach ($scheduleItemsByHall AS $hall => $scheduleItems)
                <div class="col-{{ $i === 0 ? '12' : '4'}} pb-4">
                    <div class="hall">
                        <header>
                            <h2>{{ $hall }} hall</h2>
                        </header>
                        @if($i === 0)
                            <div class="subheader">
                                {{ Request::root() }}{{ App\Halls::getGoogleDocByHall($hall) }}
                            </div>
                        @endif
                        <div>
                            <section data-hall="{{ $hall }}" >
                                @foreach ($scheduleItems AS $scheduleItem)
                                    <div class="row m-0" data-time="{{ date_format(date_create($scheduleItem->end_time), (isset($_GET['seconds']) ? 'G' : 'Hi')) }}">
                                        <div class="col-{{ $i === 0 ? '2' : '4'}} col-xl-{{ $i === 0 ? '1' : '3'}} p-0">
                                            <span class="time">
                                                {{ date_format(date_create($scheduleItem->start_time), 'G:i') }}
                                            </span>
                                        </div>
                                        <div class="col-{{ $i === 0 ? '10' : '8'}} col-xl-{{ $i === 0 ? '11' : '9'}} p-0">
                                            <article class="info">
                                                <div class="row">
                                                    @if($i === 0)
                                                        <div class="col-2">
                                                            @foreach($scheduleItem->talk->speakers AS $speaker)
                                                                @php
                                                                    $padding = 100/count($scheduleItem->talk->speakers);
                                                                    $marginBottom = 5;
                                                                @endphp
                                                                <div style="margin: {{ $marginBottom }}px 0;">
                                                                    <figure style="
                                                                        background: url({{ $speaker->imagePath }}) no-repeat; 
                                                                        background-size: cover; 
                                                                        background-position: center;
                                                                        width: {{ $padding }}%;
                                                                        padding-bottom: {{ $padding }}%;
                                                                        border-radius: 100%;
                                                                        margin: auto;">
                                                                    </figure>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <div class="col-10">
                                                        <div class="speakers">
                                                            @foreach($scheduleItem->talk->speakers AS $index => $speaker)
                                                                <div class="speaker">
                                                                    {{ $speaker->getFullName() }}
                                                                    @if ($index === count($scheduleItem->talk->speakers) - 2)
                                                                        &
                                                                    @elseif(count($scheduleItem->talk->speakers) - 1 > $index )
                                                                        ,
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                            <div class="talk">{{ $scheduleItem->talk->title }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                        </div>
                    </div>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach
            <div class="col-4 pb-4">
                <div class="hall">
                    <header>
                        <h2>
                            Follow @JOTB2018
                        </h2>
                    </header>
                    <div>
                        <section>
                            @foreach ($scheduleItems AS $scheduleItem)
                                <div class="row m-0">
                                    <div class="col-12">
                                        <div id="twitter-results">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection