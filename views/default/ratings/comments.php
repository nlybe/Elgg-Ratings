<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 *
 * List reviews with optional add form and ratings 
 *
 * @uses $vars['entity']        ElggEntity
 * @uses $vars['show_add_form'] Display add form or not
 * @uses $vars['id']            Optional id for the div
 * @uses $vars['class']         Optional additional class for the div
 * 
 * Based on core Elgg comments view, modified for ratings plugin
 */

$show_add_form = elgg_extract('show_add_form', $vars, true);
$full_view = elgg_extract('full_view', $vars, true);
$limit = elgg_extract('limit', $vars, get_input('limit', 0));
if (!$limit) {
    $limit = elgg_trigger_plugin_hook('config', 'comments_per_page', [], 25);
}

$attr = [
    'id' => elgg_extract('id', $vars, 'comments'),
    'class' => elgg_extract_class($vars, 'elgg-comments'),
];

// work around for deprecation code in elgg_view()
unset($vars['internalid']);

$content = elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'comment',
    'container_guid' => $vars['entity']->guid,
    'reverse_order_by' => true,
    'full_view' => true,
    'limit' => $limit,
    'preload_owners' => true,
    'distinct' => false,
    'url_fragment' => $attr['id'],
));

if ($show_add_form) {
    $content .= elgg_view_form('ratings/comments/add', array(), $vars);
}

echo elgg_format_element('div', $attr, $content);
