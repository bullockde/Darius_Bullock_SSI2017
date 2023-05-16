<?php


get_header(); ?>

<div id="" class="container-fluid">

		<br>
			
<div class='container '>
		<div class='col-md-10'>




			<div class="clear"></div>
			
			<div class="paginator hidden1"><center>
					<div class='col-xs-6'>

						<div class="img-thumbnail ads ad-shift pad-20">
							<a target='_blank' class='pull-right' href='http://instaflixxx.com/category/straight-porn'>
							<img src='http://instaflixxx.com/wp-content/uploads/2013/06/str8-button.png' class='img-thumbnail'>
							
							</a>
						</div>
						
						</a>
					</div>
					<div class='col-xs-6 '>
						<div class="img-thumbnail ads ad-shift pad-20">
							
							<a target='_blank' class='pull-left' href='http://instaflixxx.com/category/gay'>
							<img src='http://instaflixxx.com/wp-content/uploads/2013/06/gay-button2.png' class='img-thumbnail '>
							</a>
						</div>
						
					</div>
					
					<div class='clearfix'></div><br>
                    
                <a class='pull-left hidden' href='/category/straight-porn'>&lsaquo; Str8</a>
				<a class='pull-right hidden' href='/category/gay'>Gay >></a>
				</center>
            </div>
			
			<div class="clear"></div>



<?php

		$args = array( 'post_type' => 'ssi_videos', 'posts_per_page' => -1  );

		$leads = get_posts( $args );
		
		$count = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			$count++;

			$post = $lead;
		
			//if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Sponsored'){ continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-4 well pad-0'>
			<div class='1col-md-12'>

				<?php get_template_part( 'content', 'post' ); ?>



				<div class='col-md-12'>

				<div class="col-xs-4 text-center">

					<?php echo get_field( 'member_level', $lead->ID ); ?>
					
					<?php
						if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
								
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';
?>
								<a href='/?p=<?php echo $lead->ID; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive 1img-thumbnail circle'></a>
								<?php
   					 	}
					}else if( get_field('youtube_id', $lead->ID) ) {
						?>
						<center>
							<div class='clearfix mb-5'></div>
						<a href='/?p=<?php echo $lead->ID; ?>'>
							<img src='http://img.youtube.com/vi/<?php echo get_field('youtube_id', $lead->ID); ?>/0.jpg' alt='Youtube Image' class='img-responsive img-thumbnail mb-10' >
						</a>	
						
						</center>
						<?php
						
					}else{
						?>
						<center>
						<a href='/?p=<?php echo $lead->ID; ?>'>
							<img  src='/wp-content/uploads/2017/10/21433968_175756556303549_4577358612573192192_n.jpg' alt='Youtube Image' class='img-responsive circle'>
						</a>	
						
						</center>
						<?php
						
					}
			
					?>
				
					

					
				</div>
				<div class="col-xs-8">
					<div class='clear'></div>
					
					<a href='/?p=<?php echo $lead->ID; ?>'>
						<strong><?php echo $lead->post_title; ?></strong> | <small>
						<?php echo get_field( 'video_length', $lead->ID ); ?>
					 </small><br>
					</a>

					<div class='clearfix '></div>
				

					
				</div>
				<div class='clearfix '></div><hr class="mb-0">
					<a href="/?p=<?php echo $lead->ID; ?>" class="btn btn-block btn-default hidden1">View &raquo;</a>


			</div>

			
		
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive 1aligncenter mb-10'></a>



				
				
				
				
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			<h5> <center><?php echo substr( $lead->post_title ,0 , 20); ?> ..</center> </h5>
			
			
			<div class='clear'></div><hr>
			
			 <b>Runtime:</b> <?php echo get_field( 'video_length', $lead->ID ); ?> | <b>Added:</b> <?php echo date( 'm/d/y' , strtotime($lead->post_date) ); ?> 
		</div>
		
		
		<?php 

		if( ($count % 3) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>

		</div>
		<div class='col-md-2 text-center '>
				<div class='ads ad-shift img-thumbnail'>
					<?php get_template_part( 'ad' , '160-600' ); ?>		
				</div>
	
		</div>
		
				<div class='clearfix'></div>
				
				
</div>
	
</div><!-- .content-area -->
<?php 
	get_footer('members'); 
?>