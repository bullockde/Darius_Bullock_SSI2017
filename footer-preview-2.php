<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<style>
	#colophon {
		background: radial-gradient( #173e9a, #000000 50%) !important;
	}
</style>

			<div class='clearfix mb-0'></div>
			
			
			
			
	<div class="clearfix mb-0"></div>
	<div class="1container-fluid text-center bg-blue header mb-0 hidden1">
	<div class="clearfix mb-5"></div>
	
	
	
	
	      
            
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
		<button id='add-menu' class='glyphicon glyphicon-menu-hamburger btn btn-sm' style='background: transparent; margin: -10px 0 0;'><br>MENU<br></button>
		<a href="/menu" class="white hidden">
			<span class="glyphicon glyphicon-menu-hamburger hidden" aria-hidden="true"></span>
			<br>
			
			
		</a>
	</div>
	<br>
		
		<div class="clearfix mb-10"></div>
	</div>

		

	<?php if( !is_user_logged_in() ){ ?>


 <div class='container-fluid clearfix 1col-md-2 1col-md-offset-5 p-0 well yellow mb-0 align-center'>
     <div class="clearfix mb-0"></div>
     
     
     
     
     
     <div class="col-md-6 col-md-offset-3">
         
          <div class="clearfix mb-10"></div><br>
        <center>
            <h3 class=" entry-title "><a><u>Member Login</u></a></h3>
            <?php //do_action('oa_social_login'); 
            ?>
            
            <?php echo do_shortcode("[wpmem_form login redirect_to='/members']"); ?>
        </center>
        <div class="clearfix mb-0"></div>
     </div>
    <div class="clearfix mb-0"></div>
</div>
<div class="clearfix mb-0"></div>
<?php }else{ ?>
     <div class='container-fluid clearfix 1col-md-2 1col-md-offset-5 p-0 well yellow mb-0 align-center'>
         
         	
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
			<button id='add-menu' class='hidden-print 1btn  text-center 1btn-default 1btn-sm hidden'>x close</button>
			<div class='clearfix'></div>	<br>	
		 <div class='clearfix mb-0'></div>
			</div>
			
			<div class='clear'></div>
		</div>
<div class='clearfix'></div>

	 <div class="btn-group btn-group-justified hidden">

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
         
          <div class="clearfix mb-10"></div>
         
        
          <div class="clearfix mb-10"></div>
        <center>
            <?php //do_action('oa_social_login'); 
            ?>
            
            <?php echo do_shortcode("[wpmem_form login redirect_to='/members']"); ?>
        </center>
        <div class="clearfix mb-5"></div>
     </div>
    <div class="clearfix mb-0"></div>
</div>
<div class="clearfix mb-0"></div>
<?php } ?>
	<div class='text-center footer-bottom'>
		 
        - <a href='//blackdicksmatter.org' class='white'>BLACK DICKS MATTER</a> -<br>
		    Thanks For Visiting!
			   <div class='clearfix'></div>
			 <div class='clearfix col-md-2 col-md-offset-5 align-center hidden1'>
			     <br> <div class='clearfix'></div>
					        <center>
					            <?php get_template_part('ad', 'flag-counter'); ?>
					            <?php //do_action('oa_social_login'); 
					            ?>
					            
					            
					        </center>
					        <div class='clearfix'></div>
					    </div>
		<div class='clearfix'></div>
	</div>	



<script>

jQuery(document).ready(function(){
   jQuery( "button" ).click(function() {
	var id = this.id;
	jQuery("div#" + id ).slideToggle();
	
   });
});
</script>

<!-- Flyzoo script v3 -->
<script type="text/javascript">
(function () {
 window._FlyzooApplicationId="5e5269814fb4d50cc0e558a15e5269444fb4d50cc0e5589a";
 var fz = document.createElement('script'); fz.type = 'text/javascript'; fz.async = true;
 fz.src = '//widget.flyzoo.co/scripts/flyzoo.start.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fz, s);
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
