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
    Application
@endsection
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Application
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0px">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Application</li>
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
        <h2 style="text-align: center;">Application</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('applications.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- company_name field  --}}
            <div class="form-group">
                <label for="company_name" class="mb-2 h5">Company Name:</label>
                <input type="text" class="form-control mb-2" id="company_name" name="company_name"
                    value="{{ $data->company_name }}">
                @error('company_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            {{-- company_email field  --}}
            <div class="form-group">
                <label for="company_email" class="mb-2 h5">company_email:</label>
                <input type="email" class="form-control mb-2" id="company_email" name="company_email"
                    value="{{ $data->company_email }}">
                @error('company_email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Contact Number field  --}}
            <div class="form-group">
                <label for="phone" class="mb-2 h5">Contact Number:</label>
                <textarea type="number" class="form-control mb-2" id="phone" name="phone" cols="30"
                    rows="2">{{ $data->phone }}</textarea>
                @error('phone')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- address field  --}}
            <div class="form-group">
                <label for="address" class="mb-2 h5">Company Address:</label>
                <textarea type="text" class="form-control mb-2" id="address" name="address" cols="30"
                    rows="2">{{ $data->address }}</textarea>
                @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- about_company field  --}}
            <div class="form-group">
                <label for="about_company" class="mb-2 h5">About Company:</label>
                <textarea type="text" class="form-control mb-2" id="about_company" name="about_company" cols="30"
                    rows="2">{{ $data->about_company }}</textarea>
                @error('about_company')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            {{-- logo field  --}}
            <div class="form-group">
                <label for="logo" class="mb-2 h5">Company Logo:</label>
                <input type="file" class="form-control mb-2" id="logo" name="logo">
                @error('logo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($data->logo)
                    <img src="{{ asset('image/' . $data->logo) }}" height="100"
                        class="mb-2" alt="Current Image">
                @endif
            </div>


            {{-- fav_icon field  --}}
            <div class="form-group">
                <label for="fav_icon" class="mb-2 h5">Fav Icon:</label>
                <input type="file" class="form-control mb-2" id="fav_icon" name="fav_icon">
                @error('fav_icon')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                @if ($data->fav_icon)
                    <img src="{{ asset('image/' . $data->fav_icon) }}" height="100"
                        class="mb-2" alt="Current Image">
                @endif
            </div>

            {{-- submit button  --}}
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>
    </div>
</div>
@endsection
