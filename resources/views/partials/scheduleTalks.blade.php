<div class="col-lg-12">
    <!--**********-->
    <!-- Hall     -->
    <!--**********-->
    <section class="halls hidden-md-down">
        <div class="row">
            <div class="col-lg-2">&nbsp;</div>
            @foreach(App\Halls::all() AS $hall)
                <div class="col-lg m-1 p-0">
                    <div class="hall">
                        {{ $hall }} hall
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--**********-->
    <!-- Talks    -->
    <!--**********-->
    <div class="table">
        {{-- 
            I group everything by start date so I will have a table row with all the items for 
            a specific hour for each hall
        --}}
        @foreach ($itemsPerDay->groupBy('start_time') AS $start_time => $itemsPerDayAndTime)
            <div class="row">
                <div class="col-lg-2">
                    <div class="time">
                        {{ date_format(date_create($start_time), 'G:i') }}
                        -
                        {{ date_format(date_create($itemsPerDayAndTime->first()->end_time), 'G:i') }}
                    </div>
                </div>

                {{-- If first item is a break, all is a break --}}
                @if($itemsPerDayAndTime->first()->break)
                    <div class="col-lg m-1 p-0">
                        <div class="talk break">
                            @if($itemsPerDayAndTime->first()->id === 31)
                                <a class="fancybox" href="#deadlockparty">
                                    {{ $itemsPerDayAndTime->first()->break_message }}
                                </a>
                                <div class="hidden-xs-up">
                                    <div id="deadlockparty">
                                        <img src="/images/scheduleImages/deadlockparty.png" alt="Deadlock party" />
                                    </div>
                                </div>
                            @else
                                {{ $itemsPerDayAndTime->first()->break_message }}
                            @endif
                        </div>
                    </div>
                {{-- If first item is not a break, we can loop the different talks per hall --}}
                @else
                    @foreach(App\Halls::all() AS $hall)
                        <div class="col-lg m-1 p-0">
                            @php
                                $items = $itemsPerDayAndTime->filter(
                                    function($item) use ($hall){
                                        return $item->hall == $hall;
                                    }
                                );
                                $item = $items->first();
                            @endphp
                            @if (empty($item))
                                <div class="talk empty">
                                    <h3 class="hidden-lg-up">{{ $hall }} hall</h3>
                                    TBC
                                </div>
                            @else
                                @include('partials.scheduleTalk')
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>