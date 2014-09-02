<?php
/*
  Plugin Name: RSS THIS
  Plugin URI: http://smartcatdesign.net/rss-this-free-wordpress-plugin/
  Description: Simple and customizable RSS utility that turns any wordpress page into a blog roll of RSS posts from any source.
  Version: 1.4
  Author: SmartCat
  Author URI: http://smartcatdesign.net
  License: GPL2
 */

add_action('admin_menu', 'register_menu');
add_filter('the_excerpt_rss', 'insertThumbnailRSS');
add_filter('the_content_feed', 'insertThumbnailRSS');
add_shortcode('rss-this', 'rss_feed');
wp_register_style('rss-css', plugins_url('rss-this') . '/style.css', array(), false, 'all');
wp_enqueue_style('rss-css');
add_action('init', 'ap_action_init');
//

function ap_action_init(){
    load_plugin_textdomain('rss-this', false, plugins_url('rss-this') . '/languages' );
}

function rss_feed($atts) {
    extract(shortcode_atts(array(
        'uri' => get_bloginfo('url') . '/feed',
        'maxitems' => 6,
        'maxchars' => 500,
        'title' => 1,
        'feed_content' => 1,
        'thumbnail' => 1,
        'more' => 1,
        'offset' => 0,
        'template' => 'rss-normal'
                    ), $atts));

    $feed = fetch_feed($uri);
    $ctr = 0;
    $total = 0;
    if (!is_wp_error($feed)) {
        $maxitem_no = $feed->get_item_quantity($maxitems);
        $rss_items = $feed->get_items(0, $maxitem_no);
    }

    if ($maxitem_no == 0) {
        $output = "<li>There are no feed items!</li>";
    } else {
        if ($template == "slider") {
            $ctr = 0;
            foreach ($rss_items as $item) {

                $output .= "<h4 class='";
                if ($ctr == 0) {
                    $output .= "rss-slide-title";
                }
                $output .= "'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                        . esc_html($item->get_title())
                        . "</a></h4>";
                $ctr+=1;
            }
        } else if ($template == "single") {
            $output = "<span class='rss-this single'>";
            foreach ($rss_items as $item) {
                $output .= "<a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                        . esc_html($item->get_title())
                        . "</a>";
            }
            $output .= "</span>";
        } else {
            $output = "<ul class='feed-roll " . $template . "'>";
            foreach ($rss_items as $item) {
                $content = $item->get_content(); //get the full content of the rss feed
                $img_src = feed_image_extractor($content); //extract the image source
				$wh = is_null($img_src);
				if ($wh) {
					$image = feed_image_extractor2($item);
					$img_src = $image['url'];
				}
				$feed_title = esc_html($item->get_title()); //get the feed title 
                $content = feed_image_remover($content); // remove images from the feed content
                $content = strip_html($content);
                $content = substr($content, 0, $maxchars);

                if ($ctr > 2) {
                    $ctr = 0;
                }
                $ctr++;
                $total++;

                if ($offset > 0) {
                    if ($offset == $total) {
                        $output .= "<li";
                        if ($ctr == 2) {
                            $output .= " class='rss-mid'>";
                        } else {
                            $output .= ">";
                        }
                        if ($title == 1 && $template == "rss-normal") {
                            $output .= "<h2 class='feed-title'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                    . esc_html($item->get_title())
                                    . "</a></h2>";
                        }
                        if ($thumbnail == 1) {
                            $output .= "<div class='rss-thumb'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                    . "<img ". ($wh ? ("width=".$image['width']." height=".$image['height']) : '') ." src ='" . $img_src . "' /></a></div>";
                        }
                        if ($title == 1 && $template == "rss-archive") {
                            $output .= "<h2 class='feed-title'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                    . esc_html($item->get_title())
                                    . "</a></h2>";
                        }
                        if ($feed_content == 1) {
                            $output .= "<p class='feed-content'>" . $content . "...</p>";
                        }
                        if ($more == 1) {
//                    if ($template == "archive") {
//                        $output .= "<div class='feed-more continue'>" . "<a class='button-primary' href='" . esc_url($item->get_permalink()) . "'> <i class='fa fa-chevron-right'></i> </a>" . "</div>";
//                    } else {
                            $output .= "<div class='feed-more'>" . "<a class='button-primary' href='" . esc_url($item->get_permalink()) . "'>Read More</a>" . "</div>";
//                    }
                        }
                        $output .= "</li>";
                        //------------
                    } else {
                        continue;
                    }
                } else {
                    $output .= "<li";
                    if ($ctr == 2) {
                        $output .= " class='rss-mid'>";
                    } else {
                        $output .= ">";
                    }
                    if ($title == 1 && $template == "rss-normal") {
                        $output .= "<h2 class='feed-title'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                . esc_html($item->get_title())
                                . "</a></h2>";
                    }
                    if ($thumbnail == 1) {
                        $output .= "<div class='rss-thumb'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                . "<img ". ($wh ? ("width=".$image['width']." height=".$image['height']) : '') ." src ='" . $img_src . "' /></a></div>";
                    }
                    if ($title == 1 && $template == "rss-archive") {
                        $output .= "<h2 class='feed-title'><a href='" . esc_url($item->get_permalink()) . "' title='" . 'Posted ' . $item->get_date('j F Y | g:i a') . "'>"
                                . esc_html($item->get_title())
                                . "</a></h2>";
                    }
                    if ($feed_content == 1) {
                        $output .= "<p class='feed-content'>" . $content . "...</p>";
                    }
                    if ($more == 1) {
//                    if ($template == "archive") {
//                        $output .= "<div class='feed-more continue'>" . "<a class='button-primary' href='" . esc_url($item->get_permalink()) . "'> <i class='fa fa-chevron-right'></i> </a>" . "</div>";
//                    } else {
                        $output .= "<div class='feed-more'>" . "<a class='button-primary' href='" . esc_url($item->get_permalink()) . "'>Read More</a>" . "</div>";
//                    }
                    }
                    $output .= "</li>";
                    //------------                    
                }
            }

            $output .= "</ul>";
        }
        return $output;
    }
}

function remove_excerpt($text) {
    return rtrim($text, '[...]');
}

function feed_image_extractor($description) {
    require_once('simple_html_dom.php');

    $post_html = str_get_html($description);
    $first_img = $post_html->find('img', 0);

    if ($first_img !== null) {
        return $first_img->src;
    }
    return null;
}

function feed_image_extractor2($item) {

	$attribs = $item->data['child']['http://search.yahoo.com/mrss/']['thumbnail'][1]['attribs'];
	return $attribs[''];
}

function feed_image_remover($description) {
    $description =
            preg_replace("/<img[^>]+\>/i", "", $description);

    return $description;
}

function word_count($description) {
    
}

function strip_html($description) {
    $description = strip_tags($description);
    return $description;
}

function process_rss() {
    
}

function register_menu() {
    add_options_page("Page Title", "RSS This", "manage_options", "options", "admin_page");
}

function admin_page() {
    ?>
    <h1>RSS This</h1>
    <h2>How to use the plugin?</h2>

    <div class="alignright" style="width: 30%;height: 100%;background:#edeae6 ">
        <h2 style="background-color: #B0CB1F;color: #ffffff;text-align: center;padding: 10px 0;margin-top: 10px;">
            <?php _e('Plugin Details','rss-this'); ?>
        </h2>
        <p style="text-align: center;padding: 10px">
            <?php _e('RSS This','rss-this'); ?><br>
            <?php _e('RSS-this is a plugin that imports an RSS feed from a different source, and presents it in a wordpress blog format. simply add the shortcode as many times as you want and the feed will show up.
            There are 2 formats for displaying the RSS posts, you can choose to stack the posts on top of each other, or display them as a grid.','rss-this'); ?>
        </p>
        <p style="text-align: center">
            <a href="http://smartcatdesign.net/rss-this-free-wordpress-plugin/" target="_blank" class="button button-primary"><?php _e('Plugin Site','rss-this'); ?></a>
        </p>
        <p style='text-align: center'>
            <img src='http://smartcatdesign.net/wp-content/uploads/2013/03/logo-medium.png'/>
        </p>
    </div>

    <p><?php _e('Just copy this shortcode into any page, post or widget. Change the URL to the feed URL that you wish to use','rss-this'); ?></p>
    <strong><?php _e('Shortcode:','rss-this'); ?> </strong><?php _e('[rss-this uri="enter URL"]','rss-this'); ?>
    <br><br>
    <strong><?php _e('Templates: rss-normal, rss-archive','rss-this'); ?></strong><br><br>
    <strong><?php _e('Optional Parameters:','rss-this'); ?></strong><br>
    <strong><?php _e('maxitems:','rss-this'); ?></strong> <?php _e('Number of RSS posts (default= 6)','rss-this'); ?><br>
    <strong><?php _e('thumbnail:','rss-this'); ?></strong><?php _e('Shows or hides the feed thumbnail. Set to 0 to hide thumbail, (default=1 Thumbnail showing','rss-this'); ?><br>
    <strong><?php _e('title:','rss-this'); ?></strong><?php _e('Shows or hides the feed title. Set to 0 to hide Title (default=1 Title showing)','rss-this'); ?></em><br>
    <strong><?php _e('feed_content:','rss-this'); ?></strong><?php _e('Shows or hides the feed content. Set to 0 to hide content (default=1 content showing)','rss-this'); ?><br>
    <strong><?php _e('more :','rss-this'); ?></strong><?php _e('Shows or hides a "Read More" button. Set to 0 to hide button. (default=1 Button showing)','rss-this'); ?><br>
    <strong><?php _e('maxchars :','rss-this'); ?></strong><?php _e('Sets the number of characters for the post content. (default=500 characters)','rss-this'); ?><br>
    <strong><?php _e('offset :','rss-this'); ?></strong><?php _e('Sets the offset. Default is 1. Starts from the first post.','rss-this'); ?><br>
    <strong><?php _e('template :','rss-this'); ?></strong><?php _e('Sets the RSS feed template. Options: rss-normal , rss-archive','rss-this'); ?>
    <br><br>
    <?php _e('Demo Shortcode:'.'rss-this'); ?><br>
    <?php _e('[rss-this uri="enter URL" maxitems="1" thumbnail="0" title="1" feed_content="0" more="0" maxchars="500" template="rss-normal"]','rss-this'); ?>
<?php } ?>