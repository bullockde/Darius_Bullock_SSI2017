<?php
/**
 * Template Name: Freak Now
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */
 

get_header(); ?>

<style>
.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
    border-radius: 0px 7px 7px 0px;
}
.btn {
    display: inline-block;
    padding: 5px;
}
.preview-gallery .gallery-icon img {
    max-width: 40%;
}

</style>



<div id="primary" class="">

<br>
					
							
			
	
	<div id='add-gallery' style='display: block;' class='text-center <?php if ( /*!is_user_logged_in()*/ 0  ) { echo "hidden"; } ?>'>
			
			
			<div class="btn-group hidden1 " >
				
				
					<button id='add-gallery' class='hidden-print hidden1 btn btn-default btn-lg btn-block1'>Quick Post</button>
					<a href='/freak-post' class='hidden-print btn  btn-primary btn-lg btn-block1'> Full Post >></a>
					<hr>
			</div>
		</div>
	
		<div class='clear'></div>	

		<div id='add-gallery' style='display: none;' >
			<div class='clear'></div>	
			<div class="col-md-10 col-md-offset-1  home-beta">
			<center><h3> New Post! </h3></center><br>
			</div>
			<div class="col-md-10 col-md-offset-1 text-left">
			<div class="well">
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[gravityform id="40" title="false" description="false"]
			');
			
			?></div>
			<div class='clear'></div>	
			<button id='add-gallery' class='hidden-print btn btn-default btn-sm'>x close</button>
			<div class='clear'></div>	<br>
			</div>
		</div>
	<div class='clear'></div>
			
			

	<div class='container-fluid'><div class='col-md-10 well1 green1'>
	
		<br>

	
<?php




		$args = array( 'post_type' => 'ssi_photos', 'posts_per_page' => -1 , 'post_status' => array(/*'pending', */'publish') ,
	
		'order'                  => 'desc',
		//'category_name' => 'pending',
				'orderby'                => 'meta_value_num',
				'meta_key'               => 'RATINGS_AVERAGE', 
		
		);

		$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
		    
		    //if( check_rated( $lead->ID ) ){ echo "Already Rated!"; continue; }
			
		//	if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-12 well'>
			<div class='col-md-2'>
		
				
			<?php 
				echo "<div class='' >";
				
				
				
				
				//	get_template_part( 'content', 'user-profile' );
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				?>
					
				<?php
					if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'medium' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        					//	echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'thumbnail' ); 
        					//	echo '</a>';
                            
                            	?>
				<a href='/?p=<?php echo $lead->ID; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter img-thumbnail ads ads-shift '></a>
				        <?php
   					 	}
					}
				echo "</div>";
			?>
			
				
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
	
			
			<div class='col-sm-7'>
				<h4> <?php echo ++$count; ?>. <a href='/?p=<?php echo $lead->ID; ?>'> <?php echo $lead->post_title; ?> </a> 
				| <small>  <?php echo get_post_meta($lead->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($lead->ID, 'MX_user_state', true); ?></small> 
				<?php 
					if( get_comments_number( $lead->ID ) ){
						
						echo '| <span  data-toggle="tooltip" title="Comments" class="btn btn-default1  hidden1 glyphicon glyphicon-comment"></span>' . get_comments_number( $lead->ID );
						
					}
				?> | 
					<?php // if(function_exists('the_ratings')) { the_ratings(); } 
					
					
					echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
					?><br><br>
				<div class='clearfix mb-15'></div>
				
			
				<?php

					if( has_post_thumbnail( $lead->ID ) ){
						
						echo ' <span type="button" id="myBtn" data-toggle="modal" data-target="#myModal-' .$count. '" data-show="true" class="btn btn-default hidden1 glyphicon glyphicon-camera"></span> ';
						
					}
					if( get_post_meta($lead->ID, 'request_date') ){
						
						echo ' <span  data-toggle="tooltip" title="Scheduled Request" class="btn btn-default hidden1 glyphicon glyphicon-time"></span>  ';
						
					}
					if( get_post_meta($lead->ID, 'request_amount') ){
						
						echo ' <span  data-toggle="tooltip" title="Donation" class="btn btn-default  hidden1 glyphicon glyphicon-usd"></span>  ';
						
					}
					if( get_post_meta($lead->ID, 'MX_user_phone') ){
						
						echo ' <span  data-toggle="tooltip" title="Phone #" class="btn btn-default  hidden1 glyphicon glyphicon-earphone"></span>  ';
						
					}
					if( get_post_meta($lead->ID, 'MX_user_email') ){
						
						echo ' <span  data-toggle="tooltip" title="Private Message" class="btn btn-default  hidden1 glyphicon glyphicon-envelope"></span> ';
						
					}
					
					
				?>
				 ( <?php echo get_field( '#_of_photos', $lead->ID ); ?> Photos ) 
				 
				
				<hr style="margin: 5px 0;">
				
			  <small>by <?php 
								$user = get_user_by('ID' , $lead->post_author);
							
								//print_r( $user );
							echo $user->display_name; ?> -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small></h4>
			</div>
			<div class='col-md-3 text-center'>
			
			
				
				<div class='clearfix'></div><br class="visible-xs">
				<a href="/?p=<?php echo $lead->ID; ?>"  class="btn btn-success btn-block  btn-lg pull-right hidden1 pulse"><?php if(get_post_meta($lead->ID, 'request_status')){ echo get_post_meta($lead->ID, 'request_status', true); }else{ echo "Pending" ; } ?> &rarr;</a>
			
				 <!-- Trigger the modal with a button -->
  
  <button type="button" class="btn btn-danger btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-<?php echo $count; ?>" data-show="false">Modal (data-show="false")</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal-<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title mb-10">X-CLUSIVE Photos!</h2>
          
          <h4> <?php echo $count; ?>. <a href='/?p=<?php echo $lead->ID; ?>'> <?php echo $lead->post_title; ?> </a> 
				| <small>  <?php echo get_post_meta($lead->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($lead->ID, 'MX_user_state', true); ?></small> 
				<?php 
					if( get_comments_number( $lead->ID ) ){
						
						echo '| <span  data-toggle="tooltip" title="Comments" class="btn btn-default1  hidden1 glyphicon glyphicon-comment"></span>' . get_comments_number( $lead->ID );
						
					}
				?>
				
				
        </div>
        <div class="modal-body">
          <center>
		    <div class='img-thumbnail ads ads-shift well'>
                <a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-fluid '></a>
          
          
			    <?php //twentysixteen_post_thumbnail(); 
			    
			    ?>
			
			</div>
			<div class='clearfix'>
			<?php 
			
			       if( get_field( 'preview_content', $lead->ID ) ){
			           
			           ?>
			           <div class='clearfix well yellow preview-gallery'>
			               <h4>Preview Gallery</h4><hr class="mb-5">
			                <?php
			          echo get_field( 'preview_content', $lead->ID ); ?>
			          
			          <u><?php echo get_field( 'member_level', $lead->ID ); ?></u> |  <b>Photos:</b> <u><?php echo get_field( '#_of_photos', $lead->ID ); ?></u>  | <b>Date Added:</b> <?php echo get_the_date(); ?> <!--  #  | <b>Rating:</b> <?php echo ""; ?>-->

			               
			               
			           </div>
			          
			          
			          
							<?php 
							
						
						
			       }else{	
							

					
				
						$shortcode = get_field( 'gallery_shortcode', $lead->ID );
						echo do_shortcode($shortcode);

				 
							
			       }
						//	get_template_part('content', 'user-gallery'); ?>
			<div class='clearfix'></div>				
							
			<?php echo get_the_content( $lead->ID  ); ?>

			
			 

				<div class='clear'></div>

				<p class="btn 1btn-block btn-default btn-lg hidden col-xs-6" style="text-align: center;"><a href="<?php echo $lead->guid; ?>">View Preview</a></p>
				<p  ><a href="/trial/" class="btn btn-success btn-block btn-lg hidden1 col-xs-6 pulse" style="text-align: font-sizre: 2em;"><br>Subscribe Now - Get 1 DAY FREE!<br><br></a></p>
				<div class='clear'></div><br>
			</div>
		</center>
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal2-<?php echo $count; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Modal Options</h4>
        </div>
        <div class="modal-body">
          <p>Modal content..</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
			
			
			</div>
			
			
			
			
			<div class='clear'></div>
			
			
			
			<div class='hidden report'>
							
							<div class='col-sm-2 hidden1'>
								
							<?php	//echo get_the_post_thumbnail( $lead->ID , array(50,50) ); ?>
							<div class='circle img-thumbnail'>
							<?php

								if( has_post_thumbnail( $lead->ID ) ){
									
									echo get_the_post_thumbnail( $lead->ID , array(50,50) );
									
								}else{
									//echo "<img class='floatl margin10' width='175' src=" . z_taxonomy_image_url($categories[0]->term_id) . " />";
								}
							?>
							</div>
							</div>
							
							<div class='col-xs-10'>
							
								<div class='artist'>
								<a href='<?php echo home_url() . "/" . $lead->post_name; ?>'>
							<?php	echo $lead->post_title; ?></a> 
							<br>
							<small>by <?php 
								$user = get_user_by('ID' , $lead->post_author);
							
								//print_r( $user );
							echo $user->display_name; ?></small>
								</div>
							</div>
							
							<?php
							?>
							
							<div class='col-xs-2'>
							<a href='<?php echo home_url() . "/" . $lead->post_name; ?>'>	
							
							  
							  <span class="hidden1 glyphicon glyphicon-play"></span> 
							
							</a>
							</div>
							
							
							
									<div class='clear'></div><hr>
						</div>
						
						
							<div class='clear'></div>
							
							
		</div>
		
		
		<?php 

		//if( ($count % 3) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>
</div>
	
		 <div class='col-md-2 hidden-xs text-center img-thumbnail'>
			<!--JuicyAds v2.0 --  Photo Skyscraper -->
			<center>
			<iframe border=0 frameborder=0 marginheight=0 marginwidth=0 width=160 height=612 scrolling=no allowtransparency=true src=http://adserver.juicyads.com/adshow.php?adzone=516829></iframe>
			</center>
			<!--JuicyAds END-->
		</div>
		
				<div class='clear'></div>
				
	
</div>
	
</div><!-- .content-area -->

<?php get_template_part( 'content', 'welcome-rsvp' ); ?>
<br>
<?php 
	get_footer(); 
?>