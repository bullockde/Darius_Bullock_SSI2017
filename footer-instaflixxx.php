		<div class="clear"></div>
		
		

<?php //get_template_part('content' , 'full-stats'); ?>


		<br>
		<div class='clearfix'></div>
		
		<div class="clear bg-blue">
			
			<center><?php  /*dynamic_sidebar('home-ad-slot');*/ ?></center>
			<center>
				
				<?php 
					if( /*is_page('kik')*/ 1 ){
					if ( bp_has_members( 'type=active&max=5' ) ) : ?> 
					<h2>Members Online</h2>
					<?php while ( bp_members() ) : bp_the_member(); ?>                      
						<a href="/user-profile/?ID=<?php echo bp_get_member_user_id(); ?>">
							<?php bp_member_avatar('type=full&width=55&height=55') ?>
						</a>
						
					<?php endwhile; ?>
					<br>
				<?php endif; 
				
					}
					?>
			</center>
			<div class='clearfix'></div><br>
		</div>

		
	<div class="clear"></div>
			
	<?php //get_template_part('content', 'companions-tagline'); ?>

	<?php get_template_part('content', 'member-area'); ?>

	<div class='clearfix'></div>
	
	<?php //get_template_part('content', 'full-footer'); ?>
	
	
	<div class='dash bg-blue pb-5 hidden1'>	
	
	
	
	<?php if( 1 /*!is_page('party')*/){ ?>	

		
	

	 <div id='header-categories' style='display: block;' class='text-center'>
		     <?php include('filters.php'); ?>
		
		
	</div>
	<?php } ?>	

	</div>





 <div class="footer text-center">
  

		<div class='col-sm-12 col-sm-6 col-lg-3'>
					<br>
					<div class="text-center visible-xs">Advertisement</div>
			<div class='img-thumbnail'>
				<?php get_template_part( 'ad' , '300-250-1' ); ?>
			</div>
			
			
		<!--	<a href='/' class='btn btn-default btn-block'>Home</a>
			<a href='/models' class='btn btn-default btn-block'>Models</a>
			<a target='_blank' href='//instaflixxx.com' class='btn btn-default btn-block'>Porn</a>
			<a href='/people' class='btn btn-default btn-block'>People</a>
			<a href='/contact' class='btn btn-default btn-block'>Contact</a>
			<a href='/admin' class='btn btn-default btn-block'>Admin</a>
			
			-->
        </div>
		
        <div class="col-sm-6 hidden-xs hidden-sm footer-links">
		
				<br>
				
				<center>
				<a target='_blank' href='http://ssixxx.com/'><img src='http://instaflixxx.com/wp-content/uploads/2015/08/Now-Featuring-Banner-1.jpg' class=' hidden img-responsive'> </a>
				</center>
               
			<div class='banner-img hidden1'>
				<img src='http://instaflixxx.com/wp-content/uploads/2014/02/Fleshlight_01.jpg'>
				<div class='coming'>Coming Soon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Coming Soon</div>
			</div>	
			
            
        </div>
		
		<div class='col-xs-12 col-sm-6 col-lg-3'>
		
			<br>
			<a href='/freak-now' class='btn btn-lg btn-info btn-block hidden1'>Freak Now >> </a>
			<br>
			
			<?php get_template_part('ad', 'flag-counter'); ?>
			<?php //get_template_part( 'ad' , '250-250' ); ?>
			<br>
			
			
			<a href='/dashmaster' class='btn btn-lg btn-warning btn-block hidden1'>#SSIDashMASTER5000 >> </a>
			<div class='clearfix'></div><br>
        </div>
		<div class='clearfix'></div>

	 
</div>
	<div class='text-center footer-bottom'>
		 
			Disclaimer: All <a href="http://instaflixxx.com/porn" target="_blank">porn</a> videos and photos are provided by 3rd parties. We take no responsibility for the content. Powered by <a style='text-decoration: underline;' href='http://www.youtube.com/watch?v=9W8tyczXGwI&feature=youtu.be'>Jesus</a>!
	<br><br>
		Thanks For Visiting!
			 
		
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

<script type="text/javascript">

// JK Pop up image viewer script- By JavaScriptKit.com
// Visit JavaScript Kit (http://javascriptkit.com)
// for free JavaScript tutorials and scripts
// This notice must stay intact for use

var popbackground="#EDEDEF" //specify backcolor or background image for pop window
var windowtitle="InstaFliXXX Image Window"  //pop window title

function detectexist(obj){
return (typeof obj !="undefined")
}

function jkpopimage(imgpath, popwidth, popheight, textdescription){

function getpos(){
leftpos=(detectexist(window.screenLeft))? screenLeft+document.body.clientWidth/2-popwidth/2 : detectexist(window.screenX)? screenX+innerWidth/2-popwidth/2 : 0
toppos=(detectexist(window.screenTop))? screenTop+document.body.clientHeight/2-popheight/2 : detectexist(window.screenY)? screenY+innerHeight/2-popheight/2 : 0
if (window.opera){
leftpos-=screenLeft
toppos-=screenTop
}
}

getpos()
var winattributes='width='+popwidth+',height='+popheight+',resizable=yes,left='+leftpos+',top='+toppos
var bodyattribute=(popbackground.indexOf(".")!=-1)? 'background="'+popbackground+'"' : 'bgcolor="'+popbackground+'"'
if (typeof jkpopwin=="undefined" || jkpopwin.closed)
jkpopwin=window.open("","",winattributes)
else{
//getpos() //uncomment these 2 lines if you wish subsequent popups to be centered too
//jkpopwin.moveTo(leftpos, toppos)
jkpopwin.resizeTo(popwidth, popheight+30)
}
jkpopwin.document.open()
jkpopwin.document.write('<html><title>'+windowtitle+'</title><body '+bodyattribute+'><img src="'+imgpath+'" style="max-width:600px;max-height:400px;margin-bottom: 0.5em; "><br />'+textdescription+'</body></html>')
jkpopwin.document.close()
jkpopwin.focus()
}

</script>

<script>

jQuery(document).ready(function(){
   jQuery( "button" ).click(function() {
	var id = this.id;
	jQuery("div#" + id ).slideToggle();
	
   });
});
</script>

</body>

</html>