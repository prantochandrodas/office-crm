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
    Send-Sms
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Send-Sms
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1 p-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('send.sms') }}" class="text-muted text-hover-primary">Send-Sms</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Send-Sms</li>
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
            <h2 style="text-align: center;">Send Sms</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('send.multipleSms') }}" enctype="multipart/form-data">
                @csrf

                {{-- client_status field  --}}
                <div class="form-group mb-4">
                    <label for="client_status" class="mb-2 fw-bold">Client Status:</label>
                    <select name="client_status" id="client_status" class="form-control example select2">
                        <option value="all">All Client</option>
                        <option value="0">Primary Client</option>
                        <option value="1">Contact Client</option>
                        <option value="2">Wanted Client</option>
                        <option value="3">Our Client</option>
                        <option value="5">Non Prospective Clients</option>
                    </select>
                    @error('client_status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- client_name field  --}}
                <div class="form-group mb-4">
                    <label for="client_name" class="mb-2 fw-bold">Client Name:</label>
                    <select name="client_name" id="client_name" class="form-control example2 select2">
                        <option>Select Client</option>
                    </select>
                    @error('client_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="mb-3">
                    <label for="message" class="fw-bold">Message :</label>
                    <textarea class="form-control" id="summernote" name="message" rows="3" required placeholder="Message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-sm mt-4">Create</button>
            </form>

             <!-- Loading Spinner and Backdrop -->
            <div id="loading" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div id="backdrop" style="display: none;"></div>
        </div>
    </div>
</div>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script>
   $(document).ready(function() {
    var defaultClientStatus = 'all'; // Default value

    // Trigger change event on page load to set the default clientStatus
    $('#client_status').trigger('change');

    $('#client_status').on('change', function() {
        // Get the selected client ID or default to 'all' if not selected
        var clientStatus = $(this).val() || defaultClientStatus;

        // Make sure a value is selected (or 'all' is used as default)
        if (clientStatus) {
            // Make an AJAX request to fetch the clients
            $.ajax({
                url: '/get-client/' + clientStatus, // The route to fetch the email
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#client_name').empty();
                    // Append client options to the select box
                    $('#client_name').append('<option value="all">All Clients</option>');
                    $.each(response.client, function(key, value) {
                        $('#client_name').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching client data.');
                }
            });
        } else {
            // If no client is selected, clear the client name select box
            $('#client_name').empty().append('<option value="">Select Client</option>');
        }
    });

    // Initialize Summernote
    $('#summernote').summernote({
        height: 250
    });

    // Optionally trigger change to load default client status (all)
    $('#client_status').val(defaultClientStatus).trigger('change');

     // Handle form submission
     $('form').on('submit', function() {
        // Show loading spinner
        $('#loading').show();
        $('#backdrop').show(); // Show backdrop when loading
    });
});

</script>

@endsection
