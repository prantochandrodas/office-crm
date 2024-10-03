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
    Primary-client
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
                    <a href="{{ route('primary-clients') }}"
                        class="text-muted text-hover-primary">All-Primary-Client</a>
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
                        <label for="status"><b>Client Status</b></label>
                        <select id="status" class="form-select chosen-select" style="width: 100%">
                            <option value="">Select Status</option>
                            <option value="1">Contact-client</option>
                            <option value="2">Wanted-client</option>
                            <option value="3">Our-client</option>
                            <option value="5">Non-prospective-client</option>
                        </select>
                    </div>
                </div>

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
                    <button type="button" name="filter" id="filter" class="btn btn-success btn-sm d-flex align-items-center">
                        <i class="fas fa-search"></i> Search
                    </button>
                   
                </div>
            </div>
        </div>


        {{-- add button  --}}
        @can('primary-client-create')
            <a href={{ route('primary-clients.create') }} class="btn btn-sm btn-success mb-2"><svg viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height:20px">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z"
                            fill="#ffffff"></path>
                    </g>
                </svg> Add Client
            </a>
        @endcan

        @can('send-email')
            <a class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#mailModal">
                <svg style="width: 20px; height:20px; margin-right:5px" viewBox="0 -2.5 20 20" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                    stroke="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>email [#ffffff1572]</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)"
                                fill="#ffffff">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z"
                                        id="email-[#ffffff1572]"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg> Send Mail
            </a>
        @endcan

        @can('send-sms')
            <a class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#smsModal">
                <svg fill="#ffffff" style="width: 20px; height20px;" version="1.1" id="Layer_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                    enable-background="new 0 0 512 512" xml:space="preserve" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M256,0C114.6,0,0,85.9,0,192c0,75,57.5,139.8,141.1,171.4L85.3,512l160.5-128.4c3.4,0.1,6.7,0.4,10.2,0.4 c141.4,0,256-85.9,256-192C512,85.9,397.4,0,256,0z M128,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S151.5,234.7,128,234.7z M256,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S279.5,234.7,256,234.7z M384,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S407.5,234.7,384,234.7z">
                        </path>
                    </g>
                </svg> Send SMS
            </a>
        @endcan

        <table id="featuredProjectTitleHeading" class="display" style="width:100%">
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

    @include('backend.customer.sms_modal')

    @include('backend.customer.mail_modal')

    @include('backend.customer.conversation_modal')

    @include('backend.customer.view_conversation_modal')

   


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

        .select2-container {
            display: block;
        }
    </style>


    <script>
        $(document).ready(function() {

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


            $('#mailModal').on('hidden.bs.modal', function() {
                $('#mailForm')[0].reset(); // Reset the form fields
            });
            $(".example").select2({
                dropdownParent: $('#mailModal')
            });

            $(".smsExample").select2({
                dropdownParent: $('#smsModal')
            });
            $('#smsModal').on('hidden.bs.modal', function() {
                $('#smsForm')[0].reset(); // Reset the form fields
            });


            // data table code 
            window.onload = function() {
                load_data();

                function load_data(status = "", division_id = "", project_id = "", service_category = "", location_id = "", district_id =
                    "") {
                    var table = $('#featuredProjectTitleHeading').DataTable({
                        language: {
                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                        },
                        searching: false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            url: '{!! route('primary-clients.getdata') !!}',
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

                    $('#featuredProjectTitleHeading').DataTable().destroy();
                    load_data(status, division_id, project_id, service_category, location_id, district_id);
                });


            }


            // Handle client selection change
            $('#client_name').on('change', function() {
                var clientId = $(this).val(); // Get the selected client ID

                // If a client is selected (not default "Select Client")
                if (clientId) {
                    // Make an AJAX request to fetch the email
                    $.ajax({
                        url: '/get-client-email/' + clientId, // The route to fetch the email
                        type: 'GET',
                        success: function(response) {
                            if (response.email) {
                                $('#email').val(response.email); // Set email value
                            } else {
                                $('#email').val(''); // Clear email input if no email found
                            }


                        },
                        error: function(xhr) {
                            console.error('Error fetching client data.');
                        }
                    });
                } else {
                    // If no client is selected, clear the email field
                    $('#email').val('');
                }
            });


            $('#client_name_sms').on('change', function() {
                var clientId = $(this).val(); // Get the selected client ID

                // If a client is selected (not default "Select Client")
                if (clientId) {
                    // Make an AJAX request to fetch the email
                    $.ajax({
                        url: '/get-client-email/' + clientId, // The route to fetch the email
                        type: 'GET',
                        success: function(response) {

                            if (response.phone) {
                                $('#phone').val(response.phone); // Set phone value
                            } else {
                                $('#phone').val(''); // Clear email input if no email found
                            }


                        },
                        error: function(xhr) {
                            console.error('Error fetching client data.');
                        }
                    });
                } else {
                    // If no client is selected, clear the email field
                    $('#phone').val('');
                }
            });

            // Handle form submission
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



        $(document).on('click', '.add-contact-client', function() {
            var customerId = $(this).data('id');
           
            $.ajax({
                url: '/client/' + customerId + '/update-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: 1 // Set the status you want here
                },
                success: function(response) {
                    
                    toastr.success(response.message);
                    $('#featuredProjectTitleHeading').DataTable().ajax.reload(null, false);
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

            // Reload the DataTable
            $('#featuredProjectTitleHeading').DataTable().ajax.reload(null, false); // Keep current page
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
