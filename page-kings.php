<?php get_header(); 
global $post;

?>
 <style>
.cashapp.img-thumbnail {
    background: url("http://dlfreakfest.org/wp-content/themes/ssi2017/images/icons/icon-cashapp.png");
    background-size: 50px;
    color: #1f73c9;

    background-position: center;
    padding-top: 7px;
	 padding: 1.5em 2em;
	
}
.well.mb-5 {
    background: #26a406;
}
</style>   


<div id='video-choice'></div>

	
    <div class="col-md-12">
	
		<?php
			//get_template_part( 'content', 'upcoming-events' ); 
		 //get_template_part( 'content', 'uc-events' ); 
		 get_template_part( 'content', 'welcome' ); 
	?>
	
		<?php  get_template_part('content','social-twitter');  ?>
		
	
		<div class='clearfix'></div>
  </div>   
    <div class='clearfix'></div>
<?php get_footer("kik"); ?>
