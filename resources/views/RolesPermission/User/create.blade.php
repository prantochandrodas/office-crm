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
    User-Create
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Create-User
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('user.index') }}" class="text-muted text-hover-primary">User</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Create-User</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Create User</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('user.store') }}"  enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
                    <input type="text" name="name" id="name" style="width: 100%; padding: 8px;" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                    <input type="email" name="email" id="email" style="width: 100%; padding: 8px;" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" id="password" style="width: 100%; padding: 8px;" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="roles" style="display: block; margin-bottom: 5px;">Role:</label>
                    <select id="roles" name="roles" class="form-control example select2" style="width: 100%;">
                        <option value="">Select Role</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="image" style="display: block; margin-bottom: 5px;">Image:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.example').select2();
    })
</script>
@endsection
