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
    All-client
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
                    <a href="{{ route('all-clients') }}" class="text-muted text-hover-primary">All-Client</a>
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
                <p class="card-title" style="color: white">
                    <svg style="margin-right: 5px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
        
                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                            <path d="M1322 5061 c-79 -29 -131 -63 -189 -121 -153 -154 -174 -406 -49
                            -580 l35 -49 -42 -21 c-161 -84 -284 -246 -322 -425 -17 -81 -21 -455 -5 -485
                            20 -37 57 -40 576 -40 l504 0 0 -114 c0 -99 3 -117 21 -140 l20 -26 689 0 689
                            0 20 26 c18 23 21 41 21 140 l0 114 504 0 c519 0 556 3 576 40 16 30 12 404
                            -5 485 -38 178 -161 341 -321 424 l-42 22 38 57 c156 235 69 542 -188 670 -76
                            37 -77 37 -201 37 -125 0 -127 0 -202 -37 -90 -44 -182 -136 -222 -220 -71
                            -149 -57 -317 38 -458 l33 -50 -61 -32 c-76 -41 -180 -144 -227 -225 l-35 -60
                            -32 15 -31 15 33 49 c56 81 78 151 79 253 1 112 -19 182 -77 267 -90 132 -229
                            203 -392 202 -180 -2 -335 -97 -416 -256 -72 -142 -58 -330 36 -466 l33 -49
                            -31 -15 -32 -15 -35 60 c-46 79 -153 185 -228 225 l-60 32 33 50 c94 140 108
                            308 38 458 -39 84 -132 175 -221 220 -72 35 -81 37 -186 40 -90 2 -121 -1
                            -164 -17z m261 -147 c64 -22 140 -92 174 -162 57 -116 28 -270 -67 -356 -73
                            -66 -114 -81 -220 -81 -84 0 -101 3 -146 27 -60 32 -118 94 -147 157 -31 66
                            -30 177 2 249 28 63 109 140 172 164 57 22 172 23 232 2z m2181 0 c64 -22 147
                            -100 177 -166 35 -79 33 -184 -4 -260 -30 -62 -83 -115 -149 -150 -36 -19 -58
                            -23 -138 -23 -106 0 -147 15 -220 81 -96 87 -124 239 -67 356 33 67 105 136
                            168 160 57 22 172 23 233 2z m-1069 -298 c64 -29 117 -81 152 -149 23 -44 27
                            -65 27 -132 1 -95 -24 -155 -89 -220 -66 -67 -125 -90 -225 -90 -101 0 -159
                            23 -228 93 -64 63 -86 120 -86 217 0 67 4 88 27 132 82 159 262 222 422 149z
                            m-1367 -436 c87 -27 201 -27 286 1 61 20 66 21 114 5 104 -35 206 -123 261
                            -226 l32 -59 -47 -58 c-26 -31 -62 -88 -80 -126 -29 -61 -39 -95 -60 -204 l-4
                            -23 -470 0 -470 0 0 148 c0 160 12 232 55 314 52 103 136 180 243 224 69 28
                            63 28 140 4z m2182 0 c76 -27 197 -26 285 1 63 19 69 19 116 4 107 -36 218
                            -134 268 -238 39 -81 51 -154 51 -309 l0 -148 -470 0 -470 0 -4 23 c-21 109
                            -31 143 -60 204 -18 38 -54 95 -80 126 l-47 58 31 58 c52 98 138 176 237 217
                            70 28 73 28 143 4z m-1060 -295 c71 -20 152 -19 225 2 33 9 78 17 100 17 98 0
                            255 -123 313 -245 42 -90 52 -149 52 -309 l0 -140 -580 0 -580 0 0 140 c0 76
                            5 163 11 192 25 120 103 236 201 300 108 71 140 76 258 43z"></path>
                            <path d="M400 3250 c-165 -16 -263 -37 -283 -61 -16 -20 -17 -82 -17 -980 0
                            -946 0 -959 20 -979 19 -19 33 -20 376 -20 215 0 363 4 374 10 10 5 26 31 36
                            57 9 27 20 51 24 55 8 11 136 -52 212 -103 127 -85 224 -177 691 -657 370
                            -379 488 -495 524 -512 39 -18 61 -21 124 -18 67 3 83 7 120 33 40 28 102 98
                            111 125 3 9 20 7 63 -5 158 -46 327 42 372 195 l17 55 65 -3 c85 -5 164 23
                            221 79 46 45 90 128 90 172 0 27 1 27 63 27 83 0 145 22 201 71 102 90 131
                            235 70 356 l-29 61 51 16 c28 9 102 41 163 71 62 30 116 55 120 55 5 0 18 -27
                            30 -60 12 -33 30 -64 41 -70 11 -6 154 -10 374 -10 343 0 357 1 376 20 20 20
                            20 33 20 979 0 898 -1 960 -18 980 -20 26 -112 44 -308 61 -304 27 -666 -33
                            -980 -162 -97 -39 -105 -56 -75 -151 13 -40 26 -78 29 -86 4 -11 -9 -13 -79
                            -7 -114 10 -234 37 -424 96 -221 68 -276 80 -381 80 -165 0 -313 -53 -450
                            -161 -72 -58 -80 -61 -177 -81 -79 -16 -142 -21 -277 -22 -177 -1 -250 8 -387
                            49 l-51 15 31 95 c39 119 34 132 -67 173 -316 130 -695 191 -1006 162z m330
                            -150 c147 -13 333 -51 468 -95 59 -19 112 -38 119 -43 9 -5 -65 -230 -264
                            -805 l-276 -797 -263 0 -264 0 0 859 0 859 43 8 c126 22 288 27 437 14z m3957
                            0 c61 -5 128 -12 147 -16 l36 -6 0 -859 0 -859 -264 0 -263 0 -276 797 c-199
                            575 -273 800 -264 805 29 19 236 80 352 103 202 41 347 51 532 35z m-1769
                            -245 c35 -8 138 -38 228 -66 209 -64 320 -87 464 -95 l115 -7 203 -586 c111
                            -322 202 -591 202 -597 0 -11 -211 -115 -288 -141 -53 -19 -132 -13 -187 12
                            -26 13 -195 173 -498 474 -360 359 -464 457 -486 459 -61 7 -260 -193 -296
                            -298 -9 -25 -20 -85 -26 -134 -12 -111 -41 -179 -107 -245 -27 -27 -81 -65
                            -119 -84 -62 -32 -94 -43 -175 -61 l-28 -6 0 370 c0 351 1 372 20 413 15 31
                            83 102 237 248 230 217 290 267 366 305 102 52 253 68 375 39z m-1401 -211
                            c142 -36 252 -47 407 -41 l139 5 -111 -104 c-90 -85 -118 -118 -144 -172 l-33
                            -67 -3 -447 -3 -447 22 -22 c20 -20 29 -21 113 -16 335 21 596 260 596 546 0
                            64 36 133 105 201 l55 54 432 -431 c310 -308 446 -437 480 -454 60 -30 163
                            -145 179 -199 11 -35 10 -47 -7 -88 -26 -62 -70 -92 -138 -92 -32 0 -60 7 -76
                            18 -14 9 -137 131 -274 270 -227 229 -253 252 -283 252 -42 0 -73 -30 -73 -70
                            0 -27 32 -64 231 -268 127 -130 237 -250 246 -266 21 -40 19 -113 -5 -145 -45
                            -62 -120 -86 -185 -62 -14 5 -148 134 -299 287 -262 264 -276 277 -304 270
                            -43 -11 -64 -35 -64 -73 0 -31 22 -57 232 -273 127 -131 237 -249 244 -262 7
                            -13 13 -44 14 -69 0 -109 -117 -182 -212 -133 -16 9 -158 146 -315 305 -313
                            316 -315 318 -370 263 -46 -46 -35 -63 214 -320 126 -128 234 -248 241 -265
                            28 -68 -26 -139 -106 -139 -53 0 1 -50 -598 564 -214 219 -427 433 -474 473
                            -103 91 -207 161 -320 215 -47 23 -86 42 -88 43 -1 1 90 269 203 595 113 325
                            205 594 205 597 0 3 8 2 18 -2 9 -4 58 -18 109 -31z"></path>
                        </g>
                    </svg>
                    All-Clients
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
                    
                    <div class="card" style="margin-bottom: 50px; padding:10px">
                        <div class="row input-daterange" style="margin-top: 40px;">
                            <div id="" class="col-md-4">
                                <div class="form-group">
                                    <label for="status"><b>Client Status</b></label>
                                    <select id="status" class="form-select chosen-select" style="width: 100%">
                                        <option value="">All Client</option>
                                        <option value="6">All Primary-Client</option>
                                        <option value="1">All Contact-client</option>
                                        <option value="2">All Wanted-client</option>
                                        <option value="3">All Our-client</option>
                                        <option value="5">All Non-prospective-client</option>
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
                                <button type="button" name="filter" id="filter"
                                    class="btn btn-success btn-sm d-flex align-items-center">
                                    <i class="fas fa-search"></i> Search
                                </button>

                            </div>
                        </div>
                    </div>


                    {{-- add button  --}}
                    @can('primary-client-create')
                        <a href={{ route('all-clients.create') }} class="btn btn-sm btn-success mb-2"><svg
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                style="width: 20px; height:20px">
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
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                fill="#000000" stroke="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>email [#ffffff1572]</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
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
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"
                                stroke="#ffffff">
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
            </div>
        </div>
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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
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

                function load_data(status = "", division_id = "", project_id = "", service_category = "",
                    location_id = "", district_id =
                    "") {
                    var table = $('#featuredProjectTitleHeading').DataTable({
                        language: {
                            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                        },
                        searching: false,
                        ordering: false,
                        serverSide: true,
                        ajax: {
                            url: '{!! route('all-clients.getdata') !!}',
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
                    load_data(status, division_id, project_id, service_category, location_id,
                        district_id);
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
                    $('#featuredProjectTitleHeading').DataTable().ajax.reload(null,
                        false); // Keep current page
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
