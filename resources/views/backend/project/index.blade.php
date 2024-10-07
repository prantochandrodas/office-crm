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
    Project
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Project
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('projectes') }}" class="text-muted text-hover-primary">Project</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Project</li>
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
       
        <div class="card" style="border: 1px solid #50cd89;">
            <div class="card-header d-flex align-items-center justify-content-between"
                style="min-height: 40px!important; background-color: #50cd89;">
                <p class="card-title" style="color: white">
                    <svg fill="#ffffff" style="height: 24px; width:24px; margin-right:5px;" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                        </g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <path d="M2,9H9V2H2ZM4,4H7V7H4Zm6,7,5,8,5-8Zm8-9H11V9h7ZM16,7H13V4h3ZM2,18H9V11H2Zm2-5H7v3H4Z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    Projects
                </p>
                <div>
                    @can('project-create')
                        <a href={{ route('projectes.create') }} class="btn btn-sm" style="background: white">
                            <i class="fa-solid fa-plus"></i>
                            Add Project
                        </a>
                    @endcan
                    <!-- Collapse button -->
                    <button class="btn btn-sm"
                        data-bs-toggle="collapse" data-bs-target="#projectCardBody" aria-expanded="true">
                        <i class="fa-solid fa-angle-down text-light fs-2"></i>
                    </button>
                </div>
            </div>
            <div id="projectCardBody" class="collapse show">
                <div class="card-body">
                    <table id="featuredProjectTitleHeading" class="display">
                        <thead>
                            <tr>
                                <th>Serial ID</th>
                                <th>Service Category</th>
                                <th>Project Name</th>
                                <th>Technoligy</th>
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
                    ajax: '{{ route('projectes.getdata') }}',
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
                            data: 'service',
                            name: 'service'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'technoligy',
                            name: 'technoligy'
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
    </div>
</div>
<!-- Custom CSS for Table Borders -->
{{-- <style>
    table.dataTable thead th, table.dataTable thead td{
        border-bottom: 1px solid #ddd;
    }
    table.dataTable.no-footer{
        border-bottom: none;
    }
    table.dataTable, table.dataTable th, table.dataTable td {
        border: 1px solid #ddd; /* You can change the color to your preferred border color */
    }
    table.dataTable th, table.dataTable td {
        padding: 10px; /* Optional: add some padding for a cleaner look */
    }
  </style> --}}


@endsection
