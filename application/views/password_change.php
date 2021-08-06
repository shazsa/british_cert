<div id="inSlider">
    <img src="<?php echo base_url('assets/img/services.jpg');?>" class="img-responseive" width="100%">
</div>
<section class="grey-section" id="status-block">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center"><br /></div>
        </div>
        <!-- <div class="row m-b-lg" >
            <div class="col-sm-12">  
                <nav class="nav  nav-pills">
                    <a href="<?php //echo base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php //echo ($page=='signed') ? 'active':''?>">Dashboard</a>
                    <a href="<?php //echo base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php// echo ($page=='document') ? 'active':''?>">My Documents</a>
                    <a href="#" class="nav-item nav-link <?php //echo ($page=='pay') ? 'active':''?>">Pay Now</a>
                    <a href="<?php// echo base_url('User/logout');?>" class="nav-item nav-link">Log Out</a>
                </nav>
            </div>
        </div> -->
    </div>
</section>
<section class="gray-section ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12"><br /><br /><br /></div>
        </div>
        <div class="row m-b-lg m-t-lg">
            <div class="col-sm-10">
                <?php
                echo '<ul><li>Your password must be between 8 and 20 charcters</li><li>Your password must include atleast one uppercase letter.</li><li>It must include at least one lowercase letter</li><li>It must include atleast one digit.</li><li>It must include atleast one special character- for example:$,#,@&</li></ul>';
                    echo form_open('User/savePasswordChange', 'id="doAction" class="m-t" role="form"');
                   
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Current Password</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="crntPwd" name="crntPwd">
                            <p class="text-danger" id="crntPwd_err"></p>
                        </div>
                        </div>';                        
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">New Password</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="newPwd" name="newPwd">
                            <p class="text-danger" id="newPwd_err"></p>
                        </div>
                        </div>';

                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Confirm New Password </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="cnfPwd" name="cnfPwd">
                            <p class="text-danger" id="cnfPwd_err"></p>
                        </div>
                        </div>';
                   
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">&nbsp;</label>
                        <div class="col-lg-8">
                            <input type="submit" class="btn btn-primary" name="upd" value="Change Now">
                        </div>
                        </div>';  
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">&nbsp;</label>
                        <div class="col-lg-8">
                            <div id="result_box"><p class="text-danger" id="resp_err"></p></div>
                        </div>
                        </div>';                                          

                    echo '</form>';
                
               
                ?>
            </div>
        </div>
    </div>
</section>


