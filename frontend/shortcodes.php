<?php 
/*******************************************
 * REGISTRATION SHORTCODE
 * *****************************************/

add_shortcode('hms_register', 'hms_register_cb');

function hms_register_cb(){
    
    hms_redirect_logged_in_user();

     ob_start();
    ?>
<div class="row" id="hms-registration-div">
    <div class="col-md-2">&nbsp</div>
    <div class="col-md-8">
        <form action="#" method="post" id="registration-form">
            <h2 class="sec-title">REGISTRATION</h2>
            <?php wp_nonce_field('hms_register_nonce', 'hms_register_nonce'); ?>
            <hr />
            <div class="" id="response-div"></div>
            <div class="">&nbsp</div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="first_name">Your name <span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" id="first_name" name="first_name" Placeholder="First name"
                        required="required" />
                </div>

                <div class="col-md-4">
                    <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last name"
                        required="required" />
                </div>
            </div>


            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="address">Address <span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <textarea id="address" name="address" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="city">city
                        <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="city" name="city" required="required" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="state">state <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="col-md-8">
                    <select name="state" id="state" style="width:100%;" class="" required="required">
                        <option value="">Select</option>
                        <?php $states= us_states();?>
                        <?php foreach($states as $state):?><option value="<?php echo $state?>"><?php echo $state?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label class="control-label text-right" for="date_of_birth">Date of Birth: <span
                            class="text-danger">*</span></label></div>
                <div class="col-md-8">

                    <input type="date" name="date_of_birth" value="" dateformat="dd-mm-yyyy" required="required" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="contact">Contact No.<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-8"><input class="form-control" type="text" id="contact" name="contact"
                        required="required" /></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label class="control-label text-right" for="male">Gender:</label></div>
                <div class="col-md-8">
                    <label class="radio-inline">
                        <input type="radio" class="" id="male" value="male" name="gender" required="required">
                        Male</label>
                    &nbsp;&nbsp;
                    <label class="radio-inline">
                        <input type="radio" class="" id="female" value="female" name="gender" required="required">
                        Female</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label class="control-label text-right" for="relationship">Relationship to Member
                        <span class="text-danger">*</span></label></div>
                <div class="col-md-8">
                    <select name="relationship" id="relationship" required="required">
                        <option value="">---Select---</option>
                        <?php $relationships= relationship_to_member();?>
                        <?php foreach($relationships as $relationship):?><option value="<?php echo $relationship?>">
                            <?php echo $relationship?></option><?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label class="control-label text-right" for="work_no">Work No.</label></div>
                <div class="col-md-8"><input class="form-control" type="text" id="work_no" name="work_no"
                        required="required" /></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label class="control-label text-right" for="user_email">Email <span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" type="email" id="user_email" name="user_email" required="required" />
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-4"><label class="control-label text-right" for="user_password">Password <span
                            class="text-danger">*</span></label></div>
                <div class="col-md-8"><input class="form-control" type="password" id="user_password"
                        name="user_password" required="required" /></div>
            </div>

            <div class="form-group row">
                <div class="col-md-4"></div>
                <div class="col-md-8"></div>
            </div>

            <div class="form-group row p-4">
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-2"><a class="" id="loginLink" href="<?php echo site_url()?>/login"><input
                            id="reg_btn" type="button" class="btn button login" value="Members Login Here" /></a></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <button class="btn button" type="button" id="submit_register" name="submit_register"> Register
                    </button>
                </div>
            </div>

        </form>
    </div>
    <div class="col-md-2">&nbsp</div>
</div>

<script>
$("#submit_register").on("click", function(event) {
    event.preventDefault();

    // Clear previous response
    $("#response-div").empty();

    // Validation
    var isValid = true;

    // Check required fields
    $("input[required], select[required], textarea[required]").each(function() {
        var $this = $(this);
        $this.next('.error-message').remove(); // Remove any existing error messages

        if ($this.val() === "") {
            $this.addClass("error");
            $this.after('<span class="error-message">This field is required.</span>');
            isValid = false;
        } else {
            $this.removeClass("error");
        }
    });

    // Check gender radio buttons
    var genderChecked = $("input[name='gender']:checked").length > 0;
    if (!genderChecked) {
        $("input[name='gender']").last().closest('label').after(
            '<br><span class="error-message">This field is required.</span>');
        isValid = false;
    } else {
        $("input[name='gender']").closest('label').next('.error-message').remove();
    }

    // Email validation
    var email = $("#user_email").val();
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        $("#user_email").addClass('error');
        $("#user_email").after('<span class="error-message">Please enter a valid email address.</span>');
        isValid = false;
    } else {
        $("#user_email").removeClass('error');
        $("#user_email").next('.error-message').remove();
    }

    if (isValid) {
        let ajax_url = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
        var formData = $("#registration-form").serialize();
        var ajaxurl = ajax_url + '?action=hms_register';
        // AJAX request
        $.ajax({
            url: ajaxurl, // WordPress-specific global variable
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log(response.message);
                $("#response-div").html(response.message);
                $('html, body').animate({
                    scrollTop: $("#hms-registration-div").offset().top
                }, 1000);
                $('#registration-form').trigger("reset");
            },
            error: function(xhr, status, error) {
                $("#response-div").html("An error occurred: " + error).addClass('error-message');
            }
        });
    } else {
        $("#response-div").html("Please fill out all required fields correctly.").addClass('error-message');
        $('html, body').animate({
            scrollTop: $("#hms-registration-div").offset().top
        }, 1000);
    }
});
</script>
<?php
    $html = ob_get_clean();
    return $html;
}



/*******************************************
 * DASHBOARD SHORTCODE
 * *****************************************/
 add_shortcode('hms_dashboard', 'hms_dashboard_cb');

function hms_dashboard_cb(){
    ob_start();
    hms_redirect_non_logged_in();
    ?>
<section id="hms-dashboard" class="">

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="box"><a href='<?=site_url()?>/update-profile'> <i class="fa fa-user"></i> Your Profile</a>
                </div>
            </div>


            <div class="col-md-3">
                <div class="box"><a href='<?=site_url()?>/irismembers'> <i class="fa fa-users"></i> Members</a></div>
            </div>

            <div class="col-md-3">
                <div class="box"><a href='<?=site_url()?>/iriscontacts'> <i class="fa fa-tag"></i> Contacts</a></div>
            </div>


            <div class="col-md-3">
                <div class="box"><a href='<?=site_url()?>/irisinsurances'> <i class="fa fa-file-alt"></i> Insurance </a>
                </div>
            </div>

        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
    </div>
</section>

<div class="clearfix">&nbsp;</div>
<?php
    $html = ob_get_clean();
    return $html;
}

/*******************************************
 * LOGIN SHORTCODE
 * *****************************************/
add_shortcode('hms_login', 'hms_login_cb');

function hms_login_cb(){ 
    ob_start();
    hms_redirect_non_logged_in();
    ?>
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
        <script>
        window.location.replace("<?=$location?>");
        </script>
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
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="user_email"
                    required="" autofocus="">
            </div>
            <br>
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="user_password"
                    placeholder="Password" required="">
            </div>
            <br>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
        </form>
    </div>
    <div class="col-md-4">&nbsp</div>
</div>
<div class="clearfix">&nbsp;</div>
<?php 
    $html = ob_get_clean();
    return $html;
}

/*******************************************
* LOGOUT SHORTCODE
* *****************************************/
 add_shortcode('hms_logout', 'hms_logout_cb');

function hms_logout_cb(){
    ob_start();
    // hms_redirect_non_logged_in();
    wp_logout();
    ?>
    <script>
    window.location.replace("<?=site_url()?>");
    </script>
    <?php
    $html = ob_get_clean();
    return $html;
}

/*******************************************
* FORGOT PASSWORD SHORTCODE(With password reset link in email)
* *****************************************/

add_shortcode('hms_forgot_password', 'hms_forgot_password_cb');

function hms_forgot_password_cb(){
    ob_start();
    hms_redirect_non_logged_in();
    ?>
 
    <?php
    $html = ob_get_clean();
    return $html;
}
/*******************************************
* USER ACTIVATION SHORTCODE
* *****************************************/

add_shortcode('hms_activate', 'hms_activate_cb');

function hms_activate_cb(){
    ob_start();
    hms_redirect_non_logged_in();
    ?>
 
    <?php
    $html = ob_get_clean();
    return $html;
}