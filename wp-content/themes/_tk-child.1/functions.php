<?php

    /**
     * Autoload for PHP Composer
     */
    if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__) . '/');
    require ABSPATH."vendor/autoload.php";

    /**
     * Here we are importing the Styles of the parent theme and re-using them
     * for our own project, please don't edit this hook/function
     */
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '-child.1/assets/css/style.css' );
    
    }

    /**
     * This is an example of usage for the Eloquent ORM

        $db = \WeDevs\ORM\Eloquent\Database::instance();
        
        var_dump( $db->table('users')->find(1) );
        var_dump( $db->select('SELECT * FROM wp_users WHERE id = ?', [1]) );
        var_dump( $db->table('users')->where('user_login', 'john')->first() );
    */
    
    /** 
     * Start your own functions here
     */
    require_once( get_template_directory() . '-child.1/assets/libs/custom-ajax-auth.php' );
?>