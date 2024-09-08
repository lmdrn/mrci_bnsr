<?php

///*
// * increase images quality
// *
// */
//add_filter( 'jpeg_quality', 'increase_img_quality' );
//add_filter( 'wp_editor_set_quality', 'increase_img_quality' );
//function increase_img_quality( $quality ) {
//    return 86;
//}

//// Hide admin menu if needed
//function website_custom_menu_page_removing()
//{
//    // remove_menu_page( 'index.php' );                  //Dashboard
//    // remove_menu_page( 'jetpack' );                    //Jetpack*
//    // remove_menu_page( 'edit.php' );                   //Posts
//    // remove_menu_page( 'upload.php' );                 //Media
//    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
//    // remove_menu_page( 'edit-comments.php' );          //Comments
//    // remove_menu_page( 'themes.php' );                 //Appearance
//    // remove_menu_page( 'plugins.php' );                //Plugins
//    // remove_menu_page( 'users.php' );                  //Users
//    // remove_menu_page( 'tools.php' );                  //Tools
//    // remove_menu_page( 'options-general.php' );        //Settings
//}
//
//add_action('admin_menu', 'website_custom_menu_page_removing');

// Remove default Post content type from WordPress
//
//add_action('admin_menu', 'remove_posts_type');
//add_action('admin_bar_menu', 'remove_posts_from_menu', 9999);
//add_action('wp_dashboard_setup', 'remove_posts_quickdraft', 9999);
//
//function remove_posts_type()
//{ // Remove post type links
//    remove_menu_page('edit.php');
//}
//
//function remove_posts_quickdraft()
//{ // Remove "quick drafts" post from dashboard
//    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
//}
//
//function remove_posts_from_menu($wp_admin_bar)
//{ // Remove "New post" links
//    $wp_admin_bar->remove_node('new-post');
//}

// Issue collector
#issue_collector#

// // Admin CSS and JS
// function website_admin_styles_scripts() {
// 	wp_enqueue_style('website-admin-style', get_stylesheet_directory_uri() . '/css/admin-style.css');
// 	wp_enqueue_script('website-admin-script', get_stylesheet_directory_uri().'/js/admin-script.js', array('jquery'), '1.0.0', true);
// 	wp_localize_script('website-main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
// }
// add_action('admin_enqueue_scripts', 'website_admin_styles_scripts');

// // Custom image sizes
// add_action('after_setup_theme', 'custom_image_size');
// function custom_image_size() {
// 	add_image_size( 'news_thumbnail', 308, 276, true);
// }

// // Image size in admin
// add_filter( 'image_size_names_choose', 'website_image_sizes_admin' );
// function website_image_sizes_admin( $sizes ) {
// 	return array_merge( $sizes, array(
// 		'news_thumbnail' => __( 'Thumbnail news' ),
// 	) );
// }

// // Set max page content width (Change 1360), image won't be able to be bigger than this number
// function website_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'website_content_width', 1360 );
// }
// add_action( 'template_redirect', 'website_content_width', 0 );
// add_action( 'admin_init', 'website_content_width', 0 );

// // ACF option page
// if( function_exists('acf_add_options_page') ) {
// 	// Options advanced
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'Réglage des projets',
// 		'menu_slug'		=> 'project_options',
// 		'parent_slug'	=> 'edit.php?post_type=project',
//		'post_id'		=> 'theme_options',
//		'icon_url' => 'dashicons-tagcloud',
// 	));

// 	// Simple options page
// 	acf_add_options_page();
// }

// // Create post type
// add_action( 'init', 'create_post_type' );
// function create_post_type() {
// 	// Custom post type without single
// 	register_post_type( 'partner',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Partenaires' ),
// 				'all_items' => __('Tous les partenaires'),
// 				'singular_name' => __( 'Partenaire' )
// 			),
// 			'public' => true,
// 			'exclude_from_search' => true,
// 			'show_in_admin_bar' => true,
// 			'show_in_nav_menus' => false,
// 			'publicly_queryable' => false,
// 			'query_var' => false,
// 			'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
//			'menu_icon' => 'dashicons-admin-post',
// 		)
// 	);
// 	// Custom post type with single
// 	register_post_type( 'event', // Name of post type
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Manifestations' ),
// 				'all_items' => __('Toutes les manifestations'),
// 				'singular_name' => __( 'Manifestation' )
// 			),
// 			'public' => true,
// 			'has_archive' => true, // Archive page
// 			'rewrite' => array('slug' => 'products'), // Name of clean url
// 			'supports' => array ('title', 'editor', 'thumbnail', 'revisions'), // Available fields
//			'menu_icon' => 'dashicons-admin-post',
// 		)
// 	);
// 	// Custom taxonomy
// 	register_taxonomy(
// 		'genre', // Name of taxonomy
// 		'book', // Name of post, possibility to link to multiple post: array('post_type_1', post_type_2)
// 		array(
// 			'label' => __( 'Genre' ),
// 			'public' => false,  // Set to true if the taxonomy must be accessible by front user
// 			'rewrite' => false, // Set to true if the taxonomy must be accessible by front user
// 			'hierarchical' => true,
// 		)
// 	);
// }

// Email obfuscation shortcode
// // Text attribute not mandatory
// // Use: [email mailto="example@example.com" text="Contact us|example@example.com"]
// function email_func( $atts ) {
// 	$atts = shortcode_atts( array(
// 		'mailto' => '',
// 		'text' => ''
// 	), $atts, 'email' );

// 	$atts['text'] = !empty($atts['text']) ? $atts['text'] : $atts['mailto'];

// 	$email_link = '<a href="'.antispambot('mailto:'.$atts['mailto']).'" class="email">'.antispambot($atts['text']).'</a>';

// 	return $email_link;
// }
// add_shortcode( 'email', 'email_func' );

// function modify_read_more_link() {
//     return '<a class="more-link" href="' . get_permalink() . '">Your Read More Link Text</a>';
// }
// add_filter( 'the_content_more_link', 'modify_read_more_link' );


// // Hide admin bar
// function my_function_admin_bar(){ return false; }
// add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//  // Custom taxonomy
//  register_taxonomy(
//      'genre', // Name of taxonomy
//      'book', // Name of post, possibility to link to multiple post: array('post_type_1', post_type_2)
//      array(
//          'label' => __( 'Genre' ),
//          'public' => false,  // Set to true if the taxonomy must be accessible by front user
//          'rewrite' => false, // Set to true if the taxonomy must be accessible by front user
//          'hierarchical' => true,
//      )
//  );
// }

// // Function for ajax calls
// add_action( 'wp_ajax_ajax_call', 'ajax_call' );
// add_action( 'wp_ajax_nopriv_ajax_call', 'ajax_call' );
// function ajax_call(){
// 	wp_die(); // Prevent from returning 0
// }

// // ACF custom wysiwyg toolbar
// add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
// function my_toolbars( $toolbars ){
// 	// Uncomment to view format of $toolbars

// 	// Add a new toolbar called "Simple"
// 	// - this toolbar has only 1 row of buttons
// 	$toolbars['Simple' ] = array();
// 	$toolbars['Simple' ][1] = array('bold', 'italic', 'link');

// 	// return $toolbars - IMPORTANT!
// 	return $toolbars;
// }

//
// // CUSTOM GET TEMPLATE PARTS ALLOWING PASSING DATAS
//
//function wpse_get_partial( $template_name, $data = [] ) {
//    $template = locate_template( $template_name . '.php', false );
//
//    if ( ! $template ) {
//        return;
//    }
//
//    if ( $data ) {
//        extract( $data );
//    }
//
//    include( $template );
//}

//// Allow users with the role editor or administrator to edit and delete the privacy policy page
//
//add_action('map_meta_cap', 'custom_manage_privacy_options', 1, 4);
//function custom_manage_privacy_options($caps, $cap, $user_id, $args)
//{
//    if (!is_user_logged_in()) return $caps;
//
//    $user_meta = get_userdata($user_id);
//    if (array_intersect(['editor', 'administrator'], $user_meta->roles)) {
//        if ('manage_privacy_options' === $cap) {
//            $manage_name = is_multisite() ? 'manage_network' : 'manage_options';
//            $caps = array_diff($caps, [ $manage_name ]);
//        }
//    }
//    return $caps;
//}


/**
// * Convert a word or phrase to a valid HTML ID.
// *
// * For example: 'Foo Bar' becomes 'foo-bar'.
// *
// * This function converts to lowercase, replaces whitespace with hyphens,
// * removes all non-alphanumerics, removes leading or trailing delimiters,
// * and optionally prepends a piece of text.
// *
// */
//function website_text_to_id($text, $prepend = null, $delimiter = '-'): string
//{
//    $text = strtolower($text);
//    $id = preg_replace('/\s/', $delimiter, $text);
//    $id = preg_replace('/[^\w\-]/', '', $id);
//    $id = trim($id, $delimiter);
//    $prepend = (string) $prepend;
//    return !empty($prepend) ? join($delimiter, array($prepend, $id)) : $id;
//}
