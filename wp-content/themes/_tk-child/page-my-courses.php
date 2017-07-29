<?php
get_header(); ?>
 
<div id="primary">
 
    <div id="content" role="main">
 
    <header> <?php the_title( '<h3>', '</h3>' ); ?> </header>
    
    <?php
    
    $coursespost = array( 'post_type' => 'courses', );
    $loop = new WP_Query( $coursespost );
    
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
 
    <?php endwhile; ?>
    
    </div>
    
</div>
 
<?php get_footer(); ?>