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
    Edit Location
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Location
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('locations') }}" class="text-muted text-hover-primary">Location</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Edit Location</li>
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
        <h2 style="text-align: center;">Edit Location</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('locations.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- division_id field  --}}
            <div class="form-group">
                <label for="division_id" class="mb-2 fw-bold">Division:</label>
                <select name="division_id" id="division_id" class="form-control example select2">
                    <option>Select Division</option>
                    @foreach ($divisions as $item)
                        <option value="{{ $item->id }}" {{ $data->division_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('division_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- district_id field  --}}
            <div class="form-group">
                <label for="district_id" class="mb-2 fw-bold">District:</label>
                <select name="district_id" id="district_id" class="form-control example2 select2">
                    <option>Select District</option>
                    @foreach ($districts as $item)
                        <option value="{{ $item->id }}" {{ $data->district_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('district_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name field -->
            <div class="form-group">
                <label for="name" class="mb-2 fw-bold">Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name"
                    value="{{ old('name', $data->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- description field -->
            <div class="form-group">
                <label for="description" class="mb-2 fw-bold">Description:</label>
                <textarea type="text" name="description" id="description" cols="30" rows="3" class="form-control">{{ old('description', $data->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-success">Update Customer</button>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.example').select2();
        $('.example2').select2();
        let divisionId = "{{ $data->division_id }}"; // Get the default division_id from the server
        let districtId = "{{ $data->district_id }}"; // Get the default district_id from the server
        let districtDropdown = $('#district_id');

        // Load districts for the default division_id when the page loads
        if (divisionId) {
            $.ajax({
                url: '/get-district/' + divisionId,
                type: 'GET',
                success: function(data) {
                    districtDropdown.empty(); // Clear the dropdown
                    districtDropdown.append(
                    '<option>Select District</option>'); // Add default option

                    $.each(data, function(key, value) {
                        let isSelected = (value.id == districtId) ? "selected" :
                        ""; // Check if it's the selected district
                        districtDropdown.append('<option value="' + value.id + '" ' +
                            isSelected + '>' + value.name + '</option>');
                    });
                }
            });
        }

        // Handle division selection change by the user
        $('#division_id').on('change', function() {
            divisionId = $(this).val();
            districtDropdown.empty();
            districtDropdown.append('<option>Select District</option>');

            if (divisionId) {
                $.ajax({
                    url: '/get-district/' + divisionId,
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            districtDropdown.append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
