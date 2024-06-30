<?php ob_start();
/**
 * Template Name: Update Contact
 */
global $current_user;
get_header(); 
if (!is_user_logged_in()) {
    $location = site_url().'/user-dashboard';
    wp_redirect($location);}
?>	<?php //do_action( 'ocean_before_content_wrap' ); ?>
	<div id="content-wrap" class="container clr">
<?php do_action( 'ocean_before_content_inner' ); ?>
<?php
// Elementor `single` location
if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
// Start loop
        while ( have_posts() ) : the_post();
               $postid = $_GET['id'];?>        
<style>h1.page-header-title.clr {color: #000 !important;} body{    font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
.sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
#resp {    font-size: 17px;font-family: Arial;font-weight:bold;color: #604300;}
</style><?php include_once('css.php');?>
<div class="row">
    <div class="col-md-2"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
    <div class="col-md-8"><form action="#" method="post" id="addMemb">
            <h2 class="sec-title">UPDATING <?=get_post_meta($postid, 'iriscontacts_name', true);?>'s Profile</h2>
        
        <hr/>
        
        <div class="">&nbsp</div>
        <?php $args = new WP_Query([
'post_type' => 'irismembers', 'posts_per_page' => -1 , 'post_status' => 'publish', 'author' =>  $current_user->ID
 ]);
 $meta = get_post_meta($postid, 'contact_belongs_to_member', true);?>
        <!--INIT-->
        <?php echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';?>
          <table class="form-table"><tbody>
              <tr>
                <th class="contact_belongs_to_member_td_header"><label for="contact_belongs_to_member">Contact belongs to member</label></th>
                <td class="contact_belongs_to_member_td_class">
                    <select name="contact_belongs_to_member" id="contact_belongs_to_member">
<option value="">select</option>
<?php 
foreach ($args->get_posts() as $mem_query) {
echo '<option '.($meta == $mem_query->ID ? 'selected="selected"' : '').' value="'.$mem_query->ID.'">'.$mem_query->post_title.'</option>';
}
wp_reset_postdata();?>
</select>

                </td></tr><tr>
              <th class="iriscontacts_name_td_header"><label for="iriscontacts_name">Full Name</label></th>
              <td class="iriscontacts_name_td_class"><input type="text" name="" disabled="disabled" id="iriscontacts_name" value="<?=get_post_meta($postid, 'iriscontacts_name', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_address_1_td_header"><label for="iriscontacts_address">Address</label></th>
                <td class="iriscontacts_address_1_td_class"><textarea name="iriscontacts_address" id="iriscontacts_address" cols="60" rows="4"><?=get_post_meta($postid, 'iriscontacts_address', true);?></textarea>
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_city_td_header"><label for="iriscontacts_city">City</label></th>
                <td class="iriscontacts_city_td_class"><input type="text" name="iriscontacts_city" id="iriscontacts_city" value="<?=get_post_meta($postid, 'iriscontacts_city', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_state_td_header"><label for="iriscontacts_state">State</label></th>
                <td class="iriscontacts_state_td_class"><select name="iriscontacts_state" id="iriscontacts_state">
                    <?php $state = get_post_meta($postid, 'iriscontacts_state', true);?> <?php if($state != ""){?><option value="<?=$state;?>" selected="selectd"><?=$state;?></option><?php } ?>  
                    <?php include('inc/states.php');?> <?php foreach($states as $state):?><option value="<?=$state?>"><?=$state?></option><?php endforeach;?>
                    </select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_postal_code_td_header"><label for="iriscontacts_postal_code">Postal Code</label></th>
                <td class="iriscontacts_postal_code_td_class"><input type="text" name="iriscontacts_postal_code" id="iriscontacts_postal_code" value="<?=get_post_meta($postid, 'iriscontacts_postal_code', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
<th class="iriscontacts_dob_td_header"><label for="iriscontacts_dob">Date of Birth</label></th>
<td class="iriscontacts_dob_td_class">
<select name="iriscontacts_bday" id="iriscontacts_bday" class="day">
                <?php $bday = get_post_meta($postid, 'iriscontacts_bday', true);?>    
<?php if(!empty($bday)){?><option value='<?=$bday;?>' selectd><?=$bday;?></option><?php }?>   
<option value=''>Day</option>
<?php
for ($d = 1; $d <= 31; $d++) {    echo "<option value='$d'>$d</option>";}
?>
</select>
<select name="iriscontacts_bmonth" id="iriscontacts_bmonth" class="month">
<?php $bmonth = get_post_meta($postid, 'iriscontacts_bmonth', true);?>
<?php if(!empty($bmonth)){?><option value='<?=$bmonth;?>' selectd><?=$bmonth;?></option><?php }?>
<option value=''>Month</option>
<?php $months =  array('Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
foreach ($months as $month) {    echo "<option value='$month'>$month</option>";}
?>
</select>

<select name="iriscontacts_byear" id="iriscontacts_byear" class="year">
     <?php $byear = get_post_meta($postid, 'iriscontacts_byear', true);?>
<?php if(!empty($byear)){?><option value='<?=$byear;?>' selectd><?=$byear;?></option><?php }?>
<option value=''>Year</option>
<?php
for ($y = 2018; $y >= 1970; $y--) {    echo "<option value='$y'>$y</option>";}
?>
</select> 
                    
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_gender_td_header"><label for="iriscontacts_gender">Gender</label></th>
                <td class="irismembers_gender_td_class"><select name="iriscontacts_gender" id="iriscontacts_gender"><?php $g = get_post_meta($postid, 'iriscontacts_gender', true)?><option value="M" <?=$g=='M'?'selected="selected"':''?>>Male</option><option value="F" <?=$g=='F'?'selected="selected"':''?>>Female</option></select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_email_td_header"><label for="iriscontacts_email">Email</label></th>
                <td class="iriscontacts_email_td_class"><input type="text" name="iriscontacts_email" id="iriscontacts_email" value="<?=get_post_meta($postid, 'iriscontacts_email', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_home_number_td_header"><label for="iriscontacts_home_number">Home #</label></th>
                <td class="iriscontacts_home_number_td_class"><input type="text" name="iriscontacts_home_number" id="iriscontacts_home_number" value="<?=get_post_meta($postid, 'iriscontacts_home_number', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_cell_number_td_header"><label for="iriscontacts_cell_number">Cell #</label></th>
                <td class="iriscontacts_cell_number_td_class"><input type="text" name="iriscontacts_cell_number" id="iriscontacts_cell_number" value="<?=get_post_meta($postid, 'iriscontacts_cell_number', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_work_number_td_header"><label for="iriscontacts_work_number">Work #</label></th>
                <td class="iriscontacts_work_number_td_class"><input type="text" name="iriscontacts_work_number" id="iriscontacts_work_number" value="<?=get_post_meta($postid, 'iriscontacts_work_number', true);?>" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_contact_type_td_header"><label for="iriscontacts_contact_type">contact type</label></th>
                <td class="iriscontacts_contact_type_td_class"><select name="iriscontacts_contact_type" id="iriscontacts_contact_type"><option value="">Select</option>
                        <?php $ctype = get_post_meta($postid, 'iriscontacts_contact_type', true); if($ctype != ""){?><option value="<?=$ctype;?>" selected="selected"><?=$ctype;?></option><?php }?>
                        <option value="Primary Contact">Primary Contact</option><option value="Secondary Contact">Secondary Contact</option><option value="Emergency Contact">Emergency Contact</option><option value="Third Contact">Third Contact</option><option value="Fourth Contact">Fourth Contact</option><option value="Fifth Contact">Fifth Contact</option></select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_relationship_to_member_td_header"><label for="iriscontacts_relationship_to_member">relationship to member</label></th>
                <td class="iriscontacts_relationship_to_member_td_class"><select name="iriscontacts_relationship_to_member" id="iriscontacts_relationship_to_member">
                        <?php $rel_mem = get_post_meta($postid, 'iriscontacts_relationship_to_member', true); if($rel_mem != ""){?><option value="<?=$rel_mem;?>" selected="selected"><?=$rel_mem;?></option><?php }?>
                        <option value="Father">Father</option><option value="Mother">Mother</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Grandparent">Grandparent</option><option value="Guardian">Guardian</option><option value="Stepfather">Stepfather</option><option value="Stepmother">Stepmother</option><option value="Son">Son</option><option value="Daughter">Daughter</option><option value="Grandson">Grandson</option><option value="Granddaughter">Granddaughter</option><option value="OtherRelative">OtherRelative</option><option value="Friend">Friend</option></select><br><span class="description"></span></td></tr></tbody></table>      
        <!--END-->
<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-8"></div>
</div> 
<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-8"></div>
</div> 
<div class="form-group row p-4">
<div class="col-md-12"><hr/></div>
<div class="col-md-2"></div>
<div class="col-md-8">
    <!--<input disabled="disabled" type="hidden" name="iriscontacts_register" value="<?=date("d-M-Y");?>">-->
    <div class="" id="resp"></div><input type="hidden" name="postid" value="<?=$postid;?>"/></div>
<div class="col-md-2"><input class="btn button" type="submit" id="submit" name="submit" value="Save" /></div>
</div>

</form>     
    </div>
    <div class="col-md-2">&nbsp</div>
</div>
<div class="clearfix">&nbsp;</div>
<?php get_template_part( 'partials/page/layout' );
	endwhile;
	} ?>
		<?php //do_action( 'ocean_after_primary' ); ?>
	</div><!-- #content-wrap -->

	<?php //do_action( 'ocean_after_content_wrap' ); ?>
<?php $process = get_stylesheet_directory_uri().'/process/upload.php';?>         
<script>
    
    $ = jQuery;
    var jq = $.noConflict();
    jq(document).ready(function () {

//upload file
        function uploadFile(btn, upl, valSend, upl_resp) {

            jq("#" + btn).click(function () {

                var fd = new FormData();

                var files = jq('#' + upl)[0].files[0];

                fd.append('file', files);

                jq.ajax({
                    url: '<?= $process?>',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response != 0) {
                            jq("#" + valSend).attr("value", response);
                            jq('#' + upl_resp).html('Uploaded successfully.').removeClass('text-danger').addClass('text-success');
                        } else {
                            jq('#' + upl_resp).html('No file was uploaded,\n\
<br>Please not that only these formats are allowed: .pdf,.doc,docx,jpg,png,jpeg<br>\n\
And maximum file size should be less than 4MB.');
                            jq('#' + upl).click(function () {
                                jq('#' + upl_resp).empty();
                            });
                        }
                    }
                });

            });
        }
        //uploadFile('iriscontacts_photo_btn', 'iriscontacts_photo_file', 'iriscontacts_photo_upload', 'iriscontacts_photo_resp');
        
        
        jq('#submit').click(function(e){
       e.preventDefault();
       //       
       <?php $process_cont = get_stylesheet_directory_uri().'/process/process_upd_cont.php';?>

    jq.ajax({
            url: '<?=$process_cont;?>',
            type: 'POST',

            data:jq("form").serialize(),
            success: function(res) {
                
                       //jq('#reg').find('#submit').prop('disabled', true);
                       //jq('#resp').addClass('text-success');
                       //jq('#resp').html(res);
//                       jq('html, body').animate({
//                       scrollTop:jq("#main").offset().top
//                       }, 1000);  
if(res == '1'){
    jq('#reg').find('#submit').prop('disabled', true);
    jq('#resp').addClass('text-success');
    jq('#resp').html('Contact information updated.');
//    jq('#addMemb')[0].reset();
    setTimeout(function(){
 window.location.replace("<?=site_url().'/iriscontacts'?>");
}, 2000);
}else{
                         jq('#resp').html('Something went worng, please try again later!');
    }
            },
            error: function(e) {
                    
//jq('html, body').animate({
//scrollTop: $("#main").offset().top
//}, 1000);
                     jq('#resp').addClass('text-danger');
                     jq('#resp').html('Something went worng, please try again later!');
            console.log(e);
            }//err
            });//ends ajax
 
   });//ends click
   
});//doc ready    
</script>
<?php 
// if(is_user_logged_in()){
//    echo "<script>jq('h1.page-header-title.clr').html('Your Profile')</script>";
//}?>
<?php get_footer(); ?>