<?php

/**
 * Homes enqueue
 */
function rent_enqueue_scripts() {
	wp_enqueue_script( 'rent-script', plugins_url( 'assets/scripts/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
	wp_localize_script( 'rent-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'rent_enqueue_scripts' );

/**
 * Function take care of the like of the home
 *
 * @return void
 */
function rent_home_like()
{
    $home_id = esc_attr($_POST['home_id']);
    $likes_number = get_post_meta($home_id, 'likes', true);

    if (empty($likes_number)) {
        update_post_meta($home_id, 'likes', 1);
    } else {
        $likes_number = $likes_number + 1;
        update_post_meta($home_id, 'likes', $likes_number);
    }
    wp_die();
}
add_action('wp_ajax_nopriv_rent_home_like', 'rent_home_like');
add_action('wp_ajax_rent_home_like', 'rent_home_like');

/**
 * Display a single home term function
 *
 * @param integer $post_id
 * @param [type] $taxonomy
 * @return void
 */
function rent_display_single_term($post_id, $taxonomy)
{

    if (empty($post_id) || empty($taxonomy)) {
        return;
    }

    $terms = get_the_terms($post_id, $taxonomy);

    $output = '';
    if (!empty($terms) && is_array($terms)) {
        foreach ($terms as $term) {
            //var_dump( $term->name );
            $output .= $term->name . ', ';
        }
    }

    return $output;
}

/**
 * Display other 2 homes from this function
 *
 * @param [type] $post
 * @return void
 */
function rent_display_other_homes_per_location($home_id)
{
    if (empty($home_id)) {
        return;
    }

    $homes_args = array(
        'post_type' => 'home',
        'post_status' => 'publish',
        'orderby' => 'name',
        'posts_per_page' => 2,
    );
    //var_dump($homes_args);
    $homes_query = new WP_Query($homes_args);

    if (!empty($homes_query)) {

?>
        <ul class="properties-listing">
            <?php foreach ($homes_query->posts as $home) { ?>
                <?php //var_dump($home); 
                ?>
                <li class="property-card">
                    <div class="property-primary">
                        <h2 class="property-title">
                            <a href="<?php echo $home->guid ?>">
                                <?php echo $home->post_title ?>
                            </a>
                        </h2>
                        <div class="property-meta">
                            <span class="meta-location"><?php echo rent_display_single_term(get_the_ID(), 'location'); ?></span>
                            <span class="meta-total-area">Total area: 91.65 sq.m</span>
                        </div>
                        <div class="property-details">
                            <span class="property-price">€ 100,815</span>
                            <span class="property-date"><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                    <div class="property-image">
                        <div class="property-image-box">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('home-thumbnail');
                            } else {
                                echo '<img src="wp-content\themes\rent-homes\assets\images\bedroom.jpg" alt="property image">';
                            }
                            ?>
                        </div>
                    </div>
                </li>

            <?php  } ?>
        </ul>

<?php
    }
}

/**
 * Display the current user name if the user is logged in
 *
 * @return void
 */
function rent_home_display_username()
{
    $output = '';
    if (is_user_logged_in()) {
        //var_dump('Yes, we are logged in!');
        $current_user = wp_get_current_user();
        //var_dump($current_user);
        $user_display_name = $current_user->data->display_name;
        $user_url = $current_user->data->user_url;
        $output = 'Hey ' . strtoupper($user_display_name) . ', you are the BEST!!! ' . '<br>' .
            'My URL is: ' . $user_url;
    } else {
        $output = 'No, you are not logged in!';
    }
    return $output;
}
add_shortcode('display_username', 'rent_home_display_username');

/**
 * This function preview the count of visitors in homes-post
 *
 * @param integer $post_id
 * @return void
 */
function rent_update_homes_visit_count($post_id = 0)
{
    //if ( is_singular( 'home' ) ) {
    //    var_dump('yes, we are in the homes page!'); die();
    //} else {
    //    var_dump('in else');
    //}
    //die();
    if (empty($post_id)) {
        return;
    }

    $visit_count = get_post_meta($post_id, 'visits_counts', true);

    if (!empty($visit_count)) {
        $visit_count = $visit_count + 1;
        update_post_meta($post_id, 'visits_counts', $visit_count);
    } else {
        update_post_meta($post_id, 'visits_counts', '1');
    }
}

/**
 * This function search word in content of the site, and replace it 
 *
 * @param [type] $title
 * @return void
 */
function detect_word( $content ) {
    //var_dump( $content );
    $search = 'Welcome';
    if ( str_contains( $content, $search ) ) {
       $new_str = str_replace(  $search, '<span style="color:green">NEW-TEST-WORD</span>', $content);
    } else {
        $new_str = $content .= '<p style="color:red">Word doesn`t match!<p/>';
    }
    return $new_str;
}
add_filter( 'the_content', 'detect_word' );