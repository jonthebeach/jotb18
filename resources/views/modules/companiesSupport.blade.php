<article class="group collaborators">
    <h3>Companies that support the organisation and diversity of this event;</h3>
    <div>
        @foreach ($collaborators as $collaborator)
            <a href="{{ $collaborator->url }}" target="_blank">{{ $collaborator->title }}</a>
        @endforeach
    </div>
</article>