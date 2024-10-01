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
    Roles
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <div id="kt_app_toolbar_container" class="container-fluid d-flex justify-content-between">
        <!--begin::Page title-->
        <div class="page-title">
            <h1 class="page-heading text-dark fw-bold fs-3">Roles</h1>
            <ul class="breadcrumb">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('role.index') }}" class="text-muted text-hover-primary">Role</a>
                </li>
                <li class="breadcrumb-item text-muted">Roles</li>
            </ul>
        </div>
        <!--end::Page title-->
        @can('role-create')
            <a href="{{ route('role.create') }}" class="btn btn-success btn-sm d-flex align-items-center">
                <svg style="width: 15px; height:15px; margin-right:5px" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <path d="M10 1H6V6L1 6V10H6V15H10V10H15V6L10 6V1Z" fill="#ffffff"></path>
                </svg>
                Add Role
            </a>
        @endcan
    </div>
</div>
<!--end::Toolbar-->

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div class="container-fluid">
        <div class="card shadow-sm" style="background: #f8f9fa">
            <div class="card-header">
                <h3 class="card-title">Manage Roles</h3>
            </div>
            <div class="card-body">
                <table id="expensesTable" class="table table-hover table-bordered align-middle text-center"
                    style="border-color: #333;">
                    <thead class="table-dark">
                        <tr>
                            <th style="border: 1px solid #333;">#</th>
                            <th style="border: 1px solid #333;">Role</th>
                            <th style="border: 1px solid #333;">Permissions</th>
                            <th style="border: 1px solid #333;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rolesWithPermissions as $roleData)
                            <tr>
                                <td style="border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                                <td style="border: 1px solid #ddd;">{{ $roleData['role']->name }}</td>
                                <td style="border: 1px solid #ddd;">
                                    @foreach ($roleData['permissions'] as $item)
                                        <span class="badge bg-success m-1"
                                            style="text-transform: capitalize; font-size: 0.875rem; padding: 0.5rem 0.75rem;">{{ $item }}</span>
                                    @endforeach
                                </td>
                                <td style="border: 1px solid #ddd;">
                                    <div class="d-flex justify-content-center">
                                        @can('role-edit')
                                            <a href="{{ route('role.edit', $roleData['role']->id) }}"
                                                class="btn btn-sm btn-primary me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        @endcan
                                        @can('role-delete')
                                        <form action="{{ route('role.distroy', $roleData['role']->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
