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
    Customer
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Customer
            </h1>
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
                <li class="breadcrumb-item text-muted">Customer</li>
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
        <h2 style="text-align: center;">Create Customer</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc;">
        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- name field  --}}
            <div class="form-group">
                <label for="name" class="mb-2 fw-bold">Contact Person:</label>
                <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Contact Person">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

             {{-- company_name field  --}}
             <div class="form-group">
                <label for="company_name" class="mb-2 fw-bold">Company Name:</label>
                <input type="text" class="form-control mb-2" id="company_name" name="company_name" placeholder="Company Name">
                @error('company_name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- email field  --}}
            <div class="form-group">
                <label for="email" class="mb-2 fw-bold">Email:</label>
                <input type="email" class="form-control mb-2" id="email" name="email" placeholder="Email">
                @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- phone field  --}}
            <div class="form-group">
                <label for="phone" class="mb-2 fw-bold">Phone:</label>
                <input type="number" class="form-control mb-2" id="phone" name="phone" placeholder="Phone Number">
                @error('phone')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            {{-- designation field  --}}
            <div class="form-group">
                <label for="designation" class="mb-2 fw-bold">Designation:</label>
                <input type="text" class="form-control mb-2" id="designation" name="designation" placeholder="Designation">
                @error('designation')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- address field  --}}
            <div class="form-group">
                <label for="address" class="mb-2 fw-bold">Address:</label>
                <textarea type="text" name="address" id="address" cols="30" rows="3" class="form-control" placeholder="Address"></textarea>
                @error('address')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
             {{-- note field  --}}
             <div class="form-group">
                <label for="note" class="mb-2 fw-bold">Note:</label>
                <textarea type="text" name="note" id="note" cols="30" rows="3" class="form-control" placeholder="note"></textarea>
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
                        <option value="{{$item->id}}">{{$item->name}}</option>    
                    @endforeach
                </select>
                @error('location_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div id="projects-container">
                <div class="form-group project-group">
                    <div class="d-flex align-items-center justify-content-between my-2">
                        <label for="projects" class="mb-2 fw-bold">Assign Project:</label>
                        <button type="button" id="add-more" class="btn btn-success btn-sm mt-2">
                            <svg style="width: 20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g id="Edit / Add_Plus">
                                        <path id="Vector" d="M6 12H12M12 12H18M12 12V18M12 12V6" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg> Add More
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
                            <option value="1">Contac</option>
                            <option value="want-to-buy">Want To Buy</option>
                            <option value="purchased">Purchased</option>
                            <!-- Add other status options as needed -->
                        </select>
                        <textarea name="notes[]" cols="30" rows="1" class="form-control" placeholder="Note"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-4">Create</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-more').addEventListener('click', function() {
        var container = document.getElementById('projects-container');
        var newGroup = document.createElement('div');
        newGroup.className = 'form-group project-group';
        newGroup.innerHTML = `
            <div class="d-flex align-items-center justify-content-end my-2">
                <button type="button" class="btn btn-danger btn-sm remove-group">
                    <svg style="width:20px; height:20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Remove_Minus"> <path id="Vector" d="M6 12H18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg> Remove
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
                    <!-- Add other status options as needed -->
                </select>
                <textarea name="notes[]" cols="30" rows="1" class="form-control" placeholder="Note"></textarea>
            </div>
        `;
        container.appendChild(newGroup);
    });

    document.getElementById('projects-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-group')) {
            e.target.closest('.project-group').remove();
        }
    });
</script>
@endsection
