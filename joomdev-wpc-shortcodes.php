<?php 

add_shortcode('joomdev-wpc-pros-cons', 'joomdev_wpc_pros_cons');
function joomdev_wpc_pros_cons($atts, $content){
	$default = array(
					'title' => 'Title Here',
					'button_text' => 'Get it now'
				);
	$atts = shortcode_atts(
						$default,
						$atts,
						'joomdev-wpc-pros-cons'
					);

	extract($atts);
	ob_start();

	?>
		<div class="jommdev-wpc-pros-cons">
			<div class="jommdev-wpc-pros-cons-inner">
				<h2><?php echo $title; ?></h2>
				<div class="pros-cons-box pros-box"></div>
				<div class="pros-cons-box cons-box"></div>
			</div>
		</div>
	<?php 

	return ob_get_clean();
}

// add_shortcode('joomdev-wpc-pros', 'joomdev_wpc_pros');
function joomdev_wpc_pros($atts, $content){

}

// add_shortcode('joomdev-wpc-cons', 'joomdev_wpc_cons');
function joomdev_wpc_cons($atts, $content){

}

// file ends here...