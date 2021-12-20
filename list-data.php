<div class="row mb-2" >
<div class="col-md-8" >

</div>
<div class="col-md-2" >
	<select type="text" name="" id="cont" class="form-control" style="height: calc(2.0rem - 2px);width: 62%;
    float: right;">
	<option value="1">Starts with</option>
	<option value="2">Ends With</option>
	<option value="3">Contains</option>
	</select>
</div>
<div class="col-md-2">
	<input type="text" name="" id="customSearch" class="form-control" placeholder="Type to Search">
</div>
</div>
<table id="mdatatable-responsives" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
   <thead>
      <tr>
         <th>S.No.</th>
         <th>Company Name</th>
         <th>Contact Name</th>
         <th>Subsector</th><!--
         <th>Subsector Category</th>-->
         <!--<th>City</th>
         <th>State</th>-->
         <th>Registered on</th>
         <!--<th>Relationships</th>-->
         <th style="width:220px ! important;"><?php echo $this->lang->line('action'); ?></th>
      </tr>
   </thead>
   <tbody>
      <?php $count = 1; if(isset($insurance_list) && !empty($insurance_list)){ ?>
      <?php foreach($insurance_list as $obj){ ?>
      <tr>
         <td><?php echo $count++; ?></td>
         <td><a href="<?php echo site_url('companies/entity/detail_view/'.$obj->id); ?>" ><?php echo ucfirst($obj->name); ?></a></td>
         <td><?php echo $obj->contact_first_name.' '.$obj->contact_last_name; ?></td>
         <td>
         <?php 
          $ent_id = get_sub_product_lic('licensee_subsector','subsector_id','entity_id',$obj->id);            
          // print_r($ent_id);
         foreach($ent_id as $key=> $value) {
          
         $ee = _entitysubSectorbymultiSector($obj->id, $value); 

         // print_r($ee);
    
         if(!empty($ee)){ 
        // himanshu changes start
                
        $ss_name = $ee->sector_id;  
  
        
       
          $sub = $ee->subsector_name.",";
          echo $sub;
  
        // himanshu changes end
          } 
          
        
         }
          ?>
          </td>
         <!--<td><?php echo $obj->address_city; ?></td>
         <td><?php echo $obj->address_state_province; ?></td>-->
         <td><?php if($obj->date_registered !=''){ echo  _dFormat($obj->date_registered); } ?></td>
         <!--<td class="text-center"><a href="<?php echo site_url('companies/entity/relationships/'.$obj->id); ?>" class="label theme-info" ><i class="fa fa-link"></i></a></td>-->
         <td>
            <a href="<?php echo site_url('companies/entity/entity_info/'.$obj->id); ?>" class="label theme-warning" style="padding:5px 7px 6px 7px;"><i class="fa fa-eye"></i></a>
            <?php if($obj->verified == 1){ ?>
            <!--<a href="<?php echo site_url('companies/entity/users/'.$obj->id); ?>" class="label theme-success"><i class="fa fa-users"></i> <?php echo $this->lang->line('users'); ?> </a>-->
            <!--<a href="<?php echo site_url('companies/entity/edit/'.$obj->id); ?>" class="label theme-primary"><i class="fa fa-pencil-square"></i> <?php echo $this->lang->line('edit'); ?> </a>-->
            <select  class="aCTION" id="entity_status_id" name="entity_status_id" onchange="getentitystatus(this,<?php echo $obj->id; ?>)" disabled>
               <option value="">Select Status</option>
               <?php 
                  $status='';
                  if(isset($obj->entity_status_id))  
                  $status=$obj->entity_status_id; 
                  if($status !=''){
                  echo _entity_status($status); 
                  }
                       ?>
            </select>
            <?php }else{ $arr = array(57, 56, 53 ,49, 50, 51, 52); if(!in_array($_SESSION['id'], $arr)){ ?>
			
			<a href="<?php echo site_url('companies/entity/entity_verify/'.$obj->id); ?>" class="label theme-success" style="padding:4px 8px 4px 8px; margin-right:0px;" title="Click to verify">Not Verified <i class="fa fa-check"></i></a>
			<?php } } ?>
			<a onclick="deleteData('<?php echo site_url('companies/entity/delete_entity/'); ?>', '<?php echo$obj->id; ?>', this, 'Delete Entity ');" href="javascript:void(0);" class="label label-danger"><i class="fa fa-trash"></i> </a>
			<?php if($_SESSION['role_id'] == 1 && $obj->entity_status_id == 0){ ?>
			<a onclick="activeEntity('<?php echo site_url('companies/entity/entity_active/'); ?>', '<?php echo$obj->id; ?>', this, 'Delete Entity ');" href="javascript:void(0);" class="label theme-warning" style="padding:4px 8px 4px 8px; margin-right:0px;" title="Click to Re-Register">Deleted <i class="fa fa-check"></i></a>
			<?php } ?>
         </td>
      </tr>
      <?php } ?>
      <?php } ?>
   </tbody>
</table>
<style>
#mdatatable-responsives_filter{
	display:none;
}
</style>
<script type="text/javascript">
   $(document).ready(function(){
		Makedtables("Insurance Business Act");
		
		function Makedtables(titles){
      var table = $('#mdatatable-responsives').DataTable({
        
        dom: 'Bfrtip',
        responsive: false,
		  scrollY: false,
        scrollX: true,
	    iDisplayLength: 20,
        "order": [[ 1, "asc" ]],
        //order: false,
		"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
               return nRow;
            },
        buttons: [
        {  
            extend: "excelHtml5",
            text:text_Excel,
            title: titles
         },{
            extend: "pdfHtml5",
            text:text_Pdf,
            orientation: "landscape",
            pageSize: "LEGAL",
            title: titles,
             exportOptions: {
                    columns: [ 0, 1, 2, 3,4 ]
                },
            customize: function (t) {
               t.content.splice(0, 1);
               var n = new Date,
                  r = n.getDate() + "-" + (n.getMonth() + 1) + "-" + n.getFullYear();
                  t.pageMargins = [20, 80, 20, 30],
                 // t.defaultStyle.fontSize = 7,
                 // t.styles.tableHeader.fontSize = 7,
                  t.header = function () {
                  return {
                     columns: [{
                        
                        width: 50,
                        height:50,
                        image: img
                     }, {
                        alignment: "right",
                        fontSize: 14,
                        text: titles
                     }],
                     margin: 20
                  } 
               }, t.footer = function (e, t) {
                  return {
                     columns: [{
                        alignment: "left",
                        text: ["Created on: ", {
                           text: r.toString()
                        }]
                     }, {
                        alignment: "right",
                        text: ["Page ", {
                           text: e.toString()
                        }, " of ", {
                           text: t.toString()
                        }]
                     }],
                     margin: 20
                  }
               };
               var l = {
                  hLineWidth: function (e) {
                     return .5
                  },
                  vLineWidth: function (e) {
                     return .5
                  },
                  hLineColor: function (e) {
                     return "#12599a"
                  },
                  vLineColor: function (e) {
                     return "#12599a"
                  },
                  paddingLeft: function (e) {
                     return 4
                  },
                  paddingRight: function (e) {
                     return 4
                  }
               };
               t.content[0].layout = l   
            }
         }]
 });
 
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var ss = $('#cont').val();
        var mstr = $('#customSearch').val();
        var cont =  data[1].toLowerCase();//data[1]; //data[1].toLowerCase();        
       if(ss == '1'){
			if (cont.match("^"+mstr.toLowerCase()))
			{
				return true;
			}
		}else if(ss == '2'){
			if (cont.match(mstr+"$"))
			{
				return true;
			}
		}else if(ss == '3'){
			if(cont.indexOf(mstr) != -1){
				return true;
			}
		}
		return false;
    }
);

    $('#customSearch').keyup( function(e) {
		table.draw();
    } );   

}
		
		
		
   }); 
</script>
<script src="<?php echo base_url();?>assets/js/insurance.js"></script>
