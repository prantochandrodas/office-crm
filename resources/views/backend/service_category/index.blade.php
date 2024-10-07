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
    Service-Category
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Service-Category
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('service-categories') }}"
                        class="text-muted text-hover-primary">Service-Category</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Service-Category</li>
            </ul>
        </div>
    </div>
</div>
<!--end::Toolbar-->

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">

        <!--begin::Card-->
        <div class="card" style="border: 1px solid #50cd89;">
            <div class="card-header d-flex align-items-center justify-content-between"
                style="min-height: 40px!important; background-color: #50cd89;">
                <p class="card-title" style="color: white">
                    <svg style="width: 24px; height:24px; margin-right:5px" version="1.0"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 239.000000 211.000000"
                        preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,211.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                            stroke="none">
                            <path d="M895 2103 c-98 -9 -125 -30 -125 -98 0 -39 -4 -46 -29 -59 -26 -14
                                                                                        -31 -14 -52 3 -72 55 -108 47 -174 -41 -55 -73 -57 -99 -10 -142 33 -30 34
                                                                                        -35 24 -64 -8 -24 -17 -32 -35 -32 -39 0 -91 -26 -99 -50 -4 -12 -4 -54 0 -93
                                                                                        9 -92 29 -117 94 -117 40 0 48 -4 62 -28 16 -28 15 -30 -12 -67 -40 -53 -37
                                                                                        -83 9 -126 97 -92 134 -101 186 -44 30 33 34 34 63 23 27 -10 31 -17 36 -57 9
                                                                                        -76 60 -96 186 -72 55 11 71 31 71 92 0 42 3 48 29 59 27 11 33 9 64 -14 39
                                                                                        -30 86 -34 115 -8 12 9 37 37 56 60 47 58 49 102 5 143 -26 24 -30 34 -24 56
                                                                                        8 33 21 43 58 43 70 0 89 35 77 140 -7 64 -12 78 -36 98 -22 20 -34 23 -65 18
                                                                                        -35 -6 -40 -4 -54 25 -16 29 -15 32 9 64 37 48 35 93 -6 131 -92 86 -139 96
                                                                                        -189 43 -27 -29 -33 -31 -62 -23 -29 9 -33 14 -37 57 -9 72 -38 90 -135 80z
                                                                                        m80 -108 c8 -62 9 -62 84 -88 l55 -19 39 41 c43 46 44 45 111 -12 l39 -34 -36
                                                                                        -47 -36 -48 29 -58 30 -59 57 -3 58 -3 7 -60 c5 -33 4 -63 -1 -68 -5 -5 -30
                                                                                        -12 -55 -14 -52 -6 -56 -10 -79 -73 -23 -63 -22 -68 20 -105 35 -30 37 -34 25
                                                                                        -57 -7 -13 -27 -39 -43 -56 l-30 -33 -37 29 c-57 44 -58 45 -123 12 l-61 -31
                                                                                        4 -50 c3 -29 1 -53 -6 -58 -6 -5 -38 -10 -71 -12 l-60 -4 -6 54 c-4 29 -11 56
                                                                                        -16 60 -4 4 -34 15 -67 26 l-58 19 -34 -37 c-19 -20 -39 -37 -46 -37 -15 0
                                                                                        -98 69 -98 82 0 5 14 27 30 48 17 21 30 42 30 47 0 4 -13 33 -28 63 l-29 55
                                                                                        -53 0 c-47 0 -54 3 -62 25 -5 13 -8 45 -6 70 l3 45 47 5 c57 7 59 9 86 81 l20
                                                                                        57 -39 38 c-21 21 -39 41 -39 45 0 9 70 93 81 97 5 2 27 -10 48 -27 21 -17 45
                                                                                        -31 52 -31 8 0 37 11 64 25 50 26 50 26 55 83 5 56 6 57 40 63 19 4 49 7 67 8
                                                                                        31 1 32 0 38 -54z"></path>
                            <path d="M862 1785 c-63 -19 -111 -61 -138 -119 -41 -87 -29 -173 33 -246 89
                                                                                        -104 237 -109 334 -11 74 73 89 166 43 259 -30 61 -74 98 -140 118 -57 17 -76
                                                                                        17 -132 -1z m151 -70 c73 -35 111 -150 72 -224 -81 -158 -325 -103 -325 73 1
                                                                                        136 127 211 253 151z"></path>
                            <path d="M1765 1527 c-12 -10 -16 -22 -13 -41 4 -22 0 -29 -24 -42 -26 -14
                                                                                        -31 -13 -57 6 -16 11 -32 20 -35 20 -12 0 -66 -66 -66 -82 0 -9 10 -24 22 -32
                                                                                        18 -13 20 -20 12 -48 -8 -28 -15 -34 -44 -38 -33 -5 -35 -7 -38 -48 -4 -53 10
                                                                                        -72 52 -72 24 0 34 -6 43 -26 11 -23 10 -31 -7 -54 -11 -16 -20 -31 -20 -34 0
                                                                                        -11 66 -66 79 -66 8 0 25 9 37 21 18 17 28 19 51 12 22 -7 29 -17 33 -44 4
                                                                                        -30 9 -34 39 -37 62 -6 81 4 81 43 0 28 6 37 28 49 25 13 30 12 52 -5 34 -25
                                                                                        44 -24 74 12 31 37 33 60 6 84 -34 30 -4 85 46 85 27 0 33 14 26 60 -7 48 -21
                                                                                        63 -52 56 -23 -4 -29 0 -43 29 -15 31 -15 34 4 51 28 25 23 48 -15 78 -43 32
                                                                                        -51 32 -77 2 -18 -21 -24 -22 -50 -12 -19 7 -32 20 -35 36 -3 14 -7 31 -10 38
                                                                                        -5 16 -75 16 -99 -1z m141 -202 c62 -47 63 -139 3 -189 -24 -20 -41 -26 -81
                                                                                        -26 -45 0 -54 4 -84 36 -29 31 -34 42 -34 86 0 44 4 54 34 84 29 29 41 34 82
                                                                                        34 35 0 56 -6 80 -25z"></path>
                            <path
                                d="M16 988 c-24 -34 -24 -752 0 -786 15 -22 20 -22 223 -22 148 0 210 3
                                                                                        219 12 17 17 17 789 0 806 -9 9 -71 12 -219 12 -203 0 -208 0 -223 -22z m328
                                                                                        -549 c13 -7 30 -25 37 -41 10 -25 9 -33 -8 -56 -25 -33 -76 -41 -104 -16 -29
                                                                                        26 -25 78 7 103 31 24 35 25 68 10z">
                            </path>
                            <path
                                d="M552 593 l3 -348 175 -76 c96 -42 204 -90 240 -107 97 -45 145 -56
                                                                                        250 -55 122 0 163 14 422 146 320 163 682 390 720 452 28 47 33 90 13 140 -23
                                                                                        61 -63 88 -138 93 -59 5 -64 3 -253 -89 l-192 -94 -22 -52 c-50 -118 -153
                                                                                        -172 -348 -180 -108 -5 -124 -4 -142 12 -22 20 -25 41 -10 65 7 12 39 16 142
                                                                                        20 120 5 139 8 191 34 97 47 121 117 62 176 -24 24 -32 25 -178 30 l-152 5
                                                                                        -100 56 c-55 31 -131 69 -170 85 -69 29 -73 29 -293 32 l-222 3 2 -348z">
                            </path>
                        </g>
                    </svg>
                    Service-Category
                </p>
                <div>
                    @can('service-category-create')
                        <a href={{ route('service-categories.create') }} class="btn btn-sm" style="background: white">
                            <i class="fa-solid fa-plus"></i>
                            Add Service-Category
                        </a>
                    @endcan
                    <button class="btn btn-sm" data-bs-toggle="collapse" data-bs-target="#serviceCategoryCardBody"
                        aria-expanded="true">
                        <i class="fa-solid fa-angle-down text-light fs-2"></i>
                    </button>
                    <!-- Collapse button -->

                </div>
            </div>

            <div id="serviceCategoryCardBody" class="collapse show">
                <div class="card-body">
                    <table id="featuredProjectTitleHeading" class="table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Serial ID</th>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#featuredProjectTitleHeading').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('service-categories.getdata') }}',
                    columns: [{
                            data: null,
                            name: 'serial_number',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<div class="btn-group">' + data + '</div>';
                            }
                        }
                    ]
                });
            });
        </script>

        <!--end::Card-->
    </div>
</div>
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
    }

    table.dataTable th,
    table.dataTable td {
        padding: 10px;
    }

    .btn>i {
        padding-right: 0 !important;
    }
</style>

@endsection
