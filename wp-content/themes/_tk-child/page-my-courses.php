<?php get_header(); ?>
 
<div id="primary">
 
    <div id="content" role="main">
 
        <header> <?php the_title( '<h3>', '</h3>' ); ?> </header>
    
        <?php
            $terms = get_terms( array(
                'taxonomy' => 'course',
                'hide_empty' => false,
            ) );
            //print_r($terms);die();
        ?>
    
        <ul>
            <?php foreach ($terms as $t){ ?>
                <li> 
                    <?php echo '<a href="'.get_term_link($t->term_id).'">'.$t->name.'</a><br>'; ?>
                </li>
            <?php } ?>
        </ul>
    
    </div>
    
</div>
 
<?php get_footer(); ?>