<?php
/**
 * Plugin Name: Sosh Share Buttons
 * Plugin URI: #https://github.com/abage26/wp_sosh_plugin
 * Description: Social sharing buttons plugin for <strong>sharing an article or a page on social networks.</strong>
 * Version: 1.1.0
 * Requires PHP: 7.0
 * Author: Arthura
 * Author URI: https://github.com/abage26
 * License: GPLv2 or later
 * Text Domain: sosh-share-buttons
 */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();
define('SOSH_PLUGIN_FILE', __FILE__ );
define('SOSH_PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('SOSH_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define('SOSH_OPTIONS_NAME', 'sosh_share_buttons_options' );

if (file_exists(SOSH_PLUGIN_DIR . '/inc/inc.php'))
    include_once (SOSH_PLUGIN_DIR . '/inc/inc.php');

if (file_exists(SOSH_PLUGIN_DIR . 'sosh.class.php'))
    include_once( SOSH_PLUGIN_DIR . 'sosh.class.php' );
new Sosh_share_buttons();

register_activation_hook(__FILE__, ['sosh_share_buttons','sosh_share_buttons_install']);