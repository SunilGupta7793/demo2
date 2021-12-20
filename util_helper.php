<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//-- execute var
if (!function_exists('dd')) {
    function dd($var) {
        echo '<pre>';
        if (   is_array($var)) {
             print_r($var);
             
        }else
        echo $var;
     die;
    }
}
if (!function_exists('_hasChilds')) {
    function _hasChilds($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_hasChilds($rid, $tbl);
         return $res;
    }
}
if (!function_exists('_hasaChilds')) {
    function _hasaChilds($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_hasaChilds($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_hasSubChild')) {
    function _hasSubChild($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findSubChild($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_hasChildID')) {
    function _hasChildID($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findChildID($rid, $tbl);
         return $res;
    }
}
if (!function_exists('_companyName')) {
    function _companyName($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_companyName($id);
    }
}

if(!function_exists('_Calculate_entity_annual_fees')){
    function _Calculate_entity_annual_fees($sectorID, $subSecID, $subSecCatId, $entityId){        
        $ci = get_instance();
        
        
        $option = $ci->master_model->_Calculate_entity_annual_fees($sectorID, $subSecID, $subSecCatId, $entityId);        
        
        return $option;
    }
}

if(!function_exists('_Calculate_entity_late_fees')){
    function _Calculate_entity_late_fees($sectorID){        
        $ci = get_instance();
        
        
        $option = $ci->master_model->_Calculate_entity_late_fees($sectorID);        
        
        return $option;
    }
}
if(!function_exists('_check_entity_fees_status')){
    function _check_entity_fees_status($feesId, $entityId){        
        $ci = get_instance();
        
        
        $option = $ci->master_model->_check_entity_fees_status($feesId, $entityId);        
        
        return $option;
    }
}
if (!function_exists('_getDocumentByRelation')) {
    function _getDocumentByRelation($where){
         $ci = & get_instance();
        return  $ci->web->check_document($where);
    }
}
if (!function_exists('_Company')) {
    function _Company($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_Company($id);
    }
}

if (!function_exists('getUrlMimeType')) {
    function getUrlMimeType($url)
    {
        $buffer = file_get_contents($url);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        return $finfo->buffer($buffer);
    }
}
if (!function_exists('check_licensee_id')) {
        function check_licensee_id(){ 
            $ci = get_instance();
            if (isset($_SESSION['licensee_id'])) {
                  return  $licensee_id = _Company($ci->session->userdata('licensee_id'))->entity_id;  
            } else {  
                 return  $licensee_id = _Company($ci->session->userdata('id'))->entity_id; 
            }
        }
    }
if (!function_exists('_d')) {

    function _d($data, $exit = TRUE) {
        print '<pre>';
        print_r($data);
        print '</pre>';
        if ($exit)
            exit;
    }
}

if (!function_exists('logged_in_user_id')) {

    function logged_in_user_id() {
        $logged_in_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('id') && $CI->session->userdata('role_id')):
            $logged_in_id = $CI->session->userdata('id');
        endif;
        return $logged_in_id; 
    }

}

if (!function_exists('logged_in_role_id')) {

    function logged_in_role_id() {
        $logged_in_role_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('role_id')):
            $logged_in_role_id = $CI->session->userdata('role_id');
        endif;
        return $logged_in_role_id;
    }

}

if (!function_exists('logged_in_user_type')) {

    function logged_in_user_type() {
        $logged_in_type = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('user_type')):
            $logged_in_id = $CI->session->userdata('user_type');
        endif;
        return $logged_in_type;
    }

}

if (!function_exists('success')) {
    function success($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('success', $message); 
        return true;
    }
}  
if (!function_exists('success_')) {
    function success_($message) {
        $CI = & get_instance();
        $CI->session->set_flashdata('success_', $message); 
        return true;
    } 
}

if (!function_exists('error')) { 
    function error($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('error', $message);
        return true;
    }
}
if (!function_exists('error_')) { 
    function error_($message) {
        $CI = & get_instance();
        $CI->session->set_flashdata('error_', $message);
        return true;
    }
}

if (!function_exists('warning')) {
    function warning($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('warning', $message);
        return true;
    }
}

if (!function_exists('info')) {

    function info($message) {
        $CI = & get_instance();
        $CI->session->set_userdata('info', $message);
        return true;
    }

}

if (!function_exists('get_slug')) {

    function get_slug($slug) {
        if (!$slug) {
            return;
        }

        $char = array("!", "’", "'", ":", ",", "_", "`", "~", "@", "#", "$", "%", "^", "&", "*", "(", ")", "+", "=", "{", "}", "[", "]", "/", ";", '"', '<', '>', '?', "'\'",);
        $slug = str_replace($char, "", $slug);
        return $str = strtolower(str_replace(' ', "-", $slug));
    }

}

if (!function_exists('_hasChild2')) {
    function _hasChild2($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findChild2($rid, $tbl);
         return $res;
    }
}
if (!function_exists('get_status')) {

    function get_status($status) {
        $ci = & get_instance();
        if ($status == 1) {
            return $ci->lang->line('active');
        } elseif ($status == 2) {
            return $ci->lang->line('in_active');
        } elseif ($status == 3) {
            return $ci->lang->line('trash');
        }
    }

}

function _get_agents($mid = "")
{
    $ci =& get_instance();
    $data = $ci->master_model->get_agents();
    $Mq    =  $data;
        
    foreach ($Mq as  $row) {
          $Sdata = ($row->eId == $mid) ? 'selected': '' ;
          $agents .= "<option ".$Sdata." value ='".$row->eId."'>";
          $agents .= $row->cName;
          $agents .= "</option>";
    }
    return $agents;
}

 function _get_brokers($mid = "")
{
    $ci =& get_instance();
    $data = $ci->master_model->get_brokers();
    $Mq    =  $data;
        
    foreach ($Mq as  $row) {
          $Sdata = ($row->eId == $mid) ? 'selected': '' ;
          $brokers .= "<option ".$Sdata." value ='".$row->eId."'>";
          $brokers .= $row->cName;
          $brokers .= "</option>";
    }
    return $brokers;
}
if (!function_exists('verify_email_format')) {

    function verify_email_format($email) {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return '';
        } else {
            return $email;
        }
    }

}


if (!function_exists('get_classes')) {

    function get_classes() {
        $ci = & get_instance();
        return $ci->db->get('classes')->result();
    }

}

if (!function_exists('get_fee_amount')) {

    function get_fee_amount($income_head_id, $class_id) {
        $ci = & get_instance();
        return $ci->db->get_where('fees_amount', array('class_id'=>$class_id, 'income_head_id'=>$income_head_id))->row();
    }
}

if (!function_exists('_findCutoffDays')) {
    function _findCutoffDays($id,$sid)
    {
        $ci =& get_instance();
        return $ci->master_model->_findCutoffDays($id,$sid);
    }
}
function get_broker_id_from_name($id)
{
    $ci =& get_instance();
    $data = $ci->master_model->get_broker_id_from_name($id);

    return $data->eId;
}
if (!function_exists('_checkReturnFiledOrNot1')) {
    function _checkReturnFiledOrNot1($sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->checkReturnFiledOrNot1($sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkReturnFiledOrNot')) {
    function _checkReturnFiledOrNot($entity, $sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->checkReturnFiledOrNot($entity, $sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkReturnFiledOrNotBySector')) {
    function _checkReturnFiledOrNotBySector( $sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->_checkReturnFiledOrNotBySector($sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkSectorSchedules')) {
    function _checkSectorSchedules($sector)
    {
        $ci =& get_instance();
        return $ci->master_model->_checkSectorSchedules($sector);
    }
}

if (!function_exists('_checkReturnFiledOrNotFull')) {
    function _checkReturnFiledOrNotFull($entity, $sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->checkReturnFiledOrNotFull($entity, $sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkLateReturnFiledOrNot1')) {
    function _checkLateReturnFiledOrNot1($sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->checkLateReturnFiledOrNot1($sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkLateReturnFiledOrNot')) {
    function _checkLateReturnFiledOrNot($entity, $sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->checkLateReturnFiledOrNot($entity, $sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_checkLateReturnFiledOrNotBySector')) {
    function _checkLateReturnFiledOrNotBySector( $sector, $year, $selectedType, $typeValue)
    {
        $ci =& get_instance();
        return $ci->master_model->_checkLateReturnFiledOrNotBySector($sector, $year, $selectedType, $typeValue);
    }
}

if (!function_exists('_getTotalEntitiesBySector')) {
    function _getTotalEntitiesBySector($month, $year, $sector, $selectedType="", $selectedValue="")
    {
        $ci =& get_instance();
        return $ci->master_model->_getTotalEntitiesBySector($month, $year, $sector, $selectedType="", $selectedValue="");
    }
}



if (!function_exists('_getReturnDueDate')) {
    function _getReturnDueDate($returns_type_id, $sector_id, $fEnd, $year="")
    {
        //echo $returns_type_id."<br>";
        $cutoffdys = _findCutoffDays($returns_type_id, $sector_id);
        
        if($cutoffdys->period_type == "months"){
            $totalDays = $cutoffdys->NumDays * 30;
        }
        else if($cutoffdys->period_type == "weeks"){
            $totalDays = $cutoffdys->NumDays * 7;   
        }
        //echo $totalDays."<br>";
        if($year == ""){
            $finalDate = date('Y')."-".$fEnd."-01";
            $lastdayofMonth = date('t',strtotime($finalDate));
            
            $lastDate = date('Y')."-".$fEnd."-".$lastdayofMonth;
        }else{
            $finalDate = $year."-".$fEnd."-01";
            $lastdayofMonth = date('t',strtotime($finalDate));
            
            $lastDate = $year."-".$fEnd."-".$lastdayofMonth;    
        }
        
        // echo $lastDate." => ".$cname." => ".$fEnd;
        // echo "<br>";
        
        
         $finalDueDate =  date('Y-m-d', strtotime($lastDate. ' + '.$totalDays.' days'));
         //return $finalDueDate;
         $thelastdayofMonth = date('t',strtotime($finalDueDate));
         $theMonth = date('m',strtotime($finalDueDate));
         $theYear = date('Y',strtotime($finalDueDate));
         return $theYear."-".$theMonth."-".$thelastdayofMonth;
        
    }
}

if (!function_exists('_getReturnDueDateForDashboard')) {
    function _getReturnDueDateForDashboard($returns_type_id, $sector_id, $fEnd, $month="", $year="", $selectedType="", $selectedValue="", $cname="")
    {
        //echo $returns_type_id."<br>";
        $cutoffdys = _findCutoffDays($returns_type_id, $sector_id);
        
        if($cutoffdys->period_type == "months"){
            $totalDays = $cutoffdys->NumDays * 30;
        }
        else if($cutoffdys->period_type == "weeks"){
            $totalDays = $cutoffdys->NumDays * 7;   
        }
        //echo $totalDays."<br>";
        $finalDate = $year."-".$fEnd."-01";
        $lastdayofMonth = date('t',strtotime($finalDate));
        
        $lastDate = $year."-".$fEnd."-".$lastdayofMonth;
        // echo $lastDate." => ".$cname." => ".$fEnd;
        // echo "<br>";
        
        
        $finalDueDate =  date('Y-m-d', strtotime($lastDate. ' + '.$totalDays.' days'));
        
        $date1 = new DateTime(date("Y-m-d"));  //current date or any date
        $date2 = new DateTime($finalDueDate);   //Future date
        $diff = $date2->diff($date1)->format("%a");  //find difference
        $days = intval($diff);   //rounding days
       
        
        $dueDate = date('M d, Y', strtotime($finalDueDate));
        $dueDateYear = date("Y", strtotime($finalDueDate));
        //echo "<br>";
        $dueDateMonth = date("m", strtotime($finalDueDate));
        //echo $dueDate."_".round(($totalDays+$days)/30)."_".($totalDays+$days);

        //echo $dueDatecutoff = round((strtotime(date('Y-m-d')) - strtotime(date("Y-m-d",$finalDueDate))) / 86400);
        $currentDate = date('Y-m-d');
        //$currentDate = date('Y-m-d', strtotime($currentDate));
           
        
        $endDate = date('Y-m-d', strtotime($finalDueDate));
           
        
        
        return $dueDate."_".round(($days)/30)."_".($days);
       
       
    }
}

if (!function_exists('_getLateReturnDueDate')) {
    function _getLateReturnDueDate($returns_type_id, $sector_id, $fEnd, $month="", $year="", $selectedType="", $selectedValue="", $submitdate="")
    {
        //echo $returns_type_id."<br>";
        $cutoffdys = _findCutoffDays($returns_type_id, $sector_id);
        
        if($cutoffdys->period_type == "months"){
            $totalDays = $cutoffdys->NumDays * 30;
        }
        else if($cutoffdys->period_type == "weeks"){
            $totalDays = $cutoffdys->NumDays * 7;   
        }
        //echo $totalDays."<br>";
        $finalDate = $year."-".$fEnd."-01";
        $lastdayofMonth = date('t',strtotime($finalDate));
        
        $lastDate = $year."-".$fEnd."-".$lastdayofMonth;
        // echo $lastDate." => ".$cname." => ".$fEnd;
        // echo "<br>";
        
        
        $finalDueDate =  date('Y-m-d', strtotime($lastDate. ' + '.$totalDays.' days'));
        //$date1 = new DateTime(date("Y-m-d"));  //current date or any date
        $date1 = new DateTime($submitdate);  //current date or any date
        $date2 = new DateTime($finalDueDate);   //Future date
        $diff = $date2->diff($date1)->format("%a");  //find difference
        $days = intval($diff);   //rounding days
       
         // echo $submitdate;
         // echo "<br>"; 
        $thelastdayofMonth = date('t',strtotime($finalDueDate));
        $theMonth = date('m',strtotime($finalDueDate));
        $theYear = date('Y',strtotime($finalDueDate));

        

        $finalDueDate = $theYear."-".$theMonth."-".$thelastdayofMonth;
        $dueDateYear = date("Y", strtotime($finalDueDate));
        //echo "<br>";
        $dueDateMonth = date("m", strtotime($finalDueDate));
        //echo $dueDate."_".round(($totalDays+$days)/30)."_".($totalDays+$days);

        //echo $dueDatecutoff = round((strtotime(date('Y-m-d')) - strtotime(date("Y-m-d",$finalDueDate))) / 86400);
        $currentDate = date('Y-m-d');
        //$currentDate = date('Y-m-d', strtotime($currentDate));
           
        
        $endDate = date('Y-m-d', strtotime($finalDueDate));
        $dueDate = date('M d, Y', strtotime($finalDueDate));   
       
        if ($currentDate > $finalDueDate && $finalDueDate < $submitdate)
            return $dueDate."_".round(($days)/30)."_".($days);



        //if ($currentDate > $endDate){ return $dueDate."_".round(($days)/30)."_".($days);
            // if($year != ""){
            //     if($dueDateYear == $year ){
                    
            //         if($selectedType == 'quarterly'){
            //             if($selectedValue == 1){
            //                 if($dueDateMonth == '01' || $dueDateMonth == '02' || $dueDateMonth == '03')
            //                 {
            //                     return $dueDate."_".round(($days)/30)."_".($days);    
            //                 }else
            //                 return false;
            //             }
            //             if($selectedValue == 2){
            //                 if($dueDateMonth == '04' || $dueDateMonth == '05' || $dueDateMonth == '06')
            //                 {
            //                     return $dueDate."_".round(($days)/30)."_".($days);    
            //                 }else
            //                 return false;
            //             }
            //             if($selectedValue == 3){
            //                 if($dueDateMonth == '07' || $dueDateMonth == '08' || $dueDateMonth == '09')
            //                 {
            //                     return $dueDate."_".round(($days)/30)."_".($days);    
            //                 }else
            //                 return false;
            //             }
            //             if($selectedValue == 4){
            //                 if($dueDateMonth == '10' || $dueDateMonth == '11' || $dueDateMonth == '12')
            //                 { 
            //                     return $dueDate."_".round(($days)/30)."_".($days);    
            //                 }else
            //                 return false;
            //             }
                        

            //         }
            //         if($selectedType == 'monthly'){
            //             // echo $dueDateMonth." => ". $selectedValue;
            //             // echo "<br>";
            //             if($selectedValue == $dueDateMonth)
            //             {
            //                 return $dueDate."_".round(($days)/30)."_".($days);    
            //             }
            //             else
            //                 return false;
            //         }
            //         else
            //             return $dueDate."_".round(($days)/30)."_".($days);
            //     }
            // }
        //}
        // else
        //     return $dueDate."_".round(($totalDays+$days)/30)."_".($totalDays+$days);
        
       
    }
}

if (!function_exists('_getLateReturnDueDateForDashboard')) {
    function _getLateReturnDueDateForDashboard($returns_type_id, $sector_id, $fEnd, $month="", $year="", $selectedType="", $selectedValue="", $submitdate="")
    {
        //echo $returns_type_id."<br>";
        $cutoffdys = _findCutoffDays($returns_type_id, $sector_id);
        
        if($cutoffdys->period_type == "months"){
            $totalDays = $cutoffdys->NumDays * 30;
        }
        else if($cutoffdys->period_type == "weeks"){
            $totalDays = $cutoffdys->NumDays * 7;   
        }
        //echo $totalDays."<br>";
        $finalDate = $year."-".$fEnd."-01";
        $lastdayofMonth = date('t',strtotime($finalDate));
        
        $lastDate = $year."-".$fEnd."-".$lastdayofMonth;
        // echo $lastDate." => ".$cname." => ".$fEnd;
        // echo "<br>";
        
        
        $finalDueDate =  date('Y-m-d', strtotime($lastDate. ' + '.$totalDays.' days'));
        //$date1 = new DateTime(date("Y-m-d"));  //current date or any date
        $date1 = new DateTime($submitdate);  //current date or any date
        $date2 = new DateTime($finalDueDate);   //Future date
        $diff = $date2->diff($date1)->format("%a");  //find difference
        $days = intval($diff);   //rounding days
       
         // echo $submitdate;
         // echo "<br>"; 
        $dueDate = date('M d, Y', strtotime($finalDueDate));
        $dueDateYear = date("Y", strtotime($finalDueDate));
        //echo "<br>";
        $dueDateMonth = date("m", strtotime($finalDueDate));
        //echo $dueDate."_".round(($totalDays+$days)/30)."_".($totalDays+$days);

        //echo $dueDatecutoff = round((strtotime(date('Y-m-d')) - strtotime(date("Y-m-d",$finalDueDate))) / 86400);
        $currentDate = date('Y-m-d');
        //$currentDate = date('Y-m-d', strtotime($currentDate));
           
        
        $endDate = date('Y-m-d', strtotime($finalDueDate));
           
       
        if ($currentDate > $finalDueDate && $finalDueDate < $submitdate)
            return $dueDate."_".round(($days)/30)."_".($days);
       
       
    }
}

if (!function_exists('get_vehicles')) {

    function get_vehicle_by_ids($ids) {
        $str = '';
        if ($ids) {
            $ci = & get_instance();
            $sql = "SELECT * FROM `vehicles` WHERE `id` IN($ids)";
            $result = $ci->db->query($sql)->result();
            if (!empty($result)) {
                foreach ($result as $obj) {
                    $str .= $obj->number . ',';
                }
            }
        }
        return rtrim($str, ',');
    }

}

if (!function_exists('get_routines_by_day')) {

    function get_routines_by_day($day, $class_id, $section_id) {
        $ci = & get_instance();
        
        $ci->db->select('R.*,S.name AS subject, T.name AS teacher');
        $ci->db->from('routines AS R');
        $ci->db->join('subjects AS S', 'S.id = R.subject_id', 'left');
        $ci->db->join('teachers AS T', 'T.id = R.teacher_id', 'left');
        $ci->db->where('R.day', $day);
        $ci->db->where('R.class_id', $class_id);
        $ci->db->where('R.section_id', $section_id);
        if(logged_in_role_id() == General_Supervisor){
            $ci->db->where('R.teacher_id', $ci->session->userdata('profile_id'));
        }
        
        $ci->db->order_by("R.id", "ASC");
       return $ci->db->get()->result();
       
        
    }

}

if (!function_exists('get_student_attendance')) {

    function get_student_attendance($student_id, $academic_year_id, $class_id, $section_id, $year, $month, $day) {
        $ci = & get_instance();
        $field = 'day_' . abs($day);
        $ci->db->select('SA.' . $field);
        $ci->db->from('student_attendances AS SA');
        $ci->db->where('SA.student_id', $student_id);
        $ci->db->where('SA.academic_year_id', $academic_year_id);
        $ci->db->where('SA.class_id', $class_id);
        $ci->db->where('SA.section_id', $section_id);
        $ci->db->where('SA.year', $year);
        $ci->db->where('SA.month', $month);
        return @$ci->db->get()->row()->$field;
    }

}

if (!function_exists('get_teacher_attendance')) {

    function get_teacher_attendance($teacher_id, $academic_year_id, $year, $month, $day) {
        $ci = & get_instance();
        $field = 'day_' . abs($day);
        $ci->db->select('TA.' . $field);
        $ci->db->from('teacher_attendances AS TA');
        $ci->db->where('TA.teacher_id', $teacher_id);
        $ci->db->where('TA.academic_year_id', $academic_year_id);
        $ci->db->where('TA.year', $year);
        $ci->db->where('TA.month', $month);
        return @$ci->db->get()->row()->$field;
    }

}

if (!function_exists('get_employee_attendance')) {

    function get_employee_attendance($teacher_id, $academic_year_id, $year, $month, $day) {
        $ci = & get_instance();
        $field = 'day_' . abs($day);
        $ci->db->select('EA.' . $field);
        $ci->db->from('employee_attendances AS EA');
        $ci->db->where('EA.employee_id', $teacher_id);
        $ci->db->where('EA.academic_year_id', $academic_year_id);
        $ci->db->where('EA.year', $year);
        $ci->db->where('EA.month', $month);
        return @$ci->db->get()->row()->$field;
    }

}

if (!function_exists('get_exam_attendance')) {

    function get_exam_attendance($student_id, $academic_year_id, $exam_id, $class_id, $section_id, $subject_id) {
        $ci = & get_instance();
        $ci->db->select('EA.is_attend');
        $ci->db->from('exam_attendances AS EA');
        $ci->db->where('EA.exam_id', $exam_id);
        $ci->db->where('EA.class_id', $class_id);
        $ci->db->where('EA.section_id', $section_id);
        $ci->db->where('EA.student_id', $student_id);
        $ci->db->where('EA.subject_id', $subject_id);
        $ci->db->where('EA.academic_year_id', $academic_year_id);
        return @$ci->db->get()->row()->is_attend;
    }

}

if (!function_exists('get_exam_mark')) {

    function get_exam_mark($student_id, $academic_year_id, $exam_id, $class_id, $section_id, $subject_id) {
        $ci = & get_instance();
        $ci->db->select('M.*');
        $ci->db->from('marks AS M');
        $ci->db->where('M.exam_id', $exam_id);
        $ci->db->where('M.class_id', $class_id);
        $ci->db->where('M.section_id', $section_id);
        $ci->db->where('M.student_id', $student_id);
        $ci->db->where('M.subject_id', $subject_id);
        $ci->db->where('M.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_exam_attendance')) {

    function get_exam_attendance($student_id, $academic_year_id, $exam_id, $class_id, $section_id, $subject_id) {
        $ci = & get_instance();
        $ci->db->select('M.*');
        $ci->db->from('exam_attendances AS EA');
        $ci->db->where('EA.exam_id', $exam_id);
        $ci->db->where('EA.class_id', $class_id);
        $ci->db->where('EA.section_id', $section_id);
        $ci->db->where('EA.student_id', $student_id);
        $ci->db->where('EA.subject_id', $subject_id);
        $ci->db->where('EA.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_exam_total_mark')) {

    function get_exam_total_mark($exam_id, $student_id, $academic_year_id, $class_id, $section_id = null) {
        
        $ci = & get_instance();
        $ci->db->select('COUNT(M.id) AS total_subject, SUM(G.point) AS total_point, SUM(M.exam_total_mark) AS exam_mark, SUM(M.obtain_total_mark) AS obtain_mark');
        $ci->db->from('marks AS M');
        $ci->db->join('grades AS G', 'G.id = M.grade_id', 'left');      
        $ci->db->where('M.class_id', $class_id);
        $ci->db->where('M.exam_id', $exam_id);
        if ($section_id) {
            $ci->db->where('M.section_id', $section_id);
        }
        
        $ci->db->where('M.student_id', $student_id);
        $ci->db->where('M.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }
}



if (!function_exists('get_subject_list')) {

    function get_subject_list($exam_id, $class_id, $section_id, $student_id) {
        $ci = & get_instance();
        $ci->db->select('M.*,S.name AS subject, G.point, G.name');
        $ci->db->from('marks AS M');        
        $ci->db->join('subjects AS S', 'S.id = M.subject_id', 'left');
        $ci->db->join('grades AS G', 'G.id = M.grade_id', 'left');
        $ci->db->where('M.class_id', $class_id);
        $ci->db->where('M.section_id', $section_id);
        $ci->db->where('M.student_id', $student_id);
        $ci->db->where('M.exam_id', $exam_id);
        return  $ci->db->get()->result();     
    }

}

if (!function_exists('get_lowet_height_mark')) {

    function get_lowet_height_mark($exam_id, $class_id, $section_id, $subject_id) {
        $ci = & get_instance();
        $ci->db->select('MIN(M.obtain_total_mark) AS lowest, MAX(M.obtain_total_mark) AS height');
        $ci->db->from('marks AS M');       
        $ci->db->where('M.exam_id', $exam_id);
        $ci->db->where('M.class_id', $class_id);
        $ci->db->where('M.section_id', $section_id);
        $ci->db->where('M.subject_id', $subject_id);  
        return  $ci->db->get()->row();
     // echo $ci->db->last_query();
    }

}

if (!function_exists('get_lowet_height_result')) {

    function get_lowet_height_result($exam_id, $class_id, $section_id) {
        $ci = & get_instance();
        $ci->db->select('MIN(ER.total_obtain_mark) AS lowest, MAX(ER.total_obtain_mark) AS height');
        $ci->db->from('exam_results AS ER');       
        $ci->db->where('ER.exam_id', $exam_id);
        $ci->db->where('ER.class_id', $class_id);
        $ci->db->where('ER.section_id', $section_id);
        //$ci->db->where('ER.student_id', $student_id);  
        return  $ci->db->get()->row();
     // echo $ci->db->last_query();
    }

}


if (!function_exists('get_position_in_subject')) {

    function get_position_in_subject($exam_id, $class_id, $section_id, $subject_id, $mark) {
        
        
        $ci = & get_instance();
        $sql = "SELECT id, obtain_total_mark, FIND_IN_SET( obtain_total_mark,(
                SELECT GROUP_CONCAT( obtain_total_mark  ORDER BY obtain_total_mark DESC ) 
                FROM marks WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id AND subject_id = $subject_id))
                AS rank 
                FROM marks
                WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id AND subject_id = $subject_id AND  obtain_total_mark = $mark"; 
        
        $rank =  $ci->db->query($sql)->row()->rank; 
        
        if($mark == 0){
            return '--'; 
        }
        
        if($rank == 1){
            return $rank.'st';
        }elseif($rank == 2){
           return $rank.'nd'; 
        }elseif($rank == 3){
           return $rank.'rd'; 
        }else{
            return $rank.'th'; 
        }
    }

}


if (!function_exists('get_position_student_position')) {

    function get_position_student_position($academic_year_id, $class_id, $student_id, $section_id = null) {
        
        $condition = " academic_year_id = $academic_year_id ";
        $condition .= " AND class_id = $class_id";
        $condition .= " AND student_id = $student_id";
        if($section_id){
            $condition .= " AND section_id = $section_id";
        }
        
        $ci = & get_instance();              
        $sql = "SELECT id, avg_grade_point, FIND_IN_SET( avg_grade_point, 
                ( SELECT GROUP_CONCAT( avg_grade_point ORDER BY avg_grade_point DESC )
                FROM final_results ) ) AS rank 
                FROM final_results 
                WHERE $condition";
        
        $result =  $ci->db->query($sql)->row(); 
        
        $rank = '';
        if(!empty($result)){
            $rank = $result->rank;
        }
                       
        if($rank == 1){
            return $rank.'st';
        }elseif($rank == 2){
           return $rank.'nd'; 
        }elseif($rank == 3){
           return $rank.'rd'; 
        }else{
            return $rank.'th'; 
        }
    }

}



if (!function_exists('get_exam_wise_markt')) {

    function get_exam_wise_markt($exam_id, $class_id, $section_id, $student_id) {
        $ci = & get_instance();
        
        $select = 'SUM(M.written_mark) AS written_mark,
                   SUM(M.written_obtain) AS written_obtain,
                   SUM(M.tutorial_mark) AS tutorial_mark,
                   SUM(M.tutorial_obtain) AS tutorial_obtain,
                   SUM(M.practical_mark) AS practical_mark,
                   SUM(M.practical_obtain) AS practical_obtain,
                   SUM(M.viva_mark) AS viva_mark,
                   SUM(M.viva_obtain) AS viva_obtain,
                   COUNT(M.id) AS total_subject,
                   SUM(G.point) AS point,                  
                   G.name';
        
        $ci->db->select($select);
        $ci->db->from('marks AS M');        
        $ci->db->join('grades AS G', 'G.id = M.grade_id', 'left');          
        $ci->db->where('M.class_id', $class_id);
        $ci->db->where('M.section_id', $section_id);
        $ci->db->where('M.student_id', $student_id);
        $ci->db->where('M.exam_id', $exam_id);        
        return $ci->db->get()->row();  
        // $ci->db->last_query();
    }
}

if (!function_exists('get_position_in_subject')) {

    function get_position_in_subject($exam_id, $class_id, $section_id, $subject_id, $mark) {
        
        
        $ci = & get_instance();
        $sql = "SELECT id, obtain_total_mark, FIND_IN_SET( obtain_total_mark,(
                SELECT GROUP_CONCAT( obtain_total_mark  ORDER BY obtain_total_mark DESC ) 
                FROM marks WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id AND subject_id = $subject_id))
                AS rank 
                FROM marks
                WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id AND subject_id = $subject_id AND  obtain_total_mark = $mark"; 
        
        $rank =  @$ci->db->query($sql)->row()->rank; 
        
        if($mark == 0){
            return '--'; 
        }
        
        if($rank == 1){
            return $rank.'st';
        }elseif($rank == 2){
           return $rank.'nd'; 
        }elseif($rank == 3){
           return $rank.'rd'; 
        }else{
            return $rank.'th'; 
        }
    }

}

if (!function_exists('get_position_in_exam')) {

    function get_position_in_exam($exam_id, $class_id, $section_id, $mark) {
        
        
        $ci = & get_instance();
        $sql = "SELECT id, total_obtain_mark, FIND_IN_SET( total_obtain_mark,(
                SELECT GROUP_CONCAT( total_obtain_mark  ORDER BY total_obtain_mark DESC ) 
                FROM exam_results WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id ))
                AS rank 
                FROM exam_results
                WHERE exam_id = $exam_id AND class_id = $class_id AND section_id = $section_id AND total_obtain_mark = $mark"; 
        
        $rank =  @$ci->db->query($sql)->row()->rank; 
        
        if($mark == 0){
            return '--'; 
        }
        
        if($rank == 1){
            return $rank.'st';
        }elseif($rank == 2){
           return $rank.'nd'; 
        }elseif($rank == 3){
           return $rank.'rd'; 
        }else{
            return $rank.'th'; 
        }
    }

}

if (!function_exists('get_position_in_class')) {

    function get_position_in_class($class_id, $mark) {
        
        if($mark == 0){
            return '--'; 
        }
        
        $ci = & get_instance();
        $sql = "SELECT id, avg_grade_point, FIND_IN_SET( avg_grade_point,(
                SELECT GROUP_CONCAT( avg_grade_point  ORDER BY avg_grade_point DESC ) 
                FROM final_results WHERE class_id = $class_id ))
                AS rank 
                FROM final_results
                WHERE class_id = $class_id AND avg_grade_point = $mark"; 
        
        $rank =  @$ci->db->query($sql)->row()->rank; 
        
        
        
        if($rank == 1){
            return $rank.'st';
        }elseif($rank == 2){
           return $rank.'nd'; 
        }elseif($rank == 3){
           return $rank.'rd'; 
        }else{
            return $rank.'th'; 
        }
    }

}



if (!function_exists('get_exam_result')) {

    function get_exam_result($exim_id, $student_id, $academic_year_id, $class_id, $section_id = null) {
        $ci = & get_instance();
        $ci->db->select('ER.*, G.name');
        $ci->db->from('exam_results AS ER');  
        $ci->db->join('grades AS G', 'G.id = ER.grade_id', 'left');  
        $ci->db->where('ER.exam_id', $exim_id);
        $ci->db->where('ER.class_id', $class_id);
        if ($section_id) {
            $ci->db->where('ER.section_id', $section_id);
        }
        $ci->db->where('ER.student_id', $student_id);
        $ci->db->where('ER.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }
}

if (!function_exists('get_exam_final_result')) {

    function get_exam_final_result($student_id, $academic_year_id, $class_id, $section_id = null) {
        $ci = & get_instance();
        $ci->db->select('FR.*');
        $ci->db->from('final_results AS FR');
        $ci->db->where('FR.class_id', $class_id);
        if ($section_id) {
            $ci->db->where('FR.section_id', $section_id);
        }
        $ci->db->where('FR.student_id', $student_id);
        $ci->db->where('FR.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }
}

if (!function_exists('get_enrollment')) {

    function get_enrollment($student_id, $academic_year_id) {
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('enrollments AS E');
        $ci->db->where('E.student_id', $student_id);
        $ci->db->where('E.academic_year_id', $academic_year_id);
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_user_by_role')) {

    function get_user_by_role($role_id, $user_id) {

        $ci = & get_instance();
            $ci->db->select('E.*, U.email, U.role_id, R.name AS role');
            $ci->db->from('employees AS E');
            $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
            $ci->db->join('roles AS R', 'R.id = U.role_id', 'left');
            /*$ci->db->join('designations AS D', 'D.id = E.designation_id', 'left');*/
           /* $ci->db->join('salary_grades AS SG', 'SG.id = E.salary_grade_id', 'left');*/
            $ci->db->where('E.user_id', $user_id);
            return $ci->db->get()->row();

        /*if ($role_id == STUDENT) {

            $ci->db->select('S.*, G.name AS guardian, E.roll_no, E.section_id, E.class_id, U.email, U.role_id,  C.name AS class_name, SE.name AS section, D.title AS discount');
            $ci->db->from('enrollments AS E');
            $ci->db->join('students AS S', 'S.id = E.student_id', 'left');
            $ci->db->join('guardians AS G', 'G.id = S.guardian_id', 'left');
            $ci->db->join('users AS U', 'U.id = S.user_id', 'left');
            $ci->db->join('classes AS C', 'C.id = E.class_id', 'left');
            $ci->db->join('sections AS SE', 'SE.id = E.section_id', 'left');
            $ci->db->join('discounts AS D', 'D.id = S.discount_id', 'left');
            $ci->db->where('S.user_id', $user_id);
            return $ci->db->get()->row();
            
        } elseif ($role_id == General_Supervisor) {
            $ci->db->select('T.*, U.email, U.role_id, SG.grade_name');
            $ci->db->from('teachers AS T');
            $ci->db->join('users AS U', 'U.id = T.user_id', 'left');
            $ci->db->join('salary_grades AS SG', 'SG.id = T.salary_grade_id', 'left');
            $ci->db->where('T.user_id', $user_id);
            return $ci->db->get()->row();
        } elseif ($role_id == Insurance_Regulator) {
            $ci->db->select('G.*, U.email, U.role_id');
            $ci->db->from('guardians AS G');
            $ci->db->join('users AS U', 'U.id = G.user_id', 'left');
            $ci->db->where('G.user_id', $user_id);
            return $ci->db->get()->row();
        } else {
            $ci->db->select('E.*, U.email, U.role_id, R.name AS role, D.name AS designation');
            $ci->db->from('employees AS E');
            $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
            $ci->db->join('roles AS R', 'R.id = U.role_id', 'left');
            $ci->db->join('designations AS D', 'D.id = E.designation_id', 'left');
            $ci->db->join('salary_grades AS SG', 'SG.id = E.salary_grade_id', 'left');
            $ci->db->where('E.user_id', $user_id);
            return $ci->db->get()->row();
        }



        $ci->db->last_query();*/
    }

}


if (!function_exists('_userByID')) {

    function _userByID($user_id) {
        
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('employees AS E');
      //  $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
        $ci->db->where('E.user_id', $user_id);
        $user = $ci->db->get()->row();
        //echo$ci->db->last_query();
        return $user; 

}

}

if (!function_exists('_userByIDs')) {

    function _userByIDs($user_id) {
        
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('employees AS E');
      //  $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
        $ci->db->where('E.id', $user_id);
        $user = $ci->db->get()->row();
        //echo$ci->db->last_query();
        return $user; 

}

}
if (!function_exists('get_user_by_id')) {

    function get_user_by_id($user_id) {

        $ci = & get_instance();

       /* $ci->db->select('U.id, U.role_id');
        $ci->db->from('users AS U');
        $ci->db->where('U.id', $user_id);
*/

         $ci->db->select('E.*, U.email, U.role_id');
            $ci->db->from('employees AS E');
            $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
            $ci->db->where('E.user_id', $user_id);
            $user = $ci->db->get()->row();
        return $user; 
        /*if ($user->role_id == STUDENT) {

            $ci->db->select('S.*, E.roll_no, U.email, U.role_id,  C.name AS class_name, SE.name AS section');
            $ci->db->from('enrollments AS E');
            $ci->db->join('students AS S', 'S.id = E.student_id', 'left');
            $ci->db->join('users AS U', 'U.id = S.user_id', 'left');
            $ci->db->join('classes AS C', 'C.id = E.class_id', 'left');
            $ci->db->join('sections AS SE', 'SE.id = E.section_id', 'left');
            $ci->db->where('S.user_id', $user_id);
            
            return $ci->db->get()->row(); 
        } elseif ($user->role_id == General_Supervisor) { 
            $ci->db->select('T.*, U.email, U.role_id');
            $ci->db->from('teachers AS T');
            $ci->db->join('users AS U', 'U.id = T.user_id', 'left'); 
            $ci->db->where('T.user_id', $user_id);
            return $ci->db->get()->row();
        } elseif ($user->role_id == Insurance_Regulator) {
            $ci->db->select('G.*, U.email, U.role_id');
            $ci->db->from('guardians AS G');
            $ci->db->join('users AS U', 'U.id = G.user_id', 'left');
            $ci->db->where('G.user_id', $user_id);
            return $ci->db->get()->row();
        } else {
            $ci->db->select('E.*, U.email, U.role_id, D.name AS designation');
            $ci->db->from('employees AS E');
            $ci->db->join('users AS U', 'U.id = E.user_id', 'left');
            $ci->db->join('designations AS D', 'D.id = U.role_id', 'left');
            $ci->db->where('E.user_id', $user_id);
            return $ci->db->get()->row();
        } */

       // $ci->db->last_query();
    } 

}


if (!function_exists('get_webUser')) {

    function get_webUser($user_id) {

        $ci = & get_instance();

         $ci->db->select('E.*');
            $ci->db->from('web_user AS E');
            $ci->db->where('E.id', $user_id);
            $user = $ci->db->get()->row();
            
        return $user; 
     
    } 

}

if (!function_exists('get_primary_webUser_by_entity')) {

    function get_primary_webUser_by_entity($entity_id) {

        $ci = & get_instance();

        $ci->db->select('E.*');
        $ci->db->from('web_user AS E');
        $ci->db->where('E.entity_id', $entity_id);
        $ci->db->where('E.primary_user', 1);
        $user = $ci->db->get()->row();
            
        return $user; 
     
    } 

}

if (!function_exists('_sdFormat')) {
    function _sdFormat($dd='')
    {
         $ci =& get_instance();
         if($dd != '0000-00-00 00:00:00' && $dd != '' && $dd != '1900-01-01 00:00:00'){
            $nDate = DateTime::createFromFormat('Y-m-d H:i:s', $dd);
            $nDD = $nDate->format('d-m-Y H:i:s A'); 
         }else{
            $nDD = ''; 
         }
         
         return $nDD;
    }
}
if (!function_exists('get_blood_group')) {

    function get_blood_group() {
        $ci = & get_instance();
        return array(
            'a_positive' => $ci->lang->line('a_positive'),
            'a_negative' => $ci->lang->line('a_negative'),
            'b_positive' => $ci->lang->line('b_positive'),
            'b_negative' => $ci->lang->line('b_negative'),
            'o_positive' => $ci->lang->line('o_positive'),
            'o_negative' => $ci->lang->line('o_negative'),
            'ab_positive' => $ci->lang->line('ab_positive'),
            'ab_negative' => $ci->lang->line('ab_negative')
        );
    }

}

if (!function_exists('get_visitor_reasons')) {

    function get_visitor_reasons() {
        $ci = & get_instance();
        return array(
            'vendor' => $ci->lang->line('vendor'),
            'guardian' => $ci->lang->line('guardian'),
            'relative' => $ci->lang->line('relative'),
            'friend' => $ci->lang->line('friend'),
            'family' => $ci->lang->line('family'),
            'interview' => $ci->lang->line('interview'),
            'meeting' => $ci->lang->line('meeting'),
            'other' => $ci->lang->line('other')
        );
    }

}

if (!function_exists('get_subject_type')) {

    function get_subject_type() {
        $ci = & get_instance();
        return array(
            'mandatory' => $ci->lang->line('mandatory'),
            'optional' => $ci->lang->line('optional')
        );
    }

}


if (!function_exists('get_result_status')) {

    function get_result_status() {
        $ci = & get_instance();
        return array(
            'passed' => $ci->lang->line('passed'),
            'failed' => $ci->lang->line('failed')
        );
    }
}

if (!function_exists('get_groups')) {

    function get_groups() {
        $ci = & get_instance();
        return array(
            'science' => $ci->lang->line('science'),
            'arts' => $ci->lang->line('arts'),
            'commerce' => $ci->lang->line('commerce')
        );
    }

}


if (!function_exists('get_week_days')) {

    function get_week_days() {
        $ci = & get_instance();
        return array(
            'saturday' => $ci->lang->line('saturday'),
            'sunday' => $ci->lang->line('sunday'),
            'monday' => $ci->lang->line('monday'),
            'tuesday' => $ci->lang->line('tuesday'),
            'wednesday' => $ci->lang->line('wednesday'),
            'thursday' => $ci->lang->line('thursday'),
            'friday' => $ci->lang->line('friday')
        );
    }

}

if (!function_exists('get_months')) {

    function get_months() {
        $ci = & get_instance();
        return array(
            'january' => $ci->lang->line('january'),
            'february' => $ci->lang->line('february'),
            'march' => $ci->lang->line('march'),
            'april' => $ci->lang->line('april'),
            'may' => $ci->lang->line('may'),
            'june' => $ci->lang->line('june'),
            'july' => $ci->lang->line('july'),
            'august' => $ci->lang->line('august'),
            'september' => $ci->lang->line('september'),
            'october' => $ci->lang->line('october'),
            'november' => $ci->lang->line('november'),
            'december' => $ci->lang->line('december')
        );
    }

}

if (!function_exists('_FormIds')) {
    function _FormIds($tbl)
    {
        $ci =& get_instance();
        return $ci->master_model->_getForms($tbl);
    }
}

if (!function_exists('r_Elements')) {

    function r_Elements($id, $tbl) {
        $ci = & get_instance();
        $ci->db->select('U.*');
        $ci->db->from($tbl.' AS U');
        $ci->db->where('U.return_id', $id);
        $res = $ci->db->get()->result();
            
        return $res; 
    }

}

if (!function_exists('get_hostel_types')) {

    function get_hostel_types() {
        $ci = & get_instance();
        return array(
            'boys' => $ci->lang->line('boys'),
            'girls' => $ci->lang->line('girls'),
            'combine' => $ci->lang->line('combine')
        );
    }

}

if (!function_exists('get_room_types')) {

    function get_room_types() {
        $ci = & get_instance();
        return array(
            'ac' => $ci->lang->line('ac'),
            'non_ac' => $ci->lang->line('non_ac')
        );
    }

}


if (!function_exists('get_genders')) {

    function get_genders() {
        $ci = & get_instance();
        return array(
            'male' => $ci->lang->line('male'),
            'female' => $ci->lang->line('female')
        );
    }

}

if (!function_exists('get_paid_types')) {

    function get_paid_status($status) {
        $ci = & get_instance();
        $data = array(
            'paid' => $ci->lang->line('paid'),
            'unpaid' => $ci->lang->line('unpaid'),
            'partial' => $ci->lang->line('partial')
        );
        return $data[$status];
    }

}

if (!function_exists('get_relation_types')) {

    function get_relation_types() {
        $ci = & get_instance();
        return array(
            'father' => $ci->lang->line('father'),
            'mother' => $ci->lang->line('mother'),
            'sister' => $ci->lang->line('sister'),
            'brother' => $ci->lang->line('brother'),
            'uncle' => $ci->lang->line('uncle'),
            'maternal_uncle' => $ci->lang->line('maternal_uncle'),
            'other_relative' => $ci->lang->line('other_relative')
        );
    }

}

if (!function_exists('get_payment_methods')) {

    function get_payment_methods() {
        $ci = & get_instance();

        $methods = array('cash' => $ci->lang->line('cash'), 'cheque' => $ci->lang->line('cheque'));
     
        $ci = & get_instance();
        $ci->db->select('PS.*');
        $ci->db->from('payment_settings AS PS');
        $data = $ci->db->get()->row();
        
        if ($data->paypal_status) {
            $methods['paypal'] = $ci->lang->line('paypal');
        }
        if ($data->stripe_status) {
            $methods['stripe'] = $ci->lang->line('stripe');
        }
        if ($data->payumoney_status) {
            $methods['payumoney'] = $ci->lang->line('payumoney');
        }
        if ($data->ccavenue_status) {
            $methods['ccavenue'] = $ci->lang->line('ccavenue');
        }
        if ($data->paytm_status) {
            $methods['paytm'] = $ci->lang->line('paytm');
        }

        return $methods;
    }

}

if (!function_exists('get_sms_gateways')) {

    function get_sms_gateways() {
        $ci = & get_instance();
        $gateways = array();
        $ci = & get_instance();
        $ci->db->select('SS.*');
        $ci->db->from('sms_settings AS SS');
        $data = $ci->db->get()->row();

        if ($data->clickatell_status) {
            $gateways['clicktell'] = $ci->lang->line('clicktell');
        }
        if ($data->twilio_status) {
            $gateways['twilio'] = $ci->lang->line('twilio');
        }
        if ($data->bulk_status) {
            $gateways['bulk'] = $ci->lang->line('bulk');
        }
        if ($data->msg91_status) {
            $gateways['msg91'] = $ci->lang->line('msg91');
        }
        if ($data->plivo_status) {
            $gateways['plivo'] = $ci->lang->line('plivo');
        }
        if ($data->textlocal_status) {
            $gateways['text_local'] = $ci->lang->line('text_local');
        }
        if ($data->smscountry_status) {
            $gateways['sms_country'] = $ci->lang->line('sms_country');
        }

        return $gateways;
    }

}


if (!function_exists('get_group_by_type')) {

    function get_group_by_type() {
        $ci = & get_instance();
        return array(
            'daily' => $ci->lang->line('daily'),
            'monthly' => $ci->lang->line('monthly'),
            'yearly' => $ci->lang->line('yearly')
        );
    }

}


if (!function_exists('get_template_tags')) {

    function get_template_tags($role_id) {
        $tags = array();
        $tags[] = '[name]';
        $tags[] = '[email]';
        $tags[] = '[phone]';

        if ($role_id == STUDENT) {

            $tags[] = '[class_name]';
            $tags[] = '[section]';
            $tags[] = '[roll_no]';
            $tags[] = '[dob]';
            $tags[] = '[gender]';
            $tags[] = '[religion]';
            $tags[] = '[blood_group]';
            $tags[] = '[registration_no]';
            $tags[] = '[group]';
            $tags[] = '[created_at]';
            $tags[] = '[guardian]';
            
        } else if ($role_id == Insurance_Regulator) {
            $tags[] = '[profession]';
        } else if ($role_id == General_Supervisor) {
            $tags[] = '[responsibility]';
            $tags[] = '[gender]';
            $tags[] = '[blood_group]';
            $tags[] = '[religion]';
            $tags[] = '[dob]';
            $tags[] = '[joining_date]';
        } else {
            $tags[] = '[designation]';
            $tags[] = '[gender]';
            $tags[] = '[blood_group]';
            $tags[] = '[religion]';
            $tags[] = '[dob]';
            $tags[] = '[joining_date]';
        }

        $tags[] = '[present_address]';
        $tags[] = '[permanent_address]';

        return $tags;
    }

}

if (!function_exists('get_formatted_body')) {

    function get_formatted_body($body, $role_id, $user_id) {

        $tags = get_template_tags($role_id);
        $user = get_user_by_role($role_id, $user_id);
        $arr = array('[', ']');
        foreach ($tags as $tag) {
            $field = str_replace($arr, '', $tag);
            
            if($field == 'created_at'){                
                $body = str_replace($tag, date('M-d-Y', strtotime($user->created_at)), $body);                
            }else{
                $body = str_replace($tag, $user->{$field}, $body);
            }            
            
        }

        return $body;
    }
}

if (!function_exists('get_formatted_certificate_text')) {

    function get_formatted_certificate_text($body, $role_id, $user_id) {

        $tags = get_template_tags($role_id);
        $user = get_user_by_role($role_id, $user_id);
              
        $arr = array('[', ']');
        foreach ($tags as $tag) {
            $field = str_replace($arr, '', $tag);
            
            if($field == 'created_at'){                
                $body = str_replace($tag, '<span>'.date('M-d-Y', strtotime($user->created_at)).'</span>', $body);                
            }else{
                $body = str_replace($tag, '<span>'.$user->{$field}.'</span>', $body);
            }            
        }

        return $body;
    }
}



if (!function_exists('get_nice_time')) {

    function get_nice_time($date) {

        $ci = & get_instance();
        if (empty($date)) {
            return "2 months ago"; //"No date provided";
        }

        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();
        $unix_date = strtotime($date);

        // check validity of date
        if (empty($unix_date)) {
            return "2 months ago"; // "Bad date";
        }

        // is it future date or past date
        if ($now > $unix_date) {
            $difference = $now - $unix_date;
            $tense = "ago";
        } else {
            $difference = $unix_date - $now;
            $tense = "from now";
        }

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j] .= "s";
        }

        return "$difference $periods[$j] {$tense}";
    }

}



if (!function_exists('get_inbox_message')) {

    function get_inbox_message() {
        $ci = & get_instance();
        $ci->db->select('MR.*, M.*');
        $ci->db->from('message_relationships AS MR');
        $ci->db->join('messages AS M', 'M.id = MR.message_id', 'left');
        $ci->db->where('MR.status', 1);
        $ci->db->where('MR.is_read', 0);
        $ci->db->where('MR.owner_id', logged_in_user_id());
        $ci->db->where('MR.receiver_id', logged_in_user_id());
        return $ci->db->get()->result();
    }

}


if (!function_exists('get_operation_by_module')) {

    function get_operation_by_module($module_id) {
        $ci = & get_instance();
        $ci->db->select('O.*');
        $ci->db->from('operations AS O');
        $ci->db->where('O.module_id', $module_id);
        return $ci->db->get()->result();
    }

}

if (!function_exists('get_permission_by_operation')) {

    function get_permission_by_operation($role_id, $operation_id) {
        $ci = & get_instance();
        $ci->db->select('P.*');
        $ci->db->from('privileges AS P');
        $ci->db->where('P.role_id', $role_id);
        $ci->db->where('P.operation_id', $operation_id);
        //$ci->db->get()->row();
        //echo$ci->db->last_query();
        return $ci->db->get()->row();
    }

}

if (!function_exists('get_lang')) {

    function get_lang() {
        $ci = & get_instance();
        $ci->lang->line('dashboard');
    }

}

if (!function_exists('get_default_lang_list')) {

    function get_default_lang_list($lang) {
        $lang_lists = array();
        $lang_lists['english'] = 'english';
        $lang_lists['bengali'] = 'bengali';
        $lang_lists['spanish'] = 'spanish';
        $lang_lists['arabic'] = 'arabic';
        $lang_lists['hindi'] = 'hindi';
        $lang_lists['urdu'] = 'urdu';
        $lang_lists['chinese'] = 'chinese';
        $lang_lists['japanese'] = 'japanese';
        $lang_lists['portuguese'] = 'portuguese';
        $lang_lists['russian'] = 'russian';
        $lang_lists['french'] = 'french';
        $lang_lists['korean'] = 'korean';
        $lang_lists['german'] = 'german';
        $lang_lists['italian'] = 'italian';
        $lang_lists['thai'] = 'thai';
        $lang_lists['hungarian'] = 'hungarian';
        $lang_lists['dutch'] = 'dutch';
        $lang_lists['latin'] = 'latin';
        $lang_lists['indonesian'] = 'indonesian';
        $lang_lists['turkish'] = 'turkish';
        $lang_lists['greek'] = 'greek';
        $lang_lists['persian'] = 'persian';
        $lang_lists['malay'] = 'malay';
        $lang_lists['telugu'] = 'telugu';
        $lang_lists['tamil'] = 'tamil';
        $lang_lists['gujarati'] = 'gujarati';
        $lang_lists['polish'] = 'polish';
        $lang_lists['ukrainian'] = 'ukrainian';
        $lang_lists['panjabi'] = 'panjabi';
        $lang_lists['romanian'] = 'romanian';
        $lang_lists['burmese'] = 'burmese';
        $lang_lists['yoruba'] = 'yoruba';
        $lang_lists['hausa'] = 'hausa';

        if (isset($lang_lists[$lang]) && !empty($lang_lists[$lang])) {
            return true;
        } else {
            return FALSE;
        }
    }

}


if (!function_exists('get_timezones')) {
    function get_timezones() {
        $timezones = array(           
            'Pacific/Midway' => "(GMT-11:00) Midway Island",
            'US/Samoa' => "(GMT-11:00) Samoa",
            'US/Hawaii' => "(GMT-10:00) Hawaii",
            'US/Alaska' => "(GMT-09:00) Alaska",
            'US/Pacific' => "(GMT-08:00) Pacific Time (US &amp; Canada)",
            'America/Tijuana' => "(GMT-08:00) Tijuana",
            'US/Arizona' => "(GMT-07:00) Arizona",
            'US/Mountain' => "(GMT-07:00) Mountain Time (US &amp; Canada)",
            'America/Chihuahua' => "(GMT-07:00) Chihuahua",
            'America/Mazatlan' => "(GMT-07:00) Mazatlan",
            'America/Mexico_City' => "(GMT-06:00) Mexico City",
            'America/Monterrey' => "(GMT-06:00) Monterrey",
            'Canada/Saskatchewan' => "(GMT-06:00) Saskatchewan",
            'US/Central' => "(GMT-06:00) Central Time (US &amp; Canada)",
            'US/Eastern' => "(GMT-05:00) Eastern Time (US &amp; Canada)",
            'US/East-Indiana' => "(GMT-05:00) Indiana (East)",
            'America/Bogota' => "(GMT-05:00) Bogota",
            'America/Lima' => "(GMT-05:00) Lima",
            'America/Caracas' => "(GMT-04:30) Caracas",
            'Canada/Atlantic' => "(GMT-04:00) Atlantic Time (Canada)",
            'America/La_Paz' => "(GMT-04:00) La Paz",
            'America/Santiago' => "(GMT-04:00) Santiago",
            'Canada/Newfoundland' => "(GMT-03:30) Newfoundland",
            'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
            'Greenland' => "(GMT-03:00) Greenland",
            'Atlantic/Stanley' => "(GMT-02:00) Stanley",
            'Atlantic/Azores' => "(GMT-01:00) Azores",
            'Atlantic/Cape_Verde' => "(GMT-01:00) Cape Verde Is.",
            'Africa/Casablanca' => "(GMT) Casablanca",
            'Europe/Dublin' => "(GMT) Dublin",
            'Europe/Lisbon' => "(GMT) Lisbon",
            'Europe/London' => "(GMT) London",
            'Africa/Monrovia' => "(GMT) Monrovia",
            'Europe/Amsterdam' => "(GMT+01:00) Amsterdam",
            'Europe/Belgrade' => "(GMT+01:00) Belgrade",
            'Europe/Berlin' => "(GMT+01:00) Berlin",
            'Europe/Bratislava' => "(GMT+01:00) Bratislava",
            'Europe/Brussels' => "(GMT+01:00) Brussels",
            'Europe/Budapest' => "(GMT+01:00) Budapest",
            'Europe/Copenhagen' => "(GMT+01:00) Copenhagen",
            'Europe/Ljubljana' => "(GMT+01:00) Ljubljana",
            'Europe/Madrid' => "(GMT+01:00) Madrid",
            'Europe/Paris' => "(GMT+01:00) Paris",
            'Europe/Prague' => "(GMT+01:00) Prague",
            'Europe/Rome' => "(GMT+01:00) Rome",
            'Europe/Sarajevo' => "(GMT+01:00) Sarajevo",
            'Europe/Skopje' => "(GMT+01:00) Skopje",
            'Europe/Stockholm' => "(GMT+01:00) Stockholm",
            'Europe/Vienna' => "(GMT+01:00) Vienna",
            'Europe/Warsaw' => "(GMT+01:00) Warsaw",
            'Europe/Zagreb' => "(GMT+01:00) Zagreb",
            'Europe/Athens' => "(GMT+02:00) Athens",
            'Europe/Bucharest' => "(GMT+02:00) Bucharest",
            'Africa/Cairo' => "(GMT+02:00) Cairo",
            'Africa/Harare' => "(GMT+02:00) Harare",
            'Europe/Helsinki' => "(GMT+02:00) Helsinki",
            'Europe/Istanbul' => "(GMT+02:00) Istanbul",
            'Asia/Jerusalem' => "(GMT+02:00) Jerusalem",
            'Europe/Kiev' => "(GMT+02:00) Kyiv",
            'Europe/Minsk' => "(GMT+02:00) Minsk",
            'Europe/Riga' => "(GMT+02:00) Riga",
            'Europe/Sofia' => "(GMT+02:00) Sofia",
            'Europe/Tallinn' => "(GMT+02:00) Tallinn",
            'Europe/Vilnius' => "(GMT+02:00) Vilnius",
            'Asia/Baghdad' => "(GMT+03:00) Baghdad",
            'Asia/Kuwait' => "(GMT+03:00) Kuwait",
            'Africa/Nairobi' => "(GMT+03:00) Nairobi",
            'Asia/Riyadh' => "(GMT+03:00) Riyadh",
            'Asia/Tehran' => "(GMT+03:30) Tehran",
            'Europe/Moscow' => "(GMT+04:00) Moscow",
            'Asia/Baku' => "(GMT+04:00) Baku",
            'Europe/Volgograd' => "(GMT+04:00) Volgograd",
            'Asia/Muscat' => "(GMT+04:00) Muscat",
            'Asia/Tbilisi' => "(GMT+04:00) Tbilisi",
            'Asia/Yerevan' => "(GMT+04:00) Yerevan",
            'Asia/Kabul' => "(GMT+04:30) Kabul",
            'Asia/Karachi' => "(GMT+05:00) Karachi",
            'Asia/Tashkent' => "(GMT+05:00) Tashkent",
            'Asia/Kolkata' => "(GMT+05:30) Kolkata",
            'Asia/Kathmandu' => "(GMT+05:45) Kathmandu",
            'Asia/Yekaterinburg' => "(GMT+06:00) Ekaterinburg",
            'Asia/Almaty' => "(GMT+06:00) Almaty",
            'Asia/Dhaka' => "(GMT+06:00) Dhaka",
            'Asia/Novosibirsk' => "(GMT+07:00) Novosibirsk",
            'Asia/Bangkok' => "(GMT+07:00) Bangkok",
            'Asia/Jakarta' => "(GMT+07:00) Jakarta",
            'Asia/Krasnoyarsk' => "(GMT+08:00) Krasnoyarsk",
            'Asia/Chongqing' => "(GMT+08:00) Chongqing",
            'Asia/Hong_Kong' => "(GMT+08:00) Hong Kong",
            'Asia/Kuala_Lumpur' => "(GMT+08:00) Kuala Lumpur",
            'Australia/Perth' => "(GMT+08:00) Perth",
            'Asia/Singapore' => "(GMT+08:00) Singapore",
            'Asia/Taipei' => "(GMT+08:00) Taipei",
            'Asia/Ulaanbaatar' => "(GMT+08:00) Ulaan Bataar",
            'Asia/Urumqi' => "(GMT+08:00) Urumqi",
            'Asia/Irkutsk' => "(GMT+09:00) Irkutsk",
            'Asia/Seoul' => "(GMT+09:00) Seoul",
            'Asia/Tokyo' => "(GMT+09:00) Tokyo",
            'Australia/Adelaide' => "(GMT+09:30) Adelaide",
            'Australia/Darwin' => "(GMT+09:30) Darwin",
            'Asia/Yakutsk' => "(GMT+10:00) Yakutsk",
            'Australia/Brisbane' => "(GMT+10:00) Brisbane",
            'Australia/Canberra' => "(GMT+10:00) Canberra",
            'Pacific/Guam' => "(GMT+10:00) Guam",
            'Australia/Hobart' => "(GMT+10:00) Hobart",
            'Australia/Melbourne' => "(GMT+10:00) Melbourne",
            'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
            'Australia/Sydney' => "(GMT+10:00) Sydney",
            'Asia/Vladivostok' => "(GMT+11:00) Vladivostok",
            'Asia/Magadan' => "(GMT+12:00) Magadan",
            'Pacific/Auckland' => "(GMT+12:00) Auckland",
            'Pacific/Fiji' => "(GMT+12:00) Fiji",
        );

        return $timezones;
    }
}


if (!function_exists('get_date_format')) {
    function get_date_format() {
        
        $date = array();
        $date['Y-m-d'] = '2001-03-15';
        $date['d-m-Y'] = '15-03-2018';
        $date['d/m/Y'] = '15/03/2018';
        $date['m/d/Y'] = '03/15/2018';
        $date['m.d.Y'] = '03.10.2018';
        $date['j, n, Y'] = '14, 7, 2018';
        $date['F j, Y'] = 'July 15, 2018';
        $date['M j, Y'] = 'Jul 13, 2018';
        $date['j M, Y'] = '13 Jul, 2018';
        
        return $date;
    }
}

if (!function_exists('check_permission')) {

    function check_permission($action) {
        $ci = & get_instance();
        $role_id = $ci->session->userdata('role_id');
        $operation_slug = $ci->router->fetch_class();
        $module_slug = $ci->router->fetch_module();

        if ($module_slug == '') {
            $module_slug = $operation_slug;
        }

        $module_slug = 'my_' . $module_slug;

        $data = $ci->config->item($operation_slug, $module_slug);
       
        $result = $data[$role_id];
        if (!empty($result)) {
            $array = explode('|', $result);
            if (!$array[$action]) {
                error($ci->lang->line('permission_denied'));
                //redirect('dashboard');
                redirect('permission-denied');
            }
        } else {
            error($ci->lang->line('permission_denied'));
            //redirect('dashboard');
            redirect('permission-denied');
        }

        return TRUE;
    }

}

if (!function_exists('has_permission')) {

    function has_permission($action, $module_slug = null, $operation_slug = null) {

        $ci = & get_instance();
        $role_id = $ci->session->userdata('role_id');
        // multiple role id for permission change by pratik


        if ($module_slug == '') {
            $module_slug = $operation_slug;
        }

        $module_slug = 'my_' . $module_slug;

        $data = $ci->config->item($operation_slug, $module_slug);
        // change by pratik for multiple permsision
        $multiple_role_id=explode('|',$role_id);
        foreach($multiple_role_id as $role_ids)
        {
             $result = @$data[$role_ids];
        }
    
         if (!empty($result)) {
            $array = explode('|', $result);
            return $array[$action];
        } else {
            return FALSE;
        }
    }

}

if (!function_exists('create_log')) {

    function create_log($activity = null) {
          
        $ci = & get_instance();
        $data = array();
        $data['user_id'] = logged_in_user_id();
        $data['role_id'] = logged_in_role_id();
        $user = get_user_by_id($data['user_id']);
        $data['name']  = $user->name;
        $data['phone'] = $user->phone;
        $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['activity'] = $activity;
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        
        $ci->db->insert('activity_logs', $data);
    }
}


if (!function_exists('check_error')) {

    function check_error($activity = null) {

        $ci = & get_instance();
        $data = array();
        $data['user_id'] = logged_in_user_id();
        $data['role_id'] = logged_in_role_id();
        $user = get_user_by_id($data['user_id']);
        $data['name'] = $user->name;
        $data['phone'] = $user->phone;
        $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['activity'] = $activity;
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $ci->db->insert('activity_logs', $data);
    }
}

if (!function_exists('build_form')) {

    function build_form($table) {
        $ci = & get_instance();
        $table = $ci->db->escape_str($table);
        $sql = "DESCRIBE `$table`";
        $desc = $ci->db->query($sql)->result();
        return $desc;
    }
}
if (!function_exists('get_all_country')) {

    function get_all_country() {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('country');
        return $ci->db->get()->result();
    }
}
if (!function_exists('get_all_country_id')) {

    function get_all_country_id($id) {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('country');
        $ci->db->where('id',$id);
        return $ci->db->get()->row()->name;
    }
}

if (!function_exists('get_entity_status')) {

    function get_entity_status($id) {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('entity_status');
        $ci->db->where('id',$id);
        return $ci->db->get()->row()->status_name;
    }
}

if (!function_exists('_countries')) {

    function _countries($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('country');
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_currency')) {

    function _currency($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('currency');
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->code;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_sectors')) {

    function _sectors($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('sector');
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->sector_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_sectorss')) {

    function _sectorss($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('sector');
        $ci->db->where('id !=',9999);
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->sector_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_sectorDropdown')) {

    function _sectorDropdown($mid="") {
        
        $Cq = _allRSectors('');
        
        foreach ($Cq as  $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->sector_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_postLicensingServicesDropdown')) {

    function _postLicensingServicesDropdown($mid="") {
        
        $ci = & get_instance(); 
        
        $Cq = $ci->master_model->postLicensingServicesDropdown();
        
        
        foreach ($Cq as  $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->service_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_subcategories')) {

    function _subcategories($id, $mid) {
        $ci = & get_instance();        
        $cn = '';
        $ss = "id NOT IN('39','10001','10002','10003','10004','10006','7','8','9','12','13','15')";
        $ci->db->select('*');
        $ci->db->from('subsector_categories');
        $ci->db->where('subsector_id', $id);
        if($id == 9 || $id == 20){
            $ci->db->where($ss);
        }
        $Cq = $ci->db->get()->result();
        $cn .= "<option value =''>-- Choose SubSector Category--</option>";
        foreach ($Cq as $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
				   // himanshu changes start 2-12-2021 for showing ERSP's as Banking
                  if(($row->category_name)=="ERSP'S")
                  {
                  $cn .= 'Banking';
                  }else{
                    $cn .=$row->category_name;
                  }
                  // himanshu changes end 2-12-2021 for showing ERSP's as Banking
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_substructure')) {

    function _substructure($id, $mid) {
        $ci = & get_instance();        
        $cn = '';
        $ss = "id IN('39','10001','10002','10003','10004','10006','7','8','9','12','13','15')";
        $ci->db->select('*');
        $ci->db->from('subsector_categories');
        $ci->db->where('subsector_id', $id);
        if($id == 9 || $id == 20){
            $ci->db->where($ss); 
        }
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->category_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_entity_status')) {

    function _entity_status($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('entity_status');
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->status_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('_relation_status')) {

    function _relation_status($mid) {
        $ci = & get_instance();        
        $cn = '';
        $ci->db->select('*');
        $ci->db->from('relationship_status');
        $Cq = $ci->db->get()->result();
        
        foreach ($Cq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->status_name;
                  $cn .= "</option>";
            }
        return $cn;
        
    }
}

if (!function_exists('get_all_months')) {

    function get_all_months($data) {
        $ci = & get_instance(); 
        $ci->db->select('*');
        $ci->db->from('return_period_names');
        $ci->db->where('frequency_name',$data);
        return $ci->db->get()->result();
    }
}


if (!function_exists('_findCname')) {

    function _findCname($data) {
        $ci = & get_instance(); 
        $ci->db->select('*');
        //$ci->db->from('licensees A');
        $ci->db->from('entity A');
        $ci->db->where('A.id',$data);
        //return $ci->db->get()->row()->Company_name;
        return $ci->db->get()->row()->name;
    }
}
if (!function_exists('_get_allReturnsNew')) {
    function _get_allReturnsNew($id=null, $ss, $returnStatus=""){
        $ci = & get_instance(); 
        //$ci->db->where('workflow_status', $returnStatus);
        $ci->db->where('status', 1);
        $ci->db->where('sector_id', $ss);
        $ci->db->group_by('entity_id');
        $qry = $ci->db->get('returns');
        //echo $ci->db->last_query();
        return $qry->result_array();
    }
}
if (!function_exists('_get_CompanyDropdown')) {

    function _get_CompanyDropdown($id="",$sectorID="",$returnStatus="") {
        $ci =& get_instance();
        $array = _get_allReturnsNew('',$sectorID,$returnStatus);
        return $ci->master_model->CompanyDropdown($array);
    }
}

if (!function_exists('_findFields')) {

    function _findFields($fid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_formFields($fid);
        return $res;
    }
}

if (!function_exists('_findReturnType')) {

    function _findReturnType($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_ReturnType($rid);
        return $res;
    }
}

if (!function_exists('_findReturn')) {

    function _findReturn($rid) { 
        $ci = & get_instance(); 
        $res = $ci->master_model->get_Return($rid);
        return $res;
    }
}


if (!function_exists('_findSector')) {

    function _findSector($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_Sector($rid);
        return $res;
    }
}

if (!function_exists('_findService')) {

    function _findService($sid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_Service($sid);
        return $res;
    }
}

if (!function_exists('_Relationcat')) {

    function _Relationcat($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->_Relationcat($rid);
        if(!empty($res)){
            $res = $res->category;
        }
        return $res;
    }
}

if (!function_exists('_allSectors')) {

    function _allSectors($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->_allSectors($rid);
        return $res;
    }
}

if (!function_exists('_getSubSectorByCategory')) {

    function _getSubSectorByCategory($cid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->_getSubSectorByCategory($cid);
        return $res;
    }
}

if (!function_exists('_findRSector')) {

    function _findRSector($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_RSector($rid);
        return $res;
    }
}
if (!function_exists('_findRSectorNew')) {

    function _findRSectorNew($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_RSector_New($rid);
        
        
        return $res;
    }
}

if (!function_exists('_period')) {
    function _period($rid, $field)
    {
        $ci =& get_instance();
        return $ci->master_model->get_period($rid, $field);
    }
}

if (!function_exists('_findUniqueId')) {

    function _findUniqueId($rid) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_UniqueID($rid);
        return $res;
    }
}

if (!function_exists('_findRtypes')) {

    function _findRtypes($id) {
        $ci = & get_instance(); 
        $res = $ci->master_model->get_frequencies($id);
        return $res;
    }
}




if (!function_exists('error_logs')) {

    function error_logs($activity, $md, $er) {

        $ci = & get_instance();
        $file = basename('error_logs.json');
        
        $files = file_get_contents($file);
        
        $uid   = @$ci->session->userdata('id'); 
        $email   = @$ci->session->userdata('email');    

        $data  = json_decode($files, true);
        
        if($activity == 'W'){
        
        $last_item_id = end($data);
        $id           = $last_item_id = $last_item_id["id"];
        
        $data[] = array(
                'uid'=>$uid,
                'email'=>$email,
                'module'=>$md,
                'msg'=>$er,
                'ip_address'=>$_SERVER['REMOTE_ADDR'],
                'user_agent'=>$_SERVER['HTTP_USER_AGENT'],
                'created_on'=>date('Y-m-d H:i:s'),
                'id' =>++$id
                ); 
       
        if(!is_file($file)){
            $contents = json_encode($data);
            file_put_contents($file, $contents, LOCK_EX);
        }else{
            $contents = json_encode($data);
            file_put_contents($file, $contents, LOCK_EX);
        }   
        return true;
        }else if($activity == 'R'){
            return $data;   
        }
    }
}

if (!function_exists('_send_email')) {
    function _send_email($to, $cont, $sub)
    {
        $content = '<!DOCTYPE html><html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="x-apple-disable-message-reformatting"> <title></title> <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet"> <style>html,body{margin: 0 auto !important; padding: 0 !important; height: 100% !important; width: 100% !important; background: #f1f1f1;}{-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}div[style*="margin: 16px 0"]{margin: 0 !important;}table,td{mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;}table{border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;}img{-ms-interpolation-mode:bicubic;}a{text-decoration: none;}.aBn{border-bottom: 0 !important; cursor: default !important; color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}.a6S{display: none !important; opacity: 0.01 !important;}.g-img + div{display: none !important;}@media only screen and (min-device-width: 320px) and (max-device-width: 374px){u ~ div .email-container{min-width: 320px !important;}}@media only screen and (min-device-width: 375px) and (max-device-width: 413px){u ~ div .email-container{min-width: 375px !important;}}@media only screen and (min-device-width: 414px){u ~ div .email-container{min-width: 414px !important;}}</style> <style>.primary{background: #f3a333;}.bg_white{background: #ffffff;}.bg_light{background: #fafafa;}.bg_black{background: #3f4d67;}.bg_dark{background: rgba(0,0,0,.8);}.email-section{padding: 2.5em; padding-bottom: 0px;}.btn{padding: 10px 15px;}.btn.btn-primary{border-radius: 30px;background: #f3a333;color: #ffffff;}h1,h2,h3,h4,h5,h6{font-family: "Playfair Display", serif;color: #000000;margin-top: 0;}body{font-family: "Montserrat", sans-serif;font-weight: 400;font-size: 15px;line-height: 1.2;color: rgba(0,0,0,.4);}a{color: #f3a333;}.logo h1{margin: 0;}.logo h1 a{color: #000;font-size: 20px;font-weight: 700;text-transform: uppercase;font-family: "Montserrat", sans-serif;}.heading-section{}.heading-section h2{color: #000000;font-size: 28px;margin-top: 0;line-height: 1.4;}.heading-section .subheading{margin-bottom: 20px !important;display: inline-block;font-size: 13px;text-transform: uppercase;letter-spacing: 2px;color: rgba(0,0,0,.4);position: relative;}.heading-section .subheading::after{position: absolute;left: 0;right: 0;bottom: -10px;content: "";width: 100%;height: 2px;background: #f3a333;margin: 0 auto;}.heading-section-white{color: #000;}.heading-section-white p{color: rgba(0,0,0,.4); line-height: 24px;}.heading-section-white h2{font-size: 28px;font-family: line-height: 1;padding-bottom: 0;}.heading-section-white h2{color: #000000;}.heading-section-white .subheading{margin-bottom: 0;display: inline-block;font-size: 13px;text-transform: uppercase;letter-spacing: 2px;color: rgba(255,255,255,.4);}.icon{text-align: center;}.icon img{}.footer{color: rgba(255,255,255,.5);}.footer .heading{color: #ffffff;font-size: 20px;}.footer ul{margin: 0;padding: 0;}.footer ul li{list-style: none;margin-bottom: 10px;}.footer ul li a{color: rgba(255,255,255,1);}@media screen and (max-width: 500px){.icon{text-align: left;}.text-services{padding-left: 0;padding-right: 20px;text-align: left;}}.logo img{width: 300px; padding-top: 20px;}.bg_dark{background: #031a6e;}.footer{padding: 0px 30px;}</style> </head> <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;"> <center style="width: 100%; background-color: #f1f1f1;"> <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;"> &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp; </div><div style="max-width: 600px; margin: 0 auto;" class="email-container"> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"> <tr> <td class="bg_dark logo" style="padding:0em 2.5em; text-align:center;background: #031a6e;"> <h1><a href="#" style="text-center;"><img src="http://122.176.104.29:8081/LFSC/assets/images/logo4.png" style="width:300px;"></a></h1> </td></tr><tr> <td class="bg_white" style="background-color:#fff; padding: 0px 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="email-section" > <div class="heading-section heading-section-white"> <h2 style="text-align:center;">Welcome To ARIAS</h2> <p>Hi Dear,</p><br/> <p>You are successfully registered with Anguilla Regulatory Information & Analytics System. Please find the below details for further process.</p><p>'.$cont.'</p></div></td></tr><tr> <td class="bg_white email-section" style="background-color:#fff;"> <div class="heading-section" style="text-align: center; padding: 0 30px;"> <h2>Mission Statement</h2> <p>To enhance the safety, stability and integrity of Anguilla&apos;s financial system and contribute to Anguilla being a premier financial centre, through appropriate regulation and legislation, judicious licensing, comprehensive monitoring and good governance.</p></div><table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td valign="top" width="50%" style="padding-top: 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="text-services"> <h3>Contact Us at</h3> <p>Anguilla Financial Services Commission<br/>MAICO Building, P.O. Box 1575, The Valley</p></td></tr></table> </td><td valign="top" width="50%" style="padding-top: 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="text-services"> <h3>Email Or Call Us</h3> <p>Phone: +1 264 497 5881 Fax: +1 264 497 5872 Email: info@afsc.ai</p></td></tr></table> </td></tr></table> </td></tr></table> </td></tr></table> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"> <tr> <td valign="middle" class="bg_black footer" style=" background: #031a6e; padding:0px 20px;"> <table> <tr> <td valign="top" width="33.333%"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td style="text-align: left; padding-right: 10px;"> <p style="color:#fff;">&copy; 2019 All Rights Reserved</p></td></tr></table> </td><td valign="top" width="33.333%"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td style="text-align: right; padding-left: 5px; padding-right: 5px;"> </td></tr></table> </td></tr></table> </td></tr></table> </div></center> </body></html>';
        
        
        $ci =& get_instance();
        $ci->load->library('phpmailer_lib');
        $mail = $ci->phpmailer_lib->load();

        /* $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'benjaminroseny@gmail.com';
        $mail->Password = 'Hello@#$1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465; */
        
        //$mail->isSMTP();
        $mail->Host     = 'mail.enquiry@digitalnoticeboard.biz';
        $mail->SMTPAuth = true;
        $mail->Username = 'enquiry@digitalnoticeboard.biz';
        $mail->Password = '!RHPodeygyz#';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        
        $mail->setFrom('enquiry@digitalnoticeboard.biz', 'Anguilla Regulatory Information & Analytics System');
        
       // $mail->setFrom('benjaminroseny@gmail.com', 'Anguilla Regulatory Information & Analytics System');

        $mail->addAddress($to);
       /*  foreach($recipients as $email => $name)
        {
           $mail->addCC($email, $name);
        } */
        $mail->Subject  = $sub;
        $mail->isHTML(true);
        $mail->Body = $content;

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return true;
        }
       
    }
}
 

if (!function_exists('_send_emailR')) {
    function _send_emailR($to, $cont, $sub, $key)
    { 
       // $ss = '<a href="https://bit.ly/3eb3tGB?key='.$key.'">Click Here</a>';

        $ss = '<a href="http://mishainfotech.com/design/mail.php?key='.$key.'">Click Here</a>';
        
        $content = '<!DOCTYPE html><html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="x-apple-disable-message-reformatting"> <title></title> <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet"> <style>html,body{margin: 0 auto !important; padding: 0 !important; height: 100% !important; width: 100% !important; background: #f1f1f1;}{-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}div[style*="margin: 16px 0"]{margin: 0 !important;}table,td{mso-table-lspace: 0pt !important; mso-table-rspace: 0pt !important;}table{border-spacing: 0 !important; border-collapse: collapse !important; table-layout: fixed !important; margin: 0 auto !important;}img{-ms-interpolation-mode:bicubic;}a{text-decoration: none;}.aBn{border-bottom: 0 !important; cursor: default !important; color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}.a6S{display: none !important; opacity: 0.01 !important;}.g-img + div{display: none !important;}@media only screen and (min-device-width: 320px) and (max-device-width: 374px){u ~ div .email-container{min-width: 320px !important;}}@media only screen and (min-device-width: 375px) and (max-device-width: 413px){u ~ div .email-container{min-width: 375px !important;}}@media only screen and (min-device-width: 414px){u ~ div .email-container{min-width: 414px !important;}}</style> <style>.primary{background: #f3a333;}.bg_white{background: #ffffff;}.bg_light{background: #fafafa;}.bg_black{background: #3f4d67;}.bg_dark{background: rgba(0,0,0,.8);}.email-section{padding: 2.5em; padding-bottom: 0px;}.btn{padding: 10px 15px;}.btn.btn-primary{border-radius: 30px;background: #f3a333;color: #ffffff;}h1,h2,h3,h4,h5,h6{font-family: "Playfair Display", serif;color: #000000;margin-top: 0;}body{font-family: "Montserrat", sans-serif;font-weight: 400;font-size: 15px;line-height: 1.2;color: rgba(0,0,0,.4);}a{color: #f3a333;}.logo h1{margin: 0;}.logo h1 a{color: #000;font-size: 20px;font-weight: 700;text-transform: uppercase;font-family: "Montserrat", sans-serif;}.heading-section{}.heading-section h2{color: #000000;font-size: 28px;margin-top: 0;line-height: 1.4;}.heading-section .subheading{margin-bottom: 20px !important;display: inline-block;font-size: 13px;text-transform: uppercase;letter-spacing: 2px;color: rgba(0,0,0,.4);position: relative;}.heading-section .subheading::after{position: absolute;left: 0;right: 0;bottom: -10px;content: "";width: 100%;height: 2px;background: #f3a333;margin: 0 auto;}.heading-section-white{color: #000;}.heading-section-white p{color: rgba(0,0,0,.4); line-height: 24px;}.heading-section-white h2{font-size: 28px;font-family: line-height: 1;padding-bottom: 0;}.heading-section-white h2{color: #000000;}.heading-section-white .subheading{margin-bottom: 0;display: inline-block;font-size: 13px;text-transform: uppercase;letter-spacing: 2px;color: rgba(255,255,255,.4);}.icon{text-align: center;}.icon img{}.footer{color: rgba(255,255,255,.5);}.footer .heading{color: #ffffff;font-size: 20px;}.footer ul{margin: 0;padding: 0;}.footer ul li{list-style: none;margin-bottom: 10px;}.footer ul li a{color: rgba(255,255,255,1);}@media screen and (max-width: 500px){.icon{text-align: left;}.text-services{padding-left: 0;padding-right: 20px;text-align: left;}}.logo img{width: 300px; padding-top: 20px;}.bg_dark{background: #031a6e;}.footer{padding: 0px 30px;}</style> </head> <body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;"> <center style="width: 100%; background-color: #f1f1f1;"> <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;"> &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp; </div><div style="max-width: 600px; margin: 0 auto;" class="email-container"> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"> <tr> <td class="bg_dark logo" style="padding:0em 2.5em; text-align:center;background: #031a6e;"> <h1><a href="#" style="text-center;"><img src="http://122.176.104.29:8081/LFSC/assets/images/logo4.png" style="width:300px;"></a></h1> </td></tr><tr> <td class="bg_white" style="background-color:#fff; padding: 0px 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="email-section" > <div class="heading-section heading-section-white"> <h2 style="text-align:center;">Welcome To ARIAS</h2> <p>Hi Dear,</p><br/> <p>You have requested to reset your Anguilla Regulatory Information & Analytics System web Application login password.<br/>To reset you password plese click following link<br/><br/>'.$ss.'<br/><br/>If you did not  request to reset your password, Plesae ignore this email.<br/><br/>Thank you<br/>Anguilla Regulatory Information & Analytics System</p><p></p></div></td></tr><tr> <td class="bg_white email-section" style="background-color:#fff;"> <div class="heading-section" style="text-align: center; padding: 0 30px;"> <h2>Mission Statement</h2> <p>To enhance the safety, stability and integrity of Anguilla&apos;s financial system and contribute to Anguilla being a premier financial centre, through appropriate regulation and legislation, judicious licensing, comprehensive monitoring and good governance.</p></div><table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td valign="top" width="50%" style="padding-top: 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="text-services"> <h3>Contact Us at</h3> <p>Anguilla Financial Services Commission<br/>MAICO Building, P.O. Box 1575, The Valley</p></td></tr></table> </td><td valign="top" width="50%" style="padding-top: 20px;"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td class="text-services"> <h3>Email Or Call Us</h3> <p>Phone: +1 264 497 5881 Fax: +1 264 497 5872 Email: info@afsc.ai</p></td></tr></table> </td></tr></table> </td></tr></table> </td></tr></table> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;"> <tr> <td valign="middle" class="bg_black footer" style=" background: #031a6e; padding:0px 20px;"> <table> <tr> <td valign="top" width="33.333%"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td style="text-align: left; padding-right: 10px;"> <p style="color:#fff;">&copy; 2019 All Rights Reserved</p></td></tr></table> </td><td valign="top" width="33.333%"> <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> <td style="text-align: right; padding-left: 5px; padding-right: 5px;"> </td></tr></table> </td></tr></table> </td></tr></table> </div></center> </body></html>';
        
        
        $ci =& get_instance();
        $ci->load->library('phpmailer_lib');
        $mail = $ci->phpmailer_lib->load();

        //$mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'benjaminroseny@gmail.com';
        $mail->Password = 'Hello@#$1234';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        
        //$mail->isSMTP();
       /*  $mail->Host     = 'mail.digitalnoticeboard.biz';
        $mail->SMTPAuth = true;
        $mail->Username = 'enquiry@digitalnoticeboard.biz';
        $mail->Password = '!RHPodeygyz#';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587; */
        
        $mail->setFrom('enquiry@digitalnoticeboard.biz', 'Anguilla Regulatory Information & Analytics System');
        
        $mail->setFrom('benjaminroseny@gmail.com', 'Anguilla Regulatory Information & Analytics System');

        $mail->addAddress($to);
       /*  foreach($recipients as $email => $name)
        {
           $mail->addCC($email, $name);
        } */
        $mail->Subject  = $sub;
        $mail->isHTML(true);
        $mail->Body = $content;

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return true;
        }
       
    }
}


if (!function_exists('_formsubmit')) {

    function _formsubmit($POST,$people) {
        $ci = & get_instance(); 
        $data = array();
        $datas = array();
        foreach($POST as $key => $value) {  
            if (!(in_array($key, $people))){
                $data[]  = $key;
                $datas[] = $value;
            }
         }
         $a = array_combine($data, $datas);
        return  $a;
    }
}
if (!function_exists('_getfields')) {
    function _getfields($table,$field) {  
        $ci = & get_instance(); 
        $sql = "Show Columns from`$table` where Field NOT IN ($field)"; 
        $data = $ci->db->query($sql)->result();
        return $data;  
    }
}
if (!function_exists('_uploadFile')) {

    function _uploadFile($fname, $tmp_name, $Dname, $cName, $subDir, $exists) {
        
        $CI = & get_instance();
       
        $rfile = '';
        if ($fname != "") {
                $dest   = 'uploads/'.$subDir.'/'.$cName.'/';
                $f_type = explode(".", $fname);
                $ext    = strtolower($f_type[count($f_type) - 1]);              
                $fpath  = md5($Dname.'-' . time() . '-afsc').'.'. $ext;
                
                move_uploaded_file($tmp_name, $dest.$fpath); 
                
                if ($exists != "") {
                    if (file_exists($dest.$exists)) {
                        @unlink($dest.$exists);
                    }
                }
                 $rfile = $fpath;  
            }else {
                $rfile = $exists;
            }
        return $rfile;
    }

}


if (!function_exists('_uploadFileOthers')) {

    function _uploadFileOthers($fname, $tmp_name, $Dname, $exists) {
        
        $CI = & get_instance();
       
        $rfile = '';
        if ($fname != "") {
                _createdirectory($Dname,'');
                $dest   = 'uploads/'. $Dname.'/';
                $f_type = explode(".", $fname);
                $ext    = strtolower($f_type[count($f_type) - 1]);              
                $fpath  = md5($Dname.'-' . time() . '-afsc').'.'. $ext;
                
                move_uploaded_file($tmp_name, $dest.$fpath); 
                
                if ($exists != "") {
                    if (file_exists($dest.$exists)) {
                        @unlink($dest.$exists);
                    }
                }
                 $rfile = $fpath;  
            }else {
                $rfile = $exists;
            }
        return $rfile;
    }

}
if (!function_exists('_createdirectory')) {

 function _createdirectory($dir,$subDir) {
        if (!is_dir('uploads/'.$dir)) {
            mkdir('uploads/'.$dir, 0777, TRUE);
        }
        if (!is_dir('uploads/'.$dir.'/'.$subDir)) {
            mkdir('uploads/'.$dir.'/'.$subDir, 0777, TRUE);
        }
        if (!is_dir('uploads/'.$dir.'/'.$subDir)) {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}


if (!function_exists('_createPDF')) {

 function _createPDF($content) {
        $ci = & get_instance();
        $ci->load->library('dompdf_gen');
        $pdf = new dompdf_gen();
        
        $html = '<style>@page{margin: 10px;}body{margin: 0px;font-family:"Roboto", sans-serif;font-size:14px;}.main_invoice{border:1px solid #ddd;margin-top:50px;border-collapse: collapse;}.main_invoice tr td{padding:10px;border:1px solid #ddd;}.main_invoice tr th{padding:10px;border:1px solid #ddd;background-color: #0b9a43 !important;color:#fff;}.main_invoice tr td:nth-child(3){text-align:right;}.head{color:#fff;text-align:right;}.content{margin-top:50px;}</style><table width="100%" style="background-color:#031a6e;"><tr><td colspan="3"><img src="http://122.176.104.29:8081/LFSC/assets/images/logo4.png" width="265"></td><td colspan="1"><h4 class="head">INVOICE</h4></td></tr></table><table width="100%" class="content"> <tbody> <tr> <td>Invoice No:</td><td></td><td>Invoice Date:</td><td></td></tr><tr> <td>Name:</td><td></td><td>Due Date:</td><td> </td></tr><tr> <td>Address</td><td></td><td></td><td></td></tr><tr> <td>City</td><td></td><td></td><td></td></tr><tr> <td>Email</td><td></td><td></td><td></td></tr><tr> <td>Phone</td><td></td><td></td><td></td></tr></tbody></table><table width="100%" class="main_invoice"><thead> <tr> <th >S.No</th> <th>Description</th> <th>Amount</th> </tr></thead> <tbody> <tr> <td>1</td><td>Renewal of Return</td><td>$500.00</td></tr><tr> <td>2</td><td>Late Payment (10 Days @ $2.00/Day)</td><td> $20.00</td></tr><tr> <td>Total</td><td></td><td>$520.00</td></tr><tr> <td>Amount in Words</td><td>$ Five Hundres and Twenty only</td><td></td></tr></tbody></table>';
        $ci->dompdf->set_option('isRemoteEnabled', TRUE);
        $ci->dompdf->loadHtml($html);
        $ci->dompdf->setPaper('A4', 'portrait');
        $ci->dompdf->render();
        $fileName = "Invoice_" . date('YmdHis') . ".pdf";
        $ci->dompdf->stream($fileName, array("Attachment" => 0));
        die;
   }    
} 

if (!function_exists('file_type')) {
    function file_type($type,$name) {
        $CI = & get_instance();
        $ext=explode('.',$name);
        if($type=='image/png' ||$type=='image/jpg' ||$type=='image/jpeg')
            return '<i class="fa fa-file-image-o"></i>';
        else
            if($type=='application/octet-stream' && ($ext[1]=='xls' || $ext[1]=='xlsx'))
            return '<i class="fa fa-file-excel-o"></i>';
        else if($type=='application/pdf')
            return '<i class="fa fa-file-pdf-o"></i>';
        else if($type=='application/octet-stream' && ($ext[1]=='doc' || $ext[1]=='docx'))
            return '<i class="fa fa-file-word-o"></i>';
        else
            return '<i class="fa fa-file-image-o"></i>';
        
    }
}
if (!function_exists('_dFormat')) {
    function _dFormat($dd='')
    {
         $ci =& get_instance();
         if($dd != '0000-00-00' && $dd != '' && $dd != '1900-01-01'){
            $nDate = DateTime::createFromFormat('Y-m-d', $dd);
            $nDD = $nDate->format('m-d-Y'); 
         }else{
            $nDD = ''; 
         }
         
         return $nDD;
    }
}

if (!function_exists('_dFormatReports')) {
    function _dFormatReports($dd='')
    {
         $ci =& get_instance();
         if($dd != '0000-00-00' && $dd != '' && $dd != '1900-01-01'){
            $nDate = DateTime::createFromFormat('Y-m-d', $dd);
            $nDD = $nDate->format('Y-m-d'); 
         }else{
            $nDD = ''; 
         }
         
         return $nDD;
    }
}

if (!function_exists('_niceFormat')) {
    function _niceFormat($dd='')
    {
         $ci =& get_instance();
         if($dd != '0000-00-00' && $dd != '' && $dd != '1900-01-01'){
            $nDate = DateTime::createFromFormat('Y-m-d', $dd);
            $nDD = $nDate->format('j F Y'); 
         }else{
            $nDD = ''; 
         }
         
         return $nDD;
    }
}

if (!function_exists('_dRegexmatch')) {
    function _dRegexmatch($checkval='')
    {
        $ci =& get_instance();
        $regex = '^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$^';
        $formatval = ''; 
        
            if (preg_match($regex,$checkval)) {
                $formatval= date('Y-m-d',strtotime($checkval));
            }else{
                $formatval = str_replace(",", "", $checkval);
            }
        return $formatval;
    }
}


if (!function_exists('isDate')) {
    function isDate($value) 
        {
            $ci =& get_instance();
            if (!$value) {
                return false;
            }

            try {
                new \DateTime($value);
                    return true;
            } catch (\Exception $e) {
                return false;
        }
    }
}

if (!function_exists('_formStucture')) {
    function _formStucture($tbl)
    {
         $ci =& get_instance();
        return $ci->master_model->_formStucture($tbl);
    }
}

if (!function_exists('_hasParent')) {
    function _hasParent($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findParent($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_hasMChild')) {
    function _hasMChild($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findMChild($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_hasChild')) {
    function _hasChild($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findChild($rid, $tbl);
         return $res;
    }
}
if (!function_exists('_hasSubChild')) {
    function _hasSubChild($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findSubChild($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_hasChildID')) {
    function _hasChildID($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_findChildID($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_datediff')) {
    function _datediff($d1, $d2)
    {
         $ci =& get_instance();
         return round(abs(strtotime($d1) - strtotime($d2)) / 86400);
    }
}
if (!function_exists('_datediffs')) {
    function _datediffs($d1, $d2)
    {
         $ci =& get_instance();
         return round((strtotime($d1) - strtotime($d2)) / 86400);
    }
}

if (!function_exists('_Check_FinanacialYear')) {
    function _Check_FinanacialYear($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_getFinancialYear_end($id);
    }
}

if (!function_exists('_findDays')) {
    function _findDays($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_find_NumDays($id);
    }
}

if (!function_exists('_findDays2')) {
    function _findDays2($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_find_NumDays2($id);
    }
}


if (!function_exists('_Roles')) {
    function _Roles($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_Roles($id);
    }
}


if (!function_exists('buildTree')) {
    function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element->parent_id == $parentId) {
            $children = buildTree($elements, $element->id);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

}


if (!function_exists('_allEnforcement')) {
    function _allEnforcement($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_allEnforcement($id);
    }
}

if (!function_exists('_allRegulators')) {
    function _allRegulators($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_Regulators($id);
    }
}

if (!function_exists('_serviceTypes')) {
    function _serviceTypes($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_serviceTypes($id);
    }
}

if (!function_exists('_subSectors')) {
    function _subSectors($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_subSectors($id);
    }
}


if (!function_exists('_entitysubSector')) {
    function _entitysubSector($id, $sec)
    {
        $ci =& get_instance();
        return $ci->master_model->_entitysubSector($id, $sec);
    }
}

// himanshu changes start for multiple sectors 30-11-2021

if (!function_exists('_entitysubSectorbymultiSector')) {
    function _entitysubSectorbymultiSector($id, $sec)
    {
        $ci =& get_instance();
        return $ci->master_model->_entitysubSectorbymultiSector($id, $sec);
    }
}

// himanshu changes end for multiple sectors 30-11-2021

if (!function_exists('_entitySector')) {
    function _entitySector($id, $sid)
    {
        $ci =& get_instance();
        return $ci->master_model->_entitySector($id, $sid);
    }
}

if (!function_exists('_entityRsubSector')) {
    function _entityRsubSector($id, $sec)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityRsubSector($id, $sec);
    }
}

if (!function_exists('_entityRSector')) {
    function _entityRSector($id, $sid)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityRSector($id, $sid);
    }
}

if (!function_exists('_subSectorsbySector')) {
    function _subSectorsbySector($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_subSectorsbySector($id);
    }
}

if (!function_exists('_subSectorsbySectors')) {
    function _subSectorsbySectors($id, $sid)
    {
        $ci =& get_instance();
        return $ci->master_model->_subSectorsbySectors($id, $sid);
    }
}

if (!function_exists('_subSectorsbySectorDropdown')) {
    function _subSectorsbySectorDropdown($id, $mid)
    {
        $ci =& get_instance();
        $subsectors = _subSectorsbySectors($id);
       //print_r( $subsectors);exit;
        foreach ($subsectors as  $row) {
            
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $cn .= "<option ".$Sdata." value ='".$row->id."'>";
                  $cn .= $row->sector_name;
                  $cn .= "</option>";
            }
        return $cn;
    }
}

if (!function_exists('_stakeholders')) {
    function _stakeholders($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_stakeholders($id);
    }
}

if (!function_exists('_Sectorby_subSector')) {
    function _Sectorby_subSector($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_Sectorby_subSector($id);
    }
}

if (!function_exists('_catsbysubSector')) {
    function _catsbysubSector($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_subcats($id);
    }
}

if (!function_exists('_serviceProvider')) {
    function _serviceProvider($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_serviceProvider($id);
    }
}

if (!function_exists('_ratings')) {
    function _ratings($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_ratings($id);
    }
}


if (!function_exists('_entityName')) {
    function _entityName($id)
    {
        $ci =& get_instance();
        $res = $ci->master_model->_entityInfo($id);
        if(!empty($res)){
            $res = $res->name;
        }else{
            $res = '';
        }
        
        return $res;
    }
}

if (!function_exists('_entity')) {
    function _entity($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityInfo($id);
    }
}

if (!function_exists('_entitySsector')) {
    function _entitySsector($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_entitySsector($id);
    }
}

if (!function_exists('_entityID_relation')) {
    function _entityID_relation($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityID_relation($id);
    }
}

if (!function_exists('_RelationShip')) {
    function _RelationShip($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_RelationShip($id);
    }
}

if (!function_exists('_countryID')) {
    function _countryID($name)
    {
        $ci =& get_instance();
        return $ci->master_model->_countryID($name);
    }
}

if (!function_exists('_members')) {
    function _members($term)
    {
        $ci =& get_instance();
        return $ci->master_model->_members($term);
    }
}



if (!function_exists('_dueDate')) {
    function _dueDate($id, $rt, $val, $yy)
    {
        $ci =& get_instance();
        
        $ss = _Check_FinanacialYear($ci->session->userdata('id')); 
        $date = new DateTime();
        @$date->setDate($yy, $ss->FinancialYearEnd, date('d'));
        $fDate = $date->format('Y-m-d');

        if($rt == 1){
            $mm = 11; $dys = _findDays($rt);
        }
        if($rt == 2){
            if($val == 1){ $mm = 5;}
            if($val == 2){ $mm = 11;}
            
            $dys = _findDays($rt);
            
        }
        if($rt == 3){
            if($val == 1){ $mm = 0;}
            if($val == 2){ $mm = 1;}
            if($val == 3){ $mm = 2;}
            if($val == 4){ $mm = 3;}
            if($val == 5){ $mm = 4;}
            if($val == 6){ $mm = 5;}
            if($val == 7){ $mm = 6;}
            if($val == 8){ $mm = 7;}
            if($val == 9){ $mm = 8;}
            if($val == 10){ $mm = 9;}
            if($val == 11){ $mm = 10;}
            if($val == 12){ $mm = 11;}
            
            $dys = _findDays($rt);
        
        }
        if($rt == 4){
            if($val == 1){ $mm = 2;}
            if($val == 2){ $mm = 5;}
            if($val == 3){ $mm = 8;}
            if($val == 4){ $mm = 11;}
            
            $dys = _findDays($rt);
        
        }
        
        $eD   = date('Y-m-d', strtotime("+".$mm." months", strtotime($fDate)));
        
        $lst  = date("Y-m-t", strtotime($eD));
        
        $due  = date('Y-m-d', strtotime($lst. ' +'.$dys.' days'));

        return $due;
    }
}

if (!function_exists('_dueDate2')) {
    function _dueDate2($id, $rt, $fEnd, $val, $periodType, $yy)
    {
        $ci =& get_instance();
        
        //$ss = _Check_FinanacialYear($ci->session->userdata('id')); 
        $date = new DateTime();
        @$date->setDate($yy, $fEnd, date('d'));
        $fDate = $date->format('Y-m-d');

        if($rt == 1){
            $mm = 11; $dys = _findDays2($rt);
        }
        if($rt == 2){
            if($val == 1){ $mm = 5;}
            if($val == 2){ $mm = 11;}
            
            $dys = _findDays2($rt);
            
            
        }
        if($rt == 3){
            if($val == 1){ $mm = 0;}
            if($val == 2){ $mm = 1;}
            if($val == 3){ $mm = 2;}
            if($val == 4){ $mm = 3;}
            if($val == 5){ $mm = 4;}
            if($val == 6){ $mm = 5;}
            if($val == 7){ $mm = 6;}
            if($val == 8){ $mm = 7;}
            if($val == 9){ $mm = 8;}
            if($val == 10){ $mm = 9;}
            if($val == 11){ $mm = 10;}
            if($val == 12){ $mm = 11;}
            
            $dys = _findDays2($rt);
            
        
        }
        if($rt == 4){
            if($val == 1){ $mm = 2;}
            if($val == 2){ $mm = 5;}
            if($val == 3){ $mm = 8;}
            if($val == 4){ $mm = 11;}
            
            $dys = _findDays2($rt);
            
        
        }
        
        $eD   = date('Y-m-d', strtotime("+".$mm." months", strtotime($fDate)));
        
        $lst  = date("Y-m-t", strtotime($eD));
        
        $due  = date('Y-m-d', strtotime($lst. ' +'.$dys.' days'));

        return $due;
    }
}

if (!function_exists('_save_scheduleRemider')) {
    function _save_scheduleReminder($tbl)
    {
         $ci =& get_instance();
        return $ci->master_model->_saveReminder($tbl);
    }
}


if (!function_exists('_more')) {
    function _more($str)
    {
         $ci =& get_instance();
         if (strlen($str) > 50)
            $str = substr($str, 0, 45) . '...';
        return $str;
    }
}

if (!function_exists('_rating')) {
    function _rating($str)
    {
         $ci =& get_instance();
         return $ci->master_model->_ratingInfo($str);
    }
}

if (!function_exists('_calMaxShare')) {
    function _calMaxShare($id)
    {
         $ci =& get_instance();
         return $ci->master_model->_calMaxShare($id);
    }
}


if (!function_exists('_alertDate')) {
    function _alertDate($id, $rt)
    {
        $ci =& get_instance();
        $yy = date('Y');
        $ss = _Check_FinanacialYear($id); 
        $date = new DateTime();
    
        @$date->setDate($yy, $ss->FinancialYearEnd, date('d'));
        $fDate = $date->format('Y-m-d');

        if($rt == 1){
            $dys = 45;
        }
        if($rt == 2){
            $dys = 45;
        }
        if($rt == 3){
            $dys = 15;
        }
        if($rt == 4){
            $dys = 7;       
        }
        $lst  = date("Y-m-t", strtotime($fDate));
        $alertDate  = date('Y-m-d', strtotime($lst. ' -'.$dys.' days'));

        return $alertDate;
    }
}


if (!function_exists('_alertReturn')) {

    function _alertReturn() {
        $ci     = & get_instance(); 
        $res    = $ci->master_model->get_allLicensees_FinancialYear();
        if(!empty($res)){
            foreach($res as $rows){
                $uid      = $rows->id;
                $sec      = explode(',', $rows->sector);
                if(!empty($sec)){
                    foreach($sec as $rows){ 
                       if(!empty($rows)){
                            $dt           = _alertDate(20, 1);
                            $current      = date('Y-m-d');
                            $datas        = array(
                              'ReturnTypeid'=>1,
                              'NumDays'=>45,
                              'Before'=>1,
                              'ReminderMessage'=>'Licensee notified for return reminder'
                            );
                            if(strtotime($dt) == strtotime($current)){
                                _send_email('hemant.v@mishainfotech.com', 'Test', 'Return Pending Notification');
                                _save_scheduleReminder($datas);
                            }else{
                                echo'hello<br/>';
                            }
                        }   
                    }
                }   
            }
        }
    }
}

if (!function_exists('oTree')) {
    function oTree($id)
    {
        $ci =& get_instance();
        $res = $ci->master_model->get_parent($id);
        return $res;
    }
}
//create notification  
if (!function_exists('_createNotification')) {

    function _createNotification($data,$token  )
    {
        $ci =& get_instance();
     
        $sdata['notification_type_id']   = $data['notification_type_id'];
        $sdata['email_to']   = $data['email_to'];
        $sdata['user_by']   = $data['user_by'];
        $sdata['status']   = 'Pending';
        $sdata['tbl_unique_id']   = $data['tbl_unique_id'];
        $sdata['created_date']   = date('Y-m-d h:i:s');
        $sdata['sent_user_type']   = 'users'; //for HMVC Panel user table
        
        $ci->db->insert('fsc_notifications', $sdata);
        $notification_id = $ci->db->insert_id();
         
        $result = _sendMailNotification($sdata,$notification_id,$token );

        return $result;
    }

}

if (!function_exists('getReturnNotificationDate')) {
    function  getReturnNotificationDate($rt){
  
        $date = new DateTime();
        @$date->setDate(date('Y'), $rt, date('d'));
        $fDate = $date->format('Y-m-d');

        if($rt == 1){
            $dys = 45;
        }
        if($rt == 2){
            $dys = 45;
        }
        if($rt == 3){
            $dys = 15;
        }
        if($rt == 4){
            $dys = 7;       
        }
        $lst  = date("Y-m-t", strtotime($fDate));
        return  date('Y-m-d', strtotime($lst. ' -'.$dys.' days'));
    }

}
if (!function_exists('_getNotificationType')) {

    function _getNotificationType($notification_type_id )
    {
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->where('notification_type_id', $notification_type_id);
        $ci->db->from('fsc_notification_type'); 
        $query = $ci->db->get();
        return  $query->row();

    }
}
if (!function_exists('_allNotificationType')) {

    function _allNotificationType( )
    {
        $ci =& get_instance();
        $ci->db->select('notification_type_id,name');
        $ci->db->from('fsc_notification_type'); 
        $query = $ci->db->get();
        return  $query->result();

    }
}

if (!function_exists('_allNotificationType')) {

    function _allNotificationType( )
    {
        $ci =& get_instance();
        $ci->db->select('notification_type_id,name');
        $ci->db->from('fsc_notification_type'); 
        $query = $ci->db->get();
        return  $query->result();

    }
}
if (!function_exists('_getDevice')) {
    function _getDevice( )
    {
        return 'Web';
    }
}
if ( !function_exists('_replaceTemplateContent') ){

    function _replaceTemplateContent( $content,$token ){
 
        $pattern = '[%s]';
        foreach($token as $key=>$val){
            $varMap[sprintf($pattern,$key)] = $val;
        }

        return $emailContent = strtr($content,$varMap);
    }
}

if (!function_exists('_sendMailNotification')) {

    function _sendMailNotification( $data,$notification_id ,$token)
    {
        $ci = & get_instance();
        
        $ci->db->select('fsc_notification_type.*,fsc_notifications_template.*');
         $ci->db->join('fsc_notifications_template','fsc_notifications_template.notifications_template_id=fsc_notification_type.notifications_template_id','left');
        $ci->db->from('fsc_notification_type');
        $ci->db->where('fsc_notification_type.notification_type_id', $data['notification_type_id']);
        $query = $ci->db->get();
        $notification_type = $query->row();


        //$body = $ci->load->view('emails/anillabs.php',$data,TRUE);
         
        $ci->load->library('phpmailer_lib');
        $mail = $ci->phpmailer_lib->load();

        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'benjaminroseny@gmail.com';
        $mail->Password = 'Hello@#$1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('benjaminroseny@gmail.com', 'AFSC');

        $mail->addAddress($data['email_to']);
        $mail->Subject  = $notification_type->name.' notification';
        $mail->isHTML(true);

        
        $content = _replaceTemplateContent( $notification_type->content, $token );
        $mail->Body = $content;
        if(!$mail->send()){
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else{

            $ci->db->set('resend_count', 'resend_count+1', FALSE);
            $ci->db->where('notification_id', $notification_id);
            $ci->db->update( 'fsc_notifications', array('status' => 'Sent','sent_from' => _getDevice()) );
 
            $fsc_notifications_data['text']   = $content;
            $fsc_notifications_data['notification_id']   =   $notification_id; //with the modify content
            $ci->db->insert('fsc_notification_description',  $fsc_notifications_data);
            return true;
        }

        
    }

}

if (!function_exists('_ActionStatus')) {
    function _ActionStatus($id, $eid)
    {
        $ci =& get_instance();
        $res = $ci->master_model->_ActionStatus($id, $eid);
        return $res;
    }
}

if (!function_exists('_checkReinsurance')) {
    function _checkReinsurance($id)
    {
        $ci =& get_instance();
        $res = $ci->master_model->_checkReinsurance($id);
        return $res;
    }
}

if (!function_exists('_totalHolding')) {
    function _totalHolding($id, $pid, $share)
    {
        $ci =& get_instance();
        $res = $ci->master_model->_totalHolding($id, $pid, $share);
        return $res;
    }
}

if (!function_exists('_checkType')) {
    function _checkType($id)
    {
        $ci =& get_instance();
        $res = $ci->master_model->_checkType($id);
        if(!empty($res)){
            $res = $res->type_id;
        }else{
            $res = '';
        }
        return $res;
    }
}


if (!function_exists('_createLicensee')) {
    function _createLicensee($id, $data)
    {
        $ci =& get_instance();
        $cnt = $ci->master_model->checkLicensee($id, $data['true_email']);
        if($cnt == 0){
            $sdata['user_email']   = $data['true_email'];
            $sdata['password']     = md5('licensee');
            $sdata['user_phone']   = $data['true_phone'];
            $sdata['created']      = date('Y-m-d H:i:s');
            $sdata['created_byid'] = $_SESSION['id'];
            $sdata['entity_id'] = $id;
            $ci->db->insert('licensees', $sdata);
            
            $rr = $ci->db->insert_id();
        }else{
            $rr = 0;
        }
        
        return $rr;
    }
}

function insertRecord($key, $id, $share, $parent_id) {
    $ci =& get_instance();
    
    $data['share']     = $share;
    $data['parent_id'] = $parent_id;
    $data['entity_id'] = $id;
    if($share !='' && $parent_id != '' && $id !=''){
        $ci->master_model->insert_data('ultimate_owners', $data);
    }
    return true;
}

function get_all_owners($eid)
{
    $ci =& get_instance();
    $benificial_owners       = $ci->master_model->get_owners($eid);
    return $benificial_owners;
}
function truncate_data($tbl) {
    $ci =& get_instance();
    $ci->db->empty_table($tbl);
    return true;
}

if (!function_exists('_ReturnLog')) {
    function _ReturnLog($data)
    {
        $ci =& get_instance();
        return $ci->master_model->_ReturnLog($data);
    }
}

if (!function_exists('_webUserExists')) {
    function _webUserExists($uname)
    {
        $ci =& get_instance();
        return $ci->master_model->_webUserExists($uname);
    }
}

if (!function_exists('_entityExists')) {
    function _entityExists($eid, $uname)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityExists($eid, $uname);
    }
}

if (!function_exists('_ReturnDInfo')) {
    function _ReturnDInfo($tbl, $id, $col, $rid)
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnSInfo($tbl, $id, $col, $rid);
    }
}

if (!function_exists('_ReturnDInfos')) {
    function _ReturnDInfos($tbl, $id, $pid)
    {
        $ci =& get_instance();
        return $ci->master_model->mget_returnSInfo($tbl, $id, $pid);
    }
}


if (!function_exists('_ReturnHistory')) {
    function _ReturnHistory($dID)
    {
        $ci =& get_instance();
        return $ci->master_model->_ReturnHistory($dID);
    }
}

if (!function_exists('_regulator')) {
    function _regulator($id) {
        $ci = & get_instance();
         $ci->db->select('E.*');
            $ci->db->from('employees AS E');
            $ci->db->where('E.id', $id);
            $user = $ci->db->get()->row();
        return $user; 
    } 
}
if (!function_exists('_currencies')) {
    function _currencies($mid)
    {
        $ci =& get_instance();
        $banks = "";
        $query = $ci->db->get('currency');
        $Mq    =  $query->result();
            
            foreach ($Mq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $banks .= "<option ".$Sdata." value ='".$row->id."'>";
                  $banks .= $row->code;
                  $banks .= "</option>";
            }
        return $banks;
    }
}

if (!function_exists('_FindReturn')) {
    function _FindReturn($id)
    {
        $ci =& get_instance();
        return $ci->master_model->_FindReturn($id);
    }
}

if (!function_exists('_getReturnType')) {
    function _getReturnType( $entity_id )
    {
        $ci =& get_instance();
        return 3; // ANNUAL = 1,SEMI-ANNUAL = 2 ,MONTHLY=3, QUARTERLY=4
    }
}

if (!function_exists('_getFinancialYearEnd')) {
    function _getFinancialYearEnd( $entity_id )
    {
        $ci =& get_instance();
        return 4; //Get the finacial end date 
    }
}

if (!function_exists('_getNotificationDate')) {
    function _getNotificationDate( $financial_year_end,$rt )
    {
        $date = new DateTime();
        @$date->setDate(date('Y'), $financial_year_end, date('d'));
        $fDate = $date->format('Y-m-d');

        if( $rt == 1 ) { //
            $dys = 45;
            $lst  = date("Y-m-t", strtotime($fDate));
            $mounth[]  = date('Y-m-d', strtotime($lst. ' -'.$dys.' days'));
        }else if( $rt == 2 ) { // SEMI-ANNUAL divided into 2
            $mounth = _getAllNotificationDate(6,$financial_year_end,14) ;  
            $mounth = array_merge($mounth,_getAllNotificationDate(6,$financial_year_end,45) );
        }else if( $rt == 3 ){ // MONTHLY divided into 3
            $mounth = _getAllNotificationDate(1,$financial_year_end,15) ;  
        }else if($rt == 4) { // QUARTERLY divided into four
            $mounth = _getAllNotificationDate(3,$financial_year_end,7) ;  
        }
        return $mounth;
    }
}
//Get All date for due notification
if (!function_exists('_getNotificationMonth')) {
    function _getAllNotificationDate($total_months,$financial_year_end,$dys)
    {
        $date = new DateTime();

        for ( $i = 1;  $i <= 12/$total_months; $i++ ) {
             
            $financial_year_end = $financial_year_end+$total_months;

            @$date->setDate(date('Y'), $financial_year_end, date('d'));

            $fDate = $date->format('Y-m-d');

            $lst  = date("Y-m-t", strtotime($fDate));
            $alertDate[]  = date('Y-m-d', strtotime($lst. ' -'.$dys.' days'));
        }
       return $alertDate;
    }
}


//Get All entity Return Types By Sector
if (!function_exists('_getEntitySector')) {
    function _getEntitySector($eid)
    {
        $ci =& get_instance(); $sec = array();
        $ss = $ci->master_model->all_EntityLicenses($eid);
        if(!empty($ss)){
            foreach($ss as $rows){
                $sec[] = $rows->sector_id;
            }
        }
       $sec = array_filter($sec);
       return $sec;
    }
}
if (!function_exists('_rTypes')) {
    function _rTypes($mid, $id)
    {
        $ci =& get_instance();
        return $ci->master_model->get_frequencyType($mid, $id);
    }
}

if (!function_exists('_getReturn_TypebySector')) {
    function _getReturn_TypebySector($sec)
    {
        $ci =& get_instance(); 
        $rtype = $ci->master_model->_ReturnType($sec);
        return $rtype;
    }
}

if (!function_exists('_ReturnType')) {
    function _ReturnType($sec)
    {
        $ci =& get_instance();
        return $ci->master_model->_ReturnType($sec);
    }
}

if (!function_exists('_allNotifications')) {
    function _allNotifications()
    {
        $ci =& get_instance(); 
        $rtype = $ci->master_model->_allNotifications();
        return $rtype;
    }
}

if (!function_exists('_unreadNotifications')) {
    function _unreadNotifications()
    {
        $ci =& get_instance(); 
        $rtype = $ci->master_model->_unreadNotifications();
        return $rtype;
    }
}
if (!function_exists('addNotification')) { 
    function addNotification($activity = null, $rid) {
        $ci =& get_instance();
        
        $rt = _findReturn($rid); 
        //print_r($rt);exit;
        $sdata['notification_type_id']   = 3;
        $sdata['email_to']               = '';
        $sdata['user_by']                = $ci->session->userdata('id');
        $sdata['status']                 = 'Send';
        $sdata['tbl_unique_id']          = $rt->entity_id;
        $sdata['created_date']           = date('Y-m-d h:i:s');
        $sdata['sent_user_type']         = 'users';
        
        $ci->db->insert('fsc_notifications', $sdata);
        $n_id = $ci->db->insert_id();
        _Notification_data($activity, $n_id);
        //$result = _sendMailNotification($sdata,$notification_id,$token );

        //return $result;
        return true;
    }
}

if (!function_exists('addLNotification')) { 
    function addLNotification($activity = null, $rid) {
        $ci =& get_instance();
        
        $eInfo     = $ci->web->get_Lrequest($rid); 
    
        $sdata['notification_type_id']   = 4;
        $sdata['email_to']               = '';
        $sdata['user_by']                = $ci->session->userdata('id');
        $sdata['status']                 = 'Send';
        $sdata['tbl_unique_id']          = $eInfo->entity_id;
        $sdata['created_date']           = date('Y-m-d h:i:s');
        $sdata['sent_user_type']         = 'users';
        
        $ci->db->insert('fsc_notifications', $sdata);
        $n_id = $ci->db->insert_id();
        _Notification_data($activity, $n_id);
        //$result = _sendMailNotification($sdata,$notification_id,$token );

        //return $result;
        return true;
    }
}

if (!function_exists('_Notification_data')) { 
    function _Notification_data($activity = null, $nid) {
        $ci =& get_instance();
     
        $sdata['notification_id']   = $nid;
        $sdata['text']   = $activity;
        $ci->db->insert('fsc_notification_description', $sdata);
        
        return true;
    }
}
if (!function_exists('_getPreLicenseData')) { 

    function _getPreLicenseData($entity_id,$page) {
        
      //  $url ='http://localhost/ARIAS_LFSC/'.$page.'/get_detail/?entity_id='.$entity_id;
        // echo 'http://localhost/ARIAS_LFSC/'.$page.'/get_detail/?entity_id='.$entity_id;
        // die;
        // $ch = curl_init('http://localhost/ARIAS_LFSC/'.$page.'/get_detail/?entity_id='.$entity_id);

        // curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
        // curl_setopt($ch, CURLOPT_POST, 1);
        // //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // $result = curl_exec($ch);
        // curl_close($ch);
        // var_dump(json_decode($result, true));
        
       // $unparsed_json = file_get_contents($url);
        //echo $unparsed_json
        //return $json_object = json_decode($unparsed_json);
        //return $result;
    // $eid  = $this->input->get('entity_id'); 

    //     $data['entity_detail'] = $this->web->get_entity($entityid);

    //     $data['entity_applicant'] = $this->web->get_entitieschild('entity_applicant', $entityid);
        
    //     $data['entity_extrainfo'] = $this->web->get_entitieschild('ersp_extrainfo', $entityid, 'asc');
    //     $data['addtional_documents'] = $this->web->get_entitieschild('addtional_documents', $entityid,'asc');
 
    //     $data['applicant_establishment'] = $this->web->get_entitieschild('applicant_establishment', $entityid, 'asc');
    //     $data['applicant_licence'] = $this->web->get_entitieschild('applicant_licence', $entityid, 'asc');
    //     $data['applicant_misconduct'] = $this->web->get_entitieschild('applicant_misconduct', $entityid, 'asc');

    //     $data['entity_mlro'] = $this->web->get_entitieschild('mlro_info', $entityid, 'asc');

    //     $data['mlro_reference'] = $this->web->get_entitieschild('mlro_reference', $entityid, 'ASC');
    //     $data['ersp_reference'] = $this->web->get_entitieschild('ersp_reference', $entityid, 'ASC');

    //     $data['applicant_criminal_offence'] = $this->web->get_entitieschild('applicant_criminal_offence', $entityid, 'ASC');
    //     $data['applicant_company'] = $this->web->get_entitieschild('applicant_company', $entityid, 'asc');

    //     $data['entity_relationship'] = $this->web->get_entitieschild('entity_relationship', $entityid, 'asc');
    //     $data['entity_relation_charge'] = $this->web->get_entitieschild('entity_relation_charge', $entityid, 'asc');
    //     $data['nrsp_other_offices'] = $this->web->get_entitieschild('nrsp_other_offices', $entityid);
    //     $data['entity_nrsp'] = $this->web->get_entitieschild('nrsp_info', $entityid, 'asc'); 
        
    //      return json_encode($data);



    }
}

if (!function_exists('_getTempUserDetail')) {

    function _getTempUserDetail($id){

        $ci = & get_instance();
        $ci->db->select('*'); 
        $ci->db->where('id',$id);
        $query = $ci->db->get('temp_users');
        $result = $query->row();
        return $result; 
    }
}

if (!function_exists('_getSetting')) {

    function _getSetting(){

        $ci = & get_instance();
        $ci->db->select('*');  
        $query = $ci->db->get('settings');
        $result = $query->row();
        return $result; 
    }
}

if (!function_exists('_getUserlastAction')) {

    function _getUserlastAction($id){

        $ci = & get_instance();
        $ci->db->select('last_action_time'); 
        $ci->db->where('id',$id); 
        $query = $ci->db->get('users');
        $result = $query->row();
        return $result->last_action_time; 
    }
}

if (!function_exists('_update_last_action_time')) {

    function _update_last_action_time($id){

        $ci = & get_instance();
         $ci->db->where('id',$id); 
        $query = $ci->db->update('users',array('last_action_time' => date('Y-m-d H:i:s')));
        $result = $query->row();
        return $result->last_action_time; 
    }
}

if (!function_exists('_findTempuser')) {

    function _findTempuser($id){
        $res = array();
        $ci = & get_instance();
        $ci->db->where('id',$id); 
        $query = $ci->db->get('entity');
        $result = $query->row();
        if(!empty($result)){
            $ci->db->where('id',$result->temp_user); 
            $res = $ci->db->get('temp_users')->row();
        }
        return $res;
    }
}


if (!function_exists('_PaymentDetails')) {

    function _PaymentDetails($id){
        $res = array();
        $ci = & get_instance();
        $ci->db->where('id',$id); 
        $query = $ci->db->get('licensee_payments');
        $result = $query->row();
        return $result;
    }
}

if (!function_exists('_PostLicPaymentDetails')) {

    function _PostLicPaymentDetails($id){
        $res = array();
        $ci = & get_instance();
        $ci->db->where('id',$id); 
        $query = $ci->db->get('post_licensee_payments');
        $result = $query->row();
        return $result;
    }
}

if (!function_exists('_sectorid_by_subsector')) {

    function _sectorid_by_subsector($subsector_id) {
        $ci =& get_instance();
        return $ci->master_model->_SectorbysubSectors($subsector_id);
        
    }
}


if (!function_exists('_tabdata')) {

    function _tabdata($form_id,$entityid,$exinfotable) {
        $ci =& get_instance();
        //$eid                   = $this->input->get('entity_id');
        $data['entity_detail']                 = $ci->master_model->get_entity($entityid);
        
        $data['entity_applicant']              = $ci->master_model->get_entitieschild('entity_applicant', $entityid,'DESC',$form_id);
        
        $data['entity_qualification']          = $ci->master_model->get_entitieschild('entity_qualification', $entityid,'DESC',$form_id,'DESC',$form_id);
        
        $data['entity_cooperative_societies']  = $ci->master_model->get_entitieschild('entity_cooperative_societies', $entityid,'DESC',$form_id);
        
        $data['entity_extrainfo'] = $ci->master_model->get_entitieschild($exinfotable, $entityid,$form_id);
        
        
        $data['cm_extrainfo']               = $ci->master_model->get_entitieschild('cm_extrainfo', $entityid,'DESC',$form_id);
        $data['addtional_documents']        = $ci->master_model->get_entitieschild('addtional_documents', $entityid, 'asc',$form_id);
        $data['off_shore_reference']        = $ci->master_model->get_entitieschild('off_shore_reference', $entityid, 'asc',$form_id);
        
        $data['mutual_fund_reference']      = $ci->master_model->get_entitieschild('mutual_fund_reference', $entityid, 'ASC',$form_id);
        $data['applicant_establishment']    = $ci->master_model->get_entitieschild('applicant_establishment', $entityid, 'asc',$form_id);
        $data['applicant_licence']          = $ci->master_model->get_entitieschild('applicant_licence', $entityid, 'asc',$form_id);
        $data['applicant_misconduct']       = $ci->master_model->get_entitieschild('applicant_misconduct', $entityid, 'asc',$form_id);
        // echo "<pre>";
        // print_r($data['applicant_misconduct']);
        // die;
        $data['entity_criminal_record']     = $ci->master_model->get_entitieschild('entity_criminal_record', $entityid, 'asc',$form_id);
        $data['entity_mlro']                = $ci->master_model->get_entitieschild('mlro_info', $entityid, 'asc',$form_id);
        
        $data['mlro_reference']             = $ci->master_model->get_entitieschild('mlro_reference', $entityid, 'ASC',$form_id);
        $data['insurance_reference']        = $ci->master_model->get_entitieschild('insurance_reference', $entityid, 'ASC',$form_id);
        $data['shareholder']               = $ci->master_model->get_entitieschild('shareholder', $entityid,'DESC',$form_id);
        $data['cm_reference']               = $ci->master_model->get_entitieschild('cm_reference', $entityid,'DESC',$form_id);
         // echo "<pre>";
         //             print_r( $data['shareholder']);
         //             die;

        $data['applicant_criminal_offence'] = $ci->master_model->get_entitieschild('applicant_criminal_offence', $entityid, 'ASC',$form_id);
        $data['applicant_company']          = $ci->master_model->get_entitieschild('applicant_company', $entityid, 'asc',$form_id);
        
        $data['entity_relationship']        = $ci->master_model->get_entitieschild('entity_relationship_new', $entityid, 'asc',$form_id);
        $data['entity_relation_charge']     = $ci->master_model->get_entitieschild('entity_relation_charge', $entityid, 'asc',$form_id);
        $data['nrsp_other_offices']         = $ci->master_model->get_entitieschild('nrsp_other_offices', $entityid,'DESC',$form_id);
        $data['companies_account']          = $ci->master_model->get_entitieschild('companies_account', $entityid, 'asc',$form_id);
        $data['gen_extrainfo']              = $ci->master_model->get_entitieschild('cm_gen_extrainfo', $entityid, 'asc',$form_id);
        $data['cooperative_extrainfo']      = $ci->master_model->get_entitieschild('cooperative_extrainfo', $entityid, 'asc',$form_id);

// echo "<pre>";
// print_r($data);
// die;        
        return $data;
        
        
    }
}

/**************************************************************************/
if (!function_exists('generate_email')) {

    function generate_email($template_slug,$data_set=array()){
        $res = array();
        $ci = & get_instance();
        
        $template = $ci->master_model->get_email_template_by_slug($template_slug);
        if($template){
            $template_content=$template['template_content'];
            foreach($data_set as $key => $val){
                //$replace_value='{'.$key.'}';
                $replace_value='['.$key.']';
                $template_content=str_replace($replace_value,$val,$template_content);
            }
            return $template_content;
        }else{
            return 'Invalid Email Content';
        }       
    }
}


//Get email subject

if (!function_exists('get_email_subject')) {
    
    function get_email_subject($template_slug){
         $ci = & get_instance();
        $template = $ci->master_model->get_email_template_by_slug($template_slug);
        if($template){
            $template_name=$template['template_name'];
            return $template_name;
        }else{
            return 'Invalid Subject';
        }
    }
}


if (!function_exists('sendEmail')) {
    
    function sendEmail($to, $subject, $message)
    {
        
        $ci =& get_instance();
        $ci->load->library('phpmailer_lib');
        // get dynamic hostname username and password from 
        
        $ci->db->select('hostname,port,ssl,username,password');
        $ci->db->from('settings');
        $email_setting=$ci->db->get()->row();
        //set email content

        $data['email_content'] = $message;
        //call to an email template and set data to email
         $email_body = $ci->load->view('email/template_mail', $data, true);
        
        $mail = $ci->phpmailer_lib->load();

        //$mail->isSMTP(); 
        $mail->Host     =$email_setting->hostname;
        $mail->SMTPAuth = true;
        $mail->Username = $email_setting->username;
        $mail->Password = $email_setting->password;
        $mail->SMTPSecure =$email_setting->ssl;
        $mail->Port     = $email_setting->port;
               
        
         
        // $mail->Host     = 'mail.enquiry@digitalnoticeboard.biz';
        // $mail->SMTPAuth = true;
        // $mail->Username = 'enquiry@digitalnoticeboard.biz';
        // $mail->Password = '!RHPodeygyz#';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port     = 587; 
        
        $mail->setFrom('enquiry@digitalnoticeboard.biz', 'Anguilla Regulatory Information & Analytics System');
         
         
/*      $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'benjaminroseny@gmail.com';
        $mail->Password = 'Hello@#$1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('benjaminroseny@gmail.com', 'Anguilla Regulatory Information & Analytics System');
 */     /* if($to == ''){
            $rec = $ci->master_model->get_ariasUsers($others);
            //echo'<pre/>';print_r($rec);exit;
            foreach($rec as $email => $name)
            {
                //$mail->addAddress($to);
                $mail->ClearAllRecipients();
                $mail->addAddress($email);
            }
        }else{
            $mail->addAddress($to);
        } */
       
        $mail->addAddress($to);
        /* foreach($recipients as $email => $name)
        {
           $mail->AddCC($email, $name);
        } */
        $mail->Subject  = $subject;
        $mail->isHTML(true);
        $mail->Body = $email_body;

        if(!$mail->send()){
           
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            //exit;
            return false;
           
        }else{
            //echo "send";
            return true;
        }
    }
}

if (!function_exists('_hasChilds')) {
    function _hasChilds($rid, $tbl)
    {
         $ci =& get_instance();
         $res = $ci->master_model->_hasChilds($rid, $tbl);
         return $res;
    }
}

if (!function_exists('_ReturnDInfo_')) {
    function _ReturnDInfo_($tbl, $id, $col, $rid, $type)
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnSInfo_($tbl, $id, $col, $rid, $type);
    }
}

if (!function_exists('_get_TabsData')) {
    function _get_TabsData($tbl, $secId, $year ,$col, $rid)
    {
        $ci =& get_instance();
        return $ci->master_model->_get_TabsData($tbl, $secId, $year ,$col, $rid);
    }
}

if (!function_exists('_get_ReportsData')) {
    function _get_ReportsData($tbl, $secId, $year ,$col="", $rid="", $selectedType="", $typeVal="",$entityId="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData($tbl, $secId, $year ,$col, $rid, $selectedType, $typeVal,$entityId);
    }
}
if (!function_exists('convertStdObjectToArray')) {
    function convertStdObjectToArray($d) 
    {
       if (is_object($d)) {
           // Gets the properties of the given object
           // with get_object_vars function
           $d = get_object_vars($d);
       }

       if (is_array($d)) {
           /*
           * Return array converted to object
           * Using __FUNCTION__ (Magic constant)
           * for recursive call
           */
           return array_map(__FUNCTION__, $d);
       } else {
           // Return array
           return $d;
       }
    }
}

if (!function_exists('returnYears')) {
    function returnYears($sectorID="", $entityId="")
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnYears($sectorID,$entityId);
    }
}
// created by sunil gupta..
if (!function_exists('returnYears_')) {
    function returnYears_($sectorID="", $entityId="")
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnYears_($sectorID,$entityId);
    }
}
// months dropdown
if (!function_exists('returnMonths')) {
    function returnMonths()
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnMonths();
    }
}

// Quarter dropdown
if (!function_exists('returnQuarter')) {
    function returnQuarter()
    {
        $ci =& get_instance();
        return $ci->master_model->get_returnQuarter();
    }
}

if (!function_exists('_activeSector')) {
    function _activeSector()
    {
        $ci =& get_instance();
        return $ci->master_model->_getActiveSector();
    }
}

if (!function_exists('_allRSectors')) {

    function _allRSectors($rid="") {
        $ci = & get_instance(); 
        $res = $ci->master_model->_allRSectors($rid);
        return $res;
    }
}
if (!function_exists('_allRSectorsScheduled')) {

    function _allRSectorsScheduled($rid="") {
        $ci = & get_instance(); 
        $res = $ci->master_model->_allRSectorsScheduled($rid);
        return $res;
    }
}

if (!function_exists('cal_Report')) {
    function cal_Report($a,$b,$c,$d)
    {
        $ci =& get_instance();
        return $ci->master_model->cal_Report($a,$b,$c,$d);
    }
}

if (!function_exists('tableInfos')) {
    
    function tableInfos($id, $name)
    {
        $ci = & get_instance();
        $ci->db->select('*');  
        $ci->db->where('id', $id);  
        $ci->db->where('page_name', $name);  
        $query = $ci->db->get('db_structures');
        $result = $query->row();
        //echo$ci->db->last_query();
        return $result; 
    }
}

if (!function_exists('_isDevelopment')) {
    
    function _isDevelopment()
    {
        $ci = & get_instance();
        $ci->db->select('*');  
        $query = $ci->db->get('settings');
        $result = $query->row();
        return $result->is_development_mode; 
    }
}

if (!function_exists('_dbComment')) {
    
    function _dbComment($id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('record_id', $id);       
        $query = $ci->db->get('development_comments');
        $result = $query->result();
        return $result; 
    }
}
if (!function_exists('_findParents')) {
    function _findParents($rid, $tbl)
    {
         $ci =& get_instance();
         $res = _findParents($rid, $tbl);
         return $res;
    }
}
function _findParents($rid = null, $tbl)
    {   
        $ci =& get_instance();
        $ci->db->select('*');
        $ci->db->where('parent_id IS NULL');
        $ci->db->where('activityid', $rid);
        $query = $ci->db->get($tbl);
        
        $result = $query->num_rows();

        if ($result > 0) {
            return false;
        } else {
            return true;
        }
    }
function all_InsTYPE($mid="")
{
    $ci =& get_instance();
    $data = $ci->master_model->all_InsTYPE($mid);
    echo $data;
}
function get_ratings($mid=""){
    
    $Mq = array("Aaa","Aa","Aa1","Aa2","Aa3","A1","A2","A3","Baa","Baa1","Baa2","Baa3","Ba","Ba1","Ba2","Ba3","B","B1","B2","B3","Caa","Caa1","Caa2","Caa3","Ca","C","NR");

    foreach ($Mq as $row) {
        $Sdata = ($row == $mid) ? 'selected' : '';
        $Module .= "<option " . $Sdata . " value ='" . $row . "'>";
        $Module .= $row;
        $Module .= "</option>";
    }
    return $Module;
}
function all_countries($mid= '')
    {
        $ci =& get_instance();
        $country = "";
        $ci->db->where('status', 1);
        $query = $ci->db->get('country');
        $Mq    =  $query->result();
            
            foreach ($Mq as  $row) {
                  $Sdata = ($row->id == $mid) ? 'selected': '' ;
                  $country .= "<option ".$Sdata." value ='".$row->id."'>";
                  $country .= $row->name;
                  $country .= "</option>";
            }
        return $country;
    }
function all_banks($mid="")
{
    $ci =& get_instance();
    $data = $ci->master_model->all_banks($mid);
    echo $data;
}
function get_acc_types($mid="")
{
    $Mq = array("Call","Correspondent","Money Market","Other Investment","Payable-through","Credit Card Settlement","Stored Value/Debit Card Settlement","Other");

    foreach ($Mq as $row) {
        $Sdata = ($row == $mid) ? 'selected' : '';
        $Module .= "<option " . $Sdata . " value ='" . $row . "'>";
        $Module .= $row;
        $Module .= "</option>";
    }
    return $Module;
}
function check_file_exist($url){
    $handle = @fopen($url, 'r');
    if(!$handle){
        return false;
    }else{
        return true;
    }
}
function _ReturnDetails($id, $tbl){
        $ci = & get_instance();
        $ci->db->where('return_id', $id);
        
        
        if($tbl == "money_services_form4_sen" || $tbl == "money_services_form4_rec" || $tbl == "insurance_c1" || $tbl == "insurance_c1_termsdeposits" || $tbl == 'insurance_c5' || $tbl == 'insurance_c5_pref_shares' || $tbl == 'insurance_c5_mutual_funds' || $tbl == "money_services_form3" || $tbl == "insurance_c12" || $tbl == "insurance_c3" || $tbl == "insurance_c3_otherloans" || $tbl == "insurance_c4" || $tbl == "insurance_c8" || $tbl == 'ib_info_details_functions' || $tbl == 'ib_info_details_investments'){
            $ci->db->order_by("id","asc");
        }
        if($tbl == 'insurance_c7' || $tbl == 'insurance_c7_policy')
		{
		   $ci->db->order_by('id','ASC');
		}
        if($tbl == 'insurance_c6'){
            $ci->db->order_by("id","asc");
        }
        if($tbl == 'insurance_c2'){
            $ci->db->order_by("id","asc");
        }
        if($tbl == 'insurance_c2_bonds'){
            $ci->db->order_by("id","asc");
        }
        if($tbl == 'insurance_d9'){
            $ci->db->order_by("d9_id","asc");
        }
        if($tbl == 'insurance_d6' || $tbl == 'insurance_d6_fac'){
            $ci->db->order_by("d6_id","asc");
        }
        if($tbl == 'insurance_d10' || $tbl == 'insurance_d10_expenses'){
            $ci->db->order_by("d10_rid","asc");
        }
        // if($tbl == "insurance_c12"){
        //     $ci->db->order_by("id","desc");
        // }
        $query = $ci->db->get($tbl);
        if($tbl == "insurance_a2" || $tbl == "insurance_a3" || $tbl == "insurance_a4" || $tbl == "insurance_a4_audit_committee" || $tbl == "insurance_a4_other_committee" || $tbl == "insurance_a5" || $tbl == "insurance_a9" ||  $tbl == "insurance_c1" ||  $tbl == "insurance_c1_termsdeposits"||  $tbl == "insurance_c2" ||  $tbl == "insurance_c2_bonds" || $tbl == "insurance_c3" || $tbl == "insurance_c3_otherloans" || $tbl == "insurance_c4" || $tbl == "insurance_c5" || $tbl == "insurance_c5_pref_shares" || $tbl == "insurance_c5_mutual_funds" || $tbl == "insurance_c6" || $tbl == "insurance_c7" || $tbl == "insurance_c12" || $tbl == "insurance_d6" || $tbl == "insurance_d6_fac" || $tbl == "insurance_d9" || $tbl == "insurance_d9_expenses" || $tbl == "insurance_d10" || $tbl == "insurance_d10_expenses" || $tbl == "money_services_form3" || $tbl == "money_services_form4_sen" || $tbl == "money_services_form4_rec" || $tbl == "cu1_supplement_g_memberships" || $tbl == "trust_business_other_countires" || $tbl == "company_management_other_countires" || $tbl == "trust_business_asia_countires"
            || $tbl == "trust_business_caribbean_countires"
            || $tbl == "trust_business_we_countires"
            || $tbl == "trust_business_na_countires"
            || $tbl == "trust_business_sa_countires"
            || $tbl == "trust_business_eu_countires"
            || $tbl == "trust_business_me_countires"
            || $tbl == "trust_business_other_countires"
            || $tbl == "trust_business_assets_others"
            || $tbl == "company_management_asia_countires"
            || $tbl == "company_management_caribbean_countires"
            || $tbl == "company_management_eu_countires"
            || $tbl == "company_management_me_countires"
            || $tbl == "company_management_na_countires"
            || $tbl == "company_management_sa_countires"
            || $tbl == "company_management_we_countires"
            || $tbl == "company_management_other_countires"
            || $tbl == "insurance_q8"
            || $tbl == 'insurance_c7_policy'
            || $tbl == "ib_info_details_functions"
            || $tbl == 'ib_info_details_investments'
            || $tbl == 'ib9_banks_extra'
        )
            return $query->result_array();
        elseif ($tbl == 'ib5' || $tbl == 'ib5_brokers' || $tbl == 'ib5_country_issuance' ||$tbl == 'ib9' ) {
            return $query->result();
        }
        else
            return $query->row();
    }
	
	/*if (!function_exists('_get_director')) {
    
    function __get_director($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('__get_director_address')) {
    
    function __get_director_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	

if (!function_exists('__get_mlro')) {
    
    function __get_mlro($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('__get_mlro_address')) {
    
    function __get_mlro_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	

if (!function_exists('__get_mlco')) {
    
    function __get_mlco($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('__get_mlco_address')) {
    
    function __get_mlco_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_co')) {
    
    function __get_co($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('__get_co_address')) {
    
    function __get_co_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	



if (!function_exists('__get_all_benificila')) {
    
    function __get_all_benificila($entity_id,$subsector_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 42);
		$ci->db->where('subsector_id', $subsector_id);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('get_key_officer')) {
    
    function get_key_officer($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $entity_id);
		$ci->db->where('relationship_type_id', 45);
		//$ci->db->where('relationship_type_id', 42);
		//$ci->db->where('subsector_id', $subsector_id);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
*/

if (!function_exists('__get_director')) {
    
    function __get_director($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*    getting director data  in insurance  (Created By : Sunil gupta) */
if (!function_exists('__get_director_ins')) {
    
    function __get_director_ins($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', 2);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*    getting director data  in TRUST and Business  (Created By : Sunil gupta) */
if (!function_exists('__get_director_tab')) {
    
    function __get_director_tab($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_director_address')) {
    
    function __get_director_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	


/*   getting director address  in  insurance  (Created By : Sunil gupta) */
if (!function_exists('__get_director_address_ins')) {
    
    function __get_director_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*   getting director address  in  trust and business  (Created By : Sunil gupta) */
if (!function_exists('__get_director_address_tab')) {
    
    function __get_director_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_mlro')) {
    
    function __get_mlro($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getting mlro insurance data   (Created By : Sunil gupta) */

if (!function_exists('__get_mlro_ins')) {
    
    function __get_mlro_ins($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', 2);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getting mlro trust and business data   (Created By : Sunil gupta) */

if (!function_exists('__get_mlro_tab')) {
    
    function __get_mlro_tab($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_mlro_address')) {
    
    function __get_mlro_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	

/*     getting mlro address in insurance  (Created By : Sunil gupta) */
if (!function_exists('__get_mlro_address_ins')) {
    
    function __get_mlro_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	


/*     getting mlro address in trust and business  (Created By : Sunil gupta) */
if (!function_exists('__get_mlro_address_tab')) {
    
    function __get_mlro_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_mlco')) {
    
    function __get_mlco($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco insurance data   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_ins')) {
    
    function __get_mlco_ins($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', 2);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco trust and business data   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_tab')) {
    
    function __get_mlco_tab($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_mlco_address')) {
    
    function __get_mlco_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco adddress in insurance   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_address_ins')) {
    
    function __get_mlco_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}


/*   getting mlco adddress in trust and business   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_address_tab')) {
    
    function __get_mlco_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_co')) {
    
    function __get_co($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', 1);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*  getiing co data in insurance    (Created By : Sunil gupta) */
if (!function_exists('__get_co_ins')) {
    
    function __get_co_ins($related_entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', 2);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getiing co data in trust and business  (Created By : Sunil gupta) */
if (!function_exists('__get_co_tab')) {
    
    function __get_co_tab($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_co_address')) {
    
    function __get_co_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	
/*  getting co address data in insurance (Created By : Sunil gupta) */
if (!function_exists('__get_co_address_ins')) {
    
    function __get_co_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}


/*  getting co address data in trust and business (Created By : Sunil gupta) */
if (!function_exists('__get_co_address_tab')) {
    
    function __get_co_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}


if (!function_exists('__get_all_benificila')) {
    
    function __get_all_benificila($entity_id,$subsector_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 42);
		$ci->db->where('subsector_id', $subsector_id);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('get_key_officer')) {
    
    function get_key_officer($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $entity_id);
		$ci->db->where('relationship_type_id', 45);
		//$ci->db->where('relationship_type_id', 42);
		//$ci->db->where('subsector_id', $subsector_id);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}




if (!function_exists('__get_list_of_key_officers_ceo')) {
    
    function __get_list_of_key_officers_ceo($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', 1);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


 /*    getting key officers ceo data in insurance   (Created By : Sunil gupta) */ 
 if (!function_exists('__get_list_of_key_officers_ceo_ins')) {
    
    function __get_list_of_key_officers_ceo_ins($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', 2);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

 /*    getting key officers ceo data in trust and business   (Created By : Sunil gupta) */ 
 if (!function_exists('__get_list_of_key_officers_ceo_tab')) {
    
    function __get_list_of_key_officers_ceo_tab($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}




if (!function_exists('__get_key_officer_ceo_address')) {
    
    function __get_key_officer_ceo_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	
/* getting key officier address in insuarnce (Created by : Sunil Gupta) */
if (!function_exists('__get_key_officer_ceo_address_ins')) {
    
    function __get_key_officer_ceo_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
/* getting key officier address in trust and buiness (Created by : Sunil Gupta) */
if (!function_exists('__get_key_officer_ceo_address_tab')) {
    
    function __get_key_officer_ceo_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_list_of_key_officers_cfo')) {
    
    function __get_list_of_key_officers_cfo($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', 1);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
/* getting key officer cfo data in insurance  (Created By : Sunil gupta) */

if (!function_exists('__get_list_of_key_officers_cfo_ins')) {
    
    function __get_list_of_key_officers_cfo_ins($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', 2);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


 /* getting key officer cfo data in trust and business  (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_cfo_tab')) {
    
    function __get_list_of_key_officers_cfo_tab($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_key_officer_cfo_address')) {
    
    function __get_key_officer_cfo_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}	

 /*  getting key officer cfo address data in insurance (Created By : Sunil gupta) */
 if (!function_exists('__get_key_officer_cfo_address_ins')) {
    
    function __get_key_officer_cfo_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /*  getting key officer cfo address data in trust and buiness  (Created By : Sunil gupta) */
 if (!function_exists('__get_key_officer_cfo_address_tab')) {
    
    function __get_key_officer_cfo_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

if (!function_exists('__get_list_of_key_officers_so')) {
    
    function __get_list_of_key_officers_so($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', 1);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*  getting key officer so data in insurance (Created By : Sunil gupta) */

if (!function_exists('__get_list_of_key_officers_so_ins')) {
    
    function __get_list_of_key_officers_so_ins($related_entity_id)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', 2);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


 /*  getting key officer so data in trust and business (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_so_tab')) {
    
    function __get_list_of_key_officers_so_tab($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
if (!function_exists('__get_key_officer_so_address')) {
    
    function __get_key_officer_so_address($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
/*  getting key officer so address data in insurance (Created By : Sunil gupta) */

if (!function_exists('__get_key_officer_so_address_ins')) {
    
    function __get_key_officer_so_address_ins($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /*  getting key officer so address data in trust and business (Created By : Sunil gupta) */

 if (!function_exists('__get_key_officer_so_address_tab')) {
    
    function __get_key_officer_so_address_tab($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

function get_total_other($rid, $tbl){
        $ci = & get_instance();
		$ci->db->select('SUM(`amount`) as amount,');
        $ci->db->where('return_id', $rid);
        
        
        $query = $ci->db->get($tbl);
        if($tbl == "insurance_a2" || $tbl == "insurance_a3" || $tbl == "insurance_a4" || $tbl == "insurance_a4_audit_committee" || $tbl == "insurance_a4_other_committee" || $tbl == "insurance_a5" || $tbl == "insurance_a9" ||  $tbl == "insurance_c1" ||  $tbl == "insurance_c1_termsdeposits"||  $tbl == "insurance_c2" ||  $tbl == "insurance_c2_bonds" || $tbl == "insurance_c3" || $tbl == "insurance_c3_otherloans" || $tbl == "insurance_c4" || $tbl == "insurance_c5" || $tbl == "insurance_c5_pref_shares" || $tbl == "insurance_c5_mutual_funds" || $tbl == "insurance_c6" || $tbl == "insurance_c7" || $tbl == "insurance_c12" || $tbl == "insurance_d6" || $tbl == "insurance_d6_fac" || $tbl == "insurance_d9" || $tbl == "insurance_d9_expenses" || $tbl == "insurance_d10" || $tbl == "insurance_d10_expenses" || $tbl == "money_services_form3" || $tbl == "money_services_form4_sen" || $tbl == "money_services_form4_rec" || $tbl == "cu1_supplement_g_memberships" || $tbl == "trust_business_other_countires" || $tbl == "company_management_other_countires" || $tbl == "trust_business_asia_countires"
            || $tbl == "trust_business_caribbean_countires"
            || $tbl == "trust_business_we_countires"
            || $tbl == "trust_business_na_countires"
            || $tbl == "trust_business_sa_countires"
            || $tbl == "trust_business_eu_countires"
            || $tbl == "trust_business_me_countires"
            || $tbl == "trust_business_other_countires"
            || $tbl == "trust_business_assets_others"
            || $tbl == "company_management_asia_countires"
            || $tbl == "company_management_caribbean_countires"
            || $tbl == "company_management_eu_countires"
            || $tbl == "company_management_me_countires"
            || $tbl == "company_management_na_countires"
            || $tbl == "company_management_sa_countires"
            || $tbl == "company_management_we_countires"
            || $tbl == "company_management_other_countires"
            || $tbl == "insurance_q8"
            || $tbl == 'insurance_c7_policy'
            || $tbl == "ib_info_details_functions"
            || $tbl == 'ib_info_details_investments'
            || $tbl == 'ib9_banks_extra'
        )
            return $query->result_array();
        elseif ($tbl == 'ib5' || $tbl == 'ib5_brokers' || $tbl == 'ib5_country_issuance' ||$tbl == 'ib9' ) {
            return $query->result();
        }
        else
            return $query->row();
    }
	
	function get_country_count($rid,$tbl)
	{
			$ci = & get_instance();
			$ci->db->select('country_name,SUM(`no_of_company`) as no_of_company');		
			$ci->db->from($tbl);
			$ci->db->where('return_id', $rid);
			$ci->db->group_by('country_name');
			$qry = $ci->db->get();
			
			
			$liabilities = $qry->result_array();
			return $liabilities;
	
	}
	
	function get_sector_name($sector_id)
	{
			$ci = & get_instance();
			$ci->db->select('sector_name');		
			$ci->db->from('sector');
			$ci->db->where('id', $sector_id);
			return $ci->db->get()->result();
	
	}	
	
	
	function get_report_cm_total_country($id,$tbl)
	{
	        $ci = & get_instance();
	        $ci->db->select('country_name,SUM(`no_of_company`) as no_of_company,SUM(`country_percentage`) as country_percentage');		
			$ci->db->from($tbl);
			$ci->db->where('return_id', $id);
			$ci->db->group_by('country_name');
			$query = $ci->db->get();
		
			//$ci->db->where('return_id', $id);
			//$query = $ci->db->get($tbl);
            return $query->result_array();
	
	}
	
	function get_report_tm_total_country($id,$tbl)
	{
	        $ci = & get_instance();
	        $ci->db->select('tb_country_name,SUM(`no_of_company`) as no_of_company,SUM(`country_percentage`) as country_percentage');		
			$ci->db->from($tbl);
			$ci->db->where('return_id', $id);
			$ci->db->group_by('tb_country_name');
			$query = $ci->db->get();
		
			//$ci->db->where('return_id', $id);
			//$query = $ci->db->get($tbl);
            return $query->result_array();
	
	}
	
	if (!function_exists('_entityRsubSectorget')) {
    function _entityRsubSectorget($sec)
    {
        $ci =& get_instance();
        return $ci->master_model->_entityRsubSectorget($sec);
    }
}

if (!function_exists('get_created_date_by_temp_user_id')) {
    function get_created_date_by_temp_user_id($sid,$temp_user_id)
    {
        $ci =& get_instance();
        return $ci->master_model->get_created_date_by_temp_user_id($sid,$temp_user_id);
    }
}


function get_total_other_trust($id, $tbl){
        $ci = & get_instance();
		$ci->db->select('caption,SUM(`amount`) as amount,');
        $ci->db->where('return_id', $id);
        
        $ci->db->group_by('caption');
        $query = $ci->db->get($tbl);
        if($tbl == "insurance_a2" || $tbl == "insurance_a3" || $tbl == "insurance_a4" || $tbl == "insurance_a4_audit_committee" || $tbl == "insurance_a4_other_committee" || $tbl == "insurance_a5" || $tbl == "insurance_a9" ||  $tbl == "insurance_c1" ||  $tbl == "insurance_c1_termsdeposits"||  $tbl == "insurance_c2" ||  $tbl == "insurance_c2_bonds" || $tbl == "insurance_c3" || $tbl == "insurance_c3_otherloans" || $tbl == "insurance_c4" || $tbl == "insurance_c5" || $tbl == "insurance_c5_pref_shares" || $tbl == "insurance_c5_mutual_funds" || $tbl == "insurance_c6" || $tbl == "insurance_c7" || $tbl == "insurance_c12" || $tbl == "insurance_d6" || $tbl == "insurance_d6_fac" || $tbl == "insurance_d9" || $tbl == "insurance_d9_expenses" || $tbl == "insurance_d10" || $tbl == "insurance_d10_expenses" || $tbl == "money_services_form3" || $tbl == "money_services_form4_sen" || $tbl == "money_services_form4_rec" || $tbl == "cu1_supplement_g_memberships" || $tbl == "trust_business_other_countires" || $tbl == "company_management_other_countires" || $tbl == "trust_business_asia_countires"
            || $tbl == "trust_business_caribbean_countires"
            || $tbl == "trust_business_we_countires"
            || $tbl == "trust_business_na_countires"
            || $tbl == "trust_business_sa_countires"
            || $tbl == "trust_business_eu_countires"
            || $tbl == "trust_business_me_countires"
            || $tbl == "trust_business_other_countires"
            || $tbl == "trust_business_assets_others"
            || $tbl == "company_management_asia_countires"
            || $tbl == "company_management_caribbean_countires"
            || $tbl == "company_management_eu_countires"
            || $tbl == "company_management_me_countires"
            || $tbl == "company_management_na_countires"
            || $tbl == "company_management_sa_countires"
            || $tbl == "company_management_we_countires"
            || $tbl == "company_management_other_countires"
            || $tbl == "insurance_q8"
            || $tbl == 'insurance_c7_policy'
            || $tbl == "ib_info_details_functions"
            || $tbl == 'ib_info_details_investments'
            || $tbl == 'ib9_banks_extra'
        )
            return $query->result_array();
        elseif ($tbl == 'ib5' || $tbl == 'ib5_brokers' || $tbl == 'ib5_country_issuance' ||$tbl == 'ib9' ) {
            return $query->result();
        }
        else
            return $query->row();
    }
	
	function reg_sector_dropdown($id, $type, $sid)
	{
		$ci = & get_instance();
		$ci->db->select('E.*');
		$ci->db->from('entity AS E');
		$ci->db->join('licensee_subsector F', 'E.id = F.entity_id', 'left');
		$ci->db->join('subsector G', 'F.subsector_id = G.id', 'left');
		$ci->db->where("F.subsector_id", $id);
      //  $ci->db->where("G.sector_id", 5);
		$ci->db->order_by('E.id', 'DESC');
		$ci->db->group_by('E.id');
		$query = $ci->db->get();
	   return $query->result();
        
	}
	
	
	
	if (!function_exists('_get_ReportsData_ins')) {
    function _get_ReportsData_ins($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_ins($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}


if (!function_exists('_get_ReportsData_insb4')) {
    function _get_ReportsData_insb4($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insb4($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}


if (!function_exists('_get_ReportsData_insb5')) {
    function _get_ReportsData_insb5($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insb5($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insb6')) {
    function _get_ReportsData_insb6($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insb6($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}


if (!function_exists('_get_ReportsData_insb7')) {
    function _get_ReportsData_insb7($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insb7($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd1')) {
    function _get_ReportsData_insd1($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd1($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd2')) {
    function _get_ReportsData_insd2($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd2($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd3')) {
    function _get_ReportsData_insd3($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd3($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd4')) {
    function _get_ReportsData_insd4($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd4($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd5')) {
    function _get_ReportsData_insd5($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd5($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd6')) {
    function _get_ReportsData_insd6($tbl, $secId, $year ,$total, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd6($tbl, $secId, $year ,$total,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd6Fac')) {
    function _get_ReportsData_insd6Fac($tbl, $secId, $year ,$total, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd6Fac($tbl, $secId, $year ,$total,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd6Factotal')) {
    function _get_ReportsData_insd6Factotal($tbl, $secId, $year ,$total, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd6Factotal($tbl, $secId, $year ,$total,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd7')) {
    function _get_ReportsData_insd7($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd7($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd8')) {
    function _get_ReportsData_insd8($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd8($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd9')) {
    function _get_ReportsData_insd9($tbl, $secId, $year ,$match1,$match2, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd9($tbl, $secId, $year ,$match1,$match2, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd10')) {
    function _get_ReportsData_insd10($tbl, $secId, $year ,$match2,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd10($tbl, $secId, $year ,$match2,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd10expenses')) {
    function _get_ReportsData_insd10expenses($tbl, $secId, $year ,$match2,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd10expenses($tbl, $secId, $year ,$match2,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_insd11')) {
    function _get_ReportsData_insd11($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd11($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}




//For Quarter


if (!function_exists('_get_ReportsData_q1')) {
    function _get_ReportsData_q1($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q1($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q2')) {
    function _get_ReportsData_q2($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q2($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q3')) {
    function _get_ReportsData_q3($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q3($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q4')) {
    function _get_ReportsData_q4($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q4($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q5')) {
    function _get_ReportsData_q5($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q5($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q6')) {
    function _get_ReportsData_q6($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q6($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q7')) {
    function _get_ReportsData_q7($tbl, $secId, $year , $rid, $selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q7($tbl, $secId, $year ,$rid, $selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_q8')) {
    function _get_ReportsData_q8($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_q8($tbl, $secId, $year ,$selectedType, $typeVal);
    }
}


//For Insurance Sector C

if (!function_exists('_get_ReportsData_c4')) {
    function _get_ReportsData_c4($tbl, $secId, $year ,$property_address, $total_investment ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c4($tbl, $secId, $year ,$property_address, $total_investment,$selectedType, $typeVal);
    }
}

if (!function_exists('_get_ReportsData_c6')) {
    function _get_ReportsData_c6($tbl, $secId, $year ,$company_individual, $total_related_party_investments ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c6($tbl, $secId, $year ,$company_individual, $total_related_party_investments ,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_insc1')) {
    function _get_ReportsData_insc1($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insc1($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c1TD')) {
    function  _get_ReportsData_c1TD($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model-> _get_ReportsData_c1TD($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c1TCD')) {
    function  _get_ReportsData_c1TCD($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c1TCD($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c2')) {
    function  _get_ReportsData_c2($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c2($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c2Bonds')) {
    function  _get_ReportsData_c2Bonds($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c2Bonds($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}



if (!function_exists('_get_ReportsData_c3')) {
    function  _get_ReportsData_c3($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c3($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c3SecuredLoans')) {
    function  _get_ReportsData_c3SecuredLoans($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c3SecuredLoans($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c3SecuredLoansother')) {
    function  _get_ReportsData_c3SecuredLoansother($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c3SecuredLoansother($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}



if (!function_exists('_get_ReportsData_c5')) {
    function  _get_ReportsData_c5($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c5($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c5Shares')) {
    function  _get_ReportsData_c5Shares($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c5Shares($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c5Shares1')) {
    function  _get_ReportsData_c5Shares1($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c5Shares1($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c5MutualFunds')) {
    function  _get_ReportsData_c5MutualFunds($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c5MutualFunds($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c6')) {
    function  _get_ReportsData_c6($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c6($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c7')) {
    function  _get_ReportsData_c7($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c7($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c7_1')) {
    function  _get_ReportsData_c7_1($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c7_1($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c9')) {
    function  _get_ReportsData_c9($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c9($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c10')) {
    function  _get_ReportsData_c10($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c10($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c11')) {
    function  _get_ReportsData_c11($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c11($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c13')) {
    function  _get_ReportsData_c13($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c13($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}


if (!function_exists('_get_ReportsData_c14')) {
    function  _get_ReportsData_c14($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c14($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}

//For C15 Annual

if (!function_exists('_get_ReportsData_c15_1')) {
    function  _get_ReportsData_c15_1($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c15_1($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
}
if (!function_exists('_get_ReportsData_c8other')) {
    function _get_ReportsData_c8other($tbl, $secId, $year ,$idencp,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c8other($tbl, $secId, $year,$idencp,$selectedType="", $typeVal="");
    }
}

if (!function_exists('_get_ReportsData_c12')) {
    function _get_ReportsData_c12($tbl, $secId, $year ,$idencp,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_c12($tbl, $secId, $year,$idencp,$selectedType="", $typeVal="");
    }
}
//21102021


if (!function_exists('get_all_email')) {

    function get_all_email($id) {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->from('temp_users');
        $ci->db->where('entity_id',$id);
        return $ci->db->get()->row()->contact_email;
    }
}

//23102021

if (!function_exists('_ReturnDetailsInsuranceAnnual')) {
    function _ReturnDetailsInsuranceAnnual($tbl, $secId, $year ,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_ReturnDetailsInsuranceAnnual($tbl, $secId, $year,$selectedType="", $typeVal="");
    }
}

if (!function_exists('get_date_status')) {
    
    function get_date_status($entity_id,$entity_status_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('e_id', $entity_id);
		$ci->db->where('entity_status_id', $entity_status_id);	
        $query = $ci->db->get('activity_status_date');
        $result = $query->result();
        return $result; 
    }
}

/*    getting director data  in Money Service  (Created By : Sunil gupta) */
if (!function_exists('__get_director_ms')) {
    
    function __get_director_ms($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting director address  in  Money Service  (Created By : Sunil gupta) */
if (!function_exists('__get_director_address_ms')) {
    
    function __get_director_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getting moeny service data   (Created By : Sunil gupta) */

if (!function_exists('__get_mlro_ms')) {
    
    function __get_mlro_ms($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', $sid);	
        	
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*     getting mlro address in money service  (Created By : Sunil gupta) */
if (!function_exists('__get_mlro_address_ms')) {
    
    function __get_mlro_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco money service data   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_ms')) {
    
    function __get_mlco_ms($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco adddress in money service   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_address_ms')) {
    
    function __get_mlco_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getiing co data in money service  (Created By : Sunil gupta) */
if (!function_exists('__get_co_ms')) {
    
    function __get_co_ms($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getting co address data in moeny service (Created By : Sunil gupta) */
if (!function_exists('__get_co_address_ms')) {
    
    function __get_co_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /*    getting key officers ceo data in Money Service   (Created By : Sunil gupta) */ 
 if (!function_exists('__get_list_of_key_officers_ceo_ms')) {
    
    function __get_list_of_key_officers_ceo_ms($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/* getting key officier address in money Service (Created by : Sunil Gupta) */
if (!function_exists('__get_key_officer_ceo_address_ms')) {
    
    function __get_key_officer_ceo_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /* getting key officer cfo data in Money Service  (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_cfo_ms')) {
    
    function __get_list_of_key_officers_cfo_ms($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*  getting key officer cfo address data in money service  (Created By : Sunil gupta) */
if (!function_exists('__get_key_officer_cfo_address_ms')) {
    
    function __get_key_officer_cfo_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
/*  getting key officer so data in Money Service (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_so_ms')) {
    
    function __get_list_of_key_officers_so_ms($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
 /*  getting key officer so address data in money Service (Created By : Sunil gupta) */

 if (!function_exists('__get_key_officer_so_address_ms')) {
    
    function __get_key_officer_so_address_ms($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}


/*    getting director data  in Mutual Fund  (Created By : Sunil gupta) */
if (!function_exists('__get_director_mf')) {
    
    function __get_director_mf($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting director address  in  Mutual Fund  (Created By : Sunil gupta) */
if (!function_exists('__get_director_address_mf')) {
    
    function __get_director_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getting Mutual Fund data   (Created By : Sunil gupta) */

if (!function_exists('__get_mlro_mf')) {
    
    function __get_mlro_mf($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', $sid);	
        	
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*     getting mlro address in Mutual Fund  (Created By : Sunil gupta) */
if (!function_exists('__get_mlro_address_mf')) {
    
    function __get_mlro_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco Mutual Fund data   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_mf')) {
    
    function __get_mlco_mf($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco adddress in Mutual Fund   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_address_mf')) {
    
    function __get_mlco_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getiing co data in Mutual Fund  (Created By : Sunil gupta) */
if (!function_exists('__get_co_mf')) {
    
    function __get_co_mf($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getting co address data in Mutual Fund (Created By : Sunil gupta) */
if (!function_exists('__get_co_address_mf')) {
    
    function __get_co_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /*    getting key officers ceo data in Mutual Fund   (Created By : Sunil gupta) */ 
 if (!function_exists('__get_list_of_key_officers_ceo_mf')) {
    
    function __get_list_of_key_officers_ceo_mf($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/* getting key officier address in Mutual Fund (Created by : Sunil Gupta) */
if (!function_exists('__get_key_officer_ceo_address_mf')) {
    
    function __get_key_officer_ceo_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /* getting key officer cfo data in Mutual Fund  (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_cfo_mf')) {
    
    function __get_list_of_key_officers_cfo_mf($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*  getting key officer cfo address data in Mutual Fund  (Created By : Sunil gupta) */
if (!function_exists('__get_key_officer_cfo_address_mf')) {
    
    function __get_key_officer_cfo_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
/*  getting key officer so data in Mutual Fund (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_so_mf')) {
    
    function __get_list_of_key_officers_so_mf($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
 /*  getting key officer so address data in Mutual Fund (Created By : Sunil gupta) */

 if (!function_exists('__get_key_officer_so_address_mf')) {
    
    function __get_key_officer_so_address_mf($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
// offshore Banking start here .........//


/*    getting director data  in Offshore Bank  (Created By : Sunil gupta) */
if (!function_exists('__get_director_osb')) {
    
    function __get_director_osb($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 21);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting director address  in  Offshore Bank  (Created By : Sunil gupta) */
if (!function_exists('__get_director_address_osb')) {
    
    function __get_director_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getting Offshore Bank data   (Created By : Sunil gupta) */

if (!function_exists('__get_mlro_osb')) {
    
    function __get_mlro_osb($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 24);
		$ci->db->where('subsector_id', $sid);	
        	
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*     getting mlro address in Offshore Bank  (Created By : Sunil gupta) */
if (!function_exists('__get_mlro_address_osb')) {
    
    function __get_mlro_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco Offshore Bank data   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_osb')) {
    
    function __get_mlco_osb($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 25);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*   getting mlco adddress in Offshore Bank   (Created By : Sunil gupta) */
if (!function_exists('__get_mlco_address_osb')) {
    
    function __get_mlco_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

/*  getiing co data in Offshore Bank  (Created By : Sunil gupta) */
if (!function_exists('__get_co_osb')) {
    
    function __get_co_osb($related_entity_id,$sid)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where('relationship_type_id', 24);
		$ci->db->where('relationship_type_id', 27);
		$ci->db->where('subsector_id', $sid);		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}


/*  getting co address data in Offshore Bank (Created By : Sunil gupta) */
if (!function_exists('__get_co_address_osb')) {
    
    function __get_co_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /*    getting key officers ceo data in Offshore Bank   (Created By : Sunil gupta) */ 
 if (!function_exists('__get_list_of_key_officers_ceo_osb')) {
    
    function __get_list_of_key_officers_ceo_osb($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 18);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/* getting key officier address in Offshore Bank (Created by : Sunil Gupta) */
if (!function_exists('__get_key_officer_ceo_address_osb')) {
    
    function __get_key_officer_ceo_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}

 /* getting key officer cfo data in Offshore Bank  (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_cfo_osb')) {
    
    function __get_list_of_key_officers_cfo_osb($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('relationship_type_id', 19);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}

/*  getting key officer cfo address data in Offshore Bank  (Created By : Sunil gupta) */
if (!function_exists('__get_key_officer_cfo_address_osb')) {
    
    function __get_key_officer_cfo_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
/*  getting key officer so data in Offshore Bank (Created By : Sunil gupta) */

 if (!function_exists('__get_list_of_key_officers_so_osb')) {
    
    function __get_list_of_key_officers_so_osb($related_entity_id,$sid)
    {
		//$relationship_type_id = array('18', '19', '41');
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('related_entity_id', $related_entity_id);
		$ci->db->where('relationship_type_id', 41);
		//$ci->db->where_in('relationship_type_id', $relationship_type_id);
		$ci->db->where('subsector_id', $sid);	
		//$ci->db->group_by('related_entity_id'); 		
        $query = $ci->db->get('entity_relationship');
        $result = $query->result();
        return $result; 
    }
}
 /*  getting key officer so address data in Offshore Bank (Created By : Sunil gupta) */

 if (!function_exists('__get_key_officer_so_address_osb')) {
    
    function __get_key_officer_so_address_osb($entity_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
        $ci->db->where('id', $entity_id);
		//$ci->db->where('relationship_type_id', 21);
		//$ci->db->where('sector_id', 1);		
        $query = $ci->db->get('entity');
        $result = $query->result();
        return $result; 
    }
}
//offshore banking report end here......// 





//New Code


    /*function get_other_specify_return_id($tbl, $id, $year="",$row_id, $selectedType="", $typeValue="")
	{
		$ci = & get_instance();
		$ci->db->select('B.*');		
		$ci->db->from('returns A');
		$ci->db->join($tbl.' B', 'A.id = B.return_id', 'left');
		$ci->db->where('B.activityid', $row_id);
		$ci->db->where('A.sector_id', $id);
		$ci->db->where('A.workflow_status', 'VAL');


		if(!empty($year))
		{

			$ci->db->where('A.return_year', $year);
		
        }
		if($selectedType == "monthly"){

			$ci->db->where('A.return_period', ltrim($typeValue,'0'));

		}
		$qry = $ci->db->get();

        

        return $qry->result();		

    }
	*/
	if(!function_exists('_get_ReportsData_insd4_other_specify')) {
    function  _get_ReportsData_insd4_other_specify($tbl, $secId, $year ,$act_id,$selectedType="", $typeVal="")
    {
        $ci =& get_instance();
        return $ci->master_model->_get_ReportsData_insd4_other_specify($tbl, $secId, $year,$act_id,$selectedType="", $typeVal="");
    }
    }
if (!function_exists('get_other_specify')) {
    
    function get_other_specify($return_id, $row_id)
    {
        $ci = & get_instance();
        $ci->db->select('*');
		$ci->db->where('return_id', $return_id);
        $ci->db->where('activityid', $row_id);
	    $query = $ci->db->get('insurance_d4');
        $result = $query->result_array();
        return $result; 
    }
}

 // Himanshu Changes Start-30-11-2021

    function reg_sector_dropdown_npo()
    {
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('entity AS E');
        $ci->db->join('licensee_subsector F', 'E.id = F.entity_id', 'right');
        $ci->db->join('subsector G', 'F.subsector_id = G.id', 'left');
        $ci->db->join('sector H', 'H.id = G.sector_id', 'left');
        $ci->db->join('entity_status I', 'I.id = E.entity_status_id', 'left');
        // $ci->db->join('entity_relationship J','J.related_entity_id=E.id','right');
        $ci->db->join('subsector_categories K', 'F.subsector_category_id = K.id', 'left');
        $ci->db->where('F.status', 1);
        $ci->db->where('E.name!=', "");
        $ci->db->where('H.id','8');
        $incOnlyDomesticInsurance = "H.id NOT IN('1','2','3','4','5','6','7','9','11','999')";
        $ci->db->where($incOnlyDomesticInsurance);
        $ci->db->order_by('E.name', 'ASC');
        $ci->db->group_by('E.name');
        $query = $ci->db->get();
        return $query->result();
    }

    function reg_sector_dropdown_ersp()
    {
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('entity AS E');
        $ci->db->join('licensee_subsector F', 'E.id = F.entity_id', 'right');
        $ci->db->join('subsector G', 'F.subsector_id = G.id', 'left');
        $ci->db->join('sector H', 'H.id = G.sector_id', 'left');
        $ci->db->join('entity_status I', 'I.id = E.entity_status_id', 'left');
        // $ci->db->join('entity_relationship J','J.related_entity_id=E.id','right');
        $ci->db->join('subsector_categories K', 'F.subsector_category_id = K.id', 'left');
        $ci->db->where('F.status', 1);
        $ci->db->where('E.name!=', "");
        $ci->db->where('H.id','10000');
        $incOnlyDomesticInsurance = "H.id NOT IN('1','2','3','4','5','6','7','9','11','999')";
        $ci->db->where($incOnlyDomesticInsurance);
        $ci->db->order_by('E.name', 'ASC');
        $ci->db->group_by('E.name');
        $query = $ci->db->get();
        return $query->result();
    }

     function reg_sector_dropdown_nrsp()
    {
        $ci = & get_instance();
        $ci->db->select('E.*');
        $ci->db->from('entity AS E');
        $ci->db->join('licensee_subsector F', 'E.id = F.entity_id', 'right');
        $ci->db->join('subsector G', 'F.subsector_id = G.id', 'left');
        $ci->db->join('sector H', 'H.id = G.sector_id', 'left');
        $ci->db->join('entity_status I', 'I.id = E.entity_status_id', 'left');
        // $ci->db->join('entity_relationship J','J.related_entity_id=E.id','right');
        $ci->db->join('subsector_categories K', 'F.subsector_category_id = K.id', 'left');
        $ci->db->where('F.status', 1);
        $ci->db->where('E.name!=', "");
        $ci->db->where('H.id','10');
        $incOnlyDomesticInsurance = "H.id NOT IN('1','2','3','4','5','6','7','9','11','999')";
        $ci->db->where($incOnlyDomesticInsurance);
        $ci->db->order_by('E.name', 'ASC');
        $ci->db->group_by('E.name');
        $query = $ci->db->get();
        return $query->result();
    }
 


function get_sub_product($table,$fields,$foreign_column,$foreign_id)
   {
      $ci=& get_instance();
      $ci->db->select($fields);
      $ci->db->where($foreign_column,$foreign_id);
    //   $ci->db->where($table.".status","1");
      $result=$ci->db->get($table)->result();
      $data=[];
      if(count($result)>0){
          foreach($result as $results){
              $data[]=$results->$fields;
          }
      }
      return $data;
      
   }


   function get_sub_table($table,$fields,$foreign_column,$foreign_id)
   {
      $ci=& get_instance();
      $ci->db->select($fields);
      $ci->db->where($foreign_column,$foreign_id);
      $result=$ci->db->get($table)->result();
      $data=[];
      if(count($result)>0){
          foreach($result as $results){
              $data[]=$results->$fields;
          }
      }
      return $data;
      
   }
   function get_sub_product_npo($table,$fields,$foreign_column,$foreign_id)
   {
      $ci=& get_instance();
      $ci->db->select($fields);
      $ci->db->where($foreign_column,$foreign_id);
      $ci->db->where('relationship_type_id','45');
      $result=$ci->db->get($table)->result();
      $data=[];
      if(count($result)>0){
          foreach($result as $results){
              $data[]=$results->$fields;
          }
      }
      return $data;
      
   }
    function _findFullname($data) {
        $ci = & get_instance(); 
        $ci->db->select('*');
        //$ci->db->from('licensees A');
        $ci->db->from('entity A');
        $ci->db->where('A.id',$data);
        //return $ci->db->get()->row()->Company_name;
        return $ci->db->get()->row()->full_name;
    }


// himanshu changes end-30-11-2021

// Changes done to show Licensee/Registration 14-12-2021
  function  get_sub_categories($table,$fields,$foreign_column,$foreign_id)
  {
     $ci=& get_instance();
      $ci->db->select($fields);
      $ci->db->where($foreign_column,$foreign_id);
      $result=$ci->db->get($table)->result();
 // echo $ci->db->last_query();
      $data=[];
      if(count($result)>0){
          foreach($result as $results){
              $data[]=$results->$fields;
          }
      }
      return $data;
  }

  function _findSubCat($data) {
        $ci = & get_instance(); 
        $ci->db->select('*');
        //$ci->db->from('licensees A');
        $ci->db->from('subsector_categories A');
        $ci->db->where('A.id',$data);
         $query = $ci->db->get();
        return $query->result();
    }


// Changes End to show Licensee/Registration 14-12-2021


function get_sub_product_lic($table,$fields,$foreign_column,$foreign_id)
   {
      $ci=& get_instance();
      $ci->db->select($fields);
      $ci->db->where($foreign_column,$foreign_id);
      $ci->db->where($table.".status","1");
      $result=$ci->db->get($table)->result();
      // echo $ci->db->last_query();
      $data=[];
      if(count($result)>0){
          foreach($result as $results){
              $data[]=$results->$fields;
          }
      }
      return $data;
      
   }



