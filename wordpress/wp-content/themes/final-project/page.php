<?php get_header() ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (is_page("local-news")) {
    $arrg = array(
        "post_type" => "post",
        'posts_per_page' => 3,
        "category_name" => "local",
        // "order" => "DESC",
        // "orderby" => "date",
        "paged" => $paged
    );
    $query = new WP_Query($arrg);
    ?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <?php
            echo _e("local news","final_project");
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
            </li>
            <li class="breadcrumb-item active">
                <?php echo _e("local","final_project"); ?>
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
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">

                        </a>
                    </div>
                    <div class="col-md-5">
                        <h4 class="card-title">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                        </h4>
                        <p class="card-text">
                            <?php echo word_count(get_the_excerpt(), '30');
                            ?>

                        </p>
                        <a class="btn btn-primary" href="<?php echo esc_url(the_permalink()); ?>">
                            <?php _e("Read more","final_project") ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>


                </div>
                <hr>

                <?php



            }
            if (get_previous_posts_link()) {
                previous_posts_link("<span class='btn btn-primary'>Next</span>");

            } else {
                echo ("<button disabled class='btn btn-primary'>Next</span>");
            }


            ?>
            <?php
            if (get_next_posts_page_link()) {
                ?>
                <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>"> <?php _e("preivous","final_project",)?> </a>
                <?php

            } else {
                echo ("<button disabled class='btn btn-primary'>preivous22</span>");
            }

            ?>
            <!-- <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>">preivous</a> -->


        </div>
        </div>

    <?php } else {
            echo "<div style='height:400px'>
            <h3 class='text-center'>No News</h3>
            </div>";
            previous_posts_link("<span class='btn btn-primary'>Next</span>");
        } ?>








    </div>
<?php } ?>
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (is_page("sports-news")) {
    $arrg = array(
        "post_type" => "post",
        'posts_per_page' => 3,
        "category_name" => "sports",
        "order" => "DESC",
        "orderby" => "date",
        "paged" => $paged
    );
    $query = new WP_Query($arrg);
    ?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <?php
            echo _e("sports news","final_project");
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
            </li>
            <li class="breadcrumb-item active">
                <?php echo _e("sports","final_project"); ?>
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
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">

                        </a>
                    </div>
                    <div class="col-md-5">
                        <h4 class="card-title">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                        </h4>
                        <p class="card-text">
                            <?php echo word_count(get_the_excerpt(), '30');
                            ?>

                        </p>
                        <a class="btn btn-primary" href="<?php echo esc_url(the_permalink()); ?>">
                            <?php _e("Read more","final_project") ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>


                </div>
                <hr>

                <?php



            }
            if (get_previous_posts_link()) {
                previous_posts_link("<span class='btn btn-primary'>Next</span>");

            } else {
                echo ("<button disabled class='btn btn-primary'>Next</span>");
            }


            ?>
            <?php
            if (get_next_posts_page_link()) {
                ?>
                <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>"><?php _e("preivous","final_project") ?> </a>
                <?php

            } else {
                echo ("<button disabled class='btn btn-primary'>preivous22</span>");
            }

            ?>
            <!-- <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>">preivous</a> -->


        </div>
        </div>

    <?php } else {
            echo "<div style='height:400px'>
            <h3 class='text-center'>No News</h3>
            </div>";
            previous_posts_link("<span class='btn btn-primary'>Next</span>");
        } ?>








    </div>
<?php } ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (is_page("International News")) {
    $arrg = array(
        "post_type" => "post",
        'posts_per_page' => 3,
        "category_name" => "international",
        "order" => "DESC",
        "orderby" => "date",
        "paged" => $paged
    );
    $query = new WP_Query($arrg);
    ?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <?php
            echo _e("International News","final_project");
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
            </li>
            <li class="breadcrumb-item active">
                <?php echo _e("International News","final_project"); ?>
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
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">

                        </a>
                    </div>
                    <div class="col-md-5">
                        <h4 class="card-title">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                        </h4>
                        <p class="card-text">
                            <?php echo word_count(get_the_excerpt(), '30');
                            ?>

                        </p>
                        <a class="btn btn-primary" href="<?php echo esc_url(the_permalink()); ?>">
                            <?php _e("Read more","final_project") ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>


                </div>
                <hr>

                <?php



            }
            if (get_previous_posts_link()) {
                previous_posts_link("<span class='btn btn-primary'>Next</span>");

            } else {
                echo ("<button disabled class='btn btn-primary'>Next</span>");
            }


            ?>
            <?php
            if (get_next_posts_page_link()) {
                ?>
                <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>"><?php _e("preivous","final_project") ?> </a>
                <?php

            } else {
                echo ("<button disabled class='btn btn-primary'>preivous22</span>");
            }

            ?>
            <!-- <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>">preivous</a> -->


        </div>
        </div>

    <?php } else {
            echo "<div style='height:400px'>
            <h3 class='text-center'>No News</h3>
            </div>";
            previous_posts_link("<span class='btn btn-primary'>Next</span>");
        } ?>








    </div>
<?php } ?>

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (is_page("Healthy News")) {
    $arrg = array(
        "post_type" => "post",
        'posts_per_page' => 3,
        "category_name" => "healthy",
        "order" => "DESC",
        "orderby" => "date",
        "paged" => $paged
    );
    $query = new WP_Query($arrg);
    ?>
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">
            <?php
            echo _e("Healthy News","final_project");
            ?>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
            </li>
            <li class="breadcrumb-item active">
                <?php echo _e("Healthy News","final_project"); ?>
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
                                src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">

                        </a>
                    </div>
                    <div class="col-md-5">
                        <h4 class="card-title">
                            <a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(the_title()) ?></a>
                        </h4>
                        <p class="card-text">
                            <?php echo word_count(get_the_excerpt(), '30');
                            ?>

                        </p>
                        <a class="btn btn-primary" href="<?php echo esc_url(the_permalink()); ?>">
                            <?php _e("Read more","final_project") ?>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>


                </div>
                <hr>

                <?php



            }
            if (get_previous_posts_link()) {
                previous_posts_link("<span class='btn btn-primary'>Next</span>");

            } else {
                echo ("<button disabled class='btn btn-primary'>Next</span>");
            }


            ?>
            <?php
            if (get_next_posts_page_link()) {
                ?>
                <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>"><?php _e("preivous","final_project") ?> </a>
                <?php

            } else {
                echo ("<button disabled class='btn btn-primary'>preivous22</span>");
            }

            ?>
            <!-- <a class="sari1 btn btn-primary" href="<?php echo get_next_posts_page_link() ?>">preivous</a> -->


        </div>
        </div>

    <?php } else {
            echo "<div style='height:400px'>
            <h3 class='text-center'>No News</h3>
            </div>";
            previous_posts_link("<span class='btn btn-primary'>Next</span>");
        } ?>








    </div>
<?php } ?>

<?php
if (is_page("contact us")) {
    ?>
    <div class="container">
        <h3 class="text-center mt-4" style="color:#6969be;" ><?php _e( "Contact Us","final_project" )?> </h3>
        <hr>
        
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"><?php _e("Email",'final_project')?></label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4"> <?php _e("Password",'final_project')?></label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> </label>
                    <input type="email" class="form-control" id="inputAddress" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="inputAddress"> </label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2"> <?php _e("Address 2",'final_project')?></label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity"> <?php _e("City",'final_project')?></label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState"><?php _e("State",'final_project')?> </label>
                        <select id="inputState" class="form-control">
                            <option selected> <?php _e("Choose...",'final_project')?></option>
                            <option><?php _e("...",'final_project')?></option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip"><?php _e("Zip",'final_project')?></label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                        <?php _e(" Check me out",'final_project')?>
                           
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> <?php _e(" Sign in",'final_project')?></button>
            </form>

    </div>


    <?php
}


?>







<?php get_footer() ?>