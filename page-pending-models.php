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

get_header('network'); ?>

<section id='welcome1' class='welcome' style='display:block;'>

<?php 
	if( is_user_logged_in() ){
		$current_user = wp_get_current_user();
	}
?>

<div class='col-sm-12 '>
		

		
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
			'post_status' => 'pending',
           // 'orderby'                => 'meta_value_num',
           // 'meta_key'               => 'vortex_system_likes',
			'post_type'	=>	'ssi_models',
			
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
			<div class='clearfix'></div><br>
			
			
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
			
			<div class='clearfix'></div>
			
			
			<div class='pix'>				
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
	
		
<div class='clearfix'></div><br>
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
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				//echo $email;
				
				if(get_user_by_email($email)){
					
					update_post_meta($lead->ID, 'ssi_model_ID', $Model_ID);
					update_user_meta($user->ID, 'ssi_model_ID', $Model_ID);
					
					?>

			<a  target='_blank' href='/user-profile?ID=<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
						 
						 wp_publish_post($Model_ID);
				
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
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block hidden'> Plan a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clearfix'></div><hr>
		
		 <?php edit_post_link( __( 'Edit', 'twentyfourteen' ), '' , '' , $lead->ID ); ?>
		</div>
		
		
		 
	</div>
				
				
				
		<?php 
		
				if( ($count % 2) == 0){ echo "<div class='clearfix'></div>";}
		
		} ?>
		
		
		
		
		<div class='clearfix'></div>
			

			

<!-- Top ^ ################################################ SECTION -->
<div class='clearfix'></div><hr><br>
<center>
						<!-- JuicyAds v3.0 -->
<script async src="//adserver.juicyads.com/js/jads.js"></script>
<ins id="516827" data-width="728" data-height="102"></ins>
<script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':516827});</script>
<!--JuicyAds END-->
</center>
<div class='clearfix'></div><hr>
 

<hr>

	<?php //get_template_part('content', 'companions-tagline'); ?>


<?php // get_template_part( 'content', 'welcome' ); ?>
<?php get_footer('dom'); ?>
