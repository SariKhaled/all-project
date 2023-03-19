<?php
/**
 * Plugin Name: social
 * Plugin URI: https://test.com/
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 1.0
 * Author: Sari
 * Author URI: https://Sari.com
 * Text Domain: social
 */
?>

<?php
function rig_social()
{

    register_post_type("social", [
        "public" => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
            'title',
            'thumbnail',
        ),
        "labels" => [
            "name" => "social"
        ]
    ]);
}
add_action("init", "rig_social");


add_action("add_meta_boxes", function () {
    add_meta_box("social", __("social icon"), "social_icon_callback","social");

});
function social_icon_callback($post)
{

    $url = get_post_meta($post->ID, "url", true);
   

    ?>

    <label for="url">
        <?php _e("url","social") ?>
    </label>
    <input type="url" style="margin-top: 20px;" id="url" name="url" value="<?php esc_url($url); ?>">
    <br>
    
   

<?php }
add_action("save_post_social", "save_social");
function save_social($ID)
{

    if (isset($_POST['url'])) {
        update_post_meta($ID, "url", sanitize_text_field($_POST['url']));
    
    }
   


}
?>
    