<a href="/workshops/{{ $workshop->id }}">
    @foreach($workshop->speakers AS $speaker)
        <div class="speaker">
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
        </div>
    @endforeach
    <h4>{{ $workshop->title }}</h4>
    <p class="talk-hall">{{ $workshop->hall }}</p>
</a>
