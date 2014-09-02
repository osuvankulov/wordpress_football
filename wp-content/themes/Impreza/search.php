<?php
define('THEME_TEMPLATE', TRUE);
global $smof_data, $us_shortcodes;
define('IS_BLOG', TRUE);
if ($smof_data['blog_sidebar_pos'] == 'No Sidebar') {
	define('IS_FULLWIDTH', TRUE);
}
get_header();

// Disabling Section shortcode
global $disable_section_shortcode;
$disable_section_shortcode = TRUE;
?>
	<div class="l-submain for_pagehead">
		<div class="l-submain-h g-html i-cf">
			<div class="w-pagehead">
				<h1><?php echo __('Search Results for', 'us').' "'.esc_attr($s).'"'; ?></h1>
				<p></p>

			</div>
		</div>
	</div>
	<div class="l-submain">
		<div class="l-submain-h g-html i-cf">
			<div class="l-content">
			
				<?php if (have_posts()) : ?>
				<div class="w-blog meta_authorcomments">
					<div class="w-blog-h">
						<div class="w-blog-list">

							<?php while (have_posts()) : the_post(); ?>

								<div class="w-blog-entry">
									<div class="w-blog-entry-h">
										<a class="w-blog-entry-link" href="<?php the_permalink(); ?>">
											<h2 class="w-blog-entry-title">
												<span class="w-blog-entry-title-h"><?php the_title(); ?></span>
											</h2>
										</a>
										<div class="w-blog-entry-body">
											<div class="w-blog-entry-meta">
												<div class="w-blog-entry-meta-date">
													<i class="fa fa-clock-o"></i>
                                                    <span><?php echo get_the_date() ?></span>
												</div>



												<div class="w-blog-entry-meta-tags">
													<i class="fa fa-folder-open"></i>
													<?php the_category(', '); ?>
												</div>

												<div class="w-blog-entry-meta-comments">
													<?php if ( ! (get_comments_number() == 0 AND ! comments_open() AND ! pings_open())) { echo '<i class="fa fa-comments"></i>'; }  ?>
													<?php comments_popup_link(__('No Comments', 'us'), __('1 Comment', 'us'), __('% Comments', 'us'), 'w-blog-entry-meta-comments-h', ''); ?>
												</div>
											</div>

											<div class="w-blog-entry-short">
												<?php
												$excerpt = trim(get_the_excerpt());
												if(!empty($excerpt))
												{
													the_excerpt();
												}
												else
												{
													$excerpt = apply_filters('the_content', get_the_content());
													$excerpt = apply_filters('the_excerpt', $excerpt);
													$excerpt = str_replace(']]>', ']]&gt;', $excerpt);
													$excerpt_length = apply_filters('excerpt_length', 55);
													$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
													$excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
													echo $excerpt;
												}
												?>
											</div>


										</div>
									</div>
								</div>

							<?php endwhile; ?>

						</div>
					</div>
				</div>
				<?php if (function_exists('us_pagination') AND $pagination = us_pagination()) { ?>
					<div class="w-blog-pagination">
						<div class="g-pagination">
							<?php echo $pagination ?>
						</div>
					</div>
				<?php } else  { ?>
					<div class="w-blog-pagination">
						<div class="g-pagination">
							<?php posts_nav_link(' ', '<span class="g-pagination-item to_prev">&laquo; Prev</span>',  '<span class="g-pagination-item to_next">Next &raquo;</span>'); ?>
						</div>
					</div>
				<?php } ?>
				<?php else : ?>
					<?php _e('No posts were found.', 'us'); ?>
				<?php endif; ?>

			</div>
			<div class="l-sidebar at_left">
				<?php if ($smof_data['blog_sidebar_pos'] != 'Right') dynamic_sidebar('default_sidebar'); ?>
			</div>

			<div class="l-sidebar at_right">
				<?php if ($smof_data['blog_sidebar_pos'] == 'Right') dynamic_sidebar('default_sidebar'); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>