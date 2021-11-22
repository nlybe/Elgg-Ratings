<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */
 
/**
 * Returns rendered comments and a comment form for an entity.
 *
 * @tip Plugins can override the output by registering a handler
 * for the comments, $entity_type hook.  The handler is responsible
 * for formatting the comments and the add comment form.
 *
 * @param \ElggEntity $entity      The entity to view comments of
 * @param bool        $add_comment Include a form to add comments?
 * @param array       $vars        Variables to pass to comment view
 *
 * @return string|false Rendered comments or false on failure
 */
function ratings_elgg_view_comments($entity, $add_comment = true, $vars = []) {
    if (!($entity instanceof ElggEntity)) {
        return false;
    }

    $vars['entity'] = $entity;
    $vars['show_add_form'] = $add_comment;
    $vars['class'] = elgg_extract('class', $vars, "{$entity->getSubtype()}-comments");

    $output = elgg_trigger_plugin_hook('comments', $entity->getType(), $vars, false);
    if ($output) {
        return $output;
    } 

    return elgg_view('ratings/comments', $vars);
} 

