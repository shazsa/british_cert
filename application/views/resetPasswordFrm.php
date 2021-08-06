<div id="inSlider" class="carousel slide" data-ride="carousel">
    <img src="<?php echo base_url('assets/img/p_bg1.jpg');?>" alt="Header">
</div>

<!--password reset model-->
<section>
    <div class="container">        
        <div class="row justify-content-md-center">                              
            <div class="col-12 col-lg-8 ml-lg-2 mr-lg-2">
            <div class="card">
                <div class="card-header bg bg-primary">
                    <h4>Reset Password</h4>
                </div>
                <?php if($isValid) {?>
                <div class="card-body">
                    <?php
                    echo '<ul><li>Your password must be between 8 and 20 charcters</li><li>Your password must include atleast one uppercase letter.</li><li>It must include at least one lowercase letter</li><li>It must include atleast one digit.</li><li>It must include atleast one special character- for example:$,#,@&</li></ul>';
                    echo form_open('User/savePassword', 'id="doAction" class="m-t" role="form"'); ?>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newPwd" id="newPwd" placeholder="New Password">
                        <p class="text-danger" id="newPwd_err"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="cnfPwd" id="cnfPwd" placeholder="Confirm Password">
                        <p class="text-danger" id="cnfPwd_err"></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary block full-width m-b">Send</button>
                    </div>
                    
                    <div class="form-group">
                        <div id="result_box"><p class="text-danger" id="data_err"></p></div>
                    </div>
                    </form>     
                </div>
                <?php } else { ?>
                <div class="card-body">
                    <div>
                        <p class="text-danger">Sorry!!! Your password reset link is either invalid or has expired.</p>
                        <p class="text-info">Please send a new request to reset your password.</p>
                    </div>
                </div>  
                <?php } ?>  
                <div class="card-footer"></div>                    
            </div>
            </div>                   
        </div>            
    </div>
</section>