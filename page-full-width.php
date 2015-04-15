<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_template_part('includes/header'); ?>

<div class="row">
  <div id="artworks" class="col-md-12">
    <div class="packery js-packery" data-packery-options='{ "columnWidth": ".grid-sizer", "itemSelector": ".item", "percentPosition": true }'>
    <div class="grid-sizer"></div>

    <?php
    $args = array(
      'cat' => 2,
      'showposts' => 8
      );

    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {

      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo "<div class='item bw'>" . get_the_content() . "</div>";
      }

    } else {
      // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    ?>



      </div>
    </div>
  </div>


<div class="row">

    <div class="col-sm-12">
      <div id="content" role="main">

        </div>

      </div><!-- /#content -->
    </div>

<div class="container">

    <div class="row">
      <div class="container">
        <div class="col-md-8">
          <?php
            $args1 = array(
              'cat' => '-2',
              );

            $query = new WP_Query( $args1 );

            // The Loop
            if ( $query->have_posts() ) {
              echo "<ul>";
              while ( $query->have_posts() ) {
                $query->the_post();
                echo "<li>" . get_the_title() . "</li>";
                echo "<li>" . get_the_content() . "</li>";
              }
              echo "</li>";
            } else {
              // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>

        </div>
        <div class="col-md-4"><?php get_template_part('includes/sidebar'); ?></div>
      </div>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>
