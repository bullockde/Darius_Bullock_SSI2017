<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 $user = wp_get_current_user(); 
		$user_role = $user->roles[0];
		$post_type = get_post_type();
		
		
		if( $user_role == 'administrator' ){ $user_role = 'contributor'; }
		//echo "ROLE --> " . $user_role;
		
		//echo "Post Type --> " . $post_type;
		
		if( is_single() && ( $post_type == ('ssi_photos' || 'ssi_videos') ) ){ 
			
			$level = get_field( 'member_level' );
			if(get_field( 'preview_content' )){ $level = "Preview"; }
			//$preview = get_field( 'preview_content' );
			
			
			if( $level == 'Premium' && $user_role != 'contributor' ){ $pg = "/trial/"; wp_redirect($pg); exit;  }
		}
	
	
get_header(); ?>

<div class='clearfix mb-10'></div>

<div id="" class="">

    
   

	<div class="col-md-8">
	
	
		<div class='video-set well mb-0'>
		
			<header class="entry-header">
				<?php the_title( '<h4 class=" text-center">', '</h4>' ); ?><hr>
			</header><!-- .entry-header -->
	
			<div class='col-md-12'>
			
			
			<div class='' >
			
			<center>
			<?php 
			// Start the loop.
		while ( have_posts() ) : the_post();
		
		?>
		<?php if(function_exists('the_ratings')) { the_ratings(); } ?><br><br>
		    <div class='img-thumbnail'>
			    <?php twentysixteen_post_thumbnail(); ?>
			
			</div>
			<div class='clearfix'></div>
							<?php if( get_the_content() ){
						    	the_content();
							}else{
							
						    	get_template_part('content', 'user-gallery');
							}?>
			<div class='clearfix'></div>				
							

<br>
			
			 <u><?php echo get_field( 'member_level', $lead->ID ); ?></u> |  <b>Photos:</b> <u><?php echo get_field( '#_of_photos', $lead->ID ); ?></u>  | <b>Date Added:</b> <?php echo get_the_date(); ?> <!--  #  | <b>Rating:</b> <?php echo ""; ?>-->


			 </center>



			
			 
			 <?php
			 
				get_template_part( 'template-parts/biography' );
		
			?>

	
	
			<hr>
<?php

			if( has_excerpt($lead->ID) != '' ){
					echo get_the_excerpt($lead->ID);
				}
			// Include the single post content template.
			//get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
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
			
				
				/*	if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
	*/
				?></div>
				<a href='/video/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive'></a>
			</div>

			<div class='clearfix'></div>
			
			
	
		</div>

			
			<?php get_template_part('content', 'under-video');
			?>
			
			

	
	<div class='clearfix mb-10'></div>

	</div>

	</div><!-- .site-main -->
	
	<div class='col-md-4'>
		<?php //get_template_part( 'ad', '300-250-1' ); ?>
		<?php //get_template_part( 'ad', '300-250-2' ); ?>
		<?php get_template_part( 'content', 'sidebar-ads' ); ?>
	</div>
	
	
	<div class='clearfix'></div>
	
	
 <?php 
	 
	
	get_template_part( 'content-widget', 'photos' ); 
	

	//get_template_part( 'content', 'member-area' ); 
 ?>

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer("members"); ?>
