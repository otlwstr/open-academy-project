<?php get_header(); ?>
 
<div id="primary">
 
    <div id="content" role="main">
 
        <header> <?php the_title( '<h3>', '</h3>' ); ?> </header>
    
        <?php
            $terms = get_terms( array(
                'taxonomy' => 'course',
                'hide_empty' => false,
            ) );
        ?>
    
        <ul>
            <?php foreach ($terms as $t){ ?>
                <li> 
                    <?php echo '<a href="https://open-academy-project-marlont.c9users.io/course/'.$t->slug.'">'.$t->name.'</a><br>'; ?>
                </li>
            <?php } ?>
        </ul>
    
    </div>
    
</div>
 
<?php get_footer(); ?>