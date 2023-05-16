<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
$Gallery = get_post();
?>




	<div class='post well green1 mb-10'>
		
							
						<div class='col-xs-4 col-sm-2 text-center img-thumbnail '>	
						 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(75,75), array( 'class' => 'img-responsive img-thumbnail 1ads 1ad-shift circle' ) );
								echo "";
								?>
							
															<u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u> </a>

						</div>
					<div class='col-xs-8 col-sm-10'>
						
						 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>' class='h5 strong mb-5'>
							
						
							<a href='/?p=<?php echo $Gallery->ID; ?>'>
						<strong><?php /*echo $Gallery->post_title;*/ ?><?php if( strlen($Gallery->post_title) >= 15 ){ echo substr( $Gallery->post_title ,0 , 20) . "..";   }else{ echo $Gallery->post_title; } ?></strong> <small>
						<?php echo get_field( 'video_length', $Gallery->ID ); ?>
					 </small>
					 
					 
					</a>
							<!--
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)-->
								

							</a>
								<div class=' well  mb-0 hidden1'>	
							<?php			
							
							//
							//print_r($Gallery);
							//	if(check_rated($Gallery->ID)) { echo check_rated($Gallery->ID); }
								
								
								
								
								if( check_rated( $Gallery->ID ) ){ 
									//echo "RATED";
									echo do_shortcode( '[ratings id="'. $Gallery->ID  . '"]' );
								}else{
									//echo "UN-RATED";
									echo do_shortcode( '[ratings id="'. $Gallery->ID  . '"]' );
								}
                        
										$closet = 0;
						//echo do_shortcode( '[ratings id="'. $Gallery->ID  . '" results="true"]' );
							
							
	?>					</div>
						</div> 
						<div class='col-sm-2 hidden'>	
						 <br class="clearfix mb-10">
							 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							<button type="button" class="btn btn-success btn-sm  btn-block 1pull-right">
							 Go <span class="glyphicon glyphicon-play"></span> 
							</button>
							</a>
						</div>
							
						<div class='clearfix'></div>
								
							
								
		<footer class="entry-footer hidden">
		
		<hr class='clearfix mb-0'>
		<?php twentysixteen_entry_meta(); ?>
		
		
			
			
			
		<?php
		
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		
			<?php 
			
			
			$lead = $post;
				
				$user_logged_in = 0;
				$user_is_admin = 0;
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
	
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					$user_logged_in = 1;
					$user_is_admin = 1;
					?>
					
		<form method="post" action="" class='pull-right'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php the_ID(); ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>


			<?php } ?>
			
			
	</footer><!-- .entry-footer -->		
								
								
			<div class='clearfix'></div>		
			
			
			
			<div class='clearfix mb-10'></div>
					<a href="/?p=<?php echo $lead->ID; ?>" class="btn btn-block btn-default hidden1 mb-0">View &raquo;</a>
						
								
								
						</div>	


<article id="post-<?php the_ID(); ?>" class="hidden" <?php post_class(); ?>>
	<header class="1entry-header">
	
	 
		
	
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		
		
			
			
			
		<?php
		
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		
			<?php 
			
			
			$lead = $post;
				
				$user_logged_in = 0;
				$user_is_admin = 0;
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
	
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					$user_logged_in = 1;
					$user_is_admin = 1;
					?>
					<br>
		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php the_ID(); ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>


			<?php } ?>
			
			
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<div class='hidden video-set col-md-6 well pad-0'>
			<div class='1row'>

				<?php //get_template_part( 'content', 'post' );

				 ?>


		

			
		
		
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive 1aligncenter mb-10'></a> 

				<div class=''>

				<div class="col-xs-4 text-center">
Youtube:
					<center><?php if( get_field( 'member_level', $lead->ID ) ) { echo get_field( 'member_level', $lead->ID ); }else{ echo "Public"; } ?></center>
					
					<?php
						if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ) );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a class="circle" href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
								
        						
        						echo '</a>';
?>
								<a href='/?p=<?php echo $lead->ID; ?>'> 
								    <?php echo get_the_post_thumbnail( $lead->ID , array(150,150), array( 'class' => 'img-responsive img-thumbnail 1ads 1ad-shift circle' ) ); ?>
								</a>
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
					<div class='clearfix'></div>
					<?php $post_title = $lead->post_title; 
					
					
					
					?>
					<a href='/?p=<?php echo $lead->ID; ?>'>
						<strong><?php /*echo $lead->post_title;*/ ?><?php if( strlen($post_title) >= 15 ){ echo substr( $lead->post_title ,0 , 20) . "..";   }else{ echo $lead->post_title; } ?></strong> <small>
						<?php echo get_field( 'video_length', $lead->ID ); ?>
					 </small><hr>
					 
					 
					</a>

					<div class='clearfix text-center'>
					
					<?php									

                        echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
									
				
							
	?>
				</div>

					
				</div>
				
				<?php //twentysixteen_entry_meta();
				 ?>
				<div class='clearfix mb-10'></div>
					<a href="/?p=<?php echo $lead->ID; ?>" class="btn btn-block btn-default hidden1 mb-0">View &raquo;</a>


			</div>


				
				
				
				
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
					//	echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			
			
			
			<div class='clear'></div>
			
			<!--  <b>Runtime:</b> <?php echo get_field( 'video_length', $lead->ID ); ?> | <b>Added:</b> <?php echo date( 'm/d/y' , strtotime($lead->post_date) ); ?>  -->
		</div>