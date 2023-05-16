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

 
		
			$requests = get_posts( 
				
					array(	
						'category_name' => 'requests',
						'posts_per_page'   => -1,  
						'post_status'                => 'publish',
						//'date_query' => array(  'before' => '1 month ago'  ) 
					) 
				);
				foreach( $requests as $request ){ set_post_type( $request->ID, 'ssi_requests' ); }
				
				
if($_POST['new_post']){
	
	//$date_added = date('Y-m-d H:i:s', strtotime($_POST['date_added']) );
// Create post object

		//$post_status = $_POST['post_status']
		
		$my_post = array(
		  
		  'ID' => '',
		// 'post_date'	=> $date_added,
		 'post_type' => $_POST['post_type'] ,
		 'post_title' => $_POST['post_title'] ,
		'post_content' => $_POST['post_content'] . '',
		 'post_status' => 'publish'

		);
		

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );
		
		foreach ($_POST as $param_name => $param_val) {
			add_post_meta($post_id, $param_name, $param_val, true);
			update_post_meta( $post_id, $param_name, $param_val  );

		}
		
		//set_post_type( $post_id, 'ssi_staff' );
		
}

$past_events = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'ssi_events',
					   
					   'category_name' => 'past-events',
						'order' => 'desc',

					)     );
					
$upcoming_events = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'ssi_events',
					   'category_name' => 'upcoming-events',
					   'meta_key'               => 'event_date',
						'order' => 'asc', 

					)     );


					
	if( is_front_page() && is_user_logged_in() ){ $pg = "/members/"; wp_redirect($pg); exit; }
	
	//if( is_user_logged_in() && is_page('join') ){ $pg = "/profile/"; wp_redirect($pg); exit; }

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
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	
	
	
<!-- Google Analytics Code -->		

<?php  get_template_part( 'ad', 'google-analytics-code' ); ?>

<!-- END Google Analytics Code -->		

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<div class="site-branding">
					<?php twentysixteen_the_custom_logo(); ?>

					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'social-links-menu',
										'depth'          => 1,
										'link_before'    => '<span class="screen-reader-text">',
										'link_after'     => '</span>',
									) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->

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
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->

		<div id="content" class="">
		
		
		
		
<?php
/*** ##START - Check & Complete User Profile **/
	if ( !function_exists( 'bp_core_fetch_avatar' ) ) { 
		require_once '/bp-core/bp-core-avatars.php'; 
	} 
	
	
	
	
	
	
			if( $_POST['post_to_draft'] ){
			post_to_draft();
		}elseif( $updater = $_POST['updater'] ){ 
			//echo "<BR><BR>POST UPDATER--->";
			post_updater();
		}elseif( $_POST['insert_client'] ){ 
			//echo "<BR><BR>POST UPDATER--->";
			insert_client();

		}elseif( $_POST['ssi_insert_post'] ){ 

			ssi_insert_post();
		}elseif( $_POST['insert_transaction'] ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_transaction();
		}elseif( $_POST['insert_task'] ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_task();
		}elseif( $_POST['task_complete'] ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			task_complete();
		}elseif( $_POST['insert_song'] ){ 
			//echo "<BR><BR>Insert Song--->";
			insert_song();
		}elseif( $_POST['move_out'] ){ 
			//echo "<BR><BR>Insert Song--->";
			move_out();
		}elseif( $_POST['ssi_update_cf'] ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_update_cf();
		
		}elseif( $_POST['ssi_new_contact'] ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_new_contact();
		
		}elseif( $_POST['ssi_add_user'] ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_add_user();
		
		}elseif( $_POST['add_social'] ){ 
			//echo "<BR><BR>Insert Song--->";
			add_social();
		
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
		
		//echo $result;

	if( current_user_has_avatar() ){}else{
		
		if( is_page('members-area') ){
			//$pg = "/members/<" . $user->user_nicename . "/profile/change-avatar/"; wp_redirect($pg); exit;
		}
?>
		<div class='clear'></div>
		
        <div id='no-pic' class=" well alert-warning">
				<button class="close hidden" data-dismiss="alert">×</button>
			
			
				<center><h2>You MUST upload a Photo!</h2><br>-- Face is NOT Required --<br><br>
              <a href='/members/<?php echo $user->user_nicename; ?>/profile/change-avatar/' class='btn btn-warning'>Upload Image</a>

				</center>			 
            
        </div>
<?php

		
		//exit;
	}
	
	$age = get_user_meta($user->ID , 'MX_user_age' , 1);

	if( is_user_logged_in() && !is_numeric($age) && !is_page('edit-profile') ){ 
	?>
        <div id='no-pic' class=" well alert-warning">
		
				<center><h2>Complete Your Profile!</h2><br>-- BLANK profiles will be deleted --<br><br>
               <a href='/edit-profile/?ID=<?php echo $user->ID; ?>' class='btn btn-warning'>Edit Profile</a>

				</center>			 
              
        </div>
	<?php
	}
	
/*** ##END - Check & Complete User Profile **/
?>
		
<!--		
			<hr>
		
		
			<center>
		<h2>Online Members</h2>
		<?php if ( bp_has_members( 'type=online&max=12' ) ) : ?>         
							<?php while ( bp_members() ) : bp_the_member(); ?>                      
								<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>"><?php bp_member_avatar('type=full&width=125&height=125') ?>

			
								</a>
								
							<?php endwhile; ?>
		<?php endif; ?>
		</center>
		
-->



	

				<?php // echo dispMailbox(); ?>
<div class="clearfix"></div>