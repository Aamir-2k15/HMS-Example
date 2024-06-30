<?php ob_start();
/**
 * Template Name: Login
 */

get_header();
$location = site_url().'/user-dashboard';
if (is_user_logged_in()) {
   ?>
    <script>window.location.replace("<?=$location?>");</script>
<?php }
?>	<?php //do_action( 'ocean_before_content_wrap' );  ?>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
    <?php
    // Elementor `single` location
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('single')) {
        // Start loop
        while (have_posts()) : the_post();
            ?>        
            <style>h1.page-header-title.clr {color: #000 !important;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
                .sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
     #submit{ float: right; position: relative; right: -15%;}#resp {    font-size: 16px;font-family: Arial;}
            </style><?php include_once('css.php'); ?>
            <div class="row">
                <div class="col-md-4">&nbsp</div>
                <div class="col-md-4">
                        <?php
$err_msg = "";
if (isset($_POST["user_email"]) && isset($_POST["user_password"])) {
$user_login = esc_attr($_POST["user_email"]);
$user_password = esc_attr($_POST["user_password"]);
$user_email = esc_attr($_POST["user_email"]);

$user_data = array(
'user_login' => $user_login,
'user_pass' => $user_password,
'user_email' => $user_email
);

// Inserting new user to the db
//wp_insert_user( $user_data );

$creds = array();
$creds['user_login'] = $user_login;
$creds['user_password'] = $user_password;
$creds['remember'] = true;

$user = wp_signon($creds, false);
@$userID = $user->ID;
if ($userID) {
    wp_set_current_user($userID, $user_login);
wp_set_auth_cookie($userID, true, false);
do_action('wp_login', $user_login);?>
                    <script>window.location.replace("<?=$location?>");</script>
<?php
} else {
    $err_msg = "Invalid Email and/or Password!";
}
if (is_user_logged_in()):
global $current_user;
wp_get_current_user();
wp_redirect($location);
endif;
}
?>
<p class="text-danger text-center"><?=$err_msg;?></p>
<form class="form-signin" name="login" action="" method="post">
<div class="form-label-group" iaccinput="">
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="user_email" required="" autofocus="">
</div>
<br>
<div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" name="user_password" placeholder="Password" required="">
</div>
<br>
<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
</form>     
                </div>
                <div class="col-md-4">&nbsp</div>
            </div>
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