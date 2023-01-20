<div class="box box-info padding-1">
    <div class="row row-cols-4 g-4">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact') }}
            {{ Form::text('contact', $user->contact, ['class' => 'form-control' . ($errors->has('contact') ? ' is-invalid' : ''), 'placeholder' => 'Contact']) }}
            {!! $errors->first('contact', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_type') }}
            {{ Form::select('user_type', ['Teacher' => 'Teacher', 'CR' => 'CR'], $user->user_type, ['class' => 'form-select' . ($errors->has('user_type') ? ' is-invalid' : ''), 'placeholder' => 'User Type']) }}
            {!! $errors->first('user_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" id="batchInput">
            {{ Form::label('batch') }}
            {{ Form::text('batch', $user->batch, ['class' => 'form-control' . ($errors->has('batch') ? ' is-invalid' : ''), 'placeholder' => 'Batch']) }}
            {!! $errors->first('batch', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
