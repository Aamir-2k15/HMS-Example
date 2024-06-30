<?php  

	global $current_user;
    //get_currentuserinfo();
    @$authorID = $current_user->ID;

/*****************hmsinsurances cpt*********/
function hmsinsurances_post_type() {
	$hmsinsurances_labels = array(
		'name'                  => _x( 'HMS Insurances', 'Post Type General Name', 'hms-insurances' ),
		'singular_name'         => _x( 'HMS Insurance', 'Post Type Singular Name', 'hms-insurances' ),
		'menu_name'             => __( 'HMS Insurances', 'hms-insurances' ),
		'name_admin_bar'        => __( 'HMS Insurances', 'hms-insurances' ),
		'archives'              => __( 'Insurance Archives', 'hms-insurances' ),
		'parent_item_colon'     => __( 'Parent Insurance:', 'hms-insurances' ),
		'all_items'             => __( 'All Insurances', 'hms-insurances' ),
		'add_new_item'          => __( 'Add New HMS Insurances', 'hms-insurances' ),
		'add_new'               => __( 'Add New', 'hms-insurances' ),
		'new_item'              => __( 'New Insurance', 'hms-insurances' ),
		'edit_item'             => __( 'Edit Insurance', 'hms-insurances' ),
		'update_item'           => __( 'Update Insurance', 'hms-insurances' ),
		'view_item'             => __( 'View Insurance', 'hms-insurances' ),
		'search_items'          => __( 'Search Insurance', 'hms-insurances' ),
		'not_found'             => __( 'Not found', 'hms-insurances' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hms-insurances' ),
		'featured_image'        => __( 'Featured Image', 'hms-insurances' ),
		'set_featured_image'    => __( 'Set featured image', 'hms-insurances' ),
		'remove_featured_image' => __( 'Remove featured image', 'hms-insurances' ),
		'use_featured_image'    => __( 'Use as featured image', 'hms-insurances' ),
		'insert_into_item'      => __( 'Insert into item', 'hms-insurances' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hms-insurances' ),
		'items_list'            => __( 'Insurance list', 'hms-insurances' ),
		'items_list_navigation' => __( 'Insurance list navigation', 'hms-insurances' ),
		'filter_items_list'     => __( 'Filter items list', 'hms-insurances' ),
	);
	$hmsinsurances_args = array(
		'label'                 => __( 'HMS insurances', 'hms-insurances' ),
		'description'           => __( 'HMS insurances information page.', 'hms-insurances' ),
		'labels'                => $hmsinsurances_labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		// 'show_in_menu'          => 'edit.php?page=hms-admin',
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'hmsinsurances', $hmsinsurances_args );
}
add_action( 'init', 'hmsinsurances_post_type', 0 );
/*
|===================================================================================|
|																					|
|      hms Member's Details Meta Box                                               |
|																					|
|===================================================================================| 
 */
// Add the Meta Box
function add_hmsinsurances_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title 
        'show_hmsinsurances_meta_box', // $callback
        'hmsinsurances', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_hmsinsurances_meta_box');
 // Field Array
$insurance_prefix = 'hmsinsurances_';
$custom_hmsinsurances_meta_fields_options = array(
	
    	array(
        'label'=> 'Belongs to member',
        'desc'  => '',
        'id'    => 'insurance_belongs_to_member',
        'type'  => 'insurance_dropdown'
    ),
	array(
        'label'=> 'Insurance Carrier',
        'desc'  => '',
        'id'    => $insurance_prefix.'insurance_carrier',
        'type'  => 'text'
    ),
	array(
        'label'=> 'policy number',
        'desc'  => '',
        'id'    => $insurance_prefix.'policy_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'group name',
        'desc'  => '',
        'id'    => $insurance_prefix.'group_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'group number',
        'desc'  => '',
        'id'    => $insurance_prefix.'group_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'physician name',
        'desc'  => '',
        'id'    => $insurance_prefix.'physician_name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'physician tel',
        'desc'  => '',
        'id'    => $insurance_prefix.'physician_tel',
        'type'  => 'text'
    ),
	array(
        'label'=> 'insurer full name',
        'desc'  => '',
        'id'    => $insurance_prefix.'insurer_fullname',
        'type'  => 'text'
    ),
    array(
        'label'=> 'Date of Birth',
        'desc'  => 'Please follow the format: Day-Month-Year',
        'id'    => $insurance_prefix.'date_of_birth', 
        'type'  => 'text'
    ),
	array(
        'label'=> 'mailing addresss',
        'desc'  => '',
        'id'    => $insurance_prefix.'mailing_addresss',
        'type'  => 'textarea'
    ),array(
        'label'=> 'city',
        'desc'  => '',
        'id'    => $insurance_prefix.'city',
        'type'  => 'text'
    ),
 
	array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $insurance_prefix.'state',
		'options'=> us_states(),
        'type'  => 'select'
    ),    
	array(
        'label'=> 'Postal Code',
        'desc'  => '',
        'id'    => $insurance_prefix.'postal_code',
        'type'  => 'text'
    ),
	
	array(
        'label'=> 'Email',
        'desc'  => '',
        'id'    => $insurance_prefix.'email',
        'type'  => 'text'
    ),
	
);

// The Callback
function show_hmsinsurances_meta_box() {
    
global $custom_hmsinsurances_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
$args = new WP_Query(['post_type' => 'hmsmembers', 'posts_per_page' => -1 , 'post_status' => 'publish' ]);
 //echo '<pre>';
 //print_r($posts[0]);
 //exit;
  
    // Begin the field table and loop
    echo '<table class="form-table hms-fields-table">';
    foreach ($custom_hmsinsurances_meta_fields_options as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th class="'.$field['id'].'_td_header"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td class="'.$field['id'].'_td_class">';
                $type = isset($field['type']) ? $field['type'] : 'text';
                switch($type) {
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
            class="button-secondary" value="Upload Image" class="hms-field"></div>
    <div class="col-sm-6" style="padding-top: 20px;"></div>
</div>
<div class="<?php echo $field['id']; ?>_imagearea">
    <?php if($meta){ ?>
    <div class="col-sm-6">
        <div class="col-sm-12 images_parent_class">
            <div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img
                src="<?php echo $meta; ?>" id="<?php echo $field['id']; ?>_new-img"
                style="margin-left: auto; margin-right: auto; display: block;" />
        </div>
    </div> <?php } ?>
</div>
<br /><span class="description"><?php echo $field['desc']; ?></span>



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
    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" class="hms-field"/>
        <br /><span class="description">'.$field['desc'].'</span>';
break;
case 'textwithdatatype':
    echo '<input type="text" data-control="hue" class="'.$field['class'].' hms-field" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" autocomplete="false" />
        <br /><span class="description">'.$field['desc'].'</span>';
break;
// select
case 'select':
    echo '<select name="'.$field['id'].'" id="'.$field['id'].'" class="hms-field">';
    foreach ($field['options'] as $key => $option) {
        echo '<option', $meta == $key ? ' selected="selected"' : '', ' value="'.$key.'">'.$option.'</option>';
    }
    echo '</select><br /><span class="description">'.$field['desc'].'</span>';
break;
//cdd
case 'insurance_dropdown':
echo '<select name="'.$field['id'].'" id="'.$field['id'].'" class="hms-field">';
echo '<option value="">select</option>';
foreach ($args->get_posts() as $mem_query) {
echo '<option '.($meta == $mem_query->ID ? 'selected' : '').' value="'.$mem_query->ID.'">'.$mem_query->post_title.'</option>';
}
wp_reset_postdata();
break;
//multiselect
case 'multiselect':
echo '<select name="'.$field['id'].'[]" id="'.$field['id'].'" multiple class="hms-field">';
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
    echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4" class="hms-field">'.$meta.'</textarea>
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
function save_hmsinsurances_meta($post_id) {
    global $custom_hmsinsurances_meta_fields_options;
/*echo '<pre>';
print_r( $custom_hmsinsurances_meta_fields_options);
exit;*/
     
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
    foreach ($custom_hmsinsurances_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_hmsinsurances_meta');