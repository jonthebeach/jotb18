
<div class="border-primary border p-3" style="background: #ccc;border-radius: 10px;">
    <h3>Schedule data</h3>
    <div class="form-group">
        Hall:
        {{ Form::select('hall', array_combine(App\Halls::getHallsWorkshops(), array_map('ucfirst', App\Halls::getHallsWorkshops()) ) ) }}
    </div>
    @foreach(App\Day::getDaysWorkshops() AS $workshopDay)
        <div class="form-group">
            Day {{$workshopDay->id}}:
            {{ Form::text('day'.$workshopDay->id, null, ['class' => 'form-control']) }}</div>
    @endforeach
</div>
<div class="form-group">
    Type:
    @foreach(App\WorkshopsTypes::all() AS $workshopType)
        {{ Form::label('type', ucfirst($workshopType), ['class' => 'form-check-label']) }}
        {!! Form::radio('type', $workshopType); !!}
    @endforeach
</div>
<div class="form-group">
    {{ Form::label('title', 'Title:') }} 
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('intro', 'Intro:') }} 
    {{ Form::text('intro', null, ['class' => 'form-control']) }}
</div>
@if (isset($workshop))
    @foreach ($workshop->speakers AS $index => $speaker)
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
    {{ Form::label('learn', 'What students will learn:') }}
    {{ Form::textarea('learn', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('requirements', 'Requirements:') }}
    {{ Form::textarea('requirements', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('companies', 'Companies that use this technology:') }}
    {{ Form::textarea('companies', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('careers', 'Professional careers:') }}
    {{ Form::textarea('careers', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('plan', 'Workshop plan:') }}
    {{ Form::textarea('plan', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('resources', 'Resources to prepare the workshop:') }}
    {{ Form::textarea('resources', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('materials', 'What materials will be given') }}
    {{ Form::textarea('materials', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('date', 'Date:') }} 
    {{ Form::text('date', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('time', 'Time:') }} 
    {{ Form::text('time', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('topics', 'Topics') }}
    {{ Form::textarea('topics', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('target', 'Target audience roles') }}
    {{ Form::textarea('target', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('attendees', 'Attendees:') }} 
    {{ Form::text('attendees', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('included', 'Included') }}
    {{ Form::textarea('included', null, ['class' => 'form-control wysiwyg']) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Price:') }} 
    {{ Form::text('price', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    Published:
    {{ Form::label('published', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('published', 1); !!}
    {{ Form::label('published', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('published', 0); !!}
</div>
<div class="form-group">
    Sold out:
    {{ Form::label('sold_out', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('sold_out', 1); !!}
    {{ Form::label('sold_out', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('sold_out', 0, true); !!}
</div>
<div class="form-group">
    {{ Form::submit('Send', ['class' => 'btn btn-success btn-lg btn-block']) }}
</div>
<a class="btn btn-outline-primary" href="{{ action('Admin\WorkshopsController@index') }}" role="button">Workshop overview</a>