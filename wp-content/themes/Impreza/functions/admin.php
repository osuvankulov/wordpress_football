<?php

function us_enqueue_editor_style() {

	add_editor_style( 'functions/tinymce/mce_styles.css' );
}

add_action('init', 'us_enqueue_editor_style');

function us_theme_activation()
{
	global $pagenow;
	if (is_admin() && $pagenow == 'themes.php' && isset($_GET['activated']))
	{
		header( 'Location: '.admin_url().'themes.php?page=optionsframework' ) ;
	}
}

add_action('admin_init','us_theme_activation');

// TinyMCE buttons
function us_enqueue_admin_css() {
    wp_enqueue_style( 'us-tinymce-buttons', get_template_directory_uri() . '/functions/tinymce/buttons.css' );
    wp_enqueue_style( 'us-composer', get_template_directory_uri() . '/vc_templates/css/us.js_composer.css' );
}

add_action( 'admin_print_scripts', 'us_enqueue_admin_css', 12);

if ( ! function_exists('us_is_vc_fe')) {
    function us_is_vc_fe() {
        if (function_exists('vc_mode') AND in_array(vc_mode(), array('page_editable', 'admin_frontend_editor', 'admin_page'))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}