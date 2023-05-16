<?php get_header('network'); ?>
    



    <div id='simple-people' class="">
				

					<?php
	
						$args = array(
						
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							'order' => 'DESC',
						
						);
						
						$blogusers =  new WP_User_Query( $args );
						
						$total_users = count($blogusers);
						$count = 0;
						
						$pic_users = array();
						
						$temp_users = array();
				
						if( $photo ){
							
							$args = array( 
											'item_id' =>  $user->ID, 
											
										); 
									  
									// NOTICE! Understand what this does before running. 
									$result = bp_core_fetch_avatar($args);
									
									
							foreach ($blogusers as $user) {
								if( bp_core_fetch_avatar($args) ){
										$result = bp_core_fetch_avatar($args);
										
										echo "RESULTS=" . $result;
										array_push( $pic_users , $user );
								}
							}
							$blogusers = $pic_users;
							
						}
						
					/*	
						$paged = get_query_var('paged');
						
						if( !isset($username) || $username == "" ){ 
								$number = 12;
								
								$pages_before = ($total_users / $number);
								$pages = floor($total_users / $number);
								
								if( $pages_before > $pages ){ $pages++; }
								
								$blogusers = array_slice($blogusers, ($paged * $number) , $number);
								
								$total_users_slice = count($blogusers);
								
						}
				*/
						
					?>
					
	<div id='members-search' class='home-beta mini users text-center' style='display:none;'>

				<div class='members-search'>
				
				
 <!--   START HOMEPAGE -->

	
			<h4> Member Search </h4>
				<form name='state-filter'  >
							 
							<b class='hidden1'>Filter By State:</b>
							
								<select name="MX_user_state" > 
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
							
							<b>Only Members w/</b> <input type='checkbox' name='photo' value='1'>Pics <input type='checkbox' name='no_social' value='1'>Social
							<br><br>
							<input type='text' name='user' placeholder='Enter Username' >
							
							<input type='submit' value='Filter'>
							
							

							
					</form>
					<br>
					<a href='/people?photo=0'>View All Members</a>


<div class='clear'></div><hr>

	</div>
<!--   END HOMEPAGE -->	

				
				
				
				
				
					<?php //include('members-search.php'); ?>		
				</div>	
			

					<?php
	
					$username = $_GET['user'];
					if( !isset($username) || $username == "" ) {	
						$photo = $_GET['photo'];
						$state = $_GET['state'];
						$flip = $_GET['flip'];
						
						$no_social = $_GET['no_social'];
						
					}

						
						$args = array(
						
							//'number' => -1,
							'meta_key' => 'when_last_login',
							'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
						$ordered_users =  new WP_User_Query( $args );

						
						$blogusers = $ordered_users->get_results();
						
						
						//print_r( $blogusers );
						$count = 0;
						
						$pic_users = array();
						
						$temp_users = array();
						
						
					if( $_GET['MX_user_state'] ){
	
							foreach ($blogusers as $user) {

					
								if ( get_user_meta($user->ID, 'MX_user_state' , 1) == $_GET['MX_user_state'] ){
									
										array_push( $temp_users , $user );
								}
								
							}
							$blogusers = $temp_users;
							
						}

						if( $_GET['photo'] ){
	
							foreach ($blogusers as $user) {
								
								
								$args = array( 
									'item_id' => $user->ID, 
									'object' => '', 
									'type' => '' ,
									'html' => 1,
									'no_grav' => 1
								); 
					
					
								if ( bp_core_fetch_avatar( $args ) != 'http://www.gravatar.com/avatar/21df407c7a2d3b774cb3308b64c0b5b1?s=150&r=g&d=mm' ){
									
										array_push( $pic_users , $user );
								}
								
							}
							$blogusers = $pic_users;
							
						}
						
						
			
						$total_results = count($blogusers);
						?>
					
						
						<div class='results  ' >
								
							<button id='members-search' class='btn btn-default'>Member Search</button>
						<?php
									if($username) echo " containing  <em>" . $username . "</em>&nbsp;&nbsp;&nbsp;";
									if($state) echo " in <u>" . $state . "</u>&nbsp;&nbsp;&nbsp;";
									if($photo) echo " &#x2714; Pix";
									if($no_social) echo " &#x2714; Social";
									echo "<span style='float: right;'>" . $total_results ." Results</span>";
						
						
						?>
						</div>
							<div class='clear'></div><hr>
						<?php
						
						
						foreach ($blogusers as $user) {
			
			
								$index = 0;
							
							
							//update_user_meta( $user->ID, 'wp-last-login', time() );

									if( (!isset($username) || $username == "") ||  preg_match("/" . $username . "/i", $user->display_name) ){

							
								
						?>		
						
						
	<div class="col-xs-6 col-md-3 person text-center well">
						
						<a href="/user-profile/?ID=<?php echo $user->ID; ?>">
						<div id="user-mini">
							<div class="link upper bold white">
								<?php echo substr($user->display_name, 0, 10); ?>
								
								<span class='hidden' style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: <?php echo $social; ?></span>
							</div>
	
<center>
<?php	

		if( get_user_meta($user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_age' , 1) . ' | ';
		}else{
					echo '- | ';
		}
		if( get_user_meta($user->ID, 'MX_user_height_ft' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($user->ID, 'MX_user_height_in' , 1) . '" | ' ;
		}else{
					echo '- | ' ;
		}
		if( get_user_meta($user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_weight' , 1) . "<br><br>";
		}else{
					echo '- <br><br>';
		}
			?>
</center>
<?php									

										echo '<div class="mini-left">';
										//userphoto($user->ID, '<div class="photo porn">', '</div>', array(style => '') ) ;
								?> 
								<div class=" porn">
									<center>
								<?php
								
		
										echo get_avatar($user->ID, 150);
								?> 
									
									</center>
								</div>
				<?php		
						if( get_user_meta($user->ID, 'MX_user_position' , 1) ){
							
							echo get_user_meta($user->ID, 'MX_user_position' , 1);
						}else{
							echo "-";
						}
								
								
										//mt_profile_img();
										
											if ( !function_exists( 'bp_core_fetch_avatar' ) ) { 
											require_once '/bp-core/bp-core-avatars.php'; 
										} 
										  
										// An array of arguments. All arguments are technically optional; some will, if not provided, be auto-detected by bp_core_fetch_avatar(). This auto-detection is described more below, when discussing specific arguments. 
										$args = array( 
											'item_id' =>  $user->ID, 
											'object' => '', 
											'type' => '' 
										); 
									  
									// NOTICE! Understand what this does before running. 
									$result = bp_core_fetch_avatar($args);

											//print_r($result);
										echo "</div>";
										
										$closet = 0;
				
								
	
					echo "<div class='clear full-login upper bold text-left'>";
								$last_login = (int) get_user_meta( $user->ID, 'when_last_login' , true );
											if ( $last_login ) {
												$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
												$value  = date_i18n( $format, $last_login );
												echo "<br>Last Here <span style='float: right;'>" . $value . "</span>";
											}else{
												echo "<br>Joined <span style='float: right;'>" . mysql2date($format, $user->user_registered ) . "</span>";
											}
					echo "</div>";
					echo "<div class='clear full upper bold white'>";
										
								$closet = 0;
								if ( get_user_meta($user->ID, 'MX_user_city', 1 ) && get_user_meta($user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
	
					echo "<br></div>";
						
									echo '</div></a></div>';
									$count++;
									if( ($count % 2) == 0 ){ 
						?>					
				
								<div class='visible-xs'></div>

						<?php		}else if( ($count % 4) == 0 ){ 
						?>					
				
								<div class='clear'></div>

						<?php		}else{
							
							?> 
							
							<?php
									}
								}// END STATE IF

						} //End For-each 

					?>

				<div class=' clear'></div>
					<div class="paginator   h3">
                    
                        <?php 
						
						//echo "PAGES->" . $pages;
						if (function_exists("pagination")) {
								
                               pagination($pages);
                            
                            } ?>

                    </div>

        

        <div class="clear"></div>
        
    </div>


        <div class="clear"></div>
     
	
   
	
<?php get_footer(); ?>