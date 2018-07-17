<div class="container popup p-0">
    <div class="row m-0">
        <div class="col-lg-4 ml-4 mr-3 my-4 p-0">
            <div class="figure-container">
                <figure style="background: url({{ $speaker->imagePath }}) no-repeat; background-size: cover; background-position: center;">
                    <div class="overlay"></div>
                </figure>
            </div>
        </div>
        <div class="col-lg mr-4 ml-3 my-4 p-0">
            <div class="info">
                <h3>{{ $speaker->getFullName() }}</h3>
                @if (!empty($speaker->twitter))
                    <p>
                        <a class="twitter-link" href="https://twitter.com/{{ $speaker->twitter }}" target="_blank">
                            {{ '@' . $speaker->twitter }}
                        </a>
                    </p>
                @endif
                <p class="position">
                    {{ $speaker->position . (empty($speaker->company) ? '' : ' at ' . $speaker->company) }}
                </p>
                <div class="description">{!! $speaker->description !!}</div>
            </div>
        </div>
    </div>
    @if (count($speaker->talks) > 0)
        <div class="talk">
            @foreach ($speaker->talks AS $talk)
                <div class="meta">
                    <h3>Talk</h3>
                    <div class="level-topic">
                        @if($talk->topic)
                            <span class="topic icon icon-bookmark" style="color: {{ $talk->topic->color }}"></span>
                        @endif
                        <span class="level">{{ substr($talk->level, 0, 1) }}</span>
                    </div>
                </div>
                <p class="title">{{ $talk->title }}</p>
                <div class="description styled-content invert">
                    {!! $talk->description !!}
                </div>
            @endforeach
        </div>
    @endif
</div>