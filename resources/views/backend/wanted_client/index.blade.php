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
    Wanted-client
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
                    <a href="{{ route('wanted-clients') }}" class="text-muted text-hover-primary">Wanted-Client</a>
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
        <div class="card" style="border: 1px solid #50cd89;">
            <div class="card-header d-flex align-items-center justify-content-between"
                style="min-height: 40px!important; background-color: #50cd89;">
                <p class="card-title" style="color: white;">
                    <svg style="height: 24px; width:24px; margin-right:5px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                        </g>
                        <g id="SVGRepo_iconCarrier">
                            <circle cx="12" cy="6" r="4" fill="#ffffff"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM18.468 17.7458C18.6958 17.518 18.6958 17.1487 18.468 16.9209C18.2402 16.693 17.8709 16.693 17.6431 16.9209L15.7222 18.8417L15.3569 18.4764C15.1291 18.2486 14.7598 18.2486 14.532 18.4764C14.3042 18.7042 14.3042 19.0736 14.532 19.3014L15.3097 20.0791C15.5375 20.307 15.9069 20.307 16.1347 20.0791L18.468 17.7458Z" fill="#ffffff"></path>
                            <path d="M15.4147 13.5074C14.4046 13.1842 13.24 13 12 13C8.13401 13 5 14.7909 5 17C5 19.1406 7.94244 20.8884 11.6421 20.9949C11.615 20.8686 11.594 20.7432 11.5775 20.6201C11.4998 20.0424 11.4999 19.3365 11.5 18.586V18.414C11.4999 17.6635 11.4998 16.9576 11.5775 16.3799C11.6639 15.737 11.8705 15.0333 12.4519 14.4519C13.0334 13.8705 13.737 13.6639 14.3799 13.5774C14.6919 13.5355 15.0412 13.5162 15.4147 13.5074Z" fill="#ffffff"></path>
                        </g>
                    </svg>
                    Wanted-Clients
                </p>
                <div>
                    <button class="btn btn-sm" data-bs-toggle="collapse" data-bs-target="#serviceCategoryCardBody"
                        aria-expanded="true">
                        <i class="fa-solid fa-angle-down text-light fs-2"></i>
                    </button>
                    <!-- Collapse button -->

                </div>
            </div>
            <div id="serviceCategoryCardBody" class="collapse show">
                <div class="card-body">
                    {{-- filter form  --}}
                    <div class="card" style="margin-bottom: 50px; padding:10px">
                        <div class="row input-daterange" style="margin-top: 40px; padding:10px">
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


                    <table id="wantedClientTable" class="display" style="width:100%">
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
        </div>
    </div>


    @include('backend.wanted_client.conversation_modal')
    @include('backend.wanted_client.view_conversation_modal')
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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
            // data table code 
            window.onload = function() {
                load_data();

                function load_data(status = "", division_id = "", project_id = "", service_category = "",
                    location_id = "", district_id =
                    "") {
                    var table = $('#wantedClientTable').DataTable({
                        language: {
                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                        },
                        searching: false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            url: '{!! route('wanted-clients.getdata') !!}',
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

                    $('#wantedClientTable').DataTable().destroy();
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
        $(document).on('click', '.add-our-client', function() {
            var customerId = $(this).data('id');
            $.ajax({
                url: '/client/' + customerId + '/update-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: 3 // Set the status you want here
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#wantedClientTable').DataTable().ajax.reload(null, false);
                    // Optionally, reload the DataTable or update the row dynamically
                },
                error: function(xhr) {
                    toastr.error('Error updating status');
                }
            });
        });
        $(document).on('click', '.add-nonprospective', function() {
            var customerId = $(this).data('id');
            $.ajax({
                url: '/client/' + customerId + '/update-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: 5 // Set the status you want here
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#wantedClientTable').DataTable().ajax.reload(null, false);
                    // Optionally, reload the DataTable or update the row dynamically
                },
                error: function(xhr) {
                    toastr.error('Error updating status');
                }
            });
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
