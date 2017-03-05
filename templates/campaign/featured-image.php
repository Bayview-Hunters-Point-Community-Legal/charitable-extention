<?php
/**
 * Displays the campaign featured image.
 *
 * Override this template by copying it to yourtheme/charitable/charitable-extension/campaign/featured-image.php
 *
 * @author  Studio 164a
 * @since   0.1.0
 */

?>

<div class="charitable-campaign-featured-image" style="
  background: url('<?php the_post_thumbnail_url( 'full' ); ?>');
  position: relative;
  height: 500px;
  background-size: cover;
  background-repeat: no-repeat;">
</div>

<div class="container case-title-container" style="padding-bottom: -10px;">
  <h1 class="case-title" style="
    position: absolute;
    top: -60px;
    color: white;
    text-shadow: 1px 1px #000000;">
    <?php the_title() ?>
  </h1>
</div>
