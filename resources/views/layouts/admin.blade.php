<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('Admin/assets')}}"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

<style>

</style>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('ad/assets/img/favicon/favicon.ico')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/fonts/boxicons.css")}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/css/core.css")}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/css/theme-default.css")}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/css/theme-default.css")}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset("ad/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css")}}" />

    <link rel="stylesheet" href="{{asset("ad/assets/vendor/libs/apex-charts/apex-charts.css")}}" />

    <!-- DataTable CSS -->


    <link src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- Helpers -->
    <script src="{{asset("ad/assets/vendor/js/helpers.js")}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset("ad/assets/js/config.js")}}"></script>

    @yield("header")
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @if(Auth::guard('admin')->user()->is_emp == 0)
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{url('admin')}}" class="app-brand-link">
                  <span class="app-brand-logo demo">

                  </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li id="db_item_dashboard" class="menu-item">
                        <a href="{{url('admin')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Layouts -->


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">POSTS</span>
                    </li>
                    <li id="db_pitem_funds" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Fundraising</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_allfund" class="menu-item">
                                <a href="{{url('admin/fund')}}" class="menu-link">
                                    <div data-i18n="Notifications">All Fundraising</div>
                                </a>
                            </li>
                            <li id="db_item_unfund" class="menu-item">
                                <a href="{{url('admin/unfund')}}" class="menu-link">
                                    <div data-i18n="Account">Unverified Fundraising</div>
                                </a>
                            </li>

                            <li id="db_item_catfund" class="menu-item">
                                <a href="{{url('admin/fund_cat')}}" class="menu-link">
                                    <div data-i18n="Connections">Categories</div>
                                </a>
                            </li>
                            <li id="db_item_donfund" class="menu-item">
                                <a href="{{url('admin/don')}}" class="menu-link">
                                    <div data-i18n="Connections">Donations</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="db_pitem_jobs" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Jobs</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_alljobs" class="menu-item">
                                <a href="{{url('admin/jobs')}}" class="menu-link">
                                    <div data-i18n="Basic">All Jobs</div>
                                </a>
                            </li>
                            <li id="db_item_unjobs" class="menu-item">
                                <a href="{{url('admin/unjobs')}}" class="menu-link">
                                    <div data-i18n="Basic">Unverified Jobs</div>
                                </a>
                            </li>
                            <li id="db_item_catjobs" class="menu-item">
                                <a href="{{url('admin/jobs_cat')}}" class="menu-link">
                                    <div data-i18n="Basic">Job Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="db_pitem_blogs" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Blog Posts</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_blog" class="menu-item">
                                <a href="{{url('admin/blog')}}" class="menu-link">
                                    <div data-i18n="Error">Blogs</div>
                                </a>
                            </li>
                            <li id="db_item_blog_cat" class="menu-item">
                                <a href="{{url('admin/blog_cat')}}" class="menu-link">
                                    <div data-i18n="Under Maintenance">Blog Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Accounting</span>
                    </li>
                    <li id="db_pitem_trans" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Transactions</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_alltrans" class="menu-item">
                                <a href="{{url('admin/transactions')}}" class="menu-link">
                                    <div data-i18n="Notifications">Journals</div>
                                </a>
                            </li>
                            <li id="db_item_dratrans" class="menu-item">
                                <a href="{{url('admin/dtransactions')}}" class="menu-link">
                                    <div data-i18n="Account">Draft Journals</div>
                                </a>
                            </li>

                            <li id="db_item_cattrans" class="menu-item">
                                <a href="{{url('admin/trans_cat')}}" class="menu-link">
                                    <div data-i18n="Connections">Categories</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="db_pitem_report" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Reports</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_tranreport" class="menu-item">
                                <a href="{{url('admin/report')}}" class="menu-link">
                                    <div data-i18n="Notifications">Transaction Report</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Users</span>
                    </li>
                    <li id="db_item_employee" class="menu-item">
                        <a href="{{url('admin/emp')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Employee</div>
                        </a>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Settings</span>
                    </li>
                    <li id="db_pitem_setting" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Website Settings</div>
                        </a>

                        <ul class="menu-sub">
                            <li id="db_item_detail" class="menu-item">
                                <a href="{{url('admin/web')}}" class="menu-link">
                                    <div data-i18n="Container">Website Detail</div>
                                </a>
                            </li>
                            <li id="db_item_slider" class="menu-item">
                                <a href="{{url('admin/slider')}}" class="menu-link">
                                    <div data-i18n="Without menu">Slider</div>
                                </a>
                            </li>
                            <li id="db_item_service" class="menu-item">
                                <a href="{{url('admin/service')}}" class="menu-link">
                                    <div data-i18n="Without navbar">Services</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        @else
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{url('admin')}}" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li id="db_item_dashboard" class="menu-item">
                        <a href="{{url('admin')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Layouts -->


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">POSTS</span>
                    </li>
                    <li id="db_pitem_blogs" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Blog Posts</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_blog" class="menu-item">
                                <a href="{{url('admin/blog')}}" class="menu-link">
                                    <div data-i18n="Error">Blogs</div>
                                </a>
                            </li>
                            <li id="db_item_blog_cat" class="menu-item">
                                <a href="{{url('admin/blog_cat')}}" class="menu-link">
                                    <div data-i18n="Under Maintenance">Blog Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Accounting</span>
                    </li>
                    <li id="db_pitem_trans" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Transactions</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_alltrans" class="menu-item">
                                <a href="{{url('admin/transactions')}}" class="menu-link">
                                    <div data-i18n="Notifications">Journals</div>
                                </a>
                            </li>

                            <li id="db_item_cattrans" class="menu-item">
                                <a href="{{url('admin/trans_cat')}}" class="menu-link">
                                    <div data-i18n="Connections">Categories</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="db_pitem_report" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Reports</div>
                        </a>
                        <ul class="menu-sub">
                            <li id="db_item_tranreport" class="menu-item">
                                <a href="{{url('admin/report')}}" class="menu-link">
                                    <div data-i18n="Notifications">Transaction Report</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Settings</span>
                    </li>
                    <li id="db_pitem_setting" class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Website Settings</div>
                        </a>

                        <ul class="menu-sub">
                            <li id="db_item_detail" class="menu-item">
                                <a href="{{url('admin/web')}}" class="menu-link">
                                    <div data-i18n="Container">Website Detail</div>
                                </a>
                            </li>
                            <li id="db_item_slider" class="menu-item">
                                <a href="{{url('admin/slider')}}" class="menu-link">
                                    <div data-i18n="Without menu">Slider</div>
                                </a>
                            </li>
                            <li id="db_item_service" class="menu-item">
                                <a href="{{url('admin/service')}}" class="menu-link">
                                    <div data-i18n="Without navbar">Services</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        @endif
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
            >
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search..."
                                aria-label="Search..."
                            />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{asset("ad/assets/img/avatars/1.png")}}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="dropdown-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{asset("ad/assets/img/avatars/1.png")}}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{Auth::guard('admin')->user()->email}}</span>
                                                <small class="text-muted">{{Auth::guard('admin')->user()->name}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{url('admin/profile')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Change Password</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route("admin.logout")}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">LogOut</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

            @yield("content")
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<div class="go-home">
    <a
        href="{{URL::route("homepage")}}"
        target="_blank"
        class="btn btn-danger btn-go-home"
    >Visit website</a>
</div>


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset("ad/assets/vendor/libs/jquery/jquery.js")}}"></script>
<script src="{{asset("ad/assets/vendor/libs/popper/popper.js")}}"></script>
<script src="{{asset("ad/assets/vendor/js/bootstrap.js")}}"></script>
<script src="{{asset("ad/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>

<script src="{{asset("ad/assets/vendor/js/menu.js")}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset("ad/assets/vendor/libs/apex-charts/apexcharts.js")}}"></script>

<!-- Main JS -->
<script src="{{asset("ad/assets/js/main.js")}}"></script>

<!-- Page JS -->
<script src="{{asset("ad/assets/js/dashboards-analytics.js")}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!--Data Tables -->

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</body>

@yield("footer")
</html>
