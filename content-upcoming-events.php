						

<div class='upcoming-events text-center'>




<?php


$upcoming_events = get_posts( array (  
						
					   'posts_per_page'         =>  1,
					   'post_type' => 'ssi_events',
					   'category_name' => 'upcoming-events',
					   'meta_key'               => 'event_date',
						'order' => 'asc',

					)     );

					
$past_events = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'ssi_events',
					   
					   'category_name' => 'past-events',
						'order' => 'asc',

					)     );

					
$all_upcoming_events = get_posts( array (  
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'ssi_events',
					   'category_name' => 'upcoming-events',
					   'meta_key'               => 'event_date',
						'order' => 'asc', 

					)     );

					
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
		
?>
<div class="clear"></div>

	


			


		<?php 
					$found = 0;
					
					$count = 0;
					
					$cancelled = false;
					
					foreach( $upcoming_events as $lead ){
						
						if( get_field('event_cancelled', $lead->ID ) == "Yes" )  { $cancelled = true; }else{ $cancelled = false; }
						
						
					if( $count == 0 ) { 
					
						
						
						
						?>
				
				
				
			<br><h3>Upcoming Event</h3><br>
				
				
					<div class='1col-sm-10 1col-sm-offset-1 text-center well green'>		
					<div class='1col-sm-10 1col-sm-offset-1 text-center  '>	
					
						 
						<?php 
				if( get_field("event_cancelled", $lead->ID ) == "Yes" )  { $cancelled = true; }else{ $cancelled = false; }
				
				if( $cancelled )  { echo "<div class='alert-danger h2 text-center'> Event CANCELLED!! </div><br>"; }
			?>
				
				
		
				<div class='clearfix mb-10'></div><div class='clearfix mb-10'></div>
				<?php 
		
					//echo date("m-d-y");
					
					date_default_timezone_set("America/New_York");
					$t=time();
                    //echo($t . "<br>");
                    $final_time = date("Y-m-d g:ia",$t);
                    
                   // echo "<br>";
                    
                    $final_start =  date("Y-m-d g:ia", strtotime(get_field('event_date' , $lead->ID) . " " . get_field( 'event_start' , $lead->ID)));
                   // echo "<br>";
                    $end_time = date("Y-m-d", strtotime(get_field('event_date', $lead->ID) + "1 day"));
                     
                    $final_end = date("Y-m-d g:ia", strtotime($end_time . " " . get_field( 'event_end', $lead->ID )));
                    
					if( strtotime($final_time) >= strtotime($final_start) && strtotime($final_time) <= strtotime($final_end)  ){
							
				//			echo 'HERE';
							echo get_field( 'close_countdown', $lead->ID ); 
					}else{
					    
				//	    echo "No Party";
						echo get_field( 'event_countdown', $lead->ID ); 
					}
				
			
		
				?>
		
				<div class='clear'></div>
				
				<div class='col-sm-3 '>	
					<?php 
					if( has_post_thumbnail($lead->ID) ){
						
						echo get_the_post_thumbnail($lead->ID);
					}else{
						
						twentysixteen_the_custom_logo(); 
					}
				 ?>
					<br><br>
				</div>
				<div class='col-sm-6  h4'>			
					<div class='clear well yellow'>
					
					<div class='col-xs-6 '>
						<h3><u>Date</u></h3>

						<small><?php date_default_timezone_set("America/New_York"); 

						echo date("M jS", strtotime(get_field('event_date', $lead->ID)));
						?> </small>
														
					</div>
					<div class='col-xs-6 '>
						<h3><u>Time</u></h3>
						<small><?php echo get_field( 'event_time', $lead->ID ); ?></small>
					</div>
					<div class='clear '></div><br>
						
						<h3><u>Location</u></h3> 
						<small><?php echo get_field( 'event_location', $lead->ID ); ?></small>
									
						<br><br>
				
				<h3 class='hidden'>$<?php echo get_field( 'event_price' , $lead->ID); ?> - All Night!</h3>
			

				
						<div class='clear'></div>
				<?php $rsvps = get_field( 'event_rsvps' , $lead->ID); 
						$max_guests = get_field( 'event_max_guests' , $lead->ID);
						$seats = $max_guests - $rsvps;
					
					?>
					<small>( <u><?php echo $seats; ?></u> Slots Left )</small> <br>
					<br>
					</div>
							<?php echo do_shortcode('[bbp-single-view id=217985]'); ?>
	
					
				</div>
				<div class='col-sm-3 report '>	
					
						<hr>
							<center><h4>Top <u>6</u> Guests</h4></center><hr>
							<?php 
							
							
					$guests = get_posts( array (
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'event_guests',
						'category_name'                  => 'event' . $lead->ID ,
					    'order'                  => 'desc',
						'orderby'                => 'meta_value_num',
						'meta_key'               => 'RATINGS_AVERAGE', 
						//'meta_key'               => 'vortex_system_likes',
				// 		'orderby'                => 'orderby' => array( 
    //                         'post_date' => 'desc',
    //                         'meta_value_num' => 'DESC',
                       //  ),

				
						//'categories'	=>	array( -147 ),
					)     );
					$guest_count = 1;
					
					
					
					if( !count($guests) ){ echo "- no guests -<br>"; }
					foreach( $guests as $guest ){
					
						if( get_field( 'event_host' , $guest->ID ) == 'Yes' || $guest_count > 6 ){  continue; }
						?>
						<div class='1col-md-12 text-left'>
						    
						    	<?php 
			
				$MX_user_id = 0;
        		$MX_user_id = get_field( 'user_ID', $guest->ID );
        		if( get_field( 'MX_user_id', $guest->ID ) ){ $MX_user_id = get_field( 'MX_user_id', $guest->ID ); }
        		
			
			$guestID = $MX_user_id; ?>
							 	
							 	<div class="pull-left">
								    
								<?php
								
								//echo get_avatar($guestID, 30);
								?>
							 	</div>
								<h5 class="pull-left">
								    <div class='clear mb-5'></div>
								    <a target='_blank' href='/?p=<?php echo $guest->ID; ?>'>
								<?php
								
								echo get_avatar($guestID, 35);
								?>
								</a>
								<?php
								echo " &nbsp; ";
									echo ($guest_count) . ". ";
									$count++; ?>
								<a target='_blank' href='/?p=<?php echo $guest->ID; ?>'>
								<?php echo $guest->post_title;  ?>
								</a>
								
									
							
								| 
									<?php 
			
					echo get_field( 'MX_user_age', $guest->ID ); echo "&nbsp;";
				//	echo get_field( 'MX_user_height_ft', $guest->ID ); echo "' ";
				//	echo get_field( 'MX_user_height_in', $guest->ID ); echo " -- ";
				//	echo get_field( 'MX_user_weight', $guest->ID ); echo " | ";
				
				?></h5>
					<span class='pull-right 1hidden'>
					    <?php
				if(get_field( 'MX_user_position', $guest->ID ) != "" ){
					echo "<small>(" . get_field( 'MX_user_position', $guest->ID ) . ")</small>";
				}else{
					
					echo " -- ";
				}
				//	echo get_field( 'MX_user_endowment', $guestID ); echo "in<br>";	
					
					?>
					<br>
											<a target='_blank' href='/event_guests/<?php echo $guest->post_name; ?>/?eventID=<?php echo $lead->ID; ?>' class='btn btn-success pull-right'>Confirm</a>

					</span>
							
								 
							
							
								
							<div class='clear mb-5'></div>	
							<?php 
						//	echo ($guest_count) . ". ";
								$guest_count++;
							?>
							
								<?php 
							//	echo $guest->post_title; 
							//	echo get_avatar($guestID, 50);
								?>
								<div class='pull-right hidden'>
								 <?php  //echo do_shortcode( '[ratings id="'. $guest->ID  . '"]' ); ?>
							    </div>
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
	
				
					<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-success btn-lg btn-block pulse'><br> Quick RSVP >> <br><br></a>
				
				
				
			<h3><?php //echo get_field( 'event_quote', $lead->ID ); ?></h3>
				
				<img src='<?php echo get_field( 'event_flyer', $lead->ID ); ?>' class=' img-responsive hidden'>	
						
		</div>					

						<div class='clear'></div>
				
				
						
	<div class='col-md-12 well text-center hidden'>		
		
		
		<div class="header col-md-8">
		
			
			
			<?php 
			
				//echo date("m-d-y");
				if( strtotime(date("m-d-y")) >= strtotime(date("m-d-y", get_field('event_date'))) ){
						
						//echo 'HERE';
						echo get_field( 'close_countdown' , $lead->ID); 
				}else{
					echo get_field( 'event_countdown', $lead->ID ); 
				}
			
			?>
		
			<div class='well yellow'>
			<h3><?php echo date("l | M jS, Y", strtotime(get_field('event_date', $lead->ID))); ?> <br><br><small>DOORS OPEN<br><?php echo get_field( 'event_time', $lead->ID ); ?></small></h3>
					
			<div class='clear'></div><br>

				<div class=" col-md-12">
					[<?php echo get_field( 'event_location', $lead->ID ); ?>]
				</div>
				
				<div class='clear'></div>
				<div class=" col-md-12">		
						
						<?php $rsvps = get_field( 'event_rsvps' , $lead->ID); 
								$max_guests = get_field( 'event_max_guests' , $lead->ID);
								$seats = $max_guests - $rsvps;
							
							?>
							<small>( <u><?php echo $seats; ?></u> Slots Left )</small> <br>
						</div>
						<div class='clear'></div>
						
			</div>			<div class='clear'></div>
								<?php echo do_shortcode('[bbp-single-topic id=217987]'); ?>
	
			
		</div>
		<div class="header col-md-4 p0">
						<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class=''><?php echo get_the_post_thumbnail($lead->ID); ?> </a>
						<br><br>
						
							
				<div class='clear'></div>
		</div>
		<div id='full-details' class='col-sm-12 ' style='display: none;'>
			<img src='<?php echo get_field( 'event_flyer' , $lead->ID ); ?>' class=' img-responsive'>	
	
			<div class='clear'></div><br>
			

		<div class='border flyer flyer-bg well'>
		
		<?php if( $cancelled )  { echo "<div class='alert-danger h2'> Event CANCELLED!! </div><br>"; } ?>
		
		 <h3 class="entry-title" <?php if( $cancelled )  { echo "style='text-decoration: line-through;'"; } ?>>
		 
		 
		 
		 <?php   echo $lead->post_title; ?>
		 
			<hr>
		 
		 </h3>
		 	<div class='clear'></div>
			<?php if(get_field( 'event_flyer' , $lead->ID )){ ?>
			<div id='full-details' class='col-sm-12 hidden ' style='display: none;'>
					<img src='<?php echo get_field( 'event_flyer' , $lead->ID ); ?>' class=' img-responsive'>	
			
					<div class='clear'></div><hr>
			</div>
			
			<?php } ?>
			
	
			
	<div class='col-sm-6 '>		
			
			
			<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class=''><?php echo get_the_post_thumbnail($lead->ID); ?> </a>
			
			<div class='clear'></div>
		
	</div>		
	<div class='col-sm-6 '>	
	
		<div class='well yellow'>
			<div class='col-xs-6 '>
						<h4><u>Date</u></h4><span <?php if( $cancelled )  { echo "style='text-decoration: line-through;'"; } ?> class=' orange'> <?php date_default_timezone_set("America/New_York"); 

						echo date("M jS", strtotime(get_field('event_date', $lead->ID)));
						?> </span>
														
														
					</div>
					<div class='col-xs-6 '>
						<h4><u>Time</u></h4><span <?php if( $cancelled )  { echo "style='text-decoration: line-through;'"; } ?> class='orange'><?php echo get_field( 'event_time', $lead->ID ); ?></span>
					</div>
					<div class='clear '></div>
						
						<h3><u>Location</u> <br> 
				
				<?php 
						//echo get_user_meta( $current_user->ID , 'show_location' ,  1);
				
					if( 1 /*get_user_meta( $current_user->ID , 'show_location' ,  1) == 'true'*/ ){
						?>
						<h6 <?php if( $cancelled )  { echo "style='text-decoration: line-through;'"; } ?>><?php echo get_field( 'event_location', $lead->ID ); ?></h6>
						
						<?php
					}else{
						?>
						<br>
						<button id="address" class="btn btn-default">Show Location</button>
						<?php
						
					}
				?>
				
				<?php echo do_shortcode("[bbp-single-topic id=217987]"); ?>
				
				
				<div id="address" class="col-xs-12  " style="display:none;">
		<div class="well">
				
		<form method='get'>
				<h4><center>For FULL Location</center></h4>
			<h3><center>Enter Your Phone#:</center></h3>
			<small>- We will NOT share your Phone# -</small><hr>	
				
			<div class=' col-xs-12'>
				 <input type='phone' name='MX_user_phone' placeholder='1-555-555-5555' required>
				
<!--				
				 <input name='username' type='hidden' value='<?php echo $current_user->display_name; ?>'>
					<input name='userID' type='hidden' value='<?php echo $current_user->ID; ?>'>
					
					<input name='mystery' type='hidden' value='true'>
					<input name='update' type='hidden' value='true'>
-->					
					<input name='show_location' type='hidden' value='true'>
					<input type='submit' value='Show Location' class='btn btn-success btn-block btn-lg'>
			</div>
			
		</form>
		<div class='clear '></div>
		</div>
		
		
		</div>
				
				<?php //echo get_field( 'event_location', $lead->ID ); ?>
				
				<!--<small>(Doors close at 3am)</small>-->
				
				
		
		<br>
		<h4><u><?php the_field('event_rsvps', $lead->ID); ?></u> RSVP's</h4>
			<div class='clear'></div>
				<?php $rsvps = get_field( 'event_rsvps' , $lead->ID); 
						$max_guests = get_field( 'event_max_guests' , $lead->ID);
						$seats = $max_guests - $rsvps;
					
					?>
					( <u><?php echo $seats; ?></u> Slots Left ) <br>
		
		<!--
		( <u><?php the_field('event_showed', $lead->ID); ?></u> Here Now! )
		-->
		<?php //echo get_field( 'event_price' , $lead->ID); ?>
		
		</div>
		
		

	
	
	
		
				<div class='clear'></div>
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='hidden btn btn-rsvp btn-info btn-lg btn-block'><br> Full Details<br><br></a>
				
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-success btn-lg btn-block'><br> Quick RSVP >> <br><br></a>
				<!--
					
						<a target='_blank' href='/rsvp?event=event<?php echo $lead->ID; ?>' class='btn btn-success btn-lg btn-block'> Quick RSVP >> </a>
				
			-->
		<div class='clear'></div>
	
	
		<div class='clear'></div>
	</div>
	
	
	

		<div class='clear'></div>
	
		</div>
		
			
		</div>
		<div class='clear'></div>
		<div id='full-details' class='col-sm-12 ' style='display: block;'>		
				
					
					<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' class='btn btn-success btn-lg btn-block'><br> Quick RSVP >> <br><br></a>

					<button id='full-details' class='hidden btn btn-danger btn-default btn-lg btn-block'><br> Full Details <br><br></button>
					<div class='clear'></div>
		</div>		
					<div class='clear'></div>
		</div>
						
						
						<div class='clear'></div>
						
	</div>					<?php 
					
					
					}
					

						
						?>
						
						
						<div class='clear'></div>
						

	<?php } ?>
	



