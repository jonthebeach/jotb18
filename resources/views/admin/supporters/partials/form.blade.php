<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('url', 'Url:') }} 
    {{ Form::text('url', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
<div class="form-group">
    Type:
    {{ Form::label('type', 'Supporter:',['class' => 'form-check-label']) }}
    {!! Form::radio('type', 'supporter'); !!}
    {{ Form::label('type', 'Organizer:', ['class' => 'form-check-label']) }}
    {!! Form::radio('type', 'organizer'); !!}
</div>
<div class="form-group">
    {{ Form::label('imagePath', 'Image:') }} 
    {!! Form::file('imagePath', array('class' => 'image')) !!}
    @if(isset($supporter))
        @if(!empty($supporter->imagePath))
            <div>
                <img class="w-100"  src="{{ $supporter->imagePath }}" alt="" />
            </div>
        @endif
    @endif
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\SupportersController@index') }}" role="button">Supporters overview</a>