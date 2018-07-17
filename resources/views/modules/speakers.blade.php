<article>
    <div class="row">
        @foreach ($speakers as $speaker)
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="speaker">
                <figure>
                    @if(!isset($speaker->hype) || !$speaker->hype) 
                        @if (!empty($speaker->twitter))
                            <a class="twitter-link" href="https://twitter.com/{{ $speaker->twitter }}" target="_blank">
                                <img class="twitter" src="/images/home/twitter.png" alt="Twitter" class="twitter">
                                <img class="twitter_hover" src="/images/home/twitter_hover.png" alt="Twitter" class="twitter">
                            </a>
                        @endif
                        <a class="speaker-img fancybox" href="#{{ $speaker->id }}">
                            <div class="overlay">
                                <p>view more</p>
                            </div>
                            <img src="{{ $speaker->imagePath }}" alt="{{ $speaker->getFullName() }}"> 
                        </a>
                    @else
                        <div class="speaker-img">
                            <img src="images/speakers/hype.png" alt="Coming soon"> 
                        </div>
                    @endif

                    @if(!isset($speaker->hype) || !$speaker->hype)
                        <div class="hidden-xl-down">
                            <div id="{{ $speaker->id }}">
                                @include("partials.speakerPopup")
                            </div>
                        </div>
                    @endif
                </figure>
                @if(!isset($speaker->hype) || !$speaker->hype)
                    <footer>
                        <p class="name">{{ $speaker->getFullName() }}</p>
                        <p class="position">{{ $speaker->position . (empty($speaker->company) ? '' : ' at ' . $speaker->company) }}</p>
                    </footer>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</article>