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
District
@endsection

<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
<!--begin::Toolbar container-->
<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
  <!--begin::Page title-->
  <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
      <!--begin::Title-->
      <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">District
      </h1>
      <!--end::Title-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
          <!--begin::Item-->
          <li class="breadcrumb-item text-muted">
              <a href="{{route('districts')}}" class="text-muted text-hover-primary">District</a>
          </li>
          <!--end::Item-->
          <!--begin::Item-->
          <li class="breadcrumb-item">
              <span class="bullet bg-gray-400 w-5px h-2px"></span>
          </li>
          <!--end::Item-->
          <!--begin::Item-->
          <li class="breadcrumb-item text-muted">District</li>
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
  <a href={{ route('districts.create') }} class="btn btn-sm btn-success mb-2"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height:20px"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#ffffff"></path></g></svg>Add District</a>
  <table id="featuredProjectTitleHeading" class="display" style="width:100%">
      <thead>
          <tr>
              <th>Serial ID</th>
              <th>Division</th>
              <th>District Name</th>
              <th>Action</th>
          </tr>
      </thead>
  </table>
</div>

<!-- Custom CSS for Table Borders -->
<style>
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
  </style>
<script>
  $(document).ready(function() {
      $('#featuredProjectTitleHeading').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('districts.getdata') }}',
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
                  data: 'division',
                  name: 'division'
              },
              {
                  data: 'name',
                  name: 'name'
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

@endsection
