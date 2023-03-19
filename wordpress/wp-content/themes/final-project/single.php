<?php get_header() ?>
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <?php _e(the_title(),"final_project") ?>
  </h1>

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo home_url() ?>"><?php _e("Home News","final_project") ?></a>
    </li>
    <li class="breadcrumb-item active">
      <?php the_author() ?>
      <?php the_tags() ?>
    </li>
  </ol>

  <div class="row">


    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Preview Image -->

      <img class="img-fluid rounded" style="width: 730px; height: 395.41px;"
        src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">

      <hr>

      <!-- Date/Time -->
      <p>
        <?php echo '<span class="pub-date">' . get_the_date('j, F, Y') . '</span>' ?>
        <?php
        define("sari", get_the_ID());


        ?>
      </p>

      <hr>

      <!-- Post Content -->


      <p></p>

      <blockquote class="blockquote">
        <p class="mb-0">
          <?php _e(the_content(),"final_project") ?>
        </p>
      </blockquote>
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Side Widget -->
      <div class="card my-4">
        <?php
        $sari = array(
          "post_type" => "book",
          'posts_per_page' => 1,
          "paged" => 2,
          "order" => "DESC",
          "orderby" => "date"
        );
        $sari1 = new WP_Query($sari);
        if ($sari1->have_posts()) {
          while ($sari1->have_posts()) {
            $sari1->the_post();

            ?>
            <a href="<?php echo get_post_meta(get_the_ID(), "ads", true) ?>">
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>"
                style="width: 100%; height: 90px;position: relative;" alt="">
            </a>

          <?php }
        } ?>


      </div>
      <div style="height: 320px;" class="bg-secondary text-white  text-center">

        <?php
        $sari = array(
          "post_type" => "book",
          'posts_per_page' => 1,
          "paged" => 3,
          "order" => "DESC",
          "orderby" => "date"
        );
        $sari1 = new WP_Query($sari);
        if ($sari1->have_posts()) {
          while ($sari1->have_posts()) {
            $sari1->the_post();

            ?>
            <a href="<?php echo get_post_meta(get_the_ID(), "ads", true) ?>">

              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" style="width: 100%; height: 320px;" alt="">
            </a>
          <?php }
        } ?>
      </div>

    </div>
  </div>

  <?php

  $arrg = array(
    "post_type" => "post",
    'posts_per_page' => 3,
    "orderby" => "rand",
    "post__not_in" => array(get_queried_object_id()),


  );
  $query = new WP_Query($arrg);


  ?>

  <!-- Marketing Icons Section -->

  <div class="row">

  </div>
  <hr>
  <h3 class="my-4">
    <?php _e("News","final_project") ?>
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
                src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" alt=""></a>
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
  </div>

</div>



<?php get_footer() ?>