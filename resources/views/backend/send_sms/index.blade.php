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

<!-- Begin Page Content -->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div style="background-color: #f0f0f0; padding: 20px;">
            <h2 style="text-align: center;">Send Sms</h2>
        </div>

        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
            <form method="POST" action="{{ route('send.multipleSms') }}" enctype="multipart/form-data">
                @csrf

                {{-- Client Status Field --}}
                <div class="form-group mb-4">
                    <label for="client_status" class="mb-2 fw-bold">Client Status:</label>
                    <select name="client_status" id="client_status" class="form-control example select2">
                        <option value="all">All Client</option>
                        <option value="6">Primary Client</option>
                        <option value="1">Contact Client</option>
                        <option value="2">Wanted Client</option>
                        <option value="3">Our Client</option>
                        <option value="5">Non-Prospective Clients</option>
                    </select>
                    @error('client_status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Client Name Field --}}
                <div class="form-group mb-4">
                    <label for="client_name" class="mb-2 fw-bold">Client Name:</label>
                    <select name="client_name" id="client_name" class="form-control example2 select2">
                        <option>Select Client</option>
                    </select>
                    @error('client_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Message Field --}}
                <div class="mb-3">
                    <label for="message" class="fw-bold">Message :</label>
                    <textarea class="form-control" id="editor" name="message" rows="3" required placeholder="Message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-sm mt-4">Send Sms</button>
            </form>

            <!-- Loading Spinner and Backdrop -->
            <div id="loading" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div id="backdrop" style="display: none;"></div>

            <!-- Client List -->
            <div id="clientList"
                style="margin-top: 20px; background-color: #f9f9f9; padding: 20px; border: 1px solid #e1e1e1;">
                <h3 style="text-align: center; font-weight: bold; margin-bottom: 15px;">Client List</h3>
                <table class="table table-bordered" id="clientTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Serial No</th>
                            <th style="text-align: center;">Client Name</th>
                            <th style="text-align: center;">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody id="clientListData">
                        <!-- Client rows will be appended here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->

<!-- Custom Styles -->
<style>
    #clientListData li {
        padding: 8px 0;
        border-bottom: 1px solid #ddd;
        font-size: 12px;
    }

    #clientListData li:last-child {
        border-bottom: none;
    }
</style>

<!-- Scripts -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {

        CKEDITOR.replace('editor');
        var defaultClientStatus = 'all'; // Default value

        // Trigger change event on page load to set the default clientStatus
        $('#client_status').trigger('change');

        $('#client_status').on('change', function() {
            var clientStatus = $(this).val() || defaultClientStatus;

            if (clientStatus) {
                $.ajax({
                    url: '/get-client/' + clientStatus,
                    type: 'GET',
                    success: function(response) {
                        $('#client_name').empty();
                        $('#client_name').append('<option value="all">All Clients</option>');
                        var clientListHtml = '';
                        $.each(response.client, function(key, value) {
                            clientListHtml += '<tr>' +
                                '<td style="text-align: center;">' + (key + 1) + '</td>' +
                                '<td>' + value.name + '</td>' +
                                '<td>' + value.phone + '</td>' +
                                '</tr>';
                            $('#client_name').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#clientListData').html(clientListHtml);
                    },
                    error: function(xhr) {
                        console.error('Error fetching client data.');
                    }
                });
            } else {
                $('#client_name').empty().append('<option value="">Select Client</option>');
            }
        });

        $('#client_name').on('change', function() {
            var selectedClientId = $(this).val();

            if (selectedClientId && selectedClientId !== 'all') {
                $.ajax({
                    url: '/get-client-details/' + selectedClientId,
                    type: 'GET',
                    success: function(response) {
                        var client = response.client;
                        var clientListHtml = '' +
                            '<tr>' +
                            '<td style="text-align: center;">1</td>' +
                            '<td>' + client.name + '</td>' +
                            '<td>' + client.phone + '</td>' +
                            '</tr>';
                        $('#clientListData').html(clientListHtml);
                    },
                    error: function(xhr) {
                        console.error('Error fetching client details.');
                    }
                });
            } else {
                $('#client_status').trigger('change');
            }
        });

       
        $('#client_status').val(defaultClientStatus).trigger('change');

        // Handle form submission
        $('form').on('submit', function() {
            $('#loading').show();
            $('#backdrop').show();
        });
    });
</script>

@endsection
