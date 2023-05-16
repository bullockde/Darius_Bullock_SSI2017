


<section id='upgrade' class='hidden <?php if( is_front_page() ){ echo "1hidden"; } ?>'>
		<hr><center><h3>
		 Get Full ACCESS to <?php bloginfo( 'name' ); ?>
		</h3><h4>1 Month - Just $30!</h4><br> <a href='/upgrade' class='btn- btn-lg btn-success'>Get Full Access >></a><br><br>(SAFE - SECURE - 1 Month Billing)<br></center><hr>	
	</section> 
	
	<div class='clear'></div>
	<div class='container '>
	<?php 
			
				
	
	
				$args = array( 'order' => 'ASC' ,'post_type' => 'photo', 'posts_per_page' => -1  );
				$pix = get_posts( $args );
				
				$args = array( 'order' => 'ASC' ,'post_type' => 'video', 'posts_per_page' => -1  );
				$vids = get_posts( $args );
			?>
			<div class='clear'></div>
			
	<div class='col-md-4 col-md-offset-4 single text-center'>
		<a href='/videos/ ' class='btn btn-warning btn-lg btn-block'>All Videos >></a>
	</div>
	<div class='col-md-4 single text-center'>
		<a href='/photos/ ' class='btn btn-warning btn-lg btn-block'>All Photos >></a>
	</div>
	
			<div class='clear'></div>
			
	<div class='col-md-4 col-md-offset-4 single text-center'>
	
		
		<h3><center> <u>Public</u> can Explore!</center></h3>
	

				<div class='col-xs-6 '><b><u>Public</u> Vids </b><div class='clear'></div><br>
					<?php 

						$free_vids = 0;
						$member_vids = 0;
						foreach( $vids as $item ){
							if(get_field( 'member_level', $item->ID ) != 'Public' ){
								$member_vids++;
								continue;
							}else{
								$free_vids++;
							}
						}

					?>
					<div class='clear'></div> 
					<div class=' col-xs-12'>
						
						<h4><?php echo $free_vids; ?></h4>
						</div>
					
					<div class='clear'></div><br>
					<a href='/videos/ ' class='btn btn-warning'>View All (<?php echo $free_vids; ?>)</a>
					<div class='clear'></div><hr>
					
				</div>
				<?php 
						
								
							$free_pix = 0;
							$member_pix = 0;
							foreach( $pix as $item ){
								if(get_field( 'member_level', $item->ID ) != 'Public' ){
									$member_pix++;
									continue;
								}else{
									$free_pix++;
								}
							}
										
				?>
				<div class='col-xs-6 '><b><u>Public</u> Pix </b><div class='clear'></div><br>

							<h4><?php echo $free_pix; ?></h4>
						
						
					<div class='clear'></div><br>
					<a href='/photos/' class='btn btn-warning'>View All (<?php echo $free_pix; ?>)</a>
					<div class='clear'></div><hr>
				</div>
				
				<div class='clear'></div><br>
			</div>
			<div class='col-md-4 single text-center'>
			
				
				<div class=' col-md-12'>
				
				
					<h3><u>Members</u> get More!</h3>
					
					<div class='col-xs-6 '><b><u>Member</u> Vids </b><div class='clear'></div><br>
									
					<div class='clear'></div> 
					
					<div class=' col-xs-12'>
						
						
						<h4><?php echo $member_vids; ?></h4>
						
					</div>
					<div class='clear'></div><br>
					<a href='/videos/ ' class='btn btn-warning'>View All (<?php print_r(count($vids)); ?>)</a>
					<div class='clear'></div><hr>
					
				</div>
				<div class='col-xs-6 '><b><u>Member</u> Pix </b><div class='clear'></div><br>
					
					<div class='clear'></div> 
					
						
						<div class=' col-xs-12'>
						
							
							<h4><?php echo $member_pix; ?></h4>
						</div>
					<div class='clear'></div><br>
					<a href='/photos/' class='btn btn-warning'>View All (<?php print_r(count($pix)); ?>)</a>
					<div class='clear'></div><hr>
				</div>
				
				

			
			</div>
			
	</div>
	
	<div class=' col-md-8 col-md-offset-4 upgrade text-center'>
	
				<h3>Upgrade Your Membership!</h3>
				<?php if( !is_user_logged_in() ){  ?> 
					<b>Current Level:</b> <u>Public</u><br><br>
					<h4 style="text-align: center; margin-top: 0;">Upgrade to <u>Member</u>  - FREE!<br><small>(Limited Time Only)</small></h4><br><p style="text-align: center;"><a class="btn btn-success" href="/register/">Upgrade Now! </a></p>
				
				
				<?php }else{ ?>
				
				<div class=' col-md-12'>
					<b>Current Level:</b>  <u>Member</u><br><br>
					
					<h4 style="text-align: center; margin-top: 0;"><u>Premium</u> Upgrade - Just $1<br><small>(Limited Time Only)</small></h4><br><p style="text-align: center;"><a class="btn btn-success" href="https://ssi.memberful.com/checkout?plan=13503">Upgrade Now! </a></p>
				</div>

				<?php } ?>
			</div>
<div class='clear'></div>