<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

$plugin = elgg_get_plugin_from_id('ratings');

echo elgg_view_field([
    '#type' => 'text',
    'name' => 'params[users_notify]',
    'value' => intval($plugin->users_notify),
    '#label' => elgg_echo('ratings:settings:users_notify'),
    '#help' => elgg_echo('ratings:settings:users_notify:note'),
]);

echo elgg_view_field([
    '#type' => 'text',
    'name' => 'params[users_notify_by]',
    'value' => $plugin->users_notify_by,
    '#label' => elgg_echo('ratings:settings:users_notify_by'),
    '#help' => elgg_echo('ratings:settings:users_notify_by:note'),
]);
