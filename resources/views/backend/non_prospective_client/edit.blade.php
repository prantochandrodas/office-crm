@extends('layouts.backend')

@section('content')
    <!-- Success message  -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error message  -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@section('title')
    Edit Contact-Client
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
                    <a href="{{ route('contact-clients') }}" class="text-muted text-hover-primary">All-Contact-Client</a>
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

<div class="app-container container-fluid">
    <div style="background-color: #f0f0f0; padding: 20px;">
        <h2 style="text-align: center;">Edit Customer</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('contact-clients.update', $customer->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name field -->
            <div class="form-group">
                <label for="name" class="mb-2 fw-bold">Contact Name:</label>
                <input type="text" class="form-control mb-2" id="name" name="name"
                    value="{{ old('name', $customer->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- company_name field -->
            <div class="form-group">
                <label for="company_name" class="mb-2 fw-bold">Company Name:</label>
                <input type="text" class="form-control mb-2" id="company_name" name="company_name"
                    value="{{ old('company_name', $customer->company_name) }}">
                @error('company_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email field -->
            <div class="form-group">
                <label for="email" class="mb-2 fw-bold">Email:</label>
                <input type="email" class="form-control mb-2" id="email" name="email"
                    value="{{ old('email', $customer->email) }}">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone field -->
            <div class="form-group">
                <label for="phone" class="mb-2 fw-bold">Phone:</label>
                <input type="number" class="form-control mb-2" id="phone" name="phone"
                    value="{{ old('phone', $customer->phone) }}">
                @error('phone')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Designation field -->
            <div class="form-group">
                <label for="designation" class="mb-2 fw-bold">Designation:</label>
                <input type="text" class="form-control mb-2" id="designation" name="designation"
                    value="{{ old('designation', $customer->designation) }}">
                @error('designation')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address field -->
            <div class="form-group">
                <label for="address" class="mb-2 fw-bold">Address:</label>
                <textarea type="text" name="address" id="address" cols="30" rows="3" class="form-control">{{ old('address', $customer->address) }}</textarea>
                @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

             <!-- note field -->
             <div class="form-group">
                <label for="note" class="mb-2 fw-bold">Note:</label>
                <textarea type="text" name="note" id="note" cols="30" rows="3" class="form-control">{{ old('note', $customer->note) }}</textarea>
                @error('note')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- location_id field  --}}
             <div class="form-group">
                <label for="location_id" class="mb-2 fw-bold">Area</label>
                <select name="location_id" id="location_id" class="form-control">
                    <option>Select Area</option>
                    @foreach ($locations as $item)
                        <option value="{{$item->id}}" {{$customer->location_id == $item->id ? 'selected':''}}>{{$item->name}}</option>    
                    @endforeach
                </select>
                @error('location_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Projects and statuses -->
            <div id="projects-container">
                <!-- Show label only once -->
                <div class="d-flex align-items-center justify-content-between my-2">
                    <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                    <!-- Button to add more project fields, if needed -->
                    <button type="button" class="btn btn-success btn-sm" id="add-more"><svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Edit / Add_Plus">
                                <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg> Add More Projects</button>
                </div>
            
                @foreach ($customer->projects as $index => $customerProject)
                    <div class="form-group project-group">
                        <div class="d-flex align-items-center justify-content-end my-2">
                            @if ($index >= 0) <!-- Only show remove button for subsequent fields -->
                                <button type="button" class="btn btn-danger btn-sm remove-group">
                                    <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="Edit / Remove_Minus">
                                                <path id="Vector" d="M6 12H18" stroke="#ffffff" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </g>
                                    </svg> Remove
                                </button>
                            @endif
                        </div>
                        <div class="d-flex">
                            <!-- Hidden ID field for updating existing records -->
                            <input type="hidden" name="project_ids[]" value="{{ $customerProject->id }}">
            
                            <!-- Project Selection -->
                            <select name="projects[]" class="form-control mb-2">
                                <option value="">Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ $project->id == $customerProject->project_id ? 'selected' : '' }}>
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
            
                            <!-- Notes Input -->
                            <textarea name="notes[]" class="form-control mb-2 ms-2" placeholder="Notes">{{ $customerProject->note }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-success">Update Customer</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-more').addEventListener('click', function() {
        const container = document.getElementById('projects-container');
        const index = container.children.length;
        const newGroup = document.createElement('div');
        newGroup.className = 'form-group project-group';

        newGroup.innerHTML = `
            <div class="d-flex align-items-center justify-content-end my-2">
                <button type="button" class="btn btn-danger btn-sm remove-group">
                    <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Edit / Remove_Minus">
                                <path id="Vector" d="M6 12H18" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg> Remove
                </button>
            </div>
            <div class="d-flex">
                <input type="hidden" name="project_ids[]" value="">
                <select name="projects[]" class="form-control mb-2">
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                <textarea name="notes[]" class="form-control mb-2 ms-2" placeholder="Notes"></textarea>
            </div>
        `;
        container.appendChild(newGroup);

        // Add remove functionality to the new group
        newGroup.querySelector('.remove-group').addEventListener('click', function() {
            container.removeChild(newGroup);
        });
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-group')) {
            e.target.closest('.project-group').remove();
        }
    });
</script>
@endsection
