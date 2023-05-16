<?php
/**
 * Template Name: Profile Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */
$count = 0;
$Model_ID = 0;
$userid = 0;
$current_user = 0;

 
		if( !isset( $_COOKIE['free-tokens'] ) ){
				$num = 2;
				$current_user = wp_get_current_user(); 
				
				update_user_meta( $current_user->ID, 'MX_user_tokens', $num );
				$tokens = get_user_meta( $current_user->ID, 'MX_user_tokens' ,1);
				setcookie( "free-tokens", $tokens, time() + (86400 * 30), "/");

			}
			 if( is_user_logged_in()  ){ 
			
				
				$user = wp_get_current_user(); 
				//print_r($user); 
				//$user = $user[0];
				$userid = $user->ID;
				$current_user = get_userdata( $userid );
	}
 
 if( isset($_POST['edit_profile'] ) ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			//update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val , "user_" . $current_user->ID );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		echo "<h1 class='text-center'> PROFILE UPDATED!! </h1>";
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
		wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
			
get_header('profile'); ?>


<div class="b-profile__header 1ads 1ad-shift 1img-thumbnail  ">


	<div class="b-profile__header__cover">
	<?php // Get the Cover Image

		$member_cover_image_url = false;
        $member_cover_image_url = bp_attachments_get_attachment('url', array(
          'object_dir' => 'members',
          'item_id' => $current_user->ID,
        ));

        if ( !$member_cover_image_url ) {
        	$member_cover_image_url = ""; 
        	?>
             	<div class=" 1porn well yellow  <?php if($member_cover_image_url) echo "hidden"; ?>">
				<center>
					<h5 class="hidden">Header Image</h5>

					<div class='clearfix mb-0'></div>

				<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-cover-image/">
				

					<img src="<?php echo $member_cover_image_url; ?>" alt="">
					<div class='clearfix mb-0'></div>
					
					Upload Photo &rarr;<br><br><br>
				</a>
				</center>
			</div>
             
             

            <?php
        }else{
            
            ?>
             <img src="<?php echo $member_cover_image_url; ?>" srcset="<?php echo $member_cover_image_url; ?> 480w,<?php echo $member_cover_image_url; ?> 760w, <?php echo $member_cover_image_url; ?> 600w" sizes="(max-width: 480px) 480px,(max-width: 760px) 760px, 600px" alt="IamYungDADDY" class="b-profile__header__cover-img">

            <?php
        }
      ?>
 
      
	 
	

	
	<!-- <img src="<?php echo $member_cover_image_url; ?>" width="100%" height="180" > -->
	
	<div class="clearfix"></div>

	
	
	<div class="cover profile-stats text-center">
		<div class="col-md-8 col-md-offset-2 profile-stats">

		<div class="col-md-2">
			<div class="clearfix mb-10"></div>
			<a href="/members-list/thotmaster/profile/change-avatar/">
				<?php echo get_avatar($current_user->ID, 150); ?>
			</a>
			<div class="clearfix"></div>

		</div>
		<div class="col-md-10">
			<div class="clearfix"></div>
			
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/blog">
					<span class="h2">
						<?php 
							echo count_user_posts( $current_user->ID  );
						 ?>
					</span><br>
					Blogs
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/photos">
					<span class="h2">
						<?php 
						
							echo count_user_posts( $current_user->ID , "ssi_photos"  );
							
							//echo count_user_posts_by_type($current_user->ID, 'ssi_photos');
						?>
					</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/videos">
					<span class="h2">
					
					
					
						
						<?php 
						
						
							echo count_user_posts( $current_user->ID , "ssi_videos"  );
							//echo count_user_posts_by_type($current_user->ID, 'ssi_videos'); 		 ?>

					</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well h4 hidden-xs">
				<a href="/requests">
					<span class="h2">

						<?php 
					
					
							echo count_user_posts( $current_user->ID , "ssi_requests"  );
							
							//echo count_user_posts_by_type($current_user->ID, 'ssi_requests')
						 ?></span><br>
					Requests
				</a>
			</div>

			<div class="clearfix"></div>

			
		</div>	

		</div>
		
		</div>
		</div>

		<div class="clearfix"></div>
	</div>

	<div class="clearfix"></div>



		<div class="clearfix 1mb-10"></div>
	<div class="text-center  mb-0">
		<?php 
			if ( is_user_logged_in() ) {
				echo '<h3>Hey Wassup, <a href="/user-profile">' . $current_user->display_name . '</a>!</h3>';
			}else{
				?>
				
				
				
				<?php
			}
		?>
		
	</div>

<div class="clearfix mb-10"></div>

	<div class='1container-fluid col-sm-6 text-center yellow col-sm-offset-3'>

		<?php 
			//echo dispMailbox(); 
		?>

	</div>
	
		
		
		


		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>




		
			<?php 
			/* get_template_part('content','kings');*/


				$fansKEY = 'MX_user_onlyfans';
				$fans_slug = 'onlyfans';
				$fans_link = '//onlyfans.com/';
				$fans_name = "Add Username";

				if( get_user_meta($current_user->ID, $fansKEY , 1)){ $fans_name = get_user_meta($current_user->ID, $fansKEY , 1); }

				$cashKEY = 'MX_user_cashapp';
				$cash_slug = 'cashapp';
				$cash_link = '//cash.app/';
				$cash_name = "Add Username";

				if( get_user_meta($current_user->ID, $cashKEY , 1)){ $cash_name = get_user_meta($current_user->ID, $cashKEY , 1); }


				$metaKEY = 'MX_user_twitter';
				$post_slug = 'twitter';
				$website_link = '//twitter.com/';


				$tumblr_name = "Add Username";

				if( get_user_meta($current_user->ID, $metaKEY , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				if( get_user_meta($current_user->ID, $post_slug . "_link" , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				
				
				if( get_user_meta($current_user->ID, $metaKEY , 1)
					|| get_user_meta($current_user->ID, $post_slug . "_link"  , 1)
				
				 ){  
				 
				 // echo $tumblr_name; 
				$tumblr_name =  str_replace(".","",$tumblr_name);
				 $tumblr_name =  str_replace("tumblr","",$tumblr_name);
				 $tumblr_name =  str_replace("com","",$tumblr_name);


				}

			  ?>



		<div class="social hidden">
				

				<form method="post">
			
				<div class="col-md-4 mb-10 well <?php if($fans_name != "Add Username" ) echo "1hidden";  ?>">
					OnlyFans <br>
					



						 <a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $fans_slug;  ?>.png' width='65' height='65'>
						 </a>
						 
						 <div class="clearfix mb-5"></div>
							<h5 id='<?php echo $fans_name;  ?>' class='walls'><a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><?php echo $fans_name;  ?></a> </h5>
						 
							<div class="clearfix mb-15"></div>

							<?php if ( !get_user_meta($current_user->ID, $fansKEY , 1) || ( get_user_meta($current_user->ID, $fansKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_onlyfans" placeholder="Username" value="<?php echo $fans_name;  ?>" class="text form-control">
							<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $fans_link;  ?><?php echo $fans_name;  ?>' class='btn btn-block  btn-primary'> Visit Now &raquo; </a>
								<?php
							} ?>

							
						 
						
						
						<div class="clearfix 1mb-10"></div>
				

				</div>
				<div class="col-md-4 mb-10 well <?php if($cash_name != "Add Username" ) echo "1hidden";  ?>">
					CashAPP <br>
				
					 <a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $cash_slug;  ?>.png' width='65' height='65'>
					 </a>
					 
					 <div class="clearfix mb-5"></div>
						<h5 id='<?php echo $cash_name;  ?>' class='walls'><a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><?php echo $cash_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>


						<?php if ( !get_user_meta($current_user->ID, $cashKEY , 1) || ( get_user_meta($current_user->ID, $cashKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_cashapp" placeholder="Username" value="<?php echo $cash_name;  ?>" class="text form-control">
								<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $cash_link;  ?><?php echo $cash_name;  ?>' class='btn btn-block  btn-success'> Send / Request &raquo; </a>
								<?php
							} ?>

							

						
					 
					
					
					<div class="clearfix 1mb-10"></div>



				</div>
				<div class="col-md-4 mb-10 well <?php if($tumblr_name != "Add Username" ) echo "1hidden";  ?>">
					Twitter <br>
				
					 <a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $post_slug;  ?>.png' width='65' height='65'>
					 </a>
						<div class="clearfix mb-5"></div>
						<h5 id='<?php echo $tumblr_name;  ?>' class='walls'><a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><?php echo $tumblr_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>
					 

					 <?php if ( !get_user_meta($current_user->ID, $metaKEY , 1) || ( get_user_meta($current_user->ID, $metaKEY , 1) == "Add Username" ) ) {
						?>
						<input type="text" name="MX_user_twitter" placeholder="Username" value="<?php echo $tumblr_name;  ?>" class="text form-control">
			 			<input type="submit" class="submit btn-block" value="Link Now">
						<?php
					}else{

								?>
								<a target='_blank' href='<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>' class='btn btn-block  btn-primary'> Visit Twitter &raquo; </a>
								<?php
							} ?>

					 	
					
					
					<div class="clearfix 1mb-10"></div>

					</div>

					




			


		

					<div class='clearfix'></div>
					<input type='hidden' name='edit_profile' value='true'>

				</form>
		
		</div>
		
		
	
		
		<div class='col-sm-10 col-sm-offset-1 text-center'>
		    <div class="mini-profile well ">
			&dArr; This is How You Appear Online &dArr;
			
		
			
			
<div class='clearfix mb-10'></div>
			

	<div class="mini-profile well 1row mb-0 green">
			<div class="col-xs-5 col-md-4">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<center>
						<?php 
					
							echo "<center>" . get_user_meta($current_user->ID, 'member_level' , 1) .  "</center>";
					
					
						
							if (  1  ) {
								//$avatar_URL  = get_avatar_url();
								
		    
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
						<p class="link upper bold">edit</p> 

						</center>

					</a>
				

				</div>
				<div class="col-xs-7 col-md-8 text-center report ">
				
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
			<div class='clearfix mb-10'></div>
					
				
		
			
		

	</div>
		



				<div class='clearfix mb-5'></div>
								
				<div class="col-md-8 col-md-offset-4 well mb-0 green1 pad-0 ">	
				<small>Social Links: </small>
					
		<?php 
			$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );
		
		
		foreach( $social as $site ){ // print_r($site->post_name);				
			
			
			//echo get_field( $lead->post_name  , $lead->ID );
			
			if( get_user_meta($current_user->ID, $site->post_name , 1)
				|| get_user_meta($current_user->ID, "MX_user_" . $site->post_name , 1)
			
			 ){ 

				$social_count[$index]++;	
				$param_name = "MX_user_" . $site->post_name;
				$param_val = get_user_meta($current_user->ID, $site->post_name , 1);
				//update_post_meta( $lead->ID, $param_name, $param_val  );
				
			?>
				<a target='_blank' href='<?php echo get_field( 'website_link' , $site->ID ); ?><?php echo get_user_meta($current_user->ID, "MX_user_" . $site->post_name  , 1); ?>'><img width='25' src='
<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $site->post_name; ?>.png'  class=''>
</a>


			<?php 		}
			$index++;
			?>	
			<?php 		
		}
		
		
		
	?>	


 <a type="button" class="btn btn-default btn-sm hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal2-social" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
 
 

			</div> 
																	
						<div class='clear'></div>
			

                 

				
				
					</div>
			<div class='clear mb-10'></div>	
						
					<div class="btn-group btn-group-justified">
				  <a type="button" class="btn btn-default 1btn-md hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal-edit" data-show="true">Edit Profile</a>

					<a href="/edit/" class="btn btn-default hidden">Edit Profile</a>
					<a  href="/profile/" class="btn btn-info">View Profile</a>
				
					</div>
							
		
	
				
				
			

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
			<div class='clear mb-0'></div>	
		</div>
		
		
		<div class='clear mb-10'></div>	
			<div class='well  1login col-sm-8 text-center col-sm-offset-2 1 mb-0'>


            	

			

		<div class='1col-sm-6 text-center hidden '>



		<div class="social-form well green row nmb-0">
			
			<form method="post">
				<div class='clearfix'></div>
				
				<div class="col-md-3 mb-5 h5 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-onlyfans.png"> </div> <div class="col-md-9"><input type="text" name="MX_user_onlyfans" placeholder="Onlyfans Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_onlyfans" , 1); ?>" class="form-control" ></div>

				<div class='clearfix mb-10'></div>
				<div class="col-md-3 mb-5 h5 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-cashapp.png"> </div> <div class="col-md-9"> <input type="text" name="MX_user_cashapp" placeholder="CashAPP Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_cashapp" , 1); ?>" class="form-control" ></div>
		

				<div class='clearfix mb-10'></div>
				<div class="col-md-3 mb-5 h5 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-twitter.png"> </div> <div class="col-md-9"><input type="text" name="MX_user_twitter" placeholder="Twitter Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_twitter" , 1); ?>" class="form-control" ></div>

				<div class='clearfix mb-10'></div>
				
				<input type='hidden' name='edit_profile' value='true'>
					
				<input type='submit' value='Update Social' class='btn btn-success btn-block' style='padding: 1em; '>
			</form>
		</div>

					
			
			
			
				
				<div class='clearfix'></div>
				
				<?php 
				
				
					$admin_user = 0;
						$allowed_roles = array('editor', 'administrator');
					if ( is_user_logged_in() && array_intersect($allowed_roles, $current_user->roles ) ) {
						$admin_user = 1;
						
					}
										
				
				if( ($userid == $current_user->ID) || $admin_user ){ ?>
				<a href='/kik-edit/' class='btn btn-warning btn-block hidden'>Edit Profile</a>
				<div class='clearfix'></div>
				<?php } ?>
				<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		
		<div class='clearfix mb-0'></div>

	
								
					<!--			<div class='clear'></div><hr><h3>Album Uploads -  <a type="button" class="btn btn-default 1btn-md hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal2-post" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> New Post</a></h3><hr>
	 
	 

            
            -->
	
	
	
	
	
	
	<div id='user-personal'>
				
		
			
				<div id='user-info'>
				    
				    
				    
			<div class="1col-md-12  well yellow  text-left">

							<h4 class="1entry-title text-center"><a href="/user-profile/">Your Posts</a></h4><hr>

								<div class='clearfix mb-5'></div>
									
			
								Requests: <a target='_blank' class='pull-right' href='/requests'>	
								<?php	//echo " " . $requests_count = count_user_posts_by_type($current_user->ID, 'ssi_requests'); 
								?>
								</a>
								<!--<br>G Photos: <a  target='_blank' class='pull-right' href='/gallery'>-->
								<!--<?php	//echo "" . $photo_count = count_user_posts_by_type($current_user->ID, 'g_galleries');
								 ?>-->
								<!--</a>-->
								<hr>Photos: <a  target='_blank' class='pull-right' href='/photos'>
								<?php	//echo "" . $photo_count = count_user_posts_by_type($current_user->ID, 'ssi_photos'); 
								?>
								</a>
								<hr>Videos: <a  target='_blank' class='pull-right' href='/videos'>
								<?php	//echo "" . $video_count = count_user_posts_by_type($current_user->ID, 'ssi_videos'); 
								?>
								</a>
								<hr>Events: <a  target='_blank' class='pull-right' href='/events'>
								<?php	//echo "" . $events_count = count_user_posts_by_type($current_user->ID, 'ssi_events');
								 ?>
								</a>
								<hr>Blogs: <a  target='_blank' class='pull-right' href='/blog'>
								<?php	//echo "" . $blog_count = count_user_posts( $current_user->ID  ); 
								?>
								</a>
								
								<br><hr><b>Total Posts: 
								<a  target='_blank' class='pull-right' href='#'>								
								<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
									
									echo "" . $total_count; ?>
	
									</a>
									</b>
					</div>
				    
				    
				    

<?php   $count++;  ?>

	
							

            <div class='clear mb-0'></div>
					
						

	
		<div class='clear'></div>
	
	
								<div class='clear'></div>
	 <a type="button" class="btn btn-default 1btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-photos" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> Photos
	 
	 </a>
  
  
  
    <a type="button" class="btn btn-default 1btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-post" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> New Post </a>

	
	
	
	 <a type="button" class="btn btn-default btn-lg hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-post" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> New Post</a>
	
		<div class='clear'></div>	

	
	

<a target='_blank' href='/photos' class='btn btn-info btn-block hidden'> All Photos >></a>
			<div class='clear'></div>
			
			
			
			
		

	
	
		
			
		
<a target='_blank' href='/post' class='btn btn-lg btn-success btn-block pulse'> New Post &raquo; </a>
	
	



	
		
		
	
</div>

</div>

</div>



<div class='clearfix'></div>


		
		
		<div class='profile-social text-center mb-0 well blue'>
			<?php $add_social = 0; ?>
			<h3>Social Links</h3>
		
		
	
		<div class="col-sm-12 text-left">
		
				
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


			
				


				
				
				<?php get_template_part( 'ad' , '468-60' ); ?>

				
		

		

	
	
	</div>
	
	
					
					<div class='clearfix'></div>
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden1'><br> All Members &raquo;<br> <br>  </a>
		
		
				<?php //get_template_part( 'ad', '300-250-1' ); ?>

			
		<?php }else{ ?>
		
		
	            
				<div class="clearfix"></div>



	
	<div class="text-center  mb-0">
	    
	 
		<?php 
			if ( is_user_logged_in() ) {
				//echo '<h3>Hey Wassup, <a href="/user-profile">' . $current_user->display_name . '</a>!</h3>';
			}else{
				?>
				
				<a class="white1 h4 mb-10 bold" href="/add">Join Now - 100% FREE!</a> 
				<div class="clearfix mb-10"></div>
				<?php
			}
		?>
		

	</div>
	
	<div  class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 text-center">
				    
				<div class="well mb-10  blue">
				<?php // echo do_shortcode(" [wpmem_form register] "); 
				
				
				?>
				
				
				<div id='login' style='display: block;' class='h5'>
        				<?php echo apply_shortcodes('[miniorange_social_login theme="default"]') ?>
        				<div class='clearfix mb-0'></div>
        				
        				
        			<?php if ( !is_user_logged_in() ) { ?>	
        				
        				<button id='login' class='btn btn-success btn-lg 1btn-block'>Member Login</button>
        				
        				<?php } ?>	
        			</div>
        			
        			
					<div class='clearfix mb-0'></div>
					
					
					
        			<div id='login' style='display: none;'>
        				<?php echo do_shortcode("[wpmem_form login redirect_to='/edit']"); ?>
        			</div>
					
					
					
				</div>
					<div class='clearfix mb-0'></div>
	</div>
			
					<div class='clearfix mb-0'></div>
				</div>
		<?php } ?>
		<div class='clearfix mb-0'></div>


	</div>

<div class='clearfix '></div>

</div>
<?php 
	get_footer(""); 
?>