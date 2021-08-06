    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/Slider/save_slider', 'id="doAction" class="m-t" role="form"');
            echo '<div class="form-group row"><div class="col-sm-4"></div>
                    <div class="col-sm-8"><p class="text-navy m-b-none"><span class="text-danger font-bold">*</span> Image size should be max 500kb.</p>
                        <p class="text-navy"><span class="text-danger font-bold">*</span> Image dimension must be exactly 1350 x 500 in px</p></div></div>';
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Title</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sTitle" name="sTitle">
                        <p class="text-danger" id="sTitle_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Description</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="readMore" name="readMore">
                        <p class="text-danger" id="readMore_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Image</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" id="sliderPic" name="sliderPic">
                        <p class="text-danger" id="sliderPic_err"></p>
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
        ?>
        </div>
    </div>