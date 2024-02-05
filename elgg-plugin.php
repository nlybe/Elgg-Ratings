<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

use Ratings\Elgg\Bootstrap;

require_once(dirname(__FILE__) . '/lib/functions.php'); 

return [
    'plugin' => [
        'name' => 'Ratings',
		'version' => '5.5',
		'dependencies' => [],
	],
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
	'view_extensions' => [
		'elgg.css' => [
			'ratings/ratings.css' => [],
		],
	],
];
