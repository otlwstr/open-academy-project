<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title> </title>
        <?php wp_head(); ?>
    </head>
    <body>
        <!--navigation-->
        <div class="navbar navbar-inverse navbar-fixed-left">
          <a class="navbar-brand" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
          <ul class="nav navbar-nav">
           <?php require 'searchbox.php';?>
           <li><a href="#home"><i class="fa fa-home"></i><span> Link1 </span></a></li>
           <li><a href="#info"><i class="fa fa-info-circle"></i><span> Link2 </span></a></li>
           <li><a href="#love"><i class="fa fa-heart"></i><span> Link3 </span></a></li>
           <li><a href="#work"><i class="fa fa-briefcase"></i><span> Link4 </span></a></li>
           <li><a href="#contact"><i class="fa fa-envelope"></i><span> Link5 </span></a></li>
          </ul>
        </div>
        <!--end navigation-->
        <!-- 1st section-->
            <div class="wrapper">
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
                       I'm sorry no results.
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
        <?php wp_footer(); ?>
    </body>
</html>