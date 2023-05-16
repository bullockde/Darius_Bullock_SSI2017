<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

get_header(); ?>

<div id="" class="">

	
<?php
if( 1 /*is_page('videos')*/ ){
	
	

	?>
	
	 <div class='clearfix mb-10'></div>
	 
	 
	<div class='container-fluid '><div class='col-md-8'>
		<?php /*echo do_shortcode('[gravityform id="44" name="ADD Post$"    title="false" description="false"  ] ');*/ ?>

		 <a href="/post" class="btn-block btn btn-success btn-lg pulse hidden"><br><h3>Add Photos &raquo;</h3><br></a>


							<div class='clear'></div>
	
	<div id='add-gallery' style='display: block;' class='text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			<button id='add-gallery' class='hidden-print btn btn-success btn-lg btn-block hidden1 pulse'><br><h3>> Add Photos <</h3><br></button>
			
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;'  class='well green'>
				
			<div class="col-md-10 col-md-offset-1  home-beta">
			 <div class='clearfix mb-10'></div>
			    <center><h3> Upload Photos! </h3></center>
			 <div class='clearfix mb-15'></div>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[gravityform id="36" title="false" description="false"]');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clearfix'></div>	<br>	
			</div>
			
			<div class='clear'></div>
		</div>
	<div class='clearfix mb-10'></div>
	
	
	




	<?php


		$args = array( 'post_type' => array('post', 'ssi_photos'),'posts_per_page' => -1 , 'post_status' => array(/*'pending', */'publish') ,
	
		'order'                  => 'desc',
		//'category_name' => 'pending',
				'orderby'                => 'meta_value_num',
				'meta_key'               => 'RATINGS_SCORE', 
		
		);

		$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
			if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>





            <div class='video-set 1col-md-4 well'>
			<div class='col-md-12'>
                <div class='col-sm-1' >
                    <?php
					echo "<center>" . $count . "</center>";
					
					?>
                </div>
				<div class='col-sm-3' >
					<a href='/?p=<?php echo $lead->ID; ?>'>
					<?php
					echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
					
					?>
					</a>
					<?php
						if ( has_post_thumbnail( $lead->ID ) ) {
	    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'thumbnail' );	
							
	   						if ( ! empty( $large_image_url[0] ) ) {
	        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
	        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
	        						echo '</a>';

	   					 	}
						}
			
					?>
				
					<a href='/?p=<?php echo $lead->ID; ?>'> 
					<center>
					    <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter1 1circle img-thumbnail ads ad-shift'>
					    
					</center>
					</a>
				</div>
				<div class="col-sm-8">
					<div class='clear'></div>
					<center>
					<a href='/?p=<?php echo $lead->ID; ?>'>
					<strong><?php echo $lead->post_title; ?></strong><br>
					( <?php echo get_field( '#_of_photos', $lead->ID ); ?> Photos )
					</a>

					<br><br><br>
					<?php // if(function_exists('the_ratings')) { the_ratings(); } 
					
					
					echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
					?><br><br>
					
					<a href="/?p=<?php echo $lead->ID; ?>" class="btn btn-block btn-default hidden1">View &raquo;</a>

                        <!--<hr style="margin: 5px 0;">-->
				
			  <small class="hidden">by <?php 
								$user = get_user_by('ID' , $lead->post_author);
							
								//print_r( $user );
							echo $user->display_name; ?> -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small>
					</center>
				</div>

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

				
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			
			<div class="clearfix"></div>
		</div>

				<div class='hidden  video-set col-md-4 well'>
			<div class='col-md-12 text-center'>

				
			<?php 
				
				if( get_field( 'member_level', $lead->ID ) ){
					echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center><br>";
				}else{
					echo "<center>Public</center><br>";
				}
				
				echo "THoT #" . get_field( 'thot_#', $lead->ID );
				
				?>
	
    		<div class='clearfix'></div>
        				<?php
        					if ( has_post_thumbnail( $lead->ID ) ) {
            			           $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), array( 150, 150) );	
        						
           					// 	if ( ! empty( $large_image_url[0] ) ) {
                // 						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
                // 						echo get_the_post_thumbnail( $lead->ID, array( 150, 150) ); 
                // 					    echo '</a>';
        
           					//  	}
        					}
        				
        				?> 
    		
		
			
				<a href='/?p=<?php echo $lead->ID; ?>'><center> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive img-thumbnail mb-10 circle' style='max-height: 150px; max-width: 150px;'></center> </a>
			
			</div>

			<div class='col-md-4 hidden'>
					<div class='visible-xs'><br><br></div>
					<h4>Photo Set</h4>
					<hr>
					
				<?php
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 ?>
				<div class='clearfix'></div><br><br>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clearfix'></div>
			<center>
			<h5><?php echo $lead->post_title; ?></h5>
			( <?php echo get_field( '#_of_photos', $lead->ID ); ?> Photos )
			</center>


		</div>
		

		

		<div class='video-set well hidden'>
			<div class=' row'>
			
				<div class="col-xs-10">
					<h4> <a target="_blank" href="/?p=<?php echo  $lead->ID; ?>" ><?php  echo $lead->post_title; ?> </a> </h4>
					<div class='clearfix'></div><br>
				</div>
				<div class="col-xs-2 text-right">
					
					<a href="/favorites/?wpfpaction=add&postid=<?php echo  $lead->ID; ?>"><span class="glyphicon glyphicon-heart-empty " aria-hidden="true" ></span></a>
				</div>
				<div class="clearfix mb-10"></div>



				<a target="_blank" href="/?p=<?php echo  $lead->ID; ?>" >
				<div class='col-xs-12 text-center'>
					<?php
						if(get_field('youtube_id', $lead->ID)){
							?>
								<img src="http://img.youtube.com/vi/<?php echo get_field('youtube_id', $lead->ID); ?>/0.jpg" alt="Youtube Image"  class="1circle img-thumbnail img-responsive hidden" width="100%">
							<?php
							
						}else if( wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large' ) ) { //the post does not have featured image, use a default image
							$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large' );

							?>
								<img src='<?php echo esc_attr( $thumbnail_src[0] ) ; ?>' alt='Youtube Image'  class='1circle img-responsive hidden' width='100%'>
							<?php
							echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
						}
					?>

			
				</div>
			
			</a>


				<div class="container-fluid">
					<a href="/?p=<?php echo $lead->ID; ?>"> <img src="<?php echo esc_url( $large_image_url[0] ); ?>" class="img-responsive img-thumbnail" width="100%"></a>
				</div>
			</div>

			<div class='col-md-12'>
					<div class='visible-xs'></div>

					<div class='col-md-6' >
					<?php 
						
						if( get_field( 'member_level', $lead->ID ) ){
							echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
						}else{
							echo "<center>Public</center>";
						}
						
							if ( has_post_thumbnail( $lead->ID ) ) {
		    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
								
		   						if ( ! empty( $large_image_url[0] ) ) {
		        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
		        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
		        						echo '</a>';

		   					 	}
							}
						
						?>
						</div>
						<div class="col-md-6">
							
							Info <hr>
						</div>
						<div class="clearfix"></div>
				
				<?php
				
						
					if( get_field( 'gallery_shortcode', $lead->ID ) ){ 
					
						echo "<h4>Photo Set</h4>";
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
				?>
					<a href='<?php 	if( get_field( 'gallery_id', $lead->ID ) ){  echo  "/?p=" . get_field( 'gallery_id', $lead->ID ); }else{ echo "/photos"; } ?> ' target='_blank'> 
				<?php 
						echo do_shortcode($shortcode);
						
				?>
				</a>
				<?php
				
					}else if(get_field( 'member_level', $lead->ID ) == 'Sponsored' ){ 
						echo "<h4>A Gift From <a href=' http://instaflixxx.com/' target='_blank'>InstaFliXXX</a>!</h4>";
					?>
						
				
			<?php  get_template_part( 'ad ', '150-150' ); ?>
				<?php 
						}
					?>
						
				

				<div class="clearfix"></div>
				<?php if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Sponsored' ){?>
					<p style="text-align: center;"><a href="/video/<?php echo $lead->post_name; ?>" class="hidden btn btn-block btn-success btn-lg">View Video</a></p>
				
				<?php }else{ ?>
					<p  style="text-align: center;"><a href="/video/<?php echo $lead->post_name; ?>" class="btn btn-block btn-success btn-lg">View Preview</a></p>
				<?php } ?>
			</div>
			<div class="clearfix"></div>
			<center>
				
				<span class="">
					
					
					<u><?php echo get_field( 'member_level', $lead->ID ); ?></u> |
				</span> <b>Runtime:</b> <?php echo get_field( 'video_length', $lead->ID ); ?> | <b>Date Added:</b> <?php echo date( 'm/d/y' , strtotime($lead->post_date) ); ?> <!--  #  | <b>Rating:</b> <?php echo ""; ?>-->


			</center>
			 
			<!-- <hr>
			
			<?php 
				if( has_excerpt($lead->ID) != '' ){
					echo get_the_excerpt($lead->ID);
				}
				//echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>"; 
				?> -->


		</div>


	
	

		
		<?php 

		if( ($count % 3) == 0){ echo "<div class='clearfix'></div>";}

		}// #END forach
	?>

	<?php 
	echo "</div>";
}  

?>
		<div class='1hidden col-md-4 text-center 1img-thumbnail'>
		    
		    
		    <?php get_template_part( 'ad' , '300-250-1' ); ?>
		    <!--<div class='clearfix'></div><br><br>-->
		    <?php //get_template_part( 'ad' , '300-250-2' );
		    ?>
		    <!--<div class='clearfix mb-15'></div><br>-->
			<?php //get_template_part( 'content' , 'sidebar-ads' ); 
			?>
	
		</div>
		
				<div class='clearfix'></div>
				<br>
	
</div>
	
</div><!-- .content-area -->

<div class='clearfix'></div>
<?php 
	get_footer(); 
?>