<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 * 
 * Elgg add comment action
 *
 * @package Elgg.Core
 * @subpackage Comments
 */

use Ratings\RatingsOptions;

$entity_guid = (int) get_input('entity_guid', 0, false);
$comment_guid = (int) get_input('comment_guid', 0, false);
$comment_text = get_input('generic_comment');
$star_rating = get_input('star_rating');

if (empty($comment_text)) {
    return elgg_error_response(elgg_echo('generic_comment:blank'));
}

if ($comment_guid) {
    // Edit an existing comment
    $comment = get_entity($comment_guid);

    if (!$comment instanceof ElggComment) {
        return elgg_error_response(elgg_echo('generic_comment:notfound'));
    }
    if (!$comment->canEdit()) {
        return elgg_error_response(elgg_echo('actionunauthorized'));
    }

    $comment->description = $comment_text;
	if (!$comment->save()) {
		return elgg_error_response(elgg_echo('generic_comment:failure'));
	}
	
	$success_message = elgg_echo('generic_comment:updated');
} else {
    // Create a new comment on the target entity
    $entity = get_entity($entity_guid);
    if (!$entity) {
        return elgg_error_response(elgg_echo('generic_comment:notfound'));
    }

    $user = elgg_get_logged_in_user_entity();

    $comment = new ElggComment();
    $comment->description = $comment_text;
    $comment->owner_guid = $user->getGUID();
    $comment->container_guid = $entity->getGUID();
    $comment->access_id = $entity->access_id;
    if (!$comment->save()) {
        return elgg_error_response(elgg_echo('generic_comment:failure'));
    }

    // create star rating annotation
    if ($star_rating && !$entity->annotate(RatingsOptions::RATINGS_ANNOTATION, $star_rating, $entity->access_id, $user->getGUID(),'integer')) {
        return elgg_error_response(elgg_echo('ratings:comments:rating:failure'));
    }
    
    // Notify if poster wasn't owner
    if ($entity->owner_guid != $user->guid) {
        $owner = $entity->getOwnerEntity();

        notify_user(
            $owner->guid, 
            $user->guid, 
            elgg_echo('ratings:comments:notify_buyer:subject', [], $owner->language), 
            elgg_echo('ratings:comments:notify_buyer:body', [
                $entity->title,
                $comment_text,
                $comment->getURL(),
            ], $owner->language), 
            [
                'object' => $comment,
                'action' => 'create',
                'summary' =>  elgg_echo('ratings:comments:notify_buyer:summary', [$entity->title], $owner->language),
            ]
        );
    }
    
    // Add to river
    elgg_create_river_item([
		'view' => 'river/object/comment/create',
		'action_type' => 'comment',
		'object_guid' => $comment->guid,
		'target_guid' => $entity->guid,
	]);
    
    $success_message = elgg_echo('generic_comment:posted');
}

$forward = $comment->getURL();

// return to activity page if posted from there
// this can be removed once saving new comments is ajaxed
if (!empty($_SERVER['HTTP_REFERER'])) {
	// don't redirect to URLs from client without verifying within site
	$site_url = preg_quote(elgg_get_site_url(), '~');
	if (preg_match("~^{$site_url}activity(/|\\z)~", $_SERVER['HTTP_REFERER'], $m)) {
		$forward = "{$m[0]}#elgg-object-{$comment->guid}";
	}
}

$result = [
	'guid' => $comment->guid,
	'output' => elgg_view_entity($comment),
];

return elgg_ok_response($result, $success_message, $forward);
