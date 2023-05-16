<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="1entry-header">
	
	
		
	
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
		<?php endif; ?>

	<!--	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>-->
	</header><!-- .entry-header -->

	<?php //twentysixteen_excerpt();
	 ?>

	<?php //twentysixteen_post_thumbnail(); 
	?>

	<div class="1entry-content">
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
	


	<footer class="1entry-footer">
		<?php twentysixteen_entry_meta(); 
		
		?>
		
		
			
			
			
		
		
			<?php 
				
				$user_logged_in = 0;
				$user_is_admin = 0;
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
	
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					$user_logged_in = 1;
					$user_is_admin = 1;
					?>
					
					
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
