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
 
 

get_header('network'); 


	$requests = get_posts(array( 'post_type' => 'ssi_requests' , 'post_status' => array('draft' , 'pending', 'publish') , 'posts_per_page' => -1 ));
	
	$cats = array( get_cat_ID('current-event') , get_cat_ID('breeding') );
	$events = get_posts(array( 'post_type' => 'ssi_events', 'category' =>  $cats, 'posts_per_page' => 1 ));
	
	$event = $events[0];
	//print_r( $events );

?>

<style>
	.btn-block {
		
		margin-bottom: 10px;
	}
	.well {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 10px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
	}
</style>	
		
		
<div id="" class="">
 
	<div id="" class="col-md-6 col-md-offset-3">
	<center>
	
		<?php if( count($events) > 0 ) { ?>
			<div class="well yellow stats text-center">
				<?php 
					//echo $event->post_title; 
				?>
				Currently Breeding<br><a href="/breed-list" class="h2">Philadelphia, PA</a>
			</div>
			
			<a href="/breed-request" target="_blank" class="btn btn-success btn-block btn-lg">  Request a BREEDING >> </a>
		
		
		<?php } ?>
		
		<!--<h4 class="text-center " >Submit A BREED Request:</h4><hr>-->
		<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
		<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>
		
		<br>
		
		<div class="well yellow stats text-center">
		<u><?php echo count( $requests ); ?></u> Current <a href="/breed-list">Breed Requests</a>
		</div>
	
		
</center>
	</div>
	
	<div id="" class="col-md-6">
			<?php echo do_shortcode('[gravityform id="19" title="false" description="false"]'); ?>
	</div>
	<header class="entry-header text-center hidden">
		

	
	</header><!-- .entry-header -->

	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
	<div class='clearfix'></div>
		
		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>
		
		<h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h4><hr>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
		
			<div class=" porn well">
									<center>
								<?php echo get_avatar($current_user->ID, 150); ?> 
									</center>
								</div>
								
								<div class='clearfix'></div><br>
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $current_user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
		
			
			
			<div class='clearfix'></div>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_age' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				<?php //echo get_user_meta($userid, 'MX_user_height', 1);
				
				if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
						echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '"' ;
				}else{
							echo '-';
				}
				?>
				
				
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
				if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_weight' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			
			<div class='clearfix'></div><br>
			
				<div class='text-center '>
				Location<br>
				<b><?php 
				
					$closet = 0;
								if ( get_user_meta($current_user->ID, 'MX_user_city', 1 ) && get_user_meta($current_user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($current_user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($current_user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($current_user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($current_user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?></b>
			</div>
			
			<a href='/edit/' class='btn btn-warning btn-block'>Edit Profile</a>

			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'client_phone', true));
			if(strlen($phone) === 10) {
				$country = 1;
				$area = substr($phone, 0, 3);
				$first = substr($phone, 3, 3);
				$last = substr($phone, 6, 4);
				
				$phone =  $country . "-" . $area . "-" . $first . "-" . $last;
				$name = get_the_title();
				
				
				array_push($names, $name );
				array_push($numbers, $phone );
				echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?>

		</div>
		<div class='clearfix'></div>
	</div>
		
		<?php } ?>
		
			
	<div class="stats">
						
		
			

			<div class='clearfix'></div>
					
				
				<div class="col-md-12">	


					<?php if( is_user_logged_in() ){ ?>
					
						<?php echo do_shortcode("[wpmem_form login]"); ?>
						
					<?php }else{ ?>
					<center>
						<h3>Join BreedBoy<br><small>(100% Free - Full Access)</small></h3>
		<div id="menu" style='display: block;'>
			<a href='/thot-request' class='btn btn-block btn-default btn-lg hidden'>> Reqest a Session <</a>
			
			<a href='/login' class='btn btn-block btn-info btn-lg hidden1'>Member Login</a>
			<a href='/register' class='btn btn-block btn-info btn-lg hidden1'>Join Now</a>
			
			<a href='/user-profile' class='btn btn-block btn-info btn-lg hidden'>Your Profile</a>
			<a href='/models' class='btn btn-block btn-info btn-lg hidden'>Our Models</a>
			<a href='/members' class='btn btn-block btn-info btn-lg hidden'>Our Members</a>
			<a href='/mailbox' class='btn btn-block btn-info btn-lg hidden'>Mailbox</a>
			<a href='/fantasy' class='btn btn-block btn-default btn-lg hidden'>> Post a Fantasy <</a>
			<button id='partners' class='btn btn-block btn-info btn-lg hidden'>Our Partners</button> 
			<div id='partners' style='display: none;'>
				<hr>
				<h4>Our Partners </h4><hr>
				<a href='http://instaflixxx.com' class='btn btn-block btn-default btn-lg'>InstaFliXXX</a>
				<a href='http://dlfreakfest.org' class='btn btn-block btn-default btn-lg'>DLFreakFest</a>
				<a href='http://ssixxx.com' class='btn btn-block btn-default btn-lg'>SSIxXx</a>
			</div>
			
		</div>					

					<div class='clearfix'></div>

					</center>
					
					<?php } ?>
				</div>

				
						
								
	</div><!-- // container -->
		
	</div>



<div class='clear'></div>


	</div><!-- .site-main -->


</div><!-- .content-area -->
	<div class='clearfix'></div>
	
	
	


<?php get_footer('preview'); ?>
