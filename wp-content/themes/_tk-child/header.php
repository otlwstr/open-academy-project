<!DOCTYPE html>
<html lang="en">
    <head>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <title>Open Academy Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/wp-content/themes/_tk-child/assets/css/simple-sidebar.css" rel="stylesheet">
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
                      <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                        <div>
                            <input type="text" value="search..." onClick="this.value='';" name="s" id="s" />
                        </div>
                    </form>
                  </li>
                    <?php wp_nav_menu(array(
                       'menu' => 'Main Menu', 
                       'items_wrap'=>'%3$s', 
                       'container' => false
                    )); ?>
                  <li>
                      <?php if (is_user_logged_in()) { ?>
                          <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                      <?php } else { get_template_part('ajax', 'auth'); ?>            	
                          <a class="login_button" id="show_login" href="">Login</a>
                          <a class="login_button" id="show_signup" href="">Signup</a>
                      <?php } ?>
                  </li>
              </ul>
          </div>