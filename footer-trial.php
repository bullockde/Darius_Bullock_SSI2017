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
	<div class="1container-fluid text-center bg-blue header mb-0 hidden">
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
	    
	    
	    
	    <a type="button" class="white" id="myBtn2" data-toggle="modal" data-target="#myModal2-menu" data-show="true">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			<br>
			MENU
		</a>
		
		<a type="button" class="btn btn-default 1btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal2-menu" data-show="true">MENU</a>
	    
		<button id='add-menu' class='hidden glyphicon glyphicon-menu-hamburger btn btn-sm' style='background: transparent; margin: -10px 0 0;'><br>MENU<br></button>
		<a href="/menu" class="white hidden">
			<span class="glyphicon glyphicon-menu-hamburger hidden" aria-hidden="true"></span>
			<br>
			
			
		</a>
	</div>
	<br>
		
		<div class="clearfix mb-10"></div>
	</div>

		
		
			<div class="clearfix mb-0"></div>
			
			
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
			<div class='clearfix'></div>
		 <div class='clearfix mb-0'></div>
			</div>
			
			<div class='clear'></div>
		</div>
<div class='clearfix'></div>





	<?php if( !is_user_logged_in() ){ ?>


 <div class='container-fluid clearfix 1col-md-2 1col-md-offset-5 p-0 well hidden yellow mb-0 align-center'>
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
     <div class='container-fluid clearfix 1col-md-2 1col-md-offset-5 p-0 hidden well yellow mb-0 align-center'>
         
         	

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
         
         <div class="btn-group btn-group-justified hidden">

	<a href="/members/" class="btn btn-default"> <small>Desktop</small> </a>
	<a href="/members-mobile/" class="btn btn-info"> <small>Mobile View</small> </a>
	</div>
          <div class="clearfix mb-10 hidden"></div>
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
	<div class='text-center 1footer-bottom'>
		 
       
			   <div class='clearfix'></div><hr>
			 <div class='clearfix col-md-4 col-md-offset-4 align-center hidden1 white'>
			     <div class='clearfix mb-10'></div>
					        <center>
					            <?php //get_template_part('ad', 'flag-counter'); ?>
					            <?php //do_action('oa_social_login'); 
					            ?>
					            
					            
					        </center>
					        <div class='clearfix'></div><br>
					        
					        Secure Payments - Powered By <b>Stripe</b><br>
					        <?php 
					        //date_default_timezone_set('America/New_York');

					        //echo date("m/d/Y g:ia"); 
					      
					      ?> 
					      <!--EST-->
					    </div>
		<div class='clearfix'></div> <br><br>
	</div>	



<script>

jQuery(document).ready(function(){
   jQuery( "button" ).click(function() {
	var id = this.id;
	jQuery("div#" + id ).slideToggle();
	
   });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
