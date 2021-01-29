<?php
if (site_url() == "http://localhost/philosophy"){
    define("VERSION", time());
} else{
    define("VERSION", wp_get_theme()->get("Version"));
}
function philosophy_theme_setup(){
    load_theme_textdomain("philosophy");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("html5", array("search-form", "comment-list"));
    add_theme_support("post-formats", array("image", "audio", "video", "gallery", "quote", "link"));
    add_theme_support("/assets/css/editor-style.css");

    register_nav_menu("topmenu", __("Top Menu", "philosophy"));
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