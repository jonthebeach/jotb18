<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('intro', 'Intro:') }}
    {{ Form::textarea('intro', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control wysiwyg']) }}
</div>
@if (isset($talk))
    @foreach ($talk->speakers AS $index => $speaker)
        <div class="form-group">
            Speaker {{ $index + 1 }}:
            {{ Form::select('speakers_id[]', [null => 'Please Select'] + App\Speakers::all()->pluck('firstname', 'id')->toArray(), $speaker->id) }}
        </div>
    @endforeach
@endif
<div class="form-group">
    Add new speaker:
    {{ Form::select('speakers_id[]', [null => 'Please Select'] + App\Speakers::all()->pluck('firstname', 'id')->toArray()) }}
</div>
<div class="form-group">
    Topic:
    {{ Form::select('topic_id', App\Topics::all()->pluck('title','id')->toArray()) }}
</div>
<div class="form-group">
    Level:
    {{ Form::select('level', array_combine(App\Levels::all(), App\Levels::all())) }}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\TalkController@index') }}" role="button">Talk overview</a>