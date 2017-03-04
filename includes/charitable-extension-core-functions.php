<?php 

/**
 * Charitable Extension Connect Core Functions. 
 *
 * General core functions.
 *
 * @author      Studio164a
 * @category    Core
 * @package     Charitable Extension Connect
 * @subpackage  Functions
 * @version     0.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * This returns the original Charitable_Extension object. 
 *
 * Use this whenever you want to get an instance of the class. There is no
 * reason to instantiate a new object, though you can do so if you're stubborn :)
 *
 * @return  Charitable_Extension
 * @since   0.1.0
 */
function charitable_extension() {
    return Charitable_Extension::get_instance();
}

/**
 * Displays a template. 
 *
 * @param   string|string[] $template_name A single template name or an ordered array of template.
 * @param   mixed[] $args Optional array of arguments to pass to the view.
 * @return  Charitable_Extension_Template
 * @since   0.1.0
 */
function charitable_extension_template( $template_name, array $args = array() ) {
    if ( empty( $args ) ) {
        $template = new Charitable_Extension_Template( $template_name ); 
    }
    else {
        $template = new Charitable_Extension_Template( $template_name, false ); 
        $template->set_view_args( $args );
        $template->render();
    }

    return $template;
}