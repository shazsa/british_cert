    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/User/saveUsername', 'id="doAction" class="m-t" role="form"');
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Current Username</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="crntUser" name="crntUser" value="">
                        <p class="text-danger" id="crntUser_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">New Username</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="newUser" name="newUser" value="">
                        <p class="text-danger" id="newUser_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Confirm New Username</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="cnfUser" name="cnfUser" value="">
                        <p class="text-danger" id="cnfUser_err"></p>
                    </div>
                </div>                                                                           
                <div class="form-group">
                    <div id="result_box"></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Save Changes</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline btn-lg m-b btn-primary">Reset</button>
                    </div>
                </div>
            </form>';
            ?>
        </div>
    </div>