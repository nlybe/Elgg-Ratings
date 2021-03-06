<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

return [
    'actions' => [
        'ratings/comments/add' => [],
    ],
    'routes' => [],
    'widgets' => [],
    'views' => [
        'default' => [
            'jratings/icons/' => __DIR__ . '/vendors/jRating/jquery/icons',
            'jratings.js' => __DIR__ . '/vendors/jRating/jquery/jRating.jquery.js',
            'jratings.css' => __DIR__ . '/vendors/jRating/jquery/jRating.jquery.css',            
        ],
    ],
    'upgrades' => [],
];
