
<div id="inSlider" class="carousel slide m-b-lg" data-ride="carousel">
    <?php                
    if( count($sliders->result_array()) > 0){
        echo '<ol class="carousel-indicators">';
        for($i =0; $i <count($sliders->result_array()); $i++)
        {
            $cls = ( $i ==0 ? 'active' : '');
            echo  '<li data-target="#inSlider" data-slide-to="'.$i.'" class="'.$cls.'"></li>';
        }
        echo '</ol>';

        echo '<div class="carousel-inner">';
            $sliders = $sliders->result_array();
            $k = 1;
            foreach ($sliders as $slider)
            {
                $class = ( $k ==1 ? 'carousel-item active' : 'carousel-item');
                echo '<div class="'.$class.'">
                    <img src="'.base_url($slider['slider_image']).'">
                </div>';
                $k++;
            }
    }?>

        <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
            <i class="fa fa-2x text-navy fa-chevron-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
            <i class="fa fa-2x text-navy fa-chevron-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<section  class="container features">
    <div class="row m-t-lg">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="navy">Welcome to </span><?php echo SITE_NAME;?></h1>
        </div>
    </div>
    <div class="row features-block">
        <div class="col-lg-6 wow fadeInLeft">
            <h2 class="font-bold"><small class="navy"><?php echo SITE_NAME;?></small><br />Your business partner</h2>
            <p class="text-justify">Mumbai based consultancy firm working in the field of various ISO management system certification and process implementation services. We specialize in providing various ISO and compliance certificates at competitive rates. We have associations with various certification bodies in India having immense knowledge and experience in the field of process implementation, audit and certification in various industries and multiple standards making IS CONSULTANCY a perfect basket of knowledge & experience for all types of client be at micro level or macro level. </p>
            <p class="text-justify">Mumbai based consultancy firm working in the field of various ISO management system certification and process implementation services. We specialize in providing various ISO and compliance certificates at competitive rates. We have associations with various certification bodies in India having immense knowledge and experience in the field of process implementation, audit and certification in various industries and multiple standards making IS CONSULTANCY a perfect basket of knowledge & experience for all types of client be at micro level or macro level. </p>
        </div>
        <div class="col-lg-6 wow fadeInRight">
            <img src="<?php echo base_url('assets/img/iso_welcome_img.jpg');?>" alt="dashboard" class="img-fluid">
        </div>
    </div>
    <div class="row features-block">
        <div class="col-lg-6 wow fadeInRight">
            <img src="<?php echo base_url('assets/img/iso_benefits.jpg');?>" alt="ISO Benefits" class="img-fluid">
        </div>
        <div class="col-lg-6 features-text wow fadeInLeft">
            <h2 class="text-navy font-bold">Benefits of ISO Certification</h2>
            <p class="text-justify">Customers are far more likely to contact a company if it uses an ISO 9001 logo in the marketing of its products or services.<br />ISO certification an essential requirement before carrying on business with a new vendor & eligibility to enter global markets.<br />Build credibility internationally. Ease in getting public and private contracts. Improve marketability. </p>
            <ul class="todo-list m-t ui-sortable">
                <li>
                    <i class="fa fa-check-circle fa-lg text-navy"></i>
                    <span class="m-l-xs">Global Presence</span>
                </li>
                <li>
                    <i class="fa fa-check-circle fa-lg text-navy"></i>
                    <span class="m-l-xs ">Branding</span>
                </li>
                <li>
                    <i class="fa fa-check-circle fa-lg text-navy"></i>
                    <span class="m-l-xs">Improved Marketability</span>
                </li>
                <li>
                    <i class="fa fa-check-circle fa-lg text-navy"></i>
                    <span class="m-l-xs">Increased Revenue</span>
                </li>
                <li>
                    <i class="fa fa-check-circle fa-lg text-navy"></i>
                    <span class="m-l-xs">Better quality products & services</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row m-t-lg">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Our core <span class="navy"> Services</span> </h1>
            <p>We Bring the excellent resources Together to Challenge Established Thinking and Drive the Transformation. Our ISO Certification Approach remains always simple for all types of businesses.</p>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-4 wow fadeInLeft animated">
            <div class="text-center">
                <i class="fa fa-handshake-o features-icon"></i>
                <h3 class="font-bold">ISO Consultation</h3>
            </div>
            <p class="text-justify">By well-experienced consultants who understand your business needs and ensure you with strong and Proper management system.</p>
        </div>
        <div class="col-md-4 wow fadeInRight animated">
            <div class="text-center">
                <i class="fa fa-hand-o-left features-icon"></i>
                <h3 class="font-bold"> ISO Implementation</h3>
            </div>
            <p class="text-justify">From Gap Analysis to External Audit, we support your company to implement the system to keep up-to the scope of your business as well as ISO Standards.</p>
        </div>
        <div class="col-md-4 wow fadeInRight animated">
            <div class="text-center">
                <i class="fa fa-hand-stop-o features-icon"></i>
                <h3 class="font-bold"> ISO Auditing</h3>
            </div>
            <p class="text-justify">We do support your organization to pass the external Audit. To ensure the Systematic Documentation and Process, We support you with IA Trainings.</p>
        </div>
    </div>  
    <div class="row m-t-lg m-b-lg">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Popular ISO <span class="navy">Certifications</span> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 9001:2015</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 14001:2015</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">OHSAS 18001:2007</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 22000:2005</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 27001:2013</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 13485:2016</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 29990:2010</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 20000:2011</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">HACCP</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <p class="btn btn-primary btn-outline m-b-md">ISO 50001</p>
        </div>
    </div>
</section>
<section class="blue-section">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-md-12"><h1 class="text-center">Having any query, talk to our experts</h1></div>
            <div class="col-md-12"><h2 class="text-center"><i class="fa fa-phone fa-lg"></i> +91 90295 79146</h2></div>
        </div>
    </div>
</section>

<section class="timeline gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row m-t-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>How does <span class="text-blue">ISO Certification</span> work?</h1>
                <p>An ISO registration enhances the reputation of your service or product. There are different types of ISO certifications your business can apply for such as ISO 9001, ISO 14001, ISO 5001, etc.</p>
            </div>
        </div>
        <div class="row features-block">

            <div class="col-lg-12">
                <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa-stack-1x"><strong>01</strong></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2>Create account <i class="fa fa-user-plus features-icon fa-sm"></i></h2>
                            <p>Create a free account by filling the registration form details. You will receive an account activation link, click on that link to activate your account.<br />You are done!</p>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa-stack-1x"><strong>02</strong></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2>Upload Documents <i class="fa fa-upload features-icon fa-sm"></i></h2>
                            <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa-stack-1x"><strong>03</strong></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2>Pay Online <i class="fa fa-money features-icon fa-sm"></i></h2>
                            <p>You can pay for our services in multiple ways including <span class="text-info">payment link</span>, Debit/Credit card payment and Internet Banking etc.</p>
                        </div>
                    </div>                    
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa-stack-1x"><strong>04</strong></i>
                        </div>
                        <div class="vertical-timeline-content">
                            <h2>Download Certificates <i class="fa fa-download features-icon fa-sm"></i></h2>
                            <p>You can download requested ISO certificate for your organization. We will make it available for you in your account link. You can download it from there.</p>
                        </div>
                    </div>                    

                </div>
            </div>

        </div>
    </div>

</section>

<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-md-12">
                <div class="navy-line"></div>
                <h1 class="text-center">Our success in numbers</h1>
            </div>
        </div>
        <div class="row countBox">

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="widget bg-info p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-coffee fa-3x"></i>
                        <h1 class="m-xs counter">1000</h1>
                        <h3 class="font-bold">Happy Customers</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="widget bg-success p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-globe fa-3x"></i>
                        <h1 class="m-xs counter">25</h1>
                        <h3 class="font-bold">Cities Presence</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="widget bg-primary p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-thumbs-up fa-3x"></i>
                        <h1 class="m-xs counter">1596</h1>
                        <h3 class="font-bold">Projects Completed</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="widget bg-dark p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-group fa-3x"></i>
                        <h1 class="m-xs counter">15</h1>
                        <h3 class="font-bold">Team Strength</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--signup model-->

