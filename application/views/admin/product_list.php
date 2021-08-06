    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sliders = $sliders->result_array();
                if(count($sliders) > 0 )
                {
                    $k = 1;
                    foreach ($sliders as $slider)
                    {
                        $sts  = $slider['status'];
                        $sts = $sts ? '<span class="text-success">Active</span>' : '<span class="text-warning">In-Active</span>';

                        echo '<tr>
                        <td>'.$k.'</td>
                        <td>'.$slider['certificate_name'].'</td>
                        <td>'.$slider['certificate_price'].'</td>
                        <td>'.$slider['short_desc'].'</td>
                        <td><img src="'.base_url($slider['certificate_image']).'" width="80px" alt="certificate image" /></td>
                        <td>'.$sts.'</td>
                        <td><a href="'.BASE_URL_ADMIN.'Product/edit/'.$slider['id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
                        </tr>';
                        $k++;
                    }
                }
                else
                {
                    echo '<tr><td colspan="6">Sorry!, No certificate found</td></tr>';
                }
        
            
        ?>
                </tbody>
            </table>
        </div>
    </div>