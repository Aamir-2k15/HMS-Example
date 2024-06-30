<?php
ob_start();
/**
 * Template Name: Update Insurance
 */
global $current_user;
get_header();
if (!is_user_logged_in()) {
    $location = site_url() . '/user-dashboard';
    wp_redirect($location);
}
?>	<?php //do_action( 'ocean_before_content_wrap' ); ?>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
    <?php
// Elementor `single` location
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('single')) {
// Start loop
        while (have_posts()) : the_post();
            $postid = $_GET['id'];
            ?>        
            <style>h1.page-header-title.clr {color: #000 !important;} body{    font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
                .sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
                textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
                #resp {font-size: 17px;font-family: Arial;font-weight:bold;color: #604300;}
            </style><?php include_once('css.php'); ?>
            <div class="row">
                <div class="col-md-2"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
                <div class="col-md-8"><form action="#" method="post" id="addMemb">
                        <h2 class="sec-title">UPDATING INSURANCE: <?= get_post_meta($postid, 'irisinsurances_insurance_carrier', true); ?> </h2>

                        <hr/>

                        <div class="">&nbsp</div>
                        <?php
                        $args = new WP_Query([
                            'post_type' => 'irismembers', 'posts_per_page' => -1, 'post_status' => 'publish', 'author' => $current_user->ID
                        ]);
                        $meta = get_post_meta($postid, 'insurance_belongs_to_member', true);
                        ?>
                        <!--INIT-->
                                            <?php echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />'; ?>
                        <table class="form-table"><tbody><tr>
                                    <th class="insurance_belongs_to_member_td_header"><label for="insurance_belongs_to_member">belongs to member</label></th>
                                    <td class="insurance_belongs_to_member_td_class">
                                        <select name="insurance_belongs_to_member" id="insurance_belongs_to_member">
                                            <option value="">select</option>
        <?php
        foreach ($args->get_posts() as $mem_query) {
            echo '<option ' . ($meta == $mem_query->ID ? 'selected' : '') . ' value="' . $mem_query->ID . '">' . $mem_query->post_title . '</option>';
        }
        wp_reset_postdata();
        ?>
                                        </select>
                                    </td></tr><tr>
                                    <th class="irisinsurances_insurance_carrier_td_header"><label for="irisinsurances_insurance_carrier">Insurance Carrier</label></th>
                                    <td class="irisinsurances_insurance_carrier_td_class"><input type="text" disabled="disabled" name="" id="irisinsurances_insurance_carrier" value="<?= get_post_meta($postid, 'irisinsurances_insurance_carrier', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_policy_number_td_header"><label for="irisinsurances_policy_number">policy number</label></th>
                                    <td class="irisinsurances_policy_number_td_class"><input type="text" name="irisinsurances_policy_number" id="irisinsurances_policy_number" value="<?= get_post_meta($postid, 'irisinsurances_policy_number', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_group_name_td_header"><label for="irisinsurances_group_name">group name</label></th>
                                    <td class="irisinsurances_group_name_td_class"><input type="text" name="irisinsurances_group_name" id="irisinsurances_group_name" value="<?= get_post_meta($postid, 'irisinsurances_group_name', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_group_number_td_header"><label for="irisinsurances_group_number">group number</label></th>
                                    <td class="irisinsurances_group_number_td_class"><input type="text" name="irisinsurances_group_number" id="irisinsurances_group_number" value="<?= get_post_meta($postid, 'irisinsurances_group_number', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_physician_name_td_header"><label for="irisinsurances_physician_name">physician name</label></th>
                                    <td class="irisinsurances_physician_name_td_class"><input type="text" name="irisinsurances_physician_name" id="irisinsurances_physician_name" value="<?= get_post_meta($postid, 'irisinsurances_physician_name', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_physician_tel_td_header"><label for="irisinsurances_physician_tel">physician tel</label></th>
                                    <td class="irisinsurances_physician_tel_td_class"><input type="text" name="irisinsurances_physician_tel" id="irisinsurances_physician_tel" value="<?= get_post_meta($postid, 'irisinsurances_physician_tel', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_insurer_fullname_td_header"><label for="irisinsurances_insurer_fullname">insurer full name</label></th>
                                    <td class="irisinsurances_insurer_fullname_td_class"><input type="text" name="irisinsurances_insurer_fullname" id="irisinsurances_insurer_fullname" value="<?= get_post_meta($postid, 'irisinsurances_insurer_fullname', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_dob_td_header"><label for="irisinsurances_dob">date of birth</label></th>
                                    <td class="irisinsurances_dob_td_class">
<select name="irisinsurances_bday" id="irisinsurances_bday" class="day">
                <?php $bday = get_post_meta($postid, 'irisinsurances_bday', true);?>    
<?php if(!empty($bday)){?><option value='<?=$bday;?>' selectd><?=$bday;?></option><?php }?>   
<option value=''>Day</option>
<?php
for ($d = 1; $d <= 31; $d++) {    echo "<option value='$d'>$d</option>";}
?>
</select>
<select name="irisinsurances_bmonth" id="irisinsurances_bmonth" class="month">
<?php $bmonth = get_post_meta($postid, 'irisinsurances_bmonth', true);?>
<?php if(!empty($bmonth)){?><option value='<?=$bmonth;?>' selectd><?=$bmonth;?></option><?php }?>
<option value=''>Month</option>
<?php $months =  array('Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
foreach ($months as $month) {    echo "<option value='$month'>$month</option>";}
?>
</select>

<select name="irisinsurances_byear" id="irisinsurances_byear" class="year">
     <?php $byear = get_post_meta($postid, 'irisinsurances_byear', true);?>
<?php if(!empty($byear)){?><option value='<?=$byear;?>' selectd><?=$byear;?></option><?php }?>
<option value=''>Year</option>
<?php
for ($y = 2018; $y >= 1970; $y--) {    echo "<option value='$y'>$y</option>";}
?>
</select> 
                                        
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_mailing_addresss_td_header"><label for="irisinsurances_mailing_addresss">mailing addresss</label></th>
                                    <td class="irisinsurances_mailing_addresss_td_class"><textarea name="irisinsurances_mailing_addresss" id="irisinsurances_mailing_addresss" cols="60" rows="4"><?= get_post_meta($postid, 'irisinsurances_mailing_addresss', true); ?></textarea>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_city_td_header"><label for="irisinsurances_city">city</label></th>
                                    <td class="irisinsurances_city_td_class"><input type="text" name="irisinsurances_city" id="irisinsurances_city" value="<?= get_post_meta($postid, 'irisinsurances_city', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_state_td_header"><label for="irisinsurances_state">State</label></th>
                                    <td class="irisinsurances_state_td_class"><select name="irisinsurances_state" id="irisinsurances_state">
        <?php if ($state != "") { ?><option value="<?= $state; ?>" selected="selectd"><?= $state; ?></option><?php } ?>
        <?php include('inc/states.php'); ?>
        <?php foreach ($states as $state): ?><option value="<?= $state ?>"><?= $state ?></option><?php endforeach; ?>
                                        </select>
                                        </select><br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_postal_code_td_header"><label for="irisinsurances_postal_code">Postal Code</label></th>
                                    <td class="irisinsurances_postal_code_td_class"><input type="text" name="irisinsurances_postal_code" id="irisinsurances_postal_code" value="<?= get_post_meta($postid, 'irisinsurances_postal_code', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irisinsurances_email_td_header"><label for="irisinsurances_email">Email</label></th>
                                    <td class="irisinsurances_email_td_class"><input type="text" name="irisinsurances_email" id="irisinsurances_email" value="<?= get_post_meta($postid, 'irisinsurances_email', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr></tbody></table>    
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
                                <!--<input disabled="disabled" type="hidden" name="irisinsurances_register" value="<?= date("d-M-Y"); ?>">-->
                                <div class="" id="resp"></div><input type="hidden" name="postid" value="<?=$postid;?>"/></div>
                            <div class="col-md-2"><input class="btn button" type="submit" id="submit" name="submit" value="Save" /></div>
                        </div>

                    </form>     
                </div>
                <div class="col-md-2">&nbsp</div>
            </div>
            <div class="clearfix">&nbsp;</div>
        <?php
        get_template_part('partials/page/layout');
    endwhile;
}
?>
<?php //do_action( 'ocean_after_primary' );  ?>
</div><!-- #content-wrap -->
    
<script>

    $ = jQuery;
    var jq = $.noConflict();
    jq(document).ready(function () {

//       
        jq('#submit').click(function (e) {
            e.preventDefault();
            //       
<?php $process_insur = get_stylesheet_directory_uri() . '/process/process_upd_insur.php'; ?>

            jq.ajax({
                url: '<?= $process_insur; ?>',
                type: 'POST',

                data: jq("form").serialize(),
                success: function (res) {

                    //jq('#reg').find('#submit').prop('disabled', true);
                    //jq('#resp').addClass('text-success');
                    //jq('#resp').html(res);
//                       jq('html, body').animate({
//                       scrollTop:jq("#main").offset().top
//                       }, 1000);  
                    if (res == '0') {
                        jq('#resp').html('Please fill all fields');
                    } else if (res == '1') {
                        jq('#reg').find('#submit').prop('disabled', true);
                        jq('#resp').addClass('text-success');
                        jq('#resp').html('Insurance information updated.');
                        jq('#addMemb')[0].reset();
                        setTimeout(function () {
                            window.location.replace("<?= site_url() . '/irisinsurances' ?>");
                        }, 2000);
                    }


                },
                error: function (e) {

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
//}
?>
<?php get_footer(); ?>