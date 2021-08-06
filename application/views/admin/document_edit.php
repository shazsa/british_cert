    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <?php
            if($document!== null)
            {
                echo form_open('Admin/Document/docRejApprove', 'id="doAction" class="m-t" role="form"');
                echo    '<div class="form-group">
                    <label class="col-lg-4 col-form-label">Document</label>
                    <div class="col-lg-8">
                    <input type="hidden" name="doc_id" value="'.$document->id.'">
                        <input type="text" class="form-control" name="crntUser" value="'.$document->documentName.'">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 col-form-label">File Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="'.explode('/', $document->document_path)[3].'">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 col-form-label">Current Status</label>
                    <div class="col-lg-8">
                        <select id="docSts" name="docSts" class="form-control">
                            <option value="">--select--</option>';?>
                            <option value="Approved" <?php if($document->status=='Approved'){echo 'selected="selected"';}?>>Approve</option>
                            <option value="Rejected" <?php if($document->status=='Rejected'){echo 'selected="selected"';}?>>Reject</option>
                            <option value="Inprogress" <?php if($document->status=='Inprogress'){echo 'selected="selected"';}?>>Inprogress</option>
                        </select>
                        <p class="text-danger" id="docSts_err"></p>
                    </div>
                </div>   
                <div class="form-group" id="reasonRow">
                    <?php
                    if($document->status=='Rejected'){
                        echo '<label class="col-lg-4 col-form-label">Reject reason</label><div class="col-lg-8"><input type="text" name="rejRsn" id="rejRsn" class="form-control" value="'.$document->reason.'"><p class="text-danger" id="rejRsn_err"></p></div>';
                    }?>
                </div>
                <div class="form-group">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Save Changes</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline btn-lg m-b btn-primary">Reset</button>
                    </div>
                </div>
                <div class="form-group">
                    <div id="result_box"><p class="text-danger" id="resp_err"></></div>
                </div>
            </form>
            <?php }
            else{
                echo 'Sorry! document not found';
                }?>
        </div>
    </div>