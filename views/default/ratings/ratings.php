<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

elgg_load_css('jratings_css');
elgg_require_js("ratings/ratings");

$entity = elgg_extract('entity', $vars, false);

if (!($entity instanceof ElggEntity)) {
    return;
}

$ratings = RatingsOptions::getEntityRatings($entity);
if ($ratings) {
    echo elgg_format_element('div', [
        'class' => 'xstars',
        'data-average' => $ratings[2],
        'data-id' => 2,
    ], ''); 

    echo elgg_echo("ratings:comments:stars_caption", array($ratings[2], RatingsOptions::RATINGS_RATEMAX, $ratings[1]));

    echo elgg_format_element('div', [
        'id' => 'xstars_data',
        'data-length' => RatingsOptions::RATINGS_RATEMAX,
        'data-rateMax' => RatingsOptions::RATINGS_RATEMAX,
        'data-bigStarsPath' => elgg_get_simplecache_url('jratings/icons/stars.png'),
        'data-smallStarsPath' => elgg_get_simplecache_url('jratings/icons/small.png'),
    ], '');    
    
}