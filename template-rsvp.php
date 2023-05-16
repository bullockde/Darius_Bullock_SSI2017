<?php 
/*
Template Name: RSVP
*/
get_header('network');

$past_events = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'ssi_events',
					   
					   'category_name' => 'past-events',
						'order' => 'desc',

					)     );
					
$upcoming_events = get_posts( array (  
						
					   'posts_per_page'         =>  2,
					   'post_type' => 'ssi_events',
					   'category_name' => 'upcoming-events',
					   'meta_key'               => 'event_date',
						'order' => 'asc', 

					)     );



?>

<?php
$folks = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					  // 'post_type' => 'party_guests',
						'category_name'                  => 'vip-member',
						'post_status'                => 'draft',
						'order' => 'asc',
						//'offset' => 2
					   // 'meta_key'               => 'vortex_system_likes',
						//'categories'	=>	array( -147 ),
					)     );
					
					foreach( $folks as $lead ){
						set_post_type( $lead->ID , 'party_guests' );
						wp_publish_post( $lead->ID ); 
					}
					

					
			if($_POST['new_event']){
		echo "NEW EVENT!!";
		

				
		$name = $_POST['post_title'];
		
		$catID = get_cat_ID( 'Upcoming Events' );
			//$category =  get_the_category($EventID);
			
			
			$cats = array();
			
			array_push($cats, $catID);
		
		// Create post object
		$my_post = array(
		  'post_title'    => $name,
		  'post_type'  => 'ssi_events',
		  'post_status'   => 'publish',
		  'post_author'   => 1,
		  'post_category' => $cats
		);
		 
		// Insert the post into the database
		$postID = wp_insert_post( $my_post );
		
		
		foreach ($_POST as $param_name => $param_val) {
			add_post_meta($postID, $param_name, $param_val, true);
			update_post_meta( $postID, $param_name, $param_val  );

		}
		
		
		
		add_post_meta($postID , 'event_date', $_POST['event_date'] );
		
		$start_time = date("ga", strtotime($_POST['event_start'])); 
		
		add_post_meta($postID , 'event_start', $start_time );
		
		$end_time = date("ga", strtotime($_POST['event_end'])); 
		
		add_post_meta($postID , 'event_end', $end_time );
		
		$event_time = $start_time . " - " . $end_time;
		
		add_post_meta($postID , 'event_time', $event_time );
		
		add_post_meta($postID , 'event_location', $_POST['event_location'] );
	
		wp_publish_post( $postID ); 
		wp_update_post( $postID ); 
		
		
		
	}
		
?>


<br>



<div class='col-sm-8 col-sm-offset-2 text-center hidden'>

			<hr><h4 class='text-center'> Events </h4><br>
			
			<div class="clear"></div>
			
			<button id='newparty' class=' text-center hidden1'>New Event</button>
			
			<div class="clear"></div><br>
</div>
		
		
<div class=' text-center hidden1'>

	<div class="clear"></div>
	

	<div id='newparty' style='display: none;'>
			
			<hr>
	<div class='col-sm-10 col-sm-offset-1 text-center hidden1 well'>		
		<form method='post'>
				<h3><input type='text' name='post_title' placeholder='Event Title' required><hr></h3>
				
				<div class='col-sm-6 '>	
				<?php 
					if( has_post_thumbnail($lead->ID) ){
						
						echo get_the_post_thumbnail($lead->ID);
					}else{
						
						twentysixteen_the_custom_logo(); 
					}
				 ?>
			
					
				<div class="event-info h4">
					<div class='clear'></div><br>
						<div class="col-xs-6">
							<b>Members Only?</b>
						</div>
						<div class="col-xs-6">
							<?php 
							
								$att = get_user_meta($userid, 'event_members_only', 1);
								$options = array( 'No', 'Yes' );

							?>
							<select name="event_members_only" >
							<?php 
								foreach($options as $option){
									
									?>
									<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
									<?php
								}
							?>
							</select>

						</div>
						
						<div class='clear'></div><br>
						<div class="col-xs-6">
							<b>Max Guests?</b>
						</div>
						<div class="col-xs-6">
							
							<input type='number' name='event_max_guests' maxlength='3' max='99' value='30' required>

						</div>
						<div class="clear"></div><br>
						
						
					</div>
				</div>
				<div class='col-sm-6 '>			
					<div class='clear'></div>
					<div class='col-xs-12 '>
						<h3><u>Date</u></h3><h4 class='orange'> <?php date_default_timezone_set("America/New_York"); 

						?> <input type='date' name='event_date' placeholder='Event Date' required></h4>
														
														
					</div>
					<div class='clear '></div>
					<h3><u>Time</u></h3>
					<div class='col-xs-6 '>
						<b><u>Start</u></b><h4 class='orange'>  <input type='time' name='event_start' placeholder='Event Time' required></h4>
					</div>
					<div class='col-xs-6 '>
						<b><u>End</u></b><h4 class='orange'>  <input type='time' name='event_end' placeholder='Event Time' required></h4>
					</div>
					<div class='clear '></div>
						
						<h3><u>Location</u> <br> <input type='text' name='event_location' placeholder='Event Location' required><hr>
						

				<h4><input type='text' name='event_price' placeholder='Event Price' required></h4>

				</div>
						<div class='clear'></div>
			
			<input type='hidden' name='new_event' value='true'>
			<input type='submit' value='Submit' class='btn btn-lg btn-success btn-block' style='padding: 1em; '>
								
								
				<img src='<?php echo get_field( 'event_flyer', $lead->ID ); ?>' class=' img-responsive'>	
			</form>					
		</div>	
	</div>
</div>


<div class=' text-center'>


<div class="clear"></div>
	
	<h1> Upcoming Events <br></h1><br>
	

	<?php 
			
		$found = 0;
		
		$count = 0;
		
		if(count($upcoming_events) == 0){ 	
			?>
			<center>- No Upcoming Events -</center>
			<?php	
		}
		
		foreach( $upcoming_events as $lead ){
		
	?>
			

				<div class='col-sm-10 col-sm-offset-1 text-center well '>		
					<?php 
			
						//echo date("m-d-y");
						if( strtotime(date("m-d-y")) >= strtotime(date("m-d-y", get_field('event_date'))) ){
								
								//echo 'HERE';
								echo get_field( 'close_countdown' , $lead->ID); 
						}else{
							echo get_field( 'event_countdown', $lead->ID ); 
						}
					
					?>
		
				<?php 
				
				if( !get_field( 'event_countdown', $lead->ID ) || ( get_field( 'event_countdown', $lead->ID ) && ($count > 1 ) ) ){
				
						?>
						<h4><?php echo $lead->post_title; ?></h4><br>
						
						
						<?php 
							if( get_field("event_cancelled", $lead->ID ) == "Yes" )  { $cancelled = true; }else{ $cancelled = false; }
							
							if( $cancelled )  { echo "<div class='alert-danger h2'> Event CANCELLED!! </div><br>"; } ?>
			
			
			
						<?php
					}
				
				 ?>
				<div class='clear'></div>
				
				
			
				
				<div class='col-sm-5 '>	
					<?php 
					if( has_post_thumbnail($lead->ID) ){
						
						echo get_the_post_thumbnail($lead->ID);
					}else{
						
						twentysixteen_the_custom_logo(); 
					}
				 ?>
					<br><br>
				</div>
				<div class='col-sm-4 well yellow '>			
					<div class='clear'></div>
					
					<div class='col-xs-6 '>
						<h4><u>Date</u></h4>

						<?php date_default_timezone_set("America/New_York"); 

						echo date("M jS", strtotime(get_field('event_date', $lead->ID)));
						?> 
														
														
					</div>
					<div class='col-xs-6 '>
						<h4><u>Time</u></h4>
						<?php echo get_field( 'event_time', $lead->ID ); ?>
					</div>
					<div class='clear '></div><br>
						
						<h4><u>Location</u></h4> 
						<?php echo get_field( 'event_location', $lead->ID ); ?>
									
						<br><br>
				
		
				<h4 class='hidden1'>$<?php echo get_field( 'event_price' , $lead->ID); ?> - All Night!</h4>
			

				
						<div class='clear'></div><br>
		<h4><u><?php the_field('event_rsvps', $lead->ID); ?></u> RSVP's</h4>
			<div class='clear'></div>
				<?php $rsvps = get_field( 'event_rsvps' , $lead->ID); 
						$max_guests = get_field( 'event_max_guests' , $lead->ID);
						$seats = $max_guests - $rsvps;
					
					?>
					( <u><?php echo $seats; ?></u> Slots Left ) <br><br>
					
					<div id='full-details' class='col-sm-12 ' style='display: block;'>
							<button id='full-details' class='hidden1 btn btn-rsvp btn-default btn-lg btn-block'> Full Details </button>
							
					</div>
					
				</div>
				<div class='col-sm-3 report '>	
					 
						<hr>
							<center><h4>Top <u>8</u> Guests</h4></center><hr>
							<?php 
							
							
					$guests = get_posts( array (
						
					   'posts_per_page'         =>  8,
					   'post_type' => 'event_guests',
						'category_name'                  => 'event' . $lead->ID ,
					    'order'                  => 'asc',
						//'orderby'                => 'meta_value_num',
						//'meta_key'               => 'vortex_system_likes',
						//'categories'	=>	array( -147 ),
					)     );
					$guest_count = 1;
					
					
					
					if( !count($guests) ){ echo "- no guests -<br>"; }
					foreach( $guests as $guest ){
					
						if( get_field( 'event_host' , $guest->ID ) == 'Yes' || $guest_count > 8 ){  continue; }
						?>
						<div class='col-md-12 text-left'>
							<?php 
							echo ($guest_count) . ". ";
								$guest_count++;
							?>
							
								<?php echo $guest->post_title;  ?>
							
						</div>

					<div class='clear'></div><hr>
				<?php
					}
					
						?>
					
				
					<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-rsvp btn-info btn-lg btn-block hidden'> Full Details >><br></a>
				
				
				
					
				

					<!--
						<a target='_blank' href='/rsvp?event=event<?php echo $lead->ID; ?>' class='btn btn-success btn-lg btn-block'> Quick RSVP >> </a>
				-->
				
				
				</div>
						<div class='clear'></div>
	
				
				
					<div class='clear'></div>
					
					
			<?php if(get_field( 'event_flyer' , $lead->ID )){ ?>
			<div id='full-details' class='col-sm-12 ' style='display: none;'>
					<center><img src='<?php echo get_field( 'event_flyer' , $lead->ID ); ?>' class=' img-responsive'>	
					</center>
					<div class='clear'></div><br>
			</div>
			
			<?php } ?> 
				
			
					<div class='clear'></div>
					<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-success btn-lg btn-block'><br> Quick RSVP >> <br><br></a>
				
				
				
			<h4><?php //echo get_field( 'event_quote', $lead->ID ); ?></h4>
				
				<img src='<?php echo get_field( 'event_flyer', $lead->ID ); ?>' class=' img-responsive hidden'>	
						
		</div>					

						<div class='clear'></div>
						
					

								<?php
		}
					
					$past = 0;
		
		?>
	
	
</div>	 
	<?php //foreach( $emails as $email){ echo $email . "; "; } ?>
	
	<?php //get_template_part('home-members'); ?>
	
	<?php //get_template_part('content-party-people'); ?>
	
	<?php //get_template_part('content-dl-people'); ?>
    
	
		 
<?php

					
					
					$args = array(
						
							//'number' => -1,
							//'role' => 'role_party_guest',
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							//'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
					//	$ordered_users =  new WP_User_Query( $args );

					//	$ordered_users =  get_users( $args );
						//$blogusers = $ordered_users->get_results();
						
				//	$total_results = count($ordered_users);
					
					
					
		
							
		?>



<div class='clear'></div>
	
	<?php  //get_template_part('content', 'party-log'); ?>
	
		<div class='clear'></div>







<div class='clear'></div>














<div class=' text-center hidden'>

	
	<div class='col-xs-12 '>
	
	<hr><h3> Past Events </h3><hr>
	

		<?php 
			
				if(count($past_events) == 0){ 	
				
					?><center>- No Past Events -</center>
						<hr>
						<br><br>
						<br><br>
						<br><br>
						<br><br>
						<?php
				}
				
					foreach(   $past_events as $lead ){
						
						
					
						
						?>
					

		<div class='well  '>
			<div class='text-center'>
	
				
				<?php 
						if( get_field("event_cancelled", $lead->ID ) == "Yes" )  { $cancelled = true; }else{ $cancelled = false; }
						
						if( $cancelled )  { echo "<div class='alert-danger h2'> Event CANCELLED!! </div><br>"; } 
						
				?>
		
		

<?php 

				$current_party_date = '';
				$count = 1;
				

		
				
				?>
				
				
			<div class='<?php if($count == 1){ echo " past-party"; } ?> '>
			    	<div class='col-xs-6 text-left'>
						<h4><?php echo $lead->post_title; ?><br><small>(<?php echo get_field('event_date',  $lead->ID); ?>)</small><h4>
					</div>
					<div class='col-xs-6 h4 text-right'>
						 [ <?php  echo get_field('event_showed' ,  $lead->ID);  ?> 
				  
						  / <?php  echo get_field('event_rsvps' ,  $lead->ID); ?> ]
						  
						  <br> Showed Up
					</div>
				  <hr>
				   
				  <?php  if( get_field('event_rewarded_to' ,  $lead->ID) ){ 
				  
								echo get_field('event_rewarded_to' ,  $lead->ID); 
				  
				  
				  ?> <br><small>Earned a $<u><?php  echo get_field('event_reward' ,  $lead->ID); ?></u> Reward!</small>  <br>
				  <img src='<?php echo get_field('event_reward_photo' ,  $lead->ID); ?>' width='350'> 
				
				<?php } ?>
				
				<div class='clear'></div>
			</div>	
		
	
				
			
				<?php
				

?>
	</div>
						
								<div class='clear'></div>
									
									
									<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-info btn-lg btn-block'>View Details >></a>
						
						
						</div>
						
						
				

						<?php
					}
					
					$past = 0;
		
		?>
	
		 			
	 
	<?php //foreach( $emails as $email){ echo $email . "; "; } ?>
	
	<?php //get_template_part('home-members'); ?>
	
	<?php //get_template_part('content-party-people'); ?>
	
	<?php //get_template_part('content-dl-people'); ?>
 

	</div>
	
</div>
</div>
<div class='clear'></div>
	<?php get_template_part('content-welcome-rsvp'); ?>
<div class='clear'></div>
<?php
get_footer(); ?>