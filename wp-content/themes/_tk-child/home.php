<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <title>Open Academy Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="wp-content/themes/_tk-child/assets/css/simple-sidebar.css" rel="stylesheet">
        <?php wp_head(); ?>
    </head>

<body>

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
          <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="#">
                          <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                      </a>
                  </li>
                  <li>
                      <?php get_search_form(); ?>
                  </li>
                  <li>
                      <a href="#">Dashboard</a>
                  </li>
                  <li>
                      <?php if (is_user_logged_in()) { ?>
                          <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                      <?php } else { get_template_part('ajax', 'auth'); ?>            	
                          <a class="login_button" id="show_login" href="">Login</a>
                          <a class="login_button" id="show_signup" href="">Signup</a>
                      <?php } ?>
                  </li>
                    <?php wp_nav_menu(array(
                       'menu' => 'Main Menu', 
                       'items_wrap'=>'%3$s', 
                       'container' => false
                    )); ?>

                  <!--li>
                      <a href="#">Overview</a>
                  </li>
                  <li>
                      <a href="#">Events</a>
                  </li>
                  <li>
                      <a href="#">About</a>
                  </li>
                  <li>
                      <a href="#">Services</a>
                  </li>
                  <li>
                      <a href="#">Contact</a>
                  </li>
                  <li>
                      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
                  </li-->
              </ul>
          </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Open Academy Project</h1>
                        <p>LMS (Learning Management System) for 4Geeks course</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
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
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<?php wp_footer(); ?>
</body>

</html>