<?php 
add_action( 'admin_menu', 'jommdev_wpc_register_menu_page' );
function jommdev_wpc_register_menu_page(){
    add_menu_page( 
        'JoomDev WP Pros & Cons Settings',
        'JoomDev WPC',
        'manage_options',
        'jommdev-wpc-settings',
        'jommdev_wpc_register_menu_page_callback',
        plugins_url( JOOMDEV_DIR . '/images/joomdev-wpc.png' )
        // 10
    ); 
}


add_action( 'admin_init', 'joomdev_wpc_register_setting' );
function joomdev_wpc_register_setting() {
    register_setting( 'joomdev_wpc_options', 'joomdev_wpc_options', 'joomdev_wpc_register_setting_callback' ); 
}

function joomdev_wpc_register_setting_callback($a){
	return $a;
}

function jommdev_wpc_register_menu_page_callback(){
    ?>
    	<div class="wrap">
    		<h2>JoomDev WP Pros & Cons Settings</h2>

    		<?php 
    			if($_GET['settings-updated']){
					?>
						<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
							<p><strong>Settings saved.</strong></p>
							<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
						</div>
					<?php 
				}
    		?>

    		<img style="max-width:100%;" src="<?php echo plugins_url( JOOMDEV_DIR . '/images/settings-header.png' ); ?>">

    		<form method="post" action="options.php">

    			<?php 
    				settings_fields('joomdev_wpc_options');
    				// $joomdev_wpc_options = get_option('joomdev_wpc_options', array());
    				$joomdev_wpc_options = get_joomdev_wpc_options();
    			?>

    			<table class="form-table">
    				<tbody>
    					<tr>
    						<th>Enable Plugin Bootstrap</th>
    						<td>
    							<input name="joomdev_wpc_options[enable_bootstrap]" type="hidden" value="no" class="">
    							<input name="joomdev_wpc_options[enable_bootstrap]" type="checkbox" value="yes" <?php echo (isset($joomdev_wpc_options['enable_bootstrap']) && $joomdev_wpc_options['enable_bootstrap'] == 'yes') ? 'checked' : ''; ?> class="">
    						</td>
    					</tr>
    					<tr>
    						<th>Enable Plugin Fontawesome</th>
    						<td>
    							<input name="joomdev_wpc_options[enable_fontawesome]" type="hidden" value="no" class="">
    							<input name="joomdev_wpc_options[enable_fontawesome]" type="checkbox" value="yes" <?php echo (isset($joomdev_wpc_options['enable_fontawesome']) && $joomdev_wpc_options['enable_fontawesome'] == 'yes') ? 'checked' : ''; ?> class="">
    						</td>
    					</tr>
    					<tr>
    						<th>Box Background Color</th>
    						<td>
    							<input name="joomdev_wpc_options[box_background_color]" type="text" value="<?php echo isset($joomdev_wpc_options['box_background_color']) ? $joomdev_wpc_options['box_background_color'] : ''; ?>" class="regular-text joomdev-color-picker">
    						</td>
    					</tr>
    					<tr>
    						<th>Disable Box Border</th>
    						<td>
    							<input name="joomdev_wpc_options[disable_box_border]" type="hidden" value="no" class="">
    							<input name="joomdev_wpc_options[disable_box_border]" type="checkbox" value="yes" <?php echo (isset($joomdev_wpc_options['disable_box_border']) && $joomdev_wpc_options['disable_box_border'] == 'yes') ? 'checked' : ''; ?> class="">
    						</td>
    					</tr>
    					<tr>
    						<th>Box Border Style</th>
    						<td>
    							<select name="joomdev_wpc_options[box_border_style]">
    								<option <?php echo (isset($joomdev_wpc_options['box_border_style']) && $joomdev_wpc_options['box_border_style'] == 'none') ? 'selected' : ''; ?> value="none">None</option>
    								<option <?php echo (isset($joomdev_wpc_options['box_border_style']) && $joomdev_wpc_options['box_border_style'] == 'dotted') ? 'selected' : ''; ?> value="dotted">Dotted</option>
    								<option <?php echo (isset($joomdev_wpc_options['box_border_style']) && $joomdev_wpc_options['box_border_style'] == 'solid') ? 'selected' : ''; ?> value="solid">Solid</option>
    								<option <?php echo (isset($joomdev_wpc_options['box_border_style']) && $joomdev_wpc_options['box_border_style'] == 'dashed') ? 'selected' : ''; ?> value="dashed">Dashed</option>
    							</select>
    						</td>
    					</tr>
    					<tr>
    						<th>Box Border Color</th>
    						<td>
    							<input name="joomdev_wpc_options[box_border_color]" type="text" value="<?php echo isset($joomdev_wpc_options['box_border_color']) ? $joomdev_wpc_options['box_border_color'] : ''; ?>" class="regular-text joomdev-color-picker">
    						</td>
    					</tr>
    					<tr>
    						<th>Button Color</th>
    						<td>
    							<input name="joomdev_wpc_options[button_color]" type="text" value="<?php echo isset($joomdev_wpc_options['button_color']) ? $joomdev_wpc_options['button_color'] : ''; ?>" class="regular-text joomdev-color-picker">
    						</td>
    					</tr>
    					<tr>
    						<th>Button Text Color</th>
    						<td>
    							<input name="joomdev_wpc_options[button_text_color]" type="text" value="<?php echo isset($joomdev_wpc_options['button_text_color']) ? $joomdev_wpc_options['button_text_color'] : ''; ?>" class="regular-text joomdev-color-picker">
    						</td>
    					</tr>
    				</tbody>
    			</table>

    			<?php submit_button(); ?>
    		</form>
    	</div>
    <?php  
}

add_filter("mce_external_plugins", "joomdev_wpc_enqueue_editor_scripts");
function joomdev_wpc_enqueue_editor_scripts($plugin_array){
    //enqueue TinyMCE plugin script with its ID.
    $plugin_array["joomdev_wpc_shortcode"] =  plugins_url( JOOMDEV_DIR . '/js/editor.js' );
    return $plugin_array;
}

add_filter("mce_buttons", "joomdev_wpc_register_buttons_editor");
function joomdev_wpc_register_buttons_editor($buttons){
    //register buttons with their id.
    array_push($buttons, "joomdev_wpc_shortcode");
    return $buttons;
}






// file ends here.