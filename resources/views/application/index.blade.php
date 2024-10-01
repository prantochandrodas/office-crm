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
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading text-dark fw-bold fs-4 fs-3 my-0">
                Application
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Application</li>
            </ul>
        </div>
    </div>
</div>
<!--end::Toolbar-->

<div class="app-container container-fluid">
    <div class="card mt-4 shadow">
        <div class="card-header bg-primary text-white flex justify-content-center align-items-center ">
            <h2 class="text-center text-light">Application</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('applications.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Company Name field -->
                <div class="form-group row mb-3">
                    <label for="company_name" class="col-md-3 col-form-label fw-bold fs-4">Company Name:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Enter company name" value="{{ $data->company_name }}">
                        @error('company_name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Company Email field -->
                <div class="form-group row mb-3">
                    <label for="company_email" class="col-md-3 col-form-label fw-bold fs-4">Company Email:</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="company_email" name="company_email"
                            placeholder="Enter company email" value="{{ $data->company_email }}">
                        @error('company_email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Contact Number field -->
                <div class="form-group row mb-3">
                    <label for="phone" class="col-md-3 col-form-label fw-bold fs-4">Contact Number:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter contact number" value="{{ $data->phone }}">
                        @error('phone')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Company Address field -->
                <div class="form-group row mb-3">
                    <label for="address" class="col-md-3 col-form-label fw-bold fs-4">Company Address:</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="address" name="address" placeholder="Enter company address" rows="2">{{ $data->address }}</textarea>
                        @error('address')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- About Company field -->
                <div class="form-group row mb-3">
                    <label for="about_company" class="col-md-3 col-form-label fw-bold fs-4">About Company:</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="about_company" name="about_company" placeholder="Enter information about the company"
                            rows="3">{{ $data->about_company }}</textarea>
                        @error('about_company')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Company Logo field -->
                <div class="form-group row mb-3">
                    <label for="logo" class="col-md-3 col-form-label fw-bold fs-4">Company Logo:</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" id="logo" name="logo">
                        @if ($data->logo)
                            <img src="{{ asset('image/' . $data->logo) }}" height="100" class="mt-2"
                                alt="Current Logo">
                        @endif
                        @error('logo')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Fav Icon field -->
                <div class="form-group row mb-3">
                    <label for="fav_icon" class="col-md-3 col-form-label fw-bold fs-4">Fav Icon:</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" id="fav_icon" name="fav_icon">
                        @if ($data->fav_icon)
                            <img src="{{ asset('image/' . $data->fav_icon) }}" height="100" class="mt-2"
                                alt="Current Icon">
                        @endif
                        @error('fav_icon')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit button -->
                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        @can('application-update')
                            <button type="submit" class="btn btn-primary btn-block btn-sm mt-4">Update
                                Application</button>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
