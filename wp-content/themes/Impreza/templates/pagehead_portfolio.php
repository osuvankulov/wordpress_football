<?php
if (in_array(rwmb_meta('us_titlebar'), array('', 'caption_only'))) {
	$color_class = $background_styles = '';
	if (in_array(rwmb_meta('us_titlebar_color'), array('primary', 'alternate', 'secondary'))) {
		$color_class = ' color_'.rwmb_meta('us_titlebar_color');
	}
	$titlebar_image = '';
	if (rwmb_meta('us_titlebar_image') != '')
	{
		$titlebar_img_id = preg_replace('/[^\d]/', '', rwmb_meta('us_titlebar_image'));
		$titlebar_img = wpb_getImageBySize(array('attach_id' => $titlebar_img_id, 'thumb_size' => 'full' ));

		if ( $titlebar_img != NULL )
		{
			$titlebar_img = wp_get_attachment_image_src($titlebar_img_id, 'full');
			$titlebar_image = $titlebar_img[0];
		}
	}
	if ($titlebar_image != '')
	{
		$background_styles =  'background-image: url('.$titlebar_image.');';

		if (rwmb_meta('us_titlebar_image_stretch') == 'stretch') {
			$background_styles .= ' background-size: cover;';
		}
	}

    $header_layout_type = (@$smof_data['header_layout_type'] == 'Compact')?' type_row':'';
    if (@$smof_data['header_layout_type'] == 'Ultra Compact') {
        $header_container_layout_type = ' size_small';
        $header_layout_type = ' type_row';
    }


    if (rwmb_meta('us_header_layout_type') == 'Ultra Compact') {
        $header_container_layout_type = ' size_small';
        $header_layout_type = ' type_row';
    } elseif (rwmb_meta('us_header_layout_type') == 'Compact') {
        $header_container_layout_type = '';
        $header_layout_type = ' type_row';
    } elseif (rwmb_meta('us_header_layout_type') == 'Large') {
        $header_container_layout_type = '';
        $header_layout_type = '';
    }
	?>
	<div class="l-submain for_pagehead<?php echo $color_class.$header_container_layout_type; ?>"<?php echo  ($background_styles != '')?' style="'.$background_styles.'"':''; ?>>
		<div class="l-submain-h g-html i-cf">
			<div class="w-pagehead<?php echo $header_layout_type; ?>">
				<h1><?php the_title(); ?></h1>
				<p><?php echo rwmb_meta('us_subtitle') ?></p>
				<?php if (rwmb_meta('us_titlebar') == '') { ?>
				<div class="w-pagehead-nav">
					<div class="w-pagehead-nav-h">
					<?php
					$prev_item = get_next_post(false);
					$next_item = get_previous_post(false);

					if( ! empty($prev_item)) {
						?>
						<a class="w-pagehead-nav-item type_prev" href="<?php echo get_permalink($prev_item->ID); ?>" title="<?php echo get_the_title($prev_item->ID); ?>"><i class="fa fa-chevron-left"></i></a>
						<?php
					}
					if( ! empty($next_item)) {
						?>
						<a class="w-pagehead-nav-item type_next" href="<?php echo get_permalink($next_item->ID); ?>" title="<?php echo get_the_title($next_item->ID); ?>"><i class="fa fa-chevron-right"></i></a>
						<?php
					}
					?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php
}
