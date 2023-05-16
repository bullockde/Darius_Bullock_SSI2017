<?php
/**
 * Template Name: GQListings
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0     || .site-header {
    padding: .5em 1em;
    background: #fff;
    color: #0f2863;
}
 */

get_header('profile'); ?>

    
	<div class=" container ">
		<div id="featured" class=" container well mb-15">
        
        <div class=" col-md-6 text-center">
        
            <br>

            <h2 class="entry-title">Elite Models</h2>   
            
            <div class="hidden-xs clearfix mb-15"></div><br class="hidden-xs">
            <h2 class="featured-subtitle">Just a Phone Call Away</h2>  
            <br>
            <p>Your fantasy &amp; desires will finally come true! At GQList you will be able to search and view some of Americas most exclusive and desirable high class and elite escorts. Where ever you are in America, we're working on featuring private escorts  in every major city.
</p>            
            <br>
            <div class="call-to-action btn-group">
            <a href="/login" class="blue btn btn-default btn-lg">Member Login</a>  

            <a href="/men" class="blue btn btn-success btn-lg">View Models &rarr;</a>  
            
            </div><!-- end of .call-to-action -->
            
             <br> <br>
                     
            
        </div><!-- end of .col-460 -->
		
		<div class=" col-md-2 hidden "> 
				<br>
		</div>
        <div id="featured-image" class="text-center col-md-6 well green text-center"> 
            <center>  
                <h3>Newest Model</h3>
                <div class='clear mb-10'></div>
                <img style="width: 200px;" src="https://web.archive.org/web/20130612075545im_/http://gqlist.com/kimcarta/wp-content/uploads/sites/9/2013/04/Kim11.png" class="img-thumbnail">
                
                <div class='clear mb-15'></div>
                <h4>
                Kim Carta
                </h4><h5>
                Hampton Roads
            </center> 

</h5><a href="https://web.archive.org/web/20130612075545/http://gqlist.com/kimcarta

">&gt;View Profile&lt;</a> 
                                   
        </div><!-- end of #featured-image --> 
        <div class='clearfix'></div>
        </div>
		
		
	
	</div>



<div class='clearfix'></div>

<!-- end GQListings --> 

<div id="widgets" class="home-widgets container">
        <div class="col-sm-4  well text-center">
                    
			<?php  get_template_part( 'ad ', '300-250-1' ); ?>

		
		<div id="text-4" class="widget-wrapper widget_text"><div id="widget-title-three" class="widget-title-home"><h3>Massage</h3></div>			<div class="textwidget">Some of our providers offer professional and discreet massage, light to moderate pressure, in a relaxed and private setting. With variable amounts of experience we can tailor a perfect session for your enjoyment.</div>
		</div>            
                </div><!-- end of .col-300 fit -->

        <div class="col-sm-4  well text-center">
                    
			
			<?php  get_template_part( 'ad ', '300-250-2' ); ?>
			
			<div id="text-3" class="widget-wrapper widget_text"><div id="widget-title-two" class="widget-title-home"><h3>Companionship</h3></div>			<div class="textwidget">GQList is your solution for personalized companionship in the comfort of your home. Our escorts truly value the importance of compassion, dignity, and respect for all of our clients across all stages of life. </div>
		</div>            
                </div><!-- end of .col-300 -->

        <div class="col-sm-4  well text-center">
                    
			<?php  get_template_part( 'ad ', '300-250-1' ); ?>
			
			
			<div id="text-4" class="widget-wrapper widget_text"><div id="widget-title-three" class="widget-title-home"><h3>Massage</h3></div>			<div class="textwidget">Some of our providers offer professional and discreet massage, light to moderate pressure, in a relaxed and private setting. With variable amounts of experience we can tailor a perfect session for your enjoyment.</div>
		</div>            
                </div><!-- end of .col-300 fit -->
    </div>




<div id="primary" class="hidden">


					
							
			
	
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
	<div class='clearfix'></div><br>
			
			

	<div class=' '><div class='col-md-10 well green'>
	
		<br>

	
<?php




		$args = array( 'post_type' => 'ssi_requests', 'posts_per_page' => -1 , 'post_status' => array('pending', 'publish') );

		$leads = get_posts( $args );
		
		$count = 0;
		$skipped = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			
		//	if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-12 well1'>
			<div class='col-md-12'>

				
			<?php 
				echo "<div class='' >";
			//	echo "<center>" . get_field( 'member_level', $lead->ID ) . "</center>";
				
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
				<!--<a href='/photo/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive aligncenter'></a>
				-->
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
			
			<h4> <a href='/?p=<?php echo $lead->ID; ?>'> <?php echo $lead->post_title; ?> </a> <small>  ( <?php echo get_post_meta($lead->ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($lead->ID, 'MX_user_state', true); ?> ) -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small></h4>
			
			<div class='clear'></div><br>
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
<div class='clear'></div>
<?php //get_template_part( 'content', 'welcome-listings' ); 
?>
<div class='clear'></div>
<?php 
	get_footer(''); 
?>