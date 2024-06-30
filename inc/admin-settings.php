<?php

// Create custom plugin settings menu
add_action('admin_menu', 'hms_admin_create_menu');

function hms_admin_create_menu() {
    add_menu_page('HMS Admin', 'HMS Admin', 'manage_options', 'hms-admin', 'hms_admin_settings_page', 'dashicons-dashboard', 5);
    // Call register settings function
    add_action('admin_init', 'register_hms_admin_settings');
}

function register_hms_admin_settings() {
    register_setting('hms-admin-settings-group', 'hms_admin_settings');
}

function hms_admin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Hospital Management System Admin</h1>
        <?php if (isset($_GET['settings-updated']) && $_GET['settings-updated']) : ?>
            <div id="message" class="updated notice is-dismissible">
                <p><strong>Settings saved.</strong></p>
            </div>
        <?php endif; ?>
        <form method="post" action="options.php">
            <?php settings_fields('hms-admin-settings-group'); ?>
            <?php do_settings_sections('hms-admin-settings-group'); ?>
            <table class="form-table">
                <?php 
                $get_settings = get_option('hms_admin_settings');
                if (!is_array($get_settings)) {
                    $get_settings = array();
                }

                $all_options_array = [
                    'dashboard_link' => 'select',
                    'profile_link' => 'select',
                    'members_link' => 'select',
                    'contacts_link' => 'select',
                    'insurance_link' => 'select',
                    'non_loggedin_redirect' => 'select',
                    'loggedin_redirect' => 'select',
                ];

                // Fetch all pages
                $pages = get_pages();
                function hms_create_dropdown($name, $selected_value, $pages) {
                    echo '<select name="hms_admin_settings[' . $name . ']" id="' . $name . '">';
                    echo '<option value="">Select a page</option>';
                    foreach ($pages as $page) {
                        $page_slug = get_post_field('post_name', $page->ID);
                        $selected = ($selected_value == $page_slug) ? 'selected="selected"' : '';
                        echo '<option value="' . $page_slug . '" ' . $selected . '>' . esc_html($page->post_title) . '</option>';
                    }
                    echo '</select>';
                }
                ?>

                <?php foreach ($all_options_array as $key => $value): ?>
                <tr valign="top">
                    <th scope="row">
                        <label for="<?php echo esc_attr($key); ?>">
                            <?php echo esc_html(ucfirst(str_replace('_', ' ', $key))); ?>
                        </label>
                    </th>
                    <td>
                        <?php if ($value == 'select'): ?>
                            <?php 
                            $selected_value = isset($get_settings[$key]) ? $get_settings[$key] : '';
                            hms_create_dropdown($key, $selected_value, $pages); 
                            ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
<h1>NOTE: OR AUTOMATICALLY CREATE PAGES WITH SHORTCODES</h1>
<ol>
    <li>User Activation</li>
    <li>Forgot password and password reset</li>
    <li>Automatic page creation</li>
    <li>Admin Dashboard: View statistics and reports.</li>
    <li>Patient Management: Registration, admission, discharge, and transfer of patients.</li>
    <li>Doctor Management: Managing doctor's schedules, assignments, and availability.</li>
    <li>Appointment Scheduling: Booking and managing patient appointments with doctors.</li>
    <li>Billing and Invoicing: Handling patient billing, invoicing, and payment tracking.</li>
    <li>Pharmacy Management: Managing medicine stocks, prescriptions, and dispensation.</li>
    <li>Laboratory Management: Recording and managing lab tests and results.</li>
    <li>Administrative Tools: User management, reporting, and system configuration.</li>
</ol>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function hms_register_settings() {
    register_setting('hms-admin-settings-group', 'hms_admin_settings');
}
add_action('admin_init', 'hms_register_settings');
?>
