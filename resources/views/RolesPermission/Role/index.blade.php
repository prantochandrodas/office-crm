@extends('layouts.backend')
@section('content')
    <!-- success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- error message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@section('title')
    Project Roles
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="container-fluid d-flex justify-content-between">
        <!--begin::Page title-->
        <div class="page-title">
            <h1 class="page-heading text-dark fw-bold fs-3">Project Roles</h1>
            <!-- Breadcrumb -->
            <ul class="breadcrumb">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('projectes') }}" class="text-muted text-hover-primary">Project</a>
                </li>
                <li class="breadcrumb-item text-muted">Roles</li>
            </ul>
        </div>
        <!--end::Page title-->
        <a href="{{ route('role.create') }}" class="btn btn-success btn-sm d-flex align-items-center">
            <svg style="width: 15px; height:15px; margin-right:5px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 1H6V6L1 6V10H6V15H10V10H15V6L10 6V1Z" fill="#ffffff"></path> </g></svg>
            </svg>
            Add Role
        </a>
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Manage Roles</h3>
            </div>
            <div class="card-body">
                <table id="expensesTable" class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>User Role</th>
                            <th>Action</th>
                            <th>Role Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                                        <form action="{{ route('role.distroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('role.add-permission', $role->id) }}" class="btn btn-sm btn-success">Manage Permissions</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--end::Content container-->
</div>
@endsection
