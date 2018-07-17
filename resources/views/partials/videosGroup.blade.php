<div class="row">
    @foreach($videos AS $video)
        <div class="col-12 col-lg-4 col-sm-6 p-3">
            <div class="video">
                <div class="frame-container not-loaded">
                    <img src="{{ $video->snippet->thumbnails->high->url }}" data-src="//www.youtube.com/embed/{{ $video->id }}?autoplay=1" />
                    <iframe class="not-loaded" src="" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <footer>
                    {{ $video->snippet->title }}
                </footer>
            </div>
        </div>
    @endforeach
</div>            