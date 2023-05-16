<?php get_header('network'); ?>

<?php get_template_part('ad', 'popunder-pros'); ?>

<div class='clearfix'></div>
		<section id='our-menu' class='hidden1'>
		<?php 
			
			$men = get_posts(array( 'category_name' => 'men', 'post_type' => 'ssi_models' , 'posts_per_page' => -1 )); 
			$women = get_posts(array( 'category_name' => 'women', 'post_type' => 'ssi_models' , 'posts_per_page' => -1 ));
			$trans = get_posts(array( 'category_name' => 'trans', 'post_type' => 'ssi_models' , 'posts_per_page' => -1 ));
			
			
		?>
			
							<div class="container hidden1">
						

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
							<div class='clearfix'></div><hr>
			
		</section><!-- // services -->
		
		
		<?php
		
					$names = array();
					$numbers = array();
					//print_r($post);
$args = array(  'post_type' => 'ssi_models' , 'orderby' => 'modified',  'order' => 'desc'   , 'posts_per_page' => -1 /*,  'category_name' => 'pros' */);

		$count = 1;
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<?php //if( $count != 1 ){ echo "<hr>" ; } 
			
			$Model_ID = $post->ID;
			
			?>
	<div class='blog-post col-sm-6 '>
		
		<div class='well'>
		<div class='col-sm-6 text-center '>
		
			
			
			<h4 class="post-title text-center"><?php echo get_the_title($Model_ID); ?></h4>
			<?php echo get_the_post_thumbnail( $Model_ID, 'thumbnail' ); ?>
			
			
			
						<div class='pix'>				
	<br>
	<?php if( get_field( 'lead_image_1', $Model_ID ) ){ ?>
		<a target='_blank' href='<?php echo get_field( 'lead_image_1', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_1', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_2', $Model_ID ) ){ ?>	
		<a target='_blank' href='<?php echo get_field( 'lead_image_2', $Model_ID );?>'>
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_2', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_3', $Model_ID ) ){ ?>			
		<a target='_blank' href='<?php echo get_field( 'lead_image_3', $Model_ID );?>'>	
			<div class='col-xs-3 pad0'><img width='65' height='65' src='<?php echo get_field( 'lead_image_3', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	<?php if( get_field( 'lead_image_4', $Model_ID ) ){ ?>		
		<a target='_blank' href='<?php echo get_field( 'lead_image_4', $Model_ID );?>'>			
			<div class='col-xs-3 pad0'> <img width='65' height='65' src='<?php echo get_field( 'lead_image_4', $Model_ID );?>' style='width: 65px; height: 65px;'></div>
		</a>
	<?php }?>
	
		
<div class='clearfix'></div><br>
				
</div>

		</div>
		<div class='col-sm-6 text-center'>
			<div class='visible-xs'><br></div>
			
			<div class='text-center'>
				<h5><?php echo get_post_meta($Model_ID, 'MX_user_city', true); ?>, <?php echo get_post_meta($Model_ID, 'MX_user_state', true); ?></h5>
			</div>
			<div class='clearfix'></div><br>
			
			
			<div class=' col-xs-6'>
				Age:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($Model_ID, 'MX_user_age', true); ?>
			</div>
			<div class=' col-xs-6'>
				Height:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($Model_ID, 'MX_user_height', true); ?>
			</div>
			<div class=' col-xs-6'>
				Weight:
			</div>
			<div class=' col-xs-6'>
				<?php echo get_post_meta($Model_ID, 'MX_user_weight', true) ?>
			</div>
			
			<div class='clearfix'></div><br>
			
				<h4>
					<?php 
			
					
					echo get_field( 'MX_position', $Model_ID ); echo " -- ";
					echo get_field( 'MX_endowment', $Model_ID ); echo "in";	
					
					?>
					</h4>
					
<div class='clearfix'></div>

			<?php
			$phone = preg_replace('/[^0-9]/', '', get_post_meta($Model_ID, 'client_phone', true));
			if(strlen($phone) === 10) {
				$country = 1;
				$area = substr($phone, 0, 3);
				$first = substr($phone, 3, 3);
				$last = substr($phone, 6, 4);
				
				$phone =  $country . "-" . $area . "-" . $first . "-" . $last;
				$name = get_the_title();
				
				
				array_push($names, $name );
				array_push($numbers, $phone );
				echo $phone;
				//Phone is 10 characters in length (###) ###-####
			}

			?>
			
			
			<?php //echo get_post_meta($Model_ID, 'MX_user_phone', true); 
			
			if(get_post_meta($Model_ID, 'MX_user_phone', true)){
				
				?>
				
				<a class="btn btn-primary btn-success btn-block" href="tel:<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>" >
				    <span class="glyphicon glyphicon-earphone " style="font-size: 11px ; padding-right: 3px;"></span> <?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
				</a> 
				
				
				
				<?php 
			}
			
			
			?>
			<!--
			
			<?php echo get_post_meta($Model_ID, 'MX_user_phone', true); ?>
			
			<?php if( get_post_meta($Model_ID, 'client_email', true) ){ }else{ ?> 
			
			<a href='/claim/?claimID=<?php echo $Model_ID; ?>'> Claim This Ad </a><br>
			
			<?php } ?>
			-->
			
			
			
			
						
<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				if(get_user_by_email($email)){
					
					?>

			<a  target='_blank' href='/user-profile?ID=<?php 
				
				$email = get_field('MX_user_email' , $Model_ID);
						 $user = get_user_by_email($email);
				
				echo $user->ID; ?>' class='btn btn-default btn-block'>View Profile</a>
				<?php
					
					
				}
				else{
					
					?>

			<a  target='_blank' href='/claim?claimID=<?php 
				
				
				echo get_the_ID(); ?>' class='btn btn-default btn-block'>Claim Profile</a>
				<?php
					
					
				}
				 ?>
			
			<a href='/bae?ID=<?php echo $Model_ID; ?>' class='btn btn-info btn-block'> Plan a DATE >> </a>
			
			<?php //print_r($post); ?>
		</div>
		<div class='clearfix'></div>
		</div>
		
		<div class='clearfix'></div>
	</div>
				
			
		<?php
			
			if( ($count % 2) == 0 ){ ?> <div class='clear hidden-xs hidden-sm'></div> <?php }
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


	<?php //foreach($names as $name){ echo $name . "<br>" ; } ?>
	<?php //foreach($numbers as $number){ echo $number . "<br>" ; } ?>

	  <?php  /* get_template_part( 'content-widget', 'photos' );*/  ?>

		<section  id="gallery" class="hidden1">
		
				
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
		<section id='subscribe' class='hidden hidden-md1'>
			
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



	<section id='testimonials' class='hidden1'>
				
			
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

		
		
		<?php //get_template_part('content', 'request-page'); ?>
	<section id='instagram'  class='red-bg hidden'>
		
		<div class='container text-center '>
		<div class="page-header" id="feeback">
						<h2>InstaGram Feed </h2>
		</div>
		<?php echo do_shortcode('[instagram-feed]');?> 
		
		</div>
	</section>

		<div class='clearfix'></div><br>

		<section id='subscribe' class='tagline hidden1 '>
			
			
			<br><br>
				<div class=" text-center">	
				
				<div class=' col-md-4 text-center'>
						
						<div class='clear '><br></div>
						<div class='hidden-xs'><br></div>
				
				  
		<center> 
				<?php get_template_part('ad', '300-250-1'); ?>
				
		</center>


				
				</div>
				
				<div class=' col-md-8'>
				<div class='visible-xs'><br></div>
					<h2 style='color: #EC2828; text-decoration: underline;'>Explore our Sexy Companions!!</h2>

						<h3>Massage & Manscaping Services</h3>

						<h3>Dinner & Movie Dates</h3>
						
						<h3>Live-In Home Keepers</h3>
						
						<h3>Upscale Companions</h3>

	<br>
				<div class="btn-group ">
					<a href="/pros" class="btn btn-lg btn-default">View Ads</a>
					<a target='_blank' href="/apply" class="btn btn-lg btn-danger">Post Ad</a>
					
				</div>
				
				</div>	
				
			<div class='clearfix'></div><br><br>

				</div><!-- // container -->
			
</section><!-- // tagline -->
	<div class='clearfix'></div><br><br>
<?php get_footer(''); ?>