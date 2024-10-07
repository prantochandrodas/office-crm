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
    Contact-client
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
                    <a href="{{ route('contact-clients') }}" class="text-muted text-hover-primary">Contact-Client</a>
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
                    <svg style="margin-right:5px;" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                            <path d="M815 5096 c-266 -86 -522 -332 -675 -651 -102 -211 -133 -336 -134
                -540 -1 -222 23 -286 211 -577 792 -1225 1954 -2379 3163 -3140 169 -106 219
                -132 312 -158 415 -117 1015 146 1295 566 169 255 174 465 15 644 -48 54 -101
                86 -527 316 -572 309 -585 314 -769 314 -122 0 -213 -28 -355 -110 -207 -118
                -383 -119 -555 -2 -182 124 -954 898 -1057 1060 -68 107 -88 268 -50 391 10
                34 45 106 76 161 84 147 99 200 99 345 -1 190 2 183 -392 909 -122 226 -169
                303 -214 351 -121 131 -279 174 -443 121z m200 -235 c74 -33 86 -52 436 -702
                162 -302 172 -329 173 -445 1 -99 9 -77 -112 -309 -63 -120 -85 -221 -80 -364
                8 -215 62 -323 295 -581 253 -281 725 -741 899 -876 192 -149 444 -191 679
                -112 33 11 114 49 179 86 117 65 120 66 206 70 61 3 103 0 141 -12 47 -13 843
                -434 950 -502 90 -56 118 -149 76 -253 -43 -105 -88 -172 -187 -271 -274 -275
                -671 -411 -937 -321 -154 52 -760 469 -1169 805 -821 673 -1529 1454 -2107
                2326 -185 278 -217 353 -217 505 0 366 311 843 622 955 67 24 102 24 153 1z"></path>
                            <path d="M3445 5099 c-127 -16 -244 -77 -335 -175 -69 -75 -105 -141 -130
                -240 -25 -98 -25 -170 0 -268 27 -107 63 -169 145 -252 110 -112 238 -166 388
                -166 105 0 164 14 256 59 180 89 301 287 301 493 0 333 -292 590 -625 549z
                m212 -270 c223 -107 232 -434 14 -552 -164 -90 -365 -22 -443 148 -32 70 -32
                180 0 250 42 92 127 161 222 181 74 16 133 8 207 -27z"></path>
                            <path d="M3175 3880 c-86 -11 -213 -55 -292 -101 -77 -45 -219 -189 -266 -269
                -21 -36 -50 -101 -65 -145 -26 -80 -27 -81 -30 -425 -3 -376 -3 -382 55 -450
                15 -18 50 -43 78 -56 l50 -24 813 0 c667 0 819 2 846 14 46 19 104 72 129 120
                21 40 22 51 22 371 0 376 -3 395 -80 550 -75 152 -178 258 -327 335 -144 75
                -190 82 -548 86 -173 1 -347 -1 -385 -6z m653 -240 c212 -28 379 -176 432
                -386 17 -67 20 -111 20 -341 l0 -263 -760 0 -760 0 0 283 c0 231 3 293 16 338
                59 199 227 343 434 369 83 11 535 11 618 0z"></path>
                        </g>
                    </svg>
                    Contact-Clients
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

                    <table id="contactClientTable" class="display" style="width:100%">
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


    @include('backend.contact_client.conversation_modal')
    @include('backend.contact_client.view_conversation_modal')
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
                    var table = $('#contactClientTable').DataTable({
                        language: {
                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                        },
                        searching: false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            url: '{!! route('contact-clients.getdata') !!}',
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

                    $('#contactClientTable').DataTable().destroy();
                    load_data(status, division_id, project_id, service_category, location_id,
                        district_id);
                });
            }


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
        // When District changes, load Locations

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
        $(document).on('click', '.add-wanted-client', function() {
            var customerId = $(this).data('id');
            $.ajax({
                url: '/client/' + customerId + '/update-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: 2 // Set the status you want here
                },
                success: function(response) {
                    toastr.success(response.message);
                    $('#contactClientTable').DataTable().ajax.reload(null, false);
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
                    $('#contactClientTable').DataTable().ajax.reload(null, false);
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
