<?php
/**
 * Template Name: Video Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

get_header('profile'); ?>



<div id="primary"  class='container'>

	
			<br>
			
			<div class='col-md-8'>
			
			    
		 <a href="/post" class="btn-block btn btn-success btn-lg pulse hidden mb-10"><br><h3>Add Videos &raquo;</h3><br></a>
            

                            <?php echo do_shortcode('[rtmedia_uploader]'); ?>
							<div class='clear'></div>
							
							<?php echo do_shortcode('[rtmedia_gallery global="true" media_type="video"]'); ?>
							
							<div class='clear'></div>
							

<?php

	if( is_page('tour') ){ $args = array( 'order' => 'ASC' ,'post_type' => 'ssi_videos', 'posts_per_page' => -1  ); }
	else{ $args = array( 'post_type' => 'ssi_videos', 'posts_per_page' => -1  ); }
		
		$skipped = 0;

		$leads = get_posts( $args );

		//print_r( $leads );
		foreach( $leads as $lead ){
			
			if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }

	?>
	
		<div class='video-set well'>
			<div class='col-md-12'>
			
				<h4> <?php 
					echo $lead->post_title; ?> </h4>
					
				
			
			<?php 
				echo "<div class='' >";

					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
				echo "</div>";
				?>
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive'></a>
			</div>

			<div class='col-md-12'>
					<div class='visible-xs'><br><br></div>
				
				<?php
				
						
					if( get_field( 'gallery_shortcode', $lead->ID ) ){ 
					
						echo "<h4>Photo Set</h4>";
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
				?>
					<a href='<?php 	if( get_field( 'gallery_id', $lead->ID ) ){  echo  "/?p=" . get_field( 'gallery_id', $lead->ID ); }else{ echo "/photos"; } ?> ' target='_blank'> 
				<?php 
						echo do_shortcode($shortcode);
						
				?>
				</a>
				<?php
				
					}else if(get_field( 'member_level', $lead->ID ) == 'Sponsored' ){ 
						echo "<h4>A Gift From <a href=' http://instaflixxx.com/' target='_blank'>InstaFliXXX</a>!</h4>";
					?>
						
					<?php get_template_part( 'ad' , '150-150' ); ?>
				<?php 
						}
					?>
						
				

				<div class='clear'></div>
				<?php if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Sponsored' ){?>
					<p class="btn btn-block btn-lg btn-success pulse" style="text-align: center; border-radius: 0;"><a href="/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>"  class="white">View Video &rarr;</a></p>
				
				<?php }else{ ?>
					<p class="btn btn-block btn-lg btn-success pulse" style="text-align: center; border-radius: 0;"><a href="/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>" class="white">View Preview &rarr;</a></p>
				<?php } ?>
			</div>
			<div class='clear'></div><hr>
			
			 <u><?php echo get_field( 'member_level', $lead->ID ); ?></u> | <b>Runtime:</b> <?php echo get_field( 'video_length', $lead->ID ); ?> | <b>Date Added:</b> <?php echo date( 'm/d/y' , strtotime($lead->post_date) ); ?> <!--  #  | <b>Rating:</b> <?php echo ""; ?>-->
			<hr>
			
			<?php 
				if( has_excerpt($lead->ID) != '' ){
					echo get_the_excerpt($lead->ID);
				}
				//echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>"; ?>
		</div>
	<?php 
		}// #END forach
	?>

	<div class='clear'></div>
	
	<a href='/video-gallery/' class='btn home btn-lg btn-danger btn-block'><?php echo "<u>" .  $skipped . "</u> Member Videos" ;?> >></a>
	<div class='clear'></div><br><br>
	<?php 
	echo "</div>";


?>
<div class='col-md-4 text-center'>

<!--<a href='/party/'><img src='http://ssixxx.com/wp-content/uploads/2016/08/SSIxXx-Party-Sept-2016-vote-2.png'></a><br><br>-->

<?php get_template_part( 'ad-exo' , '300-250-1' ); ?>

<!--    <a href="http://www.ssixxx.com/ks"><img class="size-full wp-image-10826 aligncenter" src="http://shamanshawn.com/wp-content/uploads/enter-here-button.jpg" alt="SSIxXx_5_20_16-2" width="449" height="318" /></a>-->
<br>
<?php get_template_part( 'ad-exo' , '300-250-2' ); ?>
	



	<div class='hidden well'>Show Your Support ;-)</div>
	<?php // get_template_part( 'content', 'donate' ); ?>
	
	<div class='clear'></div><br><br><br>
	
	<!--   <a href='/book/'> <img src='' class='img-responsive aligncenter'><button >Request A Session!</button></a>  -->
	<div class='clear'></div><br><br><br>

</div>


	
</div><!-- .content-area -->

<?php //get_template_part( 'content', 'dashboard' ); ?>
<?php 
	get_footer(); 
?>