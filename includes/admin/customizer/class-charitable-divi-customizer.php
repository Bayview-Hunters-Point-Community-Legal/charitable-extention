<?php
/**
 * The class responsible for adding & saving extra settings in the Charitable Customizer.
 *
 * @package     Charitable Extension Connect/Classes/Charitable_Extension_Customizer
 * @version     0.1.0
 * @author      Eric Daams
 * @copyright   Copyright (c) 2015, Studio 164a
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License  
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Charitable_Extension_Customizer' ) ) : 

/**
 * Charitable_Extension_Customizer
 *
 * @since       0.1.0
 */
class Charitable_Extension_Customizer {

    /**
     * @var     Charitable_Extension_Customizer
     * @access  private
     * @static
     * @since   0.1.0
     */
    private static $instance = null;

    /**
     * Create class object. Private constructor. 
     * 
     * @access  private
     * @since   0.1.0
     */
    private function __construct() {
    }

    /**
     * Create and return the class object.
     *
     * @access  public
     * @static
     * @since   0.1.0
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new Charitable_Extension_Customizer();            
        }

        return self::$instance;
    }    

    /**
     * Add settings to the Customizer.
     *
     * @param   array[] $settings
     * @return  array[]
     * @access  public
     * @since   0.1.0
     */
    public function add_customizer_settings( $settings ) {        

        if ( ! isset( $settings[ 'sections' ][ 'charitable_design' ] ) ) {

            $settings[ 'sections' ][ 'charitable_design' ] = array(
                'title'     => __( 'Design Options', 'charitable-extension' ),
                'priority'  => 1010,
                'settings'  => array()
            );

        }

        // $settings[ 'sections' ][ 'charitable_design' ][ 'settings' ][ 'campaign_layout' ] = array(
        //     'setting' => array(
        //         'transport'     => 'refresh',
        //         'default'       => 'right-sidebar',
        //         'sanitize_callback' => array( $this, 'sanitize_layout_choice' )
        //     ),
        //     'control' => array(
        //         'type'          => 'select',
        //         'priority'      => 1112,
        //         'label'         => __( 'Layout for campaign pages', 'charitable-extension' ), 
        //         'choices'       => array(
        //             'right-sidebar' => __( 'Right Sidebar', 'charitable-extension' ), 
        //             'left-sidebar'  => __( 'Left Sidebar', 'charitable-extension' ),
        //             'full-width'    => __( 'Full Width (fullwidth widgets)', 'charitable-extension' )
        //         ) 
        //     )
        // );

        $settings[ 'sections' ][ 'charitable_design' ][ 'settings' ][ 'campaign_block_background_colour' ] = array(
            'setting' => array(
                'transport'     => 'refresh',
                'default'       => '#f8f8f8',
                'sanitize_callback' => 'sanitize_hex_color'
            ),
            'control' => array(
                'control_type'  => 'WP_Customize_Color_Control',
                'priority'      => 1112,
                'label'         => __( 'Campaign block background colour', 'charitable' )
            )
        );

        $settings[ 'sections' ][ 'charitable_design' ][ 'settings' ][ 'percent_raised_display_grid' ] = array(
            'setting' => array(
                'transport'     => 'refresh',
                'default'       => 'bar-counter',
                'sanitize_callback' => array( $this, 'sanitize_percent_raised_choice' )
            ),
            'control' => array(
                'type'          => 'select',
                'priority'      => 1114,
                'label'         => __( 'How is the percent raised displayed in the campaign grid?', 'charitable-extension' ), 
                'choices'       => array(
                    'bar-counter'   => __( 'Bar Counter', 'charitable-extension' ), 
                    'circle-counter' => __( 'Circle Counter', 'charitable-extension' ),
                    'text'          => __( 'Text (no animation)', 'charitable-extension' ),
                    'hidden'        => __( 'Not displayed', 'charitable-extension' )
                ) 
            )
        );

        $settings[ 'sections' ][ 'charitable_design' ][ 'settings' ][ 'percent_raised_display' ] = array(
            'setting' => array(
                'transport'     => 'refresh',
                'default'       => 'bar-counter',
                'sanitize_callback' => array( $this, 'sanitize_percent_raised_choice' )
            ),
            'control' => array(
                'type'          => 'select',
                'priority'      => 1116,
                'label'         => __( 'How is the percent raised displayed on single campaigns?', 'charitable-extension' ), 
                'choices'       => array(
                    'bar-counter'   => __( 'Bar Counter', 'charitable-extension' ), 
                    'circle-counter' => __( 'Circle Counter', 'charitable-extension' ),
                    'number-counter' => __( 'Number Counter', 'charitable-extension' ),
                    'text'          => __( 'Text (no animation)', 'charitable-extension' ),
                    'hidden'        => __( 'Not displayed', 'charitable-extension' )
                ) 
            )
        );

        $settings[ 'sections' ][ 'charitable_design' ][ 'settings' ][ 'time_left_display' ] = array(
            'setting' => array(
                'transport'     => 'refresh',
                'default'       => 'countdown',
                'sanitize_callback' => array( $this, 'sanitize_time_left_choice' )
            ),
            'control' => array(
                'type'          => 'select',
                'priority'      => 1118,
                'label'         => __( 'How is the time left displayed?', 'charitable-extension' ), 
                'choices'       => array(
                    'countdown' => __( 'Countdown', 'charitable-extension' ), 
                    'text'      => __( 'Text (no animation)', 'charitable-extension' ),
                    'hidden'    => __( 'Not displayed', 'charitable-extension' )
                ) 
            )
        );

        return $settings;
    }

    /**
     * Validate a given layout choice. 
     *
     * @param   string $value
     * @return  string
     * @access  public
     * @since   0.1.0
     */
    public function sanitize_layout_choice( $value ) {
        if ( ! in_array( $value, array( 'right-sidebar', 'left-sidebar', 'full-width' ) ) ) {        
            $value = 'right-sidebar';
        }

        return $value;
    }

    /**
     * Sanitize the option set for percent raised display. 
     *
     * @param   string $value
     * @return  string $value
     * @access  public
     * @since   0.1.0
     */
    public function sanitize_percent_raised_choice( $value ) {
        if ( ! in_array( $value, array( 'bar-counter', 'circle-counter', 'number-counter', 'text', 'hidden' ) ) ) {
            $value = 'bar-counter';
        }

        return $value;
    }

    /**
     * Sanitize the option set for time left display. 
     *
     * @param   string $value
     * @return  string $value
     * @access  public
     * @since   0.1.0
     */
    public function sanitize_time_left_choice( $value ) {
        if ( ! in_array( $value, array( 'countdown', 'text', 'hidden' ) ) ) {
            $value = 'countdown';
        }

        return $value;
    }
}

endif; // End class_exists check