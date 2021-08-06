
</head>
<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
         <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md py-md-2" role="navigation">
            
                <?php echo '<a href="'.base_url().'"><img src="'. base_url('assets/img/small_logo.png').'" alt="'.SITE_NAME.'" width="80%"></a>'; ?>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"><i class="fa fa-bars"></i></button>
                </div>
                <div class="collapse navbar-collapse align-items-center w-100" id="navbar">
                    <ul class="nav navbar-nav ml-auto">
                        <li><a class="nav-link page-scroll py-md-2 <?php echo ($page=='home') ? 'active':''?>" href="<?php echo base_url();?>">Home</a></li>
                        <li><a class="nav-link page-scroll py-md-2 <?php echo ($page=='about') ? 'active':''?>" href="<?php echo base_url('AboutUs');?>">About Us</a></li>
                        <li><a class="nav-link page-scroll py-md-2 <?php echo ($page=='service') ? 'active':''?>" href="<?php echo base_url('Certification/');?>">Certification</a></li>
                        <li><a class="nav-link page-scroll py-md-2 <?php echo ($page=='contact') ? 'active':''?>" href="<?php echo base_url('ContactUs');?>">Contact</a></li>
                        <?php
                        if($this->session->userdata('isUserLogin') )
                        {
                            if($page=='signed'){$cls = 'active';}else{ $cls = '';}
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle py-md-2 '. $cls.'" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i> '.$this->session->userdata('username').'</a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15).'">My Dashboard</a></li>
                                <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/editProfile/').substr(md5($this->session->userdata('user_id')), 0, 15).'">My Profile</a></li>
                                  <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15).'">My Documents</a></li>
                                <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/PayNow/').substr(md5($this->session->userdata('user_id')), 0, 15).'">My Payment</a></li>
                                <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/changePassword/').substr(md5($this->session->userdata('user_id')), 0, 15).'">Change Password</a></li>
                                <li><a class="nav-link page-scroll py-md-2" href="'.base_url('User/logout').'">Log Out</a></li>
                            </ul>
                        </li>';
                        }
                        else{
                            echo '<li id="getNewCaptcha"><button class="btn btn-primary py-md-2" data-toggle="modal">Register &vert; Login</button></li>';
                        } ?>
                        <li class="text-navy"><a id="phoneList" class="nav-link py-md-2"><i class=" fa fa-phone"></i> +91 90295 79146</a></li>                        
                    </ul>
                </div>
           
        </nav>
    </div>