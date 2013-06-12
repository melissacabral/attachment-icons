attachment-icons
================

plugin for adding automatic icons for non-image attachments

Usage
=====
* install in your wp-content/plugins directory
* add this code anywhere in your theme templates, within the loop! (probably in single.php)
if(function_exists('mc_get_attachment_icons')){
     echo mc_get_attachment_icons();
}

* OR add this shortcode to any post or page _[icons]_
  
