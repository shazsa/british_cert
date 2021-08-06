<div class="modal" id="signupModel" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content animated rotateInDownLeft">
        <div id="signUpFrm">
        <div class="modal-header bg bg-primary">
            <h3 id="editLabel">Create free account</h3>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
            <?php echo '<ul><li>Your password must be between 8 and 20 charcters</li><li>Your password must include atleast one uppercase letter.</li><li>It must include at least one lowercase letter</li><li>It must include atleast one digit.</li><li>It must include atleast one special character- for example:$,#,@&</li></ul>';?>
            <?php echo form_open('User/signUp', 'id="userSignUp" class="m-t" role="form"'); ?>
                <!-- <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name" required="" id="fname" name="fname">
                    <p class="text-danger" id="fname_err"></p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Middle Name" required="" id="mname" name="mname">
                    <p class="text-danger" id="mname_err"></p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name" required="" id="lname" name="lname">
                    <p class="text-danger" id="lname_err"></p>
                </div>-->                              
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email ID" required="" name="userMail" id="userMail">
                    <p class="text-danger" id="userMail_err"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="pwd" id="pwd">
                    <p class="text-danger" id="pwd_err"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" required="" name="cnfPwd" id="cnfPwd">
                    <p class="text-danger" id="cnfPwd_err"></p>
                </div>
                <div class="form-group">
                    <span id="captcahBox"></span>&nbsp;&nbsp;<a title="Refresh" href="#" class="btn btn-info" id="newCaptcha"><i class="fa fa-refresh fa-2x"></i></a>
                    <p class="text-info">Enter the numbers in the below textbox</p>
                </div>  
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Captcha" required="" name="captcha" id="captcha" value="">
                    <p class="text-danger" id="captcha_err"></p>
                </div>        
                <div class="form-group">
                    <label for="agree"><input type="checkbox" name="agree" id="agree" value="1">&nbsp;I agree the terms and policy </label>
                    <p class="text-danger" id="agree_err"></p>
                </div>
                <button type="submit" class="btn btn-info block full-width m-b">Register</button>
                <p class="text-center">Already have an account?
                <a class="text-right" id="showSignIn" title="Go to Sign In Page" href="javascript:void(0)">Sign In</a></p>
                <div id="result_box"><p class="text-danger" id="resp_err"></p></div>
            </form>
        </div>
        </div>
        <!--sign in form-->
        <div id="signInFrm" style="display: none;">
        <div class="modal-header bg bg-primary">
            <h3 id="editLabel">Member Login</h3>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
            <?php echo form_open('User/signIn', 'id="userSignIn" class="m-t" role="form"'); ?>
                <div class="form-group">
                    <input type="email" class="form-control" name="userMail" id="userMail" placeholder="User Email">
                    <p class="text-danger" id="userMail_err"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    <p class="text-danger" id="pass_err"></p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info block full-width m-b">Login</button>
                </div>
                <div class="form-group">
                    <div id="result_box"><p class="text-danger" id="data_err"></p></div>
                </div>                
                <div class="form-group">
                    <p><a href="javascript:void(0)" title="Go to Paasword Reset page" id="showForgot">Forgot password?</a>&nbsp;<a href="javascript:void(0)" title="Go to Sign Up page" id="showSignUp" class="float-right">Dont have an account?</a></p>
                </div>
            </form>        
        </div>
        </div>
        <!--forgot password form-->
        <div id="forgotFrm" style="display: none;">
            <div class="modal-header bg bg-primary">
                <h3 id="editLabel">Reset Password</h3>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
        <div class="modal-body">
            <?php echo form_open('User/mailPasswordReset', 'id="forgotPassFrm" class="m-t" role="form"'); ?>
                <div class="form-group">
                    <p>Type your registered Email ID to receive the password reset link.</p>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="userMail" placeholder="Email ID" id="userMail">
                </div>
                <p class="text-danger" id="userMail_err"></p>
                <div class="form-group">                         
                    <button type="submit" class="btn btn-info block full-width m-b">Send</button>
                </div>
                <div class="form-group">
                    <div id="result_box"></div>
                </div>
            </form>        
        </div>   
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
<!--signup model ends-->