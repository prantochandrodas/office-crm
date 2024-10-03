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
    Our-client
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Client
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('our-clients') }}" class="text-muted text-hover-primary">Our-Client</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Client</li>
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
        <div class="card" style="margin-bottom: 50px">
            <div class="row input-daterange" style="margin-top: 40px">
                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="division_id"><b>Divisions</b></label>
                        <select id="division_id" class="form-select" name="division_id" required>
                            <option value="">All Divisions</option>
                            @foreach ($divisions as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="district_id"><b>District</b></label>
                        <select id="district_id" class="form-select" name="district_id" required>
                            <option value="">All District</option>
                        </select>
                    </div>
                </div>
                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="location_id"><b>Area</b></label>
                        <select id="location_id" class="form-select" name="location_id" required>
                            <option value="">All Area</option>
                        </select>
                    </div>
                </div>

                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="service_category"><b>Service Category</b></label>
                        <select id="service_category" class="form-select" name="service_category" required>
                            <option value="">All Service Catebgory</option>
                            @foreach ($serviceCategories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="project_id"><b>Project</b></label>
                        <select id="project_id" class="form-select" name="project_id" required>
                            <option value="">All Project</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <button type="button" name="filter" id="filter"
                        class="btn btn-success btn-sm d-flex align-items-center">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </div>

        {{-- end filter form  --}}


        <table id="ourClientTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Serial ID</th>
                    <th>Company Name</th>
                    <th>Contact Person</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('backend.our_client.conversation_modal')
@include('backend.our_client.view_conversation_modal')

<!-- Custom CSS for Table Borders -->
<style>
    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: 1px solid #ddd;
    }

    table.dataTable.no-footer {
        border-bottom: none;
    }

    table.dataTable,
    table.dataTable th,
    table.dataTable td {
        border: 1px solid #ddd;
        /* You can change the color to your preferred border color */
    }

    table.dataTable th,
    table.dataTable td {
        padding: 10px;
        /* Optional: add some padding for a cleaner look */
    }
</style>
<script>
    $(document).ready(function() {
        window.onload = function() {
            load_data();

            function load_data(status = "", division_id = "", project_id = "", service_category = "",
                location_id = "", district_id =
                "") {
                var table = $('#ourClientTable').DataTable({
                    language: {
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                    },
                    searching: false,
                    ordering: false,
                    serverSide: true,
                    ajax: {
                        url: '{!! route('our-clients.getdata') !!}',
                        data: {
                            status: status,
                            division_id: division_id,
                            project_id: project_id,
                            service_category: service_category,
                            location_id: location_id,
                            district_id: district_id
                        }
                    },
                    columns: [{
                            data: null, // Use null to signify that this column does not map directly to any data source
                            name: 'serial_number',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart +
                                    1; // Calculate the serial number
                            },
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'company_name',
                            name: 'company_name',
                            class: "text-center"
                        },
                        {
                            data: 'name',
                            name: 'name',
                            class: "text-center"
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            class: "text-center"
                        },
                        {
                            data: 'email',
                            name: 'email',
                            class: "text-center"
                        },
                        {
                            data: 'address',
                            name: 'address',
                            class: "text-center"
                        },
                        {
                            data: 'note',
                            name: 'note',
                            class: "text-center"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            class: "text-center action-field"
                        },
                    ]
                });
            }

            $('#filter').click(function() {
                var status = $('#status').val();
                var division_id = $('#division_id').val();
                var project_id = $('#project_id').val();
                var service_category = $('#service_category').val();
                var location_id = $('#location_id').val();
                var district_id = $('#district_id').val();

                $('#ourClientTable').DataTable().destroy();
                load_data(status, division_id, project_id, service_category, location_id,
                    district_id);
            });
        }

        // When District changes, load Locations
        $('#district_id').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: '/get-locations/' + district_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#location_id').empty();
                        $('#location_id').append(
                            '<option value="">All Area</option>');
                        $.each(data, function(key, value) {
                            $('#location_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#location_id').empty();
            }
        });

        $('form').on('submit', function() {
            // Show loading spinner
            $('#loading').show();
            $('#backdrop').show(); // Show backdrop when loading
        });

    });

    $(document).on('click', '.view-conversation', function() {
        var customerId = $(this).data('customer-id');

        $.ajax({
            url: '/get-customer-data/' + customerId,
            type: 'GET',
            success: function(response) {
                console.log(response); // Check the response structure

                // Assuming response contains an array of conversationLogs
                var conversationLogs = response.conversationLogs;

                // Clear existing rows in the table body
                $('#conversationLogsTableBody').empty();

                // Iterate over conversationLogs array and append rows to the table
                $.each(conversationLogs, function(index, log) {
                    console.log(log.project);
                    // Assuming log has customer_name, project_name, note, and date
                    var row = `<tr>
                            <td>${log.customer.name}</td>
                            <td>${log.project.name}</td>
                            <td>${log.note}</td>
                            <td>${log.date}</td>
                        </tr>`;

                    // Append the row to the table body
                    $('#conversationLogsTableBody').append(row);
                });

                // Show the modal after data is populated
                $('#viewConversationdrop').modal('show');
            },
            error: function(xhr) {
                toastr.error('Error fetching conversation logs');
            }
        });
    });
    $(document).on('change', '#division_id', function() {
        let divisionId = $(this).val();
        let district = $(this).find('#district_id');
        if (divisionId) {
            $.ajax({
                url: '/get-district/' + divisionId,
                type: 'GET',
                success: function(data) {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">All District</option>');
                    $.each(data, function(key, value) {
                        if (data.length > 0) {
                            $('#district_id').append('<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        } else {
                            $('#district_id').append('<option>' + value +
                                '</option>');
                        }

                    });
                }
            })
        } else {
            $('#district_id').empty();
            $('#district_id').append('<option value="">All District</option>');
        }
    });

    $(document).on('change', '#service_category', function() {
        let divisionId = $(this).val();
        let district = $(this).find('#project_id');
        if (divisionId) {
            $.ajax({
                url: '/get-projects/' + divisionId,
                type: 'GET',
                success: function(data) {
                    $('#project_id').empty();
                    $('#project_id').append('<option value="">Select Project</option>');
                    $.each(data, function(key, value) {
                        if (data.length > 0) {
                            $('#project_id').append('<option value="' + value
                                .id +
                                '">' + value.name + '</option>');
                        } else {
                            $('#project_id').append('<option>' + value +
                                '</option>');
                        }

                    });
                }
            })
        } else {
            $('#project_id').empty();
            $('#project_id').append('<option>Select Project</option>');
        }
    });


    $(document).on('click', '.add-conversation', function() {
        $('#staticBackdrop').modal('show');

        let customerId = $(this).data('customer-id');
        // Fetch customer data based on the selected customer ID
        $('#modal_customer_id_hidden').val(customerId);
        $.ajax({
            url: '/get-customer-data/' + customerId,
            type: 'GET',
            success: function(data) {
                console.log(data.projects);
                // Update customer dropdown dynamically and set the selected option
                $('#modal_customer_id').empty().append('<option value="">Select Customer</option>');
                let selected = data.customer.id == customerId ? 'selected' : '';
                $('#modal_customer_id').append('<option value="' + data.customer.id + '" ' +
                    selected + '>' + data.customer.name + '</option>');

                // Populate the project dropdown
                $('#modal_project_id').empty();

                if (data.projects.length === 1) {
                    // If there's only one project, select it and hide the dropdown
                    let project = data.projects[0];
                    $('#modal_project_id').append(
                        '<option value="' + project.id +
                        '">' + project.name + '</option>');

                } else if (data.projects.length > 1) {
                    // Show dropdown for multiple projects
                    $('#modal_project_id').append('<option>Select Project</option>');
                    $.each(data.projects, function(key, project) {
                        $('#modal_project_id').append('<option value="' + project.id +
                            '">' + project.name + '</option>');
                    });
                } else {
                    $('#modal_project_id').append('<option>No projects available</option>');
                }
            }
        });

        // Reset the conversation log form
        $('#conversationLogForm')[0].reset();
    });
</script>
@endsection
