<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

// OBS
//function getEntityRatings($entity) {
//    if (!($entity instanceof ElggEntity)) {
//        return false;
//    } 
//
//    // set ignore access for loading all entries
//    $ia = elgg_get_ignore_access();
//    elgg_set_ignore_access(true);
//                
//    $ratings = array();
//    $options = array(
//        'guid' => $entity->getGUID(),
//        'annotation_name' => RatingsOptions::RATINGS_ANNOTATION,
//        'limit' => 0,
//    );
//
//    $stars = elgg_get_annotations($options);
//                
//    // restore ignore access
//    elgg_set_ignore_access($ia);
//                
//    if ($stars)	{
//        $i = 0;
//        $rate_sum = 0;
//        foreach ($stars as $st)	{
//            if (is_numeric($st->value)) {
//                $i++;
//                $rate_sum += $st->value;
//            }
//        }
//
//        if ($i > 0)	{
//            $ratings[0] = $rate_sum;	// sum of points
//            $ratings[1] = $i;			// no of ratings
//            $ratings[2] = number_format($ratings[0]/$ratings[1], 2, '.', '');	// rating
//
//            return $ratings;
//        }
//    }
//
//    return [];
//}






