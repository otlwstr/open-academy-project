            <?php get_header(); ?>
                <div class="container" id="home">
                    <div class="row">
                       <h2>Link 1</h2>
                           
                       <?php if(have_posts()){ ?>
                       
                       <ul>
                       <?php while(have_posts()) {
                           the_post();
                        ?>
                        <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>"><?php the_title(); ?></a></li>
                       <?php } ?>
                       </ul>
                       <?php } else { ?>
                       Sorry, no results.
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php /* Primary navigation */
            wp_nav_menu( array(
              'menu' => 2,
              'depth' => 2,
              'container' => false,
              'menu_class' => 'nav navbar-nav',
              //Process nav menu using our custom nav walker
              'walker' => new wp_bootstrap_navwalker())
            );
        ?>
        </div> </div> </nav>
        <?php get_footer(); ?>
