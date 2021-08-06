
<div id="inSlider">
    <img src="<?php echo base_url('assets/img/services.jpg');?>" alt="services" width="100%">
</div>

<section  class="container features">
    <div class="row m-b-lg m-t-lg">
        <div class="col-sm-12 text-center wow fadeInLeft">
            <div class="navy-line"></div>
            <h1><span class="navy">ISO Certification</span> Online</h1>
        </div>
        <div class="col-sm-12">
            <p class="text-justify">The International Organization for standardization is non-governmental. It means that it not connected to any government organization in the world. People prefer the standards of ISO as it is globally recognizable hence it can even create trusts in the mind of the customers. ISO mainly focuses on quality due to this it meets the customer requirements. ISO 9001 belongs to the family of ISO 9000. In the World, the ISO 9001 Standard is a widely used management system.</p>
            <p class="text-justify">Now you can apply for ISO certification online with us and get it easier to certify your company with us.</p>
            <p class="text-justify">So Let’s kick start your business with the high-end ISO certification in India. We provide all the ISO 9001 certifications, such as ISO 9001, 14001, 45001 etc, and the certification of other standards created by the ISO organization. We also offer the other well-known certifications created by the large scale bodies. These ISO 9001 is a popular standard in the world. If you have wanted to take information about the criteria, then you can contact us. We commit our customers to certify legally and give them first priority.</p>
            <p class="text-justify">We have an experienced team and a huge network that will help you to get your company ISO certified. You just have to submit your basic details and we will contact you through that information and you can apply for ISO certification online. Our company is located in Delhi, so we also provide Online ISO certification in Delhi and all over India. We have made the process of certification easier for our customers and our customers can apply for the ISO certification online by submitting their documents online.</p>
            <p class="text-justify">We offer reliability and support in the process of ISO 9001 certification by updating our customers the tracking of their ISO certificate.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="navy-line" style="margin:0"></div>
            <h1>How does <span class="navy">ISO certification</span> help?</h1>
            <p class="text-justify">The ISO certification or certification provided by the International Organization for Standardization can help a company to abide by a certain set of laws that will ensure the safety of the workers and the employees along with the customers who enjoy its services. The ISO certified companies gain more credibility among the customers.</p>
            <p class="text-justify">The ISO certification is provided to the companies to make sure that they are abiding by the rules of the international standards. These standards can provide a certain limitation to some of the products to ensure the safety of the employees and the customers at the same time. When a company has an ISO certification, there is a possibility that the customers will have more trust in it. Our company can provide ISO certification online.</p>
        </div>
        <div class="col-sm-12 m-t-md">
            <div class="navy-line" style="margin: 0"></div>
            <h1>What are the <span class="navy">types of ISO</span> certification?</h1>
            <p class="text-justify">There are about 21740 types of ISO certification. However, the most common and generic types of ISO certification are ISO 14001 and ISO 9001. These are the types that are mostly availed by companies.</p>
            <ul class="todo-list m-t ">
                <li><i class="fa fa-check text-navy"></i> ISO 9001 - Quality Management</li>
                <li><i class="fa fa-check text-navy"></i> ISO 27000 - Information Security Management Systems</li>
                <li><i class="fa fa-check text-navy"></i> ISO 14001 - Environmental Management</li>
                <li><i class="fa fa-check text-navy"></i> ISO 50001- 2018 - Energy Management</li>
                <li><i class="fa fa-check text-navy"></i> ISO 45001 - Occupational Health and Safety</li>
                <li><i class="fa fa-check text-navy"></i> ISO 22000 - Food Management Systems</li>
                <li><i class="fa fa-check text-navy"></i> ISO 29990 - Education and Training Management</li>
            </ul>
        </div>
    </div>
    

</section>
<section class="gray-section">
    <div class="container">
        <div class="row m-t-lg m-b-lg">
            <div class="col-md-12">
                <div class="navy-line"></div>
                <h1 class="text-center">Available <span class="navy">Certifications</span></h1>
            </div>
        </div>
        <div class="row m-b-xl">
            <?php
           // echo '<pre>';
            //print_r($certs->result_array());
            $certs = $certs->result_array();
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
            }
            ?>
            
            
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
