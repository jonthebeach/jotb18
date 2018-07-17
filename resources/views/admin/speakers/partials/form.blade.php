<div class="form-group">
    {{ Form::label('firstname', 'Firstname:') }} 
    {{ Form::text('firstname', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('lastname', 'Lastname:') }} 
    {{ Form::text('lastname', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('twitter', 'Twitter:') }} 
    {{ Form::text('twitter', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('position', 'Position:') }} 
    {{ Form::text('position', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('company', 'Company:') }} 
    {{ Form::text('company', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    Show in home:
    {{ Form::label('home', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('home', 1); !!}
    {{ Form::label('home', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('home', 0); !!}
</div>
<div class="form-group">
    Hype:
    {{ Form::label('hype', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('hype', 1); !!}
    {{ Form::label('hype', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('hype', 0); !!}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
<div class="form-group">
    {{ Form::label('image', 'Image:') }} 
    {!! Form::file('image', array('class' => 'image')) !!}
    @if(isset($speaker))
        @if(!empty($speaker->imagePath)))
            <div>
                <img class="w-100"  src="{{ $speaker->imagePath }}" alt="" />
            </div>
        @endif
    @endif
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\SpeakersController@index') }}" role="button">Speakers overview</a>