
<div id="inSlider">
    <img src="<?php echo base_url('assets/img/contactus.jpg');?>" width="100%">
</div>

<section  class="container features">
    <div class="row m-b-lg m-t-lg">
        <div class="col-sm-12 text-center">
            <div class="navy-line"></div>
            <h1>We are present<span class="navy"> around the globe</span> </h1>
        </div>
        <div class="col-sm-4 wow fadeInRight b-r-blue">
            <div class="widget bg-primary p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-map marker fa-3x"></i>
                    <h2 class="m-xs"><?php echo SITE_NAME;?>,<br />Opp. SBI Bank, Bhiwandi<br />
                    Thane MH India</h2>
                </div>
            </div>
            <div class="widget bg-primary p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-phone fa-3x"></i>
                    <h2>+91 90295 79146</h2>
                    <h2 >+91 90295 79135</h2>
                </div>
            </div>
            <div class="widget bg-primary p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-envelope fa-3x"></i>
                    <h2 >info@britishcert.com</h2>
                    <h2>sales@britishcert.com</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-8 wow fadeInLeft ">
            <?php echo form_open('Contact/sendQuery', 'id="queryFrm" class="m-t" role="form"'); ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Name" required="" id="fname" name="fname">
                    <p class="text-danger" id="fname_err"></p>
                </div>                             
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email ID" required="" name="userMail" id="userMail">
                    <p class="text-danger" id="userMail_err"></p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile No." required="" name="phone" id="phone">
                    <p class="text-danger" id="phone_err"></p>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Question" required="" name="ques" id="ques"></textarea>
                    <p class="text-danger" id="ques_err"></p>
                </div>
                <div class="form-group">
                    <span id="captcahBoxCnt"><?php if(isset($captcha)){echo $captcha['image'];}?></span>&nbsp;&nbsp;<a title="Refresh" href="#" class="btn btn-info" id="newCaptchaCnt"><i class="fa fa-refresh fa-2x"></i></a>
                    <p class="text-info">Enter the numbers in the below textbox</p>
                </div>  
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Captcha" required="" name="captcha" id="captcha" value="">
                    <p class="text-danger" id="captcha_err"></p>
                </div>        
                <button type="submit" class="btn btn-primary block full-width m-b">Send</button>
                <div id="result_box"><p class="text-danger" id="resp_err"></p></div>
            </form>
        </div>
    </div>
</section>
<section class="gray-section">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-sm-12 text-center">
                <div class="navy-line"></div>
                <h1>We are <span class="navy">located</span> at</h1>
            </div>
        </div> 
        <div class="row m-b-lg">
            <div class="col-md-4 location-bg wow fadeInLeft animated">
                <p>
                    <img src="<?php echo base_url('assets/img/flags/32/Qatar.png');?>" alt="Qatar"> Qatar
                </p>
                <p>Flat No. 1, Zone 27, Street 220, Bldg No. 47, Moghalina, Doha, Qatar</p>
            </div>
            <div class="col-md-4 location-bg wow fadeInRight animated">
                <p>
                    <img src="<?php echo base_url('assets/img/flags/32/Saudi-Arabia.png');?>" alt="Saudi-Arabia"> Saudi Arabia
                </p>
                <p>King Khalid Road, Umm Al Hamam Al Gharbi, Riyadh 12322, Saudi Arabia</p>
            </div>
            <div class="col-md-4 location-bg wow fadeInRight animated">
               <p>
                    <img src="<?php echo base_url('assets/img/flags/32/United-Kingdom.png');?>" alt="United Kingdom"> UK
                </p>
                <p>183 Euston Rd, London NW1 2BE, United Kingdom</p>
            </div>
            <div class="col-md-4 location-bg wow fadeInRight animated">
               <p>
                    <img src="<?php echo base_url('assets/img/flags/32/Australia.png');?>" alt="Australia"> Australia
                </p>
                <p>6 Kent road, Box Hill, VIC 3128, Melbourne</p>
            </div>
        </div>
    </div>
</section>
<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-md-12">
                <div class="blue-line"></div>
                <h1 class="text-center">Our success in numbers</h1>
            </div>
        </div>
        <div class="row countBox">

            <div class="col-sm-3">
                <div class="widget bg-info p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-coffee fa-3x"></i>
                        <h1 class="m-xs counter">1000</h1>
                        <h3 class="font-bold">Happy Customers</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget bg-success p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-globe fa-3x"></i>
                        <h1 class="m-xs counter">25</h1>
                        <h3 class="font-bold">Cities Presence</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget bg-primary p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h1 class="m-xs counter">1596</h1>
                        <h3 class="font-bold">Projects Completed</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget bg-dark p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-group fa-3x"></i>
                        <h1 class="m-xs counter">15</h1>
                        <h3 class="font-bold">Team Strength</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>

        </div>
    </div>
</section>

<!--signup model-->
