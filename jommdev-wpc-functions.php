<?php 

function get_joomdev_wpc_options(){
	global $JoomDev_wpc_options;
	$JoomDev_wpc_options = array(
								// 'enable_bootstrap' => 'yes',
								// 'enable_fontawesome' => 'yes',
								'box_background_color' => '#F9F9F9',
								'disable_box_border' => 'no',
								'box_border_style' => 'dashed',
								'box_border_color' => '#27C110',
								'button_color' => '#212121',
								'button_text_color' => '#fff',
							);

	$_joomdev_wpc_options = get_option('joomdev_wpc_options', array());

	$JoomDev_wpc_options = shortcode_atts($JoomDev_wpc_options, $_joomdev_wpc_options);
	return $JoomDev_wpc_options;
}

function joomdev_wpc_extract_shortcode($content){
	// $pattern = get_shortcode_regex(array('joomdev-wpc-pros-cons', 'joomdev-wpc-pros', 'joomdev-wpc-cons'));
	$pattern = get_shortcode_regex(array('joomdev-wpc-pros-cons'));
	$r = array(
				'title' => 'Title Here',
				'button_text' => 'Get it now',
				'pros' => array(),
				'cons' => array(),
			);

    if (   preg_match_all( '/'. $pattern .'/s', $content, $matches ) && array_key_exists( 2, $matches ) && in_array( 'joomdev-wpc-pros-cons', $matches[2] )){
        $atts = $matches[3][0];
        $shortcode_content = $matches[5][0];

        $atts = shortcode_parse_atts($atts);
        
        $r['title'] = isset($atts['title']) ? $atts['title'] : $r['title'];
        $r['button_text'] = isset($atts['button_text']) ? $atts['button_text'] : $r['button_text'];

        $p1 = get_shortcode_regex(array('joomdev-wpc-pros'));
        $p2 = get_shortcode_regex(array('joomdev-wpc-cons'));

        if ( preg_match_all( '/'. $p1 .'/s', $shortcode_content, $m1 ) && array_key_exists( 2, $m1 ) && in_array( 'joomdev-wpc-pros', $m1[2] )){
        	$r['pros'] = $m1[5];
        }
        if ( preg_match_all( '/'. $p2 .'/s', $shortcode_content, $m2 ) && array_key_exists( 2, $m2 ) && in_array( 'joomdev-wpc-cons', $m2[2] )){
        	$r['cons'] = $m2[5];
        }
    }

	return $r;
}


// file ends here...