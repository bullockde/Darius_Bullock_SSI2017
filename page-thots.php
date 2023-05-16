<?php
/**

 
 
 */

 
  if( wp_is_mobile() ){  $height = '375px'; }else{  $height = '475px';}
 
 //if( !isset($_COOKIE["site_entered"]) ){ setcookie( 'site_entered' , 'Yes' , time() + (86400 * 30), "/"); }
 
 
	
 
get_header('members'); ?>


		
			<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_models' , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'publish' , 'category_name' => 'top-thot' ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array(/*'ssi_models', 'ssi_requests', */'ssi_breed', 'ssi_contact', 'ssi_thots') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish'/*, 'pending'*/) /*, 'category_name' => 'breed-boy'*/ ));
			
		?>
<div id="" class=" text-center">

		<center>
		
		<div class=' col-sm-6 col-sm-offset-3 well green'>

				
			
			<?php the_post_thumbnail( get_the_ID() ); ?><br /><br>
			<a href="/training" class="btn rsvp btn-success btn-lg btn-block pulse"><br>Start TRAINING &rarr;<br><br></a>
			
					<div class='clearfix'></div><hr>
					
					Big DICK - THOT MasTer<br><br>
					
					Looking for THOT boys that are down to be TRAINED on film.. for my PRIVATE Video THOT Collection..<br><br>

					<u>Unleash your inner THOT </u><br>
					i have everyThing we need..<br>

					Masks.. Dildos.. Puppy tails.. paddles.. rope.. wax.. butt plugs.. prostate toys.. pantys.. etc<br>


					<hr>
					Learn the Art of Roleplay.. My Way..

<!--
					I am Young &amp; I am Dominant.<br>
					What I say goes.<br>
<br>
					Looking for Sexy Young THOTS who like to get used no strings. The more sub you are the better. Can be mild or wild. Hit me up if you've got a scene you think would be hot.<br><br>

					Very hot scenes: using a bttm with other tops, Dom/sub with other races, anonymous play, rough oral and fucking. Hottest scene is turning a cum dump out for anonymous loads.

					<hr />

					Unleash Your INNER ThoT!
					
					-->
					<div class='clearfix'></div>
					<hr>
					<a href="/training" class="btn rsvp btn-success btn-block btn-lg pulse"><br>Start TRAINING &rarr;<br><br></a>
		</div>
		<div class='clearfix'></div>
	
		</center>
	
		
		<div class='well col-sm-6 col-sm-offset-3'>
		
		<div class=' video'>
				
					<?php
			
					echo get_the_content( get_the_ID() );
				/*	
				$args2 = array( 'numberposts' => -1, 'post_type' => 'ssi_thots' ,

			'meta_key'          => 'MX_member_level',
    'orderby'          => 'meta_value_num',
    'order'             => 'rand' , 'post_status' => 'publish'   );
	
	
		
		
	$args = array(
        'numberposts'      => 1,
        'offset'           => 0,
        'category'         => 0,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_status'      => 'draft, publish, future, pending, private',
        'suppress_filters' => true,
    );
	
	
				$recent_posts = wp_get_recent_posts( $args );*/
				
				// $recent_posts = get_posts( array(  'post_type' => array( 'ssi_thots') , 'posts_per_page' => 1 ));
			
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					
					//print_r($recent);
					?> 
					<h4>- FeaTured THoT -</h4><br>
					
					
					<!--<h4>- My #<?php echo count($thots); ?> THOT -</h4>-->
					
					
					<div class='well yellow video'>
					<?php 
					
					if( get_field( "MX_user_email", $request->ID ) ){
						$user = get_user_by('email', get_field( "MX_user_email", $request->ID ));
				
						echo get_avatar( $user->ID );
					}else{
						
						echo get_the_post_thumbnail( $recent["ID"] , 'medium' );
					}
					
					
					 ?> 
					<br><br>
					<b><u>Name</u></b><br>
					<?php echo  $recent["post_title"]; 
					
					?>
					<br><br>
					<b><u>Location</u></b><br>
					<?php
					echo get_post_meta( $recent["ID"] , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta($recent["ID"] , 'MX_user_state' , 1);
					?>
					<br><br>
					<b><u>His Fantasy</u></b><br><br>
				
					<?php
					echo $recent["post_content"];
					
					
					?>
					<br><br>
					<b><u>Status</u></b><br>
					<?php				
					//echo --$count;
					echo "Pending";
					//echo $lead->post_title;
					//echo "";
				?>
				
					</div>
					<?php
					
				}
				wp_reset_query();
			?>
			</div>

		
			<?php
				$total_models = count($models);
				
				$count = count($models);
				
				foreach( $models as $lead ){
					
					if(  $count < 1 || $total_models  == $count ){ $count--; continue; }
					//if( $count < 1 ){ continue; }
					
				?>
				<div class='text-left col-xs-6'>
				<?php				
					echo $count--;
					echo " - ";
					echo $lead->post_title;
					//echo "<hr>";
				?>
				</div>
				<div class='text-left col-xs-6'>
				

					<?php
					echo get_post_meta( $lead->ID , 'MX_user_city' ,1 );
					?>, 
					<?php
					echo get_post_meta($lead->ID , 'MX_user_state' , 1);
					?>
			
				</div><div class='clearfix'></div><hr>
		

		<div class='hidden'>
				<div class='circle'>
					<?php echo get_the_post_thumbnail( $lead->ID , 'thumbnail' ); ?>
				</div>
					<?php				
					//echo --$count;
					echo "<b><u>Status</u></b><br>Pending";
					//echo $lead->post_title;
					//echo "";
				?>
				<br><div class='clearfix'></div><hr>
		</div>
					
					
					
				<?php				
					//echo --$count;
					//echo " - ";
					//echo $lead->post_title;
					//echo "<hr>";
				?>

				<?php
				}
			?>
		

		
		<div class="stats">
			<div class='clearfix mb-5'></div>			
			<h4>We Currently Have: </h4><br>
			

								<div class="row">
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/events'>
			<figure>
			
			  <figcaption><h3><?php echo count($events); ?></h3> <h4>Events ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								<div class=" col-xs-4 text-center well">
							
			<figure>
				<a href="/list">
					<figcaption><h3><?php echo count($thots); ?></h3> <h4>THOTs</h4></figcaption>
				</a>
			</figure>
			
								</div>	
							

								
								<div class="col-xs-4 text-center well">
							
			<figure>
				<a href="/photos">
			  <figcaption><h3><?php echo count($photos); ?></h3> <h4>PHOTOs</h4></figcaption>
			  </a>
			</figure>
								
								</div>
									<div class="col-xs-4 text-center well">
					
			<figure>
			<a href="/videos">
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>VIDEOs</h4></figcaption>
			</a>
			</figure>
							
								</div>
								
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/projects'>
			<figure>

			  <figcaption><h3><?php echo count($projects); ?></h3> <h4>Projects ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								
									<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/members'>
			<figure>

			  <figcaption><h3><?php echo $total_results; ?></h3><h4>Members ></h4></figcaption>
			</figure>
			</a>
								</div>
								
								
								
							</div>

						

			<div class='clearfix'></div>
					
				
			
				
						
								
	</div><!-- // container -->
		

		
		<?php get_template_part( 'ad', '300-250-1' ); ?>
		<div class='clearfix'></div>
		
		<hr><h4> Member Benefits </h4><hr>
		
		
		<p>- View All Member Profiles</p>
		<p>- Get Full Access to our Pix/Vids</p>
		<p>- Get Access to our Private Events</p>
		<p>- View Exclusive Model Content</p>
		<p>- Get Notified when we Make an Update!</p>
		<!--<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>-->
		<br>
		
		<div class='clearfix'></div>
		
		<div class='well'>
		
		<?php if( !is_user_logged_in() ){ ?>
			<h4>Join Today - 100% FREE!</h4><hr>
			
			<a href='/dress-join' class='btn btn-success btn-lg btn-block hidden'>Join Now</a>
			<button id='join' class='btn btn-success btn-lg btn-block'>Join Now</button>
			<div id='join' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form register]"); ?>
			</div>
		<?php } ?>
		<div class='clearfix mb-10'></div>
			<h4>Already A Member?</h4><hr>
			
			<?php 
			
				if( is_user_logged_in() ){
					?>
					<a href='/list' class='btn btn-success btn-lg btn-block'>Enter Here >></a>
					<?php
				}else{
					?>
					<button id='login' class='btn btn-success btn-lg btn-block'>Login Here</button>
			<div id='login' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form login redirect_to='/thots']"); ?>
			</div>
					<?php
				}
			?>
			
			
		</div>
		
		<?php the_content(); ?>
		
	</div>
	<div class='clearfix'></div>
		
	<?php  //	get_template_part( 'content', 'welcome' ); ?>
	
	
	
			
			<div class=' col-sm-12 text-center well hidden <?php if( is_page( array('ssixxx') ) ){ echo "hidden1" ; } ?>'>
				<b>SEXUAL INTERESTS :</b><br><br>

				Daddy/Son Roleplay<br>
				Master/Slave<br>
				Daddys little Boy/Girl<br>
				Tapout Game<br>
				Bondage (BDSM)<br>
				Cum Control<br>
				Male Chastity<br><br>
				I am big on ROLEPLAY &amp; FETISH sex

			</div>

		

		
</div><!-- .content-area -->


<?php 
	get_footer('preview');  
?>