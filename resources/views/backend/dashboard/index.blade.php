@extends('layouts.backend')

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboard</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{route('projectes')}}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($projects) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Projects</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                                viewBox="0,0,300,150">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                    style="mix-blend-mode: normal">
                                    <g transform="scale(5.12,5.12)">
                                        <path
                                            d="M24.96289,1.05469c-0.20987,0.00724 -0.41214,0.08036 -0.57812,0.20898l-23,17.94727c-0.43579,0.33978 -0.51361,0.96851 -0.17383,1.4043c0.33978,0.43579 0.96851,0.51361 1.4043,0.17383l1.38477,-1.08008v26.29102c0.00006,0.55226 0.44774,0.99994 1,1h13.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h13.8418c0.55226,-0.00006 0.99994,-0.44774 1,-1v-26.29102l1.38477,1.08008c0.2819,0.21983 0.65967,0.27257 0.991,0.13833c0.33133,-0.13423 0.56586,-0.43504 0.61526,-0.7891c0.0494,-0.35406 -0.09386,-0.70757 -0.37579,-0.92736l-7.61523,-5.94141v-7.26953h-6v2.58594l-9.38477,-7.32227c-0.18607,-0.14428 -0.41707,-0.21828 -0.65234,-0.20898zM25,3.32227l19,14.82617v26.85156h-12v-19h-14v19h-12v-26.85156zM37,8h2v3.70898l-2,-1.5625zM20,28h10v17h-10z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                {{-- <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ isset($upcomingProjects[0]) ? route('projects.index', ['category' => $upcomingProjects[0]->category->slug]) : '#' }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #17a2b8;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($upcomingProjects) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Upcoming Projects</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                                viewBox="0,0,300,150">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                    style="mix-blend-mode: normal">
                                    <g transform="scale(5.12,5.12)">
                                        <path
                                            d="M24.96289,1.05469c-0.20987,0.00724 -0.41214,0.08036 -0.57812,0.20898l-23,17.94727c-0.43579,0.33978 -0.51361,0.96851 -0.17383,1.4043c0.33978,0.43579 0.96851,0.51361 1.4043,0.17383l1.38477,-1.08008v26.29102c0.00006,0.55226 0.44774,0.99994 1,1h13.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h13.8418c0.55226,-0.00006 0.99994,-0.44774 1,-1v-26.29102l1.38477,1.08008c0.2819,0.21983 0.65967,0.27257 0.991,0.13833c0.33133,-0.13423 0.56586,-0.43504 0.61526,-0.7891c0.0494,-0.35406 -0.09386,-0.70757 -0.37579,-0.92736l-7.61523,-5.94141v-7.26953h-6v2.58594l-9.38477,-7.32227c-0.18607,-0.14428 -0.41707,-0.21828 -0.65234,-0.20898zM25,3.32227l19,14.82617v26.85156h-12v-19h-14v19h-12v-26.85156zM37,8h2v3.70898l-2,-1.5625zM20,28h10v17h-10z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ isset($handedOverProjects[0]) ? route('projects.index', ['category' => $handedOverProjects[0]->category->slug]) : '#' }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #007bff;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($handedOverProjects) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Handed Over Projects
                                    Projects</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                                viewBox="0,0,300,150">
                                <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                    font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                    style="mix-blend-mode: normal">
                                    <g transform="scale(5.12,5.12)">
                                        <path
                                            d="M24.96289,1.05469c-0.20987,0.00724 -0.41214,0.08036 -0.57812,0.20898l-23,17.94727c-0.43579,0.33978 -0.51361,0.96851 -0.17383,1.4043c0.33978,0.43579 0.96851,0.51361 1.4043,0.17383l1.38477,-1.08008v26.29102c0.00006,0.55226 0.44774,0.99994 1,1h13.83203c0.10799,0.01785 0.21818,0.01785 0.32617,0h11.67383c0.10799,0.01785 0.21818,0.01785 0.32617,0h13.8418c0.55226,-0.00006 0.99994,-0.44774 1,-1v-26.29102l1.38477,1.08008c0.2819,0.21983 0.65967,0.27257 0.991,0.13833c0.33133,-0.13423 0.56586,-0.43504 0.61526,-0.7891c0.0494,-0.35406 -0.09386,-0.70757 -0.37579,-0.92736l-7.61523,-5.94141v-7.26953h-6v2.58594l-9.38477,-7.32227c-0.18607,-0.14428 -0.41707,-0.21828 -0.65234,-0.20898zM25,3.32227l19,14.82617v26.85156h-12v-19h-14v19h-12v-26.85156zM37,8h2v3.70898l-2,-1.5625zM20,28h10v17h-10z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div> --}}
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            {{-- <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('contact-messages.index') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #137c65;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($contactMessage) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Contact-Message</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                           <img src="{{asset('icons8-chat-50.png')}}" alt="">

                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('schedule-metting-messages.index') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #43800a;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($scheduleMettingMessage) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Schedule-Metting-Message</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <img src="{{asset('icons8-chat-50.png')}}" alt="">
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-4 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('suggsation-messages.index') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #b1ae25;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($suggsationMessage) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Suggsation-Message</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <img src="{{asset('icons8-chat-50.png')}}" alt="">
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
            </div> --}}
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
