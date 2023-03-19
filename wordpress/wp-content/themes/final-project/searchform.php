<?php




?>
<?php ?>
<form class="d-flex" method="get" action="<?php esc_url(home_url("/")) ?>" role="search"> <span
        class="screen-reader-text">
        <?php echo _x("search for", "label") ?>
    </span> <input class="form-control me-2" name="s" value="<?php the_search_query() ?>" type="search"
        placeholder="<?php echo esc_attr_x("search post", "placeholder") ?>" aria-label="Search"> <button
        class="btn btn-outline-info btn-sari" type="submit">
        <?php echo esc_attr_x("search", "submit button") ?>
    </button> </form>