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

                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('projectes') }}"
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
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('primary-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #17a2b8;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($clients) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">All Clients</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
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
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('primary-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #dc3545;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($primaryClient) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Primary Clients</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg  version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px"
                                height="50px" viewBox="0 0 256.000000 256.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                    stroke="none">
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
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('contact-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #007bff;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($contactClients) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Contact Clients</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                    stroke="none">
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
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('wanted-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #137c65;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($wantedClient) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Wanted Client</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg style="width: 50px; height:50px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="12" cy="6" r="4" fill="#ffffff"></circle>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.5 22C14.8501 22 14.0251 22 13.5126 21.4874C13 20.9749 13 20.1499 13 18.5C13 16.8501 13 16.0251 13.5126 15.5126C14.0251 15 14.8501 15 16.5 15C18.1499 15 18.9749 15 19.4874 15.5126C20 16.0251 20 16.8501 20 18.5C20 20.1499 20 20.9749 19.4874 21.4874C18.9749 22 18.1499 22 16.5 22ZM18.468 17.7458C18.6958 17.518 18.6958 17.1487 18.468 16.9209C18.2402 16.693 17.8709 16.693 17.6431 16.9209L15.7222 18.8417L15.3569 18.4764C15.1291 18.2486 14.7598 18.2486 14.532 18.4764C14.3042 18.7042 14.3042 19.0736 14.532 19.3014L15.3097 20.0791C15.5375 20.307 15.9069 20.307 16.1347 20.0791L18.468 17.7458Z"
                                        fill="#ffffff"></path>
                                    <path
                                        d="M15.4147 13.5074C14.4046 13.1842 13.24 13 12 13C8.13401 13 5 14.7909 5 17C5 19.1406 7.94244 20.8884 11.6421 20.9949C11.615 20.8686 11.594 20.7432 11.5775 20.6201C11.4998 20.0424 11.4999 19.3365 11.5 18.586V18.414C11.4999 17.6635 11.4998 16.9576 11.5775 16.3799C11.6639 15.737 11.8705 15.0333 12.4519 14.4519C13.0334 13.8705 13.737 13.6639 14.3799 13.5774C14.6919 13.5355 15.0412 13.5162 15.4147 13.5074Z"
                                        fill="#ffffff"></path>
                                </g>
                            </svg>

                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('our-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #43800a;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($ourClient) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Our Clients</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                    stroke="none">
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
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('non-prospective-clients') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #b1ae25;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($nonprospectiveclients) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Non-Prospective-Clients</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg style="width: 50px; height:50px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <circle cx="12" cy="6" r="4" fill="#ffffff"></circle>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M18 15.75C16.7574 15.75 15.75 16.7574 15.75 18C15.75 18.3473 15.8287 18.6763 15.9693 18.97L18.9701 15.9693C18.6763 15.8287 18.3474 15.75 18 15.75ZM20.0307 17.0299L17.0299 20.0307C17.3236 20.1713 17.6526 20.25 18 20.25C19.2426 20.25 20.25 19.2426 20.25 18C20.25 17.6526 20.1713 17.3237 20.0307 17.0299ZM14.25 18C14.25 15.9289 15.9289 14.25 18 14.25C20.0711 14.25 21.75 15.9289 21.75 18C21.75 20.0711 20.0711 21.75 18 21.75C15.9289 21.75 14.25 20.0711 14.25 18Z"
                                        fill="#ffffff"></path>
                                    <path
                                        d="M15.3267 13.4807C13.7841 14.3951 12.75 16.0768 12.75 18C12.75 19.0693 13.0697 20.0639 13.6187 20.8935C13.0991 20.9638 12.5572 21.001 12 21.001C8.13401 21.001 5 19.2101 5 17.001C5 14.7918 8.13401 13.001 12 13.001C13.2041 13.001 14.3372 13.1747 15.3267 13.4807Z"
                                        fill="#ffffff"></path>
                                </g>
                            </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('locations') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="background-color: #fd7e14;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ count($locations) }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Locations</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    width="50px" height="50px" viewBox="0 0 512.000000 512.000000"
                                    preserveAspectRatio="xMidYMid meet">
                                
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                fill="#ffffff" stroke="none">
                                <path d="M2360 5105 c-385 -47 -745 -240 -987 -529 -232 -276 -344 -577 -345
                                -925 0 -228 43 -415 138 -606 25 -49 336 -559 690 -1132 551 -889 650 -1043
                                675 -1052 70 -24 37 -71 720 1031 347 561 651 1055 674 1097 94 168 148 350
                                164 545 72 933 -760 1690 -1729 1571z m453 -179 c446 -80 834 -382 1007 -784
                                71 -164 101 -313 100 -499 0 -220 -40 -379 -143 -570 -46 -85 -1210 -1963
                                -1217 -1963 -7 0 -1171 1878 -1217 1963 -67 124 -112 253 -134 387 -13 75 -12
                                297 1 373 72 421 319 757 704 957 157 82 309 127 516 154 66 8 295 -3 383 -18z"/>
                                <path d="M2451 4430 c-185 -26 -355 -110 -488 -241 -178 -176 -262 -391 -250
                                -643 7 -147 23 -211 87 -341 108 -218 308 -382 545 -446 114 -31 316 -31 430
                                0 237 64 437 228 545 446 64 130 80 194 87 341 12 251 -71 465 -249 642 -182
                                182 -458 276 -707 242z m269 -182 c25 -6 88 -30 140 -55 81 -39 107 -58 180
                                -132 68 -68 95 -104 128 -172 167 -337 35 -738 -298 -911 -192 -99 -428 -99
                                -620 0 -132 69 -236 176 -301 308 -67 138 -86 297 -54 448 47 222 233 424 460
                                501 102 34 250 39 365 13z"/>
                                <path d="M906 1697 c-25 -11 -95 -131 -463 -792 -239 -429 -437 -794 -440
                                -812 -4 -26 0 -37 25 -63 l30 -30 2502 0 2502 0 30 30 c25 26 29 37 25 63 -3
                                18 -201 383 -440 812 -391 703 -437 780 -466 792 -25 11 -130 13 -498 11
                                l-465 -3 -24 -28 c-29 -34 -31 -76 -5 -108 l19 -24 447 -5 447 -5 378 -680
                                378 -680 -1164 -3 c-640 -1 -1688 -1 -2328 0 l-1164 3 378 680 378 680 447 5
                                447 5 19 24 c26 32 24 74 -5 108 l-24 28 -469 2 c-358 2 -475 -1 -497 -10z"/>
                                </g>
                           </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
