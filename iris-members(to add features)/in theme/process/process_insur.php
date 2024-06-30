<?php require('./../../../../wp-load.php'); 
//print_r($_POST);
//exit;  
if(    empty($_POST['insurance_belongs_to_member']) ||  
    empty($_POST['irisinsurances_insurance_carrier']) ||  
    empty($_POST['irisinsurances_policy_number']) ||  
    empty($_POST['irisinsurances_group_name']) ||  
    empty($_POST['irisinsurances_group_number']) ||  
    empty($_POST['irisinsurances_physician_name']) ||  
    empty($_POST['irisinsurances_physician_tel']) ||  
    empty($_POST['irisinsurances_insurer_fullname']) ||    
    empty($_POST['irisinsurances_mailing_addresss']) ||  
    empty($_POST['irisinsurances_city']) ||  
    empty($_POST['irisinsurances_state']) ||  
    empty($_POST['irisinsurances_postal_code']) ||  
    empty($_POST['irisinsurances_email'])   ) {
//if(    empty($_POST['insurance_belongs_to_member']) ||  
//    empty($_POST['irisinsurances_insurance_carrier']) 
//     ) {
    echo '0';  
}else{
    
    $post_id = wp_insert_post(array (
    'post_type' => 'irisinsurances',
    'post_title' => $_POST['irisinsurances_insurance_carrier'],
    'post_content' => '',
    'post_status' => 'publish',
    'comment_status' => 'closed',   // prefer
    'ping_status' => 'closed',      //  prefer
    ));//postarray

if ($post_id) {
    // insert post meta
     $add_fields = array(
        'insurance_belongs_to_member',  
    'irisinsurances_insurance_carrier',  
    'irisinsurances_policy_number',  
    'irisinsurances_group_name',  
    'irisinsurances_group_number',  
    'irisinsurances_physician_name',  
    'irisinsurances_physician_tel',  
    'irisinsurances_insurer_fullname',  
   'irisinsurances_bday','irisinsurances_bmonth','irisinsurances_byear',
    'irisinsurances_mailing_addresss',  
    'irisinsurances_city',  
    'irisinsurances_state',  
    'irisinsurances_postal_code',  
    'irisinsurances_email' 
     );
     
    foreach($add_fields as $single){
        add_post_meta($post_id, $single, $_POST[$single]);
    }
   
}
    
   echo '1';  
}