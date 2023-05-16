<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 global $post;

get_header(); ?>

<section id='welcome1' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class='col-sm-12 '>
		
		<hr class='flat-top'>
		<h3>KIK Members <button id="rsvp" class="btn rsvp pull-right">Apply HERE >></button></h3>
		
		<div class='clear'></div><hr class='flat-top'>
			<div id='rsvp' class=' container' style='display:none;'>
			
				<div class='  text-center'>
					<?php 
					
					echo do_shortcode('[gravityform id="15" title="false" description="false"]');
					?>
				</div><div class='clear'></div><br><hr>
			</div>
		
			
		
		<?php
		$switch = get_posts( array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'category_name'	=>	'models',
        )     );
		
		//print_r( $folks );
		// Start the loop.
		
		//$folks = (array)$query;
		foreach( $switch as $lead ){
			
			set_post_type( $lead->ID , 'ssi_models');

		}
			

			$count = 0;
		
		$args = array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
            'orderby'                => 'meta_value_num',
            'meta_key'               => 'vortex_system_likes',
			//'categories'	=>	array( -147 ),
        );    
		
		//$query = new WP_Query( $args );
		$swap = 0;
		
		
		$folks = get_posts( array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'post_type'	=>	'ssi_contacts',
			'post_status' => 'publish' 
        )     );
		
		//print_r( $folks );
		// Start the loop.
		$count=0;
		//$folks = (array)$query;
		foreach( $folks as $lead ){
			
			$Model_ID = $lead->ID;
			
			$today = strtotime('today');
			$today_end = strtotime('tomorrow');
			$date = '10/11/16'; #could be (almost) any string date
			$count++;

			//echo '<br>--->' . $date; 
			//echo '<br>--->' . $person->post_date;
			

				if ( strtotime( $lead->post_date ) < strtotime( $date ) ) {
					#$date occurs today
					
					//continue;
				} 
				//echo $person->post_title . "<br>";
				
				//echo get_post_meta(  $person->ID ,'vortex_system_likes' , true);
				
				?> 
				
	<div class=' col-sm-6 text-center'>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php echo get_the_title($Model_ID); ?></h4>
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
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			<div class='text-center'>
				<h5><?php echo get_post_meta($Model_ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($Model_ID, 'MX_user_state', true); ?></h5>
			</div>
			<div class='clear'></div><br>
			
			
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

			<div class='clear'></div><br>
<h4><?php 
			
					
					echo get_field( 'MX_user_position', $Model_ID ); echo " -- ";
					echo get_field( 'MX_user_endowment', $Model_ID ); echo "in";	
					
					?></h4>
			
			
			<div class='pix hidden'>				
	<br>
	<?php

	
	if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }else{
		
		?>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' style='width: 65px; height: 65px;'></div>
		</a>
	<?php
		
	}?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		

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

		
		if( get_field( 'lead_email', $lead->ID ) ){ 
		
			$old_email = get_field( 'lead_email', $lead->ID );
			
			update_post_meta(  $lead->ID , 'MX_user_email', $old_email );
		}
		
		
		
		
		if( get_field( 'MX_user_email', $lead->ID ) ){ 
			
			  $my_post = array(
			  'ID'           => $lead->ID ,

			 // 'post_title'   => $lead->post_title,
			 // 'post_content' => 'This is the updated content.',
			  );

			
			// Update the post into the database
			  wp_update_post( $my_post );
		
			if( get_user_by('email' , get_field( 'MX_user_email', $lead->ID ) ) ){ echo "HAS USER<br>"; 
			}else{ echo "MAKE NEW USER"; 
			
				$email = get_field( 'MX_user_email', $lead->ID );
				$userdata = array(
					'user_login'  =>  $lead->post_name,
					'user_email' => $email,
					
					'user_pass'   =>  NULL  // When creating an user, `user_pass` is expected.
				);

				$user_id = wp_insert_user( $userdata ) ;

				//update_field( 'user_ID' , $user_id , $lead->ID );
				//On success
				if ( ! is_wp_error( $user_id ) ) {
					//echo "User created : " . $user_id;
				}
			
			
			}
		//echo "HAS EMAIL<br>"; 
			//echo get_field( 'MX_user_email', $lead->ID );
		
		
		}
		
		
		
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				//echo $email;
				
				
				
				if(get_user_by_email($email)){
					
					//update_post_meta($lead->ID, 'ssi_model_ID', $Model_ID);
					//update_user_meta($user->ID, 'ssi_model_ID', $Model_ID);
					
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
		
		 <?php edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $lead->ID ); ?>
		</div>
		
		
		 
	</div>
				
				
				
		<?php 
		
				if( ($count % 2) == 0){ echo "<div class='clear'></div>";}
		
		} ?>
		
		
		
		
		<div class='clear'></div>
			

			
				<div class=' clear visible-xs'><br></div>	

		<div class='latest single text-center'>
				
				<div id='whatsnew' class='random' style='display: none;'>
		<?php
				query_posts(array('post_type' => 'video' ,'orderby' => 'rand', 'showposts' => 1));
				if (have_posts()) :
				while (have_posts()) : the_post(); 
		?>
				
				<div class='text-center'>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			

				<?php
					$format = get_post_format( get_the_ID() );

					if( $format == 'video' || in_category( 'music' , get_the_ID() ) || in_category( 'songs-that-touch-the-soul' , get_the_ID() ) ){
					get_template_part( 'content', 'video' );
					}else{
					the_content(); 
					}
				?>
				</div>

	<?php endwhile;
		endif; ?>
		</div>
		
		
	</div>	

		
		
		
</div>	<!-- #new -->		
								
							
		
	
			<div class='clear'></div>
			


</section>

<!-- Top ^ ################################################ SECTION -->
<div class='clear'></div><hr><br>
<center>
						<!-- JuicyAds v3.0 -->
<script async src="//adserver.juicyads.com/js/jads.js"></script>
<ins id="516827" data-width="728" data-height="102"></ins>
<script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':516827});</script>
<!--JuicyAds END-->
</center>
<div class='clear'></div><hr>
 
<section id='welcome1' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class='col-sm-12 '>
		
		<hr class='flat-top'>
		<center><h3>Up & Cumming Models</h3></center>
		
		<div class='clear'></div><hr class='flat-top'>
		
		
			
		
		<?php
		$switch = get_posts( array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'category_name'	=>	'models',
			'post_status' => 'pending'
        )     );
		
		//print_r( $folks );
		// Start the loop.
		
		//$folks = (array)$query;
		foreach( $switch as $lead ){
			
			set_post_type( $lead->ID , 'ssi_models');

		}
			

			$count = 0;
		
		$args = array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
            'orderby'                => 'meta_value_num',
            'meta_key'               => 'vortex_system_likes',
			//'categories'	=>	array( -147 ),
        );    
		
		//$query = new WP_Query( $args );
		$swap = 0;
		
		
		$folks = get_posts( array (
           'posts_per_page'         =>  -1,
            'order'                  => 'DESC',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'post_type'	=>	'ssi_models',
			'post_status' => 'pending'
        )     );
		
		//print_r( $folks );
		// Start the loop.
		
		//$folks = (array)$query;
		foreach( $folks as $lead ){
			
			$Model_ID = $lead->ID;
			
			$today = strtotime('today');
			$today_end = strtotime('tomorrow');
			$date = '10/11/16'; #could be (almost) any string date
			
			
			
			
			


			//echo '<br>--->' . $date; 
			//echo '<br>--->' . $person->post_date;
			

				if ( strtotime( $lead->post_date ) < strtotime( $date ) ) {
					#$date occurs today
					
					//continue;
				} 
				//echo $person->post_title . "<br>";
				
				//echo get_post_meta(  $person->ID ,'vortex_system_likes' , true);
				
				?> 
				
	<div class=' col-sm-4 text-center'>
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php echo get_the_title($Model_ID); ?></h4>
			<?php 
			if( get_the_post_thumbnail( $Model_ID, 'thumbnail' ) ){
				echo get_the_post_thumbnail( $Model_ID, 'thumbnail' ); 
				
			}else{
				?>
				<img src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png'>
				<?php
			}
			
			
			
			
			
				//echo get_avatar($Model_ID);
			?>
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			<div class='text-center'>
				<h5><?php echo get_post_meta($Model_ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($Model_ID, 'MX_user_state', true); ?></h5>
			</div>
			<div class='clear'></div><br>
			
			
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
	<?php if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }else{
		
		?>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='http://ssixxx.com/wp-content/uploads/2016/08/man-blank-profile.png' style='width: 65px; height: 65px;'></div>
		</a>
	<?php
		
	}?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clear'></div><br>
<h4><?php 
			
					
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
				//echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?>
			
				<?php 
			if( get_post_meta($Model_ID, 'MX_user_phone', true) ){ 
			
			//echo "Yes - ";
			//echo get_post_meta($Model_ID, 'MX_user_phone', true); 
			}
			
			?>
			
			<?php //update_post_meta($Model_ID, 'MX_user_phone', $phone);
			
			echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			<!--
			
			
			
			<?php if( get_post_meta($Model_ID, 'client_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
			
			
			
						
<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				if(get_user_by_email($email)){
					
					?>

			<a  target='_blank' href='/user-profile?ID=<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
						 
						// wp_publish_post($Model_ID);
				
				echo $user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
				<?php
					
					
				}
				else{
					
					?>

			<a  target='_blank' href='/claim?claimID=<?php echo $Model_ID; ?>' class='btn btn-default btn-block'>Claim Profile</a>
				<?php
					
					
				}
				 ?>
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='hidden btn btn-info btn-block'> Plan a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clear'></div>
		</div>
		
		
		  <?php edit_post_link( __( 'Edit', 'twentysixteen' ), '' , '' , $lead->ID ); ?>
	</div>
				
				
				
		<?php } ?>
		
		
		
		
		<div class='clear'></div>
			

			
				<div class=' clear visible-xs'><br></div>	

		<div class='latest single text-center'>
				
				<div id='whatsnew' class='random' style='display: none;'>
		<?php
				query_posts(array('post_type' => 'video' ,'orderby' => 'rand', 'showposts' => 1));
				if (have_posts()) :
				while (have_posts()) : the_post(); 
		?>
				
				<div class='text-center'>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			

				<?php
					$format = get_post_format( get_the_ID() );

					if( $format == 'video' || in_category( 'music' , get_the_ID() ) || in_category( 'songs-that-touch-the-soul' , get_the_ID() ) ){
					get_template_part( 'content', 'video' );
					}else{
					the_content(); 
					}
				?>
				</div>

	<?php endwhile;
		endif; ?>
		</div>
		
		
	</div>	

		
		
		
</div>	<!-- #new -->		
								
							
		
	
			<div class='clear'></div>
			


</section>



<div class='container text-center'>



	
	<div class='clear'></div>
	

		
		
	<div class=' hidden'>	
		<div class=' col-xs-5 col-xs-offset-1 day'>
			<div class='title'>
				
				<div class='event h3'>
				Social<br>
				</div>
				
				<div class='clear'></div>
				<div class='col-sm-6'>Fri</div>
				<div class='col-sm-6'>10pm - 3am</div>
				<div class='clear'></div><hr>
		<center>
		
		<?php 
			$my_postid = 12162;//This is page id or post id
			
																																		$content_post = get_post($my_postid);
																																		$content = $content_post->post_content;
																																		//$content = apply_filters('the_content', $content);
																																		$content = str_replace(']]>', ']]&gt;', $content);
																																		echo $content;
																								
		?>
		<?php echo get_field( 'friday', 12162 ); ?>
		
		

		</center>
				<div class='clear'></div>
			</div>
				
			
		</div>
		<div class=' col-xs-5 day'>
			<div class='title'>
				
				
				<div class=' event h3'>
				Sexual<br>
				</div>
				<div class='clear'></div>
				
				<div class='col-sm-6'>Sat</div>
				<div class='col-sm-6'>10pm - 6am</div>
				
				<div class='clear'></div><hr>
				
				<?php echo get_field( 'saturday', 12162 ); ?>
				
			</div>	
				<div class='clear'></div>
			
				
			
		</div>
		<div class=' col-xs-5 day hidden'>
			<div class=' title'>
				<div class='col-sm-6'>Sun</div>
				<div class='col-sm-6'>-</div>
				<div class='clear'></div>
			</div>
				
			<div class=' event h3'>
				Spiritual<br><br>
			</div>
			<?php echo get_field( 'sunday', 12162 ); ?>
		
		</div>
		
				 <br><br>
		
	</div>
		
		<div class='clear'></div><hr>
		
		
		

			
</div><!--  #Container  -->
	


	
<?php 
 $posts = get_posts($args);
 
 //print_r($posts);
 
 foreach($posts as $post){
	 if (in_category('142')) continue;
	 //echo get_field( 'lead_email', $post->ID );
	 //
	 
	 //echo get_field( 'lead_kik', $post->ID );
	 //echo ";" . $post->post_title . "<br>";
 }


?>


<div id="" class="text-center hidden">

		<br><br><h1 class="entry-title">Recent Galleries</h1>
			

	<div class='col-md-12'>
<?php

	


		$args = array( 'post_type' => 'ssi_photos', 'posts_per_page' => 4  );

		$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
			if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-3 well'>
			<div class='col-md-12'>

				
			<?php 
				echo "<div class='' >";
				echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        						echo '</a>';

   					 	}
					}
				echo "</div>";
				?>
				<a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clear'></div><br><br>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			<h4> <center><?php echo $lead->post_title; ?></center> </h4>
		</div>
		
		
		<?php 

		if( ($count % 4) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>

		</div>
		
		
				<div class='clear'></div>


	
</div><!-- .content-area -->
<hr>

	<?php get_template_part('content', 'companions-tagline'); ?>


<?php // get_template_part( 'content', 'welcome' ); ?>
<?php get_footer(); ?>
