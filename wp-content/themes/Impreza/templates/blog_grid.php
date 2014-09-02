<?php global $smof_data, $us_thumbnail_size; ?><div class="w-blog type_masonry imgpos_attop meta_comments more_hidden">
	<div class="w-blog-list">

		<?php
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('paged='.$paged.'&post_type=post');
		$max_num_pages = $wp_query->max_num_pages;
		while ($wp_query->have_posts())
		{
			$wp_query->the_post();
			$us_thumbnail_size = 'blog-grid';
			get_template_part('templates/blog_single_post');
		}
		?>

	</div>
</div>
<?php
if ($max_num_pages > 1) {
?>
<script type="text/javascript">
var page = 1,
	max_page = <?php echo $max_num_pages ?>;
jQuery(document).ready(function(){
	jQuery("#grid_load_more").click(function(){
		jQuery(this).hide();
		jQuery('#spinner').show();
		jQuery.ajax({
			type: 'POST',
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			data: {
				action: 'gridPagination',
				page: page+1
			},
			success: function(data, textStatus, XMLHttpRequest){
				page++;

				var newItems = jQuery('<div>', {html:data}),
					blogList = jQuery('.w-blog-list');

				newItems.imagesLoaded(function() {
					newItems.children().each(function(childIndex,child){
						blogList.append(jQuery(child)).isotope('appended', jQuery(child), function(){
							blogList.isotope('reLayout');

						});
					});
				});

				jQuery('#spinner').hide();
				if (max_page > page) {
					jQuery("#grid_load_more").show();
				}

			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				jQuery('#spinner').hide();
				jQuery(this).show();
			}
		});
	});
});
</script>
<div class="w-blog-load">
	<a href="javascript:void(0);" id="grid_load_more" class="w-blog-entry-more g-btn color_contrast outlined size_small"><span><?php echo __('Load More Posts', 'us') ?></span></a>
	<img id="spinner" src="<?php echo get_template_directory_uri() ?>/img/loader.gif">
</div>
<?php
}
wp_reset_postdata();
$wp_query= $temp;