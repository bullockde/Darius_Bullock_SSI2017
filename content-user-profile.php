<?php
$user = $current_user = wp_get_current_user();
$userid = $user->ID;
?>

<div id='user-personal' class='col-sm-8'>
				
				<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php echo $user->display_name; ?></h4>
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
			
			<div class='clear'></div><br>
			
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
	
		
<div class='clear'></div>
<h4><?php 
			echo get_user_meta($userid, 'MX_user_position', 1); echo " -- ";
			echo get_user_meta($userid, 'MX_user_endowment', 1);  echo "in";	
					
					
					
					?></h4>
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

			?><!--
			
			<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($Model_ID, 'MX_user_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
		
				
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden'> REQUEST a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div>
		
		
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>
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
					$last_login = (int) get_user_meta( $userid , 'when_last_login' , true );
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
			



			
				<div id='user-info'>

<?php   $count++;  ?>

	
																	<?php
																	
																
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
									 
								?>
		</div>
	
		
		
		<div class='profile-social hidden text-center'>
			<?php $add_social = 0; ?>
			<h3>Lets Get Social!!!</h3>
		</div>
		
		
		<div class="col-sm-12 hidden">
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
if( !$add_social ){ ?>	
						<tr>
							<td><center>This User has not added any Social Media</center></td>

						</tr>
						<?php } ?>
					</table> 



				</div>
				
		
				
</div>
	<div class='col-sm-4'>
				<center>			
						<script type="text/javascript">
var ad_idzone = "2471539",
	 ad_width = "300",
	 ad_height = "250";
</script>
<script type="text/javascript" src="https://ads.exosrv.com/ads.js"></script>
<noscript><a href="https://main.exosrv.com/img-click.php?idzone=2471539" target="_blank"><img src="https://syndication.exosrv.com/ads-iframe-display.php?idzone=2471539&output=img&type=300x250" width="300" height="250"></a></noscript>
		
		
		<hr>
		
		<a href="https://info.flagcounter.com/uWbi"><img src="https://s01.flagcounter.com/count2/uWbi/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_12/viewers_0/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
		</center>
		
		<hr>
				
		
		<div class='clear'></div>
		</div>
			

<div class='clear'></div>
		
		
	
	</div>