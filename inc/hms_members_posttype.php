<?php
/*****************hmsmembers cpt*********/
function hmsmembers_post_type() {
	$hmsmembers_labels = array(
		'name'                  => _x( 'HMS Members', 'Post Type General Name', 'hms-members' ),
		'singular_name'         => _x( 'HMS Member', 'Post Type Singular Name', 'hms-member' ),
		'menu_name'             => __( 'HMS Members', 'hms-members' ),
		'name_admin_bar'        => __( 'HMS Members', 'hms-members' ),
		'archives'              => __( 'Member Archives', 'hms-members' ),
		'parent_item_colon'     => __( 'Parent Member:', 'hms-members' ),
		'all_items'             => __( 'All Members', 'hms-members' ),
		'add_new_item'          => __( 'Add New HMS Members', 'hms-members' ),
		'add_new'               => __( 'Add New', 'hms-members' ),
		'new_item'              => __( 'New Member', 'hms-members' ),
		'edit_item'             => __( 'Edit Member Info', 'hms-members' ),
		'update_item'           => __( 'Update Member Info', 'hms-members' ),
		'view_item'             => __( 'View Member', 'hms-members' ),
		'search_items'          => __( 'Search Member', 'hms-members' ),
		'not_found'             => __( 'Not found', 'hms-members' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hms-members' ),
		'featured_image'        => __( 'Featured Image', 'hms-members' ),
		'set_featured_image'    => __( 'Set featured image', 'hms-members' ),
		'remove_featured_image' => __( 'Remove featured image', 'hms-members' ),
		'use_featured_image'    => __( 'Use as featured image', 'hms-members' ),
		'insert_into_item'      => __( 'Insert into Member Info', 'hms-members' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Member\'s info', 'hms-members' ),
		'items_list'            => __( ' Members list', 'hms-members' ),
		'items_list_navigation' => __( ' Members list navigation', 'hms-members' ),
		'filter_items_list'     => __( 'Filter  Members list', 'hms-members' ),
	);
	$hmsmembers_args = array(
		'label'                 => __( 'HMS Members', 'hms-members' ),
		'description'           => __( 'HMS Members information page.', 'hms-members' ),
		'labels'                => $hmsmembers_labels,
		'supports'              => array( 'title',  'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		// 'show_in_menu'          => 'edit.php?post_type=hms-admin',
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'hmsmembers', $hmsmembers_args );
}
add_action( 'init', 'hmsmembers_post_type', 0 );
/*
|===================================================================================|
|																					|
|      HMS Member's Details Meta Box                                               |
|																					|
|===================================================================================| 
 */
// Add the Meta Box
function add_hmsmembers_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title 
        'show_hmsmembers_meta_box', // $callback
        'hmsmembers', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_hmsmembers_meta_box');
 // Field Array
$member_prefix = 'hmsmembers_';
$prefix = '';
$states_array = us_states();
$custom_hmsmembers_meta_fields_options = array(
	array(
        'label'=> 'Member Name',
        'desc'  => '',
        'id'    => $member_prefix.'member_name',
        'type'  => 'text'
    ),
		array(
        'label'=> 'Address',
        'desc'  => '',
        'id'    => $member_prefix.'address',
        'type'  => 'textarea'
    ),
array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'city',
        'type'  => 'text'
    ),

	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'state',
		'options'=> $states_array,
        'type'  => 'select'
    ),
	array(
        'label'=> 'Postal Code',
        'desc'  => '',
        'id'    => $member_prefix.'postal_code',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Date of Birth',
        'desc'  => 'Please follow the format: Day-Month-Year',
        'id'    => $member_prefix.'date_of_birth', 
        'type'  => 'text'
    ),
	
	array(
        'label'=> 'Gender',
        'desc'  => '',
        'id'    => $member_prefix.'gender',
		'options'=>array('M'=>'Male','F'=>'Female'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Email',
        'desc'  => '',
        'id'    => $member_prefix.'email',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Home #',
        'desc'  => '',
        'id'    => $member_prefix.'home_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Cell #',
        'desc'  => '',
        'id'    => $member_prefix.'cell_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Weight (lbs/kg)',
        'desc'  => '',
        'id'    => $member_prefix.'weight_lb_kg',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Height (inches/cm)',
        'desc'  => '',
        'id'    => $member_prefix.'height_inches_cm',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Race',
        'desc'  => '',
        'id'    => $member_prefix.'race',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Member\'s Questions:',
        'desc'  => '',
        'id'    => $member_prefix.'member_questions',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'What is their Language Capability',
        'desc'  => '',
        'id'    => $member_prefix.'language_capability',
		'options'=> language_capability(),
        'type'  => 'select'
    ),
    array(
        'label'=> 'Are they Sensitive to Sound? If so what Kind?',
        'desc'  => '',
        'id'    => $prefix.'sound_sesitivity',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What is your Diagnosis?:',
        'desc'  => 'Please Select the Diagnosis from List: For Mac/Window users: Hold the command/Ctrl Key down',
        'id'    => $prefix.'whats_our_diagnosis',
		'options' => diagnosis(),
        'type'  => 'multiselect'
    ),
	array(
        'label'=> 'Sensitive to Touch',
        'desc'  => '',
        'id'    => $prefix.'sensitive_to_touch',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Sensitive to Taste',
        'desc'  => '',
        'id'    => $prefix.'sensitive_to_taste',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Do they Have a Tracking Device. If Yes Please Indicate Device Type:',
        'desc'  => '',
        'id'    => $prefix.'indicate_tracking_device',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are they Toilet Trained',
        'desc'  => '',
        'id'    => $prefix.'are_they_toilet_trained',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'If Other Diagnosis Please indicate:',
        'desc'  => '',
        'id'    => $prefix.'indicate_other_diagnosis',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'Are there Strategies that Decrease the Stressful Reactions',
        'desc'  => '',
        'id'    => $prefix.'strategies_to_decrease_sr',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What is their Prescribers Name and #:',
        'desc'  => '',
        'id'    => $member_prefix.'prescriber_name_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Are there Cognitive (IQ) delay? If so what Degree?',
        'desc'  => '',
        'id'    => $prefix.'iq_delay_degree',
		'options'=> iq_delay_degree(),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are they on Medications: If so please indicate:',
        'desc'  => '',
        'id'    => $prefix.'if_on_medications',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there Behavioral Issues? If Yes Please Explain:',
        'desc'  => '',
        'id'    => $prefix.'if_behavioral_issues',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What allergies do they have?:',
        'desc'  => '',
        'id'    => $member_prefix.'allergies_list',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Do they Wander ot Elope?',
        'desc'  => '',
        'id'    => $prefix.'wander_elope',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there in Danger to Self and Others?If Yes PLease Explain:',
        'desc'  => '',
        'id'    => $prefix.'self_danger_or_others',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Do they become Combative when Stressed?:',
        'desc'  => '',
        'id'    => $prefix.'combative_when_stressed',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'What type of Living Arrangement Are They In:',
        'desc'  => '',
        'id'    => $prefix.'living_arrangements',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'Is there a Seizure Disorder?',
        'desc'  => '',
        'id'    => $prefix.'seizure_disorder',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Are there Behavioral Conditions and Triggers:',
        'desc'  => '',
        'id'    => $prefix.'behavioral_conditions_and_triggers',
		'options'=> array('select'=>'Select','yes'=>'Yes','no'=>'No'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Typical Response to being Approached?',
        'desc'  => '',
        'id'    => $prefix.'typical_response_being_approached',
		'options'=> typical_response_being_approached(),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Is there Anything an Emergency Responder Should Know?',
        'desc'  => '',
        'id'    => $prefix.'anything_else_for_responder',
        'type'  => 'textarea'
    ),
	array(
        'label'=> 'How Did You Hear About Us?',
        'desc'  => '',
        'id'    => $prefix.'how_did_you_hear',
		'options'=> how_did_you_hear(),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Nearest Police Department:',
        'desc'  => '',
        'id'    => $member_prefix.'nearest_police_department',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Name',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_city',
        'type'  => 'text'
    ),
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_state',
		'options'=> $states_array,
        'type'  => 'select'
    ),
	array(
        'label'=> 'County',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_county',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Phone#',
        'desc'  => '',
        'id'    => $member_prefix.'police_department_phone',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Nearest Fire / Rescue Department:',
        'desc'  => '',
        'id'    => $member_prefix.'nearest_rescue_department'
    ),
	array(
        'label'=> 'Name',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_city',
        'type'  => 'text'
    ),
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_state',
		'options'=> $states_array,
        'type'  => 'select'
    ),
	array(
        'label'=> 'County',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_county',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Phone#',
        'desc'  => '',
        'id'    => $member_prefix.'rescue_department_phone',
        'type'  => 'text'
    ),
 
	array(
        'label'=> 'Upload Photo:',
        'desc'  => '',
        'id'    => $member_prefix.'photo_upload',
        'type'  => 'upload'
    )
);
 
// The Callback
function show_hmsmembers_meta_box() {
global $custom_hmsmembers_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    // Begin the field table and loop
    echo '<table class="form-table hms-fields-table">';
    foreach ($custom_hmsmembers_meta_fields_options as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th class="'.$field['id'].'_td_header"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td class="'.$field['id'].'_td_class">';
                $type = isset($field['type']) ? $field['type'] : 'text';
                switch($type) {
                    // case items will go here
					// text
case 'upload':
?>
<div class="row image_upload_row">
    <div class="<?php echo $field['id']; ?>_imagetextarea">
        <?php if($meta){ ?>
        <div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>"
                id="<?php echo $field['id']; ?>" value="<?php echo $meta; ?>" size="30" class="hms-field" /></div>
        <?php } ?>
    </div>
    <div class="col-sm-2"><input type="button" name="logo" id="<?php echo $field['id']; ?>_upload-btn"
            class="button-secondary hms-field " value="Upload Image"></div>
    <div class="col-sm-6" style="padding-top: 20px;"></div>
</div>
<div class="<?php echo $field['id']; ?>_imagearea">
    <?php if($meta){ ?>
    <div class="col-sm-6">
        <div class="col-sm-12 images_parent_class">
            <div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div>
            <img src="<?php echo $meta; ?>" id="<?php echo $field['id']; ?>_new-img" class="hms-photo-preview" />
        </div>
    </div> <?php } ?>
</div>
<br /><span class="description"><?php echo $field['desc']; ?></span>

<script>
var $ = jQuery;
jQuery(document).ready(function($) {
    $("#<?php echo $field['id'].'_upload-btn'; ?>").click(function(e) {
        e.preventDefault();
        var image = wp.media({
                title: "Upload Image",
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            }).open()
            .on("select", function(e) {
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_image = image.state().get("selection").first();
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                console.log(uploaded_image);
                var image_url = uploaded_image.toJSON().url;
                // Lets assign the url value to the input field
                $('.<?php echo $field['id']; ?>_imagetextarea').html(
                    '<div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="' +
                    image_url + '" size="30" /></div>');
                $('.<?php echo $field['id']; ?>_imagearea').html(
                    '<div class="col-sm-6"><div class="col-sm-12 images_parent_class"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img src="' +
                    image_url +
                    '" id="<?php echo $field['id']; ?>_new-img" style="margin-left: auto; margin-right: auto; display: block;"/></div></div>'
                    );
            });
    });
});
$(document).on('click', '.<?php echo $field['id']; ?>_upload-delete', function() {
    $('.<?php echo $field['id']; ?>_imagetextarea .col-sm-4').remove();
    $('.<?php echo $field['id']; ?>_imagearea .col-sm-6').remove();
});
</script>

<?php
break;
case 'multiupload':
    echo '<div class="row" >
	<div class="col-sm-4 '.$field['id'].'_readonly_meta_upload_txtbox">';
	$counter = 0;
	foreach($meta as $inner_meta){
	echo '<input type="text" data-imglink="img_link_'.$counter.'" readonly name="'.$field['id'].'[]" id="'.$field['id'].'-'.$counter.'" value="'.$inner_meta.'" size="30" />';
	$counter++;
	}
	echo '</div><div class="col-sm-2"><input type="button" name="logo" id="'.$field['id'].'-btn" class="button-secondary" value="Upload Image"></div>
	<div class="col-sm-6" style="padding-top: 20px;"></div>
	</div>
	<div class="col-sm-6 '.$field['id'].'_append_images_here" > ';
	$another_counter = 0;
	foreach($meta as $another_inner_meta){
	echo '<div class="col-sm-12 images_parent_class" style="position:relative;"><div class="col-sm-9 '.$field['id'].'_upload-delete delete_btn">Delete</div><div class="image_div"><img data-imglink="img_link_'.$another_counter.'" src="'.$another_inner_meta.'" id="new-img-'.$another_counter.'" width="150" height="150" style="margin-left: auto; margin-right: auto; display: block;"/></div></div>';
	$another_counter ++;
	}
	echo '</div><br /><span class="description">'.$field['desc'].'</span>';
				//print_r($meta);
				?>
<script>
var $ = jQuery;
jQuery(document).ready(function($) {
    $("#<?php echo $field['id'].'-btn';?>").click(function(e) {
        e.preventDefault();
        var image = wp.media({
                title: "Upload Image",
                // mutiple: true if you want to upload multiple files at once
                multiple: true
            }).open()
            .on("select", function(e) {
                // This will return the selected image from the Media Uploader, the result is an object
                var uploaded_images = image.state().get("selection").map(function(uploaded_image) {
                    uploaded_image.toJSON();
                    return uploaded_image;
                });
                // We convert uploaded_image to a JSON object to make accessing it easier
                // Output to the console uploaded_image
                //console.log(uploaded_image);
                var i;
                for (i = 0; i < uploaded_images.length; ++i) {
                    $('.<?php echo $field['id'].'_append_images_here'; ?>').append(
                        '<div class="col-sm-12 images_parent_class" style="position:relative"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">Delete</div><div class="image_div"><img data-imglink="img_link_' +
                        i + '" src="' + uploaded_images[i].attributes.url +
                        '" id="new-img-0" width="150" height="150" style="margin-left: auto; margin-right: auto; display: block;"></div></div>'
                        );
                    $('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox').append(
                        '<input type="text" data-imglink="img_link_' + i +
                        '" readonly="" name="<?php echo $field['id'];?>[]" value="' +
                        uploaded_images[i].attributes.url + '" size="30">');
                }
            });
    });
});
$(document).on('click', '.<?php echo $field['id']; ?>_upload-delete', function() {
    var check_img_link = $(this).parent('.images_parent_class').children('.image_div').children('img').data(
        'imglink');
    $('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox input').each(function() {
        if ($(this).data('imglink') == check_img_link) {
            $(this).remove();
        }
    });
    $(this).parent('.images_parent_class').remove();
});
</script>
 <?php
break;

case 'text':
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;

case 'textwithdatatype':
    echo '<input type="text" data-control="hue" class="'.$field['class'].'" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" autocomplete="false" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;
// select
case 'select':
    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
    foreach ($field['options'] as $key => $option) {
        echo '<option', $meta == $key ? ' selected="selected"' : '', ' value="'.$key.'">'.$option.'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
//multiselect
case 'multiselect':
echo '<select name="'.$field['id'].'[]" id="'.$field['id'].'" multiple>';
foreach ($field['options'] as $key => $option) { ?>
<option
    <?php if(!empty($meta)){foreach($meta as $inner_meta){  if($key == $inner_meta){echo 'selected="selected"';}}} ?>
    value="<?php echo $key; ?>"><?php echo $option; ?></option>
<?php
}
echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
// textarea
case 'textarea':
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
        <br /><span class="description">'.$field['desc'].'</span>';
break;
case 'radio': // checkbox or radio
foreach($field['values'] as $value){
    echo '<input type="radio" name="'.$field['id'].'" id="'.$field['id'].'_'.$value.'" '.($meta == $value ? ' checked="checked"' : '').' value="'.$value.'"/>'.$value.'<br>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
		}
break;
// checkbox
case 'checkbox':
    echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
break;
default:
echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
      <br /><span class="description">'.$field['desc'].'</span>';
break;
                } //end switch
        echo '</td>';
    } // end foreach
    echo '</table>'; // end table
	?>

<?php
	
}
// Save the Data
function save_hmsmembers_meta($post_id) {
    global $custom_hmsmembers_meta_fields_options;
     
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($custom_hmsmembers_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_hmsmembers_meta');