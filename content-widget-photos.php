<section id='blog' class=' hidden1 visible-xs1 visible-md1'>
	<div class='container'>
			
			
			
			<div class="well blue white text-left pad-0">
			    <div class='col-md-2 blog-post'>
			        <br>  <br>
					<h3>Recent Photos</h3>
					</div>
					<div class='col-md-8 '>
					<?php
$args = array( 'posts_per_page' => 6, 'post_type' => 'ssi_photos' , 'orderby' => 'rand' );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			
			
				<a href="/?p=<?php echo $post->ID; ?>">
					<div class='col-md-2 blog-post'>
						<?php 

							if ( has_post_thumbnail() ) {
								the_post_thumbnail('thumbnail', array( 'style' => 'width: 100px; height: 100px; margin: 10px;' ,'class' => ' 1img-responsive img-thumbnail','alt' => get_the_title(), 'title' => ''));
							}else{
								?>
									<img src="http://www.gravatar.com/avatar/23aaf70341a81b1cba173f16b3e28098?s=75&r=x&d=http%3A%2F%2Fdlfreakfest.org%2Fwp-content%2Fuploads%2F2019%2F11%2F5dde1c7720197-bpfull.jpg" alt="User Image" class="img-thumbnail 1img-responsive">
								<?php
							}
						  	
						
						?>
						<br>
						<?php
						//the_title();
						?>
						
						<div class='clearfix'></div>
					</div>
				</a>
			
		<?php endforeach; 
		wp_reset_postdata();?>
            </div>
			<div class='col-md-2 blog-post'>
			      <div class='clearfix mb-10'></div><br>
				<a href='/photos/' class='btn btn-lg btn-warning btn-block'>Photos &raquo;</a>
			</div>
				<div class='clearfix'></div>
		</div>
	</div><!-- // container -->		
</section><!-- // Blog SPace -->