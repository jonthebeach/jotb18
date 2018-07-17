<div class="row">
    @foreach($eventImagesFiles AS $eventImagesFile)
        <div class="col-6 col-md-4 col-lg-3 p-3">
            <a href="{{ $eventImagesFile->imagePath }}" id="{{ md5($eventImagesFile->imagePath)}}" class="fancybox" data-fancybox-group="pictures">
                <img src="{{ $eventImagesFile->thumbnailPath }}" alt="" class="lazyload" />
            </a>
        </div>
    @endforeach
</div>            