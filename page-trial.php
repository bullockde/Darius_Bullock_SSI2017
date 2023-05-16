<?php get_header('no-login'); 




?>
   <br><br>
    <div class="main container1 col-md-6 col-md-offset-3">
    
        <div class="well 1yellow pay">
		
            <?php if(have_posts() && is_user_logged_in() ) { ?>
			
			<?php 
						$current_user = wp_get_current_user();
					?>
			<?php
				if($_GET['update_user'] == 'contributor' /*&& $_GET['store_name'] == 'Stripe Payment'*/ ){

					

				wp_update_user( array( 'ID' => $current_user->ID, 'role' => $_GET['update_user'] ) );

				echo "<h1 class='text-center'>Enjoy 1 Day - 100% FREE!</h1><h3 class='text-center'>USER STATUS UPDATED!!</h3>";
				?>
				<br>
					<h3 class="text-center">Current Member Level<br>
					
					
					<span style="text-decoration: underline; text-transform: Capitalize; font-size: .7em;"><?php echo $current_user->roles[0];
					?></span></h3>
					
					
					<br><br>
					<center>
					<a href="/profile" class="button btn btn-success btn-lg text-center">Enter Site >></a>
					</center>
					<?php
					//$funnel = "/the-vault/";
		
					//wp_redirect($funnel);
					//exit;	
					
					
					
					
					
					
				}else{
			?>
                    
                <h2 class="post-title hidden"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php wp_title(); ?></h2>
                    
                <!--<div class="post-date">Added <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></div>-->
                    
                <?php while (have_posts()) : the_post(); ?>                    
                <div class="single-post text-center " id="post-<?php the_ID(); ?>">
                        
						<br>
						
						
						<?php 
						
							$_POST['dollars'];
							$_POST['cents'];
							
							$amount = $_POST['dollars'] . $_POST['cents'];
							
							$amount  = 100;
							$_POST['dollars'] = 1;
							$_POST['cents'] = 00;
							
							if(1 /* isset($_POST['dollars'])*/ ){ 
							
								//echo "AMOUNT = " . $amount;
								?> 
								
								<div class="col-md-8 col-md-offset-2">
									<center>
									
									
									<h4>Safe, Secure, Discreet Billing</h4><br>
									
									<img src='<?php echo get_stylesheet_directory_uri(); ?>/pix/payment-logo.png' class='img-thumbnail'><br>
									</center>
									<!--<h4><?php
									//echo "Premium Membership - 1 Day Trial<br><br> $" . $_POST['dollars'] /*. "." . $_POST['cents']*/  . " Donation  "; 
									
									echo "Premium Membership - 1 Day Trial<br><br> $" . $_POST['dollars'] /*. "." . $_POST['cents']*/  . " Donation  "; 
									?>
									</h4>-->
									
									<br><h4>1 Day Trial - 100% FREE!</h4>
									<small>(Full Access)</small><br><br>
									<a href="?update_user=contributor" class="btn btn-success btn-lg">FREE 1 Day Trial &raquo;</a><br><br>
									<?php
									
									//echo do_shortcode('[stripe name="Stripe Payment" success_redirect_url="?update_user=contributor" description="1 Day Trial - YD" amount="' . $amount . '"]');
									?>
								</div>	
								<?php
							}else{
								?> 
								<h3>Online Payment Gateway</h3>
								<img src='<?php echo get_stylesheet_directory_uri(); ?>/pix/payment-logo.png' class=''>
								
								<h4>Enter Amount to Pay:</h4>
						<form method="post">
							$<input type="number" name="dollars" placeholder="00" min="00" max="9000" value="00">.<input type="number" name="cents" placeholder="00" value="00" step="01" min="00" max="99">
							<input type="submit">
						</form>
								
								<?php
							}
						?>
						<br>
                    <?php //the_content(); ?> 

                </div>
                <?php endwhile; 
				}
				?>
                    
				
                <?php }else { ?>
				
				
					
					<div class='clear text-center'>
						<h4>You must be LOGGED-IN to UPGRADE</h4><br>
					</div>
						
					 <div class="single-post text-center col-md-8 col-md-offset-2 well" id="post-<?php the_ID(); ?>">

						
						<div class='clear'></div>
						<?php  
						echo do_shortcode('[wpmem_form login]');
						//wp_login_form(); ?>
					</div>
                <?php } ?>
       
           
            <div>
				<?php //get_sidebar('right'); ?>
			</div>
       
        
        
		                <div class='container hidden text-center'> 

<div class="page-header " id="pricing">

                                                                      <h2>Simple Pricing! </h2>
                                                                </div>
                        <div class="col-md-4">
  <ul class="price">
    <li class="header">1 Day</li>
    <li class="grey">$1</li>
 

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div><div class="col-md-4">
  <ul class="price">
    <li class="header">1 Week</li>
    <li class="grey">$5</li>
  

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div><div class="col-md-4">
  <ul class="price">
    <li class="header">1 Month</li>
    <li class="grey">$20</li>
  

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div>

</div>
<div class='clear'></div>
        </div>
        <div class="clear"></div>
        
    </div>
    <div class='clear'></div><br>

<?php get_footer('trial'); ?>
