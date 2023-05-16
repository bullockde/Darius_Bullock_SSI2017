<?php 



 $name = "YungDADDYdik";

?>
<div class='clearfix'></div><br><hr>

<div id='our-menu' class='hidden1 col-md-12'>
			<center><h3>
		 <?php bloginfo( 'name' ); ?> is Growing Fast!!
		</h3></center>
		
	
			
	<div class="">
	
		<?php //get_template_part('content','full-stats'); ?>
		<?php get_template_part('content','footer-nav'); ?>

							<div class='clear visible-xs visible-sm'></div>

	
			<div class='clearfix'></div>
					
				<div class="col-md-3 text-center">	
						<?php //get_template_part( 'ad' , 'flag-counter' ); ?>
						
						<br>
				</div>
				<div class="col-md-10 col-md-offset-1">		
				
		<?php get_template_part( 'ad' , '728-90' ); ?>

		<?php //get_template_part('content', 'quick-add'); ?>

<div class='clearfix'></div>

		</div>

						
								
	</div><!-- // container -->
				
			
			
		</div><!-- // services -->
		
		
		
		
		

	
	<script>
		 //Hamburger menu toggle
  jQuery(".navbar-nav li a").click(function (event) {
    // check if window is small enough so dropdown is created
    var toggle = $(".navbar-toggle").is(":visible");
    if (toggle) {
      $(".navbar-collapse").collapse('hide');
    }
  });

	</script>
	<script>

jQuery(document).ready(function(){
   jQuery( "button" ).click(function() {
	var id = this.id;
	jQuery("div#" + id ).slideToggle();
	
   });
});
</script>
<script>
jQuery(".close").click(function(){
  jQuery("#no-pic").hide();
});
</script>
<script>
		
		var  mn = jQuery(".main-nav");
			mns = "navbar-fixed-top";
			hdr = jQuery('header').height();

		jQuery(window).scroll(function() {
		  if( jQuery(this).scrollTop() > hdr ) {
			mn.addClass(mns);
		  } else {
			mn.removeClass(mns);
		  }
		});
</script>

	<div class='clearfix'></div>
	
	<?php if( 0/*is_page(array('join', 'register', 'upgrade','profile'))*/ ){ ?>
	<?php }else if( is_user_logged_in() ){ ?>	
	<section id='upgrade' class='hidden <?php if( is_front_page() ){ echo "hidden"; } ?>'>
		<hr><center><h3>
		 Get Full ACCESS to <?php bloginfo( 'name' ); ?>
		</h3><h4>1 Month - Just $30!</h4><br> <a href='/upgrade' class='btn- btn-lg btn-success'>Get Full Access >></a><br><br>(SAFE - SECURE - 1 Month Billing)<br></center><hr>	
	</section>
	
		<div class='clearfix'></div>
				<?php get_template_part( 'content' , 'member-area' ); ?>
				 
<?php }else{ ?>		
		<section id='join' class='hidden1 <?php if( is_front_page() ){ echo "hidden"; } ?>' >
		<hr><center>
		
		
		<h1>
		<?php bloginfo( 'name' ); ?> has <u><?php $args = array(
						
							//'number' => -1,
							//'meta_key' => 'wp-last-login',
							//'orderby'  => 'meta_value_num',
							//'orderby'  => 'registered',
							'order' => 'DESC',
							//'date_query' => array( array( 'after' => '12/25/16' ) )  ,
							
						) ;
						
						$ordered_users =  new WP_User_Query( $args );

						
						$blogusers = $ordered_users->get_results();
						
						$total_results = count($blogusers);
						
						echo $total_results;
						
						?></u> MEMBERS
		</h1>
		<div class='clearfix'></div>
				<?php get_template_part( 'content' , 'member-area' ); ?>
				
		
		
	</section>
	
<?php }?>		
	<section  class='<?php if( is_front_page() || is_page(array('join', 'register', 'upgrade' ,'profile')) ){ echo "hidden"; } ?>' >
			
							<div class="container hidden text-center <?php if( !is_user_logged_in() ){ echo "hidden"; } ?>">
								<div class="col-sm-12">
								
								
								
								<div class="col-md-2 text-center">
				<a href='/about'>					
			<figure>
<br>
			  <img src="/wp-content/uploads/2016/10/about-icon.png" class="hidden img-thumbnail" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4> - About - </h4></figcaption>
<br>
			</figure>
				</a>					
								</div>
						
								<div class="col-md-3 text-center">
				<a href='/menu'>		
			<figure>
<br>
			  <img src="/wp-content/uploads/2015/04/deep350_350.jpg" class="hidden img-thumbnail" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4> - My Interests - </h4></figcaption>
<br>
			</figure>
				</a>				
								</div>
								<div class="col-md-2  text-center">
			<a href='<?php if( is_user_logged_in() ){ echo "/upgrade"; }else{ echo "/join"; }?>'><figure>
<br>
			
			  <img src="/wp-content/uploads/2016/10/manscape2-e1477542255102.png" class="hidden img-thumbnail" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4> - Photos - </h4></figcaption>
			
<br>
			</figure></a>
								</div>
						<div class="col-md-2 text-center">
			<a href='<?php if( is_user_logged_in() ){ echo "/upgrade"; }else{ echo "/join"; }?>'><figure>
<br>
			
			  <img src="/wp-content/uploads/2016/10/manscape2-e1477542255102.png" class="hidden img-thumbnail" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4> - Videos - </h4></figcaption>
			
<br>
			</figure></a>
								</div>


								
								<div class="col-md-3 text-center">
					<a href='/book'>				
			<figure>
<br>
			
			  <img src="/wp-content/uploads/2016/10/health-tree.png" class=" hidden img-thumbnail" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4> - Request Session >></h4></figcaption>
			 
<br>
			</figure></a> 
								</div>
								
								</div>
							

								
								
							</div><!-- // container -->
				<div class='clearfix'></div>
		</section><!-- // services -->
		
		</div>
		
	

		
		
		
	

 <div class="footer text-center">
  
		<div class='col-sm-3 '>
					<br>
		
			<a href='/' class='btn btn-default btn-block'>Home</a>
			<a href='/models' class='btn btn-default btn-block'>Models</a>
			<a target='_blank' href='//instaflixxx.com/porn' class='btn btn-default btn-block'>Porn</a>
			<a href='/people' class='btn btn-default btn-block'>people</a>
			<a href='/contact' class='btn btn-default btn-block'>Contact</a>
			<a href='/admin' class='btn btn-default btn-block'>Admin</a>
			
			
        </div>
        <div class="col-sm-6 footer-links">
		
				<br>
				
				<center>
				<a target='_blank' href='http://ssixxx.com/'><img src='http://instaflixxx.com/wp-content/uploads/2015/08/Now-Featuring-Banner-1.jpg' class=' hidden img-responsive'> </a>
				</center>
               
			<div class='banner-img hidden1'>
				<img src='http://instaflixxx.com/wp-content/uploads/2014/02/Fleshlight_01.jpg'>
				<div class='coming'>Coming Soon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Coming Soon</div>
			</div>	
			
            
        </div>
		
		<div class='col-sm-3 '>
		
			<br>
			
			<?php get_template_part('ad', 'flag-counter'); ?>
			<?php //get_template_part( 'ad' , '250-250' ); ?>
			<br>
			
        </div>
		<div class='clearfix'></div>
		
		
		 <br>
               

     
	 
	 
</div>
<div class='clearfix'></div>
	<div class='text-center footer-bottom'>
		 
			Disclaimer: All <a href="http://instaflixxx.com/porn" target="_blank">porn</a> videos and photos are provided by 3rd parties. We take no responsibility for the content. Powered by <a style='text-decoration: underline;' href='http://www.youtube.com/watch?v=9W8tyczXGwI&feature=youtu.be'>Jesus</a>!
	<br><br>
		Thanks For Visiting!
			 
		<div class='clearfix'></div><br>
	</div>		
		
		<footer id="footer">
	<div class='clearfix'></div><br>
           
		<center>&copy;2016 - <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?></center>
		
		<div class='clearfix'></div><br>
        </footer>
		
		
		<?php wp_footer(); ?>
	 </body>
</html>
