<div class="box box-info padding-1">
    <div class="row row-cols-4">

        <div class="form-group">
            {{ Form::label('room_no') }}
            {{ Form::text('room_no', $room->room_no, ['class' => 'form-control' . ($errors->has('room_no') ? ' is-invalid' : ''), 'placeholder' => 'Room No']) }}
            {!! $errors->first('room_no', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('level') }}
            {{ Form::select(
                'level',
                [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                ],
                $room->level,
                ['class' => 'form-select' . ($errors->has('level') ? ' is-invalid' : ''), 'placeholder' => 'Level'],
            ) }}
            {!! $errors->first('level', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
