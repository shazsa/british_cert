</head>
<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo base_url('assets/img/small_logo.png');?>" alt="Logo">
            </div>
            <div class="col-md-6" style="border-left: 1px dotted black">
                <div class="ibox-content">
                    <h4>Login in to proceed.</h4>
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
                            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                        </div>
                        <div class="form-group">
                            <h5><a href="#">Forgot password?</a></h5>
                        </div>
                        <div class="form-group">
                            <div id="result_box">
                                <p class="text-danger" id="data_err"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
    </div>

</body>

</html>
