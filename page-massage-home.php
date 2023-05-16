<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" href="http://treatyourselfmassage.com/wp-content/themes/adultvideo-02-blue/bootstrap-playground.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![//if]-->

	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body data-spy="scroll" data-target="#my-navbar">
    
<!-- Navbar --> 
		<nav class='navbar navbar-default navbar-fixed-top'  id='my-navbar'>
			<div class="container">
				<div class="navbar-header">
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar-collapse'>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					
					<a href="" class='navbar-brand visible-xs'>Menu</a> 
					
				</div><!-- // navbar-header -->
				
				<div class="collapse navbar-collapse" id='navbar-collapse'>
				
				<a href="/book-now" class="btn btn-warning navbar-btn navbar-right">Book Now!</a>
				
					<?php 
						wp_nav_menu( array(
							
							'menu' => 'bootstrap menu',
							'depth' => 2,
							'container' => false,
							'menu_class' => 'nav navbar-nav',
							'fallback_cb' => 'wp_page_menu',
							//Process nav menu using our custom nav walker
							'walker' => new wp_bootstrap_navwalker())
						);
						
					?>
				
				<!--
					<ul class="nav navbar-nav">
						<li><a href="#feedback">Feedback</a></li>
						<li><a href="#gallery">Gallery</a></li>
						<li><a href="#feedback">Features</a></li>
						<li><a href="#feedback">FAQ</a></li>
						<li><a href="#feedback">Contact Us</a></li>
					</ul>
				-->
				</div>
			</div><!-- // container -->
		</nav><!-- // Navbar -->
		
		
<!-- Jumbotron -->
		
		<div class="jumbotron">
			<div class="container text-center">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<p>Professional Therapeutic Massage that comes to You!</p>
				
				<div class="btn-group">
					<a href="#massage-menu" class="btn btn-lg btn-default">Massage Menu</a>
					<a href="/book-now" class="btn btn-lg btn-warning">Book Now</a>
					
				</div>
			</div><!-- // container -->
			
			
		</div><!-- // jumbotron  -->

		
<!-- Massage Menu -->	
		<section id='massage-menu'></section>
		<br>
		<div  class="container">
			<section>
				<div class="page-header" id="feeback">
					<h2>Massage Menu</h2>
				</div>
		<div class='row'>
			<div class='col-md-4 col-md-offset-4'>
			<table class='table table-bordered'>
				<tr>
					<th>Time</th>
					<th>Rate</th>
				</tr>
				<tr>
					<td>30 min</td>
					<td>$50</td>
				</tr>
				<tr>
					<td>60 min</td>
					<td>$80</td>
				</tr>
				<tr>
					<td>90 min</td>
					<td>$120</td>
				</tr>
			
			</table>
			</div>
		</div>
			<table class="table table-bordered differentTable">
      			  <thead>
         			   <tr>
         			       <th>Type of Massage</th>
         			       <th>Description</th>    
         			   </tr>
      			  </thead>
      			  <tbody>
          			  <tr>
          			      <td><strong>Shiatsu</strong></td>
         			       <td>Shiatsu is a Japanese form of massage therapy. The word Shiatsu comes from two Japanese words "shi" (finger) and "atsu" (pressure). In addition to the direct stimulation of pressure points along the energy pathways of your body, gentle stretching techniques are applied over a wider area of the body to integrate the point work and encourage the flow of Chi (energy) throughout the body. Shiatsu is a meditative healing art that honors the body, mind and spirit.</td>    
         			   </tr>
           			 <tr>
            			    <td><strong>Deep Tissue</strong></td>
           			    <td>A form of bodywork that aims to relieve tension in the deeper layers of tissue in the body. Deep Tissue Massage is a highly effective method for releasing chronic stress areas due to misalignment, repetitive motions, and past lingering injuries. Due to the nature of the deep tissue work, open communication during the session is crucial to make sure you don’t get too uncomfortable. Keep in mind that soreness is pretty common after the treatment, and that plenty of water should be ingested to aid with the flushing and removal of toxins that will have been released from the deep tissue during the session.</td>  
          			  </tr>
          			  <tr>
            			    <td><strong>Swedish</strong></td>
             			   <td>Swedish Massage is a very relaxing and therapeutic style of bodywork. It combines oils or lotion with an array of strokes such as rolling, kneading, and percussion to help the body improve its circulation. The benefits of this type of bodywork are wide-ranging and include relief from aches and pains, decreased stress levels in the body, enhanced mental clarity, improved appearance, and greater flexibility.</td>
          			  </tr>
				  <tr>
            			    <td><strong>Sports</strong></td>
             			   <td>Sports Massage is a type of massage designed for highly active people who engage in athletics. Engaging in sports is harsh on the body and can often lead to injuries in both the short and long term. Sports Massage enhances performance and prolongs a sports career by helping to prevent injury, reduce pains and swelling in the body, relax the mind, increase flexibility, and dramatically improve recovery rates. Sports Massage is also highly effective in aiding the rapid recovery of an athlete from an injury by encouraging greater kinesthetic awareness and in turn promoting the body’s natural immune function.</td>
          			  </tr>
				<tr>
            			    <td><strong>Mixed Modality Sampler</strong></td>
             			   <td>The Mixer Sample massage is an intuitively guided massage that focuses on healing the entire mind, body, and soul. Massage techniques ranging from the gentle touch of a Swedish massage to the firm touch of Deep Tissue massage will be used based on the bodies need. This massage removes toxins from the body and balances the bodies chakra.</td>
          			  </tr>
       				 </tbody>
    				</table>
			</section>
		</div><!-- // container -->
		
	

		
<!-- call to action -->
		<section id='subscribe'>
			
				<div class="container text-center">


					
					<h2>Keep in Contact!</h2>
					<p>Enter your name and email</p>
					<?php echo do_shortcode('[gravityform id="5" title="false" description="false"]'); ?>

<!--
					<form action="" class='form-inline'>
						<div class="form-group">
							<label for="sunscription">Subscribe</label>
							<input type="text" class='form-control' id='name' placeholder='Your name'>
						</div>
						<div class="form-group">
							<label for="email">Email Address</label>
							<input type="text" class='form-control' id='email' placeholder='Enter your Email'>
						</div>
						<button type="submit" class="btn btn-default">Subscribe</button>
						<hr>
					</form>
-->
				</div><!-- // container -->
			
		</section><!-- // call to action -->

	<section id='studio'>	
		<br>
		
		<div class='container'>
			<div class="page-header" id="feeback">
					<h2>The Studio</h2>
				</div>
			<center>
			<div class='visible-xs visible-sm'>
			<?php echo do_shortcode('[video width="260" height="380" mp4="http://www.treatyourselfmassage.com/wp-content/uploads/2015/02/2014-01-05-22.25.54.mp4"][/video]'); ?>
			</div>
			<div class='hidden-xs'>
			<?php echo do_shortcode('[video width="600" height="480" mp4="http://www.treatyourselfmassage.com/wp-content/uploads/2015/02/2014-01-05-22.25.54.mp4"][/video]'); ?>
			</div>
			</center>
		</div>
	</section>

	<!-- Feedback -->	<!--
		<div class="container">
			<section>
				<div class="page-header" id="feeback">
					<h2>Feedback <small>Check out the Awesome Feedback</small></h2>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<blockquote>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<footer>John Doe</footer>
						</blockquote>
					</div>
					<div class="col-lg-4">
						<blockquote>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<footer>John Doe</footer>
						</blockquote>
					</div>
					<div class="col-lg-4">
						<blockquote>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<footer>John Doe</footer>
						</blockquote>
					</div>
				</div>
			</section>
		</div><!-- // container -->

<!-- Gallery --><!--
		<section>
			<div class="container">
			
				<div class="page-header" id="gallery">
					<h2>Gallery <small>Check out the Awesome Gallery</small></h2>
				</div>
				
				<div class="carousel slide" id="screenshot-carousel" data-ride='carousel'>
					<ol class='carousel-indicators'>
						<li data-target='#screenshot-carousel' data-slide-to='0' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='1' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='2' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='3' class='active'></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="http://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg" alt="Text of image">
						</div>
						<div class="item">
							<img src="http://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg" alt="Text of image">
						</div>
						<div class="item">
							<img src="http://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg" alt="Text of image">
						</div>
						<div class="item">
							<img src="http://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg" alt="Text of image">
						</div>
					</div>
					
				</div>
			
			</div>
		</section>
	-->
	<!--
	
	<div class="container">
		
		<div class="dropdown">
			<button class='btn btn-default dropdown-toggle' type='button' data-toggle='dropdown'>
				Cool Dropdown <span class='caret'></span>
			</button>
			
			<ul class="dropdown-menu">
				<li class='dropdown-header'>First Header</li>
				<li class='disabled'><a href="">First Item</a></li>
				<li><a href="">Second Item</a></li>
				<li class='divider'></li>
				<li class='dropdown-header'>Second Header</li>
				<li><a href="">Fourth Item</a></li>
				<li><a href="">Fifth Item</a></li>
			</ul>

		</div>
		
	</div>
	
	
	
	<div class="container">
	
		<div class="well">
		
			<table class='table'>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Age</th>
				</tr>
				<tr>
					<td>John</td>
					<td>Doe</td>
					<td>18</td>
				</tr>
				<tr>
					<td>Dennis</td>
					<td>Smith</td>
					<td>21</td>
				</tr>
			
			</table>
		
		
		</div>
	
	
	</div>
	
	
	
	
	
	<div class="container">
		<div class="row">
		
		<form action="">
		
			<div class="form-group has-warning has-feedback">
			
				<label for="element-1" class="control-label">Label Text</label>
				<input type="text" id='element-1' class='form-control'>
				<span class='glyphicon glyphicon-warning-sign form-control-feedback'></span>
				
			</div>
			<div class="form-group has-success has-feedback">
			
				<label for="element-2" class="control-label">Label Textm2</label>
				<input type="text" id='element-2' class='form-control '>
				<span class='glyphicon glyphicon-remove form-control-feedback'></span>
				<p class="help-block">Enter the password with Capital Letter included</p>
			</div>
			<div class="form-group has-success has-feedback">
			
				<label for="element-2" class="control-label">Label Textm2</label>
				<input type="text" id='element-2' class='form-control'>
				<span class='glyphicon glyphicon-ok form-control-feedback'></span>
				<p class="help-block">Enter the password with Capital Letter included</p>
			</div>
			
			
		</form>
		
		
		<hr>
		
		
		<form action="" class="form-inline">
			<div class="form-group ">
			
				<label for="element-3" class='sr-only'>Label Text 3</label>
				<input type="text" id='element-3' class='form-control input-lg' placeholder='Enter email'>
			</div>
			<div class="form-group has-error">
			
				<label for="element-4" class='sr-only'>Label Text 4</label>
				<input type="password" id='element-4' class='form-control input-sm' placeholder='Enter Password'>
			
			
			
			</div>
			<div class="checkbox">
				<label for=""><input type="checkbox">Remember me</label>
			</div>
			<button type='button' class='btn btn-primary'>Sign up</button>
		</form>
		
		<hr>
		
		<form action="">
			<div class="row">
				<div class="col-lg-2">
					<input type="text" class='form-control' placeholder='2 blocks'>
				</div>
				<div class="col-lg-4">
					<input type="text" class='form-control' placeholder='4 blocks' >
				</div>
				<div class="col-lg-6">
					<input type="text" class='form-control' placeholder='6 blocks'>
				</div>
			
			</div>
		
		</form>
		
		
		
		
			<div class="well">
				<a href="" class='btn'>Button</a>
				<a href="" class='btn btn-primary'>Button</a>
				<a href="" class='btn btn-success'>Button</a>
				<a href="" class='btn btn-info'>Button</a>
				<a href="" class='btn btn-warning'>Button</a>
				<a href="" class='btn btn-danger'>Button</a>
				<a href="" class='btn btn-link'>Button</a>
				
				<hr>
				
				<a href="" class='btn btn-warning btn-lg'>Button</a>
				<a href="" class='btn btn-warning'>Button</a>
				<a href="" class='btn btn-warning btn-sm'>Button</a>
				<a href="" class='btn btn-warning btn-xs'>Button</a>
				<a href="" class='btn btn-warning btn-xs btn-block'>Button</a>
				
				<hr>
				
				<span class='glyphicon glyphicon-qrcode'></span>
				
				<a href="" class="btn btn-info"><span class='glyphicon glyphicon-search'></span></a>
				
				<hr>
				
				<button type='button' class='btn btn-info'>Button with button tag</button>
			</div>
		</div>
	</div>
	
	<div class="grey">
		<div class="container">
		
			<div class="well">This is my First Container</div>
			<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="well ">First Column</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="well">Second Column</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="well">Third Column</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="well">Fourth Column</div>
			</div>
		</div>
		</div>
	</div>
		
	<div class="container">
		<div class="row"><div class="well">This is the First row</div></div>
		<div class="row"><div class="well">This is the Second row</div></div>
		<div class="row"><div class="well">This is the Third row</div></div>
	</div>
	
	-->
	<section id='subscribe' class='tagline'>
			
				<div class="container text-center">
					<h2>Your Health and Wellness is my Mission</h2>

						<h3>Wide Range of Massages</h3>

						<h3>Professional Environment</h3>

						<h3>Mobile Service Available</h3>

						<h3>Quality Equipment and Oils</h3>

						<h3>Reasonable Rates</h3>

					
					
				</div><!-- // container -->
			
		</section><!-- // call to action -->

	<footer id="footer">
            <div class="container text-center">
               
		&copy;2015 Treat Yourself Massage - All Rights Reserved
            </div>
        </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>
