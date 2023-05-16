<?php


get_header(); ?>

<div class="btn-group btn-group-justified">

	<a href="/photo-list" class="btn btn-default"> <small>LIST</small> </a>
	<a href="/photos" class="btn btn-default"> <small>GRID</small> </a>

	<a href="/photo-wall" class="btn btn-default"> <small>WALL</small> </a>
	<!--<a href="http://dlfreakfest.org/levels/?level=4" class="btn btn-default">Level 4 <br> <small>REQUEST</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=5" class="btn btn-default">Level 5 <br> <small>SESSION</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=6" class="btn btn-default">Level 6 <br> <small>THoT FILE</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=7" class="btn btn-default">Level 7</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=8" class="btn btn-default">Level 8</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=9" class="btn btn-default">Level 9</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=10" class="btn btn-default">Level 10</a>-->
</div>

<div id="" class="container-fluid">

		<br>
			
<div class='row '>
		<div class='col-md-8'>
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
	




			<div class="clear"></div>
			
			<div class="paginator hidden"><center>
					<div class='col-xs-6'>

						<div class="img-thumbnail ads ad-shift pad-20">
							<a target='_blank' class='pull-right' href='http://instaflixxx.com/category/straight-porn'>
							<img src='http://instaflixxx.com/wp-content/uploads/2013/06/str8-button.png' class='img-thumbnail'>
							
							</a>
						</div>
						
						</a>
					</div>
					<div class='col-xs-6 '>
						<div class="img-thumbnail ads ad-shift pad-20">
							
							<a target='_blank' class='pull-left' href='http://instaflixxx.com/category/gay'>
							<img src='http://instaflixxx.com/wp-content/uploads/2013/06/gay-button2.png' class='img-thumbnail '>
							</a>
						</div>
						
					</div>
					
					<div class='clearfix'></div><br>
                    
                <a class='pull-left hidden' href='/category/straight-porn'>&lsaquo; Str8</a>
				<a class='pull-right hidden' href='/category/gay'>Gay >></a>
				</center>
            </div>
			
			<div class="clear"></div>
 <?php

	$no=10;// total no of author to display

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged==1){
  $offset=0;  
}
else {
   $offset= ($paged-1)*$no;
}
    $args = array(
                        'post_type' => 'ssi_photos',
						//'meta_key' => 'when_last_login',
						//'orderby'  => 'modified',
						'order'  => 'desc',
        'posts_per_page' => $no, 'offset' => $offset,
      //  'orderby'                => 'meta_value_num',
		///		'meta_key'               => 'RATINGS_SCORE', 
                            // 'meta_query' => array(
                            //     array(
                            //         'key' => $filter,
                            //         'value' => $_GET['filter'],
                            //         'compare' => 'LIKE'
                            //     )
                            // )
                            );
							
			 $leads = get_posts( $args );				
							
		//	$total_user = $user_query->total_users;  				
	?>
	


<?php

		$args = array( 'post_type' => 'ssi_photos', 'posts_per_page' => -1  );

		//$leads = get_posts( $args );
		
		$count = 0;

		//print_r( $leads );
		foreach( $leads as $lead ){ 
			$count++;

			$post = $lead;
		
			//if( get_field( 'member_level', $lead->ID ) == 'Public' || get_field( 'member_level', $lead->ID ) == 'Sponsored'){ continue; }else{ $count++; }
	?>
	
		<div class='video-set col-md-6 well pad-0'>
			<div class='1row'>

				<?php //get_template_part( 'content', 'post' );

				 ?>


		

			
		<!-- 
				<a href='/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>'> <img src='<?php echo esc_url( $large_image_url[0] ); ?>' class='img-responsive 1aligncenter mb-10'></a> -->

				<div class=''>

				<div class="col-xs-4 text-center">

					<center><?php if( get_field( 'member_level', $lead->ID ) ) { echo get_field( 'member_level', $lead->ID ); }else{ echo "Public"; } ?></center>
					
					<?php
						if ( has_post_thumbnail( $lead->ID ) ) {
    			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ) );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a class="circle" href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
								
        						
        						echo '</a>';
?>
								<a href='/?p=<?php echo $lead->ID; ?>'> 
								    <?php echo get_the_post_thumbnail( $lead->ID , array(150,150), array( 'class' => 'img-thumbnail 1ads 1ad-shift circle' ) ); ?>
								</a>
								<?php
   					 	}
					}else if( get_field('youtube_id', $lead->ID) ) {
						?>
						<center>
							<div class='clearfix mb-5'></div>
						<a href='/?p=<?php echo $lead->ID; ?>'>
							<img src='http://img.youtube.com/vi/<?php echo get_field('youtube_id', $lead->ID); ?>/0.jpg' alt='Youtube Image' class='img-responsive img-thumbnail mb-10' >
						</a>	
						
						</center>
						<?php
						
					}else{
						?>
						<center>
						<a href='/?p=<?php echo $lead->ID; ?>'>
							<img  src='/wp-content/uploads/2017/10/21433968_175756556303549_4577358612573192192_n.jpg' alt='Youtube Image' class='img-responsive circle'>
						</a>	
						
						</center>
						<?php
						
					}
			
					?>
				
					

					
				</div>
				<div class="col-xs-8">
					<div class='clear'></div>
					<?php $post_title = $lead->post_title; 
					
					
					
					?>
					<a href='/?p=<?php echo $lead->ID; ?>'>
						<strong><?php /*echo $lead->post_title;*/ ?><?php if( strlen($post_title) >= 15 ){ echo substr( $lead->post_title ,0 , 15) . "..";   }else{ echo $lead->post_title; } ?></strong> | <small>
						<?php echo get_field( 'video_length', $lead->ID ); ?>
					 </small><hr>
					 
					 
					</a>

					<div class='clearfix text-center'>
					
					<?php									

                        echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
									
				
							
	?>
				</div>

					
				</div>
				<div class='clearfix mb-10'></div>
					<a href="/?p=<?php echo $lead->ID; ?>" class="btn btn-block btn-default hidden1 mb-0">View &raquo;</a>


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
				<div class='clear'></div>

				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/<?php echo $lead->post_type; ?>/<?php echo $lead->post_name; ?>">View Preview</a></p>
				<p class="btn btn-block btn-lg hidden" style="text-align: center;"><a href="/subscribe/">Subscribe Now!</a></p>
			</div>
			<div class='clear'></div>
			
			
			
			
			<div class='clear'></div>
			
			<!--  <b>Runtime:</b> <?php echo get_field( 'video_length', $lead->ID ); ?> | <b>Added:</b> <?php echo date( 'm/d/y' , strtotime($lead->post_date) ); ?>  -->
		</div>
		
		
		<?php 

		if( ($count % 2) == 0){ echo "<div class='clear'></div>";}

		}// #END forach
	?>
	
	
	
	
	<div class='clearfix '></div>
	<?php
			  

$num_photos = get_posts(array(  'post_type' => 'ssi_photos' , 'posts_per_page' => -1 ));
$total_user = count($num_photos);  
              $total_pages=ceil($total_user/$no);			  
			  
$current_page = $paged; // Example
$num_pages = $total_pages; // Example

$edge_number_count = 1; // Change this, optional

$start_number = $current_page - $edge_number_count;
$end_number = $current_page + $edge_number_count;

?>

<div class="ssi-pagination well 1mb-0" style="padding: 5px;">	
<h3>


<center>
<?php
// Previous page
     /*   if ( $current_page > 1 ) {
            echo '<a href="'. add_query_arg(array('paged' => $current_page-1)) .'">Previous Page</a>';
        }*/
	if(!get_previous_posts_link()) {
				echo '<button class="btn btn-lg btn-primary">« PREV</button> ' ;
				} else {
				//previous_posts_link('« Prev');
				echo '<a  class="btn btn-lg btn-primary" href="'. add_query_arg(array('paged' => $current_page-1)) .'">« PREV</a>';
				echo "&nbsp;";
				}	
// Minus one so that we don't split the start number unnecessarily, eg: "1 ... 2 3" should start as "1 2 3"
if ( ($start_number - 1) < 1 ) {
    $start_number = 1;
    $end_number = min($num_pages, $start_number + ($edge_number_count*2));
}

// Add one so that we don't split the end number unnecessarily, eg: "8 9 ... 10" should stay as "8 9 10"
if ( ($end_number + 1) > $num_pages ) {
    $end_number = $num_pages;
    $start_number = max(1, $num_pages - ($edge_number_count*2));
}

//if ($start_number > 1) echo " 1 ... ";

for($i=$start_number; $i<=$end_number; $i++) {
    if ( ($i == $current_page ) ){ echo "&nbsp;({$i})&nbsp;"; }
   // else if ( ( $i == $num_pages ) ){ echo "&nbsp;({$i})&nbsp;"; }
    
    //else{ echo "&nbsp;{$i} "; }
    //else
    else{ echo "&nbsp;{$i} "; }
    
}

//if ($end_number < $num_pages) echo " ... {$num_pages} ";

// Next page
        if ( $current_page < $num_pages ) {
			
			echo "&nbsp;";
            echo '<a class="btn btn-lg btn-primary" href="'. add_query_arg(array('paged' => $current_page+1)) .'">NEXT &raquo;</a>';
        }
		
		
?>
</center></h3>
</div>	


		</div>
		<div class='col-md-4   text-center '>
		   
				<div class='1ads 1ad-shift img-thumbnail'>
					<?php //get_template_part( 'content', 'sidebar-ads' ); 
					
					
					    get_template_part( 'ad', '300-250-1' );
					   // get_template_part( 'ad', '300-250-2' );
					?>	
					<div class='clearfix mb-0'></div>
					<?php //get_template_part( 'content', 'sidebar-ads' ); 
					
					
					   // get_template_part( 'ad', '300-250-1' );
					    //get_template_part( 'ad', '300-250-2' );
					?>	
				</div>
	        <div class='clearfix mb-15'></div>
	        
	         <div class='well  text-center mb-15'>
		        <?php 
		
    			//get_template_part('content' , 'member-quicknav'); 
    
    	    	
    			
    			dynamic_sidebar( 'content-bottom-2' );
    			
    		//	get_template_part( 'content', 'sidebar-upcoming-events' );
    			
    			//get_template_part( 'ad', '300-250-1' );
    		
    		
    		?>
    		</div>
		</div> 
		
				<div class='clearfix'></div>
				
				
</div>


	
</div><!-- .content-area -->
<?php 
	get_footer("mobile"); 
?>