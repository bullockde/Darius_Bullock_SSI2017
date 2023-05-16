<?php

 
 if( !isset($_COOKIE["site_entered"]) ){ setcookie( 'site_entered' , 'Yes' , time() + (86400 * 30), "/"); }

get_header('yungdaddy'); ?> 



<?php get_template_part( 'content', 'welcome' ); ?>



<div class="clear"></div>
<?php

			
		//echo "<hr>";
			if( get_field( "display_title", $post->ID ) == "No" ){   }else{ 
			
				//echo "<h4><center>- New Updates -</center></h4>";
				//the_title( '<h1 class="entry-title text-center">', '</h1>' ); 

			}
			
		//echo "<hr>";
			
	//get_template_part( 'content', 'projects-grid' );
	
	 ?>

<div id="" class="">


<div class="clear"></div>
		<section id='subscribe' class='tagline hidden1  '>
			
				<div class="container text-center">	
				
				<div class=' col-md-4 text-center'>
						
						<div class='clear '></div>
						<div class='hidden1 -xs'></div>
				
				  
		<center> <br>

				<!-- JuicyAds v3.0 -->
				<script async src="//adserver.juicyads.com/js/jads.js"></script>
				<ins id="498543" data-width="300" data-height="262"></ins>
				<script>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':498543});</script>
				<!--JuicyAds END-->
		</center>


				
				</div>
				
				<div class=' col-md-8'>
				<div class='visible-xs'></div>
					<h2 style='color: #EC2828; text-decoration: underline;'>Explore our Sexy Companions!!</h2>

						<h3>Massage & Manscaping Services</h3>

						<h3>Dinner & Movie Dates</h3>
						
						<h3>Live-In Home Keepers</h3>
						
						<h3>Upscale Companions</h3>

	<br>
				<div class="btn-group ">
					<a href="/companions" class="btn btn-lg btn-default">View Ads</a>
					<a target='_blank' href="/apply" class="btn btn-lg btn-danger">Post Ad</a>
					
				</div>
				
				</div>	
				
			<div class="clear"></div><br>

				</div><!-- // container -->
			
</section><!-- // tagline -->

<div class="clear"></div><hr>

<div class="text-center">
			<h2>Online Members</h2>
			<?php if ( bp_has_members( 'type=online&max=12' ) ) : ?>         
								<?php while ( bp_members() ) : bp_the_member(); ?>                      
									<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>"><?php bp_member_avatar('type=full&width=125&height=125') ?>

				
									</a>
									
								<?php endwhile; ?>
			<?php endif; ?>

			<div class="clear"></div><br>

				<a href='/members'>View All >></a>

		
		</div>

<div class="clear"></div><hr>


</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>