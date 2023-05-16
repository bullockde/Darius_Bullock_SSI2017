<h4 class=' text-center'> VIP FreakZ <hr></h4>

	<?php 		
		$folks = get_posts( array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'post_type'	=>	'event_guests',
			'category_name' => 'VIP FreakZ',
			'post_status' => 'publish' 
        )     );
		
		//print_r( $folks );
		// Start the loop.
		$count=1;
		//$folks = (array)$query;
		foreach( $folks as $lead ){
			
			$Model_ID = $lead->ID;
			
			$today = strtotime('today');
			$today_end = strtotime('tomorrow');
			$date = '10/11/16'; #could be (almost) any string date
			//$count++;

			//echo '<br>--->' . $date; 
			//echo '<br>--->' . $person->post_date;
			

				if ( strtotime( $lead->post_date ) < strtotime( $date ) ) {
					#$date occurs today
					
					//continue;
				} 
				//echo $person->post_title . "<br>";
				
				//echo get_post_meta(  $person->ID ,'vortex_system_likes' , true);
				
				?> 
				
	<div class=' col-sm-12 text-center1'>
		
		
		<div class='well'>
		
		
			<div class="RSVP">
					<div class='col-md-6'>
							<?php 
							
							echo ($count) . ". ";
								$count++;
							?>
							<a target='_blank' href='/user-profile?ID=<?php echo get_field( "user_ID" , $lead->ID ); ?>'>
								<?php echo $lead->post_title;  ?>
								</a>
							<br>
							<a target='_blank' href='https://cash.me/<?php echo get_field( "MX_user_cashapp" , $lead->ID ); ?>'>
							<?php echo get_the_post_thumbnail( get_the_ID() ,  array("16px", "16px") ); ?>
										
								<small><?php echo get_field( "MX_user_cashapp" , $lead->ID ); ?></small></a>	
							<br>								
										
									<?php 
									
									$user_logged_in = 0;
									$user_is_admin = 0;
								$user = wp_get_current_user();
								$allowed_roles = array('editor', 'administrator');
						
								if ( 0 /*is_user_logged_in() && array_intersect($allowed_roles, $user->roles )*/ ) {
										$user_logged_in = 1;
										$user_is_admin = 1;
										?>
										<br>
							<form method="post" action="" class='pull-left'>
								<button name="update" type="submit" class='btn btn-danger' value="Remove Lead" />Delete</button>
								<input name="ID" type="hidden" value="<?php echo $lead->ID; ?>" />
								<input name="post_to_draft" type="hidden" value="true" />
								<input name="URI" type="hidden" value="<?php echo get_page_link(); ?>" />
							</form>

							<a target='_blank' href='/wp-admin/post.php?post=<?php echo $lead->ID ; ?>&action=edit' class='btn btn-default pull-left'>Edit</a>
							
								<?php } ?>

								
								<div class='clear'></div><br>
								

									
						</div>
						<div class='col-md-6 pull-right text-right'>
						
						
						
						
						
						<?php 
				
			
	
			if ( get_post_status( $lead->ID )  == 'pending' ) {
				
					?>
					
					<span class='alert-warning well '> Pending .. </span>
			<?php }else{

			?>
					
					<span class='alert-warning well '> Approved! </span>
			<?php
			}			?>
						
						<div class='clear'></div><br>
			<!--			<?php 
			$user = wp_get_current_user();
			$allowed_roles = array('editor', 'administrator');

							
				
			
			if( get_field( 'event_time_in' , $lead->ID )  ){ 
					echo "<span class='num text-center here'>HERE@ </span>";
						echo get_field( 'event_time_in' , $lead->ID );
				}else{
					
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					<a href='?update=1&here=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>Here Now!</a>
				<?php
					}
				
					
				}
						
				
				
					
					?>
					
					
					
	<?php if( get_field( 'event_time_out' , $lead->ID ) ){


			?>
				/ Left@
				<?php
				
				echo get_field( 'event_time_out' , $lead->ID );  
					
			}else{
					if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
					?>
					/ <a href='?update=1&left=1&ID=<?php echo $lead->ID; ?>&time=<?php echo date("g:i A"); ?>' class='btn- btn-default'>Left Out!</a>
					<?php 
					
					}	
				
			}
					
					
					
					?>-->
						</div>
						<div class='clear'></div><hr>
			</div>
		
		
		
		
		
		
		
		<div class='col-sm-12 1text-center  hidden'>
		
			
			
			<h4 class="post-title text-center"><?php echo get_the_title($Model_ID); ?><br><br><small><center>
<?php	

		if( get_post_meta($Model_ID, 'MX_user_age' , 1) ){
					echo get_post_meta($Model_ID, 'MX_user_age' , 1) . ' | ';
		}else{
					echo '- | ';
		}
		if( get_post_meta($Model_ID, 'MX_user_height' , 1) ){
					//echo get_post_meta($Model_ID, 'MX_user_height_ft' , 1) . "' " . get_post_meta($Model_ID, 'MX_user_height_in' , 1) . '" | ' ;
		
					echo get_post_meta($Model_ID, 'MX_user_height' , 1) . ' | ' ;
		}else{
					echo '- | ' ;
		}
		if( get_post_meta($Model_ID, 'MX_user_weight' , 1) ){
					echo get_post_meta($Model_ID, 'MX_user_weight' , 1) . "<br><br>";
		}else{
					echo '- <br><br>';
		}
			?>
</center></small></h4>
			<?php 
			if(get_the_post_thumbnail( $Model_ID, 'medium' )){
				echo get_the_post_thumbnail( $Model_ID, 'medium' ); 
				
			}else{
				?>
				<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png'>
				<?php
			}
			
			
			
			
			
				//echo get_avatar($Model_ID);
			?>
		</div>
		<div class='col-sm-12 1text-center hidden'>
			<div class='visible-xs'><br></div>
			
			<div class='text-center'>
				<h5><?php echo get_post_meta($Model_ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($Model_ID, 'MX_user_state', true); ?></h5>
			</div>
			<div class='clear'></div>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
				if(get_post_meta($Model_ID, 'MX_user_age', true) ){
					//update_post_meta($Model_ID, 'MX_user_age', '18' );
					echo get_post_meta($Model_ID, 'MX_user_age', true);
				}else{
					echo "-";
				}
				 ?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				
				<?php 
				
				if(get_post_meta($Model_ID, 'MX_user_height_ft', true)){
					
					echo get_post_meta($Model_ID, 'MX_user_height_ft', true);
					echo "'";
					echo get_post_meta($Model_ID, 'MX_user_height_in', true);
					echo '"';
				}else if(get_post_meta($Model_ID, 'MX_user_height', true)){
					
					echo get_post_meta($Model_ID, 'MX_user_height', true);
				
				}else{
					echo "-";
				}
				 ?>
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				
				<?php 
				
				if(get_post_meta($Model_ID, 'MX_user_weight', true)){
					//update_post_meta($Model_ID, 'MX_user_weight', '-' );
					echo get_post_meta($Model_ID, 'MX_user_weight', true);
				}else{
					echo "-";
				}
				 ?>
			</div>
			
			<div class='clear'></div>
			
			
			<div class='pix'>				
	<br>
	<?php

	
	if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0 hidden'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }else{
		
		?>
			<div class='col-xs-3 pad0 hidden'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' style='width: 65px; height: 65px;'></div>
		</a>
	<?php
		
	}?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-4 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-4 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-4 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div><br>
<h4 class='hidden'><?php 
			
					
					echo get_field( 'MX_user_position', $Model_ID ); echo " -- ";
					echo get_field( 'MX_user_endowment', $Model_ID ); echo "in";	
					
					?></h4>
</div>


			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'client_phone', true));
			if(strlen($phone) === 10) {
				$country = 1;
				$area = substr($phone, 0, 3);
				$first = substr($phone, 3, 3);
				$last = substr($phone, 6, 4);
				
				$phone =  $country . "-" . $area . "-" . $first . "-" . $last;
				$name = get_the_title();
				
				
				array_push($names, $name );
				array_push($numbers, $phone );
				echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?><!--
			
			<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($Model_ID, 'client_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
			
			<?php 
			if( get_post_meta($Model_ID, 'MX_user_phone', true) ){ 
			
			echo "Yes - Phone";
			//echo get_post_meta($Model_ID, 'MX_user_phone', true); 
			}
			
			?>
			
						
<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				//echo $email;
				
				if(get_user_by_email($email)){
					
					update_post_meta($Model_ID, 'ssi_model_ID', $Model_ID);
					update_user_meta($user->ID, 'ssi_model_ID', $Model_ID);
					
					?>

			<a  target='_blank' href='/user-profile?ID=<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
						 
						 
				echo $user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
				<?php
					
					
				}
				else{
					
					?>

			<a  target='_blank' href='/claim?claimID=<?php 
				
				
				echo $Model_ID; ?>' class='btn btn-default btn-block '>Claim Profile</a>
				<?php
					
					
				}
				 ?>
				 
				 	<?php 
			if( get_post_meta($Model_ID, 'MX_user_website', true) ){ 
			
			//echo "Yes - ";
			
			?>
			
			<br>
			<a target='_blank' href='//<?php echo get_post_meta($Model_ID, 'MX_user_website', true); ?>' class='btn btn-success btn-block' > Visit Website >> </a>
			<?php 
			
			}
			
			?>
				 
				 
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden'> Plan a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div><hr>
		
		 <?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '' , '' , $Model_ID ); ?>
		</div>
		
		
		 
	</div>
				
				
				
		<?php 
		
				if( ($count % 2) == 0){ echo "<div class='clear'></div>";}
		
		} ?>
		
		<div class='clear'></div>
		
		<a href='/vip' class='btn btn-success btn-lg btn-block'>View All >></a>
		
		<div class='clear'></div>
			