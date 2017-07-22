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

    //require_once('/home/ubuntu/workspace/wp-content/themes/_tk-child/wp-bootstrap-navwalker-master/wp-bootstrap-navwalker.php');
    
    
    
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
    		// Features this CPT supports in Post Editor
    		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    		// You can associate this CPT with a taxonomy or custom taxonomy. 
    		'taxonomies'          => array( 'lessons' ),
    		/* A hierarchical CPT is like Pages and can have
    		* Parent and child items. A non-hierarchical CPT
    		* is like Posts.
    		*/	
    		'hierarchical'        => false,
    		'public'              => true,
    		'show_ui'             => true,
    		'show_in_menu'        => true,
    		'show_in_nav_menus'   => true,
    		'show_in_admin_bar'   => true,
    		'menu_position'       => 5,
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
    		)
    	);
    	
    	// Registering your Custom Post Type
    	register_post_type( 'courses', $args );
    }
    
    function add_theme_caps() {
        // gets the administrator role
        $admins = get_role( 'teacher' );
    
        $admins->add_cap( 'edit_course' ); 
        $admins->add_cap( 'edit_courses' ); 
        $admins->add_cap( 'edit_other_courses' ); 
        $admins->add_cap( 'publish_courses' ); 
        $admins->add_cap( 'read_course' ); 
        $admins->add_cap( 'read_private_courses' ); 
        $admins->add_cap( 'delete_course' ); 
    }
    add_action( 'switch_theme', 'add_theme_caps');

    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
    
    add_action( 'init', 'custom_post_type', 0 );

    //creating custom taxonomies for hotels custom post
     
       //registration of taxonomies
     
    function my_taxonomies_course() {
     
        //labels array
     
    $labels = array(
        'name'              => _x( 'Course Lessons', 'taxonomy general name' ),
        'singular_name'     => _x( 'Course Lesson', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Course Lessons' ),
        'all_items'         => __( 'All Course Lessons' ),
        'parent_item'       => __( 'Parent Course Lesson' ),
        'parent_item_colon' => __( 'Parent Course Lesson:' ),
        'edit_item'         => __( 'Edit Course Lesson' ),
        'update_item'       => __( 'Update Course Lesson' ),
        'add_new_item'      => __( 'Add New Course Lesson' ),
        'new_item_name'     => __( 'New Course Lesson' ),
        'menu_name'         => __( 'Course Lessons' ),
      );
     
       //args array
     
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
      );
     
      register_taxonomy( 'course_lesson', 'courses', $args );
    }
     
    add_action( 'init', 'my_taxonomies_course', 0 );

?>
