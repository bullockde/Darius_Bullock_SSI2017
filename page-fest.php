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
 */
 
 

get_header('network'); 





?>

			<div class='col-md-8 col-md-offset-2 '>
	
				<?php if( !is_paged() ){ get_template_part( 'content', 'upcoming-events' ); } ?>
			</div>

			<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'publish' , 'category_name' => 'top-thot' ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish', 'pending') , 'category_name' => 'thots' ));
			
		?>
		
		
<div id="" class="">

	<div id="" class="col-md-6 col-md-offset-3">
	<center>
	
		<!--<h4 class="text-center " >Submit A BREED Request:</h4><hr>-->
		<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
		<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>
		 
		<br><br>
	</center>
	</div>
	
	<div id="" class="col-md-6">
			<?php echo do_shortcode('[gravityform id="19" title="false" description="false"]'); ?>
	</div>
	<header class="entry-header text-center hidden">
		
		<?php //the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
	
	</header><!-- .entry-header -->



	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
			<div class=' photo hidden'>
				
			<div class='clearfix'></div><br>
				<h2>BreedBOY's - BREED LIST</h2><hr>
			
			</div>
		
		<div class='text latest-post hidden'>
				
			
			<?php
			
			
				$args = array( 'numberposts' => -1, 'post_type' => array( /*'ssi_models',*/ 'ssi_requests') , 'post_status' => array('publish', 'pending') , 'orderby' => 'modified', 'order' => 'desc'  );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					
					//print_r($recent);
					
				/*	
					
					if( get_post_meta( $recent["ID"] , 'request_username' ) ){
						
						echo "USERNAME";
						
						$username = get_post_meta( $recent["ID"] , 'request_username', 1  );
						update_post_meta( $recent["ID"] , 'MX_user_username', $username );
					}
					if( get_post_meta( $recent["ID"] , 'request_password' ) ){
						
						echo "USERNAME";
						
						$password = get_post_meta( $recent["ID"] , 'request_password', 1  );
						update_post_meta( $recent["ID"] , 'MX_user_password', $username );
					}
					
				*/
					?> 
				
				<?php				
					//echo $count++;
					echo " - ";
					//echo $recent->post_title;
					//echo "<hr>";
				?>
				
				<div class='text-center	col-md-6'>
				
				<?php 
				
				
				echo ++$count; ?>.  
				<?php echo  $recent["post_title"];  ?>
				
				</div>
				
				
				
						<?php 
						
						
							if( get_field( 'MX_user_email', $recent["ID"] ) ){ 
		
								if( get_user_by('email' ,get_field( 'MX_user_email',$recent["ID"] ) ) ){ //echo "HAS USER<br>"; 
								}else{ //echo "MAKE NEW USER"; 
								
									$email = get_field( 'MX_user_email', $recent["ID"] );
									
									$username = get_post_meta( $recent["ID"] , 'request_username', 1  );
									
									$password = get_post_meta( $recent["ID"] , 'request_password', 1  );
									
									$userdata = array(
										'user_login'  => $username ,
										'user_email' => $email,
										'user_pass'   =>  $password  // When creating an user, `user_pass` is expected.
									);

									$user_id = wp_insert_user( $userdata ) ;

									//update_field( 'user_ID' , $user_id , $lead->ID );
									//On success
									if ( ! is_wp_error( $user_id ) ) {
										//echo "User created : " . $user_id;
									}
								
								
								}
							//echo "HAS EMAIL<br>"; 
								//echo get_field( 'MX_user_email', $lead->ID );
							
							
							}
											
						
						
						
						
						
						if( /*get_user_by('email', get_field( "MX_user_email", $recent["ID"] ) )*/ 1 ){
							
							$user = get_user_by('email', get_field( "MX_user_email", $recent["ID"] ));
							
							
					//echo "User ID: " . $user->ID . "<br>";
				?>
				
					
					
					<a target='_blank' href='/user-profile?ID=<?php echo $user->ID; ?>'>
					
					<center>
					<?php 
					
					
					
					if ( has_post_thumbnail( $recent["ID"] ) ) {
    			
				$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'thumbnail' );	
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $recent["ID"] ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $recent->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
						?>
						<img src='<?php echo esc_url( $small_image_url[0] ); ?>' class='text-center circle' width='150'> 
						
						<?php 
					}else{
					
						echo get_avatar($user->ID);
					}
					
					?>
					</center>
					
					<?php
					echo get_field( 'MX_user_age', $recent["ID"] ); echo " -- ";
					echo get_field( 'MX_user_height', $recent["ID"] ); echo " -- ";
					echo get_field( 'MX_user_weight', $recent["ID"] ); echo "<br>";
					echo get_field( 'MX_user_position', $recent["ID"] ); echo " -- ";
					echo get_field( 'MX_user_endowment', $recent["ID"] ); echo "<br>";	
					
					?>
					
					</a>
					<div class='clearfix'></div><br>
				<div class='text-center col-sm-12'>
				

					<?php
					echo get_post_meta( $recent["ID"] , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta( $recent["ID"] , 'MX_user_state' , 1);
					?>
			
				</div>
				<div class='clearfix'></div><br>
				
						
					
				
				<div class='text-left col-sm-12'>
				

					<?php
					echo $recent["post_content"];
					?>
				</div>
				
				<div class='clearfix'></div><br><br>
				
				
				
			
				
				<?php if( is_user_logged_in() ){ ?>
				
					 <?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '' , '' , $recent["ID"] ); ?>
				
					<a target="_blank" href='/user-profile/?ID=<?php echo $user->ID ; ?>' class='btn btn-block btn-default'>View Profile >></a>

					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				<?php } ?>
				
				
				<?php
				}else{
					
					?>
					<a target="_blank" href='/user-profile/?ID=<?php echo get_field( 'user_ID', $user->ID ); ?>' class='btn btn-default'>View Profile >></a>
					<?php
				}
				
				?>
				
				
				
				<div class='clearfix'></div><hr>
				
				
				
					<?php
				//	echo get_the_post_thumbnail( $recent["ID"] , 'medium' );
					
					?> 
		<!--			   
					<br><br>
					<b><u>His Fantasy</u></b><br><br>
					<?php
					echo $recent["post_content"];
					
					?>
					<br><br>
					<b><u>Status</u></b><br>
					<?php				
					//echo --$count;
					echo "Pending";
					//echo $lead->post_title;
					//echo "";
				?>
				<br><hr>
				
		-->		
					<?php
					
					
				}
				//wp_reset_query();
				
				?>
				<div class='clearfix'></div><br><br>
				<?php
				
				
				$total_models = count($thots);
				
				//$count = count($thots); 
				$count = 1;
			
			?>
			</div>
	<div class='clearfix'></div>
		
		<?php if( is_user_logged_in()){ ?>
		<div class='clearfix'></div>
		
		<h4> <?php 
		
		if( is_user_logged_in()){
			echo 'Welcome, ' . $current_user->display_name . '!'; 
		}else{
			echo 'Welcome, <b>Stranger<b> !'; 
		}
		
		?> </h4><hr>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center hidden"><?php echo $current_user->display_name; ?></h4>
			<div class=" porn well">
									<center>
								<?php echo get_avatar($current_user->ID, 150); ?> 
									</center>
								</div>
								
								<div class='clearfix'></div><br>
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $current_user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			
			<div class='clearfix'></div><br>
			
			
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
				Height:
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
				Weight:
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
			
			<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block'>Edit Profile</a>

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
	</div>
		
		<?php } ?>
		
			
	<div class="stats">
						
			<!--<hr><h4>Welcome: </h4><hr>-->
			


			<div class='clearfix'></div>
					
				
				<div class="col-md-12">		
					<center>
					
						<div class=''>
			<h4>Join Today - 100% FREE!</h4><hr>
			
		
			
			<div id='join' style='display: block;'>
				<button id='join' class='btn btn-success btn-lg btn-block'>Join Now</button>
			</div>
			<div id='join' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form register]"); ?>
			</div>
			
			<br><h4>Already A Member?</h4><hr>
			
			<?php 
			
				if( /*is_user_logged_in()*/  1 ){
					?>
					<a href='/profile' class='btn btn-success btn-lg btn-block'>Enter Here >></a>
					<?php
				}else{
					?>
					<button id='login' class='btn btn-success btn-lg btn-block'>Login Here</button>
			<div id='login' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form login redirect_to='http://ssixxx.com/thots-home/']"); ?>
			</div>
					<?php
				}
			?>
			
			
		</div>
		
		
		<br>
						
		<div id="menu" style='display: none;'>
			<h3>Menu</h3>
			<a href='/thot-request' class='btn btn-block btn-default btn-lg hidden'>> Reqest a Session <</a>
			
			<a href='/profile' class='btn btn-block btn-info btn-lg'>Your Profile</a>
			<a href='/models' class='btn btn-block btn-info btn-lg hidden'>Our Models</a>
			<a href='/members' class='btn btn-block btn-info btn-lg'>Our Members</a>
			<a href='/mailbox' class='btn btn-block btn-info btn-lg'>Mailbox</a>
			<a href='/fantasy' class='btn btn-block btn-default btn-lg hidden'>> Post a Fantasy <</a>
			<button id='partners' class='btn btn-block btn-info btn-lg hidden'>Our Partners</button> 
			<div id='partners' style='display: none;'>
				<hr>
				<h4>Our Partners </h4><hr>
				<a href='http://instaflixxx.com' class='btn btn-block btn-default btn-lg'>InstaFliXXX</a>
				<a href='http://dlfreakfest.org' class='btn btn-block btn-default btn-lg'>DLFreakFest</a>
				<a href='http://ssixxx.com' class='btn btn-block btn-default btn-lg'>SSIxXx</a>
			</div>
			
		</div>					

					<div class='clearfix'></div>

					</center>
				</div>

				
						
								
	</div><!-- // container -->
		<!--	<div class='clearfix'></div>
		<hr><h4>Upgrade to Premium!</h4><hr>
		<p>- View All Member Profiles</p>
		<p>- Get Full Access to our Pix/Vids</p>
		<p>- Get Access to our Private Events</p>
		<p>- View Exclusive Model Content</p>
		<p>- Get Notified when we Make an Update!</p>
		<!--<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>
		<br>
		
		<div class='clearfix'></div>
		
		<div class='well'>
			<h4>1 Month - Just $30!</h4><hr>
			
			<a href='/vip' class='btn btn-success btn-lg btn-block'>Upgrade Now</a>
			
			
			
			
			
			<br><h4>Want a FREE Tour?</h4><hr>
			<button id='tour' class='btn btn-block btn-success btn-lg'>Start Now >></button> 
			<div id='tour' style='display: none;'>
				<hr>
			<h4>Premium Content </h4><hr>
			<a href='/photos' class='btn btn-block btn-info btn-lg'>Photos</a>
			<a href='/videos' class='btn btn-block btn-info btn-lg'>Videos</a>
			</div>
			
		</div>
		-->
	</div>



<div class='clear'></div>
	<div id="main" class="hoody-blk" role="main">
	
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			//get_template_part( 'template-parts/content', 'page' );


		//$page_slug = get_the_slug();
		
		//echo "SLUG-->" . $post->post_name;
		
		
		//echo $user->user_nicename;

		
		$args = array( 'post_type' => 'ssi_' . $post->post_name  , 'posts_per_page' => -1 );
		$leads = get_posts( $args );
	
		//print_r($leads);
		
		foreach( $leads as $lead ){
			
		
			
			?>
			<div class='well'>
			here<br>
			<?php echo $lead->post_title; ?>
			<br>
			<?php echo $lead->post_type; ?>
				<div class='col-sm-3 text-center'>
				
			
				</div>
				<div class='col-sm-6 text-left'>
					<h4><?php  echo ++$count . ". " . $lead->post_title; ?></h4>
					<br>
					
					<?php  echo $lead->post_content; ?>

					<br><br>
					
					
					<br>
					Posted By: 
					
					<?php 
					
				//	echo get_the_author_meta( $lead->ID ); 
					
					?>
					<?php $author_id=$lead->post_author; ?>
					<img src="<?php echo get_avatar_url( $author_id ); ?>" width="25" height="25" class="  circle avatar" alt="<?php echo the_author_meta( 'display_name' , $author_id ); ?>" />
					<?php the_author_meta( 'display_name' , $author_id ); ?> 
					<br><br>
					
					
					<?php 
					
							$Private = get_field( 'ssi_private', $lead->ID );
							
							if( $Private == "Yes" ){ echo "Private"; }else{ echo "Public";}
						?></u> -
					<?php
						$cats = get_the_category( $lead->ID ); 
					
					//print_r($cats );
					foreach( $cats as $cat ){ echo $cat->cat_name . " " . $post->post_title; }
					
					
					?>
					
					
						<div class='col-sm-12  hidden'>
				<h4 class='visible-xs'>Budget Summary</h4>
				
				
				<div class=' well'>
			
				<div class='col-xs-6'>
					Income:
				</div>
				<div class='col-xs-6'>
					$
					<?php 
					
						echo $tot_income;
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					Expense: 
				</div>
				<div class='col-xs-6'>
					$
					<?php 
						echo $tot_expense;
						
							?>
				</div>
					<div class='clear'><br></div>
				<div class='col-xs-6'>
					Left Over:
				</div>
				<div class='col-xs-6'>
					$
					<?php 
							echo $client_profit;
							?>
				</div>
				
				<div class='clearfix'></div>
			</div>
			
			
				<div class='pull-right hidden'>
					<?php 
						
						$due = ((($weeks) * $rate)+($security + $rate + $app_fee));
						echo "Invested --->$" . $initial_investment;
					
					

						$tot_owed  += $due;

						echo "<br>Left Over--->$" . $client_profit;
						
						$percent = round((float)$return_rate * 100 ) . '%';
						echo "<br>Return rate --->$" . $percent;
						echo "<br>Return Amount --->$" . $return_amount;
						
						
						$owed = ($due - $client_profit);

					$banked = $loss = 0;
					

					if( $owed < 0 || get_field( "move-out_date", $lead->ID ) ){
						if( $owed < 0 ){ 
							$banked = (-$owed);
							//echo "<br>BANKED: $" . $banked;
						 }
						else{ 
							$loss = $owed; 
							//echo "<br>LOSS: $" . $loss;

							
						}
						if( get_field( 'security_applied', $lead->ID ) == "yes"  ){ 
								//echo "<br>SECURITY APPLIED!!";
								$final = ((-$loss) + $security);
								//echo "<br>FINAL: $" . $final;
							}

						$owed = 0; 
					}
					//	echo "<br><br>Owed: $" . $owed; 
				
						

						$tot_due += $owed;
					?>
				
				</div>
			</div>
					
					
				</div>
				<div class='col-sm-3 text-center'>
					<a target='_blank' href='<?php echo $lead->guid; ?>'>
					<button class='btn-block'> >> </button>
					</a>
					
					
					
					<div class='clear'><hr></div>
					<a target='_blank' href='?p=<?php echo $lead->ID; ?>' class='btn btn-info btn-block'> >> </a>
					<?php if( get_field('website_link', $lead->ID ) ){?>
					<a href="//<?php echo get_field('website_link', $lead->ID ); ?>" target="_blank" class="btn btn-success btn-block btn-lg">  Visit Website >> </a>
					<?php }  ?>
					
				</div>
			
			
			<div class="clearfix"></div>
			</div>
			
			
		
			<?php
		
		}
		
		//get_template_part( 'content', 'budgets' );
		
		
		
		
		
?>
<div class="clear"></div>


				 <form method='post' action='/<?php echo $post->post_name; ?>' class='well hidden1'>
					 <br><br><h4 class='text-center'>Add New </h4><br>
				 
					 <input type='text' name='post_title' placeholder='Enter Title'><br><br>
					  <textarea type='text' name='post_content' placeholder='Enter Details..'></textarea><br><br>
					 
					 <input type='text' name='website_link' placeholder='www.YourWebsite.com'><br><br>
					 
					 
					 <div class='clearfix'></div><br>
						<div class='col-md-6'>
						<b>Start Date</b><br>
						<input  type="text" name="date_added" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" >
					</div>
						<div class='col-md-6'>
						<b>Target Date</b><br>
						<input  type="text" name="target_date" placeholder="mm/dd/yy" value="<?php echo current_time( 'm/d/y' ); ?>" >
					</div>
					<div class='clearfix'></div><br>
					
					
					
					
					 <input type='hidden' name='post_type' value='<?php echo 'ssi_' . $post->post_name; ?>'>
					 <input type='hidden' name='ID' value='<?php echo $post->ID; ?>'>
					 <input type='hidden' name='1new_post' value='true'>
					 <input type='submit' value='Add New' class='btn-block'>
				 </form>
<div class='clearfix'></div>

 

</div><!-- #post-## -->


<?php 		
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</div><!-- .site-main -->


</div><!-- .content-area -->
	<div class='clearfix'></div>
	
	
	
	
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>


<?php get_footer('kik'); ?>
