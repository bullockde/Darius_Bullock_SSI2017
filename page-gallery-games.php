<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 

get_header(); ?>

<div id="primary1" class="content-area1">
<div class='clear mb-10'></div>

    <?php if( 1 /*!wp_is_mobile()*/ ){  ?>
	<div class="col-md-4 text-center">
	
	<div class="clearfix"></div>
	
		<div class="well 1img-thumbnail">
			
			<?php //get_template_part( 'ad-exo', '300-250-2' ); 
			?>
			<?php //get_sidebar( 'content-bottom' ); 
			?>
			<?php get_sidebar(); ?>
		</div>
			<div class="clearfix"></div>
		<?php get_template_part( 'ad', '300-250-2' ); ?>
	</div>

	<?php } ?>
	<main id="main1" class="col-md-8 well 1green mb-10" role="main1">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->
	
</div><!-- .content-area -->



		
<div class="clear"></div>
<?php 	$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
?>
            <h4 class='text-center hidden'>Add New </h4>
				 <form method='post' action='/<?php echo $post->post_name; ?>' class='well hidden'>
					 <input type='text' name='post_title' placeholder='Enter Title'><br><br>
					  <textarea type='text' name='post_content' placeholder='Enter Details..'></textarea><br><br>
					 
					 <input type='text' name='website_link' placeholder='www.YourWebsite.com'><br><br>
					 
					 
					 <div class='clearfix'></div><br>
						<div class='col-md-6'>
						<b>Start Date</b><br>
						<input  type="text" name="date_added" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" >
					</div>
						<div class='col-md-6'>
						<b>Target Date</b><br>
						<input  type="text" name="target_date" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" >
					</div>
					<div class='clearfix'></div><br>
					
					
					
					
					 <input type='hidden' name='post_type' value='<?php echo 'ssi_' . $post->post_name; ?>'>
					 <input type='hidden' name='ID' value='<?php echo $post->ID; ?>'>
					 <input type='hidden' name='new_post' value='true'>
					 <input type='submit' value='Add New' class='btn-block'>
				 </form>
				 

<?php  } ?>
</div>
<div class='clearfix'></div>

<?php get_footer('preview'); ?>
