@extends('dashboard.master')

@section('template_title')
    Notification
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Notification') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('notification.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Description</th>
                                        <th>Send By</th>
                                        <th>Send To</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $notification->title }}</td>
                                            <td>{{ $notification->description }}</td>
                                            <td>{{ $notification->sendByInfo->name }}</td>
                                            <td>{{ $notification->sendToInfo->name }}
                                                ({{ $notification->sendToInfo->batch }})
                                            </td>

                                            <td>
                                                <form action="{{ route('notification.destroy', $notification->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('notification.show', $notification->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('notification.edit', $notification->id) }}"><i
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
                {!! $notifications->links() !!}
            </div>
        </div>
    </div>
@endsection
