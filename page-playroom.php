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
 
 
 *HEX

#26A406

RGB

38, 164, 6

CMYK

77, 0, 96, 36

HEX

#0626A4

RGB

6, 38, 164

CMYK

96, 77, 0, 36

HEX

#A40626

RGB

164, 6, 38

CMYK

0, 96, 77, 36


 */

 
 if( is_user_logged_in()  ){ 
			
				
				$user = wp_get_current_user(); 
				//print_r($user); 
				//$user = $user[0];
				$userid = $user->ID;
				$current_user = get_userdata( $userid );
	}
 
 if( $_POST['edit_profile'] ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			//update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val , "user_" . $current_user->ID );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		echo "<h1 class='text-center'> PROFILE UPDATED!! </h1>";
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
		//wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
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
	
	

 
get_header('fans'); 

$requests = get_posts(array( 'post_type' => 'ssi_requests' , 'post_status' => array('draft' , 'pending', 'publish') , 'posts_per_page' => -1 ));
	
	$cats = array( get_cat_ID('current-event') /*, get_cat_ID('playroom')*/ );
	$events = get_posts(array("post_type" => "ssi_events", "category" =>  121, "posts_per_page" => 1, "order" => "desc" ));
	
	$event = $events[0];
	//print_r( $events );

?>
<style>
.cashapp.img-thumbnail {
    background: url("http://dlfreakfest.org/wp-content/themes/ssi2017/images/icons/icon-cashapp.png");
    background-size: 50px;
    color: #1f73c9;
    font-size: 22px;
    /* text-shadow: -2px -2px 0px #ee0000; */
    background-position: center;
    padding-top: 7px;
	 padding: 1.5em 2em;
	
}
.well{
	max-width: 100%;
}
.well.mb-5 {
    background: #26a406;
}
.mb-5 {
    margin: 5px 0 !important;
}
.well.login {
		    min-height: 20px;
		    /* padding: 19px; */
		    margin-top: 0;
		    padding: 1.5em 1.5em 1em;
		    margin-bottom: 20px;
		    background-color: #f5f5f5;
		    border: 1px solid #e3e3e3;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		}
		.well.login .or {
		    background: #7984a4;
		    padding: 1em;
		    text-transform: uppercase;
		    color: #fff;
		    margin: 1.7em 0;
		}

		.well.yellow.login {
		    background-color: #a8acb7 !important;
		}
		#wpmem_reg legend, #wpmem_login legend {
		    font-size: 24px;
		    line-height: 1.7em;
		    font-weight: 700;
		    margin-bottom: 10px;
		    width: 100%;
		    color: #788093; 
		}

</style>








<div class="profile-menu container-fluid text-center hidden">
	<div class="col-xs-4 col-sm-3">
		<a target="_blank" href="/cashappkings">
			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			<br>
			Home
		</a>
	</div>
	<div class="col-md-3 col-xs-4 hidden-sm">
		
		<a target="_blank" href="/user-profile">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			<br>
			Profile
		</a>
		

	</div>
	<div class=" col-sm-3 hidden-xs">
		<a target="_blank" href="/favorites">
			<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
			<br>
			Favorites
		</a>
		
	</div>
	<div class="col-xs-4 col-sm-3 ">

		<a target="_blank" href="/post">
			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			<br>
			Post
		</a>

		
		
		
	</div>

	<div class="clearfix"></div>
</div>


<div class="clearfix mb-10"></div>


	
	<div class="col-md-6">



			<center>	


			<?php if (!wp_is_mobile()) {
				?>
			
					<div class="img-thumbnail btn-block">
					<?php get_template_part('ad','300-250-1') ?>
					</div>
					<div class='clearfix mb-10'></div>
			
				<?php
			} ?>


		
				

					
				<?php  //get_template_part('content','social-twitter');  
				?>
					
					
	<div class="ads ad-shift img-thumbnail btn-block ">
			<center>
				<div class=" img-thumbnail"><?php the_post_thumbnail( get_the_ID() ); ?></div>
			</center>
		</div>
	


	<div class='clearfix mb-10'></div>

	<?php

		//echo "CNT: " . print_r($events);
		if( count($events) > 0 ) { ?>
			<div class="well yellow stats text-center mb-5">
				<?php 
					//echo $event->post_title; 
				?>
				<h1>North PHILLY Playroom</h1><br>
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
		
		

	
	


</div><!-- .content-area -->

	


	
		<div class=' col-md-6 '>
		
		<div class='well  text-center  yellow login mb-10'>
		
		
		<?php if( is_user_logged_in() ){ ?>




			<?php 
			/* get_template_part('content','kings');*/


				$fansKEY = 'MX_user_onlyfans';
				$fans_slug = 'onlyfans';
				$fans_link = '//onlyfans.com/';
				$fans_name = "Add Username";

				if( get_user_meta($current_user->ID, $fansKEY , 1)){ $fans_name = get_user_meta($current_user->ID, $fansKEY , 1); }

				$cashKEY = 'MX_user_cashapp';
				$cash_slug = 'cashapp';
				$cash_link = '//cash.app/';
				$cash_name = "Add Username";

				if( get_user_meta($current_user->ID, $cashKEY , 1)){ $cash_name = get_user_meta($current_user->ID, $cashKEY , 1); }


				$metaKEY = 'MX_user_twitter';
				$post_slug = 'twitter';
				$website_link = '//twitter.com/';


				$tumblr_name = "Add Username";

				if( get_user_meta($current_user->ID, $metaKEY , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				if( get_user_meta($current_user->ID, $post_slug . "_link" , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				
				
				if( get_user_meta($current_user->ID, $metaKEY , 1)
					|| get_user_meta($current_user->ID, $post_slug . "_link"  , 1)
				
				 ){  
				 
				 // echo $tumblr_name; 
				$tumblr_name =  str_replace(".","",$tumblr_name);
				 $tumblr_name =  str_replace("tumblr","",$tumblr_name);
				 $tumblr_name =  str_replace("com","",$tumblr_name);


				}

			  ?>



			<h3> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h3><br>

			<div class='clearfix'></div>

			
		 
		
		<div class='well yellow mb-10'>
		<div class='col-md-6 text-center '>
		
			
			
			<div class="mb-0 porn well">
									<center>
								
								
								<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
								
								<?php
								
									echo get_avatar($current_user->ID, 150);

								//	print_r($user);
								
					
									?>
									<br>edit photo
									</a>
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
								<a href='/kik-edit/' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-md-6 text-center'>
			
			
			
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
				Ht:
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
				Wt:
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


			<div class="btn-group btn-group-justified text-center ">
				<div class='clearfix'></div><hr class=' mb-10'>
				<center>
					<a href="/edit/" class="btn btn-default">Edit Profile</a>
					<a  href="/profile/" class="btn btn-info">View Profile</a>
				</center>
		
			</div>

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
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden'>> All Members <</a>
		
	</div>

	


				<?php //get_template_part( 'content' , 'footer-stats' ); 
				?>
				
				
				
				
<div class='clearfix'></div>	
	
	<div class="stats">
	
	
		<?php $args = array(
						
							//'number' => -1,
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
						$ordered_users =  new WP_User_Query( $args );

						
						$blogusers = $ordered_users->get_results();
						
						$total_results = count($blogusers);
						
				
				
			
			
			$fantasies = get_posts(array(  'post_type' => 'ssi_fantasies' , 'posts_per_page' => -1 , 'post_status' => array('publish') )); 
			$blogs = get_posts(array(  'post_type' => 'post' , 'posts_per_page' => -1 )); 
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'post_status' => array('publish', 'pending') ));
			$pros = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'post_status' => array('publish') , 'category_name' => 'pros' ));
			
			
			$args = array(
	'meta_key' => 'MX_user_tumblr',
	
);

// The Query
$user_query = new WP_User_Query( $args );

// User Loop
if ( ! empty( $user_query->get_results() ) ) {
	foreach ( $user_query->get_results() as $user ) {
		//echo '<p>' . $user->display_name . '</p>';
	}
	
	$walls = $user_query->get_total();
} else {
	echo 'No users found.';
}
			?>
			
			
			<div class="social">
				

				<form method="post">
			
				<div class="col-md-4 mb-10 well">
					OnlyFans <br>
					



						 <a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $fans_slug;  ?>.png' width='65' height='65'>
						 </a>
						 
						 <div class="clearfix mb-5"></div>
							<h5 id='<?php echo $fans_name;  ?>' class='walls'><a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><?php echo $fans_name;  ?></a> </h5>
						 
							<div class="clearfix mb-15"></div>

							<?php if ( !get_user_meta($current_user->ID, $fansKEY , 1) || ( get_user_meta($current_user->ID, $fansKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_onlyfans" placeholder="Username" value="<?php echo $fans_name;  ?>" class="text form-control">
							<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $fans_link;  ?><?php echo $fans_name;  ?>' class='btn btn-block  btn-primary'> Visit Now &raquo; </a>
								<?php
							} ?>

							
						 
						
						
						<div class="clearfix mb-10"></div>
				

				</div>
				<div class="col-md-4 mb-10 well">
					CashAPP <br>
				
					 <a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $cash_slug;  ?>.png' width='65' height='65'>
					 </a>
					 
					 <div class="clearfix mb-5"></div>
						<h5 id='<?php echo $cash_name;  ?>' class='walls'><a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><?php echo $cash_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>


						<?php if ( !get_user_meta($current_user->ID, $cashKEY , 1) || ( get_user_meta($current_user->ID, $cashKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_cashapp" placeholder="Username" value="<?php echo $cash_name;  ?>" class="text form-control">
								<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $cash_link;  ?><?php echo $cash_name;  ?>' class='btn btn-block  btn-success'> Send / Request &raquo; </a>
								<?php
							} ?>

							

						
					 
					
					
					<div class="clearfix mb-10"></div>



				</div>
				<div class="col-md-4 mb-10 well">
					Twitter <br>
				
					 <a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $post_slug;  ?>.png' width='65' height='65'>
					 </a>
						<div class="clearfix mb-5"></div>
						<h5 id='<?php echo $tumblr_name;  ?>' class='walls'><a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><?php echo $tumblr_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>
					 

					 <?php if ( !get_user_meta($current_user->ID, $metaKEY , 1) || ( get_user_meta($current_user->ID, $metaKEY , 1) == "Add Username" ) ) {
						?>
						<input type="text" name="MX_user_twitter" placeholder="Username" value="<?php echo $tumblr_name;  ?>" class="text form-control">
			 			<input type="submit" class="submit btn-block" value="Link Now">
						<?php
					}else{

								?>
								<a target='_blank' href='<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>' class='btn btn-block  btn-primary'> Visit Twitter &raquo; </a>
								<?php
							} ?>

					 	
					
					
					<div class="clearfix mb-10"></div>

					</div>

					




			


		

					<div class='clearfix'></div>
					<input type='hidden' name='edit_profile' value='true'>

				</form>
		
		</div>
		
		
		
		<div class="col-md-12  well yellow text-left mb-10">
									

				Blogs: <a  target='_blank' class='pull-right' href='/blog'>
				<?php	echo "" . $blog_count = count_user_posts( $user->ID  ); ?>
				</a>

				
				<br>G Photos: <a  target='_blank' class='pull-right' href='/gallery'>
				<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'g_galleries'); ?>
				</a>
				<br>X Photos: <a  target='_blank' class='pull-right' href='/photos'>
				<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'ssi_photos'); ?>
				</a>
				<br>Videos: <a  target='_blank' class='pull-right' href='/videos'>
				<?php	echo "" . $video_count = count_user_posts_by_type($user->ID, 'ssi_videos'); ?>
				</a>
<!-- 
				<br>Requests: <a target='_blank' class='pull-right' href='/requests'>	
				<?php	echo " " . $requests_count = count_user_posts_by_type($user->ID, 'ssi_requests'); ?>
				</a>


				<br>Events: <a  target='_blank' class='pull-right' href='/events'>
				<?php	echo "" . $events_count = count_user_posts_by_type($user->ID, 'ssi_events'); ?>
				</a>
				 -->
				
				<br><br>Total Posts: 
				<a  target='_blank' class='pull-right' href='#'>								
				<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
					
					echo "" . $total_count; ?>

					</a>
					
	</div>
	
			
			<?php
				
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$requests = get_posts(array( 'post_type' => 'ssi_requests' , 'post_status' => array('draft' , 'pending', 'publish') , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish', 'pending') , 'category_name' => 'thots' ));
			//$series = get_posts(array(  'category_name' => 'series', 'posts_per_page' => -1 )); 
			
			$series =  get_categories('child_of=226&hide_empty=1');
			
				$page = get_page_by_title( 'Walls' );
			
			$walls = get_post_meta($page->ID, 'tumblr_count', 1 );
		?>
		
		<div class="col-md-4 col-xs-6 mb-10  mb-10 text-center well">
			<a target='black' href='/blog'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($blogs); ?></h3> <h4>Blogs ></h4></figcaption>
			</figure>
			</a>
		</div>
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/wishlist'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($fantasies); ?></h3> <h4>Fantasies ></h4></figcaption>
			</figure>
			</a>
		</div>	
		<div class="col-md-3 col-xs-6 mb-10  mb-10 text-center well hidden">
			<a target='black' href='/models'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($series); ?></h3> <h4>Series ></h4></figcaption>
			</figure>
			</a>
		</div>	
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/walls'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo $walls; ?></h3> <h4>Walls ></h4></figcaption>
			</figure>
			</a>
		</div>
		
		
	
		
		
		<div class=" col-md-4 col-xs-6 mb-10  text-center well">
			<a target='black' href='/photos'>						
			<figure>
				 <img src="/wp-content/uploads/2016/11/14642200_853702041432368_4968411123150703434_n-e1478868844240.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			 
			  <figcaption><h3><?php echo count($photos); ?></h3> <h4>Photos ></h4></figcaption>
			</figure>
			</a>						
		</div>
		<div class="col-md-4 col-xs-6 mb-10  text-center well">
			<a target='black' href='/video-gallery'>						
			<figure>
				 <img src="/wp-content/uploads/2016/11/14642200_853702041432368_4968411123150703434_n-e1478868844240.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			 
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>Videos ></h4></figcaption>
			</figure>
			</a>						
		</div>
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
									
			<a target='black' href='/events'>
			<figure>

			  <img src="/wp-content/uploads/2016/11/man-x-scape-shawn-e1478869098864.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($events); ?></h3> <h4>Events ></h4></figcaption>
			</figure>
			</a>						
		</div>
		

		
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/models'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($models); ?></h3> <h4>Models ></h4></figcaption>
			</figure>
			</a>
		</div>	
		
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/thots'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($thots); ?></h3> <h4>THOTs ></h4></figcaption>
			</figure>
			</a>
		</div>

		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/pros'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($pros); ?></h3> <h4>PROs ></h4></figcaption>
			</figure>
			</a>
		</div>	
			
		
		<div class="col-md-4 col-xs-6 mb-10  text-center well">
			<a target='black' href='/projects'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($projects); ?></h3> <h4>Projects ></h4></figcaption>
			</figure>
			</a>
		</div>	
		
		<div class="col-md-3 col-xs-6 mb-10  text-center well hidden">
			<a target='black' href='/thots'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($thots); ?></h3> <h4>THOTs ></h4></figcaption>
			</figure>
			</a>
		</div>
		
		
		<div class="col-md-4 col-xs-6 mb-10  text-center well">
									
			<a target='black' href='/requests'>
			<figure>
			 
			
			
			  <img src="/wp-content/uploads/2016/11/man-x-scape-shawn-e1478869098864.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo count($requests); ?></h3> <h4>Requests ></h4></figcaption>
			</figure>
			</a>						
		</div>
		
		<div class="col-md-4 col-xs-6 mb-10  text-center well hidden1">
									
			<a target='black' href='/members'>
			<figure>
			  <img src="/wp-content/uploads/2016/11/deep350_350-e1478869245737.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h3><?php echo $total_results; ?></h3><h4>Members ></h4></figcaption>
			</figure>
			</a>
		</div>
					
								
		<div class='clear visible-xs visible-sm'></div>
								
					
					
								
								
	</div><!-- // stats -->
	
<div class='clearfix'></div>

				<div class='clearfix mb-10'></div>
				<?php //get_template_part( 'ad', '300-250-1' ); ?>

				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
		<?php }else{ ?>
	
				<h3>Existing Members Login</h3>
				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
				<div class="or">or</div>

				<h3>Join Now - 100% Free!</h3>
				<?php echo do_shortcode(" [wpmem_form register] "); ?>
				
		<?php } ?>

	


</div>

</div>
	<div class='clearfix'></div><br>
<?php get_footer(); ?>