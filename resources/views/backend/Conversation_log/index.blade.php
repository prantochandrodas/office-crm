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
        <div class="card" style="margin-bottom: 50px">
            <div class="row input-daterange" style="margin-top: 40px">
                <div id="" class="col-md-4">
                    <div class="form-group">
                        <label for="customer_id"><b>Customers</b></label>
                        <select id="customer_id" class="form-select example select2" name="customer_id" required>
                            <option value="">All Customers</option>
                            @foreach ($customers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} ({{$item->customer_id}})</option>
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
