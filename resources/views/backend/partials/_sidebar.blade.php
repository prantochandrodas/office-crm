<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            <img alt="Logo" src="{{ asset('application/logo/') }}" class="h-55px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('application/logo/') }}" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
}
-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <svg fill="#28a745" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M960 282c529.355 0 960 430.758 960 960 0 77.139-8.922 153.148-26.541 225.882l-10.504 43.144h-560.188c-27.106 74.88-79.85 140.838-155.52 181.045-47.887 25.185-101.647 38.625-155.633 38.625-123.445 0-236.047-67.651-293.76-176.64-5.873-11.18-11.859-25.75-17.845-43.03H37.045l-10.504-43.144C8.922 1395.148 0 1319.14 0 1242c0-529.242 430.645-960 960-960Zm168.17 1229.026c47.66-49.355 61.214-125.139 27.331-189.064-42.24-79.51-403.765-413.59-403.765-413.59s73.638 486.776 115.765 566.287c7.341 13.892 16.941 25.525 27.219 36.367h-.904c2.033 2.146 4.518 3.614 6.551 5.534 4.63 4.405 9.374 8.47 14.344 12.198 3.727 2.823 7.68 5.308 11.52 7.68 5.195 3.162 10.39 6.098 15.924 8.81 4.292 1.92 8.584 3.726 13.101 5.42 5.422 1.92 10.956 3.727 16.716 5.083a159.91 159.91 0 0 0 14.23 3.049c5.76.904 11.407 1.468 17.167 1.694 2.824.113 5.535.79 8.245.79 1.92 0 3.84-.677 5.76-.677 8.245-.226 16.377-1.355 24.508-2.936 3.727-.791 7.567-1.13 11.294-2.146 11.746-3.163 23.266-7.229 34.335-13.214h.338v-.113c15.7-8.245 28.687-19.2 40.32-31.172Zm361.524-625.807 112.715-112.715-119.717-119.831-112.828 112.715 119.83 119.83Zm-614.4-254.457h169.412V471.29H875.294v159.473ZM430.306 885.22l119.83-119.83-112.715-112.716-119.83 119.83L430.306 885.22Z"
                                        fill-rule="evenodd"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->


                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('project') || request()->is('project/create') || request()->is('project/edit/*') ? 'active' : '' }}"
                        href="{{ route('projectes') }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#28a745">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>project-new</title>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Combined-Shape" fill="#28a745"
                                            transform="translate(64.000000, 34.346667)">
                                            <path
                                                d="M192,-7.10542736e-15 L384,110.851252 L384,242.986 L341.333,242.986 L341.333,157.655 L213.333,231.555 L213.333,431.088 L192,443.405007 L0,332.553755 L0,110.851252 L192,-7.10542736e-15 Z M341.333333,264.32 L341.333,328.32 L405.333333,328.32 L405.333333,370.986667 L341.333,370.986 L341.333333,434.986667 L298.666667,434.986667 L298.666,370.986 L234.666667,370.986667 L234.666667,328.32 L298.666,328.32 L298.666667,264.32 L341.333333,264.32 Z M42.666,157.654 L42.6666667,307.920144 L170.666,381.82 L170.666,231.555 L42.666,157.654 Z M192,49.267223 L66.1333333,121.936377 L192,194.605531 L317.866667,121.936377 L192,49.267223 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Project</span>
                    </a>
                    <!--end:Menu link-->
                </div>


                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('division') || request()->is('division/create') || request()->is('division/edit/*') ? 'active' : '' }}"
                        href="{{ route('divisions') }}">
                        <span class="menu-icon">
                            <svg fill="#28a745" viewBox="0 -4 32 32" xmlns="http://www.w3.org/2000/svg"
                                stroke="#28a745">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="m32 22v2h-32v-24h2v22zm-6-16 4 14h-26v-9l7-9 9 9z"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Division</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->


                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('location') || request()->is('location/create') || request()->is('location/edit/*') ? 'active' : '' }}"
                        href="{{ route('locations') }}">
                        <span class="menu-icon">
                            <svg viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#28a745">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>location</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd" sketch:type="MSPage">
                                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                            transform="translate(-106.000000, -413.000000)" fill="#28a745">
                                            <path
                                                d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z"
                                                id="location" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Location</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item here {{ request()->is('primary-client') || request()->is('primary-client/create') || request()->is('primary-client/edit/*') || request()->is('contact-client') || request()->is('contact-client/create') || request()->is('contact-client/edit/*') || request()->is('non-prospective-client') || request()->is('non-prospective-client/create') || request()->is('non-prospective-client/edit/*') || request()->is('wanted-client') || request()->is('wanted-client/create') || request()->is('wanted-client/edit/*') || request()->is('our-client') || request()->is('our-client/create') || request()->is('our-client/edit/*') ? 'show' : '' }}   menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                stroke="#28a745">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"
                                        fill="#28a745"></path>
                                    <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"
                                        fill="#28a745"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Client</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('primary-client') || request()->is('primary-client/create') || request()->is('primary-client/edit/*') ? 'active' : '' }}"
                                href="{{ route('primary-clients') }}">
                                <span class="menu-icon">
                                    <svg style="height:24px" version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        width="256.000000pt" height="256.000000pt"
                                        viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)"
                                            fill="#28a745" stroke="none">
                                            <path d="M1585 2497 c-187 -48 -326 -227 -325 -420 0 -70 27 -174 66 -255 28
                                   -58 56 -96 113 -153 95 -95 159 -124 262 -116 90 6 149 36 230 116 107 107
                                   173 266 173 416 -1 226 -174 408 -399 421 -38 2 -92 -2 -120 -9z" />
                                            <path d="M1410 1454 c-105 -28 -180 -72 -266 -158 -75 -76 -144 -182 -144
                                   -223 0 -29 57 -36 310 -42 233 -6 259 -8 302 -28 66 -30 145 -107 179 -175
                                   l29 -57 112 40 c277 101 366 129 404 129 l41 0 -9 51 c-39 215 -220 408 -434
                                   463 -84 22 -443 22 -524 0z" />
                                            <path d="M59 1251 l-29 -29 0 -554 c0 -605 -2 -582 58 -607 20 -9 93 -11 241
                                   -9 l213 3 29 33 29 32 0 540 c0 397 -3 546 -12 565 -23 50 -48 55 -283 55
                                   l-217 0 -29 -29z" />
                                            <path d="M700 626 l0 -456 28 -7 c15 -5 250 -8 522 -8 435 0 503 2 560 17 59
                                   16 490 226 616 300 70 41 104 96 104 165 0 115 -79 195 -193 194 -78 0 -466
                                   -144 -556 -206 -85 -58 -170 -85 -293 -92 -93 -6 -97 -5 -121 19 -30 30 -27
                                   65 7 77 11 5 59 9 106 9 136 1 230 42 230 99 0 35 -34 97 -71 127 -71 60 -74
                                   60 -349 66 l-256 5 -59 31 c-171 89 -203 103 -237 109 l-38 7 0 -456z" />
                                        </g>
                                    </svg>
                                </span>
                                <span class="menu-title">All-primary-client</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('contact-client') || request()->is('contact-client/create') || request()->is('contact-client/edit/*') ? 'active' : '' }}"
                                href="{{ route('contact-clients') }}">
                                <span style="height: 24px" class="menu-icon">
                                    <svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-contact-book" fill="#28a745"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Contact-book</title> <defs> </defs> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g fill="#28a745"> <path d="M1.061,2.917 L2.083,2.917 L2.083,4.132 L1.061,4.132 L1.061,11.967 L2.049,11.967 L2.049,13.084 L1.061,13.084 L1.061,15.881 L12.958,15.881 L12.958,0 L1.061,0 L1.061,2.917 L1.061,2.917 Z M4.445,4.392 C4.475,4.368 4.716,4.188 4.802,4.123 L4.796,4.121 C4.804,4.118 4.808,4.117 4.813,4.114 C4.818,4.108 4.834,4.097 4.837,4.094 L4.841,4.099 C4.987,4.013 5.138,3.953 5.31,3.927 C5.772,3.859 6.109,4.339 6.328,4.614 C6.547,4.886 6.851,5.32 6.814,5.617 C6.792,5.796 6.587,5.961 6.393,6.123 L6.386,6.113 C6.333,6.17 6.099,6.409 6.079,6.441 C5.972,6.619 5.849,7.022 6.021,7.326 C6.184,7.621 6.506,8.099 6.811,8.498 C7.133,8.885 7.528,9.308 7.778,9.535 C8.04,9.772 8.471,9.755 8.673,9.697 C8.712,9.687 9.027,9.5 9.068,9.48 C9.277,9.336 9.488,9.184 9.675,9.207 C9.978,9.245 10.331,9.641 10.55,9.914 C10.769,10.188 11.163,10.626 10.983,11.046 C10.914,11.205 10.814,11.332 10.69,11.451 L10.694,11.455 L10.672,11.471 C10.668,11.475 10.666,11.479 10.666,11.479 L10.662,11.48 C10.58,11.542 10.338,11.727 10.308,11.749 C9.972,11.966 9.242,12.237 8.216,11.634 C7.455,11.185 6.62,10.423 5.823,9.471 L5.819,9.474 C5.782,9.427 5.747,9.38 5.712,9.333 C5.675,9.287 5.636,9.244 5.598,9.196 L5.602,9.193 C4.854,8.206 4.304,7.228 4.046,6.397 C3.699,5.277 4.148,4.656 4.445,4.392 L4.445,4.392 Z" class="si-glyph-fill"> </path> <rect x="0" y="3" width="0.979" height="0.992" class="si-glyph-fill"> </rect> <rect x="0" y="12" width="0.977" height="0.943" class="si-glyph-fill"> </rect> <rect x="14" y="2" width="0.916" height="2.875" class="si-glyph-fill"> </rect> <rect x="14" y="11" width="0.887" height="2.847" class="si-glyph-fill"> </rect> <rect x="14" y="6" width="0.901" height="3.895" class="si-glyph-fill"> </rect> </g> </g> </g></svg>
                                </span>
                                <span class="menu-title">Contact-Client</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('wanted-client') || request()->is('wanted-client/create') || request()->is('wanted-client/edit/*') ? 'active' : '' }}"
                                href="{{ route('wanted-clients') }}">
                                <span style="height: 24px" class="menu-icon">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" fill="#28a745"></circle> <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM18.468 17.7458C18.6958 17.518 18.6958 17.1487 18.468 16.9209C18.2402 16.693 17.8709 16.693 17.6431 16.9209L15.7222 18.8417L15.3569 18.4764C15.1291 18.2486 14.7598 18.2486 14.532 18.4764C14.3042 18.7042 14.3042 19.0736 14.532 19.3014L15.3097 20.0791C15.5375 20.307 15.9069 20.307 16.1347 20.0791L18.468 17.7458Z" fill="#28a745"></path> <path d="M15.4147 13.5074C14.4046 13.1842 13.24 13 12 13C8.13401 13 5 14.7909 5 17C5 19.1406 7.94244 20.8884 11.6421 20.9949C11.615 20.8686 11.594 20.7432 11.5775 20.6201C11.4998 20.0424 11.4999 19.3365 11.5 18.586V18.414C11.4999 17.6635 11.4998 16.9576 11.5775 16.3799C11.6639 15.737 11.8705 15.0333 12.4519 14.4519C13.0334 13.8705 13.737 13.6639 14.3799 13.5774C14.6919 13.5355 15.0412 13.5162 15.4147 13.5074Z" fill="#28a745"></path> </g></svg>
                                </span>
                                <span class="menu-title">Wanted-Client</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('our-client') || request()->is('our-client/create') || request()->is('our-client/edit/*') ? 'active' : '' }}"
                                href="{{ route('our-clients') }}">
                                <span style="height:24px;" class="menu-icon">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                                        preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#28a745" stroke="none">
                                        <path d="M1373 4985 c-119 -33 -207 -105 -259 -210 -26 -55 -29 -69 -29 -165
                                        0 -92 3 -112 26 -160 41 -85 99 -144 187 -187 72 -36 81 -38 172 -38 91 0 100
                                        2 172 38 136 67 209 177 216 326 5 102 -16 173 -73 251 -90 123 -269 186 -412
                                        145z"/>
                                        <path d="M3550 4985 c-126 -35 -237 -140 -274 -259 -27 -84 -19 -204 17 -278
                                        43 -87 98 -142 185 -185 72 -36 81 -38 172 -38 91 0 100 2 172 38 134 66 208
                                        175 216 318 6 99 -10 164 -58 238 -90 139 -273 209 -430 166z"/>
                                        <path d="M2436 4689 c-109 -37 -187 -107 -235 -209 -23 -48 -26 -68 -26 -160
                                        0 -95 3 -110 28 -163 77 -155 254 -247 419 -218 128 22 239 104 295 218 25 53
                                        28 68 28 163 0 88 -4 113 -23 154 -86 187 -297 280 -486 215z"/>
                                        <path d="M1052 4174 c-62 -41 -132 -121 -171 -194 -52 -97 -61 -153 -61 -372
                                        l0 -198 470 0 470 0 0 62 c0 155 71 316 197 449 55 57 82 93 77 101 -23 41
                                        -85 106 -136 143 l-58 43 -64 -43 c-97 -65 -180 -89 -301 -90 -124 0 -215 26
                                        -309 89 l-65 44 -49 -34z"/>
                                        <path d="M3222 4166 c-51 -38 -113 -103 -136 -144 -5 -9 19 -41 71 -95 128
                                        -133 190 -267 200 -429 l6 -88 468 0 469 0 0 198 c0 219 -9 275 -61 372 -39
                                        73 -109 153 -171 194 l-49 34 -64 -43 c-96 -65 -179 -89 -300 -90 -125 0 -217
                                        26 -309 90 l-65 44 -59 -43z"/>
                                        <path d="M2140 3886 c-64 -46 -131 -124 -168 -193 -53 -100 -62 -154 -62 -375
                                        l0 -198 650 0 650 0 0 198 c0 221 -9 275 -63 375 -37 71 -112 156 -174 199
                                        l-45 30 -44 -32 c-118 -84 -268 -122 -402 -100 -81 13 -192 59 -251 104 -19
                                        14 -37 26 -40 26 -3 0 -26 -15 -51 -34z"/>
                                        <path d="M405 3164 c-16 -2 -66 -9 -110 -15 -44 -6 -90 -13 -102 -16 l-23 -5
                                        0 -929 0 -929 324 0 c247 0 326 3 334 13 14 17 582 1660 582 1685 0 28 -13 36
                                        -114 71 -250 88 -431 121 -681 126 -99 2 -193 1 -210 -1z"/>
                                        <path d="M4380 3164 c-14 -2 -65 -9 -115 -15 -117 -15 -293 -58 -425 -105
                                        -118 -41 -130 -48 -130 -76 0 -25 568 -1668 582 -1685 8 -10 87 -13 334 -13
                                        l324 0 0 930 c0 512 -1 930 -2 930 -2 0 -41 7 -88 15 -81 15 -428 28 -480 19z"/>
                                        <path d="M2645 2896 c-126 -30 -174 -66 -475 -351 -186 -175 -238 -230 -256
                                        -270 -24 -50 -24 -53 -24 -427 l0 -378 28 0 c45 0 184 54 245 94 109 73 163
                                        163 177 299 10 103 17 131 46 188 55 111 224 269 287 269 29 0 78 -46 497
                                        -466 256 -256 485 -477 510 -492 39 -23 56 -27 125 -27 74 0 87 3 173 44 50
                                        24 92 50 92 57 0 29 -439 1279 -451 1285 -8 4 -53 12 -100 18 -97 13 -187 35
                                        -374 93 -243 75 -382 93 -500 64z"/>
                                        <path d="M1470 2667 c0 -3 -97 -285 -216 -628 -120 -347 -211 -625 -205 -627
                                        31 -10 228 -150 301 -214 47 -41 301 -296 564 -566 528 -543 521 -536 594
                                        -496 50 26 76 74 67 121 -5 30 -48 79 -251 289 -260 269 -266 278 -228 332 11
                                        16 25 22 54 22 37 0 47 -9 327 -296 167 -173 301 -302 320 -310 18 -8 54 -14
                                        81 -14 111 0 182 110 138 213 -7 18 -122 143 -255 279 -235 241 -242 249 -239
                                        284 4 45 43 80 80 71 14 -4 147 -129 303 -287 198 -199 289 -283 313 -291 71
                                        -24 155 9 189 74 19 37 21 113 3 148 -7 13 -94 107 -194 209 -260 265 -306
                                        316 -306 339 0 34 43 74 79 74 29 0 59 -27 297 -271 282 -289 295 -299 379
                                        -289 109 12 167 126 116 225 -24 46 -134 154 -181 177 -19 9 -238 219 -485
                                        466 l-451 450 -58 -58 c-79 -78 -106 -135 -116 -242 -16 -176 -85 -296 -226
                                        -397 -114 -81 -244 -127 -396 -140 -73 -7 -77 -6 -102 20 l-27 26 3 452 c4
                                        562 -8 514 177 699 l126 126 -155 -4 c-146 -5 -211 1 -392 34 -16 3 -28 3 -28
                                        0z"/>
                                        </g>
                                        </svg>
                                </span>
                                <span class="menu-title">Our-Client</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('non-prospective-client') || request()->is('non-prospective-client/create') || request()->is('non-prospective-client/edit/*') ? 'active' : '' }}"
                                href="{{ route('non-prospective-clients') }}">
                                <span style="height: 24px" class="menu-icon">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" fill="#28a745"></circle> <path fill-rule="evenodd" clip-rule="evenodd" d="M18 15.75C16.7574 15.75 15.75 16.7574 15.75 18C15.75 18.3473 15.8287 18.6763 15.9693 18.97L18.9701 15.9693C18.6763 15.8287 18.3474 15.75 18 15.75ZM20.0307 17.0299L17.0299 20.0307C17.3236 20.1713 17.6526 20.25 18 20.25C19.2426 20.25 20.25 19.2426 20.25 18C20.25 17.6526 20.1713 17.3237 20.0307 17.0299ZM14.25 18C14.25 15.9289 15.9289 14.25 18 14.25C20.0711 14.25 21.75 15.9289 21.75 18C21.75 20.0711 20.0711 21.75 18 21.75C15.9289 21.75 14.25 20.0711 14.25 18Z" fill="#28a745"></path> <path d="M15.3267 13.4807C13.7841 14.3951 12.75 16.0768 12.75 18C12.75 19.0693 13.0697 20.0639 13.6187 20.8935C13.0991 20.9638 12.5572 21.001 12 21.001C8.13401 21.001 5 19.2101 5 17.001C5 14.7918 8.13401 13.001 12 13.001C13.2041 13.001 14.3372 13.1747 15.3267 13.4807Z" fill="#28a745"></path> </g></svg>
                                </span>
                                <span class="menu-title">Non-prospective-Client</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->


               

                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{  request()->is('conversation-log') || request()->is('conversation-log/create') ? 'active' : '' }}"
                        href="{{ route('conversation-logs') }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="conversation" class="icon glyph" fill="#28a745"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M18.82,8c-.8-3.46-4.3-6-8.32-6C5.81,2,2,5.36,2,9.5a6.82,6.82,0,0,0,1.06,3.63l-1,3.6a1,1,0,0,0,.3,1A1,1,0,0,0,3,18a1,1,0,0,0,.39-.08l3.66-1.56A9.6,9.6,0,0,0,10.5,17c4.69,0,8.5-3.36,8.5-7.5A6.27,6.27,0,0,0,18.82,8Z" style="fill:#28a745"></path><path d="M21,22a1,1,0,0,1-.39-.08L17,20.36A9.6,9.6,0,0,1,13.5,21a8.44,8.44,0,0,1-8-5.1A1,1,0,0,1,6,14.61a1,1,0,0,1,1.29.58A6.44,6.44,0,0,0,13.5,19a7.55,7.55,0,0,0,3.05-.64,1,1,0,0,1,.8,0l2.11.9-.57-2a1,1,0,0,1,.15-.86,4.83,4.83,0,0,0,1-2.87,5.31,5.31,0,0,0-2.68-4.44,1,1,0,0,1,1.06-1.7A7.28,7.28,0,0,1,22,13.5a6.82,6.82,0,0,1-1.06,3.63l1,3.6a1,1,0,0,1-.3,1A1,1,0,0,1,21,22Z" style="fill:#28a745"></path></g></svg>
                        </span>
                        <span class="menu-title">Conversation-Log</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.1 9.2214C18.29 9.2214 17.55 7.9414 18.45 6.3714C18.97 5.4614 18.66 4.3014 17.75 3.7814L16.02 2.7914C15.23 2.3214 14.21 2.6014 13.74 3.3914L13.63 3.5814C12.73 5.1514 11.25 5.1514 10.34 3.5814L10.23 3.3914C9.78 2.6014 8.76 2.3214 7.97 2.7914L6.24 3.7814C5.33 4.3014 5.02 5.4714 5.54 6.3814C6.45 7.9414 5.71 9.2214 3.9 9.2214C2.86 9.2214 2 10.0714 2 11.1214V12.8814C2 13.9214 2.85 14.7814 3.9 14.7814C5.71 14.7814 6.45 16.0614 5.54 17.6314C5.02 18.5414 5.33 19.7014 6.24 20.2214L7.97 21.2114C8.76 21.6814 9.78 21.4014 10.25 20.6114L10.36 20.4214C11.26 18.8514 12.74 18.8514 13.65 20.4214L13.76 20.6114C14.23 21.4014 15.25 21.6814 16.04 21.2114L17.77 20.2214C18.68 19.7014 18.99 18.5314 18.47 17.6314C17.56 16.0614 18.3 14.7814 20.11 14.7814C21.15 14.7814 22.01 13.9314 22.01 12.8814V11.1214C22 10.0814 21.15 9.2214 20.1 9.2214ZM12 15.2514C10.21 15.2514 8.75 13.7914 8.75 12.0014C8.75 10.2114 10.21 8.7514 12 8.7514C13.79 8.7514 15.25 10.2114 15.25 12.0014C15.25 13.7914 13.79 15.2514 12 15.2514Z" fill="#28a745"></path> </g></svg>
                        </span>
                        <span class="menu-title">Setting</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->

                     <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('user') ? 'active' : '' }}"
                                href="{{ route('user.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">User</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->


                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('role') || request()->is('role/create') || request()->is('role/edit/*') ? 'active' : '' }}"
                                href="{{ route('role.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->

                    <!--begin:Menu sub-->
                    {{-- <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('applications') ? 'active' : '' }}"
                                href="{{ route('applications.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Application</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div> --}}
                    <!--end:Menu sub-->
                   

                    <!--begin:Menu sub-->
                    {{-- <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('social-link') || request()->is('social-link/create') || request()->is('social-link/edit/*') ? 'active' : '' }}"
                                href="{{ route('social-links.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Social-Link</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div> --}}
                    <!--end:Menu sub-->

                </div>
                <!--end:Menu item-->


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
<!--end::Sidebar-->
