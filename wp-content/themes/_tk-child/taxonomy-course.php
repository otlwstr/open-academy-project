<?php get_header(); ?>

<?php

    $currentTaxonomy = get_queried_object_id();
    //print_r($currentTaxonomy); die();

    $args = array('post_type' => 'lessons',
        'tax_query' => array(
            array(
                'taxonomy' => 'course',
                'field' => 'id',
                'terms' => $currentTaxonomy,
            ),
        ),
     );
    echo term_description( $t->term_id, 'course' );
     $loop = new WP_Query($args);
    // print_r($loop); die();
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
        endwhile;
     }
     
?>     

<?php get_footer(); ?>