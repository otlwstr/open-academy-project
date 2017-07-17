<!DOCTYPE html>
<html>
    <head>
        <title>Open Academy Project</title>
        <?php wp_head(); ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="https://open-academy-project-marlont.c9users.io/" class="navbar-brand"><i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <?php if (is_user_logged_in()) { ?>
                        <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                    <?php } else { get_template_part('ajax', 'auth'); ?>            	
                        <a class="login_button" id="show_login" href="">Login</a>
                        <a class="login_button" id="show_signup" href="">Signup</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <?php wp_footer(); ?>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </body>
</html>