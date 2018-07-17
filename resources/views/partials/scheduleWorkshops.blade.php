<div class="col-lg-12">
    <!--********************-->
    <!-- Days workshops     -->
    <!--********************-->
    <section class="halls hidden-md-down">
        <div class="row">
            <div class="col-lg m-1 p-0">
                <div class="hall">
                    WORKSHOPS
                </div>
            </div>
            @foreach(App\Day::getDaysWorkshops() AS $dayWorkshop)
                <div class="col-lg m-1 p-0">
                    <div class="hall">
                        {{ date_format(date_create($dayWorkshop->day), "l d") }}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--********************-->
    <!-- Workshops          -->
    <!--********************-->
    <div class="table workshops">
        @foreach(App\Workshops::all() AS $workshop)
        <div class="row">
            <div class="col-lg m-1 p-0">
                <div class="talk">
                    @include('partials.workshopTalk')
                </div>
            </div>
            @foreach(App\Day::getDaysWorkshops() AS $dayWorkshop)
                <div class="col-lg-3 m-1 p-0">
                    @if($workshop->getTime($dayWorkshop->id))
                        <div class="workshop-talk">
                            <span class="hidden-lg-up">{{ $dayWorkshop->day }}&nbsp;</span>
                            <div class="workshop-time">{{ $workshop->getTime($dayWorkshop->id) }}</div>
                        </div>
                    @else
                        <div class="workshop-talk empty">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>