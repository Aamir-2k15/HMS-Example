<?php require('./../../../../wp-load.php'); 

 
//print_r($_POST);

if($_POST['irismembers_member_name'] == ""  || $_POST['irismembers_address'] == ""  || $_POST['irismembers_city'] == ""  || $_POST['irismembers_state'] == ""  || $_POST['irismembers_postal_code'] == ""    || $_POST['irismembers_gender'] == ""  || 
$_POST['irismembers_email'] == ""  || $_POST['irismembers_home_number'] == ""  || $_POST['irismembers_cell_number'] == ""  || $_POST['irismembers_weight_lb_kg'] == ""  || $_POST['irismembers_height_inches_cm'] == ""  || 
$_POST['irismembers_race'] == ""  || $_POST['irismembers_language_capability'] == ""  ||  $_POST['sound_sesitivity'] == ""||  $_POST['whats_our_diagnosis'] == ""  ||  $_POST['sensitive_to_touch'] == ""  ||  $_POST['sensitive_to_taste'] == ""  || 
$_POST['indicate_tracking_device'] == ""  || $_POST['are_they_toilet_trained'] == ""  ||  $_POST['indicate_other_diagnosis'] == ""  || $_POST['strategies_to_decrease_sr'] == ""  ||  $_POST['irismembers_prescriber_name_number'] == ""  ||
$_POST['iq_delay_degree'] == ""  ||  $_POST['if_on_medications'] == ""  ||  $_POST['if_behavioral_issues'] == ""  ||  $_POST['irismembers_allergies_list'] == ""  || $_POST['wander_elope'] == ""  ||  $_POST['self_danger_or_others'] == ""  ||  
$_POST['combative_when_stressed'] == ""  ||  $_POST['living_arrangements'] == ""  || $_POST['seizure_disorder'] == ""  ||  $_POST['behavioral_conditions_and_triggers'] == ""  ||  $_POST['typical_response_being_approached'] == ""  || 
$_POST['anything_else_for_responder'] == ""  || $_POST['how_did_you_hear'] == ""  ||  $_POST['irismembers_police_department_name'] == ""  || $_POST['irismembers_police_department_city'] == ""  || 
$_POST['irismembers_police_department_state'] == ""  || $_POST['irismembers_police_department_county'] == ""  || $_POST['irismembers_police_department_phone'] == ""  || 
$_POST['irismembers_rescue_department_name'] == ""  || $_POST['irismembers_rescue_department_city'] == ""  || $_POST['irismembers_rescue_department_state'] == ""  || 
$_POST['irismembers_rescue_department_county'] == ""  || $_POST['irismembers_rescue_department_phone'] == ""  || $_POST['irismembers_photo_upload'] == "" || $_POST['irismembers_logo'] == "" ) {
    echo '0';
}else{
    
    $post_id = wp_insert_post(array (
    'post_type' => 'irismembers',
    'post_title' => $_POST['irismembers_member_name'],
    'post_content' => '',
    'post_status' => 'publish',
    'comment_status' => 'closed',   // prefer
    'ping_status' => 'closed',      //  prefer
    ));//postarr

if ($post_id) {
    // insert post meta
     $add_fields = array('irismembers_member_name',
    'irismembers_address',
    'irismembers_city',
    'irismembers_state',
    'irismembers_postal_code',
            'irismembers_bday','irismembers_bmonth','irismembers_byear',
  
    'irismembers_gender', 
    'irismembers_email',
    'irismembers_home_number',
    'irismembers_cell_number',
    'irismembers_weight_lb_kg',
    'irismembers_height_inches_cm',
    'irismembers_race',
    'irismembers_language_capability',
    'sound_sesitivity', 
         'whats_our_diagnosis',
    'sensitive_to_touch', 
    'sensitive_to_taste',
    'indicate_tracking_device',
    'are_they_toilet_trained', 
    'indicate_other_diagnosis',
    'strategies_to_decrease_sr',
    'irismembers_prescriber_name_number',
    'iq_delay_degree',
    'if_on_medications', 
    'if_behavioral_issues', 
    'irismembers_allergies_list',
    'wander_elope', 
    'self_danger_or_others', 
    'combative_when_stressed',
    'living_arrangements',
    'seizure_disorder', 
    'behavioral_conditions_and_triggers',
    'typical_response_being_approached',
    'anything_else_for_responder',
    'how_did_you_hear',
    'irismembers_police_department_name',
    'irismembers_police_department_city',
    'irismembers_police_department_state',
    'irismembers_police_department_county',
    'irismembers_police_department_phone', 
    'irismembers_rescue_department_name',
    'irismembers_rescue_department_city',
    'irismembers_rescue_department_state', 
    'irismembers_rescue_department_county',
    'irismembers_rescue_department_phone',
    'irismembers_photo_upload','irismembers_logo','irismembers_register');
//     print_r($add_fields);
//exit;
    foreach($add_fields as $single){
        add_post_meta($post_id, $single, $_POST[$single]);
    }
   
}
    
   echo '1';  
}