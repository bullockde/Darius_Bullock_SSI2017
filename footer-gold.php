
        
     


		
		
	<div class='clear'></div>
	<section id='men' class='text-center hidden'>
			
			<div class='col-sm-12'>
				<h1><?php //bloginfo( 'name' ); ?>MAN -<span class='x'>X</span>- SCAPE</h1>
				<h2>MEN ZONE</h2>
				
				<br>
				<a href="/ads" class="btn btn-lg btn-danger">MORE MEN >></a>
					<div class="btn-group hidden">
						
						<a target='_blank' href="/ads" class="btn btn-lg btn-danger">Post Ad</a>
						
					</div>
			</div>
			
			<div class='clear'></div>
		</section>
		
	<footer id="footer">
	<div class='clear'></div>		
            <div class="container text-center">
			<div class='col-xs-12 col-md-8 col-md-offset-2 text-center'>
			Advertisement
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- MAN-X-SCAPE_footer_resp -->
				<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-3813829909026031"
					 data-ad-slot="7979808983"
					 data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
              
            </div>
			 <div class='clear'></div><br>
		<center>&copy;<?php echo date("Y") ?><br>
		
		
		
		<?php if( 1 /*is_user_logged_in()*/ ){ ?>
			<?php get_template_part( 'ad', 'flag-counter' ); ?>
		<?php } ?>
			
        </footer>
		
			<?php get_template_part( 'content', 'admin' ); ?>
		
		<?php wp_footer(); ?>
		

	
	 
	
	
	<script>
		 //Hamburger menu toggle
  $(".navbar-nav li a").click(function (event) {
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
		
		var  mn = $(".main-nav");
			mns = "navbar-fixed-top";
			hdr = $('header').height();

		$(window).scroll(function() {
		  if( $(this).scrollTop() > hdr ) {
			mn.addClass(mns);
		  } else {
			mn.removeClass(mns);
		  }
		});
</script>

<script>
			 $(document).on('click.nav','.navbar-collapse.in',function(e) {
		if( $(e.target).is('a') ) {
			$(this).removeClass('in').addClass('collapse');
		}
	});
		</script>	
		
	 </body>
</html>
