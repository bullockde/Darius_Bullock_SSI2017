<div class='clear'></div>
<div id='welcome' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class=''>
		<!--<h3><b><?php if( is_user_logged_in() ){  echo 'Welcome Back!'; }else{ echo "Welcome to Shaman Shawn Inc.";}  ?></b></h3>
-->

		<div class='clear mb-10'></div>
		<?php if( 1 /*is_user_logged_in()*/ ){ ?>
		
		
		<div class='clear mb-10'></div>
		
		
		<div class='col-sm-5   mb-0'>
							
							
							
							
							
								
				
		<?php if( 1 /*is_user_logged_in()*/ ){ ?>
		<div class=" col-md-12 text-center well green">

			
			<?php

				if(  1 /*is_user_logged_in()*/){
				    $current_user = wp_get_current_user();
				 /**
				     * @example Safe usage: $current_user = wp_get_current_user();
				     * if ( !($current_user instanceof WP_User) )
				     *     return;
				     */

				?>
			
			<div class=" ">
			
			
			
			
			
			
			
				<h3> <?php if( !is_user_logged_in() ){ echo "Create a FREE Profile!"; }else{ echo '<h4><b>' . $current_user->display_name . '</b></h4>'; } ?></h3> 
					<hr>
					
			
				<div class="col-xs-5 col-md-4 mb-0 ">
				
				
					<a target='_blank' href='/add' class=' '>
						<?php //echo do_shortcode("[bp_profile_gravatar]"); 
						
						
						
						?>
						
						
								<?php 
				
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
				
				
					if ( 1 ) {
						//$avatar_URL  = get_avatar_url();
						
    
						?>
						
							<?php echo get_avatar($current_user->ID, 100); ?>
						
						<?php 
					}else{
						?>
						<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class='img-responsive aligncenter' width='100'>
					
						<?php 
						
					}
		
				?>
				
				
						<!--<br>-->
						<!--edit-->
					</a>
				
				
					
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
					
				
						<?php //echo do_shortcode("[bp_profile_gravatar]");
								//bp_member_avatar('type=full&width=100&height=100');
						?>
					
					</a>
					
						

				</div>
				<div class="col-xs-7 col-md-8 text-center report">
				
				
					<center>
					<?php	

							if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_age' , 1) . ' | ';
							}else{
										echo 'AGE | ';
							}
							if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '" | ' ;
							}else{
										echo 'HT | ' ;
							}
							if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_weight' , 1) . "<br>";
							}else{
										echo 'WT <br>';
							}
								?>
					</center>
					
					<div class='clearfix'></div><br>
			
				<div class='text-center small'>
				
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
									echo 'Your Location';
								}				
								
			?></b>
			</div>
			
			
			        <div class="1btn-group btn-group-justified text-center 1col-md-8 1col-xs-12">
    					<div class='clearfix'></div><hr class="mb-5">
    					<center>
    						<a href="/add" class="btn btn-default">Edit Profile</a>
    						<a  href="/add" class="btn white btn-info">View Profile</a>
    					</center>
    					<div class='clearfix mb-0'></div>
					</div>
				
			

				</div>
		
				
			
			
			
							
						
				
				
							
	
				<div class='clearfix'></div>	
		<div class='well green hidden'>
					<h4>YungDADDY Requests<hr></h4>		
								
		<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
		
		<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
		
		<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
		
		
		
		</div>
				
					
					<?php //echo do_shortcode("[wpmem_form login]"); ?>
				
				
				
				
				
				

			</div>

			<?php } ?>
			
			<hr class='clearfix mb-0'>
			
			<?php if( !is_user_logged_in() ){ ?>
			    <hr class='clearfix mb-5 hidden'>
				<a target='_blank' href='/add' class='btn btn-success btn-lg btn-block white hidden1'> Create a FREE Profile &raquo; </a>
			<?php }else{ ?>
			
			<div class="text-left hidden1 well 1green mb-0" style="padding: 10px 15px;">
				<b>Status:</b>
				
				<?php 
		
		
			//get_template_part("content","header-login");
		?>
			
					<?php	bp_activity_latest_update($current_user->ID);  ?>

					<a href='/activity' class='status btn btn-default btn-sm pull-right'>Update</a>
					<div class='clearfix'></div>
			</div>
			<?php } ?>
			
			
		</div>
		
		
		
		
		<?php } ?>

							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							

				<div class='col-sm-12 text-center'>
					
					<?php  echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>"; ?>
				
				</div>
	
					<div class='clearfix'></div>
				
		
			</div>
		
		
		
		
		<?php } ?>



			<div class='col-md-7'>
			
			
			
			
						<?php
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


				?>
		
							
				

				<div class='col-sm-8 col-sm-offset-2 text-center hidden'>
					
					<h2 class='text-center'> Events </h2><hr>
					
					<div class='col-xs-6 h3  well hidden1'>
						<h4>Upcoming</h4>
						
							<h1><?php echo count($upcoming_events); ?></h1>
						
					</div>
					<div class='col-xs-6 h3 well hidden1'>
						<h4>Completed</h4>
						
							<h1><?php echo count($past_events); ?></h1>
						
					</div>
						
			<div class="clear"></div>
			
				</div>
			
			<div class="clear"></div>

				<div id='whatsnew'  class='hidden1'>

					<div class='new-tag  hidden'><h3>What's New:</h3></div>
					
			<!--		
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/x7dePk1h430" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					
			-->		

					<a href='/tv/'><img src="/wp-content/uploads/2015/10/SSITV.png"  alt='SSITV' class='img-responsive hidden' /></a> 
				<div class="flexslider11 hidden">
					
					<ul class="slides">
						<li>
							<a href='/playlist/'><img src="/wp-content/uploads/2015/09/SSIPlaylist-e1445057287376.png" class='img-responsive'/></a>

						</li>
						<li>
							<a href='/the-real-house-staff-of-shaman-shawn-season-premiere-trailer-1-hour-ssi/'><img src="/wp-content/uploads/2015/10/RHSoSSI-leader.png" class='img-responsive' /></a>


						</li>
						<li>
							<a href='/tv/'><img src="/wp-content/uploads/2015/10/SSITV.png" /></a>

						</li>
					</ul>
				</div>

				<!-- <center><small><< Swipe || Click >></small></center>   -->
				</div><!-- #whatsnew -->
				
				
				<a target='_blank' href='/members' class='btn btn-lg btn-primary btn-block hidden'> All Members >></a>
				
				<?php 
					//	get_template_part('content' , 'member-quicknav');
					?>
				<div class='col-md-12 hidden1  mb-0 text-center well yellow1'>
				
					<?php if ( bp_has_members( 'type=active&max=6' ) ) : ?>         
					
						<h5>- Online Now -</h5><hr>
						
						<?php while ( bp_members() ) : bp_the_member(); ?>                      
							<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>"><?php bp_member_avatar('type=full&width=75&height=75') ?>

		
							</a>
							
						<?php endwhile; ?>
										
									
										
										
					<?php endif; ?>
					
					<div class="clearfix mb-5"></div>
			    	<hr class='hidden1 clearfix mb-15'>
						<div id='header-login' class='text-center well green 1bg-blue pb-5 mb-0 <?php if( !is_user_logged_in() && !is_front_page() ){ echo 'mb-0'; } ?>' style='display: block;'>
	
	
	
		
		<?php
			if( !is_user_logged_in() ){
		
			$redirect_to = '/';
		?>
		<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
			<span class="hidden-xs">&nbsp;&nbsp; Member Login: </span>
			

			<input id="user_login" placeholder="Username" type="text" size="10" value="" name="log">
			<input id="user_pass" placeholder="Password" type="password" size="10" value="" name="pwd">
			<input id="rememberme" type="checkbox" value="forever" name="rememberme">
			<input id="wp-submit" class="btn btn-primary" type="submit" value="Login" name="wp-submit">

			<input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
		</form>
		 <?php
		
		
			}else{
				
				?>
				
				<h4><b><?php if( is_user_logged_in() ){  $current_user = wp_get_current_user(); echo 'Welcome Back, ' . strtoupper($current_user->user_login) . '!'; }else{ echo "<b>Welcome, " . $_COOKIE['name'] . "!</b>";}  ?></b>
					<div class="clearfix mb-5"></div>
                                        				<small> <a href="/profile">Profile</a> | <a href="/members">Members</a> | <a href="/blog">Blog</a> | <a href="/photos">Photos</a> | <a href="/videos">Videos</a>   </small>
                                        				
				</h4>
				<?php
				
			}
		?>

	</div>
				
					
					
				<div class="clearfix"></div>
				
				
			
					<?php //echo do_shortcode("[wpmem_form login]"); 
					?>
			
					
					
					<div class='clear'></div>
					
					
			</div>
				

				
				
	
		
		
		
			</div>	<!-- #new -->
								
								
							
		<?php if( !is_user_logged_in() ){ ?>

		
		<div class='col-md-5 spotlight  hidden text-center mb-0'>
		
			<?php //get_template_part( 'ad', '300-250-1' ); ?>
			
			<div class='well'><a href='/members/'>#SSIMembers</a></div>

			<?php if( !is_user_logged_in() ){ ?>
				
				<div id='loginform'>
					<a href='/register/' class='btn btn-lg btn-info btn-block hidden'>Register Now</a>
					<button id='loginform' class=' btn btn-lg btn-info btn-block'>Register Now</button>
					<button id='loginform' class=' btn btn-lg btn-info btn-block'>Login</button>

					<button id='whatsnew' class=' btn btn-lg btn-danger btn-block'>Random Button</button>
				
				
								<div id='whatsnew' class='random well' style='display: none;'>
		<?php
				query_posts(array( 'post_type' => array( 'ssi_videos' , 'ssi_photos', 'post'  ) , 'orderby' => 'rand', 'showposts' => 1 ));
				if (have_posts()) :
				while (have_posts()) : the_post(); 
		?>
				
				<div class='text-center'>
				
			

				<?php
					$format = get_post_format( get_the_ID() );

					if( $format == 'video' || in_category( 'music' , get_the_ID() ) || in_category( 'songs-that-touch-the-soul' , get_the_ID() ) ){
					//get_template_part( 'content', 'video' );
					}else{
						?>
						
						<h3 style="color:#000;"><?php the_title(); ?></h3>
						
						<center><?php twentysixteen_post_thumbnail(); ?></center>
						<?php //the_post_thumbnail();

							//get_template_part( 'content', 'video' );

							the_content(); 
						?>
						
						<h1><a  href='<?php the_permalink() ?>' class='btn btn-info btn-lg btn-block hidden1'>Learn More >></a></h1>
						
						
						
					<?php
					//get_template_part('template-parts/content' , 'page');
					//the_content(); 
					}
				?>
				</div>
				
				

	<?php endwhile;
		endif;

		//wp_reset_query();
		?>
		
		</div>
				
				
				</div>

				<div id='loginform' class=' well ' style='display: none;'>
					<?php //echo do_shortcode("[wpmem_form register]"); ?><br>
					<?php echo do_shortcode("[wpmem_form login]"); ?>
					
				</div> 
					<?php }else{ ?>
					<a href='/activity/' class='btn btn-lg btn-info btn-block'>Member Activity</a><br>

						<a href='/members/' class='btn btn-lg btn-info btn-block'>View All Members</a><br>
					<?php } ?>

		</div><!--  #members  -->
		<?php } ?>
		<div class='clearfix'></div>
</div><!--  #Container  -->
							
							<?php get_template_part( 'content', 'ssi-banner-ad' ); ?>
</div>
<div class='clear'></div>