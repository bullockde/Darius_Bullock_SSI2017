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

	<header class="entry-header hidden">
		<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>	

	</header>
	
	
	
	
	
				
							<!-- <strong>Session Request</strong>
							 <br>
							 <?php echo date( 'm/d/y', strtotime($request->post_date) ); ?>
		
							

							-->
				<div class='clearfix mb-15'></div>
				
		
				
							<div class='col-sm-6 well yellow'>
	
									
									
									
									
									
									<div class=" ">
											
												<div class="col-xs-5 col-md-4">
												
												
													<a target='_blank' href='/?p=<?php echo $post->ID; ?>' class=' '>
														<?php //echo do_shortcode("[bp_profile_gravatar]"); 
														
														
														
														?>
														
														
																<?php 
												
												echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
												
													$user = get_user_by('email', get_field( "MX_user_email", $post->ID ));
												
											
												
													if (  get_avatar($user->ID, 100)  ) {
														
														
									
														?>
														<center>
															<?php echo get_avatar($user->ID, 150); ?>
														</center>
														<?php 
													}else{
														?>
														<img src='http://www.gravatar.com/avatar/194803a51d4a564b26379aea65ac8fda?s=96&r=x&d=http%3A%2F%2Fdlfreakfest.org%2Fwp-content%2Fuploads%2F2019%2F11%2F5dde1c7720197-bpfull.jpg' class='img-responsive aligncenter' width='150'>
													
														<?php 
														
													}
										
												?>
												
												
														
														
													</a>
												
												
												
														

												</div>
												<div class="col-xs-7 col-md-8 text-center report">
												
													<b><?php echo "<h3>" . $post->post_title . '</h3>'; ?></b>
													<hr>
													
													<center>
													<?php	

															if( get_post_meta($post->ID, 'MX_user_age' , 1) ){
																		echo get_post_meta($post->ID, 'MX_user_age' , 1) . ' | ';
															}else{
																		echo '- | ';
															}
															if( get_post_meta($post->ID, 'MX_user_height' , 1) ){
																echo get_post_meta($post->ID, 'MX_user_height' , 1) . ' | ';
															}else if( get_post_meta($post->ID, 'MX_user_height_ft' , 1) ){
																		echo get_post_meta($post->ID, 'MX_user_height_ft' , 1) . "' " . get_post_meta($post->ID, 'MX_user_height_in' , 1) . '" | ' ;
															}else{
																		echo '- | ' ;
															}
															if( get_post_meta($post->ID, 'MX_user_weight' , 1) ){
																		echo get_post_meta($post->ID, 'MX_user_weight' , 1) . "<br>";
															}else{
																		echo '- <br>';
															}
																?>
													</center>
													
													<div class='clear mb-10'></div>
											
												<div class='text-center small'>
											
												<b><?php 
												
													$closet = 0;
																if ( get_post_meta($post->ID, 'MX_user_city', 1 ) && get_post_meta($post->ID, 'MX_user_state', 1) ){

																										echo ' <span style="text-transform: capitalize;">' . get_post_meta($post->ID, 'MX_user_city', 1 ) . '</span>, ';
																										echo get_post_meta($post->ID, 'MX_user_state', 1) ;

																}
																else if ( get_post_meta($post->ID, 'MX_user_state', 1) ){
																	echo  get_post_meta($post->ID, 'MX_user_state', 1);
																}
																else{
																	$closet = 1;
																	echo '-';
																}				
																
											?></b>
											</div>
											<div class='clear'></div><hr>
											
														<?php 
														echo  get_field( "MX_user_orientation", $post->ID ) . ' | ';

				echo get_field( "MX_user_position", $post->ID ) . ' | ';
				
				echo get_field( "MX_user_endowment", $post->ID );	
				
				
		 ?>

												</div>
										
												
												
												
															
									
												<div class='clear'></div>	
										<div class='well green hidden'>
													<h4>YungDADDY Requests<hr></h4>		
																
										<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
										
										<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
										
										<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
										
										
										
										</div>
												
													

											</div>
											
											
											
											<div class='clear'></div>	


		<?php
				if(get_user_by('email',get_field('MX_user_email', $post->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $post->ID));
							?>
							
							<div class='clearfix'></div><hr>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-lg btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $post->ID);
							//echo "MEMBER!!";
							
				}
			

		?>
		

									
									</div>	


                       
					
				<div class='col-md-6 text-center well green'>
				<div class='clearfix mb-10'></div>
				
					<div class=' col-xs-6'>
					
						<u><b>Date</b></u> <br><?php echo get_post_meta($post->ID, 'request_date', true) ?>
					</div>
					<div class=' col-xs-6'>
					
						<u><b>Time</b></u> <br><?php echo get_post_meta($post->ID, 'request_time', true) ?>
					</div>
				<div class=' clear visible-xs'><br></div>
					<div class=' col-xs-6'>
					<br>
						<u><b>Length</b></u> <br><?php echo get_post_meta($post->ID, 'request_length', true) ?>
					</div>
					<div class=' col-xs-6'>
					<br>
						<u><b>Budget</b></u> <br>$<?php echo get_post_meta($post->ID, 'request_min_budget', true) ?> - $<?php echo get_post_meta($post->ID, 'request_max_budget', true) ?>
					</div>
					
					<div class=' clear'></div>


					<?php
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
				
			
				<hr>
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
				
		 }

}
			?>
			
					
                   </div>
					
					
		<div class=' clear'></div>
		
		
		
		
	
	
	

		<div class='well text-center'>
		
				<div class="col-md-10 col-md-offset-1">

					
					<?php echo "<b><u>Fantasy</u></b><br>";
						?>
						(<?php if( get_field( "request_interest" ) ){ echo "" . get_field( 'request_interest' ) . ") <br><br>"; }  ?>
						

					<?php echo $post->post_content;  ?>
						<br><br>

						<br><br>


								
				
			<?php
				
				if( get_field( "request_donation" ) ){ echo "<b>Donation</b><br>" . get_field( "request_donation" ) . '<br>'; }
				if( get_field( "request_amount" ) ){ echo "" . get_field( 'request_amount' ); }
				
				

				
				
				
			?>
			</div>

			<div class='clear'></div>
		</div>

			<div class='clear'></div>
			
		
			
			
			
			<div class='text-center well green'>
				<b>Status</b>
				<br>
						<?php if(get_post_meta($post->ID, 'request_status')){ echo get_post_meta($post->ID, 'request_status', true); }else{ echo "Pending" ; } ?>

			<div class='clearfix'></div><br><br>
			
				<b>Final Products</b>
				<?php  //get_template_part('content', 'user-gallery'); 
				
						echo get_field( "final_products" );
					?>
			
			</div>
			<a target='_blank' href='/?p=<?php echo $post->ID; ?> ' class='btn btn-lg btn-default btn-block pulse hidden'> View Request &rarr; </a>
		

		
	
	</div>



	<div class='col-md-4 text-center'>

	    <div class='clearfix mb-15'></div>
	   
			<?php //get_template_part('content', 'user-gallery'); 
			
			?>
			
			
			<?php //get_template_part('content', 'sidebar-ads'); 
			
			?>
		
	</div>





	<div class='video-set well text-center'>
			
			
			
			<div class='clear'></div>
			
		 <center>
<div class='pix'>				
	
	<?php if( get_field( 'lead_image_1' ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1' );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1' );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2' ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2' );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2' );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3' ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3' );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3' );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4' ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4' );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4' );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
	
<div class='clear'></div>

		
		<?php 
		

				
		if( (in_array('display', $selected)  && has_post_thumbnail( $post->ID )) || current_user_can( 'manage_options' ) ){
		//	if( get_field( "MX_user_email" ) ){}else{  }
			

			}else{ 
		
		
		//	echo "- Login to View -<br>";
			
			if( !is_user_logged_in() ) {				
		?>
					<div class='col-sm-12 well yellow'>
					<center>
					
					<h3><small>Login to View</small><br>FULL PROFILE</h3><br>
					<div class='well green'>
					<?php echo do_shortcode('[wpmem_form login]'); ?>
					</div>
					
					<a href='/wp-login.php?action=lostpassword' class='btn btn-lg btn-default'> I forgot my Password &rarr; </a>
					
					
					</center>

					<div class='clear'></div><br>
					</div>	
		<?php
				}
			

		}
			
			?>
	
		
		
	
<div class='clear'></div>
			
			
			
			
			


			<div class='col-md-12'>
					
				<?php 
					echo "<center>" . get_field( 'member_level' ) . "</center>";
				?>

			</div>
					
					<!-- #### START -------->
<?php				

if( get_field( "name" ) &&  ( strlen($post->post_content) < 2 ) ){
		echo "<br> NONONO Email <br>";
		 $my_post = array(
      'ID'           => $post->ID,
	  
      'post_title'   => $post->post_title,
     'post_content' => $post->post_content,
//	'category_name' => 'expired',
	  'post_status' => 'draft'
  );
  wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email" ) ){
	//echo "<br> NONONO Email <br>";
	
		$user = get_user_by('ID', $post->post_author );
		
						
		 ?>
				<br>
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>' class='pmessage btn-danger btn-lg upper bold white'>Private Message</a>
			

		<?php
		
}
?>
<!-- #### END-------->		

					
						
					<?php // get_template_part('content', 'user-gallery'); 
					?>
			


					
		<div class='clear'></</div>
				
				
			
				</div>
			<div class='clear'></div>
			</a>
			

			
			<?php 
			 edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $post->ID ); ?>
			


		<div class='1well container-fluid'>
	
        
        	<?php
        
        		// If comments are open or we have at least one comment, load up the comment template.
        		if ( comments_open() || get_comments_number() ) {
        			comments_template();
        		}
        	?>
        </div> 
	
		
	<?php 
			
/*************  LEVEL: Contributor ************/

			
				
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
			<!-- #START Playlist-->'
			
			
			
</div>

</div>


		<div class='playlist well green text-left container-fluid'>
				`<h3 class="text-center">Recent Posts</h3>	<br>

				<?php
		//wp_reset_postdata();

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
		//wp_reset_postdata();

		
	?>
	<div class='clear'></div>
		
	</div>

<!-- #END Playlist-->

<div class='clear'></div>
<?php 	
										
							}
					}
							
						
						
		
	
	?>
	
</div>




<div class='clearfix'></div>

<?php  get_footer('mobile'); ?>