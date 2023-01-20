@extends('dashboard.master')

@section('template_title')
    {{ $notification->name ?? 'Show Notification' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Notification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('notification.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $notification->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $notification->description }}
                        </div>
                        <div class="form-group">
                            <strong>Send By:</strong>
                            {{ $notification->sendByInfo->name }}
                        </div>
                        <div class="form-group">
                            <strong>Send To:</strong>
                            {{ $notification->sendToInfo->name }}
                            ({{ $notification->sendToInfo->batch }})
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
