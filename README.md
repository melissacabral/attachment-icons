#attachment-icons

WordPress plugin for adding automatic icons for non-image attachments

=============

##Usage
* install in your wp-content/plugins directory
* add this code anywhere in your theme templates, within the loop! (probably in single.php)
```if(function_exists('mc_get_attachment_icons')){
     echo mc_get_attachment_icons();
}```
* OR add this shortcode to any post or page **`[icons]`**

### How to add attachments
* edit/write a post
* use WordPress's "Upload/Insert"  Media button to add your files. 
* You simply need to upload the file, you do **NOT** need to "insert into post." The plugin will take care of any files attached to the post for you, so long as they are in the supported file types below. 



##Supported File Types
* PDF
* PSD
* ZIP
* Excel
* Powerpoint
* Word Doc
* Plain TXT
* JavaScript
* MP3


#####Credits
[Icon Graphics](http://icons8.com/download-huge-windows8-set/)
