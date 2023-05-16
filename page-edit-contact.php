<?php 
/*
Template Name: Users Profile Page
*/


	//if( !is_user_logged_in() ){ $pg = "/login/"; wp_redirect($pg); exit; }


	
$contact = get_post( $_GET['ID'] );

//print_r($contact);
//$current_user = wp_get_current_user();
//$current_user = $current_user[0];

						
//print_r( $_GET['ID'] . "==" .  $_GET['ID'] );	


	$userData = array( 'MX_user_city' ,'MX_user_state' ,'MX_user_zip_code' ,'MX_user_age' ,'MX_user_height_ft' ,'MX_user_height_in' ,'MX_user_weight' ,'MX_user_body_type' ,'MX_user_ethnicity' ,'MX_user_sex' ,'MX_user_sexual_orientation' ,'MX_user_position' ,'MX_user_endowment' ,'MX_user_circumcised' ,'MX_user_out' ,'MX_user_body_hair' ,'MX_user_hair_color' ,'MX_user_eye_color' );
	
	//$usermeta =  get_post_meta($_GET['ID'], $_GET['ID']); 
	//print_r($usermeta);
	if( $_POST['edit_profile'] ){
		
		foreach ($_POST as $param_name => $param_val) {
			
			//update_user_meta( $_GET['ID'], $param_name, $param_val );
			update_post_meta( $_GET['ID'], $param_name, $param_val );
			//update_field($param_name, $param_val ,  $_GET['ID'] );
			//echo "'MX_user_$param_name' ,";
		}

		//$vars =  get_queried_object();
		// print_r($vars);
		
		echo "<h1 class='text-center'> PROFILE UPDATED!! </h1>";
		update_post_meta( $_GET['ID'], "MX_user_level", "3" );
		wp_update_user( array( 'ID' => $_GET['ID']  ) );
		
		
		$current_user = wp_get_current_user();
		
		//print_r($current_user);
		if( is_user_logged_in() ){
			$pg = "/members-list/" . $current_user->user_nicename . "/profile/change-avatar/";
		}else{
			$pg = "/thot-request/";
		}

		wp_redirect( $pg );


		if( current_user_has_avatar() ){}else{
			
        

	}
		//wp_redirect( '/models/?ID=' . $_GET['ID'] );
	
	
		
	}else if(  get_post_meta( $_GET['ID'], 'MX_user_age') == ''){
		//$usermeta =  get_post_meta($_GET['ID'], $_GET['ID']); 
			
			//print_r($usermeta);
		foreach ($userData as $param_name) {
			
			if( $param_val == "" ) $param_val = "-";
			
			add_user_meta( $_GET['ID'], $param_name, "-" );
			
			//update_user_meta( $_GET['ID'], $param_name, "-" );
			//update_field($param_name, "-" ,  $_GET['ID'] );
			//update_field($param_name, $param_val ,  $_GET['ID'] );
			//echo "Param: $param_name; Value: $param_val<br />\n";
		}
		wp_update_user( array( 'ID' => $_GET['ID']  ) );
		
	}
	
	


get_header('login');	
	$user = wp_get_current_user();
	$admin_user = 0;
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		$admin_user = 1;
		
		$_GET['ID'] = $_GET['ID'];
		$current_user = get_userdata( $_GET['ID'] );
		$user = get_userdata( $_GET['ID'] );
		
	}
								
								
								
if( ($_GET['ID'] == $_GET['ID']) ||  $admin_user ){



 ?>
 <!--
 <hr>
<h2 class="post-title text-center"><?php wp_title(""); ?></h2>   <hr>
-->
<div class=''>

	<div class="col-sm-12">
		<div id='profile' class='profile'>
			<?php
						
						
						if( $_GET['ID'] == 0 ) {
							echo "<div id='coming-soon'>You Must <a href='/register/'><u>Register</u></a> or <a href='/login'><u>Log IN</u></a> to View your Profile.</div>";
						}else{
						
							echo "<div>";
 ?>


		<div id='user-info'>
			<div id='user-personal'>
		
		<form method='post'>
		
		<div class="col-sm-3 text-center">
		
		
		<?php 
			$current_user = wp_get_current_user();
		?>
								
								<div class="link upper bold white">
									<center><a href="/user-profile/?ID=<?php echo $_GET['ID']; ?>">
								<?php
								echo  $contact->post_title;
								?>
								<br><br>
								<?php
								
									echo get_avatar($_GET['ID'], 150);

								//	print_r($user);
								
					
									?>
										</a></center>
									</div>
									
									<div class='clear'></div>
							
									
								<a href='/members-list/<?php echo $current_user->user_nicename; ?>/change-avatar/' class='btn btn-block btn-warning hidden'>Change Photo</a>
								
									

</div>


<div class="col-sm-7 col-sm-offset-1  ">
								
				<hr>						
			<h3><center>Basic Stats</center></h3><hr>	
				<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				 <input type='text' name='MX_user_age' value='<?php echo get_post_meta(  $_GET['ID'], 'MX_user_age', 1); ?>'>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
			<?php 
				
					$att = get_post_meta($_GET['ID'], 'MX_user_height_ft', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_height_in', 1);
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
				<input type='text' name='MX_user_weight' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_weight', 1); ?>'>
			</div>	
				
				
				
									

</div>

		<div class="col-sm-3 text-center hidden">
								<br><br>
								I am a: <input type='text' name='MX_user_gender' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_gender',  $_GET['ID']); ?>'>
								
								Seeking: <input type='text' name='MX_user_seeking' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_seeking',  $_GET['ID']); ?>'>
								
								I Prefer: <input type='text' name='MX_user_prefers' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_prefers',  $_GET['ID']); ?>'>
									

</div>
	

				<input type='hidden' name='ID' value='<?php echo $_GET['ID']; ?>'>
				<input type='hidden' name='edit_profile' value='1'>
				
		
				
			<div class='clear'></div><br><br>	
			<hr>
					<h3><center>Profile Stats</center></h3><div class='clear'></div><hr>
					
	<div class="prof-info col-sm-6">
			
			<div class="col-xs-6">
				<b>Orientation</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_post_meta($_GET['ID'], 'MX_user_sexual_orientation', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_ethnicity', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_sex', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_hair_color', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_out', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_body_hair', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_body_type', 1);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_eye_color', 1);
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
						
						
		<div class="prof-info col-sm-6">
				<hr><h3><center>Adult Stats</center></h3>
											<hr>
											
			<div class=' col-xs-6'>
				Position:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_post_meta($_GET['ID'], 'MX_user_position',  $_GET['ID']);
					
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_endowment',  $_GET['ID']);
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
				
					$att = get_post_meta($_GET['ID'], 'MX_user_circumcised',  $_GET['ID']);
					
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
												
												
	</div>	
								<!--					<div class="prof-info col-sm-6">
														<h3>Style</h3>
														<hr>
															 <input type='text' name='MX_user_style' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_style', 1); ?>'>
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


																				<div class='clear'></div>
		<hr>
		<h3><center>Location</center></h3>
											<hr>
		
	
		<div class='col-xs-4'>
			
				<b>City:</b>
				<br>
				 <input type='text' name='MX_user_city' placeholder='City' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_city',  $_GET['ID']); ?>'>,  
		</div>		
		<div class='col-xs-5'>
					<b>State:</b>
				<br>
					<select name="MX_user_state"> 
              <option value="">Select a State</option> 
              <option value="AL" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'AL'){ print 'selected="selected"'; } ?>>AL - Alabama</option> 
              <option value="AK" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'AK'){ print 'selected="selected"'; } ?>>AK - Alaska</option> 
              <option value="AZ" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'AZ'){ print 'selected="selected"'; } ?>>AZ - Arizona</option> 
              <option value="AR" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'AK'){ print 'selected="selected"'; } ?>>AR - Arkansas</option> 
              <option value="CA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'CA'){ print 'selected="selected"'; } ?>>CA - California</option> 
              <option value="CO" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'CO'){ print 'selected="selected"'; } ?>>CO - Colorado</option> 
              <option value="CT" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'CT'){ print 'selected="selected"'; } ?>>CT - Connecticut</option> 
              <option value="DE" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'DE'){ print 'selected="selected"'; } ?>>DE - Delaware</option> 
              <option value="DC" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'DC'){ print 'selected="selected"'; } ?>>DC - District of Columbia</option> 
              <option value="FL" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'FL'){ print 'selected="selected"'; } ?>>FL - Florida</option> 
              <option value="GA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'GA'){ print 'selected="selected"'; } ?>>GA - Georgia</option> 
              <option value="HI" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'HI'){ print 'selected="selected"'; } ?>>HI - Hawaii</option> 
              <option value="ID" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'ID'){ print 'selected="selected"'; } ?>>ID - Idaho</option> 
              <option value="IL" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'IL'){ print 'selected="selected"'; } ?>>IL - Illinois</option> 
              <option value="IN" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'IN'){ print 'selected="selected"'; } ?>>IN - Indiana</option> 
              <option value="IA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'IA'){ print 'selected="selected"'; } ?>>IA - Iowa</option> 
              <option value="KS" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'KS'){ print 'selected="selected"'; } ?>>KS - Kansas</option> 
              <option value="KY" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'KY'){ print 'selected="selected"'; } ?>>KY - Kentucky</option> 
              <option value="LA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'LA'){ print 'selected="selected"'; } ?>>LA - Louisiana</option> 
              <option value="ME" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'ME'){ print 'selected="selected"'; } ?>>ME - Maine</option> 
              <option value="MD" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MD'){ print 'selected="selected"'; } ?>>MD - Maryland</option> 
              <option value="MA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MA'){ print 'selected="selected"'; } ?>>MA - Massachusetts</option> 
              <option value="MI" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MI'){ print 'selected="selected"'; } ?>>MI - Michigan</option> 
              <option value="MN" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MN'){ print 'selected="selected"'; } ?>>MN - Minnesota</option> 
              <option value="MS" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MS'){ print 'selected="selected"'; } ?>>MS - Mississippi</option> 
              <option value="MO" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MO'){ print 'selected="selected"'; } ?>>MO - Missouri</option> 
              <option value="MT" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'MT'){ print 'selected="selected"'; } ?>>MT - Montana</option> 
              <option value="NE" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NE'){ print 'selected="selected"'; } ?>>NE - Nebraska</option> 
              <option value="NV" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NV'){ print 'selected="selected"'; } ?>>NV - Nevada</option> 
              <option value="NH" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NH'){ print 'selected="selected"'; } ?>>NH - New Hampshire</option> 
              <option value="NJ" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NJ'){ print 'selected="selected"'; } ?>>NJ - New Jersey</option> 
              <option value="NM" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NM'){ print 'selected="selected"'; } ?>>NM - New Mexico</option> 
              <option value="NY" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NY'){ print 'selected="selected"'; } ?>>NY - New York</option> 
              <option value="NC" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'NC'){ print 'selected="selected"'; } ?>>NC - North Carolina</option> 
              <option value="ND" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'ND'){ print 'selected="selected"'; } ?>>ND - North Dakota</option> 
              <option value="OH" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'OH'){ print 'selected="selected"'; } ?>>OH - Ohio</option> 
              <option value="OK" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'OK'){ print 'selected="selected"'; } ?>>OK - Oklahoma</option> 
              <option value="OR" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'OR'){ print 'selected="selected"'; } ?>>OR - Oregon</option> 
              
              <option value="PA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'PA'){ print 'selected="selected"'; } ?>>PA - Pennsylvainia</option> 
              <option value="PR" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'PR'){ print 'selected="selected"'; } ?>>PR - Puerto Rico</option> 
              <option value="RI" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'RI'){ print 'selected="selected"'; } ?>>RI - Rhode Island</option> 
              <option value="SC" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'SC'){ print 'selected="selected"'; } ?>>SC - South Carolina</option> 
              <option value="SD" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'SD'){ print 'selected="selected"'; } ?>>SD - South Dakota</option> 
              <option value="TN" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'TN'){ print 'selected="selected"'; } ?>>TN - Tennessee</option> 
              <option value="TX" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'TX'){ print 'selected="selected"'; } ?>>TX - Texas</option> 
              <option value="VT" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'VT'){ print 'selected="selected"'; } ?>>VT - Vermont</option> 
              <option value="VI" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'VI'){ print 'selected="selected"'; } ?>>VI - Virgin Islands</option> 
              <option value="VA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'VA'){ print 'selected="selected"'; } ?>>VA - Virginia</option> 
              <option value="WA" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'WA'){ print 'selected="selected"'; } ?>>WA - Washington</option> 
              <option value="WV" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'WV'){ print 'selected="selected"'; } ?>>WV - West Virginia</option> 
              <option value="WI" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'WI'){ print 'selected="selected"'; } ?>>WI - Wisconsin</option> 
              <option value="WY" <?php if (get_post_meta($_GET['ID'], 'MX_user_state',  $_GET['ID']) == 'WY'){ print 'selected="selected"'; } ?>>WY - Wyoming</option> 
            </select>
			
		</div>
		<div class='col-xs-3'>
			
				<b>Zip:</b>
				<br>
				 <input type='text' name='MX_user_zip_code' value='<?php echo get_post_meta($_GET['ID'], 'MX_user_zip_code',  $_GET['ID']); ?>'>
				
			
			
		</div>
		<div class='clear'></div>


	
	
																				<div class='profile-social  hidden'>
																					<?php $add_social = 0; ?>
			<hr>																		<h3><center>Social Media</center></h3>
				<hr>
	<b>Facebook Link: </b> <input type="text" name="MX_user_facebook" placeholder="Facebook.com/Username" value='<?php echo get_post_meta($_GET['ID'], 'MX_user_facebook',  $_GET['ID']); ?>'>
	<br>
	<b>InstaGram Username: </b> <input type="text" name="MX_user_instagram" placeholder="InstaGram.com/Username" value='<?php echo get_post_meta($_GET['ID'], 'MX_user_instagram',  $_GET['ID']); ?>'>
	<br>
	<b>Tumblr Username: </b> <input type="text" name="MX_user_tumblr" placeholder="Username.Tumblr.com" value='<?php echo get_post_meta($_GET['ID'], 'MX_user_tumblr',  $_GET['ID']); ?>'>
	<br>
	<b>Kik Username: </b> <input type="text" name="MX_user_kik" placeholder="Username" value='<?php echo get_post_meta($_GET['ID'], 'MX_user_kik',  $_GET['ID']); ?>' >
	<br>
	<b>Adam4Adam Username: </b> <input type="text" name="MX_user_adam4adam" placeholder="Username" value='<?php echo get_post_meta($_GET['ID'], 'MX_user_adam4adam',  $_GET['ID']); ?>'>
	<br>
	

						<table border="1" class='hidden'>

																						<?php if( get_post_meta($_GET['ID'], 'MX_user_facebook_profile_link', 1) ){ ?>
																						<tr>
																							<td>Facebook</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_facebook_profile_link',  $_GET['ID']); $add_social += 1;?></td>

																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_twitter_link',  $_GET['ID'])   ){ ?>
																						<tr>
																							<td>Twitter</td>
																							<td><?php echo "<a target='_blank' href='http://twitter.com/" . get_post_meta($_GET['ID'], 'MX_user_twitter_link',  $_GET['ID']) . "'>" . get_post_meta($_GET['ID'], 'MX_user_twitter_link',  $_GET['ID']) . "</a>"; $add_social += 1; ?></td>

																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_instagram_link',  $_GET['ID'])  && $add_social < 4 ){ ?>
																						<tr>
																							<td>Instagram</td>
																							<td><?php echo "<a target='_blank' href='http://instagram.com/" . get_post_meta($_GET['ID'], 'MX_user_instagram_link',  $_GET['ID']) . "'>" . get_post_meta($_GET['ID'], 'MX_user_instagram_link',  $_GET['ID']) . "</a>"; $add_social += 1; ?></td>

																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_kik_name',  $_GET['ID'])    ){ ?>
																						<tr>
																							<td>KIK</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_kik_name',  $_GET['ID']);  $add_social += 1; ?></td>

																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_vine_username',  $_GET['ID'])     ){ ?>
																						<tr>
																							<td>Vine</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_vine_username',  $_GET['ID']);  $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_snapchat_username',  $_GET['ID'])    ){ ?>
																						<tr>
																							<td>Snapchat</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_snapchat_username',  $_GET['ID']); $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_skype_username',  $_GET['ID'])    ){ ?>
																						<tr>
																							<td>Skype</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_skype_username',  $_GET['ID']);  $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_oovoo_username',  $_GET['ID'])   ){ ?>
																						<tr>
																							<td>ooVoo</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_oovoo_username',  $_GET['ID']);  $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_adam4adam_username',  $_GET['ID'])  && $add_social < 5){ ?>
																						<tr>
																							<td>Adam4Adam</td>
																							<!--<td><?php echo get_post_meta($_GET['ID'], 'MX_user_adam4adam_username',  $_GET['ID']);  $add_social += 1; ?></td>
											-->
																							<td><?php echo "<a target='_blank' href='http://www.adam4adam.com/?p=" . get_post_meta($_GET['ID'], 'MX_user_adam4adam_username',  $_GET['ID']) . "'>" . get_post_meta($_GET['ID'], 'MX_user_adam4adam_username',  $_GET['ID']) . "</a>"; $add_social += 1; ?></td>

																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_bgc_username',  $_GET['ID'])    ){ ?>
																						<tr>
																							<td>BGC Live</td>
																							<td><?php echo "<a target='_blank' href='http://bgclive.com/" . get_post_meta($_GET['ID'], 'MX_user_bgc_username',  $_GET['ID']) . "'>" . get_post_meta($_GET['ID'], 'MX_user_bgc_username',  $_GET['ID']) . "</a>"; $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_grindr_username',  $_GET['ID'])    ){ ?>
																						<tr>
																							<td>Grindr</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_grindr_username',  $_GET['ID']);  $add_social += 1; ?></td>
																						</tr>
																						<?php }
									
										if( get_post_meta($_GET['ID'], 'MX_user_jackd_username',  $_GET['ID'])    ){ ?>	
																						<tr>
																							<td>Jack'd</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_jackd_username',  $_GET['ID']);  $add_social += 1; ?></td>
																						</tr>
																						<?php } 
									
										if( get_post_meta($_GET['ID'], 'MX_user_facetime_username',  $_GET['ID'])   ){ ?>	
																						<tr>
																							<td>Facetime</td>
																							<td><?php echo get_post_meta($_GET['ID'], 'MX_user_facetime_username',  $_GET['ID']);  $add_social += 1;?></td>
																						</tr>
																						<?php } 
										if( !$add_social ){ ?>	
																						<tr>
																							<td><center>This User has not added any Social Media</center></td>

																						</tr>
																						<?php } ?>
																					</table> 



																				</div>

																				<?php            					

							
	
						echo "</div>";			
						if(! get_post_meta($_GET['ID'], 'MX_user_age', 1))
							//echo "<div id='coming-soon'>" . $user->display_name . "'s Profile Information Coming Soon</div>";
		?>


																				<?php
							echo "<div class='clear'></div>";
						}
						
					?>


																			</div>



																			<?php 
				
	
				?>
				
				
				<div class='clear'></div><hr>
				
		<input type='submit' value='Complete - Level: 2 >>' class='btn btn-lg btn-success btn-block' style='padding: 1em; '>
	</form>

																		</div>
																		<div class='col-md-4 hidden'>
																			&nbsp;
																		</div>
																		<?php// get_sidebar('left'); ?>

																	</div>

<div class='clear'></div>
<hr>
		
<?php 


}else{
?>
	
	<h1 class='text-center'> You May only EDIT your Profile! </h1>
	
	
	<center>
	<?php echo do_shortcode('[wpmem_form login]'); ?>
	</center>
	<center><a href='/people' class='btn btn-lg btn-danger'> << Back </a>
<?php
}

get_footer('preview'); ?>