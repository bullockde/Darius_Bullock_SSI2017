<?php
/**
Template Name: Anonymous Template
 
 
 */

 
  if( wp_is_mobile() ){  $height = '375px'; }else{  $height = '475px';}
 
 //if( !isset($_COOKIE["site_entered"]) ){ setcookie( 'site_entered' , 'Yes' , time() + (86400 * 30), "/"); }
 
 
	
 
get_header('login'); ?>


		
			<?php 
			
			$events = get_posts(array(  'post_type' => 'ssi_events' , 'posts_per_page' => -1 )); 
			$models = get_posts(array(  'post_type' => 'ssi_requests' , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'pending' ));
			$projects = get_posts(array(  'post_type' => 'ssi_projects' , 'posts_per_page' => -1 ));
			$photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
			$videos = get_posts(array( 'post_type' => 'ssi_videos' , 'posts_per_page' => -1 ));
			$thots = get_posts(array(  'post_type' => array( 'ssi_breed') , 'posts_per_page' => -1 , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => array('publish'/*, 'pending'*/)  ));
			
			
			$args = array(
						
							//'number' => -1,
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
						$ordered_users =  new WP_User_Query( $args );

						
						$blogusers = $ordered_users->get_results();
						
						$total_results = count($blogusers);
		?>
<div id="" class=" text-center">
 
		<center>
		
		<div class=' col-sm-6 col-sm-offset-3'>

				
			
			<?php the_post_thumbnail(  'medium' , get_the_ID()); ?><hr />
					<div class='clearfix'></div>
					
					 
					
					<h4>[ Patience | Passion | Pleasure ]</h4><br>
				
					
					Looking for THOT boys that are down to be TRAINED on film.. for our PRIVATE THOT Collection..<br><br>

					<b>Unleash your inner THOT </b><br>
					We have everyThing you need..<br>

					Masks.. Dildos.. Puppy tails.. paddles.. rope.. wax.. butt plugs.. prostate toys.. pantys.. etc<br>


					<hr>
					Learn the Art of Roleplay.. Our Way..
					
					<h4>( No FACE | No TRACE )</h4>

<!--
					I am Young &amp; I am Dominant.<br>
					What I say goes.<br>
<br>
					Looking for Sexy Young THOTS who like to get used no strings. The more sub you are the better. Can be mild or wild. Hit me up if you've got a scene you think would be hot.<br><br>

					Very hot scenes: using a bttm with other tops, Dom/sub with other races, anonymous play, rough oral and fucking. Hottest scene is turning a cum dump out for anonymous loads.

					<hr />

					Unleash Your INNER ThoT!
					
					-->
					<div class='clearfix'></div><br>
				
				<a href="/thot-request" class="btn rsvp btn-success btn-lg pulse"><br>Request a Session &rarr;<br><br></a>
		</div>
			<div class='clearfix'></div>
		<button id="models" class="btn rsvp hidden">> Get in Line <</button>
		</center>
		<br>
			<div id='models' class=' ' style='display:none;'>
				<hr>
				<div class=' col-md-12 text-center'>
					<?php 
					
					echo do_shortcode('[gravityform id="14" title="false" description="false"]');
					?>
				</div><div class='clearfix'></div>
			</div>
		
		
		<div class='well col-sm-6 col-sm-offset-3'>
		
		<div class=' video'>
				
					<?php
			
					echo get_the_content( get_the_ID() );
					
				$args = array( 'numberposts' => 1, 'post_type' => 'ssi_requests' , 'orderby' => 'modified', 'order' => 'asc' , 'post_status' => 'publish' );
				//$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					
					//print_r($recent);
					?> 
					<h4>- OUR #<?php echo count($models); ?> THOT -</h4>
					
					<?php echo get_the_post_thumbnail( $recent["ID"] , 'medium' ); ?> 
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
				<div class='row hidden'>
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
				
					</div>
					
					<div class='clearfix'></div><hr>
					
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
							<br><br><div class='clearfix'></div><hr>
					</div>
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
		
	<div class='clearfix'></div>
		
		
		
	<br>
		
		<center> 
			<!-- JuicyAds v3.0 -->
			<script async src="//adserver.juicyads.com/js/jads.js"></script>
			<ins id="498543" data-width="300" data-height="262"></ins>
			<script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':498543});</script>
			<!--JuicyAds END-->	
		</center> 
		
		
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
		
		
		<div class='clearfix'></div>
		
			<div class="stats hidden1"> 
						
			<hr><h4>We Currently Have: </h4><hr>
	
				
			
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
			 
			  <figcaption><h3><?php echo (count($thots)); ?></h3> <h4>THOTs</h4></figcaption>
			</figure>
			
								</div>	
							

								
								<div class="col-xs-4 text-center well">
							
			<figure>
			 
			  <figcaption><h3><?php echo count($photos); ?></h3> <h4>PHOTOs</h4></figcaption>
			</figure>
								
								</div>
									<div class="col-xs-4 text-center well">
					
			<figure>
			 
			  <figcaption><h3><?php echo count($videos); ?></h3> <h4>VIDEOs</h4></figcaption>
			</figure>
							
								</div>
								
								
								<div class="col-md-2 col-xs-6 text-center well hidden">
									
			<a target='black' href='/projects'>
			<figure>

			  <figcaption><h3><?php echo count($projects); ?></h3> <h4>Projects ></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								
									<div class="col-xs-12 text-center well hidden1">
									
			
			<figure>

			  <figcaption><h3><?php echo $total_results; ?></h3><h4>Members</h4></figcaption>
			</figure>
			
								</div>
								
							</div>


			<div class='clearfix'></div>
							
	</div><!-- // container -->
	
	
		
		<div class='well'>
			
			
			<?php 
			
				if( is_user_logged_in() ){
					?>
					<h4>Already A Member?</h4><hr>
					<a href='/list' class='btn btn-success btn-lg btn-block pulse'>Enter Here &rarr;</a>
					<?php
				}else{
					?>
					
					<h4>Join Today - 100% FREE!</h4><hr>
			
					<a href='/dress-join' class='btn btn-success btn-lg btn-block hidden'>Join Now</a>
					<button id='join' class='btn btn-success btn-lg btn-block'>Join Now</button>
					<div id='join' style='display: none;'>
						<?php echo do_shortcode("[wpmem_form register]"); ?>
					</div>
					
					<br><h4>Already A Member?</h4><hr>
					<button id='login' class='btn btn-success btn-lg btn-block'>Login Here</button>
			<div id='login' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form login redirect_to='http://ssixxx.com/thots-home/']"); ?>
			</div>
					<?php
				}
			?>
			
			
		</div>
		<?php  	//get_template_part( 'content', 'member-area' ); ?>
	</div>
	
	<div class='clearfix'></div>
		
	
	
	
	
			
			<div class=' col-sm-12 text-center well hidden <?php if( is_page( array('ssixxx') ) ){ echo "hidden" ; } ?>'>
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