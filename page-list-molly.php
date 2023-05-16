<?php
/**
 * Template Name: Options Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 
 
		if( isset($_COOKIE["requestID"]) ){
			
			$requestID = 0;
			
			if( isset($_COOKIE["requestID"]) ){ $requestID = $_COOKIE["requestID"]; }
			
			update_post_meta( $requestID, "MX_user_email", $_POST["MX_user_email"] );
			
		}
 
			//echo "Count-> " . $_POST['count'];
			//echo "<br>Choice-> " . $_POST['choice'];
			
			if( $_POST['key'] == "member" ) {	
				if( $_POST['choice'] == "Yes" ) {
					$funnel = "/login/";
					//wp_redirect($funnel);
					//exit;	
				}
			}else{
				setcookie( $_POST['key'], $_POST['choice'], time() + (86400 * 30), "/");
			}
			
			
			//header("Refresh:0");
			//echo "<br>Cookie-> " . $_COOKIE["contactID"];
			
			
		if( isset($_COOKIE["confirm"]) || is_user_logged_in() ) {	

			if( $_COOKIE['person'] == "Pix" ){ $funnel = "/photos/"; }
			if( $_COOKIE['person'] == "Vids" ){ $funnel = "/videos/"; }
			
			$funnel = "/profile/";
		
			//wp_redirect($funnel);
			//exit;	
		}
		
		
		
		if( $_POST['key'] == "confirm" ){
			
			$name = "";
		
		if($_COOKIE['name'] == ''){ $name = "Mystery Man"; }else{ $name = $_COOKIE['name']; }
		// Create post object
		$my_post = array(
		  'post_title'    => $name,
		  'post_type'  => 'ssi_contact',
		  'post_status'   => 'pending',
		  'post_author'   => 1,
		  //'post_category' => $cats
		);
		 
		// Insert the post into the database
		$postID = wp_insert_post( $my_post );
		
		setcookie( "contactID", $postID, time() + (86400 * 30), "/");
		update_post_meta( $postID, "contactID", $postID );
			
			foreach ($_COOKIE as $param_name => $param_val) {
				
				//echo $param_name . " ==> " . $param_val . "<br>";
				
				update_post_meta( $postID, $param_name, $param_val );
				//update_field($param_name, $param_val , "user_" . $current_user->ID );
				//echo "'MX_user_$param_name' ,";
			}
			
		
	/*	
		$EventName = date("M jS", strtotime(get_field('event_date',get_the_ID())));
		
		$catID = get_cat_ID( $EventName );
							//$category =  get_the_category($EventID);
							$cats = array();
							
							array_push($cats, $catID);
		
		
		add_post_meta($postID , 'showed_up', 'No' );
		add_post_meta($postID , 'event_host', 'No' );
		update_post_meta($postID , 'vortex_system_likes', 1 );
		update_post_meta($guestID  , 'event_time_in', $_GET['time'] );
		wp_publish_post( $postID ); 
		wp_update_post( $postID ); 
		
		*/
		wp_update_post( $postID ); 
	}
		
				

get_header('members'); ?> 
	
	<?php if(!is_user_logged_in()){ echo "<br>"; } ?>

<div id="options" class="col-md-8 col-md-offset-2 hidden">


	<?php 
		
		//wp_redirect('/tour/');
		//exit;	
		
		//setcookie( $v_username, $v_value, 30 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
		
		$questions = array(
		
					array ( 
					"key" => "human",
					"q" => "Have we Met Before?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					array ( 
					"key" => "member",
					"q" => "Are you a Site Member?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					 array ( 
					"key" => "name",
					"q" => "Awesome!! <br>Im <u>Molly</u> .. and You Are?",
				   "a1" => "John",
				   "a2" => "Jane"
					 ),
					 array ( 
					"key" => "gender",
					"q" => "You Consider Yourself a:",
				   "a1" => "Boy",
				   "a2" => "Girl"
					 ),
					array ( 
					"key" => "seeking",
					"q" => "What Are You Seeking?",
				   "a1" => "Sex",
				   "a2" => "Love"
					 ),
					 array ( 
					"key" => "person",
					"q" => "Which Turns You On More?",
				   "a1" => "Pix",
				   "a2" => "Vids"
					 ),
					 array ( 
					"key" => "confirm",
					"q" => "Does this look about right?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					 array ( 
					"key" => "MX_user_email",
					"q" => "Confirm you are Human!",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
		);
		
		//print_r( $questions );
		//echo " --> " ;
		//print_r($_POST['key']);
		//echo " <br> " ;
		//echo " --> " ;
		//print_r($_POST['choice']);
		//echo " <br> " ;
		//setcookie( $_POST['key'], $_POST['choice'], time() + (86400 * 30), "/");
		
		
		
		
		foreach($questions as $question){
				
				//print_r($question['key']);
				
				//echo " --> " ;
				
				//print_r($_COOKIE[$question['key']]);
				
				//echo " <div class='clear'></div><hr>" ;
				
				
			}
			
		
		$count = $_POST['count'];
		if( !isset( $_POST['count'] ) ){  $count = 0; }
		$question = $questions[$count];
		
	

	if( $question['key'] == "confirm" ) {
			
			echo "<h3><center> You are a <u>" . $_COOKIE['gender'] . "</u> named <u>" . $_COOKIE['name'] . "</u> seeking <u>" . $_COOKIE['seeking'] . "</u>.</center></h3>";
			
			
			
			
		}
		
		
	$guests = get_posts( array (
						
					   'posts_per_page'    =>  -1,
					   'post_type' => array('ssi_contact', 'ssi_breed', 'ssi_thots'),
					   'post_status' => 'publish',
					   
						//'category_name'                  => 'event' . get_the_ID() ,
					    'order'                  => 'desc',
						//'orderby'                => 'meta_value_num',
						//'meta_key'               => 'vortex_system_likes',
						//'categories'	=>	array( -147 ),
					)     );


?> 
				
		
		
		
	<div class='col-xs-12'>	

		<h1 class="entry-title text-center"><?php echo $question['q']; ?></h1>
		
		<form id='options' method='POST' >
			<div class='well options text-center'>
				
				<input type='hidden' name='key' value='<?php echo $question['key']; ?>'> 	
				<input type='hidden' name='count' value='<?php echo $count+1; ?>'> 
			
				
				<?php 
				
					if( $question['key'] == 'name' ){
					?>
					
					<center><input type="text" name='choice' placeholder='Type Your Name' width="75%">
					</center>
					<input type='submit' class='btn btn-danger' value='Submit'> 
				
				<?php }else if( $question['key'] == 'MX_user_email' ){
					?>
					
					<center><input type="text" name='MX_user_email' placeholder='Enter Your Email' width="75%">
					</center>
					<input type='submit' class='btn btn-danger' value='Submit'> 
				
				<?php }else{ ?>
					<div class='col-xs-6 '>
						<input type='submit' name='choice' class='btn btn-danger' value='<?php echo $question['a1']; ?>'> 
						
				</div>
				<div class='col-xs-6 '>
						<input type='submit' name='choice' class='btn btn-danger' value='<?php echo $question['a2']; ?>'> 
				</div>
				
				<?php } ?>	
				<div class='clear'></div>
			</div>	
		</form>
	</div>			
			<?php
			
	
			
		echo " <div class='clear'></div><hr>" ;

?>

	<?php  if( $_POST['q'] == 'member' ){ ?>
	
			<center><a href='/login/'>Member Login </a></center>
		
		<?php } ?>
		



	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
	<div class='clear'></div>
	
	<h4 class='text-center '><u><?php echo count( $guests ); ?></u> THoTs in Training<br><small>as of Today</small></h4><hr>
<div class='text-left col-md-6 col-md-offset-3 mansion 1well'>
	
		
	<?php
		
					
					
					$thotcnt = count( $guests );
					
			foreach($guests as $lead){
				?>
				
				<div class=' well '>
					<div class='col-xs-6 col-sm-6'>
						
								<?php 
								
								echo $thotcnt-- . ". "; 
								?>
								<a href="/?p=<?php echo $lead->ID; ?>"><?php echo $lead->post_title; ?></a>
								
						
					</div>
					
					
					<div class=' col-sm-6 text-right'>
					
						Level: <?php 
						
						if(get_post_meta( $lead->ID, 'MX_user_level')){
							echo get_post_meta( $lead->ID, 'MX_user_level', true); 
						
						}else{
							//echo "1";
							update_post_meta( $lead->ID, 'MX_user_level', '1'); 
						}
						
						$request_cnt = 0;
						$user_requests = array();
						
						//echo "Author=" . $lead->post_author;
						
						if(get_post_meta( $lead->ID, 'MX_user_email')){
							//echo get_post_meta( $lead->ID, 'MX_user_level', true); 
							//echo "<br>EMAIL!<br>"; 
							
							$email = get_post_meta( $lead->ID, 'MX_user_email', true);
							
							$this_user = get_user_by("email", $email);
							
							$authorID = $this_user->ID;
							
							
							$request_args = array(
							'author'        =>  $this_user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							update_post_meta( $lead->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if( $lead->post_author > 0 ){
							

							$request_args = array(
							'author'        =>  $lead->post_author ,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							update_post_meta( $lead->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if(get_post_meta( $lead->ID, 'MX_user_id')){
							
							$authorID = get_post_meta( $lead->ID, 'MX_user_id', true);
							
							$request_args = array(
							'author'        =>  $this_user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							$request_cnt = count($user_requests);
							
							if( $authorID > 0 && ( $request_cnt >= 1)  ){ 
							
							//echo "Author=" . $authorID; 
							//echo "2";
							update_post_meta( $lead->ID, 'MX_user_level', '2'); 
							
							
							}
						}
						
							
							
							
							
						
						
						?>
					</div>
					
					
					<div class='clearfix'></div><br>
					
					
					<div class='well yellow'>
					<div class='col-xs-6 hidden'>
									<b><?php echo get_post_meta($lead->ID, 'name', true); ?></b>
								</div>
								<div class='col-xs-12 text-center'>
									<b>Level 1</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='col-xs-6'>
									I am a:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($lead->ID, 'gender', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									Seeking:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($lead->ID, 'seeking', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									I Prefer:
								</div>
								<div class='col-xs-6 text-right'>
									<?php echo get_post_meta($lead->ID, 'person', true); ?>
								</div>
								<div class='clearfix'></div>
						</div>		
							

						<div class='clearfix'></div>


						<div class='well yellow'>
					
								<div class='col-xs-12 text-center'>
									<b>Level 2</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='text-center'>
									# of Requests: <?php echo $request_cnt; ?>
								</div>
								
									<div class='profile-social text-center'>
			
			<h3><u><?php if( $request_cnt > 8 ){ echo "0"; }else{ echo $request_cnt; } ?></u> Requests</h3>
		</div>

		<?php
		if( $request_cnt < 8 ){
			foreach( $user_requests as $request ){
		?>
		<div class='well'>
		
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			if( has_post_thumbnail( $request->ID )  ){
				echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			}else{
				?>
				<div class="alignleft">
				<?php
				echo get_avatar();
				?>
				</div>
				<?php
			}
		?>

		<?php
				if( get_field( "request_date", $request->ID ) ){ echo "Date: " . get_field( "request_date", $request->ID ) . ' ...  <br>'; }
					if( get_field( "request_time", $request->ID ) ){ echo "Time: " . get_field( "request_time", $request->ID ) . ' ...  <br>'; }
				
				if( get_field( "request_length", $request->ID ) ){ echo "<br> - <b>" . get_field( "request_length", $request->ID ) . '</b> - '; }
				
				if( get_field( "request_interest", $request->ID ) ){ echo " " . get_field( "request_interest", $request->ID ) . " "; }
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				
			?>
			
			<div class='clear'></div>	
		</div>
		
		<div class='clear'></div>	
		<?php
			}
		}
		?>
		
				
				
				
				
				
				
				
				
				
							<div class='col-sm-12 text-center hidden'>
		<?php 		
		
			
			echo "<span class='num'>" . ($count+1) . "</span>";	

									$count++;
						
				?>
		<br><br>
		
		
		<div class='video-set1 well flyer flyer-bg'>
			
			
			<?php $guestID = get_field( 'user_ID' , $lead->ID ); ?>
			
			<a target="_blank" href='/user-profile/?ID=<?php echo $guestID; ?>' class=' '>
			

			<div class='col-xs-4 h3'>
				
			
				
			<?php 
				
				
				echo "<center>" . get_field( 'member_level', $guestID ) . "</center>";
				
				
					echo get_avatar($guestID);
				
	
				?>
			
				
			</div>
			<div class='col-xs-8'>
			
		
			
			 <center>
				<h4><?php echo $lead->post_title;  ?><hr></h4>
			 
				<?php 
			
					echo get_field( 'MX_user_age', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_height_ft', $lead->ID ); echo "' ";
					echo get_field( 'MX_user_height_in', $lead->ID ); echo " -- ";
					echo get_field( 'MX_user_weight', $lead->ID ); echo "<br>";
				
				if(get_field( 'MX_user_position', $lead->ID ) != "" ){
					echo get_field( 'MX_user_position', $lead->ID );
				}else{
					
					echo " -- ";
				}
				//	echo get_field( 'MX_user_endowment', $guestID ); echo "in<br>";	
					
					?>
					
					</div>
					<div class='clearfix'></div><br>
<div class='pix hidden'>				
	<a target='_blank' href='/party_guests/<?php echo $lead->post_name; ?>'>
	<?php if( get_field( 'lead_image_1', $guestID ) ){ ?>		
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_2', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_3', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	<?php if( get_field( 'lead_image_4', $guestID ) ){ ?>				
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $guestID );?>' style='width: 65px; height: 65px;'></div>
	<?php }else{
		?>
		<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' class=' aligncenter' ></div>
		<?php
	}
	?>
	</a>
		
<div class='clearfix'></div>
</div>	
					<?php
	
					$likes = $dislike = 0; 

					$likes =  get_post_meta($lead->ID,'vortex_system_likes',true);
					$dislikes =  get_post_meta($lead->ID,'vortex_system_dislikes',true);

				
				?>
		
		

				<div class="col-xs-offset-3 col-xs-3 vortex-p-like 12168 hidden ">
				
				<a class='icon-thumbs-up-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $likes; ?></a>
			
					
				</div>
				
				<div class="col-xs-3 vortex-p-dislike 12168 hidden">
				<a class='icon-thumbs-down-1' href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>' ><?php echo  $dislikes; ?></a>
				
				
				</div>

		</a>
		
		
		<?php 
		
		if( get_field( 'MX_user_email', $lead->ID ) ){ 
		
			if( get_user_by('email' ,get_field( 'MX_user_email', $lead->ID ) ) ){ //echo "HAS USER<br>"; 
			}else{ //echo "MAKE NEW USER"; 
			
				$email = get_field( 'MX_user_email', $lead->ID );
				$userdata = array(
					'user_login'  =>  $lead->post_name,
					'user_email' => $email,
					
					'user_pass'   =>  NULL  // When creating an user, `user_pass` is expected.
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
		
		
		if( get_field( 'user_ID', $lead->ID ) ){

			?>
			
					<a target="_blank" href='/user-profile/?ID=<?php echo get_field( 'user_ID', $lead->ID ); ?>' class='btn btn-primary btn-block'>View Profile >></a>

			<?php

		}else{
			
			
			?>
			
					<a target="_blank" href='/claim/?claimID=<?php echo $lead->ID; ?>' class='btn btn-default'>Claim Profile >></a>

			<?php

		} ?>
		<div class='clearfix'></div>

			
			
			<?php 
				$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');
		
			if( get_field( 'showed_up' , $lead->ID ) == 'Yes' ){ 
					echo "<br><span class='num text-center here'>HERE NOW!!</span>";	
				}else if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		?>			<br>
					<a href='?update=1&here=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>&alias=<?php echo $lead->post_title; ?>' class='btn- btn-default'>Here Now!</a>
		<?php

			}
		?>
		</div>
		<br>
			
			
			
			<?php if( ($count % 3) == 0 ){ echo "<div class='clearfix'></div><br>"; }  ?>
	</div>

							
							
								<div class='clearfix'></div>
						</div>								
								
					<div class=' col-sm-12 text-right'>
						<div class='clearfix'></div>
						<a href='/train?ID=<?php echo $lead->ID; ?>' class='btn btn-block btn-success pulse'>Level Up &rarr;</a>
						<div class='clearfix'></div>
					</div>
							<div class='clearfix'></div>	
					</div>
					
					
				<?php
				
			}
					
	?>
		
	
<div class='clear'></div>
			<a href="/training" class="btn rsvp btn-success btn-lg btn-block pulse">Get on The List >></a>
</div>
<div class='clearfix'></div><br><br>
<?php //get_sidebar(); ?>
<?php get_footer('preview'); ?>