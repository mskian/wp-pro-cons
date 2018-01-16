<?php 

function get_joomdev_wpc_options(){
	global $JoomDev_wpc_options;
	$JoomDev_wpc_options = array(
								'enable_bootstrap' => 'yes',
								'enable_fontawesome' => 'yes',
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


// file ends here...