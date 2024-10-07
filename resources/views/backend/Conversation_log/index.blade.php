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
    Conversation-log
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Conversation-log
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('conversation-logs') }}"
                        class="text-muted text-hover-primary">Conversation-log</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Conversation-log</li>
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
                    <svg style="width: 24px; height:24px; margin-right:5px;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="conversation" class="icon glyph" fill="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M18.82,8c-.8-3.46-4.3-6-8.32-6C5.81,2,2,5.36,2,9.5a6.82,6.82,0,0,0,1.06,3.63l-1,3.6a1,1,0,0,0,.3,1A1,1,0,0,0,3,18a1,1,0,0,0,.39-.08l3.66-1.56A9.6,9.6,0,0,0,10.5,17c4.69,0,8.5-3.36,8.5-7.5A6.27,6.27,0,0,0,18.82,8Z" style="fill:#ffffff"></path>
                            <path d="M21,22a1,1,0,0,1-.39-.08L17,20.36A9.6,9.6,0,0,1,13.5,21a8.44,8.44,0,0,1-8-5.1A1,1,0,0,1,6,14.61a1,1,0,0,1,1.29.58A6.44,6.44,0,0,0,13.5,19a7.55,7.55,0,0,0,3.05-.64,1,1,0,0,1,.8,0l2.11.9-.57-2a1,1,0,0,1,.15-.86,4.83,4.83,0,0,0,1-2.87,5.31,5.31,0,0,0-2.68-4.44,1,1,0,0,1,1.06-1.7A7.28,7.28,0,0,1,22,13.5a6.82,6.82,0,0,1-1.06,3.63l1,3.6a1,1,0,0,1-.3,1A1,1,0,0,1,21,22Z" style="fill:#ffffff"></path>
                        </g>
                    </svg>
                   Conversation-Log
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
                    <div class="card" style="margin-bottom: 50px">
                        <div class="row input-daterange" style="margin-top: 40px">
                            <div id="" class="col-md-4">
                                <div class="form-group">
                                    <label for="customer_id"><b>Customers</b></label>
                                    <select id="customer_id" class="form-select example select2" name="customer_id"
                                        required>
                                        <option value="">All Customers</option>
                                        @foreach ($customers as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                ({{ $item->customer_id }})</option>
                                        @endforeach
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

                            <div id="" class="col-md-4">
                                <div class="form-group">
                                    <label for="from_date"><b>From Date</b></label>
                                    <input type="date" class="form-control" name="from_date" id="from_date">
                                </div>
                            </div>

                            <div id="" class="col-md-4">
                                <div class="form-group">
                                    <label for="to_date"><b>To Date</b></label>
                                    <input type="date" class="form-control" name="to_date" id="to_date">
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
                    <table id="conversation-log" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Serial ID</th>
                                <th>Customer Name</th>
                                <th>Project Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('backend.Conversation_log.view_conversation_modal')
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
            $('.example').select2();


            window.onload = function() {
                load_data();

                function load_data(customer_id = "", service_category = "", project_id = "", from_date = "",
                    to_date = "") {
                    var table = $('#conversation-log').DataTable({
                        language: {
                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                        },
                        searching: false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            url: '{!! route('conversation-logs.getdata') !!}',
                            data: {
                                customer_id: customer_id,
                                service_category: service_category,
                                project_id: project_id,
                                from_date: from_date,
                                to_date: to_date
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
                                data: 'customer',
                                name: 'customer',
                                class: "text-center"
                            },
                            {
                                data: 'project',
                                name: 'project',
                                class: "text-center"
                            },
                            {
                                data: 'date',
                                name: 'date',
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
                    var customer_id = $('#customer_id').val();
                    var service_category = $('#service_category').val();
                    var project_id = $('#project_id').val();
                    var from_date = $('#from_date').val();
                    var to_date = $('#to_date').val();

                    $('#conversation-log').DataTable().destroy();
                    load_data(customer_id, service_category, project_id, from_date,
                        to_date);
                });


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
                url: '/get-conversationLog/' + customerId,
                type: 'GET',
                success: function(response) {
                    $('#conversationLogsTableBody').empty();
                    var row = `<tr>
                            <td>${response.customer.name}</td>
                            <td>${response.project.name}</td>
                            <td>${response.note}</td>
                            <td>${response.date}</td>
                        </tr>`;

                    $('#conversationLogsTableBody').append(row);

                    // Show the modal after data is populated
                    $('#viewConversationdrop').modal('show');
                },
                error: function(xhr) {
                    toastr.error('Error fetching conversation logs');
                }
            });
        });
    </script>
@endsection
