		<div class="clear"></div>
		
		

<?php //get_template_part('content' , 'full-stats'); 
?>



		<div class='clearfix'></div>

		

			
	<?php //get_template_part('content', 'companions-tagline'); 
	?>

	<?php //get_template_part('content', 'member-area');
	?>
	
	
	
	<div class='clearfix'></div>
	
	<?php //get_template_part('content', 'full-stats'); 
	?>
	
	
	
	
	    <div class="sr-root hidden">
      <div class="sr-main" style="display: flex;">
        <header class="sr-header">
          <div class="sr-header__logo"></div>
        </header>
        <div class="sr-container">
          <section class="container basic-photo">
            <div>
              <h1>Basic subscription</h1>
              <h4>Get 1 DAY FREE | Then JUST $1/Day</h4>
              <div class="pasha-image">
                <img
                  src="https://picsum.photos/280/320?random=4"
                  width="140"
                  height="160"
                />
              </div>
            </div>
            <button id="basic-btn">$1.00 per day</button>
          </section>
          <section class="container pro-photo">
            <div>
              <h1>Pro subscription</h1>
              <h4>3 photos per month</h4>
              <div class="pasha-image-stack">
                <img
                  src="https://picsum.photos/280/320?random=1"
                  width="105"
                  height="120"
                  alt="Sample Pasha image 1"
                />
                <img
                  src="https://picsum.photos/280/320?random=2"
                  width="105"
                  height="120"
                  alt="Sample Pasha image 2"
                />
                <img
                  src="https://picsum.photos/280/320?random=3"
                  width="105"
                  height="120"
                  alt="Sample Pasha image 3"
                />
              </div>
            </div>
            <button id="pro-btn">$14.00 per month</button>
          </section>
        </div>
        <div id="error-message"></div>
      </div>
    </div>
	
	
	
	
	<div class='1dash header bg-blue pb-5 hidden'>	
	
	
	
	<?php if( 1 /*!is_page('party')*/ ){ ?>	

		
	

	 <div id='header-categories' style='display: block;' class='text-center '>
		     <?php //include('filters.php'); 
		     ?>
			 <div class='clearfix mb-5 '></div>
			 <h3> <a href="/dashmaster" class="white">#SSIDashMASTER5000</a></h3>
		
		
	</div>
	<?php } ?>	

	</div>





 <div class="footer 1well 1yellow mb-0 text-center">
    <div class='clearfix mb-0 '></div>
  
    <div class=' container-fluid 1col-md-3 '>
        
        <div class="row 1hidden-xs">
             <?php 
	            if( /*!is_user_logged_in() */ 1 ){
            //	get_template_part('content', 'welcome-profile');
        	    //get_template_part('content', 'dashboard-member'); 
	            }
        	?>
        </div>
       

    </div>
		<div class='1col-xs-12 1col-sm-6 col-md-2 hidden'>
					<div class='clearfix mb-0'></div>
					<b class=" hidden">Members Online</b>
				
					
					<?php if( is_user_logged_in() ){
					
					?>
					<div class='clearfix mb-5 '></div>
		
					<a href='//instaflixxx.com' target='_blank' class='btn 1btn-lg btn-danger btn-block hidden1'>InstaFliXXX &raquo;</a>
					
						<div class='clearfix mb-10 1visible-xs '></div>
					
					<?php //get_template_part('ad', 'flag-counter'); 
					?>
					<?php }else{
					    
					    ?>
					    	
					
					<?php get_template_part('ad', 'flag-counter'); ?>
					<div class='clearfix mb-10 1visible-xs '></div>
					    <div class=' hidden-xs clearfix 1col-md-2 1col-md-offset-5 p-0 well mb-10 align-center'>
					        <center>
					            <?php //do_action('oa_social_login'); 
					            ?>
					            
					        </center>
					        
					    </div>
					   
					    
					    <?php
					} ?>
					
					
					
				
					<div class='clearfix mb-0 '></div>

					
		
			</div>
			
		

		<div class='clearfix'></div>

	 
</div>

	<div class="clearfix mb-0"></div>
	<div class="1container-fluid text-center bg-blue header mb-0 hidden1">
	<div class="clearfix mb-0"></div>
	
	
	
	
	      
            
	<div class="col-sm-3 col-xs-3 hidden">
		<a href="/" class="white">
			<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
			<br>
			HOME
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3 1col-md-offset-1 col-sm-offset-0">
		<a href="/profile" class="white">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			<br>
			PROFILE
		</a>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3 1hidden-xs 1hidden-sm">
		<a href="/photos" class="white">
			<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
			<br>
			PHOTOS
		</a>


	</div>
	<div class="col-md-3 col-sm-3 col-xs-3 1hidden-xs">
		<a href="/videos" class="white">
			<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
			<br>
			VIDEOS
		</a>
		
	</div>
	<div class=" col-md-3 col-sm-3 col-xs-3 ">
		<a type="button" class="white" id="myBtn2" data-toggle="modal" data-target="#myModal2-menu" data-show="true">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			<br>
			MENU
		</a>
		
	</div>
	<br>
		
		<div class="clearfix mb-10"></div>
	</div>

        	
     <div id='add-menu' style='display: none;'  class='1well 1green'>
		<div class='clearfix'></div>		
			<div class="1col-md-10 1col-md-offset-1  home-beta">
			 <div class='clearfix mb-0'></div>
		
			
		
				 <div class="btn-group btn-group-justified">

	<a href="/groups/" class="btn btn-default"> <small>GROUPS</small> </a>
	<a href="/forums/" class="btn btn-default"> <small>FORUMS</small> </a>
	<a href="/events/" class="btn btn-default"> <small>EVENTS</small> </a>
	<a href="/search/" class="btn btn-default"> <small>SEARCH</small> </a>
	<!--<a href="http://dlfreakfest.org/levels/?level=4" class="btn btn-default">Level 4 <br> <small>REQUEST</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=5" class="btn btn-default">Level 5 <br> <small>SESSION</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=6" class="btn btn-default">Level 6 <br> <small>THoT FILE</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=7" class="btn btn-default">Level 7</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=8" class="btn btn-default">Level 8</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=9" class="btn btn-default">Level 9</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=10" class="btn btn-default">Level 10</a>-->
</div>
			<div class='clear'></div>	
			<button id='add-menu' class='hidden hidden-print 1btn  text-center 1btn-default 1btn-sm'>x close</button>
			<div class='clearfix'></div>	
		 <div class='clearfix mb-0'></div>
			</div>
			
			<div class='clear'></div>
		</div>
<div class='clearfix'></div>
	<?php if( !is_user_logged_in() ){ ?>


 <div class='container-fluid clearfix 1col-md-2 1col-md-offset-5 p-0 footer-login well yellow mb-0 align-center'>
     <div class="clearfix mb-0"></div>
     
     
     
     
     
     <div class="col-md-6 col-md-offset-3">
         
          <div class="clearfix mb-10"></div><br>
        <center>
            <h3 class=" entry-title "><a><u>Member Login</u></a></h3>
            <?php //do_action('oa_social_login'); 
            ?>
            
            <?php echo do_shortcode("[wpmem_form login redirect_to='/members']"); ?>
        </center>
        <div class="clearfix mb-5"></div>
     </div>
    <div class="clearfix mb-0"></div>
</div>
<div class="clearfix mb-0"></div>
<?php }else{ ?>
     <div class='container-fluid hidden clearfix 1col-md-2 1col-md-offset-5 p-0 footer-login well yellow mb-0 align-center'>
         
 

	 <div class="btn-group btn-group-justified">

	<a href="/groups/" class="btn btn-default"> <small>GROUPS</small> </a>
	<a href="/forums/" class="btn btn-default"> <small>FORUMS</small> </a>
	<a href="/events/" class="btn btn-default"> <small>EVENTS</small> </a>
	<a href="/search/" class="btn btn-default"> <small>SEARCH</small> </a>
	<!--<a href="http://dlfreakfest.org/levels/?level=4" class="btn btn-default">Level 4 <br> <small>REQUEST</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=5" class="btn btn-default">Level 5 <br> <small>SESSION</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=6" class="btn btn-default">Level 6 <br> <small>THoT FILE</small> </a>
	<a href="http://dlfreakfest.org/levels/?level=7" class="btn btn-default">Level 7</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=8" class="btn btn-default">Level 8</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=9" class="btn btn-default">Level 9</a>-->
	<!--<a href="http://dlfreakfest.org/levels/?level=10" class="btn btn-default">Level 10</a>-->
</div>
         	
   <div class='clearfix'></div>      
     <div class="col-md-6 col-md-offset-3">
         
          <div class="clearfix mb-0"></div>

     </div>
    <div class="clearfix mb-0"></div>
</div>
<div class="clearfix mb-0"></div>
<?php } ?>
	<div class='text-center footer-bottom'>
		 
         
			   <div class='clearfix'></div>
			 <div class='clearfix col-md-2 col-md-offset-5 align-center hidden1'>
			      <div class='clearfix'></div>
					        <center>
					            <?php get_template_part('ad', 'flag-counter'); ?>
					            <?php //do_action('oa_social_login'); 
					            ?>
					            
					            
					        </center>
					        <div class='clearfix'></div>
					    </div>
		<div class='clearfix'></div>
		<div class="clearfix mb-10"></div>
		
		<?php 
		
		    if( is_user_logged_in() ){
		     echo do_shortcode("[wpmem_form login redirect_to='/members']"); 
		     
		    }else{

		     ?>
		
		Thanks For Visiting!
		   <?php } ?>
	</div>		
	
   <?php wp_footer(); ?>
	 
<script type="text/javascript">


	jQuery(document).ready(function() {
					
		//Self Destruct button on porn pages
		jQuery( "#explode" ).click(function() {
			
			jQuery( "body" ).addClass("explode");
			jQuery( "body" ).html("<h2 style='background-color: #ffffff; color: #000000;'><a href='http://instaflixxx.com'>Return to Homepage<a></h2><br> <img src='http://instaflixxx.com/wp-content/uploads/2014/02/demotivation-posters-auto-343179.jpeg'> <br> <h2 style='background-color: #ffffff; color: #000000;'><a href='http://instaflixxx.com'>Return to Homepage<a></h2>");

		});	
	
		//Show-hide Video Categories-Tags
		jQuery( ".cat-btn" ).click(function() {
			
			jQuery( ".video-category" ).toggleClass("hide");

		});	
		jQuery( ".tag-btn" ).click(function() {
			
			jQuery( ".video-tags" ).toggleClass("hide");

		});	
		jQuery( ".showhide-btn-one" ).click(function() {
			
			jQuery( ".showhide-one" ).toggleClass("hide");

		});	
		jQuery( ".showhide-btn-two" ).click(function() {
			
			jQuery( ".showhide-two" ).toggleClass("hide");

		});	
		jQuery( ".showhide-btn-three" ).click(function() {
			
			jQuery( ".showhide-three" ).toggleClass("hide");

		});	
		jQuery( ".showhide-btn-four" ).click(function() {
			
			jQuery( ".showhide-four" ).toggleClass("hide");

		});	
		jQuery( ".showhide-btn-five" ).click(function() {
			
			jQuery( ".showhide-five" ).toggleClass("hide");

		});
		
	});
		
	
</script>   

<script>
jQuery(".close").click(function(){
  jQuery("#no-pic").hide();
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





</html>