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
    Project
@endsection


<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Project
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('projectes') }}" class="text-muted text-hover-primary">Project</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Project</li>
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
        <h2 style="text-align: center;">Create Project</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('projectes.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- service_category_id field  --}}
            <div class="form-group mb-2">
                <label for="service_category_id" class="mb-2 fw-bold">Service Category:</label>
                <select name="service_category_id" id="service_category_id" class="form-control">
                    <option>Select Project Service</option>
                    @foreach ($services as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('service_category_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- name field  --}}
            <div class="form-group mb-2">
                <label for="name" class="mb-2 fw-bold">Project Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name"
                    placeholder="Project Name">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end name  --}}

            {{-- technoligy field  --}}
            <div class="form-group mb-2">
                <label for="technoligy" class="mb-2 fw-bold">Technoligy:</label>
                <textarea name="technoligy" id="technoligy" cols="30" rows="5" class="form-control"
                    placeholder="Project technoligy"></textarea>
                @error('technoligy')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end description  --}}

            {{-- Description field  --}}
            <div class="form-group mb-2">
                <label for="description" class="mb-2 fw-bold">Description:</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                    placeholder="Project Description"></textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end description  --}}


            {{-- image field  --}}
            <div class="form-group mb-2">
                <label for="image" class="mb-2 fw-bold">Image:</label>
                <input type="file" class="form-control mb-2" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- end of image field  --}}

            <button type="submit" class="btn btn-primary btn-sm">Create</button>
        </form>
    </div>
</div>
@endsection
