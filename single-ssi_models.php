<?php get_header('no-login'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id='blog' class='red-bg well yellow'>
	<div class='container '>
		
		<div class='col-sm-6 text-center'>
			<br><br>
		
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array('class' => 'img-responsive aligncenter img-thumbnail','alt' => get_the_title(), 'title' => '')); ?></a>
		</div>
		<div class='col-sm-6 text-center'>
			<br><br>
			<div class='visible-xs'><br></div>
			<h2 class="post-title text-center hidden"><?php the_title(); ?></h2>
			<div class=' col-xs-6'>
				<b>Age:</b>
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_age', true) ?>
			</div>
			<div class=' col-xs-6'>
				<b>Height:</b>
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_height', true) ?>
			</div>
			<div class=' col-xs-6 '>
				<b>Weight:</b>
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_weight', true) ?>
			</div>
			
			<div class='clear'></div><br><br>
			<div class='text-center'>
				<b><u>Location</u></b> <br><?php echo get_post_meta($post->ID, 'ad_city', true) ?>, <?php echo get_post_meta($post->ID, 'ad_state', true) ?><br><br>
				
				<b><u>Services</u></b> <br><?php $services = get_post_meta($post->ID, 'service_recieved');
						foreach($services as $service) echo $service . "<br>";
				?>
			</div>
			<!--
			Services:<br><br>
			
			Rates:<br>
			-->
		</div>
		<div class='clear'></div>
	</div>
</section>   

<div class='clearfix'></div>
    <div class="main">

        <div class="container single ">
		

            <div class="posts">
			<div class="row">
			
				<div class=" col-sm-8  well green ">
					<p><?php the_content(); ?></p>
				</div>
				
				<div class="col-sm-4 text-center">
				
					<?php get_template_part( 'content', 'sidebar-ads' ); ?>				
				</div>
			</div>
			<div class="clear"></div>
                
            <div class="single-post ">
                        
                
                
                <div class="clear"></div>
                        
                <div class="video-category hidden">Category: <?php the_category(', ') ?></div>
                        
                <div class="video-tags"><?php the_tags() ?></div>
                        
                <div class="clear"></div>
				<div class="post-date hidden">Added <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?><?php if ( get_post_meta($post->ID, 'duration', true) ) : ?> | Duration: <?php echo get_post_meta($post->ID, 'duration', true) ?> mins<?php endif; ?></div>
                    <div class="clear"></div>
            </div>
            
            <?php //comments_template(); ?>

            <div class="clear"></div>
            
            <?php endwhile; else: ?>
            
            <h2>Sorry, no posts matched your criteria</h2>
            
            <?php endif; ?>
                 
            <div class="clear"></div>
       
            </div>
			
        </div>

        <div class="clear"></div>
		
		<?php if( is_single('shawn') ){ get_template_part('content' , 'owner-menu'); } ?>
        
    </div>
	<section id='instagram'  class='red-bg <?php if( !is_single('shawn') ){ echo "hidden" ; } ?>'>
		
		<div class='container text-center hidden'>
		<div class="page-header" id="feeback">
						<h2>InstaGram Feed </h2>
		</div>
		<?php echo do_shortcode('[instagram-feed]');?> 
		
		</div>
	</section>
	
    <section id='blog' class='red-bg hidden'>
	<div class='container'>
			<div class="text-center">
				<h2>Explore More:</h2><br>
			</div>
			<div class="well text-center">
					
					<?php
$args = array( 'posts_per_page' => 4 , 'orderby' => 'rand');

	
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			
				<a href="<?php the_permalink(); ?>">
					<div class='col-md-3 blog-post'>
						<?php 
						  the_post_thumbnail('thumbnail', array( 'style' => 'width: 150px; height: 150px;' ,'class' => 'img-responsive aligncenter','alt' => get_the_title(), 'title' => ''));
						
						the_title(); ?>
						
						<div class='visible-xs visible-sm'><hr></div>
					</div>
				</a>
			
		<?php
			
			
		endforeach; 
		wp_reset_postdata();?>
		<div class='clear'></div>
			
			<div class='blog-post'>
				<a href='/ads' class='btn btn-lg btn-danger'>View All Ads >></a>
			</div>
			
		</div>
	</div><!-- // container -->		
</section><!-- // Blog SPace -->
<?php get_footer(); ?>