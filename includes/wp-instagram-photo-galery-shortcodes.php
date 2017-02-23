<?php

// Photo Galery 
function wpipg_photo_galery($atts, $content = null){
	global $wpipg_options;
	
	$atts = shortcode_atts(array(
		'title' => 'WP Instagram Photo Galery',
		'count' => 20
	), $atts);
	
	$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $wpipg_options['access_token'] . '&count=' . $atts['count'];
	
	$options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));
	
	$context = stream_context_create($options);
	
	$response = file_get_contents($url, false, $context);
	
	$data = json_decode($response)->data;
	
	
	$output = '<div class="wpipg-photos">';
	$output .= '<p>'.$wpipg_options['page_caption'].'</p>';
	//$output .=
	
	foreach($data as $photo){
		$output .= '<div class="photo-col">';
		if($wpipg_options['linked']){
			$output .= '<a title="'.$photo->cation->text.'" target="_blank" href="'.$photo->link.'"><img src="'.$photo->images->standard_resolution->url.'"></a>';
		}else{
			$output .= '<img src="'.$photo->images->standard_resolution->url.'">';
		}		
		$output .= '</div>';
	}
	
	$output .= '</div>';
	
	echo $output;
}
add_shortcode('photos', 'wpipg_photo_galery');