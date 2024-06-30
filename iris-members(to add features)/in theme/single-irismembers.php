<?php ob_start();
get_header();
if (!is_user_logged_in()) {
    $location = site_url().'/login';
    wp_redirect($location);}
?>
	<style>h1.page-header-title.clr {color: #000 !important;} body{font-family: "ABeeZee";font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
	.sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
	textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
	#submit{ float: right; position: relative; right: -15%;}#resp {    font-size: 16px;font-family: Arial;}
    .logos{height:82px !important;}@media(max-width:767px){.logos{margin: 0 auto;    display: table;    float: none !important;    margin-bottom: 12px;}}
        </style><?php include_once 'css.php';?><style> .nomar {    margin: 0 !important;}       .row{margin:20px 0;}  .box {background: linear-gradient(to bottom right, #ececec 0%, #efefef 100%);border: 1px solid #DEDEDE;padding: 100px 15px;font-size: 25px;border-radius: 5px;text-align: center;}  </style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" type="stylesheet"/>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
    
	
         <div class="container">
         <div class="row">
             <div class="col-md-2"><?php $ml = get_post_meta(get_the_ID(), 'irismembers_logo', true); ?>
                                        <?php $mli = site_url().'/wp-content/'.$ml.'.png'?>
                 <img class="logos" id="irismembers_logo_img" src="<?=($ml !=""?$mli:'');?>"></div>
                 <div class="col-md-8"> <h2 style="text-align:center;">IRIS (Immediate Recognition Increases Safety) Program</h2></div>
             <div class="col-md-2"><img class="logos" id="IRISLogouse" src="<?= site_url().'/wp-content/IRISLogouse.jpg'?>"></div>
             
         </div>
             <div class="row"></div>             
         </div>
    
     <div class="container iris-content">
         <div class="row nomar">
             <div class="col-md-9"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
             <div class="col-md-3"> <a href="<?= site_url() ?>/edit-member?id=<?= $post->ID; ?>" class="right"> <i class="fa fa-edit"></i> Edit Member Informaton</a></div>
         </div>
			<?php 
			//$contact_prefix = 'irismembers_';
			function disp_field($title, $field){
			
			?>
				<div class="row">
                <div class="col-md-5 label"><?=ucfirst($title)?></div>
                <div class="col-md-7 label"><?php $val = get_post_meta(get_the_ID(), $field, true); echo (is_array($val)?  implode(', ', $val):$val);?></div>                   
                </div>
			<?php }
			?>
			<?php 
			disp_field('Member Name', 'irismembers_member_name');
//			disp_field('First Name', 'irismembers_first_name');
//			disp_field('Middle Name', 'irismembers_middle_name');
//			disp_field('Last Name', 'irismembers_last_name');
			disp_field('Address', 'irismembers_address');
//			disp_field('Address 2', 'irismembers_address_2');
			disp_field('City', 'irismembers_city');
//			disp_field('Country', 'irismembers_country');
			disp_field('State', 'irismembers_state');
			disp_field('Postal Code', 'irismembers_postal_code');?>
<div class="row">
<div class="col-md-5 label">Date of Birth</div>
<div class="col-md-7 label"><?=get_post_meta(get_the_ID(), 'irismembers_bday', true);?>-<?=get_post_meta(get_the_ID(), 'irismembers_bmonth', true);?>-<?=get_post_meta(get_the_ID(), 'irismembers_byear', true);?></div>                   
</div>                     
<?php			disp_field('Gender', 'irismembers_gender');
			disp_field('Email', 'irismembers_email');
			disp_field('Home Number', 'irismembers_home_number');
			disp_field('Cell Number', 'irismembers_cell_number');
			disp_field('weight', 'irismembers_weight_lb_kg');
			disp_field('height', 'irismembers_height_inches_cm');
			disp_field('race', 'irismembers_race');
			disp_field('What is their Language Capability', 'irismembers_language_capability');
			disp_field('Are they Sensitive to Sound? If so what Kind?', 'sound_sesitivity');
			disp_field('What is your Diagnosis?', 'whats_our_diagnosis');
			disp_field('sensitive to touch', 'sensitive_to_touch');
			disp_field('sensitive to taste', 'sensitive_to_taste');
			disp_field('Do they Have a Tracking Device. If Yes Please Indicate Device Type:', 'indicate_tracking_device');
				disp_field('are they toilet trained', 'are_they_toilet_trained');
				disp_field('If Other Diagnosis Please indicate', 'indicate_other_diagnosis');
				disp_field('Are there Strategies that Decrease the Stressful Reactions', 'strategies_to_decrease_sr');
				disp_field('prescriber name & number', 'irismembers_prescriber_name_number');
				disp_field('Are there Cognitive (IQ) delay? If so what Degree?', 'iq_delay_degree');
				
				disp_field('Are they on Medications: If so please indicate:', 'if_on_medications');
				disp_field('Are there Behavioral Issues? If Yes Please Explain', 'if_behavioral_issues');
				disp_field('What allergies do they have?', 'irismembers_allergies_list');
				disp_field('Do they Wander ot Elope?', 'wander_elope');
				disp_field('Are there in Danger to Self and Others?If Yes PLease Explain:', 'self_danger_or_others');
				disp_field('Do they become Combative when Stressed?', 'combative_when_stressed');
				disp_field('What type of Living Arrangement Are They In', 'living_arrangements');
				disp_field('Is there a Seizure Disorder?', 'seizure_disorder');
				disp_field('Are there Behavioral Conditions and Triggers', 'behavioral_conditions_and_triggers');
				disp_field('Typical Response to being Approached', 'typical_response_being_approached');
				disp_field('Is there Anything an Emergency Responder Should Know?', 'anything_else_for_responder');
				disp_field('How Did You Hear About Us?', 'how_did_you_hear');
				?><h3 class="section-heading">Nearest Police Department:</h3><?php
				 disp_field('Name', 'irismembers_police_department_name');
				disp_field('City', 'irismembers_police_department_city');
				disp_field('county', 'irismembers_police_department_county');
				disp_field('phone', 'irismembers_police_department_phone');
				?><h3 class="section-heading">Nearest Fire / Rescue Department:</h3><?php
                            
				disp_field('name', 'irismembers_rescue_department_name');
				disp_field('city', 'irismembers_rescue_department_city');
				disp_field('state', 'irismembers_rescue_department_state');
				disp_field('phone', 'irismembers_rescue_department_phone');
				//disp_field('photo', 'irismembers_upload_member_photo');
				//disp_field('photo', 'irismembers_photo_upload');
				/*disp_field('xyz', 'xyz');
				disp_field('xyz', 'xyz');
				disp_field('xyz', 'xyz');
				disp_field('xyz', 'xyz');
				disp_field('xyz', 'xyz');*/
			?>
                                <h3 class="section-heading">Members Photo:</h3>
<div class="row">
<div class="col-md-5 label">photo</div>
<div class="col-md-7 label"><?php $photo = get_post_meta(get_the_ID(), 'irismembers_photo_upload', true);?>
    <img src="<?=$photo?>" class="img-disp"/></div>                   
</div>
              </div>    <!--iris-content-->
     <div class="container">
<hr/>			
<?php function disp_assoc($title,$pt,$mk,$mv){ ?>
<div class="row assoc">
<?php  $qry = new WP_Query( array( 'post_type' => $pt, 'meta_key'   =>  $mk,
  'meta_value' => $mv  ) );

$items = $qry->posts; 
 //echo '<pre>';
  //print_r($contacts);
?>
<div class='col-md-12 col-sm-12'>
    <h2 class="inl-bl"><?=$title?></h2>
    <div class="inl-bl"><a href="<?=site_url().'/add-'.substr(strtolower($title), 0, -1);?>"><i class='fa fa-plus'></i> Add <?=substr($title, 0, -1);?></a></div></h2>
<?php if(count($items) > 0){?>
<ol class='list-assoc'><?php foreach($items as $item) {?>
<li><?=$item->post_title;?> | <a href="<?=site_url()?>/<?=$pt?>/<?=$item->post_name;?>">View Details</a></li>
<?php } wp_reset_postdata();?></ol>

<?php }//endsif
else{ echo  "<div class='clearfix'>There're no $title associated with this member.</div>";}?>
</div><?php    }//ends fucn?>


<?php disp_assoc('Contacts','iriscontacts','contact_belongs_to_member',get_the_ID())?><hr/>
<?php disp_assoc('Insurances','irisinsurances','insurance_belongs_to_member',get_the_ID())?>
                
            </div>
</div><!-- #content-wrap -->

<?php //do_action( 'ocean_after_content_wrap' );   ?>

<?php get_footer(); ?>