@extends('dashboard.master')

@section('template_title')
    {{ $room->name ?? 'Show Room' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Room</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('room.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Room No:</strong>
                            {{ $room->room_no }}
                        </div>
                        <div class="form-group">
                            <strong>Level:</strong>
                            {{ $room->level }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
