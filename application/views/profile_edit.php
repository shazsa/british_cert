<div id="inSlider">
    <img src="<?php echo base_url('assets/img/services.jpg');?>" width="100%">
</div>
<section class="grey-section" id="status-block">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-lg-12">
                <h2 class="text-blue">You can update your personal details at any time.</h2>
            </div>
        </div>
<!--         <div class="row m-b-lg" >
            <div class="col-sm-12">  
                <nav class="nav  nav-pills">
                    <a href="<?php //echo base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php// echo ($page=='signed') ? 'active':''?>">Dashboard</a>
                    <a href="<?php //echo base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php //echo ($page=='document') ? 'active':''?>">My Documents</a>
                    <a href="#" class="nav-item nav-link <?php// echo ($page=='pay') ? 'active':''?>">Pay Now</a>
                    <a href="<?php //echo base_url('User/logout');?>" class="nav-item nav-link">Log Out</a>
                </nav>
            </div>
        </div> -->
    </div>
</section>
<section class="white-section" id="docList">
    <div class="container">
        <div class="row">
            <div class="col-sm-12"><br /><br /><br /></div>
        </div>
        <div class="row m-b-lg m-t-lg">
            <div class="col-sm-12">
                <?php
                if($userData != null)
                {
                    echo form_open('User/saveProfile', 'id="doAction" class="m-t" role="form"');
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">First Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="fname" name="fname" value="'.$userData->first_name.'">
                            <p class="text-danger" id="fname_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Middle Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="mname" name="mname" value="'.$userData->middle_name.'">
                            <p class="text-danger" id="mname_err"></p>
                        </div>
                        </div>';                        
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Last Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="lname" name="lname" value="'.$userData->last_name.'">
                            <p class="text-danger" id="lname_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Company Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="comp" name="comp" value="'.$userData->company_name.'">
                            <p class="text-danger" id="comp_err"></p>
                        </div>
                        </div>';                        
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Mobile No.</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="mob" name="mob" value="'.$userData->mobile.'">
                            <p class="text-danger" id="mob_err"></p>
                        </div>
                        </div>';

                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Address line 1</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="adds1" name="adds1" value="'.$userData->address1.'">
                            <p class="text-danger" id="adds1_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Address line 2</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="adds2" name="adds2" value="'.$userData->address2.'">
                            <p class="text-danger" id="adds2_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">City</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="city" name="city" value="'.$userData->city.'">
                            <p class="text-danger" id="city_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">State</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="state" name="state" value="'.$userData->state.'">
                            <p class="text-danger" id="state_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Country</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="country" name="country" value="'.$userData->country.'">
                            <p class="text-danger" id="country_err"></p>
                        </div>
                        </div>';
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">Postal Code</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="zip" name="zip" value="'.$userData->zipcode.'">
                            <p class="text-danger" id="zip_err"></p>
                        </div>
                        </div>';

                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">&nbsp;</label>
                        <div class="col-lg-8">
                            <input type="submit" class="btn btn-primary" name="upd" value="Update">
                            <input type="reset" class="btn btn-primary btn-outline" value="Reset" name="reset" />
                        </div>
                        </div>';  
                    echo '<div class="form-group row">
                        <label class="col-lg-4 col-form-label">&nbsp;</label>
                        <div class="col-lg-8">
                            <div id="result_box"><p class="text-danger" id="resp_err"></p></div>
                        </div>
                        </div>';                                          

                    echo '</form>';
                }
                else
                {
                    echo '<p class="text-danger">Sorry! no user record found.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>


