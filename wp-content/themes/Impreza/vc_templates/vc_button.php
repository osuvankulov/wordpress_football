<?php
$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = '';
$attributes = shortcode_atts(array(
	'text' => '',
	'url' => '',
	'target' => '',
	'type' => 'default',
	'outlined' => false,
	'size' => '',
	'icon' => '',
	'align' => 'left',
), $atts);
//$a_class = '';
//
//if ( $el_class != '' ) {
//    $tmp_class = explode(" ", strtolower($el_class));
//    $tmp_class = str_replace(".", "", $tmp_class);
//    if ( in_array("prettyphoto", $tmp_class) ) {
//        wp_enqueue_script( 'prettyphoto' );
//        wp_enqueue_style( 'prettyphoto' );
//        $a_class .= ' prettyphoto';
//        $el_class = str_ireplace("prettyphoto", "", $el_class);
//    }
//    if ( in_array("pull-right", $tmp_class) && $href != '' ) { $a_class .= ' pull-right'; $el_class = str_ireplace("pull-right", "", $el_class); }
//    if ( in_array("pull-left", $tmp_class) && $href != '' ) { $a_class .= ' pull-left'; $el_class = str_ireplace("pull-left", "", $el_class); }
//}
//
//if ( $target == 'same' || $target == '_self' ) { $target = ''; }
//$target = ( $target != '' ) ? ' target="'.$target.'"' : '';
//
//$color = ( $color != '' ) ? ' wpb_'.$color : '';
//$size = ( $size != '' && $size != 'wpb_regularsize' ) ? ' wpb_'.$size : ' '.$size;
//$icon = ( $icon != '' && $icon != 'none' ) ? ' '.$icon : '';
//$i_icon = ( $icon != '' ) ? ' <i class="icon"> </i>' : '';
//$position = ( $position != '' ) ? ' '.$position.'-button-position' : '';

//$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_button '.$color.$size.$icon.$el_class.$position, $this->settings['base']);
//
//if ( $href != '' ) {
//    $output .= '<span class="'.$css_class.'">'.$title.$i_icon.'</span>';
//    $output = '<a class="wpb_button_a'.$a_class.'" title="'.$title.'" href="'.$href.'"'.$target.'>' . $output . '</a>';
//} else {
//    $output .= '<button class="'.$css_class.'">'.$title.$i_icon.'</button>';
//
//}

$icon_part = '';
if ($attributes['icon'] != '') {
	$icon_part = '<i class="fa fa-'.$attributes['icon'].'"></i>';
}

$output = '<span class="wpb_button align_'.$attributes['align'].'"><a href="'.$attributes['url'].'"';
$output .= ($attributes['target'] == '_blank')?' target="_blank"':'';
$output .= ' class="g-btn';
$output .= ($attributes['type'] != '')?' color_'.$attributes['type']:'';
$output .= ($attributes['size'] != '')?' size_'.$attributes['size']:'';
$output .= ($attributes['outlined'] == 1 OR $attributes['outlined'] == 'yes')?' outlined':'';
$output .= ($el_class != '')?' '.$el_class:'';
$output .= '"><span>'.$icon_part.$attributes['text'].'</span></a></span>';

echo $output . "\n";