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

<div class="charitable-campaign-featured-image" style="background: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
</div>

<div id="charitable-campaign-title-container" class="container charitable-campaign-title-container">
  <?php the_title() ?>
</div>
