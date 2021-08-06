    <div class="wrapper wrapper-content animated fadeInRightBig">
        <div class="ibox-content">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Slider</th>
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
                        <td>'.$slider['heading'].'</td>
                        <td>'.$slider['slider_detail'].'</td>
                        <td><img src="'.base_url($slider['slider_image']).'" width="70px" alt="Slider" /></td>
                        <td>'.$sts.'</td>
                        <td><a href="'.BASE_URL_ADMIN.'Slider/edit/'.$slider['id'].'" title="Click to edit"><i class="fa fa-edit"></i></a></td>
                        </tr>';
                        $k++;
                    }
                }
                else
                {
                    echo '<tr><td colspan="6">Sorry!, No slider found</td></tr>';
                }
        
            
        ?>
                </tbody>
            </table>
        </div>
    </div>