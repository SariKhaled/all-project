<?php get_header() ?>
<?php
// $arrg = array(
//     "post_type" => "post",

// );
// $query = new WP_Query($arrg);
?>
<!-- <div class="container bg-secondary text-white p-4 text-center">
        <div>
            <div id="ad">
                <a href="#">
                    <p>Advertise Here</p>
                </a>
            </div>
        </div>
    </div> -->
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
        <a href="">
        <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" style="width: 100%; height: 90px;position: relative;" alt="">

        </a>
       
        <?php  }
        }?>
    </div>

<section>

    <div class="container">


        <!-- Marketing Icons Section -->
        <h3>
            <?php
            echo $wp_query->found_posts;
            ?>
            <?php
            _e("search results found for :") . the_search_query();

                ?>
        </h3>
        <hr>
        

        <div class="row">
            <?php


            if (have_posts()) {
                while (have_posts()) {
                    the_post();

                    ?>
                    <div class="col-lg-4  portfolio-item">
                        <div class="card h-100">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><img class="card-img-top"
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "img_sari") ?>" alt=""></a>
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
            } else { ?>
            </div>

            <?php
            $arrg = array(
                "post_type" => "post",
                'posts_per_page' => 3,
                "orderby" => "rand",


            );
            $query = new WP_Query($arrg);
            ?>
            <h3 class="my-4">
            <?php _e("same news") ?>
        </h3>
            <div class="row">


                <?php

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class="col-lg-4  portfolio-item">
                            <div class="card h-100">
                                <a href="<?php echo esc_url(the_permalink()); ?>"><img class="card-img-top"
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "img_sari") ?>" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                                    </h4>
                                    <p class="card-text">
                                        <?php echo word_count(get_the_excerpt(), '10');

                                        // echo '<br><span><b>by</b> ' .get_the_author_firstname()." " .get_the_author_lastname()."  </span> <br>";
                            
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

            <?php } ?>
        </div>


        <!-- /.row -->

    </div>
</section>

<?php get_footer() ?>