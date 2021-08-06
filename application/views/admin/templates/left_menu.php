</head>
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img src="<?php echo base_url('assets/img/small_logo.png');?>" alt="British Cert" width="100px">
                        <span class="block m-t-xs font-bold"><?php echo $this->session->userdata('Ausername');?></span>
                        <span class="text-muted text-xs block">Site Admin</span>
                    </div>
                    <div class="logo-element">
                        <img src="<?php echo base_url('assets/img/small_logo.png');?>" alt="British Cert" width="60px">
                    </div>
                </li>
                <li class="<?php echo ($page=='dashboard') ? 'active':''?>">
                    <a href="<?php echo BASE_URL_ADMIN.'Dashboard';?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                </li>
                <li class="<?php echo ($page=='slider') ? 'active':''?>">
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-photo"></i> <span class="nav-label">Slider</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="">
                        <li><a href="<?php echo BASE_URL_ADMIN.'Slider/addSlider';?>">Add New Slider</a></li>
                        <li><a href="<?php echo BASE_URL_ADMIN.'Slider/listSlider';?>">View Sliders</a></li>
                    </ul>
                </li>
                <li class="<?php echo ($page=='user') ? 'active':''?>">
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i> <span class="nav-label">My Profile</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="">
                        <li><a href="<?php echo BASE_URL_ADMIN.'User/editProfile';?>">Edit Profile</a></li>
                        <!-- <li><a href="<?php //echo BASE_URL_ADMIN.'User/changeUserName';?>">Change Username</a></li> -->
                        <li><a href="<?php echo BASE_URL_ADMIN.'User/changePassword';?>">Change Password</a></li>
                    </ul>
                </li>
                <li class="<?php echo ($page=='allUsers') ? 'active':''?>"><a href="<?php echo BASE_URL_ADMIN.'Member/listAll';?>"><i class="fa fa-users"></i> <span class="nav-label">All Users</span></a></li>
                <li id="doc_count" class="<?php echo ($page=='docs') ? 'active':''?>"><a href="<?php echo BASE_URL_ADMIN.'Document/listAll';?>"><i class="fa fa-upload"></i> <span class="nav-label">Documents</span><span class="label label-warning float-right"></span></a></li>
                <li class="<?php echo ($page=='product') ? 'active':''?>">
                    <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-product-hunt"></i> <span class="nav-label">Certificates</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false" style="">
                        <li><a href="<?php echo BASE_URL_ADMIN.'Product/addProduct';?>">Add Certificate</a></li>
                        <li><a href="<?php echo BASE_URL_ADMIN.'Product/listProduct';?>">View Certificates</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo BASE_URL_ADMIN.'Dashboard/logout';?>"><i class="fa fa-sign-out"></i>Log out</a>
                </li>
            </ul>
        </nav>
        </div>  

<!--         <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="Dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong></strong>
                    </li>
                </ol>
            </div>
        </div>   -->
    <!--ends tobar nav-->