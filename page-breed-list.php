<?php
/*
Template Name: The List
*/
 if( is_user_logged_in() ){
	$user = $current_user = wp_get_current_user();
}

get_header('login'); ?> 

	<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 ));
			//$thots = get_posts(array( 'numberposts' => 1, 'post_type' => 'ssi_models' , 'orderby' => 'modified', 'order' => 'desc' , 'post_status' => 'publish' , 'category_name' => 'thots' ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1, 'order' => 'asc'  ,'orderby' => 'modified', 'post_status' => array('publish', 'pending')  ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			
			
		?>



	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
	
			Smashin THOT Holes Daily!<hr>
			
			<?php
				the_post_thumbnail( get_the_ID() );
			
			?><hr>
				

			
			<?php
					//has_post_thumbnail( get_the_ID() );
			
				$args = array( 'numberposts' => -1, 'post_type' => array( /*'ssi_contact',*/ 'ssi_thots') , 'post_status' => array('publish', 'pending') , 'orderby' => 'modified', 'order' => 'desc'  );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
		
				
				?>
				<div class='clearfix'></div>
				<?php
				
				
				$total_models = count($thots);
				
				//$count = count($thots);
				$count = 1;
			
			?>

		
<div class='clearfix'></div>

		<div class="list"> 
			<?php
				foreach( $recent_posts as $recent ){
					
						$is_user = false;
						//$count++;
			?>
					<div class="well yellow text-center h4"> 
						<a target="_blank" href="/?p=<?php echo $recent["ID"]; ?>"><?php echo $count++ . ". " . $recent["post_title"]; ?></a>
						
						<br><br>
						<?php 
							$user = false;
								if( get_user_by('email', get_field( "MX_user_email", $recent["ID"] ) ) ){
									
									$user = get_user_by('email', get_field( "MX_user_email", $recent["ID"] ));
									
									$is_user = true;
									
								}
							//echo "User ID: " . $user->ID . "<br>";
						?>
						
						
						
						<?php
						
							if(get_the_post_thumbnail( $recent["ID"] , 'medium' )){
								echo get_the_post_thumbnail( $recent["ID"] , 'medium' );
								echo "<br><br>";
							}
						?> 
					
						
						
						<!--<b><u>His Fantasy</u></b><br><br>-->
						<?php
							//echo $recent["post_content"];
						?>
						
						<!--<br><br>-->
						
						
						
						
						
								
		<div class='video-set1 well flyer flyer-bg'>
			
			
			<?php $guestID = get_field( 'user_ID' , $recent["ID"] ); ?>
			
			<a target="_blank" href='/user-profile/?ID=<?php echo $guestID; ?>' class=' '>
			
			<article id="post-<?php the_ID(); ?>" class="text-left">		
			
	
				
				
			</article>


			<div class='col-xs-4 h3'>
				
			
				
			<?php 
				
				
				echo "<center>" . get_field( 'member_level', $guestID ) . "</center>";
				
				
					echo get_avatar($user->ID);
				
	
				?>
			
				
			</div>
			<div class='col-xs-8'>
			
		
			
			 <center>
				<h4><?php print_r($user->user_login);  ?><hr></h4>
			 
	
					
						<?php
							
								if( get_user_meta($user->ID, 'MX_user_age' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_age' , 1);  echo " -- ";
								}else{
									echo get_field( 'MX_user_age', $recent["ID"] ); echo " -- ";
								}
								
								
							//echo get_user_meta($user->ID, 'MX_user_height', 1);
				
								if( get_user_meta($user->ID, 'MX_user_height_ft' , 1) ){
										echo get_user_meta($user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($user->ID, 'MX_user_height_in' , 1) . '"' ; echo " -- ";
								}else{
										echo get_field( 'MX_user_height', $recent["ID"] ); echo " -- ";
								}

								
								if( get_user_meta($user->ID, 'MX_user_weight' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_weight' , 1);  echo "<br><br>";
								}else{
									echo get_field( 'MX_user_weight', $recent["ID"] ); echo "<br><br>";
								}


								if( get_user_meta($user->ID, 'MX_user_position' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_position' , 1); 
								}else{
									echo get_field( 'MX_user_position', $recent["ID"] );
								}

								echo " -- ";
								
								if( get_user_meta($user->ID, 'MX_user_endowment' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_endowment' , 1);   echo "in";
								}else{
									echo get_field( 'MX_user_endowment', $recent["ID"] ); echo "in";
								}
								
								echo "<br>";	
							
							?>
							
							
							
					
					</div>
					<div class='clearfix'></div>
					
					
						
							<hr>
							
							
								<div class='text-center col-xs-12'>
					

									
							
							
									<b><?php 
				
					$closet = 0;
								if ( get_user_meta($user->ID, 'MX_user_city', 1 ) && get_user_meta($user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									?>
									<?php
										echo get_post_meta( $recent["ID"] , 'MX_user_city' ,1 );
									?>, 
									<?php
										echo get_post_meta( $recent["ID"] , 'MX_user_state' , 1);
									?>
									<?php
							
								}				
								
			?></b>
								</div>
					<div class='clearfix'></div><br>
					
					
<div class='pix hidden'>				
	<a target='_blank' href='/party_guests/<?php echo $lead->post_name; ?>'>
	<?php if( get_field( 'lead_image_1', $guestID ) ){ ?>		
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_2', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_3', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_4', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	</a>
		
<div class='clearfix'></div>
</div>	
					<?php
	
					$likes = $dislike = 0; 

					$likes =  get_post_meta($recent["ID"],'vortex_system_likes',true);
					$dislikes =  get_post_meta($recent["ID"],'vortex_system_dislikes',true);

				
				?>
		
		

				<div class="col-xs-offset-3 col-xs-3 vortex-p-like 12168 hidden ">
				
				<a class='icon-thumbs-up-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $likes; ?></a>
			
					
				</div>
				
				<div class="col-xs-3 vortex-p-dislike 12168 hidden">
				<a class='icon-thumbs-down-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $dislikes; ?></a>
				
				
				</div>

		</a>
		
		
		<?php 
		
		if( get_field( 'MX_user_email', $recent["ID"] ) ){ 
		
			if( get_user_by('email' ,get_field( 'MX_user_email', $recent["ID"] ) ) ){ //echo "HAS USER<br>"; 
			}else{ //echo "MAKE NEW USER"; 
			
				$email = get_field( 'MX_user_email', $recent["ID"] );
				$userdata = array(
					'user_login'  =>  $lead->post_name,
					'user_email' => $email,
					
					'user_pass'   =>  NULL  // When creating an user, `user_pass` is expected.
				);

				$user_id = wp_insert_user( $userdata ) ;

				//update_field( 'user_ID' , $user_id , $recent["ID"] );
				//On success
				if ( ! is_wp_error( $user_id ) ) {
					//echo "User created : " . $user_id;
				}
			
			
			}
		//echo "HAS EMAIL<br>"; 
			//echo get_field( 'MX_user_email', $recent["ID"] );
		
		
		}
		
		
		if( $this_user = get_user_by( 'email' , get_field( 'MX_user_email', $recent["ID"] ) ) ){

			?>
			
					<a target="_blank" href='/user-profile/?ID=<?php echo $this_user->ID; ?>' class='btn btn-primary btn-block'>View Profile >></a>

			<?php

		}else{
			
			
			?>
			
					<a target="_blank" href='/claim/?claimID=<?php echo $recent["ID"]; ?>' class='btn btn-default'>Claim Profile >></a>

			<?php

		} ?>
		<div class='clearfix'></div>

			
			
			<?php 
				//$user = wp_get_current_user();
				
				$user = get_user_by( 'ID', get_field( 'user_ID', $recent["ID"] ) );
				$user = get_user_by( 'email', get_field( 'MX_user_email', $recent["ID"] ) );
			$allowed_roles = array('editor', 'administrator');
		
			if( get_field( 'showed_up' , $recent["ID"] ) == 'Yes' ){ 
					echo "<br><span class='num text-center here'>HERE NOW!!</span>";	
				}else if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		?>			<br>
					<a href='?update=1&here=1&ID=<?php echo $recent["ID"]; ?>&time=<?php echo date("g:i A"); ?>&alias=<?php echo $lead->post_title; ?>' class='btn- btn-default'>Here Now!</a>
		<?php

			}
		?>
		</div>
		
			

						<?php if( $is_user ){ ?>
						
					
						
						
						<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>' class='pmessage btn-danger btn-lg upper bold white btn-block text-center'>Private Message</a>
						
						<?php }else{

							?>
							
							<a target='_blank' href='/?p=<?php echo $recent["ID"]; ?>' class='pmessage btn-success btn-lg upper bold white btn-block text-center'>View Request >></a>
							<?php
						}?>
						
					
					</div>
					<div class='clearfix'></div>
			<?php
				}
			?>
		</div>

		<hr><h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h4><hr>
		
		
		<div class='well'>
			<div class='col-sm-6 text-center '>
			
				
				
				<h4 class="post-title text-center hidden"><?php echo $current_user->display_name; ?></h4>
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
															
									
									if( ($user->ID == $current_user->ID) || $admin_user ){ ?>
									<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
									<div class='clearfix'></div>
									<?php } ?>
									
									
									<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>' class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</a>
			</div>
			<div class='col-sm-6 text-center'>
				<div class='visible-xs'><br></div>
				
				
				<div class='clearfix'></div><br>
				
				
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
					<?php //echo get_user_meta($user->ID, 'MX_user_height', 1);
					
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
				
				<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>

				<?php
				$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'M', true));
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
		
		<div class='clearfix'></div>

		<div class="stats">
						
			<hr><h4>We Current Have: </h4><hr>
				
			<div class='clearfix'></div>
					
				
				<div class="col-md-12">		
					<center>
						<h3>Menu</h3>
						<div id="menu" style='display: block;'>
							<a href='/thot-request' class='btn btn-block btn-default btn-lg hidden1'>> Reqest a Session <</a>
							
							<a href='/user-profile' class='btn btn-block btn-info btn-lg'>Your Profile</a>
							<a href='/models' class='btn btn-block btn-info btn-lg hidden'>Our Models</a>
							<a href='/members' class='btn btn-block btn-info btn-lg'>Our Members</a>
							<a href='/mailbox' class='btn btn-block btn-info btn-lg'>Mailbox</a>
							<a href='/fantasy' class='btn btn-block btn-default btn-lg hidden1'>> Post a Fantasy <</a>
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
				</div>
	
		</div><!-- // container -->
		
		<div class='clearfix'></div><br>


		<hr><h4>Upgrade to Premium!</h4><hr>
		<p>- View All Member Profiles</p>
		<p>- Get Full Access to our Pix/Vids</p>
		<p>- Get Access to our Private Events</p>
		<p>- View Exclusive Model Content</p>
		<p>- Get Notified when we Make an Update!</p>
		<!--<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>-->
	
	
		<div class='clearfix'></div>

		<div class='well'>
			<h4>1 Month - Just $30!</h4><hr>
			
			<a href='/vip' class='btn btn-success btn-lg btn-block'>Upgrade Now</a>
			
			
			
			
			
			<br><h4>Want a FREE Tour?</h4><hr>
			<button id='tour' class='btn btn-block btn-success btn-lg'>Start Now >></button> 
			<div id='tour' style='display: none;'>
				<hr>
			<h4>Premium Content </h4><hr>
			<a href='/photos' class='btn btn-block btn-info btn-lg'>Photos</a>
			<a href='/videos' class='btn btn-block btn-info btn-lg'>Videos</a>
			</div>
			
		</div>
		

<div class='clearfix'></div>
</div>

<div class='clearfix'></div>

</div>
	<div class='clearfix'></div>
<?php get_footer('preview'); ?>