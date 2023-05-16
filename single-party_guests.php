<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?> 

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			

		
		?>
		
		<div class='video-set well <?php if( $post->post_type == 'photo' || $post->post_type == 'video' ){ echo "hidden"; }  ?> '>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
				<a target='_blank' href='/?p=<?php echo $lead->ID; ?>'>
	
				<?php
	
					// Page thumbnail and title.
					//twentyfourteen_post_thumbnail();
					echo $lead->post_title;
				?>
				</a>
			</article><!-- #post-## -->


			<div class='col-md-12'>
				

				
			<?php 
				
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
						if ( has_post_thumbnail( $lead->ID ) ) {
					
				$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
						?>
						<a target='_blank' href='<?php echo esc_url( $large_image_url[0] ); ?>'>
							<img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'> 
						</a>
						<?php 
					}else{
						?>
						<a target='_blank' href='/?p=<?php echo $lead->ID; ?>'>	<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class='img-responsive aligncenter' width='150'>
						</a>
						<?php 
						
					}
		
				?>
			
				
			</div>

			
			<div class='clear'></div><br>
			
			<div> <center>
<div class='pix'>				
	<br>
	<?php if( get_field( 'lead_image_1', $lead->ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $lead->ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $lead->ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $lead->ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $lead->ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $lead->ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $lead->ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $lead->ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div><br>
<h4><?php 
			
					echo get_field( 'MX_user_age', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_height', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_weight', $lead->ID ); echo "<br><br>";
					echo get_field( 'MX_user_position', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_endowment', $lead->ID ); echo "in<br>";	
					
					?></h4>
</div>	
					
		<div class='clear'></</div><br>
				
				
				</center> </div>
			<div class='clear'></div>
			</a>
			
			<?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '' , '' , $lead->ID ); ?>
		</div>
		<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				//comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php //get_template_part( 'content', 'dashboard' ); ?>
<?php //get_sidebar(); ?>
<?php get_footer('dom'); ?>