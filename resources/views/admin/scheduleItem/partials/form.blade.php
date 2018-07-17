<div class="form-group">
    Hall:
    {{ Form::select('hall', array_combine( App\Halls::all(), array_map('ucfirst', App\Halls::all()) )) }}
</div>
<div class="form-group">
    Day:
    {{ 
        Form::select('day', array_combine(App\Day::all(), 
                array_map(
                    function($item) {
                        return date("d M", strtotime($item));
                    }, 
                    App\Day::all()
                )
            ),
            isset($scheduleItem) ? date('Y-m-d', strtotime($scheduleItem->start_time)) : null
        )
    }}
</div>
<div class="form-group">
    {{ Form::label('start_time', 'Start time:') }}
    {{ Form::text('start_time',
        isset($scheduleItem) ? date_format(date_create($scheduleItem->start_time), 'H:i') : null,
        ['class' => 'form-control timepicker'])
    }}
</div>
<div class="form-group">
    {{ Form::label('end_time', 'End time:') }}
    {{ Form::text('end_time',
        isset($scheduleItem) ? date_format(date_create($scheduleItem->end_time), 'H:i') : null,
        ['class' => 'form-control timepicker'])
    }}
</div>
<div class="form-group">
    Talk:
    {{ Form::select('talk_id', [null => 'Please Select'] + App\Talk::all()->pluck('title', 'id')->toArray()) }}
</div>
<div class="form-group">
    Is a break:
    {{ Form::label('break', 'Yes:',['class' => 'form-check-label']) }}
    {!! Form::radio('break', 1); !!}
    {{ Form::label('break', 'No:', ['class' => 'form-check-label']) }}
    {!! Form::radio('break', 0); !!}
</div>
<div class="form-group">
    {{ Form::label('break_message', 'Break message:') }} 
    {{ Form::text('break_message', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('message', 'Show a message (leave empty to show the talk):') }} 
    {{ Form::text('message', null, ['class' => 'form-control']) }}
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
<a class="btn btn-outline-primary" href="{{ action('Admin\ScheduleItemController@index') }}" role="button">Schedule Items overview</a>