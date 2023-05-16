<?php

 if( is_user_logged_in() ){
	$user = $current_user = wp_get_current_user();
}

get_header('network'); ?> 

	<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 ));
			//$thots = get_posts(array( 'numberposts' => 1, 'post_type' => 'ssi_models' , 'orderby' => 'modified', 'order' => 'desc' , 'post_status' => 'publish' , 'category_name' => 'thots' ));
			$thots = get_posts(array(  'post_type' => array(/*'ssi_models',*/ 'ssi_breed') , 'posts_per_page' => -1, 'order' => 'desc'  ,'orderby' => 'modified', 'post_status' => array('publish'/*, 'pending'*/)  ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			
			
		?>



	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
		<div class=' photo'>
				
			
			<?php
					the_post_thumbnail( get_the_ID() );
			
				/*$args = array( 'numberposts' => 1, 'post_type' => 'video' );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					//echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					//print_r($recent);
					?> 
					<a href='/videos'> <div style='max-height: <?php echo $height; ?>;'>
					<?php
					//echo get_the_post_thumbnail( $recent["ID"] );
					echo $recent["post_content"];
					?> </div>
					</a>
					
					<?php
				}*/
				wp_reset_query();
			?><div class='clearfix'></div><br>
				Smashin THOT Holes Daily!<hr>
			</div>
		
		<div class=' latest-post'>
				
			
			<?php
					//has_post_thumbnail( get_the_ID() );
			
				$args = array( 'numberposts' => 1, 'post_type' => array(/*'ssi_models',*/ 'ssi_breed') , 'post_status' => array('publish'/*, 'pending'*/)  );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					
					//print_r($recent);
					?> 
					<h4>- THOT #1 -</h4>
					<?php
					echo get_the_post_thumbnail( $recent["ID"] , 'medium' );
					
					?> 
					<br><br>
					<b><u>Name</u></b><br>
					<?php echo  $recent["post_title"]; 
					
					?>
					<br><br>
					<b><u>Location</u></b><br>
					<?php
					echo get_post_meta( $recent["ID"] , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta($recent["ID"] , 'MX_user_state' , 1);
					?>
					<br><br>
					<b><u>His Fantasy</u></b><br><br>
					<?php
					echo $recent["post_content"];
					
					?>
					<br><br>
					<b><u>Status</u></b><br>
					<?php				
					//echo --$count;
					echo "Pending";
					//echo $lead->post_title;
					//echo "";
				?>
					<?php
					
					
				}
				wp_reset_query();
				
				?>
				<div class='clearfix'></div><br><br>
				<?php
				
				
				$total_models = count($thots);
				
				//$count = count($thots);
				$count = 1;
				
				foreach( $thots as $lead ){
					
					if(  $count <= 1 || $total_models+1  == $count ){ $count++; continue; }
					if( in_category( $lead->ID , 'top-thot' ) ){ continue; }
					
				?>
				<div class='text-left col-xs-6'>
				<?php				
					echo $count++;
					echo " - ";
					echo $lead->post_title;
					//echo "<hr>";
				?>
				</div>
				<div class='text-right col-xs-6'>
				

					<?php
					echo get_post_meta( $lead->ID , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta($lead->ID , 'MX_user_state' , 1);
					?>
			
				</div><div class='clearfix'></div><hr>
		

		<div class='hidden1'>
				<div class='circle'>
					<?php echo get_the_post_thumbnail( $lead->ID , 'thumbnail' ); ?>
				</div>
				
				<br><br>
					<b><u>His Fantasy</u></b><br>
					<?php
					echo $lead->post_content;
				
					?>
					<br>
					<?php
					
					echo date( 'm/d/y', strtotime(get_the_date( $lead->ID )));
					?>
					<br><br>
					<b><u>Status</u></b><br>
					<?php				
					//echo --$count;
					if( get_post_meta( $lead->ID , 'model_status' , 1) ){ 
					 echo get_post_meta( $lead->ID , 'model_status' , 1);
					}
					else{ echo "Pending"; }
					//echo $lead->post_title;
					//echo "";
				?>
				<br><br><div class='clearfix'></div><hr>
		</div>
				<?php				
					//echo --$count;
					//echo " - ";
					//echo $lead->post_title;
					//echo "<hr>";
				?>

				<?php
				}
			?>
			</div>
	<div class='clearfix'></div>
		
	
		<div class='clearfix'></div>
		
		<hr><h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h4><hr>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php echo $user->display_name; ?></h4>
			<div class=" porn">
									<center>
								<?php echo get_avatar($user->ID, 150); ?> 
									</center>
								</div>
								
								<div class='clearfix'></div><br>
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			
			<div class='clearfix'></div><br>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				if( get_user_meta($user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_age' , 1);
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
				
				if( get_user_meta($user->ID, 'MX_user_height_ft' , 1) ){
						echo get_user_meta($user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($user->ID, 'MX_user_height_in' , 1) . '"' ;
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
				
				if( get_user_meta($user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_weight' , 1);
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
								if ( get_user_meta($user->ID, 'MX_user_city', 1 ) && get_user_meta($user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?></b>
			</div>
			
			<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>

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
		
		
			
	<div class="stats">
						
			<hr><h4>We Current Have: </h4><hr>
			
			<div class="col-md-12 text-center">		
						<center><a href="http://s11.flagcounter.com/more/qo"><img src="http://s11.flagcounter.com/count2/qo/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_12/viewers_0/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a></center><br>
				</div>
				
		
								<div class="row">
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/events'>
			<figure>
			
			  <img src="/wp-content/uploads/2016/11/man-x-scape-shawn-e1478869098864.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($events); ?></h3> <h4>Events ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								<div class=" col-xs-4 text-center well">
								
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php  echo --$count; ?></h3> <h4>ThoTs</h4></figcaption>
			</figure>
			
								</div>	
							
								
								
								
								
								
								
								<div class="col-xs-4 text-center well">
							
			<figure>
				 <img src="/wp-content/uploads/2016/11/14642200_853702041432368_4968411123150703434_n-e1478868844240.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			 
			  <figcaption><h3><?php echo count($photos); ?></h3> <h4>Photos</h4></figcaption>
			</figure>
					
								</div>
									<div class="col-xs-4 text-center well">
							
			<figure>
				 <img src="/wp-content/uploads/2016/11/14642200_853702041432368_4968411123150703434_n-e1478868844240.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			 
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>Videos</h4></figcaption>
			</figure>
					
								</div>
								
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/projects'>
			<figure>
			 
			
			
			  <img src="/wp-content/uploads/2016/11/man-x-scape-shawn-e1478869098864.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($projects); ?></h3> <h4>Projects ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								
									<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/members'>
			<figure>
			  <img src="/wp-content/uploads/2016/11/deep350_350-e1478869245737.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo $total_results; ?></h3><h4>Members ></h4></figcaption>
			</figure>
			</a>
								</div>
								
								
								
							</div>

						

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
			<div class='clearfix'></div>
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
		<br>
		
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
		
	</div>



<?php //get_sidebar(); ?>		<div class='clearfix'></div>

<?php get_footer('network'); ?>