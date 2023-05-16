<?php 
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 get_header('members');
 
global $post;
?>



	<?php $user = wp_get_current_user(); ?>
	
<div class='col-md-8 single <?php if( !is_user_logged_in() &&	(get_field( 'member_level' ) != 'Public') ){ echo "not-logged"; }  ?>'>




	
	
	
	
		<div class=' well '>
					<div class='col-xs-6 col-sm-6'>
						
								<?php 
								
								echo "THoT #" .  get_post_meta( $post->ID, 'thot_number' , 1 )  . " | "; 
								?>
								<a href="/?p=<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></a>
								
						
					</div>
					
					
					<div class=' col-sm-6 text-right'>
					
						Level: <?php 
						
						if( $thot_level = get_post_meta( $post->ID, 'MX_user_level') ){
							echo get_post_meta( $post->ID, 'MX_user_level', true); 
						
						}else{
							//echo "1";
							//update_post_meta( $post->ID, 'MX_user_level', '1'); 
						}
						
						$request_cnt = 0;
						$user_requests = array();
						
						//echo "Author=" . $post->post_author;
						
						if(get_post_meta( $post->ID, 'MX_user_email')){
							//echo get_post_meta( $post->ID, 'MX_user_level', true); 
							//echo "<br>EMAIL!<br>"; 
							
							$email = get_post_meta( $post->ID, 'MX_user_email', true);
							
							$this_user = get_user_by("email", $email);
							
							$authorID = $this_user->ID;
							
							
							$request_args = array(
							'author'        =>  $this_user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							//update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if( $post->post_author > 0 ){
							

							$request_args = array(
							'author'        =>  $post->post_author ,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							//update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if(get_post_meta( $post->ID, 'MX_user_id')){
							
							$authorID = get_post_meta( $post->ID, 'MX_user_id', true);
							
							$request_args = array(
							'author'        =>  $this_user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							//update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
						}
						
							
							
							
							
						
						
						?>
					</div>
					
					
					<div class='clearfix'></div><br>
					
					<?php if( $thot_level == 1 ){ ?>
					<div class='well yellow'>
					<div class='col-xs-6 hidden'>
									<b><?php echo get_post_meta($post->ID, 'name', true); ?></b>
								</div>
								<div class='col-xs-12 text-center'>
									<b>Level 1</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='col-xs-6'>
									I am a:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($post->ID, 'gender', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									Seeking:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($post->ID, 'seeking', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									I Prefer:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($post->ID, 'person', true); ?>
								</div>
								<div class='clearfix'></div>
						</div>		
						<?php } ?>

						<div class='clearfix'></div>
						<?php if( $thot_level == 2 ){ ?>
						<div class='well yellow'>
					
								<div class='col-xs-12 text-center'>
									<b>Level 2</b>
									
										
											<center><h2>You MUST upload a Photo!</h2><br>-- Face is NOT Required --<br><br>
											  <a href='/members-list/<?php echo $user->user_nicename; ?>/profile/change-avatar/' class='btn btn-warning'>Upload Image</a>

				</center>	
								</div>
								
								
								
								<?php //get_template_part('content', 'add-profile'); ?>
								
								<div class='clearfix'></div>
								
						</div>
                        <?php } ?>
						
						<?php if( $thot_level == 3 ){ ?>
						<div class='col-xs-12 text-center'>
						<div class='well yellow'>
									<b>Level 3</b>
									
										
										<center><h2>Complete Your Profile!</h2><br>-- BLANK profiles will be deleted --<br><br>
										   <a href='/edit-profile/?ID=<?php echo $user->ID; ?>' class='btn btn-warning'>Edit Profile</a>

											</center>		
								</div>
								</div>
							<?php } ?>	
								<?php if( $thot_level == 4 ){ ?>
						<div class='well yellow'>
					
								<div class='col-xs-12 text-center'>
									<b>Level 4</b>
								</div>
								
								<div class='clearfix'></div><hr>
								
								
								<center><h2>Make a THoT Request!</h2><br>-- Plan Our 1st Session --<br><br>
										   <a href='/thot-request' class='btn btn-warning'>Request Now &raquo;</a>

											</center>		
											
									<div class='clearfix'></div><hr>		
								<div class='text-center'>
									# of Requests: <?php echo $request_cnt; ?>
								</div>
								
									<div class='profile-social text-center'>
			
			<h3><u><?php if( $request_cnt > 8 ){ echo "0"; }else{ echo $request_cnt; } ?></u> Requests</h3>
		</div>

		<?php
		if( $request_cnt < 8 ){
			foreach( $user_requests as $request ){
		?>
		<div class='well'>
		
		
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			if( has_post_thumbnail( $request->ID )  ){
				echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			}else{
				?>
				<div class="alignleft">
				<?php
				echo get_avatar();
				?>
				</div>
				<?php
			}
		?>

		
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			
			
			?>
			<div class='row'>
				<div class='col-md-6'>
					<b><u>Date</u></b><br>
				
					<?php
						if( get_field( "request_date" ) ){ echo get_field( "request_date" ); }else{ echo "-"; }
						
						?>
				</div>
				<div class='col-md-6'>
					<?php
						if( get_field( "request_time" ) ){ echo "<b><u>Time</u></b><br>" . get_field( "request_time" ); }
					?>
				</div>
				<div class='clearfix'></div>
			</div>
		<div class='clearfix'></div>
		<?php
		
				
				if( get_field( "request_date", $request->ID ) ){ echo "Date: " . get_field( "request_date", $request->ID ) . ' ...  <br>'; }
					if( get_field( "request_time", $request->ID ) ){ echo "Time: " . get_field( "request_time", $request->ID ) . ' ...  <br>'; }
				
				if( get_field( "request_length", $request->ID ) ){ echo "<br> - <b>" . get_field( "request_length", $request->ID ) . '</b> - '; }
				
				if( get_field( "request_interest", $request->ID ) ){ echo " " . get_field( "request_interest", $request->ID ) . " "; }
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				
			?>
			
			<div class='clear'></div>	
			
			
				<a target='_blank' href='/?p=<?php echo $request->ID; ?> ' class='btn btn-lg btn-default btn-block pulse hidden1'> View Request &rarr; </a>
		</div>
		
		<div class='clear'></div>	
		<?php
			}
		}
		?>
		
				

			<a href='/train?ID=<?php echo $post->ID; ?>' class='btn btn-block btn-success hidden pulse'>Level Up &rarr;</a>
				<div class='clearfix'></div>
			
							<div class='clearfix'></div>	
					</div>
	
	<?php } ?>
	

	
		<div class='well'>
		<br>
	
	
		

	
	 <center>

			
			
			<div class='col-sm-12 well yellow'><br>
		<div class='col-sm-5'>
		<?php 
		
				
				 
				//echo "Posted By: " . $post->post_author;
				
				$user = get_user_by('ID', $post->post_author );
				$user = get_user_by('email', get_field( "MX_user_email" ));
				echo $user->display_name . "<br>";
				echo get_avatar( $user->ID );
				//echo get_field( "request_status", $post->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent" );


					if( get_field( "met_before" )  ){ 
	//	echo "<br> NONONO Email <br>";
}else{
		//echo "<br><br> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $post->ID,
	  
      'post_title'   => $post->post_title,
     'post_content' => $post->post_content,
	
	  'post_status' => 'pending'
  );
 ///wp_update_post( $my_post );
		
		
}		

			?>
			<div class='clearfix'></div>
			
			
		</div>
		
		<div class='col-sm-7'>
	
		<?php 
			echo "<h4>Basic Stats</h4>";
			
			echo "<br>Age: " . get_field( "MX_user_age" ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height" ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight" ) . '<br> ';
		
			
			echo  get_field( "MX_user_city" ) . ', ';
			echo  get_field( "MX_user_state" );
			
			
			
			
				
		if( (in_array('display', $selected)  && has_post_thumbnail( $post->ID )) || current_user_can( 'manage_options' ) ){
		
			
			
		
		
			}else{ 
		
		
		//	echo "- Login to View -<br>";
			
			if( !is_user_logged_in() ) {				
		?>
					
					<center>
					
					<h3><small>Login to View</small><br>FULL PROFILE</h3><br>
					<div class='well green'>
					<?php echo do_shortcode('[wpmem_form login]'); ?>
					</div>
					
					<a href='/wp-login.php?action=lostpassword' class='btn btn-lg btn-default'> I forgot my Password &rarr; </a>
					
					
					</center>

					<div class='clearfix'></div><br>
		<?php
				}
			

		}
			
			?>
		</div>
		
		
		
		<?php
				if(get_user_by('email',get_field('MX_user_email', $post->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $post->ID));
							?>
							
							<div class='clearfix'></div><hr>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $post->ID);
							//echo "MEMBER!!";
							
				}
			

		?>
		
		
		
		
		
	</div>	
			
			
			
			
			
<div class='clearfix'></div>

			<div class='col-md-12'>
					
		

				
			<?php 
				
				echo "<center>" . get_field( 'member_level' ) . "</center>";
	
				?>
			
				
			</div>


					
					
					
					<!-- #### START -------->
<?php				

if( get_field( "name" ) &&  ( strlen($post->post_content) < 2 ) ){
		
		 $my_post = array(
      'ID'           => $post->ID,
	  
      'post_title'   => $post->post_title,
     'post_content' => $post->post_content,
//	'category_name' => 'expired',
	  'post_status' => 'draft'
  );
  //wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email" ) ){
	//echo "<br> NONONO Email <br>";
	
		$user = get_user_by('ID', $post->post_author );
		
						
		 ?>
				
			<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				
				
				
				
			
		<?php
		
		
}




if (current_user_can( 'manage_options' ) && get_field('MX_user_email', $post->ID) ){
	
	
	if( ( $user = get_user_by('email', get_field( "MX_user_email" ) ) ) || ( $user = get_user_by('ID', $post->post_author ) ) ){
		
							//$user = get_user_by('ID', $post->post_author );
							
							//$user = get_user_by('email', get_field( "MX_user_email" ));
							$arg = array(
									'ID' => $post->ID ,
									'post_author' => $user->ID,
								);
							//	wp_update_post( $arg );
							$user_post_count = count_user_posts( $user->ID , 'ssi_requests' );
							
							//echo "+" . $user_post_count;
							$request_args = array(
							'author'        =>  $user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							//echo "<br>+" . count($user_requests);
							
							$total = $user_post_count + count($user_requests);
							
							
							add_post_meta($post->ID, "MX_user_request_count", $total, 1 );
							//update_post_meta(  $post->ID, "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
						//	echo 'Number of posts published by user: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
							//echo "<br>NEW TOTAL +" . get_post_meta($post->ID, "MX_user_request_count",  1 );
							
					//echo "<br>User ID: " . $user->ID . "<br>";
				?>
				
			
				<br>
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				<br><br>
				<?php
				}else{ 
				
		 }
	
	
	
	
}


		
			?>
			
<!-- #### END-------->		
						<div class='clearfix'></div>
					<?php get_template_part('content', 'user-gallery'); ?>
			<div class='clearfix'></div>
			

<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?> 
</div>	
					
		<div class='clear'></</div>
				
				
				</center> </div>
			<div class='clear'></div>
			</a>
			
			<footer class="entry-footer">
			
			<?php 
			
			
			edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $post->ID ); ?>
		</div>
		
		
		
		<div class='clearfix'></div><br>
	<?php 
	
/*************  LEVEL: Contributor ************/

		if ( is_user_logged_in() && ( $user->roles[0] == 'contributor' || $user->roles[0] == 'administrator' ) ) {
			echo "HERE2";
			if( get_field( "preview_content" ) ){ 
			
			?>
			
			<div class='options text-center'>	
							<h3>Oh Look!! ... Options...  =)</h3>
							<div class=' col-xs-6 well'>
								Public Version
								<br><br>
								<button id='preview' class='btn-warning'>Click Here </button>
								
							</div>
							<div class=' col-xs-6 well'>
								Member Version
								<br><br>
								<button id='member' class='btn-warning'>Click Here </button>
								
							</div>
							
							<div class='clear'></div>
						</div>
						
						<div id='preview' class=' ' style='display: none;'>
								<?php 
								
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
									if( get_field( "preview_content" ) ){ 
									
										echo get_field( "preview_content" ); 
									}else{ 
										the_content(); 
									}
								  
								?> 
						


							 </div>
							<div id='member' class=' ' style='display: none;'>
							<?php 
								
								if( get_field( 'member_level' ) == 'Public' || get_field( 'member_level' ) == 'Premium' || get_field( 'member_level' ) == 'Member' || get_field( 'member_level' ) == 'Sponsored'  ){ 
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
							}
			
							?> 
							 </div>
							 
		 <?php }else{
				if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
				the_content(); 
				?>
				<br>
			<center><img width='25px' src='http://ssixxx.com/wp-content/uploads/2017/01/arrow-up.png'><br><img src=''><br><h4>Rate This Guest!!</h4></center>
				<?php } ?>
			
		
	<div class='clear'></div><hr>

<div class='clear'></div>
				
			<?php 
			
			
			
			
			
/*************  LEVEL: Subscriber ************/							
		}else if ( is_user_logged_in() && $user->roles[0] == 'subscriber' ) {
			
			
				if( get_field( "preview_content" ) ){ 
				
				echo "HERE1";
			 ?>
			 
			 	
							 
		<?php }else{
			
			echo "HERE3";
							if( get_field( 'member_level' ) == 'Premium' ){ 
							
								echo "<h3><center>- This is a <u>Premium</u> Video -</center></h3>";
																
									if($user->roles[0] == 'administrator'){ echo "Your Member Level: Administrator"; }
									else if($user->roles[0] == 'subscriber'){ echo "<center>Your Member Level: <u>Standard</u></center>"; }
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
								
								echo "<h1><center>JacK'up Your Membership!</center></h1>";
								?>
									<h2 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1<br><small>(Limited Time Only)</small></h2><br><p style="text-align: center;"><a class="btn btn-lg btn-success" href="https://ssi.memberful.com/checkout?plan=13503">Upgrade Now! </a></p>
								<?php 
							}else if( get_field( 'member_level' ) == 'Member' ){
		 
								
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}

				
					}	
		?>				 


							 
						<?php 	 
						if( get_field( 'member_level' ) == 'Public' || get_field( 'member_level' ) == 'Sponsored'  ){ 

								if ( get_field( "preview_content" ) ) {
							
							?>
							<div class='clear'></div>
							
						<div class='options text-center'>	
							<h3>Oh Look!! ... Options...  =)</h3>
							<div class=' col-xs-6 well'>
								Public Version
								<br><br>
								<button id='preview' class='btn-warning'>Click Here </button>
								
							</div>
							<div class=' col-xs-6 well'>
								Member Version
								<br><br>
								<button id='login' class='btn-warning'>Click Here </button>
								
							</div>
							
							<div class='clear'></div>
						</div>
						
							<?php 
							 if($user->roles[0] != 'contributor'){ /*echo "<center><a href='/login/ ' class='btn btn-danger btn-block btn-lg'> Login or Sign Up to Gain FULL ACCESS >>></a> </center><br>"; */}
							 
							 ?>
							 <div id='preview' class=' ' style='display: none;'>
								<?php
								
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }

								echo get_field( "preview_content" );  

								?> 
							 </div>
							<div id='login' class=' ' style='display: none;'>
								<?php echo do_shortcode('[wpmem_form login]');   ?> 
							 </div>
							 
							<!--JuicyAds v2.0--><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
							<?php 
							if($user->roles[0] != 'contributor'){ /*echo "<br><center><a href='/login/ ' class='btn btn-danger btn-block btn-lg'> Login or Sign Up to Gain FULL ACCESS >>></a> </center>"; */}
							
						}else{
		 
								
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}
					}
					
/*************  LEVEL: Public ************/				
		}else{
				
				
				if ( get_field( "preview_content" ) ) {
							
							?>
							<div class='clear'></div>
							
						<div class='options text-center'>	
							<h3>Oh Look!! ... Options...  =)</h3>
							<div class=' col-xs-6 well'>
								Public Version
								<br><br>
								<button id='preview' class='btn-warning'>Click Here </button>
								
							</div>
							<div class=' col-xs-6 well'>
								Member Version
								<br><br>
								<button id='login' class='btn-warning'>Click Here </button>
								
							</div>
							
							<div class='clear'></div>
						</div>
						
							<?php 
							 if($user->roles[0] != 'contributor'){ /*echo "<center><a href='/login/ ' class='btn btn-danger btn-block btn-lg'> Login or Sign Up to Gain FULL ACCESS >>></a> </center><br>"; */}
							 
							 ?>
							 <div id='preview' class=' ' style='display: none;'>
								<?php 
								
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
								
								echo get_field( "preview_content" );   
								
								?> 
							 </div>
							<div id='login' class=' ' style='display: none;'>
								<?php  

									if( get_field( 'member_level' ) == 'Member' || get_field( 'member_level' ) == 'Premium' ){ 
							
								echo "<h3><center>- <u>Login</u> to Access -</center></h3>";
																
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
							}

								?> 
							 </div>
							 
							<!--JuicyAds v2.0--><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
							<?php 
							if($user->roles[0] != 'contributor'){ /*echo "<br><center><a href='/login/ ' class='btn btn-danger btn-block btn-lg'> Login or Sign Up to Gain FULL ACCESS >>></a> </center>"; */}
							
						}else {
							if( get_field( 'member_level' ) == 'Member' || get_field( 'member_level' ) == 'Premium'){ 
							
								echo "<h3><center>- You Must Be a <u>Member</u> to Access -</center></h3>";
																
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
							}else{
		 
								
							
										
										
		?> 
		<div class='clear'></div>
			<!-- #START Playlist-->
			<div class='playlist well yellow'>
				`<h3 class="text-center">Other Posts</h3>	<br>

				<?php
		wp_reset_postdata();

		$args = array(  'post_type' => 'ssi_requests' , 'posts_per_page' => 4, 'orderby' => 'rand');

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		//print_r($post);
		//if(get_field('youtube_id', $post->ID)){
		
	?>
	
		<div class='col-xs-12 '>
			
			
			
			
			<div class='clear'></div>
			
			<h4> <a href='/requests/<?php echo $post->post_name; ?>'> <?php echo $post->post_title; ?> </a> <small>  ( <?php echo get_post_meta($post->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($post->ID, 'MX_user_state', true); ?> ) -- <?php echo get_the_date( 'F d - h:i A' , $post->ID ); ?> </small></h4>
			
			
			
			<br>
			
			<a href='/requests/<?php echo $post->post_name; ?>'>
			
			
		<?php 
			if ( has_post_thumbnail( $post->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );	

				}
				
		?>
				
				 <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive  hidden aligncenter'></a>
		</div>
				
		
		
	<?php 
		
		//}
		endforeach; 
		wp_reset_postdata();

		
	?>
	<div class='clear'></div>
	</div>

	
	
			
			
<!-- #END Playlist-->

<div class='clear'></div>
<?php 	
										
							}
					}
							
						
						
		}  
	
	?>
	
</div>
<div class='col-md-4 text-center'>

	<div class='clearfix'></div>
		<?php get_template_part('content', 'user-gallery'); ?>
		
		<?php get_template_part('content', 'sidebar-ads'); ?>
		

</div>
<div class='clear'></div>



<?php  get_footer('kik'); ?>