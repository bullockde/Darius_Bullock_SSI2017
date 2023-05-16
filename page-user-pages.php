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
 <?php

// Pagination vars
$current_page = get_query_var('paged') ? (int) get_query_var('paged') : 1;
$users_per_page = 2; // RAISE THIS AFTER TESTING ;)

$args = array(
    'number' => $users_per_page, // How many per page
    'paged' => $current_page // What page to get, starting from 1.
);

$users = new WP_User_Query( $args );

$total_users = $users->get_total(); // How many users we have in total (beyond the current page)
$num_pages = ceil($total_users / $users_per_page); // How many pages of users we will need

?>
    <h3>Page <?php echo $current_page; ?> of <?php echo $num_pages; ?></h3>
    <p>Displaying <?php echo $users_per_page; ?> of <?php echo $total_users; ?> users</p>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ( $users->get_results() ) foreach( $users->get_results() as $user )  {
                $firstname = $user->first_name;
                $lastname = $user->last_name;
                $email = $user->user_email;
                ?>
                <tr>
                    <td><?php echo esc_html($firstname); ?></td>
                    <td><?php echo esc_html($lastname); ?></td>
                    <td><?php echo esc_html($email); ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <p>
        <?php
        // Previous page
        if ( $current_page > 1 ) {
            echo '<a href="'. add_query_arg(array('paged' => $current_page-1)) .'">Previous Page</a>';
        }

        // Next page
        if ( $current_page < $num_pages ) {
            echo '<a href="'. add_query_arg(array('paged' => $current_page+1)) .'">Next Page</a>';
        }
        ?>
    </p>
    
     
 <?php
 $current_page = $current_page; // Example
$num_pages = $num_pages; // Example

$edge_number_count = 2; // Change this, optional

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

if ($start_number > 1) echo " 1 ... ";

for($i=$start_number; $i<=$end_number; $i++) {
    if ( $i === $current_page ) echo " [{$i}] ";
    else echo " {$i} ";
}

if ($end_number < $num_pages) echo " ... {$num_pages} ";


?>
<div class='clearfix'></div>

<?php get_footer('preview'); ?>
