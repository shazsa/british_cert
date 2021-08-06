<div id="inSlider">
    <img src="<?php echo base_url('assets/img/p_big2.jpg');?>" alt="Header" width="100%" class="img-responsive">
</div>

<!--password reset model-->
<section>
    <div class="container">        
        <div class="row justify-content-md-center">                              
            <div class="col-12 col-lg-8 ml-lg-2 mr-lg-2">
            <div class="card">
                <div class="card-header bg bg-primary">
                    <h4>Account Activation</h4>
                </div>
                <?php if(isset($isValid))
                {
                    echo '<div class="card-body">'.$isValid.'</div>';
                }
                if(isset($inValid))
                {
                    echo '<div class="card-body">
                        <p class="text-danger">Sorry!, Your account activation link is either invalid or has been expired.</p>
                        <p class="text-info">Please contact site administrator.</p>
                    </div>';
                }
                ?>  
                <div class="card-footer"></div>                    
            </div>
            </div>                   
        </div>            
    </div>
</section>