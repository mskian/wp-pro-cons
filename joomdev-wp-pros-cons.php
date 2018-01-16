<?php 
/*
	Plugin Name: JoomDev WP Pros & Cons
	Plugin URI: http://elegantinfosolution.com/
	Description: This plugin provides you the shortcode to show pros/cons on any of the page. It will add a button to editor, which enables you the visual shortcode.
	Version: 1.0.0
	Author: JoomDev
	Author URI: http://elegantinfosolution.com/
*/



global $JoomDev_wpc_options;
$JoomDev_wpc_options = array();

if(!defined('JOOMDEV_DIR')){
	define('JOOMDEV_DIR', 'joomdev-wp-pros-cons');
}


include 'jommdev-wpc-functions.php';
include 'admin/jommdev-wpc-options.php';

add_action('init', 'get_joomdev_wpc_options', 99);

add_action( 'admin_enqueue_scripts', 'jommdev_wpc_color_picker' );
function jommdev_wpc_color_picker( $hook ) {
 
    // if( is_admin() ) { 
        wp_enqueue_style( 'joomdev-wpc-styles', plugins_url( 'css/styles.css', __FILE__ ) ); 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'joomdev-wpc-scripts', plugins_url( 'js/scripts.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    // }
}

add_action('admin_footer', 'joomdev_wpc_admin_footer_scripts', 99);
function joomdev_wpc_admin_footer_scripts(){
	?>
		<script type="text/javascript">
			var joomdev_wpc_site_url = '<?php echo site_url(); ?>';
			var joomdev_wpc_plugin_url = '<?php echo plugins_url( "", __FILE__ ); ?>';
		</script>
	<?php 
}

add_action('init', 'joomdev_wpc_init_functions', 999);
function joomdev_wpc_init_functions(){
	global $JoomDev_wpc_options;
	if($JoomDev_wpc_options['enable_bootstrap'] == 'yes'){
		add_action('wp_enqueue_scripts', 'joomdev_wpc_enable_bootstrap');
	}
	if($JoomDev_wpc_options['enable_fontawesome'] == 'yes'){
		add_action('wp_enqueue_scripts', 'joomdev_wpc_enable_fontawesome');
	}
}

function joomdev_wpc_enable_bootstrap(){
	wp_enqueue_style('joomdev-wpc-bootstrap-style', plugins_url( 'css/bootstrap.min.css', __FILE__ ));
	wp_enqueue_script('joomdev-wpc-popper-script', plugins_url( 'js/popper.min.js', __FILE__ ));
	wp_enqueue_script('joomdev-wpc-bootstrap-script', plugins_url( 'js/bootstrap.min.js', __FILE__ ));
}

function joomdev_wpc_enable_fontawesome(){
	wp_enqueue_style('joomdev-wpc-font-awesome-style', plugins_url( 'css/font-awesome.min.css', __FILE__ ));
}

// file ends here