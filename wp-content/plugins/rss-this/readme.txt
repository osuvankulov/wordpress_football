=== Plugin Name ===
RSS THIS
Contributors: smartcat
Donate link: www.smartcatdesign.net 
Tags: rss, blogroll, feed, post, RSS, feedburner, thumbnail, content, xml
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

RSS This Plugin will turn your normal WordPress page into a blog roll from an RSS feed. 
== Description ==

RSS This Plugin will turn your normal WordPress page into a blog roll from an RSS feed. You can choose if you want to display the feed as a grid or stacked. 
<h2><a href="http://smartcatdesign.net/rss-this-free-wordpress-plugin/">Demo</a></h2>

<b>How To Use:</b>
- Install the plugin <br>
- Place this shortcode where you want the feed to show: [rss-this uri="feed URL here" maxitems="99" maxchars="1000" titleonly="0"]  <br> 
- If you want to get a feed from a wordpress site, simply use the domain name and add /feed at the end, for example: <br>
[rss-this uri="enter URL"]  <br>
[rss-this uri="enter URL" maxitems="6" thumbnail="1" title="1" feed_content="1" more="1" maxchars="300" template="rss-normal"] <br>

<b>Shortcode Parameters: </b>
- uri: the URL for the feed <br>
- maxitems: the number of posts you would like to display <br>
- maxchars: the number of characters the feed pulls <br>
- titleonly: set to 1 to display the feed as a grid with title and picture only. or set to 0 to display the blog posts stacked on top of each other <br>

== Installation ==

1. Download the plugin then upload 'rss-this' folder to the '/wp-content/plugins/'  directory
   --OR--
   install the plugin directly from wordpress
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the shortcode: [rss-this uri="http://smartcatdesign.net/feed" maxitems="99" maxchars="1000" titleonly="1"]  in your wordpress page or post

== Screenshots ==
1. Grid display. Title and thumbnail only
2. Stacked display. Title. thumbnail and text

== Changelog ==

= 1.0 =
initial release

= 1.1 =
- added grid style
- allow user to specify number of characters for each post
- allow user to set grid or stacked mode
