<?php
require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));
require_once(get_theme_file_path("/widgets/social-icons-widget.php"));

if ( ! isset( $content_width ) ) $content_width = 960;

if (site_url() == "http://localhost/philosophy"){
    define("VERSION", time());
} else{
    define("VERSION", wp_get_theme()->get("Version"));
}
function philosophy_theme_setup(){
    load_theme_textdomain("philosophy", get_theme_file_path("/languages"));
    add_theme_support("post-thumbnails");
    add_theme_support("custom-logo");
    add_theme_support("title-tag");
    add_theme_support("html5", array("search-form", "comment-list"));
    add_theme_support("post-formats", array("image", "audio", "video", "gallery", "quote", "link"));
    add_theme_support("/assets/css/editor-style.css");
    add_theme_support("automatic-feed-links");
    
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
    
    if ( is_singular() ){
        wp_enqueue_script( "comment-reply" );
    }

    wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array("jquery"), "1.0", true );
}
add_action("wp_enqueue_scripts", "philosophy_theme_assets");

function philosophy_pagination(){
    global $wp_query;
    $links = paginate_links(array(
       'current' =>max(1,get_query_var('paged')),
       'total'   =>$wp_query->max_num_pages,
       'type'    => 'list',
       'mid_size'=> apply_filters("philosophy_pagination_mid_size", 3)
    ));

    $links = str_replace("page-numbers", "pgn__num", $links);
    $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
    $links = str_replace("prev pgn__num", "pgn__prev", $links);
    $links = str_replace("next pgn__num", "pgn__next", $links);
    echo wp_kses_post($links);
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
    $post_type    = <<<PT
    <input type="hidden" name="post_type" value="post">
    PT;

    //Search for Movies Archive Only
    if(is_post_type_archive('movie')){
        $post_type    = <<<PT
        <input type="hidden" name="post_type" value="movie">
        PT;
    }

    //Search for Books Archive Only
    if(is_post_type_archive('book')){
        $post_type    = <<<PT
        <input type="hidden" name="post_type" value="book">
        PT;
    }
    $newform = <<<FORM
    <form role="search" method="get" class="header__search-form" action="{$homedir}">
        <label>
            <span class="hide-content">{$label}</span>
            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
        </label>
        {$post_type}
        <input type="submit" class="search-submit" value="{$button_label}">
    </form>
    FORM;
    return $newform;
}
add_filter("get_search_form", "philosophy_search_form");

function before_category_title(){
    echo "<p>Before Title</p>";
}
add_action("philosophy_before_category_title", "before_category_title");

function after_category_title(){
    echo "<p>After Title</p>";
}
add_action("philosophy_after_category_title", "after_category_title");

function before_category_description(){
    echo "<p>Before Description</p>";
}
add_action("philosophy_before_category_description", "before_category_description");

function after_category_description(){
    echo "<p>After Description</p>";
}
add_action("philosophy_after_category_description", "after_category_description");

function beginning_category_page($category_title){
    if("New" == $category_title){
        $visit_count = get_option("category_new");
        $visit_count = $visit_count?$visit_count:0;
        $visit_count++;
        update_option("category_new",$visit_count);
    }
}
add_action("philosophy_category_page", "beginning_category_page");

function philosophy_pagination_mid_size($size){
    return 3;
}
add_filter("philosophy_pagination_mid_size", "philosophy_pagination_mid_size");

function philosophy_home_banner_class($class_name){
    if(is_home()){
        return $class_name;
    }
    else{
        return "";
    }
}
add_filter("philosophy_home_banner_class", "philosophy_home_banner_class");

function filter_text($text){
    return strtoupper($text);
}
add_filter("filter_text", "filter_text");

function filter_text_one_more($param1, $param2){
    return ucwords($param1)." ".strtoupper($param2);
}
add_filter("filter_text_one_more", "filter_text_one_more",10, 2);

remove_action("philosophy_before_category_title", "before_category_title");
remove_action("philosophy_after_category_title", "after_category_title");
remove_action("philosophy_before_category_description", "before_category_description");
remove_action("philosophy_after_category_description", "after_category_description");
remove_filter("filter_text", "filter_text");

remove_filter("filter_text_one_more", "filter_text_one_more",10, 2);

// Parent Child Relationship With Two Custom Post //
function philosophy_custom_link($post_link, $id){
    $p = get_post($id);
    if(is_object($p) && 'chapter'==get_post_type($id)){
        $parent_post_id = get_field('parent_book');
        $parent_post = get_post($parent_post_id);
        if($parent_post){
            $post_link = str_replace("%book%",$parent_post->post_name,$post_link);
        }
        return $post_link;

    }
}
add_filter("post_type_link", "philosophy_custom_link", 1, 3);
// Parent Child Relationship With Two Custom Post //