<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */
 
// require_once(dirname(__FILE__) . '/lib/hooks.php');
// require_once(dirname(__FILE__) . '/lib/widgets.php');

elgg_register_event_handler('init', 'system', 'ratings_init');

/**
 * ratings plugin initialization functions.
 */
function ratings_init() {
 	
    // register extra css
    elgg_extend_view('elgg.css', 'ratings/ratings.css');
    //elgg_extend_view('css/admin', 'ratings/ratings_admin.css');
    
    // register css files
    elgg_register_css('jratings_css', elgg_get_simplecache_url('jratings.css'));
    
    elgg_define_js('jratings', array(
        'deps' => array('jquery'),
        'exports' => 'jratings',
    ));
}


?>
