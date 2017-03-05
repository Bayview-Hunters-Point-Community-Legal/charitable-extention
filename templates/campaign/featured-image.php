<?php
/**
 * Displays the campaign featured image.
 *
 * Override this template by copying it to yourtheme/charitable/charitable-extension/campaign/featured-image.php
 *
 * @author  Studio 164a
 * @since   0.1.0
 */

$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
$classtext = 'et_featured_image';
$titletext = get_the_title();
$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
$thumb = $thumbnail["thumb"];

?>
<div class="charitable-campaign-featured-image"><?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ) ?></div>


<!-- <div style="
    background: url(&quot;https://bhpcommunitylegal.org/wp-content/uploads/2017/01/Miranda-1080x675.png&quot;);
    position: relative;
    height: 400px;
    background-size: cover;
    background-repeat: no-repeat;
    ">

    <h1 class="entry-title" style="
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: white;
    box-shadow: black;
    /* background: red; */
    text-shadow: 1px 1px #000000;
">Lena is ready to leave everything behind to keep her family safe.</h1></div> -->
