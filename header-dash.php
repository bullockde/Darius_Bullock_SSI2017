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
  
  $user = $current_user = wp_get_current_user();
	
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
			padding: 0;
		}
	</style>
	
<!-- Google Analytics Code -->		

<?php // get_template_part( 'ad', 'google-analytics-code' ); 
?>

<!-- END Google Analytics Code -->	

</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead1" class="1site-header 1text-center" role="1banner">
		   
			
	  		
			<?php if ( get_header_image() ) : ?>
			
			<h1 class="entry-title text-center" ><a href="/"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
			
			
			<?php get_template_part( 'content' , 'member-count' ); 
				?>
			
		
			<hr class="header-login">
	  
			
			
				<?php
				
				
				if( is_user_logged_in() && bp_notifications_get_notifications_for_user($current_user->ID) ){
  ?>
  <div id="buddydev_bpnotification_widget-2" class="well1 yellow1 text-center mb-0 hidden1">
  <?php
     echo do_shortcode('[buddydev_bp_notification show_empty="1"]');
     
     ?>
     
     <?php //echo do_shortcode('[you-have-a-new-message single="new message" multiple="%s new messages"]'); 
     ?>
  </div>   
     
     <?php
  }
				
				
				
				
				
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
				<div class="1header-image ">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
			
			
			  
					<hr class="header-login">
					
					
			
		</header><!-- .site-header -->
 

		  
			
			
		<?php 
		
		
			get_template_part("content","mega-menu");
		?>
	
		
				
				<div class="text-center "><h3 class="1post-title entry-title my-0">
					
					
					<?php
					
					
    										  if( is_front_page() ){  $title_posted = true; }elseif( is_single() ){ the_title(); $title_posted = true; }elseif( get_the_title() ){ the_title(); }else{ echo "#SSIDashMaster"; }   ?>
    									
		
		
		</h3>
		</div>