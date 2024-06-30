<?php ob_start();
/**
 * Template Name: Add Contact
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
        while ( have_posts() ) : the_post();?>        
<style>h1.page-header-title.clr {color: #000 !important;} body{    font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
.sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
#resp {    font-size: 17px;font-family: Arial;font-weight:bold;color: #604300;}
</style><?php include_once('css.php');?>
<div class="row">
    <div class="col-md-2"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
    <div class="col-md-8"><form action="#" method="post" id="addMemb">
            <h2 class="sec-title">ADD NEW IRIS CONTACT</h2>
        
        <hr/>
        
        <div class="notice">Please note that All Required Fields have <span class="red">red asterisk (*)</span> next to them.</div>
        <?php $args = new WP_Query([
'post_type' => 'irismembers', 'posts_per_page' => -1 , 'post_status' => 'publish', 'author' =>  $current_user->ID
 ]);
$meta = get_post_meta($post->ID, 'contact_belongs_to_member', true);?>
        <!--INIT-->
        <?php echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';?>
          <table class="form-table"><tbody>
              <tr>
                <th class="contact_belongs_to_member_td_header"><label for="contact_belongs_to_member">Contact belongs to member<span class="text-danger">*</span></label></th>
                <td class="contact_belongs_to_member_td_class">
                    <select name="contact_belongs_to_member" id="contact_belongs_to_member">
<option value="">select</option>
<?php 
foreach ($args->get_posts() as $mem_query) {
echo '<option '.($meta == $mem_query->ID ? 'selected' : '').' value="'.$mem_query->ID.'">'.$mem_query->post_title.'</option>';
}
wp_reset_postdata();?>
</select>

                </td></tr><tr>
              <th class="iriscontacts_name_td_header"><label for="iriscontacts_name">Full Name<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_name_td_class"><input type="text" name="iriscontacts_name" id="iriscontacts_name" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_address_1_td_header"><label for="iriscontacts_address">Address<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_address_1_td_class"><textarea name="iriscontacts_address" id="iriscontacts_address" cols="60" rows="4"></textarea>
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_city_td_header"><label for="iriscontacts_city">City<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_city_td_class"><input type="text" name="iriscontacts_city" id="iriscontacts_city" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_state_td_header"><label for="iriscontacts_state">State<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_state_td_class"><select name="iriscontacts_state" id="iriscontacts_state"><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_postal_code_td_header"><label for="iriscontacts_postal_code">Postal Code<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_postal_code_td_class"><input type="text" name="iriscontacts_postal_code" id="iriscontacts_postal_code" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_dob_td_header"><label for="iriscontacts_dob">Date of Birth</label></th>
                <td class="iriscontacts_dob_td_class">
<select name="iriscontacts_bday" id="iriscontacts_bday" class="day">
<option value=''>Day</option>
<?php
for ($d = 1; $d <= 31; $d++) {    echo "<option value='$d'>$d</option>";}
?>
</select>
<select name="iriscontacts_bmonth" id="iriscontacts_bmonth" class="month">
<option value=''>Month</option>
<?php $months =  array('Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
foreach ($months as $month) {    echo "<option value='$month'>$month</option>";}
?>
</select>

<select name="iriscontacts_byear" id="iriscontacts_byear" class="year">
<option value=''>Year</option>
<?php
for ($y = 2018; $y >= 1970; $y--) {    echo "<option value='$y'>$y</option>";}
?>
</select>
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_gender_td_header"><label for="iriscontacts_gender">Gender</label></th>
                <td class="iriscontacts_gender_td_class"><select name="iriscontacts_gender" id="iriscontacts_gender"><option value="M">Male</option><option value="F">Female</option></select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_email_td_header"><label for="iriscontacts_email">Email<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_email_td_class"><input type="text" name="iriscontacts_email" id="iriscontacts_email" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_home_number_td_header"><label for="iriscontacts_home_number">Home #<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_home_number_td_class"><input type="text" name="iriscontacts_home_number" id="iriscontacts_home_number" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_cell_number_td_header"><label for="iriscontacts_cell_number">Cell #<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_cell_number_td_class"><input type="text" name="iriscontacts_cell_number" id="iriscontacts_cell_number" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_work_number_td_header"><label for="iriscontacts_work_number">Work #</label></th>
                <td class="iriscontacts_work_number_td_class"><input type="text" name="iriscontacts_work_number" id="iriscontacts_work_number" value="" size="30">
        <br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_contact_type_td_header"><label for="iriscontacts_contact_type">contact type<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_contact_type_td_class"><select name="iriscontacts_contact_type" id="iriscontacts_contact_type"><option value="select">Select</option><option value="Primary Contact">Primary Contact</option><option value="Secondary Contact">Secondary Contact</option><option value="Emergency Contact">Emergency Contact</option><option value="Third Contact">Third Contact</option><option value="Fourth Contact">Fourth Contact</option><option value="Fifth Contact">Fifth Contact</option></select><br><span class="description"></span></td></tr><tr>
                <th class="iriscontacts_relationship_to_member_td_header"><label for="iriscontacts_relationship_to_member">relationship to member<span class="text-danger">*</span></label></th>
                <td class="iriscontacts_relationship_to_member_td_class"><select name="iriscontacts_relationship_to_member" id="iriscontacts_relationship_to_member"><option value="Father">Father</option><option value="Mother">Mother</option><option value="Husband">Husband</option><option value="Wife">Wife</option><option value="Grandparent">Grandparent</option><option value="Guardian">Guardian</option><option value="Stepfather">Stepfather</option><option value="Stepmother">Stepmother</option><option value="Son">Son</option><option value="Daughter">Daughter</option><option value="Grandson">Grandson</option><option value="Granddaughter">Granddaughter</option><option value="OtherRelative">OtherRelative</option><option value="Friend">Friend</option></select><br><span class="description"></span></td></tr></tbody></table>      
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
    <div class="" id="resp"></div></div>
<div class="col-md-2"><input class="btn button" type="submit" id="submit" name="submit" value="Add Contact" /></div>
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
        uploadFile('iriscontacts_photo_btn', 'iriscontacts_photo_file', 'iriscontacts_photo_upload', 'iriscontacts_photo_resp');
        
        
        jq('#submit').click(function(e){
       e.preventDefault();
       //       
       <?php $process_mem = get_stylesheet_directory_uri().'/process/process_cont.php';?>

    jq.ajax({
            url: '<?=$process_mem;?>',
            type: 'POST',

            data:jq("form").serialize(),
            success: function(res) {
                
                       //jq('#reg').find('#submit').prop('disabled', true);
                       //jq('#resp').addClass('text-success');
                       //jq('#resp').html(res);
//                       jq('html, body').animate({
//                       scrollTop:jq("#main").offset().top
//                       }, 1000);  
if(res == '0'){
    jq('#resp').html('Please fill all fields'); 
}else if(res == '1'){
    jq('#reg').find('#submit').prop('disabled', true);
    jq('#resp').addClass('text-success');
    jq('#resp').html('Contact information added.');
    jq('#addMemb')[0].reset();
    setTimeout(function(){
 window.location.replace("<?=site_url().'/iriscontacts'?>");
}, 2000);
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