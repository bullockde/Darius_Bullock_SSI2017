<?php get_header(); ?>
    
<div class="clearfix mb-15"></div>

<div id='video-choice'></div>
    <div class="col-md-12">
		<?php 
		
/*		   $args = array(
                        //'role' => 'subscriber',
						'meta_key' => 'when_last_login',
						'orderby'  => 'meta_value_num',
						'order'  => 'desc',
        'number' => $no, 'offset' => $offset,
                            'meta_query' => array(
                                array(
                                    'key' => $filter,
                                    'value' => $_GET['filter'],
                                    'compare' => 'LIKE'
                                )
                            ));
							
			 $user_query = new WP_User_Query( $args );				
							
			$total_user = $user_query->total_users;  	*/
			 $index = 0;
			 
			 
			 			
			$args = array(
				'meta_key' => 'MX_user_tumblr',
				//'meta_key' => 'when_last_login',
				//'orderby'  => 'meta_value_num',
			);

			// The Query
			$user_query = new WP_User_Query( $args );


			    if ( !empty( $user_query->results ) ) {
        foreach ( $user_query->results as $user ) {
             
		
				
			 //FOREACH User
			
							if( get_user_meta($user->ID, "MX_user_tumblr" , 1)
				|| get_user_meta($user->ID, "tumblr_link"  , 1)
			
			 ){   /* echo "Has Tumblr!<br>"; */  $index++; }else{ continue; }

							//update_user_meta( $user->ID, 'wp-last-login', time() );

									if( (!isset($username) || $username == "") ||  preg_match("/" . $username . "/i", $user->display_name) ){

								
								
						?>		
						
						
	<div id='<?php echo $tumblr_name;  ?>' class="col-xs-6 col-md-3 person text-center well">
	
	
				
	
						<?php 
								if( get_user_meta($user->ID, "MX_user_tumblr" , 1)){ $tumblr_name = get_user_meta($user->ID, "MX_user_tumblr" , 1); }
								if( get_user_meta($user->ID, "tumblr_link" , 1)){ $tumblr_name = get_user_meta($user->ID, "MX_user_tumblr" , 1); }
								
								
								if( get_user_meta($user->ID, "MX_user_tumblr" , 1)
									|| get_user_meta($user->ID, "tumblr_link"  , 1)
								
								 ){  
								 
								 // echo $tumblr_name; 
								$tumblr_name =  str_replace(".","",$tumblr_name);
								 $tumblr_name =  str_replace("tumblr","",$tumblr_name);
								 $tumblr_name =  str_replace("com","",$tumblr_name);
								 
								//echo '<hr>';
								
								 // echo $tumblr_name; 
								 
								 
								 ?>
								 <a target='_blank' href="http://<?php echo $tumblr_name;  ?>.tumblr.com/" target="_blank"><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-tumblr.png' width='50' height='50'>
								 </a>
								 	<h5 id='<?php echo $tumblr_name;  ?>' class='walls'><a target='_blank' href="http://<?php echo $tumblr_name;  ?>.tumblr.com/" target="_blank"><?php echo $tumblr_name;  ?>'s Wall</a> </h5>
								 
								
								 
								 <a target='_blank' href='//<?php echo $tumblr_name;  ?>.tumblr.com' class='btn btn-block'> Visit Tumblr >> </a>
								 <hr>
								 <?php
								 }else{ continue; }
						?>
						
						<a href="/user-profile/?ID=<?php echo $user->ID; ?>">
						<div id="user-mini">
							<div class=" upper bold">
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
					echo get_user_meta($user->ID, 'MX_user_weight' , 1) . "<br>";
		}else{
					echo '- <br>';
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
				
								
	
				echo "<div class='clear full-login upper bold text-left hidden'>";
								$last_login = (int) get_user_meta( $user->ID, 'when_last_login' , true );
											if ( $last_login ) {
												$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
												$value  = date_i18n( $format, $last_login );
												echo "<br>Last Here <span style='float: right;'>" . $value . "</span>";
											}else{
												echo "<br>Joined <span style='float: right;'>" . mysql2date($format, $user->user_registered ) . "</span>";
											}
					echo "</div>";
					
					
					?>
					
					
					
					
					
					<div class='clear'></div><br>
					
					
					<div class='clear full upper bold '>
					<?php
				
										
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
			 
			 
        }
    }
else {
 echo '<h4>No agents found.</h4>';
}

//echo $index; 

		
	
			
		?>
		<div class='clear'></div>
  </div>   
    <div class='clear'></div>
<?php get_footer(); ?>
