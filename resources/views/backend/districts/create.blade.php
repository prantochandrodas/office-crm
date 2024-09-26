@extends('layouts.backend')
@section('content')

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
    District
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">District
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('districts') }}" class="text-muted text-hover-primary">District</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">District</li>
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
        <h2 style="text-align: center;">Create District</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('districts.store') }}" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="division_id" style="display: block; margin-bottom: 5px;">Division:</label>
                <select id="division_id" name="division_id" class="form-control example select2" style="width: 100%;">
                    <option value="">Select Customer</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- name field  --}}
            <div class="form-group">
                <label for="name" class="mb-2 fw-bold">Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name" placeholder="District Name">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

           

            <button type="submit" class="btn btn-primary btn-sm mt-4">Create</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.example').select2();
    });
</script>
@endsection
