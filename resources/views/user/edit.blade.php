@extends('dashboard.master')

@section('template_title')
    Update User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
    <script>
        function batchHide() {
            let val = $("#user_type").val();
            console.log(val)
            if (val == 'CR') {
                $("#batchInput").removeClass('d-none');
                $("#batch").val('');
            } else {
                $("#batchInput").addClass('d-none');
                $("#batch").val('');
            }
        }
        batchHide();
        $("#user_type").change(function() {
            batchHide();
        });
    </script>
@endpush
