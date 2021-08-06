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
                echo form_open('Admin/Slider/update_slider', 'id="doAction" class="m-t" role="form"');
                echo '<input type="hidden" name="slider_id" value="'.$slider->id.'">';
                echo '<input type="hidden" name="slider_img" value="'.$slider->slider_image.'">';
                echo '<div class="form-group row"><div class="col-sm-4"></div>
                    <div class="col-sm-8"><p class="text-navy m-b-none"><span class="text-danger font-bold">*</span> Image size should be max 500kb.</p>
                        <p class="text-navy"><span class="text-danger font-bold">*</span> Image dimension must be exactly 1350 x 500 in px</p></div></div>';
                echo '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Title</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sTitle" name="sTitle" value="'.$slider->heading.'">
                        <p class="text-danger" id="sTitle_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Description</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="readMore" name="readMore" value="'.$slider->slider_detail.'">
                        <p class="text-danger" id="readMore_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Image</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" style="width:50%;display:inline-block" id="sliderPic" name="sliderPic">
                        <img src="'.base_url($slider->slider_image).'" alt="Slider image" width="100px" />
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
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8" id="result_box"><p class="text-danger" id="resp_err"></p></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Submit</button>
                    </div>
                </div>
                </form>';
            }
        ?>
        </div>
    </div>