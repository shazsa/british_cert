
<div id="inSlider">
    <img src="<?php echo base_url('assets/img/services.jpg');?>" width="100%">
</div>

<?php
if($cert!=null){ ?>
<section  class="container features">
    <div class="row features-block">
        <div class="col-md-4 col-lg-6 features-text wow fadeInLeft">
            <div class="navy-line" style="margin: 0"></div>
            <?php 
            echo '<h1>'.$cert->certificate_name.'</h1>
                <p class="text-justify">'.$cert->short_desc.'</p>';
            if($cert->offer_price > 0)
            {
                echo '<h3 class="text-navy">Offer Price <i class="fa fa-inr"></i> '. $cert->offer_price.'</h3>
                        <h5> Actual Price <del><i class="fa fa-inr"></i> '. $cert->certificate_price.'</del></h5>';
            }
            else {
                echo '<h3 class="text-navy">Actual Price <i class="fa fa-inr"></i> '. $cert->certificate_price.'</h3>'; 
            }?>
            <p><a href="#" class="btn btn-primary btn-outline"><i class="fa fa-paper-plane"></i> Enquiry now</a><a href="#" class="btn btn-primary float-right"><i class="fa fa-shopping-cart"></i> Apply now</a></p>
        </div>
        <div class="col-md-8 col-lg-6 text-right wow fadeInRight">
            <img src="<?php echo base_url($cert->certificate_image);?>" alt="dashboard" class="img-fluid float-right">
        </div>
    </div>
    <div class="row m-b-lg m-t-lg">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Details of <span class="navy"><?php echo $cert->certificate_name; ?></span> </h1>
        </div>
        <div class="col-sm-12 cert-details">
            <?php echo $cert->long_desc;?>
        </div>
    </div>
</section>
<?php } ?>
<section class="gray-section">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-md-12">
                <div class="navy-line"></div>
                <h1 class="text-center">Othe matching <span class="navy">certifications</span></h1>
            </div>
        </div>
        <div class="row countBox m-t-lg m-b-lg">
            <?php
            $certs = $matchingCert->result_array();
            if(count($certs) > 0)
            {
                foreach ($certs as $cert)
                {
                    echo '<div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="widget-head-color-box navy-bg p-sm text-center">
                            <h3>'.$cert['certificate_name'].'</h3>
                        </div>
                        <div class="widget-text-box">
                            <p>'.substr($cert['short_desc'],0,150).'...</p>
                            <a href="'.base_url('Certification/').$cert['page_slug'].'" class="btn btn-sm btn-outline btn-primary">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>';
                }
            } ?>
            
        </div>
    </div>
</section>
<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-md-12"><h1 class="text-center">Having any query, talk to our experts</h1></div>
            <div class="col-md-12"><h2 class="text-center"><i class="fa fa-phone fa-lg"></i> +91 90295 79146</h2></div>
        </div>
    </div>
</section>
<!--signup model-->
