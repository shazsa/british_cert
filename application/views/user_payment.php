<div id="inSlider" class="carousel slide" data-ride="carousel">
    <img src="<?php echo base_url('assets/img/p5.jpg');?>" class="img-responseive" width="100%">
</div>
<section id="team" class="feature team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <?php echo '<p>Welcome back to '.SITE_NAME.'</p>'; ?>
            </div>
        </div>
        <div class="row m-b-lg" >
            <div class="col-sm-12">  
                <nav class="nav  nav-pills">
                    
                    <a href="<?php echo base_url('User/dashboard/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php echo ($page=='signed') ? 'active':''?>">Dashboard</a>
                    <a href="<?php echo base_url('User/listDocument/').substr(md5($this->session->userdata('user_id')), 0, 15);?>" class="nav-item nav-link <?php echo ($page=='document') ? 'active':''?>">Upload Document</a>
                    <a href="#" class="nav-item nav-link <?php echo ($page=='pay') ? 'active':''?>">Make Payment</a>
                    <a href="#" class="nav-item nav-link <?php echo ($page=='report') ? 'active':''?>">Reports</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="gray-section">
    <div class="container">
        <div class="row m-b-lg">
            
            <div class="col-md-8">
            <?php echo form_open('User/saveDocument', 'id="userDocFrm" class="m-t" role="form"');?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Document Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="docName" name="docName">
                        <p class="text-danger" id="docName_err"></p>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-4 col-form-label">Select File</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" id="userDoc" name="userDoc">
                        <p class="text-danger" id="userDoc_err"></p>
                    </div>
                </div>
                                                                           
                <div class="row">
                    <div id="result_box"><p class="text-danger" id="data_err"></p></div>
                    <div class="sk-spinner sk-spinner-wave" style="height: 15px; display: none;">
                        <div class="sk-rect1"></div>
                        <div class="sk-rect2"></div>
                        <div class="sk-rect3"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-4 col-form-label"></label>
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary btn-lg m-b">Upload</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>


<section id="docList">
    <div class="container">
        <div class="row m-t-lg">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Document</th>
                            <th>File Name</th>
                            <th>Status</th>
                            <th>Reason</th>
                            <th>Uploaded</th>
                            <th>Approved</th>
                            <th>Rejected</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $docs = $docs->result_array();
                        if(count($docs) > 0)
                        {
                            $i = 1;
                            foreach ($docs as $doc) 
                            {
                                if($doc['approved_on'])
                                {
                                    $apr_date = date('Y-m-d', strtotime($doc['approved_on']));
                                }
                                else
                                {
                                    $apr_date = '';
                                }
                                if($doc['rejected_on'])
                                {
                                    $rej_date = date('Y-m-d', strtotime($doc['rejected_on']));
                                }
                                else
                                {
                                    $rej_date = '';
                                }

                                if($doc['status'] =='Inprogress')
                                {
                                    $sts = '<span class="text-info">'.$doc['status'].'</span>';
                                }
                                elseif($doc['status'] == 'Rejected')
                                {
                                    $sts = '<span class="text-danger">'.$doc['status'].'</span>';
                                }
                                elseif($doc['status'] == 'Approved')
                                {
                                    $sts = '<span class="text-success">'.$doc['status'].'</span>';
                                }
                                echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$doc['documentName'].'</td>
                                    <td><a href="'.base_url($doc['document_path']).'" target="_blank">'.explode('/', $doc['document_path'])[3].'</a></td>
                                    <td>'.$sts.'</td>
                                    <td>'.$doc['reason'].'</td>
                                    <td>'.date('Y-m-d', strtotime($doc['uploaded_date'])).'</td>
                                    <td>'.$apr_date.'</td>
                                    <td>'.$rej_date.'</td></tr>';
                                $i++;
                            }
                        }
                        else
                        {
                            echo '<tr><td colspan="8">Sorry! No documents found.</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

