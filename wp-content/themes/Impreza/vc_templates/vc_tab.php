<?php
$attributes = shortcode_atts(
	array(
		'title' => '',
		'active' => false,
		'icon' => '',
	), $atts);

global $first_tab, $auto_open, $is_timeline;
if ($auto_open) {
//	$active_class = ($first_tab)?' active':'';
	$first_tab = FALSE;
}

$active_class = ($attributes['active'] == 1 OR $attributes['active'] == 'yes')?' active':'';

if ($is_timeline) {

	$output = 	'<div class="w-timeline-section'.$active_class.'">
					<div class="w-timeline-section-title">
						<span class="w-timeline-section-title-text">'.$attributes['title'].'</span>
					</div>
					<div class="w-timeline-section-content">
						'.do_shortcode($content).'
					</div>
				</div>';
} else {

	$icon_class = ($attributes['icon'] != '')?' fa fa-'.$attributes['icon']:'';
	$item_icon_class = ($attributes['icon'] != '')?' with_icon':'';

	$output = 	'<div class="w-tabs-section'.$active_class.$item_icon_class.'">'.
		'<div class="w-tabs-section-header">'.
		'<span class="w-tabs-section-icon'.$icon_class.'"></span>'.
		'<h4 class="w-tabs-section-title">'.$attributes['title'].'</h4>'.
		'<span class="w-tabs-section-control"><i class="fa fa-angle-down"></i></span>'.
		'</div>'.
		'<div class="w-tabs-section-content">'.
		'<div class="w-tabs-section-content-h">'.
		do_shortcode($content).
		'</div>'.
		'</div>'.
		'</div>';
}

echo $output;