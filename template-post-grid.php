<?php 
// Template Name: Post Grid 6

 /*if( current_user_has_avatar() ){}else{
		
		$pg = "/photo-required"; wp_redirect($pg); exit;
 }*/

get_header('profile'); 

	//$cats = array( get_cat_ID('current-event') , get_cat_ID('playroom') );

//	$events = get_posts(array( 'post_type' => 'ssi_events', 'category' =>  $cats, 'posts_per_page' => 5 , 'order' => 'desc'));
	
//	$event = $events[0];
	
	//print_r( $events );
	
	//echo "<span class='alert alert-danger btn-block text-center'> Site Maintenance - Ends at 6AM!</span>";

			//get_template_part( 'content', 'upcoming-events' ); 
		 //get_template_part( 'content', 'uc-events' ); 
		 //get_template_part( 'content', 'welcome' ); 
		 //
		 
		  
			//echo dispMailbox(); 
			 //get_template_part( 'content', 'welcome-profile' ); 
			 //echo "<div class='mb-10'></div>";
			 //get_template_part( 'content', 'uc-events' ); 
		
	?>

		

	
	<div class='clearfix mb-10'></div>
 <?php

	$no=6;// total no of author to display

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged==1){
  $offset=0;  
}
else {
   $offset= ($paged-1)*$no;
}
    $args = array(
                        'post_type' => array('ssi_photos','post'),
						//'meta_key' => 'when_last_login',
						'orderby'  => 'modified',
						'order'  => 'desc',
        'posts_per_page' => $no, 'offset' => $offset,
        //'orderby'                => 'meta_value_num',
			//	'meta_key'               => 'RATINGS_SCORE', 
                            // 'meta_query' => array(
                            //     array(
                            //         'key' => $filter,
                            //         'value' => $_GET['filter'],
                            //         'compare' => 'LIKE'
                            //     )
                            // )
                            );
							
			 $all_photos = get_posts( $args );				
							
		//	$total_user = $user_query->total_users;  				
	?>
	


<div class='col-md-8  ' >


				
<?php	

   
    if ( !empty( $all_photos ) ) {
        foreach ( $all_photos as $lead ) {
             
		

			 //FOREACH User
			 $index = 0;
							

							//update_user_meta( $user->ID, 'wp-last-login', time() );

									if( (!isset($username) || $username == "") ||  preg_match("/" . $username . "/i", $user->display_name) ){

							
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
			<div class='clearfix'></div>
			
			<h4 class="well"> <a href='/photo/<?php echo $lead->post_name; ?>'> <?php echo $lead->post_title; ?> </a> <small>  -- <?php echo get_the_date( 'F d - h:i A' , $lead->ID ); ?> </small></h4>
		</div>
		
		
		<?php 

		if( ($count % 3) == 0){ echo "<div class='clearfix'></div>";}

							
								
						?>		
						
						
	<div class="col-xs-6 col-md-4 person text-center well mb-10">
						
						<a href="/user-profile/?ID=<?php echo $user->ID; ?>">
						<div id="user-mini">
							<div class="link upper bold hidden ">
								<?php echo substr($lead->post_title, 0, 15); ?>
								
								<span class='hidden' style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: <?php echo $social; ?></span>
							</div>
	
<center> 

<a href='/?p=<?php echo $lead->ID; ?>'>
					<strong><?php echo substr($lead->post_title, 0, 15); ?> .. </strong><br>
					( <?php echo get_field( '#_of_photos', $lead->ID ); ?> Photos )
					</a>
					
                    
</center>
	<div class="clearfix mb-5"></div>

<div class="mini-left">

								<div class=" porn">
									<center>
								<?php
								
									
										echo get_the_post_thumbnail($lead->ID, array(150, 150));
								
								?> 
									
									</center>
								</div>
								

<div class="clearfix mb-5"></div>
</div>
<?php									

                        echo do_shortcode( '[ratings id="'. $lead->ID  . '"]' );
										$closet = 0;
				
							
	?>
<br>
		<?php
					//	echo get_field( 'member_level', $lead->ID );
						
									echo '</div></a></div>';
									$count++;
									if( ($count % 2) == 0 ){ 
						?>					
				
								<div class='1visible-xs'></div>

						<?php		}else if( ($count % 3) == 0 ){ 
						?>					
				
								<div class='clearfix hidden-xs'></div>

						<?php		}else{
							
							?> 
							
							<?php
									}
								}// END STATE IF
			 
			 
        }
    }
else {
 echo '<h4>No agents found.</h4>';
}

echo "<div class='clear mb-10'></div>";





$num_photos = get_posts(array(  'post_type' => array('ssi_photos','post'), 'posts_per_page' => -1 ));
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
				echo '<button class="btn btn-lg btn-primary">« Prev</button> ' ;
				} else {
				previous_posts_link('« Prev');
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
    if ( $i === $current_page ) echo "&nbsp;({$i})&nbsp;";
    else echo "&nbsp;{$i} ";
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
<div class='clear'></div>
<?php if( !wp_is_mobile() ){  ?>
		<center><div class='img-thumbnail hidden'><?php get_template_part( 'ad', '728-90' ); ?></div></center>
<?php }  ?>
 </div>
<?php if( 1 /*wp_is_mobile()*/ ){  ?>
<div class='col-md-4  ' >

		<?php 
		
			//get_template_part('content' , 'member-quicknav'); 
//
			//get_template_part( 'content', 'sidebar-ads' ); 
			
			//get_template_part( 'content', 'sidebar-upcoming-events' );
			
			//get_template_part( 'ad', '300-250-1' );
		
		
		?>
		
		
		
	
 </div>
<?php } ?>
 <div class='clearfix'></div>
 


 
 <?php 
	 
	
	get_template_part( 'content-widget', 'photos' ); 
	
	//get_template_part( 'content', 'uc-events' );
 
	//get_template_part( 'content', 'member-area' ); 
 ?>
 
 </div>
<?php get_footer('preview'); ?>