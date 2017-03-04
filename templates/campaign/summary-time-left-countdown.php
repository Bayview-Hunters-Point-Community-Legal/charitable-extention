<?php 
/**
 * Displays the amount of time left in the campaign as a countdown.
 *
 * Override this template by copying it to yourtheme/charitable/charitable-extension/campaign/summary-time-left-countdown.php
 * 
 * @author  Studio 164a
 * @since   0.1.0
 */

$campaign = $view_args[ 'campaign' ];

?>
<div class="campaign-time-left campaign-summary-item et_pb_module et_pb_countdown_timer et_pb_bg_layout_light et_pb_countdown_timer_0" data-end-timestamp="<?php echo esc_attr( $campaign->get_end_time() ) ?>">
    <div class="et_pb_countdown_timer_container clearfix">
        <div class="days section values" data-short="<?php esc_attr_e( 'Day', 'charitable-extension' ) ?>" data-full="<?php esc_attr_e( 'Day(s)', 'charitable-extension' ) ?>">
            <p class="value"></p>
            <p class="label"><?php _e( 'Day(s)', 'charitable-extension' ) ?></p>
        </div>
        <div class="sep section"><p>:</p></div>
        <div class="hours section values" data-short="<?php esc_attr_e( 'Hrs', 'charitable-extension' ) ?>" data-full="<?php esc_attr_e( 'Hour(s)', 'charitable-extension' ) ?>">
            <p class="value"></p>
            <p class="label"><?php _e( 'Hour(s)', 'charitable-extension' ) ?></p>
        </div>
        <div class="sep section"><p>:</p></div>
        <div class="minutes section values" data-short="<?php esc_attr_e( 'Min', 'charitable-extension' ) ?>" data-full="<?php esc_attr_e( 'Minute(s)', 'charitable-extension' ) ?>">
            <p class="value"></p>
            <p class="label"><?php _e( 'Minute(s)', 'charitable-extension' ) ?></p>
        </div>
        <div class="sep section"><p>:</p></div>
        <div class="seconds section values" data-short="<?php esc_attr_e( 'Sec', 'charitable-extension' ) ?>" data-full="<?php esc_attr_e( 'Second(s)', 'charitable-extension' ) ?>">
            <p class="value"></p>
            <p class="label"><?php _e( 'Second(s)', 'charitable-extension' ) ?></p>
        </div>
    </div>
</div>