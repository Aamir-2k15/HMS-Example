<?php
ob_start();
/**
 * Template Name: Update Member
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
//         $meta = get_post_meta($postid);
//         print_r($meta);
//         exit();
            ?>        
            <style>h1.page-header-title.clr {color: #000 !important;} body{    font-family: "ABeeZee";    font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
                .sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
                textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
                #resp {    font-size: 17px;font-family: Arial;font-weight:bold;color: #604300;}#irismembers_photo_btn {color: #FFF;background:#000;border: 1px solid    #000;    border-radius: 4px;}
            </style><?php include_once('css.php'); ?>
            <div class="row">
                <div class="col-md-2"><a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a></div>
                <div class="col-md-8"><form action="#" method="post" id="updMemb">
                        <h2 class="sec-title">UPDATING <?= get_post_meta($postid, 'irismembers_member_name', true); ?>'s Profile</h2>

                        <hr/>

                        <div class="">&nbsp</div>

                        <!--INIT-->
        <?php echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />'; ?>
                        <table class="form-table"><tbody><tr>
                                    <th class="irismembers_member_name_td_header"><label for="irismembers_member_name">Member Name</label></th>
                                    <td class="irismembers_member_name_td_class"><input type="text" disabled="disabled" name="" id="irismembers_member_name" value="<?= get_post_meta($postid, 'irismembers_member_name', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_address_td_header"><label for="irismembers_address">Address</label></th>
                                    <td class="irismembers_address_td_class"><textarea name="irismembers_address" id="irismembers_address" cols="60" rows="4"><?= get_post_meta($postid, 'irismembers_address', true) ?></textarea>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_city_td_header"><label for="irismembers_city">City</label></th>
                                    <td class="irismembers_city_td_class"><input type="text" name="irismembers_city" id="irismembers_city" value="<?= get_post_meta($postid, 'irismembers_city', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_state_td_header"><label for="irismembers_state">State</label></th>
                                    <td class="irismembers_state_td_class"><select name="irismembers_state" id="irismembers_state"><?php $state = get_post_meta($postid, 'irismembers_state', true); ?> <?php if ($state != "") { ?><option value="<?= $state; ?>" selected="selectd"><?= $state; ?></option><?php } ?>  
        <?php include('inc/states.php'); ?> <?php foreach ($states as $state): ?><option value="<?= $state ?>"><?= $state ?></option><?php endforeach; ?>
                                        </select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_postal_code_td_header"><label for="irismembers_postal_code">Postal Code</label></th>
                                    <td class="irismembers_postal_code_td_class"><input type="text" name="irismembers_postal_code" id="irismembers_postal_code" value="<?= get_post_meta($postid, 'irismembers_postal_code', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_dob_td_header"><label for="irismembers_dob">Date of Birth</label></th>
                                    <td class="irismembers_dob_td_class">
                                        <select name="irismembers_bday" id="irismembers_bday" class="day">
        <?php $bday = get_post_meta($postid, 'irismembers_bday', true); ?>    
                                            <?php if (!empty($bday)) { ?><option value='<?= $bday; ?>' selectd><?= $bday; ?></option><?php } ?>       
                                            <option value=''>Day</option>

        <?php for ($d = 1; $d <= 31; $d++) {
            echo "<option value='$d'>$d</option>";
        } ?>
                                        </select>
                                        <select name="irismembers_bmonth" id="irismembers_bmonth" class="month">
                                            <?php $bmonth = get_post_meta($postid, 'irismembers_bmonth', true); ?>
                                            <?php if (!empty($bmonth)) { ?><option value='<?= $bmonth; ?>' selectd><?= $bmonth; ?></option><?php } ?>
                                            <option value=''>Month</option>              
        <?php
        $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        foreach ($months as $month) {
            echo "<option value='$month'>$month</option>";
        }
        ?>
                                        </select>

                                        <select name="irismembers_byear" id="irismembers_byear" class="year">
        <?php $byear = get_post_meta($postid, 'irismembers_byear', true); ?>
        <?php if (!empty($byear)) { ?><option value='<?= $byear; ?>' selectd><?= $byear; ?></option><?php } ?>
                                            <option value=''>Year</option>
        <?php
        for ($y = 2018; $y >= 1970; $y--) {
            echo "<option value='$y'>$y</option>";
        }
        ?>
                                        </select>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_gender_td_header"><label for="irismembers_gender">Gender</label></th>
                                    <td class="irismembers_gender_td_class"><select name="irismembers_gender" id="irismembers_gender"><?php $g = get_post_meta($postid, 'irismembers_gender', true) ?><option value="M" <?= $g == 'M' ? 'selected="selected"' : '' ?>>Male</option><option value="F" <?= $g == 'F' ? 'selected="selected"' : '' ?>>Female</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_email_td_header"><label for="irismembers_email">Email</label></th>
                                    <td class="irismembers_email_td_class"><input type="text" name="irismembers_email" id="irismembers_email" value="<?= get_post_meta($postid, 'irismembers_email', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_home_number_td_header"><label for="irismembers_home_number">Home #</label></th>
                                    <td class="irismembers_home_number_td_class"><input type="text" name="irismembers_home_number" id="irismembers_home_number" value="<?= get_post_meta($postid, 'irismembers_home_number', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_cell_number_td_header"><label for="irismembers_cell_number">Cell #</label></th>
                                    <td class="irismembers_cell_number_td_class"><input type="text" name="irismembers_cell_number" id="irismembers_cell_number" value="<?= get_post_meta($postid, 'irismembers_cell_number', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_weight_lb_kg_td_header"><label for="irismembers_weight_lb_kg">Weight (lbs/kg)</label></th>
                                    <td class="irismembers_weight_lb_kg_td_class"><input type="text" name="irismembers_weight_lb_kg" id="irismembers_weight_lb_kg" value="<?= get_post_meta($postid, 'irismembers_weight_lb_kg', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_height_inches_cm_td_header"><label for="irismembers_height_inches_cm">Height (inches/cm)</label></th>
                                    <td class="irismembers_height_inches_cm_td_class"><input type="text" name="irismembers_height_inches_cm" id="irismembers_height_inches_cm" value="<?= get_post_meta($postid, 'irismembers_height_inches_cm', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_race_td_header"><label for="irismembers_race">Race</label></th>
                                    <td class="irismembers_race_td_class"><input type="text" name="irismembers_race" id="irismembers_race" value="<?= get_post_meta($postid, 'irismembers_race', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_member_questions_td_header"><label for="irismembers_member_questions">Member's Questions:</label></th>
                                    <td class="irismembers_member_questions_td_class"></td></tr><tr>
                                    <th class="irismembers_language_capability_td_header"><label for="irismembers_language_capability">What is their Language Capability</label></th>
                                    <td class="irismembers_language_capability_td_class"><select name="irismembers_language_capability" id="irismembers_language_capability"><option value="">Select</option> <?php $lc = get_post_meta($postid, 'irismembers_language_capability', true); ?> <?php if ($lc != "") { ?><option value="<?= $lc; ?>" selected="selectd"><?= $lc; ?></option><?php } ?> <option value="NONVERBAL">Non-Verbal</option><option value="NONVERBALSIGN">Non-Verbal Uses Sign</option><option value="VERDIFF">Verbal with Difficulty</option><option value="VERDIFFOUT">Verbal without Difficulty</option><option value="NONVERSTRESS">Non-Verbal when Stressed</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="sound_sesitivity_td_header"><label for="sound_sesitivity">Are they Sensitive to Sound? If so what Kind?</label></th>
                                    <td class="sound_sesitivity_td_class"><select name="sound_sesitivity" id="sound_sensitivity"><option value="">Select</option> <?php $ss = get_post_meta($postid, 'sound_sensitivity', true); ?> <option value="yes" <?= $ss == 'yes' ? 'selected="seleceted"' : '' ?>>Yes</option><option value="no" <?= $ss == 'no' ? 'selected="seleceted"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="whats_our_diagnosis_td_header"><label for="whats_our_diagnosis">What is your Diagnosis?:</label></th>
                                    <td class="whats_our_diagnosis_td_class"><select name="whats_our_diagnosis[]" id="whats_our_diagnosis" multiple="">  <?php $diag = get_post_meta($postid, 'whats_our_diagnosis', true); ?>       
                                            <option value="Alzheimers" <?php if (!empty($diag)) {
            echo in_array('Alzheimers', $diag) ? 'selected="selected"' : '';
        } ?>>Alzheimers</option>
                                            <option value="Amylotropic Sclerosis ALS" <?php if (!empty($diag)) echo in_array('Amylotropic Sclerosis ALS', $diag) ? 'selected="selected"' : '' ?>>Amylotropic Sclerosis ALS</option>
                                            <option value="Anxiety" <?php if (!empty($diag)) echo in_array('Anxiety', $diag) ? 'selected="selected"' : '' ?>>Anxiety</option>
                                            <option value="Aspergers" <?php if (!empty($diag)) echo in_array('Aspergers', $diag) ? 'selected="selected"' : '' ?>>Aspergers</option>
                                            <option value="Ataxia" <?php if (!empty($diag)) echo in_array('Ataxia', $diag) ? 'selected="selected"' : '' ?>>Ataxia</option>
                                            <option value="Autism High Functioning" <?php if (!empty($diag)) echo in_array('Autism High Functioning', $diag) ? 'selected="selected"' : '' ?>>Autism High Functioning</option>
                                            <option value="Autism Low Functioning" <?php if (!empty($diag)) echo in_array('Autism Low Functioning', $diag) ? 'selected="selected"' : '' ?>>Autism Low Functioning</option>
                                            <option value="Bipolar" <?php if (!empty($diag)) echo in_array('Bipolar', $diag) ? 'selected="selected"' : '' ?>>Bipolar</option>
                                            <option value="Brain Injury" <?php if (!empty($diag)) echo in_array('Brain Injury', $diag) ? 'selected="selected"' : '' ?>>Brain Injury</option>
                                            <option value="Cerebral Palsy" <?php if (!empty($diag)) echo in_array('Cerebral Palsy', $diag) ? 'selected="selected"' : '' ?>>Cerebral Palsy</option>
                                            <option value="Dementia" <?php if (!empty($diag)) echo in_array('Dementia', $diag) ? 'selected="selected"' : '' ?>>Dementia</option>
                                            <option value="Down’s Syndrome" <?php if (!empty($diag)) echo in_array('Down’s Syndrome', $diag) ? 'selected="selected"' : '' ?>>Down’s Syndrome</option>
                                            <option value="Huntington’s Disease" <?php if (!empty($diag)) echo in_array('Huntington’s Disease', $diag) ? 'selected="selected"' : '' ?>>Huntington’s Disease</option>
                                            <option value="Multiple Sclerosis" <?php if (!empty($diag)) echo in_array('Multiple Sclerosis', $diag) ? 'selected="selected"' : '' ?>>Multiple Sclerosis</option>
                                            <option value="Obsessive Compulsive Disorder" <?php if (!empty($diag)) echo in_array('Obsessive Compulsive Disorder', $diag) ? 'selected="selected"' : '' ?>>Obsessive Compulsive Disorder</option>
                                            <option value="Oppositional Defiant Disorder" <?php if (!empty($diag)) echo in_array('Oppositional Defiant Disorder', $diag) ? 'selected="selected"' : '' ?>>Oppositional Defiant Disorder</option>
                                            <option value="Other" <?php if (!empty($diag)) echo in_array('Other', $diag) ? 'selected="selected"' : '' ?>>Other</option>
                                            <option value="Parkinson’s Disease" <?php if (!empty($diag)) echo in_array('Parkinson’s Disease', $diag) ? 'selected="selected"' : '' ?>>Parkinson’s Disease</option>
                                            <option value="Persuasive Developmental Delay" <?php if (!empty($diag)) echo in_array('Persuasive Developmental Delay', $diag) ? 'selected="selected"' : '' ?>>Persuasive Developmental Delay</option>
                                            <option value="Post Traumatic Stress Disorder" <?php if (!empty($diag)) echo in_array('Post Traumatic Stress Disorder', $diag) ? 'selected="selected"' : '' ?>>Post Traumatic Stress Disorder</option>
                                            <option value="Stroke" <?php if (!empty($diag)) echo in_array('Stroke', $diag) ? 'selected="selected"' : '' ?>>Stroke</option>
                                            <option value="Touretts" <?php if (!empty($diag)) {
            echo in_array('Touretts', $diag) ? 'selected="selected"' : '';
        } ?>>Touretts</option>
                                        </select><br><span class="description">Please Select the Diagnosis from List: For Mac/Window users: Hold the command/Ctrl Key down</span></td></tr><tr>
                                    <th class="sensitive_to_touch_td_header"><label for="sensitive_to_touch">Sensitive to Touch</label></th>
                                    <td class="sensitive_to_touch_td_class"><select name="sensitive_to_touch" id="sensitive_to_touch"><?php $sensi_touch = get_post_meta($postid, 'sensitive_to_touch', true) ?><option value="">Select</option><option value="yes" <?= ($sensi_touch == 'yes') ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= ($sensi_touch == 'no') ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="sensitive_to_taste_td_header"><label for="sensitive_to_taste">Sensitive to Taste</label></th>
                                    <td class="sensitive_to_taste_td_class"><select name="sensitive_to_taste" id="sensitive_to_taste"><?php $sensi_taste = get_post_meta($postid, 'sensitive_to_taste', true) ?><option value="">Select</option><option value="yes" <?= ($sensi_taste == 'yes') ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= ($sensi_taste == 'no') ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="indicate_tracking_device_td_header"><label for="indicate_tracking_device">Do they Have a Tracking Device. If Yes Please Indicate Device Type:</label></th>
                                    <td class="indicate_tracking_device_td_class"><select name="indicate_tracking_device" id="indicate_tracking_device"><?php $tdev = get_post_meta($postid, 'indicate_tracking_device', true) ?><option value="">Select</option><option value="yes" <?= ($tdev == 'yes') ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= ($tdev == 'no') ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="are_they_toilet_trained_td_header"><label for="are_they_toilet_trained">Are they Toilet Trained</label></th>
                                    <td class="are_they_toilet_trained_td_class"><select name="are_they_toilet_trained" id="are_they_toilet_trained"><?php $tt = get_post_meta($postid, 'are_they_toilet_trained', true) ?><option value="">Select</option><option value="yes" <?= ($tt == 'yes') ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= ($tt == 'no') ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="indicate_other_diagnosis_td_header"><label for="indicate_other_diagnosis">If Other Diagnosis Please indicate:</label></th>
                                    <td class="indicate_other_diagnosis_td_class"><textarea name="indicate_other_diagnosis" id="indicate_other_diagnosis" cols="60" rows="4"><?= get_post_meta($postid, 'indicate_other_diagnosis', true) ?></textarea>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="strategies_to_decrease_sr_td_header"><label for="strategies_to_decrease_sr">Are there Strategies that Decrease the Stressful Reactions</label></th>
                                    <td class="strategies_to_decrease_sr_td_class"><select name="strategies_to_decrease_sr" id="strategies_to_decrease_sr"><?php $strategies = get_post_meta($postid, 'strategies_to_decrease_sr', true) ?><option value="">Select</option><option value="yes" <?= ($strategies == 'yes') ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= ($strategies == 'no') ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_prescriber_name_number_td_header"><label for="irismembers_prescriber_name_number">What is their Prescribers Name and #:</label></th>
                                    <td class="irismembers_prescriber_name_number_td_class"><input type="text" name="irismembers_prescriber_name_number" id="irismembers_prescriber_name_number" value="<?= get_post_meta($postid, 'irismembers_prescriber_name_number', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="iq_delay_degree_td_header"><label for="iq_delay_degree">Are there Cognitive (IQ) delay? If so what Degree?</label></th>
                                    <td class="iq_delay_degree_td_class"><select name="iq_delay_degree" id="iq_delay_degree"><option value="">Select</option> <option value="<?= get_post_meta($postid, 'iq_delay_degree', true) ?>" selected="selected"><?= get_post_meta($postid, 'iq_delay_degree', true) ?></option> <option value="UNKNOWN">Unknown</option><option value="LESS60">Less than 60</option><option value="G60LES100">60 and Less than 100</option><option value="GREATER100">Greater Than 100</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="if_on_medications_td_header"><label for="if_on_medications">Are they on Medications: If so please indicate:</label></th>
                                    <td class="if_on_medications_td_class"><select name="if_on_medications" id="if_on_medications"><option value="">Select</option><?php $medic = get_post_meta($postid, 'if_on_medications', true) ?><option value="yes" <?= $medic == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $medic == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="if_behavioral_issues_td_header"><label for="if_behavioral_issues">Are there Behavioral Issues? If Yes Please Explain:</label></th>
                                    <td class="if_behavioral_issues_td_class"><select name="if_behavioral_issues" id="if_behavioral_issues"><?php $behav_is = get_post_meta($postid, 'if_behavioral_issues', true) ?><option value="">Select</option><option value="yes" <?= $behav_is == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $behav_is == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_allergies_list_td_header"><label for="irismembers_allergies_list">What allergies do they have?:</label></th>
                                    <td class="irismembers_allergies_list_td_class"><input type="text" name="irismembers_allergies_list" id="irismembers_allergies_list" value="<?= get_post_meta($postid, 'irismembers_allergies_list', true) ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="wander_elope_td_header"><label for="wander_elope">Do they Wander or Elope?</label></th>
                                    <td class="wander_elope_td_class"><select name="wander_elope" id="wander_elope"><?php $w_e = get_post_meta($postid, 'wander_elope', true) ?><option value="">Select</option><option value="yes" <?= $w_e == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $w_e == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="self_danger_or_others_td_header"><label for="self_danger_or_others">Are there in Danger to Self and Others?If Yes PLease Explain:</label></th>
                                    <td class="self_danger_or_others_td_class"><select name="self_danger_or_others" id="self_danger_or_others"><?php $dang = get_post_meta($postid, 'self_danger_or_others', true) ?><option value="">Select</option><option value="yes" <?= $dang == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $dang == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="combative_when_stressed_td_header"><label for="combative_when_stressed">Do they become Combative when Stressed?:</label></th>
                                    <td class="combative_when_stressed_td_class"><select name="combative_when_stressed" id="combative_when_stressed"><?php $cws = get_post_meta($postid, 'combative_when_stressed', true) ?><option value="select">Select</option><option value="yes" <?= $cws == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $cws == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="living_arrangements_td_header"><label for="living_arrangements">What type of Living Arrangement Are They In:</label></th>
                                    <td class="living_arrangements_td_class"><textarea name="living_arrangements" id="living_arrangements" cols="60" rows="4"><?= get_post_meta($postid, 'living_arrangements', true) ?></textarea>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="seizure_disorder_td_header"><label for="seizure_disorder">Is there a Seizure Disorder?</label></th>
                                    <td class="seizure_disorder_td_class"><select name="seizure_disorder" id="seizure_disorder"><?php $sd = get_post_meta($postid, 'seizure_disorder', true); ?><option value="">Select</option><option value="yes" <?= $sd == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $sd == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="behavioral_conditions_and_triggers_td_header"><label for="behavioral_conditions_and_triggers">Are there Behavioral Conditions and Triggers:</label></th>
                                    <td class="behavioral_conditions_and_triggers_td_class"><select name="behavioral_conditions_and_triggers" id="behavioral_conditions_and_triggers"><?php $bct = get_post_meta($postid, 'behavioral_conditions_and_triggers', true); ?><option value="">Select</option><option value="yes" <?= $bct == 'yes' ? 'selected="selected"' : '' ?>>Yes</option><option value="no" <?= $bct == 'no' ? 'selected="selected"' : '' ?>>No</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="typical_response_being_approached_td_header"><label for="typical_response_being_approached">Typical Response to being Approached?</label></th>
                                    <td class="typical_response_being_approached_td_class"><select name="typical_response_being_approached" id="typical_response_being_approached"><option value="">Select</option> <option value="<?= get_post_meta($postid, 'typical_response_being_approached', true) ?>" selected="selected"><?= get_post_meta($postid, 'typical_response_being_approached', true) ?></option> <option value="COOP">Cooperative</option><option value="UNCOOP">Un-Cooperative</option><option value="WITHDRAWN">Withdrawn</option><option value="COMABT">Combative</option><option value="LOUD">Loud</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="anything_else_for_responder_td_header"><label for="anything_else_for_responder">Is there Anything an Emergency Responder Should Know?</label></th>
                                    <td class="anything_else_for_responder_td_class"><textarea name="anything_else_for_responder" id="anything_else_for_responder" cols="60" rows="4"><?= get_post_meta($postid, 'anything_else_for_responder', true); ?></textarea>
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="how_did_you_hear_td_header"><label for="how_did_you_hear">How Did You Hear About Us?</label></th>
                                    <td class="how_did_you_hear_td_class"><select name="how_did_you_hear" id="how_did_you_hear"><option value="">Select</option> <option value="<?= get_post_meta($postid, 'how_did_you_hear', true) ?>" selected="selected"><?= get_post_meta($postid, 'how_did_you_hear', true) ?></option> <option value="Website">Website</option><option value="Google">Google</option><option value="Advertising">Advertising</option><option value="Friend">Friend</option><option value="Relative">Relative</option><option value="Other">Other - Please Indicate</option></select><br><span class="description"></span></td></tr>

                            </tbody></table>
                        <h3 class="section-heading">Nearest Police Department:</h3>
                        <table class="form-table table-2"><tbody> 

                                <tr>
                                    <th class="irismembers_police_department_name_td_header"><label for="irismembers_police_department_name">Name</label></th>
                                    <td class="irismembers_police_department_name_td_class"><input type="text" name="irismembers_police_department_name" id="irismembers_police_department_name" value="<?= get_post_meta($postid, 'irismembers_police_department_name', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_police_department_city_td_header"><label for="irismembers_police_department_city">City</label></th>
                                    <td class="irismembers_police_department_city_td_class"><input type="text" name="irismembers_police_department_city" id="irismembers_police_department_city" value="<?= get_post_meta($postid, 'irismembers_police_department_city', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_police_department_state_td_header"><label for="irismembers_police_department_state">State</label></th>
                                    <td class="irismembers_police_department_state_td_class"><select name="irismembers_police_department_state" id="irismembers_police_department_state">
                                            <option value="<?= get_post_meta($postid, 'irismembers_police_department_state', true); ?>" selected="selected"><?= get_post_meta($postid, 'irismembers_police_department_state', true); ?></option> 
        <?php foreach ($states as $state): ?><option value="<?= $state ?>"><?= $state ?></option><?php endforeach; ?>    
                                        </select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_police_department_county_td_header"><label for="irismembers_police_department_county">County</label></th>
                                    <td class="irismembers_police_department_county_td_class"><input type="text" name="irismembers_police_department_county" id="irismembers_police_department_county" value="<?= get_post_meta($postid, 'irismembers_police_department_county', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_police_department_phone_td_header"><label for="irismembers_police_department_phone">Phone#</label></th>
                                    <td class="irismembers_police_department_phone_td_class"><input type="text" name="irismembers_police_department_phone" id="irismembers_police_department_phone" value="<?= get_post_meta($postid, 'irismembers_police_department_phone', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr>
                            </tbody></table>
                        <h3 class="section-heading">Nearest Fire / Rescue Department:</h3>
                        <table class="form-table table-2"><tbody> 
                                <tr>
                                    <th class="irismembers_rescue_department_name_td_header"><label for="irismembers_rescue_department_name">Name</label></th>
                                    <td class="irismembers_rescue_department_name_td_class"><input type="text" name="irismembers_rescue_department_name" id="irismembers_rescue_department_name" value="<?= get_post_meta($postid, 'irismembers_rescue_department_name', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_rescue_department_city_td_header"><label for="irismembers_rescue_department_city">City</label></th>
                                    <td class="irismembers_rescue_department_city_td_class"><input type="text" name="irismembers_rescue_department_city" id="irismembers_rescue_department_city" value="<?= get_post_meta($postid, 'irismembers_rescue_department_city', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_rescue_department_state_td_header"><label for="irismembers_rescue_department_state">State</label></th>
                                    <td class="irismembers_rescue_department_state_td_class"><select name="irismembers_rescue_department_state" id="irismembers_rescue_department_state"><option value="<?= get_post_meta($postid, 'irismembers_rescue_department_state', true); ?>" selected="selected"><?= get_post_meta($postid, 'irismembers_rescue_department_state', true); ?></option> <option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select><br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_rescue_department_county_td_header"><label for="irismembers_rescue_department_county">County</label></th>
                                    <td class="irismembers_rescue_department_county_td_class"><input type="text" name="irismembers_rescue_department_county" id="irismembers_rescue_department_county" value="<?= get_post_meta($postid, 'irismembers_rescue_department_county', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr><tr>
                                    <th class="irismembers_rescue_department_phone_td_header"><label for="irismembers_rescue_department_phone">Phone#</label></th>
                                    <td class="irismembers_rescue_department_phone_td_class"><input type="text" name="irismembers_rescue_department_phone" id="irismembers_rescue_department_phone" value="<?= get_post_meta($postid, 'irismembers_rescue_department_phone', true); ?>" size="30">
                                        <br><span class="description"></span></td></tr>
                            </tbody></table>
                        <h3 class="section-heading">Upload Member Photo:</h3>
                        <table class="form-table table-2"><tbody> 
                                <tr>
                                    <td>
                                        <label for="irismembers_logo">Select Logo:<span class="text-danger">*</span>
                                    </td>
                                    <td><?php $ml = get_post_meta($postid, 'irismembers_logo', true); ?>
                                        <select name="irismembers_logo" id="irismembers_logo">
                                            <option value="">Select</option>
                                            <option value="BraininHand" <?=$ml=='BraininHand'?'selected="selected"':''?>>Brain in Hand</option>
                                            <option value="PuzzlePiece" <?=$ml=='PuzzlePiece'?'selected="selected"':''?>>Puzzle Piece Logo</option>
                                        </select>
                                        <?php $mli = site_url().'/wp-content/'.$ml.'.png'?>
                                        <img id="irismembers_logo_img" src="<?=($ml !=""?$mli:'');?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="irismembers_photo_upload_td_header"><label for="irismembers_photo_upload">Upload Photo:</label></th>
                                    <td class="irismembers_photo_upload_td_class">
                                        <input type="file" name="irismembers_photo_file" id="irismembers_photo_file" class="">
                                        <input type="hidden" value="<?= get_post_meta($postid, 'irismembers_photo_upload', true) ?>" id="irismembers_photo_upload" name="irismembers_photo_upload" class="form-control "/>
                                        <button type="button" id="irismembers_photo_btn" class="btn btn-info">Upload</button>
                                        <img src="<?= get_post_meta($postid, 'irismembers_photo_upload', true) ?>" class="img-disp right">
                                        <div class="col-sm-12 text-danger" id="irismembers_photo_resp"></div>   
                                    </td></tr></tbody></table>
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
                            <div class="col-md-8"><div class="" id="resp"></div><input type="hidden" name="postid" value="<?= $postid; ?>"/></div>
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

<?php //do_action( 'ocean_after_content_wrap' );  ?>
<?php $process = get_stylesheet_directory_uri() . '/process/upload.php'; ?>         
<script>

    $ = jQuery;
    var jq = $.noConflict();
    jq(document).ready(function () {
//select logo        
        jq('#irismembers_logo').change(function () {
            if (jq(this).val() == 'BraininHand') {
                jq('#irismembers_logo_img').attr('src', '<?= site_url() ?>/wp-content/BraininHand.png');
            } else if (jq(this).val() == 'PuzzlePiece') {
                jq('#irismembers_logo_img').attr('src', '<?= site_url() ?>/wp-content/PuzzlePiece.png');
            }
        });
//upload file
        function uploadFile(btn, upl, valSend, upl_resp) {

            jq("#" + btn).click(function () {

                var fd = new FormData();

                var files = jq('#' + upl)[0].files[0];

                fd.append('file', files);

                jq.ajax({
                    url: '<?= $process ?>',
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
<br>Please not that only these formats are allowed: jpg,png,jpeg<br>\n\
And maximum file size should be less than 3MB.');
                            jq('#' + upl).click(function () {
                                jq('#' + upl_resp).empty();
                            });
                        }
                    }
                });

            });
        }
        uploadFile('irismembers_photo_btn', 'irismembers_photo_file', 'irismembers_photo_upload', 'irismembers_photo_resp');


        jq('#submit').click(function (e) {
            e.preventDefault();
            //       
<?php $process_mem = get_stylesheet_directory_uri() . '/process/process_upd_mem.php'; ?>

            jq.ajax({
                url: '<?= $process_mem; ?>',
                type: 'POST',

                data: jq("form").serialize(),
                success: function (res) {

                    //jq('#reg').find('#submit').prop('disabled', true);
                    //jq('#resp').addClass('text-success');
                    //jq('#resp').html(res);
//                       jq('html, body').animate({
//                       scrollTop:jq("#main").offset().top
//                       }, 1000);  
//if(res == '0'){
//    jq('#resp').html('Please fill in all fields'); 
//}else if(res == '1'){
//    jq('#reg').find('#submit').prop('disabled', true);
//    jq('#resp').addClass('text-success');
//    jq('#resp').html('Member information updated.');
//}
                    if (res == '1') {
                        jq('#reg').find('#submit').prop('disabled', true);
                        jq('#resp').addClass('text-success');
                        jq('#resp').html('Member information updated.');
                        setTimeout(function () {
                            window.location.replace("<?= site_url() . '/irismembers' ?>");
                        }, 2000);
                    } else {
                        jq('#resp').html('Something went worng, please try again later!');
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