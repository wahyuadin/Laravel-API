@extends('layout.app')
@section('judul', 'Halaman Dashboard')
@section('dashboard','active')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
            <h2 class="mb-3 me-auto">Dashboard</h2>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>{{ config('app.name') }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">@yield('judul')</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="menu">
                                    <span class="font-w500 fs-16 d-block mb-2">Total Menus</span>
                                    <h2>459</h2>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/8</span>
                                    <small class="text-black">
                                        <svg width="31" height="30" viewbox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.8495 7.03697H22.274V1.75781H28.5565V0H20.511V7.03697H11.9357V12.3132H13.7565L13.919 14.7549H9.2884C5.81084 14.7549 2.93817 17.3859 2.56674 20.7561C1.51859 21.1073 0.761047 22.0953 0.761047 23.2571C0.761047 24.4244 1.5257 25.4164 2.58166 25.7632C2.94436 28.1582 5.02231 30 7.5238 30H27.8522L29.0287 12.3132H30.8495V7.03697ZM9.2884 16.5127H17.0291C19.4851 16.5127 21.5318 18.2881 21.9496 20.6188H4.36785C4.78564 18.2881 6.83214 16.5127 9.2884 16.5127ZM3.40692 22.3766H22.9103C23.3972 22.3766 23.7934 22.7717 23.7934 23.2569C23.7934 23.7424 23.3972 24.1372 22.9103 24.1372H3.40692C2.92003 24.1372 2.52405 23.7424 2.52405 23.2569C2.52405 22.7717 2.92003 22.3766 3.40692 22.3766ZM7.5238 28.2422C6.04545 28.2422 4.79643 27.2479 4.41146 25.8952H21.9058C21.521 27.2479 20.272 28.2422 18.7934 28.2422H7.5238ZM26.2024 28.2422H22.599C23.1888 27.5517 23.5937 26.7002 23.7356 25.7632C24.7915 25.4164 25.5564 24.4244 25.5564 23.2571C25.5564 22.0953 24.7989 21.1073 23.7507 20.7561C23.3793 17.3859 20.5069 14.7549 17.0291 14.7549H15.6859L15.5234 12.3132H27.2618L26.2024 28.2422ZM29.0865 10.5553H13.6987V8.79478H29.0865V10.5553Z" fill="#624FD1"></path>
                                        </svg>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="menu">
                                    <span class="font-w500 fs-16 d-block mb-2">Total Revenue</span>
                                    <h2>$87,561</h2>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/6</span>
                                    <small class="text-black">
                                        <svg width="19" height="36" viewbox="0 0 19 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.8469 24.36C18.8469 25.64 18.5269 26.8667 17.8869 28.04C17.2469 29.1867 16.3003 30.1467 15.0469 30.92C13.8203 31.6933 12.3403 32.1333 10.6069 32.24V35.48H8.44695V32.24C6.02028 32.0267 4.04695 31.2533 2.52694 29.92C1.00694 28.56 0.233612 26.84 0.206945 24.76H4.08695C4.19361 25.88 4.60695 26.8533 5.32695 27.68C6.07361 28.5067 7.11361 29.0267 8.44695 29.24V19.24C6.66028 18.7867 5.22028 18.32 4.12695 17.84C3.03361 17.36 2.10028 16.6133 1.32694 15.6C0.553612 14.5867 0.166945 13.2267 0.166945 11.52C0.166945 9.36 0.913612 7.57333 2.40695 6.16C3.92695 4.74666 5.94028 3.96 8.44695 3.8V0.479998H10.6069V3.8C12.8736 3.98667 14.7003 4.72 16.0869 6C17.4736 7.25333 18.2736 8.89333 18.4869 10.92H14.6069C14.4736 9.98667 14.0603 9.14667 13.3669 8.4C12.6736 7.62667 11.7536 7.12 10.6069 6.88V16.64C12.3669 17.0933 13.7936 17.56 14.8869 18.04C16.0069 18.4933 16.9403 19.2267 17.6869 20.24C18.4603 21.2533 18.8469 22.6267 18.8469 24.36ZM3.88695 11.32C3.88695 12.6267 4.27361 13.6267 5.04695 14.32C5.82028 15.0133 6.95361 15.5867 8.44695 16.04V6.8C7.06028 6.93333 5.95361 7.38667 5.12695 8.16C4.30028 8.90667 3.88695 9.96 3.88695 11.32ZM10.6069 29.28C12.0469 29.12 13.1669 28.6 13.9669 27.72C14.7936 26.84 15.2069 25.7867 15.2069 24.56C15.2069 23.2533 14.8069 22.2533 14.0069 21.56C13.2069 20.84 12.0736 20.2667 10.6069 19.84V29.28Z" fill="#624FD1"></path>
                                        </svg>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="menu">
                                    <span class="font-w500 fs-16 d-block mb-2">Total Oders</span>
                                    <h2>247</h2>
                                </div>
                                <div class="d-inline-block position-relative donut-chart-sale">
                                    <span class="donut1" data-peity='{ "fill": ["rgb(98, 79, 209,1)", "rgba(247, 245, 255)"],   "innerRadius": 35, "radius": 10}'>5/8</span>
                                    <small class="text-black">
                                        <svg width="19" height="36" viewbox="0 0 19 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.8469 24.36C18.8469 25.64 18.5269 26.8667 17.8869 28.04C17.2469 29.1867 16.3003 30.1467 15.0469 30.92C13.8203 31.6933 12.3403 32.1333 10.6069 32.24V35.48H8.44695V32.24C6.02028 32.0267 4.04695 31.2533 2.52694 29.92C1.00694 28.56 0.233612 26.84 0.206945 24.76H4.08695C4.19361 25.88 4.60695 26.8533 5.32695 27.68C6.07361 28.5067 7.11361 29.0267 8.44695 29.24V19.24C6.66028 18.7867 5.22028 18.32 4.12695 17.84C3.03361 17.36 2.10028 16.6133 1.32694 15.6C0.553612 14.5867 0.166945 13.2267 0.166945 11.52C0.166945 9.36 0.913612 7.57333 2.40695 6.16C3.92695 4.74666 5.94028 3.96 8.44695 3.8V0.479998H10.6069V3.8C12.8736 3.98667 14.7003 4.72 16.0869 6C17.4736 7.25333 18.2736 8.89333 18.4869 10.92H14.6069C14.4736 9.98667 14.0603 9.14667 13.3669 8.4C12.6736 7.62667 11.7536 7.12 10.6069 6.88V16.64C12.3669 17.0933 13.7936 17.56 14.8869 18.04C16.0069 18.4933 16.9403 19.2267 17.6869 20.24C18.4603 21.2533 18.8469 22.6267 18.8469 24.36ZM3.88695 11.32C3.88695 12.6267 4.27361 13.6267 5.04695 14.32C5.82028 15.0133 6.95361 15.5867 8.44695 16.04V6.8C7.06028 6.93333 5.95361 7.38667 5.12695 8.16C4.30028 8.90667 3.88695 9.96 3.88695 11.32ZM10.6069 29.28C12.0469 29.12 13.1669 28.6 13.9669 27.72C14.7936 26.84 15.2069 25.7867 15.2069 24.56C15.2069 23.2533 14.8069 22.2533 14.0069 21.56C13.2069 20.84 12.0736 20.2667 10.6069 19.84V29.28Z" fill="#624FD1"></path>
                                        </svg>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0 flex-wrap pb-0">
                        <div class="mb-sm-0 mb-2">
                            <h4 class="fs-20">Today’s Revenue</h4>
                            <span>Lorem ipsum dolor sit amet, consectetur</span>
                        </div>
                        <div>
                            <h2 class="font-w700 mb-0">$ 240.45</h2>
                        <p class="mb-0 font-w700"><span class="text-success">0,5% </span>than last day</p>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div id="revenueChart" class="revenueChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div>
                                    <h4 class="fs-20 mb-1">Daily Trending Menus</h4>
                                    <span>Lorem ipsum dolor sit amet, consectetur</span>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="d-flex pb-3 mb-3 tr-row align-items-center border-bottom">
                                    <span class="num">#1</span>
                                    <div class="me-auto pe-3">
                                        <a href="ecom-product-grid.html"><h2 class="text-black fs-14 font-w600">Medium Spicy Spagethi Italiano</h2></a>
                                        <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                    </div>
                                    <img src="images/menu/pic1.jpg" alt="">
                                </div>
                                <div class="d-flex pb-3 mb-3 tr-row align-items-center border-bottom">
                                    <span class="num">#2</span>
                                    <div class="me-auto pe-3">
                                        <a href="ecom-product-grid.html"><h2 class="text-black fs-14 font-w600">Watermelon juice with ice</h2></a>
                                        <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                    </div>
                                    <img src="images/menu/pic4.jpg" alt="">
                                </div>
                                <div class="d-flex pb-3 mb-3 tr-row align-items-center border-bottom">
                                    <span class="num">#3</span>
                                    <div class="me-auto pe-3">
                                        <a href="ecom-product-grid.html"><h2 class="text-black fs-14 font-w600">Chicken curry special with cucumber</h2></a>
                                        <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                    </div>
                                    <img src="images/menu/pic3.jpg" alt="">
                                </div>
                                <div class="d-flex pb-3 mb-3 tr-row align-items-center border-bottom">
                                    <span class="num">#4</span>
                                    <div class="me-auto pe-3">
                                        <a href="ecom-product-grid.html"><h2 class="text-black fs-14 font-w600">Italiano Pizza With Garlic</h2></a>
                                        <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                    </div>
                                    <img src="images/menu/pic2.jpg" alt="">
                                </div>
                                <div class="d-flex pb-3 mb-3 tr-row align-items-center border-bottom">
                                    <span class="num">#5</span>
                                    <div class="me-auto pe-3">
                                        <a href="ecom-product-grid.html"><h2 class="text-black fs-14 font-w600">Tuna Soup spinach with himalaya salt</h2></a>
                                        <span class="text-black font-w600 d-inline-block me-3">$5.6 </span> <span class="fs-14">Order 89x</span>
                                    </div>
                                    <img src="images/menu/pic1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0  flex-wrap">
                                <div>
                                    <h4 class="fs-20 mb-1">Customer Map</h4>
                                    <span>Lorem ipsum dolor sit amet, consectetur</span>
                                </div>
                                <div class="d-flex">
                                    <div class="card-action coin-tabs mt-3 mt-sm-0">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#Monthly" role="tab">Monthly</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-bs-toggle="tab" href="#Daily" role="tab">Daily</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#Today" role="tab">Today</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dropdown custom-dropdown mb-0 ms-3">
                                        <div class="btn sharp tp-btn dark-btn" data-bs-toggle="dropdown">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pb-2">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Monthly">
                                        <div id="chartTimeline1" class="chart-timeline"></div>
                                    </div>
                                    <div class="tab-pane fade " id="Daily">
                                        <div id="chartTimeline2" class="chart-timeline"></div>
                                    </div>
                                    <div class="tab-pane fade " id="Today">
                                        <div id="chartTimeline3" class="chart-timeline"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
