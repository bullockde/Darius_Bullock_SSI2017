<?php

	if( get_post_meta(  $post->ID , 'MX_user_gallery'  ) ){ $pix =  get_post_meta(  $post->ID , 'MX_user_gallery'  ); }
	
	
	//print_r($pix[0]);
	
	$pix = $pix[0];
	$cnt = count($pix);
	//echo "CNT" . $cnt--;
	?>
	
	<?php
	
	$gallery = "[gallery  link='file' columns='3' include='";
	foreach( $pix as $pic ){
		
		$gallery = $gallery . $pic;
		if( $cnt-- > 0 ){ $gallery = $gallery . ", "; }
	?>  

	<?php
	}
	$gallery = $gallery . " ]";
	//$gallery = '"' . $gallery. '"';
	echo do_shortcode(  "$gallery" );
?>
