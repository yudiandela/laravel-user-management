<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'User Manager') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">David Greymaax</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown rounded-0" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-cached mr-2 text-success"></i>
                                Activity Log
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-account mr-2 text-success"></i>
                                Show Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>
                                Signout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">David Grey. H</span>
                                <span class="text-secondary text-small">Project Manager</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Users</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="#">All Users</a></li>
                                <li class="nav-item"> <a class="nav-link" href="#">Add Users</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span>
                            Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview
                                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{ asset('theme/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Weekly Users Add
                                        <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">$ 15,0000</h2>
                                    <h6 class="card-text">Increased by 60%</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{ asset('theme/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Weekly Users Change
                                        <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">45,6334</h2>
                                    <h6 class="card-text">Decreased by 10%</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{ asset('theme/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Users Account
                                        <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">95,5741</h2>
                                    <h6 class="card-text">Increased by 5%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">New User</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Assignee
                                                    </th>
                                                    <th>
                                                        Subject
                                                    </th>
                                                    <th>
                                                        Status
                                                    </th>
                                                    <th>
                                                        Last Update
                                                    </th>
                                                    <th>
                                                        Tracking ID
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="images/faces/face1.jpg" class="mr-2" alt="image">
                                                        David Grey
                                                    </td>
                                                    <td>
                                                        Fund is not recieved
                                                    </td>
                                                    <td>
                                                        <label class="badge badge-gradient-success">DONE</label>
                                                    </td>
                                                    <td>
                                                        Dec 5, 2017
                                                    </td>
                                                    <td>
                                                        WD-12345
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="images/faces/face2.jpg" class="mr-2" alt="image">
                                                        Stella Johnson
                                                    </td>
                                                    <td>
                                                        High loading time
                                                    </td>
                                                    <td>
                                                        <label class="badge badge-gradient-warning">PROGRESS</label>
                                                    </td>
                                                    <td>
                                                        Dec 12, 2017
                                                    </td>
                                                    <td>
                                                        WD-12346
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="images/faces/face3.jpg" class="mr-2" alt="image">
                                                        Marina Michel
                                                    </td>
                                                    <td>
                                                        Website down for one week
                                                    </td>
                                                    <td>
                                                        <label class="badge badge-gradient-info">ON HOLD</label>
                                                    </td>
                                                    <td>
                                                        Dec 16, 2017
                                                    </td>
                                                    <td>
                                                        WD-12347
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="images/faces/face4.jpg" class="mr-2" alt="image">
                                                        John Doe
                                                    </td>
                                                    <td>
                                                        Loosing control on server
                                                    </td>
                                                    <td>
                                                        <label class="badge badge-gradient-danger">REJECTED</label>
                                                    </td>
                                                    <td>
                                                        Dec 3, 2017
                                                    </td>
                                                    <td>
                                                        WD-12348
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Recent Updates</h4>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                                            <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                                            <span>jack Menqu</span>
                                        </div>
                                        <div class="d-flex align-items-center text-muted font-weight-light">
                                            <i class="mdi mdi-clock icon-sm mr-2"></i>
                                            <span>October 3rd, 2018</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-6 pr-1">
                                            <img src="{{ asset('theme/images/dashboard/img_1.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                                            <img src="{{ asset('theme/images/dashboard/img_4.jpg') }}" class="mw-100 w-100 rounded" alt="image">
                                        </div>
                                        <div class="col-6 pl-1">
                                            <img src="{{ asset('theme/images/dashboard/img_2.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                                            <img src="{{ asset('theme/images/dashboard/img_3.jpg') }}" class="mw-100 w-100 rounded" alt="image">
                                        </div>
                                    </div>
                                    <div class="d-flex mt-5 align-items-top">
                                        <img src="images/faces/face3.jpg" class="img-sm rounded-circle mr-3" alt="image">
                                        <div class="mb-0 flex-grow">
                                            <h5 class="mr-2 mb-2">School Website - Authentication Module.</h5>
                                            <p class="mb-0 font-weight-light">It is a long established fact that a
                                                reader will be distracted
                                                by the readable
                                                content of a page.</p>
                                        </div>
                                        <div class="ml-auto">
                                            <i class="mdi mdi-heart-outline text-muted"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>