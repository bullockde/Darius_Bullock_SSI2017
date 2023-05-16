<!--           ###################  FEATURED MEMBERS  #####################       -->
				

 <!--   START HOMEPAGE -->

		
		<div id='featured-members' class='mini text-center '>
		
		<div class='tagline text-center'><hr><h2>Members Area</h2><hr></div>
		
		

		
		
		
		
			<?php 
			
			$current_user = array();
			
			if( is_user_logged_in()  ){ 
			
				$user = wp_get_current_user(); 
				$current_user = wp_get_current_user(); 
			
			?>
				<?php }else{
					
						$args = array(
							
								
								'orderby' => 'registered',
								'order' => 'ASC',
								'number' => 1
							
							);
							
							
							
							$guests = get_posts( array (  
						
									   'posts_per_page'         =>  -1,
									   'post_type' => 'party_guests',
										'category_name' => 'featured-guests',
										'orderby' => 'rand'
										
									)     );
									
									
						$email = get_field('vip_email' , $guests[0]->ID);

						
						
						
						
						$current_user = get_users( $args );
						$current_user = $current_user[0];
						
						$current_user = get_user_by_email($email);
				}				
				?>
			
			<div class='col-md-5 col-md-offset-1 col-xs-6 user text-center'>
			
			
							<?php if( is_user_logged_in() ){  echo '<h3>Welcome Back, ' . $current_user->user_login . '!</h3>'; }else{ 
							
							echo "<h3>Member Spotlight</h3>";

							 }  ?><div class="well">
								
						
									
					<div class='col-xs-5 text-center'>
					
					<br>
					
								<?php
								
								
								
									if ( !function_exists( 'bp_core_fetch_avatar' ) ) { 
											require_once '/bp-core/bp-core-avatars.php'; 
										} 
										  
										// An array of arguments. All arguments are technically optional; some will, if not provided, be auto-detected by bp_core_fetch_avatar(). This auto-detection is described more below, when discussing specific arguments. 
										$args = array( 
											'item_id' =>  $current_user->ID, 
											'object' => '', 
											'type' => '' ,
											'width' => '100px',  
											'height' =>'100px', 
										); 
									  
									// NOTICE! Understand what this does before running. 
									
									
									
				if(!userphoto_exists($current_user)){
					//echo bp_core_fetch_avatar($args);
					echo get_avatar($current_user->ID, 100);
					//userphoto($current_user->ID, '<div class="photo porn">', '</div>', array(style => 'width: 125px; height: 125px;') ) ;
					
				}else if(userphoto_exists($current_user)){
										
										
					userphoto($current_user->ID, '<div class="photo porn">', '</div>', array(style => 'width: 100px; height: 100px;') ) ;
					
				}else{
				
				?>
					<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class="photo">
					
				<?php } ?>

				
				
			<?php if( is_user_logged_in()  ){ ?>
			<div class='clear'></div>
			<a href='/members/instaflixxx/profile/change-avatar/' >Change Photo</a>
			
				<?php } ?>
									
									
					</div>
				<div class='col-xs-7  text-center'>
				<h4><?php echo $current_user->user_login; ?></h4>
				
				
							<div class='col-xs-6'><b>Age:</b> </div><div class='col-xs-6'> <?php			
					
		if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_age' , 1);
		}else{
					echo 'Young';
		}
	?></div>
				<div class='col-xs-6'><b>Ht:</b> </div><div class='col-xs-6'><?php			
					
		if( get_user_meta($current_user->ID, 'MX_height_ft' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_height_in' , 1);
		}else{
					echo 'Tall' ;
		}
	?> </div>
				<div class='col-xs-6'><b>Wt:</b> </div><div class='col-xs-6'><?php			
					
		if( get_user_meta($current_user->ID, 'MX_weight' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_weight' , 1);
		}else{
					echo 'Atletic ';
		}
	?> </div>
	

								</div>
								

									<div class='col-xs-7'>
										<div class='clear'></div> <hr>
										<div class='col-sm-4'>
											<b>LOC:</b>
										</div>
										<div class='col-sm-8'>  
												<p><?php 
														
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
									echo 'Philadelphia, PA ';
								}				
												
												?></p>
										
									</div>
									
									</div>

					
					<div class='clear'></div><hr>
					
			<?php		
					if( is_user_logged_in()  ){ 
			
				
			
			?>
			
			<div class='col-xs-6'>
									<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class=''>Edit Profile</a>
									</div>
									<div class='col-xs-6'>
						<a href='/wp-login.php?action=logout' class=''>Logout</a>
									</div>
									
									
				<?php }else{
					?>
						<div class='col-xs-12'>
						<a href='/user-profile/?ID=<?php echo  $current_user->ID; ?>' class=''>View Profile >></a>
									</div>
				
					<?php
				}				
				
				?>
					
					
					
												
									<div class='clear'></div> 
							
					
					</div>

					
					</div>

					<?php if( !is_user_logged_in() ){ ?>
	<div class='col-xs-6 col-md-5 user'>
		<div class='clear visible-xs'><br></div>
		<h3>Members Login</h3>
		 <button id='login' class='btn btn-info btn-lg btn-block'>Log In</button>
		
		
		<div id='login' class='login' style='display:none;'>
			<br>	
			<?php echo do_shortcode('[wpmem_form login redirect_to="/people"]'); ?>
		</div>
				
				
		<a href='/register/' class='btn btn-info btn-lg btn-block'>Sign Up (Free)</a>
		<a href='/people' class='btn btn-info btn-lg btn-block'>Browse Members</a>
		<a href='/people' class='btn btn-info btn-lg btn-block'>Member Search</a>
		</div>
	<?php }else{ ?>
			<div class='col-xs-6 col-md-5 user text-center'>
<!--
		<center><img width='40' src='/wp-content/uploads/2016/12/mailbox.png'>
	<a href="<?php echo bp_loggedin_user_domain() ?><?php echo BP_MESSAGES_SLUG ?>">Inbox (<?php echo messages_get_unread_count(); ?>)</a></center>

				
				<?php //echo dispMailbox(); ?>
				<div class='clear'></div><hr>-->
				
				
				<h3>My Account</h3>
				
				<a href='/members/<?php echo $user->display_name; ?>/messages/' class='btn btn-info btn-lg btn-block'>Mailbox</a>
		<?php $userid = get_current_user_id();

		//echo "<a href='/wp-admin/user-edit.php?user_id=" . $userid . "' class='btn btn-info btn-lg btn-block'> Edit Profile </a>"; 

		echo "<div class='clear'></div><a href='/user-profile/?ID=" . $userid . "' class='btn btn-info btn-lg btn-block'> View My Profile </a>"; 
		?>

		<a href='/people' class='btn btn-info btn-lg btn-block'>All Members</a>
		
		<a href='/wp-login.php?action=logout' class='btn btn-info btn-lg btn-block'>Logout</a>
		
			</div>
			
			<?php }?>
			
			<div class='col-md-4 col-sm-6 user'>
				<?php 
						
						dynamic_sidebar('Third Sidebar');
				?>
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
					?> 
					
					
		<div class='<?php if( 1 /*is_user_logged_in() */){ echo "hidden" ; }?>'><div id='member-box' class=''>
				<div class='col-md-4 col-md-offset-2 hidden-xs '>
					<!--  #  <h2>Member Spotlight</h2>-->
					<?php	
					
						foreach ($blogusers as $user) {
						
							if ( $user_count < 2 ){
								
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
						
						<div class='col-sm-12 '>
						
									
						
				<?php	
						echo '<a href="/user-profile/?ID=' . $user->ID . '"><div id="user">' ;
								
										echo '<div class="link upper bold white">'  . substr($user->display_name, 0, 15) . " <span style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: " . $social . "</span></div>";
										echo '<div class="col-xs-6">';
										//userphoto($user->ID, '', '', array(style => '') ) ;
										echo get_avatar($user->ID);
										//echo "Member Since<br>" . mysql2date('M j, Y', $user->user_registered );
										echo "</div>";
				
								
		if( get_field('user_age', "user_" . $user->ID ) ){
					echo '<br><b>Age:</b> ' . get_field('user_age', "user_" . $user->ID ) . '<br>';
		}else{
					echo '<br><b>Age:</b> Old <br>';
		}
		if( get_field('height_ft', "user_" . $user->ID) ){
					echo '<br><b>HT:</b> ' . get_field('height_ft', "user_" . $user->ID) . "' " . get_field('height_in', "user_" . $user->ID) . '"<br>' ;
		}else{
					echo '<br><b>HT:</b> Short <br>' ;
		}
		if( get_field('height_ft', "user_" . $user->ID) ){
					echo '<br><b>WT:</b> ' . get_field('weight', "user_" . $user->ID ) . '<br>';
		}else{
					echo '<br><b>WT:</b> Fat <br>';
		}
			?> 
			
			
			<div class='full upper bold white clear'>
			<?php
									
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
							
						?> 
		</div>
						</a></div>
						<?php			
									
									$user_count++;
									
						?>					
			
		
				</div>
				<div class='hidden-xs col-md-6 text-center'>
				
				</div>
				<?php
								}
						
							}//END IF
						 
						} //End For-each

	?>

	
	
	
	</div>
	<div class='member-split visible-xs visible-sm'></div>


	<?php if( !is_user_logged_in() ){ ?>
	<div class='col-md-4 user'>
		<div class='clear visible-xs'><br></div>
		<h2>Members Login</h2>
		<!--  #  <button id='login' class='btn btn-info btn-lg'>Log In</button>-->
		<a href='/login' class='btn btn-info btn-lg btn-block'>Log In</a>
		<a href='/register/' class='btn btn-info btn-lg btn-block'>Sign Up (Free)</a>
		<a href='/people' class='btn btn-info btn-lg btn-block'>View All Members</a>
		</div>
	<?php } ?>
	</div>
	<div class='clear'></div>
	<!--<button class="sexyButtonleft" onclick="document.querySelector('.user-filter').classList.toggle('hide');">Show/Hide Search</button> -->
	<?php
					echo "</div>";
					
					
?>			
			


<div class='clear'></div>
	</div>
<!--   END HOMEPAGE -->	

<div id='user-filter' class='hide user-filter <?php if( is_home() ) echo "hide"; ?>'>
				
					<div class='clear'></div>
					
					<form name='state-filter' action='/people'>
							 
							Filter By State:
							
							<select name='state' >
								<option value="<?php echo $_GET['state']; ?>"> Choose a State </option>
								<option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="DC">DC</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option>
							<select>
							
							Only Members w/ <input type='checkbox' name='photo' value='1'>Pics <input type='checkbox' name='no_social' value='1'>Social
							
							<!--<span style='color: #33335D; font-weight: bold; margin-left: 5px; background: #ffffff; padding: 2px; border: 1px solid;'>S: Social Sites</span>
					-->
					<!--<< <span style='color: red; font-weight: bold;'>New Feature</span> -->
				
					<a href='/users-mini'>
						<div class='mini-filter'>
							<div class='t-box'></div>
							<div class='t-box-long'></div>
							<div class='t-box'></div>
							<div class='t-box-long'></div>
							<div class='t-box'></div>
							<div class='t-box-long'></div>

						</div>
					</a>
					<a href='/users'>
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
								echo "<div style='float: right; text-align: center; font-weight: bold; margin: -3px 0;'>Total Users: " . $usercnt . "<br><a href='/people'>All Members</a></div>"; 
							?>
					</form>
					<div class='clear'></div>

				
				
				</div>
				
				<div class="clear"></div>
				

			
				
				<div class="clear"></div>
				
				

<!--      ###################  end  FEATURED MEMBERS  #####################      -->		