    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Document</th>
                    <th>File Name</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Uploaded On</th>
                    <th>&nbsp;</th>
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
                                    <td>'.$doc['email'].'</td>
                                    <td>'.$sts.'</td>
                                    <td>'.date('Y-m-d',strtotime($doc['uploaded_date'])).'</td>
                                    <td><a href="'.BASE_URL_ADMIN.'Document/edit/'.$doc['id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td></tr>';
                                $i++;
                            }
                        }
                        else
                        {
                            echo '<tr><td colspan="6">Sorry! No documents found.</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
        </div>
    </div>