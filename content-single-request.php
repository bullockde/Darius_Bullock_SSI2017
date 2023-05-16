<div class='request well green'>
		<form method='post'>
		<?php 
		
				
			//echo $count++ . " -- ";
			
			echo date( 'm/d/y', strtotime($request->post_date) );
		
		echo "<div class='clearfix'></div>";
				
				
		?>
		
	<div class='col-sm-6'>
		<div class='col-xs-6'>
		<?php 
				
				//echo get_field( "request_status", get_the_id(), true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", get_the_id() );
			
			if( !has_post_thumbnail( get_the_id() ) && current_user_can( 'manage_options' ) ){
					
					
			
		?>
			<img src="http://amazonmolly.com/wp-content/uploads/2016/07/Man_shadow_-_upper-150x150.png" alt="Man_shadow_-_upper" width="150" height="150" class=" size-thumbnail wp-image-952" />
		<?php 
		
			}else if( (in_array('photo', $selected)  && has_post_thumbnail( get_the_id() )) || current_user_can( 'manage_options' ) ){
				echo get_the_post_thumbnail( get_the_id() , 'thumbnail', array( 'class' => '' )  );
			}else{
				
				
		?>
			<img src="http://amazonmolly.com/wp-content/uploads/2016/07/Man_shadow_-_upper-150x150.png" alt="Man_shadow_-_upper" width="150" height="150" class=" size-thumbnail wp-image-952" />
		<?php 
			}
			?>
			<div class='clearfix'></div>
			
			
		</div>
		
		<div class='col-xs-6'>
		
		<?php 
			echo "<h3>" . get_the_title() . '</h3>';
			
			echo "Age: " . get_field( "MX_user_age", get_the_id() ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height", get_the_id() ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight", get_the_id() ) . '<br><br> ';
		
			
			echo  get_field( "MX_user_city", get_the_id() ) . ', ';
			echo  get_field( "MX_user_state", get_the_id() ) . '<br> ';
			
		if( (in_array('display', $selected)  && has_post_thumbnail( get_the_id() )) || current_user_can( 'manage_options' ) ){
		//	if( get_field( "MX_user_email", get_the_id() ) ){}else{  }
			
			
		
		
			}else{ 
		
		
			echo "- Login to View -<br>";
			

		}
			
			?>
		</div>
	</div>	
	
	<div class='col-sm-6'>
		<div id='details<?php echo $count;?>' class='' style='display: block;'>
		
		
		
		
				<?php 
				
				if (current_user_can( 'manage_options' )){
		?>	
	
		<div class=' col-md-12'>
		
		
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", get_the_id() ) . ' ... <br><br>';	
			
			if ( get_field( "paid", get_the_id() ) ) echo "PAID $" . get_field( "paid", get_the_id() );
			
			
			}
				
			
			if( /*in_array('display', $selected)  || current_user_can( 'manage_options' )*/ 1 ){	
							
				?>	<div class='clearfix'></div>
			
			<?php 	
				
				echo "<hr>Orientation:" . get_field( "MX_user_orientation", get_the_id() ) . ' ... ';

				if(get_field( "request_preference", get_the_id() ) ){ update_field( "MX_user_position", get_field( 'request_preference', get_the_id() ),  get_the_id() ); }
				
				echo "Position:" . get_field( "MX_user_position", get_the_id() ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", get_the_id() );	
				
				echo "<br><br><br>";
				
				if( get_field( "MX_user_donation", get_the_id() ) ){ echo "Donate: " . get_field( "MX_user_donation", get_the_id() ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", get_the_id() ) ){ echo " ----  $: " . get_field( "MX_user_amount", get_the_id() ) . ' ... <br><br>';
					
				}
				
			
				if( get_field( "request_date", get_the_id() ) ){ echo "Date: " . get_field( "request_date", get_the_id() ) . ' ...  <br>'; }
					if( get_field( "request_time", get_the_id() ) ){ echo "Time: " . get_field( "request_time", get_the_id() ) . ' ...  <br>'; }
				
				if( get_field( "request_length", get_the_id() ) ){ echo "<br><br> - <b>" . get_field( "request_length", get_the_id() ) . '</b> - '; }
				
				if( get_field( "request_interest", get_the_id() ) ){ echo " " . get_field( "request_interest", get_the_id() ) . " "; }
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
	/*			
	 			$revisions = wp_get_post_revisions( get_the_id() );
				$count = 0;
				foreach($revisions as $revision){ if( strlen( $revision->post_content )  > 3 ){ 
			
					
	 $my_post = array(
      'ID'           => get_the_id(),
	  
      'post_title'   => $revision->post_title,
     'post_content' => $revision->post_content,
	
	 // 'post_status' => 'pending'
  );
//  wp_update_post( $my_post );
 //$my_cat = array('cat_name' => get_field( "MX_user_city", get_the_id() ), 'category_description' => 'Philadelphia - 215', 'category_nicename' => 'philadelphia', 'category_parent' => '');

// Create the category
//$my_cat_id = wp_insert_category($my_cat);

	// wp_create_category(get_field( "MX_user_city", get_the_id() ));
 // wp_set_post_categories( get_the_id(), get_cat_ID( 'Philadelphia' ), 1 )
	//add_post_meta(get_the_id(), 'MX_modified_user', $user->display_name) ;
	//update_post_meta(get_the_id(), 'MX_modified_user', $user->display_name) ;

// Update the post into the database

				
				
				echo "<br>" . $revision->post_content; $count++; } }
				
		*/		
				if( get_field( "request_donation", get_the_id() ) ){ echo "- " . get_field( "request_donation", get_the_id() ) . ' ...  <br>'; }
				if( get_field( "request_amount", get_the_id() ) ){ echo " ----  $: " . get_field( "request_amount", get_the_id() ) . ' ... <br><br>'; 
				
				$potential += get_field( "request_amount", get_the_id() );
				
				}
				
				//echo "How Much:" . $request[17] . ' ... <br><br>';

				//echo "Looking For:" . $request[8] . ' ... <br><br>';
				
					$consent = get_post_meta(  get_the_id(), "MX_user_consent" );
				//print_r( $consent );
				if( in_array( 'photo', $consent) ){ echo "Show My PIX!!<br>"; }
			if( in_array( 'record', $consent ) ){ echo "Record ME!!<br>"; }
			if( in_array( 'display', $consent) ){ echo "Show my Stats!!<br>"; }
			if( in_array( 'groups', $consent ) ){ echo "Call your friends Over!!<br>"; }
				

			}	else { 
			
			
				
				echo "<br><hr><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';

			}
			?>	
		</div>
	</div>
	
	
	
			<div class='clearfix'></div><br>
			<button id='details<?php echo $count;?> 'class='btn btn-block'>View Request</button>
			<div class='clearfix'></div>
		<div class='clearfix'></div><hr><center><span style='font-size: 16px;'>
	

	<?php 	
		
			
			
			if (current_user_can( 'manage_options' )){
	
	
	
					
			
			if(get_field( "request_username", get_the_id() )){ echo "<br> User - " . get_field( "request_username", get_the_id() ); }
			if(get_field( "request_password", get_the_id() )){ echo "<br> Pass - " . get_field( "request_password", get_the_id() ); }
	

	
if( get_field( "met_before", get_the_id() ) && !get_field( "MX_user_email", get_the_id() )  ){
		echo "<hr> Havnt Met <br>";
		 $my_post = array(
      'ID'           => get_the_id(),
	  
      'post_title'   => get_the_title(),
     'post_content' => $request->post_content,
	
	  'post_status' => 'pending'
  );
// wp_update_post( $my_post );
		
		
}
			
				edit_post_link( 'edit', '<p>', '</p>', get_the_id() );
				
			
			
				?>	
				<div class='clearfix'></div>
		<form method="post" action="" class='pull-left'>
			<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
			<input name="ID" type="hidden" value="<?php echo get_the_id(); ?>" />
			<input name="post_to_draft" type="hidden" value="true" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form>
		
		<a target='_blank' href='?update_post=1&ID=<?php echo get_the_id(); ?>' class='btn btn-info'>Update Post</a>
				<a target='_blank'  href='?make_draft=1&ID=<?php echo get_the_id(); ?>' class='btn btn-info'>Delete</a>
		
		
		
		<div class='clearfix'></div>
		
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Hold' class='btn'>On Hold </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Interested' class='btn'>Interested </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Invited' class='btn'>Invited </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Booked' class='btn'>Booked </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Completed' class='btn'>Completed </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Denied' class='btn'>Denied </a>
			<a href='/process/?run=status&requestID=<?php echo get_the_id(); ?>&status=Archived' class='btn'>Archive </a>
			
		<br>
		
				<div class='clearfix'></div>
					<div class='col-md-2'> 

						
						<input type="text" name="update_post_title" value="<?php echo get_the_title(); ?>">


					</div>
					<div class='col-md-3'>
						
						<input type="text" name="MX_user_email" placeholder="Email" value="<?php echo get_field( 'MX_user_email', get_the_id() ); ?>">
						

					</div>
					<div class='col-md-2'>
						
						<input type="text" name="MX_user_ephone" value="<?php echo get_field( 'MX_user_phone', get_the_id() ); ?>">

					</div>
					<div class='col-md-2'>
	
						<input type="text" name="MX_user_ecity" value="<?php echo get_field( 'MX_user_city', get_the_id() ); ?>">

					</div>
					<div class='col-md-1'>

						<input type="text" name="MX_user_estate" value="<?php echo get_field( 'MX_user_state', get_the_id() ); ?>">

					</div>
					<div class='col-md-2'>
<input name="ID" type="hidden" value="<?php echo get_the_id(); ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
						<button name="ssi_update_cf" type="submit" class='btn btn-info' value="Update" />Update</button>
	
						
					</div>
						<div class='clearfix'></div>
			<?php 
			
			
			
			
			
			
			
			
			
			
			}
			
			
					$status = get_field( "request_status", get_the_id() );
					
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
			
			if(get_field( "status_notes", get_the_id() )){
					echo "</span><br><br>" . get_field( "status_notes", get_the_id() );
					}
				if(get_field( "final_products", get_the_id() )){
					echo "<hr>" . get_field( "final_products", get_the_id() );
					}	
					
				echo "</center>";
		
		?>
		
		
		
		<?php 
				if(get_user_by('email',get_field('MX_user_email', get_the_id()))) { 
							
							$the_user = get_user_by('email',get_field('MX_user_email', get_the_id()));
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo $the_user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
							
							
							
							<?php
							
							
							//update_field('MX_user_photo', '', get_the_id());
							//echo "MEMBER!!";
							
				}
				
?>
<!-- #### START -------->
<?php				

if( get_field( "name", get_the_id() ) &&  ( strlen($request->post_content) < 2 ) ){
		echo "<br> NONONO Email <br>";
		 $my_post = array(
      'ID'           => get_the_id(),
	  
      'post_title'   => get_the_title(),
     'post_content' => $request->post_content,
//	'category_name' => 'expired',
	  'post_status' => 'draft'
  );
  wp_update_post( $my_post );
		
		
	}else if(  !get_field( "MX_user_email", get_the_id() ) ){
	echo "<br> NONONO Email <br>";
}


if (current_user_can( 'manage_options' ) && get_field('MX_user_email', get_the_id()) ){
	
	
	if( get_user_by('email', get_field( "MX_user_email", get_the_id() ) ) ){
							
							$user = get_user_by('email', get_field( "MX_user_email", get_the_id() ));
							$arg = array(
									'ID' => get_the_id() ,
									'post_author' => $user->ID,
								);
							//	wp_update_post( $arg );
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
							
							
							add_post_meta(get_the_id(), "MX_user_request_count", $total, 1 );
							//update_post_meta(  get_the_id(), "MX_user_request_count" , $total );
							
							add_user_meta($user->ID, 'MX_user_request_count', $total, 1);
							
							
						//	echo 'Number of posts published by user: ' . count_user_posts( $user->ID , "ssi_requests"  ); 
							
							echo "<br>NEW TOTAL +" . get_post_meta(get_the_id(), "MX_user_request_count",  1 );
							
					echo "<br>User ID: " . $user->ID . "<br>";
				?>
				
				
				
					<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white'>Private Message</div></a>
				
				<?php
				}else{ 
						
		if( get_field( "MX_user_email", get_the_id() ) && !get_user_by('email', get_field( "MX_user_email", get_the_id() ) ) ){ 
		
	
					$role = 'author';
					
					
	$display_name = get_field( "request_username", get_the_id() );
		$username = 
		$email = get_field( "MX_user_email", get_the_id() );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		$password = null;
		$password = get_field( "request_password", get_the_id() );
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . $BLOK++ ; }
		else{  $name = $username[0]; }
			$display_name = $name;
			
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
			<input name="ID" type="hidden" value="<?php echo get_the_id(); ?>" />
			<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
		</form> 
		<br>
		<?php } ?>
		
		<?php }
	
	
	
	
	
}
			?>
			
<!-- #### END-------->			
			
			
	</form>
</div>