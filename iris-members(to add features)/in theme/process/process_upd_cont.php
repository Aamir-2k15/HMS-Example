<?php require('./../../../../wp-load.php'); 
//print_r($_POST);
//exit;  
/*if(empty($_POST['contact_belongs_to_member']) || empty($_POST['iriscontacts_name']) ||  empty($_POST['iriscontacts_address']) ||  empty($_POST['iriscontacts_city']) ||  empty($_POST['iriscontacts_state'])  ||  empty($_POST['iriscontacts_postal_code'])  ||  empty($_POST['iriscontacts_dob']) ||  empty($_POST['iriscontacts_gender'])  ||  empty($_POST['iriscontacts_email'])  ||  empty($_POST['iriscontacts_home_number'])  ||  empty($_POST['iriscontacts_cell_number'])  ||  empty($_POST['iriscontacts_work_number']) ||  empty($_POST['iriscontacts_contact_type']) ||  empty($_POST['iriscontacts_relationship_to_member'])   ) {    

}else{
    
    $post_id = wp_insert_post(array (
    'post_type' => 'iriscontacts',
    'post_title' => $_POST['iriscontacts_name'],
    'post_content' => '',
    'post_status' => 'publish',
    'comment_status' => 'closed',   // prefer
    'ping_status' => 'closed',      //  prefer
    ));//postarray
*/
  /*echo */  $post_id = $_POST['postid'];
//  exit;
if ($post_id) {
    // insert post meta
     $add_fields = array(
    'contact_belongs_to_member',    
//    'iriscontacts_name',    
    'iriscontacts_address',    
    'iriscontacts_city',    
    'iriscontacts_state',    
    'iriscontacts_postal_code',    
    'iriscontacts_bday','iriscontacts_bmonth','iriscontacts_byear',    
    'iriscontacts_gender',    
    'iriscontacts_email',    
    'iriscontacts_home_number',    
    'iriscontacts_cell_number',    
    'iriscontacts_work_number',    
    'iriscontacts_contact_type',    
    'iriscontacts_relationship_to_member' 
    //'iriscontacts_register'
     );
//  print_r($add_fields);
//  exit;
    foreach($add_fields as $single){
       update_post_meta($post_id, $single, $_POST[$single]);
    }
    
}
    
   echo '1';  
//}