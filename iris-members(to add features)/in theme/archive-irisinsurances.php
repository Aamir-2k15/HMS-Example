<?php
ob_start();
get_header();
if (!is_user_logged_in()) {
    $location = site_url() . '/login';
    wp_redirect($location);
}
global $current_user;
get_currentuserinfo();
$authorID = $current_user->ID;
?>	<?php //do_action( 'ocean_before_content_wrap' );   ?>
<style>h1.page-header-title.clr {color: #000 !important;} body{font-family: "ABeeZee";font-size: 15px;} label,input,textarea{font-size:14px;font-family:Arial !important;}label{font-size: 15px;    font-weight: 600 !important;    padding: 7px; text-transform: capitalize;}
    .sec-title{font-family:ABeeZee,Sans-serif;font-size:24px;font-weight:400;text-transform:uppercase;line-height:35px;letter-spacing:2px}.form-control{display:block;width:100%;padding:16px 10px;font-size:15px !important;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
    textarea {overflow: auto;resize: vertical;min-height: 110px;}select{border-radius: .25rem;}
    #submit{ float: right; position: relative; right: -15%;}#resp {    font-size: 16px;font-family: Arial;}
</style><?php include_once 'css.php'; ?><style> table th{text-transform:none !important;text-align:center;}       .row{margin:20px 0;}  .box {background: linear-gradient(to bottom right, #ececec 0%, #efefef 100%);border: 1px solid #DEDEDE;padding: 100px 15px;font-size: 25px;border-radius: 5px;text-align: center;} .page-subheading{text-align:center;} </style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" type="stylesheet"/>
<div id="content-wrap" class="container clr">
    <?php do_action('ocean_before_content_inner'); ?>
    
    <?php
    $query = new WP_Query(array('post_type' => 'irisinsurances', 'author' => $authorID));
    $posts = $query->posts;
// echo '<pre>';
//  print_r($posts);
    ?>
    
    <section id="" class="">
        <div class="container">
            <div class="row">
                <div class=" table-responsive" style="width:100% !important;">
                     <a class="btn btn-default" href='<?= site_url() ?>/user-dashboard'><i class='fa fa-backward'></i> Back to Dashboard</a> | <a href='<?= site_url() ?>/add-insurance' class="btn btn-default"><i class='fa fa-plus'></i> Add New Insurance</a>
<?php if (!empty($posts)) { ?>           <table class="table table-bordered" style="width:100% !important;">
                         <thead>    <tr>
                                <th id='id' width='5%'>ID</th>
                                <th>I. Carrier</th>
                                <th>policy</th>
                                <th>group name</th>
                                <!--<th>group #</th>-->
                                <th>physician name</th>
                                <!--<th>physician tel#</th>-->
                                <th>insurer full name</th>
                                <!--<th>date of birth</th>-->
                                <!--<th>mailing addresss</th>-->
                                <th>city</th>
                                <!--<th>state</th>-->
                                <th>Action</th>
                            </tr></thead><?php } ?>
<?php foreach ($posts as $post) { ?>
                            <tr>
                                <td><a href="<?= site_url() ?>/irisinsurances/<?= $post->post_name; ?>"><?= $post->ID; ?></a></td>
                                <!--<td><?php // echo $post->post_title; ?><?php //get_post_meta(get_the_ID(), 'contact_name', true); ?></td>-->
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_insurance_carrier', true); ?></td>
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_policy_number', true); ?></td>
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_group_name', true); ?></td>
                                <!--<td><?= get_post_meta(get_the_ID(), 'irisinsurances_group_number', true); ?></td>-->
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_physician_name', true); ?></td>
                                <!--<td><?= get_post_meta(get_the_ID(), 'irisinsurances_physician_tel', true); ?></td>-->
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_insurer_fullname', true); ?></td>
                                <!--<td><?= get_post_meta(get_the_ID(), 'irisinsurances_dob', true); ?></td>-->
                                <td><?= get_post_meta(get_the_ID(), 'irisinsurances_city', true); ?></td>
                                <!--<td><?= get_post_meta(get_the_ID(), 'irisinsurances_state', true); ?></td>-->
                                <td>
                                    <a href="<?= site_url() ?>/irisinsurances/<?= $post->post_name; ?>">View</a> <br>
                                    <a href="<?= site_url() ?>/edit-insurance?id=<?= $post->ID; ?>">Edit</a>
                                </td>
                            </tr>
<?php } ?>
<?php if (!empty($posts)) { ?>                </table><?php } ?>
                </div>
            </div>
            <div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div>

        </div>
    </section>
</div><!-- #content-wrap -->

<?php //do_action( 'ocean_after_content_wrap' );   ?>

<?php get_footer(); ?>