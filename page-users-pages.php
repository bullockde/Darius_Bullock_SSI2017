<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
 

get_header(); ?>
<div class="well mb-0" style="padding: 10px;">
 <?php

// Pagination vars
$current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;

$users_per_page = isset( $_REQUEST['users_per_page'] ) ? (int) $_REQUEST['users_per_page'] : 6; // RAISE THIS AFTER TESTING ;)

$args = array(
    'number' => $users_per_page, // How many per page
    'paged' => $current_page, // What page to get, starting from 1.
    'meta_key' => 'when_last_login',
						'orderby'  => 'meta_value_num',
						'order'  => 'desc',
);

$users = new WP_User_Query( $args );

$total_users = $users->get_total(); // How many users we have in total (beyond the current page)
$num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need

?>

<div class="clearfix mb-0"></div>
<form method="GET" class="form-inline visible-xs visible-sm">
    
    <div class="1form-control form-inline">
        <div class="1col-xs-6 text-center  ">
            Showing <input type="text" name="users_per_page" placeholder="<?php echo $users_per_page; ?>" min="6" max="<?php echo $total_users; ?>" step="6" [size]="2" class="form-control1 form-control-sm" style="width:50px;" list="presets1"> of <?php echo $total_users; ?> Users
            <datalist id="presets1">
              <option value="2">
              <option value="4">
              <option value="6">
              <option value="8">
              <option value="10">
              <option value="12">
            </datalist>
        </div>
        
        <div class="clearfix "></div>
    </div>
    
</form>
<form method="GET" class="form-inline hidden-xs hidden-sm">
    
    <div class="1form-control form-inline">
       
        <div class="1col-xs-6 text-center ">
            Showing <input type="text" name="users_per_page" placeholder="<?php echo $users_per_page; ?>" min="6" max="<?php echo $total_users; ?>" step="6" [size]="2" class="form-control1 form-control-sm" style="width:50px;" list="presets2"> of <?php echo $total_users; ?> Users
            <datalist id="presets2">
              <option value="3">
              <option value="6">
              <option value="9">
              <option value="12">
              <option value="18">
              
            </datalist>
        </div>
        <div class="clearfix "></div>
    </div>
    
</form>
    
<div class="clearfix mb-10"></div>

    <table>
        <thead class="hidden">
            <tr>
                
                <th>ID</th>
                
                 <th>Author Data</th>
     <th>Agent Name</th>
     <!--<th>Email</th>-->
     <th>Action</th>
               
            </tr>
        </thead>

        <tbody>
            <?php
            if ( $users->get_results() ) foreach( $users->get_results() as $user )  {
                $firstname = $user->first_name;
                $lastname = $user->last_name;
                $email = $user->user_email;
                ?>
                
                
                
                
                <div class="col-xs-6 col-md-4 person text-center well mb-10">
						
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
					echo '- ' ;
		}
			?>
</center>
	<div class="clearfix mb-5"></div>

<div class="mini-left">

								<div class=" porn">
									<center>
								<?php
								
									
										echo get_avatar($user->ID, 150);
								
								?> 
									
									</center>
								</div>
								

<div class="clearfix mb-5"></div>
</div>
<?php									
										$closet = 0;
				
								
	?>

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
	
			
						
								
									
									?><br></div>
									</div></a></div>
									
									
									
                <tr class="hidden">
                    
                    
       <?php              
         $author_info = get_userdata($user->ID); 
         
         echo '<td><a target="_blank" href="/user-profile/?ID='.$user->ID.'">'.$user->ID.'</a></td>'; ?>
        <td>
            <span style="float:left;padding:0 5px 0 0;"><?php echo get_avatar( $user->ID, 50 ); /* http://codex.wordpress.org/Function_Reference/get_avatar */ ?></span>
        <span class="fn"><strong>First name</strong> : <?php echo $author_info->first_name; ?></span><br />
        <span class="ln"><strong>Last name</strong> : <?php echo $author_info->last_name; ?></span><br />
        <span class="em"><strong>Email address</strong> : <a href="mailto:<?php echo $author_info->user_email; ?>"><?php echo $author_info->user_email; ?></a></span><br />
        <span class="we"><strong>Website</strong> : <a href="<?php echo $author_info->user_url; ?>"><?php echo $author_info->user_url; ?></a></span><br />

        <span class="de"><strong>Bio</strong> :<br /><?php echo $author_info->description ; ?></span>
        <div class="clear">&nbsp;</div>
        </td>
        

       <?php 
        
        
        echo '<td>'.$user->user_login.'</td>';
       // echo '<td>'.$user->user_email.'</td>';
        echo '<td><a href="/wp-admin/user-edit.php?user_id='.$user->ID.'">Edit</a></td>';
        ?>
                    
                    
                    
                    
                    
                  
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<div class="clearfix "></div>
    
        
        <?php
        // Previous page
        if ( $current_page > 1 ) {
            echo '<a class="pull-left btn btn-primary" href="'. add_query_arg(array('paged' => $current_page-1)) .'">&laquo; PREV</a>';
        }
?>
<?php
        // Next page
        if ( $current_page < $num_pages ) {
            echo '<a class="pull-right btn btn-primary" href="'. add_query_arg(array('paged' => $current_page+1)) .'">NEXT &raquo;</a>';
        }
        ?>
   
        

<form method="GET" class="form-inline text-center">
    
    <div class="1form-control form-inline">
        
        <div class="1col-xs-6  form-inline">
           
            Page <input type="number" name="paged" value="<?php echo $current_page; ?>" min="1" max="<?php echo $num_pages; ?>" class="form-control1 form-control-sm" style="width:50px;"> of <?php echo $num_pages; ?>
             <input type="submit" value="&rarr;" class="btn hidden btn-default form-control">
        </div>
        <div class="clearfix "></div>
    </div>
    
</form>

    
 <div class="text-center hidden"> 
 <?php
 $current_page = $current_page; // Example
$num_pages = $num_pages; // Example

$edge_number_count = 1; // Change this, optional

$start_number = $current_page - $edge_number_count;
$end_number = $current_page + $edge_number_count;

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

if ($start_number > 1) echo " <a href='?paged=1'>1</a> ... ";

for($i=$start_number; $i<=$end_number; $i++) {
    //echo "Start" . $i;
    if ( $i == $current_page ) echo "[{$i}]"; //echo '<input type="number" name="paged" value="' . $i . '" min="1" max="' . $num_pages . '" class="form-control1" style="width:40px;">'
    else echo " <a href='?paged={$i}'>{$i}</a> ";
}

if ($end_number < $num_pages) echo " ... <a href='?paged={$num_pages}'>{$num_pages}</a> ";


?>

</div>   


<div class='clearfix'></div>
</div>
<?php get_footer('preview'); ?>
<script>
    
$('form input').change(function() {
    $(this).closest('form').submit();
});
</script>
