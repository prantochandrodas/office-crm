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
                            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)" fill="#ffffff">
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

    <div class="modal fade" id="smsModal" tabindex="-1" aria-labelledby="smsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smsModalLabel">Send Sms</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form or content goes here -->
                    <form id="smsForm" method="POST" action="{{ route('send.sms') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Client name</label>
                            <select name="client_name_sms" id="client_name_sms" class="form-control smsExample select2">
                                <option>Select Client</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Client Phone Number</label>
                            <input type="phone" class="form-control" id="phone" name="phone" required
                                placeholder="Client phone">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required placeholder="Message"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm d-flex align-items-center"
                                data-bs-dismiss="modal">
                                <svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path opacity="0.5"
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            fill="#1C274C"></path>
                                        <path
                                            d="M8.96967 8.96967C9.26256 8.67678 9.73744 8.67678 10.0303 8.96967L12 10.9394L13.9697 8.96969C14.2626 8.6768 14.7374 8.6768 15.0303 8.96969C15.3232 9.26258 15.3232 9.73746 15.0303 10.0304L13.0607 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0304 15.0303C9.73746 15.3232 9.26258 15.3232 8.96969 15.0303C8.6768 14.7374 8.6768 14.2626 8.96969 13.9697L10.9394 12L8.96967 10.0303C8.67678 9.73744 8.67678 9.26256 8.96967 8.96967Z"
                                            fill="#1C274C"></path>
                                    </g>
                                </svg> Close
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm d-flex align-items-center">
                                <svg style="width: 18px; height:18px; margin-right:5px;"
                                    xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 24 24"
                                    stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 11H7V9h2v2zm4 0h-2V9h2v2zm4 0h-2V9h2v2z">
                                        </path>
                                    </g>
                                </svg> Send Sms
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mail Modal  -->
    <div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mailModalLabel">Send Mail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form or content goes here -->
                    <form id="mailForm" method="POST" action="{{ route('send.mail') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Client name</label>
                            <select name="client_name" id="client_name" class="form-control example ">
                                <option>Select Client</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Mail Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required
                                placeholder="Mail subject">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Client Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Client Email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required placeholder="Message"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm d-flex align-items-center"
                                data-bs-dismiss="modal">
                                <svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path opacity="0.5"
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            fill="#1C274C"></path>
                                        <path
                                            d="M8.96967 8.96967C9.26256 8.67678 9.73744 8.67678 10.0303 8.96967L12 10.9394L13.9697 8.96969C14.2626 8.6768 14.7374 8.6768 15.0303 8.96969C15.3232 9.26258 15.3232 9.73746 15.0303 10.0304L13.0607 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0304 15.0303C9.73746 15.3232 9.26258 15.3232 8.96969 15.0303C8.6768 14.7374 8.6768 14.2626 8.96969 13.9697L10.9394 12L8.96967 10.0303C8.67678 9.73744 8.67678 9.26256 8.96967 8.96967Z"
                                            fill="#1C274C"></path>
                                    </g>
                                </svg> Close
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm d-flex align-items-center">
                                <i class="fas fa-envelope"></i> Send Mail
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{-- modal  --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Conversation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('conversation-logs.store') }}"
                        enctype="multipart/form-data" id="conversationLogForm">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="modal_customer_id">Customer Name:</label>
                            <select id="modal_customer_id" name="customer_id" class="form-control example select2" {{ count($customers) == 1 ? 'readonly' : '' }} disabled>
                                <option value="">Select Customer</option>
                                @foreach ($customers as $item)
                                    <option value="{{ $item->id }}" {{ count($customers) == 1 ? 'selected' : '' }}>
                                        {{ $item->name }} ({{ $item->phone }})
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <input type="hidden" name="customer_id" id="modal_customer_id_hidden" value="">
                        <div class="form-group">
                            <label for="modal_project_id" class="mb-2 fw-bold">Select Project:</label>
                            <select id="modal_project_id" name="project_id" class="form-control">
                                <option value="">Select Project</option>
                            </select>
                        </div>
                        <div class="form-group my-4">
                            <label for="modal_note" class="mb-2 fw-bold">Note:</label>
                            <textarea name="note" id="modal_note" cols="30" rows="3" class="form-control"
                                placeholder="Write Conversation"></textarea>
                        </div>
                        <div class="form-group my-4">
                            <label for="modal_date" class="mb-2 fw-bold">Date:</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



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
        .select2-container{
            display: block;
        }

        
    </style>


    <script>
        $(document).ready(function() {
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

            $('#featuredProjectTitleHeading').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('primary-clients.getdata') }}',
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
                        name: 'company_name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'note',
                        name: 'note',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });


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
                    $('#featuredProjectTitleHeading').DataTable().ajax.reload(null, false);
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
