<?php 
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 get_header('login');
?>

	<?php $user = wp_get_current_user(); ?>
	
<div class='col-md-8  text-centersingle <?php if( !is_user_logged_in() &&	(get_field( 'member_level', $lead->ID ) != 'Public') ){ echo "not-logged"; }  ?>'>
	<div class='video-set well <?php if( $post->post_type == 'photo' || $post->post_type == 'video' ){ echo "hidden"; }  ?> '>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
				<a target='_blank' href='/?p=<?php echo $lead->ID; ?>'>
	
				<?php
	
					// Page thumbnail and title.
					//twentyfourteen_post_thumbnail();
					echo $lead->post_title;
				?>
				</a>
			</article><!-- #post-## -->


			<div class='col-md-12'>
				

				
			<?php 
				
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
				if(  get_field( 'MX_user_email', $lead->ID ) ) {
					
					$this_user = get_user_by('email', get_field( 'MX_user_email', $lead->ID ) );
					
					//update_field( 'user_ID' , $this_user->ID,  $lead->ID );
					//print_r($this_user->ID);
					
					?>
					
					<center>
					<?php echo get_avatar($this_user->ID); ?>
					</center>
					<?php
				}elseif ( has_post_thumbnail( $lead->ID ) ) {
					
				$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
						?>
						<a target='_blank' href='<?php echo esc_url( $large_image_url[0] ); ?>'>
							<img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'> 
						</a>
						<?php 
					}else{
						?>
						<a target='_blank' href='/?p=<?php echo $lead->ID; ?>'>	<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class='img-responsive aligncenter' width='150'>
						</a>
						<?php 
						
					}
		
				?>
			
				
			</div>

			
			<div class='clear'></div>
			
			<div> <center>
<div class='pix'>				
	<br>
	<?php if( get_field( 'lead_image_1', $lead->ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $lead->ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $lead->ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $lead->ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $lead->ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $lead->ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $lead->ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $lead->ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $lead->ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div>








			
						<?php
						
							if( get_user_by('email', get_field( "MX_user_email", $lead->ID) ) ){
									
									$user = get_user_by('email', get_field( "MX_user_email", $lead->ID));
									
									$is_user = true;
									
								}
							
								if( get_user_meta($user->ID, 'MX_user_age' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_age' , 1);  echo " -- ";
								}else{
									echo get_field( 'MX_user_age', $lead->ID); echo " -- ";
								}
								
								
							//echo get_user_meta($user->ID, 'MX_user_height', 1);
				
								if( get_user_meta($user->ID, 'MX_user_height_ft' , 1) ){
										echo get_user_meta($user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($user->ID, 'MX_user_height_in' , 1) . '"' ; echo " -- ";
								}else{
										echo get_field( 'MX_user_height', $lead->ID); echo " -- ";
								}

								
								if( get_user_meta($user->ID, 'MX_user_weight' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_weight' , 1);  echo "<br><br>";
								}else{
									echo get_field( 'MX_user_weight', $lead->ID); echo "<br><br>";
								}


								if( get_user_meta($user->ID, 'MX_user_position' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_position' , 1); 
								}else{
									echo get_field( 'MX_user_position', $lead->ID);
								}

								echo " -- ";
								
								if( get_user_meta($user->ID, 'MX_user_endowment' , 1) ){
									echo get_user_meta($user->ID, 'MX_user_endowment' , 1);   echo "in";
								}else{
									echo get_field( 'MX_user_endowment', $lead->ID); echo "in";
								}
								
								echo "<br>";	
							
							?>
		
					<!-- #### START -------->
<?php				

if( get_field( "name", $lead->ID ) &&  ( strlen($request->post_content) < 2 ) ){
		echo "<br> NONONO Email <br>";
		 $my_post = array(
      'ID'           => $lead->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
//	'category_name' => 'expired',
	  'post_status' => 'draft'
  );
  wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email", $lead->ID ) ){
	echo "<br> NONONO Email <br>";
}


if (current_user_can( 'manage_options' ) && get_field('MX_user_email', $lead->ID) ){
	
	
	if( get_user_by('email', get_field( "MX_user_email", $lead->ID ) ) ){
							
							$user = get_user_by('email', get_field( "MX_user_email", $lead->ID ));
							$arg = array(
									'ID' => $lead->ID ,
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
							
							
							add_post_meta($lead->ID, "MX_user_request_count", $total, 1 );
							//update_post_meta(  $lead->ID, "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
							echo '<br>Number of Requests: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
							//echo "<br>NEW TOTAL +" . get_post_meta($lead->ID, "MX_user_request_count",  1 );
							
					//echo "<br>User ID: " . $user->ID . "<br>";
				?>
				
				
				<br><br>
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", $lead->ID ) && !get_user_by('email', get_field( "MX_user_email", $lead->ID ) ) ){ 
		
	
					$role = 'author';
					
					
	$display_name = get_field( "request_username", $lead->ID );
		$username = 
		$email = get_field( "MX_user_email", $lead->ID );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		$password = null;
		$password = get_field( "request_password", $lead->ID );
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . $BLOK++ ; }
		else{  $name = get_the_title($lead->ID); }
			$display_name = $name;
			
			$userdata = array(
				'user_login'  =>  $display_name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  $password,  // When creating an user, `user_pass` is expected.
				'display_name' => $display_name,
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
	//			wp_update_user( $userdata );

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				//echo "<br>User created : ". $user_id;
			}else{
				//echo "<br>User Add FAILED!! " . $user_id->get_error_message();
			}
		//ssi_add_user( $ID );
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		
		<?php } ?>
		
		<?php }
	
	
	
	
	
}
			?>
			
<!-- #### END-------->		


				<div class='clear'></</div>
			
<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?>
</div>	
					
		<div class='clear'></div>
				
							
			<div class='col-sm-12 well yellow hidden'>
		<div class='col-sm-5'>
		<?php 
		
				
				 
				//echo "Posted By: " . $post->post_author;
				
				
				$user = get_user_by('email', get_field( "MX_user_email", $lead->ID ));
				$user = get_user_by('ID', $post->post_author );
				echo get_avatar( $user->ID );
				//echo get_field( "request_status", $lead->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $lead->ID );


					if( get_field( "met_before", $lead->ID )  ){ 
	//	echo "<br> NONONO Email <br>";
}else{
		echo "<br><br> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $lead->ID,
	  
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
			
			echo "<br>Age: " . get_field( "MX_user_age", $lead->ID ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height", $lead->ID ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight", $lead->ID ) . '<br><br> ';
		
			
			echo  get_field( "MX_user_city", $lead->ID ) . ', ';
			echo  get_field( "MX_user_state", $lead->ID ) . '<br> ';
			
		if( (in_array('display', $selected)  && has_post_thumbnail( $lead->ID )) || current_user_can( 'manage_options' ) ){
		//	if( get_field( "MX_user_email", $lead->ID ) ){}else{  }
			
			
		
		
			}else{ 
		
		
			echo "- Login to View -<br>";
			

		}
			
			?>
		</div>
	</div>	
			
				</center> </div>
			<div class='clear'></div>
			</a>
			
			<footer class="entry-footer">
			
			<?php edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $lead->ID ); ?>
		</div>
	<?php 
	
/*************  LEVEL: Contributor ************/

		if ( is_user_logged_in() && ( $user->roles[0] == 'contributor' || $user->roles[0] == 'administrator' ) ) {
			
			if( get_field( "preview_content", $lead->ID ) ){ 
			
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
						
						<div id='preview' class=' ' style='display: block;'>
								<?php 
								
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
									if( get_field( "preview_content", $lead->ID ) ){ 
									
										echo get_field( "preview_content", $lead->ID ); 
									}else{ 
										the_content(); 
									}
								  
								?> 
						


							 </div>
							<div id='member' class=' ' style='display: block;'>
							<?php 
								
								if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Premium' || get_field( 'member_level', $lead->ID ) == 'Member' || get_field( 'member_level', $lead->ID ) == 'Sponsored'  ){ 
							
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
							}
			
							?> 
							 </div>
							 
		 <?php }else{
				if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
				the_content(); 
				?>
				<br>
			<center><img width='25px' src='http://ssixxx.com/wp-content/uploads/2017/01/arrow-up.png'><br><img src=''><br><h4>Rate This Guest!!</h4></center>
				<?php } ?>
			
			<br>
	<div class='clear'></div><hr>

<div class='clear'></div><hr>
							 <!--JuicyAds v2.0-><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
			<?php 
			
			
			
			
			
/*************  LEVEL: Subscriber ************/							
		}else if ( is_user_logged_in() && $user->roles[0] == 'subscriber' ) {
			
			
				if( get_field( "preview_content", $lead->ID ) ){ 
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
								
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
								
								echo get_field( "preview_content", $lead->ID );   
								?> 
							 </div>
							<div id='member' class=' ' style='display: none;'>
							<?php 
								
								if( get_field( 'member_level', $lead->ID ) == 'Premium' ){ 
							
								echo "<h3><center>- This is a <u>Premium</u> Video -</center></h3>";
																
									if($user->roles[0] == 'administrator'){ echo "Your Member Level: Administrator"; }
									else if($user->roles[0] == 'subscriber'){ echo "<center>Your Member Level: <u>Standard</u></center>"; }
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
								
								//echo "<h1><center>JacK'up Your Membership!</center></h1>";
								?>
									
									
									<h2 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1</h2><br><h4 style="text-align: center; margin-top: 0;">Coupon Code: 24OFF <br><small>(Limited Time Only)</small></h4><br><p style="text-align: center;"><a class="btn btn-success btn-lg" href="/upgrade">Upgrade Now! </a></p><br>
								<?php 
							}else if( get_field( 'member_level', $lead->ID ) == 'Member' ){
		 
								
							
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}


							?> 
							 </div>
							 
		<?php }else{
							if( get_field( 'member_level', $lead->ID ) == 'Premium' ){ 
							
								echo "<h3><center>- This is a <u>Premium</u> Video -</center></h3>";
																
									if($user->roles[0] == 'administrator'){ echo "Your Member Level: Administrator"; }
									else if($user->roles[0] == 'subscriber'){ echo "<center>Your Member Level: <u>Standard</u></center>"; }
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
								
								echo "<h1><center>JacK'up Your Membership!</center></h1>";
								?>
									<h2 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1<br><small>(Limited Time Only)</small></h2><br><p style="text-align: center;"><a class="btn btn-lg btn-success" href="https://ssi.memberful.com/checkout?plan=13503">Upgrade Now! </a></p>
								<?php 
							}else if( get_field( 'member_level', $lead->ID ) == 'Member' ){
		 
								
							
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}

				
					}	
		?>				 
		<div class='clear'></div><hr>
			<!-- #START Playlist-->
			<div class='playlist text-center'>
				`<h3>OTher THoTs</h3>
	
				<?php
		

		$args = array(  'post_type' => 'ssi_breed' , 'posts_per_page' => 4, 'orderby' => 'rand');

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		//print_r($post);
		//if(get_field('youtube_id', $lead->ID)){
		
	?>
	
		<div class='col-xs-6 col-sm-3'>
			
			
		<?php 
			if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						
				}
				
		?>
				

				<a href='/video/<?php echo $post->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
		</div>
				
		
		
	<?php 
		
		//}
		endforeach; 
		

		
	?>
	<div class='clear'></div>
	</div>

	
	
			
			
<!-- #END Playlist-->

<div class='clear'></div><hr>
		
							 <!--JuicyAds v2.0-><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
							 
						<?php 	 
						if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Sponsored'  ){ 

								if ( get_field( "preview_content", $lead->ID ) ) {
							
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
								
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }

								echo get_field( "preview_content", $lead->ID );  

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
		 
								
							
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}
					}
					
/*************  LEVEL: Public ************/				
		}else{
				
				
				if ( get_field( "preview_content", $lead->ID ) ) {
							
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
								
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
								
								echo get_field( "preview_content", $lead->ID );   
								
								?> 
							 </div>
							<div id='login' class=' ' style='display: none;'>
								<?php  

									if( get_field( 'member_level', $lead->ID ) == 'Member' || get_field( 'member_level', $lead->ID ) == 'Premium' ){ 
							
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
							if( get_field( 'member_level', $lead->ID ) == 'Member' || get_field( 'member_level', $lead->ID ) == 'Premium'){ 
							
								echo "<h3><center>- You Must Be a <u>Member</u> to Access -</center></h3>";
																
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
							}else{
		 
								
							
								if( get_post_type( $lead->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
										
		?> 
		<div class='clear'></div><hr>
			<!-- #START Playlist-->
			<div class='playlist text-center'>
				`<h3>OTher THoTs</h3>	
				<hr>
				<?php
		//

		$args = array(  'post_type' => 'ssi_breed' , 'posts_per_page' => 4, 'orderby' => 'rand', 'post_status'=> 'publish' );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		//print_r($post);
		//if(get_field('youtube_id', $lead->ID)){
		
	?>
	
		<div class='col-xs-6 col-sm-3'>
			
			
		<?php 
			if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   				?>
				<a href='/ssi_breed/<?php echo $post->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' style='border-radius: 50%;' class='img-responsive aligncenter1'></a>
				<?php
				}else{
					
					?>
				<a href='/ssi_breed/<?php echo $post->post_name; ?>'> <img src='' class='img-responsive '> <?php echo get_avatar( $lead->ID, "160"); ?></a>
				<?php
				}
				
		?>
				

		</div>
				
		
		
	<?php 
		
		//}
		endforeach; 
		

		
	?>
	<div class='clear'></div>
	</div>

	
	
			
			
<!-- #END Playlist-->

<div class='clear'></div><hr>
<?php 	
										
							}
					}
							
						
						
		}  
	
	?>
	
</div>
<div class='col-md-4'>

			<center> 
									<script type="text/javascript">
var ad_idzone = "2471539",
	 ad_width = "300",
	 ad_height = "250";
</script>
<script type="text/javascript" src="https://ads.exoclick.com/ads.js"></script>
<noscript><a href="http://main.exoclick.com/img-click.php?idzone=2471539" target="_blank"><img src="https://syndication.exoclick.com/ads-iframe-display.php?idzone=2471539&output=img&type=300x250" width="300" height="250"></a></noscript>
			
			<!--JuicyAds v2.0   --  Video Bottom  -->

<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=300 height=262 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=498540></iframe>

<!--JuicyAds END-->
			</center>
			<?php 
		
		  
			
		
	?>	
	
</div>
<div class='clear'></div>

<div class='clear'></div>

<?php  get_footer(''); ?>