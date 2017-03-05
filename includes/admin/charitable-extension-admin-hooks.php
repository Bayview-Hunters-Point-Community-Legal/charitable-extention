<?php 
/**
 * Charitable Extension Connect admin hooks.
 * 
 * @package     Charitable Extension Connect/Functions/Admin
 * @version     0.1.0
 * @author      Eric Daams
 * @copyright   Copyright (c) 2015, Studio 164a
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License  
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_extra' ), 11 );

public function add_meta_boxes_extra() {
  $meta_boxes = array(
    array(
      'id'            => 'campaign-salesforce-case-number',
      'title'         => __( 'Salesforce Case Number', 'charitable' ),
      'context'       => 'campaign-top',
      'priority'      => 'high',
      'view'          => 'metaboxes/campaign-salesforce-case-number',
      'description'   => __( 'Enter the Salesforce Case ID for this campaign', 'charitable' ),
    )
  );

  $meta_boxes = apply_filters( 'charitable_campaign_meta_boxes', $meta_boxes );

  foreach ( $meta_boxes as $meta_box ) {
    add_meta_box(
      $meta_box['id'],
      $meta_box['title'],
      array( $this->meta_box_helper, 'metabox_display' ),
      Charitable::CAMPAIGN_POST_TYPE,
      $meta_box['context'],
      $meta_box['priority'],
      $meta_box
    );
  }
}