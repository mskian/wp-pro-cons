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
        <style type="text/css">
            .jommdev-wpc-settings-header{
                background-color: #fff;
                border-top: 4px solid #23282d;
                padding: 25px 30px;
                margin-bottom: 20px;
            }
            .column-left{
                float: left;
            }
            .column-right{
                float: right;
            }
            .jommdev-more-themes-plugins-button{
                background-color: #23282d;
                padding: 10px 20px;
                font-size: 13px;
                font-weight: bold;
                text-transform: uppercase;
                color: #fff;
                text-decoration: none;
                border-radius: 3px;
            }
            .jommdev-more-themes-plugins-button:hover{
                color: #fff;
            }

            .jommdev-wpc-settings-menu-tabs{
                margin-bottom: 20px;
                border-bottom: 4px solid #fff;
            }
            .jommdev-wpc-settings-menu-tabs ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .jommdev-wpc-settings-menu-tabs ul li{
                list-style-type: none;
                display: inline-block;
                margin: 0;
                padding: 0;
            }
            .jommdev-wpc-settings-menu-tabs ul li a{
                display: block;
                padding: 10px;
                border-top: 2px solid #dd7e7e;
                text-decoration: none;
                color: #dd7e7e;
                background-color: #fff;
                font-weight: bold;
            }
            .jommdev-wpc-settings-menu-tabs ul li a:hover{
                color: #dd7e7e;
            }
        </style>
    	<div class="wrap">
    		<!-- <h2>JoomDev WP Pros & Cons Settings</h2> -->
            <h2></h2>
            <div class="jommdev-wpc-settings-header">
                <div class="column-left">
                    <h1><img src="<?php echo plugins_url( JOOMDEV_DIR . '/images/joomdev-wpc.png' ); ?>"> <b>WP Pros &amp; Cons</b> <small><small>by <b><i>JoomDev</i></b></small></small></h1>
                </div>
                <div class="column-right">
                    <a href="https://www.jdthemes.com/" target="_BLANK" class="jommdev-more-themes-plugins-button"><i class="fa fa-cart"></i> More WP Themes &amp; Plugins</a>
                </div>
                <div class="clear"></div>
            </div>

            <div class="jommdev-wpc-settings-menu-tabs">
                <ul>
                    <li>
                        <a href="javascript:;">Settings</a>
                    </li>
                </ul>
            </div>


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

    		<!-- <img style="max-width:100%;" src="<?php echo plugins_url( JOOMDEV_DIR . '/images/settings-header.png' ); ?>"> -->

    		<form method="post" action="options.php">

    			<?php 
    				settings_fields('joomdev_wpc_options');
    				// $joomdev_wpc_options = get_option('joomdev_wpc_options', array());
    				$joomdev_wpc_options = get_joomdev_wpc_options();
    			?>

    			<table class="form-table">
    				<tbody>
    					<!-- <tr>
    						<th>Enable Plugin Bootstrap</th>
    						<td>
    							<input name="joomdev_wpc_options[enable_bootstrap]" type="hidden" value="no" class="">
    							<input name="joomdev_wpc_options[enable_bootstrap]" type="checkbox" value="yes" <?php // echo (isset($joomdev_wpc_options['enable_bootstrap']) && $joomdev_wpc_options['enable_bootstrap'] == 'yes') ? 'checked' : ''; ?> class="">
    						</td>
    					</tr>
    					<tr>
    						<th>Enable Plugin Fontawesome</th>
    						<td>
    							<input name="joomdev_wpc_options[enable_fontawesome]" type="hidden" value="no" class="">
    							<input name="joomdev_wpc_options[enable_fontawesome]" type="checkbox" value="yes" <?php // echo (isset($joomdev_wpc_options['enable_fontawesome']) && $joomdev_wpc_options['enable_fontawesome'] == 'yes') ? 'checked' : ''; ?> class="">
    						</td>
    					</tr> -->
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

function joomdev_wpc_editor_button_popup(){

    $r = array(
                'title' => 'Title Here',
                'button_text' => 'Get it now',
                'pros' => array(),
                'cons' => array(),
                'disable_button' => 'no',
                'button_link' => 'javascript:;',
                'button_link_target' => '_SELF',
                'button_rel_attr' => 'nofollow',
            );
    /*$screen = get_current_screen();
    if($screen->base == 'post'){
        global $post;
        $description = $post->post_content;
        $r = joomdev_wpc_extract_shortcode($description);
    }*/

    ?>
        <!-- The modal / dialog box, hidden somewhere near the footer -->
        <div id="joomdev_wpc_editor_button_popup" class="hidden" style="max-width:800px">
            <div class="joomdev_wpc_title">
                <label>
                    <h4>Title</h4>
                    <input type="text" name="joomdev_wpc_title" class="regular-text" value="<?php echo $r['title']; ?>">
                </label>
            </div>
            <div class="clear"></div>
            <div class="column">
                <h4>Pros</h4>
                <div class="joomdev_wpc_pros">
                    <?php 
                        if(!empty($r['pros'])){
                            foreach ($r['pros'] as $value) {
                                ?>
                                    <div class="joomdev_wpc_pro_single">
                                        <input type="text" class="regular-text" name="joomdev_wpc_pro_single[]" value="<?php echo $value; ?>">
                                        <span class="joomdev_wpc_pro_single_remove">&times;</span>
                                    </div>
                                <?php 
                            }
                        }
                    ?>
                </div>
                <button type="button" class="button button-secondary button-large joomdev_wpc_add_pros">+ Add Pros</button>
            </div>
            <div class="column">
                <h4>Cons</h4>
                <div class="joomdev_wpc_cons">
                    <?php 
                        if(!empty($r['cons'])){
                            foreach ($r['cons'] as $value) {
                                ?>
                                    <div class="joomdev_wpc_con_single">
                                        <input type="text" class="regular-text" name="joomdev_wpc_con_single[]" value="<?php echo $value; ?>">
                                        <span class="joomdev_wpc_con_single_remove">&times;</span>
                                    </div>
                                <?php 
                            }
                        }
                    ?>
                </div>
                <button type="button" class="button button-secondary button-large joomdev_wpc_add_cons">+ Add Cons</button>
            </div>
            <div class="clear"></div>
            <div class="mb20">
                <label><h4>Disable Button</h4>
                    <input type="hidden" name="joomdev_wpc_disable_button" value="no">
                    <input type="checkbox" name="joomdev_wpc_disable_button" id="joomdev_wpc_disable_button" value="yes">
                </label>
            </div>
            <div class="clear"></div>
            <div class="column">
                <div class="joomdev_wpc_button_text">
                    <label><h4>Button Text</h4>
                        <input type="text" name="joomdev_wpc_button_text" class="regular-text" value="<?php echo $r['button_text']; ?>">
                    </label>
                </div>
            </div>
            <div class="column">
                <div class="mb20">
                    <label><h4>Button Link</h4>
                        <input type="text" name="joomdev_wpc_button_link" class="regular-text" value="<?php echo $r['button_link']; ?>">
                    </label>
                </div>
            </div>
            <div class="clear"></div>

            <div class="clear"></div>
            <div class="column">
                <div class="mb20">
                    <label><h4>Button Link Target</h4>
                        <select name="joomdev_wpc_button_link_target">
                            <option value="_SELF" selected>Open in same tab</option>
                            <option value="_BLANK">Open in new tab</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="column">
                <div class="mb20">
                    <label><h4>Button Rel Attribute</h4>
                        <select name="joomdev_wpc_button_rel_attr">
                            <option value="nofollow" selected>Nofollow</option>
                            <option value="noreferrer">Noreferrer</option>
                            <option value="noopener">Noopener</option>
                            <option value="external">External</option>
                            <option value="help">Help</option>
                            <option value="alternate">Alternate</option>
                            <option value="author">Author</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="clear"></div>
        
            <div class="joomdev_wpc_save">
                <button type="button" class="button button-primary button-large joomdev_wpc_save_shortcode">Save Shortcode</button>
                <button type="button" class="button button-secondary button-large joomdev_wpc_cancel_shortcode">Cancel</button>
            </div>
        </div>

        <style type="text/css">
            .mb20{
                margin-bottom: 20px;
            }
            .joomdev_wpc_title{
                margin-bottom: 20px;
            }
            .joomdev_wpc_button_text{
                margin-bottom: 20px;
                margin-top: 20px;
            }
            .joomdev_wpc_save{
                border-top: 1px solid #d9d9d9;
                text-align: right;
                padding-top: 20px;
            }
            .column{
                float: left;
                min-width: 390px;
                /*border-right: 1px solid #d9d9d9;*/
            }
            .column:last-child{
                border-right: none;
            }

            .joomdev_wpc_pro_single_remove, .joomdev_wpc_con_single_remove{
                background-color: #f00;
                color: #fff;
                font-weight: bold;
                width: 26px;
                display: inline-block;
                height: 26px;
                line-height: 20px;
                border-radius: 30px;
                text-align: center;
                font-size: 20px;
                cursor: pointer;
            }
            .joomdev_wpc_pro_single, .joomdev_wpc_con_single{
                margin-bottom: 10px;
            }
        </style>

        <script type="text/javascript" id="joomdev_wpc_add_pros_single">
            var joomdev_wpc_add_pros_single = '<div class="joomdev_wpc_pro_single">' +
                '<input type="text" class="regular-text" name="joomdev_wpc_pro_single[]" value="">' +
                '<span class="joomdev_wpc_pro_single_remove">&times;</span>' +
            '</div>';
        </script>

        <script type="text/javascript" id="joomdev_wpc_add_cons_single">
            var joomdev_wpc_add_cons_single = '<div class="joomdev_wpc_con_single">' +
                '<input type="text" class="regular-text" name="joomdev_wpc_con_single[]" value="">' +
                '<span class="joomdev_wpc_con_single_remove">&times;</span>' +
            '</div>';
        </script>

        <script type="text/javascript">
            jQuery(function($){
                // pros
                $(document).on('click', '.joomdev_wpc_add_pros', function(e){
                    e.preventDefault();
                    var single_pro_html = joomdev_wpc_add_pros_single; //$('#joomdev_wpc_add_pros_single').html();
                    $(document).find('.joomdev_wpc_pros').append(single_pro_html);
                });

                $(document).on('click', '.joomdev_wpc_pro_single_remove', function(e){
                    e.preventDefault();
                    $(this).closest('.joomdev_wpc_pro_single').remove();
                });

                // cons
                $(document).on('click', '.joomdev_wpc_add_cons', function(e){
                    e.preventDefault();
                    var single_con_html = joomdev_wpc_add_cons_single; //$('#joomdev_wpc_add_cons_single').html();
                    $(document).find('.joomdev_wpc_cons').append(single_con_html);
                });

                $(document).on('click', '.joomdev_wpc_con_single_remove', function(e){
                    e.preventDefault();
                    $(this).closest('.joomdev_wpc_con_single').remove();
                });

                // save shortcode joomdev_wpc_save_shortcode
                $(document).on('click', '.joomdev_wpc_save_shortcode', function(e){
                    e.preventDefault();
                    var title = $(document).find('[name="joomdev_wpc_title"]').val();
                    title = $.trim(title);
                    var button_text = $(document).find('[name="joomdev_wpc_button_text"]').val();
                    button_text = $.trim(button_text);
                    var disable_button = $(document).find('#joomdev_wpc_disable_button').is(':checked') ? 'yes' : 'no';
                    disable_button = $.trim(disable_button);
                    var button_link = $(document).find('[name="joomdev_wpc_button_link"]').val();
                    button_link = $.trim(button_link);
                    var button_link_target = $(document).find('[name="joomdev_wpc_button_link_target"]').val();
                    button_link_target = $.trim(button_link_target);
                    var button_rel_attr = $(document).find('[name="joomdev_wpc_button_rel_attr"]').val();
                    button_rel_attr = $.trim(button_rel_attr);

                    var shortcode_string_pros = '';
                    $(document).find('[name="joomdev_wpc_pro_single[]"]').each(function(){
                        var v = $(this).val();
                        v = $.trim(v);
                        // shortcode_string_pros += '[joomdev-wpc-pros]'+v+'[/joomdev-wpc-pros]';
                        shortcode_string_pros += '<li class="joomdev_wpc_pro_single">'+v+'</li>';
                    });
                    var shortcode_string_pros_list = '[joomdev-wpc-pros]<h4 class="section-title">Pros</h4><ul class="joomdev_wpc_pros_list">'+shortcode_string_pros+'</ul>[/joomdev-wpc-pros]';

                    var shortcode_string_cons = '';
                    $(document).find('[name="joomdev_wpc_con_single[]"]').each(function(){
                        var v = $(this).val();
                        v = $.trim(v);
                        // shortcode_string_cons += '[joomdev-wpc-cons]'+v+'[/joomdev-wpc-cons]';
                        shortcode_string_cons += '<li class="joomdev_wpc_con_single">'+v+'</li>';
                    });
                    var shortcode_string_cons_list = '[joomdev-wpc-cons]<h4 class="section-title">Cons</h4><ul class="joomdev_wpc_cons_list">'+shortcode_string_cons+'</ul>[/joomdev-wpc-cons]';

                    var shortcode_string = '<br>[joomdev-wpc-pros-cons title="'+title+'" button_text="'+button_text+'" disable_button="'+disable_button+'" button_link="'+button_link+'" button_link_target="'+button_link_target+'" button_rel_attr="'+button_rel_attr+'"]'+shortcode_string_pros_list+shortcode_string_cons_list+'[/joomdev-wpc-pros-cons]<br>';
                    window.parent.send_to_editor(shortcode_string);
                    window.parent.tb_remove();
                    $('#joomdev_wpc_editor_button_popup').dialog('close');
                });

                $(document).on('click', '.joomdev_wpc_cancel_shortcode', function(){
                    $('#joomdev_wpc_editor_button_popup').dialog('close');
                });
            });
        </script>

        <script type="text/javascript">
            jQuery(function($){
                // initalise the dialog
                $('#joomdev_wpc_editor_button_popup').dialog({
                    title: 'JoomDev Pros & Cons',
                    dialogClass: 'wp-dialog',
                    autoOpen: false,
                    draggable: false,
                    width: 'auto',
                    modal: true,
                    resizable: false,
                    closeOnEscape: true,
                    position: {
                        my: "center",
                        at: "center",
                        of: window
                    },
                    open: function () {
                        // close dialog by clicking the overlay behind it
                        $('.ui-widget-overlay').bind('click', function(){
                            $('#joomdev_wpc_editor_button_popup').dialog('close');
                        });
                    },
                    create: function () {
                        // style fix for WordPress admin
                        $('.ui-dialog-titlebar-close').addClass('ui-button');
                    },
                    /*buttons: {
                        Submit: function (e) {
                            alert(1);
                        },
                        Cancel: function() {
                            jQuery(this).dialog("close");
                        }
                    }*/
                });
                
                // bind a button or a link to open the dialog
                $('#joomdev_wpc_editor_button_popup_open').click(function(e) {
                    e.preventDefault();
                    $('#joomdev_wpc_editor_button_popup').dialog('open');
                });

            });
        </script>
    <?php 
}




// file ends here.