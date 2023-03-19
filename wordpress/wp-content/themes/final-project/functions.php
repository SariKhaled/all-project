<?php
/* style an js */
function style_all()
{
    wp_enqueue_style('custom_style1', get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style('custom_style2', get_template_directory_uri() . "/css/modern-business.css");
    wp_enqueue_style('custom_style3', get_template_directory_uri() . "/css/style_All.css");
    if(is_rtl()){
        wp_enqueue_style('custom_style10', get_template_directory_uri() . "/css/bootstrap.rtl.min.css");
        wp_enqueue_style('custom_style11', get_template_directory_uri() . "/css/modern-business-rtl.css");
        wp_enqueue_style('custom_style12', get_template_directory_uri() . "/css/style_all-trl.css");

    }
    wp_enqueue_script('custom_js1', get_template_directory_uri() . "/js/jquery.min.js", array('jquery'), true);
    wp_enqueue_script('custom_js2', get_template_directory_uri() . "/js/bootstrap.bundle.min.js", array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'style_all');
/* add_theme_support */
function sari()
{
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    load_theme_textdomain("final_project", get_template_directory() . '/lan');
    
    // add_theme_support("menus");
    add_theme_support("custom-logo", [
        "height" => 30,
        "width" => 40,
        
    ]);
}
add_action('after_setup_theme', 'sari');
/* menu  */
function menu_nav_custom()
{
    register_nav_menu("top-menu", "to-head");
}

add_action("init", "menu_nav_custom");

/* menu bootsrap  */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


/* img-size */
function custom_img()
{
    add_image_size("img_sari", 100, 100, array("top", "left"));
}
add_action("init", "custom_img");
/* ss */

function word_count($string, $limit)
{

    $words = explode(' ', $string);

    return implode(' ', array_slice($words, 0, $limit));

}



?>