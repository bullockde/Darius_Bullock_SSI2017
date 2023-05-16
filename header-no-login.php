<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

	//if( is_front_page() && is_user_logged_in() ){ $pg = "/members/"; wp_redirect($pg); exit; }
  //if( is_user_logged_in() && is_page('login') ){ $pg = "/profile/"; wp_redirect($pg); exit; }
  
  global $post;
	
/*** ##START - Check & Complete User Profile **/
	if ( !function_exists( 'bp_core_fetch_avatar' ) ) { 
		require_once '/bp-core/bp-core-avatars.php'; 
	} 
	
	
	$user = $current_user = wp_get_current_user();
	
			
			// An array of arguments. All arguments are technically optional; some will, if not provided, be auto-detected by bp_core_fetch_avatar(). This auto-detection is described more below, when discussing specific arguments. 
		$args = array( 
			'item_id' => $user->ID, 
			'object' => '', 
			'type' => '' ,
			'html' => 1,
			'no_grav' => 1
		); 
		  
		// NOTICE! Understand what this does before running. 
		$result = bp_core_fetch_avatar($args); 
		
	

	
/*** ##END - Check & Complete User Profile **/






			$requests = get_posts( 
				
					array(	
						'category_name' => 'tennants',
						'posts_per_page'   => -1,  
						//'post_status'                => 'publish',
						//'date_query' => array(  'before' => '1 month ago'  ) 
					) 
				);
				foreach( $requests as $request ){ set_post_type( $request->ID, 'ssi_tennants' ); }
				

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	
	

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	
	<meta name="juicyads-site-verification" content="c0c65d86091675f3337207e89ad95d25">
	<meta name="exoclick-site-verification" content="e16b449a769083acb9059455b296cc92">
	<style>
		hr.header-login {
			margin: 0;
		}
	</style>
	
<!-- Google Analytics Code -->		

<?php  get_template_part( 'ad', 'google-analytics-code' ); ?>

<!-- END Google Analytics Code -->	

</head>

<body <?php body_class(); ?>>

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
		   
		
			
			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image hidden">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
			
			<h1 class="entry-title text-center "><?php the_title(); ?><!--<div class='clearfix'></div><small><a href="/activity" class="hidden1 h5 pulse2">Whats New?</a></small>--></h1>
	
			
		</header><!-- .site-header -->
 

		

		
		<?php 
		
		
			//get_template_part("content","header-login");
		?>
		
		<hr class="header-login">
		
		
		