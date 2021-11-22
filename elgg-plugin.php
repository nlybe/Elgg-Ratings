<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

use Ratings\Elgg\Bootstrap;

require_once(dirname(__FILE__) . '/lib/functions.php'); 

return [
    'bootstrap' => Bootstrap::class,
    'actions' => [
        'ratings/comments/add' => [],
    ],
    'routes' => [],
    'views' => [
        'default' => [
            'jratings/icons/' => __DIR__ . '/vendors/jRating/jquery/icons',
            'jratings.js' => __DIR__ . '/vendors/jRating/jquery/jRating.jquery.js',
            'jratings.css' => __DIR__ . '/vendors/jRating/jquery/jRating.jquery.css',            
        ],
    ],
    'upgrades' => [],
];
