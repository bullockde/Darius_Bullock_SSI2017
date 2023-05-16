<?php 

//  if( current_user_has_avatar() ){}else{
		
// 		$pg = "/photo-required"; wp_redirect($pg); exit;
//  }

get_header(); 

	//$cats = array( get_cat_ID('current-event') , get_cat_ID('playroom') );

//	$events = get_posts(array( 'post_type' => 'ssi_events', 'category' =>  $cats, 'posts_per_page' => 5 , 'order' => 'desc'));
	
//	$event = $events[0];
	
	//print_r( $events );
	
	//echo "<span class='alert alert-danger btn-block text-center'> Site Maintenance - Ends at 6AM!</span>";
	?>
<div class="btn-group btn-group-justified">

	<a href="/photo-list" class="btn btn-default"> <small>LIST</small> </a>
	<a href="/photos" class="btn btn-default"> <small>6 GRID</small> </a>
	<a href="/photo-gallery" class="btn btn-default"> <small>15 GRID</small> </a>
	<a href="/photo-wall" class="btn btn-default"> <small>WALL</small> </a>	
	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/album" class="btn btn-default"> <small>ALBUMS</small> </a>	
	<!--<a href="http://dlfreakfest.org/levels/?level=4" class="btn btn-default">Level 4 <br> <small>REQUEST</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=5" class="btn btn-default">Level 5 <br> <small>SESSION</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=6" class="btn btn-default">Level 6 <br> <small>THoT FILE</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=7" class="btn btn-default">Level 7</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=8" class="btn btn-default">Level 8</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=9" class="btn btn-default">Level 9</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=10" class="btn btn-default">Level 10</a>-->
</div>
	<?php
			//get_template_part( 'content', 'upcoming-events' ); 
		 //get_template_part( 'content', 'uc-events' ); 
		 //get_template_part( 'content', 'welcome' ); 
		 //
		 
		  
		//	echo dispMailbox(); 
			 //get_template_part( 'content', 'welcome-profile' ); 
			 //echo "<div class='mb-10'></div>";
			 //get_template_part( 'content', 'uc-events' ); 
		
	?>

		

	
	<div class='clearfix mb-10'></div>
 <?php
    $count = null;
	$no=6;// total no of author to display

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
						'orderby'  => 'modified',
						'order'  => 'desc',
        'posts_per_page' => $no, 'offset' => $offset,
       // 'orderby'                => 'meta_value_num',
		//		'meta_key'               => 'RATINGS_SCORE', 
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
    
    <?php echo do_shortcode('[rtmedia_uploader context=page album_id=16]'); ?>
							<div class='clear'></div>
							<?php //echo do_shortcode('[rtmedia_gallery global="true" media_type="album"]');
							?>
							
							<div class='clear'></div>
							<?php echo do_shortcode('[rtmedia_gallery global="true" media_type="photo" ]'); ?>
							<div class='clear'></div>

<div class='clear'></div><br><br>
<?php if( !wp_is_mobile() ){  ?>
		<center><div class='img-thumbnail hidden'><?php get_template_part( 'ad', '728-90' ); ?></div></center>
<?php }  ?>
 </div>
<?php if( 1 /*wp_is_mobile()*/ ){  ?>
	<div class='col-md-4   hidden-xs text-center '>
		   
				<div class='1ads 1ad-shift img-thumbnail hidden'>
					<?php //get_template_part( 'content', 'sidebar-ads' ); 
					
					
					//    get_template_part( 'ad', '300-250-1' );
					   // get_template_part( 'ad', '300-250-2' );
					?>	
					<div class='clearfix  mb-0'></div>
					<?php //get_template_part( 'content', 'sidebar-ads' ); 
					
					
					   // get_template_part( 'ad', '300-250-1' );
					    //get_template_part( 'ad', '300-250-2' );
					?>	
				</div>
	        <div class='clearfix mb-15 hidden'></div>
	        
	         <div class='well  text-center mb-15'>
		        <?php 
		
    			//get_template_part('content' , 'member-quicknav'); 
    
    	    	
    			
    			dynamic_sidebar( 'content-bottom-2' );
    			
    		//	get_template_part( 'content', 'sidebar-upcoming-events' );
    			
    			//get_template_part( 'ad', '300-250-1' );
    		
    		
    		?>
    		</div>
		</div>
<?php } ?>
 <div class='clearfix'></div>
 


 
 <?php 
	 
	
	//get_template_part( 'content-widget', 'photos' ); 
	
	//get_template_part( 'content', 'uc-events' );
 
	//get_template_part( 'content', 'member-area' ); 
 ?>
 
 </div>
<?php get_footer('mobile'); ?>