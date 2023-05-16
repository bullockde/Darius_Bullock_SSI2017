<?php

function display_theme_files(){
   $theme = wp_get_theme();
   $files = $theme->get_files();

   echo '<h2>All Theme Files</h2>';
   echo '<ul>';
   foreach ($files as $file => $path) {
      echo '<li><strong>' . $file . '</strong>: ' . $path . '</li>';
   }
   echo '</ul>';
}

//add_shortcode('theme_files', 'display_theme_files');

function display_theme_files_dropdown(){
   $theme = wp_get_theme();
   $files = $theme->get_files();

   echo '<h2>Select a Theme File</h2>';
   echo '<select id="theme_files_dropdown">';
   foreach ($files as $file => $path) {
      echo '<option name="filename" value="' . $path . '">' . $file . '</option>';
   }
   echo '</select>';
}

//add_shortcode('theme_files_dropdown', 'display_theme_files_dropdown');


function display_theme_file_content($atts) {
   extract(shortcode_atts(array(
      'file' => ''
   ), $atts));

   if (!empty($file)) {
      $theme = wp_get_theme();
      $content = $theme->get_file_contents($file);

      echo '<h2>' . $file . '</h2>';
      echo '<pre>' . esc_html($content) . '</pre>';
   }
}



function my_wp_get_nav_menu_items( $items, $menu, $args ){
    if ( is_user_logged_in() && class_exists( 'RTMedia' ) ) {
        $url = trailingslashit ( get_rtmedia_user_link ( get_current_user_id () ) ) . RTMEDIA_MEDIA_SLUG . '/'; // get user's media link
        // add new menu item to nav menu
        $parent = 0;
        $order = 3;
        $item = new stdClass();
        $item->ID = 1000000 + $order + $parent;
        $item->db_id = $item->ID;
        $item->title = 'Upload photos';
        $item->url = $url;
        $item->menu_order = $order;
        $item->menu_item_parent = $parent;
        $item->type = '';
        $item->object = '';
        $item->object_id = '';
        $item->classes = array();
        $item->target = '';
        $item->attr_title = '';
        $item->description = '';
        $item->xfn = '';
        $item->status = '';
        $items[] = $item;
    }
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'my_wp_get_nav_menu_items', 99, 3 );

function insert_fb_in_head(){
	 
	?>
	
	<link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
	<link rel="manifest" href="/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	
	<link href="https://fonts.googleapis.com/css?family=Amita|Boogaloo|Bowlby+One+SC|Bungee|Bungee+Inline|Calligraffitti|Cedarville+Cursive|Ceviche+One|Contrail+One|Damion|Faster+One|Fredoka+One|Give+You+Glory|Holtwood+One+SC|Kalam|Kaushan+Script|Knewave|Londrina+Solid|Marck+Script|Merienda+One|Montserrat+Subrayada|Patrick+Hand+SC|Permanent+Marker|Rye|Trirong&display=swap" rel="stylesheet">


	<?php
		
		
	global $post;
	
	
	//if( is_user_logged_in() && is_page('join') ){ $pg = "/members/"; wp_redirect($pg); exit; }
	
	/*if( is_user_logged_in() && is_page('register') ){ 
		$current_user = wp_get_current_user();
		$pg = "/members-list/". $current_user->user_nicename . "/profile/change-avatar/"; 
		wp_redirect($pg); exit; 
	}*/
		
	//if( is_user_logged_in() && is_page('login') ){ $pg = "/members/"; wp_redirect($pg); exit; }
	
	//if( ( is_front_page() && isset($_COOKIE["site_entered"]) ) || is_user_logged_in() ){ $pg = "/members/"; wp_redirect($pg); exit; }
	
	//if( !isset($_COOKIE["message_sound"]) ){ setcookie( 'message_sound' , 'Yes' , time() + 3600, "/"); }
	

	//if ( !is_singular()) //if it is not a post or a page
		//return;
      /*  echo '<meta property="fb:admins" content="100003777409426"/>';
	echo '<meta property="fb:app_id" content="446684948850502"/>';
        
	if(get_field('youtube_id', $post->ID)){
	//	echo '<meta property="og:title" content="' . get_the_title() . ' | DLFreakFest.org"' />';
		echo '<meta property="og:description" content="' . "Travel | Party | Freak - "  . '"/>';
	}else{

	//	echo '<meta property="og:title" content="' . get_the_title() . ' | ' . get_bloginfo("title") . '"/>';
		//echo '<meta property="og:description" content="' . "View this and more when you visit DLFreakFest.org! .. Thanks for you Support!.. " '"/>';
	}

	
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
      //  echo '<meta property="og:site_name" content="DLFreakFest"/>';
	if(get_field('youtube_id', $post->ID)){
		$youtube_image = "http://img.youtube.com/vi/" .  get_field('youtube_id', $post->ID) . "/0.jpg";
		echo '<meta property="og:image" content="' . $youtube_image . '"/>';
		
	}else if( has_post_thumbnail( $post->ID ) ) { //the post does not have featured image, use a default image
		$thumbnail_src = wp_get_attachment_image_url(( get_post_thumbnail_id( $post->ID ) ));
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}else{
		$default_image="http://dlfreakfest.org/wp-content/uploads/2018/04/cropped-DLFreakFest-Jan-2018.jpg"; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
		
	}
	echo "";
	
*/
		//get_template_part('ad', 'google-analytics-code');
	
function dispMailbox()
    {
     /* global $user_ID, $user_login;

	  
	 function my_getAnnouncementsNum()
    {
      global $wpdb; //message_read = 12 indicates that the msg is an announcement :)
	  global $table_prefix;
	  $tableMsgs = $table_prefix."cartpauj_pm_messages";
      $results = $wpdb->get_results("SELECT * FROM {$tableMsgs} WHERE message_read = 12 ORDER BY `id` DESC");
      return $wpdb->num_rows;
    }
	function my_getNewMsgs()
    {
		//echo "Get Messages!";
      global $wpdb, $user_ID;
	  global $table_prefix;
		$tableMsgs = $table_prefix."cartpauj_pm_messages";
		$user_ID = get_current_user_id();
      $get_pms = $wpdb->get_results($wpdb->prepare("SELECT id FROM {$tableMsgs} WHERE (to_user = %d AND parent_id = 0 AND to_del <> 1 AND message_read = 0 AND last_sender <> %d) OR (from_user = %d AND parent_id = 0 AND from_del <> 1 AND message_read = 0 AND last_sender <> %d)", $user_ID, $user_ID, $user_ID, $user_ID));
   // print_r( $get_pms ); 
	 return $wpdb->num_rows;
	
    }
	
		$numAnn = my_getAnnouncementsNum();
	 // $numNew = 'test';
	  $numNew = my_getNewMsgs();
	   
		if( $numNew == 0 ){
			echo "<center><div class='alert-warning text-center mb-0 hidden'><a href='/mailbox/'>No Messages</a></div></center>";
			unset($_COOKIE['message_sound']);
			//setcookie( 'message_sound' , 'Yes' , time() - 3600, "/");
			
		} else if( $numNew > 0 ){
		
		  ?>
		  <div class='alert-success text-center mb-0'><a href='/mailbox/'>You Have (<?php echo $numNew; ?>) Message<?php if( $numNew > 1 ) echo "s"; ?>!</a></div>
		  <?php
			if( (!empty( $_COOKIE["message_sound"] )) || ( $_COOKIE["message_sound"] == "No") ){
				?>
		  <audio controls autoplay class='hidden'>
			<!--  <source src="horse.ogg" type="audio/ogg"> -->
			
			<!-- 
			
				AOL - Got Mail : http://dlfreakfest.org/wp-content/uploads/2020/01/aol-got-mail.mp3
				Bull Whip: /wp-content/uploads/2018/03/Whip-SoundBible.com-1988767601.mp3
			
			
			
			  <source src="/wp-content/uploads/2020/01/aol-got-mail.mp3" type="audio/mpeg">-->
		
			  <source src="/wp-content/uploads/2018/03/Whip-SoundBible.com-1988767601.mp3" type="audio/mpeg">
			  Your browser does not support the audio element.
			</audio>
		  <?php
		  
		  
		 // setcookie( "message_sound" , "Yes" , time() + 900, "/");
		  if( !empty($_COOKIE["message_sound"]) ){ setcookie( "message_sound" , "Yes" , time() + 900, "/"); }
		  
		  }
	  }else{
		   
		  //setcookie( 'message_sound' , 'No' , time() + 1600, "/");
	  }
	  
	    if( $numAnn > 0 ){
		
		  ?>
		  <div class='alert-warning text-center well yellow alert mb-0'><a href='/mailbox/'>New Alert!</a></div><br>
		  
		  <!--  
		  <audio controls autoplay class='hidden'>
			<source src="horse.ogg" type="audio/ogg"> 
			  <source src="/wp-content/uploads/2018/03/Whip-SoundBible.com-1988767601.mp3" type="audio/mpeg">
			  Your browser does not support the audio element.
			</audio>-->
		<!--  <audio autoplay id="myaudio">
			  <source src="http://www.zapsplat.com/wp-content/uploads/2015/sound-effects-four/animal_dog_panting_fast_short_recording.mp3">
			</audio>

			<script>
			  var audio = document.getElementById("myaudio");
			  audio.volume = 0.025;
			</script>-->
		  <?php
	  }
	  
	  
	  $header = "<div class='clear'></div><a href='/mailbox/'><div class='mail-box'><div class='mail-text col-xs-12'><center><img width='30' src='http://dlfreakfest.org/wp-content/uploads/2017/12/mailbox-512-e1512839799342.png' class='pell-left'> (<font color='red'>". $numAnn."</font>) Alerts - (<font color='red'>".$numNew."</font>) ".__("New Messages", "cartpaujpm")."</center></div></div></a>";
	  
	  */

		//return $header;
    }
	
	
	
	
	
	
	
			if( isset($_POST['post_to_draft']) ){
			post_to_draft();
		}elseif( isset($_POST['updater']) ){ 
			//echo "<BR><BR>POST UPDATER--->";
			$updater = $_POST['updater'];
			post_updater();
		}elseif( isset($_POST['insert_client']) ){ 
			//echo "<BR><BR>POST UPDATER--->";
			insert_client();

		}elseif( isset($_POST['ssi_insert_post']) ){ 

			ssi_insert_post();
		}elseif( isset($_POST['insert_transaction']) ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_transaction();
		}elseif( isset($_POST['insert_task']) ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_task();
		}elseif( isset($_POST['task_complete']) ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			task_complete();
		}elseif( isset($_POST['insert_song']) ){ 
			//echo "<BR><BR>Insert Song--->";
			insert_song();
		}elseif( isset($_POST['move_out']) ){ 
			//echo "<BR><BR>Insert Song--->";
			move_out();
		}elseif( isset($_POST['ssi_update_cf']) ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_update_cf();
		
		}elseif( isset($_POST['ssi_new_contact']) ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_new_contact();
		
		}elseif( isset($_POST['ssi_add_user']) ){ 
			//echo "<BR><BR>Insert Song--->";
			ssi_add_user();
		
		}elseif( isset($_POST['add_social']) ){ 
			//echo "<BR><BR>Insert Song--->";
			add_social();
		
		}
		
		
		
		
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
/**

* Check if the current user has an uploaded avatar

* @return boolean

*/


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<?php
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

//Lets add Open Graph Meta Info


add_theme_support('post-thumbnails'); 



function format_telephone($phone_number)
{
    $cleaned = preg_replace('/[^[:digit:]]/', '', $phone_number);
    preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
    return "1-{$matches[1]}-{$matches[2]}-{$matches[3]}";
}

function count_user_posts_by_type( $userid, $post_type ) 
{
    $args = array(
        'numberposts'   => -1,
        'post_type'     => $post_type,
        'post_status'   => array( 'publish', 'private', 'draft', 'pending' ),
        'author'        => $userid
    );
    $count_posts = count( get_posts( $args ) ); 
    return $count_posts;
}


function ssi_add_user(){
	
	$lead = get_post( $_POST['ID'] ); 
	
	//print_r($lead);
	
	if( get_field( "area_code", $lead->ID ) == '215' ){ $role = 'contact_215'; }
	else if( get_field( "area_code", $lead->ID ) == '717' ){ $role = 'contact_717'; }
	else if( get_field( "area_code", $lead->ID ) == '804' ){ $role = 'contact_804'; }
	else if( get_field( "area_code", $lead->ID ) == '202' ){ $role = 'contact_202'; }
	else if( get_field( "area_code", $lead->ID ) == '404' ){ $role = 'contact_404'; }
	else if( get_field( "area_code", $lead->ID ) == '757' ){ $role = 'contact_757'; }
	else if( get_field( "area_code", $lead->ID ) == '856' ){ $role = 'contact_856'; }
	else{ $role = 'contact'; }
	
	
		$username = explode(' ', $lead->post_title);
		$email = get_field( "lead_email", $lead->ID );
		
		if( count($username) == 1 ){ $first_name = $username[0]; $last_name = ''; }
		else if( count($username) == 2 ){ $first_name = $username[0]; $last_name = $username[1]; }
		else if( count($username) == 3 ){ $first_name = $username[0]; $last_name = $username[2]; }
		else{ $first_name = ''; $last_name = ''; }
		
		
		if( get_user_by('login', $username[0] ) ){ $name = $username[0] . "_" . get_field( "area_code", $lead->ID ); }
		else{  $name = $username[0]; }
			
			$userdata = array(
				'user_login'  =>  $name,
				'role'    =>  $role,
				'user_email' => $email,
				'user_pass'   =>  NULL,  // When creating an user, `user_pass` is expected.
				
				'first_name' => $first_name,
				'last_name' => $last_name,
			);
			
		$user_id = wp_insert_user( $userdata ) ;
				

			//On success
			if ( ! is_wp_error( $user_id ) ) {
				echo "<br>User created : ". $user_id;
			}else{
				echo "<br>User Add FAILED!! ";
			}
	
	
} /** Add Users **/


function post_to_draft() 
   {
      
		$postID = $_POST['ID'];
		$postURI = $_POST['URI'];
		
		//$header_loc = "Location:" + $postURI;

		  $my_post = array(
      			'ID'           => $postID,
     			 'post_status'   => 'draft',
			'URI' => $postURI
      			
 		 );

		// Update the post into the database
  		wp_update_post( $my_post );
		
		//echo "URL-----" . $postURI;

		//wp_redirect( $postURI );
		exit;
	
 }//end post_to_draft

 function ssi_update_user_role( $user_ID ) 
{
		$postID = $_POST['ID'];
		$postURI = $_POST['URI'];
		
		// NOTE: Of course change 3 to the appropriate user ID
		$u = new WP_User( $user_ID );
		
	if( $u->has_cap('subscriber') ){ 
		
		// Remove role
		$u->remove_role( 'subscriber' );

		// Add role
		$u->add_role( 'contributor' );
		
		echo "<center>Your Membership has Upgraded to: <u>Premium</u></center>" ;
	}else{
		echo "<center>Your Membership Level: <u>" . $u->get('roles') . "</u></center>" ;
	}
}
function post_updater() 
   {
      
		$postID = $_POST['ID'];
		$client_id = $_POST['client_id'];

		update_field( 'client_id', $client_id, $postID );
		
		// Update the post into the database
  		wp_update_post( $my_post );
		
		wp_redirect( $postURI );
		exit;
	
 }//end post_updater

function move_out(){

		//echo "<BR><BR><BR>Move Out Function";


		$post_id = $_POST['ID'];

		//echo "--->" . $post_id;

		$date_added = $_POST['move_out_date'];

		//echo "--->" . $date_added;

		update_field( "field_56946535d781c", $date_added , $post_id );
}

function insert_client() 
   {
      
		//echo "<BR><BR><BR>Insert Client";

		$postID = $_POST['ID'];
		$client_id = $_POST['client_id'];

		$date_added = $_POST['date_added'];

		$trans_date = $_POST['trans_date'];
		$trans_amount = $_POST['trans_amount'];
		$trans_time = $_POST['trans_time'];
		$trans_service = $_POST['trans_service'];
		$trans_location = $_POST['trans_location'];

		$notes = $_POST['notes'];

		$postURI = $_POST['URI'];


		// Create post object
		$my_post = array(

		'ID' => '',		
		 'post_date'	=> $date_added,
		 'post_title' => $_POST['client_name'] ,
		 'post_content' => $notes . "--" . get_post_field('post_content', $postID) . ' <br>--This post was added from ' . $_POST['cur_post_type'] . ' Page.',
		 'post_status' => 'publish'

		);

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );

		set_post_type( $post_id, $_POST['cur_post_type'] );

	if( $_POST['cur_post_type'] == 'trips'){

		update_field( "field_565e6b9158aa5", $_POST['start_date'] , $post_id );
		update_field( "field_565e6bab58aa6", $_POST['end_date'] , $post_id );
		update_field( "field_5665daffed560", $_POST['trip_state'] , $post_id );
		update_field( "field_5714c1226836d", $_POST['trip_area_code'] , $post_id );
		

		//header( $postURI );
		//exit;
		
	}
		
		//echo "New Client ID: " . $post_id;
		// Add field value
		update_field( "field_56120eb91c6ab", $_POST['client_email'] , $post_id );
		update_field( "field_561246bdee4a8", $_POST['client_phone'] , $post_id );
		update_field( "field_56120ea81c6aa", $_POST['client_city'] , $post_id );
		update_field( "field_56120e8a1c6a9", $_POST['client_state'] , $post_id );
		update_field( "field_5620520a18334", $_POST['trans_amount'] , $post_id );
		update_field( "field_567d5212671f3", $_POST['area_code'] , $post_id ); 


	$new_post = get_post( $post_id );
	$last_date = date("m/d/y", strtotime($new_post->post_date) );

	//echo "-->" . $last_date;
	
	if( $_POST['last_seen'] != '' ){
		update_field( "field_5656666d84821", $_POST['last_seen'] , $post_id );
	}else{
		update_field( "field_5656666d84821", $last_date , $post_id );
	}

	if( $_POST['last_contacted'] != '' ){
		update_field( "field_5656669d84822", $_POST['last_contacted'] , $post_id );
	}else{
		update_field( "field_5656669d84822", $last_date , $post_id );
	}

	if( $trans_date != '' ){
		$field_key = "field_56415f3cbceaf";
		$value = get_field( $field_key, $post_id );
		$value[] = array("date" => $trans_date , "location" => $trans_location , "time" => $trans_time , "service" => $trans_service , "trans_id" => $postID ,"rate" => $trans_amount );
		update_field( $field_key, $value, $post_id );

		
	}

		
		//echo "THIS POST ID: " . $postID;
		update_field( "field_56512b1afcceb", $post_id , $postID );

		wp_reset_query();
		
		//wp_redirect( $postURI );
		//exit;
	
 }//end insert_client

function insert_task() 
   {
      
		//echo "<br><br><br><br>-->INSERT TASK<br><br>";

		wp_reset_query();
		// Update post 37
		$postID = $_POST['ID'];
		$client_id = $_POST['client_id'];


		$date_added = $_POST['trans_date'];

		//echo "DATE-->" . $date_added;

		$date_added = date('Y-m-d H:i:s', strtotime($date_added) );

		//echo "DATE-->" . $date_added;

//exit;
		$trans_amount = $_POST['trans_amount'];
		$trans_time = $_POST['trans_time'];
		$trans_service = $_POST['trans_service'];
		$trans_location = $_POST['task_details'];

		$postURI = $_POST['URI'];

		//echo "Post URI-->" . $postURI;

		// Create post object
		$my_post = array(
		  
		  'ID' => '',
		 'post_date'	=> $date_added,
		 'post_title' => $_POST['trans_service'] ,
		 'post_content' => ' <br>--' . $_POST['task_details'] ,
		 'post_status' => 'publish'

		);
		

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );
		
		set_post_type( $post_id, 'to_do' );

		//echo "--->New Transaction ID: " . $post_id;
		// Add field value
		update_field( "field_56202cbadb9a0", $_POST['client_phone'] , $post_id );
		update_field( "field_56202ce4db9a1", $_POST['client_city'] , $post_id );
		update_field( "field_56202cf5db9a2", $_POST['client_state'] , $post_id );
		update_field( "field_56202d2fdb9a4", $trans_amount , $post_id );
		update_field( "field_563b012c7be2a", $_POST['income_expense'] , $post_id );
		update_field( "field_56549946e545f", $trans_service , $post_id );
		update_field( "field_56549914e545d", $trans_time , $post_id );
		update_field( "field_56549930e545e", $trans_location , $post_id );
		update_field( "field_577e669017e48", $_POST['assigned_to'] , $post_id );
		
		$field_key = "field_56415f3cbceaf";
		$value = get_field( $field_key, $postID);

		
		$value[] = array("date" => date("m-d-Y", strtotime($date_added) ) , "location" => $trans_location , "time" => $trans_time , "service" => $trans_service, "trans_id" => $post_id , "rate" => $trans_amount );
		update_field( $field_key, $value, $postID );

		//echo "THIS POST ID: " . $postID;
		update_field( "field_56512b1afcceb", $post_id , $postID );


		update_field( "field_56512b1afcceb", $client_id , $post_id );
		//update_field( "last_contacted", $date_added , $post_id );

		
		//echo "<br><br><br><br>-->INSERT TRANSACTION DONE<br><br>";


		wp_reset_query();
		
		//header( $postURI );
		//exit;
	
 }//end insert_transaction

function insert_transaction() 
   {
      
		//echo "<br><br><br><br>-->INSERT TRANSACTION<br><br>";

		wp_reset_query();
		// Update post 37
		$postID = $_POST['ID'];
		$client_id = $_POST['client_id'];


		$date_added = $_POST['trans_date'];

		//echo "DATE-->" . $date_added;

		$date_added = date('Y-m-d H:i:s', strtotime($date_added) );

		//echo "DATE-->" . $date_added;

//exit;
		$trans_amount = $_POST['trans_amount'];
		$trans_time = $_POST['trans_time'];
		$trans_service = $_POST['trans_service'];
		$trans_location = $_POST['trans_location'];

		$postURI = $_POST['URI'];

		//echo "Post URI-->" . $postURI;

		// Create post object
		$my_post = array(
		  
		  'ID' => '',
		 'post_date'	=> $date_added,
		 'post_title' => $_POST['client_name'] ,
		 'post_content' => get_post_field('post_content', $postID) . ' <br>--This post was added from Client Page.',
		 'post_status' => 'publish'

		);
		

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );
		
		set_post_type( $post_id, 'transactions' );

		//echo "--->New Transaction ID: " . $post_id;
		// Add field value
		update_field( "field_56202cbadb9a0", $_POST['client_phone'] , $post_id );
		update_field( "field_56202ce4db9a1", $_POST['client_city'] , $post_id );
		update_field( "field_56202cf5db9a2", $_POST['client_state'] , $post_id );
		update_field( "field_56202d2fdb9a4", $trans_amount , $post_id );
		update_field( "field_563b012c7be2a", $_POST['income_expense'] , $post_id );
		update_field( "field_56549946e545f", $trans_service , $post_id );
		update_field( "field_56549914e545d", $trans_time , $post_id );
		update_field( "field_56549930e545e", $trans_location , $post_id );
		update_field( "field_57467e24917c2", $_POST['meeting_place'] , $post_id );
		
		if( $_POST['trans_amount'] != '' ){
		
			$field_key = "field_56415f3cbceaf";
			$value = get_field( $field_key, $postID);

		
			$value[] = array("date" => date("m-d-Y", strtotime($date_added) ) , "location" => $trans_location , "time" => $trans_time , "service" => $trans_service, "trans_id" => $post_id , "rate" => $trans_amount );
			update_field( $field_key, $value, $postID );
	
		}

		//echo "THIS POST ID: " . $postID;
		update_field( "field_56512b1afcceb", $post_id , $postID );


		update_field( "field_56512b1afcceb", $client_id , $post_id );
		//update_field( "last_contacted", $date_added , $post_id );

		
		//echo "<br><br><br><br>-->INSERT TRANSACTION DONE<br><br>";


		wp_reset_query();
		
		//header( $postURI );
		//exit;
	
 }//end insert_transaction

function insert_song() 
   {
      
		echo "<BR><BR><BR>Insert Song";

		$postID = $_POST['ID'];
		$postURI = $_POST['URI'];

		// Create post object
		$my_post = array(

		 'ID' => '',		
		 'post_date'	=> $_POST['date_added'] ,
		 'post_title' => $_POST['song_name'] ,
		 'post_content' => 'This post was Added to Music.',
		 'post_status' => 'publish'

		);

		// Insert the post into the database
		$post_id = wp_insert_post( $my_post );

		if( $_POST['cur_post_type'] == 'video') { set_post_type( $post_id, 'video' ); }
		else{ set_post_type( $post_id, 'music' ); }
		

		set_post_format( $post_id , 'video' );

		// Add field value
		update_field( "field_56059e2a326c2", $_POST['youtube_id'] , $post_id );
	

		wp_reset_query();
		
		//wp_redirect( $postURI );
		//exit;
	
 }//end insert_song

function checkVideoExists( $videoId ) {
        $headers = get_headers('http://img.youtube.com/vi/' . $videoId . '/default.jpg');
        if (!strpos($headers[0], '200')) {
           // echo "The YouTube video you entered does not exist";

	  $my_post = array(
      			'ID'           => $videoId,
     			 'post_status'   => 'draft',
			'URI' => $postURI
      			
 		 );

		// Update the post into the database
  		wp_update_post( $my_post );
            return false;

        }
	return true;
}


  function ssi_update_cf() {
	 

		foreach ($_POST as $param_name => $param_val) {
			
			update_post_meta( $_POST['ID'], $param_name, $param_val  );

		}
	
	$my_post = get_post( $_POST['ID']  );

		// Update the post into the database
  	wp_update_post( $my_post );

	
 }//end ssi_update_cf
 
 //add_action( 'save_post', 'ssi_new_contact', 10, 3 );
 function ssi_new_contact() {
	 

      echo "New Contact Adding!!!";

		$my_post = array(

			'ID' =>  '',	
			'post_title' => $_POST['post_title'],
			'post_status' => 'publish',
			'post_type' => 'ssi_contacts'
			);
			 
			// Update the post into the database
		$_POST['ID'] = wp_insert_post( $my_post );
		
		echo "Added!!! --> " . $_POST['ID'] ;
	
	 
	 
	foreach ($_POST as $param_name => $param_val) {
			add_post_meta($_POST['ID'], $param_name, $param_val, true);
			update_post_meta( $_POST['ID'], $param_name, $param_val  );

		}
	 
	echo "<br> --- ENTER ADD SOCIAL ---";
	
	echo "<br> ---" . $_POST['site'] . "<br> ---" . $_POST['username'] . "<br> ---" . $_POST['ID'] ;
	
    update_field( $_POST['site'], $_POST['username'] , $_POST['ID'] ) ;
	
	echo "Added Social!!!";

	
	$my_post = array(

			'ID' =>  $_POST['ID'],
			'post_content' => 'added'
			
			);
			
	$my_post = get_post( $_POST['ID'] );		

	//echo "<br> New Contact Added!!!";
	
	echo "<br> THE-POST--> " ;
	print_r($my_post);
	
	echo "<br> THE-CAT--> " ;
	
	$category = get_term_by('slug', $_POST['contact_type'], 'category');
		
		print_r($category);
		wp_set_post_categories( $_POST['ID'] , $category->term_id  );

		// Update the post into the database
  	wp_update_post( $_POST['ID'] );
	
	$return_page = $_POST['URI'];
	
	echo " <br>THE-PAGE--> " ;
	print_r($return_page);
	
	
	// Update the post into the database
  	
	wp_publish_post( $_POST['ID'] );
	//wp_update_post( $my_post );
	
	//wp_redirect( $return_page );
	
	//wp_redirect( $_POST['URI'] );
	//exit;
	
	//add_social();
	
 }//end ssi_new_contact
 
  
	