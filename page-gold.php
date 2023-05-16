<?php get_header('gold'); ?>

<div class='gold'>
		<section id='our-menu' class='hidden'>
		<?php 
			
			$men = get_posts(array( 'category_name' => 'men', 'post_type' => 'post' , 'posts_per_page' => -1 )); 
			$women = get_posts(array( 'category_name' => 'women', 'post_type' => 'post' , 'posts_per_page' => -1 ));
			$trans = get_posts(array( 'category_name' => 'trans', 'post_type' => 'post' , 'posts_per_page' => -1 ));
			
			
		?>
			
							<div class="container">
							<br>

								<div class="row">
								<div class="col-sm-4 text-center">
									
			<a target='black' href='/men'>
			<figure>
			
			
			
			  <img src="/wp-content/uploads/2016/11/man-x-scape-shawn-e1478869098864.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4>(<?php echo count($men); ?>) MEN >></h4></figcaption>
			</figure>
			</a>						
								</div>
								
								<div class="col-sm-4 text-center">
									
			<a target='black' href='/women'>
			<figure>
			  <img src="/wp-content/uploads/2016/11/deep350_350-e1478869245737.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4>(<?php echo count($women); ?>) WOMEN >></h4></figcaption>
			</figure>
			</a>
								</div>
						
							
								
								
								
								
								<div class="col-sm-4 text-center">
			<a target='black' href='/trans'>						
			<figure>
			  <img src="/wp-content/uploads/2016/11/reviews-1-e1478870034226.jpg" class="img-thumbnail hidden" alt="The Pulpit Rock" width="304" height="228">
			  <figcaption><h4>(<?php echo count($trans); ?>) TRANS >></h4></figcaption>
			</figure>
			</a>
								</div>
								
								
									
								
							</div>

								
								
							</div><!-- // container -->
							<div class='clearfix'></div><br>
			
		</section><!-- // services -->
		
		
		<?php
					
					//print_r($post);
$args = array( 'category_name' => 'ad' , 'post_type' => 'post' , 'posts_per_page' => -1 );

		$count = 1;
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<?php //if( $count != 1 ){ echo "<hr>" ; } ?>
	<div class='blog-post col-xs-6 well'>
		
		<div class='col-sm-6 text-center'>
			
			<h4 class="post-title text-center"><?php the_title(); ?></h4>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><center><?php the_post_thumbnail( 'thumbnail', array('class' => 'thumbnail post-thumbnail aligncenter','alt' => get_the_title(), 'title' => '')); ?></center></a>
		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			<div class='text-center'>
				<h5><?php echo get_post_meta($post->ID, 'ad_city', true); ?>, <?php echo get_post_meta($post->ID, 'ad_state', true); ?></h5>
			</div>
			<div class='clearfix'></div>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_age', true); ?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_height', true); ?>
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($post->ID, 'ad_weight', true) ?>
			</div>
			
			<div class='clearfix'></div>		<br>	
		<!--		<u>Rates</u> <br>
			
				<?php $services = get_post_meta($post->ID, 'service_recieved');
						foreach($services as $service) echo $service . "<br>";
				?>
			
			Services:<br><br>
			
			Rates:<br>
			--><br>
			1 <?php echo get_post_meta($post->ID, 'client_phone', true); ?><br><br>
			
			<!--
			<?php if( get_post_meta($post->ID, 'client_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $post->ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			<a href='<?php echo $post->guid; ?>' class='btn btn-warning'> View FULL Ad >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clearfix'></div>
	</div>
				
			
		<?php
			
			if( ($count % 2) == 0 ){ ?> <div class='clearfix'></div> <?php }
			$count++;
		endforeach; 
		wp_reset_postdata();?>
		<div class='clearfix'></div>
			
			
				  
				  
				<div id='new-review' style='display: none; text-align: center; color: #e00;'>
					<hr>
                    <?php echo do_shortcode('[gravityform id="3" name="Create an Ad" title="false" description="false"]'); ?> 
				</div>
			
		</div>
		<div class='clearfix'></div>
			
	
	<section id='about' class='hidden'>	
		<br>
		
		<div class='container'>
			<div class="page-header" id="feeback">
				<h2>About Us</h2>
			</div>
			
	<!--	<div class='col-md-6'>
			<center>
			<div class='visible-xs visible-sm'>
			<?php/* echo do_shortcode('[video width="260" height="380" mp4="http://www.treatyourselfmassage.com/wp-content/uploads/2015/02/2014-01-05-22.25.54.mp4"][/video]'); */ ?>
			</div>
			<div class='hidden-xs'>
			<?php /*echo do_shortcode('[video width="600" height="480" mp4="http://www.treatyourselfmassage.com/wp-content/uploads/2015/02/2014-01-05-22.25.54.mp4"][/video]');  */?>
			</div>
			</center>
			
		</div>
	-->	
		<div class='col-md-8 col-md-offset-2 text-center'>

<a  target="_blank" href='https://tack.bz/2auIw'><img class="img-responsive size-medium wp-image-583" style='margin: 0 auto;' alt="2015-03-31 03.03.06" src="/wp-content/uploads/2016/11/man-x-scape-shawn.jpg" width="400" height="300" /></a>

<br>
Hello my name is Shawn. I am a recent college graduate in the field of Computer Science. I recently gave up my full time employment for corporate america and now enjoy massage as a full time career.<br>
<br>
I have a natural-born passion for massage and bodywork. My service is based on the belief that my customers' needs are of the utmost importance, and I am committed to meeting those needs. As a result, I trust that the majority of my business will come from repeat customers and referrals, and I look forward to offering my professional services to you.<br>
<br>
I offer an extremely relaxing therapeutic massage on a professional massage table complete with light oil, strong hands, and soothing music. I provide a clean, comfortable and casual atmosphere. My goal is to give you a personalized experience where you will feel at ease and are able to fully relax and enjoy your massage. I am not situated in a busy salon setting as I prefer to conduct business in a quiet and quaint space which offers your complete privacy.<br>
<br>
I would welcome the opportunity to earn your trust and deliver you the best service in the industry.<br>
<br>

Shawn (Owner)<br>
<img src='http://www.treatyourselfmassage.com/wp-content/uploads/2015/05/symbols_hrc_equality.gif' class='img-responsive' width='50'n style='display: inline;'>
<br><br>
		</div>
		<section id='therapists hidden'>
			<div class='container col-md-12'>
				<div class='text-center'>
					<a href="/the-therapists" class="btn btn-danger hidden ">Meet Our Therapists</a>	
				</div>
			</div>
			
		</section>

		
<!--
		<div class='col-md-6 text-center'>
			<img src="http://www.treatyourselfmassage.com/wp-content/uploads/2015/03/TYMassage-flyer.png" class="img-responsive" alt="Text of image">

			
		</div>
-->
	</section>



	
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
				<a href="" class='btn btn-danger'>Button</a>
				<a href="" class='btn btn-danger'>Button</a>
				<a href="" class='btn btn-link'>Button</a>
				
				<hr>
				
				<a href="" class='btn btn-danger btn-lg'>Button</a>
				<a href="" class='btn btn-danger'>Button</a>
				<a href="" class='btn btn-danger btn-sm'>Button</a>
				<a href="" class='btn btn-danger btn-xs'>Button</a>
				<a href="" class='btn btn-danger btn-xs btn-block'>Button</a>
				
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
	
<section id='blog' class=' hidden visible-xs1 visible-md1'>
	<div class='container'>
			<div class="page-header" id="feeback">
				<h2>Wellness Blog</h2>
			</div>
			<div class="well text-center">
					
					<?php
$args = array( 'posts_per_page' => 4 );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			
				<a href="<?php the_permalink(); ?>">
					<div class='col-md-3 blog-post'>
						<?php 
						  the_post_thumbnail('thumbnail', array( 'style' => 'width: 150px; height: 150px;' ,'class' => 'img-responsive aligncenter','alt' => get_the_title(), 'title' => ''));
						
						the_title(); ?>
						
						<div class='visible-xs visible-sm'><hr></div>
					</div>
				</a>
			
		<?php endforeach; 
		wp_reset_postdata();?>
		<div class='clearfix'></div>
			<div class='blog-post'>
				<a href='/blog/' class='btn btn-lg btn-danger'>View Full Blog >></a>
			</div>
			
		</div>
	</div><!-- // container -->		
</section><!-- // Blog SPace -->

		<section  id="gallery" class="hidden">
		
				
		<div class='container'>
			<div class="page-header">
				<h2>Gallery</h2>		
			</div>
			<div class='clearfix'></div>
			
			
			
			<div class='col-md-8'>
				
			</div>
			<div class='col-md-4'>
				
			</div>

		<div class='col-md-6 col-md-offset-3'>

		<!-- Gallery -->
		
			
				<div class="carousel slide" id="screenshot-carousel" data-ride='carousel'>
					<ol class='carousel-indicators'>
						<li data-target='#screenshot-carousel' data-slide-to='0' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='1' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='2' class='active'></li>
						<li data-target='#screenshot-carousel' data-slide-to='3' class='active'></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="http://www.treatyourselfmassage.com/wp-content/uploads/2015/03/2014-03-06-09.49.57-e1425361857667.png" alt="Text of image">
						</div>
						<div class="item">
							<img src="http://www.treatyourselfmassage.com/wp-content/uploads/2015/03/2014-03-06-09.49.56-e1425361925383.png" alt="Text of image">
						</div>
						<div class="item">
							<img src="http://www.treatyourselfmassage.com/wp-content/uploads/2015/03/2014-03-06-09.49.59-e1425361993149.png" alt="Text of image">
						</div>
						
					</div>
					
				</div>

		

		</div>
			
		</div><!-- container -->
		<br><br>
		</section>

<!-- call to action -->
		<section id='subscribe' class='hidden hidden-md'>
			
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



	<section id='testimonials' class='hidden'>
				
			
				<div class="container">

					




					<div class="container">
  <div class="row">
	<div class="page-header" id="feeback">
		<h2>Testimonials</h2>			
	</div>
	<div class='row'>
	<div class='col-md-2 text-center'>
	<a  target="_blank" href='https://tack.bz/2auIw'><img class='img-responsive' src='http://www.treatyourselfmassage.com/wp-content/uploads/2015/04/pressure-washing-reviews-thumbtack.png'></a>
	<a target="_blank" href='http://www.yelp.com/biz/treat-yourself-massage-philadelphia'><img class='img-responsive' src='http://www.treatyourselfmassage.com/wp-content/uploads/2015/04/yelp-review.png'></a>
	<a target="_blank" href='https://tack.bz/2b0GS'><img class='img-responsive' src='http://www.treatyourselfmassage.com/wp-content/uploads/2015/04/thumbtack-review.png'>
	</div></a>

 
    <div class='col-md-offset-0 col-md-10'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="info col-sm-3 text-center">
                  <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
		<span class='glyphicon glyphicon-ok'></span>
		<p>April 20, 2015</p>
		<p>Stuart A.</p>
                </div>
                <div class="col-sm-9">
			<p>Shawn gives an excellent massage. He uses very therapeutic gliding strokes that left me more relaxed than I’ve felt in some time. He worked all the muscle groups, leaving me standing straighter, as well as feeling taller. I carry a lot of tension in my body, and the massage relaxed me and lessened the tension in a major way. He also did a lot of good work on my lower back, which is my trouble area. I will definitely be back to see Shawn again in the near future.</p>
		
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="info col-sm-3 text-center">
                  <!-- <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" style="width: 100px;height:100px;">-->
		<span class='glyphicon glyphicon-ok'></span>
		<p>April 13, 2015</p>
		<p>Andrew R.</p>
		
                </div>
                <div class="col-sm-9">
                  <p>Had a terrific massage from Shawn a few weeks ago. It had been a really intense week and I must say it was what I needed. It was professional, therapeutic and very relaxing - to the point where I fell in and out of sleep and relaxation. Shawn is professional, talented and to his credit very knowledgeable with regard to the human body, the negative impact of stress and how to balance and manage that with exclusive massage techniques. Truly has healing hands. I recommend him to all interested in experiencing one of the best massages ever!</p>
		
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="info col-sm-3 text-center">
                  <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/keizgoesboom/128.jpg" style="width: 100px;height:100px;">-->
		<span class='glyphicon glyphicon-ok'></span>
		<p>John</p>
                </div>
                <div class="col-sm-9">
                  <p>At first I was very apprehensive about meeting Shawn. This was my very first massage and I was not sure what to expect. After meting him and having such a positive experience, I can assure you it will not be my last. Shawn was very professional from the beginning. The setting was perfect for a relaxing experience. I think Shawn knew I was nervous and he initiated conversation to make me feel at ease. I was pleased with the massage and at times I felt like I was drifting off. I have not been this relaxed in ages. I will definitely use Shawn again and I highly recommend that you do to.</p>
		
                </div>
              </div>
            </blockquote>
          </div>
        </div>
        
        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
  </div>
</div>



			<!--		<div class="row">
					<div class="col-md-10">
						<blockquote>
							<p>I had a massage from Shawn a few weeks back ,when I decide to go to his place I was very nervous but once I met him face to face I felt like I knew him for years .Shawn’s massage technics were very professional and relaxing I have had a bad back for years and have a stressful job (like most people do ) when Shawn started to touch me my stress seemed to exit my body. Shawn a very professional guy as well as warm and engaging .I can’t wait to see him again I know the next time will be even better!!</p>
							<footer>Walter F.</footer>
						</blockquote>
					</div>
					<div class="col-md-10 col-md-offset-2">
						<blockquote class="blockquote-reverse">
							<p>Shawn is one professional therapist. I really enjoyed my time from start to end. Shawn ensured that I was relaxed and happy. He passionately worked the aching pains out of my muscles. I recommend that everyone use Shawn’s services. Just to reiterate, Shawn is extremely professional.</p>
							<footer>Tyson Carter</footer>
						</blockquote>
					</div>
					<div class="col-md-10">
						<blockquote>
							<p>At first I was very apprehensive about meeting Shawn. This was my very first massage and I was not sure what to expect. After meting him and having such a positive experience, I can assure you it will not be my last. Shawn was very professional from the beginning. The setting was perfect for a relaxing experience. I think Shawn knew I was nervous and he initiated conversation to make me feel at ease. I was pleased with the massage and at times I felt like I was drifting off. I have not been this relaxed in ages. I will definitely use Shawn again and I highly recommend that you do to.</p>
							<footer>John</footer>
						</blockquote>
					</div>
				</div>

			--><!--  // END OLD TESTIMONIALS -->



				
				
				
				<div class='text-center'>
					<a href="/leave-a-testimonial" class="btn btn-danger ">Leave A Testimonial</a>	
				</div>
					
					
				</div><!-- // container -->
			
		</section><!-- // testimonials -->

		
		
		<?php //get_template_part('content', 'requests'); ?>
	<section id='instagram'  class='red-bg hidden'>
		
		<div class='container text-center '>
		<div class="page-header" id="feeback">
						<h2>InstaGram Feed </h2>
		</div>
		<?php echo do_shortcode('[instagram-feed]');?> 
		
		</div>
	</section>
	<section id='contact' class='hidden'>
				
			
				<div class="container">

					<div class="page-header" id="feeback">
						<h2>Contact </h2>
					</div>
					<div class="row">
					<div class="col-md-4 text-center ">
						<!--  #  <address>
 						 <strong>North Philadelphia</strong><br>
						  West Allegheny<br>
 						  24th & Allegheny<br>
						  Philadelphia Pa. 19132<br><br>

						</address>-->
						&nbsp;
					</div>
					<div class="col-md-4 text-center">
						
						<a href="https://www.thumbtack.com/pa/philadelphia/shiatsu-massaging/" id="thumbtack-medallion" target="_blank"><img        src="https://static.thumbtack.com/media/widgets/featured-pro.png" alt="Thumbtack Best Pro of 2015"></a><script src="https://static.thumbtack.com/media/widgets/medallion-links.js"></script>
						
						<div class='clearfix'></div><br>
						<strong><a target='_blank' href="http://www.thumbtack.com/pa/philadelphia/therapeutic-massage/massage-therapy">Treat Yourself Massage</a></strong>
						<p>Professional Therapeutic Massage</p>
						<abbr title="Phone">P:</abbr> (267) 712 - 9124<br>
						<a href="mailto:shawn@treatyourselfmassage.com"> shawn@shamanshawn.com </a>
						<br><br>
						  <strong>By Appointment Only</strong>
					</div>
					<div class="col-md-4 text-center">
						&nbsp;
					</div>
				</div>
<br><br>
					
					
				</div><!-- // container -->
			
		</section><!-- // contact-->
		

		<section id='subscribe1' class='tagline1 hidden1 '>
			
				<div class="container text-center">	
				
				<div class=' col-md-4 text-center'>
						
						<div class='clear '><br></div>
						<div class='hidden-xs'><br></div>
				
				  
				 
						
						
						<?php get_template_part( 'ad' , '300-250-1' ); ?>
						<br>
					


				
				</div>
				
				<div class=' col-md-8'><br><br>
				<div class='visible-xs'></div>
					<h2 style='color: #000; text-decoration: underline;'>Plan Your Next Great X-Scape!!</h2>

						<h3>Massage & Manscaping Services</h3>

						<h3>Dinner & Movie Dates</h3>
						
						<h3>Live-In Home Keepers</h3>
						
						<h3>Upscale Companions</h3>

	<br>
				<div class="btn-group ">
					<a href="/companions" class="btn btn-lg btn-default">View Ads</a>
					<a target='_blank' href="/apply" class="btn btn-lg btn-danger">Post Ad</a>
					
				</div>
				
				</div>	
				
			

				</div><!-- // container -->
			
</section><!-- // tagline -->
</div>
<?php get_footer('gold'); ?>