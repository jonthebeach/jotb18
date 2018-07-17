<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
<div class="form-group">
    {{ Form::label('images', 'Image:') }}
    {!! Form::file('images[]', array('class' => 'image', 'multiple' => 'true')) !!}
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\EventImagesController@index') }}" role="button">EventImages overview</a>