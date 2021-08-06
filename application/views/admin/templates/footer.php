    <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/inspinia.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/summernote/summernote-bs4.js');?>"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		new_documents_count();
    		setInterval(function(){new_documents_count();}, 6000);
 		});

	    function new_documents_count(){
	        $.ajax({   
	            url: "<?php echo base_url("Admin/Notify/newDocuments");?>",
	            type: 'POST',
	            dataType: "json",
	            cache:false,
	            success:function(resp){
	            	$('#side-menu #doc_count span').last().text(resp.docCount);
	            }
	        });
	    }
        $('.summernote').summernote();

       
    </script>

</body>

</html>