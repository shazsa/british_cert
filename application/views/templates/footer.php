<section class="white-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg">
                <p><strong>&copy; <?php echo date('Y'). ' '.SITE_NAME;?> </strong><br> MG Road, Opp. SBI ATM, Mumbai, MH-India 400001 <i class="fa fa-phone"></i> +91 90295 79146</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Terms & Conditions</a></li>
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Refund Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <ul class="list-inline social-icon">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<p class="bg-success m-t-md" style="height:3px"></p>
<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins/wow/wow.min.js');?>"></script>

<script type="text/javascript">
        $(document).ready(function(){
            
            $('#getNewCaptcha button').on('click',function(){
                $.ajax({
                    url: "<?php echo base_url("Home/createCaptcha/");?>",
                    type: 'POST',
                    dataType: "json",
                    cache:false,
                    success:function(resp){
                        $('#userSignUp #captcahBox').html(resp.captcha.image);
                        $('#signupModel').modal();
                    }
                });
            });           
            //refresh captcha image
            $('#newCaptcha, #newCaptchaCnt').on('click',function(e){
                var frm = $(this).parents('form').attr('id');
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url("Home/createCaptcha/");?>",
                    type: 'POST',
                    dataType: "json",
                    cache:false,
                    success:function(resp){
                        console.log(resp);
                        $('#'+frm + ' span[id^="captcahBox"]').fadeOut().html('').fadeIn().html(resp.captcha.image);
                    }
                });
            });

        });
        //number counter
        $('.countBox .counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        (function blink() {$('#phoneList').fadeOut(3000).fadeIn(2000, blink); })();
    </script>
<script>

    $(document).ready(function () {

        $('#ApprovedDoc, #RejectedDoc, #InprogressDoc').on('click',function(e){
            var sts = $(this).prop('title');
            $.ajax({   
                url: "<?php echo base_url("User/docListByStatus");?>",
                type: 'POST',
                dataType: "json",
                data: {status:sts},
                cache:false,
                beforeSend: function(){
                    $('#docList #docListStatus').css('display','block');
                },
                success:function(resp){
                    //console.log(resp.length);
                    //return;
                    var resp = resp.docList;
                    var data = '';
                    var i;
                    var count =1;
                    if(resp.length > 0)
                    {
                        if(sts=='Approved')
                        {
                            data+= '<thead><tr><th>#</th><th>Document</th><th>File Name</th><th>Status</th><th>Uploaded</th><th>Approved</th></tr></thead><tbody>';
                            for(i=0; i<resp.length; i++)
                            {
                                /*var upDt = new Date(resp[i].uploaded_date);
                                upDt = upDt.getFullYear()+"-"+(upDt.getMonth()+1)+"-"+upDt.getDate();
                                if(resp[i].approved_on!== null)
                                {
                                    var aprDt = new Date(resp[i].approved_on);
                                    aprDt = aprDt.getFullYear()+"-"+(aprDt.getMonth()+1)+"-"+aprDt.getDate();
                                }
                                else
                                {
                                    aprDt = null;   
                                }*/

                                data+= '<tr><td>'+count+'</td><td>'+resp[i].documentName+'</td>';
                                data+= '<td><a href="<?php echo base_url();?>'+resp[i].document_path+'">'+resp[i].document_path.split("/")[3]+'</a></td>';
                                data+= '<td><span class="text-success">'+resp[i].status+'</span></td>';
                                data+= '<td>'+resp[i].uploaded_date+'</td>';
                                data+= '<td>'+resp[i].approved_on+'</td></tr>';
                                count++;
                            }
                        }
                        else if(sts=='Rejected')
                        {
                            data+= '<thead><tr><th>#</th><th>Document</th><th>File Name</th><th>Status</th><th>Reason</th><th>Uploaded</th><th>Rejected</th></tr></thead><tbody>';
                            for(i=0; i<resp.length; i++)
                            {
                                data+= '<tr><td>'+count+'</td><td>'+resp[i].documentName+'</td>';
                                data+= '<td><a href="<?php echo base_url();?>'+resp[i].document_path+'">'+resp[i].document_path.split("/")[3]+'</a></td>';
                                data+= '<td><span class="text-danger">'+resp[i].status+'</span></td>';
                                data+= '<td>'+resp[i].reason+'</td>';
                                data+= '<td>'+resp[i].uploaded_date+'</td>';
                                data+= '<td>'+resp[i].rejected_on+'</td></tr>';
                                count++;
                            }
                        }
                        else if(sts=='Inprogress')
                        {
                            data+= '<thead><tr><th>#</th><th>Document</th><th>File Name</th><th>Status</th><th>Uploaded</th></tr></thead><tbody>';
                            for(i=0; i<resp.length; i++)
                            {
                                data+= '<tr><td>'+count+'</td><td>'+resp[i].documentName+'</td>';
                                data+= '<td><a href="<?php echo base_url();?>'+resp[i].document_path+'">'+resp[i].document_path.split("/")[3]+'</a></td>';
                                data+= '<td><span class="text-primary">'+resp[i].status+'</span></td>';
                                data+= '<td>'+resp[i].uploaded_date+'</td></tr>';
                                count++;
                            }
                        }
                        data+= '</tbody>';
                    }
                    else
                    {
                        data+= '<tr><td colspan="6">Sorry! no documents found.</td></tr>';
                    }
                    $('#docList #docListStatus table').html(data);
                }
            });
        });

        $('#pwdResetModel').modal('show');
        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
