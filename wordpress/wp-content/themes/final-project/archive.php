<?php
get_header()
    ?>
<?php
$category = single_term_title("", false);
$catid = get_cat_ID($category);
$cat_name = get_cat_name($catid);

;

?>
<?php
$arrg = array(
    "post_type" => "post",
    'posts_per_page' => 3,
    "category_name" => $cat_name,
    // "paged" => 1,
    "order" => "DESC",
    "orderby" => "date"
);
$query = new WP_Query($arrg);
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
        <?php
        echo _e($cat_name . " News","final_project");

        ?>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
        </li>
        <li class="breadcrumb-item active">
            <?php echo _e($cat_name,"final_project"); ?>
        </li>
    </ol>

    <!-- news title One -->
    <?php
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="row">
                <div class="col-md-7">
                    <a href="<?php echo esc_url(the_permalink()); ?>">
                        <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0"
                            src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "img_sari") ?>" alt="">

                    </a>
                </div>
                <div class="col-md-5">
                    <h4 class="card-title">
                        <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title(),"final_project") ?></a>
                    </h4>
                    <p class="card-text">
                        <?php echo word_count(get_the_excerpt(), '30');
                        ?>

                    </p>
                    <a class="btn btn-primary" href="<?php echo esc_url(the_permalink()); ?>">
                        <?php _e("Read more") ?>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>

                </div>


            </div>
            <hr>
            <?php

        }
    }
    ?>
</div>


<?php
get_footer()


    ?>