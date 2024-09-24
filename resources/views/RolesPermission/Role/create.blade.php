@extends('layouts.backend')
@section('content')
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
<div class="app-container container-fluid">
    <div style="background-color: #f0f0f0; padding: 20px;">
        <h2 style="text-align: center;">Create Role</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('role.store') }}">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Role Name</label>
                <input type="text" name="name" id="name" style="width: 100%; padding: 8px;"
                    placeholder="Role Name" required>
            </div>
            <div class="mb-4">
                <label class="form-label"><strong>Permissions</strong></label>
            
               
            
                <div class="row">
                    @foreach ($permissions as $parent => $children)
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input permission-checkbox" id="permission-{{ $parent }}" 
                                    value="{{ $parent }}" name="permission[]" data-parent="{{ $parent }}">
                                <label class="form-check-label" for="permission-{{ $parent }}">
                                    <strong>{{ ucfirst(str_replace('-', ' ', $parent)) }}</strong>
                                </label>
                            </div>
            
                            <div class="ml-4 child-permissions" id="children-of-{{ $parent }}">
                                @foreach ($children as $child)
                                    <div class="form-check ml-3">
                                        <input type="checkbox" class="form-check-input permission-checkbox" id="permission-{{ $child }}"
                                            value="{{ $child }}" name="permission[]" data-parent="{{ $parent }}">
                                        <label class="form-check-label" for="permission-{{ $child }}">
                                            {{ ucfirst(str_replace('-', ' ', $child)) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit"
                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Create</button>
        </form> 
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

        permissionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const parentPermission = this.getAttribute('data-parent');
                
                if (this.checked) {
                    // If a parent permission is selected, select all its child permissions
                    document.querySelectorAll(`[data-parent="${parentPermission}"]`).forEach(childCheckbox => {
                        childCheckbox.checked = true;
                    });
                } else {
                    // If a parent permission is deselected, deselect all its child permissions
                    document.querySelectorAll(`[data-parent="${parentPermission}"]`).forEach(childCheckbox => {
                        childCheckbox.checked = false;
                    });
                }
            });
        });
    });
</script>

@endsection
