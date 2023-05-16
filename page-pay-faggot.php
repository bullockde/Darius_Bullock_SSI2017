<?php 

$pg = "http://www.poweredbyliquidfire.mobi/redirect?sl=16&t=dr&track=34166_208381&siteid=208381"; wp_redirect($pg); exit;

get_header(); ?>
   
    <div class="main">
    
        <div class="container">
		
            <?php if(have_posts()) { ?>
                    
                <h2 class="post-title hidden"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php wp_title(); ?></h2>
                    
                <!--<div class="post-date">Added <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></div>-->
                    
                <?php while (have_posts()) : the_post(); ?>                    
                
                <div class="single-post text-center h1" id="post-<?php the_ID(); ?>">
                        
						
						
						
						<?php 
						
							$_POST['dollars'];
							$_POST['cents'];
							
							$amount = $_POST['dollars'] . $_POST['cents'];
							
							
							
							if( isset($_POST['dollars']) ){ 
							
								//echo "AMOUNT = " . $amount;
								?> 
								<h2>Online Payment Gateway</h2>
								<img src='/wp-content/uploads/2016/11/stripe-gateway.png' class='img-responsive'><br><br>
								<?php
								echo "<h1>PAY $" . $_POST['dollars'] . "." . $_POST['cents'] . "</h1><br>";
								echo do_shortcode('[stripe name="Stripe Payment" description="Online Booking" amount="' . $amount . '"]');
							}else{
								?> 
								<h2>Online Payment Gateway</h2>
								<img src='/wp-content/uploads/2016/11/stripe-gateway.png' class='img-responsive'>
								<small>($5 processing fee)</small><br><br>
								<h1>Enter Amount to Pay:</h1>
						<form method="post">
							$<input type="number" name="dollars" placeholder="00" min="00" max="9000" value="00">.<input type="number" name="cents" placeholder="00" value="00" step="01" min="00" max="99">
							<input type="submit">
						</form>
								
								<?php
							}
						?>
						<br>
                    <?php the_content(); ?> 

                </div>
                    
                <?php endwhile; ?>
                    
                <div class="clear"></div>
				
				
      <!--
                <?php $args = array( 'numberposts' => 6, 'orderby' => 'rand' );

                $rand_posts = get_posts( $args );

                foreach( $rand_posts as $post ) : ?>
            
                <div class="post" id="post-<?php the_ID(); ?>">
                    
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(240,180), array('alt' => get_the_title(), 'title' => '')); ?></a>
                    
                    <?php if ( get_post_meta($post->ID, 'duration', true) ) : ?><div class="duration"><?php echo get_post_meta($post->ID, 'duration', true) ?></div><?php endif; ?>
                        
                    <div class="link"><a href="<?php the_permalink() ?>"><?php short_title('...', '34'); ?></a></div>
                    
                    <span>Added: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span>
                        
                    <span><?php the_tags('Tags: ', ', ', ''); ?></span>
                    
                </div>

            <?php endforeach; ?>
            
            <div class="clear"></div>
                    
                <?php }
        
                else { ?>
        
                    <h2>Sorry, no posts matched your criteria</h2>
        
                <?php } ?>
       --> 
           
            <div>
				<?php //get_sidebar('right'); ?>
			</div>
       
        
        
		
        </div>
        <div class="clear"></div>
        
    </div>
    <div class='clear'></div><br>
	 
<?php get_footer(); ?>
