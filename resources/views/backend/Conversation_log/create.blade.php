@extends('layouts.backend')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@section('title')
    Conversation-log
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Customer
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('conversation-logs.create') }}"
                        class="text-muted text-hover-primary">Conversation-log</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Conversation-log</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

<div class="app-container container-fluid">
    <div style="background-color: #f0f0f0; padding: 20px;">
        <h2 style="text-align: center;">Create Conversation-log</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('conversation-logs.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="customer_id" style="display: block; margin-bottom: 5px;">Customer:</label>
                <select id="customer_id" name="customer_id" class="form-control example select2" style="width: 100%;">
                    <option value="">Select Customer</option>
                    @foreach ($customers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->phone }})</option>
                    @endforeach
                </select>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="project_id" style="display: block; margin-bottom: 5px;">Assigned Project:</label>
                <select id="project_id" name="project_id" class="form-control" style="width: 100%; padding: 8px;">
                    <option value="">Select Project</option>
                </select>
            </div>


            {{-- note field  --}}
            <div class="form-group">
                <label for="note" class="mb-2 fw-bold">Note:</label>
                <textarea type="text" name="note" id="summernote" cols="30" rows="3" class="form-control"></textarea>
                @error('note')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-4">Create</button>
        </form>
    </div>
</div>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">



<script>
    $(document).ready(function() {
        $('.example').select2();
        // Handle project selection based on customer
        $(document).on('change', '#customer_id', function() {
            let customerId = $(this).val();
            if (customerId) {
                $.ajax({
                    url: '/assigned/project/' + customerId,
                    type: 'GET',
                    success: function(data) {
                        $('#project_id').empty().append('<option>Select Project</option>');
                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                $('#project_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        } else {
                            $('#project_id').append('<option>No projects available</option>');
                        }
                    }
                });
            } else {
                $('#project_id').empty().append('<option>Select Project</option>');
            }
        });

        // Initialize Summernote
        $('#summernote').summernote({
            height: 250
        });
    });
</script>

@endsection
