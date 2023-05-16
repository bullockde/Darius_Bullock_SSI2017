<?php 


	$requests = get_posts( 
		
			array(	'posts_per_page'   => -1,  
					//'date_query' => array( array( 'before' => '1 month ago' ) )  
				) 
		);
if( $_GET['run'] == 'show' ){
	
}
if( $_GET['run'] == 'status' ){
	
	$_GET['requestID'];
	$_GET['status'];
	
	update_field("field_57a0546904d91", $_GET['status'], $_GET['requestID']);
	
	$cat_id = get_cat_ID( strtolower ( $_GET['status'] ) );
					$post_categories = array($cat_id);
					wp_set_post_categories( $_GET['requestID'], $post_categories );
}
if( $_GET['run'] == 'sync' ){
		$count = 1;
			foreach($requests as $request){
					$status = get_field( "request_status", $request->ID );
					
					
					echo $count++ . " -- ";
					
			switch ($status) {
				case "Pending":
					$cat_id = get_cat_ID( 'pending' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
				   echo "Pending...<br>";
					break;
				case "Interested":
					$cat_id = get_cat_ID( 'interested' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "Molly is Interested..   but she needs more information<br>";
					break;
				case "Invited":
					$cat_id = get_cat_ID( 'invited' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "You are Invited! - Invite Sent<br>";
					break;
				case "Booked":
					$cat_id = get_cat_ID( 'booked' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "You are Booked! - A Time has been Set<br>";
					break;
				case "Completed":
					$cat_id = get_cat_ID( 'completed' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "Request Completed!<br>";
					break;
				case "Denied":
					$cat_id = get_cat_ID( 'denied' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "Request Denied<br>";
					break;
				case "Hold":
					$cat_id = get_cat_ID( 'on-hold' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "On Hold<br>";
					break;
				case "Expired":
					$cat_id = get_cat_ID( 'expired' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					echo "UPDATED!!!<br>";
					break;
				default:
					$cat_id = get_cat_ID( 'pending' );
					$post_categories = array($cat_id);
					wp_set_post_categories( $request->ID, $post_categories );
					update_field("field_57a0546904d91", "Pending", $request->ID);
					echo "UPDATED!!!<br>";
					//echo "Pending...<br>";
						
			}
				
		}
		
		
		header("Location: /admin/?status=success");
		exit;
		
}	/*** END SYNC FUNCTION **/	
		
if( $_GET['run'] == 'addusers' ){
	
	foreach($requests as $request){
		$username = explode(' ', $request->post_title);
			$email = get_field( "MX_user_email", $request->ID );
			$pass = "ILove2FreaK" . $request->ID;
			
			$userdata = array(
				'user_login'  =>  $username[0],
				'role'    =>  'author',
				'user_email' => $email,
				'user_pass'   =>  NULL  // When creating an user, `user_pass` is expected.
			);
			
			$first = GFFormsModel::get_leads( '2' );
			
			//echo "TEST-->" . $first[$count][11];
			
		if( $email != '' && !get_user_by('email', $email ) ){
			edit_post_link( 'edit', '<small>', '</small> - ', $request->ID );
			//$incount = ($count-34);
			//update_field("MX_user_email", $first[$incount][11] , $request->ID);
			echo $count . " -- ";
			echo $username[0] . " -- ";
			echo $email . " -- ";
			echo $pass . " -- <br>";
			
			if( !get_user_by('email', $email ) ){ echo $email . ' is NOT a User! <br>'; }
			$user_id = wp_insert_user( $userdata ) ;
		}else{
			echo $count . " -- ";
			echo $username[0] . " -- ";
			echo $email . " -- ";
			echo $pass . " -- <br>";
		}
		$count++;
		

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}
			
	}
} /** Add Users **/


if( $_GET['run'] == 1 ){
			$count = 1;
			
			$hburg = 0;
			$lanc = 0;
			$snj = 0;
			$philly = 0;
			$allen = 0;
			$york = 0;
			$other = 0;
			
			$A_hburg = array();
			$A_lanc = array();
			$A_snj = array();
			$A_philly = array();
			$A_allen = array();
			$A_york = array();
			$A_other = array();
			
			$A_donate = array();
		
		//$need_locations = array();
		
		foreach($requests as $request){
			
			
			//$cat_id = get_cat_ID( 'archived' );
			//$post_categories = array($cat_id);
			//wp_set_post_categories( $request->ID, $post_categories );
			
				
			
			if( get_field( "lead_state", $request->ID ) ==  "PA" ){ 
				if( get_field( "lead_city", $request->ID ) ==  "Philadelphia" ){ 
					echo $count++ . " -- "; echo "Philadelphia, PA"; echo "<br><hr>";
					$philly++; array_push( $A_philly , $request->ID );
				}else if( get_field( "lead_city", $request->ID ) ==  "Allentown" ){ 
					echo $count++ . " -- "; echo "Allentown, PA"; echo "<br><hr>";
					$allen++; array_push( $A_allen , $request->ID );
				}else if( get_field( "lead_city", $request->ID ) ==  "Lancaster" ){ 
					echo $count++ . " -- "; echo "Lancaster, PA"; echo "<br><hr>";
					$lanc++; array_push( $A_lanc , $request->ID );
				}else if( get_field( "lead_city", $request->ID ) ==  "Harrisburg"  /*&& ( get_field( "lead_donation", $request->ID ) == "I am Definitely Willing to Donate If I Enjoy!")*/ ){ 
					echo $count++ . " -- "; echo "Harrisburg, PA"; echo "<br><hr>";
					$hburg++; array_push( $A_hburg , $request->ID );
				}else if( get_field( "lead_city", $request->ID ) ==  "York" ){ 
					echo $count++ . " -- "; echo "York, PA"; echo "<br><hr>";
					$york++; array_push( $A_york , $request->ID );
				}else{
					echo $count++ . " -- "; echo "CORRECT -- PA -- "; echo get_field( "lead_city", $request->ID ); 
					edit_post_link( 'edit', '<small>', '</small>', $request->ID );
					array_push( $need_locations , $request->ID );
					echo "<br><hr>";
					$other++; array_push( $A_other , $request->ID );
					
					
			
				}
			}else{
			
				echo $count++ . " -- ";
				echo "City: " . get_field( "lead_city", $request->ID ) . ' ...  ... ';
				echo "State: " . get_field( "lead_state", $request->ID ) . ' ...  ... ';
				edit_post_link( 'edit', '<small>', '</small>', $request->ID );
				array_push( $need_locations , $request->ID );
				echo "<br><hr>";
			}
			
			echo "Donate: " . get_field( "lead_donation", $request->ID );
			echo "<br>";
			echo "Donate: " . get_field( "lead_amount", $request->ID );
			echo "<hr>";
			
			if( get_field( "lead_donation", $request->ID ) == "I am Definitely Willing to Donate If I Enjoy!"){ echo "YAY!!";  array_push( $A_donate , $request->ID ); }
		}
			echo "<br>Hburg ->" . $hburg;
			echo "<br>Lanc ->" . $lanc;
			echo "<br>SNJ ->" . $snj;
			echo "<br>Philly ->" . $philly;
			echo "<br>Allen ->" . $allen;
			echo "<br>York ->" . $york;
			echo "<br>Other ->" . $other;
			
			
			echo "<br><br> HBURG -- ";
			print_r($A_hburg);
			echo "<hr> LANC -- ";
			print_r($A_lanc);
			echo "<hr> SNJ -- ";
			print_r($A_snj);
			echo "<hr> Philly -- ";
			print_r($A_philly);
			echo "<hr> ALLEN -- ";
			print_r($A_allen);
			echo "<hr> York -- ";
			print_r($A_york);
			echo "<hr> OTHER -- ";
			print_r($A_other);
			echo "<hr>";
			
			
			echo "<hr> DONATES -- ";
			print_r($A_donate);
			echo "<hr>";
			
			$count = 0;
			$hburg = 0;
			$lanc = 0;
			$snj = 0;
			$philly = 0;
			$allen = 0;
			$york = 0;
			$other = 0;
			
			$A_hburg = array();
			$A_lanc = array();
			$A_snj = array();
			$A_philly = array();
			$A_allen = array();
			$A_york = array();
			$A_other = array();
			
			$A_donate = array();
			
			foreach($A_donate as $leads){
				
				$request = get_post($leads);
				
				print_r($leads);
				echo $request->post_title . "<br>";
				
				echo get_field( "MX_user_email", $request->ID ) . "<br>";
				
				echo get_field( "lead_city", $request->ID ) . " ... ";
				echo get_field( "lead_state", $request->ID ) . "<br>";
				
				
	
			}
			echo "Donate: " . get_field( "lead_donation", $request->ID );
			echo "<br>";
			echo "Donate: " . get_field( "lead_amount", $request->ID );
			echo "<hr>";
				
				
			
			echo "<br>Hburg ->" . $hburg;
			echo "<br>Lanc ->" . $lanc;
			echo "<br>SNJ ->" . $snj;
			echo "<br>Philly ->" . $philly;
			echo "<br>Allen ->" . $allen;
			echo "<br>York ->" . $york;
			echo "<br>Other ->" . $other;
			
			
				echo "<br><br> HBURG -- ";
			print_r($A_hburg);
			echo "<hr> LANC -- ";
			print_r($A_lanc);
			echo "<hr> SNJ -- ";
			print_r($A_snj);
			echo "<hr> Philly -- ";
			print_r($A_philly);
			echo "<hr> ALLEN -- ";
			print_r($A_allen);
			echo "<hr> York -- ";
			print_r($A_york);
			echo "<hr> OTHER -- ";
			print_r($A_other);
			echo "<hr>";
		/*
		
			$first = GFFormsModel::get_leads( '2' );

		//$second = GFFormsModel::get_leads( '9' );


		//$all_users = array_merge( $first, $second  );
		echo "<br><br>ALL USERS: <br>";
		
		print_r($first);
		
		$count=1;
		foreach( $first as $user ){
			echo $count++ . " -- ";
			echo $user[18] . " -- "; //name
			echo $user[11] . " -- "; //email
			echo " -- <br>";
		}
		*/
}// END run=1

		echo "<a href='/admin/'> Back to Admin </a>";
		
		
?>