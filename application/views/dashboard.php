<div id="inSlider">
    <img src="<?php echo base_url('assets/img/services.jpg');?>"  width="100%">
</div>
<section class="gray-section" id="status-block">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <?php echo '<h1>Welcome back to '.SITE_NAME.'</h1>'; ?>
            </div>
        </div>
        <div class="row m-b-lg" >
            <div class="col-sm-12">  
                <!-- <nav class="nav  nav-pills">
                    <a href="<?php //echo base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php //echo ($pagesigned) ?active?>">Dashboard</a>
                    <a href="<?php //echo base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php// echo ($page=='document') ? 'active':''?>">My Documents</a>
                    <a href="#" class="nav-item nav-link <?php //echo ($page=='pay') ? 'active':''?>">Pay Now</a>
                    <a href="<?php //echo base_url('User/logout');?>" class="nav-item nav-link">Log Out</a>
                </nav> -->
            </div>
     
            <div class="col-sm-12">
            <div class="row">
                <?php
                $userDocs = $userDocs->result_array();
                $approve = $reject = $progress = $sum =0;
                if(count($userDocs) > 0)
                {
                    foreach ($userDocs as $userdoc)
                    {
                        if($userdoc['status']=='Approved')
                        {
                            $approve = $userdoc['total'];
                        }
                        if($userdoc['status'] =='Rejected')
                        {
                            $reject = $userdoc['total'];
                        }
                        if($userdoc['status']=='Inprogress')
                        {
                            $progress = $userdoc['total'];
                        }
                    }
                    $sum = intval($approve)+intval($reject)+intval($progress);
                }

                ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="widget bg-info text-center">
                        <div class="m-b-md">
                            <i class="fa fa-upload fa-3x"></i>
                            <h1 class="m-xs"><?php echo $sum;?></h1>
                            <h3 class="no-margins">Uploaded</h3>
                            Documents
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="widget bg-success text-center">
                        <div class="m-b-md">
                            <i class="fa fa-check fa-3x"></i>
                            <h1 class="m-xs"><?php echo $approve;?></h1>
                            <h3 class="no-margins"><a href="#Approved" id="ApprovedDoc" title="Approved">Approved</a></h3>
                            Documents
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="widget bg-danger text-center">
                        <div class="m-b-md">
                            <i class="fa fa-times fa-3x"></i>
                            <h1 class="m-xs"><?php echo $reject;?></h1>
                            <h3 class="no-margins"><a href="#Rejected" id="RejectedDoc" title="Rejected">Rejected</a></h3>
                            Documents
                        </div>
                    </div>
                </div>            
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="widget bg-warning text-center">
                        <div class="m-b-md">
                            <i class="fa fa-hourglass fa-3x"></i>
                            <h1 class="m-xs"><?php echo $progress;?></h1>
                            <h3 class="no-margins"><a href="#Inprogress" id="InprogressDoc" title="Inprogress">InProgress</a></h3>
                            Documents
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="widget bg-primary text-center">
                        <div class="m-b-md">
                            <i class="fa fa-th fa-3x"></i><br /><br />
                            <h3><a title="View All" href="<?php echo base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);?>">View <br/>All</a></h3>
                            Documents
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<section class="white-section" id="docList">
    <div class="container">
        <div class="row m-b-lg m-t-lg">
            <div class="col-sm-12">
                <div id="docListStatus" style="display: none;">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <tr>
                            <td colspan="6">
                                <div class="sk-spinner sk-spinner-wave">
                                <div class="sk-rect1"></div>
                                <div class="sk-rect2"></div>
                                <div class="sk-rect3"></div>
                                <div class="sk-rect4"></div>
                                <div class="sk-rect5"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


