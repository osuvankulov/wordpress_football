<?php
$output = $title = $link = $size = $zoom = $type = $bubble = $el_class = '';
extract(shortcode_atts(array(
    'address' => '',
    'latitude' => '',
    'longitude' => '',
    'marker' => '',
    'height' => 400,
    'zoom' => 13,
    'type' => 'ROADMAP',

), $atts));


$map_id = rand(99999, 999999);

if ($latitude != '' AND $longitude != '') {
	$map_location_options = 'latitude: "'.$latitude.'", longitude: "'.$longitude.'", ';
} elseif ($address != '') {
	$map_location_options = 'address: "'.$address.'", ';
} else {
	return null;
}

$map_marker_options = '';
if ($marker != '') {
	$map_marker_options = 'html: "'.$marker.'", popup: true';
}

wp_enqueue_script('gmaps');

if ($height == '') {
    $height = 400;
}

$output = '<div class="w-map" id="map_'.$map_id.'" style="height: '.$height.'px">
				<div class="w-map-h">

				</div>
			</div>
			<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery("#map_'.$map_id.'").gMap({
						'.$map_location_options.'
						zoom: '.$zoom.',
						maptype: "'.$type.'",
						markers:[
							{
								'.$map_location_options.$map_marker_options.'

							}
						]
					});
				});
			</script>';

echo $output;