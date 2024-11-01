<?php

function sosh_vdump_pre($data = ''){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function sosh_get_current_page_url() {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    return $actual_link;
}

add_action( 'wp_ajax_modal_action', 'ajax_modal' );
add_action( 'wp_ajax_nopriv_modal_action', 'ajax_modal' );
function ajax_modal(){
    if (!isset($_SESSION['sosh_visitor'])) {
        $_SESSION['sosh_visitor'] = 1;
    }

    if($_SESSION['sosh_visitor'] === 1) {
        $_SESSION['sosh_visitor'] = 2;
        wp_send_json_success();
    }

    if ($_SESSION['sosh_visitor'] === 2) {
        $_SESSION['sosh_visitor'] = 3;
        wp_send_json_success();
    }

    wp_send_json_error();

    wp_die();
}

add_action( 'wp_ajax_sosh_uninstal_action', 'ajax_sosh_uninstal' );
add_action( 'wp_ajax_nopriv_sosh_uninstal_action', 'ajax_sosh_uninstal' );
function ajax_sosh_uninstal(){

    if (isset($_POST['sosh_deactivate_remove_data']) && $_POST['sosh_deactivate_remove_data'])
        delete_option( SOSH_OPTIONS_NAME );

    wp_die();
}
//vdump_pre($_SESSION);
