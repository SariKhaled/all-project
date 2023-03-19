<?php get_header() ?>
<?php
$arrg = array(
    "post_type" => "post",
    'posts_per_page' => 3,
    "paged" => 1,
    "order" => "DESC",
    "orderby" => "date"
);
$query = new WP_Query($arrg);

?>



    <div class="container">
        <?php
        $sari = array(
            "post_type" => "book",
            'posts_per_page' => 1,
            "paged" => 1,
            "order" => "DESC",
            "orderby" => "date"
        );
        $sari1 = new WP_Query($sari);
        if($sari1->have_posts()){
            while($sari1->have_posts()){
                $sari1->the_post();
           
        ?>
        <a href="<?php echo get_post_meta(get_the_ID(), "ads", true) ?>" class="nav-link">
        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" style="width: 100%; height: 90px;" alt="">
        </a>
    
    
       
        <?php  }
        }?>
    </div>


<section>

    <div class="container">
        <h3 class="my-4">
            <?php _e("last news") ?>
        </h3>
        <!-- Marketing Icons Section -->
        <div class="row">
            <?php

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();

                    ?>
                    <div class="col-lg-4  portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><img class="card-img-top"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                                </h4>
                                <p class="card-text">
                                    <?php echo word_count(get_the_excerpt(), '10');
                                    ?>
                                </p>
                            </div>


                            <div class="card-footer">
                                <p>
                                    <?php
                                    if (has_tag()) {
                                        the_tags();
                                    } else {
                                        echo "No tags";
                                    }
                                    echo "<br>";
                                    echo "<span>" . the_time('F j,Y') . "</span>"

                                        ?>

                                </p>

                            </div>

                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <!-- /.row -->

    </div>
</section>
<section class="gray-sec">

    <div class="container">
        <!-- category Section -->
        <h3 class="my-4">
            <?php _e("International news") ?>
        </h3>

        <div class="row">
            <?php
            $arrg = array(
                "post_type" => "post",
                'posts_per_page' => 3,
                "paged" => 1,
                "order" => "DESC",
                "orderby" => "date",
                "category_name" => "international"
            );
            $query = new WP_Query($arrg);
            ?>
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();


                    ?>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><img class="card-img-top"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title(),"final_project") ?></a>
                                </h4>
                                <p class="card-text">
                                    <?php echo word_count(get_the_excerpt(), '10');
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <?php
                                $category_id = get_cat_ID('international');
                                ?>
                                <a href="<?php echo esc_url(the_permalink()); ?>" class="btn btn-primary">
                                    <?php _e("Learn More"); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php $page = get_page_by_title("International News");
        
            
            ?>

        </div>
        <div align="center">
            <a class="btn btn-success" href="<?php echo esc_url(get_permalink($page->ID));?>">
        <?php _e( "more news")?>
                                        </a>
    </div>
    </div>
</section>

<section >
    <div class="container">
        <!-- category Section -->
        <h3 class="my-4">
            <?php _e("Local News") ?>
        </h3>

        <div class="row">
            <?php
            $arrg = array(
                "post_type" => "post",
                'posts_per_page' => 3,
                "paged" => 1,
                "order" => "DESC",
                "orderby" => "date",
                "category_name" => "local"
            );
            $query = new WP_Query($arrg);
            ?>
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();


                    ?>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><img class="card-img-top"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                                </h4>
                                <p class="card-text">
                                    <?php echo word_count(get_the_excerpt(), '10');
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                
                                <a href="###" class="btn btn-primary">
                                    <?php _e("Learn More") ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <?php $page = get_page_by_title("Local News");
           
            
            ?>
        <div align="center"><a class="btn btn-success" href="<?php echo esc_url(get_permalink( $page->ID )); ?>"><?php _e( "more
                news")?></a></div>
    </div>
</section>
<section class="gray-sec">
    <div class="container">

        <h3 class="my-4">
            <?php _e("Sports News") ?>
        </h3>
        <div class="row">
            <?php
            $arrg = array(
                "post_type" => "post",
                'posts_per_page' => 4,
                "paged" => 1,
                "order" => "DESC",
                "orderby" => "date",
                "category_name" => "sports"
            );
            $query = new WP_Query($arrg);
            ?>
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();



                    ?>
                    <div class="col-lg-3  portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><img
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>"
                                    class="card-img-top" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                                </h4>
                                <p class="card-text">
                                    <?php echo word_count(get_the_excerpt(), '10');
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <?php

                                ?>
                                <a href="<?php echo esc_url(the_permalink()); ?>" class="btn btn-primary"><?php _e("Learn More") ?></a>
                            </div>

                        </div>
                    </div>
                <?php
                }
            }
           
            ?>
            <?php $page = get_page_by_title("Sports News");
       
            
            ?>

        </div>
        <!-- /.row -->
        <div align="center"><a class="btn btn-success" href="<?php echo esc_url(get_permalink($page->ID)); ?>"><?php _e("more news") ?></a></div>
        <br>
        <br>
    </div>
</section>
<section >
    <div class="container">
        <!-- category Section -->
        <h3 class="my-4">
            <?php _e("Healthy News") ?>
        </h3>

        <div class="row">
            <?php
            $arrg = array(
                "post_type" => "post",
                'posts_per_page' => 3,
                "paged" => 1,
                "order" => "DESC",
                "orderby" => "date",
                "category_name" => "healthy"
            );
            $query = new WP_Query($arrg);
            ?>
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();


                    ?>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><img class="card-img-top"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                                </h4>
                                <p class="card-text">
                                    <?php echo word_count(get_the_excerpt(), '10');
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                
                                <a href="###" class="btn btn-primary">
                                    <?php _e("Learn More") ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <?php $page = get_page_by_title("Healthy News");
            ?>
        <div align="center"><a class="btn btn-success" href="<?php echo esc_url(get_permalink( $page->ID )); ?>"><?php _e( "more
                news")?></a></div>
    </div>
</section>

    <div class=" fixed-top  btn-group-vertical mt-5">
<?php
        $arrg = array(
            "post_type" => "social",
            'posts_per_page' => 10,

        );
        $query = new WP_Query($arrg);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post()


                    ?>
                <a href="<?php echo get_post_meta(get_the_ID(), "url", true) ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>"
                        style="margin-top: 10px; width: 40px; height: 40px;" alt="">

                </a>
                <?php

            }
        }


        ?>
        </div>


<?php get_footer() ?>