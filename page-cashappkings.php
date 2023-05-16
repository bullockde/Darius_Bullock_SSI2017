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
 
 
 *HEX

#26A406

RGB

38, 164, 6

CMYK

77, 0, 96, 36

HEX

#0626A4

RGB

6, 38, 164

CMYK

96, 77, 0, 36

HEX

#A40626

RGB

164, 6, 38

CMYK

0, 96, 77, 36


 */

 
 if( is_user_logged_in()  ){ 
			
				
				$user = wp_get_current_user(); 
				//print_r($user); 
				//$user = $user[0];
				$userid = $user->ID;
				$current_user = get_userdata( $userid );
	}
 
 if( $_POST['edit_profile'] ){
		
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
		
		//wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
	

 
get_header('profile'); 

?>
<style>
.cashapp.img-thumbnail {
    background: url("http://dlfreakfest.org/wp-content/themes/ssi2017/images/icons/icon-cashapp.png");
    background-size: 50px;
    color: #1f73c9;
    font-size: 22px;
    /* text-shadow: -2px -2px 0px #ee0000; */
    background-position: center;
    padding-top: 7px;
	 padding: 1.5em 2em;
	
}
.well{
	max-width: 100%;
}
.well.mb-5 {
    background: #26a406;
}
.mb-5 {
    margin: 5px 0 !important;
}
.well.login {
		    min-height: 20px;
		    /* padding: 19px; */
		    margin-top: 0;
		    padding: 1.5em 1.5em 1em;
		    margin-bottom: 20px;
		    background-color: #f5f5f5;
		    border: 1px solid #e3e3e3;
		    border-radius: 4px;
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		}
		.well.login .or {
		    background: #7984a4;
		    padding: 1em;
		    text-transform: uppercase;
		    color: #fff;
		    margin: 1.7em 0;
		}

		.well.yellow.login {
		    background-color: #a8acb7 !important;
		}
		#wpmem_reg legend, #wpmem_login legend {
		    font-size: 24px;
		    line-height: 1.7em;
		    font-weight: 700;
		    margin-bottom: 10px;
		    width: 100%;
		    color: #788093; 
		}

</style>


		<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'publish' /* , 'category_name' => 'cashappkings'*/ ) );
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$requests = get_posts(array(  'post_type' => 'ssi_requests' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish', 'pending') , 'category_name' => 'thots' ));
			
		?>




<div class="clearfix mb-10"></div>


	
	<div class="col-md-6">


				

					
				<?php  //get_template_part('content','social-twitter');  
				?>
					
					
	<div class="cashapp ad-shift img-thumbnail btn-block ">
			<center>
				<div class=" img-thumbnail"><?php the_post_thumbnail( get_the_ID() ); ?></div>
			</center>
		</div>
		

	<div class='well  mb-10 text-center 1col-sm-offset-3'>
		
		
		<b>We Currently Have</b><div class="clearfix mb-15"></div>
		<div class="row1">
							
		<div class="col-xs-4 text-center well 1mb-5 1white">						
			<figure>
			  <figcaption><h3><?php echo count($models); ?></h3> <h4>Models</h4></figcaption>
			</figure>	
		</div>
								
		<div class="col-xs-4 text-center well 1mb-5 1white">				
			<figure>
			  <figcaption><h3><?php echo count($photos); ?></h3> <h4>Photos</h4></figcaption>
			</figure>				
		</div>
	
		<div class="col-xs-4 text-center well 1mb-5 1white">		
			<figure>
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>Videos</h4></figcaption>
			</figure>				
		</div>
								
		<div class="col-md-8 col-xs-6 text-center well hidden1">
			<figure>
			  <figcaption><h3><?php echo count($requests); ?></h3> <h4>Requests</h4></figcaption>
			</figure>		
		</div>
							
		<div class=" col-md-4 col-xs-6 text-center well hidden1">				
			<figure>
			  <figcaption><h3><?php echo count($models); ?></h3> <h4>THOTs</h4></figcaption>
			</figure>
		</div>	
		
	
		<div class="col-xs-12 text-center well hidden1 1mb-5 mb-10 1white">
		
			<figure>
			  <figcaption><h3><?php 
			  
			  $args = array(
						
							//'number' => -1,
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
						$ordered_users =  new WP_User_Query( $args );

						
						$blogusers = $ordered_users->get_results();
						
						$total_results = count($blogusers);
			  
			  
			  echo $total_results; ?></h3><h4>Members</h4></figcaption>
			</figure>
		</div>
							
								
								
							</div>
							
							
		
		
	
	<div class='clearfix'></div>
	<?php if(!is_user_logged_in()){ ?>
		<!--<h4> Member Benefits </h4><hr>
		
		
		<p>- View All Member Profiles</p>
		<p>- Get Full Access to our Pix/Vids</p>
		<p>- Get Access to our Private Events</p>
		<p>- View Exclusive Model Content</p>
		<p>- Get Notified when we Make an Update!</p>
		<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>-->
		
	
	
	<div class='clearfix'></div>
	
	
	<?php } ?>
	
		
	</div>
		
	
	



	







	<div class='clearfix'></div>

	<?php if (!wp_is_mobile()) {
		?>
		<div class="well green  mb-10 text-center">
			<b>Our Partners</b><hr class="mb-5">
			
			<?php get_template_part('ad','468-60') ?>
			
		</div>
		<?php
	} ?>
	


</div><!-- .content-area -->

	


	
		<div class=' col-md-6 '>
		
		<div class='well  text-center  yellow login mb-10'>
		
		
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



			<h3> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h3><br>

			<div class='clearfix'></div>

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
		 
		
		<div class='well yellow mb-10'>
		<div class='col-md-6 text-center '>
		
			
			
			<div class="mb-0 porn well">
									<center>
								
								
								<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
								
								<?php
								
									echo get_avatar($current_user->ID, 150);

								//	print_r($user);
								
					
									?>
									<br>edit photo
									</a>
									</center>
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
		<div class='col-md-6 text-center'>
			
			
			
			<div class='clearfix'></div>
			
			
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
				Ht:
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
				Wt:
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


			<div class="btn-group btn-group-justified text-center ">
				<div class='clearfix'></div><hr class=' mb-10'>
				<center>
					<a href="/edit/" class="btn btn-default">Edit Profile</a>
					<a  href="/profile/" class="btn btn-info">View Profile</a>
				</center>
		
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
			
		
				
			
			
			
		</div>
		<div class='clearfix'></div>
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden'>> All Members <</a>
		
	</div>

	<div class="col-md-12  well yellow text-left mb-10">
									

				Blogs: <a  target='_blank' class='pull-right' href='/blog'>
				<?php	echo "" . $blog_count = count_user_posts( $user->ID  ); ?>
				</a>

				
				<br>G Photos: <a  target='_blank' class='pull-right' href='/gallery'>
				<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'g_galleries'); ?>
				</a>
				<br>X Photos: <a  target='_blank' class='pull-right' href='/photos'>
				<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'ssi_photos'); ?>
				</a>
				<br>Videos: <a  target='_blank' class='pull-right' href='/videos'>
				<?php	echo "" . $video_count = count_user_posts_by_type($user->ID, 'ssi_videos'); ?>
				</a>
<!-- 
				<br>Requests: <a target='_blank' class='pull-right' href='/requests'>	
				<?php	echo " " . $requests_count = count_user_posts_by_type($user->ID, 'ssi_requests'); ?>
				</a>


				<br>Events: <a  target='_blank' class='pull-right' href='/events'>
				<?php	echo "" . $events_count = count_user_posts_by_type($user->ID, 'ssi_events'); ?>
				</a>
				 -->
				
				<br><br>Total Posts: 
				<a  target='_blank' class='pull-right' href='#'>								
				<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
					
					echo "" . $total_count; ?>

					</a>
					
	</div>
	


				<?php get_template_part( 'content' , 'footer-stats' ); ?>

				<div class='clearfix mb-10'></div>
				<?php //get_template_part( 'ad', '300-250-1' ); ?>

				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
		<?php }else{ ?>
	
				<h3>Existing Members Login</h3>
				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
				<div class="or">or</div>

				<h3>Join Now - 100% Free!</h3>
				<?php echo do_shortcode(" [wpmem_form register] "); ?>
				
		<?php } ?>

	


</div>

</div>
	<div class='clearfix'></div><br>
<?php get_footer('members'); ?>
