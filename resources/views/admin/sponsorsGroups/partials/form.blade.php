<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('max', 'Max:') }} 
    {{ Form::text('max', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Price:') }} 
    {{ Form::text('price', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    Is Pack:
    {{ Form::label('pack', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('pack', 1); !!}
    {{ Form::label('pack', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('pack', 0); !!}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control wysiwyg']) }}
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
<a class="btn btn-outline-primary" href="{{ action('Admin\SponsorsGroupsController@index') }}" role="button">SponsorsGroups overview</a>