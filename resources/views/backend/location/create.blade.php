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
    Location
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Location
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
                <li class="breadcrumb-item text-muted">Location</li>
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
        <h2 style="text-align: center;">Create Location</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('locations.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- division_id field  --}}
            <div class="form-group mb-4">
                <label for="division_id" class="mb-2 fw-bold">Division:</label>
                <select name="division_id" id="division_id" class="form-control example select2">
                    <option>Select Division</option>
                    @foreach ($divisions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('division_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- district_id field  --}}
             <div class="form-group mb-4">
                <label for="district_id" class="mb-2 fw-bold">District:</label>
                <select name="district_id" id="district_id" class="form-control example2 select2">
                    <option>Select District</option>
                </select>
                @error('district_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- name field  --}}
            <div class="form-group mb-4">
                <label for="name" class="mb-2 fw-bold">Area Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Area Name">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            {{-- description field  --}}
            <div class="form-group">
                <label for="description" class="mb-2 fw-bold">Description:</label>
                <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                @error('description')
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
        $('.example2').select2();
        $(document).on('change', '#division_id', function() {
            let divisionId = $(this).val();
            let district = $(this).find('#district_id');
            if (divisionId) {
                $.ajax({
                    url: '/get-district/' + divisionId,
                    type: 'GET',
                    success: function(data) {
                        $('#district_id').empty();
                        $('#district_id').append('<option>Select District</option>');
                        $.each(data, function(key, value) {
                            if (data.length > 0) {
                                $('#district_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            } else {
                                $('#district_id').append('<option>' + value + '</option>');
                            }

                        });
                    }
                })
            } else {
                $('#district_id').empty();
                $('#district_id').append('<option>Select District</option>');
            }
        });
    });
     
</script>
@endsection
