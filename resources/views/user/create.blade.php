@extends('dashboard.master')

@section('template_title')
    Create User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}" role="form" enctype="multipart/form-data">
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
            if (val == 'CR') {
                $("#batchInput").removeClass('d-none');
                $("#batch").val("{{ old('batch') }}");
            } else {
                $("#batchInput").addClass('d-none');
                $("#batch").val("{{ old('batch') }}");
            }
        }
        batchHide();
        $("#user_type").change(function() {
            batchHide();
        });
    </script>
@endpush
