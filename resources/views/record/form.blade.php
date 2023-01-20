<div class="box box-info padding-1">
    <div class="row row-cols-4 g-4">

        <div class="form-group w-100">
            {{ Form::label('title') }}
            {{ Form::text('title', $record->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('room_id', 'Room No') }}
            {{ Form::select('room_id', $rooms, $record->room_id, ['class' => 'form-select' . ($errors->has('room_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Room']) }}
            {!! $errors->first('room_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        <div class="form-group">
            {{ Form::label('file') }}
            <input type="file" class="form-control" name="file" placeholder="Upload">
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
