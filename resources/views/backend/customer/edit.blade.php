@extends('layouts.backend')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
    Edit Customer
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Customer</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1" style="padding: 0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('customers') }}" class="text-muted text-hover-primary">Customer</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Edit Customer</li>
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
        <h2 style="text-align: center;">Edit Customer</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            {{-- Name field --}}
            <div class="form-group">
                <label for="name" class="mb-2 fw-bold">Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name" value="{{ old('name', $customer->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Email field --}}
            <div class="form-group">
                <label for="email" class="mb-2 fw-bold">Email:</label>
                <input type="email" class="form-control mb-2" id="email" name="email" value="{{ old('email', $customer->email) }}">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Phone field --}}
            <div class="form-group">
                <label for="phone" class="mb-2 fw-bold">Phone:</label>
                <input type="number" class="form-control mb-2" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
                @error('phone')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Designation field --}}
            <div class="form-group">
                <label for="designation" class="mb-2 fw-bold">Designation:</label>
                <input type="text" class="form-control mb-2" id="designation" name="designation" value="{{ old('designation', $customer->designation) }}">
                @error('designation')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Address field --}}
            <div class="form-group">
                <label for="address" class="mb-2 fw-bold">Address:</label>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ old('address', $customer->address) }}</textarea>
                @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Projects --}}
            <div id="projects-container">
                @foreach ($customerProjects as $index => $customerProject)
                    <div class="form-group project-group">
                        <div class="d-flex align-items-center justify-content-between my-2">
                            <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                            <button type="button" class="btn btn-danger btn-sm remove-group" data-id="{{ $customerProject->id }}">
                                <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g id="Edit / Remove_Minus">
                                            <path id="Vector" d="M6 12H18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                </svg> Remove
                            </button>
                        </div>
                        <div class="d-flex">
                            <select name="projects[]" class="form-select me-2" aria-label="Select Project">
                                <option value="">Select Project</option>
                                @foreach ($projects as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $customerProject->project_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <select name="statuses[]" class="form-select me-2" aria-label="Select Status">
                                <option value="">Select Status</option>
                                <option value="interested" {{ $customerProject->status == 'interested' ? 'selected' : '' }}>Interested</option>
                                <option value="want-to-buy" {{ $customerProject->status == 'want-to-buy' ? 'selected' : '' }}>Want To Buy</option>
                                <option value="purchased" {{ $customerProject->status == 'purchased' ? 'selected' : '' }}>Purchased</option>
                            </select>
                            <textarea name="notes[]" cols="30" rows="1" class="form-control" placeholder="Note">{{ $customerProject->note }}</textarea>
                            <!-- Hidden field to manage project removal -->
                            <input type="hidden" class="remove-project-id" name="remove_projects[]" value="">
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-more" class="btn btn-success btn-sm mt-4">Add More</button>
            <button type="submit" class="btn btn-primary btn-sm mt-4">Update</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-more').addEventListener('click', function() {
        var container = document.getElementById('projects-container');
        var newGroup = document.createElement('div');
        newGroup.className = 'form-group project-group';
        newGroup.innerHTML = `
            <div class="d-flex align-items-center justify-content-between my-2">
                <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                <button type="button" class="btn btn-danger btn-sm remove-group" data-id="">
                    <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Edit / Remove_Minus">
                                <path id="Vector" d="M6 12H18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg> Remove
                </button>
            </div>
            <div class="d-flex">
                <select name="projects[]" class="form-select me-2" aria-label="Select Project">
                    <option value="">Select Project</option>
                    @foreach ($projects as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <select name="statuses[]" class="form-select me-2" aria-label="Select Status">
                    <option value="">Select Status</option>
                    <option value="interested">Interested</option>
                    <option value="want-to-buy">Want To Buy</option>
                    <option value="purchased">Purchased</option>
                </select>
                <textarea name="notes[]" cols="30" rows="1" class="form-control" placeholder="Note"></textarea>
                <input type="hidden" class="remove-project-id" name="remove_projects[]" value="">
            </div>
        `;
        container.appendChild(newGroup);
    });

    document.getElementById('projects-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-group')) {
            var group = e.target.closest('.project-group');
            var projectId = group.querySelector('.remove-project-id').value;
            if (projectId) {
                // Add project ID to remove list
                var removeInput = document.createElement('input');
                removeInput.type = 'hidden';
                removeInput.name = 'remove_projects[]';
                removeInput.value = projectId;
                group.appendChild(removeInput);
            }
            group.remove();
        }
    });
</script>
@endsection
