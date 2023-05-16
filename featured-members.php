 <!--   START HOMEPAGE -->

		<div id='featured-members' class='mini'>
		
		<div class='row recent hidden'>
			<div class='md-4'>
				
				<button class="sexyButtonleft" onclick="document.querySelector('.user-filter').classList.toggle('hide');">Show/Hide Search</button> 
			</div>
			<div class='md-4'>
				Recent Members 
			</div>
			<div class='md-4 right'>
				
				<button class="sexyButtonright" onclick="document.querySelector('.user-filter').classList.toggle('hide');">Show/Hide Search</button>
			</div>
		</div>
			
<?php			

			
			
			
			$args = array(
						
							'blog_id' => '1',
							'orderby' => 'registered',
							'order' => 'DESC',
							'offset' => $paged ? ($paged * $number) : 0,
							'number' => $number
						
						);
						
						$blogusers = get_users( $args );
						$user_count = 0;
						
						echo "<div id='member-box'>";
						foreach ($blogusers as $user) {
						
							if ( $user_count < 3 ){
								
								if(userphoto_exists($user)  && get_field('sex', "user_" . $user->ID)){
								
									$social = 0;
							
							if( get_field('facebook_profile_link', "user_" . $user->ID) ) $social++;
							if( get_field('twitter_link', "user_" . $user->ID) ) $social++;
							if( get_field('instagram_link', "user_" . $user->ID) ) $social++;
							if( get_field('kik_name', "user_" . $user->ID) ) $social++;
							if( get_field('vine_username', "user_" . $user->ID) ) $social++;
							if( get_field('snapchat_username', "user_" . $user->ID) ) $social++;
							if( get_field('skype_username', "user_" . $user->ID) ) $social++;
							if( get_field('oovoo_username', "user_" . $user->ID) ) $social++;
							if( get_field('adam4adam_username', "user_" . $user->ID) ) $social++;
							if( get_field('bgc_username', "user_" . $user->ID) ) $social++;
							if( get_field('grindr_username', "user_" . $user->ID) ) $social++;
							if( get_field('jackd_username', "user_" . $user->ID) ) $social++;
							if( get_field('facetime_username', "user_" . $user->ID) ) $social++;
								
						?>		
					<div class=' col-md-4'>	
						<div class=" flip-container" ontouchstart="this.classList.toggle('hover');">
						<div class="flipper">
							<div class="front">
						
						
				<?php	
						echo '<a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
								
										echo '<div class="link upper bold white">'  . substr($user->display_name, 0, 15) . " <span style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: " . $social . "</span></div>";
										echo '<div class="mini-left">';
										userphoto($user->ID, '', '', array(style => '') ) ;
										//echo "Member Since<br>" . mysql2date('M j, Y', $user->user_registered );
										echo "</div>";
				
								
		if( get_field('user_age', "user_" . $user->ID ) ){
					echo '<b>Age:</b> ' . get_field('user_age', "user_" . $user->ID ) . '<br><br>';
		}else{
					echo '<b>Age:</b> Old <br><br>';
		}
		if( get_field('height_ft', "user_" . $user->ID) ){
					echo '<b>Height:</b> ' . get_field('height_ft', "user_" . $user->ID) . "' " . get_field('height_in', "user_" . $user->ID) . '"<br><br>' ;
		}else{
					echo '<b>Height:</b> Short <br><br>' ;
		}
		if( get_field('height_ft', "user_" . $user->ID) ){
					echo '<b>Weight:</b> ' . get_field('weight', "user_" . $user->ID ) . '<br><br>';
		}else{
					echo '<b>Weight:</b> Fat <br><br>';
		}
								
									echo "<div class='full upper bold white'>";
$closet = 0;
if ( get_field('city', "user_" . $user->ID ) && get_field('state', "user_" . $user->ID ) ){

										echo ' <span style="text-transform: capitalize;">' . get_field('city', "user_" . $user->ID ) . '</span>, ';
										echo get_field('state', "user_" . $user->ID ) ;

}
else if ( get_field('state', "user_" . $user->ID ) ){
	echo  get_field('state', "user_" . $user->ID );
}
else{
	$closet = 1;
	echo 'In The Closet ';
}
									echo "</div>";
										
									echo '</a></div>';
									$user_count++;
									
						?>					
				
								</div>
						<div class="back">
						
						
				<?php
					if($closet){
					echo '<a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
									echo "<div class='link'><center>I See you in there!</center></div>";
				?>	
							<a href="http://instaflixxx.com/user-profile/?ID=<?php echo $user->ID; ?>">
							<img width='188' height='118'  src='http://instaflixxx.com/wp-content/uploads/2014/01/In-The-Closet.jpg'><!--http://instaflixxx.com/wp-content/uploads/2014/01/tumblr_mz67yym77o1qitfceo1_250.gif-->
							</a>
						
				<?php	
						echo "<div class='full upper bold white'> View Full Profile </div>";
						echo '</div></a>';
				
					
					}else if( get_field('vine_hover', "user_" . $user->ID) ){
						echo '<a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
									echo "<div class='link'>" . substr($user->display_name, 0, 15) . " on Vine</div>";
				?>	
							<a href="http://instaflixxx.com/user-profile/?ID=<?php echo $user->ID; ?>">
							
							<img width='188' height='118' src='<?php echo get_field('vine_hover', "user_" . $user->ID); ?>'>
							</a>
						
				<?php	
						echo "<div class='full upper bold white'> View Full Profile </div>";
						echo '</div></a>';
					}else if(!$social){
					echo '<a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
									echo "<div class='link'>Random Vine Of the Week</div>";
				?>	
							<a href="http://instaflixxx.com/user-profile/?ID=<?php echo $user->ID; ?>">
							<img width='188' height='118' src='http://instaflixxx.com/wp-content/uploads/2014/01/instafixxx-vine.gif'>
							</a>
						
				<?php	
						echo "<div class='full upper bold white'> View Full Profile </div>";
						echo '</div></a>';
					}else{
					
						echo '<a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
									echo '<div class="link upper bold white">'  . substr($user->display_name, 0, 15) . " <span style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: " . $social . "</span></div>";
				?>					
						<table border='1'> 
						
							<?php 
								$add_social= 0;
							
								if( get_field('facebook_profile_link', "user_" . $user->ID) && $add_social < 3 ){ ?>
											<tr>
											<td>Facebook</td>
										<td><?php echo get_field('facebook_profile_link', "user_" . $user->ID); $add_social += 1;?></td>
										
										</tr>
									<?php }
									
										if( get_field('twitter_link', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>Twitter</td>
											<td><?php echo "<a target='_blank' href='http://twitter.com/" . get_field('twitter_link', "user_" . $user->ID) . "'>" . get_field('twitter_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
											
										</tr>
									<?php }
									
										if( get_field('instagram_link', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>Instagram</td>
											<td><?php echo "<a target='_blank' href='http://instagram.com/" . get_field('instagram_link', "user_" . $user->ID) . "'>" . get_field('instagram_link', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
											
										</tr>
									<?php }
									
										if( get_field('kik_name', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>KIK</td>
											<td><?php echo get_field('kik_name', "user_" . $user->ID);  $add_social += 1; ?></td>
											
										</tr>
									<?php }
									
										if( get_field('vine_username', "user_" . $user->ID)  && $add_social < 3  ){ ?>
										<tr>
											<td>Vine</td>
											<td><?php echo get_field('vine_username', "user_" . $user->ID);  $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('snapchat_username', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>Snapchat</td>
											<td><?php echo get_field('snapchat_username', "user_" . $user->ID); $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('skype_username', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>Skype</td>
											<td><?php echo get_field('skype_username', "user_" . $user->ID);  $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('oovoo_username', "user_" . $user->ID)  && $add_social < 3){ ?>
										<tr>
											<td>ooVoo</td>
											<td><?php echo get_field('oovoo_username', "user_" . $user->ID);  $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('adam4adam_username', "user_" . $user->ID)  && $add_social < 3){ ?>
										<tr>
											<td>Adam4Adam</td>
											<!--<td><?php echo get_field('adam4adam_username', "user_" . $user->ID);  $add_social += 1; ?></td>
											-->
											<td><?php echo "<a target='_blank' href='http://www.adam4adam.com/?p=" . get_field('adam4adam_username', "user_" . $user->ID) . "'>" . get_field('adam4adam_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>

										</tr>
									<?php }
									
										if( get_field('bgc_username', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>BGC Live</td>
											<td><?php echo "<a target='_blank' href='http://bgclive.com/" . get_field('bgc_username', "user_" . $user->ID) . "'>" . get_field('bgc_username', "user_" . $user->ID) . "</a>"; $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('grindr_username', "user_" . $user->ID)  && $add_social < 3 ){ ?>
										<tr>
											<td>Grindr</td>
											<td><?php echo get_field('grindr_username', "user_" . $user->ID);  $add_social += 1; ?></td>
										</tr>
									<?php }
									
										if( get_field('jackd_username', "user_" . $user->ID)  && $add_social < 3 ){ ?>	
										<tr>
											<td>Jack'd</td>
											<td><?php echo get_field('jackd_username', "user_" . $user->ID);  $add_social += 1; ?></td>
										</tr>
									<?php } 
									
										if( get_field('facetime_username', "user_" . $user->ID)  && $add_social < 3){ ?>	
										<tr>
											<td>Facetime</td>
											<td><?php echo get_field('facetime_username', "user_" . $user->ID);  $add_social += 1;?></td>
										</tr>
									<?php } 
									
										if( $social > 3 ){ 
										$add_social = $social-3;
										?>	
										
										<tr>
											<td colspan="2" >and (<?php echo $add_social; ?>) more...</td>
										</tr>
									<?php } ?>
								
							</table> 
							<br><br>
							
							<?php
							echo "<div class='full upper bold white'> View Full Profile </div>";
							echo '</div></a>';
							
							}//END ELSE
							?>
						
						</div>
					</div>
				</div>
			</div>
				<?php
								}
						
							}//END IF
						 
						} //End For-each
						
						
	?>
	<?php
					echo "</div>";
					
					
?>			
			

<div class='clear'></div><br>
<?php if(is_page('people')){  $userid = get_current_user_id();?>
	
	<div class='col-md-6'>
			<a href="http://instaflixxx.com/user-profile/?ID=<?php echo $userid; ?>#user-personal"><h2> View My Profile</h2> </a>
	</div>
	<div class='col-md-6'>
	
		<a href='http://instaflixxx.com/member-sign-up/'><h2>Sign Up Now</h2></a>	
	
	</div>
	
			<div class='clear'></div>
	
<?php } else { ?>

	<div class='col-md-6'>
			<a href='http://instaflixxx.com/people/?flip=Vines'><h2>View All Members</h2></a>
	</div>
	<div class='col-md-6'>
	
		<a href='http://instaflixxx.com/member-sign-up/'><h2>Sign Up Now</h2></a>	
	
	</div>
	
		
	<div class='clear'></div>	

		

<?php } ?>
	</div>
<!--   END HOMEPAGE -->	

<div id='user-filter' class='user-filter <?php if( is_home() ) echo "hide"; ?>'>
				
					<div class='clear'></div>
					
					<form name='state-filter' action='http://instaflixxx.com/people'>
							 
							Filter By State:
							
							<select name='state' >
								<option value="<?php echo $_GET['state']; ?>"> Choose a State </option>
								<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="DC">DC</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
							<select>
							
							Only Members w/ <input type='checkbox' name='photo' value='1'>Pics <input type='checkbox' name='no_social' value='1'>Social
							
							<!--<span style='color: #33335D; font-weight: bold; margin-left: 5px; background: #ffffff; padding: 2px; border: 1px solid;'>S: Social Sites</span>
					-->
					<!--<< <span style='color: red; font-weight: bold;'>New Feature</span> -->
				
					<a href='http://instaflixxx.com/users-mini'>
						<div class='mini-filter'>
							<div class='t-box'></div>
							<div class='t-box-long'></div>
							<div class='t-box'></div>
							<div class='t-box-long'></div>
							<div class='t-box'></div>
							<div class='t-box-long'></div>

						</div>
					</a>
					<a href='http://instaflixxx.com/users'>
						<div class='thumbnail-filter'>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
							<div class='t-box'></div>
						</div>
					</a>
					
							<hr>
							On Flip:
							<input type='radio' name='flip'  value='Vines' >Show Vines (if uploaded)
							<input type='radio' name='flip'  value='Social'>Show Social
							
							<input type='text' name='user' placeholder='Enter Username' >
							
							<input type='submit' value='Filter'>
							
							
							<!--<< <span style='color: red; font-weight: bold;'>New Feature</span> -->
							
							<?php 
							
							
							
								$users = get_users();
								$usercnt = count($users);
								echo "<div style='float: right; text-align: center; font-weight: bold; margin: -3px 0;'>Total Users: " . $usercnt . "<br><a href='http://instaflixxx.com/users-mini'>All Members</a></div>"; 
							?>
					</form>
					

				
				
				</div>