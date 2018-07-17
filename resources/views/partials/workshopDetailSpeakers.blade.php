@foreach ($workshop->speakers AS $speaker)
    <div class="speaker">
        <div class="row">
            <div class="col-lg-5 pr-0">
                <figure class="hidden-md-down" style="background: url('{{ $speaker->imagePath }}'); background-size: cover; height: 100%;backgroun-position: center"></figure>
                <img class="hidden-lg-up" src="{{ $speaker->imagePath }}" alt="{{ $speaker->getFullName() }}">
            </div>
            <div class="col-lg-7 pl-0">
                <article>
                    <h2>{{ $speaker->getFullName() }}</h2>
                    @if(!empty($speaker->twitter))
                        <p><a href="https://twitter.com/{{ $speaker->twitter }}">{{ "@" . $speaker->twitter }}</a></p>
                    @endif
                    <p>{{ $speaker->position }}</p>
                    <p>{!! $speaker->description !!}</p>
                </article>
            </div>
        </div>
    </div>
@endforeach