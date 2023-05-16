<?php
/**
 * Template Name: Options Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 
 

 foreach ($_COOKIE as $param_name => $param_val) {
				
	//echo $param_name . " ==> " . $param_val . "<br>";

}
 ?>

 <?php
 foreach ($_POST as $param_name => $param_val) {
				
	//echo $param_name . " ==> " . $param_val . "<br>";

}			
			

 
 if( isset($_COOKIE["contactID"]) )  {	

			$contactID = 0;
			
			$contactID = $_COOKIE["contactID"]; 
			$name = $_COOKIE['name'];
			
			if( isset($_POST["MX_user_email"]) )  {	

	
				setcookie( "MX_user_email", $_POST["MX_user_email"], time() + (86400 * 30), "/");
				update_post_meta( $contactID , "MX_user_email", $_POST["MX_user_email"] );
			}
			$funnel = "/add/?username=$name&ID=$contactID";
		
			wp_redirect($funnel);
			//exit;	
		}
 
  if( isset($_POST["MX_user_email"]) )  {	

	
	setcookie( "MX_user_email", $_POST["MX_user_email"], time() + (86400 * 30), "/");
	
}
if( isset($_POST["MX_user_password"]) )  {	

	
	setcookie( "MX_user_password", $_POST["MX_user_password"], time() + (86400 * 30), "/");
	
}
 
 
		
			
			if( $_POST["key"] == "confirm" ){
			
					$name = "";
				
				if($_COOKIE['name'] == ''){ $name = "Mystery Man"; }else{ $name = $_COOKIE['name']; }
				// Create post object
				$my_post = array(
				  'post_title'    => $name,
				  'post_type'  => 'ssi_thots',
				  'post_status'   => 'publish',
				  'post_author'   => 1,
				  //'post_category' => $cats
				);
				 
				// Insert the post into the database
				$postID = wp_insert_post( $my_post );
				
				setcookie( "contactID", $postID, time() + (86400 * 30), "/");
				update_post_meta( $postID, "contactID", $postID );
					
					

				wp_update_post( $postID ); 
			}
			
			foreach ($_COOKIE as $param_name => $param_val) {
						
						//echo $param_name . " ==> " . $param_val . "<br>";
						
						update_post_meta( $postID, $param_name, $param_val );
						//update_field($param_name, $param_val , "user_" . $current_user->ID );
						//echo "'MX_user_$param_name' ,";
					}
					
					
				
		$current_user = wp_get_current_user();
		//print_r($current_user);
		
		//setcookie( "userID", $current_user->ID, time() + (86400 * 30), "/");
		
		//setcookie( "MX_user_level", "1", time() + (86400 * 30), "/");
		update_post_meta( $postID, "contactID", $postID );
		update_post_meta( $postID, "userID", $current_user->ID );
		
		
			foreach ($_COOKIE as $param_name => $param_val) {
				
				//echo $param_name . " ==> " . $param_val . "<br>";
				
				update_post_meta( $postID, $param_name, $param_val );
				//update_field($param_name, $param_val , "user_" . $current_user->ID );
				//echo "'MX_user_$param_name' ,";
			}
			

		wp_update_post( $postID ); 
		
		
			
			//$funnel = "/list/";
			//$funnel = "/train/?ID=" . $postID;
		
			//wp_redirect($funnel);
			//exit;	
		
		
 
	
 
			//echo "Count-> " . $_POST['count'];
			//echo "<br>Choice-> " . $_POST['choice'];
			
			
			setcookie( $_POST['key'], $_POST['choice'], time() + (86400 * 30), "/");
			
			
			
			//header("Refresh:0");
			//echo "<br>Cookie-> " . $_COOKIE["contactID"];
		if( isset($_POST["MX_user_email"]) ) {	
		
			
			setcookie( "MX_user_email", $_POST["MX_user_email"], time() + (86400 * 30), "/");
			
			//update_post_meta( $_COOKIE['contactID'], 'MX_user_email'  , $_POST["MX_user_email"] );
		
		
			//setcookie( "MX_user_email" , $_POST['MX_user_email'], time() + (86400 * 30), "/");
			
			//$email = $_POST["MX_user_email"];
			
			
			
			$contactID = 0;
			
			$contactID = $_COOKIE["contactID"]; 
			
			
			update_post_meta( $contactID, "MX_user_email", $email );
			
			
			
			wp_update_post( $contactID ); 
			//echo "EMAIL CAPTURED!";
			//wp_redirect($funnel);
			//exit;	
		}

		if( isset($_POST["MX_user_password"]) ) {	
		
			
			setcookie( "MX_user_email", $_POST["MX_user_email"], time() + (86400 * 30), "/");
			

			$contactID = 0;
			
			$contactID = $_COOKIE["contactID"]; 
			$user_password =$_POST["MX_user_password"];
			
			update_post_meta( $contactID, "MX_user_password", $user_password );
			
			
			
			wp_update_post( $contactID ); 

		

			//$funnel = "/list";
			//echo "EMAIL CAPTURED!";
			//wp_redirect($funnel);
			//exit;	
		}
		
			
		if( isset($_POST["MX_user_password"]) || is_user_logged_in() ) {	

			if( $_COOKIE['person'] == "Pix" ){ $funnel = "/photos/"; }
			if( $_COOKIE['person'] == "Vids" ){ $funnel = "/videos/"; }
			
			$funnel = "/list";
		
			wp_redirect($funnel);
			//exit;	
		}
		
		

get_header('no-login'); ?> 
	
	

<div id="options" class="col-md-6 col-md-offset-3">


	<?php //print_r($current_user->ID);
		
		//wp_redirect('/tour/');
		//exit;	
		
		//setcookie( $v_username, $v_value, 30 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
		
		$questions = array(
		
					array ( 
					"key" => "human",
					"q" => "Have we Met Before?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					array ( 
					"key" => "member",
					"q" => "Are you a Site Member?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					 array ( 
					"key" => "name",
					"q" => "Awesome!! <br>Im <u>THoTmasTer</u> .. and You Are?",
				   "a1" => "John",
				   "a2" => "Jane"
					 ),
					 array ( 
					"key" => "gender",
					"q" => "You Consider Yourself a:",
				   "a1" => "Boy",
				   "a2" => "Girl"
					 ),
					array ( 
					"key" => "seeking",
					"q" => "What Are You Seeking?",
				   "a1" => "Sex",
				   "a2" => "Love"
					 ),
					 array ( 
					"key" => "person",
					"q" => "Which Turns You On More?",
				   "a1" => "Pix",
				   "a2" => "Vids"
					 ),
					  array ( 
					"key" => "MX_user_email",
					"q" => "Confirm you are Human!",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					 array ( 
					"key" => "confirm",
					"q" => "Does this look about right?",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
					
					 array ( 
					"key" => "thanks",
					"q" => "Thank You!",
				   "a1" => "Yes",
				   "a2" => "No"
					 )
					 , array ( 
					"key" => "thanks",
					"q" => "Thank You!",
				   "a1" => "Yes",
				   "a2" => "No"
					 ),
		);
		
		//print_r( $questions );
		//echo " --> " ;
		//print_r($_POST['key']);
		//echo " <br> " ;
		//echo " --> " ;
		//print_r($_POST['choice']);
		//echo " <br> " ;
		//setcookie( $_POST['key'], $_POST['choice'], time() + (86400 * 30), "/");
		
		
		
		
		foreach($questions as $question){
				
				//print_r($question['key']);
				
				//echo " --> " ;
				
				//print_r($_COOKIE[$question['key']]);
				
				//echo " <div class='clear'></div><hr>" ;
				
				
			}
			
		
		$count = $_POST['count'];
		if( !isset( $_POST['count'] ) ){  $count = 0; }
		$question = $questions[$count];
		
	
 
	if( $_POST['key'] == "MX_user_email" ) {
		
		
			
			echo "<br><br><h4 class='1link upper bold'><center> You are a <u>" . $_COOKIE['gender'] . "</u> named <u>" . $_COOKIE['name'] . "</u> seeking <u>" . $_COOKIE['seeking'] . "</u>.</center></h4>";
			
			
			
			
		}
		
				?> 
				
		
		
		
	<div class='col-xs-12'>	

		<?php 
			if( $_POST['key'] == "member" && $_POST['choice'] == "Yes" ) { 
			
					?>
						
						<br><br><h3 class="1entry-title text-center link upper 1bold">Login Below</h3><br>
					<?php
				
				}else{
			?>
			
				<br><br><h3 class="1entry-title text-center link upper 1bold"><?php echo $question['q']; ?></h3><br>
		
		
				<?php }
		
		
		?>
		
		<form id='options' method='POST' >
			<div class='well options text-center'>
				
				<input type='hidden' name='key' value='<?php echo $question['key']; ?>'> 	
				<input type='hidden' name='count' value='<?php echo $count+1; ?>'> 
			
				
				<?php 
				
					if( $question['key'] == 'name' ){
						
						if( $_POST['choice'] == "Yes" ) { 
					
							?>
								<center><a href='/profile'>Member Login </a></center>
							<?php
						
						}else{
					?>
					
					<center><input type="text" name='choice' placeholder='Type Your Name' width="75%">
					</center>
					<input type='submit' class='btn btn-danger' value='Submit'> 
				
						<?php }
				
				}else if( $question['key'] == 'MX_user_email' ){
					?>
					
					<center><input type="text" name="MX_user_email" placeholder="Enter Your Email" width="75%">
					</center>
					<input type='submit' class='btn btn-danger' value='Submit'> 
				
				<?php }else if( $question['key'] == 'thanks' ){
					?>
					
					<center>
					

					<div class='clearfix'></div>
					<h4><center>Create A Password</center></h4>
					<div class='clearfix col-xs-6 mb-10'>
						<div class='clearfix mb-10'></div>	
						<center><input type='text' name='MX_user_password' placeholder='Enter Password' class='form-control'></center>
					</div>		
					<div class='clearfix col-xs-6 mb-10'>
							<div class='clearfix mb-10'></div>	
						<center><input type='text' name='MX_user_confirm_password' placeholder='Confirm Password' class='form-control'></center>
					</div>

					<input type='submit' class='btn btn-danger' value='Next Step &raquo;'> 
					
					</center>
					
				
				<?php }else{ ?>
					<div class='col-xs-6 '>
						<input type='submit' name='choice' class='btn btn-danger btn-lg' value='<?php echo $question['a1']; ?>'> 
						
				</div>
				<div class='col-xs-6 '>
						<input type='submit' name='choice' class='btn btn-danger btn-lg' value='<?php echo $question['a2']; ?>'> 
				</div>
				
				<?php } ?>	
				<div class='clear'></div>
			</div>	
		</form>
	</div>			
			<?php
			
	
			
		echo " <div class='clear'></div><br>" ;

?>

	<?php  if(  $_POST['key'] == "human" &&  $_COOKIE['member'] == "Yes"  ){ ?>
	
			<center><a href='/profile'>Member Login </a></center>
		
		<?php } ?>
		



	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
	<div class='clear'></div>

<?php //get_sidebar(); ?>
<?php get_footer('preview'); ?>