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
 
get_header('members'); 

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
.well.mb-5 {
    background: #26a406;
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

<div id="" class="">


				

					
				<?php  //get_template_part('content','social-twitter');  
				?>
					
					
	<div class="cashapp ad-shift img-thumbnail  col-md-6 col-md-offset-3">
			<center>
				<div class=" img-thumbnail"><?php the_post_thumbnail( get_the_ID() ); ?></div>
			</center>
		</div>
		<br><br>

	<div class='well col-sm-6 text-center col-sm-offset-3'>
		
		
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
								
		<div class="col-md-8 col-xs-6 text-center well hidden">
			<figure>
			  <figcaption><h3><?php echo count($requests); ?></h3> <h4>Requests</h4></figcaption>
			</figure>		
		</div>
							
		<div class=" col-md-4 col-xs-6 text-center well hidden">				
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
		<!--<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>-->
		<br>
	
	
	<div class='clearfix'></div>
	
	
	<?php } ?>
	
		
		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix mb-15'></div>
		
		<h4> <?php echo 'Welcome, ' . $current_user->display_name . '!'; ?> </h4>
		<br>
		 
		
		<div class='well green'>
		<div class='col-sm-6 text-center '>
		
			<div class=" porn well">
				<center>
						<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
						
							<?php
						
								echo get_avatar($current_user->ID, 150);

							//	print_r($user);
						
			
							?>
							<br><br>
							Edit Image
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
								<a href='/edit/' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
			
			
			
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
			<br>
			<a href='/edit/' class='btn btn-warning btn-block'>Edit Profile</a>

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
		<div class='clearfix'></div><br class="visible-xs visible-sm">
		
		<a href='/kings' class='btn btn-block btn-primary btn-lg hidden1'>> All Members <</a>
		
		<div class='clearfix'></div>
		
	</div>
				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
		<?php }else{ ?>
		
			<div class='well green mb-0'>
				<h3>Member Login</h3><hr>
				
				<?php echo do_shortcode(" [wpmem_form login ] "); ?>
				
			</div>
		<?php } ?>



	</div>


<div class='clearfix'></div>

</div><!-- .content-area -->


	</div>
	
	


	<div class='clearfix'></div>
<?php get_footer('preview'); ?>
