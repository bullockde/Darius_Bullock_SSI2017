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

 
		if( !isset( $_COOKIE['free-tokens'] ) ){
				$num = 2;
				$current_user = wp_get_current_user(); 
				
				update_user_meta( $current_user->ID, 'MX_user_tokens', $num );
				$tokens = get_user_meta( $current_user->ID, 'MX_user_tokens' ,1);
				setcookie( "free-tokens", $tokens, time() + (86400 * 30), "/");

			}
			
			
get_header('profile'); ?>

<head>
	<style type="text/css">
		.mb-10{
			margin-bottom: 10px; 
		}
		.mb-20{
			margin-bottom: 20px; 
		}
		.b-profile__header {
		    
		    position: relative;
		}
		.b-profile__header__cover-img {
		    -o-object-fit: cover;
		    object-fit: cover;
		    
		    left: 0;
		    top: 0;
		    width: 100%;
		    max-height: 180px;
		}
		.b-profile__header .well {

		    background-color: rgba(5, 79, 117, 0.4) !important;
		    
		    border: 1px solid #e3e3e3;
		    border: 0;
		    color: #fff;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		    box-shadow: inset 0 0px 25px #1a1a1a;
		    border-top: 1px solid #6f8590;
		    text-shadow: -1px 2px #233307;

		}
		.b-profile__header a {
		    color: #fff;
		    text-decoration: none;
		}
		.b-profile__header a:hover {
		    color: #6f8590;
		    text-decoration: none;
		}
		#wpmem_reg legend, #wpmem_login legend {
		    font-size: 24px;
		    line-height: 1.7em;
		    font-weight: 700;
		    margin-bottom: 10px;
		    width: 100%;
		    color: #2f3c43;
		}
		.well.login {
		    min-height: 20px;
		    /* padding: 19px; */
		    margin-top: 0;
		    padding: .7em .7em 0;
		    margin-bottom: 20px;
		    background-color: #f5f5f5;
		    border: 1px solid #e3e3e3;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		}
		.well.login .or {
		    background: #7d796e;
		    padding: 1em;
		    text-transform: uppercase;
		    color: #fff;
		    margin-bottom: 1.2em;
		}

		.well.yellow.login {
		    background-color: #c0b7a4 !important;
		}

		

		
	</style>
</head>




<div class="b-profile__header 1ads 1ad-shift 1img-thumbnail 1container ">


	<div class="b-profile__header__cover">
	<?php // Get the Cover Image

		$member_cover_image_url = false;
        $member_cover_image_url = bp_attachments_get_attachment('url', array(
          'object_dir' => 'members',
          'item_id' => $current_user->ID,
        ));

        if ( !$member_cover_image_url ) {
        	$member_cover_image_url = ""; 
        }
      ?>
 
      
	 
	 <img src="<?php echo $member_cover_image_url; ?>" srcset="<?php echo $member_cover_image_url; ?> 480w,<?php echo $member_cover_image_url; ?> 760w, <?php echo $member_cover_image_url; ?> 600w" sizes="(max-width: 480px) 480px,(max-width: 760px) 760px, 600px" alt="IamYungDADDY" class="b-profile__header__cover-img">


	
	<!-- <img src="<?php echo $member_cover_image_url; ?>" width="100%" height="180" > -->
	
	<div class="clearfix"></div>

	
	
	<div class="row profile-stats text-center">
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
							echo ( count_user_posts_by_type($current_user->ID, 'ssi_photos') + count_user_posts_by_type($current_user->ID, 'g_galleries') );
						?>
					</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/videos">
					<span class="h2">
						<?php 
							echo count_user_posts_by_type($current_user->ID, 'ssi_videos')
						 ?>

					</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well h4 hidden-xs">
				<a href="/requests">
					<span class="h2">

						<?php 
							echo count_user_posts_by_type($current_user->ID, 'ssi_requests')
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

</div>

		<div class="clearfix mb-10"></div>
	<div class="text-center  h3 mb-0">
		<?php 
			if ( is_user_logged_in() ) {
				echo 'Welcome, ' . $current_user->display_name . '!';
			}else{
				?>
				<a href="/add">Join Now - 100% FREE!</a> 
				<?php
			}
		?>
		
	</div>

<div class="clearfix"></div><br>

	<div class='col-sm-6 text-center yellow col-sm-offset-3'>

		<?php 
			echo dispMailbox(); 
		?>

	</div>
	<div class='well login col-sm-6 text-center col-sm-offset-3 yellow mb-10'>


		
		
		


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



		<div class="social">
				

				<form method="post">
			
				<div class="col-md-4 mb-10 well">
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

							
						 
						
						
						<div class="clearfix mb-10"></div>
				

				</div>
				<div class="col-md-4 mb-10 well">
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

							

						
					 
					
					
					<div class="clearfix mb-10"></div>



				</div>
				<div class="col-md-4 mb-10 well">
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

					 	
					
					
					<div class="clearfix mb-10"></div>

					</div>

					




			


		

					<div class='clearfix'></div>
					<input type='hidden' name='edit_profile' value='true'>

				</form>
		
		</div>
		
		
		
		<div class=''>
		
		<div class='col-sm-6 text-center'>
			
			
		
			
			


	<div class="mini-profile well row mb-5 green">
			<div class="col-xs-5 col-md-4">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<center>
						<?php 
					
							echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
					
					
						
							if (  get_avatar_url()  ) {
								$avatar_URL  = get_avatar_url();
								
		    
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
						<p class="link upper bold">edit image</p> 

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
			<div class='clearfix mb-10'></div><hr>
					

				</div>
		
	
				<div class='clear'></div>	


				<div class='clearfix mb-5'></div>
						
					<div class="btn-group btn-group-justified">
				
					<a href="/edit/" class="btn btn-default">Edit Profile</a>
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
		
			


			
			<div class=" porn well row">
				<center>
					<h5>Header Image</h5>

					<div class='clearfix mb-5'></div>

				<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
				

					<img src="<?php echo $member_cover_image_url; ?>" alt="">
					<div class='clearfix mb-0'></div>
					
					<br>edit photo
				</a>
				</center>
			</div>
			
		</div>

		<div class='col-sm-6 text-center '>



		<div class="social-form well green row mb-5">
			
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

						<div class="1col-md-12  well yellow row text-left">

							<h4>Header Image</h4>

								<div class='clearfix mb-5'></div>
									
			
								Requests: <a target='_blank' class='pull-right' href='/requests'>	
								<?php	echo " " . $requests_count = count_user_posts_by_type($current_user->ID, 'ssi_requests'); ?>
								</a>
								<br>G Photos: <a  target='_blank' class='pull-right' href='/gallery'>
								<?php	echo "" . $photo_count = count_user_posts_by_type($current_user->ID, 'g_galleries'); ?>
								</a>
								<br>X Photos: <a  target='_blank' class='pull-right' href='/photos'>
								<?php	echo "" . $photo_count = count_user_posts_by_type($current_user->ID, 'ssi_photos'); ?>
								</a>
								<br>Videos: <a  target='_blank' class='pull-right' href='/videos'>
								<?php	echo "" . $video_count = count_user_posts_by_type($current_user->ID, 'ssi_videos'); ?>
								</a>
								<br>Events: <a  target='_blank' class='pull-right' href='/events'>
								<?php	echo "" . $events_count = count_user_posts_by_type($current_user->ID, 'ssi_events'); ?>
								</a>
								<br>Blogs: <a  target='_blank' class='pull-right' href='/blog'>
								<?php	echo "" . $blog_count = count_user_posts( $current_user->ID  ); ?>
								</a>
								
								<br><br>Total Posts: 
								<a  target='_blank' class='pull-right' href='#'>								
								<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
									
									echo "" . $total_count; ?>
	
									</a>
									
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
		<div class='clearfix'></div><hr>
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden1'><br> All Members &raquo;<br> <br>  </a>
		<hr>
		<div class='clearfix mb-20'></div>
	</div>
	
		
				<?php //get_template_part( 'ad', '300-250-1' ); ?>

				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
		<?php }else{ ?>
	
				
				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
				
				<div class="or">or</div>
				
				<?php echo do_shortcode(" [wpmem_form register] "); ?>
				
		<?php } ?>
		<div class='clearfix mb-10'></div>


	</div>



<div class="clearfix"></div><br>
<?php 
	get_footer("preview"); 
?>