    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            echo form_open('Admin/Product/save_product', 'id="doAction" class="m-t" role="form"');
            echo    '<div class="form-group row">
                    <label class="col-lg-4 col-form-label">Certificate Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sTitle" name="sTitle">
                        <p class="text-danger" id="sTitle_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Certificate Price</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="price" name="price">
                        <p class="text-danger" id="price_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Offer Price</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="ofrPrice" name="ofrPrice">
                        <p class="text-danger" id="ofrPrice_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Short Description</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="sDesc" name="sDesc">
                        <p class="text-danger" id="sDesc_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Long Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" id="lDesc" name="lDesc"></textarea>
                        <p class="text-danger" id="lDesc_err"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Sample Certificate</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" id="sliderPic" name="sliderPic">
                        <p class="text-danger" id="sliderPic_err"></p>
                    </div>
                </div>
                                                                           
                <div class="form-group row">
                    <label class="col-lg-4"></label>
                    <div id="result_box" class="col-lg-8"><p class="text-danger" id="resp_err"></p></div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary m-b">Submit</button>
                    </div>
                </div>
            </form>';
        ?>
        </div>
    </div>