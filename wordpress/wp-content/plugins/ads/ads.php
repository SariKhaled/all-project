<?php
/**
 * Plugin Name: ads
 * Plugin URI: https://test.com/
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 1.0
 * Author: Sari
 * Author URI: https://Sari.com
 * Text Domain: ads
 */
?>


<?php
function ads_post()
{

    register_post_type("book", [
        "public" => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        // 'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
            'title',
            'thumbnail',
        ),
        "labels" => [
            "name" => "ads"
        ]
    ]);
}
add_action("init", "ads_post");



add_action("add_meta_boxes", function () {
    add_meta_box("ads_news", __("ads news","ads"), "ads_news_callback","book");

});
function ads_news_callback($post)
{

    $ads = get_post_meta($post->ID, "ads", true);
  

    ?>

    <label for="ads">
        <?php _e("url","ads") ?>
    </label>
    <input type="url" style="margin-top: 20px;" id="ads" name="ads" value="<?php esc_url($ads); ?>">
    <br>
    
    
   

<?php }




add_action("save_post_book", "save_ads");
function save_ads($ID)
{

    if (isset($_POST['ads'])) {
        update_post_meta($ID, "ads", sanitize_text_field($_POST['ads']));
    
    }
   


}




?>