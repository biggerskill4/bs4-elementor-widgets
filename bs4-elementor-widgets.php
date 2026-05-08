<?php
/**
 * Plugin Name: BS4 Elementor Widgets
 * Description: Custom Elementor widgets by BiggerSkill4. Requires Elementor to be installed and active.
 * Version: 1.0.0
 * Author: BiggerSkill4
 * Author URI: https://github.com/biggerskill4/bs4-elementor-widgets
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

// Register widgets
function bs4_register_widgets($widgets_manager) {

    require_once(__DIR__ . '/widgets/bs4-button-widget.php');
    require_once(__DIR__ . '/widgets/bs4-heading-widget.php');

    $widgets_manager->register(new \BS4_Button_Widget());
    $widgets_manager->register(new \BS4_Heading_Widget());
}
add_action('elementor/widgets/register', 'bs4_register_widgets');

// Enqueue styles and scripts (separated for frontend vs editor)
function bs4_enqueue_frontend_assets() {
    wp_enqueue_style('bs4-style', plugins_url('/assets/css/style.css', __FILE__), [], '1.1');
    wp_enqueue_script('bs4-script', plugins_url('/assets/js/script.js', __FILE__), ['jquery'], '1.1', true);
}

function bs4_enqueue_editor_assets() {
    // Only enqueue styles in the editor/preview to avoid running frontend JS there
    wp_enqueue_style('bs4-style', plugins_url('/assets/css/style.css', __FILE__), [], '1.1');
}

// Frontend
add_action('wp_enqueue_scripts', 'bs4_enqueue_frontend_assets');

// Elementor editor UI (editor iframe)
add_action('elementor/editor/after_enqueue_scripts', 'bs4_enqueue_editor_assets');

// Elementor frontend preview inside editor
add_action('elementor/frontend/after_enqueue_scripts', 'bs4_enqueue_editor_assets');

add_action('wp_enqueue_scripts', function() {
    wp_register_script(
        'bs4-script',
        plugins_url('/assets/js/script.js', __FILE__),
        ['jquery'],
        '1.0',
        true
    );
});