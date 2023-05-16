<?php
/**

 
 */

 
  if( wp_is_mobile() ){  $height = '375px'; }else{  $height = '475px';}
 
 //if( !isset($_COOKIE["site_entered"]) ){ setcookie( 'site_entered' , 'Yes' , time() + (86400 * 30), "/"); }
 
get_header('network'); ?>


<div id="" class=" text-center">

		<center>
		<?php 
			$content = $post->post_content;
					
					$content = apply_filters('the_content', $content);
		
		//echo $content; ?>
				
		<a href="/thot-request" class="btn btn-success btn-lg rsvp button hidden1" target="_blank"> Request a THoT Session &rarr;</a>
		
		
		
		<a href="/about" class="btn btn-default rsvp button hidden" target="_blank"><< About Molly</a>
		<a href="/requests" class="btn btn-default rsvp button hidden" target="_blank">Request List >></a>
		<button id="models" class="btn rsvp hidden">> Become A Model <</button>
		</center>
		<br>
		<a href="/book" class="btn btn-default btn-lg  btn-success rsvp button hidden" target="_blank">> Sign Me Up <</a>
		
			<div id='models' class=' container' style='display:none;'>
				<hr>
				<div class='  text-center'>
					<?php 
					
					echo do_shortcode('[gravityform id="11" title="false" description="false"]');
					?>
				</div><div class='clear'></div><br><hr>
			</div>
		
		
		<div class='well col-sm-6 col-sm-offset-3'>
		
		<div class=' video'>
				
			<?php  //get_template_part( 'ad ', '300-250-1' ); ?>
		
		<!--<br><hr>
 <img src='http://amazonmolly.com/wp-content/uploads/2016/12/toon_dom.png'>

 <hr />	
<center>
Note: All FREE Training sessions are Recorded for Quality Assurance Purposes. ;-)<br><br>

MOLLY will Provide you a MASK!<br><br>
<img src='http://amazonmolly.com/wp-content/uploads/2017/03/2017-03-07-05.58.12-300x225.jpg'><br>
<small>(Private Sessions By Donation Only!)</small>
 <hr />
 <b>Step 1. (SUB APPLICATION) </b> <br> Tell MOLLY who you are and why you need training. 
		
			http://amazonmolly.com/wp-content/uploads/2015/10/curious-special.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/molly-Night-Classes.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2015-01-15-05.22.34.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2013-10-31-15.23.04.png
			http://amazonmolly.com/wp-content/uploads/2015/10/2015-01-10-14.57.16.png
			http://amazonmolly.com/wp-content/uploads/2015/10/2013-08-06-21.54.29.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2015-01-09-01.35.30.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2013-10-31-15.23.05-1.png
			http://amazonmolly.com/wp-content/uploads/2015/10/2013-08-06-21.54.26.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2013-08-06-21.54.22.jpg
			http://amazonmolly.com/wp-content/uploads/2015/10/2014-10-07-14.46.58.jpg
			http://amazonmolly.com/wp-content/uploads/2016/07/Screenshot_2016-07-27-22-10-07-e1469672900956.png
			http://amazonmolly.com/wp-content/uploads/2016/07/Molly-Caribbean-Boy_00_05_53_00_23.jpg
			http://amazonmolly.com/wp-content/uploads/2017/03/2017-03-07-05.58.12-300x225.jpg
			http://amazonmolly.com/wp-content/uploads/2016/07/Capture_20140912_1_00_00_20_00_1.jpg
			-->
			
			<?php
					the_post_thumbnail( get_the_ID() );
				//	the_content();
			
				/*$args = array( 'numberposts' => 1, 'post_type' => 'video' );
				$recent_posts = wp_get_recent_posts( $args );
				
				//print_r($recent_posts);
				
				foreach( $recent_posts as $recent ){
					//echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					//print_r($recent);
					?> 
					<a href='/videos'> <div style='max-height: <?php echo $height; ?>;'>
					<?php
					//echo get_the_post_thumbnail( $recent["ID"] );
					echo $recent["post_content"];
					?> </div>
					</a>
					
					<?php
				}*/
				wp_reset_query();
			?>
			</div>
	
	
	
		
			<div class='clear'></div>
			<b>Take The Next STEP!</b>
			<div class='clear'></div><hr>
			<a href='/spank' class='btn btn-default btn-lg btn-block btn-warning hidden1'>> SPANK ME! <</a>
			<a href='/train?ID=<?php echo $_GET["ID"]; ?>' class='btn btn-default btn-lg btn-block btn-success hidden1'>Continue TRAINING &raquo;</a>
			<hr>
			
			<b>Our Partners</b><br>
		<a href='/menu' class='btn btn-default btn-lg btn-block hidden'>Menu</a>
		<a href='/massage' class='btn btn-default btn-lg btn-block hidden'>Massage</a>
		
		<a target='_blank' href='/list' class='btn btn-block btn-warning btn-lg'>Daddy's THOTs</a>
			<a target='_blank' href='/playroom' class='btn btn-block btn-warning btn-lg'>The Philly Playroom</a>
		<a target='_blank' href='/freak-now' class='btn btn-block btn-warning btn-lg'>Freak Now &rarr;</a>
		
		
		<a href='/videos' class='btn btn-default btn-lg btn-block hidden'>Vidoes</a>
		
		<div class='clear'></div>
		<div class="stats">
						
				
					
		<div class='clear'></div>
			
			<?php get_template_part('content', 'stats'); ?>

			<div class='clear'></div>		
							
								
								
		</div>

						

			<div class='clear'></div>
					
						

			<div class='clear'></div>
					
				
			<a href="/thots" class="btn btn-default rsvp button  hidden" target="_blank">> The THOT List <</a>
				
						

		
	<!--	
		<hr><h4> Member Benefits </h4><hr>
		
		
		<p>- View All Member Profiles</p>
		<p>- Get Full Access to our Pix/Vids</p>
		<p>- Get Access to our Private Events</p>
		<p>- View Exclusive Model Content</p>
		<p>- Get Notified when we Make an Update!</p>
		<p>- View My Full Model Profile</p>
		<p>- Get Full Access to My Amateur Photos</p>
		<p>- Get Full Access to My Amatuer Vidoes</p>
		<p>- Get My Personal Cell Phone #</p>
		<p>- Ask me any Question. I'll Answer!</p>-->
		
	
		
		
		<div class='well hidden1'>
		<!--<small>Adults Only! - Must Be (18+) </small>-->
			<a href='/intake' class='btn btn-default btn-lg btn-block hidden'>Site TOUR >></a>
			<hr>
			
			
			<button id='join' class='btn btn-success btn-lg btn-block hidden'> > Follow <</button>
			<div id='join' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form register]"); ?>
			</div>
			
			<h4>Return to Members Area?</h4><hr>
			
			<?php 
			
				if( is_user_logged_in() ){
					?>
					<a href='/members' class='btn btn-success btn-lg btn-block'>Enter Here >></a>
					<?php
				}else{
					?>
					<button id='login' class='btn btn-success btn-lg btn-block'>Login Here</button>
			<div id='login' style='display: none;'>
				<?php echo do_shortcode("[wpmem_form login redirect_to='/movies-home']"); ?>
			</div>
					<?php
				}
			?>
			
			
		</div>
		
	</div>
	<div class='clear'></div>
								
	</div><!-- // container -->
		

		
				
	<?php  //	get_template_part( 'content', 'welcome' ); ?>
	
	
	
			
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