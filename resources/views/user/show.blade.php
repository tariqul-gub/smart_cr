@extends('dashboard.master')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Contact:</strong>
                            {{ $user->contact }}
                        </div>
                        <div class="form-group">
                            <strong>Batch:</strong>
                            {{ $user->batch }}
                        </div>
                        <div class="form-group">
                            <strong>User Type:</strong>
                            {{ $user->user_type }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
