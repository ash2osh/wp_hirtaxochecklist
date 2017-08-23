<?php

/*
 * Plugin Name: hierarchical taxomonies checklist checking
 * Description: A simple WordPress plugin that allows hierarchical taxomonies checkboxes checking
 * Version: 1.0
 * Author: ash2osh
 * Author URI: http://ash2osh.com
 * Text Domain: hirtaxochecklist
 */
define('HTC_PLUGIN_URL', __FILE__);

include_once 'settings.php';

add_action('admin_init', 'htc_admin_int');

function htc_admin_int() {
    wp_register_script(
            'hirtaxochecklist_main', plugins_url('/main.js', HTC_PLUGIN_URL), array('jquery'), '1.0.0', true
    );
    wp_enqueue_script('hirtaxochecklist_main');

    $options = get_option('htc_settings');
    $checkslists = '';
    if (!empty($options) && isset($options['htc_select_field_0']) && !empty($options['htc_select_field_0'])) {
        foreach ($options['htc_select_field_0'] as $op) {
            $checkslists .= ',#' . $op . 'checklist';
        }
        $checkslists = trim($checkslists, ',');
    }
    $php_vars = array(
        'siteurl' => get_option('siteurl'),
        'checkslists' => $checkslists
    );
    wp_localize_script('hirtaxochecklist_main', 'HTCVAR', $php_vars);
}
