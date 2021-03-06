<?php
/**
 * Charitable Extension Template Functions.
 *
 * @package     Charitable Extension/Functions/Templates
 * @version     0.1.0
 * @author      Eric Daams
 * @copyright   Copyright (c) 2015, Studio 164a
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! function_exists( 'charitable_extension_template_campaign_featured_image' ) ) :

    /**
     * Display the featured image for the campaign.
     *
     * @return  boolean True if the template was displayed. False otherwise.
     * @since   0.1.0
     */
    function charitable_extension_template_campaign_featured_image() {
        if ( ! has_post_thumbnail() ) {
            return false;
        }

        charitable_extension_template( 'campaign/featured-image.php' );

        return true;
    }

endif;

if ( ! function_exists( 'charitable_extension_template_campaign_summary' ) ) :

    /**
     * Display the summary section.
     *
     * @param   Charitable_Campaign $campaign
     * @return  true
     * @since   0.1.0
     */
    function charitable_extension_template_campaign_summary( $campaign ) {
        charitable_extension_template( 'campaign/summary.php', array( 'campaign' => $campaign ) );
        return true;
    }

endif;

if ( ! function_exists( 'charitable_extension_template_campaign_percentage_raised' ) ) :

    /**
     * Display the percentage that the campaign has raised in summary block.
     *
     * @param   Charitable_Campaign $campaign
     * @return  boolean     True if the template was displayed. False otherwise.
     * @since   0.1.0
     */
    function charitable_extension_template_campaign_percentage_raised( $campaign ) {
        if ( ! $campaign->has_goal() ) {
            return false;
        }

        $display_mode = charitable_get_option( 'percent_raised_display', 'bar-counter' );

        if ( 'hidden' == $display_mode ) {
            return false;
        }

        if ( 'text' == $display_mode ) {
            charitable_template( 'campaign/summary-percentage-raised.php', array( 'campaign' => $campaign ) );
            return true;
        }

        charitable_extension_template( 'campaign/summary-percentage-raised-' . $display_mode . '.php', array( 'campaign' => $campaign ) );

        return true;
    }

endif;

if ( ! function_exists( 'charitable_extension_template_campaign_time_left' ) ) :

    /**
     * Display the time remaining for the campaign.
     *
     * @param   Charitable_Campaign $campaign
     * @return  boolean True if the template was displayed. False otherwise.
     * @since   0.1.0
     */
    function charitable_extension_template_campaign_time_left( $campaign ) {
        if ( $campaign->is_endless() ) {
            return false;
        }

        $display_mode = charitable_get_option( 'time_left_display', 'countdown' );

        if ( 'hidden' == $display_mode ) {
            return false;
        }

        if ( 'text' == $display_mode ) {
            charitable_template( 'campaign/summary-time-left.php', array( 'campaign' => $campaign ) );
            return true;
        }

        charitable_extension_template( 'campaign/summary-time-left-countdown.php', array( 'campaign' => $campaign ) );

        return true;
    }

endif;


if ( ! function_exists( 'charitable_extension_template_campaign_loop_donation_stats' ) ) :

    /**
     * Display the donation stats within the campaign grid.
     *
     * @param   Charitable_Campaign $campaign
     * @return  void
     * @since   0.1.0
     */
    function charitable_extension_template_campaign_loop_donation_stats( $campaign ) {
        charitable_extension_template( 'campaign-loop/donation-stats.php', array( 'campaign' => $campaign ) );
    }

endif;

if ( ! function_exists( 'charitable_extension_template_campaign_loop_more_link' ) ) :

	/**
	 * Output the read more link on campaigns displayed within the loop.
	 *
	 * @param   Charitable_Campaign $campaign
	 * @param   mixed[] $args
	 * @return  void
	 * @since   1.2.3
	 */
	function charitable_extension_template_campaign_loop_more_link( $campaign, $args = array() ) {
		if ( ! isset( $args['button'] ) || 'details' != $args['button'] ) {
			return;
		}

		charitable_extension_template( 'campaign-loop/more-link.php', array( 'campaign' => $campaign ) );
	}

endif;
