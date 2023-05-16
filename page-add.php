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
 
 if( is_user_logged_in()  ){ 
			
			
			$user = wp_get_current_user(); 
			//print_r($user); 
			//$user = $user[0];
			$userid = $user->ID;
			$current_user = get_userdata( $userid );
}

$contactID = $_GET["ID"];

if($_POST['MX_user_password']){
	
	//$date_added = date('Y-m-d H:i:s', strtotime($_POST['date_added']) );
// Create post object

		//$post_status = $_POST['post_status']
		
		
		
		foreach ($_POST as $param_name => $param_val) {
			add_post_meta($contactID, $param_name, $param_val, true);
			update_post_meta( $contactID, $param_name, $param_val  );

		}




		 if( get_user_by('email' , get_field( 'MX_user_email', $contactID ) ) ){ echo "HAS USER<br>"; 
					}else{ echo "MAKE NEW USER"; 
					
						$email = get_field( 'MX_user_email', $contactID );
						$user_password = null;
						if ( get_field( 'MX_user_password', $contactID ) ) {
							$user_password = get_field( 'MX_user_password', $contactID );
						}
						$userdata = array(
							'user_login'  =>  $lead->post_title,
							'user_email' => $email,
							
							'user_pass'   =>  $user_password  // When creating an user, `user_pass` is expected.
						);

						$user_id = wp_insert_user( $userdata ) ;

						//update_field( 'user_ID' , $user_id , $lead->ID );
						//On success
						if ( ! is_wp_error( $user_id ) ) {
							echo "User created : " . $user_id;
						}
					
					
					}


		
		$pg = "/profile/"; wp_redirect($pg); exit; 
		
		//set_post_type( $post_id, 'ssi_staff' );
		
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
		
		wp_redirect( '/user-profile/?ID=' . $current_user->ID );
	}
	
	
get_header('dash'); 



?>



		<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'publish' , 'category_name' => 'top-thot' ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish', 'pending') , 'category_name' => 'thots' ));
			
		?>
<style>

	legend {
		display: none;
	}
	input.buttons {
		margin: 1em;
	}
</style>
		
<div id="" class="">

	<div id="" class="col-md-6 col-md-offset-4">
	<center>
	
		<!--<h4 class="text-center " >Submit A BREED Request:</h4><hr>-->
		<?php

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
		$thumb_url = $thumb_url_array[0];
?>
		<!--<a href="/members"><img src='<?php echo $thumb_url; ?>'></a>-->
		
		<?php //echo dispMailbox(); ?>
		
<?php
		 if( is_page( array('resume', 'contact', 'gallery', 'subscribe') ) ){

		 }else if ( $thumb_url == '/wp-content/uploads/2018/08/ad-BreedFest-300-250-visit-now.png' ){


		} else { 

		
				//twentysixteen_post_thumbnail(); 
			
		}

	?></center>
	</div>
	
	<div id="" class="col-md-6">
			<?php //echo do_shortcode('[gravityform id="19" title="false" description="false"]');
			 ?>
	</div>
	<header class="entry-header text-center hidden">
		
		<?php //the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
	
	</header><!-- .entry-header -->
    <br>
	<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 ));
			//$thots = get_posts(array( 'numberposts' => 1, 'post_type' => 'ssi_models' , 'orderby' => 'modified', 'order' => 'desc' , 'post_status' => 'publish' , 'category_name' => 'thots' ));
			$thots = get_posts(array(  'post_type' => array('ssi_models', 'ssi_requests') , 'posts_per_page' => -1, 'order' => 'asc'  ,'orderby' => 'modified', 'post_status' => array('publish', 'pending')  ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			
			
		?>



	<div class='well blue col-sm-6 text-center col-sm-offset-3'>
		
		
		
	
	<div class='clearfix'></div>
		
		<?php if( 1 /*is_user_logged_in()*/ ){ ?>
		<div class='clearfix'></div>
		
		
		<div class="well mb-0 ">
		
		<form method='post'>
		
		<h3><center><input type='text' name='post_title' placeholder='Username' value='<?php echo $_GET['username']; ?>' class='1form-control'></center></h3><hr>
		
		<div class="col-sm-4 text-center">
								
							<div class="link upper bold white">
								<center>
								    
    						
    								    <br class="hidden-xs">
    								<?php echo get_avatar('200'); ?>
									
								</center>
							</div>
									
									<br>
									
									<div class='clear'></div>
							
									
								<a href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class='hidden btn btn-block btn-warning'>Change Photo</a>
								
									

</div>


<div class="col-sm-7 col-sm-offset-1  ">
													
				
				<div class=' col-xs-4'>
				Age:
			</div>
			<div class=' col-xs-8'>
				 <input type='number' name='MX_user_age' class='form-control' placeholder='18' min='18'> 
			</div>
			<div class='clearfix mb-10'></div>
			
			<div class=' col-xs-4'>
				Height:
			</div>
			<div class=' col-xs-8'>
			<?php 
				
					//$att = get_user_meta($current_user->ID, 'MX_user_height_ft', 1);
					$options = array( '-', '4', '5',  '6',  '7' );

				?>
				<select name="MX_user_height_ft" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			
				ft
				
				<?php 
				
					//$att = get_user_meta($current_user->ID, 'MX_user_height_in', 1);
					$options = array( '-', '0', '1', '2',  '3',  '4', '5',  '6',  '7', '8', '9', '10', '11');

				?>
				<select name="MX_user_height_in" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
				
						 in
				
				
			</div>
			
			<div class='clearfix mb-10'></div>
			
			
			<div class=' col-xs-4'>
				Weight:
			</div>
			<div class=' col-xs-8'>
				<input type='number' name='MX_user_weight' class='form-control' placeholder='150' min='50'>
			</div>	
			
			<input type='hidden' name='post_type' value='ssi_contacts'>
				
			<input type='hidden' name='post_content' value='Added from KIK Adder!'>	
				
			<input type='hidden' name='new_post' value='true'>
			<input type='hidden' name='edit_profile' value='true'>


</div>
		<div class='clear'></div><hr>
		<h3><center>Location</center></h3>
											<hr>
		
	
			
		<div class=' col-sm-5'>
					<b>State:</b>
				<br>
					<select name="MX_user_state" class="form-control" > 
              <option value="">Select a State</option> 
              <option value="AL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AL'){ print 'selected="selected"'; } ?>>AL - Alabama</option> 
              <option value="AK" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AK'){ print 'selected="selected"'; } ?>>AK - Alaska</option> 
              <option value="AZ" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AZ'){ print 'selected="selected"'; } ?>>AZ - Arizona</option> 
              <option value="AR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AK'){ print 'selected="selected"'; } ?>>AR - Arkansas</option> 
              <option value="CA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CA'){ print 'selected="selected"'; } ?>>CA - California</option> 
              <option value="CO" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CO'){ print 'selected="selected"'; } ?>>CO - Colorado</option> 
              <option value="CT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CT'){ print 'selected="selected"'; } ?>>CT - Connecticut</option> 
              <option value="DE" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'DE'){ print 'selected="selected"'; } ?>>DE - Delaware</option> 
              <option value="DC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'DC'){ print 'selected="selected"'; } ?>>DC - District of Columbia</option> 
              <option value="FL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'FL'){ print 'selected="selected"'; } ?>>FL - Florida</option> 
              <option value="GA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'GA'){ print 'selected="selected"'; } ?>>GA - Georgia</option> 
              <option value="HI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'HI'){ print 'selected="selected"'; } ?>>HI - Hawaii</option> 
              <option value="ID" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ID'){ print 'selected="selected"'; } ?>>ID - Idaho</option> 
              <option value="IL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IL'){ print 'selected="selected"'; } ?>>IL - Illinois</option> 
              <option value="IN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IN'){ print 'selected="selected"'; } ?>>IN - Indiana</option> 
              <option value="IA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IA'){ print 'selected="selected"'; } ?>>IA - Iowa</option> 
              <option value="KS" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'KS'){ print 'selected="selected"'; } ?>>KS - Kansas</option> 
              <option value="KY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'KY'){ print 'selected="selected"'; } ?>>KY - Kentucky</option> 
              <option value="LA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'LA'){ print 'selected="selected"'; } ?>>LA - Louisiana</option> 
              <option value="ME" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ME'){ print 'selected="selected"'; } ?>>ME - Maine</option> 
              <option value="MD" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MD'){ print 'selected="selected"'; } ?>>MD - Maryland</option> 
              <option value="MA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MA'){ print 'selected="selected"'; } ?>>MA - Massachusetts</option> 
              <option value="MI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MI'){ print 'selected="selected"'; } ?>>MI - Michigan</option> 
              <option value="MN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MN'){ print 'selected="selected"'; } ?>>MN - Minnesota</option> 
              <option value="MS" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MS'){ print 'selected="selected"'; } ?>>MS - Mississippi</option> 
              <option value="MO" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MO'){ print 'selected="selected"'; } ?>>MO - Missouri</option> 
              <option value="MT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MT'){ print 'selected="selected"'; } ?>>MT - Montana</option> 
              <option value="NE" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NE'){ print 'selected="selected"'; } ?>>NE - Nebraska</option> 
              <option value="NV" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NV'){ print 'selected="selected"'; } ?>>NV - Nevada</option> 
              <option value="NH" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NH'){ print 'selected="selected"'; } ?>>NH - New Hampshire</option> 
              <option value="NJ" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NJ'){ print 'selected="selected"'; } ?>>NJ - New Jersey</option> 
              <option value="NM" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NM'){ print 'selected="selected"'; } ?>>NM - New Mexico</option> 
              <option value="NY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NY'){ print 'selected="selected"'; } ?>>NY - New York</option> 
              <option value="NC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NC'){ print 'selected="selected"'; } ?>>NC - North Carolina</option> 
              <option value="ND" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ND'){ print 'selected="selected"'; } ?>>ND - North Dakota</option> 
              <option value="OH" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OH'){ print 'selected="selected"'; } ?>>OH - Ohio</option> 
              <option value="OK" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OK'){ print 'selected="selected"'; } ?>>OK - Oklahoma</option> 
              <option value="OR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OR'){ print 'selected="selected"'; } ?>>OR - Oregon</option> 
              
              <option value="PA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'PA'){ print 'selected="selected"'; } ?>>PA - Pennsylvainia</option> 
              <option value="PR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'PR'){ print 'selected="selected"'; } ?>>PR - Puerto Rico</option> 
              <option value="RI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'RI'){ print 'selected="selected"'; } ?>>RI - Rhode Island</option> 
              <option value="SC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'SC'){ print 'selected="selected"'; } ?>>SC - South Carolina</option> 
              <option value="SD" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'SD'){ print 'selected="selected"'; } ?>>SD - South Dakota</option> 
              <option value="TN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'TN'){ print 'selected="selected"'; } ?>>TN - Tennessee</option> 
              <option value="TX" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'TX'){ print 'selected="selected"'; } ?>>TX - Texas</option> 
              <option value="VT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VT'){ print 'selected="selected"'; } ?>>VT - Vermont</option> 
              <option value="VI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VI'){ print 'selected="selected"'; } ?>>VI - Virgin Islands</option> 
              <option value="VA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VA'){ print 'selected="selected"'; } ?>>VA - Virginia</option> 
              <option value="WA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WA'){ print 'selected="selected"'; } ?>>WA - Washington</option> 
              <option value="WV" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WV'){ print 'selected="selected"'; } ?>>WV - West Virginia</option> 
              <option value="WI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WI'){ print 'selected="selected"'; } ?>>WI - Wisconsin</option> 
              <option value="WY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WY'){ print 'selected="selected"'; } ?>>WY - Wyoming</option> 
            </select>
			<div class='clearfix mb-15'></div>
		</div>
		<div class='col-xs-7 col-sm-4'>
			
				<b>City:</b>
				<br>
				 <input type='text' name='MX_user_city' placeholder='City' class='form-control' >
		</div>	
		<div class='col-xs-5 col-sm-3'>
			
			<b>Zip:</b>
				<br>
				 <input type='number' name='MX_user_zip_code' placeholder='#####' class='form-control' >
				
			
			
		</div> 
		<div class='clearfix'></div><hr>
		
		<h4><center>Enter Your Email</center></h4>
		<div class='clearfix col-xs-12 mb-10'>
			<div class='clearfix mb-10'></div>	
			<center><input type='email' name='MX_user_email' placeholder='Enter Email' class='form-control'></center>
		</div>
		
		<div class='clearfix mb-10'></div>
		
		
		
		<h4><center>Create A Password</center></h4>
		<div class='clearfix col-xs-6 mb-10'>
			<div class='clearfix mb-10'></div>	
			<center><input type='text' name='MX_user_password' placeholder='Enter Password' class='form-control'></center>
		</div>		
		<div class='clearfix col-xs-6 mb-10'>
				<div class='clearfix mb-10'></div>	
			<center><input type='text' name='MX_user_confirm_password' placeholder='Confirm Password' class='form-control'></center>
		</div>
	

		<div class='clearfix'></div><hr>
				
		<input type='submit' value='Add Profile' class='btn btn-lg btn-success btn-block' style='padding: 1em; '>



	</form>
	</div>
		
		
	
		
		<?php } ?>
		
			
	<div class="stats">
						
			<!--<hr><h4>Welcome: </h4><hr>-->
			
			

			<div class='clearfix'></div>
					
				
				<div class="col-md-12">	

							
					<center>
						

						<!--<h3>Register Below:</h3><br>-->
		<div id="menu" style='display: block;'>
			<a href='/thot-request' class='btn btn-block btn-default btn-lg hidden'>> Request a Session <</a>
			<?php //echo do_shortcode(" [wpmem_form login] "); ?>
			
			<!--
			<a href='/user-profile' class='btn btn-block btn-info btn-lg'>Your Profile</a>
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
			-->
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

	

<div class='clearfix'></div>
	


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


<?php get_footer('preview'); ?>
