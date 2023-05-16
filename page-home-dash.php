<?php
/**
 * Template Name: Home Dash
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */
 
 
		if( !isset( $_COOKIE["free-tokens"] ) ){
				$num = 2;
				$current_user = wp_get_current_user(); 
				
				update_user_meta( $current_user->ID, "MX_user_tokens", $num );
				$tokens = get_user_meta( $current_user->ID, "MX_user_tokens" ,1);
				setcookie( "free-tokens", $tokens, time() + (86400 * 30), "/");

			}
			 if( is_user_logged_in()  ){ 
			
				
				$user = wp_get_current_user(); 
				//print_r($user); 
				//$user = $user[0];
				$userid = $user->ID;
				$current_user = get_userdata( $userid );
	}
 
 if( isset($_POST["edit_profile"] ) ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			//update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val , "user_" . $current_user->ID );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		//echo "<h1 class='text-center'> PROFILE UPDATED!! </h1>";
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
		wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
			
get_header("dash");
$count = 0;

?>
<style>
.wells {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
  position: relative;
  overflow: hidden;
}



@keyframes rainbow {
  0% {
    transform: rotate(0deg) translate(-50%, -50%);
  }
  100% {
    transform: rotate(360deg) translate(-50%, -50%);
  }
}

.wells.bg {
  background-color: #ffc107;
  background: linear-gradient(to bottom right, #FCB69F, #4F00BC, #2B32B2);
  background: linear-gradient(to bottom right, #F5ECEB, #D8D8D8, #E7E7E7);

  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
  position: relative;
  overflow: hidden;
  
}
.wells .img-thumbnail {
  box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
}
 
.wells.bg:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background-color: #ffc107;
  background: linear-gradient(45deg, #ffc107, #ff6b3d, #fc1e70, #8a2be2, #4cd137);
  background-size: 100% 100%;
  border-radius: 50%;
  opacity: 0.8;
  transform: translate(-50%, -50%);
  transition: all 0.5s ease-out;
}

.wells.bg:hover:before {
  width: 300%;
  height: 300%;
  border-radius: 15px;
  opacity: 0;
}

</style>

<div class="b-profile__header 1ads 1ad-shift 1img-thumbnail  ">


	<div class="b-profile__header__cover hidden1">
	<?php // Get the Cover Image

		$member_cover_image_url = false;
        $member_cover_image_url = bp_attachments_get_attachment('url', array(
          'object_dir' => 'members',
          'item_id' => $current_user->ID,
        ));

        if ( !$member_cover_image_url ) {
        	$member_cover_image_url = ""; 
        	?>
             	<div class=" 1porn well yellow hidden <?php if($member_cover_image_url) echo "hidden"; ?>">
				<center>
					<h5 class="hidden">Header Image</h5>

					<div class='clearfix mb-0'></div>

				<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-cover-image/">
				

					<img src="<?php echo $member_cover_image_url; ?>" alt="">
					<div class='clearfix mb-10'></div>
					
					Upload Photo &rarr;<br><br><br>
				</a>
				</center>
			</div>
	
			
            
             <img class="hidden" src="<?php echo esc_url( get_header_image() ); ?>" />

            <?php
        }else{
            
            ?>
             <img src="<?php echo $member_cover_image_url; ?>" srcset="<?php echo $member_cover_image_url; ?> 480w,<?php echo $member_cover_image_url; ?> 760w, <?php echo $member_cover_image_url; ?> 600w" sizes="(max-width: 480px) 480px,(max-width: 760px) 760px, 600px" alt="IamYungDADDY" class="b-profile__header__cover-img hidden">

            <?php
        }
      ?>
 
      
	 
	

	
	<!-- <img src="<?php echo $member_cover_image_url; ?>" width="100%" height="180" > -->
	
	<div class="clearfix"></div>

	
	
	<div class="cover profile-stats text-center 1container-fluid">
		<div class="1col-xs-12 col-md-8 col-md-offset-2 profile-stats">

		<div class="col-sm-2">
			<div class="clearfix mb-0"></div>
		
			
			
			
			
				<?php 
				
				
				
				$default_avatar = "https://secure.gravatar.com/avatar/?s=96&d=monsterid&r=g";
				$member_avatar = get_avatar_url($current_user->ID);
				
			
				if( !strpos( $member_avatar ,  "monsterid" ) ){
				
				  echo get_avatar($current_user->ID, 150);
				  
				}else{
				
				 ?>
				 <a href="/profile">
				 <img class="avatar circle" src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>">
				 </a>
				 <?php }
				 
				 
				// if( strpos( $member_avatar ,  "monsterid" ) ){ echo "here"; } 
				//echo get_avatar_url($current_user->ID);
				//echo  $member_avatar;
				 
				  ?>
		
			<div class="clearfix"></div>

		</div>
		<div class="col-sm-10">
			<div class="clearfix"></div>
			
			<div class="col-xs-4 col-sm-3 well ">
				<a href="/blog">
					<span class="h2">
						<?php 
							echo wp_count_posts()->publish;
							
						
						 ?>
					</span><br>
					Blogs
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well ">
				<a href="/photos">
					<span class="h2">
						<?php 
						
						        echo wp_count_posts('ssi_photos')->publish;
						?>
					</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well ">
				<a href="/videos">
					<span class="h2">
						<?php 
						
						
							
						        echo wp_count_posts('ssi_videos')->publish;
						
						 ?>

					</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well  hidden-xs">
				<a href="/requests">
					<span class="h2">

						<?php 
							echo wp_count_posts('ssi_requests')->publish;
						
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
	<div class="clearfix mb-0"></div>
	<?php get_template_part( 'content', 'login' ); 
				?>
	<div class="text-center  mb-0">			
	<?php //get_template_part( 'content', 'kings' ); 
				?>
	

	<div class='1container-fluid col-sm-6 text-center yellow mb-0 col-sm-offset-3'>

		<?php 
		    if( function_exists('dispMailbox') ){
			    echo dispMailbox(); 
		    }
		?>

	</div>
	
		
		


		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>


	
			<?php 
			/* get_template_part('content','kings');*/

	
	

			  ?>

		
		
	
				
		
		
			<div class='clear mb-5'></div>	
						
					<div class="btn-group btn-group-justified text-center hidden">
				  <a type="button" class="btn btn-md btn-default 1col-xs-6" id="myBtn2" data-toggle="modal" data-target="#myModal-edit" data-show="true"><span class=" glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Profile</a>

						<a type="button" class="btn btn-default btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-photos" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> Add Photos </a>
    <a type="button" class="btn btn-default btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-social" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> Social</a>
	
					
					<a href="/edit/" class="btn btn-default hidden">Edit Profile</a>
					<a  href="/profile/" class="btn btn-lg btn-info col-xs-6 hidden">View Profile</a>
				
					</div>
							

		
			<div class='clear mb-0'></div>	
		</div>
		
		
		<div class='clear mb-0'></div>	
			<div class='well1 1yellow 1login col-sm-8 text-center col-sm-offset-2 1 mb-0'>


            	

			

		<div class='1col-sm-6 text-center hidden '>



		<div class="social-form well green row mb-0">
			
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
	 

	
	

	
	<div id='user-personal'>
				
		
			
				<div id='user-info'>
				    
				    
			
				    
				    
				    

<?php   $count++;  ?>

	
							

          <div id='user-info hidden1'>
				

<?php  

	$args = array(
   // 'author'        =>  $user->ID,
    'orderby'       =>  'modified',
//	'orderby'                => 'meta_value_num',
			//	'meta_key'               => 'ratings_users', 
	
	/*  'meta_query' => array(
        array(
            'key' => 'wp_ratings', // Assuming 'ratings' is the meta key where ratings are stored.
            'value' => $user->ID, // Get posts that have not been rated by the current user.
            'compare' => 'NOT LIKE'
        )
    )*/
	
	'post_status' => 'publish',
    'order'         =>  'DESC',
    'posts_per_page' => 3
    );
	$Galleries = get_posts($args);
	
	?>
	<h3 class=' text-center  '>Recent Posts</h3> 
	<h3 class=' text-center hidden'>Top <u><?php echo count($Galleries); ?></u> Posts</h3>
	
	
	


   <a type="button" class="btn btn-default btn-lg hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-post" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> New Post</a>
	

		
	
	<a type="button" class="btn btn-default btn-lg hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-photos" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> Photos</a>
 	<div class='clearfix'></div><hr>


	
	
	
	
	<?php //if (function_exists('user_submitted_posts')) user_submitted_posts(); 
	
	
	
	
	
	
	foreach($Galleries as $Gallery){ 
	
		//if( get_field( 'post_type', $Gallery->ID ) == 'ssi_photos' ){ }else{ continue; }
		
		//print_r($Gallery);
	?>
	
	
	
	
	
	
	
	
	
	
	
	<div class='wells bg yellow1 mb-10'>
		
							
						<div class='col-xs-4 col-sm-2 img-thumbnail '>	
						 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
						<?php
								echo "";
								echo get_the_post_thumbnail( $Gallery->ID , array(75,75) , array( "class" => "img-thumbnail circle img-responsive " ) );
								echo "";
								?>
							
															<u><?php if(get_field( 'member_level', $Gallery->ID )){ echo get_field( 'member_level', $Gallery->ID ); }else{  echo "Public"; } ?></u> </a>

						</div>
					<div class='col-xs-8 col-sm-10'>
						
						 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>' class='h5 strong'>
							
						<?php		
								echo $Gallery->post_title;
								
							?> 
							
							<!--- 
							(<?php echo get_field( '#_of_photos', $Gallery->ID ); ?> Photos)-->
								<br>	<br>	

							</a>
								<div class=' well  mb-0 hidden1'>	
							<?php			
							
							//
							//print_r($Gallery);
							//	if(check_rated($Gallery->ID)) { echo check_rated($Gallery->ID); }
								
								
								
								
								if(check_rated( $Gallery->ID ) ){ 
									//echo "RATED";
									
									//echo the_ratings('div',$Gallery->ID,true);
									echo do_shortcode( "[ratings id=$Gallery->ID  ]" );
								}else{
									//echo "UN-RATED";
									echo do_shortcode( '[ratings id="'. $Gallery->ID  . '"]' );
								}
                        
										$closet = 0;
						//echo do_shortcode( '[ratings id="'. $Gallery->ID  . '" results="true"]' );
							
							
	?>					</div>
						</div> 
						<div class='col-sm-2 hidden1'>	
						 <div class="clearfix mb-10"></div>
							 <a  target='_blank' href='/?p=<?php echo $Gallery->ID; ?>'>
							<button type="button" class="btn btn-success btn-sm  btn-block 1pull-right">
							 View <span class="glyphicon glyphicon-play"></span> 
							</button>
							</a>
						</div>
							
						
								
								<div class='clearfix'></div>
						</div>		
								<div class='clearfix'></div>
<?php	}
	


$count++;  ?>

<div class='clear'></div>

	 
	 
	  <a type="button" class="btn btn-default btn-lg hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-post" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> New Post</a>
	  
	  
	  
	
	<div class='clearfix'></div> <br>
	
<a target='_blank' href='/blog' type='button' class='btn btn-lg btn-success pulse hidden'> All Posts &raquo; </a>
	<a type="button" class="btn btn-success1 btn-lg hidden1" href="/blog/" > <small>MORE</small> <br> 	<span class="glyphicon glyphicon-chevron-down"></span>  </a><br>
	 
	


	<br>	
	
				


				

				
				

				
		

</div>
		

	
	
	</div>
	
					
					
					<div class='clearfix'></div>
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden'><br> All Members &raquo;<br> <br>  </a>
		
		
				<?php //get_template_part( 'ad', '300-250-1' ); 
				?>

			
		<?php }else{ ?>
	            
				<div  class="col-xs-12 1col-sm-6 1col-sm-4 col-sm-offset-3 1col-sm-offset-3 mb-0 text-center ">
				    <br>
				<center><?php get_template_part( 'ad' , '300-250-1' ); ?> </center>
				
				</div>
		<?php } ?>
		<div class='clearfix mb-0'></div>
		
		


	</div>
		

</div>




<div class="clearfix mb-0"></div>
				


					<div class='clearfix'></div>




	
	
	    
	 
		<?php 
			if ( is_user_logged_in() ) {
				echo '<h3 class="text-center">- Top Ranked - </h3><br>';
				
				
				
				
				
				
			get_highest_rated('post', 0, 3);
			
			?>
			
							
<div class='clearfix mb-5'></div>

		<a href='/members' class=' col-xs-10 col-xs-offset-1 btn 1btn-block btn-primary bin-lg hidden1'><br> Our Members &raquo;<br> <br>  </a>
		
			
			<?php
			}else{
				?>
				
				
				
				

		
				
				<div class="clearfix mb-0"></div>
				
				<?php
			}
			
			
			//get_highest_rated('post', 0, 10);
			
			
		?>
		

	
	

<div class='clearfix'></div><br>





<?php 
	get_footer(""); 
?>