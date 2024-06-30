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
    </style><?php include_once 'css.php';?><style> .nomar {    margin: 0 !important;}       .row{margin:20px 0;}  .box {background: linear-gradient(to bottom right, #ececec 0%, #efefef 100%);border: 1px solid #DEDEDE;padding: 100px 15px;font-size: 25px;border-radius: 5px;text-align: center;}  </style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" type="stylesheet"/>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
      
     <div class="container iris-content">
         <div class="row nomar">
             <div class="col-md-9"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
             <div class="col-md-3"> <a href="<?= site_url() ?>/edit-insurance?id=<?= $post->ID; ?>" class="right"> <i class="fa fa-edit"></i> Edit Insurance Informaton</a></div>
         </div>
			<?php 
			//$contact_prefix = 'irisinsurances_';
			function disp_field($title, $field){
			
			?>
				<div class="row">
                <div class="col-md-5 label"><?=ucfirst($title)?></div>
                <div class="col-md-7 label"><?php $val = get_post_meta(get_the_ID(), $field, true); echo (is_array($val)?  implode(', ', $val):$val);?></div>                   
                </div>
			<?php }
			?>
<div class="row">
<div class="col-md-5 label">Insurance belongs to member</div>
<div class="col-md-7 label"><?php $var = get_post_meta(get_the_ID(), 'insurance_belongs_to_member', true); echo get_the_title( $var ); ?></div>                   
</div>
			<?php 
			
			disp_field('Insurance Carrier', 'irisinsurances_insurance_carrier');
                        disp_field('Policy Number', 'irisinsurances_policy_number');
			disp_field('Group Name', 'irisinsurances_group_name');
				disp_field('Group Number', 'irisinsurances_group_number');
				disp_field('physician name', 'irisinsurances_physician_name');
				disp_field('physician tel', 'irisinsurances_physician_tel');
				disp_field('insurer fullname', 'irisinsurances_insurer_fullname');?>
<div class="row">
<div class="col-md-5 label">Date of Birth</div>
<div class="col-md-7 label"><?=get_post_meta(get_the_ID(), 'irisinsurances_bday', true);?>-<?=get_post_meta(get_the_ID(), 'irisinsurances_bmonth', true);?>-<?=get_post_meta(get_the_ID(), 'irisinsurances_byear', true);?></div>                   
</div>  
                                
	<?php			disp_field('mailing addresss', 'irisinsurances_mailing_addresss');
				disp_field('city', 'irisinsurances_city');
				disp_field('state', 'irisinsurances_state');
				disp_field('postal code', 'irisinsurances_postal_code');
				disp_field('email', 'irisinsurances_email');
				
			?>

<hr/>	

<!--<div class="row">&nbsp;</div>-->
            </div>
</div><!-- #content-wrap -->

<?php //do_action( 'ocean_after_content_wrap' );   ?>

<?php get_footer(); ?>