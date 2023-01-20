@extends('dashboard.master')

@section('template_title')
    Record
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Record') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('record.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Room No</th>
                                        <th>File</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $record)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $record->title }}</td>
                                            <td>{{ $record->room->room_no }}</td>
                                            <td>
                                                <audio controls>
                                                    <source src="{{ asset($record->file) }}" type="audio/ogg">
                                                    Your browser does not support the audio tag.
                                                </audio>
                                            </td>

                                            <td>
                                                <form action="{{ route('record.destroy', $record->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('record.edit', $record->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $records->links() !!}
            </div>
        </div>
    </div>
@endsection
