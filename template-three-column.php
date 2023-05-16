<?php
/*
Template Name: Three Column Layout
*/


get_header();

?>



<!-- ------------------------------------   -->


			<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
<div class='clear'></div><hr>




	<div class='zone-container '>
		<div class='col-sm-3 text-center'>
			
			<!-- Left Column-->

			<div class='well '>
			<b>Meet the Owner</b><br><br>

			<a href='/ssixxx/about-ssixxx/'> <img src='http://shamanshawn.com/wp-content/uploads/ssi-aint-hittin.jpg' class='img-responsive aligncenter'> </a><br>

				Name: Shaman Shawn<br>
				Gender: Male<br>
				Age: 27<br>
				Zodiac: Taurus<br>
				Sex Preference: Bi<br><br>

				<a href='/blog' class='btn btn-success'>Learn More</a>
				
			</div>
		
		
			<div class=' col-sm-12 text-center well'>
				<b>KEEP IN CONTACT</b><br><br>


				A4A - IamYungDADDY<br>
				KIK – 6_three<br>
				IG - @IamYungDADDY<br><br>
				<p style="text-align: center;">
<a href='/contact/' class='btn btn-success'>Email Me Now!</a>
</p>

				
				

			</div>
		</div>
		<div class='col-sm-5 text-center '>
			
			<!---- Right Column -- -->

			<?php
				// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_content();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;

			?>


			<div class='col-sm-12 text-center well <?php if( !is_page( array('ssixxx','videos','photos') ) ){ echo "hidden" ; } ?>'>

			<b>Recently Added</b><hr>

	<?php
		wp_reset_postdata();


		if( is_page('videos') ){
			$args = array(  'post_type' => 'ssi_gallery' , 'posts_per_page' => -1 , 'category' => '152' , 'order' => 'asc' );
		}else if( is_page('photos') ){
			$args = array(  'post_type' => 'ssi_gallery' , 'posts_per_page' => -1 , 'category' => '153' );
		}else{
			$args = array(  'post_type' => 'ssi_gallery' , 'posts_per_page' => -1 );
		}


		$count = 0;
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		
		$count++;
			
		echo '<form name="songs" style="text-align: left;" action="/music/" method="get">';
	?>
	
		<div class='col-xs-12 text-center'>
					<?php  echo $post->post_title; 

						if( !is_user_logged_in() ){						
					?>

					
					<?php
						}
					?>
				</div>
		<div class='song col-md-12'>
			
			<a href='<?php

				if( is_page('photos') && ($count <= 3) ){
					 echo '/ssi_gallery/' . $post->post_name; 
				}else if( is_page('videos') ){
					 echo '/ssi_gallery/' . $post->post_name; 
				}else{

					echo '/ssi_gallery/' . $post->post_name; 
					//echo 'https://ssi.memberful.com/checkout?plan=13503';
				}
	?>'>
				<div class='col-xs-12 text-center'>
			
		<?php
		
		 //the post does not have featured image, use a default image
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'medium' );

		?>
			<img src='<?php echo esc_attr( $thumbnail_src[0] ) ; ?>' alt='Youtube Image'>
		<?php
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	

?>
			
			

				</div>
				<div class='col-md-12'>

			<div class='clear'></div>

				<a class="btn-success btn-block btn-lg text-center <?php if( !is_page('photos') ){ echo 'hidden'; } ?>" href="<?php if( is_page('photos') && ($count <= 3) ){
					 echo '/ssi_gallery/' . $post->post_name; 
				}else{
					echo '/ssi_gallery/' . $post->post_name;
					//echo 'https://ssi.memberful.com/checkout?plan=13503';
				}?>">View Gallery</a>
				</div>
				
			</a>
			<div class='clear'></div><hr>
		</div>
	<?php 
		
		
		endforeach; 
		wp_reset_postdata();

		echo '<div class="clear"></div>';
	?>
<br>
 <h4><center>Subscribe & Unlock More HOT Stuff!!</center></h4> <hr>

<div class='col-md-6'>
<a href='/ssixxx-access/' class='btn btn-danger btn-lg btn-block'> Join Now (FREE)</a>
</div>
<div class='col-md-6'>
<a class="btn-danger btn btn-lg btn-block" href="/ssixxx-login/">Member Login</a>
</div>
<div class='col-md-12'>
<a class="btn-success btn btn-lg btn-block hidden" href="https://ssi.memberful.com/checkout?plan=13503">Get VIP Access</a>
</div>
<div class='clear'></div>
<hr />

		<span style="color: #999999; font-size: 8px;"><center>*($1) Subscription renews at $10/month</center></span>

			</div><!-- GALLERY Well -->	

			<?php
	

		echo '<div class="clear"></div>';
	?>

		</div>
		<div class='col-sm-4 text-center'>

		
			<div class='col-sm-12 text-center pad0'>

						
		<!--JuicyAds v2.0-->
<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=300 height=262 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=498540></iframe>
<!--JuicyAds END-->
<br>
			</div>

			<div class=' col-sm-12 text-center well'>
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

		

			<div class=' col-sm-12 text-center well'>

	<b>YungDADDY - Live Cam</b>

<a href='http://chaturbate.com/affiliates/in/?track=default&tour=yiMH&campaign=OcaPK&room=shamanshawn'>  <img src='http://shamanshawn.com/wp-content/uploads/Instaflixxx-live-banner-online-shawn.png' class='img-responsive aligncenter ' ></a>
<p style="text-align: center;">
<a href='http://chaturbate.com/affiliates/in/?track=default&tour=yiMH&campaign=OcaPK&room=shamanshawn' class='btn btn-success btn-lg'>Get FREE Access!</a>
</p>

			
			</div>


			<div class=' col-sm-12 text-center well hidden'>

	<b>Shaman Shawn - In The Flesh</b><hr>

<img src='http://shamanshawn.com/wp-content/uploads/2015/07/InTheFlesh-border.png' class='img-responsive aligncenter ' width='250'><br>

<p style="text-align: center;">
<a href='/in-the-flesh/' class='btn btn-success btn-lg'>Get FREE Access!</a><br>
</p>

			
			</div>

			<div class=' col-sm-12 text-center well hidden'>

				<b>Shaman Shawn's Closet</b><hr>

<img src='/wp-content/uploads/closet.jpg' class='img-responsive aligncenter ' width='250'>
<hr />
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/vault/">Get FREE Access!</a></p>
			
			</div>
			<!-- #################################### -->

		</div><!-- Right Column -->
		
	</div><!-- #Zone Container -->
	

<div class='clear'></div><hr>

<!-- --------------------------------  -->



<?php

get_footer('ssixxx'); ?>