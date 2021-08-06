</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="<?php echo base_url('assets/img/BC_logo.svg');?>" alt="Logo">
            </div>
            <p>Login in to proceed.</p>
            <?php echo form_open('Admin/Dashboard/welcome', 'id="doAction" class="m-t" role="form"'); ?>
                <div class="form-group">
                    <input type="email" class="form-control" name="uname" id="uname" placeholder="User Email">
                    <p class="text-danger" id="uname_err"></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                    <p class="text-danger" id="pass_err"></p>
                </div>
                <div class="form-group">
                    <div id="result_box"></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
            </form>
        </div>
    </div>