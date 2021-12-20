<?php $id = $this->session->userdata('id'); if($id == ''){ redirect('login'); } ?> 
<html lang="en" data-base-url="<?php echo base_url(); ?>">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $title_for_layout; ?></title>
      <link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon" />
      <!-- fontawesome icon -->
	  <link href="https://fonts.googleapis.com/css?family=Muli:400,700,900&display=swap" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
      <link href="<?php echo VENDOR_URL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>fonts/fontawesome/css/fontawesome-all.min.css">
      <!-- animation css -->
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/animation/css/animate.min.css">
      <!-- notification css -->
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/notification/css/notification.min.css">
      <!-- vendor css -->
	  <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/modal-window-effects/css/md-modal.css">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/style.css">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/data-tables/css/datatables.min.css">
      <link rel="stylesheet" href="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" href="<?php echo VENDOR_URL; ?>datatables/buttons.dataTables.min.css" >
      <link rel="stylesheet" href="<?php echo CSS_URL; ?>custom.css" >
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css">
	  
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/smart-wizard/css/smart_wizard.min.css">
      <!--<link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/smart-wizard/css/smart_wizard_theme_arrows.min.css">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/smart-wizard/css/smart_wizard_theme_circles.min.css">
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/smart-wizard/css/smart_wizard_theme_dots.min.css">-->
      <link rel="stylesheet" href="<?php echo ASSET_URL; ?>fonts/material/css/materialdesignicons.min.css">
      <?php //$this->load->view('layout/rtl-css'); ?> 
       
       <link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/multiselect.css">  
      <!-- jQuery -->
      <script src="<?php echo JS_URL; ?>jquery-3.4.1.min.js"></script> 
      <script src="<?php echo JS_URL; ?>jquery.validate.js"></script>
	  <style>
	  table tbody tr td img{
		  max-width:30px !important;
		  border-radius:50px;
	  }
	  .bd-example-modal-lg .modal-dialog{
		display: table;
		position: relative;
		margin: 0 auto;
		top: calc(50% - 24px);
	  }

  .bd-example-modal-lg .modal-dialog .modal-content{
		background-color: transparent;
		border: none;
    }.form_m .nav-tabs .nav-link.active{
			  border: 1px solid #dee2e6 !important;
			  border-bottom: none !important;
	}/* .form_m .nav-tabs .nav-link{
		  padding: 5px 10px 5px !important;
	} */
   ul.pager.text-right {
		position: absolute;
		right: 130px;
		top: 12px;
	}
  .width-200 {
    width: 200px;
}
	.pager button {
		background-color: #098e57;
		color: #fff;
		padding: 6px 20px;
		border-radius: 5px;
	}
	.tri
	{
		right: 100px;
    position: absolute;
    top: 2px;
	}
	/* .mainLoader .modal-backdrop { opacity: 0 !important; } */
	/* .modal-backdrop { opacity: 0 !important; } */
	.pcoded-navbar .pcoded-inner-navbar li > a {
		text-transform:uppercase;
		font-size: 95%;
		font-weight: 900;
}.pcoded-navbar .pcoded-inner-navbar li.pcoded-hasmenu .pcoded-submenu li > a {
    
    padding: 7px 7px 7px 45px;
    font-size:80%;
}.nav a{
	text-transform:uppercase;
	 font-size:85%;
}table thead th{
	text-transform:uppercase;
	    font-size: 80%  !important;
}.pcoded-navbar .pcoded-inner-navbar li.pcoded-hasmenu .pcoded-submenu li > a:before {
    top: 13px !important;
 }.sweet-alert button.cancel {
    background-color: #c1c1c1;
    color: white;
    position: relative;
    left: 0px;
}
   .blankTr td {
		font-weight: 700;
		padding: 10px 15px 10px 5px;
		background: #12599a;
		color: #fff;
   }.bg-blue th, .bg-blue td{
	   color:#fff !important;
   } table .custom-select, .form-control {
    min-width: 180px;
}.info{
	background-color: #f3f2fb;
} .col-md-12 a.modal-trigger {color:#ef0000;font-weight:600;}

.btn-group {
    width: 100% !important;
    border: 1px solid #d2d0d0;
    border-radius: 4px;
    text-align: left !important;
}

ul.multiselect-container.dropdown-menu.show {
    max-height: 400px;
    width: 100%;

}

button.multiselect.dropdown-toggle.btn.btn-default {
  width: 100% !important;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: left;
    height: 45px;
}
/* .table>tbody>tr>td { */
    /* padding: 10px; */
    /* padding: 6px;
    word-break: break-word;
    white-space: inherit; */
/* } */

.modal-body {
    height: 70vh;
    overflow: auto;
}

   </style>
   </head>
   <body>
      <?php $this->load->view('layout/left-side'); ?>   
      <?php $this->load->view('layout/header');  ?>   
      <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
         <div class="pcoded-content">
            <div class="pcoded-inner-content">
               <!-- [ breadcrumb ] start -->
               <div class="page-header">
                  <div class="page-block">
                     <div class="row align-items-center">
                        <div class="col-md-12">
                           <div class="page-header-title"></div>
                           <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="feather icon-home"></i> Home</a></li>
                             
                              <?php 
                              $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                              $uri_segments = explode('/', $uri_path);

                              if($uri_segments[5] =='detail_view'){
                                 $page_url=current_url();
                              $page1 = basename($page_url);
                              $mystring = $page1;
                              $first = strtok($mystring, '.');
                              // echo $first;
                              
                              $ent_id = get_sub_product_lic('licensee_subsector','subsector_id','entity_id',$first);        
                                // print_r($ent_id); 
                               foreach($ent_id as $key=> $value) {
                                
                               $ee = _entitysubSectorbymultiSector($first, $value); 

                               // print_r($ee); exit;
                          
                               if(!empty($ee)){ 
                              // himanshu changes start
                                      
                              $ss_name = $ee->sector_id;
                              // echo $ss_name;       
                              $sub = $ee->subsector_name;
                              ?>
 <li class="breadcrumb-item"><a href="<?php if(isset($_SESSION['sec']) && $_SESSION['sec'] !=''){ echo base_url('companies/entity/index/'. $ss_name.'.afsc'); }  ?>"><?php echo $sub; ?></a></li>
                      
                            <?php // himanshu changes end
                              } 
                              
                            
                             }
                            
                              
                           }else{

                              ?>
                              <li class="breadcrumb-item"><a href="<?php if(isset($_SESSION['sec']) && $_SESSION['sec'] !=''){ echo base_url('companies/entity/index/'.$_SESSION['sec']); }  ?>"><?php echo $title_for_layout; ?></a></li>
                            <?php } ?>             
                              
                              <?php if(!empty($second_title_for_layout)): $page_url=current_url(); ?>
                                                          
                                             <li class="breadcrumb-item"><a href="<?=$page_url?>"><?=$second_title_for_layout?></a></li>
                              <?php endif;?>
                           </ul>
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loaderM" id="mod" style="display:none;">Open Modal</button>
        		<div class="mainLoader">
						  <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1" style="background: rgba(255, 255, 255, 0.4);" id="loaderM">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<svg viewBox="0 0 760 100">
      								<symbol id="s-text">
      									<text text-anchor="middle" x="50%" y="80%">ARIAS</text>
      								</symbol>
      								<g class = "g-ants">
      									<use xlink:href="#s-text" class="text-copy"></use>
      									<use xlink:href="#s-text" class="text-copy"></use>
      									<use xlink:href="#s-text" class="text-copy"></use>
      									<use xlink:href="#s-text" class="text-copy"></use>
      									<use xlink:href="#s-text" class="text-copy"></use>
      								</g>
      							</svg>
							     <img src="<?php echo base_url();?>assets/images/loaders.gif" style="margin-left:42%;margin-right:auto;width:18%;">
							<!--<span>Loading....</span>-->
									</div>
								</div>
						   </div>
							</div>
                        </div>
                     </div>
                  </div>
              </div>
                  <!-- [ breadcrumb ] end -->
                  <div class="main-body">
                     <?php $this->load->view('layout/message'); ?>
                     <!-- page content -->
                     <?php  echo $content_for_layout; ?>
                     <!-- /page content -->      
				 
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <!-- footer content -->
 <!-- FIRST MODAL content -->

<div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel" style="color:black;">Development Instructions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
            <table class="table table-hover modeltable">
  <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Table Name</th>
    <th scope="col">Developer Name</th>
	  <th scope="col">Developer Comment</th>
	  <th scope="col">Created_at</th>
	  <th scope="col">Updated_at</th>
	  <!-- <th scope="col">Action</th> -->

    </tr>
  </thead>
  <tbody>
	  
  </tbody>
  <div class="modal-footer">
		 <button type="button" class="btn btn-primary myBtn_multi" data-toggle="modal" data-target="#exampleModal">ADD</button>
		  <!-- <button type="button" class="btn btn-primary myBtn_multi" data-toggle="modal" data-target="#editModal">EDIT</button> -->
    </div>
	
 </table> 
            </div>
            </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
        </div>
    </div>
</div>

<!-- END FIRST MODAL content -->

<!--   Add model  --->
<div class="modal fade modal_multi" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Add</h5>
                <button type="button" class="close close_multi" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="add_first">
                    <input type="hidden" class="form-control" id="sector_id" name="sector_id" value=" <?php echo $_SESSION['sec']; ?>">
                    <div class="form-group">
                        <label>Select Table</label>
                        <select id="table_name" name="table_name[]" multiple class="form-control">
                          <?php 
                         $result= $this->db->get('table_structure')->result_array();
                         foreach($result as $a){
                          ?>
                            <option value="<?php echo $a['table_name'];?>"><?php echo $a['table_name'];?></option>
                         <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Developer Name:</label>
                        <textarea class="form-control" id="developer_name" name="developer_name"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Developer Comment:</label>
                        <textarea class="form-control" id="developer_comment" name="developer_comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select Status:</label>
                        <select class="form-control" id="comment_status" name="comment_status">
                            <option value="0">Enable</option>
                            <option value="1">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_comment">Save </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End add Modal --->


<!--   EDIT model  --->
<div class="modal fade modal_multi" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel" style="color:black;">EDIT</h5>
                <button type="button" class="close close_multi" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="add_first">
                    <input type="hidden" class="form-control" id="sector_id" name="sector_id" value=" <?php echo $_SESSION['sec']; ?>">
                    <div class="form-group">
                        <label>Select Table</label>
                        <select id="edit_table_name" name="edit_table_name[]" multiple class="form-control">
                        <?php 
                         $result1= $this->db->get('table_structure')->result_array();
                         foreach($result1 as $b){
                          ?>
                            <option value="<?php echo $b['table_name'];?>"><?php echo $b['table_name'];?></option>
                         <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Developer Name:</label>
                        <textarea class="form-control" id="developer_name" name="developer_name"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Developer Comment:</label>
                        <textarea class="form-control" id="developer_comment" name="developer_comment"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select Status:</label>
                        <select class="form-control" id="comment_status" name="comment_status">
                            <option value="0">Enable</option>
                            <option value="1">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_comment">Save </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End EDIT Modal --->

      <?php //$this->load->view('layout/footer'); ?>   
      <!-- /footer content -->
	   <?php $this->load->view('layout/modal'); ?> 
        <script src="<?php echo base_url();?>assets/js/image_path.js"></script>
        <script src="<?php echo ASSET_URL; ?>js/vendor-all.min.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/bootstrap/js/bootstrap.min.js"></script>

        <script src="<?php echo ASSET_URL; ?>js/pcoded.min.js"></script>
        <!---<script src="<?php echo ASSET_URL; ?>js/menu-setting.min.js"></script>-->
        <script src="<?php echo ASSET_URL; ?>plugins/notification/js/bootstrap-growl.min.js"></script>
        <!-- dashboard-custom js -->
        <script src="<?php echo ASSET_URL; ?>plugins/amchart/js/amcharts.js"></script><!--
        <script src="<?php echo ASSET_URL; ?>js/pages/dashboard-custom.js"></script>--><!--
        <script src="<?php echo ASSET_URL; ?>plugins/data-tables/js/datatables.min.js"></script>-->	    
        


        <!-- <script src="<?php echo VENDOR_URL; ?>datatables/tools/jquery.dataTables.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/dataTables.buttons.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/pdfmake.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/jszip.min.js"></script>
        
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/buttons.html5.min.js"></script> 		 -->



        <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script> -->
        <script src="<?php echo ASSET_URL; ?>js/datatables.min.js"></script>
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css" rel="stylesheet" type="text/css" /> -->
        <script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/dataTables.buttons.js"></script>
        <!-- <link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.css" rel="stylesheet" type="text/css" /> -->
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/buttons.html5.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/jszip.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/pdfmake.min.js"></script>
        <script src="<?php echo VENDOR_URL; ?>datatables/tools/vfs_fonts.js"></script>

        <script src="<?php echo ASSET_URL; ?>js/bootstrap-multiselect.min.js"></script>  
        <script type="text/javascript" src="<?php echo VENDOR_URL; ?>toastr/toastr.min.js"></script>
        <link href="<?php echo VENDOR_URL; ?>toastr/toastr.min.css" rel="stylesheet">
        <link href="<?php echo ASSET_URL; ?>css/jquery-ui.css" rel="stylesheet">
        <script src="<?php echo JS_URL; ?>jquery.inputmask.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/idi.js"></script>
        
        <script src="<?php echo JS_URL; ?>custom.js"></script>
        <script src="<?php echo JS_URL; ?>PNotify.js"></script>
        <script src="<?php echo JS_URL; ?>PNotifyStyleMaterial.js"></script>
        <script src="<?php echo JS_URL; ?>moment-with-locales.min.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <script src="<?php echo ASSET_URL; ?>js/pages/form-picker-custom.js"></script>
        <script src="<?php echo ASSET_URL; ?>js/jquery.dataTables.rowGrouping.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/modal-window-effects/js/classie.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
        <script src="<?php echo ASSET_URL; ?>js/pages/wizard-custom.js"></script>
        <script src="<?php echo ASSET_URL; ?>plugins/modal-window-effects/js/modalEffects.js"></script>
		    <script src="<?php echo ASSET_URL; ?>js/jquery-ui.js" ></script>
		    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/select2.min.css" />
        <script src="<?php echo ASSET_URL; ?>/js/select2.min.js"></script>
		    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/sweetalert.min.css">
        <script src="<?php echo ASSET_URL; ?>js/sweetalert.min.js"></script>
		<!--
		<link rel="stylesheet" href="<?php echo ASSET_URL; ?>plugins/sweetalert/js/sweetalert.min.js">-->

      <script type="text/javascript">
         <?php if($this->session->flashdata('success_')){ ?>
             toastr.success("<?php echo $this->session->flashdata('success_'); ?>");
             //success("<?php echo $this->session->flashdata('success_'); ?>");
         <?php }else if($this->session->flashdata('error_')){  ?>
            // error("<?php echo $this->session->flashdata('error_'); ?>");
            toastr.error("<?php echo $this->session->flashdata('error_'); ?>");
         <?php }else if($this->session->flashdata('warning')){  ?> 
             toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
             //warning("<?php echo $this->session->flashdata('warning'); ?>");
         <?php }else if($this->session->flashdata('info')){  ?>
             //info("<?php echo $this->session->flashdata('info'); ?>");
             toastr.info("<?php echo $this->session->flashdata('info'); ?>");
         <?php } ?> 
         </script>
      <script type="text/javascript">    
         /* jQuery.extend(jQuery.validator.messages, {
                 required: "<?php echo $this->lang->line('required_field'); ?>",
                 email: "<?php echo $this->lang->line('enter_valid_email'); ?>",
                 url: "<?php echo $this->lang->line('enter_valid_url'); ?>",
                 date: "<?php echo $this->lang->line('enter_valid_date'); ?>",
                 number: "<?php echo $this->lang->line('enter_valid_number'); ?>",
                 digits: "<?php echo $this->lang->line('enter_only_digit'); ?>",
                 equalTo: "<?php echo $this->lang->line('enter_same_value_again'); ?>",
                 remote: "<?php echo $this->lang->line('pls_fix_this'); ?>",
                 dateISO: "Please enter a valid date (ISO).",
                 maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                 minlength: jQuery.validator.format("Please enter at least {0} characters."),
                 rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                  range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                 max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                 min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
             });  */
      </script> 
<script type="text/javascript">
		   $(document).ready(function(){
		   
		   $(document.body).on('click', '.members', function(){
			  $(this).select2({
				 dropdownParent: $(document.body).find('#myModal .modal-content'),
				 ajax: { 
				   url: '<?php echo base_url();?>/dashboard/members',
				   type: "post",
				   dataType: 'json',
				   delay: 250,
				   data: function (params) {
					  return {
						searchTerm: params.term // search term
					  };
				   },
				   processResults: function (response) {
					  return {
						 results: response
					  };
				   },
				   cache: true
				 }
			 });
		   });
		   $(document.body).on('change', '.custom-file-input', function(e){
			   var fileName = e.target.files[0].name;
			  
			  // e.val(fileName)
		   });
		   
		   });
		   </script>
      <script type="text/javascript">
         $(".use").keyup(function(){  
         var Fname   	= $('#fname').val();
         var last_name  = $('#lname').val();  
         var midname    = $('#midname').val(); 
         var token 		=  $('input[name="csrf_test_name"]').attr('value'); 
         
         var url= "<?php echo  site_url('hrm/employee/Suggestuser'); ?>";  
         $.ajax({
              url: url, 
              type: "POST",
              data: {Fname : Fname,last_name : last_name,midname : midname, csrf_test_name: token},
              success: function(html){
                $('#name').val(html); 
              }
            });
         }); 
         $('#add_dob').bootstrapMaterialDatePicker({
           format: 'DD-MM-YYYY',
           lang: 'EN',
          time: false,
          maxDate: new Date(),
           weekStart: 0,
           cancelText: 'Cancel'
         });
		 $('#joining_date').bootstrapMaterialDatePicker({
           format: 'DD-MM-YYYY',
           lang: 'EN',
           time: false,
           weekStart: 0,
           minDate: new Date(),
           cancelText: 'Cancel'
         });
         
         //$("#profile").validate();	
      
	  $('.datepickers').bootstrapMaterialDatePicker({
               format: 'DD-MM-YYYY',
               lang: 'EN',
               time: false,
               weekStart: 0,
			         maxDate: new Date(),
               cancelText: 'Cancel'
           });
      </script> 
      <script type="text/javascript">
		 /* $(document).ready(function() {
                  $("#msg-friends").on("keyup", function() {
                      var g = $(this).val().toLowerCase();
                      $(".msg-user-list .userlist-box .media-body .chat-header").each(function() {
                          var s = $(this).text().toLowerCase();
                          $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
                      });
                  });
                  $('#OpenImgUpload').click(function() {
                      $('#imgupload').trigger('click');
                  });
                  $('.msg-send-chat').on('keyup', function(e) {
                      msg_cfc(e);
                  });
                  $('.btn-msg-send').on('click', function(e) {
                      msg_fc(e);
                  });
         
                  function msg_cfc(e) {
                      if (e.which == 13) {
                          msg_fc(e);
                      }
                  };
         
                  function msg_fc(e) {
                      $('.msg-block .main-friend-chat').append('' +
                          '<div class="media chat-messages">' +
                          '<div class="media-body chat-menu-reply">' +
                          '<div class="">' +
                          '<p class="chat-cont">' + $('.msg-send-chat').val() + '</p>' +
                          '</div>' +
                          '<p class="chat-time">now</p>' +
                          '</div>' +
                          '</div>' +
                          '');
                      msg_frc($('.msg-send-chat').val());
                      msg_fsc();
                      $('.msg-send-chat').val(null);
                  };
         
                  function msg_frc(wrmsg) {
                      setTimeout(function() {
                          $('.msg-block .main-friend-chat').append('' +
                              '<div class="media chat-messages typing">' +
                              '<a class="media-left photo-table" href="#!"><img class="media-object img-radius img-radius m-t-5" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>' +
                              '<div class="media-body chat-menu-content">' +
                              '<div class="rem-msg">' +
                              '<p class="chat-cont">Typing . . .</p>' +
                              '</div>' +
                              '<p class="chat-time">now</p>' +
                              '</div>' +
                              '</div>' +
                              '');
                          msg_fsc();
                      }, 1500);
                      setTimeout(function() {
                          document.getElementsByClassName("rem-msg")[0].innerHTML = "<p class='chat-cont'>hello superior personality you write '" + wrmsg + " '</p>";
                          $('.rem-msg').removeClass("rem-msg");
                          $('.typing').removeClass("typing");
                          msg_fsc();
                      }, 3000);
                  };
         
                  function msg_fsc() {
                      var tmph = $('.header-chat .main-friend-chat');
                      $('.msg-user-chat.scroll-div').scrollTop(tmph.outerHeight());
                  }
                  var ps = new PerfectScrollbar('.msg-user-list.scroll-div', {
                      wheelSpeed: .5,
                      swipeEasing: 0,
                      suppressScrollX: !0,
                      wheelPropagation: 1,
                      minScrollbarLength: 40,
                  });
                  var ps = new PerfectScrollbar('.msg-user-chat.scroll-div', {
                      wheelSpeed: .5,
                      swipeEasing: 0,
                      suppressScrollX: !0,
                      wheelPropagation: 1,
                      minScrollbarLength: 40,
                  });
                  $(".task-right-header-status").on('click', function() {
                      $(".taskboard-right-progress").slideToggle();
                  });
         
                  $(".message-mobile .media").on('click', function() {
                      var vw = $(window)[0].innerWidth;
                      if (vw < 992) {
                          $(".taskboard-right-progress").slideUp();
                          $(".msg-block").addClass('dis-chat');
                      }
                  });
              }); */
          
          $(window).on('load', function() {
              function notify(message, type) {
                $.growl({
                    message: message
                }, {
                    type: type,
                    allow_dismiss: false,
                    label: 'Cancel',
                    className: 'btn-xs btn-inverse',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    delay: 2500,
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    }
                });
          };
         
         });
         $('#Stakeholders, #Stakeholdersedit').multiselect({
			  buttonWidth : '390px',
			  buttonClass: 'form-control',
			  includeSelectAllOption : true,
			  nonSelectedText: 'Select Stackholders'
         });
         $('#sector, #edit_sector').multiselect({
			  buttonWidth : '390px',
			  buttonClass: 'form-control',
			  includeSelectAllOption : true,
			  nonSelectedText: 'Select sector' 
         }); 
           $('#role_id_add').multiselect({
        buttonWidth : '390px',
        buttonClass: 'form-control',
        includeSelectAllOption : true, 
        nonSelectedText: 'Select Role' 
         });
           $('#role_id_edit','#tab_edit_employee').multiselect({
        buttonWidth : '390px',
        buttonClass: 'form-control',
        includeSelectAllOption : true,
        nonSelectedText: 'Select Role' 
         });

           
         $('#subcategory-list, #subcategory-list-edit').multiselect({
			  buttonWidth : '390px !important',
			  buttonClass: 'form-control',
			  includeSelectAllOption : true, 
			  nonSelectedText: 'Select subsector' 
         });
         $('#dues').DataTable({
    			 searching:!1,
    			 ordering: !1,
    			 "bInfo" : false,
    			 "pageLength": 4 ,
           "lengthChange": false

         });
         $('#logsTbl').DataTable({
           searching:!1,
           ordering: !1,
           "bInfo" : false,
           "pageLength": 4 ,
           "lengthChange": false,
           columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: [0]
                }
            ],

         });
         
		 function modal(){
		   $('.modal').modal('show');
		   setTimeout(function () {
			console.log('hejsan');
			$('.modal').modal('hide');
		   }, 3000);
         }
		 $(document.body).on('focus', '.service_provider', function(){
				 $(this).autocomplete({
					 source: function( request, response ) {
					  $.ajax({
						url: '<?php echo base_url("dashboard/service_providers"); ?>',
						type: 'post',
						dataType: "json",
						data: {
						  search: request.term,
						  mVal: $("#sub_sector").val(),
						  //mEnt: $("#entity_id").val(),
              current_entity_id: $("#mainEntityId").val(), // change by Himanshu
              cat:$("#category_id").val()
						},
						success: function( resdata ) {
						  response( resdata );
						}
					  });
					},
					select: function (event, ui) {
					   if(ui.item.label !=''){
						   $(this).val(ui.item.label); 
						   $(this).val(ui.item.value); 
						   $(this).prev('input[type=hidden]').val(ui.item.field); 
						  return true;
					   }else{
						   $(this).val('');
						   return false;
					   }
					   
					}
				});
			}); 
		
		$('form').on('submit', function(){
			jQuery('#mod').click();
		    setTimeout(function(){$("#loaderM").modal('hide');},5000)
		});
		
	function load_tables(ids,name, url) {
    //alert(ids);
			var urls = '<?php echo base_url();?>';
      var sector_id = $("#sector_id").val();
		//	$('#modal_db').find('.modal-body').load(urls + url+'?id=' + ids+'&name='+name,
			  $('.modeltable tbody').html('');
          $.ajax({
                type: "POST",
                url : "<?php echo base_url(); ?>dashboard/getDevelopmentData/",
                data: "sector_id="+sector_id,
                success: function (response) {
                  var list = JSON.parse(response);
                 
                  var html = "";

                  $.each(list.data,function(i,element){
                   html +='<tr>';
                   html +='<th scope="row">'+(i+1)+'</th>';
                   html +='<td>'+element.table_id+'</td>';
                   html +='<td>'+element.dev_name+'</td>';
                   html +='<td>'+element.dev_comment+'</td>';
                   html +='<td>'+element.created_at+'</td>';
                   html +='<td style="white-space:nowrap;">'+element.updated_at+'</td>';
                  // html +='<td><button type="button" class="btn btn-primary myBtn_multi" id='+element.table_id+' data-toggle="modal" data-target="#exampleModal">ADD</button></td>';
                   html +='</tr>';

                  });
                  $('.modeltable tbody').append(html);
                  $('#myModal12').modal('show');
                }
            });
			
		}
		
  </script>
	<script type="text/javascript">
		var idleTime = 0;
		$(document).ready(function () {
			var idleInterval = setInterval(timerIncrement, 120000); 

			$(this).mousemove(function (e) {
				idleTime = 0;
			});
			$(this).keypress(function (e) {
				idleTime = 0;
			});
		});

		function timerIncrement() {
			idleTime = idleTime + 1;
			//console.log(idleTime)
			if(idleTime > 18 && idleTime < 20){
				//autoSave();
			}
			if (idleTime > 19) { // 20 minutes
				checkSession();
				//toastr.warning('Session has been expired.');
				window.location.href = '<?php echo base_url(); ?>login';
			}
		}
		
		function checkSession() {
				 var urls = '<?php echo base_url(); ?>';
				 $.ajax({
					url: urls+"auth/auto_logout", 
					success: function(newVal) {
						return true;
				     } 
				 });
			}
			function autoSave(){
				$('form').submit();
				toastr.info("Data has been submitted automatically");
			} 
			
			var new_notifications = new Array();

      function getNotification() {

          $.ajax({
              url:'<?php echo base_url("notification/notifications/incoming"); ?>',
              type: 'POST',
              success:function(res){
                  var data =res.result.unread_notifications;
                  document.getElementById('notifications_count').innerHTML = res.result.total_unread_notifications;

                  if(new_notifications.length != data.length){
                    console.log(new_notifications.length , data.length)
                  for (i= 0; i< data.length ; i++){ 

                      toastr.info( data[i].text);
                      //messagesD(data[i].text)
                    }
                    new_notifications  = data;
                  }
                  
              }
          })
      }
	  
      setInterval( function(){
       // toastr.info( 'fffffffffffffff');
         //getNotification()
      },5000)
      //check the setting logout minutes

      var sesstion_log_out  ='<?php echo _getSetting()->sesstion_log_out; ?>';

      var sesstion_log_out_alert ='<?php echo _getSetting()->sesstion_log_out_alert; ?>';

       var baseUrl  ='<?php echo base_url()?>';

       var timerid='';

      if(sesstion_log_out_alert !='' && sesstion_log_out !='' &&  baseUrl!='<?php echo  current_url()?>' )
      {

        setInterval( function(){

          //var msg = confirm('Your session is expired. Press ok if want access')

      swal({
			title: "Your Session will expire soon.",
			text: "If you do not want to logout click on stayed logged in!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Logout!",
			cancelButtonText: "Stay Logged In",/* 
			closeOnConfirm: false, */
			className: "swal-back"
		},
		function(inputValue){
		  //Use the "Strict Equality Comparison" to accept the user's input "false" as string)
		  if (inputValue===false) {
			close_sesstion();
		  } else {
			window.location.href=baseUrl+'auth/logout';
		  }
		});
		  //$('#sesstionModel').modal('show')

          timerid = setTimeout( function(){ window.location.href=baseUrl+'auth/logout'; },1000*sesstion_log_out*60); },1000*sesstion_log_out_alert*60);

      }

      function close_sesstion(){ 
        clearInterval(timerid)
      }

			
		</script>   
    <script>
        // Get the modal

        var modalparent = document.getElementsByClassName("modal_multi");

        // Get the button that opens the modal

        var modal_btn_multi = document.getElementsByClassName("myBtn_multi");

        // Get the <span> element that closes the modal
        var span_close_multi = document.getElementsByClassName("close_multi");

        // When the user clicks the button, open the modal
        function setDataIndex() {

            for (i = 0; i < modal_btn_multi.length; i++)
            {
                modal_btn_multi[i].setAttribute('data-index', i);
                modalparent[i].setAttribute('data-index', i);
                span_close_multi[i].setAttribute('data-index', i);
            }
        }



        for (i = 0; i < modal_btn_multi.length; i++)
        {
            modal_btn_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "block";
            };

            // When the user clicks on <span> (x), close the modal
            span_close_multi[i].onclick = function() {
                var ElementIndex = this.getAttribute('data-index');
                modalparent[ElementIndex].style.display = "none";
            };

        }

        window.onload = function() {

            setDataIndex();
        };

        window.onclick = function(event) {
            if (event.target === modalparent[event.target.getAttribute('data-index')]) {
                modalparent[event.target.getAttribute('data-index')].style.display = "none";
            }

            // OLD CODE
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };

//XXXXXXXXXXXXXXXXXXXXXXX    Modified old code    XXXXXXXXXXXXXXXXXXXXXXXXXX

// Get the modal

        var modal = document.getElementById('myModal');

// Get the button that opens the modal
        var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
        var span = modal.getElementsByClassName("close")[0]; // Modified by dsones uk

// When the user clicks on the button, open the modal

        btn.onclick = function() {

            modal.style.display = "block";
        }

// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }



    </script>
    	<script>
    $(document).ready(function() {
        $('#table_name').multiselect({
            nonSelectedText: 'Select Table',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '400px'
        });
    });
    $('#add_comment').click(function(e) {
        e.preventDefault();
        var sector_id = $("#sector_id").val();
        var table_name = $("#table_name").val();
        var developer_name = $("#developer_name").val();
        var developer_comment = $("#developer_comment").val();
        var comment_status = $("#comment_status").val();
        var url = '<?php echo base_url(); ?>/dashboard/insertDevelopment/';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "sector_id": sector_id,
                "table_name": table_name,
                "developer_name": developer_name,
                "developer_comment": developer_comment,
                "comment_status": comment_status
            },
            success: function(data) {
              location.reload();
            },
            error: function() {
                alert("Error posting feed.");
            }
        });
    });
</script>
<script>
$(document).ready(function(){
 $('#edit_table_name').multiselect({
  nonSelectedText: 'Select Table',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
});

$('#edit_comment').click(function(e) {
	e.preventDefault();
	var sector_id = $("#sector_id").val();
	var did = $("#id").val();
	var table_name = $("#edit_table_name").val();
	var developer_name = $("#developer_name").val();
	var developer_comment = $("#developer_comment").val();
	var comment_status = $("#comment_status").val();
	var url = '<?php echo base_url(); ?>/dashboard/updateDevelopment/';
$.ajax({
	type: "POST",
    url: url,
	data: { "sector_id":sector_id,"id":did,"table_name":table_name,"developer_name":developer_name,"developer_comment":developer_comment,"comment_status":comment_status}, 
	success: function(data){
		alert('success');
	},
	error: function() { alert("Error.."); }
});
});

$(document).ready(function(){
  $.ajax({
					url: '<?php echo base_url(); ?>/dashboard/getTableData/', 
					success: function(res) {
            console.log(res);
            var dd = JSON.parse(res);
            
				     } 
				 });
});
</script>

   </body>
</html>