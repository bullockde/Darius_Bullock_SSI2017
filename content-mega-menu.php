<?php $current_user = wp_get_current_user();   ?>


<?php if( is_page( array('profile','user-profile') ) ){   ?>

<!-- Modal -->
  <div class="modal fade 1well 1green bg-blue header" id="myModal2-photos" role="dialog">
    <div class="modal-dialog modal-dialog-centered  text-center">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header hidden1">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title ">- Upload New Photos -</h3>
        </div>
        <div class="modal-body ">
            							
         
			
			<?php //echo do_shortcode('[gravityform id="11" title="false" description="false"]');
			
			echo do_shortcode('[rtmedia_uploader global="true" media_type="photo"]');
			
			?>

        </div>

      </div>
      
    </div>
  </div>

<?php }  ?>




<!-- Modal -->
  <div class="modal fade" id="myModal2-social" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Link Your Social!!!</h3>
        </div>
        <div class="modal-body">
            							
            							
            							
            							<form method='post'>													<div class='profile-social '>
																					<?php $add_social = 0; ?>

				
				
				<div class='clear'></div><br>
		<?php
		$social = get_posts( array( 'post_type' => 'ssi_social' , 'posts_per_page' => -1, 'order' => 'asc' ) );
		
		foreach($social as $lead){
			
			?>
			
			<b><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-<?php echo $lead->post_name; ?>.png"><?php echo $lead->post_title; ?>: </b> <br><br> <input type="text" name="MX_user_<?php echo $lead->post_name; ?>" placeholder="<?php echo $lead->post_title; ?> Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_" . $lead->post_name , 1); ?>" >
			<br><br>
			<?php
			
		}
	?>
	<div class='clear'></div>
	
				<input type='hidden' name='ID' value='<?php echo $userid; ?>'>
				<input type='hidden' name='edit_profile' value='1'>
				
				
					<div class='clear'></div><hr>
				
		<input type='submit' value='Update Profile' class='btn btn-lg btn-success btn-block' style='padding: 2em; '>
		
		
	

			</form>


																				</div>

        </div>

      </div>
      
    </div>
  </div>
  
  
  
  
<!-- Modal -->
  <div class="modal fade" id="myModal2-menu" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Menu</h4>
        </div>
        <div class="modal-body">
            <center>
                <a href="/" class="btn btn-default"> <small>HOME</small> </a>
             <a href="/members" class="btn btn-default"> <small>MEMBERS</small> </a>
             	<a href="/photos" class="btn btn-default"> <small>PHOTOS</small> </a>
	<a href="/videos" class="btn btn-default"> <small>VIDEOS</small> </a>
            
            
                
            </center>
            

	
	
        	
        	
        	
        <hr>
        <u>Profile Menu</u>:<br>
        	
        <a href="/members-list/<?php echo $current_user->user_nicename; ?>/" class="btn btn-default hidden"> <small>My PROFILE</small> </a>
        
        
        <a href="/profile" class="btn btn-default"> <small>My PROFILE</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/photos" class="btn btn-default"> <small>My PHOTOS</small> </a>
	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/videos" class="btn btn-default"> <small>My VIDEOS</small> </a>
	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/album" class="btn btn-default"> <small>ALBUMs</small> </a>
        	<hr>
        	   
    
        	<u>Members Menu</u>:<br>
        	<a href="/members-list/" class="btn btn-default"> <small>MEMBER LIST</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/friends" class="btn btn-default"> <small>FRIENDS</small> </a>
        	
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/followers" class="btn btn-default"> <small>FOLLOWERS</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/following" class="btn btn-default"> <small>FOLLOWING</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/messages" class="btn btn-default"> <small>MESSAGES</small> </a>
        	 <a href="/mailbox" class="btn btn-default"> <small>MAILBOX</small> </a>
        	
        	
        	<hr>
        	
        	<u>Groups Menu</u>:<br>
        	<a href="/forums/" class="btn btn-default"> <small>FORUMS</small> </a>
        	<a href="/groups/" class="btn btn-default"> <small>GROUPS</small> </a>
        	<a href="/groups/create/" class="btn btn-default"> <small>Create a New GROUP</small> </a>
        	
        	<hr>
        	<a href="/events/" class="btn btn-default"> <small>EVENTS</small> </a>
        	<a href="/requests/" class="btn btn-default"> <small>REQUESTS</small> </a>

        	<a href="/sites/" class="btn btn-default"> <small>SITES</small> </a>
        	<a href="/search/" class="btn btn-default"> <small>SEARCH</small> </a>
        	<hr>
        	<u>Lists</u>:<br>
        	<a href="/freak-now/" class="btn btn-default"> <small>THoT LisT</small> </a>
        	
        	<hr>
        	<a target="_blank" href="http://pervpro.com" class="btn btn-warning btn-default1 btn-block"> <small>PervPRO.com</small> </a>
        	<a target="_blank" href="http://instaflixxx.com" class="btn btn-danger btn-default1 btn-block"> <small>InstaFliXXX.com</small> </a>
        	<a target="_blank" href="http://dlfreakfest.org" class="btn btn-info btn-default btn-block"> <small>DLFreakFest.org</small> </a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal2-dash" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title text-center">Dash Menu</h4>
        </div>
        <div class="modal-body">
            <center>
             <a href="/" class="btn btn-default"> <small>HOME</small> </a>
             <a href="/members" class="btn btn-default"> <small>MEMBERS</small> </a>
             	<a href="/photos" class="btn btn-default"> <small>PHOTOS</small> </a>
	<a href="/videos" class="btn btn-default"> <small>VIDEOS</small> </a>
            
                
            </center>
            

	
	
        	
        	
        	
        <hr>
        <u>Profile Menu</u>:<br>
        	
         <a href="/members-list/<?php echo $current_user->user_nicename; ?>/" class="btn btn-default hidden"> <small>My PROFILE</small> </a>
        
        
        <a href="/profile" class="btn btn-default"> <small>My PROFILE</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/photos" class="btn btn-default"> <small>My PHOTOS</small> </a>
	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/videos" class="btn btn-default"> <small>My VIDEOS</small> </a>
	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/media/album" class="btn btn-default"> <small>ALBUMs</small> </a>
        	<hr>
        	   
    
        	<u>Members Menu</u>:<br>
        	<a href="/members-list/" class="btn btn-default"> <small>MEMBER LIST</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/friends" class="btn btn-default"> <small>FRIENDS</small> </a>
        	
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/followers" class="btn btn-default"> <small>FOLLOWERS</small> </a>
        	<a href="/members-list/<?php echo $current_user->user_nicename; ?>/following" class="btn btn-default"> <small>FOLLOWING</small> </a>
        	
        	
        	<hr>
        	
        	<u>Groups Menu</u>:<br>
        	<a href="/forums/" class="btn btn-default"> <small>FORUMS</small> </a>
        	<a href="/groups/" class="btn btn-default"> <small>GROUPS</small> </a>
        	<a href="/groups/create/" class="btn btn-default"> <small>Create a New GROUP</small> </a>
        	
        	<hr>
        	<a href="/events/" class="btn btn-default"> <small>EVENTS</small> </a>
        	<a href="/requests/" class="btn btn-default"> <small>REQUESTS</small> </a>

        	<a href="/sites/" class="btn btn-default"> <small>SITES</small> </a>
        	<a href="/search/" class="btn btn-default"> <small>SEARCH</small> </a>
        	<hr>
        	<u>Lists</u>:<br>
        	<a href="/freak-now/" class="btn btn-default"> <small>THoT LisT</small> </a>
        	
        	<hr>
        	<a target="_blank" href="http://pervpro.com" class="btn btn-warning btn-default1 btn-block"> <small>PervPRO.com</small> </a>
        	<a target="_blank" href="http://instaflixxx.com" class="btn btn-danger btn-default1 btn-block"> <small>InstaFliXXX.com</small> </a>
        	<a target="_blank" href="http://dlfreakfest.org" class="btn btn-info btn-default btn-block"> <small>DLFreakFest.org</small> </a>
        	<a target="_blank" href="http://yungdaddy.com" class="btn btn-info btn-primary btn-block"> <small>YungDADDY.com</small> </a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <a type="button" class="btn btn-default 1btn-md hidden" id="myBtn2" data-toggle="modal" data-target="#myModal-edit" data-show="true">Edit Profile</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal-edit" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title text-center">Edit Profile</h4>
        </div>
        <div class="modal-body">
          
		<div class="well">
		
		<form method='post'>
		
		<div class="col-sm-4 text-center ">
								
			<div class="link upper bold white1">
				<center>
					<?php
						echo  $user->display_name;
					?>
						<br><br>
						<a href="/members-list/<?php echo $current_user->user_nicename; ?>/profile/change-avatar/">
						
							<?php
						
								echo get_avatar($current_user->ID, 150);

							//	print_r($user);
						
			
							?>
							<br>
							Edit Image
						</a>
				</center>
			</div>
									
		<div class='clear'></div><br>

</div>


<div class="col-sm-8  ">
			<div class=" well green mb-0 ">						
			<h3><center>Basic Stats</center></h3><hr>	
				<div class=' col-xs-4'>
				Age:
			</div>
			<div class=' col-xs-8'>
				 <input type='number' name='MX_user_age' placeholder='18' value='<?php echo get_user_meta(  $current_user->ID, 'MX_user_age', 1); ?>' class='form-control'>
			</div>
			<div class='clear'></div><br>
			<div class=' col-xs-4'>
				Ht:
			</div>
			<div class=' col-xs-8'>
				<div class="row">
			<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_height_ft', 1);
					$options = array( '-', '4', '5',  '6',  '7' );

				?>
				<div class=' col-xs-6'>
					<select name="MX_user_height_ft" class="form-control" >
						<?php 
							foreach($options as $option){
								
								?>
								<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?> ft</option>
								<?php
							}
						?>
					</select>
				</div>


				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_height_in', 1);
					$options = array( '-', '0', '1', '2',  '3',  '4', '5',  '6',  '7', '8', '9', '10', '11');

				?>
				<div class=' col-xs-6'>
					<select name="MX_user_height_in" class="form-control" >
						<?php 
							foreach($options as $option){
								
								?>
								<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?> in</option>
								<?php
							}
						?>
					</select>
				</div>
				
			
				
				</div>
				
				
			</div>
					
						
				
				
			
			<div class='clear'></div><br>
			<div class=' col-xs-4'>
				Wt:
			</div>
			<div class=' col-xs-8'>
				<input type='number' name='MX_user_weight' value='<?php echo get_user_meta($current_user->ID, 'MX_user_weight', 1); ?>' class='form-control' >
			</div>	
				 <div class='clear'></div>

				
				</div>
				
			<input type='hidden' name='edit_profile' value='true'>

</div>
		<div class='clear'></div><hr>
		
<div class="prof-info 1col-sm-6">
				<hr><h3><center>Adult Stats</center></h3>
											<hr>
											
			<div class=' col-xs-6'>
				Position:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_position', "user_" . $user->ID);
					
					$options = array( '-', 'Top', 'Vers/Top', 'Vers', 'Vers/Bttm', 'Bottom');

				?>
				<select name="MX_user_position" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
			<div class=' col-xs-6'>
				Endowment:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_endowment', "user_" . $user->ID);
					$options = array('-',  '4', '4.5', '5', '5.5', '6', '6.5', '7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5', '13+');

				?>
				<select name="MX_user_endowment" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
					 inches
			</div>
											
			<div class=' col-xs-6'>
				Cut / Uncut:
			</div>
			<div class=' col-xs-6'>
				<?php 
				
					$att = get_user_meta($current_user->ID, 'MX_user_circumcised', "user_" . $user->ID);
					
					$options = array('-',  'Cut', 'Uncut');

				?>
				<select name="MX_user_circumcised" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>
			</div>
												
												
	</div><div class='clearfix'></div>	<hr>
		<h3><center>Location</center></h3>
											<hr>
		
	
		<div class='col-sm-4'>
			
				<b>City</b>
				<br>
				 <input type='text' name='MX_user_city' placeholder='City' value='<?php echo get_user_meta($current_user->ID, 'MX_user_city', "user_" . $user->ID); ?>' class='form-control' >
		</div>		
		<div class='col-sm-5'>
					<b>State</b>
				<br>
					<select name="MX_user_state" class="form-control" > 
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
			
		</div>
		<div class='col-sm-3'>
			
			<b>Zip</b>
				<br>
				 <input type='number' name='MX_user_zip_code' value='<?php echo get_user_meta($current_user->ID, 'MX_user_zip_code', "user_" . $current_user->ID); ?>' class='form-control' >
				
			
			
		</div> 
		<div class='clearfix'></div><hr>
		
		
		
		
			<div class='socil-links hidden mb-10'>
			<div class="col-md-4 h4 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-onlyfans.png"> Onlyfans: </div> <div class="col-md-8"><input type="text" name="MX_user_onlyfans" placeholder="Onlyfans Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_onlyfans" , 1); ?>" class="form-control" ></div>

			<div class='clearfix mb-10'></div>
			<div class="col-md-4 h4 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-cashapp.png"> CashAPP: </div> <div class="col-md-8"> <input type="text" name="MX_user_cashapp" placeholder="CashAPP Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_cashapp" , 1); ?>" class="form-control" ></div>
			<div class='clearfix mb-10'></div>

			<div class='clearfix mb-10'></div>
			<div class="col-md-4 h4 text-left"><img width="26px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/icon-twitter.png"> Twitter: </div> <div class="col-md-8"><input type="text" name="MX_user_twitter" placeholder="Twitter Username" value="<?php echo get_user_meta($current_user->ID, "MX_user_twitter" , 1); ?>" class="form-control" ></div>

			<div class='clearfix mb-10'></div>
			
			</div>
			<div class='clearfix mb-10'></div>
				
				
				
				
					<hr>
					<h3><center>Full Details</center></h3><div class='clear'></div><hr>
					
	<div class="prof-info col-sm-6">
			
			<div class="col-xs-6">
				<b>Orientation</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_sexual_orientation', 1);
					$options = array( '-', 'Gay', 'Bi', 'Trans', 'DL' );

				?>
				<select name="MX_user_sexual_orientation" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>

		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Ethnicity</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_ethnicity', 1);
					$options = array('-', 'Native American', 'Asian', 'Black', 'Latino', 'Middle Eastern', 'Mixed', 'Pacific Islander', 'White', 'Other' );

				?>
				<select name="MX_user_ethnicity" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Sex</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_sex', 1);
					$options = array('-', 'Guy', 'Girl', 'Trans' );

				?>
				<select name="MX_user_sex" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Hair Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_hair_color', 1);
					$options = array('-', 'Black', 'Blond', 'Red' , 'Gray', 'White', 'Bald', 'Mixed', 'Shaved');

				?>
				<select name="MX_user_hair_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Out?</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_out', 1);
					$options = array('-', 'Yes', 'No');

				?>
				<select name="MX_user_out" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>		
				
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Hair</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_user_body_hair', 1);
					$options = array('-', 'Smooth', 'Shaved', 'Buzzed', 'Some Hair', 'Hairy', 'Bear');

				?>
				<select name="MX_user_body_hair" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>	
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Body Type</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_body_type', 1);
					$options = array('-', 'Slim', 'Average', 'Swimmers', 'Athletic', 'Muscular', 'Bodybuilder', 'Large');

				?>
				<select name="MX_body_type" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		
		<div class="prof-info col-sm-6">
			<div class="col-xs-6">
				<b>Eye Color</b>
			</div>
			<div class="col-xs-6">
				<?php 
				
					$att = get_user_meta($userid, 'MX_eye_color', 1);
					$options = array('-', 'Brown', 'Green', 'Gray', 'Hazel', 'Blue', 'Other');

				?>
				<select name="MX_eye_color" >
				<?php 
					foreach($options as $option){
						
						?>
						<option value="<?php echo $option;?>" <?php if ($att == $option) echo "selected='selected'";?>><?php echo $option;?></option>
						<?php
					}
				?>
				</select>

			</div>
		</div>
		<div class='clearfix mb-5'></div><hr>
									Social Links:  <a type="button" class="btn btn-warning btn-sm hidden1" id="myBtn2" data-toggle="modal" data-target="#myModal2-social" data-show="true"><span class=" glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
 
						
			<div class='clearfix mb-5'></div><hr>
				
				
		<input type='submit' value='Update' class='btn btn-lg btn-success btn-block' style='padding: 1em; '>



	</form>
	</div>
		
		
        </div>
        
      </div>
      
    </div>
  </div>