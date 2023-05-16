<?php
/**
 * Template Name: GQListings
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

 if( $_POST['edit_profile'] ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			//update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val , "user_" . $current_user->ID );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		echo "<h1 class='text-center mb-10 alert alert-warning'> PROFILE UPDATED!! </h1>";
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
		//wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
	
	
	
get_header('members'); ?>

	
<section id="main-content" class=" container-fluid text-center followgq well 1yellow">






<div class="b-profile__header 1ads 1ad-shift">
        	<?php 
				$profile_id = 3705;
			 ?>
			

	<div class="clearfix"></div>
    <a href="/videos" target="_blank" >
	    <img src="http://dlfreakfest.org/wp-content/uploads/buddypress/members/3705/cover-image/5ed03ae7afa42-bp-cover-image.png" srcset="http://dlfreakfest.org/wp-content/uploads/buddypress/members/3705/cover-image/5ed03ae7afa42-bp-cover-image.png 480w,http://dlfreakfest.org/wp-content/uploads/buddypress/members/3705/cover-image/5ed03ae7afa42-bp-cover-image.png 760w, http://dlfreakfest.org/wp-content/uploads/buddypress/members/3705/cover-image/5ed03ae7afa42-bp-cover-image.png 600w" sizes="(max-width: 480px) 480px,(max-width: 760px) 760px, 600px" alt="IamYungDADDY" class="b-profile__header__cover-img">
	</a>
	
	<div class="clearfix"></div>
	
	<div class="row profile-stats text-center">
		<div class="col-md-8 col-md-offset-2 profile-stats">

		<div class="col-md-2">
			<div class="clearfix mb-10"></div>
			<a href="/members-list/thotmaster/profile/change-avatar/">
				<?php echo get_avatar($profile_id, 150); ?>
			</a>
			<div class="clearfix"></div>

		</div>
		<div class="col-md-10">
			<div class="clearfix"></div>
		
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/blog">
					<span class="h2">
						<?php 
							echo count_user_posts( $profile_id );
						 ?>
					</span><br>
					Blogs
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/photos">
					<span class="h2">
						<?php 
							echo ( count_user_posts_by_type($profile_id, 'ssi_photos') + count_user_posts_by_type($current_user->ID, 'g_galleries') );
						?>
					</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/videos">
					<span class="h2">
						<?php 
							echo count_user_posts_by_type($profile_id, 'ssi_videos')
						 ?>

					</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well h4 hidden-xs">
				<a href="/requests">
					<span class="h2">

						<?php 
							echo count_user_posts_by_type($profile_id, 'ssi_requests')
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

		<div class="clearfix mb-0"></div>
	<div class="text-center  h3 mb-0">
		<?php 
			if ( is_user_logged_in() ) {
				echo '<small>Social Coming Soon</small><div class="clearfix mb-10"></div>';
			}else{
				?>
				<a href="/register">Join Now - 100% FREE!</a> 
				<div class="clearfix mb-10"></div>
				<?php
			}
		?>
		
	</div>
	
	
	<div class="clearfix"></div>
								        
										<div id='header-login' class='1text-center well green 1bg-blue 1pb-5 mb-0 <?php if( !is_user_logged_in() && !is_front_page() ){ echo 'mb-0'; } ?>' style='display: block;'>
	                                               <div class=" ">
	                                           <center>
		
                                        		<?php
                                        			if( !is_user_logged_in() ){
                                        		
                                        			$redirect_to = '/';
                                        		?>
                                        		<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
                                        			<span class="hidden-xs "><b>Members </b></span>
                                        			
                                        
                                        			<input id="user_login" placeholder="Username" type="text" size="10" value="" name="log">
                                        			<input id="user_pass" placeholder="Password" type="password" size="10" value="" name="pwd">
                                        			<input id="rememberme" type="checkbox" value="forever" name="rememberme" class="hidden-xs">
                                        			<input id="wp-submit" class="btn btn-primary" type="submit" value="Login" name="wp-submit">
                                        
                                        			<input type="hidden" value="/follow-gq" name="redirect_to">
                                        		</form>
                                        		
                                        		 <?php
                                        		
                                        		
                                        			}else{
                                        				
                                        				?>
                                        				
                                        				<h4><b><?php if( is_user_logged_in() ){  $current_user = wp_get_current_user(); echo 'Welcome Back, ' . strtoupper($current_user->user_login) . '!'; }else{ echo "<b>Welcome, " . $_COOKIE['name'] . "!</b>";}  ?></b>
                                        				<div class="clearfix mb-5"></div>
                                        				<small> <a href="/profile">Profile</a> | <a href="/mailbox">Mailbox</a> | <a href="/events">Events</a> | <a href="/social">Social</a>   </small>
                                        				
                                        				</h4>
                                        				<?php
                                        				
                                        			}
                                        		?>
                                        		</center> 
                                        	</div>
                                        	<div class=" hidden col-sm-2">
                                        	    <center>
                                        	    <?php
                                        			if( !is_user_logged_in() ){
                                        		
                                        			
                                        		?>
                                        	        <a href="/wp-login.php?action=lostpassword" class="btn btn-sm btn-default btn-block input"><span class="glyphicon glyphicon-refresh 1pull-right" aria-hidden="true"></span> PW</a>
	                                            <?php
                                        			}else{
                                        		?>
                                        		    <a href="/cash" class="btn btn-sm btn-default btn-block input">$$$</a>
                                        		<?php
                                        			}
                                        		?>
                                        		</center>
                                        	</div>
                                        	<div class="clearfix"></div>
                                        </div> 
                                        <div class="clearfix"></div>

<div class="clearfix"></div>

	<div class='col-sm-8 text-center yellow col-sm-offset-2'>

		<?php 
			echo dispMailbox(); 
		?>

	</div>
	<div class='well login col-sm-8 text-center col-sm-offset-2 yellow mb-10'>


		
		
		


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
			
			
		
			
			


	<div class="mini-profile well row mb-5 yellow">
			<div class="col-xs-5 col-md-4">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<center>
						<?php 
					
							echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
					
					
						
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
					<div class='clearfix'></div>
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
		
			


			
			<div class=" porn well row hidden">
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



		<div class="1social-form well green row mb-5">
			
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
		<div class='clearfix'></div>
		
		
		
		
		<div class="1col-md-12  well yellow  text-left">

							<h4>Member Stats:</h4>

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
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden1'><br> All Members &raquo;<br> <br>  </a>

		
		
	</div>
	
		
				<?php //get_template_part( 'ad', '300-250-1' ); 
				?>

				<?php //echo do_shortcode(" [wpmem_form login] "); 
				?>
				
		<?php }else{ ?>
	
				
				<?php echo do_shortcode(" [wpmem_form register] "); ?>
				
	
				
		<?php } ?>
		<div class='clearfix mb-10'></div>


	</div>
















<br><br>



	<div class='clearfix mb-10'></div><hr>

                 <div class="row batas hidden1">
  

                        <ul id="secondary" class="menu hidden"><li id="menu-item-34" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-34"><a target="_blank" href="//instaflixxx.com/">My InstaFliXXX Porn Network</a></li>
<li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38"><a href="http://followgq.com/36-2/">My Credentials</a></li>
</ul>  <div class="heading-menu text-center">
   
<!--                         <div class="alignright">    
<form role="search" method="get" id="searchform" action="http://followgq.com/" >
	<div><label class="screen-reader-text" for="s">Search for:</label>
	<input type="text" value="" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" />
	</div>
	</form>                         </div>    
-->
                 </div>  
                      
<br>


   
                 </div>  
			 
     <div class="row">
     <div class="general-landing text-center">
	 
		 <div class="container-fluid">
		
			 <div class="text-center">
				 <h1 class="site-title"><span><a href="https://web.archive.org/web/20130917192630/http://followgq.com/" title="Mr. GQ" rel="home">Mr. GQ</a></span></h1>
				 <p class="site-description">
						Changing the Game &#8211; GQ Style             </p>
			</div>                  
		 </div>
   
		<?php echo get_the_post_thumbnail( $request->ID , 'medium', array( 'class' => 'aligncenter img-thumbnail' )  ); ?>
				                                               
         <div style="text-align: center; font-size: 20px; "><b>Current Location</b><div class='clearfix mb-10'></div> Philadelphia, PA<br>
			<br>
			<!--
			<h3 style="text-align: center; font-size: 25px; "><a href="#">-Contact Me-</a></h3>
			-->
</div>  
     </div>
  
     </div>
     
     
     
     
     <hr>
     
     <div class="col-md-7 well green mb-0">
     
     <div class="intro-home container-fluid text-center col-md-10 col-md-offset-1">
     
         <h3>A Little Bit About Mr. GQ</h3><hr>
         Very polite/well rounded individual with great skin, a sense of humor, and a nice body. Full Time Software Engineer by day, Massage Therapist/escort by night. Beyond experienced, Handsome and intelligent willing and wanting-to satisfy all of your most sincere or naughtiest desires. A smooth, strong and passionate brother guaranteed to tantalize all of your senses.
<br><br>


<!--
<center><a style="font-size: 20px; color: #AB0707;" href="/web/20130917192630/http://followgq.com/text">-Subscribe to TXT Updates-</a></center><br>
-->

<br><br><div style="font-size: 20px; text-align: center;">
<h3>Session Rates</h3><hr>
$80 - Half Hour<br>
$150 - Full Hour<br>
$200 - VIP Session<br>
Extended Sessions/Special Requests Vary
</div>
<center>*$20 Travel Fee</center>  

<br>
    <p class="centering text-center">
             <a target="_blank" href="/gq-gallery/" class="tombol button btn-lg btn btn-success btn-block">Photo Gallery &rarr;</a>  
  
    </p>       
    </div>
    </div> 
	
	

                     <div class="col-md-5">     
                     
                        <div class="clearfix mb-10"></div>
                            <h2>SKILLS</h2><br>
                         <div class="1col-md-4 well yellow">
                            <div class="side-home"><h3>Massage Services</h3>			<div class="textwidget">I offer professional and discreet massage, light to moderate pressure,
                            in a relaxed and private setting. I have over five years experience and
                            can tailor a perfect session for your enjoyment.
                            </div>
                            		</div>    </div>
                                 <div class="1col-md-4 well yellow">
                            <div class="side-home"><h3>Companionship Services</h3>			<div class="textwidget">Mr GQ is your solution for personalized companionship in the comfort of your home. I truly value the importance of compassion, dignity, and respect for all of my clients across all stages of life. 
                            </div>
                            		</div>     </div>  
                                                          
                                 <div class="1col-md-4 well yellow">
                            <div class="side-home"><h3>Computer Service</h3>			<div class="textwidget">Is your computer running really slow? Are you getting pop ups and advertisements even when your not surfing the internet? It could be a virus. No matter what kind of PC you have, Mr GQ can fix it.
                            </div>
                            		</div>     </div>
                                                                      
                                         <div class="clear"></div> 
                    </div> 					 
                                                     
                            
                     <div class="clearfix"></div><hr>
                     
                     <div class="clearfix mb-20"></div>
     <footer class="row2 credit">
      
         <div class="text-center">
                 <p class="brand-note "> Powered By: <a href="//www.gqlistings.com/">GQListings.com</a></p>
          </div>
                     <div class="clearfix"></div>
     </footer>
</section>



	

	<div class=" container hidden ">
		<div id="featured" class=" container well">
        
        <div class=" col-md-6">

            <h1 class="featured-title">Elite Escorts</h1>                    
            <h2 class="featured-subtitle">Just a Phone Call Away</h2>            
            <p>Your fantasy &amp; desires will finally come true! At GQList you will be able to search and view some of Americas most exclusive and desirable high class and elite escorts. Where ever you are in America, we're working on featuring private escorts  in every major city.
</p>            
            		         
            <div class="call-to-action">

            <a href="/companions" class="blue button">View Escorts &rarr;</a>  
            
            </div><!-- end of .call-to-action -->
                     
            
        </div><!-- end of .col-460 -->
		
		<div class=" col-md-2 hidden "> 
				<br>
		</div>
        <div id="featured-image" class="text-center col-md-6 "> 
                           
            <h3>Newest Model</h3>
<img style="width: 200px;" src="https://web.archive.org/web/20130612075545im_/http://gqlist.com/kimcarta/wp-content/uploads/sites/9/2013/04/Kim11.png"><h4>
Kim Carta
</h4><h5>
Hampton Roads

</h5><a href="https://web.archive.org/web/20130612075545/http://gqlist.com/kimcarta

">&gt;View Profile&lt;</a> 
                                   
        </div><!-- end of #featured-image --> 
        <div class='clearfix'></div><br>
        </div>
		
		
	
	</div>



<div class='clearfix'></div><br>

<!-- end GQListings --> 




<div id="primary" class="hidden ">


					
							
			
	
	<div id='add-gallery' style='display: block;' class='hidden text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			
			<div class="btn-group hidden " >
				
				
					<button id='add-gallery' class='hidden-print hidden1 btn btn-default btn-lg btn-block1'>Quick Post</button>
					<a href='/freak-post' class='hidden-print btn  btn-primary btn-lg btn-block1'> Full Post >></a>
					<hr>
			</div>
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-md-10 col-md-offset-1  home-beta">
			<center><h3> New Post! </h3></center><br>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[gravityform id="40" title="false" description="false"]
			');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clear'></div>	<br>
			</div>
		</div>
	<div class='clearfix'></div>
			
			

	<div class=' '><div class='col-md-10 well green'>
	
	
	
<?php




		$args = array( 'post_type' => 'ssi_requests', 'posts_per_page' => -1 , 'post_status' => array('pending', 'publish') );

		//$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
		//	if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-12 well1'>
			<div class='col-md-12'>

				
			<?php 
				echo "<div class='' >";
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
				echo "</div>";
				?>
				<!--<a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
				-->
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div><br><br>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			<h4> <a href='/?p=<?php echo $lead->ID; ?>'> <?php echo $lead->post_title; ?> </a> <small>  ( <?php echo get_post_meta($lead->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($lead->ID, 'MX_user_state', true); ?> ) -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small></h4>
			
			<div class='clear'></div><br>
		</div>
		
		
		<?php 

		//if( ($count % 3) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>
</div>
	
		 <div class='col-md-2 hidden-xs text-center img-thumbnail'>
			<!--JuicyAds v2.0 --  Photo Skyscraper -->
			<center>
			<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=160 height=612 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=516829></iframe>
			</center>
			<!--JuicyAds END-->
		</div>
		
				<div class='clear'></div>
				
				                                     <ul id="navmenu" class="menu"><li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/faqs/">FAQ&#8217;s</a></li>
<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="https://web.archive.org/web/20130917192630/http://followgq.com/massage/">Massage</a></li>
<li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-5"><a href="/web/20130917192630/http://followgq.com/">Home</a></li>
</ul>                

				
	
</div>
	
</div><!-- .content-area -->

<?php // get_template_part( 'content', 'welcome-rsvp' ); ?>











<div class="clearfix"></div>

<?php 
	get_footer('preview'); 
?>