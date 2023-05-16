<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<?php

	$EventID = 'event' . get_the_ID();
 
	$EventName = date("M jS", strtotime(get_field('event_date',get_the_ID())));
		
	if( in_category('playroom') ){ /*echo "YES!!<br>";*/ $EventName += "- Playroom"; }
	
		
		
if($_GET['show_location']){ 
	//update_user_meta( $current_user->ID, 'show_location', $_GET['show_location'] );
	foreach ($_GET as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			//update_post_meta( $postID, $param_name, $param_val );
		}
}
if($_GET['update']){
	if($_GET['mystery']){
		
	
		$catID = get_cat_ID( $EventName );
							//$category =  get_the_category($EventID);
							$cats = array();
							
							array_push($cats, $catID);
		
		$name = "Guest";
		
		if($_GET['alias'] == ""){ $name = "Guest"; }else{ $name = $_GET['alias']; }
		
		if($_GET['username']){ $name = $_GET['username']; }
		
		// Create post object
		$my_post = array(
		  'post_title'    => $name,
		  'post_type'  => 'event_guests',
		  'post_status'   => 'publish',
		  'post_author'   => 1,
		  'post_category' => $cats
		);
		 
		// Insert the post into the database
		$postID = wp_insert_post( $my_post );
		add_post_meta($postID , 'showed_up', 'No' );
		add_post_meta($postID , 'event_host', 'No' );
		add_post_meta($postID , 'user_ID', $_GET['userID'] );
		update_post_meta($postID , 'vortex_system_likes', 1 );
		update_post_meta($guestID  , 'event_time_in', $_GET['time'] );
		wp_publish_post( $postID ); 
		wp_update_post( $postID ); 
		
		
		foreach ($_GET as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			update_post_meta( $postID, $param_name, $param_val );
		}
		
		update_user_meta( $current_user->ID, 'stats_confirmed', true );
	}

	
	if($_GET['update_bag']){
		

							
		update_post_meta( $_GET['ID'] , 'assigned_bag', $_GET['assigned_bag'] );
		//update_post_meta($guestID  , 'event_time_in', $_GET['time'] );
		
		
		  $my_post = array(
			  'ID'           => $_GET['ID'],

			 // 'post_title'   => $lead->post_title,
			 // 'post_content' => 'This is the updated content.',
		  );

		
		// Update the post into the database
		  wp_update_post( $my_post );
	}
	
	if($_GET['here']){
		
	
		
		$catID = get_cat_ID( $EventName );
							//$category =  get_the_category($EventID);
							$cats = array();
							
							array_push($cats, $catID);
		
		
		$guestID = $_GET['ID']; 
		update_post_meta($guestID  , 'showed_up', 'Yes' );
		update_post_meta($guestID  , 'event_time_in', $_GET['time'] );
		
		
		//wp_set_post_categories( $post_ID, $post_categories, $append );
		
		
		// Create post object
		$my_post = array(
		  'post_title'    => $_GET['alias'] . " has arrived!",
		  'post_type'  => 'ssi_event_logs',
		  'post_status'   => 'publish',
		  'post_author'   => 1,
		  'post_category' => $cats
		);
		 
		// Insert the post into the database
		$postID = wp_insert_post( $my_post );
		
	}
	
	if($_GET['left']){
		

		$guestID = $_GET['ID']; 
		//3update_post_meta($guestID  , 'showed_up', 'No' );
		update_post_meta($guestID  , 'event_time_out', $_GET['time'] );
		
	}
}


$folks = get_posts( array (  
		
	   'posts_per_page'         =>  -1,
	  'post_type' => 'events_guests',
	//	'post_title' => $lead->post_title,
	//	'category_name'                  => 'vip-members' ,
		'post_status'                => 'pending',
		'order' => 'desc',
		//'offset' => 2
	   // 'meta_key'               => 'vortex_system_likes',
		//'categories'	=>	array( -147 ),
	)     );
	
	

			$EventID = 'event' . get_the_ID();
			
			
			if(!is_category($EventName)){
				
					$my_cat = array('cat_name' => $EventName, 'category_description' => '', 'category_nicename' => $EventID, 'category_parent' => '');

				// Create the category 
				$my_cat_id = wp_insert_category($my_cat);
			}
			
			
	
	foreach( $folks as $lead ){
		
		  $my_post = array(
			  'ID'           => $lead->ID,
			  'post_title'   => $lead->post_title,
			 // 'post_content' => 'This is the updated content.',
		  );

		  
		    add_post_meta($lead->ID , 'showed_up', 'No' );
		// Update the post into the database
		  wp_update_post( $my_post );
		
		set_post_type( $lead->ID , 'event_guests' );
		wp_publish_post( $lead->ID ); 
	
		
	}	
	$sort_folks = get_posts( array (  
		
	  'post_type' => 'event_guests',
	
	)     );

	foreach( $sort_folks as $lead ){
	
		if(get_field('event_registered' , $lead->ID ) ){  //echo "HERE";
			
			$RegisteredID = get_field('event_registered' , $lead->ID );
			
			if(!is_category($EventName)){
				
					$my_cat = array('cat_name' => $EventName, 'category_description' => '', 'category_nicename' => $EventID, 'category_parent' => '');

				// Create the category 
				$my_cat_id = wp_insert_category($my_cat);
			}
			
			

			$catID = 'event' . get_the_ID();
			$category =  get_the_category($catID);
			$cats = array();
			
			array_push($cats, $catID);
			
			//echo "<br>HERE-->" . $EventName . "-- " . $EventID . "-- " . $catID;
			
			//print_r($cats);
			wp_set_post_categories( $lead->ID ,$cats , 1 ); 
		}
	}


				$guests = get_posts( array (
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'event_guests',
						'category_name'                  => 'event' . get_the_ID() ,
					    'order'                  => 'desc',
						
						'post_status' => array('publish', 'pending'), 
				//				'orderby'                => 'meta_value_num',
			//	'meta_key'               => 'RATINGS_SCORE',
						//'categories'	=>	array( -147 ),
					)     );
					
		$hosts = get_posts( array (
			
		   'posts_per_page'         =>  -1,
		   'post_type' => 'event_guests',
			'category_name'                  => 'event' . get_the_ID() ,
			//'post_status'                => 'draft',
			'order' => 'desc',
			//'offset' => 2
				'orderby'                => 'meta_value_num',
				'meta_key'               => 'RATINGS_SCORE',
			//'categories'	=>	array( -147 ),
		)     );
		
		$num_showed = 0;
		$num_hosts =  0;
		
		foreach( $hosts as $lead ){
						if( get_field( 'event_host' , $lead->ID ) == 'No' ){ 
							continue;	
						}
						$num_hosts++;
		}
		foreach( $hosts as $lead ){
						if( get_field( 'showed_up' , $lead->ID ) == 'No' ){ 
							continue;	
						}
						//update_post_meta(  $lead->ID  , 'showed_up' , 'No' ) ;
						$num_showed++;
		}
		$num_guests = count($guests);
		
		$updateID = get_the_ID();
		$num_vips = $num_guests - $num_hosts;
		
		if($num_vips > 5 ) $num_vips = 5;
	
		update_post_meta($updateID , 'event_hosts', $num_hosts );
		update_post_meta($updateID , 'event_rsvps', $num_guests );
		update_post_meta($updateID , 'event_vips', $num_vips );
		update_post_meta($updateID , 'event_showed', $num_showed );
		
?>

<?php
get_header('members'); ?>



		<div class='col-xs-12 text-center'>

	
				
				
				<div class='col-md-4  hidden text-center'>
				
					<?php  //get_template_part('content' , 'party-requests');  
					?> 

					<a target='_blank' href='/request-anything' class='btn btn-success btn-block btn-lg hidden1'>Request Anything >></a>
					<div class='clearfix'></div><hr>
				</div>
				
				
				
				<div class='col-xs-10 col-xs-offset-1 text-center hidden1'>		
					<img src='<?php echo get_field( 'event_flyer' ); ?>' class='img-responsive1'>	
					
				</div>	
				<div class='clearfix'></div>

							
						
				
				
		</div>
				
				
				<div class='clearfix'></div>
				
				

	
	
	
				<?php 
				$args = array( 'post_type' => 'ssi_events' , 'posts_per_page' => 1 , 'order' => 'ASC' );
				$leads = get_posts( $args );

				$t_id = 0;
				
				$leads = array_shift($leads);

				foreach( $leads as $lead ){

			

			$s_date = date('Y-m-d', strtotime(  get_field( 'lead_start_date', $lead->ID ) ) );
			
			if( get_field( 'lead_start_date', $lead->ID ) != "" ){

				$e_date = get_field( 'lead_end_date', $lead->ID );
				$e_date = date('Y-m-d', strtotime(  $e_date ) );

			}else{
				
				$e_date = date('Y-m-d', strtotime(  current_time( 'mysql' ) ) );
				
			}

			$c_date = date('Y-m-d', strtotime(  current_time( 'mysql' ) ) );

			//echo "<br> SD==>" . $s_date . "<br> ED==>" . $e_date . "<br> CD==>" . $c_date;

			
			if(  ( strtotime( $c_date ) <= strtotime( $e_date ) ) &&  ( strtotime( $c_date ) >= strtotime( $s_date ) )   ){
				//echo "<br>BEFORE<br>";

				
				$t_id = $lead->ID;

				//echo "<div class='col-md-6'>" . $lead->post_title . "</div>";
				//echo "<div class='col-md-6'>Since " . get_field( 'lead_start_date', $lead->ID ) . '</div>';
 				//break;
			}else{
				//echo "<br>AFTER<br>";
			}
		
		}
	?>
					<div class='clearfix'></div>
					
					<!-- - RSVP for Our Next Party - July 27th - -->

					<div class='clearfix'></div>
					
					
						
	
	
		
		
		
				<div class='clearfix '></div>
				<div class=' col-md-8 col-md-offset-2 text-center '>
			
				<?php 
				
				$cancelled = "";
				if( get_field("event_cancelled", $lead->ID ) == "Yes" )  { $cancelled = true; }else{ $cancelled = false; }
				
				 ?>
			<div class='clear'></div>
			<?php if( $cancelled )  { echo "<div class='alert-danger h2'> Event CANCELLED!! </div>"; }?>
			<div class='clearfix mb-5'></div>
		 <h3 class="entry-title1 " style="<?php if( $cancelled )  { echo 'text-decoration: line-through'; } ?>;"><?php 
		 
		 
		 the_title();
		 
		 ?></h3>
		 
				<div class='clearfix mb-10'></div><div class='clearfix mb-10'></div>
				<?php 
		
					//echo date("m-d-y");
					
					date_default_timezone_set("America/New_York");
					$t=time();
                    //echo($t . "<br>");
                    $final_time = date("Y-m-d g:ia",$t);
                    
                   // echo "<br>";
                    
                    $final_start =  date("Y-m-d g:ia", strtotime(get_field('event_date') . " " . get_field( 'event_start' )));
                   // echo "<br>";
                    $end_time = date("Y-m-d", strtotime(get_field('event_date') + "1 day"));
                     
                    $final_end = date("Y-m-d g:ia", strtotime($end_time . " " . get_field( 'event_end' )));
                    
					if( strtotime($final_time) >= strtotime($final_start) && strtotime($final_time) <= strtotime($final_end)  ){
							
				//			echo 'HERE';
							echo get_field( 'close_countdown' ); 
					}else{
					    
				//	    echo "No Party";
						echo get_field( 'event_countdown' ); 
					}
				
				?>
		
	
					<div class=' well yellow '>
					
			
					
			<div class='col-sm-4'>
			<?php the_post_thumbnail('medium', array('alt' => get_the_title(), 'title' => '')); ?>
		
	           </div>
		<div class="col-sm-8 " >
			<div class='col-sm-6 h4'>
				<h2><u>Date</u></h2><br>
				<span style="<?php if( $cancelled )  { echo 'text-decoration: line-through'; } ?>;">
				  <?php date_default_timezone_set("America/New_York"); 

					echo date("M jS", strtotime(get_field('event_date')));
					?>  
				</span>
				
					
												
			</div>
			<div class='col-sm-6 ' >
				<h2><u>Time</u></h2><br>
                <span style="<?php if( $cancelled )  { echo 'text-decoration: line-through'; } ?>;">
				<?php echo get_field( 'event_time' ); ?>
				</span>
				
			</div>
			<div class='clearfix '></div><br><br>
				
				<h3><u>Location</u></h3>
                
				<?php 
					if( 1 /*get_user_meta( $current_user->ID , 'show_location' ,  1) == 'true' */){
						?>
						<?php  ?>
						<h5 style="<?php if( $cancelled )  { echo 'text-decoration: line-through'; } ?>;">
						<?php 
							echo get_field( 'event_location' ); 
							//echo get_field( 'event_address' );
						?>
						</h5>
						
						<br>
						<div class='clear'></div>
				<?php $rsvps = get_field( 'event_rsvps' ); 
						$max_guests = get_field( 'event_max_guests' );
						$seats = $max_guests - $rsvps;
					
					?>
					<small>( <u><?php echo $seats; ?></u> Slots Left ) </small><br>
					
						
						
						<div class='clearfix'></div><br>
		</div>
		<div class='clearfix '></div><br>
		<?php $user = wp_get_current_user(); ?>
			
<?php

	
	$event_rsvps = get_field('event_rsvps');
	//echo "RSVPS" . $event_rsvps;
	$max_guests = get_field('event_max_guests');
	//echo "MAX" . $max_guests;
 if( $event_rsvps < $max_guests ){ ?>		
	<div id="Verify" style="display: block;">		

		<button id="Verify" class="pulse btn btn-success btn-block btn-lg hidden"><br>> RSVP NOW <<br><br></button>	
			  <button type="button" class="pulse btn btn-success btn-block btn-lg" id="myBtn2" data-toggle="modal" data-target="#myModal2-rsvp" data-show="true"><br>> RSVP NOW <<br><br></button>

	</div>			
<?php }else{ ?>
		<h3 class="alert-danger">This Event had <u><?php echo $max_guests; ?></u> Slots!</h3>
		<br>
		
		<div id="Verify" style="display: block;">		

		<button id="Verify" class="btn btn-danger btn-lg">> Join the Overflow <</button>	<br>
			
		
	</div>	
<?php } ?>		
		
			  
  <button type="button" class="btn btn-danger btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-<?php echo $count; ?>" data-show="true">Modal (data-show="true")</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal2-rsvp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><center>Confirm - Basic Stats</center></h3>
        </div>
        <div class="modal-body">
          	<div id="Verify" class="  " style="display:block;">
		<div class="well mb-0">
				
		<form method='get'>
				
			
			<div class='clearfix'></div>
			
				<div class=' col-sm-6'>
				Age:
			</div>
			<div class=' col-sm-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_user_meta(  $current_user->ID, 'MX_user_age', 1); ?>' required>
			</div>
			<div class=' col-sm-6'>
				Height:
			</div>
			<div class=' col-sm-6'>
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
			<div class=' col-sm-6'>
				Weight:
			</div>
			<div class=' col-sm-6'>
				<input type='text' name='MX_user_weight' value='<?php echo get_user_meta($current_user->ID, 'MX_user_weight', 1); ?>' required>
			</div>	
			
			<div class=' col-sm-6'>
				Position:
			</div>
			<div class=' col-sm-6'>
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
			<div class=' col-sm-6'>
				Dick Size:
			</div>
			<div class=' col-sm-6'>
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
											
			<div class=' col-sm-6'>
				Cut / Uncut:
			</div>
			<div class=' col-sm-6'>
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
			<h4><center>Contact Info</center></h4><hr>	
				<div class=' col-sm-6'>
				Name / Alias: *
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='username' type='text' value='<?php echo $current_user->display_name; ?>' required>
			</div>
			<div class=' col-sm-6'>
				Phone#:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_phone' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_phone', "user_" . $current_user->ID); ?>' >
			</div>
			<div class=' col-sm-6'>
				Email: *
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_email' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_email', "user_" . $current_user->ID); ?>' required>
			</div>
			<div class=' col-sm-6'>
				City:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_city' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $current_user->ID); ?>' >
			</div>
			<div class=' col-sm-6'>
				State:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_state' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_state', "user_" . $current_user->ID); ?>' >
			</div>
			<div class='clearfix'></div><hr>
			
			<div class="event-info h4 hidden">
					<div class='clearfix'></div><br>
						<div class="col-sm-6">
							<b>Are you Hosting?</b>
						</div>
						<div class="col-sm-6">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<div id="Verify" class="  " style="display:none;">
		<div class="well">
				
		<form method='get'>
				
			
			<div class='clearfix'></div>
			
			
			<h3><center>Confirm - Basic Stats</center></h3><hr>	
				<div class=' col-sm-6'>
				Age:
			</div>
			<div class=' col-sm-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_user_meta(  $current_user->ID, 'MX_user_age', 1); ?>' required>
			</div>
			<div class=' col-sm-6'>
				Height:
			</div>
			<div class=' col-sm-6'>
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
			<div class=' col-sm-6'>
				Weight:
			</div>
			<div class=' col-sm-6'>
				<input type='text' name='MX_user_weight' value='<?php echo get_user_meta($current_user->ID, 'MX_user_weight', 1); ?>' required>
			</div>	
			
			<div class=' col-sm-6'>
				Position:
			</div>
			<div class=' col-sm-6'>
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
			<div class=' col-sm-6'>
				Endowment:
			</div>
			<div class=' col-sm-6'>
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
											
			<div class=' col-sm-6'>
				Cut / Uncut:
			</div>
			<div class=' col-sm-6'>
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
				<div class=' col-sm-6'>
				Name / Alias: *
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='username' type='text' value='<?php echo $current_user->display_name; ?>' required>
			</div>
			<div class=' col-sm-6'>
				Phone#:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_phone' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_phone', "user_" . $current_user->ID); ?>' >
			</div>
			<div class=' col-sm-6'>
				Email: *
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_email' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_email', "user_" . $current_user->ID); ?>' required>
			</div>
			<div class=' col-sm-6'>
				City:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_city' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $current_user->ID); ?>' >
			</div>
			<div class=' col-sm-6'>
				State:
			</div>
			<div class=' col-sm-6'>
				 
				 <input name='MX_user_state' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_state', "user_" . $current_user->ID); ?>' >
			</div>
			<div class='clearfix'></div><hr>
			
			<div class="event-info h4 hidden">
					<div class='clearfix'></div><br>
						<div class="col-sm-6">
							<b>Are you Hosting?</b>
						</div>
						<div class="col-sm-6">
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
						
						
						<?php
					}else{
						?>
						<br>
						<button id="address" class="btn btn-default">Show Location</button>
						<?php
						
					}
				?>
		
		
		<div id="address" class="col-xs-12  " style="display:none;">
		<div class="well">
				
		<form method='get'>
				<h4><center>For FULL Location</center></h4>
			<h3><center>Enter Your Phone#:</center></h3><hr>	
				
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
	 
			

		</div>
		</div>

	
	<div class='clearfix '></div>
	
		<div class='col-sm-8 col-sm-offset-2'>
	
	
	
		<div class='text-center border flyer flyer-bg well '>
		
	
		
		
		<div class='clear '></div>
		
		
	<!--	
		
		<h3>PAY $<?php echo get_field( 'event_price' ); ?> Online!<br><small>($10 at the DOOR)</small></h3><br>
	
		<?php  echo do_shortcode('[stripe name="stripe Payment" description="PhillyRSVP" amount="500"]'); ?><br>
	
	<?php the_content(); ?>
	
	-->



		<div class='clear'></div>
				<?php echo get_field( 'event_details' , $lead->ID); ?>
				
				
				<div class='clear'></div>



	<div class='col-sm-12 hidden1 text-center'>
		
		<center>
			
	
			<br>

			<h3>PAY $5 Online!<br><small>($10 at the DOOR)</small></h3>
			<br>
			<?php  //echo do_shortcode('[stripe name="stripe Payment" description="PhillyRSVP" amount="500"]'); ?>
			<!--
			<br>
			or<br><br>
			<a target='_blank' class='btn btn-success'  href='http://cash.me/$ShamanShawn'> $CashAPP </a>
			-->
			</center>
	</div>
	
<div class='clearfix'></div><hr>

	
				
<!--<br><br>-->
<!---- Dress Code --<br><br>-->

<!--Sexy underwear / or / No Underwear<br><br>-->

<!--Sexy Top / or / No Top<br><br>-->

<!--Sexy Socks / or / No Socks<br><br>				-->
			
<!--		<br><br>	-->
		

	
	<div class="clearfix"></div>
	<br><br>	
		
		<div class='text-left col-md-12 mansion well'>
	
		<h2 style='margin=0;' class='text-center '>The GUEST List</h2><hr>
		
			<?php

					//print_r( $folks );
					// Start the loop.
					$count = 1;
					
					//$folks = (array)$query;
					
					?>
						<!-- <center>The Host's</center><hr> -->
							<?php 
							
		foreach( $hosts as $lead ){
			if( get_field( 'event_host' , $lead->ID ) == 'No' ){ 
				continue;	
			}
			
			?>
			<div class='col-md-6'>
							<?php 
							
							echo ($count) . ". ";
								$count++;
							?>
							<a target='_blank' href='/event_guests/?ID=<?php echo $lead->ID; ?>'>
								<h4><?php echo $lead->post_title;  ?></h4>
							</a>
								<br><hr>
								<form>
								Bag # <input type='text' name='assigned_bag' value="<?php echo get_field( 'assigned_bag' , $lead->ID ); ?>">
								<input name="assigned_bag" type="hidden" value="true" />
								<input type='submit' name='Update' >
								</form>
				<?php 
				
				$user_logged_in = 0;
				$user_is_admin = 0;
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
	
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					$user_logged_in = 1;
					$user_is_admin = 1;
					?>
					<br>
		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>

		<a target='_blank' href='/wp-admin/post.php?post=<?php echo $lead->ID ; ?>&action=edit' class='btn btn-default pull-left'>Edit Lead</a>
		
			<?php } ?>
							
							
			</div>
			<div class='col-md-6 pull-right text-right'>
						
						<?php 
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
		
	
			if( get_field( 'event_time_in' , $lead->ID )  ){ 
					//echo "<span class='num text-center here'>HERE@ </span>";
						//echo get_field( 'event_time_in' , $lead->ID );
				}else{
					
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					<a href='?update=1&here=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>Here Now!</a>
				<?php
					}
					
				}

					?>

					
	<?php if( get_field( 'event_time_out' , $lead->ID ) ){

			?>
				/ Left@
				<?php
				echo get_field( 'event_time_out' , $lead->ID );  
					
			}else{
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					/ <a href='?update=1&left=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>Left Out!</a>
					<?php 
					
					}	
				
			}
					?>
					<br>
					
					<?php echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );	?>
		</div>
					
					<div class='clearfix'></div><hr>
				<?php
					}
						?>
						<center>Top 5 RSVP's</center><hr>
							<?php
					$count = 1;
					foreach( $guests as $lead ){
						
							if( get_field( 'event_host' , $lead->ID ) == 'Yes' ){ 
							continue;	
						}
						
						
						?>
						<div class='col-md-6 green well'>
							
							<?php 
			
				$MX_user_id = 0;
        		$MX_user_id = get_field( 'user_ID', $lead->ID );
        		if( get_field( 'MX_user_id', $lead->ID ) ){ $MX_user_id = get_field( 'MX_user_id', $lead->ID ); }
        		
			
			$guestID = $MX_user_id; ?>
							 	
								<h4 class="pull-left">
								    
								<?php
								
								echo get_avatar($guestID, 50);
								
								echo " &nbsp; ";
									echo ($count) . ". ";
									$count++; ?>
								<a target='_blank' href='/event_guests/<?php echo $lead->post_name; ?>/?eventID=<?php echo get_the_ID(); ?>'>
								<?php echo $lead->post_title;  ?>
								</a> | 
									<?php 
			
					echo get_field( 'MX_user_age', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_height_ft', $lead->ID ); echo "' ";
					echo get_field( 'MX_user_height_in', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_weight', $lead->ID ); echo " | ";
				
				if(get_field( 'MX_user_position', $lead->ID ) != "" ){
					echo "<small>" . get_field( 'MX_user_position', $lead->ID ) . "</small>";
				}else{
					
					echo " -- ";
				}
				//	echo get_field( 'MX_user_endowment', $guestID ); echo "in<br>";	
					
					?>
								</h4>
								 
							
							
								
								<div class='clearfix mb-0'></div>
								
				<?php 
				
				$user_logged_in = 0;
				$user_is_admin = 0;
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
		

					
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					$user_logged_in = 1;
					$user_is_admin = 1;
					?>
					
					
					
				<div class='clearfix'></div>	<hr>
					
					
								
						<form method='get'>
							<label>Bag # <input type='text' name='assigned_bag' value='<?php echo get_field( 'assigned_bag' , $lead->ID ); ?>'>
							</label>
							<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
							<input name="alias" type="hidden" value="<?php echo $lead->post_title;  ?>" />
							
							<input name="update_bag" type="hidden" value="true" />
							<input type='submit' name='update' value='Update' >
						</form>
								
								
					<br>
		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>

		<a target='_blank' href='/wp-admin/post.php?post=<?php echo $lead->ID ; ?>&action=edit' class='btn btn-default pull-left'>Edit Lead</a>
		
			<?php } ?>
			
			
						</div>
						<div class='well yellow col-md-6 pull-right text-right'>
						
						
						
						<a target='_blank' href='/event_guests/<?php echo $lead->post_name; ?>/?eventID=<?php echo get_the_ID(); ?>' class='btn btn-success pull-right'>Confirm</a>
						
				        <div class='clearfix'></div><hr>
						<?php 
						
					
						
						
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');

							
				
			
			if( get_field( 'event_time_in' , $lead->ID )  ){ 
					echo "<span class='num text-center here'>HERE@ </span>";
						echo get_field( 'event_time_in' , $lead->ID );
				}else{
					
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					<a href='?update=1&here=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>&alias=<?php echo $lead->post_title; ?>' class='btn- btn-default'>Here Now!</a>
				<?php
					}
				
					
				}
						
				
				
					
					?>
					
					
					
	<?php if( get_field( 'event_time_out' , $lead->ID ) ){


			?>
				/ Left@
				<?php
				
				echo get_field( 'event_time_out' , $lead->ID );  
					
			}else{
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					/ <a href='?update=1&left=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>Left Out!</a>
					<?php 
					
					}	
				
			}
					
					
					
					?>
					
						 | 
					
					<?php echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );	?>
						</div>
						<div class='clearfix'></div><hr>
						
								
		
		<div class='video-set1 well yellow flyer flyer-bg hidden'>
		
		
			
			
			
			
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
					<div class='clearfix'></div>
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
			
		</a>
		
		
		<div class='clearfix'></div><br>
		
		
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
	
		
		if( $MX_user_id >= 1 ){

			?>
			
					<a target="_blank" href='/user-profile/?ID=<?php echo $MX_user_id; ?>' class='btn btn-primary btn-block'>View Profile >></a>

			<?php

		}else{
			
			
			?>
			
					<a target="_blank" href='/claim/?claimID=<?php echo $lead->ID; ?>' class='btn btn-default btn-block'>Claim Profile >></a>

			<?php

		} ?>
		<div class='clearfix'></div><br>
<div class='event-rating'>
					<?php
					
					
					//echo do_shortcode('[rating-system-posts id='. $lead->ID . ']');
	                  // echo get_the_content(null ,null ,$lead->ID);
                     echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
	               
	                
	                
	                
					$likes = $dislike = 0; 

					$likes =  get_post_meta($lead->ID,'vortex_system_likes',true);
					$dislikes =  get_post_meta($lead->ID,'vortex_system_dislikes',true);

				
				?>
		
	</div>			

		

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
						
						
						
						
						
						
						
						
						
						<?php if($count == 6){ ?>
						
						<center>The RSVP's</center>
					
						<div class='clearfix'></div><hr>
					<?php } } ?>
		
			<?php
					$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
		
			if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
				?>
				
				<form method='get'>
					<input name='alias' type='text' placeholder='Alias'>
					<input name='time' type='hidden' value='<?php echo date("g:i A"); ?>'>
					<input name='mystery' type='hidden' value='true'>
					<input name='update' type='hidden' value='true'>
					<input type='submit' value='Add Guest'>
				</form>
				<br>
					<a href='?update=1&mystery=1&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>(+) Mystery Man</a>
					<br>
					
				<?php
			}
				?>
		
			
	</div>
		<div class='clearfix'></div><br>
		
		
		
		
		
		
			<div class='clear'></div>
		
		<?php $user = wp_get_current_user(); ?>
			
		<hr>
				
<?php
	$max_guests = get_field('event_max_guests');
 if( $count <= $max_guests ){ ?>		
	<div id="Verify" style="display: block;">		

		<button id="Verify" class="btn btn-success btn-block btn-lg hidden"><br>I AM Going! >><br><br></button>
		
					  <button type="button" class="pulse btn btn-success btn-block btn-lg" id="myBtn2" data-toggle="modal" data-target="#myModal2-rsvp" data-show="true"><br>I AM Going! >><br><br></button>
<br>
			
		<a href='/events' class='btn btn-danger btn-block btn-lg'><< Im NOT Going</a>	<br>
	</div>			
<?php }else{ ?>
		<h3 class="alert-danger">This Event had <u><?php echo $max_guests; ?></u> Slots!</h3>
		<br>
		
		<div id="Verify" style="display: block;">		

		<button id="Verify" class="btn btn-danger btn-lg">> Join the Overflow List <</button>	<br>
			
		
	</div>	
<?php } ?>	
			
		
			
	<div id="Verify" class="  " style="display:none;">
		<div class="well report">
				
		<form method='get'>
		
		
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
				
			<h3><center>Confirm - Contact Info</center></h3><hr>	
			<div class=' col-xs-6'>
				Code Name:*
			</div>
			<div class=' col-xs-6'>
				 
				 <input name='username' type='text' value='<?php echo $current_user->display_name; ?>' required>
			</div>
			<div class='clear'></div><hr>
			
			<div class=' col-xs-6 hidden'>
				Phone#:
			</div>
			<div class=' col-xs-6 hidden'>
				 
				 <input name='MX_user_phone' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_phone', "user_" . $current_user->ID); ?>' >
			</div>
			
			
			<div class=' col-xs-6 hidden1'>
				Email:*
			</div>
			<div class=' col-xs-6 hidden1'>
				 
				 <input name='MX_user_email' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_email', "user_" . $current_user->ID); ?>' required>
			</div>
			<div class='clear'></div><hr>
			
			<div class=' col-xs-6 hidden1'>
				City:
			</div>
			<div class=' col-xs-6 hidden1'>
				 
				 <input name='MX_user_city' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $current_user->ID); ?>' >
			</div>
			<div class='clear'></div><hr>
			
			<div class=' col-xs-6 hidden1'>
				State:
			</div>
			<div class=' col-xs-6 hidden1'>
				 
				 <input name='MX_user_state' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_state', "user_" . $current_user->ID); ?>' >
			</div>
			<div class='clear'></div><hr>
			
<?php if( in_category('cashapp') ) { ?>			
			
		
			<div class=' col-xs-6 hidden1'>
				CashAPP Name:*
			</div>
			<div class=' col-xs-6 hidden1'>
				 
				 <input name='MX_user_cashapp' type='text' value='<?php	echo get_user_meta($current_user->ID, 'MX_user_cashapp', "user_" . $current_user->ID); ?>' placeholder='$CashName' required >
			</div>
			<div class='clear'></div><hr>
<?php } ?>				
					* Required
			
			<div class="event-info h4 text-left">
					<div class='clear'></div><br>
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
<?php if( !in_category('cashapp') ) { ?>			
			
		
			<div class='clear'></div><hr>
			<p>NOTICE - Only RSVP if you Plan to SHOW UP!</p>
			<div class='clear'></div><hr>
<?php } ?>	
						
			
			<div class='clear'></div><hr>
			
					
					<input name='userID' type='hidden' value='<?php echo $current_user->ID; ?>'>
					<input name='time' type='hidden' value='<?php echo date("g:i A"); ?>'>
					<input name='mystery' type='hidden' value='true'>
					<input name='update' type='hidden' value='true'>
					<input type='submit' value='CONFIRM' class='btn btn-success btn-block btn-lg'>
					

		
		</form>
			<br>
			
		<a href='/events' class='btn btn-danger btn-block btn-lg'><< Im NOT Going</a>	
			<br>
				
		</div>
			
	</div>		
			<div class='clear'></div>
				
			<br>
									
									
									
									
									

</div></div></div>



<div class='clearfix'></div><br>

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
						
						'category_name' => 'event' . get_the_ID() ,
					      'order'                  => 'desc',
								'orderby'                => 'meta_value_num',
				'meta_key'               => 'RATINGS_SCORE',
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
				
							<div class='col-sm-4 text-center hidden1'>
		<?php 		
		
			
			echo "<span class='num'>" . ($count+1) . "</span>";	

									$count++;
						
				?>
		<br><br>
		
		
		<div class='video-set1 well flyer flyer-bg'>
		
		
			
			
			<?php 
			
				$MX_user_id = 0;
        		$MX_user_id = get_field( 'user_ID', $lead->ID );
        		if( get_field( 'MX_user_id', $lead->ID ) ){ $MX_user_id = get_field( 'MX_user_id', $lead->ID ); }
        		
			
			$guestID = $MX_user_id; ?>
			
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
					<div class='clearfix'></div>
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
			
		</a>
		
		
		<div class='clearfix'></div><br>
		
		
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
	
		
		if( $MX_user_id >= 1 ){

			?>
			
					<a target="_blank" href='/user-profile/?ID=<?php echo $MX_user_id; ?>' class='btn btn-primary btn-block'>View Profile >></a>

			<?php

		}else{
			
			
			?>
			
					<a target="_blank" href='/claim/?claimID=<?php echo $lead->ID; ?>' class='btn btn-default btn-block'>Claim Profile >></a>

			<?php

		} ?>
		<div class='clearfix'></div><br>
<div class='event-rating'>
					<?php
					
					
					//echo do_shortcode('[rating-system-posts id='. $lead->ID . ']');
	                  // echo get_the_content(null ,null ,$lead->ID);
                     echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
	               
	                
	                
	                
					$likes = $dislike = 0; 

					$likes =  get_post_meta($lead->ID,'vortex_system_likes',true);
					$dislikes =  get_post_meta($lead->ID,'vortex_system_dislikes',true);

				
				?>
		
	</div>			

		

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

<div class='clearfix'></div><hr>


					
		<?php 
			global $post;

		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		?>
		
		
		<div class="admin well">
				<br><center>
				<a href='/admin-modified' class='btn'><< Admin</a>
				<a href='?update_post=1' class='btn'>Update Post</a>
				<a href='?make_draft=1' class='btn'>Delete</a>
				</center>
		
		
					
				<div class='clearfix'></div>	
		</div>
			
			
	<?php }
			
		?>
		<div class="well yellow text-center">
		
			<h2>Party Stats</h2>
			
			<div class='h2 current-party'>
			 
				<div class='clear'></div>
				<div class='col-xs-4'>
					<?php the_field('event_hosts'); ?>
				</div>
				<div class='col-xs-8 text-left'>
					Hosts
				</div>
				<div class='clear'></div>
				<div class='col-xs-4'>
					<?php the_field('event_rsvps'); ?>
				</div>
				<div class='col-xs-8 text-left'>
					RSVPs
				</div>
				<div class='clear'></div>
				<div class='col-xs-4'>
					<?php the_field('event_vips'); ?>
				</div>
				<div class='col-xs-8 text-left'>
					VIPs
				</div>
				<div class='clear'></div>
				<div class='col-xs-4'>
					<?php the_field('event_showed'); ?>
				</div>
				<div class='col-xs-8 text-left'>
					Showed Up
				</div>
				<div class='clear'></div>
			
				
				
				<div class='clear'></div>
			</div>	
			
		
		</div>

	<div class='clearfix'></div>
		<p class='text-center'>Updated: <?php the_modified_date(); ?></p>

<div class='clearfix'></div>
	<div class='container-fluid'>
		<?php //get_template_part('content', 'welcome-rsvp'); 
		
		?>
	</div>
<div class='clearfix'></div><br>


<?php get_footer('members'); ?>
