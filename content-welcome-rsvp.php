<div class='clear'></div>
<div id='welcome' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class=''>


		<div class='clear'></div>

		
		<div class='col-sm-5  well1 mb-0'>
				
								
				<div class='clear'></div>
		<?php if( is_user_logged_in() ){ ?>
		<div class=" col-md-12 text-center well">

			
			<?php

				if( is_user_logged_in() ){
				    $current_user = wp_get_current_user();
				 /**
				     * @example Safe usage: $current_user = wp_get_current_user();
				     * if ( !($current_user instanceof WP_User) )
				     *     return;
				     */

				?>
			
			<div class=" ">

			
				<div class="col-xs-5 col-md-4 mb-0 ">
				
				
					<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>

				<?php 
				
				    echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";

						//$avatar_URL  = get_avatar_url();
						
                        echo get_avatar($current_user->ID, 150);

				?>

						<br>
						edit
					</a>
				
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
					
					<div class='clearfix'></div><br>
			
				<div class='text-center small'>
				
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
									echo 'Add Location &raquo;';
								}				
								
			?></b>
			</div>
			
			
			
			

				</div>
		

						
					<div class="btn-group btn-group-justified1 text-center col-md-8 col-xs-12">
					<div class='clearfix'></div><hr class="mb-5">
					<center>
						<a href="/edit-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-default">Edit Profile</a>
						<a  href="/user-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-info">View Profile</a>
					</center>
					<div class='clearfix mb-5'></div>
					</div>
				
				
							
	
				<div class='clearfix'></div>	


				

			</div>

			<?php } ?>
			<div class='clearfix mb-5'></div>	
			
			<div class="text-left hidden1 well green mb-0" style="padding: 10px 15px;">
				<b>Status:</b>
			
					<?php	bp_activity_latest_update($current_user->ID);  ?>

					<a href='/activity' class='status btn btn-default btn-sm pull-right'>Update</a>
					<div class='clearfix'></div>
			</div>
			
			
			
		</div>
		
		
		
		
		<?php }else{
		
		
		        get_sidebar();
		
		
		} ?>

	

				<div class='col-sm-12 text-center '>
					
					<?php  echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>"; ?>
				
				</div>
	
					<div class='clearfix'></div>
				
		
			</div>
		
		
		
		
	



			<div class='col-md-7 1col-sm-offset-2'>
			
			

			
			<div class="clear"></div>

				
				<a target='_blank' href='/members' class='btn btn-lg btn-primary btn-block hidden'> All Members >></a>
				
				<?php 
						//get_template_part('content' , 'member-quicknav');
					?>
				<div class='col-md-12 hidden1  mb-15 text-center well'>
				
					<?php if ( bp_has_members( 'type=active&max=6' ) ) : ?>         
					
						<h5>- Online Now -</h5><hr>
						
						<?php while ( bp_members() ) : bp_the_member(); ?>                      
							<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>"><?php bp_member_avatar('type=full&width=75&height=75') ?>

		
							</a>
							
						<?php endwhile; ?>
										
									
										
										
					<?php endif; ?>
				
					
					
				<div class="clearfix mb-10"></div>
				
				<hr class='hidden1 clearfix mb-15'>
			
				<?php echo do_shortcode("[wpmem_form login]"); ?>
			
					
					
					<div class='clear'></div>
					
					
			</div>
				

			</div>	<!-- #new -->
								
								
							
	
		<div class='clearfix'></div>
</div><!--  #Container  -->
							
						
</div>
<div class='clear'></div>