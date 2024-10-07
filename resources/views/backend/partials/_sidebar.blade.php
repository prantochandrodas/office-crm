<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            <img alt="Logo" src="{{ asset('image/' . generalSetting()->logo) }}"
                class="h-55px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('image/' . generalSetting()->logo) }}"
                class="h-20px app-sidebar-logo-minimize" />
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

                @can('dashboard')
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
                @endcan

                <!--begin:Menu item-->
                <div class="menu-item pt-5">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->

                @can('project')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                        class="menu-item here {{ request()->is('project') || request()->is('project/create') || request()->is('project/edit/*') || request()->is('service-category') || request()->is('service-category/create') || request()->is('service-category/edit/*') ? 'show' : '' }}   menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
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
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->

                        @can('service-category')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('service-category') || request()->is('service-category/create') || request()->is('service-category/edit/*') ? 'active' : '' }}"
                                        href="{{ route('service-categories') }}">
                                        <span class="menu-icon">
                                            <svg style="width: 24px; height:24px" version="1.0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 239.000000 211.000000"
                                                preserveAspectRatio="xMidYMid meet">

                                                <g transform="translate(0.000000,211.000000) scale(0.100000,-0.100000)"
                                                    fill="#28a745" stroke="none">
                                                    <path
                                                        d="M895 2103 c-98 -9 -125 -30 -125 -98 0 -39 -4 -46 -29 -59 -26 -14
                                                                                                                -31 -14 -52 3 -72 55 -108 47 -174 -41 -55 -73 -57 -99 -10 -142 33 -30 34
                                                                                                                -35 24 -64 -8 -24 -17 -32 -35 -32 -39 0 -91 -26 -99 -50 -4 -12 -4 -54 0 -93
                                                                                                                9 -92 29 -117 94 -117 40 0 48 -4 62 -28 16 -28 15 -30 -12 -67 -40 -53 -37
                                                                                                                -83 9 -126 97 -92 134 -101 186 -44 30 33 34 34 63 23 27 -10 31 -17 36 -57 9
                                                                                                                -76 60 -96 186 -72 55 11 71 31 71 92 0 42 3 48 29 59 27 11 33 9 64 -14 39
                                                                                                                -30 86 -34 115 -8 12 9 37 37 56 60 47 58 49 102 5 143 -26 24 -30 34 -24 56
                                                                                                                8 33 21 43 58 43 70 0 89 35 77 140 -7 64 -12 78 -36 98 -22 20 -34 23 -65 18
                                                                                                                -35 -6 -40 -4 -54 25 -16 29 -15 32 9 64 37 48 35 93 -6 131 -92 86 -139 96
                                                                                                                -189 43 -27 -29 -33 -31 -62 -23 -29 9 -33 14 -37 57 -9 72 -38 90 -135 80z
                                                                                                                m80 -108 c8 -62 9 -62 84 -88 l55 -19 39 41 c43 46 44 45 111 -12 l39 -34 -36
                                                                                                                -47 -36 -48 29 -58 30 -59 57 -3 58 -3 7 -60 c5 -33 4 -63 -1 -68 -5 -5 -30
                                                                                                                -12 -55 -14 -52 -6 -56 -10 -79 -73 -23 -63 -22 -68 20 -105 35 -30 37 -34 25
                                                                                                                -57 -7 -13 -27 -39 -43 -56 l-30 -33 -37 29 c-57 44 -58 45 -123 12 l-61 -31
                                                                                                                4 -50 c3 -29 1 -53 -6 -58 -6 -5 -38 -10 -71 -12 l-60 -4 -6 54 c-4 29 -11 56
                                                                                                                -16 60 -4 4 -34 15 -67 26 l-58 19 -34 -37 c-19 -20 -39 -37 -46 -37 -15 0
                                                                                                                -98 69 -98 82 0 5 14 27 30 48 17 21 30 42 30 47 0 4 -13 33 -28 63 l-29 55
                                                                                                                -53 0 c-47 0 -54 3 -62 25 -5 13 -8 45 -6 70 l3 45 47 5 c57 7 59 9 86 81 l20
                                                                                                                57 -39 38 c-21 21 -39 41 -39 45 0 9 70 93 81 97 5 2 27 -10 48 -27 21 -17 45
                                                                                                                -31 52 -31 8 0 37 11 64 25 50 26 50 26 55 83 5 56 6 57 40 63 19 4 49 7 67 8
                                                                                                                31 1 32 0 38 -54z" />
                                                    <path
                                                        d="M862 1785 c-63 -19 -111 -61 -138 -119 -41 -87 -29 -173 33 -246 89
                                                                                                                -104 237 -109 334 -11 74 73 89 166 43 259 -30 61 -74 98 -140 118 -57 17 -76
                                                                                                                17 -132 -1z m151 -70 c73 -35 111 -150 72 -224 -81 -158 -325 -103 -325 73 1
                                                                                                                136 127 211 253 151z" />
                                                    <path
                                                        d="M1765 1527 c-12 -10 -16 -22 -13 -41 4 -22 0 -29 -24 -42 -26 -14
                                                                                                                -31 -13 -57 6 -16 11 -32 20 -35 20 -12 0 -66 -66 -66 -82 0 -9 10 -24 22 -32
                                                                                                                18 -13 20 -20 12 -48 -8 -28 -15 -34 -44 -38 -33 -5 -35 -7 -38 -48 -4 -53 10
                                                                                                                -72 52 -72 24 0 34 -6 43 -26 11 -23 10 -31 -7 -54 -11 -16 -20 -31 -20 -34 0
                                                                                                                -11 66 -66 79 -66 8 0 25 9 37 21 18 17 28 19 51 12 22 -7 29 -17 33 -44 4
                                                                                                                -30 9 -34 39 -37 62 -6 81 4 81 43 0 28 6 37 28 49 25 13 30 12 52 -5 34 -25
                                                                                                                44 -24 74 12 31 37 33 60 6 84 -34 30 -4 85 46 85 27 0 33 14 26 60 -7 48 -21
                                                                                                                63 -52 56 -23 -4 -29 0 -43 29 -15 31 -15 34 4 51 28 25 23 48 -15 78 -43 32
                                                                                                                -51 32 -77 2 -18 -21 -24 -22 -50 -12 -19 7 -32 20 -35 36 -3 14 -7 31 -10 38
                                                                                                                -5 16 -75 16 -99 -1z m141 -202 c62 -47 63 -139 3 -189 -24 -20 -41 -26 -81
                                                                                                                -26 -45 0 -54 4 -84 36 -29 31 -34 42 -34 86 0 44 4 54 34 84 29 29 41 34 82
                                                                                                                34 35 0 56 -6 80 -25z" />
                                                    <path
                                                        d="M16 988 c-24 -34 -24 -752 0 -786 15 -22 20 -22 223 -22 148 0 210 3
                                                                                                                219 12 17 17 17 789 0 806 -9 9 -71 12 -219 12 -203 0 -208 0 -223 -22z m328
                                                                                                                -549 c13 -7 30 -25 37 -41 10 -25 9 -33 -8 -56 -25 -33 -76 -41 -104 -16 -29
                                                                                                                26 -25 78 7 103 31 24 35 25 68 10z" />
                                                    <path
                                                        d="M552 593 l3 -348 175 -76 c96 -42 204 -90 240 -107 97 -45 145 -56
                                                                                                                250 -55 122 0 163 14 422 146 320 163 682 390 720 452 28 47 33 90 13 140 -23
                                                                                                                61 -63 88 -138 93 -59 5 -64 3 -253 -89 l-192 -94 -22 -52 c-50 -118 -153
                                                                                                                -172 -348 -180 -108 -5 -124 -4 -142 12 -22 20 -25 41 -10 65 7 12 39 16 142
                                                                                                                20 120 5 139 8 191 34 97 47 121 117 62 176 -24 24 -32 25 -178 30 l-152 5
                                                                                                                -100 56 c-55 31 -131 69 -170 85 -69 29 -73 29 -293 32 l-222 3 2 -348z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Service-Category</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->is('project') || request()->is('project/create') || request()->is('project/edit/*') ? 'active' : '' }}"
                                    href="{{ route('projectes') }}">
                                    <span class="menu-icon">
                                        <svg fill="#28a745" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <path
                                                        d="M2,9H9V2H2ZM4,4H7V7H4Zm6,7,5,8,5-8Zm8-9H11V9h7ZM16,7H13V4h3ZM2,18H9V11H2Zm2-5H7v3H4Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="menu-title">Projects</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                    </div>
                    <!--end:Menu item-->
                @endcan

                @can('client')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                        class="menu-item here {{ request()->is('all-client') || request()->is('all-client/create') || request()->is('all-client/edit/*') || request()->is('primary-client') || request()->is('primary-client/create') || request()->is('primary-client/edit/*') || request()->is('contact-client') || request()->is('contact-client/create') || request()->is('contact-client/edit/*') || request()->is('non-prospective-client') || request()->is('non-prospective-client/create') || request()->is('non-prospective-client/edit/*') || request()->is('wanted-client') || request()->is('wanted-client/create') || request()->is('wanted-client/edit/*') || request()->is('our-client') || request()->is('our-client/create') || request()->is('our-client/edit/*') ? 'show' : '' }}   menu-accordion">
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
                                <a class="menu-link {{ request()->is('all-client') || request()->is('all-client/create') || request()->is('all-client/edit/*') ? 'active' : '' }}"
                                    href="{{ route('all-clients') }}">
                                    <span class="menu-icon">
                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
        
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#28a745"
                                            stroke="none">
                                            <path d="M1322 5061 c-79 -29 -131 -63 -189 -121 -153 -154 -174 -406 -49
                                            -580 l35 -49 -42 -21 c-161 -84 -284 -246 -322 -425 -17 -81 -21 -455 -5 -485
                                            20 -37 57 -40 576 -40 l504 0 0 -114 c0 -99 3 -117 21 -140 l20 -26 689 0 689
                                            0 20 26 c18 23 21 41 21 140 l0 114 504 0 c519 0 556 3 576 40 16 30 12 404
                                            -5 485 -38 178 -161 341 -321 424 l-42 22 38 57 c156 235 69 542 -188 670 -76
                                            37 -77 37 -201 37 -125 0 -127 0 -202 -37 -90 -44 -182 -136 -222 -220 -71
                                            -149 -57 -317 38 -458 l33 -50 -61 -32 c-76 -41 -180 -144 -227 -225 l-35 -60
                                            -32 15 -31 15 33 49 c56 81 78 151 79 253 1 112 -19 182 -77 267 -90 132 -229
                                            203 -392 202 -180 -2 -335 -97 -416 -256 -72 -142 -58 -330 36 -466 l33 -49
                                            -31 -15 -32 -15 -35 60 c-46 79 -153 185 -228 225 l-60 32 33 50 c94 140 108
                                            308 38 458 -39 84 -132 175 -221 220 -72 35 -81 37 -186 40 -90 2 -121 -1
                                            -164 -17z m261 -147 c64 -22 140 -92 174 -162 57 -116 28 -270 -67 -356 -73
                                            -66 -114 -81 -220 -81 -84 0 -101 3 -146 27 -60 32 -118 94 -147 157 -31 66
                                            -30 177 2 249 28 63 109 140 172 164 57 22 172 23 232 2z m2181 0 c64 -22 147
                                            -100 177 -166 35 -79 33 -184 -4 -260 -30 -62 -83 -115 -149 -150 -36 -19 -58
                                            -23 -138 -23 -106 0 -147 15 -220 81 -96 87 -124 239 -67 356 33 67 105 136
                                            168 160 57 22 172 23 233 2z m-1069 -298 c64 -29 117 -81 152 -149 23 -44 27
                                            -65 27 -132 1 -95 -24 -155 -89 -220 -66 -67 -125 -90 -225 -90 -101 0 -159
                                            23 -228 93 -64 63 -86 120 -86 217 0 67 4 88 27 132 82 159 262 222 422 149z
                                            m-1367 -436 c87 -27 201 -27 286 1 61 20 66 21 114 5 104 -35 206 -123 261
                                            -226 l32 -59 -47 -58 c-26 -31 -62 -88 -80 -126 -29 -61 -39 -95 -60 -204 l-4
                                            -23 -470 0 -470 0 0 148 c0 160 12 232 55 314 52 103 136 180 243 224 69 28
                                            63 28 140 4z m2182 0 c76 -27 197 -26 285 1 63 19 69 19 116 4 107 -36 218
                                            -134 268 -238 39 -81 51 -154 51 -309 l0 -148 -470 0 -470 0 -4 23 c-21 109
                                            -31 143 -60 204 -18 38 -54 95 -80 126 l-47 58 31 58 c52 98 138 176 237 217
                                            70 28 73 28 143 4z m-1060 -295 c71 -20 152 -19 225 2 33 9 78 17 100 17 98 0
                                            255 -123 313 -245 42 -90 52 -149 52 -309 l0 -140 -580 0 -580 0 0 140 c0 76
                                            5 163 11 192 25 120 103 236 201 300 108 71 140 76 258 43z" />
                                            <path d="M400 3250 c-165 -16 -263 -37 -283 -61 -16 -20 -17 -82 -17 -980 0
                                            -946 0 -959 20 -979 19 -19 33 -20 376 -20 215 0 363 4 374 10 10 5 26 31 36
                                            57 9 27 20 51 24 55 8 11 136 -52 212 -103 127 -85 224 -177 691 -657 370
                                            -379 488 -495 524 -512 39 -18 61 -21 124 -18 67 3 83 7 120 33 40 28 102 98
                                            111 125 3 9 20 7 63 -5 158 -46 327 42 372 195 l17 55 65 -3 c85 -5 164 23
                                            221 79 46 45 90 128 90 172 0 27 1 27 63 27 83 0 145 22 201 71 102 90 131
                                            235 70 356 l-29 61 51 16 c28 9 102 41 163 71 62 30 116 55 120 55 5 0 18 -27
                                            30 -60 12 -33 30 -64 41 -70 11 -6 154 -10 374 -10 343 0 357 1 376 20 20 20
                                            20 33 20 979 0 898 -1 960 -18 980 -20 26 -112 44 -308 61 -304 27 -666 -33
                                            -980 -162 -97 -39 -105 -56 -75 -151 13 -40 26 -78 29 -86 4 -11 -9 -13 -79
                                            -7 -114 10 -234 37 -424 96 -221 68 -276 80 -381 80 -165 0 -313 -53 -450
                                            -161 -72 -58 -80 -61 -177 -81 -79 -16 -142 -21 -277 -22 -177 -1 -250 8 -387
                                            49 l-51 15 31 95 c39 119 34 132 -67 173 -316 130 -695 191 -1006 162z m330
                                            -150 c147 -13 333 -51 468 -95 59 -19 112 -38 119 -43 9 -5 -65 -230 -264
                                            -805 l-276 -797 -263 0 -264 0 0 859 0 859 43 8 c126 22 288 27 437 14z m3957
                                            0 c61 -5 128 -12 147 -16 l36 -6 0 -859 0 -859 -264 0 -263 0 -276 797 c-199
                                            575 -273 800 -264 805 29 19 236 80 352 103 202 41 347 51 532 35z m-1769
                                            -245 c35 -8 138 -38 228 -66 209 -64 320 -87 464 -95 l115 -7 203 -586 c111
                                            -322 202 -591 202 -597 0 -11 -211 -115 -288 -141 -53 -19 -132 -13 -187 12
                                            -26 13 -195 173 -498 474 -360 359 -464 457 -486 459 -61 7 -260 -193 -296
                                            -298 -9 -25 -20 -85 -26 -134 -12 -111 -41 -179 -107 -245 -27 -27 -81 -65
                                            -119 -84 -62 -32 -94 -43 -175 -61 l-28 -6 0 370 c0 351 1 372 20 413 15 31
                                            83 102 237 248 230 217 290 267 366 305 102 52 253 68 375 39z m-1401 -211
                                            c142 -36 252 -47 407 -41 l139 5 -111 -104 c-90 -85 -118 -118 -144 -172 l-33
                                            -67 -3 -447 -3 -447 22 -22 c20 -20 29 -21 113 -16 335 21 596 260 596 546 0
                                            64 36 133 105 201 l55 54 432 -431 c310 -308 446 -437 480 -454 60 -30 163
                                            -145 179 -199 11 -35 10 -47 -7 -88 -26 -62 -70 -92 -138 -92 -32 0 -60 7 -76
                                            18 -14 9 -137 131 -274 270 -227 229 -253 252 -283 252 -42 0 -73 -30 -73 -70
                                            0 -27 32 -64 231 -268 127 -130 237 -250 246 -266 21 -40 19 -113 -5 -145 -45
                                            -62 -120 -86 -185 -62 -14 5 -148 134 -299 287 -262 264 -276 277 -304 270
                                            -43 -11 -64 -35 -64 -73 0 -31 22 -57 232 -273 127 -131 237 -249 244 -262 7
                                            -13 13 -44 14 -69 0 -109 -117 -182 -212 -133 -16 9 -158 146 -315 305 -313
                                            316 -315 318 -370 263 -46 -46 -35 -63 214 -320 126 -128 234 -248 241 -265
                                            28 -68 -26 -139 -106 -139 -53 0 1 -50 -598 564 -214 219 -427 433 -474 473
                                            -103 91 -207 161 -320 215 -47 23 -86 42 -88 43 -1 1 90 269 203 595 113 325
                                            205 594 205 597 0 3 8 2 18 -2 9 -4 58 -18 109 -31z" />
                                        </g>
                                    </svg>
                                    </span>
                                    <span class="menu-title">All-clients</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end:Menu sub-->

                        @can('primary-client')
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
                                                    <path
                                                        d="M1585 2497 c-187 -48 -326 -227 -325 -420 0 -70 27 -174 66 -255 28
                                                                                                                           -58 56 -96 113 -153 95 -95 159 -124 262 -116 90 6 149 36 230 116 107 107
                                                                                                                           173 266 173 416 -1 226 -174 408 -399 421 -38 2 -92 -2 -120 -9z" />
                                                    <path
                                                        d="M1410 1454 c-105 -28 -180 -72 -266 -158 -75 -76 -144 -182 -144
                                                                                                                           -223 0 -29 57 -36 310 -42 233 -6 259 -8 302 -28 66 -30 145 -107 179 -175
                                                                                                                           l29 -57 112 40 c277 101 366 129 404 129 l41 0 -9 51 c-39 215 -220 408 -434
                                                                                                                           463 -84 22 -443 22 -524 0z" />
                                                    <path
                                                        d="M59 1251 l-29 -29 0 -554 c0 -605 -2 -582 58 -607 20 -9 93 -11 241
                                                                                                                           -9 l213 3 29 33 29 32 0 540 c0 397 -3 546 -12 565 -23 50 -48 55 -283 55
                                                                                                                           l-217 0 -29 -29z" />
                                                    <path
                                                        d="M700 626 l0 -456 28 -7 c15 -5 250 -8 522 -8 435 0 503 2 560 17 59
                                                                                                                           16 490 226 616 300 70 41 104 96 104 165 0 115 -79 195 -193 194 -78 0 -466
                                                                                                                           -144 -556 -206 -85 -58 -170 -85 -293 -92 -93 -6 -97 -5 -121 19 -30 30 -27
                                                                                                                           65 7 77 11 5 59 9 106 9 136 1 230 42 230 99 0 35 -34 97 -71 127 -71 60 -74
                                                                                                                           60 -349 66 l-256 5 -59 31 c-171 89 -203 103 -237 109 l-38 7 0 -456z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Primary-client</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

                        @can('contact-client')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('contact-client') || request()->is('contact-client/create') || request()->is('contact-client/edit/*') ? 'active' : '' }}"
                                        href="{{ route('contact-clients') }}">
                                        <span style="height: 24px" class="menu-icon">
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px"
                                                height="50px" viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">

                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#28a745" stroke="none">
                                                    <path d="M815 5096 c-266 -86 -522 -332 -675 -651 -102 -211 -133 -336 -134
                                        -540 -1 -222 23 -286 211 -577 792 -1225 1954 -2379 3163 -3140 169 -106 219
                                        -132 312 -158 415 -117 1015 146 1295 566 169 255 174 465 15 644 -48 54 -101
                                        86 -527 316 -572 309 -585 314 -769 314 -122 0 -213 -28 -355 -110 -207 -118
                                        -383 -119 -555 -2 -182 124 -954 898 -1057 1060 -68 107 -88 268 -50 391 10
                                        34 45 106 76 161 84 147 99 200 99 345 -1 190 2 183 -392 909 -122 226 -169
                                        303 -214 351 -121 131 -279 174 -443 121z m200 -235 c74 -33 86 -52 436 -702
                                        162 -302 172 -329 173 -445 1 -99 9 -77 -112 -309 -63 -120 -85 -221 -80 -364
                                        8 -215 62 -323 295 -581 253 -281 725 -741 899 -876 192 -149 444 -191 679
                                        -112 33 11 114 49 179 86 117 65 120 66 206 70 61 3 103 0 141 -12 47 -13 843
                                        -434 950 -502 90 -56 118 -149 76 -253 -43 -105 -88 -172 -187 -271 -274 -275
                                        -671 -411 -937 -321 -154 52 -760 469 -1169 805 -821 673 -1529 1454 -2107
                                        2326 -185 278 -217 353 -217 505 0 366 311 843 622 955 67 24 102 24 153 1z" />
                                                    <path d="M3445 5099 c-127 -16 -244 -77 -335 -175 -69 -75 -105 -141 -130
                                        -240 -25 -98 -25 -170 0 -268 27 -107 63 -169 145 -252 110 -112 238 -166 388
                                        -166 105 0 164 14 256 59 180 89 301 287 301 493 0 333 -292 590 -625 549z
                                        m212 -270 c223 -107 232 -434 14 -552 -164 -90 -365 -22 -443 148 -32 70 -32
                                        180 0 250 42 92 127 161 222 181 74 16 133 8 207 -27z" />
                                                    <path d="M3175 3880 c-86 -11 -213 -55 -292 -101 -77 -45 -219 -189 -266 -269
                                        -21 -36 -50 -101 -65 -145 -26 -80 -27 -81 -30 -425 -3 -376 -3 -382 55 -450
                                        15 -18 50 -43 78 -56 l50 -24 813 0 c667 0 819 2 846 14 46 19 104 72 129 120
                                        21 40 22 51 22 371 0 376 -3 395 -80 550 -75 152 -178 258 -327 335 -144 75
                                        -190 82 -548 86 -173 1 -347 -1 -385 -6z m653 -240 c212 -28 379 -176 432
                                        -386 17 -67 20 -111 20 -341 l0 -263 -760 0 -760 0 0 283 c0 231 3 293 16 338
                                        59 199 227 343 434 369 83 11 535 11 618 0z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Contact-Client</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan


                        @can('wanted-client')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('wanted-client') || request()->is('wanted-client/create') || request()->is('wanted-client/edit/*') ? 'active' : '' }}"
                                        href="{{ route('wanted-clients') }}">
                                        <span style="height: 24px" class="menu-icon">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <circle cx="12" cy="6" r="4" fill="#28a745"></circle>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM18.468 17.7458C18.6958 17.518 18.6958 17.1487 18.468 16.9209C18.2402 16.693 17.8709 16.693 17.6431 16.9209L15.7222 18.8417L15.3569 18.4764C15.1291 18.2486 14.7598 18.2486 14.532 18.4764C14.3042 18.7042 14.3042 19.0736 14.532 19.3014L15.3097 20.0791C15.5375 20.307 15.9069 20.307 16.1347 20.0791L18.468 17.7458Z"
                                                        fill="#28a745"></path>
                                                    <path
                                                        d="M15.4147 13.5074C14.4046 13.1842 13.24 13 12 13C8.13401 13 5 14.7909 5 17C5 19.1406 7.94244 20.8884 11.6421 20.9949C11.615 20.8686 11.594 20.7432 11.5775 20.6201C11.4998 20.0424 11.4999 19.3365 11.5 18.586V18.414C11.4999 17.6635 11.4998 16.9576 11.5775 16.3799C11.6639 15.737 11.8705 15.0333 12.4519 14.4519C13.0334 13.8705 13.737 13.6639 14.3799 13.5774C14.6919 13.5355 15.0412 13.5162 15.4147 13.5074Z"
                                                        fill="#28a745"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Wanted-Client</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

                        @can('our-client')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('our-client') || request()->is('our-client/create') || request()->is('our-client/edit/*') ? 'active' : '' }}"
                                        href="{{ route('our-clients') }}">
                                        <span style="height:24px;" class="menu-icon">

                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px"
                                                height="24px" viewBox="0 0 512.000000 512.000000"
                                                preserveAspectRatio="xMidYMid meet">

                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                    fill="#28a745" stroke="none">
                                                    <path d="M1055 5069 c-166 -34 -332 -165 -405 -321 -88 -188 -77 -384 32 -558
                                                            23 -38 35 -66 29 -68 -26 -9 -117 -84 -152 -127 -21 -25 -50 -70 -64 -99 -51
                                                            -103 -55 -138 -55 -456 0 -289 1 -296 24 -345 25 -54 70 -98 126 -124 31 -14
                                                            102 -16 580 -16 544 0 545 0 590 22 l46 23 44 -23 c45 -22 46 -22 590 -22 540
                                                            0 545 0 588 22 l43 22 47 -22 c46 -21 59 -22 527 -25 264 -2 512 -1 552 3 94
                                                            9 164 49 208 119 l30 49 3 299 c3 327 -1 364 -55 476 -32 64 -126 170 -181
                                                            203 -21 13 -38 24 -40 25 -2 1 15 33 38 71 142 235 109 513 -84 708 -148 150
                                                            -349 207 -551 155 -205 -53 -367 -214 -420 -420 -13 -49 -16 -91 -12 -170 5
                                                            -117 26 -187 83 -278 19 -29 34 -56 34 -60 0 -4 -23 -22 -51 -41 -28 -19 -68
                                                            -54 -89 -78 l-39 -44 -23 31 c-22 30 -124 114 -149 122 -7 2 2 25 25 60 111
                                                            166 124 389 34 574 -45 95 -167 218 -260 262 -226 110 -491 66 -667 -109 -103
                                                            -103 -159 -226 -168 -374 -8 -133 23 -253 94 -357 19 -30 30 -54 24 -56 -26
                                                            -9 -130 -93 -151 -122 l-23 -32 -38 45 c-21 25 -64 61 -94 82 l-55 36 24 32
                                                            c39 52 75 132 92 204 21 90 14 235 -16 320 -59 168 -205 313 -369 364 -77 24
                                                            -223 33 -296 18z m209 -204 c113 -30 204 -106 254 -213 23 -49 27 -71 27 -152
                                                            0 -82 -4 -103 -27 -152 -83 -177 -274 -265 -454 -210 -222 69 -332 311 -235
                                                            518 38 80 87 134 159 172 99 53 176 63 276 37z m1254 5 c197 -46 330 -240 294
                                                            -431 -23 -126 -99 -227 -210 -281 -61 -30 -75 -33 -162 -33 -82 0 -103 4 -152
                                                            27 -80 37 -152 107 -191 187 -29 60 -32 73 -31 161 0 80 4 104 26 151 75 164
                                                            257 257 426 219z m1347 -29 c155 -72 244 -240 215 -403 -66 -364 -541 -433
                                                            -714 -103 -29 56 -31 67 -31 160 0 87 3 107 27 157 91 195 313 279 503 189z
                                                            m-2891 -887 c129 -48 285 -44 427 11 45 18 45 18 106 -9 74 -34 134 -93 168
                                                            -167 l25 -56 -2 -284 -3 -284 -514 -3 c-383 -2 -517 1 -528 10 -12 9 -14 59
                                                            -11 292 3 315 6 330 83 414 32 36 141 102 168 102 5 0 42 -12 81 -26z m1281
                                                            -5 c50 -19 79 -23 180 -24 107 0 129 3 201 29 l82 29 54 -26 c75 -34 132 -87
                                                            165 -155 l28 -57 3 -281 c3 -233 1 -283 -11 -292 -11 -9 -145 -12 -528 -10
                                                            l-514 3 0 295 0 295 27 50 c34 65 90 118 158 150 60 28 67 28 155 -6z m1270
                                                            -1 c51 -19 78 -22 185 -22 112 0 132 3 194 27 59 23 74 26 106 17 95 -25 184
                                                            -118 215 -223 20 -66 22 -556 3 -575 -9 -9 -139 -12 -525 -12 -508 0 -512 0
                                                            -523 21 -8 14 -10 103 -8 282 5 314 9 329 102 423 62 61 130 97 171 89 11 -2
                                                            47 -14 80 -27z" />
                                                    <path d="M4553 2821 c-74 -27 -124 -65 -243 -186 -58 -59 -189 -188 -292 -287
                                                            l-188 -180 -50 56 c-31 33 -74 66 -108 83 l-57 28 -535 6 c-568 8 -599 10
                                                            -820 63 -151 37 -280 49 -397 37 -294 -30 -563 -179 -770 -426 -42 -49 -80
                                                            -91 -84 -93 -4 -2 -43 30 -86 72 -84 80 -117 95 -162 76 -31 -12 -737 -740
                                                            -753 -776 -28 -61 -32 -57 568 -629 311 -297 588 -559 616 -582 66 -57 102
                                                            -58 159 -6 23 21 192 192 375 380 l334 342 0 45 c0 39 -5 51 -40 87 -22 23
                                                            -39 43 -38 44 2 1 50 8 108 15 73 9 343 15 895 20 716 6 796 8 855 24 91 25
                                                            216 86 275 133 53 42 912 1046 951 1110 122 206 20 453 -224 539 -86 30 -212
                                                            32 -289 5z m219 -193 c56 -16 125 -81 139 -129 23 -75 17 -83 -417 -595 -224
                                                            -264 -432 -505 -463 -537 -60 -63 -132 -105 -227 -133 -53 -16 -135 -18 -839
                                                            -24 -734 -5 -792 -7 -978 -29 l-198 -24 -77 74 c-42 41 -185 178 -316 306
                                                            l-239 232 29 42 c48 69 159 183 236 242 244 186 492 232 808 152 212 -54 259
                                                            -57 820 -64 524 -6 525 -6 557 -29 51 -36 76 -100 71 -181 -4 -83 -33 -131
                                                            -94 -161 -38 -19 -62 -20 -417 -20 -214 0 -386 -4 -401 -10 -34 -13 -58 -52
                                                            -58 -97 0 -29 7 -43 31 -65 l31 -28 398 0 c440 0 458 2 548 63 87 58 164 191
                                                            164 282 0 27 40 71 343 372 208 208 356 348 377 357 42 18 119 20 172 4z
                                                            m-3458 -1292 l505 -490 -26 -30 c-14 -17 -137 -144 -273 -283 l-247 -253 -509
                                                            484 c-279 267 -510 488 -511 493 -4 11 537 575 548 571 4 -2 235 -223 513
                                                            -492z" />
                                                    <path d="M2338 1735 c-31 -17 -52 -71 -42 -109 3 -14 20 -37 36 -51 66 -55
                                                            158 -12 158 75 0 80 -79 124 -152 85z" />
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
                        @endcan

                        @can('non-prospective-client')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('non-prospective-client') || request()->is('non-prospective-client/create') || request()->is('non-prospective-client/edit/*') ? 'active' : '' }}"
                                        href="{{ route('non-prospective-clients') }}">
                                        <span style="height: 24px" class="menu-icon">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <circle cx="12" cy="6" r="4" fill="#28a745"></circle>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M18 15.75C16.7574 15.75 15.75 16.7574 15.75 18C15.75 18.3473 15.8287 18.6763 15.9693 18.97L18.9701 15.9693C18.6763 15.8287 18.3474 15.75 18 15.75ZM20.0307 17.0299L17.0299 20.0307C17.3236 20.1713 17.6526 20.25 18 20.25C19.2426 20.25 20.25 19.2426 20.25 18C20.25 17.6526 20.1713 17.3237 20.0307 17.0299ZM14.25 18C14.25 15.9289 15.9289 14.25 18 14.25C20.0711 14.25 21.75 15.9289 21.75 18C21.75 20.0711 20.0711 21.75 18 21.75C15.9289 21.75 14.25 20.0711 14.25 18Z"
                                                        fill="#28a745"></path>
                                                    <path
                                                        d="M15.3267 13.4807C13.7841 14.3951 12.75 16.0768 12.75 18C12.75 19.0693 13.0697 20.0639 13.6187 20.8935C13.0991 20.9638 12.5572 21.001 12 21.001C8.13401 21.001 5 19.2101 5 17.001C5 14.7918 8.13401 13.001 12 13.001C13.2041 13.001 14.3372 13.1747 15.3267 13.4807Z"
                                                        fill="#28a745"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Non-prospective-Client</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

                    </div>
                    <!--end:Menu item-->
                @endcan

                @can('conversation')
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->is('conversation-log') || request()->is('conversation-log/create') ? 'active' : '' }}"
                            href="{{ route('conversation-logs') }}">
                            <span class="menu-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="conversation"
                                    class="icon glyph" fill="#28a745">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M18.82,8c-.8-3.46-4.3-6-8.32-6C5.81,2,2,5.36,2,9.5a6.82,6.82,0,0,0,1.06,3.63l-1,3.6a1,1,0,0,0,.3,1A1,1,0,0,0,3,18a1,1,0,0,0,.39-.08l3.66-1.56A9.6,9.6,0,0,0,10.5,17c4.69,0,8.5-3.36,8.5-7.5A6.27,6.27,0,0,0,18.82,8Z"
                                            style="fill:#28a745"></path>
                                        <path
                                            d="M21,22a1,1,0,0,1-.39-.08L17,20.36A9.6,9.6,0,0,1,13.5,21a8.44,8.44,0,0,1-8-5.1A1,1,0,0,1,6,14.61a1,1,0,0,1,1.29.58A6.44,6.44,0,0,0,13.5,19a7.55,7.55,0,0,0,3.05-.64,1,1,0,0,1,.8,0l2.11.9-.57-2a1,1,0,0,1,.15-.86,4.83,4.83,0,0,0,1-2.87,5.31,5.31,0,0,0-2.68-4.44,1,1,0,0,1,1.06-1.7A7.28,7.28,0,0,1,22,13.5a6.82,6.82,0,0,1-1.06,3.63l1,3.6a1,1,0,0,1-.3,1A1,1,0,0,1,21,22Z"
                                            style="fill:#28a745"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-title">Conversation-Log</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endcan

                @can('send-email')
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->is('send-mail') ? 'active' : '' }}"
                            href="{{ route('send-mail') }}">
                            <span class="menu-icon">
                                <svg style="width: 20px; height:20px; margin-right:5px" viewBox="0 -2.5 20 20"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>email [#ffffff1572]</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)"
                                                fill="#28a745">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path
                                                        d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z"
                                                        id="email-[#ffffff1572]"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-title">Sent-Mail</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                @endcan

                @can('send-sms')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->is('send-sms') ? 'active' : '' }}"
                            href="{{ route('send.sms') }}">
                            <span class="menu-icon">
                                <svg fill="#28a745" style="width: 20px; height20px;" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"
                                    stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M256,0C114.6,0,0,85.9,0,192c0,75,57.5,139.8,141.1,171.4L85.3,512l160.5-128.4c3.4,0.1,6.7,0.4,10.2,0.4 c141.4,0,256-85.9,256-192C512,85.9,397.4,0,256,0z M128,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S151.5,234.7,128,234.7z M256,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S279.5,234.7,256,234.7z M384,234.7c-23.5,0-42.7-19.1-42.7-42.7s19.1-42.7,42.7-42.7 c23.5,0,42.7,19.1,42.7,42.7S407.5,234.7,384,234.7z">
                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-title">Send-Sms</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan

                @can('division')
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
                @endcan

                {{-- @can('division') --}}
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('district') || request()->is('district/create') || request()->is('district/edit/*') ? 'active' : '' }}"
                        href="{{ route('districts') }}">
                        <span class="menu-icon">
                            <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#28a745">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill="#28a745"
                                        d="M800 416a288 288 0 1 0-576 0c0 118.144 94.528 272.128 288 456.576C705.472 688.128 800 534.144 800 416zM512 960C277.312 746.688 160 565.312 160 416a352 352 0 0 1 704 0c0 149.312-117.312 330.688-352 544z">
                                    </path>
                                    <path fill="#28a745"
                                        d="M512 448a64 64 0 1 0 0-128 64 64 0 0 0 0 128zm0 64a128 128 0 1 1 0-256 128 128 0 0 1 0 256zm345.6 192L960 960H672v-64H352v64H64l102.4-256h691.2zm-68.928 0H235.328l-76.8 192h706.944l-76.8-192z">
                                    </path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">District</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                {{-- @endcan --}}

                @can('location')
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
                @endcan

                @can('setting')
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="click"
                        class="menu-item {{ request()->is('user') || request()->is('user/create') || request()->is('user/edit/*') || request()->is('role') || request()->is('role/create') || request()->is('role/edit/*') || request()->is('application') ? 'show' : '' }} here menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M20.1 9.2214C18.29 9.2214 17.55 7.9414 18.45 6.3714C18.97 5.4614 18.66 4.3014 17.75 3.7814L16.02 2.7914C15.23 2.3214 14.21 2.6014 13.74 3.3914L13.63 3.5814C12.73 5.1514 11.25 5.1514 10.34 3.5814L10.23 3.3914C9.78 2.6014 8.76 2.3214 7.97 2.7914L6.24 3.7814C5.33 4.3014 5.02 5.4714 5.54 6.3814C6.45 7.9414 5.71 9.2214 3.9 9.2214C2.86 9.2214 2 10.0714 2 11.1214V12.8814C2 13.9214 2.85 14.7814 3.9 14.7814C5.71 14.7814 6.45 16.0614 5.54 17.6314C5.02 18.5414 5.33 19.7014 6.24 20.2214L7.97 21.2114C8.76 21.6814 9.78 21.4014 10.25 20.6114L10.36 20.4214C11.26 18.8514 12.74 18.8514 13.65 20.4214L13.76 20.6114C14.23 21.4014 15.25 21.6814 16.04 21.2114L17.77 20.2214C18.68 19.7014 18.99 18.5314 18.47 17.6314C17.56 16.0614 18.3 14.7814 20.11 14.7814C21.15 14.7814 22.01 13.9314 22.01 12.8814V11.1214C22 10.0814 21.15 9.2214 20.1 9.2214ZM12 15.2514C10.21 15.2514 8.75 13.7914 8.75 12.0014C8.75 10.2114 10.21 8.7514 12 8.7514C13.79 8.7514 15.25 10.2114 15.25 12.0014C15.25 13.7914 13.79 15.2514 12 15.2514Z"
                                            fill="#28a745"></path>
                                    </g>
                                </svg>
                            </span>
                            <span class="menu-title">Setting</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->

                        <!--begin:Menu sub-->
                        @can('user')
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('user') || request()->is('user/create') || request()->is('user/edit/*') ? 'active' : '' }}"
                                        href="{{ route('user.index') }}">
                                        <span class="menu-icon">
                                            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                stroke="#28a745">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"
                                                        fill="#28a745"></path>
                                                    <path
                                                        d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"
                                                        fill="#28a745"></path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">User</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

                        @can('role')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('role') || request()->is('role/create') || request()->is('role/edit/*') ? 'active' : '' }}"
                                        href="{{ route('role.index') }}">
                                        <span class="menu-icon">
                                            <svg fill="#28a745" viewBox="0 0 52 52" data-name="Layer 1"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M38.3,27.2A11.4,11.4,0,1,0,49.7,38.6,11.46,11.46,0,0,0,38.3,27.2Zm2,12.4a2.39,2.39,0,0,1-.9-.2l-4.3,4.3a1.39,1.39,0,0,1-.9.4,1,1,0,0,1-.9-.4,1.39,1.39,0,0,1,0-1.9l4.3-4.3a2.92,2.92,0,0,1-.2-.9,3.47,3.47,0,0,1,3.4-3.8,2.39,2.39,0,0,1,.9.2c.2,0,.2.2.1.3l-2,1.9a.28.28,0,0,0,0,.5L41.1,37a.38.38,0,0,0,.6,0l1.9-1.9c.1-.1.4-.1.4.1a3.71,3.71,0,0,1,.2.9A3.57,3.57,0,0,1,40.3,39.6Z">
                                                    </path>
                                                    <circle cx="21.7" cy="14.9" r="12.9"></circle>
                                                    <path
                                                        d="M25.2,49.8c2.2,0,1-1.5,1-1.5h0a15.44,15.44,0,0,1-3.4-9.7,15,15,0,0,1,1.4-6.4.77.77,0,0,1,.2-.3c.7-1.4-.7-1.5-.7-1.5h0a12.1,12.1,0,0,0-1.9-.1A19.69,19.69,0,0,0,2.4,47.1c0,1,.3,2.8,3.4,2.8H24.9C25.1,49.8,25.1,49.8,25.2,49.8Z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Roles</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan


                        @can('application')
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->is('application') ? 'active' : '' }}"
                                        href="{{ route('applications.index') }}">
                                        <span class="menu-icon">
                                            <svg style="width: 24px; height:24px" version="1.0"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 528.000000 484.000000"
                                                preserveAspectRatio="xMidYMid meet">

                                                <g transform="translate(0.000000,484.000000) scale(0.100000,-0.100000)"
                                                    fill="#28a745" stroke="none">
                                                    <path
                                                        d="M36 4782 c-15 -17 -16 -55 -14 -393 l3 -374 2554 -3 c1880 -1 2557 1
                                                                                                                                        2567 9 11 9 14 81 14 373 0 311 -2 365 -16 384 l-15 22 -2538 0 c-2453 0
                                                                                                                                        -2538 -1 -2555 -18z m524 -277 c42 -21 60 -53 60 -103 0 -37 -6 -50 -34 -78
                                                                                                                                        -28 -28 -42 -34 -75 -34 -49 0 -86 22 -107 61 -52 101 54 207 156 154z m561
                                                                                                                                        -2 c29 -17 59 -67 59 -97 0 -35 -30 -85 -59 -100 -92 -48 -197 30 -170 127 20
                                                                                                                                        75 104 109 170 70z" />
                                                    <path
                                                        d="M27 3773 c-12 -11 -8 -2642 3 -2664 10 -19 30 -19 835 -19 l824 0 12
                                                                                                                                        42 c17 66 44 111 88 151 38 34 41 40 35 76 -8 49 18 141 56 195 15 23 71 83
                                                                                                                                        123 133 111 110 160 136 261 139 65 3 71 5 110 42 23 22 61 51 86 63 42 23 56
                                                                                                                                        24 220 24 96 0 190 -4 207 -8 l33 -9 -14 34 c-34 83 -27 196 17 283 11 22 85
                                                                                                                                        107 166 188 115 117 159 154 208 179 80 39 166 47 247 24 32 -10 59 -16 61
                                                                                                                                        -14 1 2 10 20 20 41 26 56 98 125 163 155 57 27 58 27 297 27 238 0 241 0 295
                                                                                                                                        -26 74 -34 125 -81 162 -146 16 -29 31 -53 31 -53 1 0 24 7 51 15 63 19 129
                                                                                                                                        19 196 -1 76 -22 91 -34 223 -163 l117 -116 0 696 c0 527 -3 698 -12 707 -9 9
                                                                                                                                        -592 12 -2563 12 -1404 0 -2555 -3 -2558 -7z m1981 -535 c16 -16 16 -190 0
                                                                                                                                        -206 -9 -9 -205 -12 -819 -12 -444 0 -814 3 -823 6 -13 5 -16 24 -16 108 0 57
                                                                                                                                        3 106 7 109 3 4 374 7 823 7 621 0 819 -3 828 -12z m1 -502 c8 -9 11 -47 9
                                                                                                                                        -107 l-3 -94 -832 -3 -833 -2 0 103 c0 57 3 107 7 110 3 4 374 7 823 7 688 0
                                                                                                                                        819 -2 829 -14z m-764 -616 l0 -105 -447 -3 -448 -2 0 110 0 110 448 -2 447
                                                                                                                                        -3 0 -105z" />
                                                    <path
                                                        d="M3885 2626 c-56 -25 -68 -48 -75 -149 -7 -99 -16 -126 -52 -149 -65
                                                                                                                                        -43 -125 -29 -197 46 -49 50 -96 71 -139 61 -19 -4 -77 -54 -170 -149 -140
                                                                                                                                        -140 -142 -143 -142 -187 0 -50 13 -73 79 -142 43 -45 46 -51 45 -102 0 -49 2
                                                                                                                                        -55 26 -65 15 -6 69 -53 120 -105 52 -52 101 -95 110 -95 10 0 24 23 38 65 63
                                                                                                                                        175 210 314 396 373 80 26 263 22 346 -7 143 -50 268 -156 334 -281 49 -92 65
                                                                                                                                        -149 73 -246 21 -280 -179 -549 -457 -615 -30 -7 -95 -13 -145 -12 -112 1
                                                                                                                                        -220 34 -317 99 l-68 44 0 -103 c0 -121 -15 -176 -66 -235 -20 -23 -34 -51
                                                                                                                                        -34 -66 0 -31 -2 -30 39 -10 22 11 47 15 73 11 74 -10 108 -64 108 -172 0 -77
                                                                                                                                        18 -118 61 -140 25 -14 64 -16 230 -13 l201 3 29 33 c26 29 29 39 30 105 0 39
                                                                                                                                        5 88 12 107 16 45 68 80 119 80 33 0 47 -8 91 -48 75 -70 96 -82 146 -82 43 0
                                                                                                                                        47 3 179 132 74 73 141 148 149 167 21 50 8 86 -57 157 -67 71 -80 110 -56
                                                                                                                                        167 23 56 66 77 157 77 63 0 82 4 110 23 53 35 61 74 57 272 -2 143 -6 175
                                                                                                                                        -21 198 -30 45 -62 60 -145 64 -91 5 -135 24 -156 68 -30 63 -21 90 59 177 54
                                                                                                                                        58 67 92 58 143 -8 37 -238 275 -290 300 -55 26 -95 13 -167 -55 -74 -68 -110
                                                                                                                                        -80 -163 -53 -60 29 -75 59 -82 161 -7 99 -20 124 -78 148 -45 19 -355 19
                                                                                                                                        -398 0z" />
                                                    <path
                                                        d="M2548 1724 c-30 -16 -35 -29 -41 -113 -3 -41 -10 -59 -27 -73 -35
                                                                                                                                        -28 -81 -23 -116 13 -39 41 -80 62 -107 54 -12 -4 -64 -48 -114 -98 -113 -111
                                                                                                                                        -118 -133 -53 -203 80 -87 41 -164 -85 -164 -75 0 -90 -27 -94 -171 -3 -104
                                                                                                                                        10 -161 41 -177 13 -6 50 -13 82 -15 69 -5 96 -28 96 -83 0 -26 -10 -45 -40
                                                                                                                                        -78 -65 -70 -60 -92 53 -204 84 -83 96 -92 130 -92 30 0 46 8 81 40 52 48 94
                                                                                                                                        53 131 15 21 -20 25 -34 25 -83 0 -100 31 -116 213 -110 129 4 147 15 147 89
                                                                                                                                        0 128 76 170 164 89 69 -63 95 -58 196 38 126 118 132 144 60 227 -74 86 -39
                                                                                                                                        155 80 155 41 0 56 5 75 25 24 23 25 29 25 153 0 165 -7 178 -106 184 -58 4
                                                                                                                                        -70 8 -90 32 -33 38 -31 78 7 113 42 39 62 80 54 111 -7 30 -147 177 -188 198
                                                                                                                                        -36 19 -62 11 -114 -37 -83 -76 -151 -43 -160 76 -8 97 -22 105 -177 105 -87
                                                                                                                                        -1 -129 -5 -148 -16z m307 -409 c76 -37 158 -118 193 -192 24 -52 27 -70 27
                                                                                                                                        -163 0 -94 -3 -111 -28 -161 -43 -88 -98 -143 -185 -186 -72 -36 -81 -38 -172
                                                                                                                                        -38 -88 0 -101 3 -162 33 -245 120 -302 438 -113 627 81 81 173 116 295 112
                                                                                                                                        69 -3 96 -9 145 -32z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="menu-title">Application</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        @endcan

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
                @endcan

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>
<!--end::Sidebar-->
