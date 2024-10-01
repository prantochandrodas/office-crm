@extends('layouts.backend')
@section('content')
@section('title')
    Edit Role
@endsection
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Role</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('role.index') }}" class="text-muted text-hover-primary">Role</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Edit Role</li>
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
        <h2 style="text-align: center;">Edit Role</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('role.update', $findData->id) }}">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
                <input type="text" name="name" id="name" style="width: 100%; padding: 8px;"
                    value="{{ $findData->name }}" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold" class="mb-3">Permissions</label>

                @php
                    // Define your permission groups
                    $permissionGroups = [
                        'dashboard' => [],
                        'client' => [],
                        'setting' => [],
                        'send-email' => [],
                        'send-sms' => [],
                        'application' => ['application-update'],
                        'project' => ['project-create', 'project-edit', 'project-delete'],
                        'division' => ['division-create', 'division-edit', 'division-delete'],
                        'location' => ['location-create', 'location-edit', 'location-delete'],
                        'primary-client' => ['primary-client-create', 'primary-client-edit', 'primary-client-delete'],
                        'contact-client' => ['contact-client-edit', 'contact-client-delete'],
                        'wanted-client' => ['wanted-client-edit', 'wanted-client-delete'],
                        'non-prospective-client' => ['non-prospective-client-edit', 'non-prospective-client-delete'],
                        'change-client-status' => [
                            'add-to-contact-client',
                            'add-to-primary-client',
                            'add-to-wanted-client',
                            'add-to-non-prospective-client',
                        ],
                        'conversation' => ['conversation-create', 'conversation-edit', 'conversation-delete'],
                        'user' => ['user-create', 'user-edit', 'user-delete'],
                        'role' => ['role-create', 'role-edit', 'role-delete'],
                        'district' => ['district-create', 'district-edit', 'district-delete'],
                        'service-category' => [
                            'service-category-create',
                            'service-category-edit',
                            'service-category-delete',
                        ],
                        'service-category' => [
                            'service-category-create',
                            'service-category-edit',
                            'service-category-delete',
                        ],
                        'our-client' => ['our-client-create', 'our-client-edit', 'our-client-delete'],
                    ];
                @endphp

                <!-- Select All Checkbox -->
                <div style="margin-bottom: 20px;">
                    <label>
                        <input type="checkbox" id="select-all" class="select-all-checkbox"> <strong>Select All</strong>
                    </label>
                </div>

                <div class="row g-4">
                    @foreach ($permissionGroups as $parent => $children)
                        <div class="col-md-3 m-4 rounded"
                            style="padding: 20px; background-color:#00777338; border: 1px solid #66cc99;">


                            <!-- Parent Permission -->
                            <label class="bg-success p-2 rounded">
                                <input type="checkbox" name="permission[]" class="permission-checkbox parent-checkbox"
                                    id="permission-{{ $parent }}" value="{{ $parent }}"
                                    data-parent="{{ $parent }}"
                                    {{ in_array($parent, $rolesPermissionsNames) ? 'checked' : '' }}>
                                <strong>{{ ucfirst(str_replace('-', ' ', $parent)) }}</strong>
                            </label>

                            <!-- Child Permissions -->
                            <div class="ml-3 mt-2">
                                @foreach ($children as $child)
                                    <div>
                                        <label>
                                            <input type="checkbox" name="permission[]"
                                                class="permission-checkbox child-checkbox"
                                                id="permission-{{ $child }}" value="{{ $child }}"
                                                data-parent="{{ $parent }}"
                                                {{ in_array($child, $rolesPermissionsNames) ? 'checked' : '' }}>
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
                style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px;">Update</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const parentCheckboxes = document.querySelectorAll('.parent-checkbox');
        const childCheckboxes = document.querySelectorAll('.child-checkbox');
        const selectAllCheckbox = document.getElementById('select-all');

        // Select or Deselect All Permissions
        selectAllCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;
            parentCheckboxes.forEach(parent => {
                parent.checked = isChecked;
            });
            childCheckboxes.forEach(child => {
                child.checked = isChecked;
            });
        });

        // Function to handle parent checkbox behavior
        parentCheckboxes.forEach(parentCheckbox => {
            parentCheckbox.addEventListener('change', function() {
                const parent = this.getAttribute('data-parent');

                // Find all children that belong to this parent
                const children = document.querySelectorAll(
                    `.child-checkbox[data-parent="${parent}"]`);

                // Set the checked state of children based on the parent
                children.forEach(child => {
                    child.checked = this.checked;
                });
            });
        });
    });
</script>
@endsection
