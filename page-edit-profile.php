<?php 
/*
Template Name: Users Profile Page
*/


	if( !is_user_logged_in() ){ $pg = "/login/"; wp_redirect($pg); exit; }
	else{ $current_user  = $user = wp_get_current_user();  }

//$userid = $_GET['ID'];
//$user = get_userdata( $userid );
//$current_user = get_userdata( $userid );
	
	
$admin_user = 0;
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		$admin_user = 1;
		
		$userid = $_GET['ID'];
		$user = get_userdata( $userid );
		$current_user = get_userdata( $userid );
	
	}else if( is_user_logged_in()  ){ 
			
				
				$user = wp_get_current_user(); 
				//print_r($user); 
				//$user = $user[0];
				$userid = $user->ID;
				$current_user = get_userdata( $userid );
	}
	

//$current_user = wp_get_current_user();
//$current_user = $current_user[0];

						
//print_r( $userid . "==" .  $current_user->ID );	


	$userData = array( 'MX_user_city' ,'MX_user_state' ,'MX_user_zip_code' ,'MX_user_age' ,'MX_user_height_ft' ,'MX_user_height_in' ,'MX_user_weight' ,'MX_user_body_type' ,'MX_user_ethnicity' ,'MX_user_sex' ,'MX_user_sexual_orientation' ,'MX_user_position' ,'MX_user_endowment' ,'MX_user_circumcised' ,'MX_user_out' ,'MX_user_body_hair' ,'MX_user_hair_color' ,'MX_user_eye_color' );
	
	//$usermeta =  get_user_meta($current_user->ID, $current_user->ID); 
	//print_r($usermeta);
	if( $_POST['edit_profile'] ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			update_user_meta( $current_user->ID, $param_name, $param_val );
			update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val , "user_" . $current_user->ID );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		echo "<h1 class='text-center'> PROFILE UPDATED!! </h1>";
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
		wp_redirect( '/user-profile/?ID=' . $userid );
	}else if(  get_user_meta( $current_user->ID, 'MX_user_age') == ''){
		//$usermeta =  get_user_meta($current_user->ID, $current_user->ID); 
			
			//print_r($usermeta);
		foreach ($userData as $param_name) {
			
			if( $param_val == "" ) $param_val = "-";
			
			add_user_meta( $current_user->ID, $param_name, "-" );
			
			//update_user_meta( $current_user->ID, $param_name, "-" );
			//update_field($param_name, "-" , "user_" . $current_user->ID );
			//update_field($param_name, $param_val , "user_" . $user->ID );
			//echo "Param: $param_name; Value: $param_val<br />\n";
		}
		wp_update_user( array( 'ID' => $current_user->ID  ) );
		
	}
	
	


get_header('network');	
	$user = wp_get_current_user();
	$admin_user = 0;
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		$admin_user = 1;
		
		$userid = $_GET['ID'];
		$current_user = get_userdata( $userid );
		$user = get_userdata( $userid );
		
	}
								
								
								
if( ($userid == $current_user->ID) ||  $admin_user ){
 ?>
 

<div class=''>
    <br>

	<div class="col-sm-12">
		<div id='profile' class='profile well yellow'>
			<?php
						
						
						if( $userid == 0 ) {
							echo "<div id='coming-soon'>You Must <a href='/register/'><u>Register</u></a> or <a href='/login'><u>Log IN</u></a> to View your Profile.</div>";
						}else{
						
							echo "<div>";
 ?>


	<br><div id='user-info'>
			<div id='user-personal'>
		
		<form method='post'>
		
		<div class="col-sm-3 text-center">
								
								<div class="link upper bold white">
									<center><a href="/user-profile/?ID=<?php echo $user->ID; ?>">
								<?php
								echo  $user->display_name;
								?>
								<br><br>
								<?php
								
									echo get_avatar($user->ID, 150);

								//	print_r($user);
								
					
									?>
										</a></center>
									</div><br>
									
									<div class='clear'></div>
							
									
								<a href='/members-list/<?php echo $user->user_nicename; ?>/profile/change-avatar/' class='btn btn-block btn-warning'>Change Photo</a>
								
									

</div>


<div class="col-sm-7 col-sm-offset-1  ">
								
				<hr>						
			<h3><center>Basic Stats</center></h3><hr>	
				<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_user_meta(  $current_user->ID, 'MX_user_age', 1); ?>'>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
			<?php 
				
					$att = get_user_meta($userid, 'MX_user_height_ft', 1);
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
				
					$att = get_user_meta($userid, 'MX_user_height_in', 1);
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
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<input type='text' name='MX_user_weight' value='<?php echo get_user_meta($current_user->ID, 'MX_user_weight', 1); ?>'>
			</div>	
				
				
				
									

</div>

		<div class="col-sm-3 text-center hidden">
								<br><br>
								I am a: <input type='text' name='MX_user_gender' value='<?php echo get_user_meta($current_user->ID, 'MX_user_gender', "user_" . $user->ID); ?>'>
								
								Seeking: <input type='text' name='MX_user_seeking' value='<?php echo get_user_meta($current_user->ID, 'MX_user_seeking', "user_" . $user->ID); ?>'>
								
								I Prefer: <input type='text' name='MX_user_prefers' value='<?php echo get_user_meta($current_user->ID, 'MX_user_prefers', "user_" . $user->ID); ?>'>
									

</div>
	

				<input type='hidden' name='ID' value='<?php echo $userid; ?>'>
				<input type='hidden' name='edit_profile' value='1'>
				
		
				
			<div class='clear'></div><br><br>	
			<hr>
					<h3><center>Full Details</center></h3><div class='clear'></div><hr>
					
	<div class="prof-info col-sm-6">
			
			<div class="col-xs-6">
				<b>Orientation</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_sexual_orientation', 1);
					$options = array( '-', 'Gay', 'Bi', 'Trans', 'DL' );

				?>
				<select name="MX_user_sexual_orientation" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>

		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Ethnicity</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_ethnicity', 1);
					$options = array('-', 'Native American', 'Asian', 'Black', 'Latino', 'Middle Eastern', 'Mixed', 'Pacific Islander', 'White', 'Other' );

				?>
				<select name="MX_user_ethnicity" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Sex</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_sex', 1);
					$options = array('-', 'Guy', 'Girl', 'Trans' );

				?>
				<select name="MX_user_sex" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Hair Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_hair_color', 1);
					$options = array('-', 'Black', 'Blond', 'Red' , 'Gray', 'White', 'Bald', 'Mixed', 'Shaved');

				?>
				<select name="MX_user_hair_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Out?</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_out', 1);
					$options = array('-', 'Yes', 'No');

				?>
				<select name="MX_user_out" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>		
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Hair</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_body_hair', 1);
					$options = array('-', 'Smooth', 'Shaved', 'Buzzed', 'Some Hair', 'Hairy', 'Bear');

				?>
				<select name="MX_user_body_hair" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>	
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Type</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_body_type', 1);
					$options = array('-', 'Slim', 'Average', 'Swimmers', 'Athletic', 'Muscular', 'Bodybuilder', 'Large');

				?>
				<select name="MX_body_type" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Eye Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_eye_color', 1);
					$options = array('-', 'Brown', 'Green', 'Gray', 'Hazel', 'Blue', 'Other');

				?>
				<select name="MX_eye_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
									
						
				<div class='clear'></div>		
				<br>		
						
						
		<div class="prof-info 1col-sm-6">
				<h3><center>Adult Stats</center></h3>
											<hr>
											
			<div class=' col-xs-6'>
				Position:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_position', "user_" . $user->ID);
					
					$options = array( '-', 'Top', 'Vers/Top', 'Vers', 'Vers/Bttm', 'Bottom');

				?>
				<select name="MX_user_position" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
			<div class=' col-xs-6'>
				Endowment:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_endowment', "user_" . $user->ID);
					$options = array('-',  '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5', '13+');

				?>
				<select name="MX_user_endowment" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
					 inches
			</div>
											
			<div class=' col-xs-6'>
				Cut / Uncut:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_circumcised', "user_" . $user->ID);
					
					$options = array('-',  'Cut', 'Uncut');

				?>
				<select name="MX_user_circumcised" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
												
												
	</div>	<hr>
								<!--					<div class="prof-info col-sm-6">
														<h3>Style</h3>
														<hr>
															 <input type='text' name='MX_user_style' value='<?php echo get_user_meta($current_user->ID, 'MX_user_style', 1); ?>'>
														</div>	
								-->
													
																		
																	</div>

																	
																		<div class='clear'></div><br>
																	<?php
									 
									// check if the repeater field has rows of data
									if( have_rows('additional_images', 1) ):
									
										// loop through the rows of data
										while ( have_rows('additional_images', 1) ) : the_row();
											// display a sub field value
											?>
																	<a href="#" onClick="jkpopimage('<?php the_sub_field("image", 1); ?>', 615, 500, 'InstaFliXXX Image for: <?php echo $user->display_name; ?>'); return false"><img style='width: 208px; height: 150px;' src='<?php the_sub_field("image", 1); ?>'></a>

																				<?php
										endwhile;
									 
									else :
									 
										// no rows found
									 
									endif;
									 
								?>


																				<div class='clear'></div><br>
		<hr>
		<h3><center>Location</center></h3>
											<hr>
		
	
		<div class='col-xs-4'>
			
				<b>City:</b>
				<br>
				 <input type='text' name='MX_user_city' placeholder='City' value='<?php echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $user->ID); ?>'>,  
		</div>		
		<div class='col-xs-5'>
					<b>State:</b>
				<br>
					<select name="MX_user_state"> 
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
			
		</div>
		<div class='col-xs-3'>
			
				<b>Zip:</b>
				<br>
				 <input type='text' name='MX_user_zip_code' value='<?php echo get_user_meta($current_user->ID, 'MX_user_zip_code', "user_" . $user->ID); ?>'>
				
			
			
		</div>
		<div class='clear'></div>


	
	
																				<div class='profile-social '>
																					<?php $add_social = 0; ?>
			<hr>	

			<h3><center>Lets Get Social!!!</center></h3>
			
				<hr>
				
				
				
				<div class='clear'></div><br>
		<?php
		$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );
		
		foreach($social as $lead){
			
			?>
			
			<b><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $lead->post_name; ?>.png"><?php echo $lead->post_title; ?>: </b> <br><br> <input type="text" name="MX_user_<?php echo $lead->post_name; ?>" placeholder="<?php echo $lead->post_title; ?> Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_" . $lead->post_name , 1); ?>" >
			<br><br>
			<?php
			
		}
	?>
	<div class='clear'></div>
	
	

			


																				</div>

																				<?php            					

							
	
						echo "</div>";			
		
							
		?>


																				<?php
							echo "<div class='clear'></div>";
						}
						
					?>


																			</div>



																			<?php 
				
	
				?>
				
				
				<div class='clear'></div><hr>
				
		<input type='submit' value='Update Profile' class='btn btn-lg btn-success btn-block' style='padding: 2em; '>
	</form>

																		</div>
																		<div class='col-md-4 hidden'>
																			&nbsp;
																		</div>
																		<?php// get_sidebar('left'); ?>

																	</div>
<br><br>
<div class='clear'></div>
<br><br>
		<div class="paginator hidden"><center>															
		  <a class='pull-left' href='/people'>&lsaquo; ALL Members</a>
				<a class='pull-right' href='/user-profile/?ID=<?php echo ($userid+1);?>'>Next >></a>
		</center>
            </div>
			<div class='clear'></div>
			
<?php 


}else{
?>
	
	<h1 class='text-center'> You May only EDIT your Profile! </h1>
	
	<br>
	<center>
	<?php echo do_shortcode('[wpmem_form login]'); ?>
	</center>
	<center><a href='/people' class='btn btn-lg btn-danger'> << Back </a>
<?php
}
?>
</div></div>
<div class='clear'></div>
<?php
get_footer('preview'); ?>

