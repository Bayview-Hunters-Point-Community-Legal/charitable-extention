<?php
/**
 * Renders the salesforce case id for the Campaign post type.
 *
 * @author  Studio 164a
 * @since   1.0.0
 */

global $post;

$title        = isset( $view_args['title'] )    ? $view_args['title']     : '';
$tooltip      = isset( $view_args['tooltip'] )  ? '<span class="tooltip">' . $view_args['tooltip'] . '</span>'          : '';
$description    = isset( $view_args['description'] )? '<span class="charitable-helper">' . $view_args['description'] . '</span>'  : '';
$salesforce_case_number       = get_post_meta( $post->ID, '_campaign_salesforce_case_number', true );
//$salesforce_case_number_formatted = 0 == $salesforce_case_number ? '' : date_i18n( 'F d, Y', strtotime( $salesforce_case_number ) );
?>
<div id="charitable-campaign-end-date-metabox-wrap" class="charitable-metabox-wrap">
  <label class="screen-reader-text" for="campaign_salesforce_case_number"><?php echo $title ?></label>
  <input type="text" id="campaign_salesforce_case_number" name="_campaign_salesforce_case_number"  placeholder="&#8734;" class="charitable-datepicker" data-case-number="<?php echo $salesforce_case_number ?>" />
  <?php echo $description ?>
</div>
