<?php


$user = wp_get_current_user();

if($_GET['publish_post']){ 
	
	$ID = $post;
	$ID = get_post( $_GET['ID'] );
	
	
	//print_r($user);
	$postID = $_GET['ID'];
	add_post_meta($postID, 'MX_modified_user', $user->display_name) ;
	update_post_meta($postID, 'MX_modified_user', $user->display_name) ;
	
	wp_update_post($ID); 
	wp_publish_post($postID); 
}

if($_GET['update_post']){ 
	
	$ID = $post;
	$ID = get_post( $_GET['ID'] );
	
	
	//print_r($user);
	$postID = $_GET['ID'];
	add_post_meta($postID, 'MX_modified_user', $user->display_name) ;
	update_post_meta($postID, 'MX_modified_user', $user->display_name) ;
	
	wp_update_post($ID); 
}
if($_GET['make_draft']){
	
	$ID = $request->ID;
	$ID = $_GET['ID'];
	
	 $my_post = array(
      'ID'           => $ID,
      'post_title'   => get_the_title($ID),
     'post_content' => get_the_content($ID),
	  'post_status' => 'draft'
  );
  
	add_post_meta($_GET['ID'], 'MX_modified_user', $user->display_name) ;
	update_post_meta($_GET['ID'], 'MX_modified_user', $user->display_name) ;

// Update the post into the database
  wp_update_post( $my_post );
	
}



	$potential = 0;
	
	$orderby = 'modified';
	$order = 'desc';
	
	$archivesID = get_cat_ID( "Archived" );
	$deniedID = get_cat_ID( "Denied" );
	$completeID = get_cat_ID( "completed" );

	$publish = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								//'orderby' => $orderby,
								'post_status' => 'publish',
								'order' => $order,
								'category' => array(-62),
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
								
								
	$pending = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => $orderby,
								'post_status' => 'pending',
								'order' => $order,
								'category' => array(-$deniedID, -$archivesID, -62, -$completeID ),
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$drafts = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => 'modified',
								'post_status' => 'draft',
								'order' => $order,
								//'category' => array(-15, -13),
								// 'category_name' => 'pending' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$denied = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => 'modified',
								'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
								'order' => $order,
								//'category' => array(-15),
								 'category_name' => 'denied' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$archived = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => 'modified',
								'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
								'order' => $order,
								//'category' => array(-15),
								 'category_name' => 'archived' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
	$completed = get_posts( array(	'post_type'   => 'ssi_requests', 
								'posts_per_page'   => -1,  
								'orderby' => 'post_date',
							//	'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
								'order' => $order,
								//'category' => array(-15, -13),
								 'category_name' => 'completed' ,
								//'date_query' => array( array( 'after' => '1 month ago' ) )   
								
								) );
								
								
	foreach($archived as $request){		
				 $my_post = array(
					  'ID'           => $request->ID,
					  
					  'post_title'   => $request->post_title,
					 'post_content' => $request->post_content,
					
					  'post_status' => 'draft'
				  );
				// wp_update_post( $my_post );
	}
	
	$requests	= array_merge($pending,$publish);	
								
	?>
<?php

						
								
								
								
								
								
								
	
	
	
		$request_count = count($requests);
		
		
		$requests345 = array_merge($publish,$pending, $drafts,$completed);	
		$all_requests = count($requests345);
		echo $all_requests;
			
		?>
	
			<div class='clearfix'></div><hr>
			
		<?php
		
		foreach($publish as $request){		
		
		

			
			echo  "<h3>" . $all_requests-- . ". " . $request->post_title . '</h3>';
			
		
			?>
		<div class='clearfix'></div><br>
		
		
		
		<div class='request well green text-center'>
		
		
		
		
				
							 <strong>Session Request</strong>
							 <br>
							 <?php echo date( 'm/d/y', strtotime($request->post_date) ); ?>
		
							<div class='clearfix mb-10'></div>

							
				
				
				
				
							<div class='col-sm-6 well yellow'>
	
									
									
									
									
									
									<div class=" ">
											
												<div class="col-xs-5 col-md-4">
												
												
													<a target='_blank' href='/?p=<?php echo $request->ID; ?>' class='circle '>
														<?php //echo do_shortcode("[bp_profile_gravatar]"); 
														
														
														
														?>
														
														
																<?php 
												
												echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
												
													$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
												
													if( has_post_thumbnail( $request->ID  ) ){
														echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft 1circle avatar' )  );
													}else if (  get_avatar($user->ID, 150)  ) {
														
														
									
														?>
														<center>
															<?php echo get_avatar($user->ID, 150); ?>
														</center>
														<?php 
													}else{
														?>
														<img src='http://www.gravatar.com/avatar/194803a51d4a564b26379aea65ac8fda?s=96&r=x&d=http%3A%2F%2Fdlfreakfest.org%2Fwp-content%2Fuploads%2F2019%2F11%2F5dde1c7720197-bpfull.jpg' class='img-responsive aligncenter' width='150'>
													
														<?php 
														
													}
										
												?>
												
												
														
														
													</a>
												
												
												
														

												</div>
												<div class="col-xs-7 col-md-8 text-center report">
												
													<b><?php echo "<h3>" . $request->post_title . '</h3>'; ?></b>
													<hr>
													
													<center>
													<?php	

															if( get_post_meta($request->ID, 'MX_user_age' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_age' , 1) . ' | ';
															}else{
																		echo '- | ';
															}
															if( get_post_meta($request->ID, 'MX_user_height' , 1) ){
																echo get_post_meta($request->ID, 'MX_user_height' , 1) . ' | ';
															}else if( get_post_meta($request->ID, 'MX_user_height_ft' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_height_ft' , 1) . "' " . get_post_meta($request->ID, 'MX_user_height_in' , 1) . '" | ' ;
															}else{
																		echo '- | ' ;
															}
															if( get_post_meta($request->ID, 'MX_user_weight' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_weight' , 1) . "<br>";
															}else{
																		echo '- <br>';
															}
																?>
													</center>
													
													<div class='clear'></div><br>
											
												<div class='text-center small'>
												Location<br>
												<b><?php 
												
													$closet = 0;
																if ( get_post_meta($request->ID, 'MX_user_city', 1 ) && get_post_meta($request->ID, 'MX_user_state', 1) ){

																										echo ' <span style="text-transform: capitalize;">' . get_post_meta($request->ID, 'MX_user_city', 1 ) . '</span>, ';
																										echo get_post_meta($request->ID, 'MX_user_state', 1) ;

																}
																else if ( get_post_meta($request->ID, 'MX_user_state', 1) ){
																	echo  get_post_meta($request->ID, 'MX_user_state', 1);
																}
																else{
																	$closet = 1;
																	echo '-';
																}				
																
											?></b>
											</div>
											<div class='clear'></div>
											
											

												</div>
										
												
												
												
															
									
												<div class='clear'></div>	
										<div class='well green hidden'>
													<h4>YungDADDY Requests<hr></h4>		
																
										<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
										
										<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
										
										<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
										
										
										
										</div>
												
													

											</div>
											
											
											
											<div class='clear'></div>	

									
									</div>	


                       
					
				<div class='col-md-6 well green1'>
				<div class='clearfix mb-10'></div>
				
					<div class=' col-xs-6'>
					
						<u><b>Date</b></u> <br><?php echo get_post_meta($request->ID, 'request_date', true) ?>
					</div>
					<div class=' col-xs-6'>
					
						<u><b>Time</b></u> <br><?php echo get_post_meta($request->ID, 'request_time', true) ?>
					</div>
			
					<div class=' col-xs-6'>
					<br>
						<u><b>Length</b></u> <br><?php echo get_post_meta($request->ID, 'request_length', true) ?>
					</div>
					<div class=' col-xs-6'>
					<br>
						<u><b>Budget</b></u> <br>$<?php echo get_post_meta($request->ID, 'request_min_budget', true) ?> - $<?php echo get_post_meta($request->ID, 'request_max_budget', true) ?>
					</div>
					
					
					<div class=' clear'></div>
                   </div>
					
					
		<div class=' clear'></div>
		<div class=' clear'></div>		
					
			
		<form method='post'>
		
	
	<div class='col-sm-12'>
	
	
		<?php //get_template_part( 'content' , 'mini-profile' ); ?>
	
	
		
		<?php
		
	if( get_post_meta(  $request->ID , 'MX_user_gallery'  ) ){ $pix =  get_post_meta(  $request->ID , 'MX_user_gallery', true  ); }
	
	
	//print_r($pix[0]);
	
	$pix = $pix[0];
	$cnt = count($pix);
	//echo "CNT" . $cnt--;
	?>
	
	<?php
	
	$gallery = "[gallery  link='file' columns='3' include='";
	foreach( $pix as $pic ){
		
		$gallery = $gallery . $pic;
		if( $cnt-- > 0 ){ $gallery = $gallery . ", "; }
	?>  

	<?php
	}
	$gallery = $gallery . " ]";
	//$gallery = '"' . $gallery. '"';
	echo do_shortcode(  "$gallery" );
?>
		
	
		<div id='details<?php echo $count;?>' class='' style='display: block;'>
		
		
		
		
				<?php 
				
				if (current_user_can( 'manage_options' )){
		?>	
	
		<div class=' col-md-12'>
		
		
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", $request->ID ) . ' ... <br><br>';	
			
			if ( get_field( "paid", $request->ID ) ) echo "PAID $" . get_field( "paid", $request->ID );
			
			
			}
				
			
			if( /*in_array('display', $selected)  || current_user_can( 'manage_options' )*/ 1 ){	
							
				?>	<div class='clearfix'></div>
			
			<?php 	
				
				echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				if(get_field( "request_preference", $request->ID ) ){ update_field( "MX_user_position", get_field( 'request_preference', $request->ID ),  $request->ID ); }
				
				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				echo "<br><br><br>";
				
				if( get_field( "MX_user_donation", $request->ID ) ){ echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){ echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>';
					
				}
				
			
				if( get_field( "request_interest", $request->ID ) ){ echo " " . get_field( "request_interest", $request->ID ) . " "; }
				
				
				echo "<br><br><b>Fantasy:<br> </b>" . $request->post_content . '<br><br>';
	/*			
	 			$revisions = wp_get_post_revisions( $request->ID );
				$count = 0;
				foreach($revisions as $revision){ if( strlen( $revision->post_content )  > 3 ){ 
			
					
	 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $revision->post_title,
     'post_content' => $revision->post_content,
	
	 // 'post_status' => 'pending'
  );
//  wp_update_post( $my_post );
 //$my_cat = array('cat_name' => get_field( "MX_user_city", $request->ID ), 'category_description' => 'Philadelphia - 215', 'category_nicename' => 'philadelphia', 'category_parent' => '');

// Create the category
//$my_cat_id = wp_insert_category($my_cat);

	// wp_create_category(get_field( "MX_user_city", $request->ID ));
 // wp_set_post_categories( $request->ID, get_cat_ID( 'Philadelphia' ), 1 )
	//add_post_meta($request->ID, 'MX_modified_user', $user->display_name) ;
	//update_post_meta($request->ID, 'MX_modified_user', $user->display_name) ;

// Update the post into the database

				
				
				echo "<br>" . $revision->post_content; $count++; } }
				
		*/		
				if( get_field( "request_donation", $request->ID ) ){ echo "- " . get_field( "request_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "request_amount", $request->ID ) ){ echo " ----  $: " . get_field( "request_amount", $request->ID ) . ' ... <br><br>'; 
				
				$potential += get_field( "request_amount", $request->ID );
				
				}
				
				//echo "How Much:" . $request[17] . ' ... <br><br>';

				//echo "Looking For:" . $request[8] . ' ... <br><br>';
				
					//$consent = get_post_meta(  $request->ID, "MX_user_consent" );
				//print_r( $consent );
				if( in_array( 'photo', $consent) ){ echo "Show My PIX!!<br>"; }
			if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
			if( in_array( 'display', $consent) ){ echo "Show my Stats!!<br>"; }
			if( in_array( 'groups', $consent ) ){ echo "Call your friends Over!!<br>"; }
				

			}	else { 
			
			
				
				echo "<br><hr><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';

			}
			
			
			
			
				$consent = get_post_meta( $request->ID , "lead_consent");
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		$consent = get_field( $request->ID , "MX_user_consent" );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		
		
			?>	
				<div class=' clear'></div>
		<div class=' clear'></div>
		</div>
			
		<div class=' clear'></div>
	</div>

		<div class='clearfix'></div><hr><center><span style='font-size: 16px;'>
	

	<?php 	
		
			
			
			if (current_user_can( 'manage_options' )){
	
			
				edit_post_link( 'edit', '<p>', '</p>', $request->ID );
				
			
			
				?>	
				<div class='clearfix'></div>
		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>
		
		<a target='_blank' href='?update_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Update Post</a>
				<a target='_blank'  href='?make_draft=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Delete</a>
		
		
		
		<div class='clearfix'></div>
		
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Hold' class='btn'>On Hold </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Interested' class='btn'>Interested </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Invited' class='btn'>Invited </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Booked' class='btn'>Booked </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Completed' class='btn'>Completed </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Denied' class='btn'>Denied </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Archived' class='btn'>Archive </a>
			
		<br>
		
				<div class='clearfix'></div>
					<div class='col-md-2'> 

						
						<input type="text" name="update_post_title" value="<?php echo $request->post_title; ?>">


					</div>
					<div class='col-md-3'>
						
						<input type="text" name="MX_user_email" placeholder="Email" value="<?php echo get_field( 'MX_user_email', $request->ID ); ?>">
						

					</div>
					<div class='col-md-2'>
						
						<input type="text" name="MX_user_ephone" value="<?php echo get_field( 'MX_user_phone', $request->ID ); ?>">

					</div>
					<div class='col-md-2'>
	
						<input type="text" name="MX_user_ecity" value="<?php echo get_field( 'MX_user_city', $request->ID ); ?>">

					</div>
					<div class='col-md-1'>

						<input type="text" name="MX_user_estate" value="<?php echo get_field( 'MX_user_state', $request->ID ); ?>">

					</div>
					<div class='col-md-2'>
<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
						<button name="ssi_update_cf" type="submit" class='btn btn-info' value="Update" />Update</button>
	
						
					</div>
						<div class='clearfix'></div>
			<?php 
			

			
			}
			
			
						?>
			
			<div class='clearfix'></div>
			<span class='alert-success btn-block'> - </span>
			<span class='alert-warning btn-block'> - </span>
			<span class='alert-danger btn-block'> - </span>
			<?php
			
			
			
	

	
if( get_field( "met_before", $request->ID ) && !get_field( "MX_user_email", $request->ID )  ){
		echo "<hr> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'pending'
  );
// wp_update_post( $my_post );
		
		
}
			
			
		
						$Status = wp_create_category( "Status" );
				$Active = wp_create_category( "Active" );
				
					wp_create_category( "Booked" , $Active );
					wp_create_category( "Interested" , $Active );
					wp_create_category( "Invited" , $Active );
					wp_create_category( "On Hold" , $Active );
					wp_create_category( "Pending" , $Active );
					
				$Archived = wp_create_category( "Archived" );
				$Inactive = wp_create_category( "Inactive" );
				
					wp_create_category( "Cancelled" , $Inactive );
					wp_create_category( "Completed" , $Inactive );
					wp_create_category( "Denied" , $Inactive );
					wp_create_category( "Expired" , $Inactive );
				
		


					$status = get_field( "request_status", $request->ID );
					
				
					
			switch ($status) {
				case "Pending":
				  // echo "Pending...";
				  
				  
				   
				   $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories, 1 );
					
					break;break;
				case "Interested":
					//echo "Interested..   but eeds more information";
					break;break;
				case "Invited":
					//echo "You are Invited! - Invite Sent";
					break;break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;break;
				case "Cancelled":
					//echo "Request Cancelled!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'cancelled' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories, 1);
					break;
				case "Completed":
					//echo "Request Completed!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'completed' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories, 1 );
					break;
				case "Archived":
					//echo "Request Completed!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'archived' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;
				case "Denied":
					//echo "Request Denied";
					
					
					$cat_id = get_cat_ID( strtolower ( 'denied' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;break;
				case "Hold":
					//echo "On Hold";
					break;break;
				default:
					//echo "Pending...";
					
					 $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
						
					
			}
			
			
			

			
		if( $status  == "Archived" ){ 


		echo "<br>ARCH-- <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'publish'
  );
 ///wp_update_post( $my_post );
		
		
}



					$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				   echo "Pending...";
					break;
				case "Interested":
					echo "Interested..   but needs more information";
					break;
				case "Invited":
					echo "You are Invited! - Invite Sent";
					break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;
				case "Completed":
					echo "Request Completed!";
					break;
				case "Denied":
					echo "Request Denied";
					break;
				case "Hold":
					echo "On Hold";
					break;
				default:
					echo "Pending...";
						
					
			}
			
			
			
					$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				   echo "Pending...";
					break;
				case "Interested":
					echo "Molly is Interested..   but she needs more information";
					break;
				case "Invited":
					echo "You are Invited! - Invite Sent";
					break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;
				case "Completed":
					echo "Request Completed!";
					break;
				case "Denied":
					echo "Request Denied";
					break;
				case "Archived":
					echo "Archived";
					break;
				case "Hold":
					echo "On Hold";
					break;
				default:
					//echo "Pending...";
						
					
			}
			
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center>";
		
		?>
		
		
		
		<?php 
				if(get_user_by('email',get_field('MX_user_email', $request->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $request->ID));
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $request->ID);
							//echo "MEMBER!!";
							
				}
				
?>
<!-- #### START -------->
<?php				

if( get_field( "name", $request->ID ) &&  !get_field( "MX_user_email", $request->ID ) ){
		echo "<br> NONONO Email <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	'category_name' => 'requests',
	  'post_status' => 'publish'
  );
 // wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email", $request->ID ) ){
	echo "<br> NONONO Email <br>";


							//wordpress_logged_in_984b7db5defa7a53a4617673e24aaa7a
							
							$post_meta = get_post_meta($request->ID , 'wordpress_logged_in_984b7db5defa7a53a4617673e24aaa7a', 1 );
							
							//print_r($post_meta );
							
							
							$post_meta = explode( "|" , $post_meta );
							
						//	print_r($post_meta['0'] );
							
							$username = $post_meta['0'];
							
							$this_user = get_user_by( 'login' , $username );
							
							print_r( $this_user->user_email );
						//	update_post_meta( $request->ID , "MX_user_email" , $this_user->user_email  );
	}						
						//	$post_meta = post_meta[];
							
							//print_r($post_meta );
							
							//$key = array_search('wordpress_logged_in_', $post_meta , true);
							
							
						//	echo "<br>KEY-->" . $key;
							
						//	echo "<br>In Array-->" . in_array( 'wordpress_logged_in_' ,  $post_meta );

if (current_user_can( 'manage_options' ) && get_field('MX_user_email', $request->ID) ){
	
	
	if(get_field( "request_username", $request->ID )){ echo "<br> User - " . get_field( "request_username", $request->ID ); }
	if(get_field( "request_password", $request->ID )){ echo "<br> Pass - " . get_field( "request_password", $request->ID ); }
	
	
	
	if( get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){
							
							
							$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
							$arg = array(
									'ID' => $request->ID ,
									'post_author' => $user->ID,
								);
								wp_update_post( $arg );
							$user_post_count = count_user_posts( $user->ID , 'ssi_requests' );
							
							echo "+" . $user_post_count;
							$request_args = array(
							'author'        =>  $user->ID,
							'orderby'       =>  'post_date',
							'order'         =>  'ASC',
							'post_type' => 'ssi_requests',
							
							'post_status' => array( 'publish', 'private', 'draft', 'pending' ),
							'posts_per_page' => -1
							);
							$user_requests = get_posts($request_args );
							echo "<br>+" . count($user_requests);
							
							$total = $user_post_count + count($user_requests);
							
							
							add_post_meta($request->ID, "MX_user_request_count", $total, 1 );
							//update_post_meta(  $request->ID, "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
						//	echo 'Number of posts published by user: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
							echo "<br>NEW TOTAL +" . get_post_meta($request->ID, "MX_user_request_count",  1 );
							
					echo "<br>User ID: " . $user->ID . "<br>";
				?>
				
				
				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", $request->ID ) && !get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){ 
		
	
					$role = 'author';
					
					
	$display_name = get_field( "request_username", $request->ID );
		///$username = get_field( "request_username", $request->ID );
		$email = get_field( "MX_user_email", $request->ID );
		
		//echo "Username Count =" . count($username);
		
		//if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		//else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		//else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		//else{ $first_name = ''; $last_name = ''; }
		
		$password = null;
		$password = get_field( "request_password", $request->ID );
		
		//if( get_user_by('login', $first_name ) ){ $name = $first_name . "_" . $BLOK++ ; }
		//else{  $name = $first_name; }
			//$display_name = $name;
			
			$userdata = array(
				'user_login'  =>  $display_name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  $password,  // When creating an user, `user_pass` is expected.
				'display_name' => $display_name,
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
	//			wp_update_user( $userdata );

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! ";
			}
		//ssi_add_user( $ID );
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }
	
	
	
	
	
}
			?>
			
<!-- #### END-------->			
			
			
	</form>
	
	
	
	
		<div class='clearfix'></div><br>
			<button id='details<?php echo $count;?> 'class='btn btn-block hidden'>View Request</button>
			<div class='clearfix'></div><br>
			<a href='/?p=<?php echo $request->ID;?> 'class='btn btn-primary btn-lg btn-block'>View Request >></a>
			<div class='clearfix'></div><br>
</div>
		

		
								
								
		
<?php		
	
		

		
	
	if(get_field( "status_notes", $request->ID )){
	?>
				<br>Status Notes<br>
	<?php
			}
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
					

if(get_field( "final_products", $request->ID )){
	?>
				<br>Final Products<br>
	<?php
			}
				
			
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center><div class='clearfix'></div>";

			


			
		}
		
		
	
?>

	<div class='clearfix'> </div><hr>
		<?php
		$completed_count = count($completed);
		
				echo $completed_count;
		
		?>
		 - Completed Requests
		
		<div class='clearfix'> </div><hr>
		<?php
		$completed_count = count($completed);
		
		foreach($completed as $request){	

		
		?>
		<div class='well purple'>
		
		
		
					
				
							 <strong>Session Request</strong>
							 <br>
							 <?php echo date( 'm/d/y', strtotime($request->post_date) ); ?>
		
							<div class='clearfix mb-10'></div>

							
				
				
				
				
							<div class='col-sm-6 well yellow'>
	
									
									
									
									
									
									<div class=" ">
											
												<div class="col-xs-5 col-md-4">
												
												
													<a target='_blank' href='/?p=<?php echo $request->ID; ?>' class=' '>
														<?php //echo do_shortcode("[bp_profile_gravatar]"); 
														
														
														
														?>
														
														
																<?php 
												
												echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
												
													$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
												
											
												
													if (  get_avatar($user->ID, 100)  ) {
														
														
									
														?>
														<center>
															<?php echo get_avatar($user->ID, 150); ?>
														</center>
														<?php 
													}else{
														?>
														<img src='http://www.gravatar.com/avatar/194803a51d4a564b26379aea65ac8fda?s=96&r=x&d=http%3A%2F%2Fdlfreakfest.org%2Fwp-content%2Fuploads%2F2019%2F11%2F5dde1c7720197-bpfull.jpg' class='img-responsive aligncenter' width='150'>
													
														<?php 
														
													}
										
												?>
												
												
														
														
													</a>
												
												
												
														

												</div>
												<div class="col-xs-7 col-md-8 text-center report">
												
													<b><?php echo "<h3>" . $request->post_title . '</h3>'; ?></b>
													<hr>
													
													<center>
													<?php	

															if( get_post_meta($request->ID, 'MX_user_age' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_age' , 1) . ' | ';
															}else{
																		echo '- | ';
															}
															if( get_post_meta($request->ID, 'MX_user_height' , 1) ){
																echo get_post_meta($request->ID, 'MX_user_height' , 1) . ' | ';
															}else if( get_post_meta($request->ID, 'MX_user_height_ft' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_height_ft' , 1) . "' " . get_post_meta($request->ID, 'MX_user_height_in' , 1) . '" | ' ;
															}else{
																		echo '- | ' ;
															}
															if( get_post_meta($request->ID, 'MX_user_weight' , 1) ){
																		echo get_post_meta($request->ID, 'MX_user_weight' , 1) . "<br>";
															}else{
																		echo '- <br>';
															}
																?>
													</center>
													
													<div class='clear'></div><br>
											
												<div class='text-center small'>
												Location<br>
												<b><?php 
												
													$closet = 0;
																if ( get_post_meta($request->ID, 'MX_user_city', 1 ) && get_post_meta($request->ID, 'MX_user_state', 1) ){

																										echo ' <span style="text-transform: capitalize;">' . get_post_meta($request->ID, 'MX_user_city', 1 ) . '</span>, ';
																										echo get_post_meta($request->ID, 'MX_user_state', 1) ;

																}
																else if ( get_post_meta($request->ID, 'MX_user_state', 1) ){
																	echo  get_post_meta($request->ID, 'MX_user_state', 1);
																}
																else{
																	$closet = 1;
																	echo '-';
																}				
																
											?></b>
											</div>
											<div class='clear'></div>
											
														<?php 
														echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>'; ?>

												</div>
										
												
												
												
															
									
												<div class='clear'></div>	
										<div class='well green hidden'>
													<h4>YungDADDY Requests<hr></h4>		
																
										<a  target='_blank' href='/cash' class='btn btn-success btn-block hidden1'> REQUEST Money >> </a>
										
										<a target='_blank' href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden1'> REQUEST a DATE >> </a>
										
										<a target='_blank' href='/request' class='btn btn-info btn-block hidden1'> REQUEST a Meeting >> </a>
										
										
										
										</div>
												
													

											</div>
											
											
											
											<div class='clear'></div>	

									
									</div>	


                       
					
				<div class='col-md-6 well green'>
				<div class='clearfix mb-10'></div>
				
					<div class=' col-xs-6'>
					
						<u><b>Date</b></u> <br><?php echo get_post_meta($request->ID, 'request_date', true) ?>
					</div>
					<div class=' col-xs-6'>
					
						<u><b>Time</b></u> <br><?php echo get_post_meta($request->ID, 'request_time', true) ?>
					</div>
				<div class=' clear visible-xs'><br></div>
					<div class=' col-xs-6'>
					<br>
						<u><b>Length</b></u> <br><?php echo get_post_meta($request->ID, 'request_length', true) ?>
					</div>
					<div class=' col-xs-6'>
					<br>
						<u><b>Budget</b></u> <br>$<?php echo get_post_meta($request->ID, 'request_min_budget', true) ?> - $<?php echo get_post_meta($request->ID, 'request_max_budget', true) ?>
					</div>
					
					<div class=' clear'></div>
					
                   </div>
					
					
		<div class=' clear'></div><br><div class=' clear'></div><br>
		
		
		
		
		
		
		<?php
			
			echo  "<h3>" . ++$count . ". " . $request->post_title . '</h3>';
			
			echo date( 'm/d/y', strtotime($request->post_date) );
			
			echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			
			
			
								if( get_field( "met_before", $request->ID )  ){ 
	//	echo "<br> NONONO Email <br>";
}else{
		echo "<br> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'pending'
  );
 ///wp_update_post( $my_post );
		
		
}	
			
			
			
			?>
		<div class='clearfix'></div><br>
		
		
<?php		

			$selected =  get_field( "MX_user_consent", $request->ID );
			
			if ( in_array('display', $selected)   || current_user_can( 'manage_options' ) ){
			
					 // Insert user stats section	
					echo "Stats Public";
			}else{ 
		
		
			echo "Stats Removed! (PRIVATE)<br><br>";
			

		}
		?>
		<div class='clearfix'></div><br>
				
								
								
								<div class='col-xs-6'>
									<b><?php echo get_post_meta($request->ID, 'name', true); ?></b>
								</div>
								<div class='col-xs-6'>
									<b>Level 1</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='col-xs-6'>
									I am a:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_sex', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									Seeking:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_seeking', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									I Prefer:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_prefers', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								
		
<?php		



	
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
		$consent = get_field( "lead_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		$consent = get_field( "MX_user_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		
		if(get_user_by('email',get_field('MX_user_email', $request->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $request->ID));
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $request->ID);
							//echo "MEMBER!!";
							
				}

				
				
	if( get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){
							
							$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
							
							
					echo "User ID: " . $user->ID . "<br>";
				?>
				
				
				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", $request->ID ) && !get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){ 
		
	/*	
					$role = 'subscriber';
	
		$username = explode(' ', $request->post_title);
		$email = get_field( "MX_user_email", $request->ID );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . get_field( "area_code", $request->ID ); }
		else{  $name = $username[0]; }
			
			$userdata = array(
				'user_login'  =>  $name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  NULL,  // When creating an user, `user_pass` is expected.
				
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
				

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! ";
			}
		*/
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }

?>
				
	<?php
	
	if(get_field( "status_notes", $request->ID )){
	?>
				<br>Status Notes<br>
	<?php
			}
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
					

if(get_field( "final_products", $request->ID )){
	?>
				<br>Final Products<br>
	<?php
			}
				
			
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center><div class='clearfix'></div>";



			if (current_user_can( 'manage_options' )){
				
				
				
				
					echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
				
		?>	
	
		<a target='_blank' href='?publish_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Publish Post</a>
		<a target='_blank' href='?update_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Update Post</a>
				<a target='_blank'  href='?make_draft=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Delete</a>
				
				
		<div class=' col-md-6'>
		<?php	
			echo "City: " . get_field( "MX_user_city", $request->ID ) . ' ...  ... ';
			echo "State: " . get_field( "MX_user_state", $request->ID ) . ' ...  ... ';
		?>	
		</div>
		<div class=' col-md-6'>
		
		<?php 	
			echo "Phone:" . get_field( "MX_user_phone", $request->ID ) . ' ...  ... ';

			
			echo "Email:" . get_field( "MX_user_email", $request->ID ) . ' ...  ';
		?>	
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", $request->ID ) . ' ... <br><br>';	
			
			
			edit_post_link( 'edit', '<p>', '</p>', $request->ID );
				
			
			
		?>	
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Hold' class='btn'>On Hold </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Interested' class='btn'>Interested </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Invited' class='btn'>Invited </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Booked' class='btn'>Booked </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Completed' class='btn'>Completed </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Denied' class='btn'>Denied </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Archived' class='btn'>Archive </a>
			
		<br>
			<?php 
			
			}
			
					$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				   echo "Pending...";
					break;
				case "Interested":
					echo "Interested..   but needs more information";
					break;
				case "Invited":
					echo "You are Invited! - Invite Sent";
					break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;
				case "Completed":
					echo "Request Completed!";
					break;
				case "Denied":
					echo "Request Denied";
					break;
				case "Hold":
					echo "On Hold";
					break;
				default:
					echo "Pending...";
						
					
			}
			?>
			
			<div class='clearfix'></div>
			<span class='alert-success btn-block'> - </span>
			<span class='alert-warning btn-block'> - </span>
			<span class='alert-danger btn-block'> - </span>
			<?php
			
			
			
			?>
			
			<div class='clearfix'></div>
			</div>
		<?php
		}
		
	?>
	
	
	<div class='clearfix'> </div><hr>
		<?php
		$draft_count = count($drafts);
		
				echo $draft_count;
		
		?>
		 - Incompleted Requests
		
		<div class='clearfix'> </div><hr>
		<?php
		$draft_count = count($drafts);
		
		foreach($drafts as $request){	

if( get_field( "met_before", $request->ID )  ){ 
	//	echo "<br> NONONO Email <br>";
}else{
		echo "<br> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'pending'
  );
 ///wp_update_post( $my_post );
		
		
}		
		
		?>
		<div class='well purple'>
		<?php
			
			echo  "<h3>" . ++$count . ". " . $request->post_title . '</h3>';
			
			echo date( 'm/d/y', strtotime($request->post_date) );
			
			echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			?>
		<div class='clearfix'></div><br>
		
		
<?php		

			$selected =  get_field( "MX_user_consent", $request->ID );
			
			if ( /*in_array('display', $selected)   || current_user_can( 'manage_options' )*/ 1 ){
			
			
			echo "Age: " . get_field( "MX_user_age", $request->ID ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height", $request->ID ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight", $request->ID ) . '<br><br> ';
		
			}else{ 
		
		
			echo "Stats Removed! (PRIVATE)<br><br>";
			

		}
		?>
		<div class='clearfix'></div><br>
				
								
								
								<div class='col-xs-6'>
									<b><?php echo get_post_meta($request->ID, 'name', true); ?></b>
								</div>
								<div class='col-xs-6'>
									<b>Level 1</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='col-xs-6'>
									I am a:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_sex', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									Seeking:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_seeking', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									I Prefer:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_prefers', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								
		
<?php		



		echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
		$consent = get_field( "lead_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		$consent = get_field( "MX_user_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		
		if(get_user_by('email',get_field('MX_user_email', $request->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $request->ID));
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $request->ID);
							//echo "MEMBER!!";
							
				}

				
				
	if( get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){
							
							$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
							
							
					echo "User ID: " . $user->ID . "<br>";
				?>
				
				
				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", $request->ID ) && !get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){ 
		
	/*	
					$role = 'subscriber';
	
		$username = explode(' ', $request->post_title);
		$email = get_field( "MX_user_email", $request->ID );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . get_field( "area_code", $request->ID ); }
		else{  $name = $username[0]; }
			
			$userdata = array(
				'user_login'  =>  $name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  NULL,  // When creating an user, `user_pass` is expected.
				
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
				

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! ";
			}
		*/
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }

?>
				
	<?php
	
	if(get_field( "status_notes", $request->ID )){
	?>
				<br>Status Notes<br>
	<?php
			}
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
					

if(get_field( "final_products", $request->ID )){
	?>
				<br>Final Products<br>
	<?php
			}
				
			
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center><div class='clearfix'></div>";



			if (current_user_can( 'manage_options' )){
				
				
				
				
					echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
				
		?>	
	
		<a target='_blank' href='?publish_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Publish Post</a>
		<a target='_blank' href='?update_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Update Post</a>
				<a target='_blank'  href='?make_draft=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Delete</a>
				
				
		<div class=' col-md-6'>
		<?php	
			echo "City: " . get_field( "MX_user_city", $request->ID ) . ' ...  ... ';
			echo "State: " . get_field( "MX_user_state", $request->ID ) . ' ...  ... ';
		?>	
		</div>
		<div class=' col-md-6'>
		
		<?php 	
			echo "Phone:" . get_field( "MX_user_phone", $request->ID ) . ' ...  ... ';

			
			echo "Email:" . get_field( "MX_user_email", $request->ID ) . ' ...  ';
		?>	
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", $request->ID ) . ' ... <br><br>';	
			
			
			edit_post_link( 'edit', '<p>', '</p>', $request->ID );
				
			
			
		?>	
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Hold' class='btn'>On Hold </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Interested' class='btn'>Interested </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Invited' class='btn'>Invited </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Booked' class='btn'>Booked </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Completed' class='btn'>Completed </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Denied' class='btn'>Denied </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Archived' class='btn'>Archive </a>
			
		<br>
			<?php 
			
			}
				$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				   echo "Pending...";
					break;
				case "Interested":
					echo "Molly is Interested..   but she needs more information";
					break;
				case "Invited":
					echo "You are Invited! - Invite Sent";
					break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;
				case "Completed":
					echo "Request Completed!";
					break;
				case "Denied":
					echo "Request Denied";
					break;
				case "Hold":
					echo "On Hold";
					break;
				default:
					//echo "Pending...";
						
					
			}
			
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center>";
			?>
			
			<div class='clearfix'></div>
			<span class='alert-success btn-block'> - </span>
			<span class='alert-warning btn-block'> - </span>
			<span class='alert-danger btn-block'> - </span>
			<?php
			
			
			
			?>
			
			<div class='clearfix'></div>
			</div>
		<?php
		}
		
	?>

	<div class='clearfix'> </div><hr>
		<?php
		$denied_count = count($denied);
		
				echo $denied_count;
		
		?>
		 - Denied Requests
		
		<div class='clearfix'> </div><hr>
		<?php
		$draft_count = count($denied);
		
		foreach($denied as $request){	

if( get_field( "met_before", $request->ID )  ){ 
	//	echo "<br> NONONO Email <br>";
}else{
		echo "<br> Havnt Met <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'pending'
  );
 ///wp_update_post( $my_post );
		
		
}		
		
		?>
		<div class='well red'>
		<?php
			
			echo  "<h3>" . ++$count . ". " . $request->post_title . '</h3>';
			
			echo date( 'm/d/y', strtotime($request->post_date) );
			
			echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => 'alignleft' )  );
			?>
		<div class='clearfix'></div><br>
		
		
<?php		

			$selected =  get_field( "MX_user_consent", $request->ID );
			
			if ( /*in_array('display', $selected)   || current_user_can( 'manage_options' )*/ 1 ){
			
			
			echo "Age: " . get_field( "MX_user_age", $request->ID ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height", $request->ID ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight", $request->ID ) . '<br><br> ';
		
			}else{ 
		
		
			echo "Stats Removed! (PRIVATE)<br><br>";
			

		}
		?>
		<div class='clearfix'></div><br>
				
								
								
								<div class='col-xs-6'>
									<b><?php echo get_post_meta($request->ID, 'name', true); ?></b>
								</div>
								<div class='col-xs-6'>
									<b>Level 1</b>
								</div>
								<div class='clearfix'></div><hr>
								<div class='col-xs-6'>
									I am a:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_sex', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									Seeking:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_seeking', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								<div class='col-xs-6'>
									I Prefer:
								</div>
								<div class='col-xs-6'>
									<?php echo get_post_meta($request->ID, 'MX_user_prefers', true); ?>
								</div>
								<div class='clearfix'></div><hr>
								
								
		
<?php		



		echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
		$consent = get_field( "lead_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		$consent = get_field( "MX_user_consent", $request->ID );
			//print_r( $consent );
		if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
		if( in_array( 'display', $consent) ){ echo "Expose ME!!<br>"; }
		if( in_array( 'groups', $consent ) ){ echo "Call your friends OVER!!<br>"; }
		
		
		if(get_user_by('email',get_field('MX_user_email', $request->ID))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', $request->ID));
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', $request->ID);
							//echo "MEMBER!!";
							
				}

				
				
	if( get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){
							
							$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
							
							
					echo "User ID: " . $user->ID . "<br>";
				?>
				
				
				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", $request->ID ) && !get_user_by('email', get_field( "MX_user_email", $request->ID ) ) ){ 
		
	/*	
					$role = 'subscriber';
	
		$username = explode(' ', $request->post_title);
		$email = get_field( "MX_user_email", $request->ID );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . get_field( "area_code", $request->ID ); }
		else{  $name = $username[0]; }
			
			$userdata = array(
				'user_login'  =>  $name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  NULL,  // When creating an user, `user_pass` is expected.
				
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
				

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! ";
			}
		*/
		?>
		
		<form method="post" action="" class=''>
			<button name="ssi_add_user" type="submit" class='btn btn-warning' value="Add User" />Add User</button>
			<input name="ID" type="hidden" value="<?php echo $request->ID; ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }

?>
				
	<?php
	
	if(get_field( "status_notes", $request->ID )){
	?>
				<br>Status Notes<br>
	<?php
			}
			if(get_field( "status_notes", $request->ID )){
					echo "</span><br><br>" . get_field( "status_notes", $request->ID );
					}
					

if(get_field( "final_products", $request->ID )){
	?>
				<br>Final Products<br>
	<?php
			}
				
			
				if(get_field( "final_products", $request->ID )){
					echo "<hr>" . get_field( "final_products", $request->ID );
					}	
					
				echo "</center><div class='clearfix'></div>";



			if (current_user_can( 'manage_options' )){
				
				
				
				
					echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				
				
				
				
		?>	
	
		<a target='_blank' href='?publish_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Publish Post</a>
		<a target='_blank' href='?update_post=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Update Post</a>
				<a target='_blank'  href='?make_draft=1&ID=<?php echo $request->ID; ?>' class='btn btn-info'>Delete</a>
				
				
		<div class=' col-md-6'>
		<?php	
			echo "City: " . get_field( "MX_user_city", $request->ID ) . ' ...  ... ';
			echo "State: " . get_field( "MX_user_state", $request->ID ) . ' ...  ... ';
		?>	
		</div>
		<div class=' col-md-6'>
		
		<?php 	
			echo "Phone:" . get_field( "MX_user_phone", $request->ID ) . ' ...  ... ';

			
			echo "Email:" . get_field( "MX_user_email", $request->ID ) . ' ...  ';
		?>	
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", $request->ID ) . ' ... <br><br>';	
			
			
			edit_post_link( 'edit', '<p>', '</p>', $request->ID );
				
			
			
		?>	
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Hold' class='btn'>On Hold </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Interested' class='btn'>Interested </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Invited' class='btn'>Invited </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Booked' class='btn'>Booked </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Completed' class='btn'>Completed </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Denied' class='btn'>Denied </a>
			<a href='/process/?run=status&requestID=<?php echo $request->ID; ?>&status=Archived' class='btn'>Archive </a>
			
		<br>
			<?php 
			
			}
			
			
		
						$Status = wp_create_category( "Status" );
				$Active = wp_create_category( "Active" );
				
					wp_create_category( "Booked" , $Active );
					wp_create_category( "Interested" , $Active );
					wp_create_category( "Invited" , $Active );
					wp_create_category( "On Hold" , $Active );
					wp_create_category( "Pending" , $Active );
					
				$Archived = wp_create_category( "Archived" );
				$Inactive = wp_create_category( "Inactive" );
				
					wp_create_category( "Cancelled" , $Inactive );
					wp_create_category( "Completed" , $Inactive );
					wp_create_category( "Denied" , $Inactive );
					wp_create_category( "Expired" , $Inactive );
				
				
		foreach($requests as $request){


					$status = get_field( "request_status", $request->ID );
					
				
					
			switch ($status) {
				case "Pending":
				  // echo "Pending...";
				  
				  
				   
				   $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					
					break;break;
				case "Interested":
					//echo "Interested..   but needs more information";
					break;break;
				case "Invited":
					//echo "You are Invited! - Invite Sent";
					break;break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;break;
				case "Cancelled":
					//echo "Request Cancelled!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'cancelled' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;
				case "Completed":
					//echo "Request Completed!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'completed' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;
				case "Archived":
					//echo "Request Completed!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'archived' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;
				case "Denied":
					//echo "Request Denied";
					
					
					$cat_id = get_cat_ID( strtolower ( 'denied' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
					break;break;
				case "Hold":
					//echo "On Hold";
					break;break;
				default:
					//echo "Pending...";
					
					 $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories , 1 );
						
					
			}
		}	
			
			
			
			
			
			
			
			
			
			
		if( $status  == "Archived" ){ 


		echo "<br>ARCH-- <br>";
		 $my_post = array(
      'ID'           => $request->ID,
	  
      'post_title'   => $request->post_title,
     'post_content' => $request->post_content,
	
	  'post_status' => 'draft'
  );
 ///wp_update_post( $my_post );
		
		
}



					$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				   echo "Pending...";
					break;
				case "Interested":
					echo "Interested..   but needs more information";
					break;
				case "Invited":
					echo "You are Invited! - Invite Sent";
					break;
				case "Booked":
					echo "You are Booked! - A Time has been Set";
					break;
				case "Completed":
					echo "Request Completed!";
					break;
				case "Denied":
					echo "Request Denied";
					break;
				case "Hold":
					echo "On Hold";
					break;
				default:
					echo "Pending...";
						
					
			}
			?>
			
			<div class='clearfix'></div>
			<span class='alert-success btn-block'> - </span>
			<span class='alert-warning btn-block'> - </span>
			<span class='alert-danger btn-block'> - </span>
			<?php
			
			
			
			?>
			
			<div class='clearfix'></div>
			</div>
		<?php
		}
		
		
		 if( is_user_logged_in() ){ ?>
		
		<?php
		///////////////////////////////////////////////////////////
		
		$search_term = $_GET['filter'];
		$filter =  $_GET['filter'];
		
		?>
		
		<form method='get'>
			<select name='filter'>
				<option value=''>Filter By:</option>
				<option value='MX_user_age'>Age</option>
				<option value='paid'>PAID</option>
				<option value='state'>State</option>
				
			</select>
			<select name='city'>
				<option value=''>City:</option>
				<option value='Philadelphia'>Philadelphia</option>
				<option value='Lancaster'>Lancaster</option>
				<option value='Harrisburg'>Harrisburg</option>
			</select>
			<select name='state'>
				<option value=''>State:</option>
				<?php
				$locations = get_posts( array( 'post_type' => 'ssi_locations' , 'posts_per_page' => -1 ) );
				
				foreach($locations as $lead){
					
					?>
					<option value="<?php echo get_field( 'ssi_state', $lead->ID); ?>"><?php echo get_field( 'ssi_state', $lead->ID); ?></option>
					<?php
					
				}
			?>
			</select>
			<select name='location'>
				<option value=''>Location:</option>
				<?php
				$locations = get_posts( array( 'post_type' => 'ssi_locations' , 'posts_per_page' => -1 ) );
				
				foreach($locations as $lead){
					
					?>
					<option value="<?php echo get_field( 'ssi_area_code', $lead->ID); ?>"><?php echo get_field( 'ssi_area_code', $lead->ID); ?> - <?php echo get_field( 'ssi_city', $lead->ID); ?>, <?php echo get_field( 'ssi_state', $lead->ID); ?></option>
					<?php
					
				}
			?>
			</select>
			<select name='order'>
				<option value='#'>Order:</option>
				<option value='asc'>ASC</option>
				<option value='desc'>DESC</option>
			</select>
			
			
			<input type='submit'>
		</form>

		<div class='filters'>
		
			<a href='?filter=paid' class='btn btn-default'> PAID</a>
			<a href='?filter=MX_user_age' class='btn btn-default'> AGE</a>
			
			<a href='?city=Lancaster&filter=MX_user_age' class='btn btn-default'> City: Lancaster - AGE</a>
			<a href='?city=Lancaster&filter=paid' class='btn btn-default'> City: Lancaster - PAID</a>
			<a href='?city=Lancaster&filter=MX_user_amount' class='btn btn-default'> City: Lancaster - Donate</a>
		</div>
		<div class='filters'>
			Secondary
			<a href='&filter=paid' class='btn btn-default'> PAID</a>
			<a href='&filter=MX_user_age' class='btn btn-default'> AGE</a>
			
			<a href='&city=Lancaster' class='btn btn-default'> City: Lancaster </a>
		
		</div>
		
		<div class='clearfix'></div><hr>
		<?php 
		
		} 
	?>

<?php	
		if( is_user_logged_in() ){
		?>
		<hr> POTENTIAL <hr>
		$ 
		<?php
		echo $potential;
		}
		?>
			