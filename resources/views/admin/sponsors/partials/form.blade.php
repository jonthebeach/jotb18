<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('url', 'Url:') }} 
    {{ Form::text('url', null, ['class' => 'form-control']) }}
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
    Sponsor group:
    {{ Form::select('sponsors_groups_id', App\SponsorsGroups::all()->pluck('title','id')->toArray()) }}
</div>
<div class="form-group">
    {{ Form::label('imagePath', 'Image:') }} 
    {!! Form::file('imagePath', array('class' => 'image')) !!}
    @if(isset($sponsor))
        @if(!empty($sponsor->imagePath))
            <div>
                <img class="w-100"  src="{{ $sponsor->imagePath }}" alt="" />
            </div>
        @endif
    @endif
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\SponsorsController@index') }}" role="button">Sponsors overview</a>