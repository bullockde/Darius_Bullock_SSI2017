<?php 


$user = wp_get_current_user(); 
		$user_role = $user->roles[0];
		$post_type = get_post_type();
		
		
		if( $user_role == 'administrator' ){ $user_role = 'contributor'; }
		//echo "ROLE --> " . $user_role;
		
		//echo "Post Type --> " . $post_type;
		
		if( is_single() && ( $post_type == ('ssi_photos' || 'ssi_videos') ) ){ 
			
			//echo "YES"; 
			
			//$level = get_post_meta(  'member_level'  );
			$level = get_field( 'member_level' );
			if(get_field( 'preview_content' )){ $level = "Preview"; }
			//$preview = get_field( 'preview_content' );
			
			
			if( $level == 'Premium' && $user_role != 'contributor' ){ $pg = "/trial/"; wp_redirect($pg); exit;  }
		}
	

if(isset($_GET['update_post'])){ 
	
	$ID = $post;
	$ID = get_post( $_GET['ID'] );
	
	wp_update_post($ID); 
}
if(isset($_GET['make_draft'])){
	
	$ID = $post->ID;
	$ID = $_GET['ID'];
	
	 $my_post = array(
      'ID'           => $ID,
      'post_title'   => get_the_title($ID),
     'post_content' => get_the_content($ID),
	  'post_status' => 'draft'
  );

// Update the post into the database
  wp_update_post( $my_post );
	
}

get_header('login'); 

wp_reset_query(); 

global $post;
?>

<div class="clearfix">	</div>
<br>


	<div class='col-md-8'>

		<?php get_template_part( 'content', 'video' ); ?>
							
							
		<?php get_template_part( 'content', 'under-video' );
//echo "Level ->" . $level; 

		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
	if ( is_user_logged_in() && array_intersect($allowed_roles, $user->roles ) ) {
		?>
		
		
		<div class="admin well">
				<br><center>
				<a href='/admin-modified' class='btn'><< Admin</a>
				<a href='?update_post=1' class='btn'>Update Post</a>
				<a href='?make_draft=1' class='btn'>Delete</a>
				</center>
		
		
					<?php 
						wp_reset_query();
	
					$gay_vids = get_posts( array (  'posts_per_page' => 1 , 'orderby' => 'modified' , 'order' => 'asc') );

					// The Loop
				foreach( $gay_vids as $post ): setup_postdata($post); 
		
						//if( wpmd_is_device() ) $mobile = 1; 		
					?>
					<div class="posts col-sm-4 col-md-3">
					<?php //get_template_part( 'content', 'post' ); ?>
					<center><?php //echo get_the_modified_date( $d, $post ); ?></center>
					</div><br>
	
			<?php  endforeach; //end FOR EACH ?>
				<div class='clear'></div>	<br>
		</div>
			
			
	<?php }
			wp_reset_query();
		?>
		
		
	</div>
	<div class='col-md-4'>
		<?php //get_template_part( 'ad', '300-250-1' ); ?>
		<?php //get_template_part( 'ad', '300-250-2' ); ?>

		<div class='clearfix'></div>

		<div class='well green 1img-thumbnail'>

				<h3>Photo Gallery</h3>
				<div class='clearfix mb-10'></div>
				<div class='1col-md-12 1img-thumbnail'>
					<?php //get_template_part('content', 'user-gallery'); 
					?>
				</div>
				<div class='clearfix'></div>
		</div>
			

		<div class='clearfix'></div>			
		<?php get_template_part( 'content', 'sidebar-ads' ); ?>
	</div>
		<div class='clear'></div>	<br>
	

		<?php get_template_part( 'content', 'related-videos' ); ?>

<div class='clear'></div>	<br>


<?php get_footer('preview'); ?>