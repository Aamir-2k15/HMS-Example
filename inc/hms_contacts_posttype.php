<?php  

add_action('init', 'initialize_current_user');

/*****************hmscontacts cpt*********/
function hmscontacts_post_type() {
	$hmscontacts_labels = array(
		'name'                  => _x( 'HMS Contacts', 'Post Type General Name', 'hms-contacts' ),
		'singular_name'         => _x( 'HMS Contacts', 'Post Type Singular Name', 'hms-contacts' ),
		'menu_name'             => __( 'HMS Contacts', 'hms-contacts' ),
		'name_admin_bar'        => __( 'HMS Contacts', 'hms-contacts' ),
		'archives'              => __( 'Item Archives', 'hms-contacts' ),
		'parent_item_colon'     => __( 'Parent Item:', 'hms-contacts' ),
		'all_items'             => __( 'All Contacts', 'hms-contacts' ),
		'add_new_item'          => __( 'Add New HMS Contact', 'hms-contacts' ),
		'add_new'               => __( 'Add New', 'hms-contacts' ),
		'new_item'              => __( 'New HMS Contact', 'hms-contacts' ),
		'edit_item'             => __( 'Edit Item', 'hms-contacts' ),
		'update_item'           => __( 'Update Item', 'hms-contacts' ),
		'view_item'             => __( 'View Item', 'hms-contacts' ),
		'search_items'          => __( 'Search Item', 'hms-contacts' ),
		'not_found'             => __( 'Not found', 'hms-contacts' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hms-contacts' ),
		'featured_image'        => __( 'Featured Image', 'hms-contacts' ),
		'set_featured_image'    => __( 'Set featured image', 'hms-contacts' ),
		'remove_featured_image' => __( 'Remove featured image', 'hms-contacts' ),
		'use_featured_image'    => __( 'Use as featured image', 'hms-contacts' ),
		'insert_into_item'      => __( 'Insert into item', 'hms-contacts' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hms-contacts' ),
		'items_list'            => __( 'Items list', 'hms-contacts' ),
		'items_list_navigation' => __( 'Items list navigation', 'hms-contacts' ),
		'filter_items_list'     => __( 'Filter items list', 'hms-contacts' ),
	);
	$hmscontacts_args = array(
		'label'                 => __( 'HMS Contacts', 'hms-contacts' ),
		'description'           => __( 'HMS Contacts information page.', 'hms-contacts' ),
		'labels'                => $hmscontacts_labels,
		'supports'              => array( 'title','author', 'thumbnail', 'revisions' ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		// 'show_in_menu'          => 'edit.php?post_type=hms-admin',
		'menu_position'         => 8,
		'menu_icon'             => 'dashicons-admin-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'hmscontacts', $hmscontacts_args );
}
add_action( 'init', 'hmscontacts_post_type', 0 );
/*
|===================================================================================|
|																					|
|      hms Member's Details Meta Box                                               |
|																					|
|===================================================================================| 
 */
// Add the Meta Box
function add_hmscontacts_meta_box() {
    add_meta_box(
        'custom_meta_box', // $id
        'Details', // $title 
        'show_hmscontacts_meta_box', // $callback
        'hmscontacts', // $page
        'normal', // $context
        'high'); // $priority
}
add_action('add_meta_boxes', 'add_hmscontacts_meta_box');
 // Field Array
$contact_prefix = 'hmscontacts_';
$custom_hmscontacts_meta_fields_options = array(

	array(
        'label'=> 'Contact belongs to member',
        'desc'  => '',
        'id'    => 'contact_belongs_to_member',
        'type'  => 'contact_dropdown'
    ),

    array(
        'label'=> 'Full Name',
        'desc'  => '',
        'id'    => $contact_prefix.'name',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Address',
        'desc'  => '',
        'id'    => $contact_prefix.'address',
        'type'  => 'textarea'
    ),
/*	array(
        'label'=> 'Address 2',
        'desc'  => '',
        'id'    => $contact_prefix.'address_2',
        'type'  => 'text'
    ),*/
	array(
        'label'=> 'City',
        'desc'  => '',
        'id'    => $contact_prefix.'city',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Country',
        'desc'  => '',
        'id'    => $contact_prefix.'country',
		'options' => countries_array(),
        'type'  => 'select'
    ),
array(
        'label'=> 'State',
        'desc'  => '',
        'id'    => $contact_prefix.'state',
		'options'=> us_states(),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Postal Code',
        'desc'  => '',
        'id'    => $contact_prefix.'postal_code',
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
        'id'    => $contact_prefix.'gender',
		'options'=>array('M'=>'Male','F'=>'Female'),
        'type'  => 'select'
    ),
	array(
        'label'=> 'Email',
        'desc'  => '',
        'id'    => $contact_prefix.'email',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Home #',
        'desc'  => '',
        'id'    => $contact_prefix.'home_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Cell #',
        'desc'  => '',
        'id'    => $contact_prefix.'cell_number',
        'type'  => 'text'
    ),
	array(
        'label'=> 'Work #',
        'desc'  => '',
        'id'    => $contact_prefix.'work_number',
        'type'  => 'text'
    ),
	
	array(
        'label'=> 'Contact type',
        'desc'  => '',
        'id'    => $contact_prefix.'contact_type',
		'options'=> contact_type(),
        'type'  => 'select'
    ),
	
	array(
        'label'=> 'Relationship to member',
        'desc'  => '',
        'id'    => $contact_prefix.'relationship_to_member',
		'options'=> relationship_to_member(),
        'type'  => 'select'
    ),
    
);

// The Callback
function show_hmscontacts_meta_box() {
    
    global $custom_hmscontacts_meta_fields_options, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
$args = new WP_Query(['post_type' => 'hmsmembers', 'posts_per_page' => -1 , 'post_status' => 'publish' ]);
 //echo '<pre>';
 //print_r($posts[0]);
 //exit;
  
    // Begin the field table and loop
    echo '<table class="form-table hms-fields-table">';
    foreach ($custom_hmscontacts_meta_fields_options as $field) {
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
    <div class="row image_upload_row" >
    <div class="<?php echo $field['id']; ?>_imagetextarea">
    <?php if($meta){ ?>
	<div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="<?php echo $meta; ?>" size="30" /></div>
    <?php } ?>
    </div>
	<div class="col-sm-2"><input type="button" name="logo" id="<?php echo $field['id']; ?>_upload-btn" class="button-secondary" value="Upload Image"></div>
	<div class="col-sm-6" style="padding-top: 20px;"></div>
	</div>
    <div class="<?php echo $field['id']; ?>_imagearea">
    <?php if($meta){ ?>
	<div class="col-sm-6"><div class="col-sm-12 images_parent_class"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img src="<?php echo $meta; ?>" id="<?php echo $field['id']; ?>_new-img" style="margin-left: auto; margin-right: auto; display: block;"/></div></div> <?php } ?>
    </div>
	            <br /><span class="description"><?php echo $field['desc']; ?></span>
		
		<script>
		var $ = jQuery;
		jQuery(document).ready(function($){
	$("#<?php echo $field['id'].'_upload-btn'; ?>").click(function(e) {
		e.preventDefault();
		var image = wp.media({ 
			title: "Upload Image",
			// mutiple: true if you want to upload multiple files at once
			multiple: false
		}).open()
		.on("select", function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_image = image.state().get("selection").first();
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			console.log(uploaded_image);
			var image_url = uploaded_image.toJSON().url;
			// Lets assign the url value to the input field
			$('.<?php echo $field['id']; ?>_imagetextarea').html('<div class="col-sm-4"><input type="text" readonly name="<?php echo $field['id']; ?>" id="<?php echo $field['id']; ?>" value="'+image_url+'" size="30" /></div>');
			$('.<?php echo $field['id']; ?>_imagearea').html('<div class="col-sm-6"><div class="col-sm-12 images_parent_class"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">X</div><img src="'+image_url+'" id="<?php echo $field['id']; ?>_new-img" style="margin-left: auto; margin-right: auto; display: block;"/></div></div>');
		});
	});
});
$(document).on('click','.<?php echo $field['id']; ?>_upload-delete',function(){
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
		jQuery(document).ready(function($){
	$("#<?php echo $field['id'].'-btn';?>").click(function(e) {
		e.preventDefault();
		var image = wp.media({
			title: "Upload Image",
			// mutiple: true if you want to upload multiple files at once
			multiple: true
		}).open()
		.on("select", function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_images = image.state().get("selection").map( function( uploaded_image ) {
                    uploaded_image.toJSON();
                    return uploaded_image;
            });
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			//console.log(uploaded_image);
			var i;
           for (i = 0; i < uploaded_images.length; ++i) {
                $('.<?php echo $field['id'].'_append_images_here'; ?>').append('<div class="col-sm-12 images_parent_class" style="position:relative"><div class="col-sm-9 <?php echo $field['id']; ?>_upload-delete delete_btn">Delete</div><div class="image_div"><img data-imglink="img_link_'+i+'" src="'+uploaded_images[i].attributes.url+'" id="new-img-0" width="150" height="150" style="margin-left: auto; margin-right: auto; display: block;"></div></div>');
				$('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox').append('<input type="text" data-imglink="img_link_'+i+'" readonly="" name="<?php echo $field['id'];?>[]" value="'+uploaded_images[i].attributes.url+'" size="30">');
			}
		});
	});
});
$(document).on('click','.<?php echo $field['id']; ?>_upload-delete',function(){
	var check_img_link = $(this).parent('.images_parent_class').children('.image_div').children('img').data('imglink');
	$('.<?php echo $field['id'];?>_readonly_meta_upload_txtbox input').each( function () {
		if($(this).data('imglink') == check_img_link)
		{
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
case 'contact_dropdown':
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
<option <?php if(!empty($meta)){foreach($meta as $inner_meta){  if($key == $inner_meta){echo 'selected="selected"';}}} ?>  value="<?php echo $key; ?>"><?php echo $option; ?></option>
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
    echo '<input class="hms-field" type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
        <label for="'.$field['id'].'">'.$field['desc'].'</label>';
break;
                } //end switch
        echo '</td>';
    } // end foreach
    echo '</table>'; // end table
	?>

    <?php
	
}
// Save the Data
function save_hmscontacts_meta($post_id) {
    global $custom_hmscontacts_meta_fields_options;
/*echo '<pre>';
print_r( $custom_hmscontacts_meta_fields_options);
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
    foreach ($custom_hmscontacts_meta_fields_options as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_hmscontacts_meta');

