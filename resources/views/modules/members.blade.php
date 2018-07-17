<article>
    <div class="row">
        @foreach ($members as $member)
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="speaker">
                    <figure>
                        @if (!empty($member->twitter))
                            <a class="twitter-link" href="https://twitter.com/{{ $member->twitter }}" target="_blank">
                                <img class="twitter" src="/images/home/twitter.png" alt="Twitter" class="twitter">
                                <img class="twitter_hover" src="/images/home/twitter_hover.png" alt="Twitter" class="twitter">
                            </a>
                        @endif
                        <div class="speaker-img">
                            <img src="{{ $member->imagePath }}" alt="{{ $member->firstname }}"> 
                        </div>
                    </figure>
                    <footer>
                        <p class="name">{{ $member->getFullName() }}</p>
                        <p class="position">{{ $member->position . (empty($member->company) ? '' : ' at ' . $member->company) }}</p>
                    </footer>
                </div>
            </div>
        @endforeach
    </div>
</article>