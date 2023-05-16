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
 
 

		$thot_category = get_cat_ID( 'thotmaster' );
		$met_before = 0;
		
		if ( $_GET["level"] ) {
			//echo "Level: " . $_GET["level"];
		}
		

 	

get_header('members'); ?> 

<div class="btn-group btn-group-justified">

	<a href="http://dlfreakfest.org/levels/?level=1" class="btn btn-default">Level 1 <br> <small>INTRO</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=2" class="btn btn-default">Level 2 <br> <small>PHOTO</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=3" class="btn btn-default">Level 3 <br> <small>PROFILE</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=4" class="btn btn-default">Level 4 <br> <small>REQUEST</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=5" class="btn btn-default">Level 5 <br> <small>SESSION</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=6" class="btn btn-default">Level 6 <br> <small>THoT FILE</small> </a>
	<!--<a href="http://dlfreakfest.org/levels/?level=7" class="btn btn-default">Level 7</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=8" class="btn btn-default">Level 8</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=9" class="btn btn-default">Level 9</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=10" class="btn btn-default">Level 10</a>-->
</div>

<div class="clearfix"></div><br>

<div id="profile" class="col-md-8 col-md-offset-2 text-center">	
	<?php if(!is_user_logged_in()){ echo "<br>"; }else{
		
		
		
		
		
		$authorID = get_current_user_id();
		
		echo do_shortcode("[greet_me]");
		echo "<hr>";
		// echo get_avatar($authorID);
		
		// echo "<hr>";
		
		?>
		
		<div class=' well hidden'>
					<div class='col-xs-6 col-sm-6'>
						
								<?php 
								
								echo $thotcnt-- . ". "; 
								?>
					
								
						
					</div>
					
					
					<div class=' col-sm-6 text-right'>
					
						 <?php 
						
						if(get_post_meta( $post->ID, 'MX_user_level')){
							//echo get_post_meta( $post->ID, 'MX_user_level', true); 
						
						}else{
							//echo "1";
							update_post_meta( $post->ID, 'MX_user_level', '1'); 
						}
						
						$request_cnt = 0;
						$user_requests = array();
						
						//echo "Author=" . $post->post_author;
						
						if(get_post_meta( $post->ID, 'MX_user_email')){
							//echo get_post_meta( $post->ID, 'MX_user_level', true); 
							//echo "<br>EMAIL!<br>"; 
							
							$email = get_post_meta( $post->ID, 'MX_user_email', true);
							
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
							update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if( $post->post_author > 0 ){
							

							$request_args = array(
							'author'        =>  get_current_user_id() ,
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
							update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
							
							
						}else if(get_post_meta( $post->ID, 'MX_user_id')){
							
							$authorID = get_post_meta( $post->ID, 'MX_user_id', true);
							
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
							update_post_meta( $post->ID, 'MX_user_level', '2'); 
							
							
							}
						}
						
							
							$user = wp_get_current_user();
							
							
						//echo "Level: " . get_user_meta( $user->ID, 'MX_user_level', true);
						
						?>
					</div>
					
					
					<div class='clearfix'></div>
					<?php 
						foreach ($_COOKIE as $param_name => $param_val) {
				
							//echo $param_name . " ==> " . $param_val . "<br>";
							
							update_post_meta( $postID, $param_name, $param_val );
							update_field($param_name, $param_val , "user_" . $user->ID );
							//echo "'MX_user_$param_name' ,";
						}
						
						
						
						if( get_user_meta( $user->ID, 'MX_user_level', true) >= 1 ){
					?>
					
							<div class='well yellow hidden1'>
							<div class='col-xs-6 hidden'>
											<b><?php echo get_post_meta($post->ID, 'name', true); ?></b>
										</div>
									
											<b>Level 1</b>
										
										<div class='clearfix'></div><hr>
										
										<h3 class="alarm alarm-warning text-left">THoT Introduction <small></small> &rarr; 
										  <a href='/training' class='btn btn-warning pull-right'>Start Training</a>
										</h3>
				
							</div>		
							
						<?php } 
						
							if( get_user_meta( $user->ID, 'MX_user_level', true) >= 2 ){
						?>
						
						<div class='clearfix'></div>
						
						<div class='well yellow'>
					
								
									<b>Level 2</b><hr>
									
										
											<h3 class="alarm alarm-warning text-left">Upload a Photo -- <small>Face is NOT Required</small> &rarr; 
											  <a href='/members-list/<?php  echo $user->user_nicename; ?>/profile/change-avatar/' class='btn btn-warning pull-right'>Upload Image</a>
											</h3>
												
							
								
								
								
								<?php //get_template_part('content', 'add-profile'); ?>
								
								<div class='clearfix'></div>
								
						</div>
						
						<?php } 
						
							if( get_user_meta( $user->ID, 'MX_user_level', true) >= 3 ){
						?>
						
						<div class='well yellow'>
								
									<b>Level 3</b>
									
									<hr>

									<h3 class="alarm alarm-warning text-left">Complete Your Profile <small></small> &rarr; 
									  <a href='/profile/?ID=<?php echo $user->ID; ?>' class='btn btn-warning pull-right'>Edit Profile</a>
									</h3>									
											
								
								</div>
								
								<div class='clearfix'></div>
								<?php } 
						
							if( get_user_meta( $user->ID, 'MX_user_level', true) >= 4 ){
						?>
						
						<div class='well yellow'>
					
								<div class='col-xs-12 text-center'>
									<b>Level 4</b>
								</div>
								
								<div class='clearfix'></div><hr>
								<h3 class="alarm alarm-warning text-left">Make a THoT Request -- <small>Plan Our 1st Session</small> &rarr; 
									  <a href='/thot-request' class='btn btn-warning pull-right'>Make A Request</a>
									</h3>
								
		
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
		<div class=''>
		
		
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
				echo get_avatar( $user->ID );
				?>
				</div>
				<?php
			}
		?>

		
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			
			
			?>
			<div class='row'>
				<div class='col-md-6'>
					<b><u>Date</u></b><br>
				
					<?php
						if( get_field( "request_date" ) ){ echo get_field( "request_date" ); }else{ echo "-"; }
						
						?>
				</div>
				<div class='col-md-6'>
					<?php
						if( get_field( "request_time" ) ){ echo "<b><u>Time</u></b><br>" . get_field( "request_time" ); }
					?>
				</div>
				<div class='clearfix'></div>
			</div>
		<div class='clearfix'></div>
		<?php
		
				
				if( get_field( "request_date", $request->ID ) ){ echo "Date: " . get_field( "request_date", $request->ID ) . ' ...  <br>'; }
					if( get_field( "request_time", $request->ID ) ){ echo "Time: " . get_field( "request_time", $request->ID ) . ' ...  <br>'; }
				
				if( get_field( "request_length", $request->ID ) ){ echo "<br> - <b>" . get_field( "request_length", $request->ID ) . '</b> - '; }
				
				if( get_field( "request_interest", $request->ID ) ){ echo " " . get_field( "request_interest", $request->ID ) . " "; }
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				
			?>
			
			<div class='clear'></div>	
			
			
				<a target='_blank' href='/?p=<?php echo $request->ID; ?> ' class='btn btn-lg btn-default btn-block pulse hidden1'> View Request &rarr; </a>
		</div>
		
		<div class='clear'></div>	
		<?php
			}
		}
		?>
		
			<?php } 
						
						
						?>	

			<a href='/train?ID=<?php echo $post->ID; ?>' class='btn btn-block btn-success hidden pulse'>Level Up &rarr;</a>
				<div class='clearfix'></div>
			
							<div class='clearfix'></div>	
					</div>
	
	
	

	
		<div class='well green'>
		<br>
	
	
		

	
	 <center>

			
			
			<div class='col-sm-12 well yellow'><br>
			
			
			
			
			
			
			
			
							
							
								
				<div class="col-xs-5 col-md-4 mb-0 ">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>
						<?php //echo do_shortcode("[bp_profile_gravatar]"); 
						
						
						
						?>
						
						
								<?php 
				
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
				?>
						
							<?php echo get_avatar($current_user->ID, 150); ?>
						
				
	
				
						<br>
						edit
					</a>
					
				    <br>
				
		
						

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
			
			<div class='clearfix'></div><hr class=' mb-10'>
				<div class="btn-group btn-group-justified ">
						<a href="/edit/" class="btn btn-default">Edit Profile</a>
						<a  href="/profile/" class="btn btn-info">View Profile</a>
				</div>
			

				</div>
		
				
			
			
			
							
						
					
		</div>	
			
				
		

			
			
			
<div class='clearfix'></div>

			<div class='col-md-12'>
					
		

				
			<?php 
				
				echo "<center>" . get_field( 'member_level' ) . "</center>";
	
				?>
			
				
			</div>


					
					
					
					<!-- #### START -------->
<?php				

if( get_field( "name" ) &&  ( strlen($post->post_content) < 2 ) ){
		echo "<br> NONONO Email <br>";
		 $my_post = array(
      'ID'           => $post->ID,
	  
      'post_title'   => $post->post_title,
     'post_content' => $post->post_content,
//	'category_name' => 'expired',
	  'post_status' => 'draft'
  );
  wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email" ) ){
	//echo "<br> NONONO Email <br>";
	
		//$user = get_user_by('ID', $post->post_author );
		
						
		 ?>
				
			<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>

				
			
		<?php
		
		
}




if (current_user_can( 'manage_options' ) && get_field('MX_user_email', $post->ID) ){
	
	
	if( 1  ){
		
							//$user = get_user_by('ID', $post->post_author );
							
							//$user = get_user_by('email', get_field( "MX_user_email" ));
							$arg = array(
									'ID' => $post->ID ,
									'post_author' => $user->ID,
								);
							//	wp_update_post( $arg );
							$user_post_count = count_user_posts( get_current_user_id(), 'ssi_requests' );
							
							//echo "+" . $user_post_count;
							$request_args = array(
							'author'        =>  get_current_user_id(),
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish' ),
							'posts_per_page' => -1
							); 
							$user_requests = get_posts($request_args );
							//echo "<br>+" . count($user_requests);
							
							$total = $user_post_count + count($user_requests);
							
							
							add_post_meta($post->ID, "MX_user_request_count", $total, 1 );
							//update_post_meta(  $post->ID, "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
						//	echo 'Number of posts published by user: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
							//echo "<br>NEW TOTAL +" . get_post_meta($post->ID, "MX_user_request_count",  1 );
							
					//echo "<br>User ID: " . $user->ID . "<br>";
				?>
				
			
				<br>
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				<br><br>
				<?php
				}else{ 
				
		 }
	
	
	
	
}


		
			?>
			
<!-- #### END-------->		
			<div class='clearfix'></div>
				<?php get_template_part('content', 'user-gallery'); ?>
			<div class='clearfix'></div>
			

<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		?> 
</div>	
					
		<div class='clear'></</div>
				
				
				</center> </div>
		
		
		<?php
	} ?>
	
	
	
	
	
</div>




		<?php 
			
				
				$count = $_POST['count'];
				if( !isset( $_POST['count'] ) ){  $count = 0; }
				$question = $questions[$count];
				
				

				
			$guests = get_posts( array (
								
			   'posts_per_page'    =>  -1,
			   'post_type' => array('ssi_contact', 'ssi_breed', 'ssi_thots'),
			   'post_status' => 'publish',
			   
				//'category_name'                  => 'event' . get_the_ID() ,
			    'order'                  => 'desc',
				'orderby'                => 'meta_value_num',
				'meta_key'               => 'MX_user_level', 

				//'categories'	=>	array( -$active_thots ),
			)     );


		?> 
						
				
		


	<div class='clearfix mb-5'></div>
	
	<h4 class='text-center '><u><?php echo count( $guests ); ?></u> THoTs in Training<br><small>as of Today</small></h4><div class='clearfix mb-10'></div>
<div class='text-left col-md-12 mansion well1'>
	
		
	<?php
		
					
					
					$count = count( $guests );
					
			foreach($guests as $lead){

				$the_level = 1;

				if ( isset( $_GET['level'] ) ) {


					
							

						 
					# code...
					$the_level = $_GET['level'];
					$user_level = get_post_meta( $lead->ID, 'MX_user_level', 1);

					if (  $user_level !== $the_level  ) { 
						# code...
						# 
						#break;
						//echo "--LEVEL1-- | "; 
						//print_r( $user_level );
						continue;
						
					}else if (0) {
						# code...
					}else{

						//continue;
					}

				}
				


				
				?>
				
				<div class='well green'>
					<div class='col-xs-12 '>
						
						
								<?php 
								//update_post_meta( $lead->ID, 'MX_user_level', '0');
								//update_post_meta( $lead->ID, 'thot_number', $count);
								//update_post_meta( $lead->ID, 'ssi_thot_id', $lead->ID);
								echo ++$level_count . ". "; 
								
								
								
								?>
								<a href="/?p=<?php echo $lead->ID; ?>"><?php echo $lead->post_title; ?></a>
								
						<div class='clearfix'></div><hr class="mb-15">
					</div>
					
					
					<div class='col-xs-6 1text-right'>
						<div class='clearfix'></div>
					
						<?php 
						
						if( ! get_post_meta( $lead->ID, 'MX_user_level')){
							update_post_meta( $lead->ID, 'MX_user_level', '1'); 
						
						}
						
						echo "THoT #" . get_post_meta( $lead->ID, 'thot_number', 1);
						
						echo "<br><br>";
						
						if(get_post_meta( $lead->ID, 'MX_user_email') || is_user_logged_in() ){
							//echo get_post_meta( $lead->ID, 'MX_user_level', true); 
							//echo "<br>EMAIL!<br>"; 
							
							update_post_meta( $lead->ID, 'MX_user_level', '2'); 
							
							$email = get_post_meta( $lead->ID, 'MX_user_email', true);
							
							$this_user = get_user_by("email", $email);
							
							$authorID = $this_user->ID;
							
							if( ($authorID > 0) || is_user_logged_in() ){ update_post_meta( $lead->ID, 'MX_user_level', '3');  
							
																			update_field('MX_user_level', '3' , "user_" . $user->ID );
																			
																			}
							
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
							
							echo "# of Requests: " . $request_cnt;
							echo "<br><br>";
							update_post_meta( $lead->ID, 'MX_user_level', '4'); 
							
							
							}
							
							
							
						}
						
						?>
						
					
						<div class='clearfix'></div>
						<?php 
							if( get_post_meta( $lead->ID, 'MX_user_met_before', 1 ) == 'Yes' ){

								echo "MET BEFORE!";
								//echo get_post_meta( $lead->ID, 'MX_user_met_before', true); 
								update_post_meta( $lead->ID, 'MX_user_level', '5'); 
								update_post_meta( $lead->ID, 'ssi_user_level', '5');
								update_field('MX_user_level', '5' , "user_" . $this_user->ID );
								wp_set_post_categories( $lead->ID, $thot_category );
								wp_set_post_categories( $lead->ID, get_cat_ID( 'active' ) );
								
								
								 $my_ssi_post = array(
                                      'ID'           => $lead->ID,
                                      
                                      'post_content' => $lead->post_content . '- Updated to Level 5!<br>',
                                  );
                                 
                                // Update the post into the database
                                  wp_update_post( $my_ssi_post );
								
								 
							
							
							}else{

								wp_set_post_categories( $lead->ID, get_cat_ID( 'pending' ) );
							
							}
							
							


						 ?>
						 <br>
						 	Level: <?php 
						
						if(get_post_meta( $lead->ID, 'MX_user_level')){
							echo get_post_meta( $lead->ID, 'MX_user_level', true); 
						
						}
						
						?>

					</div>
					<div class=' col-xs-6 text-right'>
						<div class='clearfix'></div>
						<a href='/train/?ID=<?php echo $lead->ID; ?>' class='btn btn-success pulse'>Level Up &rarr;</a>
						<div class='clearfix'></div>
					</div>
					<div class='clearfix'></div>
					
					</div>
					
				<?php
				
			}



			echo "<hr>";

			echo "Met Before: " . $met_before;
					
	?>
		
	
<div class='clear'></div>
			<a href="/training" class="btn rsvp btn-success btn-lg btn-block pulse">Get on The List >></a>
</div>
<div class='clear'></div><br>

</div>
<?php get_footer('members'); ?>