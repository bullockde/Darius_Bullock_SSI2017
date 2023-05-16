<?php
/**
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>



<div class='clear'></div>


		<div id="content" class="" role="main">
		
		
		<?php if($_GET['type'] == 'trips' ){ get_template_part('content-page', 'trips'); } ?>
		
		
		
		

<div id='p'>
			<br><br>
			<?php
			
			//set_post_type( 12533 , 'ssi_contact' );
			
				
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.

			
					
				
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
		if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) { // LOGGED-IN Check

//echo 'CHILD OF Admin';
			if( 1 ){ 

				$clients = get_posts( array( 'post_type' => 'clients' , 'posts_per_page' => -1 ) );
				$friends = get_posts( array( 'post_type' => 'friends' , 'posts_per_page' => -1 ) );
				$family = get_posts( array( 'post_type' => 'family' , 'posts_per_page' => -1 ) );
				$leads = get_posts( array( 'post_type' => 'leads' , 'posts_per_page' => -1 ) );
				
				$tenants = get_posts( array( 'post_type' => 'tenants' , 'posts_per_page' => -1 ) );
			
				$leads = array_merge($clients,$friends,$leads,$family,$tenants);

			}


	
		$tenant_id = $_GET['ID'];
		
		$person = get_post($_GET['ID']);
		
		//print_r( $person );

		
	
	$leads = get_posts( array( 'post_type' => $person->post_type , 'post__in' => array($tenant_id) ) );

	//$leads = get_post( $tenant_id , ARRAY_A );

	//print_r( $leads );
	foreach( $leads as $lead ){


			?>


			
			<div id='user-personal' class='col-sm-8'>
				
				<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php if($lead->post_title){ 

								echo "<strong>" . $lead->post_title . "</strong>"; 
							
								//array_push( $names, $lead->post_title );

							}else{ echo 'New Request'; } 
				?></h4>
			<div class=" porn">
									<center>
								<?php echo get_avatar($user->ID, 150); ?> 
									</center>
								</div>
								
								<div class='clear'></div><br>
								
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			
			<div class='clear'></div><br>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				if( get_post_meta($_GET['ID'], 'MX_user_age' , 1) ){
					echo get_post_meta($_GET['ID'], 'MX_user_age' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				<?php //echo get_post_meta($_GET['ID'], 'MX_user_height', 1);
				
				if( get_post_meta($_GET['ID'], 'MX_user_height_ft' , 1) ){
						echo get_post_meta($_GET['ID'], 'MX_user_height_ft' , 1) . "' " . get_post_meta($_GET['ID'], 'MX_user_height_in' , 1) . '"' ;
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
				
				if( get_post_meta($_GET['ID'], 'MX_user_weight' , 1) ){
					echo get_post_meta($_GET['ID'], 'MX_user_weight' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			
			<div class='clear'></div><br>
			
				<div class='text-center '>
				Location<br>
				<b><?php 
				
					$closet = 0;
								if ( get_post_meta($_GET['ID'], 'MX_user_city', 1 ) && get_post_meta($_GET['ID'], 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_post_meta($_GET['ID'], 'MX_user_city', 1 ) . '</span>, ';
																		echo get_post_meta($_GET['ID'], 'MX_user_state', 1) ;

								}
								else if ( get_post_meta($_GET['ID'], 'MX_user_state', 1) ){
									echo  get_post_meta($_GET['ID'], 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?></b>
			</div>
			
			
			<div class='pix'>				
	
	<?php if( get_field( 'lead_image_1', $_GET['ID'] ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $_GET['ID'] );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $_GET['ID'] );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $_GET['ID'] ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $_GET['ID'] );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $_GET['ID'] );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $_GET['ID'] ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $_GET['ID'] );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $_GET['ID'] );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $_GET['ID'] ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $_GET['ID'] );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $_GET['ID'] );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div>
<h4><?php 
			echo get_post_meta($_GET['ID'], 'MX_user_position', 1); echo " -- ";
			echo get_post_meta($_GET['ID'], 'MX_user_endowment', 1);  echo "in";	
					
					
					
					?></h4>
</div>


			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($_GET['ID'], 'client_phone', true));
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

			?><!--
			
			<?php echo get_post_meta($_GET['ID'], 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($_GET['ID'], 'MX_user_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $_GET['ID']; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
		
				
			
			<a href='/bae?ID=<?php echo $_GET['ID']; ?>' class='btn btn-info btn-block hidden'> REQUEST a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div>
		
		
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($_GET['ID'] == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-contact/?ID=<?php echo  $lead->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>
								<div class='clear'></div><br>
								
								<a href='/members/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class='btn btn-block btn-warning'>Upload Image</a>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='hidden pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
								
		</div>
		
		
		<div class='clear'></div>
		
		<div class='col-xs-6 text-center'>
			<u>Joined:</u><br><br>
			<?php echo mysql2date('m-d-y', $user->user_registered ); ?>
		</div>
		<div class='col-xs-6 text-center'>
			<u>Last Here:</u><br><br>
			<?php
					$last_login = (int) get_post_meta( $_GET['ID'] , 'when_last_login' , true );
					if ( $last_login ) {
						$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
						$value  = date_i18n( $format, $last_login );
						echo $value;
					}else{
						echo "Never";
					}
			
			?>
		</div>
		<div class='clear'></div><hr>
		
			<div class="prof-info col-sm-6"><div class="col-xs-6">
										<b>Orientation</b></div><div class="col-xs-6">
										
											<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_sexual_orientation', 1);?></p>
										</div>
										</div>
		
	
							<div class="prof-info col-sm-6"><div class="col-xs-6">
								<b>Ethnicity</b></div><div class="col-xs-6">
								
									<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_ethnicity', 1);?></p>
								</div>
								</div>
								<div class="prof-info col-sm-6"><div class="col-xs-6">
									<b>Sex</b></div><div class="col-xs-6">
									
										<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_sex', "user_", 1);?></p>
									</div>							</div>
									
									
									<div class="prof-info col-sm-6"><div class="col-xs-6">
																	<b>Hair Color</b></div><div class="col-xs-6">
																	
																		<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_hair_color', 1);?></p>
																	</div>						
																	</div>
									
						<div class="prof-info col-sm-6"><div class="col-xs-6">
															<b>Out?</b></div><div class="col-xs-6">
															
																<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_out', 1); ?></p>
															</div>									</div>
															<div class="prof-info col-sm-6"><div class="col-xs-6">
																<b>Body Hair</b></div><div class="col-xs-6">
																
																	<p>- <?php echo get_post_meta($_GET['ID'], 'MX_user_body_hair', 1);?></p>
																</div>	

																</div>
																
																
																<div class="prof-info col-sm-6"><div class="col-xs-6">
							<b>Body Type</b></div><div class="col-xs-6">
							
								<p>- <?php echo get_post_meta($_GET['ID'], 'MX_body_type', 1);?></p>
							</div>
							</div>
										
																	<div class="prof-info col-sm-6"><div class="col-xs-6">
																		<b>Eye Color</b></div><div class="col-xs-6">
																		
																			<p>- <?php echo get_post_meta($_GET['ID'], 'MX_eye_color', 1);?></p>
																		</div>
																		
																	</div>
																	
																	
						<div class='clear'></div><hr>
			



			
				<div id='user-info'>

<?php   $count++;  ?>

	
																	<?php
																	
																
									// check if the repeater field has rows of data
									if( have_rows('additional_images', "user_" . $_GET['ID']) ):
									
										// loop through the rows of data
										while ( have_rows('additional_images', "user_" . $_GET['ID']) ) : the_row();
											// display a sub field value
											?>
																	<a href="#" onClick="jkpopimage('<?php the_sub_field("image", "user_" . $_GET['ID']); ?>', 615, 500, 'InstaFliXXX Image for: <?php echo $user->display_name; ?>'); return false"><img style='width: 208px; height: 150px;' src='<?php the_sub_field("image", "user_" . $_GET['ID']); ?>'></a>

																				<?php
										endwhile;
									 
									else :
									 
										// no rows found
									 
									endif;
									 
								?>
		</div>
	
		
		
		<div class='profile-social hidden text-center'>
			<?php $add_social = 0; ?>
			<h3>Lets Get Social!!!</h3>
		</div>
		
		
		<div class="col-sm-12 hidden">
					<table border="1" width="100%">

						<?php if( get_post_meta('MX_facebook_profile_link', "user_" . $_GET['ID']) ){ ?>
						<tr>
							<td>Facebook</td>
							<td><?php echo "<a target='_blank' href='http://facebook.com/" . get_post_meta('MX_facebook_profile_link', "user_" . $user->ID) . "'>" . get_post_meta('MX_facebook_profile_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
							<!--
							<td><?php echo get_post_meta($_GET['ID'], 'MX_facebook_profile_link', "user_" . $user->ID); $add_social += 1;?></td>
							-->
						</tr>
						<?php }

if( get_post_meta('MX_twitter_link', "user_" . $user->ID)   ){ ?>
						<tr>
							<td>Twitter</td>
							<td><?php echo "<a target='_blank' href='http://twitter.com/" . get_post_meta('MX_twitter_link', "user_" . $user->ID) . "'>" . get_post_meta('MX_twitter_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_post_meta('MX_instagram_link', "user_" . $user->ID)  && $add_social < 4 ){ ?>
						<tr>
							<td>Instagram</td>
							<td><?php echo "<a target='_blank' href='http://instagram.com/" . get_post_meta('MX_instagram_link', "user_" . $user->ID) . "'>" . get_post_meta('MX_instagram_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_post_meta('MX_kik_name', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>KIK</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_kik_name', "user_" . $user->ID);  $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_post_meta('MX_vine_username', "user_" . $user->ID)     ){ ?>
						<tr>
							<td>Vine</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_vine_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_snapchat_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Snapchat</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_snapchat_username', "user_" . $user->ID); $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_skype_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Skype</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_skype_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_oovoo_username', "user_" . $user->ID)   ){ ?>
						<tr>
							<td>ooVoo</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_oovoo_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_adam4adam_username', "user_" . $user->ID)  && $add_social < 5){ ?>
						<tr>
							<td>Adam4Adam</td>
							<!--<td><?php echo get_post_meta($_GET['ID'], 'MX_adam4adam_username', "user_" . $user->ID);  $add_social += 1; ?></td>
-->
							<td><?php echo "<a target='_blank' href='http://www.adam4adam.com/?p=" . get_post_meta('MX_adam4adam_username', "user_" . $user->ID) . "'>" . get_post_meta('MX_adam4adam_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

						</tr>
						<?php }

if( get_post_meta('MX_bgc_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>BGC Live</td>
							<td><?php echo "<a target='_blank' href='http://bgclive.com/" . get_post_meta('MX_bgc_username', "user_" . $user->ID) . "'>" . get_post_meta('MX_bgc_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_grindr_username', "user_" . $user->ID)    ){ ?>
						<tr>
							<td>Grindr</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_grindr_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php }

if( get_post_meta('MX_jackd_username', "user_" . $user->ID)    ){ ?>	
						<tr>
							<td>Jack'd</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_jackd_username', "user_" . $user->ID);  $add_social += 1; ?></td>
						</tr>
						<?php } 

if( get_post_meta('MX_facetime_username', "user_" . $user->ID)   ){ ?>	
						<tr>
							<td>Facetime</td>
							<td><?php echo get_post_meta($_GET['ID'], 'MX_facetime_username', "user_" . $user->ID);  $add_social += 1;?></td>
						</tr>
						<?php } 
if( !$add_social ){ ?>	
						<tr>
							<td><center>This User has not added any Social Media</center></td>

						</tr>
						<?php } ?>
					</table> 



				</div>
				
		
				
</div>
			
			
			
			
		<div class='row info'>
			
			<div class='col-xs-6 '>


				
				<?php if($lead->post_title){ 

								echo "<strong>" . $lead->post_title . "</strong>"; 
							
								//array_push( $names, $lead->post_title );

							}else{ echo 'New Request'; } 
				?>
				<div class='col-xs-4 '>
				<?php 
				
					if( get_field( 'facebook' , $lead->ID ) != '' ){
						
						
				?>
						<img src="http://graph.facebook.com/<?php echo get_field( 'facebook' , $lead->ID ); ?>/picture" class="hidden img-responsive">
					<?php 

					}
				
				
				  if ( has_post_thumbnail($tenant_id) ) {
			
					
 					$thumbnail_id = get_post_thumbnail_id( $tenant_id );
					if( $thumbnail_id == 10286  ){
				?>
						
				<img src='http://shamanshawn.com/wp-content/uploads/2015/11/blank-face.jpe' class='img-responsive'>
				<?php

							
    					 }else{	echo get_the_post_thumbnail( $tenant_id ); }
				  } 
							
					?>
				</div>
				<div class='col-xs-8 '>

					
					<?php 
					
		$social = array(
		
			'adam4adam' => 'https://www.adam4adam.com/profile/view/', 
			'facebook' => 'https://www.facebook.com/', 
			'instagram' => 'https://www.instagram.com/', 
			'kik' => '', 
			'vine' => 'https://vine.co/u/', 
			'meetup' => 'http://www.meetup.com/', 
			'linkedin' => 'https://www.linkedin.com/pub/', 
			'bgclive' => '',
			'xtube' => 'http://www.xtube.com/profile/',
			'tumblr' => 'http://www.xtube.com/profile/',
			
		);
					
					
		$index = 0;
		foreach( $social as $site => $link ){				
			?>	

			
			<?php			if( get_field( $site , $lead->ID ) ){ 

				$social_count[$index]++;	
				
				
			?>
			<a target='_blank' href='<?php echo $link; ?><?php echo get_field( $site , $lead->ID ); ?>'>
				<div class="col-xs-12 pad0">
				
					<img width='15' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site; ?>.png' class=''>
					
					/<?php echo get_field( $site , $lead->ID ); ?>

				</div>
				 
				
			</a>
			<?php 		}
			$index++;
			?>	
			<?php 		
		}
	?>
					<div class='clear'></div>
					<br>Phone#:
					
					<?php 
					if( get_field( 'lead_phone', $lead->ID ) ){ 
						echo get_field( 'lead_phone', $lead->ID ); 
					
					}else{
						
						echo " - N/A" ;
					}
					
					?> 
					<br>Email:
					<?php 
					if( get_field( 'lead_email', $lead->ID ) ){ 
						echo get_field( 'lead_email', $lead->ID ); 
					
					}else{
						
						echo " - N/A" ;
					}
					
					?> 
				</div>
					
				
			</div>
			<div class='col-xs-6 '>
				
	
				<div class='col-sm-6'>

					
					
					<button id='payments' class='btn btn-default btn-block'>View Payments</button>
					
				
				</div>
				<div class='col-sm-6'>

					<button id='details<?php echo $lead->ID; ?>' class='btn btn-default btn-block'>More</button>
				</div>

					<div class='clear'></div>

			</div>
		</div>

		<div class='row admin'>
			<?php 
				echo "<div id='details" . $lead->ID .  "' class='details' style='display: none;'>";
				?>
				<?php

				if( !get_field( "move-out_date", $lead->ID ) ){ 
					?>
		<form method="post" action="" class='pull-left1'>
			<button name="update" type="submit" class='btn btn-block btn-danger' value="Remove Lead" />Move Out</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="move_out" type="hidden" value="true" />
			<input name="move_out_date" type="hidden" value="<?php echo current_time( 'm/d/y' );  ?>" />
		</form>
					<?php 
				}
				?>
		

		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>

				<?php
					echo "<a target='_blank' href='/wp-admin/post.php?post=" . $lead->ID . "&action=edit' class='btn btn-default pull-left'>Edit Lead</a>";
				
					echo "<br></div><div class='clear'></div><hr>";


			?>
		</div>

	<?php 
	
		$rate = get_field( 'room_rate', $lead->ID );	
		
		$app_fee = get_field( 'app_fee', $lead->ID );

		if( get_field( 'security_deposit', $lead->ID ) ){ $security = get_field( 'security_deposit', $lead->ID ); }
		else{ $security = (2 * $rate); }
			
			
			$deposit = ($security + $rate + $app_fee);
	?>
		
		<div id='payments' class='row payment' style='display: block;'>
			<h4>Payment Info</h4> 
			<div class='col-md-12 '>
				<?php 
								
				// ####################   Service Log	#########

				$client_profit = 0;

				?>
				<div class='clear'><br><br></div>
				<div class='col-xs-2 col-sm-2'><b>Date</b></div>
				<div class='col-xs-2 col-sm-2'><b>Time</b></div>
				<div class='col-xs-2 col-sm-2'><b>Location</b></div>
				<div class='col-xs-2 col-sm-2'><b>Service</b></div>
				<div class='col-xs-2 col-sm-2'><b>Trans ID</b></div>
				<div class='col-xs-2 col-sm-2'><b>Rate</b></div>
				<div class='clear'></div>

				<hr>

				<?php 

				// check if the repeater field has rows of data
				if( have_rows('service_log' , $lead->ID ) ):

			 	// loop through the rows of data
				    while ( have_rows('service_log', $lead->ID ) ) : the_row();
				
				?>

			       <div class='col-xs-2 col-sm-2'><?php echo get_sub_field('date'); ?></div>
				<div class='col-xs-2 col-sm-2'><?php the_sub_field('time'); ?></div>

				<div class='col-xs-2 col-sm-2'><?php the_sub_field('location'); ?></div>
				
				<div class='col-xs-2 col-sm-2'><?php the_sub_field('service'); ?></div>
			
				<div class='col-xs-2 col-sm-2'><?php the_sub_field('trans_id'); ?></div>
				
				<div class='col-xs-2 col-sm-2'>
				
				
				<?php the_sub_field('income_expense');?> $ <?php the_sub_field('rate'); ?></div>
				
				<?php 
					$client_profit += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT));
					$total_amount += str_replace(['+', '-'], '', filter_var( get_sub_field('rate') , FILTER_SANITIZE_NUMBER_INT)); ?>
				<div class='clear'></div>
				<hr>
				

				<?php
				    endwhile;

				else :

				    // no rows found

				endif;

?>
<div id='details<?php echo $lead->ID; ?>' style='display: none;'>
	<button id='add_payment' class='btn btn-info btn-block'>Add Payment</button><br>
</div>
	<div id='add_payment' class='' style='display: none;'>
		<form method="post" action="" name="add_transaction">
				<div class='col-xs-6 col-sm-2'><input  type="text" name="trans_date" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" ></div>
				<div class='col-xs-6 col-sm-2'><input type="text" name="trans_time" placeholder="Time" value="<?php echo current_time( 'g:i' ); ?> pm" ></div>
				<div class='col-sm-2'><input type="text" name="trans_location" placeholder="Location" value="My Place"></div>
				<div class='col-sm-4'><input type="text" name="trans_service" placeholder="Service" Value="Service"></div>
				
				<div class='col-md-1'><input type="text" name="trans_amount" placeholder="Rate"></div>
		<div class='col-md-1'>
			<input type="radio" name="income_expense" value="+">+<br>
			<input type="radio" name="income_expense" value="-">-
		</div>		
				<input type="hidden" name="client_name" value="<?php echo $lead->post_title; ?>">
				<input type="hidden" name="client_city" value="<?php echo get_field( 'lead_city', $lead->ID ); ?>">
				<input type="hidden" name="client_phone" value="<?php echo get_field( 'lead_phone', $lead->ID ); ?>">
				<input type="hidden" name="client_state" value="<?php echo get_field( 'lead_state', $lead->ID ); ?>">
				
				<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
				<input name="client_id" type="hidden" value="<?php echo $lead->ID; ?>" />

				<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
				<input type='hidden' name='insert_transaction' value='true'>
				<input type='hidden' name="update" value='true'>
				<input type="submit" class="pull-right">
			</form>
		</div>



				<div class='clear'></div>
				<hr>
			<?php 
				// #################### END Service Log	#########


				?>
			</div>
		</div>

		<div class='row rental'>
			<h4>Summary</h4>
			<div class='col-xs-4 col-md-4 well'>
			
				<div class='col-xs-6'>
					Rate (weekly)
				</div>
				<div class='col-xs-6'>
					$
					<?php 
					
						echo get_field( 'room_rate', $lead->ID );
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					Security 
				</div>
				<div class='col-xs-6'>
					$
					<?php 
						echo $security;
						
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					App Fee
				</div>
				<div class='col-xs-6'>
					$
					<?php 
							if( get_field( 'app_fee', $lead->ID ) == 0  ){ 
								echo "Waived!";
							
							}else{
								echo get_field( 'app_fee', $lead->ID );
							}
							?>
				</div>
				

			</div>
			<div class='col-xs-4 col-md-4 hidden1'>
										
<!--  ///////////////////////////////  DATE MAGIC  ///////////////////////////////   -->
	<?php  			
		
			echo "MOVEIN: " . get_field( "move-in_date", $lead->ID );

		if( get_field( "move-out_date", $lead->ID ) ){ echo "<br>MOVEOUT: " . get_field( "move-out_date", $lead->ID ); }
			
			
			$rate = get_field( 'room_rate', $lead->ID );

			//$s_date = mysql2date('n/j/y', $lead->post_date );

			$s_date = date('Y-m-d H:i:s', strtotime(  $lead->post_date  ) );
			
			if( get_field( "move-out_date", $lead->ID ) != "" ){

				$s_date = date('Y-m-d', strtotime(  $lead->post_date  ) );
				$e_date = date("Y-m-d H:i:s", strtotime( get_field( "move-out_date", $lead->ID ) ));

				$e_date = get_field( "move-out_date", $lead->ID );
				$e_date = date('Y-m-d', strtotime(  $e_date ) );

			}else{
				
				$e_date = strtotime( "today" );
				
				$e_date = date('Y-m-d H:i:s',  $e_date );
			}
			//echo "SD==>" . $s_date . "ED==>" . $e_date;

			$date1 = date_create( $s_date );
			$date2 = date_create( $e_date );

			$diff=date_diff($date1,$date2);
	
			$tot_days = $diff->format("%a");
			//echo "TOTAL DAYS--->" . $tot_days;

			$weeks = floor($tot_days/7);

			$days = $tot_days - ($weeks*7);

			$app_fee = get_field( 'app_fee', $lead->ID );

			echo "<br>WEEKS-> " . $weeks . " DAYS-> " . $days;

	
			

	?>

<!--  ///////////////////////////////  #DATE MAGIC  ///////////////////////////////   -->


			<?php 
				//echo "<div class='col-sm-12' ><b>Last Seen: </b> " . date('n/j/y', strtotime( get_field( 'last_seen', $lead->ID ) ) ) . "</div>"; 
				//	echo "<div class='col-sm-12' ><b>Last Contacted: </b> " . date('n/j/y', strtotime( get_field( 'last_contacted', $lead->ID ) ) ) . "</div>"; 
				//	echo "<div class='col-sm-12' ><b>Added: </b> " . mysql2date('n/j/y', $lead->post_date ) . "</div>"; 
			?>

			</div>
	
			<div class='col-xs-4 '>
				<h3 class='visible-xs'>Payment Summary</h4>

				<div class='pull-right'>
					<?php 
						
						$due = ((($weeks) * $rate)+($security + $rate + $app_fee));
						echo "DUE--->$" . $due;


						$tot_owed  += $due;

						echo "<br>PAID--->$" . $client_profit;
						$owed = ($due - $client_profit);

					$banked = $loss = 0;
					

					if( $owed < 0 || get_field( "move-out_date", $lead->ID ) ){
						if( $owed < 0 ){ 
							$banked = (-$owed);
							echo "<br>BANKED: $" . $banked;
						 }
						else{ 
							$loss = $owed; 
							echo "<br>LOSS: $" . $loss;

							
						}
						if( get_field( 'security_applied', $lead->ID ) == "yes"  ){ 
								echo "<br>SECURITY APPLIED!!";
								$final = ((-$loss) + $security);
								echo "<br>FINAL: $" . $final;
							}

						$owed = 0; 
					}
						echo "<br><br>Owed: $" . $owed; 
				
						

						$tot_due += $owed;
					?>
				
				</div>
			</div>


		</div>
		
		<div class='forms'>
				<div class='clear'></div><br><hr>
			
			<h3 class=''>Forms</h4>
			<br>
			
			
							<?php 

				// check if the repeater field has rows of data
				if( have_rows('ssi_forms_uploader' , $lead->ID ) ):

			 	// loop through the rows of data
				    while ( have_rows('ssi_forms_uploader', $lead->ID ) ) : the_row();
				
				?>

			       <div class='col-xs-2 text-center'>
				   <a href='<?php the_sub_field('ssi_form_upload'); ?>' target='_blank'> <img src='http://shamanshawn.com/wp-includes/images/media/document.png' class=''><br><br>
				   (<?php echo get_sub_field('ssi_form_date'); ?>)
				   <br><?php the_sub_field('ssi_form_title'); ?></a>
				   </div>
						
				
				
				

				<?php
				    endwhile;

				else :

				    // no rows found

				endif;

?>

<div class='clear'></div>
				<hr>

					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_1', $lead->ID ); ?>' class='img-responsive'>
					</div>
					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_2', $lead->ID ); ?>' class='img-responsive'>
					</div>
					<div class='col-xs-2'>
						<img src='<?php echo get_field( 'file_3', $lead->ID ); ?>' class='img-responsive'>
					</div>
					
					
						<div class='clear'></div><br>		
	
		</div>
		<div class='row summary'>
			
			<div class='col-md-6 '>
				<h4>Notes</h4>

				<?php echo "<div class='col-xs-12' > " . $lead->post_content . "</div><br>";		
				?>
			</div>
			
		</div>
	<?php

////////////////////////// TENANT REPORT /////////////////////////	

					if( get_field( "move-out_date", $lead->ID ) != "" ){ 

						
						//array_push( $moved_out, $lead );
						


					 }else{
					
					$tot_count++;

					$public = 1;

					

		if(  get_field( 'public_private_request', $lead->ID ) == 0  ||  is_user_logged_in()  ){ 
					if( $lead->post_status == 'publish' ){
					?>
					
					
				<?php
					
					

					}// #END IF Published
				}else{  echo "Private<hr><br>" ; } 
				


				}	//END ELSE MOVE OUT
				}// END FOR EACH LEADS

////////////////////////// #TENANT REPORT /////////////////////////
				the_content();
				echo '</div>';
					
		} //END LOGGED-IN Check
					
				
					
				endwhile;
			?>
		<br><br><br>
		</div><!-- #content -->
	
	<div class='clear'></div>
</div><!-- #main-content -->

<?php

get_footer();