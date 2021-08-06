    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            if($userData !== null){
                $sts = $userData->status;
                echo form_open('Admin/Member/updateMember', 'id="doAction" class="m-t" role="form"');
                echo '<input type="hidden" name="user_id" value="'.$encodedId.'">';
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
                        <label class="col-lg-4 col-form-label">Email Id</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="mob" name="mob" value="'.$userData->email.'">
                            <p class="text-danger" id="mob_err"></p>
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
                        <label class="col-lg-4 col-form-label">Status</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="status" id="status">';
                            if($sts){
                                echo '<option value="1" selected="selected">Active</option>';
                                echo '<option value="0">In-Active</option>';
                            }
                            else
                            {
                                echo '<option value="0" selected="selected">In-Active</option>';
                                echo '<option value="1">Active</option>';
                            }
                            echo '<option value="delete">Delete</option>
                            </select> 
                        <p class="text-danger" id="status_err"></p>
                        </div></div>';
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
                        <div class="col-lg-4">&nbsp;</div>
                        <div class="col-lg-8" id="result_box">
                            <p class="text-danger" id="resp_err"></p>
                        </div>
                        </div></form>';
        }
        else{ echo "Sorry! No data found"; }?>
        </div>
    </div>