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
		
		//echo $result;
/*
	if( current_user_has_avatar() && strpos( $_SERVER['REQUEST_URI'], "change-avatar") && strpos( $_SERVER['REQUEST_URI'], "register") ){  
			$pg = "/profile"; wp_redirect($pg); exit;
	}else{
		
		if( is_page('members') ){
			//$pg = "/members-list/<" . $user->user_nicename . "/profile/change-avatar/"; wp_redirect($pg); exit;
		}

	}
	
		if( is_page('members')  && wp_is_mobile() ){ $pg = "/members-mobile/"; wp_redirect($pg); exit; }
			if( is_page('pay-faggot')   ){ $pg = "http://www.poweredbyliquidfire.mobi/redirect?sl=16&t=dr&track=34166_208381&siteid=208381"; wp_redirect($pg); exit; }
*/
	$age = get_user_meta($user->ID , 'MX_user_age' , 1);


	
/*** ##END - Check & Complete User Profile **/






		/*	$requests = get_posts( 
				
					array(	
						'category_name' => 'requests',
						'posts_per_page'   => -1,  
						'post_status'                => 'publish',
						//'date_query' => array(  'before' => '1 month ago'  ) 
					) 
				);
				foreach( $requests as $request ){ set_post_type( $request->ID, 'ssi_requests' ); }
				
				*/
if( isset($_POST['new_post']) ){
	
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

	
	
			$current_user = wp_get_current_user();
	
	
			$age = get_user_meta($current_user->ID , 'MX_user_age' , 1);

			/*if( is_user_logged_in() && !is_numeric($age) && is_page('cashappkings') ){ 
					$pg = "/profile/"; wp_redirect($pg); exit;
			}
			elseif( is_front_page() && is_user_logged_in() ){ if( wp_is_mobile() ){ $pg = "/members-mobile/"; }else{  $pg = "/members/"; }  wp_redirect($pg); exit; }
*/

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
		

		

	
<!-- Google Analytics Code -->		

<?php  get_template_part( 'ad', 'google-analytics-code' ); ?>

<!-- END Google Analytics Code -->	
</head>

<body <?php body_class(); ?>>

		<a class="skip-link screen-reader-text hidden" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header text-center hidden" role="banner">
	
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
				<div class="hidden header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->
 

	
		
		
				
			<?php	
			$current_user = wp_get_current_user();
	

?>
		
		
		
		
		
		<?php
			if( /*is_user_logged_in()*/ 1 ){ ?>



                <div class="profile-menu-top 1container-fluid text-center">
                    
                    <div class="clearfix mb-0"></div>
                    <div class="col-sm-6 col-md-4">
                                       <div class="clearfix mb-15 hidden-xs"></div>
                                       
									<h2 class="entry-title ">
    									<a href="/members/">
    									<?php
    								// 	$post_type = get_query_var( 'post_type' );
    									
    								// 	$post_type_obj = get_post_type_object( $post_type );
    									
    								// 	$title = apply_filters( 'post_type_archive_title', $post_type_obj->labels->name, $post_type );
            //                             $title_posted = false;
                                                
    										// if( is_front_page() ){ echo "ShamanShawn.com"; $title_posted = true; }elseif( get_the_title() ){ the_title(); }else{ echo "#SSIDashMaster"; }  
    										
    										if( is_front_page() ){ echo  esc_attr( get_bloginfo( 'name', 'display' ) );	 $title_posted = true; }elseif( is_single() ){ echo $title; $title_posted = true; }elseif( get_the_title() ){ the_title(); }else{ echo "#SSIDashMaster"; }  
    										?>
    										
    										
    									</a>
									</h2>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-3 col-sm-6 hidden-xs hidden-sm">
								    <div class="clearfix"></div>
									   <div class="clearfix mb-15 hidden-xs"></div>
                                      
									
										<span class="glyphicon glyphicon-user hidden " aria-hidden="true"></span>
										<?php if( !is_user_logged_in() ){ ?>
										       <a href="/wp-login.php?action=lostpassword" class="btn btn-default 1btn-block input" title="Reset Password"><span class="glyphicon glyphicon-refresh 1pull-right" aria-hidden="true"></span> PW</a>
										    <a target="_blank" href="/join/" class="btn btn-info" title="Sign Up for FREE!"><b>Create</b> a <b>NEW Profile</b> &raquo; </a>
									    <?php }else{ ?>
									           <div class=" hidden-xs 1btn-group btn-group-justified text-center 1col-md-8 1col-xs-12">
                                					<div class='clearfix'></div>
                                					<center>
                                					    <?php if( !is_page('members-area') ){ ?>
                                						    <a href="/members-list" class="btn btn-default">Members List</a>
                                						<?php }else{ ?>
                                						    <a href="/thot-files" class="btn btn-default">> THoT ZONE <</a>
                                						<?php } ?>
                                					
                                						
                                						<a  href="/freak-now" class="btn white btn-info">Freak Now &raquo;</a>
                                					</center>
                                					<div class='clearfix mb-0'></div>
                            					</div>
									    <?php } ?>
									    <div class="clearfix mb-5"></div>
									

								</div>
								<div class="clearfix visible-xs"></div>
								<div class=" col-sm-5 <?php if( !is_user_logged_in()  ){ echo 'hidden-xs'; } ?>  text-right">
								        
								        
								        <div class="clearfix"></div>
								        
										<div id='header-login' class='1text-center well green 1bg-blue 1pb-5 mb-0 <?php if( !is_user_logged_in() && !is_front_page() ){ echo 'mb-0'; } ?>' style='display: block;'>
	                                               <div class=" ">
	                                           <center>
		
                                        		<?php
                                        			if( !is_user_logged_in() ){
                                        		
                                        			$redirect_to = '/members';
                                        		?>
                                        		<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
                                        			<span class="hidden-xs "><b>Members </b></span>
                                        			
                                        
                                        			<input id="user_login" placeholder="Username" type="text" size="10" value="" name="log">
                                        			<input id="user_pass" placeholder="Password" type="password" size="10" value="" name="pwd">
                                        			<input id="rememberme" type="checkbox" value="forever" name="rememberme" class="hidden-xs">
                                        			<input id="wp-submit" class="btn btn-primary" type="submit" value="Login" name="wp-submit">
                                        
                                        			<input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
                                        		</form>
                                        		
                                        		 <?php
                                        		
                                        		
                                        			}else{
                                        				
                                        				?>
                                        				
                                        				<h4><b><?php if( is_user_logged_in() ){  $current_user = wp_get_current_user(); echo 'Welcome Back, ' . strtoupper($current_user->user_login) . '!'; }else{ echo "<b>Welcome, " . $_COOKIE['name'] . "!</b>";}  ?></b>
                                        				<div class="clearfix mb-5"></div>
                                        				<small> <a href="/activity">Activity</a> | <a href="/members">Members</a> | <a href="/profile">Profile</a> | <a href="/events">Events</a> | <a href="/freak-now">Requests</a>   </small>
                                        				
                                        				</h4>
                                        				<?php
                                        				
                                        			}
                                        		?>
                                        		</center> 
                                        	</div>
                                        	<div class=" hidden col-sm-2">
                                        	    <center>
                                        	    <?php
                                        			if( !is_user_logged_in() ){
                                        		
                                        			
                                        		?>
                                        	        <a href="/wp-login.php?action=lostpassword" class="btn btn-sm btn-default btn-block input"><span class="glyphicon glyphicon-refresh 1pull-right" aria-hidden="true"></span> PW</a>
	                                            <?php
                                        			}else{
                                        		?>
                                        		    <a href="/cash" class="btn btn-sm btn-default btn-block input">$$$</a>
                                        		<?php
                                        			}
                                        		?>
                                        		</center>
                                        	</div>
                                        	<div class="clearfix"></div>
                                        </div> 
                                        <div class="clearfix"></div>
                                </div> 
                </div> 
                
                <?php } ?>
                <div class="clearfix mb-5"></div>
                
                
<div class="container-fluid text-center bg-blue header hidden1">
	<div class="col-xs-4 col-sm-2 col-sm-offset-1">
		<a href="/" class="white">
			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			<br>
			HOME
		</a>
	</div>
	<div class="col-xs-4 col-sm-2">
		<a href="/post" class="white">
			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			<br>
			POST
		</a>
	</div>
	<div class="col-sm-2 hidden-xs 1hidden-sm">
		<a href="/photos" class="white">
			<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
			<br>
			PHOTOS
		</a>


	</div>
	<div class=" col-sm-2 hidden-xs">
		<a href="/videos" class="white">
			<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
			<br>
			VIDEOS
		</a>
		
	</div>
	<div class="col-xs-4 col-sm-2 col-xs-offset-0 col-sm-offset-0">
		
			<a href="/dashmaster" class="white hidden">
			<span class="glyphicon glyphicon-transfer " aria-hidden="true"></span>
			<br>
			DASH
		</a>
		<a type="button" class="white" id="myBtn2" data-toggle="modal" data-target="#myModal2-dash" data-show="true">
			<span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
			<br>
			DASH
		</a>
	</div>

	<div class="clearfix mb-10"></div>

</div>
	
  <?php
  if( is_user_logged_in() && bp_notifications_get_notifications_for_user( $current_user->ID ) ){
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
  
  
  
  /*
  
global $wp_query;
global $post;
$parent = 0;
if( empty($wp_query->post->post_parent) ){
$parent = $post->ID;
}else{
$parent = $wp_query->post->post_parent;
} ?>
<?php if(wp_list_pages("title_li=&child_of=$parent&echo=0" )): ?>
<div>
<ul>
<?php wp_list_pages("title_li=&child_of=$parent" ); ?>
</ul>
</div>
<?php endif; 
  */
  ?>
  
			

			
	<?php get_template_part( 'content' , 'mega-menu'); ?>		
			