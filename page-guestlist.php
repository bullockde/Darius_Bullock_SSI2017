<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

get_header('network'); ?>

<div id="primary" class="">


					
							
			
	
	<div id='add-gallery' style='display: block;' class='text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			<button id='add-gallery' class='hidden-print btn btn-success btn-lg btn-block1'>> New Post <</button><hr>
			
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-xs-10 col-xs-offset-1  home-beta">
			<center><h3> New Post! </h3></center>
			</div>
			<div class="col-xs-10 col-xs-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[gravityform id="17" title="false" description="false"]
			');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clear'></div>	<br>
			</div>
		</div>
	<div class='clear'></div>
			
			

	<div class=' '><div class='col-xs-12'>
	
	
<?php

		$args = array( 'post_type' => 'event_guests' , 'posts_per_page' => 200  );

		$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
		//	if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class=' col-xs-3 '>
			<div class='col-xs-12'>

				
			<?php 
				echo "<div class='' >";
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
				echo "</div>";
				?>
				<!--<a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
				-->
			</div>

			<div class='col-xs-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div><br><br>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			<h4> <a href='/event_guests/<?php echo $lead->post_name; ?>'> <?php echo $lead->post_title; ?> </a> <small>  </h4>
			
			
		</div>
		<div class=' col-xs-3 '>
				<?php echo get_field( 'MX_user_phone', $lead->ID ); ?>
		</div>
		<div class=' col-xs-3 '>
				<?php echo get_field( 'MX_user_email', $lead->ID ); ?>
		</div>
		
		<div class=' col-xs-3 '>
			<?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small>
		</div>


		<div class='clear'></div><hr>

		
		<?php 

		if( ($count % 3) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>
</div>
	
	
		
				<div class='clear'></div>
				<br><br>
	
</div>
	
</div><!-- .content-area -->
<hr>
<?php //get_template_part( 'content', 'welcome' ); ?>

<?php 
	get_footer('ssixxx'); 
?>