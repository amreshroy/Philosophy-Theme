<?php
require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));
require_once(get_theme_file_path("/widgets/social-icons-widget.php"));

if (site_url() == "http://localhost/philosophy"){
    define("VERSION", time());
} else{
    define("VERSION", wp_get_theme()->get("Version"));
}
function philosophy_theme_setup(){
    load_theme_textdomain("philosophy");
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support("title-tag");
    add_theme_support("html5", array("search-form", "comment-list"));
    add_theme_support("post-formats", array("image", "audio", "video", "gallery", "quote", "link"));
    add_theme_support("/assets/css/editor-style.css");

    add_image_size("philosophy_home_square", 400, 400, true);
    add_image_size( "single_post", 1024, 550, true);

    register_nav_menu("top-menu", __("Top Menu", "philosophy"));

    register_nav_menus(array(
        "footer-left-menu" => __("Footer Left Menu", "philosophy"),
        "footer-middle-menu" => __("Footer Middle Menu", "philosophy"),
        "footer-right-menu" => __("Footer Right Menu", "philosophy"),
    ));
}
add_action("after_setup_theme", "philosophy_theme_setup");

function philosophy_theme_assets(){
    wp_enqueue_style("fontawesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesome.css", null, 1.0 ));
    wp_enqueue_style("fonts-css", get_theme_file_uri("/assets/css/fonts.css"), null, "1.0" );
    wp_enqueue_style("base-css", get_theme_file_uri("/assets/css/base.css"), null, "1.0" );
    wp_enqueue_style("vendor-css", get_theme_file_uri("/assets/css/vendor.css"), null, "1.0" );
    wp_enqueue_style("main-css", get_theme_file_uri("/assets/css/main.css"), null, "1.0" );
    wp_enqueue_style("philosophy-css", get_stylesheet_uri(), VERSION );

    wp_enqueue_script("modernizr-js", get_theme_file_uri("/assets/js/modernizr.js"), null, "1.0" );
    wp_enqueue_script("pace-js", get_theme_file_uri("/assets/js/pace.min.js"), null, "1.0" );
    wp_enqueue_script("plugin-js", get_theme_file_uri("/assets/js/plugins.js"), array("jquery"), "1.0", true );
    wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), "1.0", true );
}
add_action("wp_enqueue_scripts", "philosophy_theme_assets");

function custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function philosophy_pagination(){
    global $wp_query;
    $links = paginate_links(array(
       'current' =>max(1,get_query_var('paged')),
       'total'   =>$wp_query->max_num_pages,
       'type'    => 'list',
       'mid_size'=> 3
    ));

    $links = str_replace("page-numbers", "pgn__num", $links);
    $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
    $links = str_replace("prev pgn__num", "pgn__prev", $links);
    $links = str_replace("next pgn__num", "pgn__next", $links);
    echo $links;
}

remove_action("term_description", "wpautop");

function philosophy_about_sidebar() {
    register_sidebar( array(
        'name'          => __( 'About Page Sidebar', 'philosophy' ),
        'id'            => 'about-page-sidebar',
        'description'   => __( 'Widgets in this area will be shown on about pages.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Contact Google Maps', 'philosophy' ),
        'id'            => 'contact-google-maps',
        'description'   => __( 'Widgets in this area will be shown on contact pages.', 'philosophy' ),
        'before_widget' => '<div id="map-container %1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Sidebar', 'philosophy' ),
        'id'            => 'contact-page-sidebar',
        'description'   => __( 'Widgets in this area will be shown on contact pages.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Before Footer Right About', 'philosophy' ),
        'id'            => 'before-footer-right-sidebar',
        'description'   => __( 'Widgets in this area will be shown on before footer section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Footer Right Newsletter', 'philosophy' ),
        'id'            => 'footer-right-sidebar',
        'description'   => __( 'Widgets in this area will be shown on footer section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Footer Bottom Copyright', 'philosophy' ),
        'id'            => 'footer-bottom-sidebar',
        'description'   => __( 'Widgets in this area will be shown on footer section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Header Social Link', 'philosophy' ),
        'id'            => 'header-social-link',
        'description'   => __( 'Widgets in this area will be shown on footer section.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="header__social %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'philosophy_about_sidebar' );

function philosophy_search_form(){
    $homedir = home_url("/");
    $label   = __("Search for: ", "philosophy");
    $button_label = __("Search", "philosophy");
    $newform = <<<FORM
    <form role="search" method="get" class="header__search-form" action="{$homedir}">
        <label>
            <span class="hide-content">{$label}</span>
            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
        </label>
        <input type="submit" class="search-submit" value="{$button_label}">
    </form>
    FORM;
    return $newform;
}
add_filter("get_search_form", "philosophy_search_form");