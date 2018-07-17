@if(empty($item->message))
    <div class="talk">
        @if(isset($item->talk))
            <h3 class="hidden-lg-up">{{ $item->hall }} hall</h3>
            <div class="level-topic">
                <span class="topic icon icon-bookmark" style="color: {{ $item->talk->topic->color }}"></span>
                <span class="level">{{ substr($item->talk->level, 0, 1) }}</span>
            </div>
            @foreach($item->talk->speakers AS $speaker)
                <a class="fancybox speaker" href="#{{ $speaker->id }}" data-id="{{ $speaker->id }}" data-name="{{ urlencode($speaker->getFullName()) }}">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <figure style="background: url({{ $speaker->imagePath }}) no-repeat; background-size: cover; background-position: center;"></figure>
                        </div>
                        <div class="col-lg-6 pl-0">
                            <div>
                                <h3>{{ $speaker->getFullName() }}</h3>
                                @if (!empty($speaker->twitter))
                                    <p>{{ '@' . $speaker->twitter }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                <div class="hidden-xl-down">
                    <div id="{{ $speaker->id }}">
                        @include("partials.speakerPopup")
                    </div>
                </div>
            @endforeach
            <h4>
                <a class="fancybox speaker" href="#{{ $speaker->id }}" data-id="{{ $speaker->id }}" data-name="{{ urlencode($speaker->getFullName()) }}">
                    {{  $item->talk->title }}
                </a>
            </h4>
            <div class="intro">
                {!! $item->talk->intro !!}
            </div>
        @else
            <div class="talk empty">
                Talk to be defined
            </div>
        @endif
    </div>
@else
    <div class="talk keynote">
        <h3 class="hidden-lg-up">{{ $item->hall }} hall</h3>
        &nbsp;
    </div>
@endif
