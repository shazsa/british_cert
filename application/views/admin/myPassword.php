    <div class="wrapper wrapper-content animated rotateInDownLeft">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/User/savePassword', 'id="doAction" class="m-t" role="form"');
            echo '<div class="form-group row">
                    <label class="col-lg-4"></label>
                    <div class="col-lg-8"><ul><li>Your password must be between 8 and 20 charcters</li><li>Your password must include atleast one uppercase letter.</li><li>It must include at least one lowercase letter</li><li>It must include atleast one digit.</li><li>It must include atleast one special character- for example:$,#,@&</li></ul></div>
                    </div>';
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Current Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="crntUser" name="crntUser" value="">
                        <p class="text-danger" id="crntUser_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">New Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="newUser" name="newUser" value="">
                        <p class="text-danger" id="newUser_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Confirm New Password</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" id="cnfUser" name="cnfUser" value="">
                        <p class="text-danger" id="cnfUser_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Save Changes</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline btn-lg m-b btn-primary">Reset</button>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="result_box"><p class="text-danger" id="resp_err"></div>
                </div>
            </form>';
            ?>
        </div>
    </div>