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
    /*add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '-child/assets/css/style.css' );
    
    }*/

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
    require_once( get_template_directory() . '-child/assets/libs/custom-ajax-auth.php' );
    
    /* Theme setup */
    add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        } endif;


    // Our custom post type function
    function create_posttype() {
        register_post_type( 'courses',
            array(
                'labels' => array(
                    'name' => __( 'Courses' ),
                    'singular_name' => __( 'Course' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'courses'),
            )
        );
    }
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );

    /*
    * Creating a function to create our CPT
    */
    add_action( 'init', 'custom_post_type' );
    function custom_post_type() {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Courses', 'Post Type General Name', 'breathecode-tk-child' ),
            'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'breathecode-tk-child' ),
            'menu_name'           => __( 'Courses', 'breathecode-tk-child' ),
            'parent_item_colon'   => __( 'Parent Course', 'breathecode-tk-child' ),
            'all_items'           => __( 'All Courses', 'breathecode-tk-child' ),
            'view_item'           => __( 'View Course', 'breathecode-tk-child' ),
            'add_new_item'        => __( 'Add New Course', 'breathecode-tk-child' ),
            'add_new'             => __( 'Add New', 'breathecode-tk-child' ),
            'edit_item'           => __( 'Edit Course', 'breathecode-tk-child' ),
            'update_item'         => __( 'Update Course', 'breathecode-tk-child' ),
            'search_items'        => __( 'Search Course', 'breathecode-tk-child' ),
            'not_found'           => __( 'Not Found', 'breathecode-tk-child' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'breathecode-tk-child' ),
        );
        
        // Set other options for Custom Post Type
    	$args = array(
            'label'               => __( 'courses', 'breathecode-tk-child' ),
            'description'         => __( 'Course information', 'breathecode-tk-child' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies'          => array( 'lessons' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capabilities'        => array(
                'edit_post' => 'edit_course',
                'edit_posts' => 'edit_courses',
                'edit_others_posts' => 'edit_other_courses',
                'publish_posts' => 'publish_courses',
                'read_post' => 'read_course',
                'read_private_posts' => 'read_private_courses',
                'delete_post' => 'delete_course'
            ),
            'map_meta_cap'       => true
        );
        
        // Registering your Custom Post Type
        register_post_type( 'courses', $args );
    }
    
    function add_theme_caps() {
        // gets the teacher role
        $teacher = get_role( 'teacher' );
        $teacher->add_cap( 'edit_course' ); 
        $teacher->add_cap( 'edit_courses' ); 
        $teacher->add_cap( 'edit_other_courses' ); 
        $teacher->add_cap( 'publish_courses' ); 
        $teacher->add_cap( 'read_course' ); 
        $teacher->add_cap( 'read_private_courses' ); 
        $teacher->add_cap( 'delete_course' );
        $teacher->add_cap( 'read' );
        
        // gets the student role
        $student = get_role( 'student' );
        $student->add_cap( 'read_course' ); 
        $student->add_cap( 'read' );
        
        // gets the administrator role
        $admins = get_role( 'administrator' );
        $admins->add_cap( 'edit_course' ); 
        $admins->add_cap( 'edit_courses' ); 
        $admins->add_cap( 'edit_other_courses' ); 
        $admins->add_cap( 'publish_courses' ); 
        $admins->add_cap( 'read_course' ); 
        $admins->add_cap( 'read_private_courses' ); 
        $admins->add_cap( 'delete_course' );
        $admins->add_cap( 'read' );
    }
    add_action( 'switch_theme', 'add_theme_caps');

    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
   // add_action( 'init', 'custom_post_type', 0 );

    //creation and registration custom taxonomies for lessons custom post
    function my_taxonomies_lessons() {
        $labels = array(
            'name'              => _x( 'Lessons', 'taxonomy general name' ),
            'singular_name'     => _x( 'Lesson', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Lessons' ),
            'all_items'         => __( 'All Lessons' ),
            'parent_item'       => __( 'Parent Course' ),
            'parent_item_colon' => __( 'Parent Course:' ),
            'edit_item'         => __( 'Edit Lesson' ),
            'update_item'       => __( 'Update Lesson' ),
            'add_new_item'      => __( 'Add New Lesson' ),
            'new_item_name'     => __( 'New Lesson' ),
            'menu_name'         => __( 'Lessons' ),
        );
         
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
        );
         
        register_taxonomy( 'lesson', 'courses', $args );
    }
    
    add_action( 'init', 'my_taxonomies_lessons', 0 );

?>
