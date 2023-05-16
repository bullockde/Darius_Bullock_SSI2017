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
 
 
			if($_POST['new_event']){
		echo "NEW EVENT!!";
		

				
		$name = $_POST['post_title'];
		
		$catID = get_cat_ID( 'Current Event' );
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
	
	
get_header('login'); 


	$requests = get_posts(array( 'post_type' => 'ssi_requests' , 'post_status' => array('draft' , 'pending', 'publish') , 'posts_per_page' => -1 ));
	
	$cats = array( get_cat_ID('current-event') /*, get_cat_ID('playroom')*/ );
	$events = get_posts(array("post_type" => "ssi_events", "category" =>  121, "posts_per_page" => 1, "order" => "desc" ));
	
	$event = $events[0];
	//print_r( $events );

?>

	
<style>
	.btn-success {
		color: #fff;
		background-color: #00cd00;
		border-color: #4cae4c;
	}
</style>		
		
<div id="" class="">
 
	<div id="" class="col-md-6 col-md-offset-3">
	<center>		
		<?php

		//echo "CNT: " . print_r($events);
		if( count($events) > 0 ) { ?>
			<div class="well yellow stats text-center">
				<?php 
					//echo $event->post_title; 
				?>
				<h2>North PHILLY Playroom</h2>
				<?php date_default_timezone_set("America/New_York"); 

					echo date("M jS, Y", strtotime(get_field('event_date', $event->ID)));
					?>
				
				<br><a href="/?p=<?php echo $event->ID; ?>" class="h4">[ <?php echo get_field('event_time', $event->ID); ?> ]</a>
				
				
				
				<br>
				
					<div class='clear'></div>
				<?php $rsvps = get_field( 'event_rsvps', $event->ID ); 
						$max_guests = get_field( 'event_max_guests', $event->ID );
						$seats = $max_guests - $rsvps;
					
					?>
					<small>( <u><?php echo $seats; ?></u> Slots Left ) </small><br>
					
						
						
						<div class='clearfix'></div>
						
											
<?php

	
	$event_rsvps = get_field( 'event_rsvps', $event->ID ); //echo "RSVPS" . $event_rsvps;
	$max_guests = get_field( 'event_max_guests', $event->ID );
	//echo "MAX" . $max_guests;
 if( $event_rsvps < $max_guests ){ ?>		
	<div id="Verify" style="display: block;">		

		<button id="Verify" class="btn btn-success btn-block btn-lg hidden"><br>> RSVP NOW <<br><br></button>	
			
	</div>			
<?php }else{ ?>
		<h3 class="alert-danger">This Event had <u><?php echo $max_guests; ?></u> Slots!</h3>
		<br>
		
		<div id="Verify" style="display: block;">		

		<button id="Verify" class="btn btn-danger btn-lg">> Join the Overflow <</button>	<br>
			
		
	</div>	
<?php } ?>		
		
			
	<div id="Verify" class="  " style="display:none;">
		<div class="well">
				
		<form method='get' src="/?p=<?php echo $event->ID; ?>">
				
			
			<div class='clearfix'></div>
			
			
			<h3><center>Confirm - Basic Stats</center></h3><hr>	
				<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_user_meta(  $current_user->ID, 'MX_user_age', 1); ?>' required>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
			<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_height_ft', 1);
					$options = array( '', '4', '5',  '6',  '7' );

				?>
				<select name="MX_user_height_ft" required>
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			
				ft
				
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_height_in', 1);
					$options = array( '', '0', '1', '2',  '3',  '4', '5',  '6',  '7', '8', '9', '10', '11');

				?>
				<select name="MX_user_height_in" required>
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
				
						 in
				
				
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<input type='text' name='MX_user_weight' value='<?php echo get_user_meta($current_user->ID, 'MX_user_weight', 1); ?>' required>
			</div>	
			
				<div class=' col-xs-6'>
				Position:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_position', "user_" . $user->ID);
					
					$options = array( 'Top', 'Vers/Top', 'Vers', 'Vers/Bttm', 'Bottom');

				?>
				<select name="MX_user_position" required>
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
			<div class=' col-xs-6'>
				Endowment:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_endowment', "user_" . $user->ID);
					$options = array(  '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5', '13+');

				?>
				<select name="MX_user_endowment" required>
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
					 in
			</div>
											
			<div class=' col-xs-6'>
				Cut / Uncut:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_circumcised', "user_" . $user->ID);
					
					$options = array(  'Cut', 'Uncut');

				?>
				<select name="MX_user_circumcised" required>
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
				
			<div class='clear'></div><hr>
			<h3><center>Contact Info</center></h3><hr>	
				<div class=' col-xs-6'>
				Name / Alias: *
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='username' type='text' value='<?php echo $current_user->display_name; ?>' required>
			</div>
				<div class=' col-xs-6'>
				Phone#:
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='MX_user_phone' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_phone', "user_" . $current_user->ID); ?>' >
			</div>
				<div class=' col-xs-6'>
				Email: *
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='MX_user_email' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_email', "user_" . $current_user->ID); ?>' required>
			</div>
				<div class=' col-xs-6'>
				City:
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='MX_user_city' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $current_user->ID); ?>' >
			</div>
				<div class=' col-xs-6'>
				State:
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='MX_user_state' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_state', "user_" . $current_user->ID); ?>' >
			</div>
			<div class='clearfix'></div><hr>
			
			<div class="event-info h4 hidden">
					<div class='clearfix'></div><br>
						<div class="col-xs-6">
							<b>Are you Hosting?</b>
						</div>
						<div class="col-xs-6">
							<?php 
							
								$att = get_user_meta($userid, 'event_host', 1);
								$options = array( 'No', 'Yes' );

							?>
							<select name="event_host" >
							<?php 
								foreach($options as $option){
									
									?>
									<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
									<?php
								}
							?>
							</select>

						</div>
					</div>
			<div class='clearfix'></div>
			
			<p>NOTICE - Only RSVP if you Plan to SHOW UP!</p>
			
			<div class='clearfix'></div><hr>
			
					
					<input name='userID' type='hidden' value='<?php echo $current_user->ID; ?>'>
					<input name='time' type='hidden' value='<?php echo date("g:i A"); ?>'>
					<input name='mystery' type='hidden' value='true'>
					<input name='update' type='hidden' value='true'>
					<input type='submit' value='CONFIRM' class='btn btn-success btn-block btn-lg'>
					

		
		</form>
			
			
		<a href='/events' class='btn btn-danger btn-block btn-lg hidden'><< Im NOT Going</a>	
			
				
		</div>
			
	</div>		
			<div class='clearfix'></div>
			
			
			</div>
			
			<a href="/?p=<?php echo $event->ID; ?>" target="_blank" class="pulse btn btn-success btn-block btn-lg"> <br> Request a DOOR PASS &raquo; <br><br> </a>
			<br>
		<?php } ?>
		
		
		
				<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
		<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>
		
		
		
		
	
<div class='clearfix hidden1'>

		<div class='clearfix'></div><center>
		<hr>
		<h1>Confirmed Guest's</h1>
		<hr>
		<br>
			</center>
		
			
		<?php
		$count = 0;
		
		$confirmed_guests = get_posts( array (
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'event_guests',
						
						'category_name' => 'event' . $event->ID ,
					      'order'                  => 'asc',
						//'orderby'                => 'meta_value_num',
						//'meta_key'               => 'vortex_system_likes',
					)     );
		
		$emails = array();
		
		foreach( $confirmed_guests as $lead ){
			array_push($emails,get_field( 'MX_user_email', $lead->ID )); 
			
			if( get_field( 'userID', $lead->ID )  ){ // echo "YES -"; 
			
				$userID = get_field( 'userID', $lead->ID );
				update_field( 'user_ID' , $userID ,  $lead->ID );
			}else if( get_field( 'user_ID', $lead->ID )  ){
				//echo "YES ID-"; 
				
			}else{
				
				if(  get_field( 'MX_user_email', $lead->ID ) ) {
					
					$this_user = get_user_by('email', get_field( 'MX_user_email', $lead->ID ) );
					
					update_field( 'user_ID' , $this_user->ID,  $lead->ID );
					//print_r($this_user->ID);
				}
				//echo "NOTHING-"; 
			}
			
			
			if( get_field( 'event_host' , $lead->ID ) == 'Yes' ){ 
							continue;	
						}
			
			
			$today = strtotime('today');
			$today_end = strtotime('tomorrow');
			$date = '10/11/16'; #could be (almost) any string date


			//echo '<br>--->' . $date; 
			//echo '<br>--->' . $person->post_date;
			

				if ( strtotime( $lead->post_date ) < strtotime( $date ) ) {
					#$date occurs today
					
					//continue;
				} 
				//echo $person->post_title . "<br>";
				
				//echo get_post_meta(  $person->ID ,'vortex_system_likes' , true);
				
				?> 
				
							<div class='col-sm-12 text-center hidden1'>
		<?php 		
		
			
			echo "<span class='num'>" . ($count+1) . "</span>";	

									$count++;
						
				?>
		<br><br>
		
		
		<div class='video-set1 well flyer flyer-bg'>
			
			
			<?php $guestID = get_field( 'user_ID' , $lead->ID ); ?>
			
			<a target="_blank" href='/user-profile/?ID=<?php echo $guestID; ?>' class=' '>
			
			<article id="post-<?php the_ID(); ?>" class="text-left">		
			
	
				
				
			</article>


			<div class='col-xs-4 h3'>
				
			
				
			<?php 
				
				
				echo "<center>" . get_field( 'member_level', $guestID ) . "</center>";
				
				
					echo get_avatar($guestID);
				
	
				?>
			
				
			</div>
			<div class='col-xs-8'>
			
		
			
			 <center>
				<h4><?php echo $lead->post_title;  ?><hr></h4>
			 
				<?php 
			
					echo get_field( 'MX_user_age', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_height_ft', $lead->ID ); echo "' ";
					echo get_field( 'MX_user_height_in', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_weight', $lead->ID ); echo "<br>";
				
				if(get_field( 'MX_user_position', $lead->ID ) != "" ){
					echo get_field( 'MX_user_position', $lead->ID );
				}else{
					
					echo " -- ";
				}
				//	echo get_field( 'MX_user_endowment', $guestID ); echo "in<br>";	
					
					?>
					
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

					$likes =  get_post_meta($lead->ID,'vortex_system_likes',true);
					$dislikes =  get_post_meta($lead->ID,'vortex_system_dislikes',true);

				
				?>
		
		

				<div class="col-xs-offset-3 col-xs-3 vortex-p-like 12168 hidden ">
				
				<a class='icon-thumbs-up-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $likes; ?></a>
			
					
				</div>
				
				<div class="col-xs-3 vortex-p-dislike 12168 hidden">
				<a class='icon-thumbs-down-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $dislikes; ?></a>
				
				
				</div>

		</a>
		
		
		<?php 
		
		if( get_field( 'MX_user_email', $lead->ID ) ){ 
		
			if( get_user_by('email' ,get_field( 'MX_user_email', $lead->ID ) ) ){ //echo "HAS USER<br>"; 
			}else{ //echo "MAKE NEW USER"; 
			
				$email = get_field( 'MX_user_email', $lead->ID );
				$userdata = array(
					'user_login'  =>  $lead->post_name,
					'user_email' => $email,
					
					'user_pass'   =>  NULL  // When creating an user, `user_pass` is expected.
				);

				$user_id = wp_insert_user( $userdata ) ;

				//update_field( 'user_ID' , $user_id , $lead->ID );
				//On success
				if ( ! is_wp_error( $user_id ) ) {
					//echo "User created : " . $user_id;
				}
			
			
			}
		//echo "HAS EMAIL<br>"; 
			//echo get_field( 'MX_user_email', $lead->ID );
		
		
		}
		
		
		if( get_field( 'user_ID', $lead->ID ) ){

			?>
			
					<a target="_blank" href='/user-profile/?ID=<?php echo get_field( 'user_ID', $lead->ID ); ?>' class='btn btn-primary btn-block'>View Profile >></a>

			<?php

		}else{
			
			
			?>
			
					<a target="_blank" href='/claim/?claimID=<?php echo $lead->ID; ?>' class='btn btn-default'>Claim Profile >></a>

			<?php

		} ?>
		<div class='clearfix'></div>

			
			
			<?php 
				$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
		
			if( get_field( 'showed_up' , $lead->ID ) == 'Yes' ){ 
					echo "<br><span class='num text-center here'>HERE NOW!!</span>";	
				}else if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		?>			<br>
					<a href='?update=1&here=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>&alias=<?php echo $lead->post_title; ?>' class='btn- btn-default'>Here Now!</a>
		<?php

			}
		?>
		</div>
		<br>
			
			
			
			<?php if( ($count % 3) == 0 ){ echo "<div class='clearfix'></div><br>"; }  ?>
	</div>
		<?php } ?>	
</div><br>
<div class='clearfix'></div><br>
	
		
		
		<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
		<!--<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>
		
		<br>
		
		<div class="well yellow stats text-center">
		<u><?php echo count( $requests ); ?></u> Current <a href="/breed-list">Breed Requests</a>
		</div>
	
		
		<a href="/breed-request" target="_blank" class="btn btn-success btn-block btn-lg">  Request a BREEDING >> </a>
		<br>-->
<?php
		 if( is_page( array('resume', 'contact', 'gallery', 'subscribe') ) ){

		 }else if ( $thumb_url == '/wp-content/uploads/2018/08/ad-BreedFest-300-250-visit-now.png' ){


		} else { 

		
				//twentysixteen_post_thumbnail(); 
			
		}

	?></center>
	</div>
	
	<div id="" class="col-md-6">
			<?php echo do_shortcode('[gravityform id="19" title="false" description="false"]'); ?>
	</div>


	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
	<div class='clearfix'></div>
		
		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>
		
		<h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> <br><br><small>&dArr;&nbsp; This is How You Will Appear Online &nbsp;&dArr;</small></h4>
		
		
		<div class='well yellow'>
		<div class='col-sm-6 text-center '>
		
		
			<div class=" porn well mb-0">
				<center>
				<?php echo get_avatar($current_user->ID, 150); ?> 
				</center>
			</div>
								
								<div class='clearfix'></div>
								
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
						
		
			

			<div class='clearfix'></div><br>
					
				
				<div class="col-md-12">	


					<?php if( is_user_logged_in() ){ ?>
					
						<?php echo do_shortcode("[wpmem_form login]"); ?>
						
					<?php }else{ ?>
					<center>
						<h3>Join Our Guestlist<br><small>(100% Free - Full Access)</small></h3>
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
<?php //get_template_part('content', 'new-event'); 

?>



<div class='clearfix'></div>
	<div class='container-fluid'>
		<?php // get_template_part('content', 'welcome-rsvp'); 
		?>
	</div>
<div class='clearfix'></div><br>
	</div><!-- .site-main -->


</div><!-- .content-area -->
	<div class='clearfix'></div>
	
	
	


<?php get_footer('preview'); ?>
