<?php
$post = get_post();

static $instance = 0;
$instance++;

if ( ! empty( $atts['ids'] ) )
{
	// 'ids' is explicitly ordered, unless you specify otherwise.
	if ( empty( $atts['orderby'] ) )
	{
		$atts['orderby'] = 'post__in';
	}
	$atts['include'] = $atts['ids'];
}

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $atts['orderby'] ) )
{
	$atts['orderby'] = sanitize_sql_orderby( $atts['orderby'] );
	if ( !$atts['orderby'] )
	{
		unset( $atts['orderby'] );
	}
}

extract(shortcode_atts(array(
	'order'      => 'ASC',
	'orderby'    => 'menu_order ID',
	'id'         => $post->ID,
	'itemtag'    => 'dl',
	'icontag'    => 'dt',
	'captiontag' => 'dd',
	'columns'    => 3,
	'type'       => 's',
	'include'    => '',
	'exclude'    => ''
), $atts));

if ( ! in_array($type, array('xs', 's', 'm', 'l', 'masonry',))) {
	$type = "s";
}

$size = 'gallery-'.$type;
if ($type == 'masonry') {
	$type_classes = ' type_masonry';
} else {
	$type_classes = ' layout_tile size_'.$type;
}


$id = intval($id);
if ( 'RAND' == $order )
{
	$orderby = 'none';
}

if ( !empty($include) )
{
	$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

	$attachments = array();
	if (is_array($_attachments))
	{
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	}
}
elseif ( !empty($exclude) )
{
	$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}
else
{
	$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
}

if ( empty($attachments) )
{
	return '';
}

if ( is_feed() )
{
	$output = "\n";
	if (is_array($attachments))
	{
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	}
	return $output;
}


$output = '<div class="w-gallery'.$type_classes.'"><div class="w-gallery-tnails">';

$i = 1;
if (is_array($attachments))
{
	foreach ( $attachments as $id => $attachment ) {


		$title = trim(strip_tags( get_post_meta($id, '_wp_attachment_image_alt', true) ));
		if (empty($title))
		{
			$title = trim(strip_tags( $attachment->post_excerpt )); // If not, Use the Caption
		}
		if (empty($title ))
		{
			$title = trim(strip_tags( $attachment->post_title )); // Finally, use the title
		}

		$output .= '<a class="w-gallery-tnail order_'.$i.'" href="'.wp_get_attachment_url($id).'" title="'.$title.'">';
		$output .= '<span class="w-gallery-tnail-h">';
		$output .= wp_get_attachment_image( $id, $size, 0 );
		$output .= '<span class="w-gallery-tnail-title"></span>';

		$output .= '</span>';
		$output .= '</a>';

		$i++;

	}
}

$output .= "</div></div>";

echo $output;