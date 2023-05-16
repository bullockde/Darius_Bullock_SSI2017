<?php 
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 * 
 * 
 * https://dlfreakfest.org/event_guests/versntopj/?confirm=218885&eventID=218840
 */
 get_header('single');
?>
<div class='clearfix mb-15'></div>

	<?php $user = wp_get_current_user(); ?>
	
<div class='col-md-8 single <?php if( !is_user_logged_in() &&	(get_field( 'member_level', $post->ID ) != 'Public') ){ echo "not-logged"; }  ?>'>
	
	
	
	<header class="entry-header">
    	<?php the_title( '<h2 class="entry-title1 text-center">', '</h2>' ); ?>	
    	
    	
    	
    </header>

	
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
<h4><?php 
			
					echo get_field( 'MX_user_age', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_height_ft', $lead->ID ); 
					echo "'";
					echo get_field( 'MX_user_height_in', $lead->ID );

					echo '" -- ';
					echo get_field( 'MX_user_weight', $lead->ID ); echo "<br><br>";
					echo get_field( 'MX_user_position', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_endowment', $lead->ID ); echo "in<br>";	
					
					?></h4>
					
					
					
					
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
							
						//	echo "+" . $user_post_count;
							$request_args = array(
							'author'        =>  $user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							);
							$user_requests = get_posts($request_args );
						//	echo "<br>+" . count($user_requests);
							
							$total = $user_post_count + count($user_requests);
							
							
							add_post_meta($lead->ID, "MX_user_request_count", $total, 1 );
							//update_post_meta(  $lead->ID, "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
						//	echo 'Number of posts published by user: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
					//		echo "<br>NEW TOTAL +" . get_post_meta($lead->ID, "MX_user_request_count",  1 );
							
				//	echo "<br>User ID: " . $user->ID . "<br>";
				?><br>
				
									<a target='_blank' href='/user-profile/?ID=</a><?php echo $user->ID; ?>' class='pmessage hidden btn-default btn-lg upper bold 1white'>View Profile</a>

				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>' class='pmessage btn-danger hidden btn-lg upper bold white'> Private Message</a>
				
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
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! " . $user_id->get_error_message();
			}
		//ssi_add_user( $ID );
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }
	
	
	
	
	
}
			?>
			
<!-- #### END-------->		


                        <h3>Rate All Guests to Confirm!</h3>



							<hr>
							<center><h4>Top <u>6</u> Guests</h4></center><hr>
							<?php 
							
							$eventID = $_GET['eventID'];
					$guests = get_posts( array (
						
					   'posts_per_page'         =>  -1,
					   'post_type' => 'event_guests',
						'category_name'                  => 'event' . $eventID ,
					   // 'order'                  => 'desc'
						'orderby'                => 'meta_value_num',
						//'meta_key'               => 'vortex_system_likes',
				// 		'orderby'                => 'orderby' => array( 
    //                         'post_date' => 'desc',
    //                         'meta_value_num' => 'DESC',
                       //  ),

				'meta_key'               => 'RATINGS_AVERAGE', 
						//'categories'	=>	array( -147 ),
					)     );
					$guest_count = 1;
					
					
					
					if( !count($guests) ){ echo "- no guests -<br>"; }
					foreach( $guests as $guest ){
					
						if( get_field( 'event_host' , $guest->ID ) == 'Yes' || $guest_count > 6 ){  continue; }
						?>
						<div class='1col-md-12 text-left'>
						    
						    	<?php 
			
				$MX_user_id = 0;
        		$MX_user_id = get_field( 'user_ID', $guest->ID );
        		if( get_field( 'MX_user_id', $guest->ID ) ){ $MX_user_id = get_field( 'MX_user_id', $guest->ID ); }
        		
			
			$guestID = $MX_user_id; ?>
							 	
							 	<div class="pull-left">
								    
								<?php
								
								//echo get_avatar($guestID, 30);
								?>
							 	</div>
								<h5 class="pull-left">
								    <div class='clear mb-5'></div>
								    <a target='_blank' href='/?p=<?php echo $guest->ID; ?>'>
								<?php
								
								echo get_avatar($guestID, 35);
								?>
								</a>
								<?php
								echo " &nbsp; ";
									echo ($guest_count) . ". ";
									$count++; ?>
								<a target='_blank' href='/p=?<?php echo $guest->ID; ?>'>
								<?php echo $guest->post_title;  ?>
								</a>
								
									
							
								| 
									<?php 
			
					echo get_field( 'MX_user_age', $guest->ID ); echo "&nbsp;";
				echo get_field( 'MX_user_height_ft', $guest->ID ); echo "' ";
					echo get_field( 'MX_user_height_in', $guest->ID ); echo " -- ";
					echo get_field( 'MX_user_weight', $guest->ID ); echo " | ";
				
				?></h5> &nbsp; 
					<span class='1pull-right 1hidden'>
					    <?php
				if(get_field( 'MX_user_position', $guest->ID ) != "" ){
					echo "<small>(" . get_field( 'MX_user_position', $guest->ID ) . ")</small>";
				}else{
					
					echo " -- ";
				}
				//	echo get_field( 'MX_user_endowment', $guestID ); echo "in<br>";	
					
					?>
					</span>
							
								 
							
							
								
							<div class='clear mb-5'></div>	
							<?php 
						//	echo ($guest_count) . ". ";
								$guest_count++;
							?>
							
								<?php 
							//	echo $guest->post_title; 
							//	echo get_avatar($guestID, 50);
								?>
								<div class='pull-right hidden1'>
								 <?php  echo do_shortcode( '[ratings id="'. $guest->ID  . '"]' ); ?>
							    </div>
						</div>

					<div class='clear'></div><hr>
				<?php
					}
					
						?>
					
						
</div>	
					
		<div class='clear'></</div><br>
		
		
		
				
				
				</center> </div>
			<div class='clear'></div>
			</a>
			
			<footer class="entry-footer">
			
			<?php edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $lead->ID ); ?>
		</div>
	<?php 
	
/*************  LEVEL: Contributor ************/

		if ( is_user_logged_in() && ( $user->roles[0] == 'contributor' || $user->roles[0] == 'administrator' ) ) {
			
			if( get_field( "preview_content", $post->ID ) ){ 
			
			?>
			
		
							<div id='member' class=' ' style='display: none;'>
							<?php 
								
								if( get_field( 'member_level', $post->ID ) == 'Public' || get_field( 'member_level', $post->ID ) == 'Premium' || get_field( 'member_level', $post->ID ) == 'Member' || get_field( 'member_level', $post->ID ) == 'Sponsored'  ){ 
							
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
			
			<br>
	<div class='clear'></div><hr>

<div class='clear'></div><hr>
							 <!--JuicyAds v2.0-><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
			<?php 
			
			
			
			
			
/*************  LEVEL: Subscriber ************/							
		}else if ( is_user_logged_in() && $user->roles[0] == 'subscriber' ) {
			
			
				if( get_field( "preview_content", $post->ID ) ){ 
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
								
								echo get_field( "preview_content", $post->ID );   
								?> 
							 </div>
							<div id='member' class=' ' style='display: none;'>
							<?php 
								
								if( get_field( 'member_level', $post->ID ) == 'Premium' ){ 
							
								echo "<h3><center>- This is a <u>Premium</u> Video -</center></h3>";
																
									if($user->roles[0] == 'administrator'){ echo "Your Member Level: Administrator"; }
									else if($user->roles[0] == 'subscriber'){ echo "<center>Your Member Level: <u>Standard</u></center>"; }
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
								
								//echo "<h1><center>JacK'up Your Membership!</center></h1>";
								?>
									
									
									<h2 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1</h2><br><h4 style="text-align: center; margin-top: 0;">Coupon Code: 24OFF <br><small>(Limited Time Only)</small></h4><br><p style="text-align: center;"><a class="btn btn-success btn-lg" href="/upgrade">Upgrade Now! </a></p><br>
								<?php 
							}else if( get_field( 'member_level', $post->ID ) == 'Member' ){
		 
								
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}


							?> 
							 </div>
							 
		<?php }else{
							if( get_field( 'member_level', $post->ID ) == 'Premium' ){ 
							
								echo "<h3><center>- This is a <u>Premium</u> Video -</center></h3>";
																
									if($user->roles[0] == 'administrator'){ echo "Your Member Level: Administrator"; }
									else if($user->roles[0] == 'subscriber'){ echo "<center>Your Member Level: <u>Standard</u></center>"; }
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
								
								echo "<h1><center>JacK'up Your Membership!</center></h1>";
								?>
									<h2 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1<br><small>(Limited Time Only)</small></h2><br><p style="text-align: center;"><a class="btn btn-lg btn-success" href="https://ssi.memberful.com/checkout?plan=13503">Upgrade Now! </a></p>
								<?php 
							}else if( get_field( 'member_level', $post->ID ) == 'Member' ){
		 
								
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
						}

				
					}	
		?>				 
		<div class='clear'></div><hr>
			<!-- #START Playlist-->
			<div class='playlist'>
				`<h3>Related Videos</h3>
	
				<?php
		wp_reset_postdata();

		$args = array(  'post_type' => 'video' , 'posts_per_page' => 4, 'orderby' => 'rand');

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		//print_r($post);
		//if(get_field('youtube_id', $post->ID)){
		
	?>
	
		<div class='col-xs-6 col-sm-3'>
			
			
		<?php 
			if ( has_post_thumbnail( $post->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						
				}
				
		?>
				

				<a href='/video/<?php echo $post->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
		</div>
				
		
		
	<?php 
		
		//}
		endforeach; 
		wp_reset_postdata();

		
	?>
	<div class='clear'></div>
	</div>

	
	
			
			
<!-- #END Playlist-->

<div class='clear'></div><hr>
		
							 <!--JuicyAds v2.0-><center>
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=468 height=72 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=504575></iframe></center>
<!--JuicyAds END-->
							 
						<?php 	 
						if( get_field( 'member_level', $post->ID ) == 'Public' || get_field( 'member_level', $post->ID ) == 'Sponsored'  ){ 

								if ( get_field( "preview_content", $post->ID ) ) {
							
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

								echo get_field( "preview_content", $post->ID );  

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
				
				
				if ( get_field( "preview_content", $post->ID ) ) {
							
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
								
								echo get_field( "preview_content", $post->ID );   
								
								?> 
							 </div>
							<div id='login' class=' ' style='display: none;'>
								<?php  

									if( get_field( 'member_level', $post->ID ) == 'Member' || get_field( 'member_level', $post->ID ) == 'Premium' ){ 
							
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
							if( get_field( 'member_level', $post->ID ) == 'Member' || get_field( 'member_level', $post->ID ) == 'Premium'){ 
							
								echo "<h3><center>- You Must Be a <u>Member</u> to Access -</center></h3>";
																
									echo '<br><br><center>' . do_shortcode('[wpmem_form login]') . '</center>';
									
							}else{
		 
								
							
								if( get_post_type( $post->ID ) == 'video' ){  echo "<h3>Patience .. Wins the Race ;-)</h3>"; }
							
										the_content(); 
										
		?> 
		<div class='clear'></div><hr>
			<!-- #START Playlist-->
			<div class='playlist'>
				`<h3>Related Videos</h3>	

				<?php
		wp_reset_postdata();

		$args = array(  'post_type' => 'video' , 'posts_per_page' => 4, 'orderby' => 'rand');

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		//print_r($post);
		//if(get_field('youtube_id', $post->ID)){
		
	?>
	
		<div class='col-xs-6 col-sm-3'>
			
			
		<?php 
			if ( has_post_thumbnail( $post->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						
				}
				
		?>
				

				<a href='/video/<?php echo $post->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
		</div>
				
		
		
	<?php 
		
		//}
		endforeach; 
		wp_reset_postdata();

		
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