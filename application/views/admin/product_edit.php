    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            if($slider === null)
            {
                echo '<p class="text-danger">Sorry!, no details found</p>';
            }
            else
            {
                $sts = $slider->status;
                echo form_open('Admin/Product/update_certificate', 'id="doAction" class="m-t" role="form"');
                echo '<input type="hidden" name="slider_id" value="'.$slider->id.'">';
                echo '<input type="hidden" name="slider_img" value="'.$slider->certificate_image.'">';
                echo '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Certificate Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sTitle" name="sTitle" value="'.$slider->certificate_name.'">
                        <p class="text-danger" id="sTitle_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Certificate Price</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="price" name="price" value="'.$slider->certificate_price.'">
                        <p class="text-danger" id="price_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Offer Price</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="ofrPrice" name="ofrPrice" value="'.$slider->offer_price.'">
                        <p class="text-danger" id="ofrPrice_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Short Description</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sDesc" name="sDesc" value="'.$slider->short_desc.'">
                        <p class="text-danger" id="sDesc_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Long Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control summernote" id="lDesc" name="lDesc">'.$slider->long_desc.'</textarea>
                        <p class="text-danger" id="lDesc_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Certificate Image</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" style="width:50%;display:inline-block" id="sliderPic" name="sliderPic">
                        <img src="'.base_url($slider->certificate_image).'" alt="Slider image" width="100px" />
                        <p class="text-danger" id="sliderPic_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Status</label>
                    <div class="col-lg-8">
                            <select class="form-control" name="status">';
                            if($sts){
                                echo '<option value="1" selected="selected">Active</option>';
                                echo '<option value="0">In-Active</option>';
                            }
                            else
                            {
                                echo '<option value="0" selected="selected">In-Active</option>';
                                echo '<option value="1">Active</option>';
                            }
                            echo '<option value="delete">Delete</option>
                            </select> 
                        <p class="text-danger" id="status_err"></p>
                    </div>
                </div>
                                                                             
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div id="result_box" class="col-lg-8"><p class="text-danger" id="resp_err"></p></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary m-b">Update</button>
                        <button type="reset" class="btn btn-primary btn-outline m-b">Reset</button>
                    </div>
                </div>
            </form>';
        }
        ?>
        </div>
    </div>