jQuery(function($) {
    tinymce.create("tinymce.plugins.joomdev_wpc_shortcode", {

        //url argument holds the absolute url of our plugin directory
        init : function(ed, url) {

            //add new button     
            ed.addButton("joomdev_wpc_shortcode", {
                title : "WP Pros & Cons Shortcode",
                cmd : "joomdev_wpc_shortcode_command",
                image : joomdev_wpc_plugin_url + '/images/joomdev-wpc.png'
            });

            //button functionality.
            ed.addCommand("joomdev_wpc_shortcode_command", function(ui, v) {

                // open popup on click this button
                var d = $('#joomdev_wpc_editor_button_popup').dialog('open');

            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "WP Pros &amp; Cons Button",
                author : "JoomDev",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("joomdev_wpc_shortcode", tinymce.plugins.joomdev_wpc_shortcode);
});