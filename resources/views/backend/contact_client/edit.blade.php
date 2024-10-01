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
        <h2 style="text-align: center;">Edit Contact-Client</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('contact-clients.update', $customer->id) }}"
            enctype="multipart/form-data">
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
            {{-- <div class="form-group">
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
            </div> --}}

            {{-- Division, District, and Area Selection --}}
            <div class="form-group row my-4">
                <div class="col-md-4">
                    <label for="division_id" class="mb-2 fw-bold">Divisions</label>
                    <select name="division_id" id="division_id" class="form-control">
                        <option>Select Divisions</option>
                        @foreach ($divisions as $item)
                            <option value="{{ $item->id }}"
                                {{ old('division_id', $selectedDivisionId) == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('division_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="district_id" class="mb-2 fw-bold">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                        <option>Select District</option>
                        @if (isset($districts))
                            @foreach ($districts as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('district_id', $selectedDistrictId) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('district_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="location_id" class="mb-2 fw-bold">Area</label>
                    <select name="location_id" id="location_id" class="form-control">
                        <option>Select Area</option>
                        @if (isset($locations))
                            @foreach ($locations as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('location_id', $selectedLocationId) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('location_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <!-- Projects and statuses -->
            {{-- <div id="projects-container">
                <!-- Show label only once -->
                <div class="d-flex align-items-center justify-content-between my-2">
                    <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                    <!-- Button to add more project fields, if needed -->
                    <button type="button" class="btn btn-success btn-sm" id="add-more"><svg
                            style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Edit / Add_Plus">
                                    <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#ffffff"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                        </svg> Add More Projects</button>
                </div>

                @foreach ($customer->projects as $index => $customerProject)
                    <div class="form-group project-group">
                        <div class="d-flex align-items-center justify-content-end my-2">
                            @if ($index >= 0)
                                <!-- Only show remove button for subsequent fields -->
                                <button type="button" class="btn btn-danger btn-sm remove-group">
                                    <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
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
            </div> --}}

            <div id="projects-container">
                <!-- Show label only once -->
                <div class="d-flex align-items-center justify-content-between my-2">
                    <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                    <!-- Button to add more project fields, if needed -->
                    <button type="button" class="btn btn-success btn-sm" id="add-more">
                        <svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Edit / Add_Plus">
                                    <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </g>
                        </svg> Add More Projects
                    </button>
                </div>
    
                @foreach ($customer->projects as $index => $customerProject)
                    <div class="form-group project-group">
                        <div class="d-flex align-items-center justify-content-end my-2">
                            @if ($index >= 0)
                                <!-- Only show remove button for subsequent fields -->
                                <button type="button" class="btn btn-danger btn-sm remove-group">
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
                            @endif
                        </div>
                        <div class="d-flex">
                            <!-- Hidden ID field for updating existing records -->
                            <input type="hidden" name="project_ids[]" value="{{ $customerProject->id }}">
                        
                            <!-- Service Category Selection -->
                            <select name="service_category[]" class="form-select me-2 service-category" aria-label="Select Service Category">
                                <option value="">Select Service Category</option>
                                @foreach ($serviceCategory as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $projects->firstWhere('id', $customerProject->project_id)->service_category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        
                            <!-- Project Selection -->
                            <select name="projects[]" class="form-control mb-2 project-select">
                                <option value="">Select Project</option>
                                @php
                                    // Get the selected service category ID
                                    $selectedServiceCategoryId = $projects->firstWhere('id', $customerProject->project_id)->service_category_id ?? null;
                                @endphp
                                @foreach ($projects as $project)
                                    @if ($project->service_category_id == $selectedServiceCategoryId)
                                        <option value="{{ $project->id }}"
                                            {{ $project->id == $customerProject->project_id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        
                            <!-- Notes Input -->
                            <textarea name="notes[]" class="form-control mb-2 ms-2" placeholder="Notes">{{ $customerProject->note }}</textarea>
                        </div>
                        
                    </div>
                @endforeach
            </div>

            
            <!-- Submit button -->
            <button type="submit" class="btn btn-success btn-sm mt-4">Update Customer</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-more').addEventListener('click', function() {
         const container = document.getElementById('projects-container');
         const newGroup = document.createElement('div');
         newGroup.className = 'form-group project-group';
         
         newGroup.innerHTML = `
             <div class="d-flex align-items-center justify-content-end my-2">
                 <button type="button" class="btn btn-danger btn-sm remove-group">
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
                 <input type="hidden" name="project_ids[]" value="">
                 <select name="service_category[]" class="form-select me-2 service-category" aria-label="Select Service Category">
                     <option value="">Select Service Category</option>
                     @foreach ($serviceCategory as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                 </select>
                 <select name="projects[]" class="form-control mb-2 project-select">
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
     function loadProjects(selectElement, projectSelect) {
         var serviceCategoryId = selectElement.value;
         if (serviceCategoryId) {
             // Make an Ajax request to fetch projects for the selected service category
             fetch('/get-projects/' + serviceCategoryId)
                 .then(response => response.json())
                 .then(data => {
                     projectSelect.innerHTML = '<option value="">Select Project</option>'; // Clear existing options
                     data.forEach(project => {
                         var option = document.createElement('option');
                         option.value = project.id;
                         option.textContent = project.name;
                         projectSelect.appendChild(option);
                     });
                 })
                 .catch(error => console.error('Error fetching projects:', error));
         } else {
             projectSelect.innerHTML = '<option value="">Select Project</option>'; // Reset if no service category selected
         }
     }
 
 
  // Add event listener to dynamically populate projects when service category changes
  document.addEventListener('change', function(event) {
         if (event.target.classList.contains('service-category')) {
             var projectSelect = event.target.closest('.d-flex').querySelector('.project-select');
             loadProjects(event.target, projectSelect);
         }
     });
 
     $(document).ready(function() {
         // When Division changes, load Districts
         $('#division_id').on('change', function() {
             var division_id = $(this).val();
             if (division_id) {
                 $.ajax({
                     url: '/get-districts/' + division_id,
                     type: 'GET',
                     dataType: 'json',
                     success: function(data) {
                         $('#district_id').empty();
                         $('#district_id').append('<option value="">Select District</option>');
                         $.each(data, function(key, value) {
                             $('#district_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                         });
                     }
                 });
             } else {
                 $('#district_id').empty();
                 $('#location').empty();
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
                         $('#location_id').append('<option value="">Select Location</option>');
                         $.each(data, function(key, value) {
                             $('#location_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                         });
                     }
                 });
             } else {
                 $('#location_id').empty();
             }
         });
     });
 </script>
@endsection
