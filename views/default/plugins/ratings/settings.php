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

// enable reviews and ratings only for buyers
//$buyers_comrat = $vars['entity']->buyers_comrat;
//if(empty($buyers_comrat)){
//    $buyers_comrat = 'no';
//} 

//$buyers_comrat_output .= "<span class=''>" . elgg_echo('products:settings:buyers_comrat_notify') . "</span>";
//$buyers_comrat_output .= elgg_view('input/text', array('name' => 'params[buyers_comrat_notify]', 'value' => (intval($vars['entity']->buyers_comrat_notify) > 0?intval($vars['entity']->buyers_comrat_notify):B2LOSHOP_COMRAT_NOTIFICATION_DAYS), 'style' => 'width:50px; margin: 3px 0;'));
//$buyers_comrat_output .= "<span class='elgg-subtext'>" . elgg_echo('products:settings:buyers_comrat_notify:note') . "</span>";
//$buyers_comrat_output .= "<br />";
//$buyers_comrat_output .= "<span class=''>" . elgg_echo('products:settings:buyers_comrat_notify_by') . "</span>";
//$buyers_comrat_output .= elgg_view('input/text', array('name' => 'params[buyers_comrat_notify_by]', 'value' => $vars['entity']->buyers_comrat_notify_by, 'style' => 'width:100px; margin: 3px 0;'));
//$buyers_comrat_output .= "<span class='elgg-subtext'>" . elgg_echo('products:settings:buyers_comrat_notify_by:note') . "</span>";
//echo elgg_view_module("inline", elgg_echo('products:settings:buyers_comrat'), $buyers_comrat_output);
