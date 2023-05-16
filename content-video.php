<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h1 class="strong text-center mb-10 hiddden11"><?php the_title(); ?></h1>
	
						<center>
							<div style="text-align:center;">
								<?php echo get_next_posts_link('Go to next page'); ?>
							</div>
							
							<div class='clearfix img-thumbnail mb-5 '>
							
							
							<?php /*echo  do_shortcode('[gravityform id="6" name="Video Removed"]'); */ 
					
							if( get_post_meta( get_the_ID(), 'post_type' , 1 ) == "ssi_photos" ){ the_post_thumbnail(); }else{ the_post_thumbnail(); }
							
							
							
							?>
						</div>
							
						
		<div class='clearfix mb-0 '> </div>
		

							<?php 
							
							if(get_field('youtube_id', get_the_ID())){
									?>
										<center>
											<img src="http://img.youtube.com/vi/<?php echo get_field('youtube_id', get_the_ID()); ?>/0.jpg" alt="Youtube Image"  class="1circle hidden img-thumbnail img-responsive" width="100%">
										</center>
										
										
										
										
										
										<iframe width="100%" height="315"
src="https://www.youtube.com/embed/<?php echo get_field('youtube_id', get_the_ID()); ?>?&autoplay=1"frameborder="0"
allowfullscreen></iframe>
										
									
									<?php
								}
							
							echo get_post_meta( get_the_ID(), 'video_code' , 1 ); ?>
							
							
							<div class='clearfix well mb-10 yellow'>
							
							
							
							
							
							
							<?php the_content(); ?>
							
							
							</div>
							
							
							<div class='clearfix well green 1yellow'>
							<?php echo do_shortcode('[rtmedia_gallery global=false   context=post context_id='.$post->ID.' uploader=after]');
					
							?>
							
							</div>
							<!-- <div class='clearfix mb-15'></div>
							<?php echo "<center>" . get_field( 'member_level', $post->ID ) . "</center>"; ?>
						 -->
							
						</center>
		 <form method="post" action="" class='pull-right'>
			<button name="post_to_draft" type="submit" class='btn btn-success hidden' value="Remove Lead" />Delete</button>
			
			<input  type="hidden" name="trans_date" value="<?php echo current_time( 'm/d/y' ); ?>" >
			<input name="ID" type="hidden" value="<?php echo $post->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo $post->post_name; ?>" />
		</form>
		
		
		
		
								
								

							<?php endwhile; endif; ?>
							
							
							<div class='clear'> </div>
								<?php if( function_exists('pvc_get_post_views') ){ pvc_get_post_views(); 
			}					?>
						
								
					
	<div class='clear'> </div>