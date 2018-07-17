@foreach ($workshop->speakers AS $speaker)
    <div class="speaker">
        <div class="row">
            <div class="col-lg-5">
                <img src="{{ $speaker->imagePath }}" alt="{{ $speaker->getFullName() }}">
            </div>
            <div class="col-lg-7">
                <article>
                    <h2>
                        <a href="/speakers/{{ $speaker->id }}" />
                            {{ $speaker->getFullName() }}
                        </a>
                    </h2>
                    @if(!empty($speaker->twitter))
                        <p><a href="https://twitter.com/{{ $speaker->twitter }}">{{ "@" . $speaker->twitter }}</a></p>
                    @endif
                    <p>{{ $speaker->position }}</p>
                </article>
            </div>
        </div>
    </div>
@endforeach