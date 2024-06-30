<?php ob_start();
/* 
 * Template Name: User Dashboard 
 * */
get_header();

if (!is_user_logged_in()) {
    $location = site_url().'/login';
    wp_redirect($location);}
?>	<?php //do_action( 'ocean_before_content_wrap' ); 
global $current_user; ?>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
    <?php
    // Elementor `single` location
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('single')) {
        // Start loop
        while (have_posts()) : the_post(); ?>        
<style>h1.page-header-title.clr {color: #000 !important;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
    .sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
.box {
    background: linear-gradient(to bottom right, #ececec 0%, #efefef 100%);
    border: 1px solid #DEDEDE;    padding: 100px 15px;    font-size: 25px;    border-radius: 5px;    text-align: center;}
</style>       
<?php include_once('css.php');?>
<section id="login" class="">
            <div class="container">
                <div class="row">

                <div class="col-md-3"><div class="box"><a href='<?=site_url()?>/update-profile'> <i class="fa fa-user"></i> Your Profile</a></div></div>


                <div class="col-md-3"><div class="box"><a href='<?=site_url()?>/irismembers'> <i class="fa fa-users"></i>  Members</a></div></div>


                <div class="col-md-3"><div class="box"><a href='<?=site_url()?>/iriscontacts'> <i class="fa fa-tag"></i>  Contacts</a></div></div>


                <div class="col-md-3"><div class="box"><a href='<?=site_url()?>/irisinsurances'>  <i class="fa fa-file-alt"></i> Insurance </a></div></div>
                    
                </div>
                <div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div>
            </div>
        </section>

            <div class="clearfix">&nbsp;</div>
            <?php
            get_template_part('partials/page/layout');
        endwhile;
    }
    ?>
<?php //do_action( 'ocean_after_primary' ); ?>
</div><!-- #content-wrap -->

<?php //do_action( 'ocean_after_content_wrap' );  ?>

<?php get_footer(); ?>