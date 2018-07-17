<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('author', 'Author:') }} 
    {{ Form::text('author', null, ['class' => 'form-control']) }}
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
    @if(isset($blogItem))
        @if(!empty($blogItem->imagePath)))
            <div>
                <img class="w-100" src="{{ $blogItem->imagePath }}" alt="" />
            </div>
        @endif
    @endif
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\BlogItemsController@index') }}" role="button">BlogItems overview</a>