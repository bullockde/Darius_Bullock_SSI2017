<?php
/**
 * Template Name: Fans Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Afterlight
 * @since Afterlight 1.0
 */

 
		if( !isset( $_COOKIE['free-tokens'] ) ){
				$num = 2;
				$current_user = wp_get_current_user(); 
				
				update_user_meta( $current_user->ID, 'MX_user_tokens', $num );
				$tokens = get_user_meta( $current_user->ID, 'MX_user_tokens' ,1);
				setcookie( "free-tokens", $tokens, time() + (86400 * 30), "/");

			}
			
			
get_header('fans'); ?>

<br>
<div class="container-fluid text-center">
	<div class="col-xs-4 col-sm-3">
		<a target="_blank" href="/fans">
			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			<br>
			Home
		</a>
	</div>
	<div class="col-md-3 hidden-xs hidden-sm">
		<a target="_blank" href="/user-profile">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			<br>
			Profile
		</a>


	</div>
	<div class=" col-sm-3 hidden-xs">
		<a target="_blank" href="/favorites">
			<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
			<br>
			Favorites
		</a>
		
	</div>
	<div class="col-xs-4 col-sm-3 col-xs-offset-4 col-sm-offset-0">
		
		<a target="_blank" href="/menu">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			<br>
			Menu
		</a>
	</div>

	<div class="clearfix"></div>
</div>
<br>


<div class="b-profile__header">


	<img src="https://public.onlyfans.com/files/thumbs/w760/f/fs/fsn/fsnqqe4j3dcoeczcchmpnjho0pxqmoxd1587201371/header.jpg" srcset="https://public.onlyfans.com/files/thumbs/w480/f/fs/fsn/fsnqqe4j3dcoeczcchmpnjho0pxqmoxd1587201371/header.jpg 480w,https://public.onlyfans.com/files/thumbs/w760/f/fs/fsn/fsnqqe4j3dcoeczcchmpnjho0pxqmoxd1587201371/header.jpg 760w, https://public.onlyfans.com/files/f/fs/fsn/fsnqqe4j3dcoeczcchmpnjho0pxqmoxd1587201371/header.jpg 600w" sizes="(max-width: 480px) 480px,(max-width: 760px) 760px, 600px" alt="IamYungDADDY" class="b-profile__header__cover-img"><div></div><div class="b-profile__header__cover"><div class="container"><ul class="b-profile__actions"><li class="b-profile__actions__item active"><a href="/iamyungdaddy" class="b-profile__actions__link"><span class="b-profile__actions__count">8</span><span class="b-profile__actions__name"> Posts </span></a></li><li class="b-profile__actions__item"><a href="/iamyungdaddy/photos" class="b-profile__actions__link"><span class="b-profile__actions__count">44</span><span class="b-profile__actions__name"> Photos </span></a></li><li class="b-profile__actions__item"><a href="/iamyungdaddy/videos" class="b-profile__actions__link"><span class="b-profile__actions__count">2</span><span class="b-profile__actions__name"> Videos </span></a></li><!----><!----><li class="b-profile__actions__item"><span class="b-profile__actions__link"><span class="b-profile__actions__count">10</span><span class="b-profile__actions__name"> Likes </span></span></li><!----></ul></div></div>


	<div class="container text-center">
		<div class="col-md-8 col-md-offset-2 profile-stats">

		<div class="col-md-2">
			<div class="clearfix mb-10"></div>
			<?php echo get_avatar($current_user->ID, 150); ?>

		</div>
		<div class="col-md-10">
			<div class="text-left white h4 mb-0">
				<?php 
					if ( is_user_logged_in() ) {
						echo 'Welcome, ' . $current_user->display_name . '!';
					}else{
						?>
						<a href="/add">Join Now - 100% FREE!</a> 
						<?php
					}
				?>
				
			</div>
			
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/blog">
					<span class="h2">189</span><br>
					Blogs
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/photos">
					<span class="h2">23</span><br>
					Photos
				</a>
			</div>
			<div class="col-xs-4 col-sm-3 well h4">
				<a href="/videos">
					<span class="h2">31</span><br>
					Videos
				</a>
				
			</div>
			
			<div class=" col-sm-3 well h4 hidden-xs">
				<a href="/likes">
					<span class="h2">639</span><br>
					Likes
				</a>
			</div>

		</div>
		
		
		</div>

		<div class="clearfix"></div>
	</div>

</div>


<div class='clearfix'></div>

	<div class='well login col-sm-6 text-center col-sm-offset-3 yellow mb-10'>
		
		
		
		
		<?php if( is_user_logged_in() ){ ?>
		<div class='clearfix'></div>




		
			<?php 
			/* get_template_part('content','kings');*/


				$fansKEY = 'MX_user_onlyfans';
				$fans_slug = 'onlyfans';
				$fans_link = '//onlyfans.com/';
				$fans_name = "Add Username";

				if( get_user_meta($current_user->ID, $fansKEY , 1)){ $fans_name = get_user_meta($current_user->ID, $fansKEY , 1); }

				$cashKEY = 'MX_user_cashapp';
				$cash_slug = 'cashapp';
				$cash_link = '//cash.app/';
				$cash_name = "Add Username";

				if( get_user_meta($current_user->ID, $cashKEY , 1)){ $cash_name = get_user_meta($current_user->ID, $cashKEY , 1); }


				$metaKEY = 'MX_user_twitter';
				$post_slug = 'twitter';
				$website_link = '//twitter.com/';


				$tumblr_name = "Add Username";

				if( get_user_meta($current_user->ID, $metaKEY , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				if( get_user_meta($current_user->ID, $post_slug . "_link" , 1)){ $tumblr_name = get_user_meta($current_user->ID, $metaKEY , 1); }
				
				
				if( get_user_meta($current_user->ID, $metaKEY , 1)
					|| get_user_meta($current_user->ID, $post_slug . "_link"  , 1)
				
				 ){  
				 
				 // echo $tumblr_name; 
				$tumblr_name =  str_replace(".","",$tumblr_name);
				 $tumblr_name =  str_replace("tumblr","",$tumblr_name);
				 $tumblr_name =  str_replace("com","",$tumblr_name);


				}

			  ?>



		<div class="social">
				

				<form method="post">
			
				<div class="col-md-4 mb-10 well">
					OnlyFans <br>
					



						 <a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $fans_slug;  ?>.png' width='65' height='65'>
						 </a>
						 
						 <div class="clearfix mb-5"></div>
							<h5 id='<?php echo $fans_name;  ?>' class='walls'><a target='_blank' href="<?php echo $fans_link;  ?><?php echo $fans_name;  ?>" target="_blank"><?php echo $fans_name;  ?></a> </h5>
						 
							<div class="clearfix mb-15"></div>

							<?php if ( !get_user_meta($current_user->ID, $fansKEY , 1) || ( get_user_meta($current_user->ID, $fansKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_onlyfans" placeholder="Username" value="<?php echo $fans_name;  ?>" class="text form-control">
							<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $fans_link;  ?><?php echo $fans_name;  ?>' class='btn btn-block  btn-primary'> Visit Now &raquo; </a>
								<?php
							} ?>

							
						 
						
						
						<div class="clearfix mb-10"></div>
				

				</div>
				<div class="col-md-4 mb-10 well">
					CashAPP <br>
				
					 <a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $cash_slug;  ?>.png' width='65' height='65'>
					 </a>
					 
					 <div class="clearfix mb-5"></div>
						<h5 id='<?php echo $cash_name;  ?>' class='walls'><a target='_blank' href="<?php echo $cash_link;  ?><?php echo $cash_name;  ?>" target="_blank"><?php echo $cash_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>


						<?php if ( !get_user_meta($current_user->ID, $cashKEY , 1) || ( get_user_meta($current_user->ID, $cashKEY , 1) == "Add Username" ) ) {
								?>
								<input type="text" name="MX_user_cashapp" placeholder="Username" value="<?php echo $cash_name;  ?>" class="text form-control">
								<input type="submit" class="submit btn-block" value="Link Now">
								<?php
							}else{

								?>
								<a target='_blank' href='<?php echo $cash_link;  ?><?php echo $cash_name;  ?>' class='btn btn-block  btn-success'> Send / Request &raquo; </a>
								<?php
							} ?>

							

						
					 
					
					
					<div class="clearfix mb-10"></div>



				</div>
				<div class="col-md-4 mb-10 well">
					Twitter <br>
				
					 <a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><img class='img-thumbnail' src='<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $post_slug;  ?>.png' width='65' height='65'>
					 </a>
						<div class="clearfix mb-5"></div>
						<h5 id='<?php echo $tumblr_name;  ?>' class='walls'><a target='_blank' href="<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>" target="_blank"><?php echo $tumblr_name;  ?></a> </h5>
					 
						<div class="clearfix mb-15"></div>
					 

					 <?php if ( !get_user_meta($current_user->ID, $metaKEY , 1) || ( get_user_meta($current_user->ID, $metaKEY , 1) == "Add Username" ) ) {
						?>
						<input type="text" name="MX_user_twitter" placeholder="Username" value="<?php echo $tumblr_name;  ?>" class="text form-control">
			 			<input type="submit" class="submit btn-block" value="Link Now">
						<?php
					}else{

								?>
								<a target='_blank' href='<?php echo $website_link;  ?><?php echo $tumblr_name;  ?>' class='btn btn-block  btn-primary'> Visit Twitter &raquo; </a>
								<?php
							} ?>

					 	
					
					
					<div class="clearfix mb-10"></div>

					</div>

					




			


		

					<div class='clearfix'></div>
					<input type='hidden' name='edit_profile' value='true'>

				</form>
		
		</div>
		
		
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<div class=" porn well">
									<center>
								
								
								<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
								
								<?php
								
									echo get_avatar($current_user->ID, 150);

								//	print_r($user);
								
					
									?>
									<br>edit photo
									</a>
									</center>
								</div>
								
								<div class='clearfix'></div>
								
								<?php 
								
								
									$admin_user = 0;
										$allowed_roles = array('editor', 'administrator');
									if ( is_user_logged_in() && array_intersect($allowed_roles, $current_user->roles ) ) {
										$admin_user = 1;
										
									}
														
								
								if( ($userid == $current_user->ID) || $admin_user ){ ?>
								<a href='/kik-edit/' class='btn btn-warning btn-block hidden'>Edit Profile</a>
								<div class='clearfix'></div>
								<?php } ?>
								<a target='_blank' href='/mailbox/?pmaction=newmessage&to=<?php echo $user->ID; ?>'><div class='pmessage btn-danger btn-lg upper bold white hidden'>Private Message</div></a>
		</div>
		<div class='col-sm-6 text-center'>
			
			
			
			<div class="clearfix mb-15"></div>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php 
				if( get_user_meta($current_user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_age' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			<div class=' col-xs-6'>
				Ht:
			</div>
			<div class=' col-xs-6'>
				<?php //echo get_user_meta($userid, 'MX_user_height', 1);
				
				if( get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) ){
						echo get_user_meta($current_user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($current_user->ID, 'MX_user_height_in' , 1) . '"' ;
				}else{
							echo '-';
				}
				?>
				
				
			</div>
			<div class=' col-xs-6'>
				Wt:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
				if( get_user_meta($current_user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($current_user->ID, 'MX_user_weight' , 1);
				}else{
							echo '-';
				}
				?>
			</div>
			
			<div class='clearfix'></div><br>
			
				<div class='text-center '>
				Location<br>
				<b><?php 
				
					$closet = 0;
								if ( get_user_meta($current_user->ID, 'MX_user_city', 1 ) && get_user_meta($current_user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($current_user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($current_user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($current_user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($current_user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
								
			?></b>
			</div>




			<div class="btn-group btn-group-justified text-center ">
				<div class='clearfix'></div><hr class=' mb-10'>
				<center>
					<a href="/edit-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-default">Edit Profile</a>
					<a  href="/user-profile/?ID=<?php echo  $current_user->ID; ?>" class="btn btn-info">View Profile</a>
				</center>
		
			</div>
		

			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'client_phone', true));
			if(strlen($phone) === 10) {
				$country = 1;
				$area = substr($phone, 0, 3);
				$first = substr($phone, 3, 3);
				$last = substr($phone, 6, 4);
				
				$phone =  $country . "-" . $area . "-" . $first . "-" . $last;
				$name = get_the_title();
				
				
				array_push($names, $name );
				array_push($numbers, $phone );
				echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?>
			
		
				
			
			
			
		</div>
		<div class='clearfix'></div>
		
		<a href='/members' class='btn btn-block btn-primary btn-lg hidden1'>> All Members <</a>
		
	</div>
	
		
				<?php //get_template_part( 'ad', '300-250-1' );
				?>

			
				
		<?php }else{ ?>
	
				
				<?php echo do_shortcode(" [wpmem_form login] "); ?>
				
				
				<div class="or">or</div>
				
				<?php echo do_shortcode(" [wpmem_form register] "); ?>
				
		<?php } ?>



	</div>


<div class="clearfix"></div><hr>
	<h2 class="text-center">Most Recent</h2>
<hr>










<div id="primary"  class=''>
		<?php
			if( $_COOKIE['free-tokens'] <= 2 ){
				//echo $_COOKIE['free-tokens'];
				
				?>
				<span class='alert-success alert btn-block text-center hidden'> Congrats! - You Just Earned (2 FREE Tokens) </span>
				
				<?php
				
			}
		?>
				
			<br>
			<?php //the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
			<div class='col-md-8 col-md-offset-2'>

<?php

	if( is_page('tour') ){ $args = array( 'order' => 'ASC' ,'post_type' => 'ssi_videos', 'posts_per_page' => -1 , 'category_name' => 'homepage'  ); }
	else{ $args = array( 'post_type' => 'ssi_videos', 'posts_per_page' => 1  ); }
		
		$skipped = 0;

		$leads = get_posts( $args );

		//print_r( $leads );
		foreach( $leads as $lead ){
			
			//if( !is_user_logged_in() && get_field( 'member_level', $lead->ID ) != 'Public' ){ $skipped++; continue; }

	?>
	
		<div class='video-set well'>
			<div class=' 1text-center'>
			
				<div class="col-xs-11">
					<h4> <a target="_blank" href="/?p=<?php echo  $lead->ID; ?>" ><?php  echo $lead->post_title; ?> </a> </h4>
				</div>
				<div class="col-xs-1 text-right">
					
					<a href="/like"><span class="glyphicon glyphicon-heart-empty " aria-hidden="true" ></span></a>
				</div>
				<div class="clearfix mb-10"></div>



				<a target="_blank" href="/?p=<?php echo  $lead->ID; ?>" >
				<div class='col-xs-12 text-center'>
					<?php
									if(get_field('youtube_id', $lead->ID)){
							?>
								<img src="http://img.youtube.com/vi/<?php echo get_field('youtube_id', $lead->ID); ?>/0.jpg" alt="Youtube Image"  class="1circle img-thumbnail img-responsive" width="100%">
							<?php
							
						}else if( has_post_thumbnail() ) { //the post does not have featured image, use a default image
							$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'large' );

							?>
								<img src='<?php echo esc_attr( $thumbnail_src[0] ) ; ?>' alt='Youtube Image'  class='circle img-responsive' width='100%'>
							<?php
							echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
						}

					?>

			
				</div>
			
			</a>
			



					
				
			
			<div class=' hidden' >
			<?php 
				

					if ( has_post_thumbnail( $lead->ID ) ) {
    					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $lead->ID ), 'large' );	
						
   						if ( ! empty( $large_image_url[0] ) ) {
        						echo '<a href="' . esc_url( $large_image_url[0] ) . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '">';
        						//echo get_the_post_thumbnail( $lead->ID, 'large' ); 
        						echo '</a>';

   					 	}
					}
				
				?>
				</div>
				<div class="container-fluid">
					<a href="/?p=<?php echo $lead->ID; ?>"> <img src="<?php echo esc_url( $large_image_url[0] ); ?>" class="img-responsive img-thumbnail" width="100%"></a>
				</div>
			</div>

			<div class='col-md-12'>
					<div class='visible-xs'></div>
				
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
		}// #END forach
	?>

	<div class="clearfix"></div><br>
	
	<?php 	if( is_user_logged_in() ){ 

		?>
		<a href='/upgrade' class='btn home btn-lg btn-success btn-block hidden1'><br>View Profile &raquo;<br><br></a>
		<?php
	}else{
		
		?>
		
		<a href='/trial' class='btn home btn-lg btn-danger btn-block hidden'><?php 
	
	
	$count_posts = wp_count_posts('ssi_videos');

	$published_posts = $count_posts->publish;
	
	echo "<u>" .  $published_posts . "</u> Member Videos" ;?> >></a>
		<a href='/upgrade' class='btn home btn-lg btn-success btn-block hidden'>View Profile &raquo;</a>
		<br>
		
		<div class="text-center">
			<?php  get_template_part( 'content', 'member-area' ); ?>
		</div>
		<?php
		
		
	} ?>
	
	
	
	
	
	
	<div class="clearfix"></div><br>
	<?php 
	echo "</div>";


?>
<div class='col-md-12 text-center'>

<!--<a href='/party/'><img src='http://ssixxx.com/wp-content/uploads/2016/08/SSIxXx-Party-Sept-2016-vote-2.png'></a><br><br>-->


<!--    <a href="http://www.ssixxx.com/ks"><img class="size-full wp-image-10826 aligncenter" src="http://shamanshawn.com/wp-content/uploads/enter-here-button.jpg" alt="SSIxXx_5_20_16-2" width="449" height="318" /></a>-->
<br>

	



	<div class=' well hidden'>Show Your Support ;-)</div>
	<?php //get_template_part( 'content', 'donate' ); ?>
	
	<div class="clearfix"></div>
	
	<a href='/book/' class='btn btn-default hidden'> Request A Session >></a>  

</div>


	
</div><!-- .content-area -->
<div class="clearfix"></div>
<?php  ?>

<div class="clearfix"></div>
<?php 
	get_footer("preview"); 
?>