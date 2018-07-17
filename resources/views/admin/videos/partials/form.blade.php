<div class="form-group">
    Video group:
    {{ Form::select('video_groups_id', App\VideoGroups::all()->pluck('title','id')->toArray()) }}
</div>
<div class="form-group">
    {{ Form::label('youTubeId', 'Youtube Id:') }} 
    {{ Form::text('youTubeId', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
@if(isset($video))
    <div class="form-group">
        <iframe src="//www.youtube.com/embed/{{ $video->youTubeId }}?autoplay=1" frameborder="0" allowfullscreen=""></iframe>
    </div>
@endif
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\VideosController@index') }}" role="button">Videos overview</a>