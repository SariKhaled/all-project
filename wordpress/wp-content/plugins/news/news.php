<?php
/**
 * Plugin Name: news
 * Plugin URI: https://test.com/
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 1.0
 * Author: Sari
 * Author URI: https://Sari.com
 * Text Domain: news
 */
?>


<?php
function urgent_post()
{

    register_post_type("news", [
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
            "name" => "urgent"
        ]
    ]);
}
add_action("init", "urgent_post");



add_action("add_meta_boxes", function () {
    add_meta_box("urgent_news", __("urgent news","news"), "urgent_news_callback","news");

});
function urgent_news_callback($post)
{

    $date = get_post_meta($post->ID, "date", true);
    $author = get_post_meta($post->ID, "author", true);

    ?>

    <label for="date">
        <?php _e("date","news") ?>
    </label>
    <input type="datetime-local" style="margin-top: 20px;" id="date" name="date" value="<?php esc_attr_e($date); ?>">
    <br>
    <label for="author">
        <?php _e("Author name","news") ?>
    </label>
    <input type="text" style="margin-top: 20px;" id="author" name="author" value="<?php esc_attr_e($author); ?>">
    <br>
    
   

<?php }

?>
<?php
add_action("wp_footer", function () {
    $arrg = array(
        "post_type" => "news",
        'posts_per_page' => 1,
        "order" => "DESC",
        "orderby" => "date",
    );
    $query = new WP_Query($arrg);
    ?>
    <?php if ($query->found_posts >= 1) {
        ?>
        <div class="fixed-bottom " id="aim">

            <p>
                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        the_title();
                        echo "<span style='position: absolute;right: 80px;'>" . get_post_meta(get_the_ID(), "date", true) . "</span>";
                        echo "<span style='position: absolute;right: 80px; bottom:0px;'>" . get_post_meta(get_the_ID(), "author", true) . "</span>"



                            ?>
                    <?php }

                }
                ?>

            </p>
        </div>
        <?php
    } ?>





<?php });


add_action("save_post_news", "save_urgent");
function save_urgent($ID)
{

    if (isset($_POST['date'])) {
        update_post_meta($ID, "date", sanitize_text_field($_POST['date']));
    
    }
    if (isset($_POST['author'])) {
        update_post_meta($ID, "author", sanitize_text_field($_POST['author']));
    } 
   

}




?>