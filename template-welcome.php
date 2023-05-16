<?php
/**
 * Template Name: Welcome Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header('preview'); ?>
<style>
	.site-header {
		display: none;
	}
	legend {
		display: none;
	}
	input.buttons {
		margin: 1em;
	}
	@media screen and (min-width: 61.5625em){
		
		.entry-content h1:first-child{
			font-size: 3em;
		}
		.entry-content h2, .entry-summary h2, .comment-content h2 {
			font-size: 28px;
			font-size: 2em;
			line-height: 1.25;
			margin-top: 2em;
			margin-bottom: 1em;
		}
		.btn-success{
			font-size: 2em;
		}
	}
</style>
<div id="primary1" class="content-area1">
	<main id="main1" class="site-main1 text-center">
	
	<br><br>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );


			?>
			<div class='clearfix'></div>
			<a href='/' class='btn  btn-success btn-lg'> I'm Over 18 - Enter Now &raquo; </a>
			<div class='clearfix'></div><br><br><br><br><br>
			<?php
			
			if ( is_page('login') ) {
				?>
				<center>
					<a href='/wp-login.php?action=lostpassword' class='btn  btn-default'> Reset Password >> </a>
				</center>
				<?php
			}
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
</div>
<?php //get_sidebar(); ?>
<?php get_footer('preview'); ?>
