<div class='clear'></div>
<div id='primary1' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class=''>
		<!--<h3><b><?php if( is_user_logged_in() ){  echo 'Welcome Back!'; }else{ echo "Welcome to Shaman Shawn Inc.";}  ?></b></h3>
-->

		<div class='clear mb-0'></div>
		<?php if( 1 /*is_user_logged_in()*/ ){ ?>
		
		
		<div class='clear mb-0'></div>
		
		
		
		<div class='col-md-8 order-1'>
			<div class=" row ">
		

		
			
				<?php 
						//get_template_part('content' , 'member-quicknav');
					?>
					<div class='1col-md-4 hidden1  mb-0 text-center well yellow1'>
					    
					    
					    
					    <div class='clear mb-5'></div>
						<div class='col-md-3 hidden1  mb-0 text-center 1well yellow1'>
						    	<div class='clearfix mb-10 hidden-xs'><br></div><h5>- Online Now -</h5><br>
						    </div>
				<div class='col-md-9 hidden1  mb-0 text-center 1well yellow1'>
				<div class="row">
					<?php if ( bp_has_members( 'type=active&max=6' ) ) : ?>         
					
					
						
						<?php while ( bp_members() ) : bp_the_member(); ?>                      
							<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>"><?php bp_member_avatar('type=full&width=95&height=95') ?>

		
							</a>
							
						<?php endwhile; ?>
										
									
										
										
					<?php endif; ?>
					</div>
					<div class="clearfix mb-5"></div>
			    	<hr class='1hidden-xs clearfix mb-5'>
		
					
					
				<div class="clearfix"></div>
				
				
			
					<?php //echo do_shortcode("[wpmem_form login]"); 
					?>
			
					
					
					<div class='clear'></div>
					
					
			</div>
			<div class='clear'></div>		



            				<div id='header-login' class='1hidden-xs text-center 1well 1green 1bg-blue 1pb-5 mb-0 <?php if( !is_user_logged_in() && !is_front_page() ){ echo 'mb-0'; } ?>' style='display: block;'>
	
	
	
		
		<?php
			if( /*!is_user_logged_in()*/ 0 ){
		
			$redirect_to = '/members';
		?>
		<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
			<span class="hidden-xs">&nbsp;&nbsp; Member Login: </span>
			

			<input id="user_login" placeholder="Username" type="text" size="10" value="" name="log">
			<input id="user_pass" placeholder="Password" type="password" size="10" value="" name="pwd">
			<input id="rememberme" class="hidden-xs" type="checkbox" value="forever" name="rememberme">
			<input id="wp-submit" class="btn btn-primary" type="submit" value="Login" name="wp-submit">

			<input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
		</form>
		 <?php
		
		
			}else{
				
				?>
				
				<h4>
				    	<div class="clearfix mb-5"></div>
                                        		<a href="/activity" class="btn btn-default btn-sm 1btn-block input">Activity</a> <a href="/members" class="btn btn-default btn-sm 1btn-block input">Members</a> <a href="/gallery" class="btn btn-default btn-sm 1btn-block input">Gallery</a>  <a href="/freak-now" class="btn btn-default btn-sm 1btn-block input">Freak Now</a>
				        <div class="clearfix mb-5"></div>
				</h4>
				<?php
				
			}
		?>

	</div>
				
				
				</div>
	
					
		
		
		        </div>
			</div>	<!-- #new -->
								
		
		
		
		
		<?php } ?>



			
		<div class='col-md-4   mb-0 order-2'>
					<div class=" row ">		
							
							
							
							
								
				
		<?php if( (wp_is_mobile() && is_user_logged_in()) || (!wp_is_mobile()) ){ ?>
		<div class=" col-md-12 text-center well green mb-0">

			
			<?php

				if(  1 /*is_user_logged_in()*/){
				    $current_user = wp_get_current_user();
				 /**
				     * @example Safe usage: $current_user = wp_get_current_user();
				     * if ( !($current_user instanceof WP_User) )
				     *     return;
				     */

				?>
			
			<div class=" ">
			
			
			
			
			
			
			
				<h4> <?php if( !is_user_logged_in() ){ echo "Create a FREE Profile!"; }else{ echo '<h4><b>Welcome Back, ' . strtoupper($current_user->display_name) . '!</b></h4>'; } ?></h4> 
					<hr>
					
			
				<div class="col-xs-5 col-md-2 mb-0 ">
				

								<?php 
				
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
					if ( is_user_logged_in() ) {
				

						?>
							<a target='_blank' href='/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/' class=' '>

				<?php 
				
				 //   echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";

						//$avatar_URL  = get_avatar_url();
						
                        echo get_avatar($current_user->ID, 50);

				?>

						<br>
						edit
					</a>
						
						
						<?php 
					}else{
						?>
						<a target='_blank' href='/join' class=' '>
						<?php echo get_avatar($current_user->ID, 50); ?>
					</a>
						<?php 
						
					}
		
				?>
				
				
						<!--<br>-->
						<!--edit-->

				</div>
				<div class="col-xs-7 col-md-6 text-center report">
				
				
					<center>
					<?php	

							if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_age' , 1) . ' | ';
							}else{
										echo 'AGE | ';
							}
							if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '" | ' ;
							}else{
										echo 'HT | ' ;
							}
							if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
										echo get_user_meta($current_user->ID, 'MX_user_weight' , 1) . "<br>";
							}else{
										echo 'WT <br>';
							}
								?>
					</center>
					
					<div class='clearfix mb-15'></div>
			
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
									echo 'Your Location';
								}				
								
			?></b>
			</div>
			
			
			          					<div class='clearfix mb-10'></div><hr class="mb-5">

				
			

				</div>
                <div class=" col-md-4 text-center ">
                   <div class='clear mb-0'></div>
                      <div class="1btn-group 1btn-group-justified text-center 1col-md-8 1col-xs-12">
    					<center>
    					    <?php if( is_user_logged_in()){ ?>
    					    <a href="/edit-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-default btn-sm btn-block">Edit Profile</a>
						<a  href="/user-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-info white btn-sm btn-block">View Profile</a>
						
						<?php }else{ ?>
    						<a href="/join" class="btn btn-default hidden">Edit Profile</a>
    						<a  href="/join" class="btn white btn-info hidden">View Profile</a>
    						<?php }?>
    					</center>
    					<div class='clearfix mb-0'></div>
					</div>
				    <div class='clear mb-0'></div>
                </div>
				<div class='clearfix'></div>	

					
					<?php //echo do_shortcode("[wpmem_form login]");
					
					?>

			</div>

			<?php } ?>
			
		
			
			<?php if( !is_user_logged_in() ){ ?>
			    <hr class='clearfix mb-5 visible-xs'>
				<a target='_blank' href='/join' class='btn btn-default btn-lg btn-block white1 hidden1'> Create a FREE Profile &raquo; </a>
			<?php }else{ ?>
			 <hr class='clearfix mb-5 visible-xs'>
			<div class="text-left hidden1 well 1green mb-0" style="padding: 10px 15px;">
				<b>Status:</b>
				
				<?php 
		
		
			//get_template_part("content","header-login");
		?>
			
					<?php	bp_activity_latest_update($current_user->ID);  ?>

					<a href='/activity' class='status btn btn-default btn-sm pull-right'>Update</a>
					<div class='clearfix'></div>
			</div>
			<?php } ?>
			
			
		</div>
		
		
		
		
		<?php } ?>

	
					<div class='clearfix'></div>
				
		        </div>
			</div>
								

		<div class='clearfix'></div>
</div><!--  #Container  -->
							
						
</div>
<div class='clearfix'></div>