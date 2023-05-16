<?php get_header();

$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {		
 ?>
    

<?php //get_template_part( 'content', 'list' ); ?>

	<?php
		//$requests = GFAPI::get_entries( '2' );
	/*	
		$search_criteria = array();
		$form_id = 2;
		$start_date = date( 'Y-m-d', strtotime('-99999 days') );
		$end_date = date( 'Y-m-d', time() );
		$search_criteria['start_date'] = $start_date;
		$search_criteria['end_date'] = $end_date;
*/		
			
			
if($_GET['update_post']){ 
	
	$ID = $post;
	$ID = get_post( $_GET['ID'] );
	
	wp_update_post($ID); 
}
if($_GET['make_draft']){
	
	$ID = $post->ID;
	$ID = $_GET['ID'];
	
	 $my_post = array(
      'ID'           => $ID,
      'post_title'   => get_the_title($ID),
     'post_content' => get_the_content($ID),
	  'post_status' => 'draft'
  );

// Update the post into the database
  wp_update_post( $my_post );
	
}		
			$all_requests = get_posts( 
					
						array(	'posts_per_page'   => -1,  
								'post_type' => 'ssi_requests',
								//'category' => array(-15),
								//'order' => $order,
								//'meta_key' => $_GET['filter'],
								'orderby'  => 'modified',
								//'category_name'  => 'pending',
								//'date_query' => array( array( 'after' => '1 month ago' ) )  
						) 
					);
			
			
			if($_GET['all']){ 
		
					$requests = get_posts( array(	'posts_per_page'   => -1, ) );
				}else{

					$requests = get_posts( 
					
						array(	'posts_per_page'   => -1,  
								'order' => 'desc',
								//'category_name'  => 'pending',
								'date_query' => array( array( 'after' => '1 month ago' ) )  
						) 
					);
				}
		

		
		$count = 0;
		
						
		foreach($requests2 as $request){


					$status = get_field( "request_status", $request->ID );
					
			switch ($status) {
				case "Pending":
				  // echo "Pending...";
				   
				   $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories );
					
					break;break;
				case "Interested":
					//echo "Molly is Interested..   but she needs more information";
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
					
					wp_set_post_categories( $request->ID, $post_categories );
					break;
				case "Completed":
					//echo "Request Completed!"; 
					
					$cat_id = get_cat_ID( strtolower ( 'completed' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories );
					break;
				case "Denied":
					//echo "Request Denied";
					
					
					$cat_id = get_cat_ID( strtolower ( 'denied' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories );
					break;break;
				case "Hold":
					//echo "On Hold";
					break;break;
				default:
					//echo "Pending...";
					
					 $cat_id = get_cat_ID( strtolower ( 'pending' ) );
					$post_categories = array($cat_id);
					
					wp_set_post_categories( $request->ID, $post_categories );
						
					
			}
		}
			
		?>
		
		
		
		
	
		
		
		<div class=' stats  text-center'>
		<?php 
		if($_GET['all']){
			?>
			<center><h3><u><a href='/requests/'><?php echo count($all_requests);?> </a></u>     Total Requests!</h3><br>
			<?php 
		}else{
			?>
			
			<div class='clearfix'></div>
		
				<hr class="text-center"><h1>THoTMasTer has <u><a href='/requests/'><?php echo count($all_requests);?></a></u> THoT Requests!</h1><hr>
			<div class='clearfix'></div>
	
			
			<?php 
		}
		?>
			
			ACTIVE REQUESTS<br><br>  
			<ul>
				<?php 
				$activeID = get_cat_ID( "Active" );
				wp_list_categories( array(
					'orderby'    => 'name',
					'show_count' => true,
					'title_li' => '<strong>' . __( '', 'textdomain' ) . '</strong>',
					'child_of'            => $activeID, //Active
					'hide_empty' => 0,
					//'exclude'    => array( 1 ),
					//'include' => array(  )
				) ); ?> 
				<br>ARCHIVES<br><br>  
				<?php 
				
					$inactiveID = get_cat_ID( "Inactive" );
					wp_list_categories( array(
					'orderby'    => 'name',
					'show_count' => true,
					'title_li' => '<strong>' . __( '', 'textdomain' ) . '</strong>',
					'child_of'            => $inactiveID, //Inactive
					'hide_empty' => 0,
					//'exclude'    => array( 1 ),
					//'include' => array(  )
				) ); ?> 
			</ul>
			<br>
			</center>
			
		</div>
		<div class='clearfix'></div><hr>
		
		

		<?php if( is_user_logged_in() && is_page('people') ){ ?>
		
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
		
		///////////////////////////////////////////////////////////
		$search_term = 'post_date';
		$search_term = $_GET['filter'];
		$filter1 =  'registered';		
		$filter1 =  $_GET['filter'];
		
		$number = -1 ;
		$order = 'desc';
		
		
		$order = $_GET['order'];
		if( is_page('people') ){ $number = -1 ; }
		if( $filter1 == 'age' ){ $order = 'asc'; }
		
		
	$requests2 = get_posts( 
					
						array(	'posts_per_page'   => -1,  
								'post_type' => 'ssi_models',
								//'category' => array(-15),
								'order' => 'desc',
								//'meta_key' => $_GET['filter'],
								'orderby'  => 'modified',
								'category_name'  => 'pending',
								//'date_query' => array( array( 'after' => '1 month ago' ) )  
						) 
					);
		
		
		
			$requests3 = get_posts( 
					
						array(	'posts_per_page'   => $number,  
								'post_type' => 'ssi_requests',
								'order' => $order,
								//'category' => array(-15),
								//'meta_key' => $_GET['filter'],
								'orderby'  => 'modified',
								'category_name'  => 'pending',
								//'date_query' => array( array( 'after' => '1 month ago' ) )  
						) 
					);		
					
		$leads = array_merge($requests3 , $requests2);
		
					if(!is_page('people')){
					?>
		
	<div class='clearfix'></div>
	
		<h4><u>3</u> Most Recent - SUB Requests</h4>
		<br>
	<?php
	
			$NJ = $PA = $pending_state =0; 
	
			$philadelphia = $harrisburg = $lancaster = $pending_c = 0 ; 	}

			
			$members = $non_members = 0;
			
		foreach($leads as $request){	
		
		
			$oldData = array( 'lead_age' , 'lead_height' ,'lead_weight' ,'lead_donation' , 'lead_amount' ,'lead_email' , 'lead_phone' ,'lead_state' ,'lead_address' ,'lead_city' ,'lead_zip','lead_dob' ,'lead_orientation' ,'lead_position' ,'lead_size' , 'request_orientation',  'request_preference', 'lead_donation' , 'lead_amount' );
								
								$userData = array( 'MX_user_age' , 'MX_user_height' ,'MX_user_weight' ,'MX_user_donation' , 'MX_user_amount' ,'MX_user_email' ,'MX_user_phone' ,'MX_user_state' ,'MX_user_address' ,'MX_user_city' ,'MX_user_zip' ,'MX_user_dob' ,'MX_user_orientation' ,'MX_user_postition' ,'MX_user_endowment' , 'MX_user_orientation' ,'MX_user_postition', 'MX_user_donation', 'MX_user_amount'  );
								
								$index = 0;
								foreach ($oldData  as $param_name ) {
									
									//add_post_meta( $user->ID, $userData[$index], "-" );
									if(get_field($param_name, $request->ID)){
										$param_val =	get_field($param_name,  $request->ID);
										update_post_meta( $request->ID, $userData[$index], $param_val );
										//update_field($param_name, $param_val , "user_" . $current_user->ID );
										//echo "'MX_$param_name' ,";
									}
									$index++;
								}
						
			
								$index = 0;

				if(get_user_by('email',get_field('MX_user_email', $request->ID))) { 
							$members++;
							//echo "MEMBER!!";
							//continue;
				}else{
				
					$non_members++;
				}

	
$state = get_field( "MX_user_state", $request->ID );
					
			switch ($state) {
				case "NJ":
				  $NJ++;
					break;
				case "PA":
					$PA++;
					break;
				
				
				default:
					$pending_state++;
					//echo "Pending...";
						
					
			}

	$city = get_field( "MX_user_city", $request->ID );
					
			switch ($city) {
				case "Philadelphia":
				  $philadelphia++;
					break;
				case "Harrisburg":
					$harrisburg++;
					break;
				case "Lancaster":
					$lancaster++;
					break;
				
				default:
					$pending_city++;
					//echo "Pending...";
						
					
			}

		
				///print_r($request);
				if( $_GET['city'] != "" ){
				if( get_field( "MX_user_city", $request->ID ) != $_GET['city']  ){ continue; } }
				
				if( $_GET['state'] != "" ){
				if( get_field( "MX_user_state", $request->ID ) != $_GET['state']  ){ continue; } }
		?>		
						
						
							<div class="col-sm-12 person"> 
				
					
		<div class='request well'>
		<form method='post'>
		<?php 
		
				
			//echo $count++ . " -- ";
			
			echo date( 'm/d/y', strtotime($request->post_date) );
		
		echo "<div class='clearfix'></div>";
				
				
		?>
		
	<div class='col-sm-6'>
		<div class='col-xs-6'>
		<?php 
				
				//echo get_field( "request_status", $request->ID, true );
			//print_r($request);
					$selected = get_field( "MX_user_consent", $request->ID );
			
			if( !has_post_thumbnail( $request->ID ) && current_user_can( 'manage_options' ) ){
					
					
			
		?>
			<img src="http://amazonmolly.com/wp-content/uploads/2016/07/Man_shadow_-_upper-150x150.png" alt="Man_shadow_-_upper" width="150" height="150" class=" size-thumbnail wp-image-952" />
		<?php 
		
			}else if( (in_array('photo', $selected)  && has_post_thumbnail( $request->ID )) || current_user_can( 'manage_options' ) ){
				echo get_the_post_thumbnail( $request->ID , 'thumbnail', array( 'class' => '' )  );
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
			echo "<h3>" . $request->post_title . '</h3>';
			
			echo "Age: " . get_field( "MX_user_age", $request->ID ) . '<br>  ';
			
			echo "Height: " . get_field( "MX_user_height", $request->ID ) . '<br> ';

			echo "Weight: " . get_field( "MX_user_weight", $request->ID ) . '<br><br> ';
		
			
			echo  get_field( "MX_user_city", $request->ID ) . ', ';
			echo  get_field( "MX_user_state", $request->ID ) . '<br> ';
			
		if( (in_array('display', $selected)  && has_post_thumbnail( $request->ID )) || current_user_can( 'manage_options' ) ){
		//	if( get_field( "MX_user_email", $request->ID ) ){}else{  }
			
			
		
		
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
		
		<?php 	
			echo "Phone:" . get_field( "MX_user_phone", $request->ID ) . ' ...  ... ';

			
			echo "Email:" . get_field( "MX_user_email", $request->ID ) . ' ...  ';
		?>	
		</div>
		
		<?php 	
		//	echo "Consent:" . get_field( "MX_user_consent", $request->ID ) . ' ... <br><br>';	
			
			if ( get_field( "paid", $request->ID ) ) echo "PAID $" . get_field( "paid", $request->ID );
			
			
			}
				
			
			if( in_array('display', $selected)  || current_user_can( 'manage_options' ) ){	
							
				?>	<div class='clearfix'></div>
			
			<?php 	
				
				echo "<hr>Orientation:" . get_field( "MX_user_orientation", $request->ID ) . ' ... ';

				echo "Position:" . get_field( "MX_user_position", $request->ID ) . ' ... ';
				
				echo "Dick Size:" . get_field( "MX_user_endowment", $request->ID );	
				
				
				echo "<br><br><b>Fantasy: - </b>" . $request->post_content . ' ... <br><br>';
				if( get_field( "MX_user_donation", $request->ID ) ){echo "Donate: " . get_field( "MX_user_donation", $request->ID ) . ' ...  <br>'; }
				if( get_field( "MX_user_amount", $request->ID ) ){echo " ----  $: " . get_field( "MX_user_amount", $request->ID ) . ' ... <br><br>'; }
				
				//echo "How Much:" . $request[17] . ' ... <br><br>';

				//echo "Looking For:" . $request[8] . ' ... <br><br>';
				
					$consent = get_field( "MX_user_consent", $request->ID );
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
if (current_user_can( 'manage_options' ) && get_field('MX_user_email', $request->ID) ){
	
	
	
	
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
	
	
	
	
	
}
			?>
			
<!-- #### END-------->			
			
			
	</form>
</div>
			
			
			
			<div class='clearfix'></div>
			</div>
		<?php
			
				$count++;
									if( ($count % 3) == 0 ){ 
						?>					
				
								<div class='clearfix'></div>

						<?php		}else{
							
							?> 
							
							<?php
									}
								
		
		}
		
		
	
		?>	
								<div class='clearfix'></div><br>
								
					<?php			
					
					
		if( is_user_logged_in()  ){ 					
		
				echo "<br>Philadelphia: " . $philadelphia;
				echo "<br>Harrisburg: " . $harrisburg;
				echo "<br>Lancaster: " . $lancaster;
				
				
				echo "<br><br>PA: " . $PA;
				echo "<br>NJ: " . $NJ;
			
				echo "<br><br>Pending City: " . $pending_city ;
				echo "<br>Pending State: " . $pending_state ;
				
				
				$all_members = $members + $non_members;
				
				
				echo "<br><br>Members: " . $members . '/' . $all_members ;
				echo "<br><br>Non Members: " . $non_members . '/' . $all_members ;
		
				echo "<br><br>" ;
		
		}
					 if( !is_page('people') ){
						 
						 ?>
		<a href='<?php if( is_user_logged_in()){ echo "/request?all=1"; }else{ echo "/join"; }?>' class='btn- btn-lg btn-success'> View all <u><?php echo count($all_requests); ?></u> Requests >></a>
								<?php			
					
					 }
						 
						 
						 
						 ?>
								<div class='clearfix'></div><br>
<?php 
}else{ ?>
		
			<div class='container'>
				<?php echo do_shortcode("[wpmem_form login]"); ?>
			</div>
			
	<?php } 


get_footer(); ?>