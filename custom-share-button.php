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

    // HTML für die Share-Options
    $options_html = '
        <div id="share-options" style="display: none;">
            <p><strong>Sharing is caring ❤️</strong></p>
            <p>
                <label for="entry-shortlink">' . __('Shortlink', 'Krisu') . '</label>
                <input id="entry-shortlink" class="u-url url shortlink" type="text" value="' . wp_get_shortlink() . '" />
            </p>
            <p>
                <label for="entry-permalink">' . __('Permalink', 'Krisu') . '</label>
                <input id="entry-permalink" class="u-url url u-uid uid bookmark" type="text" value="' . get_permalink() . '" />
            </p>';

    // Überprüfen, ob der Titel vorhanden ist
    if (get_the_title()) {
        $options_html .= '
            <p>
                <label for="entry-summary">' . __('HTML', 'Krisu') . '</label>
                <textarea id="entry-summary" class="code" type="text" rows="5" cols="70">&lt;cite class=&quot;h-cite&quot;&gt;&lt;a class=&quot;u-url p-name&quot; href=&quot;' . get_permalink() . '&quot;&gt;' . get_the_title() . '&lt;/a&gt; (&lt;span class=&quot;p-author h-card&quot; title=&quot;' . get_the_author() . '&quot;&gt;' . get_the_author() . '&lt;/span&gt; &lt;time class=&quot;dt-published&quot; datetime=&quot;' . get_the_date('c') . '&quot;&gt;' . get_the_date() . '&lt;/time&gt;)&lt;/cite&gt;</textarea>
            </p>';
    } else {
        $options_html .= '
            <p>
                <label for="entry-blockquote">' . __('HTML', 'Krisu') . '</label>
                <textarea id="entry-blockquote" class="code" type="text" rows="5" cols="70">&lt;blockquote&gt;&lt;p&gt;' . get_the_excerpt() . '&lt;/p&gt;&lt;small&gt;—&nbsp;by &lt;a href=&quot;' . get_permalink() . '&quot; class=&quot;h-card&quot; title=&quot;' . get_the_author() . '&quot;&gt;' . get_the_author() . '&lt;/a&gt;&lt;/small&gt;&lt;/blockquote&gt;</textarea>
            </p>';
    }

    $options_html .= '</div>';

    // Kombinieren Sie den Share-Button und die Share-Options
    $button_and_options_html = $button_html . $options_html;

    return $button_and_options_html;
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
?>
