<?php 
/*
Template Name: Users Profile Page
*/

	
	//if( !is_user_logged_in() ){ $pg = "/login/"; wp_redirect($pg); exit; }


$userid = $_GET['ID'];

if( get_post_meta($_GET['ID'], 'userID',1 ) ){ 

	$userid = get_post_meta($_GET['ID'], 'userID',1  );
	
	$funnel = "/user-profile/?ID=" . $userid;
		
			
echo "USER ID = ". get_post_meta($_GET['ID'], 'userID',1 ); 
	
	$user_meta = get_user_meta($userid);
	
	
	
	
	
	foreach($user_meta as $key => $value){
		
		echo $key;
		echo " -- ";
		echo $value[0];
		echo " <br>" ;
		
		update_post_meta($_GET['ID'], $key, $value[0] );
	}
	
	wp_redirect($funnel);
			exit;
	
}

$user = $current_user = wp_get_current_user();

$userid = $current_user->ID;

if( isset($_GET['ID']) ){ $userid = $_GET['ID']; $user = get_userdata( $userid ); }

$Model_ID = get_user_meta($userid, 'ssi_model_id', 1);

	$args = array( 
											'item_id' =>  $user->ID, 
											'object' => '', 
											'type' => '' ,
											'width' => '150px',  
											'height' =>'150px', 
											
										); 
										


get_header('profile'); ?>


<div class="b-profile__header 1ads 1ad-shift 1img-thumbnail container-fluid ">


	<div class="b-profile__header__cover row">
	<?php // Get the Cover Image

		$member_cover_image_url = false;
        $member_cover_image_url = bp_attachments_get_attachment('url', array(
          'object_dir' => 'members',
          'item_id' => $user->ID,
        ));

        if ( !$member_cover_image_url ) {
        	$member_cover_image_url = ""; 
        	?>
             	<div class=" 1porn well yellow 1row <?php if($member_cover_image_url) echo "hidden"; ?>">
				<center>
					<h5>Header Image</h5>

					<div class='clearfix mb-5'></div>

				<a href="/members-list/<?php echo $user->user_nicename; ?>/profile/change-cover-image/">
				

					<img src="<?php echo $member_cover_image_url; ?>" alt="">
					<div class='clearfix mb-0'></div>
					
					edit photo<br><br><br>
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

	
	
	<div class="row1 profile-stats text-center">
		<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 profile-stats">

		<div class="col-md-2 pro-buddy">
		    
			<div class="clearfix mb-10"></div>
			<a href="/members-list/thotmaster/profile/change-avatar/">
				<?php echo get_avatar($user->ID, 150); ?>
			</a>
			<div class="clearfix mb-5"></div>
		   <h4 class="post-title text-center"><?php echo $user->display_name; ?></h4>
            <div class='clear'></div>
            
            	<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<div class='clear mb-5'></div>
								
												  <a type="button" class="btn btn-warning 1btn-md hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal-edit" data-show="true">Edit Profile</a>



								<a href='/edit-profile/?ID=<?php echo  $current_user->ID; ?>' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clear mb-5'></div>
								<?php } ?>
								<div class="clearfix mb-5"></div>
								
								<a href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Message</div></a>
								
		</div>
		<div class="col-md-10">
		    
		     	
		     
			<div class="clearfix"></div>
			
			<div class="col-xs-4 col-sm-3 well h4 mb-0">
				<a href="/blog">
					<span class="h2">
						<?php 
							echo count_user_posts( $user->ID  );
						 ?>
					</span><br>
					Blogs
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4 mb-0">
				<a href="/photos">
					<span class="h2">
						<?php 
							echo ( count_user_posts_by_type($user->ID, 'ssi_photos') + count_user_posts_by_type($user->ID, 'g_galleries') );
						?>
					</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4 mb-0">
				<a href="/videos">
					<span class="h2">
						<?php 
							echo count_user_posts_by_type($user->ID, 'ssi_videos')
						 ?>

					</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well h4 hidden-xs mb-0">
				<a href="/requests">
					<span class="h2">

						<?php 
							echo count_user_posts_by_type($user->ID, 'ssi_requests')
						 ?></span><br>
					Requests
				</a>
			</div>
<div class="clearfix mb-5"></div>


            
			<div class="clearfix well white mb-10 stats yellow1">
			
				<h3>
				    
					<?php 
			
					echo get_user_meta( $user->ID, 'MX_user_age', 1 ); echo " - ";
					echo get_user_meta( $user->ID, 'MX_user_height_ft', 1 ); echo "' ";
					echo get_user_meta( $user->ID, 'MX_user_height_in', 1 ); echo " - ";
					echo get_user_meta( $user->ID, 'MX_user_weight', 1 ); echo "";
				
				?>
				<br>
			<small>
			    <?php 
			echo get_user_meta($userid, 'MX_user_position', 1); echo " - ";
			echo get_user_meta($userid, 'MX_user_endowment', 1);  echo "in";	
					
					
					
					?> 
			</small>
				</h3>
            <hr>
			<h3 class="post-title text-center">
			    	<div class="1btn-group 1btn-group-justified pull-right hidden">
				
					<a href="/edit-profile/?ID=<?php echo  $user->ID; ?>" class="btn btn-info">Edit</a>
					<a  href="/profile/" class="btn btn-info hidden">View Profile</a>
				
					</div>
			  
						 
					<?php 
				
					$closet = 0;
								if ( get_user_meta($userid, 'MX_user_city', 1 ) && get_user_meta($userid, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($userid, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($userid, 'MX_user_state', 1) ){
									echo  get_user_meta($userid, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?> 
				
			
				</h3>
				
			
			</div>
		</div>	
		
		
		
		<div class='clearfix'></div>
		<div class='profile-full-stats well green mb-10'>
		    
		    <h4>- Member Details -</h4>
		    
		    <hr>
			<div class="prof-info col-sm-6"><div class="col-xs-6">
										<b>Orientation</b></div><div class="col-xs-6">
										
											<p>- <?php echo get_user_meta($userid, 'MX_user_sexual_orientation', 1);?></p>
										</div>
										</div>
		
	
							<div class="prof-info col-sm-6"><div class="col-xs-6">
								<b>Ethnicity</b></div><div class="col-xs-6">
								
									<p>- <?php echo get_user_meta($userid, 'MX_user_ethnicity', 1);?></p>
								</div>
								</div>
								<div class="prof-info col-sm-6"><div class="col-xs-6">
									<b>Sex</b></div><div class="col-xs-6">
									
										<p>- <?php echo get_user_meta($userid, 'MX_user_sex', "user_", 1);?></p>
									</div>							</div>
									
									
									<div class="prof-info col-sm-6"><div class="col-xs-6">
																	<b>Hair Color</b></div><div class="col-xs-6">
																	
																		<p>- <?php echo get_user_meta($userid, 'MX_user_hair_color', 1);?></p>
																	</div>						
																	</div>
									
						<div class="prof-info col-sm-6"><div class="col-xs-6">
															<b>Out?</b></div><div class="col-xs-6">
															
																<p>- <?php echo get_user_meta($userid, 'MX_user_out', 1); ?></p>
															</div>									</div>
															<div class="prof-info col-sm-6"><div class="col-xs-6">
																<b>Body Hair</b></div><div class="col-xs-6">
																
																	<p>- <?php echo get_user_meta($userid, 'MX_user_body_hair', 1);?></p>
																</div>	

																</div>
																
																
																<div class="prof-info col-sm-6"><div class="col-xs-6">
							<b>Body Type</b></div><div class="col-xs-6">
							
								<p>- <?php echo get_user_meta($userid, 'MX_body_type', 1);?></p>
							</div>
							</div>
										
							<div class="prof-info col-sm-6">
							    <div class="col-xs-6">
																		<b>Eye Color</b></div><div class="col-xs-6">
																		
																			<p>- <?php echo get_user_meta($userid, 'MX_eye_color', 1);?></p>
																		</div>
																		
																	</div>
																	
					
								<div class='clearfix'></div>	
									<div class='clearfix mb-0'></div><hr>
								
				<div class="1col-md-8 1col-md-offset-4 well  stats mb-0 green1 pad-0 ">	
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


 <a type="button" class="btn btn-warning btn-sm hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal2-social" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
 
 
	</div>
		
					</div>			
							
		
						
			

		
		
		
		<div class='clearfix mb-10'></div>

		</div>
		
		</div>
		</div>

		<div class="clearfix"></div>
	</div>

	<div class="clearfix"></div>
<div class='container'>





		
	<div class="col-md-8 col-md-offset-1 well yellow">
	
					<div class='well1'>
	
		<div class='1col-sm-6 text-center hidden1'>
			<div class='visible-xs'><br></div>
			
			
			<div class='clear'></div>
			
		
			
			<div class='pix'>				
	
	<?php if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div>

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
			
		
			<?php //echo get_post_meta($Model_ID, 'MX_user_phone', true); 
			
			if(get_user_meta($user->ID, 'MX_user_phone', true)){
				
				?>
				<!--tel:<?php echo get_user_meta($user->ID, 'MX_user_phone', true); ?>-->
				<a class="btn btn-primary btn-success btn-block" href="/trial" >
				    <span class="glyphicon glyphicon-earphone " style="font-size: 11px ; padding-right: 3px;"></span> 1-267-***-****
					<br><small> <!--<?php echo get_user_meta($user->ID, 'MX_user_phone', true); ?>-->
				</a> 
				
				
				
				<?php 
			}
			
			
			?>
			
			
			
									<div class='clear'></div>
								
										
								<div class='clear'></div>
							
			<!--
			
			<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($Model_ID, 'MX_user_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
		
				
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='hidden btn btn-info btn-block'> REQUEST a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div>
		</div>
		
		
		
		
		
		
		<h3 class="text-center">Profile Stats</h3>
	
		
		
			<div class="col-md-12  well yellow text-left mb-10 h4">
									

				Blogs: <a  target='_blank' class='pull-right' href='/blog'>
				<?php	echo "" . $blog_count = count_user_posts( $user->ID  ); ?>
				</a>
                <hr class="mb-0">
				
				<!--<br>G Photos: <a  target='_blank' class='pull-right' href='/gallery'>-->
				<!--<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'g_galleries'); ?>-->
				<!--</a>-->
				<br>Photos: <a  target='_blank' class='pull-right' href='/photos'>
				<?php	echo "" . $photo_count = count_user_posts_by_type($user->ID, 'ssi_photos'); ?>
				</a>
				<hr class="mb-0">
				<br>Videos: <a  target='_blank' class='pull-right' href='/videos'>
				<?php	echo "" . $video_count = count_user_posts_by_type($user->ID, 'ssi_videos'); ?>
				</a>
                <hr class="mb-0">
				<br>Requests: <a target='_blank' class='pull-right' href='/requests'>	
				<?php	echo " " . $requests_count = count_user_posts_by_type($user->ID, 'ssi_requests'); ?>
				</a>

                <hr class="mb-0">
				<br>Events: <a  target='_blank' class='pull-right' href='/events'>
				<?php	echo "" . $events_count = count_user_posts_by_type($user->ID, 'ssi_events'); ?>
				</a>
			    <hr class="mb-0">
			    <br>Event RSVPs: <a  target='_blank' class='pull-right' href='/events'>
				<?php	echo "" . $events_count = count_user_posts_by_type($user->ID, 'event_guests'); ?>
				</a>
				
				<br><br><hr class="mb-10">Total Posts: 
				<a  target='_blank' class='pull-right' href='#'>								
				<?php	$total_count = $requests_count + $photo_count +  $video_count  + $events_count + $blog_count; 
					
					echo "" . $total_count; ?>

					</a>
					
	</div>
		
			<div class='joined-stats'>
		    
		    <div class='clearfix mb-10'></div>
    		<div class='col-xs-6 text-center'>
    			<u>Joined:</u><br>
    			<small><?php echo date('M j, Y', strtotime( $current_user->user_registered ) ); ?></small>
    		</div>
    		<div class='col-xs-6 text-center'>
    			<u>Last Here:</u><br>
    			<?php
    					$last_login = (int) get_user_meta( $userid , 'when_last_login' , true );
    					if ( $last_login ) {
    						$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
    						$value  = date_i18n( $format, $last_login );
    						echo $value;
    					}else{
    						echo "Never";
    					}
    			
    			?>
    		</div>
    		<div class='clearfix'></div>
		</div>
		

			
									<div class='clear'></div>
								
								
						
						
		
		
		
		
		
		
	
		
		<?php			
				if( !is_user_logged_in() ) {				
		?>
					
					<center>
					
    					<h3><small>Login to View</small><br>FULL PROFILE</h3><br>
    					<div class='well green'>
    					<?php echo do_shortcode('[wpmem_form login]'); ?>
    					</div>
    					
    					<a href='/wp-login.php?action=lostpassword' class='btn btn-lg btn-default hidden'> Forgot Password &rarr; </a>
    					
    					
					</center>

				
		<?php
				}else{
					
					
					?>
					
					
					
			<div id='user-personal'>
				
		


			
				<div id='user-info'>
				    
				    
				    

<?php   $count++;  ?>

	
								



					
						
						
						

	
		<div class='clear'></div>
			
			<?php  
			
			$photo_count = 1;

	wp_reset_query();
	$args = array(
    'author'        =>  $user->ID,
	'post_type' 	=> 'ssi_photos',
    'orderby'       =>  'modified',
    'order'         =>  'DESC',
    'posts_per_page' => -1
    );
	
	$Galleries = get_posts($args);
	
	?>
	<hr><h3 class=' text-center'><u><?php echo count($Galleries); ?></u> Photos</h3><hr>
	<?php
	
	foreach($Galleries as $Gallery){ 
	
		//if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?>
	
	<div class='col-xs-4 col-md-2 text-center'>
	    <?php echo $photo_count++; ?><br>
	    <a  target='_blank' class='img-thumbnail' href='/?p=<?php echo $Gallery->ID; ?>'>	
	        <?php
    			echo "";
    			echo get_the_post_thumbnail( $Gallery->ID , array(100,100) );
    			echo "";
			?>
			<br>
			(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
			
		</a>
		<div class='clear mb-10'></div>
	</div>
	<div class='well green hidden'>
		 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							
						<div class='col-xs-2'>	
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(50,50) );
								echo "";
								?>
						</div>
						<div class='col-xs-8 hidden1'>
						
					
							
						<?php		
								echo $Gallery->post_title;
								
							?> - 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
							<br><u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u>
						
						</div> 
							
							
							<button type="button" class="btn btn-default btn-sm pull-right hidden1">
							  View <span class="glyphicon glyphicon-play"></span> 
							</button>

							
									
						
								</a>
								<div class='clear'></div>
								</div>
								
<?php	}
	
wp_reset_query();

$count++;  ?>


    <div class='col-xs-4 col-md-2 text-center'>
	    <a type="button" class="btn btn-default btn-sm hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal2-photos" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span><br>Photos</a>
	</div>

    

	<div class='clear'></div>
	

	
	<div id='add-gallery' style='display: none;' class='text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			<button id='add-gallery' class='hidden-print btn btn-success btn-lg btn-block hidden1'>> Add Photos <</button>
			
			
				
								<div class='clear'></div>
	 
    <a type="button" class="btn btn-default 1btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-albums" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> Albums</a>

	
			
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-md-10 col-md-offset-1  home-beta">
			<center><h3> Upload Photos! </h3></center>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			//echo do_shortcode('[gravityform id="36" title="false" description="false"]');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clearfix'></div>	
			</div>
		</div>
	<div class='clear'></div>
	
	
	
	

<a target='_blank' href='/photos' class='btn btn-info btn-block hidden'> All Photos >></a>
			<div class='clear'></div>
			
			
			
			
			
				
		<div class='clear'></div>
			
			<?php  

	wp_reset_query();
	$args = array(
    'author'        =>  $user->ID,
	'post_type' 	=> 'ssi_videos',
    'orderby'       =>  'modified',
    'order'         =>  'DESC',
    'posts_per_page' => -1
    );
	
	$vids = get_posts($args);
	
	?>
	<hr><h3 class=' text-center'><u><?php echo count($vids); ?></u> Videos</h3><hr>
	<?php
	
	foreach($vids as $Gallery){ 
	
		//if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?>
	<div class=' well green col-md-6'>
		 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							
						<div class='col-xs-4 1col-md-3'>	
						<?php
								echo "";
							//	echo get_the_post_thumbnail( $Gallery->ID , array(340,260) );
								echo "";
								?>
								
								
									<?php
						if ( has_post_thumbnail( $Gallery->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $Gallery->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
								
        						//echo get_the_post_thumbnail( $Gallery->ID, 'thumbnail' ); 
        						echo '</a>';
?>
								<a href='/?p=<?php echo $Gallery->ID; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive img-thumbnail circle1'></a>
								<?php
   					 	}
					}else if( get_field('youtube_id', $Gallery->ID) ) {
						?>
						<center>
							<div class='clearfix mb-0'></div><br>
						<a href='/?p=<?php echo $Gallery->ID; ?>'>
							<img src='http://img.youtube.com/vi/<?php echo get_field('youtube_id', $Gallery->ID); ?>/0.jpg' alt='Youtube Image' class='1img-responsive img-thumbnail' >
						</a>	
						    <div class='clearfix mb-15'></div>
						
						</center>
						<?php
						
					}else{
						?>
						<center>
						<a href='/?p=<?php echo $Gallery->ID; ?>'>
							<img  src='/wp-content/uploads/2017/10/21433968_175756556303549_4577358612573192192_n.jpg' alt='Youtube Image' class='img-responsive circle'>
						</a>	
						
						</center>
						<?php
						
					}
			
					?>
						</div>
						<div class='col-xs-8 1col-md-9 hidden1'>
						
					
							
						<?php		
								echo $Gallery->post_title;
								
							?> - 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
							<br><u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u>
								<div class='clearfix mb-10'></div>
							<button type="button" class="btn btn-default btn-sm pull-right btn-block hidden1">
							  View <span class="glyphicon glyphicon-play"></span> 
							</button>
						
						</div> 
							
							
							

							
								
						
								</a>
								<div class='clear'></div>
								</div>
								
<?php	}
	
wp_reset_query();

$count++;  ?>

	<div class='clear'></div>
	
	
	
	
							
							<div class='clear'></div>
	
	<div id='add-vids' style='display: block;' class='text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			<button id='add-vids' class='hidden-print btn btn-success btn-lg btn-block hidden1'>> Add Videos <</button>
			
		</div>
	
		<div class='clear'></div>	

		<div id='add-vids' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-md-10 col-md-offset-1  home-beta">
			<center><h3> Upload Videos! </h3></center>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			//echo do_shortcode('[gravityform id="42" title="false" description="false"]');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-vids' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clearfix'></div>	
			</div>
		</div>
	<div class='clear'></div>
	
	
	
	

<a target='_blank' href='/videos' class='btn btn-info btn-block hidden'> All Videos >></a>
			<div class='clear'></div>
			
			
			
				<div id='user-info'>
				
				

<?php  

	$args = array(
    'author'        =>  $user->ID,
    'orderby'       =>  'modified',
	'post_status' => 'publish',
    'order'         =>  'ASC',
    'posts_per_page' => -1
    );
	$Galleries = get_posts($args);
	
	?>

	<hr><h3 class='text-center hidden1'>
	<?php
	echo count($Galleries);
	?>
		Posts
		</h3><hr>

	

	<?php
	
	foreach($Galleries as $Gallery){ 
	
		//if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?><div class='well green'>
		 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							
						<div class='col-xs-2'>	
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(50,50) );
								echo "";
								?>
						</div>
						<div class='col-xs-8'>
						
					
							
						<?php		
								echo $Gallery->post_title;
								
							?> - 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)
							<br><u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u>
						
						</div> 
							
							
							<button type="button" class="btn btn-default btn-sm pull-right">
							  View <span class="glyphicon glyphicon-play"></span> 
							</button>

						
								</a>
								<div class='clearfix'></div>
						</div>		
								<div class='clearfix'></div>
<?php	}
	


$count++;  ?>


<div class='clear'></div>
<a target='_blank' href='/post' class='btn btn-lg btn-success btn-block pulse'> New Post &raquo; </a>
	
	



	<div class='profile-social text-center hidden1'>
			<?php 
			
			$args = array(
				'author'        =>  $user->ID,
				'post_type'		=> 'ssi_requests',
				'orderby'       =>  'modified',
				'post_status' => 'publish',
				'order'         =>  'ASC',
				'posts_per_page' => -1
				);
			$requests = get_posts( $args );
			//echo count($requests); ?>
			<hr><h3><u><?php echo count($requests); ?></u> Requests</h3><hr>
		</div>

		<?php
		
			foreach( $requests as $request ){
		?>
		<div class='well'>
		<div class='col-md-4 text-center'>
		<br><br>
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			if( has_post_thumbnail( $request->ID ) ){
				echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'circle' )  );
			}else{
				echo get_avatar( $user->ID );
				
			}
	
			?><br><br>
		</div>
		<div class='col-md-8 text-center'>
		
			<div class='row'>
				<div class='col-md-6'>
					<?php
						if( get_field( "request_date", $request->ID ) ){ echo "<b><u>Date</u></b><br>" . get_field( "request_date", $request->ID ); }
						
						?>
				</div>
				<div class='col-md-6'>
					<?php
						if( get_field( "request_time", $request->ID ) ){ echo "<b><u>Time</u></b><br>" . get_field( "request_time", $request->ID ); }
					?>
				</div>
				<div class='clearfix'></div>
			</div>
		
				<div class='clearfix'></div>
				<?php
				if( get_field( "request_length", $request->ID ) ){ echo "<br><b>" . get_field( "request_length", $request->ID ); }
				?></b>
				<br>
				(<?php
				if( get_field( "request_interest", $request->ID ) ){ echo "" . get_field( "request_interest", $request->ID ) . ""; }
				
				?>)
				<?php
				echo "<br><br><b><u>Fantasy</u></b><br>" . $request->post_content;
				
			?>
		</div>
			<div class='clear'></div>	<br>
			<a target='_blank' href='/?p=<?php echo $request->ID; ?> ' class='btn btn-lg btn-default btn-block pulse hidden1'> View Request &rarr; </a>
		
		</div>
		
		<div class='clear'></div>	
		<?php
			}
		?>
		
		<a target='_blank' href='/thot-request' class='btn btn-lg btn-success btn-block pulse hidden1'> Make A Request &raquo; </a>
		
		
		
		<hr>

		
		<hr>
		<div class='profile-social text-center'>
			<?php $add_social = 0; ?>
			<h3> Profile Links </h3>
		</div>
		
		
		
		
		<div class="col-sm-12">
		
				
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


				</div>
				


				
</div>
				
			

	</div>			
		

</div>
	
	
<?php 
						
		}
						
		?>
		
	
		
	</div>	

<div class='col-md-3 hidden1'>
		<div class='img-thumbnail'>
			<?php get_template_part( 'ad' , '160-600' ); ?>
		</div>
	</div>	
	
	
	

   	 

	
	
	<div class='clearfix'></div>
	
	
	
<div class='clearfix mb-10'></div>



<br>


</div>
 
<div class='clearfix mb-10'></div>
    <div class="paginator ">
		<center>															
			<a class='pull-left btn btn-primary' href='/members'>
				« ALL Members
			</a>
			<a class='pull-right btn btn-primary' href='/user-profile/?ID=<?php echo ($userid+1);?>'>
				Next Member &raquo;
			</a>
		</center>
			<div class='clearfix'></div>
     </div>
<div class='clearfix'></div>
	</div>

<?php get_footer('mobile'); ?>