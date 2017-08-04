<?php
 /*
 
   Template Name: Courses
   Description: Page template to display course custom post types
    
 */
 
 
get_header(); ?>
 
<div id="primary">
 
    <div id="content" role="main">
 
    <header> <?php the_title( '<h3>', '</h3>' ); ?> </header>
    
    <?php
    
    $lessonspost = array( 'post_type' => 'lesson', );
    $loop = new WP_Query( $lessonspost );
        //print_r($loop);die();
    
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
 
    <?php endwhile; ?>
    
    </div>
    
</div>
         <ul>test
<?php

    $currentTaxonomy = get_queried_object_id();

    $args = array('post_type' => 'lessons',
        'tax_query' => array(
            array(
                'taxonomy' => 'course',
                'field' => 'id',
                'terms' => $currentTaxonomy,
            ),
        ),
     );

     $loop = new WP_Query($args);
    //print_r($loop); die();
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        endwhile;
     }
     
?>     
</ul>
<?php get_footer(); ?>