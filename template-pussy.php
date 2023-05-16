<?php
/**
 * Template Name: PUSSY Template
 *
 * 
 */

get_header('network'); 

		$Model_ID = 109264;
		//$Model_ID = $_GET['ID'];
		
		$email = get_field('MX_user_email' , $Model_ID);
		 $user = get_user_by_email($email);
			$userid	= $user->ID;
		//echo $user->ID;
?>


	<div class="pussy-leader ">
	<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];


		 if( is_page( array('resume', 'contact', 'gallery', 'subscribe') ) ){

		 }else if ( $thumb_url == 'http://shamanshawn.com/wp-content/uploads/Home2016-featured.png' ){


		} else { 

			echo "<center>";
				twentysixteen_post_thumbnail(); 
			echo "</center>";
		}

	?>
	<div class='clearfix'></div>
	</div>
	
	<div id="primary" class="content-area">
<div class='clearfix'></div>
	<main id="main" class="text-center" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			//get_template_part( 'template-parts/content', 'page' );

		?>	
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<header class="entry-header">
		<?php //the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<hr>
	<div class="entry-content">


<?php

		the_content();
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->

			
		<?php	
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

		
		<br><br>
</div><!-- .content-area -->

<?php get_footer('dom'); ?>
