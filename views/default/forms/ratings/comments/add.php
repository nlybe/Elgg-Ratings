<?php
/**
 * Form for adding and editing comments
 *
 * @package Elgg
 *
 * @uses ElggEntity  $vars['entity']  The entity being commented
 * @uses ElggComment $vars['comment'] The comment being edited
 * @uses bool        $vars['inline']  Show a single line version of the form?
 */

if (!elgg_is_logged_in()) {
    return;
}

$entity = elgg_extract('entity', $vars);
/* @var ElggEntity $entity */

$comment = elgg_extract('comment', $vars);
/* @var ElggComment $comment */

$inline = elgg_extract('inline', $vars, false);

$entity_guid_input = '';
if ($entity) {
    $entity_guid_input = elgg_view('input/hidden', array(
        'name' => 'entity_guid',
        'value' => $entity->guid,
    ));
}

// rattings addition
$comment_label = elgg_extract('comment_label', $vars, '');

$comment_text = '';
$comment_guid_input = '';
if ($comment && $comment->canEdit()) {
    $entity_guid_input = elgg_view('input/hidden', array(
        'name' => 'comment_guid',
        'value' => $comment->guid,
    ));
    
    if (!$comment_label) {  // rattings addition
        $comment_label = elgg_echo("generic_comments:edit");
    }
    $submit_input = elgg_view('input/submit', array('value' => elgg_echo('save')));
    $comment_text = $comment->description;
} else {
    if (!$comment_label) {  // rattings addition
        $comment_label = elgg_echo("generic_comments:add");
    }
    $submit_input = elgg_view('input/submit', array('value' => elgg_echo('comment')));
}

$cancel_button = '';
if ($comment) {
    $cancel_button = elgg_view('input/button', array(
        'value' => elgg_echo('cancel'),
        'class' => 'elgg-button-cancel mlm',
        'href' => $entity ? $entity->getURL() : '#',
    ));
}

if ($inline) {
    $comment_input = elgg_view('input/text', array(
        'name' => 'generic_comment',
        'value' => $comment_text,
        'required' => true
    ));

    echo $comment_input . $entity_guid_input . $comment_guid_input . $submit_input;
} else {

    elgg_require_js("ratings/ratings");
    elgg_load_css('jratings_css');
        
    $comment_input = elgg_view('input/longtext', array(
        'name' => 'generic_comment',
        'value' => $comment_text,
        'required' => true
    ));
    
    // rattings addition
    $rate_settings = elgg_format_element('div', [
        'class' => 'rate_stars',
        'data-average' => 0,
        'data-id' => 1,
    ], '');     
    $rate_settings .= elgg_format_element('span', [
        'id' => 'rate_stars_data',
        'data-type' => 'big',
        'data-length' => RatingsOptions::RATINGS_RATEMAX,
        'data-rateMax' => RatingsOptions::RATINGS_RATEMAX,
        'data-bigStarsPath' => elgg_get_simplecache_url('jratings/icons/stars.png'),
        'data-smallStarsPath' => elgg_get_simplecache_url('jratings/icons/small.png'),
    ], '');
    
    $star_rating = elgg_view('input/hidden', array(
        'name' => 'star_rating',
        'value' => '',
        'id' => 'star_rating'
    ));
    
    $rate_label = elgg_extract('rate_label', $vars, '');
    if (!$rate_label) {
        $rate_label = elgg_echo("ratings:comments:add:label");
    }
    
    $submit_input = elgg_view('input/submit', array('value' => elgg_echo('ratings:comments:post')));
    // rattings addition
      
//    if (elgg_instanceof($vars["entity"], 'object', 'product')) {
//        $rate_label = elgg_echo("ratings:comments:add:rating");
//    } else if (elgg_instanceof($vars["entity"], 'object', 'shop')) {
//        $rate_label = elgg_echo("ratings:comments:add:rating:shop");
//    }
//<div class="rate_stars" data-average="0" data-id="3"></div>
    echo <<<FORM
<div>
    <label>$rate_label</label>
    
    $rate_settings
</div>
            
<div>
	<label>$comment_label</label>
	$comment_input
</div>
<div class="elgg-foot">
        $star_rating
	$comment_guid_input
	$entity_guid_input
	$submit_input $cancel_button
</div>
FORM;
}
