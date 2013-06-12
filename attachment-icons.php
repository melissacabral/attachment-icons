<?php
/*
Plugin Name: Attachment Icons
Description: Adds Nice Icons to a post with .pdf, .txt, .psd, and .zip attachments. add the function  mc_get_attachment_icons anywhere in your theme
Author: Melissa Cabral
*/
/**
 * 	Fancy Attachment Icon detection. put this anywhere in your templates
 */
function mc_get_attachment_icons(){
	//wrap it in a div
	$sAttachmentString = "<div class='attachment-icons-wrapper cf'>";
	
	//PDF 
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/pdf', 'pdf-48.png' );
	//PSD 
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/x-photoshop', 'psd-48.png' );
	//ZIP FILE
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/zip', 'zip-48.png' );
	//Excel
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/vnd.ms-excel', 'exel-48.png' );
	//Powerpoint
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/vnd.ms-powerpoint', 'powerpoint-48.png' );
	//Word .Doc
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/msword', 'word-48.png' );
	//TXT FILE
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'text/plain', 'document-48.png' );
	//JS Document
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'application/x-javascript', 'js-48.png' );
	//AUDIO MP3
	$sAttachmentString .= check_for_attachment( get_the_ID(), 'audio/mpeg', 'audio-file-48.png' );


	//DONE. close it up!
	$sAttachmentString .= "</div>";
	return $sAttachmentString;
}

add_shortcode('icons', 'mc_get_attachment_icons');

/**
 * add .psd to the list of allowed mime types
 */
add_filter("upload_mimes","add_upload_ext");
function add_upload_ext($mimes=''){
	$mimes['psd']='application/x-photoshop';
	$mimes['js']='application/x-javascript';
	return $mimes;
}


/**
 * Check for a specific mime type and generate icons for each attachment
 * 	@param $id use get_the_ID()
 */
function check_for_attachment( $id, $mime, $image_name ){
	if ( $files = get_children(array(   
		'post_parent' => $id,
		'post_type' => 'attachment',
		'numberposts' => -1,
	 	'post_mime_type' => $mime,  //MIME Type condition
	 	))){
		foreach( $files as $file ){ //setup array for more than one file attachment
			$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
			$file_name_array=explode("/",$file_link);
			$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
			$image = plugins_url( 'images/'.$image_name, __FILE__ );
			$sAttachmentString .= "<div class='attachment-icon '>";
			$sAttachmentString .= "<a href='$file_link'class='cf'>";
			$sAttachmentString .= "<img src='$image' class='icon' />";

			$sAttachmentString .= "<span class='title' href='$file_link'>Download  $file_name[0]</span></a>";
			$sAttachmentString .= "</div><!-- one icon-->";
			return $sAttachmentString;			
		}
	}
}

/**
 * attach basic styles
 */
add_action('wp_enqueue_scripts', 'mc_icon_styles');
function mc_icon_styles(){
	wp_enqueue_style( 'mc-icon-style', 
		plugins_url( 'css/style.css',__FILE__ ) );
}