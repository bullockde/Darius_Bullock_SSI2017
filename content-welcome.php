<div class='clear'></div>
<div id='welcome' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class='col-md-12'>


		<div class='clear'></div>
		<?php if( is_user_logged_in() ){ ?>


				
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

		<div class='clearfix'></div>


		<div class=" col-md-4 text-center well mb-5 blue">
			<div class='spotlight'>
			<!-- <h3>Member <?php if( is_user_logged_in() ){ echo "Profile"; }else{ echo "Spotlight"; } ?></h3> -->
			<?php

				if( is_user_logged_in() ){
				    $current_user = wp_get_current_user();
				 /**
				     * @example Safe usage: $current_user = wp_get_current_user();
				     * if ( !($current_user instanceof WP_User) )
				     *     return;
				     */

				?>
			
			<div class=" ">
			

				
							<div class='clear'></div>
							
							
							
							
							
								
				<div class="col-xs-5 col-md-4 mb-0 ">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<?php //echo do_shortcode("[bp_profile_gravatar]"); 
						
						
						
						?>
						
						
								<?php 
				
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
				
				
					if ( 1 ) {
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
						edit
					</a>
				
				
					
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
					
				
						<?php //echo do_shortcode("[bp_profile_gravatar]");
								//bp_member_avatar('type=full&width=100&height=100');
						?>
						<br>
						
					</a>
					
						

				</div>
				<div class="col-xs-7 col-md-8 text-center report">
				
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
			
			
				
			

				</div>
		
				
			
			
			<div class="btn-group btn-group-justified text-center ">
				<div class='clearfix'></div><hr class=' mb-10'>
				<center>
					<a href="/edit-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-default">Edit Profile</a>
					<a  href="/user-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-info">View Profile</a>
				</center>
		
			</div>
							
						
					
		</div>	
			
				
		
			
				
				
				
				
				
				
				
				
				
		<div class='1well 1yellow'>
			
					
					<button id='whatsnew' class='explode btn btn-danger  hidden btn-block'>Random Button</button>
					
			<div class='clear'></div>
			
		</div>
				<div class='clear'></div>	
		<div class='well green hidden'>
					<h4>YungDADDY Requests<hr></h4>		
								
		<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
		
		<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
		
		<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
		
		
		
		</div>
				
					
					<?php //echo do_shortcode("[wpmem_form login]"); ?>
				
				
				
				
				
				

			</div>
			
			
			
			


			<?php } ?>
						<div class='clearfix mb-5'></div>
			<div class="text-left hidden1 well green mb-0" style="padding: 10px 15px;">
				<b>Status:</b>
			
					<?php	
					
					$status = bp_activity_latest_update($current_user->ID);
					
					echo $status;
					if( strlen($status) > 3 ){
					
						bp_activity_latest_update($current_user->ID); 

					}else{
						echo "<br><small>Whats New? - <b>Update Status</b> &rarr;</small>";
					}
					?>

					<a href='/activity' class='status btn btn-default btn-sm pull-right'>Update</a>
					<div class='clearfix'></div>
			</div>
			
			
			
			
		</div>
		
		
		
		
		<?php } ?>
		

	
			<div id='whatsnew' class='col-md-8' >
				<div class='clearfix'></div>
				<div  >

					
			<!--		
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/x7dePk1h430" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					
			-->		

					<a href='/tv/'><img src="/wp-content/uploads/2015/10/SSITV.png"  alt='SSITV' class='img-responsive hidden' /></a> 
				<div class="flexslider11 hidden">
					
					<ul class="slides">
						<li>
							<a href='/playlist/'><img src="/wp-content/uploads/2015/09/SSIPlaylist-e1445057287376.png" class='img-responsive'/></a>

						</li>
						<li>
							<a href='/the-real-house-staff-of-shaman-shawn-season-premiere-trailer-1-hour-ssi/'><img src="/wp-content/uploads/2015/10/RHSoSSI-leader.png" class='img-responsive' /></a>


						</li>
						<li>
							<a href='/tv/'><img src="/wp-content/uploads/2015/10/SSITV.png" /></a>

						</li>
					</ul>
				</div>

				<!-- <center><small><< Swipe || Click >></small></center>   -->
				</div><!-- #whatsnew -->
				<?php //get_template_part( 'ad', '468-60' ); ?>
				<div id='whatsnew' class='random well1  ' style='display: block; padding: 0;'>
				
				<div class="row1">
				
				<div class='new-tag  text-center hidden1 mb-0 ads ad-shift img-thumbnail btn-block  well h3 bold 1link upper bold glory-font1'>
				<div class='clearfix mb-10'></div>
				<div class="title">What's New</div></div>
					
		<?php
				query_posts(array( 'post_type' => array(  'ssi_photos' , 'ssi_requests', 'ssi_projects'   ) , 'orderby' => 'rand', 'showposts' => 2 ));
				if (have_posts()) :
				while (have_posts()) : the_post(); 
		?>
				
				<div class='text-center col-xs-6 mb-5 well recents 1yellow'>
				
			

				<?php
					$format = get_post_format( get_the_ID() );

					//if( $format == 'video' || in_category( 'music' , get_the_ID() ) || in_category( 'songs-that-touch-the-soul' , get_the_ID() ) ){
						//get_template_part( 'content', 'video' );
					//}else{
						?>
						<a  href='<?php the_permalink() ?>' class=' white btn-block hidden1'>
						<b><?php if( strlen(get_the_title()) > 10 ){ echo substr( get_the_title() , 0 , 10 ) . ".." ; } else{ the_title(); } ?></b>
						</a>
						<div class='clearfix mb-5 hidden-xs'></div>
						<a  href='<?php the_permalink() ?>' class='btn-block hidden1'>
						<center><?php //twentysixteen_post_thumbnail("thumbnail"); ?>
						<?php 
						
						if( has_post_thumbnail(get_the_ID()) ){
							?>
							<div class='img-thumbnail'>
						<?php
							the_post_thumbnail("thumbnail"); 
							?>
							</div>
						<?php
							}
						else{ 
						
						?>
						<img src="http://dlfreakfest.org/wp-content/uploads/2017/12/ssiprojects-ssixxx-site-sm-150x150.jpg" class="img-thumbnail">
						<?php
							//the_content();
						}

							//get_template_part( 'content', 'video' );

							//
						?>
						</center>
						</a>
						<div class='clearfix mb-10 hidden-xs'></div>
						<a  href='<?php the_permalink() ?>' class='btn btn-success pulse btn-lg btn-block hidden1'>View &raquo;</a>
						
						
						
					<?php
					//get_template_part('template-parts/content' , 'page');
					//the_content(); 
					//}
				?>
				</div>
				
				

	<?php endwhile;
		endif;

		wp_reset_query();
		?>
		<div class='clearfix'></div>
		</div>
		
		<div class='clearfix'></div>
			</div>
			</div>	<!-- #new -->
								
								
							
		<?php if( !is_user_logged_in() ){ ?>

		
		<div class='col-md-4 spotlight text-center'>
			
			<div class='well hidden'><a href='/members/'>#SSIMembers</a></div>
			<h2 class="1white">Member Login</h2><hr class="mb-0">
			

			<?php if( !is_user_logged_in() ){ ?>
			
				<?php echo do_shortcode("[wpmem_form login]"); ?>
				
				<hr style="margin: 0 0 10px;">
				
				<a href='/wp-login.php?action=lostpassword' class='btn btn-md btn-block btn-default'> Forgot Password &rarr; </a>
				
				<div id='loginform hidden'>
					<a href='/register/' class='btn btn-lg btn-info btn-block hidden'>Register Now</a>
					<button id='loginform' class=' btn btn-lg btn-info btn-block hidden'>Register Now</button>
					<button id='loginform' class=' btn btn-lg btn-info btn-block hidden'>Login</button>

					<button id='whatsnew' class=' btn btn-lg btn-danger btn-block hidden'>Random Button</button>
				</div>

				<div id='loginform' class=' well ' style='display: none;'>
					<?php echo do_shortcode("[wpmem_form register]"); ?><br>
					<?php echo do_shortcode("[wpmem_form login]"); ?>
					
				</div> 
					<?php }else{ ?>
					<a href='/activity/' class='btn btn-lg btn-info btn-block'>Member Activity</a><br>

						<a href='/members/' class='btn btn-lg btn-info btn-block'>View All Members</a><br>
					<?php } ?>

		</div><!--  #members  -->
		<?php } ?>
		<div class='clearfix'></div>
</div><!--  #Container  -->
							
							<?php get_template_part( 'content', 'ssi-banner-ad' ); ?>
</div>
<div class='clearfix mb-10'></div>