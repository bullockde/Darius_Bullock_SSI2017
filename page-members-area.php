<?php get_header('profile'); 

	$cats = array( get_cat_ID('current-event') , get_cat_ID('playroom') );

	$events = get_posts(array( 'post_type' => 'ssi_events', 'category' =>  $cats, 'posts_per_page' => 5 , 'order' => 'desc'));
	
	$event = $events[0];
	
	//print_r( $events );
	
	//echo "<span class='alert alert-danger btn-block text-center'> Site Maintenance - Ends at 6AM!</span>";
	?>
	
	<?php
	
	        	echo dispMailbox(); 
			//get_template_part( 'content', 'upcoming-events' ); 
		 //get_template_part( 'content', 'uc-events' ); 
		 //get_template_part( 'content', 'welcome-profile' ); 
		 //
		  
		
		
	?>

		

	<div class='col-md-8 col-md-offset-2 hidden'>
	
		<?php /* if( !is_paged() ){ get_template_part( 'content', 'upcoming-events' ); } */ ?>
		
		<div class='clearfix'></div>
	</div>
	<div class='clearfix mb-10'></div>
 <?php

	$no=8;// total no of author to display

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged==1){
  $offset=0;  
}
else {
   $offset= ($paged-1)*$no;
}
    $args = array(
                        //'role' => 'subscriber',
						'meta_key' => 'when_last_login',
						'orderby'  => 'meta_value_num',
						'order'  => 'desc',
        'number' => $no, 'offset' => $offset,
                            'meta_query' => array(
                                array(
                                    'key' => $filter,
                                    'value' => $_GET['filter'],
                                    'compare' => 'LIKE'
                                )
                            ));
							
			 $user_query = new WP_User_Query( $args );				
							
			$total_user = $user_query->total_users;  				
	?>
	
	<div class='results container  hidden' >
								
							<button id='members-search' class='btn btn-default'>Member Search</button>
						<?php
									if($username) echo " containing  <em>" . $username . "</em>&nbsp;&nbsp;&nbsp;";
									if($state) echo " in <u>" . $state . "</u>&nbsp;&nbsp;&nbsp;";
									if($photo) echo " &#x2714; Pix";
									if($no_social) echo " &#x2714; Social";
									echo "<span style='float: right;'>" . $total_user ." Results</span>";
						
						
						?><div class='clear'></div><hr>
						</div>
							

<div class='col-md-8  ' >


		

	
	
<div id='members-search' class='home-beta mini users text-center well yellow' style='display:none;'>

				<div class='members-search'>
				
				
 <!--   START HOMEPAGE -->

	
			<h4> Member Search </h4><hr>
				<form name='state-filter'  action='/member-search/'>
							 
							<b class='hidden1'>Filter By State:</b>
							
										<select name="MX_user_state" > 
              <option value="">Select a State</option> 
              <option value="AL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AL'){ print 'selected="selected"'; } ?>>AL - Alabama</option> 
              <option value="AK" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AK'){ print 'selected="selected"'; } ?>>AK - Alaska</option> 
              <option value="AZ" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AZ'){ print 'selected="selected"'; } ?>>AZ - Arizona</option> 
              <option value="AR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'AK'){ print 'selected="selected"'; } ?>>AR - Arkansas</option> 
              <option value="CA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CA'){ print 'selected="selected"'; } ?>>CA - California</option> 
              <option value="CO" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CO'){ print 'selected="selected"'; } ?>>CO - Colorado</option> 
              <option value="CT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'CT'){ print 'selected="selected"'; } ?>>CT - Connecticut</option> 
              <option value="DE" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'DE'){ print 'selected="selected"'; } ?>>DE - Delaware</option> 
              <option value="DC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'DC'){ print 'selected="selected"'; } ?>>DC - District of Columbia</option> 
              <option value="FL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'FL'){ print 'selected="selected"'; } ?>>FL - Florida</option> 
              <option value="GA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'GA'){ print 'selected="selected"'; } ?>>GA - Georgia</option> 
              <option value="HI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'HI'){ print 'selected="selected"'; } ?>>HI - Hawaii</option> 
              <option value="ID" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ID'){ print 'selected="selected"'; } ?>>ID - Idaho</option> 
              <option value="IL" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IL'){ print 'selected="selected"'; } ?>>IL - Illinois</option> 
              <option value="IN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IN'){ print 'selected="selected"'; } ?>>IN - Indiana</option> 
              <option value="IA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'IA'){ print 'selected="selected"'; } ?>>IA - Iowa</option> 
              <option value="KS" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'KS'){ print 'selected="selected"'; } ?>>KS - Kansas</option> 
              <option value="KY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'KY'){ print 'selected="selected"'; } ?>>KY - Kentucky</option> 
              <option value="LA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'LA'){ print 'selected="selected"'; } ?>>LA - Louisiana</option> 
              <option value="ME" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ME'){ print 'selected="selected"'; } ?>>ME - Maine</option> 
              <option value="MD" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MD'){ print 'selected="selected"'; } ?>>MD - Maryland</option> 
              <option value="MA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MA'){ print 'selected="selected"'; } ?>>MA - Massachusetts</option> 
              <option value="MI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MI'){ print 'selected="selected"'; } ?>>MI - Michigan</option> 
              <option value="MN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MN'){ print 'selected="selected"'; } ?>>MN - Minnesota</option> 
              <option value="MS" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MS'){ print 'selected="selected"'; } ?>>MS - Mississippi</option> 
              <option value="MO" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MO'){ print 'selected="selected"'; } ?>>MO - Missouri</option> 
              <option value="MT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'MT'){ print 'selected="selected"'; } ?>>MT - Montana</option> 
              <option value="NE" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NE'){ print 'selected="selected"'; } ?>>NE - Nebraska</option> 
              <option value="NV" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NV'){ print 'selected="selected"'; } ?>>NV - Nevada</option> 
              <option value="NH" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NH'){ print 'selected="selected"'; } ?>>NH - New Hampshire</option> 
              <option value="NJ" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NJ'){ print 'selected="selected"'; } ?>>NJ - New Jersey</option> 
              <option value="NM" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NM'){ print 'selected="selected"'; } ?>>NM - New Mexico</option> 
              <option value="NY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NY'){ print 'selected="selected"'; } ?>>NY - New York</option> 
              <option value="NC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'NC'){ print 'selected="selected"'; } ?>>NC - North Carolina</option> 
              <option value="ND" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'ND'){ print 'selected="selected"'; } ?>>ND - North Dakota</option> 
              <option value="OH" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OH'){ print 'selected="selected"'; } ?>>OH - Ohio</option> 
              <option value="OK" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OK'){ print 'selected="selected"'; } ?>>OK - Oklahoma</option> 
              <option value="OR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'OR'){ print 'selected="selected"'; } ?>>OR - Oregon</option> 
              
              <option value="PA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'PA'){ print 'selected="selected"'; } ?>>PA - Pennsylvainia</option> 
              <option value="PR" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'PR'){ print 'selected="selected"'; } ?>>PR - Puerto Rico</option> 
              <option value="RI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'RI'){ print 'selected="selected"'; } ?>>RI - Rhode Island</option> 
              <option value="SC" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'SC'){ print 'selected="selected"'; } ?>>SC - South Carolina</option> 
              <option value="SD" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'SD'){ print 'selected="selected"'; } ?>>SD - South Dakota</option> 
              <option value="TN" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'TN'){ print 'selected="selected"'; } ?>>TN - Tennessee</option> 
              <option value="TX" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'TX'){ print 'selected="selected"'; } ?>>TX - Texas</option> 
              <option value="VT" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VT'){ print 'selected="selected"'; } ?>>VT - Vermont</option> 
              <option value="VI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VI'){ print 'selected="selected"'; } ?>>VI - Virgin Islands</option> 
              <option value="VA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'VA'){ print 'selected="selected"'; } ?>>VA - Virginia</option> 
              <option value="WA" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WA'){ print 'selected="selected"'; } ?>>WA - Washington</option> 
              <option value="WV" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WV'){ print 'selected="selected"'; } ?>>WV - West Virginia</option> 
              <option value="WI" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WI'){ print 'selected="selected"'; } ?>>WI - Wisconsin</option> 
              <option value="WY" <?php if (get_user_meta($current_user->ID, 'MX_user_state', "user_" . $user->ID) == 'WY'){ print 'selected="selected"'; } ?>>WY - Wyoming</option> 
            </select>
							
							<b>Only Members w/</b> <input type='checkbox' name='photo' value='1'>Pics <input type='checkbox' name='no_social' value='1'>Social
							<br><br>
							<input type='text' name='user' placeholder='Enter Username' >
							
							<input type='submit' value='Filter'>
							
							

							
					</form>
					<br>
					


			<div class='clear'></div><hr>
			<a href='/member-search?photo=1'>View All Members</a>
	</div>
<!--   END HOMEPAGE -->	

				</div>	
				
<?php	

   
    if ( !empty( $user_query->results ) ) {
        foreach ( $user_query->results as $user ) {
             
		

			 //FOREACH User
			 $index = 0;
							

							//update_user_meta( $user->ID, 'wp-last-login', time() );

									if( (!isset($username) || $username == "") ||  preg_match("/" . $username . "/i", $user->display_name) ){

								
						?>		
						
						
	<div class="col-xs-6 col-md-3 person text-center well mb-10">
						
						<a href="/user-profile/?ID=<?php echo $user->ID; ?>">
						<div id="user-mini">
							<div class="link upper bold ">
								<?php echo substr($user->display_name, 0, 13); ?>
								
								<span class='hidden' style='float:right; background: #ffffff; padding: 0 2px; color: #ff0000; '>S: <?php echo $social; ?></span>
							</div>
	
<center> 
<?php	
		$age = get_user_meta( $user->ID, 'MX_user_age', 1 );
		$weight = get_user_meta( $user->ID, 'MX_user_weight', 1 );
		
		
		if( ($age == "" || $age == "-" || $age == "N/A" || $age == "60+") ) {  }else{
				if( !is_numeric($age) && !is_numeric($weight) ){ echo "DELETE from stats!";
					$delete_user = 1;
					wp_delete_user( $user->ID );

				}
		}
							
							
		if( get_user_meta($user->ID, 'MX_user_age' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_age' , 1) . ' | ';
		}else{
					echo '- | ';
		}
		if( get_user_meta($user->ID, 'MX_user_height_ft' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_height_ft' , 1) . "' " . get_user_meta($user->ID, 'MX_user_height_in' , 1) . '" | ' ;
		}else{
					echo '- | ' ;
		}
		if( get_user_meta($user->ID, 'MX_user_weight' , 1) ){
					echo get_user_meta($user->ID, 'MX_user_weight' , 1);
		}else{
					
		}
			?>
</center>
	<div class="clearfix mb-5"></div>

<div class="mini-left">

								<div class=" porn">
									<center>
								<?php
								
									if(get_avatar($user->ID)){
		
										echo get_avatar($user->ID, 150);
									}else{
										echo "<img src='http://dlfreakfest.org/wp-content/uploads/2019/11/green-hoody-man.jpg' width='250px' height='250px' class=''>";
									}
								?> 
									
									</center>
								</div>
								
					<div class="position hidden">		
				<?php		
						if( get_user_meta($user->ID, 'MX_user_position' , 1) ){
							
							echo get_user_meta($user->ID, 'MX_user_position' , 1);
						}else{
							echo "-";
						}
								
						?>
					</div>
<?php						
						
										
										if ( !function_exists( 'bp_core_fetch_avatar' ) ) { 
											require_once '/bp-core/bp-core-avatars.php'; 
										} 
										  
										// An array of arguments. All arguments are technically optional; some will, if not provided, be auto-detected by bp_core_fetch_avatar(). This auto-detection is described more below, when discussing specific arguments. 
										$args = array( 
											'item_id' =>  $user->ID, 
											'object' => '', 
											'type' => '' 
										); 
									  
										// NOTICE! Understand what this does before running. 
										$result = bp_core_fetch_avatar($args);

									
									?>
<div class="clearfix mb-5"></div>
</div>
<?php									
										$closet = 0;
				
								
	?>
	<div class='clear full-login upper bold text-left hidden'>
	<?php
					echo "";
								$last_login = (int) get_user_meta( $user->ID, 'when_last_login' , true );
											if ( $last_login ) {
												$format = apply_filters( 'wpll_date_format', get_option( 'date_format' ) );
												$value  = date_i18n( $format, $last_login );
												echo "<br>Last Here <span style='float: right;'>" . $value . "</span>";
											}else{
												echo "<br>Joined <span style='float: right;'>" . mysql2date($format, $user->user_registered ) . "</span>";
												$joined_date = mysql2date($format, $user->user_registered );
												update_user_meta( $user->ID, 'when_last_login' , $joined_date );
											}
					
		?>
		</div>
		<?php
					echo "<div class='clear full upper bold '>";
										
								$closet = 0;
								if ( get_user_meta($user->ID, 'MX_user_city', 1 ) && get_user_meta($user->ID, 'MX_user_state', 1) ){

																		echo ' <span style="text-transform: capitalize;">' . get_user_meta($user->ID, 'MX_user_city', 1 ) . '</span>, ';
																		echo get_user_meta($user->ID, 'MX_user_state', 1) ;

								}
								else if ( get_user_meta($user->ID, 'MX_user_state', 1) ){
									echo  get_user_meta($user->ID, 'MX_user_state', 1);
								}
								else{
									$closet = 1;
									echo '-';
								}				
	
					echo "<br></div>";
						
									echo '</div></a></div>';
									$count++;
									if( ($count % 2) == 0 ){ 
						?>					
				
								<div class='visible-xs'></div>

						<?php		}else if( ($count % 4) == 0 ){ 
						?>					
				
								<div class='clear'></div>

						<?php		}else{
							
							?> 
							
							<?php
									}
								}// END STATE IF
			 
			 
        }
    }
else {
 echo '<h4>No agents found.</h4>';
}

echo "<div class='clear mb-10'></div>";






$total_user = $user_query->total_users;  
              $total_pages=ceil($total_user/$no);
			  
			  
			  
			  
$current_page = $paged; // Example
$num_pages = $total_pages; // Example

$edge_number_count = 1; // Change this, optional

$start_number = $current_page - $edge_number_count;
$end_number = $current_page + $edge_number_count;

?>

<div class="ssi-pagination well 1mb-0" style="padding: 5px;">	
<h3>


<center>
<?php
// Previous page
     /*   if ( $current_page > 1 ) {
            echo '<a href="'. add_query_arg(array('paged' => $current_page-1)) .'">Previous Page</a>';
        }*/
	if(!get_previous_posts_link()) {
				echo '<button class="btn btn-lg btn-primary">« Prev</button> ' ;
				} else {
				previous_posts_link('« Prev');
				echo "&nbsp;";
				}	
// Minus one so that we don't split the start number unnecessarily, eg: "1 ... 2 3" should start as "1 2 3"
if ( ($start_number - 1) < 1 ) {
    $start_number = 1;
    $end_number = min($num_pages, $start_number + ($edge_number_count*2));
}

// Add one so that we don't split the end number unnecessarily, eg: "8 9 ... 10" should stay as "8 9 10"
if ( ($end_number + 1) > $num_pages ) {
    $end_number = $num_pages;
    $start_number = max(1, $num_pages - ($edge_number_count*2));
}

//if ($start_number > 1) echo " 1 ... ";

for($i=$start_number; $i<=$end_number; $i++) {
    if ( $i === $current_page ) echo "&nbsp;({$i})&nbsp;";
    else echo "&nbsp;{$i} ";
}

//if ($end_number < $num_pages) echo " ... {$num_pages} ";

// Next page
        if ( $current_page < $num_pages ) {
			
			echo "&nbsp;";
            echo '<a class="btn btn-lg btn-primary" href="'. add_query_arg(array('paged' => $current_page+1)) .'">NEXT &raquo;</a>';
        }
		
		
?>
</center></h3>
</div>			
<div class='clear'></div>
<?php if( !wp_is_mobile() ){  ?>
		<center><div class='img-thumbnail hidden'><?php get_template_part( 'ad', '728-90' ); ?></div></center>
<?php }  ?>
 </div>
<?php if( 1 /*wp_is_mobile()*/ ){  ?>
<div class='col-md-4  ' >

		<?php 
		
			//get_template_part('content' , 'member-quicknav'); 

			get_template_part( 'content', 'sidebar-ads' ); 
			
			//get_template_part( 'content', 'sidebar-upcoming-events' );
			
			//get_template_part( 'ad', '300-250-1' );
		
		
		?>
		
		
		
	
 </div>
<?php } ?>
 <div class='clearfix'></div>
 


 
 <?php 
	//get_template_part( 'content', 'uc-events' ); 
	
	//get_template_part( 'content-widget', 'photos' ); 
 
	//get_template_part( 'content', 'welcome-profile' ); 
 ?>
 
 </div>
<?php get_footer('members'); ?>