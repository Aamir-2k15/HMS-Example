<?php require('./../../../../wp-load.php'); 

//print_r($_POST);
//die();
global $current_user;
$user_id = wp_get_current_user();
$user_id->ID; // The current user ID
$user_id = get_current_user_id(); // Alternative for getting current user ID
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $bday = $_POST['bday']; 
    $bmonth= $_POST['bmonth']; 
    $byear = $_POST['byear']; 
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $relationship = $_POST['relationship'];
    $work_no = $_POST['work_no'];
    
if(isset($name)){update_user_meta( $user_id, 'fullname', $name );}
if(isset($email)){update_user_meta( $email, 'user_email', $email);}
if(!empty($password)){wp_set_password($password, $user_id);}
if(isset($city)){update_user_meta( $user_id, 'city', $city );}
if(isset($address)){update_user_meta( $user_id, 'address', $address );}
if(isset($state)){update_user_meta( $user_id, 'state', $state );}
if(isset($bday)){update_user_meta( $user_id, 'bday', $bday );}
if(isset($bmonth)){update_user_meta( $user_id, 'bmonth', $bmonth );}
if(isset($byear)){update_user_meta( $user_id, 'byear', $byear );}
if(isset($contact)){update_user_meta( $user_id, 'contact', $contact );}
if(isset($gender)){update_user_meta( $user_id, 'gender', $gender );}
if(isset($relationship)){update_user_meta( $user_id, 'relationship', $relationship );}
if(isset($work_no)){update_user_meta( $user_id, 'work_no', $work_no );}
 wp_update_user(
array(
'ID'          =>    $user_id,
'nickname'    =>    $_POST['fullname']
)
);
echo '1';
//if($id_check == 1){ header('Location: '. site_url().'/registered.php');}
//wp_die();