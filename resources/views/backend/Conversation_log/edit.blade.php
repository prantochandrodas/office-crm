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

    <!-- Success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@section('title')
    Edit Conversation-log
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit
                Conversation-log
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('conversation-logs') }}"
                        class="text-muted text-hover-primary">Conversation-log</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Edit Conversation-log</li>
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
        <h2 style="text-align: center;">Edit Conversation-log</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form action="{{ route('conversation-logs.update', $customerLog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select id="customer_id" name="customer_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $customerLog->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_id">Project</label>
                <select id="project_id" name="project_id" class="form-control">
                    <option value="{{ $customerLog->project->id }}">{{ $customerLog->project->name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="note">Note</label>
                <textarea id="summernote" name="note" class="form-control">{{ $customerLog->note }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250
        });
    });
    $('#customer_id').on('change', function() {
        var customerId = $(this).val();
        $('#project_id').html('<option value="">Select Project</option>'); // Clear previous projects

        if (customerId) {
            $.ajax({
                url: '/assigned/project/' + customerId,
                type: 'GET',
                success: function(data) {
                    $.each(data, function(key, project) {
                        $('#project_id').append('<option value="' + project.id + '">' +
                            project.name + '</option>');
                    });
                }
            });
        }
    });
</script>
@endsection
