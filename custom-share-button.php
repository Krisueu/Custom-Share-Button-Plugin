<?php
/*
Plugin Name: Custom Share Button
Description: Ein einfaches Plugin, das es ermöglicht, Beiträge über einen benutzerdefinierten Share-Button zu teilen.
Version: 1.0
Author: <a href="https://krisu.eu">Krisu<a>
*/

// Shortcode hinzufügen für den Share-Button
function custom_share_button_shortcode() {
    // HTML für den Share-Button
    $button_html = '<button class="custom-share-button">Teilen</button>';
    return $button_html;
}
add_shortcode('custom_share_button', 'custom_share_button_shortcode');

// JavaScript und CSS für den Share-Button
function custom_share_button_scripts() {
    // JavaScript für den Button
    wp_enqueue_script('custom-share-button-js', plugins_url('custom-share-button.js', __FILE__), array('jquery'), '1.0', true);
    // CSS für den Button
    wp_enqueue_style('custom-share-button-css', plugins_url('custom-share-button.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'custom_share_button_scripts');
