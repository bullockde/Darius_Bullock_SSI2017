<?php get_header('new-network'); 


?>
   
    <div class="main">
    
        <div class=" pay">
		
            <?php if(have_posts() && is_user_logged_in() ) { ?>
			
			
			<?php
				if($_GET['update_user'] == 'contributor'  ){

					$user = wp_get_current_user();
					//print_r($user->ID);

				wp_update_user( array( 'ID' => $user->ID, 'role' => $_GET['update_user'] ) );

				echo "<h1 class='text-center'>Thanks for Your Payment! </h1><h3 class='text-center'>USER STATUS UPDATED!!</h3>";}
			?>
                    
                <h2 class="post-title hidden"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php wp_title(); ?></h2>
                    
                <!--<div class="post-date">Added <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></div>-->
                    
                <?php while (have_posts()) : the_post(); ?>                    
                <div class="single-post text-center " id="post-<?php the_ID(); ?>">
                        
						
						
						
						<?php 
						
							$_POST['dollars'];
							$_POST['cents'];
							
							$amount = $_POST['dollars'] . $_POST['cents'];
							
							$amount  = 3000;
							$_POST['dollars'] = 30;
							$_POST['cents'] = 00;
							
							if(1 /* isset($_POST['dollars'])*/ ){ 
							
								//echo "AMOUNT = " . $amount;
								?> 
								
								<br><br>
								<center>
								<h4>Safe, Secure Discreet Billing</h4>
								<img src='<?php echo get_stylesheet_directory_uri(); ?>/pix/payment-logo.png' class=''><br>
								</center>
								
								<?php
								echo "<h4>$" . $_POST['dollars'] /*. "." . $_POST['cents']*/  . " - 1 Month Pass</h4><small>(Full Access - No Rebill)</small><br><br>";
								echo do_shortcode('[stripe name="Stripe Payment" success_redirect_url="?update_user=contributor" description="VIP Membership - YD" amount="' . $amount . '"]');
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
					<!--	<br><hr>
						<center>or</center>
						<h3>$25 - Monthly Membership</h3>
                    <?php the_content(); ?> 
					-->
                </div>
                <?php endwhile; ?>
                    
                    
                <?php }else { ?>
					<div class='clear'></div>
					 <div class="single-post text-center " id="post-<?php the_ID(); ?>">

						<h3><u>You must be a Member to Upgrade!</u></h3><br>
						<div class='clear'></div>
						<?php  
						echo do_shortcode('[wpmem_form login]');
						//wp_login_form(); ?>
					</div>
                <?php } ?>
       
           
            <div>
				<?php //get_sidebar('right'); ?>
			</div>
       
        
        
		                <div class='container hidden'> 

<div class="page-header text-center" id="pricing">

                                                                      <h2>Simple Pricing! </h2>
                                                                </div>
                        <div class="columns">
  <ul class="price">
    <li class="header">1 Day</li>
    <li class="grey">$5</li>
 

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div><div class="columns">
  <ul class="price">
    <li class="header">1 Week</li>
    <li class="grey">$10</li>
  

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div><div class="columns">
  <ul class="price">
    <li class="header">1 Month</li>
    <li class="grey">$25</li>
  

    <li class="grey"><a href="/book" class="button">Book >></a></li>
  </ul>
</div>

</div>
<div class='clear'></div>


        </div>
        <div class="clear"></div>
        
    </div>
	<center>
	<div class='clear'></div>- or -<br><br>
	<a href='/'>< Return Home</a></center>
    <div class='clear'></div><br><br><br>

<?php get_footer('dom'); ?>
