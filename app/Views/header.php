<!DOCTYPE html>

<html lang="en">



<head>

    <title>Appointment</title>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="description" content="CodedThemes">

    <meta name="keywords"

        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">

    <meta name="author" content="CodedThemes">

    <!-- Favicon icon -->

    <link rel="icon" href="<?=base_url(); ?>assets/images/favicon.ico" type="image/x-icon">

    <!-- Fa Fa Icon Links -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google font-->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <!-- Required Fremwork -->

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css">

    <!-- themify-icons line icon -->

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/icon/themify-icons/themify-icons.css">

    <!-- ico font -->

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/icon/icofont/css/icofont.css">

    <!-- Style.css -->

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/jquery.mCustomScrollbar.css">



    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/customrstyle.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/responsivestyle.css">




    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/calender.css"> -->







    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"

        rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<style>
 /* styles.css */
#flash-messages {
    position: fixed;
    bottom: 20px;
    right: 20px;
    max-width: 300px;
    z-index: 1000;
}

.flash-message {
    padding: 12px 16px;
    margin-bottom: 10px;
    border-radius: 4px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
}

.flash-message.info {
    background-color: #cce5ff;
    border-color: #b8daff;
    color: #004085;
}

.flash-message.success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

th, td {
            white-space: nowrap;
        }
        div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
        }
        .dataTables_scrollBody {
            overflow: auto;
        }

        

</style>



</head>



<body>
<div id="flash-messages"></div>
    <!-- Pre-loader start -->

    <div class="theme-loader">

        <div class="ball-scale">

            <div class='contain'>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">



                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

                <div class="ring">

                    <div class="frame"></div>

                </div>

            </div>

        </div>

    </div>

    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">

        <div class="pcoded-overlay-box"></div>

        <div class="pcoded-container navbar-wrapper">



            <nav class="navbar header-navbar pcoded-header">

                <div class="navbar-wrapper">



                    <div class="navbar-logo">

                        <a class="mobile-menu" id="mobile-collapse" href="#!">

                            <i class="ti-menu"></i>

                        </a>

                        <!-- <a class="mobile-search morphsearch-search" href="#">

                            <i class="ti-search"></i>

                        </a> -->

                        <a href="index.html">

                            <!-- <img class="img-fluid" src="<?=base_url(); ?>assets/images/logo.png" alt="Theme-Logo" /> -->

                            <span>Vedik Astrologer</span>

                        </a>

                        <a class="mobile-options">

                            <i class="ti-more"></i>

                        </a>

                    </div>



                    <div class="navbar-container container-fluid">

                        <ul class="nav-left">

                            <li>

                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>

                                </div>

                            </li>



                            <li>

                                <a href="#!" onclick="javascript:toggleFullScreen()">

                                    <i class="ti-fullscreen"></i>

                                </a>

                            </li>

                        </ul>

                        <ul class="nav-right">

                            <!-- <li class="header-notification">

                                <a href="#!">

                                    <i class="ti-bell"></i>

                                    <span class="badge bg-c-pink"></span>

                                </a>

                                <ul class="show-notification">

                                    <li>

                                        <h6>Notifications</h6>

                                        <label class="label label-danger">New</label>

                                    </li>

                                    <li>

                                        <div class="media">

                                            <img class="d-flex align-self-center img-radius"

                                                src="<?=base_url(); ?>assets/images/avatar-4.jpg"

                                                alt="Generic placeholder image">

                                            <div class="media-body">

                                                <h5 class="notification-user">John Doe</h5>

                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer

                                                    elit.</p>

                                                <span class="notification-time">30 minutes ago</span>

                                            </div>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="media">

                                            <img class="d-flex align-self-center img-radius"

                                                src="<?=base_url(); ?>assets/images/avatar-3.jpg"

                                                alt="Generic placeholder image">

                                            <div class="media-body">

                                                <h5 class="notification-user">Joseph William</h5>

                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer

                                                    elit.</p>

                                                <span class="notification-time">30 minutes ago</span>

                                            </div>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="media">

                                            <img class="d-flex align-self-center img-radius"

                                                src="<?=base_url(); ?>assets/images/avatar-4.jpg"

                                                alt="Generic placeholder image">

                                            <div class="media-body">

                                                <h5 class="notification-user">Sara Soudein</h5>

                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer

                                                    elit.</p>

                                                <span class="notification-time">30 minutes ago</span>

                                            </div>

                                        </div>

                                    </li>

                                </ul>

                            </li> -->

                            <li class="user-profile header-notification">

                                <a href="#!">

                                    <img src="<?=base_url(); ?>assets/images/mrunalmam.jpeg" class="img-radius"

                                        alt="User-Profile-Image">

                                    <span>Mrunal</span>

                                    <i class="ti-angle-down"></i>

                                </a>

                                <ul class="show-notification profile-notification">

                                    <!-- <li>

                                        <a href="#!">

                                            <i class="ti-settings"></i> Settings

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="ti-user"></i> Profile

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="ti-email"></i> My Messages

                                        </a>

                                    </li>

                                    <li>

                                        <a href="#">

                                            <i class="ti-lock"></i> Lock Screen

                                        </a>

                                    </li> -->

                                    <li>

                                        <a href="<?=base_url(); ?>logout">

                                            <i class="ti-layout-sidebar-left"></i> Logout

                                        </a>

                                    </li>

                                </ul>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

            <div class="pcoded-main-container">

                <div class="pcoded-wrapper">

                    <nav class="pcoded-navbar">

                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>

                        <div class="pcoded-inner-navbar main-menu">



                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Dashboard</div>

                            <ul class="pcoded-item pcoded-left-item">

                                <li class="active">

                                    <a href="<?php echo base_url() ?>admin_dashboard">

                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>

                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                </li>



                            </ul>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms"></div>

                            <ul class="pcoded-item pcoded-left-item">

                                <li class="">

                                    <a href="<?=base_url(); ?>calendar">

                                        <span class="pcoded-micon"><i class="fa fa-calendar" aria-hidden="true"></i>

                                        </span>

                                        <span class="pcoded-mtext"

                                            data-i18n="nav.basic-components.alert">Calendar</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                </li>



                            </ul>

                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu">

                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>

                                        <span class="pcoded-mtext"

                                            data-i18n="nav.basic-components.main">Appointment</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                    <ul class="pcoded-submenu">

                                        <li class="">

                                            <a href="<?=base_url(); ?>add_appointment">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Add Appointment</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                        <li class=" ">

                                            <a href="<?=base_url(); ?>Booked_Slots">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Future </span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                        <li class=" ">

                                            <a href="<?=base_url(); ?>All_Appointment">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Conducted</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                      










                                    </ul>

                                </li>
                            </ul>


                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Other Services</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li>
                                            <a href="<?=base_url(); ?>services">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Add Services</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url(); ?>Services_List">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Services List</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu ">

                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="fa fa-gear"></i><b>S</b></span>

                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Settings</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                    <ul class="pcoded-submenu">

                                        <li class=" ">

                                            <a href="<?=base_url(); ?>Add_user">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Add User</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>



                                        <li class=" ">

                                            <a href="<?=base_url(); ?>user-list">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">User List</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>







                                        <li class=" ">

                                            <a href="<?=base_url(); ?>add_workinghour">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Add

                                                    Working Hours</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>



                                        <li class=" ">

                                            <a href="<?=base_url(); ?>my_slots">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">List of Working

                                                    Hours</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>



                                    </ul>

                                </li>

                            </ul>



                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu ">

                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>

                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Class</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                    <ul class="pcoded-submenu">



                                        <li class="">

                                            <a href="<?=base_url(); ?>Add_class">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Add Student</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                        <li class=" ">

                                            <a href="<?=base_url(); ?>Students">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Students List</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>





                                    </ul>

                                </li>

                            </ul>

                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu ">

                                    <a href="javascript:void(0)">

                                        <span class="pcoded-micon"><i class="fa fa-file"

                                                aria-hidden="true"></i><b>R</b></span>

                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Reports</span>

                                        <span class="pcoded-mcaret"></span>

                                    </a>

                                    <ul class="pcoded-submenu">

                                        <li class="">

                                            <a href="<?=base_url(); ?>Appointment_reports">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Appointment

                                                    Reports</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>



                                        <li class="">

                                            <a href="<?=base_url(); ?>services_Reports">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Services Reports</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                        <li class="">

                                            <a href="<?=base_url(); ?>Income">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">Class

                                                    Income Reports</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>

                                        <li class="">

                                            <a href="<?=base_url(); ?>getallincome">

                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>

                                                <span class="pcoded-mtext"

                                                    data-i18n="nav.basic-components.breadcrumbs">All Reports</span>

                                                <span class="pcoded-mcaret"></span>

                                            </a>

                                        </li>



                                    </ul>

                                </li>

                            </ul>

                        </div>

                    </nav>