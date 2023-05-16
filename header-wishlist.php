<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

		<meta name="juicyads-site-verification" content="6e91def5f8d40ef73b4555af9358c2aa">
	
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
<!-- Google Analytics Code -->		

<?php  get_template_part( 'ad', 'google-analytics-code' ); ?>

<!-- END Google Analytics Code -->	

<style>
	
	body{
		background: #000000;
	}
	
	.jumbotron, #footer {
		max-width: 100%;
		background: url(https://cdn.pixabay.com/photo/2017/01/18/19/53/texture-1990741_960_720.png);
		background-size: cover;
		color: #fff;
		background-color: #000;
	}
	.footer-bottom {
		background-color: #e60000;
		padding: 2em;
		color: #fff;
		margin: 0;
	}
	@media screen and (min-width: 768px){
		.jumbotron {
			padding: 0;
			margin: 0;
		}
	}
</style>
</head>



<body <?php body_class(); ?>>

		<a class="skip-link screen-reader-text" href="#content"><?php  _e( 'Skip to content', 'twentysixteen' ); ?></a>

		   <div class='clear'></div>
		
<!-- Jumbotron -->
		
		<div class="jumbotron">
			<div class="container text-center">
				
			<div class='col-xs-12'>
				<h1><?php //bloginfo( 'name' ); ?><span class='x'>F</span>ANTASY <span class='x'>W</span>ISHLIST</h1>
				
			</div>
			
			<div class='col-xs-12'>
				
				<p>Make A Wish..<br class='visible-xs'> We Make it HAPPEN!</p>
				<div class="btn-group hidden">
				<a href="/services" class="btn btn-lg btn-default">Service Menu</a>
				<a target='_blank' href="/fantasy" class="btn btn-info btn-lg">Make A Wish >></a>
				
				</div>
				
				<a target='_blank' href="/fantasy" class="btn btn-info btn-lg hidden-xs">Make Your Wish >></a>
				
				<a target='_blank' href="/fantasy" class="btn btn-info btn-lg visible-xs">Make A Wish >></a>
				
				
			</div>

<div class='clear'></div>
			</div><!-- // container -->
			
			
		</div><!-- // jumbotron  -->
<div class='clear'></div>

<?php 
	if( $_POST['post_to_draft'] ){
			post_to_draft();
		}elseif( $updater = $_POST['updater'] ){ 
			//echo "<BR><BR>POST UPDATER--->";
			post_updater();
		}elseif( $_POST['insert_client'] ){ 
			//echo "<BR><BR>POST UPDATER--->";
			insert_client();
		}elseif( $_POST['insert_transaction'] ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_transaction();
		}elseif( $_POST['insert_task'] ){ 
			//echo "<BR><BR>Heder - Insert Trans--->";
			insert_task();
		}elseif( $_POST['insert_song'] ){ 
			//echo "<BR><BR>Insert Song--->";
			insert_song();
		}elseif( $_POST['move_out'] ){ 
			//echo "<BR><BR>Insert Song--->";
			move_out();
		}elseif( $_POST['fix'] ){
			
				$friends = get_posts( array( 'post_type' => 'friends' , 'posts_per_page' => -1 ) );
				$leads = get_posts( array( 'post_type' => 'leads' , 'posts_per_page' => -1 ) );
				$clients = get_posts( array( 'post_type' => 'clients' , 'posts_per_page' => -1 ) );
			
				$fixers = array_merge($friends,$clients,$leads);

			
			foreach($fixers as $fix){
				if( get_field( 'lead_city', $fix->ID ) == "Richmond" ){ 
					update_field( "field_567d5212671f3", "804" , $fix->ID ); //area_code
				}else if( get_field( 'lead_city', $fix->ID ) == "Lancaster" ){ 
					update_field( "field_567d5212671f3", "717" , $fix->ID ); //area_code
				}else if( get_field( 'lead_city', $fix->ID ) == "Harrisburg" ){ 
					update_field( "field_567d5212671f3", "717" , $fix->ID ); //area_code
				}else if( get_field( 'lead_city', $fix->ID ) == "Philadelphia" ){ 
					update_field( "field_567d5212671f3", "215" , $fix->ID ); //area_code
				}else if( get_field( 'lead_state', $fix->ID ) == "VA" ){ 
					update_field( "field_567d5212671f3", "757" , $fix->ID ); //area_code
				}else if( get_field( 'lead_state', $fix->ID ) == "PA" ){ 
					update_field( "field_567d5212671f3", "215" , $fix->ID ); //area_code
				}else if( get_field( 'lead_state', $fix->ID ) == "DC" ){ 
					update_field( "field_567d5212671f3", "202" , $fix->ID ); //area_code
				}else if( get_field( 'lead_state', $fix->ID ) == "MD" ){ 
					update_field( "field_567d5212671f3", "202" , $fix->ID ); //area_code
				}else if( get_field( 'lead_state', $fix->ID ) == "GA" ){ 
					update_field( "field_567d5212671f3", "404" , $fix->ID ); //area_code
				}
			}

		}

		global $post;
?>
	<form method='post' class='hidden'>
		<input type='hidden' name='fix' value='true'>
		<input type='submit' value='FIX'>
	</form>
	
