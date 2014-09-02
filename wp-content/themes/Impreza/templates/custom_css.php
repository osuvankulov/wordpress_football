<?php
global $smof_data, $output_styles_to_file;

if ($smof_data['body_text_font'] == '' OR $smof_data['body_text_font'] == 'none') {
	$smof_data['body_text_font'] = 'Open Sans';
}
if ($smof_data['navigation_font'] == '' OR $smof_data['navigation_font'] == 'none') {
	$smof_data['navigation_font'] = 'Open Sans';
}
if ($smof_data['heading_font'] == '' OR $smof_data['heading_font'] == 'none') {
	$smof_data['heading_font'] = 'Noto Sans';
}

if ($smof_data['heading_weight'] == 'Light (300) font weight') {
	$smof_data['heading_weight'] = '300';
} elseif ($smof_data['heading_weight'] == 'Bold (700) font weight') {
	$smof_data['heading_weight'] = '700';
} elseif ($smof_data['heading_weight'] == 'Semi-bold (600) font weight') {
	$smof_data['heading_weight'] = '600';
} else {
    $smof_data['heading_weight'] = '400';
}

if ($smof_data['body_text_weight'] == 'Light (300) font weight') {
	$smof_data['body_text_weight'] = '300';
} elseif ($smof_data['body_text_weight'] == 'Bold (700) font weight') {
	$smof_data['body_text_weight'] = '700';
} elseif ($smof_data['body_text_weight'] == 'Semi-bold (600) font weight') {
	$smof_data['body_text_weight'] = '600';
} else {
    $smof_data['body_text_weight'] = '400';
}

if ($smof_data['navigation_weight'] == 'Light (300) font weight') {
	$smof_data['navigation_weight'] = '300';
} elseif ($smof_data['navigation_weight'] == 'Bold (700) font weight') {
	$smof_data['navigation_weight'] = '700';
} elseif ($smof_data['navigation_weight'] == 'Semi-bold (600) font weight') {
	$smof_data['navigation_weight'] = '600';
} else {
    $smof_data['navigation_weight'] = '400';
}

if (empty($smof_data['nav_fontsize'])) {
    $smof_data['nav_fontsize'] = 16;
}
if (empty($smof_data['subnav_fontsize'])) {
    $smof_data['subnav_fontsize'] = 14;
}
if (empty($smof_data['nav_fontsize_mobile'])) {
    $smof_data['nav_fontsize_mobile'] = 16;
}
if (empty($smof_data['subnav_fontsize_mobile'])) {
    $smof_data['subnav_fontsize_mobile'] = 14;
}

if (empty($smof_data['regular_fontsize'])) {
    $smof_data['regular_fontsize'] = 14;
}
if (empty($smof_data['regular_lineheight'])) {
    $smof_data['regular_lineheight'] = 24;
}
if (empty($smof_data['regular_fontsize_mobile'])) {
    $smof_data['regular_fontsize_mobile'] = 13;
}
if (empty($smof_data['regular_lineheight_mobile'])) {
    $smof_data['regular_lineheight_mobile'] = 21;
}

if (empty($smof_data['h1_fontsize'])) {
    $smof_data['h1_fontsize'] = 38;
}
if (empty($smof_data['h2_fontsize'])) {
    $smof_data['h2_fontsize'] = 32;
}
if (empty($smof_data['h3_fontsize'])) {
    $smof_data['h3_fontsize'] = 26;
}
if (empty($smof_data['h4_fontsize'])) {
    $smof_data['h4_fontsize'] = 22;
}
if (empty($smof_data['h5_fontsize'])) {
    $smof_data['h5_fontsize'] = 20;
}
if (empty($smof_data['h6_fontsize'])) {
    $smof_data['h6_fontsize'] = 18;
}
if (empty($smof_data['h1_fontsize_mobile'])) {
    $smof_data['h1_fontsize_mobile'] = 30;
}
if (empty($smof_data['h2_fontsize_mobile'])) {
    $smof_data['h2_fontsize_mobile'] = 26;
}
if (empty($smof_data['h3_fontsize_mobile'])) {
    $smof_data['h3_fontsize_mobile'] = 22;
}
if (empty($smof_data['h4_fontsize_mobile'])) {
    $smof_data['h4_fontsize_mobile'] = 20;
}
if (empty($smof_data['h5_fontsize_mobile'])) {
    $smof_data['h5_fontsize_mobile'] = 18;
}
if (empty($smof_data['h6_fontsize_mobile'])) {
    $smof_data['h6_fontsize_mobile'] = 16;
}
if (empty($output_styles_to_file) OR $output_styles_to_file == FALSE) {
?>
<style id="us_fonts_inline">
<?php } ?>
body {
	font-family: '<?php echo $smof_data['body_text_font']; ?>';
	font-size: <?php echo $smof_data['regular_fontsize']; ?>px;
	line-height: <?php echo $smof_data['regular_nav_lineheight']; ?>px;
	font-weight: <?php echo $smof_data['body_text_weight'] ?>;
	}
	
.l-header .w-nav-item {
	font-family: '<?php echo $smof_data['navigation_font']; ?>';
	font-weight: <?php echo $smof_data['navigation_weight'] ?>;
	}
.l-header .touch_disabled .w-nav-anchor.level_1,
.touch_disabled [class*="columns"] .has_sublevel .w-nav-anchor.level_2 {
	font-size: <?php echo $smof_data['nav_fontsize']; ?>px;
	}
.l-header .touch_disabled .w-nav-anchor.level_2,
.l-header .touch_disabled .w-nav-anchor.level_3 {
	font-size: <?php echo $smof_data['subnav_fontsize']; ?>px;
	}
.l-header .touch_enabled .w-nav-anchor.level_1 {
	font-size: <?php echo $smof_data['nav_fontsize_mobile']; ?>px;
	}
.l-header .touch_enabled .w-nav-anchor.level_2,
.l-header .touch_enabled .w-nav-anchor.level_3 {
	font-size: <?php echo $smof_data['subnav_fontsize_mobile']; ?>px;
	}

h1, h2, h3, h4, h5, h6,
.w-counter-number,
.w-pricing-item-title,
.w-pricing-item-price,
.w-shortblog-entry-meta-date-day,
.tp-caption.impreza_white_huge,
.tp-caption.impreza_white_big,
.tp-caption.impreza_dark_huge,
.tp-caption.impreza_dark_big {
	font-family: '<?php echo $smof_data['heading_font']; ?>';
	font-weight: <?php echo $smof_data['heading_weight']; ?>;
	}
h1 {
	font-size: <?php echo $smof_data['h1_fontsize']; ?>px;
	}
h2 {
	font-size: <?php echo $smof_data['h2_fontsize']; ?>px;
	}
h3 {
	font-size: <?php echo $smof_data['h3_fontsize']; ?>px;
	}
h4, .widgettitle, .comment-reply-title {
	font-size: <?php echo $smof_data['h4_fontsize']; ?>px;
	}
h5, .w-portfolio-item-title {
	font-size: <?php echo $smof_data['h5_fontsize']; ?>px;
	}
h6 {
	font-size: <?php echo $smof_data['h6_fontsize']; ?>px;
	}
@media only screen and (max-width: 767px) {
body {
	font-size: <?php echo $smof_data['regular_fontsize_mobile']; ?>px;
	line-height: <?php echo $smof_data['regular_lineheight_mobile']; ?>px;
	}
h1 {
	font-size: <?php echo $smof_data['h1_fontsize_mobile']; ?>px;
	}
h2 {
	font-size: <?php echo $smof_data['h2_fontsize_mobile']; ?>px;
	}
h3 {
	font-size: <?php echo $smof_data['h3_fontsize_mobile']; ?>px;
	}
h4, .widgettitle, .comment-reply-title {
	font-size: <?php echo $smof_data['h4_fontsize_mobile']; ?>px;
	}
h5, .w-portfolio-item-title {
	font-size: <?php echo $smof_data['h5_fontsize_mobile']; ?>px;
	}
h6 {
	font-size: <?php echo $smof_data['h6_fontsize_mobile']; ?>px;
	}
}
<?php
if (empty($output_styles_to_file) OR $output_styles_to_file == FALSE) {
?>
</style>
<style id="us_colors_inline">
<?php
}
?>
/*************************** BODY ***************************/

/* Body Background Color */
.l-body {
	background-color: <?php echo ($smof_data['body_bg'] != '')?$smof_data['body_bg']:'#eee'; ?>;
	}

/*************************** HEADER ***************************/

/* Header Background Color */
.l-subheader.at_middle,
.l-subheader.at_middle .w-nav.touch_enabled .w-nav-list.level_1,
.l-subheader.at_middle .w-lang-list {
	background-color: <?php echo ($smof_data['header_bg'] != '')?$smof_data['header_bg']:'#fff'; ?>;
	}
	
/* Header Text Color */
.w-logo-link,
.l-subheader.at_middle .w-nav-control,
.l-subheader.at_middle .w-nav-anchor.level_1,
.l-subheader.at_middle .w-nav.touch_enabled .w-nav-anchor.level_1,
.l-subheader.at_middle .w-cart-link,
.l-subheader.at_middle .w-search-show,
.l-subheader.at_middle .w-contacts,
.l-subheader.at_middle .w-contacts-item-value a,
.l-subheader.at_middle .w-socials-item-link,
.l-subheader.at_middle .w-lang-list .w-lang-item,
.l-subheader.at_middle .w-lang-current {
	color: <?php echo ($smof_data['header_text'] != '')?$smof_data['header_text']:'#666'; ?>;
	}
	
/* Header Text Hover Color */
.no-touch .w-logo-link:hover,
.l-subheader.at_middle .w-nav.touch_enabled .w-nav-item.level_1.active .w-nav-anchor.level_1,
.l-subheader.at_middle .w-nav.touch_enabled .w-nav-item.level_1.current-menu-item .w-nav-anchor.level_1,
.l-subheader.at_middle .w-nav.touch_enabled .w-nav-item.level_1.current-menu-ancestor .w-nav-anchor.level_1,
.no-touch .l-subheader.at_middle .w-nav.touch_enabled .w-nav-item.level_1:hover .w-nav-anchor.level_1,
.no-touch .l-subheader.at_middle .w-cart-link:hover,
.no-touch .l-subheader.at_middle .w-cart-quantity,
.no-touch .l-subheader.at_middle .w-search-show:hover,
.no-touch .l-subheader.at_middle .w-contacts-item-value a:hover,
.no-touch .l-subheader.at_middle .w-lang-list .w-lang-item:hover,
.no-touch .l-subheader.at_middle .w-lang-current:hover {
	color: <?php echo ($smof_data['header_text_hover'] != '')?$smof_data['header_text_hover']:'#d13a7a'; ?>;
	}

/* Extended Header Background Color */
.l-subheader.at_top,
.l-subheader.at_top .w-lang-list,
.l-subheader.at_bottom {
	background-color: <?php echo ($smof_data['header_ext_bg'] != '')?$smof_data['header_ext_bg']:'#f5f5f5'; ?>;
	}

/* Extended Header Text Color */
.l-subheader.at_top .w-contacts,
.l-subheader.at_top .w-contacts-item-value a,
.l-subheader.at_top .w-socials-item-link,
.l-subheader.at_top .w-lang-list .w-lang-item,
.l-subheader.at_top .w-lang-current,
.l-subheader.at_bottom .w-nav-control,
.l-subheader.at_bottom .w-nav-anchor.level_1,
.l-subheader.at_bottom .w-nav.touch_enabled .w-nav-anchor.level_1,
.l-subheader.at_bottom .w-cart-link,
.l-subheader.at_bottom .w-search-show {
	color: <?php echo ($smof_data['header_ext_text'] != '')?$smof_data['header_ext_text']:'#999'; ?>;
	}

/* Extended Header Text Hover Color */
.no-touch .l-subheader.at_top .w-contacts-item-value a:hover,
.no-touch .l-subheader.at_top .w-lang-list .w-lang-item:hover,
.no-touch .l-subheader.at_top .w-lang-current:hover,
.l-subheader.at_bottom .w-nav.touch_enabled .w-nav-item.level_1.active .w-nav-anchor.level_1,
.l-subheader.at_bottom .w-nav.touch_enabled .w-nav-item.level_1.current-menu-item .w-nav-anchor.level_1,
.l-subheader.at_bottom .w-nav.touch_enabled .w-nav-item.level_1.current-menu-ancestor .w-nav-anchor.level_1,
.no-touch .l-subheader.at_bottom .w-nav.touch_enabled .w-nav-item.level_1:hover .w-nav-anchor.level_1,
.no-touch .l-subheader.at_bottom .w-cart-link:hover,
.no-touch .l-subheader.at_bottom .w-cart-quantity,
.no-touch .l-subheader.at_bottom .w-search-show:hover {
	color: <?php echo ($smof_data['header_ext_text_hover'] != '')?$smof_data['header_ext_text_hover']:'#d13a7a'; ?>;
	}
	
/* Search Screen Background Color */
.l-subheader .w-search-form:before {
	background-color: <?php echo ($smof_data['search_bg'] != '')?$smof_data['search_bg']:'#d13a7a'; ?>;
	}

/* Search Screen Text Color */
.l-subheader .w-search-label,
.l-subheader .w-search-input input,
.l-subheader .w-search-close {
	color: <?php echo ($smof_data['search_text'] != '')?$smof_data['search_text']:'#fff'; ?>;
	}
	
/*************************** MAIN MENU ***************************/

/* Menu Hover Background Color */
.no-touch .l-header .w-nav-item.level_1:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.active:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.current-menu-item:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.current-menu-ancestor:hover .w-nav-anchor.level_1 {
	background-color: <?php echo ($smof_data['menu_hover_bg'] != '')?$smof_data['menu_hover_bg']:'#fff'; ?>;
	}

/* Menu Hover Text Color */
.no-touch .l-header .w-nav-item.level_1:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.active:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.current-menu-item:hover .w-nav-anchor.level_1,
.no-touch .l-header .w-nav-item.level_1.current-menu-ancestor:hover .w-nav-anchor.level_1 {
	color: <?php echo ($smof_data['menu_hover_text'] != '')?$smof_data['menu_hover_text']:'#d13a7a'; ?>;
	}
.w-nav-title:after {
	background-color: <?php echo ($smof_data['menu_hover_text'] != '')?$smof_data['menu_hover_text']:'#d13a7a'; ?>;
	}

/* Menu Active Background Color */
.l-header .w-nav-item.level_1.active .w-nav-anchor.level_1,
.l-header .w-nav-item.level_1.current-menu-item .w-nav-anchor.level_1,
.l-header .w-nav-item.level_1.current-menu-ancestor .w-nav-anchor.level_1 {
	background-color: <?php echo ($smof_data['menu_active_bg'] != '')?$smof_data['menu_active_bg']:'#fff'; ?>;
	}

/* Menu Active Text Color */
.l-header .w-nav-item.level_1.active .w-nav-anchor.level_1,
.l-header .w-nav-item.level_1.current-menu-item .w-nav-anchor.level_1,
.l-header .w-nav-item.level_1.current-menu-ancestor .w-nav-anchor.level_1 {
	color: <?php echo ($smof_data['menu_active_text'] != '')?$smof_data['menu_active_text']:'#d13a7a'; ?>;
	}
	
/* Dropdown Background Color */
.l-header .w-nav-anchor.level_2,
.l-header .w-nav-anchor.level_3,
.touch_disabled [class*="columns"] .w-nav-list.level_2 {
	background-color: <?php echo ($smof_data['drop_bg'] != '')?$smof_data['drop_bg']:'#fff'; ?>;
	}
	
/* Dropdown Text Color */
.l-header .w-nav-anchor.level_2,
.l-header .w-nav-anchor.level_3,
.touch_disabled [class*="columns"] .w-nav-item.has_sublevel.active .w-nav-anchor.level_2,
.touch_disabled [class*="columns"] .w-nav-item.has_sublevel.current-menu-item .w-nav-anchor.level_2,
.touch_disabled [class*="columns"] .w-nav-item.has_sublevel.current-menu-ancestor .w-nav-anchor.level_2,
.no-touch .touch_disabled [class*="columns"] .w-nav-item.has_sublevel:hover .w-nav-anchor.level_2 {
	color: <?php echo ($smof_data['drop_text'] != '')?$smof_data['drop_text']:'#666'; ?>;
	}
	
/* Dropdown Hover Background Color */
.no-touch .l-header .w-nav-item.level_2:hover .w-nav-anchor.level_2,
.no-touch .l-header .w-nav-item.level_3:hover .w-nav-anchor.level_3 {
	background-color: <?php echo ($smof_data['drop_hover_bg'] != '')?$smof_data['drop_hover_bg']:'#d13a7a'; ?>;
	}
	
/* Dropdown Hover Text Color */
.no-touch .l-header .w-nav-item.level_2:hover .w-nav-anchor.level_2,
.no-touch .l-header .w-nav-item.level_3:hover .w-nav-anchor.level_3 {
	color: <?php echo ($smof_data['drop_hover_text'] != '')?$smof_data['drop_hover_text']:'#fff'; ?>;
	}
	
/* Dropdown Active Background Color */
.l-header .w-nav-item.level_2.active .w-nav-anchor.level_2,
.l-header .w-nav-item.level_2.current-menu-item .w-nav-anchor.level_2,
.l-header .w-nav-item.level_2.current-menu-ancestor .w-nav-anchor.level_2,
.l-header .w-nav-item.level_3.active .w-nav-anchor.level_3,
.l-header .w-nav-item.level_3.current-menu-item .w-nav-anchor.level_3,
.l-header .w-nav-item.level_3.current-menu-ancestor .w-nav-anchor.level_3 {
	background-color: <?php echo ($smof_data['drop_active_bg'] != '')?$smof_data['drop_active_bg']:'#fff'; ?>;
	}
	
/* Dropdown Active Text Color */
.l-header .w-nav-item.level_2.active .w-nav-anchor.level_2,
.l-header .w-nav-item.level_2.current-menu-item .w-nav-anchor.level_2,
.l-header .w-nav-item.level_2.current-menu-ancestor .w-nav-anchor.level_2,
.l-header .w-nav-item.level_3.active .w-nav-anchor.level_3,
.l-header .w-nav-item.level_3.current-menu-item .w-nav-anchor.level_3,
.l-header .w-nav-item.level_3.current-menu-ancestor .w-nav-anchor.level_3 {
	color: <?php echo ($smof_data['drop_active_text'] != '')?$smof_data['drop_active_text']:'#d13a7a'; ?>;
	}
	
/* Menu Button Background Color */
.touch_disabled .btn.w-nav-item.level_1 .w-nav-anchor.level_1,
.no-touch .touch_disabled .btn.w-nav-item.level_1:hover .w-nav-anchor.level_1 {
	background-color: <?php echo ($smof_data['menu_button_bg'] != '')?$smof_data['menu_button_bg']:'#d13a7a'; ?>;
	}
	
/* Menu Button Text Color */
.touch_disabled .btn.w-nav-item.level_1 .w-nav-anchor.level_1,
.no-touch .touch_disabled .btn.w-nav-item.level_1:hover .w-nav-anchor.level_1 {
	color: <?php echo ($smof_data['menu_button_text'] != '')?$smof_data['menu_button_text']:'#fff'; ?>;
	}

/*************************** MAIN CONTENT ***************************/

/* Background Color */
.l-canvas,
.w-blog.type_masonry .w-blog-entry-preview:before,
.w-cart-dropdown,
.w-filters-item.active .w-filters-item-link,
.no-touch .w-filters-item.active .w-filters-item-link:hover,
.w-portfolio-item-anchor,
.w-tabs-item.active,
.no-touch .w-tabs-item.active:hover,
.w-timeline-item,
.w-timeline-section-title,
.w-timeline.type_vertical .w-timeline-section-content,
.woocommerce div.product .woocommerce-tabs .tabs li.active,
.no-touch .woocommerce div.product .woocommerce-tabs .tabs li.active:hover,
.woocommerce .stars span:after,
.woocommerce .stars span a:after,
#bbp-user-navigation li.current {
	background-color: <?php echo ($smof_data['main_bg'] != '')?$smof_data['main_bg']:'#fff'; ?>;
	}
.g-btn.color_contrast,
.no-touch .g-btn.color_contrast:hover,
.no-touch .g-btn.color_contrast.outlined:hover,
.w-icon.color_border.with_circle .w-icon-link {
	color: <?php echo ($smof_data['main_bg'] != '')?$smof_data['main_bg']:'#fff'; ?>;
	}

/* Alternate Background Color */
input[type="text"],
input[type="password"],
input[type="email"],
input[type="url"],
input[type="tel"],
input[type="number"],
input[type="date"],
textarea,
select,
.w-actionbox.color_alternate,
.w-blog.imgpos_atleft .w-blog-entry-preview-icon,
.w-filters,
.w-icon.color_text.with_circle .w-icon-link,
.w-icon.color_fade.with_circle .w-icon-link,
.w-pricing-item-title,
.w-pricing-item-price,
.w-progbar-bar,
.w-tabs-list,
.widget.widget_nav_menu .menu-item.current-menu-item > a,
.woocommerce .quantity .plus,
.woocommerce .quantity .minus,
.woocommerce div.product .woocommerce-tabs .tabs,
.woocommerce table.shop_table .actions .coupon .input-text,
.woocommerce #payment .payment_box,
#bbp-user-navigation,
#subscription-toggle,
#favorite-toggle {
	background-color: <?php echo ($smof_data['main_bg_alternative'] != '')?$smof_data['main_bg_alternative']:'#f2f2f2'; ?>;
	}
.woocommerce #payment .payment_box:after {
	border-color: <?php echo ($smof_data['main_bg_alternative'] != '')?$smof_data['main_bg_alternative']:'#f2f2f2'; ?>;
	}

/* Border Color */
.w-blog-entry,
.w-bloglist,
.w-comments,
.w-comments-item,
.w-pricing-item-h,
.w-sharing.type_simple .w-sharing-item,
.w-tabs.layout_accordion,
.w-tabs.layout_accordion .w-tabs-section,
.w-timeline.type_vertical .w-timeline-section-content,
#wp-calendar thead th,
#wp-calendar tbody td,
#wp-calendar tfoot td,
.widget.widget_nav_menu .menu-item a,
.woocommerce form.login,
.woocommerce form.checkout_coupon,
.woocommerce form.register,
.woocommerce div.product .cart.variations_form,
.woocommerce div.product .cart table.group_table,
.woocommerce div.product .cart table.group_table td,
.woocommerce table.shop_attributes th,
.woocommerce table.shop_attributes td,
.woocommerce #reviews #comments .commentlist,
.woocommerce #reviews #comments .commentlist li,
.woocommerce .comment-respond,
.woocommerce .related,
.woocommerce .upsells,
.woocommerce .cross-sells,
.woocommerce table.shop_table td,
.woocommerce table.shop_table tfoot th,
.woocommerce .cart-collaterals .cart_totals td,
.woocommerce .cart-collaterals .cart_totals th,
.woocommerce .checkout #order_review,
.woocommerce .checkout table.shop_table,
.woocommerce ul.order_details li,
.woocommerce table.shop_table.order_details,
.woocommerce table.shop_table.my_account_orders,
.woocommerce.widget ul.product_list_widget li,
.woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce.widget.widget_layered_nav ul,
.woocommerce.widget.widget_layered_nav ul li,
#bbpress-forums .bbp-body ul.forum,
#bbpress-forums .bbp-forums li.bbp-header,
#bbpress-forums .bbp-body ul.topic,
#bbpress-forums .bbp-topics li.bbp-header,
.bbp-replies .bbp-body,
div.bbp-forum-header,
div.bbp-topic-header,
div.bbp-reply-header,
.bbp-pagination-links a,
.bbp-pagination-links span.current,
span.bbp-topic-pagination a.page-numbers,
.bbp-logged-in,
fieldset {
	border-color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}
.g-hr-h i,
.page-404 i,
.w-icon.color_border .w-icon-link {
	color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}
.g-hr-h:before,
.g-hr-h:after,
.g-btn.color_default,
.g-btn.color_default.outlined:before,
.w-icon.color_border.with_circle .w-icon-link,
.w-timeline-list:before,
.woocommerce .button,
.no-touch .woocommerce .quantity .plus:hover,
.no-touch .woocommerce .quantity .minus:hover,
.woocommerce.widget_price_filter .ui-slider,
.bbp-row-actions #favorite-toggle a,
.bbp-row-actions #subscription-toggle a {
	background-color: <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?>;
	}
.g-btn.color_default.outlined,
.g-pagination-item,
.w-socials-item-link,
.w-tags-item-link,
.w-team-links-item,
.w-testimonial,
.woocommerce .woocommerce-pagination ul li a,
.woocommerce .woocommerce-pagination ul li span {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_border'] != '')?$smof_data['main_border']:'#e8e8e8'; ?> inset;
	}

/* Heading Color */
.g-html h1,
.g-html h2,
.g-html h3,
.g-html h4,
.g-html h5,
.g-html h6,
input[type="text"],
input[type="password"],
input[type="email"],
input[type="url"],
input[type="tel"],
input[type="number"],
input[type="date"],
textarea,
select,
.no-touch .g-btn.color_default:hover,
.no-touch .g-btn.color_default.outlined:hover,
.g-btn.color_contrast.outlined,
.w-blog-entry-title,
.w-counter-number,
.w-portfolio-item-anchor,
.no-touch a.w-portfolio-item-anchor:hover,
.w-pricing-item-title,
.w-pricing-item-price,
.w-search.submit_inside .w-search-submit:hover:before,
.w-shortblog-entry-meta-date,
.no-touch .w-tabs-item:hover,
.no-touch .w-testimonial:hover,
.w-timeline-item,
.w-timeline-section-title,
.woocommerce .product .price,
.no-touch .woocommerce div.product .woocommerce-tabs .tabs li:hover,
.woocommerce table.shop_table .actions .coupon .input-text {
	color: <?php echo ($smof_data['main_heading'] != '')?$smof_data['main_heading']:'#444'; ?>;
	}
.g-btn.color_contrast,
.g-btn.color_contrast.outlined:before {
	background-color: <?php echo ($smof_data['main_heading'] != '')?$smof_data['main_heading']:'#444'; ?>;
	}
.g-btn.color_contrast.outlined {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_heading'] != '')?$smof_data['main_heading']:'#444'; ?> inset;
	}

/* Text Color */
.l-canvas,
.g-btn.color_default,
.g-btn.color_default.outlined,
.g-pagination-item,
.w-clients-nav,
.w-clients-nav.disabled,
.w-clients-nav.disabled:hover,
.w-filters-item-link,
.w-icon.color_text .w-icon-link,
.color_primary .w-icon.color_text.with_circle .w-icon-link,
.w-socials-item-link,
.w-tags-item-link,
.widget.widget_archive ul li a,
.widget.widget_categories ul li a,
.widget.widget_nav_menu .menu-item a,
.woocommerce .button,
.l-subfooter.at_top .woocommerce .button,
.woocommerce .quantity .plus,
.woocommerce .quantity .minus,
li.bbp-forum-freshness > a,
li.bbp-topic-freshness > a,
.bbp-row-actions #favorite-toggle a,
.bbp-row-actions #subscription-toggle a,
#bbp-user-navigation li.current a,
#bbpress-forums div.bbp-topic-author a.bbp-author-name,
#bbpress-forums div.bbp-reply-author a.bbp-author-name {
	color: <?php echo ($smof_data['main_text'] != '')?$smof_data['main_text']:'#666'; ?>;
	}

/* Primary Color */
a,
.g-html .highlight,
.g-btn.color_primary.outlined,
.no-touch .w-blog-entry-link:hover .w-blog-entry-title-h,
.no-touch .w-blog-entry-link:hover .w-blog-entry-preview-icon,
.no-touch .w-clients-nav:hover,
.l-main .w-contacts-item i,
.w-counter.color_primary .w-counter-number,
.w-filters-item.active .w-filters-item-link,
.no-touch .w-filters-item.active .w-filters-item-link:hover,
.w-icon.color_primary .w-icon-link,
.w-iconbox-icon,
.no-touch .w-iconbox-link:hover .w-iconbox-title,
.no-touch .w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item:hover,
.w-shortblog-entry-title-h,
.w-tabs-item.active,
.no-touch .w-tabs-item.active:hover,
.w-tabs.layout_accordion .w-tabs-section.active .w-tabs-section-header,
.no-touch .w-tags-item-link:hover,
.w-team-link .w-team-name,
.widget.widget_nav_menu .menu-item.current-menu-item > a,
.woocommerce .products .product .button,
.no-touch .woocommerce .products .product .button.loading:hover,
.woocommerce .star-rating span:before,
.woocommerce .woocommerce-breadcrumb a,
.woocommerce div.product .woocommerce-tabs .tabs li.active,
.no-touch .woocommerce div.product .woocommerce-tabs .tabs li.active:hover,
.woocommerce .stars span a:after,
.woocommerce .cart-collaterals .cart_totals tr.total,
.woocommerce .checkout table.shop_table .total,
.woocommerce.widget.widget_shopping_cart p.total .amount,
#subscription-toggle span.is-subscribed:before,
#favorite-toggle span.is-favorite:before {
	color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#d13a7a'; ?>;
	}
.l-submain.color_primary,
.w-actionbox.color_primary,
.g-btn.color_primary,
.g-btn.color_primary.outlined:before,
button,
input[type="submit"],
.g-pagination-item.active,
.no-touch .g-pagination-item:before,
.no-touch .w-iconbox.with_circle .w-iconbox-icon:before,
.no-touch .w-filters-item-link:hover,
.w-icon.color_primary.with_circle .w-icon-link,
.w-pricing-item.type_featured .w-pricing-item-title,
.w-pricing-item.type_featured .w-pricing-item-price,
.w-progbar.color_primary .w-progbar-bar-h,
.no-touch .w-team-links,
.w-timeline-item:before,
.w-timeline.type_vertical .w-timeline-section:before,
.w-timeline-section-title:before,
.w-timeline-section.active .w-timeline-section-title:before,
.no-touch .w-toplink.active:hover,
.no-touch .flex-direction-nav li span:before,
.no-touch .tp-leftarrow.default:before,
.no-touch .tp-rightarrow.default:before,
.no-touch .widget.widget_nav_menu .menu-item a:hover,
.woocommerce .button.alt,
.woocommerce .button.checkout,
.no-touch .woocommerce .products .product .button:hover,
.no-touch .woocommerce .woocommerce-pagination ul li a:hover,
.woocommerce .woocommerce-pagination ul li span.current,
.woocommerce .onsale,
.no-touch .woocommerce table.shop_table .product-remove a.remove:hover,
.woocommerce.widget_price_filter .ui-slider .ui-slider-range,
.woocommerce.widget_layered_nav ul li.chosen,
.woocommerce.widget_layered_nav_filters ul li a,
.no-touch .bbp-row-actions #favorite-toggle a:hover,
.no-touch .bbp-row-actions #subscription-toggle a:hover,
.no-touch .bbp-pagination-links a:hover,
.bbp-pagination-links span.current,
.no-touch span.bbp-topic-pagination a.page-numbers:hover,
p.demo_store {
	background-color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#d13a7a'; ?>;
	}
.g-html blockquote,
.w-blog-entry.sticky,
.no-touch .w-clients-item:hover,
.w-filters-item.active .w-filters-item-link,
.w-tabs-item.active,
.no-touch .w-tabs-item.active:hover,
.no-touch .widget.widget_nav_menu .menu-item a:hover,
.woocommerce div.product .woocommerce-tabs .tabs li.active,
.woocommerce.widget_layered_nav ul li.chosen,
.no-touch .bbp-pagination-links a:hover,
.bbp-pagination-links span.current,
.no-touch span.bbp-topic-pagination a.page-numbers:hover,
#bbp-user-navigation li.current {
	border-color: <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#d13a7a'; ?>;
	}
input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="tel"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
textarea:focus,
select:focus,
.woocommerce .quantity input.qty:focus,
.woocommerce table.shop_table .actions .coupon .input-text:focus,
#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content:focus {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#d13a7a'; ?>;
	}
.g-btn.color_primary.outlined,
.w-clients-nav:hover,
.l-main .w-contacts-item i,
.w-iconbox.with_circle .w-iconbox-icon,
.no-touch .w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item:hover,
.no-touch .w-tags-item-link:hover,
.no-touch .w-testimonial:hover,
.w-timeline-item,
.w-timeline-section-title,
.woocommerce .products .product .button,
.no-touch .woocommerce .products .product .button.loading:hover {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_primary'] != '')?$smof_data['main_primary']:'#d13a7a'; ?> inset;
	}

/* Secondary Color */
.no-touch a:hover,
.no-touch a:active,
.g-btn.color_secondary.outlined,
.no-touch .w-blog.type_masonry .w-blog-meta a:hover,
.w-counter.color_secondary .w-counter-number,
.w-icon.color_secondary .w-icon-link,
.no-touch .w-shortblog-entry-link:hover .w-shortblog-entry-title-h,
.no-touch .w-team-link:hover .w-team-name,
.no-touch .widget.widget_archive ul li a:hover,
.no-touch .widget.widget_categories ul li a:hover,
.no-touch .widget.widget_tag_cloud .tagcloud a:hover,
.no-touch .woocommerce .woocommerce-breadcrumb a:hover,
.no-touch .woocommerce.widget.widget_product_tag_cloud .tagcloud a:hover,
.no-touch li.bbp-forum-freshness > a:hover,
.no-touch li.bbp-topic-freshness > a:hover,
.no-touch p.bbp-topic-meta a:hover,
.no-touch .bbp-forum-header a.bbp-forum-permalink:hover,
.no-touch .bbp-topic-header a.bbp-topic-permalink:hover,
.no-touch .bbp-reply-header a.bbp-reply-permalink:hover,
.no-touch .bbp_widget_login a.button.logout-link:hover,
.no-touch #bbpress-forums div.bbp-topic-author a.bbp-author-name:hover,
.no-touch #bbpress-forums div.bbp-reply-author a.bbp-author-name:hover {
	color: <?php echo ($smof_data['main_secondary'] != '')?$smof_data['main_secondary']:'#666'; ?>;
	}
.l-submain.color_secondary,
.w-actionbox.color_secondary,
.g-btn.color_secondary,
.g-btn.color_secondary.outlined:before,
.w-icon.color_secondary.with_circle .w-icon-link,
.w-progbar.color_secondary .w-progbar-bar-h,
.no-touch .button:hover,
.no-touch input[type="submit"]:hover,
.no-touch .woocommerce .button:hover,
.no-touch .woocommerce .button.alt:hover,
.no-touch .woocommerce .button.checkout:hover,
.no-touch .woocommerce.widget_layered_nav_filters ul li a:hover {
	background-color: <?php echo ($smof_data['main_secondary'] != '')?$smof_data['main_secondary']:'#666'; ?>;
	}
.g-btn.color_secondary.outlined {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_secondary'] != '')?$smof_data['main_secondary']:'#666'; ?> inset;
	}

/* Fade Elements Color */
.w-blog-meta,
.w-blog.type_masonry .w-blog-meta a,
.w-bloglist-entry-date,
.w-bloglist-entry-author,
.w-comments-item-date,
.w-icon.color_fade .w-icon-link,
.no-touch .w-icon.color_fade.with_circle .w-icon-link:hover,
.w-links-anchor:before,
.w-pagehead p,
.w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item,
.w-search.submit_inside .w-search-submit:before,
.w-team-role,
.w-testimonial-person i,
#wp-calendar thead th,
.widget.widget_archive ul li:before,
.widget.widget_categories ul li:before,
.widget.widget_nav_menu .menu-item a:before,
.widget.widget_recent_entries ul li span,
.widget.widget_rss ul li span,
.widget.widget_rss ul li cite,
.widget.widget_tag_cloud .tagcloud a,
.woocommerce .woocommerce-breadcrumb,
.woocommerce .star-rating:before,
.woocommerce small.note,
.woocommerce .woocommerce-result-count,
.woocommerce .products .product .price del,
.woocommerce div.product .price del,
.woocommerce #reviews #comments .commentlist .meta,
.woocommerce .stars span:after,
.woocommerce table.shop_table .product-remove a.remove,
.woocommerce .cart-collaterals .cart_totals small,
.woocommerce #payment .payment_box span.help,
.woocommerce.widget.widget_product_tag_cloud .tagcloud a,
.woocommerce.widget.widget_product_categories ul li:before,
.bbp-topics-front ul.topic:before,
.bbp-topics ul.topic:before,
p.bbp-topic-meta,
p.bbp-topic-meta a,
div.bbp-forum-header,
div.bbp-topic-header,
div.bbp-reply-header,
.bbp-pagination-count,
.bbp_widget_login a.button.logout-link,
.widget.widget_display_replies ul li div,
.widget.widget_display_topics ul li div,
.widget.widget_display_views ul li:before,
.widget.widget_display_forums ul li:before {
	color: <?php echo ($smof_data['main_fade'] != '')?$smof_data['main_fade']:'#999'; ?>;
	}
.w-shortblog-entry-meta-date {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['main_fade'] != '')?$smof_data['main_fade']:'#999'; ?> inset;
	}

/*************************** ALTERNATE CONTENT ***************************/

/* Background Color */
.l-submain.color_alternate,
.color_alternate .w-blog.type_masonry .w-blog-entry-preview:before,
.color_alternate .w-filters-item.active .w-filters-item-link,
.no-touch .color_alternate .w-filters-item.active .w-filters-item-link:hover,
.color_alternate .w-tabs-item.active,
.no-touch .color_alternate .w-tabs-item.active:hover,
.color_alternate .w-timeline-item,
.color_alternate .w-timeline-section-title,
.color_alternate .w-timeline.type_vertical .w-timeline-section-content {
	background-color: <?php echo ($smof_data['alt_bg'] != '')?$smof_data['alt_bg']:'#f2f2f2'; ?>;
	}
.color_alternate .g-btn.color_contrast,
.no-touch .color_alternate .g-btn.color_contrast:hover,
.no-touch .color_alternate .g-btn.color_contrast.outlined:hover,
.color_alternate .w-icon.color_border.with_circle .w-icon-link {
	color: <?php echo ($smof_data['alt_bg'] != '')?$smof_data['alt_bg']:'#f2f2f2'; ?>;
	}

/* Alternate Background Color */
.color_alternate input[type="text"],
.color_alternate input[type="password"],
.color_alternate input[type="email"],
.color_alternate input[type="url"],
.color_alternate input[type="tel"],
.color_alternate input[type="number"],
.color_alternate input[type="date"],
.color_alternate textarea,
.color_alternate select,
.color_alternate .w-blog.imgpos_atleft .w-blog-entry-preview-icon,
.color_alternate .w-filters,
.color_alternate .w-icon.color_text.with_circle .w-icon-link,
.color_alternate .w-icon.color_fade.with_circle .w-icon-link,
.color_alternate .w-pricing-item-title,
.color_alternate .w-pricing-item-price,
.color_alternate .w-tabs-list,
.color_alternate .widget.widget_nav_menu .menu-item.current-menu-item > a {
	background-color: <?php echo ($smof_data['alt_bg_alternative'] != '')?$smof_data['alt_bg_alternative']:'#fff'; ?>;
	}

/* Border Color */
.color_alternate .w-blog-entry,
.color_alternate .w-bloglist,
.color_alternate .w-comments-item,
.color_alternate .w-pricing-item-h,
.color_alternate .w-tabs.layout_accordion,
.color_alternate .w-tabs.layout_accordion .w-tabs-section,
.color_alternate .w-timeline.type_vertical .w-timeline-section-content,
.color_alternate #wp-calendar thead th,
.color_alternate #wp-calendar tbody td,
.color_alternate #wp-calendar tfoot td,
.color_alternate .widget.widget_nav_menu .menu-item a,
.color_alternate .widget.widget_nav_menu .menu-item a:hover {
	border-color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}
.color_alternate .g-hr-h i,
.color_alternate .page-404 i,
.color_alternate .w-icon.color_border .w-icon-link {
	color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}
.color_alternate .g-hr-h:before,
.color_alternate .g-hr-h:after,
.color_alternate .g-btn.color_default,
.color_alternate .g-btn.color_default.outlined:before,
.color_alternate .w-icon.color_border.with_circle .w-icon-link,
.color_alternate .w-timeline-list:before {
	background-color: <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?>;
	}
.color_alternate .g-btn.color_default.outlined,
.color_alternate .g-pagination-item,
.color_alternate .w-socials-item-link,
.color_alternate .w-tags-item-link,
.color_alternate .w-team-links-item,
.color_alternate .w-testimonial {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_border'] != '')?$smof_data['alt_border']:'#ddd'; ?> inset;
	}

/* Heading Color */
.color_alternate h1,
.color_alternate h2,
.color_alternate h3,
.color_alternate h4,
.color_alternate h5,
.color_alternate h6,
.color_alternate input[type="text"],
.color_alternate input[type="password"],
.color_alternate input[type="email"],
.color_alternate input[type="url"],
.color_alternate input[type="tel"],
.color_alternate input[type="number"],
.color_alternate input[type="date"],
.color_alternate textarea,
.color_alternate select,
.no-touch .color_alternate .g-btn.color_default:hover,
.no-touch .color_alternate .g-btn.color_default.outlined:hover,
.color_alternate .g-btn.color_contrast.outlined,
.color_alternate .w-blog-entry-title,
.color_alternate .w-counter-number,
.color_alternate .w-pricing-item-title,
.color_alternate .w-pricing-item-price,
.color_alternate .w-search.submit_inside .w-search-submit:hover:before,
.color_alternate .w-shortblog-entry-meta-date,
.no-touch .color_alternate .w-tabs-item:hover,
.no-touch .color_alternate .w-testimonial:hover,
.color_alternate .w-timeline-item,
.color_alternate .w-timeline-section-title {
	color: <?php echo ($smof_data['alt_heading'] != '')?$smof_data['alt_heading']:'#333'; ?>;
	}
.color_alternate .g-btn.color_contrast,
.color_alternate .g-btn.color_contrast.outlined:before {
	background-color: <?php echo ($smof_data['alt_heading'] != '')?$smof_data['alt_heading']:'#333'; ?>;
	}
.color_alternate .g-btn.color_contrast.outlined {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_heading'] != '')?$smof_data['alt_heading']:'#333'; ?> inset;
	}

/* Text Color */
.l-submain.color_alternate,
.color_alternate .g-btn.color_default,
.color_alternate .g-btn.color_default.outlined,
.color_alternate .g-pagination-item,
.color_alternate .w-clients-nav,
.color_alternate .w-clients-nav.disabled,
.color_alternate .w-clients-nav.disabled:hover,
.color_alternate .w-filters-item-link,
.color_alternate .w-icon.color_text .w-icon-link,
.color_alternate .w-socials-item-link,
.color_alternate .w-tags-item-link,
.color_alternate .widget.widget_archive ul li a,
.color_alternate .widget.widget_categories ul li a,
.color_alternate .widget.widget_nav_menu .menu-item a {
	color: <?php echo ($smof_data['alt_text'] != '')?$smof_data['alt_text']:'#555'; ?>;
	}

/* Primary Color */
.color_alternate a,
.color_alternate .g-btn.color_primary.outlined,
.no-touch .color_alternate .w-blog-entry-link:hover .w-blog-entry-title-h,
.no-touch .color_alternate .w-blog-entry-link:hover .w-blog-entry-preview-icon,
.no-touch .color_alternate .w-clients-nav:hover,
.color_alternate .l-main .w-contacts-item i,
.color_alternate .w-counter.color_primary .w-counter-number,
.color_alternate .w-filters-item.active .w-filters-item-link,
.no-touch .color_alternate .w-filters-item.active .w-filters-item-link:hover,
.color_alternate .w-icon.color_primary .w-icon-link,
.color_alternate .w-iconbox-icon,
.no-touch .color_alternate .w-iconbox-link:hover .w-iconbox-title,
.no-touch .color_alternate .w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item:hover,
.color_alternate .w-shortblog-entry-title-h,
.color_alternate .w-tabs-item.active,
.no-touch .color_alternate .w-tabs-item.active:hover,
.color_alternate .w-tabs.layout_accordion .w-tabs-section.active .w-tabs-section-header,
.no-touch .color_alternate .w-tags-item-link:hover,
.color_alternate .w-team-link .w-team-name,
.color_alternate .widget.widget_nav_menu .menu-item.current-menu-item > a {
	color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#d13a7a'; ?>;
	}
.color_alternate .g-btn.color_primary,
.color_alternate .g-btn.color_primary.outlined:before,
.color_alternate input[type="submit"],
.color_alternate .g-pagination-item.active,
.no-touch .color_alternate .g-pagination-item:before,
.no-touch .color_alternate .w-iconbox.with_circle .w-iconbox-icon:before,
.no-touch .color_alternate .w-filters-item-link:hover,
.color_alternate .w-icon.color_primary.with_circle .w-icon-link,
.color_alternate .w-pricing-item.type_featured .w-pricing-item-title,
.color_alternate .w-pricing-item.type_featured .w-pricing-item-price,
.no-touch .color_alternate .w-team-links,
.color_alternate .w-timeline-item:before,
.color_alternate .w-timeline.type_vertical .w-timeline-section:before,
.color_alternate .w-timeline-section-title:before,
.color_alternate .w-timeline-section.active .w-timeline-section-title:before,
.no-touch .color_alternate .w-toplink.active:hover,
.no-touch .color_alternate .flex-direction-nav li span:before,
.no-touch .color_alternate .tp-leftarrow.default:before,
.no-touch .color_alternate .tp-rightarrow.default:before,
.no-touch .color_alternate .widget.widget_nav_menu .menu-item a:hover {
	background-color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#d13a7a'; ?>;
	}
.color_alternate .g-html blockquote,
.color_alternate .w-blog-entry.sticky,
.no-touch .color_alternate .w-clients-item:hover,
.color_alternate .w-filters-item.active .w-filters-item-link,
.color_alternate .w-tabs-item.active,
.no-touch .color_alternate .w-tabs-item.active:hover,
.no-touch .color_alternate .widget.widget_nav_menu .menu-item a:hover {
	border-color: <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#d13a7a'; ?>;
	}
.color_alternate input[type="text"]:focus,
.color_alternate input[type="password"]:focus,
.color_alternate input[type="email"]:focus,
.color_alternate input[type="url"]:focus,
.color_alternate input[type="tel"]:focus,
.color_alternate input[type="number"]:focus,
.color_alternate input[type="date"]:focus,
.color_alternate textarea:focus,
.color_alternate select:focus {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#d13a7a'; ?>;
	}
.color_alternate .g-btn.color_primary.outlined,
.color_alternate .w-clients-nav:hover,
.color_alternate .l-main .w-contacts-item i,
.color_alternate .w-iconbox.with_circle .w-iconbox-icon,
.no-touch .color_alternate .w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item:hover,
.no-touch .color_alternate .w-tags-item-link:hover,
.no-touch .color_alternate .w-testimonial:hover,
.color_alternate .w-timeline-item:before,
.color_alternate .w-timeline-section-title:before {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_primary'] != '')?$smof_data['alt_primary']:'#d13a7a'; ?> inset;
	}

/* Secondary Color */
.no-touch .color_alternate a:hover,
.no-touch .color_alternate a:active,
.color_alternate .g-btn.color_secondary.outlined,
.no-touch .color_alternate .w-blog.type_masonry .w-blog-meta a:hover,
.color_alternate .w-counter.color_secondary .w-counter-number,
.color_alternate .w-icon.color_secondary .w-icon-link,
.no-touch .color_alternate .w-shortblog-entry-link:hover .w-shortblog-entry-title-h,
.no-touch .color_alternate .w-team-link:hover .w-team-name,
.no-touch .color_alternate .widget.widget_archive ul li a:hover,
.no-touch .color_alternate .widget.widget_categories ul li a:hover,
.no-touch .color_alternate .widget.widget_tag_cloud .tagcloud a:hover {
	color: <?php echo ($smof_data['alt_secondary'] != '')?$smof_data['alt_secondary']:'#666'; ?>;
	}
.color_alternate .g-btn.color_secondary,
.color_alternate .g-btn.color_secondary.outlined:before,
.color_alternate .w-icon.color_secondary.with_circle .w-icon-link {
	background-color: <?php echo ($smof_data['alt_secondary'] != '')?$smof_data['alt_secondary']:'#666'; ?>;
	}
.color_alternate .g-btn.color_secondary.outlined {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_secondary'] != '')?$smof_data['alt_secondary']:'#666'; ?> inset;
	}

/* Fade Elements Color */
.color_alternate .w-blog-meta,
.color_alternate .w-blog.type_masonry .w-blog-meta a,
.color_alternate .w-bloglist-entry-date,
.color_alternate .w-bloglist-entry-author,
.color_alternate .w-comments-item-date,
.color_alternate .w-icon.color_fade .w-icon-link,
.color_alternate .w-links-anchor:before,
.color_alternate .w-pagehead p,
.color_alternate .w-pagehead-nav .w-pagehead-nav-h .w-pagehead-nav-item,
.color_alternate .w-search.submit_inside .w-search-submit:before,
.color_alternate .w-team-role,
.color_alternate .w-testimonial-person i,
.color_alternate  #wp-calendar thead th,
.color_alternate .widget.widget_archive ul li:before,
.color_alternate .widget.widget_categories ul li:before,
.color_alternate .widget.widget_nav_menu .menu-item a:before,
.color_alternate .widget.widget_recent_entries ul li span,
.color_alternate .widget.widget_rss ul li span,
.color_alternate .widget.widget_rss ul li cite,
.color_alternate .widget.widget_tag_cloud .tagcloud a {
	color: <?php echo ($smof_data['alt_fade'] != '')?$smof_data['alt_fade']:'#999'; ?>;
	}
.color_alternate .w-shortblog-entry-meta-date {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['alt_fade'] != '')?$smof_data['alt_fade']:'#999'; ?> inset;
	}

/*************************** SUBFOOTER ***************************/

/* Background Color */
.l-subfooter.at_top {
	background-color: <?php echo ($smof_data['subfooter_bg'] != '')?$smof_data['subfooter_bg']:'#1a1a1a'; ?>;
	}

/* Border Color */
.l-subfooter.at_top,
.l-subfooter.at_top #wp-calendar thead th,
.l-subfooter.at_top #wp-calendar tbody td,
.l-subfooter.at_top #wp-calendar tfoot td,
.l-subfooter.at_top .widget.widget_nav_menu .menu-item a,
.l-subfooter.at_top .woocommerce.widget ul.product_list_widget li {
	border-color: <?php echo ($smof_data['subfooter_border'] != '')?$smof_data['subfooter_border']:'#222'; ?>;
	}
.l-subfooter.at_top .w-socials-item-link {
	box-shadow: 0 0 0 2px <?php echo ($smof_data['subfooter_border'] != '')?$smof_data['subfooter_border']:'#222'; ?> inset;
	}

/* Text Color */
.l-subfooter.at_top,
.l-subfooter.at_top .w-socials-item-link,
.l-subfooter.at_top .widget.widget_tag_cloud .tagcloud a {
	color: <?php echo ($smof_data['subfooter_text'] != '')?$smof_data['subfooter_text']:'#808080'; ?>;
	}

/* Heading Color */
.l-subfooter.at_top h1,
.l-subfooter.at_top h2,
.l-subfooter.at_top h3,
.l-subfooter.at_top h4,
.l-subfooter.at_top h5,
.l-subfooter.at_top h6 {
	color: <?php echo ($smof_data['subfooter_heading'] != '')?$smof_data['subfooter_heading']:'#ccc'; ?>;
	}

/* Link Color */
.l-subfooter.at_top a,
.l-subfooter.at_top .widget.widget_archive ul li a,
.l-subfooter.at_top .widget.widget_categories ul li a,
.l-subfooter.at_top .widget.widget_nav_menu .menu-item a {
	color: <?php echo ($smof_data['subfooter_link'] != '')?$smof_data['subfooter_link']:'#ccc'; ?>;
	}

/* Link Hover Color */
.no-touch .l-subfooter.at_top a:hover,
.no-touch .l-subfooter.at_top .widget.widget_archive ul li a:hover,
.no-touch .l-subfooter.at_top .widget.widget_categories ul li a:hover,
.no-touch .l-subfooter.at_top .widget.widget_tag_cloud .tagcloud a:hover {
	color: <?php echo ($smof_data['subfooter_link_hover'] != '')?$smof_data['subfooter_link_hover']:'#fff'; ?>;
	}

/* Fade Elements Color */
.l-subfooter.at_top .w-bloglist-entry-date,
.l-subfooter.at_top #wp-calendar thead th,
.l-subfooter.at_top .widget.widget_archive ul li:before,
.l-subfooter.at_top .widget.widget_categories ul li:before,
.l-subfooter.at_top .widget.widget_nav_menu .menu-item a:before,
.l-subfooter.at_top .widget.widget_recent_entries ul li span,
.l-subfooter.at_top .widget.widget_rss ul li span,
.l-subfooter.at_top .widget.widget_rss ul li cite {
	color: <?php echo ($smof_data['subfooter_fade'] != '')?$smof_data['subfooter_fade']:'#666'; ?>;
	}

/*************************** FOOTER ***************************/

/* Background Color */
.l-subfooter.at_bottom {
	background-color: <?php echo ($smof_data['footer_bg'] != '')?$smof_data['footer_bg']:'#222'; ?>;
	}

/* Text Color */
.l-subfooter.at_bottom {
	color: <?php echo ($smof_data['footer_text'] != '')?$smof_data['footer_text']:'#666'; ?>;
	}

/* Link Color */
.l-subfooter.at_bottom a {
	color: <?php echo ($smof_data['footer_link'] != '')?$smof_data['footer_link']:'#999'; ?>;
	}

/* Link Hover Color */
.no-touch .l-subfooter.at_bottom a:hover {
	color: <?php echo ($smof_data['footer_link_hover'] != '')?$smof_data['footer_link_hover']:'#fff'; ?>;
	}
<?php
if (empty($output_styles_to_file) OR $output_styles_to_file == FALSE) {
?>
</style>
<?php
}
?>
<?php if ($smof_data['custom_css'] != '') { ?>
<?php
if (empty($output_styles_to_file) OR $output_styles_to_file == FALSE) {
?>
<style>
<?php
}
?>
<?php echo $smof_data['custom_css'] ?>
<?php
if (empty($output_styles_to_file) OR $output_styles_to_file == FALSE) {
?>
</style>
<?php
}
?>
<?php } ?>