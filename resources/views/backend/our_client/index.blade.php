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
        <div class="card" style="border: 1px solid #50cd89;">
            <div class="card-header d-flex align-items-center justify-content-between"
                style="min-height: 40px!important; background-color: #50cd89;">
                <p class="card-title" style="color: white;">
                    <svg style="margin-right: 5px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                            <path d="M1055 5069 c-166 -34 -332 -165 -405 -321 -88 -188 -77 -384 32 -558
                                    23 -38 35 -66 29 -68 -26 -9 -117 -84 -152 -127 -21 -25 -50 -70 -64 -99 -51
                                    -103 -55 -138 -55 -456 0 -289 1 -296 24 -345 25 -54 70 -98 126 -124 31 -14
                                    102 -16 580 -16 544 0 545 0 590 22 l46 23 44 -23 c45 -22 46 -22 590 -22 540
                                    0 545 0 588 22 l43 22 47 -22 c46 -21 59 -22 527 -25 264 -2 512 -1 552 3 94
                                    9 164 49 208 119 l30 49 3 299 c3 327 -1 364 -55 476 -32 64 -126 170 -181
                                    203 -21 13 -38 24 -40 25 -2 1 15 33 38 71 142 235 109 513 -84 708 -148 150
                                    -349 207 -551 155 -205 -53 -367 -214 -420 -420 -13 -49 -16 -91 -12 -170 5
                                    -117 26 -187 83 -278 19 -29 34 -56 34 -60 0 -4 -23 -22 -51 -41 -28 -19 -68
                                    -54 -89 -78 l-39 -44 -23 31 c-22 30 -124 114 -149 122 -7 2 2 25 25 60 111
                                    166 124 389 34 574 -45 95 -167 218 -260 262 -226 110 -491 66 -667 -109 -103
                                    -103 -159 -226 -168 -374 -8 -133 23 -253 94 -357 19 -30 30 -54 24 -56 -26
                                    -9 -130 -93 -151 -122 l-23 -32 -38 45 c-21 25 -64 61 -94 82 l-55 36 24 32
                                    c39 52 75 132 92 204 21 90 14 235 -16 320 -59 168 -205 313 -369 364 -77 24
                                    -223 33 -296 18z m209 -204 c113 -30 204 -106 254 -213 23 -49 27 -71 27 -152
                                    0 -82 -4 -103 -27 -152 -83 -177 -274 -265 -454 -210 -222 69 -332 311 -235
                                    518 38 80 87 134 159 172 99 53 176 63 276 37z m1254 5 c197 -46 330 -240 294
                                    -431 -23 -126 -99 -227 -210 -281 -61 -30 -75 -33 -162 -33 -82 0 -103 4 -152
                                    27 -80 37 -152 107 -191 187 -29 60 -32 73 -31 161 0 80 4 104 26 151 75 164
                                    257 257 426 219z m1347 -29 c155 -72 244 -240 215 -403 -66 -364 -541 -433
                                    -714 -103 -29 56 -31 67 -31 160 0 87 3 107 27 157 91 195 313 279 503 189z
                                    m-2891 -887 c129 -48 285 -44 427 11 45 18 45 18 106 -9 74 -34 134 -93 168
                                    -167 l25 -56 -2 -284 -3 -284 -514 -3 c-383 -2 -517 1 -528 10 -12 9 -14 59
                                    -11 292 3 315 6 330 83 414 32 36 141 102 168 102 5 0 42 -12 81 -26z m1281
                                    -5 c50 -19 79 -23 180 -24 107 0 129 3 201 29 l82 29 54 -26 c75 -34 132 -87
                                    165 -155 l28 -57 3 -281 c3 -233 1 -283 -11 -292 -11 -9 -145 -12 -528 -10
                                    l-514 3 0 295 0 295 27 50 c34 65 90 118 158 150 60 28 67 28 155 -6z m1270
                                    -1 c51 -19 78 -22 185 -22 112 0 132 3 194 27 59 23 74 26 106 17 95 -25 184
                                    -118 215 -223 20 -66 22 -556 3 -575 -9 -9 -139 -12 -525 -12 -508 0 -512 0
                                    -523 21 -8 14 -10 103 -8 282 5 314 9 329 102 423 62 61 130 97 171 89 11 -2
                                    47 -14 80 -27z"></path>
                            <path d="M4553 2821 c-74 -27 -124 -65 -243 -186 -58 -59 -189 -188 -292 -287
                                    l-188 -180 -50 56 c-31 33 -74 66 -108 83 l-57 28 -535 6 c-568 8 -599 10
                                    -820 63 -151 37 -280 49 -397 37 -294 -30 -563 -179 -770 -426 -42 -49 -80
                                    -91 -84 -93 -4 -2 -43 30 -86 72 -84 80 -117 95 -162 76 -31 -12 -737 -740
                                    -753 -776 -28 -61 -32 -57 568 -629 311 -297 588 -559 616 -582 66 -57 102
                                    -58 159 -6 23 21 192 192 375 380 l334 342 0 45 c0 39 -5 51 -40 87 -22 23
                                    -39 43 -38 44 2 1 50 8 108 15 73 9 343 15 895 20 716 6 796 8 855 24 91 25
                                    216 86 275 133 53 42 912 1046 951 1110 122 206 20 453 -224 539 -86 30 -212
                                    32 -289 5z m219 -193 c56 -16 125 -81 139 -129 23 -75 17 -83 -417 -595 -224
                                    -264 -432 -505 -463 -537 -60 -63 -132 -105 -227 -133 -53 -16 -135 -18 -839
                                    -24 -734 -5 -792 -7 -978 -29 l-198 -24 -77 74 c-42 41 -185 178 -316 306
                                    l-239 232 29 42 c48 69 159 183 236 242 244 186 492 232 808 152 212 -54 259
                                    -57 820 -64 524 -6 525 -6 557 -29 51 -36 76 -100 71 -181 -4 -83 -33 -131
                                    -94 -161 -38 -19 -62 -20 -417 -20 -214 0 -386 -4 -401 -10 -34 -13 -58 -52
                                    -58 -97 0 -29 7 -43 31 -65 l31 -28 398 0 c440 0 458 2 548 63 87 58 164 191
                                    164 282 0 27 40 71 343 372 208 208 356 348 377 357 42 18 119 20 172 4z
                                    m-3458 -1292 l505 -490 -26 -30 c-14 -17 -137 -144 -273 -283 l-247 -253 -509
                                    484 c-279 267 -510 488 -511 493 -4 11 537 575 548 571 4 -2 235 -223 513
                                    -492z"></path>
                            <path d="M2338 1735 c-31 -17 -52 -71 -42 -109 3 -14 20 -37 36 -51 66 -55
                                    158 -12 158 75 0 80 -79 124 -152 85z"></path>
                        </g>
                    </svg>
                    Our-Clients
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
                        <div class="row input-daterange" style="margin-top: 40px; padding:10px;">
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
        </div>
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

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif

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
