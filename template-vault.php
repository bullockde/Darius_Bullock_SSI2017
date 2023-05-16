<?php
/*
	Template Name: Vault Template
*/

					
 if( !isset($_COOKIE["entered_vault"]) ){ 
 
	setcookie( 'entered_vault' , 'Yes' , time() + (86400 * 30), "/"); 
	
	}
	
	$user = wp_get_current_user();
	
	//$role = $user->roles[0];
	//echo $role;
	
		$allowed_roles = array('contributor', 'administrator');
	
		
	 if ( !is_user_logged_in()  ){ /*echo "<br><br>HERE!";*/ 
		$funnel = "/";
		
		wp_redirect($funnel);
		exit;	
	 }
	 else if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ){ /*echo "<br><br>HERE!";*/ }else{
 
		$funnel = "/upgrade/";
		
		wp_redirect($funnel);
		exit;	
	
	}
get_header(); 


	
	//echo "<br><br>";
	//print_r($user->roles[0]);

?> 

	<div class="clear"></div>
	
	<div class='col-sm-8 text-center'>
		<h3>Welcome Back To<br>DADDY's Playroom!</h3>
	</div>
	<div class='col-sm-4 text-center'>
		<div id="menu" style='display: block;'>
			
			<a href='/photos' class='btn btn-block1'>Photos</a>|
			<a href='/videos' class='btn btn-block1'>Videos</a>|
			<a href='/vault' class='btn btn-block1'>The VAULT</a>
			<a href='/people' class='btn btn-block1 hidden'>Members</a>
		</div>
	</div>
	
	<div class="clear"></div><hr>
	
	
		<center>
		<h3>The VAULT</h3>
			<?php the_title( '- ', ' -' ); ?>
			
			
		</center>
		
		
		
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<?php bp_get_options_nav(); ?>
	</ul>
</div><!-- .item-list-tabs -->
		
		
	<div class="col-sm-4 hidden">
		<center><img src='http://yungdaddy.com/wp-content/uploads/2017/08/274388.02AA001C-300x300.jpg' width='150px' height='150px'></center>
	</div>
	<div class="col-sm-8 hidden">
	
	
	<div class="entry-content">
		<p>YungDaddy is seeking New MODELS to make some hot new videos with.. Only seeking guys who are<br>
<span id="more-110673"></span><span style="line-height: inherit;">looking for a long term sexual relationship. This will not be a Quick Fuck and go Situation. You DO NOT have to SHOW YOUR FACE!</span></p>
<p>My goal is to have <strong>1 Special BOY TOY</strong>&nbsp;per state.</p>
<p></p><center><a class="btn btn-info" href="/training">Become A Model &gt;&gt;</a> </center><br>
&nbsp;<p></p>
</div>
	
	</div>
	<div class="clear"></div>
	<br><br>
	<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			//get_template_part( 'template-parts/content', 'page' );
			the_content();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
	<?php  ?>
	<br><br>
	<center>More Coming Soon..</center> 
	
	<div class="clear"></div>
	
<div id="" class="">


	<div class=" ">
		<hr>

			
	
			
	<div class='col-xs-6 col-md-2 hidden'>		
		<center>
		<h4>Recent Photos</h4>
		
		</center>
		<ul>
		<?php
			$args = array( 'post_type' => 'ssi_photos', 'numberposts' => '3', 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
			<div class='well1'>
				<a href="<?php echo get_permalink($recent["ID"]); ?>">
				
				<div class='col-xs-4'>
				<?php echo get_the_post_thumbnail($recent["ID"], array( 100, 100)); ?>
				</div>
				<div class='col-xs-8'>
				<?php echo $recent["post_title"]; ?>
				</div>
				</a>
				
				<div class='clear'></div>
			</div>
				<?php
			}
			wp_reset_query();
		?>
		</ul>
		
		<div class='clear'></div>
			<a href='/photos' class='btn btn-default btn-block'>All Photos >></a>
		<div class='clear'></div><hr>
	</div>	
			
	<div class='col-xs-6 col-md-2 hidden'>	
		<center>
		<h4>Recent Videos</h4>
		
		</center>
		<ul>
		<?php
			$args = array( 'post_type' => 'ssi_videos', 'category_name' => 'playroom' ,  'numberposts' => '3', 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
				
			<div class='well1'>
				<a href="<?php echo get_permalink($recent["ID"]); ?>">
				
				<div class='col-xs-4'>
				<?php echo get_the_post_thumbnail($recent["ID"], array( 100, 100)); ?>
				</div>
				<div class='col-xs-8'>
				<?php echo $recent["post_title"]; ?>
				</div>
				</a>
				
				<div class='clear'></div>
			</div>
			
			
				<?php
			}
			wp_reset_query();
		?>
		</ul>
		
		<div class='clear'></div>
			<a href='/videos' class='btn btn-default btn-block'>All Videos >></a>
		<div class='clear'></div><hr>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>TOYS</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/toys/">
<img src='https://yungdaddy.ssixxx.com/wp-content/uploads/sites/5/2017/09/2016-03-28_17.02.11-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>BOYS</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/boys/">
<img src='https://yungdaddy.ssixxx.com/wp-content/uploads/sites/5/2017/09/2015-08-22-03.11.30-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>DOM</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/dom/">
<img src='http://yungdaddy.com/wp-content/uploads/2017/09/atl-vault-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	

		
		
					
	<div class='col-sm-4 hidden'>		
		<center>
		<h4>Recent Photos</h4>
		
		</center>
		<ul>
		<?php
			$args = array( 'post_type' => 'ssi_photos', 'numberposts' => '3', 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
			<div class='well1'>
				<a href="<?php echo get_permalink($recent["ID"]); ?>">
				
				<div class='col-xs-4'>
				<?php echo get_the_post_thumbnail($recent["ID"], array( 100, 100)); ?>
				</div>
				<div class='col-xs-8'>
				<?php echo $recent["post_title"]; ?>
				</div>
				</a>
				
				<div class='clear'></div>
			</div>
				<?php
			}
			wp_reset_query();
		?>
		</ul>
		
		<div class='clear'></div>
			<a href='/photos' class='btn btn-default btn-block'>All Photos >></a>
		<div class='clear'></div><hr>
	</div>	
			
	<div class='col-sm-4 hidden'>	
		<center>
		<h4>Recent Videos</h4>
		
		</center>
		<ul>
		<?php
			$args = array( 'post_type' => 'ssi_videos', 'category_name' => 'playroom' ,  'numberposts' => '3', 'post_status' => 'publish' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				?>
				
			<div class='well1'>
				<a href="<?php echo get_permalink($recent["ID"]); ?>">
				
				<div class='col-xs-4'>
				<?php echo get_the_post_thumbnail($recent["ID"], array( 100, 100)); ?>
				</div>
				<div class='col-xs-8'>
				<?php echo $recent["post_title"]; ?>
				</div>
				</a>
				
				<div class='clear'></div>
			</div>
			
			
				<?php
			}
			wp_reset_query();
		?>
		</ul>
		
		<div class='clear'></div>
			<a href='/videos' class='btn btn-default btn-block'>All Videos >></a>
		<div class='clear'></div><hr>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>FRONT Side</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/front/">
<img src='http://yungdaddy.com/wp-content/uploads/2017/09/2ba4ad98383c7b36ca4f95c10dd4bcf8_5-2-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>BACK Side</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/back/">
<img src='http://yungdaddy.com/wp-content/uploads/2017/09/2013-11-13-15.00.25-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	
	<div class='col-xs-6 col-md-2'>	

		<center>
		<h4>FLIP Side</h4>
		
		</center>
		
		
		<div class='   text-center well1 '>

				
<p style="text-align: center;"><a class="btn btn-success btn-lg" href="/flip/">
<img src='http://yungdaddy.com/wp-content/uploads/2017/09/2015-05-09-17.40.35-150x150.jpg' class='img-responsive aligncenter ' width='250'>
</a></p>
			
			</div>
			
			
		
		<div class='clear'></div>
		
	</div>	
	
	<div class='clear'></div><hr>

	<?php 
	
	if( is_user_logged_in() ){
		//get_template_part( 'content', 'user-profile' );

	}else{
		
		echo do_shortcode("[wpmem_form login]");
	}
		//get_template_part( 'content', 'welcome' );
		
	 ?>
	 	
		<div class='clear'></div>
	 </div>
	 


</div>

<?php get_footer(); ?>