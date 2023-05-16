<?php 
/**
 * Template Name: Users Profile Page
 */


	
	//if( !is_user_logged_in() ){ $pg = "/login/"; wp_redirect($pg); exit; }


$userid = $_GET['ID'];
$user = get_userdata( $userid );

$current_user = wp_get_current_user();

$Model_ID = get_user_meta($userid, 'ssi_model_id', 1);

	$args = array( 
											'item_id' =>  $current_user->ID, 
											'object' => '', 
											'type' => '' ,
											'width' => '150px',  
											'height' =>'150px', 
											
										); 
										
								//echo bp_core_fetch_avatar($args);

//$redirect_link = 'http://ssixxx.com/members/' . $current_user->display_name . '/profile/change-avatar/';
//if( !bp_core_fetch_avatar($args) ){ wp_redirect( $redirect_link ) ;  }
//if($current_user && !$_COOKIE['redirected'] ){ wp_redirect( $redirect_link );
	//setcookie( 'redirected', true, time() + (86400 * 30), "/");
 //}

 
 
	$orderby = 'modified';
	
	$order = 'desc';
	
	$author = $_GET['ID'];

	$publish = get_posts( array(	
								'author' => $author,
								'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								//'orderby' => $orderby,
								'post_status' => 'publish',
								'order' => $order,
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$pending = get_posts( array(	
								'author' => $author,
								'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								//'orderby' => $orderby,
								'post_status' => 'pending',
								'order' => $order,
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$drafts = get_posts( array(	
								'author' => $author,
								'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => 'modified',
								'post_status' => 'draft',
								'order' => 'desc',
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	
	$requests	= array_merge($pending,$publish, $drafts);
	
	update_user_meta($_GET['ID'], 'MX_user_request_count', count($requests)  );
	
	
get_header('yungdaddy'); ?>



<?php 
		$user_check = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user_check->roles ) ) {
		?>
		
		<div class="admin well">
				<br><center>
				<a href='http://instaflixxx.com/wp-admin/user-edit.php?user_id=<?php echo $_GET['ID']; ?>&wp_http_referer=%2Fwp-admin%2Fusers.php' class='btn'><< User Backend</a>
				<a href='?update_post=1' class='btn'>Update Post</a>
				<a href='?make_draft=1' class='btn'>Delete</a>
				</center>
		
		
				<div class='clear'></div>	<br>
		</div>
			
			
	<?php }

?>

<div class='1container-fluid'>




	<div class="col-md-8">
		
			
		
		<?php
				
						
				if( $userid == 0 ) {
					if( !is_user_logged_in() ){ 
							
		?>
					<div id='coming-soon'>You Must <a href='/register/'><u>Register</u></a> or <a href='/login'><u>Log IN</u></a> to View your Profile.</div>
	
					<br>
					<center>
					<?php echo do_shortcode('[wpmem_form login]'); ?>
					</center>
					
					
					
					<center>
					<a href='/wp-login.php?action=lostpassword' class='btn btn-lg btn-default'> Reset my Password >> </a>
					<br><br>
					
					<a href='/people' class='btn btn-lg btn-danger'> << Back to Homepage</a>
					
					
					<div class='clear'></div><br><br><br><br><br><br>
					
					<?php }else{  $user = $current_user = wp_get_current_user(); 
								$Model_ID = $userid = $current_user->ID;
						} ?>
					
		<?php
				}
					?>
					
			<div id='user-personal'>

				<div class='well'>

						<div class="well yellow mb-0">
			
			
			
			
			
			
			
			
			
				<div class="col-xs-5 col-md-4">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<center>
						<?php 
					
							echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
					
					
						
							if (  get_avatar_url()  ) {
								$avatar_URL  = get_avatar_url();
								
		    
								?>
								
									<?php echo get_avatar($current_user->ID, 150); ?>
								
								<?php 
							}else{
								?>
								<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class='img-responsive aligncenter' width='150'>
							
								<?php 
								
							}
				
						?>
						<br>
						<p class="link upper bold">edit image</p> 

						</center>

					</a>
				

				</div>
				<div class="col-xs-7 col-md-8 text-center report">
				
					<b><?php echo '<h4><b>' . $current_user->display_name . '</b></h4>' ?></b>
					<hr>
					
					<center>
					<?php	

							if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_age' , 1) . ' | ';
							}else{
										echo '- | ';
							}
							if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '" | ' ;
							}else{
										echo '- | ' ;
							}
							if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_weight' , 1) . "<br>";
							}else{
										echo '- <br>';
							}
								?>
					</center>
					

					<div class='clearfix mb-15'></div>
					<h5>
						<?php 
						
							echo get_user_meta($userid, 'MX_user_position', 1); echo " - ";
							echo get_user_meta($userid, 'MX_user_endowment', 1);  echo "in";	

						?>
					</h5>


					<div class='clearfix mb-15'></div>
			
				<div class='text-center small'>
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
			<div class='clearfix mb-10'></div><hr>
					

				</div>
		
	
				<div class='clear'></div>	


				<div class='clearfix mb-10'></div>
						
					<div class="btn-group btn-group-justified">
				
					<a href="/edit-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-default">Edit Profile</a>
					<a  href="/user-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-info">View Profile</a>
				
					</div>
		<div class='well green hidden'>
					<h4>YungDADDY Requests<hr></h4>		
								
		<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
		
		<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
		
		<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
		
		
		
		</div>
				
					
					<?php //echo do_shortcode("[wpmem_form login]"); ?>
				

		</div>





			<div class='clearfix mb-15'></div>
		
		<div class='col-xs-6 text-center'>
			<u><b>Joined</b></u><br><div class='clearfix mb-5'></div>
			<?php echo mysql2date('m-d-y', $user->user_registered ); ?>
		</div>
		<div class='col-xs-6 text-center'>
			<u><b>Last Here</b></u><br><div class='clearfix mb-5'></div>
			<?php
					$last_login = (int) get_user_meta( $userid , 'when_last_login' , true );
					if ( $last_login ) {
						$format = apply_filters( 'm-d-y', get_option( 'date_format' ) );
						$value  = date_i18n( 'm-d-y', $last_login );
						echo $value;
					}else{
						echo "Never";
					}
			
			?>
		</div>
		<div class='clear'></div><hr>
			<div class="prof-info col-sm-6"><div class="col-xs-6">
										<b>Orientation</b></div><div class="col-xs-6">
										
											<p>- <?php echo get_user_meta($userid, 'MX_user_sexual_orientation', 1);?></p>
										</div>
										</div>
		
	
							<div class="prof-info col-sm-6"><div class="col-xs-6">
								<b>Ethnicity</b></div><div class="col-xs-6">
								
									<p>- <?php echo get_user_meta($userid, 'MX_user_ethnicity', 1);?></p>
								</div>
								</div>
								<div class="prof-info col-sm-6"><div class="col-xs-6">
									<b>Sex</b></div><div class="col-xs-6">
									
										<p>- <?php echo get_user_meta($userid, 'MX_user_sex', "user_", 1);?></p>
									</div>							</div>
									
									
									<div class="prof-info col-sm-6"><div class="col-xs-6">
																	<b>Hair Color</b></div><div class="col-xs-6">
																	
																		<p>- <?php echo get_user_meta($userid, 'MX_user_hair_color', 1);?></p>
																	</div>						
																	</div>
									
						<div class="prof-info col-sm-6"><div class="col-xs-6">
															<b>Out?</b></div><div class="col-xs-6">
															
																<p>- <?php echo get_user_meta($userid, 'MX_user_out', 1); ?></p>
															</div>									</div>
															<div class="prof-info col-sm-6"><div class="col-xs-6">
																<b>Body Hair</b></div><div class="col-xs-6">
																
																	<p>- <?php echo get_user_meta($userid, 'MX_user_body_hair', 1);?></p>
																</div>	

																</div>
																
																
																<div class="prof-info col-sm-6"><div class="col-xs-6">
							<b>Body Type</b></div><div class="col-xs-6">
							
								<p>- <?php echo get_user_meta($userid, 'MX_body_type', 1);?></p>
							</div>
							</div>
										
																	<div class="prof-info col-sm-6"><div class="col-xs-6">
																		<b>Eye Color</b></div><div class="col-xs-6">
																		
																			<p>- <?php echo get_user_meta($userid, 'MX_eye_color', 1);?></p>
																		</div>
																		
																	</div>
																	
					
																	
						<div class='clear'></div><hr>
				
				
		<div class='col-sm-6 text-center '>
		
			
			
			
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clear'></div>
								<?php } ?>
								<a href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
								<div class='clear'></div>
								
										<div class="col-md-12  well green ">		
					
		<?php 
			$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );
		
		
		foreach( $social as $site ){ // print_r($site->post_name);				
			
			
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if( get_user_meta($user->ID, $site->post_name , 1)
				|| get_user_meta($user->ID, "MX_user_" . $site->post_name , 1)
			
			 ){ 

				$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_user_meta($user->ID, $site->post_name , 1);
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_user_meta($user->ID, "MX_user_" . $site->post_name  , 1); ?>'><img width='20' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''>
</a>


			<?php 		}
			$index++;
			?>	
			<?php 		
		}
		
	?>		</div>
	
	
	
		<div class='clearfix mb-15'></div>	
							
								
		<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
		
		<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
		
		<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
		
		
		<div class='clear'></div><br>	
								
								
								
								
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			
			
			
			<div class='pix'>		





			
	
	<?php if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		

					
					
					
					
									
								
		
		
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
			
			
			<?php //echo get_post_meta($Model_ID, 'MX_user_phone', true); 
			
			if(get_user_meta($user->ID, 'MX_user_phone', true)){
				
				?>
				
				<a class="btn btn-primary btn-success btn-lg btn-block" href="tel:<?php echo get_user_meta($user->ID, 'MX_user_phone', true); ?>" >
				    <span class="glyphicon glyphicon-earphone " style="font-size: 15px ; padding-right: 3px;"></span> <?php echo get_user_meta($user->ID, 'MX_user_phone', true); ?>
				</a> 
				
				
				
				<?php 
			}
			
			
			?>
			
			
			<!--
			
			<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($Model_ID, 'MX_user_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
		
				
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden'> REQUEST a DATE >> </a>
			
			
			
			
						<div class="col-md-12  well yellow text-left">
									

								Requests: <a target='_blank' class='pull-right' href='/requests'>	
								<?php	echo " " . $requests_count = count_user_posts_by_type($user->ID, 'ssi_requests'); ?>
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
								<br>Events: <a  target='_blank' class='pull-right' href='/events'>
								<?php	echo "" . $events_count = count_user_posts_by_type($user->ID, 'ssi_events'); ?>
								</a>
								<br>Blogs: <a  target='_blank' class='pull-right' href='/blog'>
								<?php	echo "" . $blog_count = count_user_posts( $user->ID  ); ?>
								</a>
								
								<br><br>Total Posts: 
								<a  target='_blank' class='pull-right' href='#'>								
								<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
									
									echo "" . $total_count; ?>
	
									</a>
									
					</div>
				

		
			
			
			
			
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div>
		
		
		
	
		
		
		
			
<div class='clear'></div>
			
			<?php  

	wp_reset_query();
	$args = array(
    'author'        =>  $_GET['ID'],
	'post_type' 	=> 'ssi_photos',
    'orderby'       =>  'midified',
    'order'         =>  'ASC',
    'posts_per_page' => 6
    );
	
	$Galleries = get_posts($args);
	
	foreach($Galleries as $Gallery){ 
	
		//if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?>
		 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							<div class=''>
						<div class='col-xs-2'>	
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(50,50) );
								echo "";
								?>
						</div>
						<div class='col-xs-8 hidden'>
						
					
							
						<?php		
								//echo $Gallery->post_title;
								
							?> - 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
							<br><u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u>
						
						</div> 
							
							
							<button type="button" class="btn btn-default btn-sm pull-right hidden">
							  View <span class="glyphicon glyphicon-play"></span> 
							</button>

							
									
						</div>
								</a>
<?php	}
	
wp_reset_query();

$count++;  ?>

	<div class='clear'></div><br>

<a target='_blank' href='/photos' class='btn btn-info btn-block'> All Photos >></a>
			<div class='clear'></div>
				<div id='user-info'>
				
				

<?php  

	$args = array(
    'author'        =>  $_GET['ID'],
    'orderby'       =>  'midified',
	'post_status' => 'publish',
    'order'         =>  'ASC',
    'posts_per_page' => -1
    );
	$Galleries = get_posts($args);
	
	?>
	
	<hr><h3 class='text-center'>
	<?php
	echo count($Galleries);
	?>
		Posts
		</h3>
	<hr>
	<?php
	
	foreach($Galleries as $Gallery){ 
	
	//	if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?>
		 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							<div class=''>
						<div class='col-xs-2'>	
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(50,50) );
								echo "";
								?>
						</div>
						<div class='col-xs-8'>
						
					
							
						<?php		
								echo $Gallery->post_title;
								
							?> - 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
							<br><u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u>
						
						</div> 
							
							
							<button type="button" class="btn btn-default btn-sm pull-right">
							  View <span class="glyphicon glyphicon-play"></span> 
							</button>

							
									<div class='clear'></div><hr>
						</div>
								</a>
<?php	}
	


$count++;  ?>

<div class='clear'></div><hr>
<a target='_blank' href='/post' class='btn btn-info btn-block'>> New Post <</a>
	
	
	
	<?php ?>
	
	
																	<?php
																	
								/*								
									// check if the repeater field has rows of data
									if( have_rows('additional_images', "user_" . $userid) ):
									
										// loop through the rows of data
										while ( have_rows('additional_images', "user_" . $userid) ) : the_row();
											// display a sub field value
											?>
																	<a href="#" onClick="jkpopimage('<?php the_sub_field("image", "user_" . $userid); ?>', 615, 500, 'InstaFliXXX Image for: <?php echo $user->display_name; ?>'); return false"><img style='width: 208px; height: 150px;' src='<?php the_sub_field("image", "user_" . $userid); ?>'></a>

																				<?php
										endwhile;
									 
									else :
									 
										// no rows found
									 
									endif;
								*/	 
								?>
		<div class='profile-social text-center'>
			<?php //echo count($requests); ?>
			<h3><u><?php echo count($requests); ?></u> Requests</h3>
		</div>

		<?php
		
			foreach( $requests as $request ){
		?>
		<div class='well'>
		
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			if( !has_post_thumbnail( $request->ID ) && current_user_can( 'manage_options' ) ){
					
					
			
		?>
			<img src="http://amazonmolly.com/wp-content/uploads/2016/07/Man_shadow_-_upper-150x150.png" alt="Man_shadow_-_upper" width="150" height="150" class="alignleft size-thumbnail wp-image-952" />
		<?php 
		
			}else if( (in_array('photo', $selected)  && has_post_thumbnail( $request->ID )) || current_user_can( 'manage_options' ) ){
				echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			}else{
				
				
		?>
			<img src="http://amazonmolly.com/wp-content/uploads/2016/07/Man_shadow_-_upper-150x150.png" alt="Man_shadow_-_upper" width="150" height="150" class="alignleft size-thumbnail wp-image-952" />
		<?php 
			}
			?>
			
		<?php
				if( get_field( "request_date", $request->ID ) ){ echo "Date: " . get_field( "request_date", $request->ID ) . ' ...  <br>'; }
					if( get_field( "request_time", $request->ID ) ){ echo "Time: " . get_field( "request_time", $request->ID ) . ' ...  <br>'; }
				
				if( get_field( "request_length", $request->ID ) ){ echo "<br> - <b>" . get_field( "request_length", $request->ID ) . '</b> - '; }
				
				if( get_field( "request_interest", $request->ID ) ){ echo " " . get_field( "request_interest", $request->ID ) . " "; }
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				
			?>
			
			<div class='clear'></div>	
		</div>
		
		<div class='clear'></div>	
		<?php
			}
		?>
		
		<a target='_blank' href='/request' class='btn btn-info btn-block'>> Make A Request <</a>
		
		
		
		<hr>
		<div class='profile-social text-center'>
			<?php $add_social = 0; ?>
			<h3>Lets Get Social!!!</h3>
		</div>
		
		
		<div class="col-sm-12">
		
				
										<br>
								
					
					
		<?php 
			$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );
		$index = 0;
		
		foreach( $social as $site ){ // print_r($site->post_name);				
			
			
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if( get_user_meta($user->ID, $site->post_name , 1)
				|| get_user_meta($user->ID, "MX_user_" . $site->post_name , 1)
			
			 ){ 

				$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_user_meta($user->ID, $site->post_name , 1);
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_user_meta($user->ID, "MX_user_" . $site->post_name  , 1); ?>'>
					<img width='50' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''> - <?php echo get_user_meta($user->ID, "MX_user_" . $site->post_name  , 1); ?>

				<button type="button" class="btn btn-default btn-sm pull-right">
							  Go <span class="glyphicon glyphicon-play"></span> 
							</button>
				</a>

				<hr>
			<?php 		}
			$index++;
			?>	
			<?php 		
		}
		
	?>		
	
	
					<table border="1" width="100%">

						<?php if( get_user_meta('MX_facebook_profile_link', "user_" . $userid) ){ ?>
						<tr>
							<td>Facebook</td>
							<td><?php echo "<a target='_blank' href='http://facebook.com/" . get_user_meta('MX_facebook_profile_link', "user_" . $user->ID) . "'>" . get_user_meta('MX_facebook_profile_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
							<!--
							<td><?php echo get_user_meta($userid, 'MX_facebook_profile_link', "user_" . $user->ID); $add_social += 1;?></td>
							-->
						</tr>
						<?php }

if( get_user_meta('MX_twitter_link', "user_" . $user->ID)   ){ ?>
						<tr>
							<td>Twitter</td>
							<td><?php echo "<a target='_blank' href='http://twitter.com/" . get_user_meta('MX_twitter_link', "user_" . $user->ID) . "'>" . get_user_meta('MX_twitter_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_user_meta('MX_instagram_link', "user_" . $user->ID)  && $add_social < 4 ){ ?>
						<tr>
							<td>Instagram</td>
							<td><?php echo "<a target='_blank' href='http://instagram.com/" . get_user_meta('MX_instagram_link', "user_" . $user->ID) . "'>" . get_user_meta('MX_instagram_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_user_meta('MX_kik_name', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>KIK</td>
							<td><?php echo get_user_meta($userid, 'MX_kik_name', "user_" . $user->ID);  $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_user_meta('MX_vine_username', "user_" . $user->ID)     ){ ?>
						<tr>
							<td>Vine</td>
							<td><?php echo get_user_meta($userid, 'MX_vine_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_snapchat_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Snapchat</td>
							<td><?php echo get_user_meta($userid, 'MX_snapchat_username', "user_" . $user->ID); $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_skype_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Skype</td>
							<td><?php echo get_user_meta($userid, 'MX_skype_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_oovoo_username', "user_" . $user->ID)   ){ ?>
						<tr>
							<td>ooVoo</td>
							<td><?php echo get_user_meta($userid, 'MX_oovoo_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_adam4adam_username', "user_" . $user->ID)  && $add_social < 5){ ?>
						<tr>
							<td>Adam4Adam</td>
							<!--<td><?php echo get_user_meta($userid, 'MX_adam4adam_username', "user_" . $user->ID);  $add_social += 1; ?></td>
-->
							<td><?php echo "<a target='_blank' href='http://www.adam4adam.com/?p=" . get_user_meta('MX_adam4adam_username', "user_" . $user->ID) . "'>" . get_user_meta('MX_adam4adam_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_user_meta('MX_bgc_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>BGC Live</td>
							<td><?php echo "<a target='_blank' href='http://bgclive.com/" . get_user_meta('MX_bgc_username', "user_" . $user->ID) . "'>" . get_user_meta('MX_bgc_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_grindr_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Grindr</td>
							<td><?php echo get_user_meta($userid, 'MX_grindr_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_user_meta('MX_jackd_username', "user_" . $user->ID)    ){ ?>	
						<tr>
							<td>Jack'd</td>
							<td><?php echo get_user_meta($userid, 'MX_jackd_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php } 

if( get_user_meta('MX_facetime_username', "user_" . $user->ID)   ){ ?>	
						<tr>
							<td>Facetime</td>
							<td><?php echo get_user_meta($userid, 'MX_facetime_username', "user_" . $user->ID);  $add_social += 1;?></td>
						</tr>
						<?php } 
if( !$index ){ ?>	
						<tr>
							<td><center>This User has not added any Social Media</center></td>

						</tr>
						<?php } ?>
					</table> 



				</div>
				
	  
<?php 

get_template_part('ad', '468-60'); 
?>
				
</div>
		</div>	

<div class='clear'></div>
	
	
		
	
	</div></div>

	<div class='col-md-4 report'>
	
	<center>
	
	<?php 
		if( $model_ID = get_user_meta( $user->ID , 'MX_model_id' , true) ){
			
			?>
			<div class='well red '>
			<?php echo get_the_title($model_ID); ?>'s Model Profile<hr>
			
			<center><?php echo get_the_post_thumbnail( $model_ID );?></center>
			
			<hr>
			<a target='_blank' href='/?p=<?php echo $model_ID; ?>' class='btn btn-danger btn-block'>View Profile</a>
		
		</div>
			
			<?php
			
		}
	?>
	
	
	
	
	
	
		<?php get_template_part('content', 'sidebar-ads'); ?>

		
		
		
		
		</center>
	</div>

<div class='clear'></div>
</div>
<br><br>
	<div class="paginator ">
		<center>															
			<a class='pull-left' href='/people'>
				&lsaquo; ALL Members
			</a>
			<a class='pull-right' href='/user-profile/?ID=<?php echo ($userid+1);?>'>
				Next >>
			</a>
		</center>
			<div class='clear'></div>
     </div>
<br><br>

	

<?php get_footer('kik'); ?>