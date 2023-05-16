<?php 
/*
Template Name: Users Page
*/




get_header(); ?>
    


<div id='video-choice'></div>
    <div class="main home-beta">
    
        <div class="site-container">
			<div class='home-beta column left'>
			
				<?php// include('new-left-sidebar.php'); ?>
				
			</div>
            <div class="main-content">
                
				



<div>

<?php include('members-search.php'); ?>
				
</div>				
	
				
				
				
				
				<div>
				
				
				
				
					<?php
						
						
						
						
						$users = get_users( array( 'fields' => array( 'ID' ) ) );
						foreach($users as $user_id){
								print_r(get_user_meta ( $user_id->ID));
								$user = get_user_by('ID', $user_id->ID);
								echo $user->display_name;
								echo "<br>";
								echo $user->user_email;
								echo "<br>";
								echo $user->first_name;
								echo "<br>";
								echo $user->last_name;
								echo "<br>";
								//echo $user->user_password;
								echo "<hr>";
								
								
								// Create post object
								$my_post = array(
								  'post_title'    => $user->display_name ,
								  'post_content'  => $user->display_name,
								  'post_status'   => 'publish',
								  'post_author'   => 1,
								  'post_type'     => 'ssi_contacts',
									'meta_input'    => array(
										array(
											'key'   => 'MX_user_email',
											'value' => $user->user_email
										),
										array(
											'key'   => 'MX_user_first_name',
											'value' => $user->first_name
										),
										array(
											'key'   => 'MX_user_last_name',
											'value' => $user->last_name
										)
									)
								  //'post_category' => array( 8,39 )
								);
								 
								// Insert the post into the database
								$new_post = wp_insert_post( $my_post );
								
								update_field( 'MX_user_email' , $user->user_email , $new_post );
								update_field( 'MX_user_first_name' , $user->first_name , $new_post );
								update_field( 'MX_user_last_name' , $user->last_name , $new_post );
							}
							
	
	
						$total_users = count_users();
						$total_users =  $total_users['total_users'];
						
						
						$paged = get_query_var('paged');
						
						$number = 30;
						
						
						$pages = floor($total_users / $number);
						
						$args = array(
						
							//'blog_id' => '1',
							'orderby' => 'registered',
						//	'order' => 'DESC',
						//	'offset' => $paged ? ($paged * $number) : 0,
							//'number' => $number
						
						);
						
					//	$blogusers = get_users( $args );
						$count = 0;
						
						
						foreach ($blogusers as $user) {
						
							if ( $count < 500 ){
								if(userphoto_exists($user)){
									echo '<div id="user">' ;
										echo '<div class="link"> <a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '">' . $user->display_name . "</div>";
										userphoto($user->ID, '', '', array(style => 'height: 96px; width:96px;') ) . "<br>";
										//echo "Member Since<br>" . mysql2date('M j, Y', $user->user_registered );
									$last_login = (int) get_user_meta( $user->ID, 'wp-last-login' , true );
										if ( $last_login ) {
											$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
											$value  = date_i18n( $format, $last_login );
											echo "Last Logged In<br>" . $value;
										}else{
											echo "Last Logged In<br> Never";
										}
									
									echo '</a></div>';
									$count++;
								}else if ( 1 /*validate_gravatar($user->user_email )*/ ){
									echo '<div id="user">' ;
										echo '<div class="link"> <a href="http://instaflixxx.com/user-profile/?ID=' . $user->ID . '">' . substr($user->display_name, 0, 10) . "</div>";
										echo get_avatar($user->ID, 96) . "</a><br>";
										//echo "Member Since<br>" . mysql2date('M j, Y', $user->user_registered );
										$last_login = (int) get_user_meta( $user->ID , 'wp-last-login' , true );
										if ( $last_login ) {
											$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
											$value  = date_i18n( $format, $last_login );
											echo "Last Logged In<br>" . $value;
										}else{
											echo "Last Logged In<br> Never";
										}
									
									echo '</div>';
									$count++;
								}else{}
							}else break;
						 
						}
					?>
				</div>
				
				<div class="paginator">
                    
                        <?php if (function_exists("pagination")) {
    
                                pagination($pages);
                            
                            } ?>

                    </div>
				
				
				
				
            <?php if(have_posts()) { ?>
                    
 <!--                 <h2 class="post-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php wp_title(); ?></h2>
                 
              <div class="post-date">Added <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></div>
 -->                   
                <?php while (have_posts()) : the_post(); ?>                    
                
                <div class="single-post" id="post-<?php the_ID(); ?>">
                        
                    <?php the_content(); ?>

                </div>
                    
                <?php endwhile; ?>
                    
                <div class="clear"></div>
                    
                <?php /*comments_template();*/ ?>
                
 <!--               <h2 class="post-title">Related videos</h2>
                
                <?php $args = array( 'numberposts' => 6, 'orderby' => 'rand' );

                $rand_posts = get_posts( $args );

                foreach( $rand_posts as $post ) : ?>
            
                <div class="post" id="post-<?php the_ID(); ?>">
                    
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(240,180), array('alt' => get_the_title(), 'title' => '')); ?></a>
                    
                    <?php if ( get_post_meta($post->ID, 'duration', true) ) : ?><div class="duration"><?php echo get_post_meta($post->ID, 'duration', true) ?></div><?php endif; ?>

                         <div class="post-ad">      
<!-- BEGIN Ad Tag ->
<script type="text/javascript" src="http://syndication.exoclick.com/ads.php?type=250x60&login=pussynomo&cat=2&search=&ad_title_color=2F2F59&bgcolor=EAEAEA&border=0&border_color=000000&font=&block_keywords=&ad_text_color=600cc0&ad_durl_color=2F2F59&adult=0&sub=&text_only=1&show_thumb=&idzone=671527&idsite=180746"></script>
<noscript>Your browser does not support JavaScript. Update it for a better user experience.</noscript>
<!-- END Ad Tag ->
			</div>    
                        
                    <div class="link"><a href="<?php the_permalink() ?>"><?php short_title('...', '25'); ?></a></div>
                    
                    <span>Added: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>
                        
                    <span><?php the_tags('Tags: ', ', ', ''); ?></span>
                    
                </div>

            <?php endforeach; ?>
 -->  
 
 
 
            <div class="clear"></div>
                    
                <?php }
        
                else { ?>
        
                    <h2>Sorry, no posts matched your criteria</h2>
        
                <?php } ?>
     
            </div>
			
			
	
            
            <?php// get_sidebar('left'); ?>
         
        </div>
        
        <?php// get_sidebar('right'); ?>
        
        <div class="clear"></div>
        
    </div>
    
<?php get_footer(); ?>
