<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <?php wp_head(); ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top"> <div class="container-fluid"> <div class="navbar-header"> <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a href="#" class="navbar-brand">Brand</a> </div> <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6"> 
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