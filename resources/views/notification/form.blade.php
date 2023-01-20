<div class="box box-info padding-1">
    <div class="row row-cols-4 g-4">

        <div class="form-group w-100">
            {{ Form::label('title') }}
            {{ Form::text('title', $notification->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('send_to') }}
            {{ Form::select('send_to', $crs, $notification->send_to, ['class' => 'form-select' . ($errors->has('send_to') ? ' is-invalid' : ''), 'placeholder' => 'Send To']) }}
            {!! $errors->first('send_to', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group w-100">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $notification->description, ['rows' => 4, 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
