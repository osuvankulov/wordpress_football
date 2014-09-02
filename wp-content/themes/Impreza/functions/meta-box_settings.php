<?php

$prefix = 'us_';

$slider_revolution = array(0 => 'No Slider');


$header_titlebar_fileds = array (
	array(
		'name'		=> 'Title Bar Content',
		'id'		=> $prefix . "titlebar",
		'type'		=> 'select',
		'options'	=> array(
			'' => 'Captions and Breadcrumbs',
			'caption_only' => 'Captions only',
			'hide' => 'Hide',
		),
	),
	array(
		'name'		=> 'Title Bar Size',
		'id'		=> $prefix . "header_layout_type",
		'type'		=> 'select',
		'options'	=> array(
			'' => 'Default (set at Theme Options)',
			'Large' => 'Large',
            'Compact' => 'Compact',
            'Ultra Compact' => 'Ultra Compact',
        ),
	),
	array(
		'name'		=> 'Small caption (shown next to Page Title)',
		'id'		=> $prefix . 'subtitle',
		'clone'		=> false,
		'type'		=> 'text',
		'std'		=> '',
//		'desc'		=> 'Small caption is shown next to Page Title',
	),
	array(
		'name'		=> 'Title Bar Color Style',
		'id'		=> $prefix . "titlebar_color",
		'type'		=> 'select',
//		'desc'		=> 'Header takes more space. Use this when you want bigger image to show as Header Background. Active Slider always expands the header.',
		'options'	=> array(
			'' => 'Main Content (default)',
			'alternate' => 'Alternate Content',
			'primary' => 'Primary background & white text',
			'secondary' => 'Secondary background & white text',
		),
	),
	array(
		'name'		=> 'Title Bar Background Image',
		'id'		=> $prefix . "titlebar_image",
		'type'		=> 'image_advanced',
		'max_file_uploads'	=> 1,

	),
	array(
		'name'		=> 'Title Bar Background Image Size',
		'id'		=> $prefix . "titlebar_image_stretch",
		'type'		=> 'select',
		'options'	=> array(
			'' => 'Default',
			'stretch' => 'Stretch to 100% width',
//				'hide' => 'Hide',
		),
//			'desc'		=> 'Stretch the loaded image to 100% width',
	),

);

$footer_fields = array(

	array(
		'name'		=> 'Diplay the Subfooter Widgets',
		'id'		=> $prefix . "show_subfooter_widgets",
		'type'		=> 'select',
		'options'	=> array(
			'' => 'Default (set at Theme Options)',
			'yes' => 'Show',
			'no' => 'Hide',
		),
	),
	array(
		'name'		=> 'Diplay the Footer (copyright and menu)',
		'id'		=> $prefix . "show_footer",
		'type'		=> 'select',
		'options'	=> array(
			'' => 'Default (set at Theme Options)',
			'yes' => 'Show',
			'no' => 'Hide',
		),
	),

);


$meta_boxes[] = array(
	'id' => 'impeza_page_portfolio_header_settings',
	'title' => 'Title Bar Settings',
	'pages' => array('page', 'us_portfolio'),
	'context' => 'side',
	'priority' => 'default',

	// List of meta fields
	'fields' => $header_titlebar_fileds,
);

if (in_array( 'bbpress/bbpress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    $meta_boxes[] = array(
        'id' => 'impeza_forum_header_settings',
        'title' => 'Title Bar Settings',
        'pages' => array('forum', 'topic'),
        'context' => 'side',
        'priority' => 'default',

        // List of meta fields
        'fields' => $header_titlebar_fileds,
    );
}


$meta_boxes[] = array(
	'id' => 'client_settings',
	'title' => 'Client Settings',
	'pages' => array('us_client'),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> 'Client URL',
			'id'		=> $prefix . 'client_url',
			'type'		=> 'text',
			'std'		=> '',
		),
		array(
			'name'		=> 'Open URL in new Tab',
			'id'		=> $prefix . "client_new_tab",
			'type'		=> 'checkbox',
			'std'		=> false,
		),
	),
);





$meta_boxes[] = array(
	'id' => 'portfolio_layout_settings',
	'title' => 'Portfolio Item Settings',
	'pages' => array('us_portfolio'),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
	    array(
            'name'		=> 'Additional Image on hover (optional)',
            'id'		=> $prefix . "additional_image",
            'type'		=> 'image_advanced',
            'max_file_uploads'	=> 1,

        ),
        array(
            'name'		=> 'Open Portfolio Image in Lightbox',
            'id'		=> $prefix . "lightbox",
            'type'		=> 'checkbox',
            'std'		=> false,
        ),
        array(
            'name'		=> 'Custom Project Link',
            'id'		=> $prefix . 'custom_link',
            'type'		=> 'text',
            'std'		=> '',
        ),
        array(
            'name'		=> 'Custom Project Link Target',
            'id'		=> $prefix . "custom_link_blank",
            'type'		=> 'checkbox',
            'desc'		=> 'Open Custom Project Link in new Tab (Window)',

        ),
    ),

);

$meta_boxes[] = array(
	'id' => 'impeza_common_footer_settings',
	'title' => 'Footer Settings',
	'pages' => array( 'post', 'page', 'us_portfolio'),
	'context' => 'side',
	'priority' => 'default',

	// List of meta fields
	'fields' => $footer_fields

);

function us_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'us_register_meta_boxes' );