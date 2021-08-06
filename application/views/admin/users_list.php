    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $members = $members->result_array();
                if(count($members) > 0 )
                {
                    $k = 1;
                    foreach ($members as $member)
                    {
                        $sts  = $member['status'];
                        $verify  = $member['is_verified'];
                        if($sts ==0 and $verify == 0)
                        {
                            $sts = '<span class="text-warning">Un-verified</span>';
                        }
                        elseif($verify and $sts)
                        {
                            $sts = '<span class="text-success">Active</span>';
                        }
                        elseif( $verify and $sts==0 )
                        {
                            $sts = '<span class="text-danger">Suspended</span>';
                        }
                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$member['first_name'].' '.$member['middle_name'].' '.$member['last_name'].'</td>
                        <td>'.$member['email'].'</td>
                        <td>'.$member['mobile'].'</td>
                        <td>'.$sts.'</td>
                        <td><a href="'.BASE_URL_ADMIN.'Member/edit/'.$controller->encodeData($member['id']).'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
                        </tr>';
                        $k++;
                    }
                }
                else
                {
                    echo '<tr><td colspan="6">Sorry!, No users found</td></tr>';
                }
        
            
        ?>
                </tbody>
            </table>
        </div>
    </div>