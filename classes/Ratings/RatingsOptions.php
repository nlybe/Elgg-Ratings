<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

namespace Ratings;

class RatingsOptions {

    const PLUGIN_ID = 'ratings';    // current plugin ID
    const RATINGS_ANNOTATION = 'ratings_star_rating';	// define annotation string for star rating of ads
    const RATINGS_RATEMAX = 10;                  // define max star rating rating for ads
        
    /**
     * Get star ratings for a given entity
     * 
     * @param type $entity
     * @return ratings or false
     */
    Public Static function getEntityRatings($entity) {
        if (!$entity instanceof \ElggObject) {
            return false;
        }
        return elgg_call(ELGG_IGNORE_ACCESS, function () use ($entity) {      
            $ratings = [];
            $options = [
                'guid' => $entity->getGUID(),
                'annotation_name' => RatingsOptions::RATINGS_ANNOTATION,
                'limit' => 0,
            ];    
            $stars = elgg_get_annotations($options);

            if ($stars)	{
                $i = 0;
                $rate_sum = 0;
                foreach ($stars as $st)	{
                    if (is_numeric($st->value)) {
                        $i++;
                        $rate_sum += $st->value;
                    }
                }

                if ($i > 0)	{
                    $ratings[0] = $rate_sum;	// sum of points
                    $ratings[1] = $i;			// no of ratings
                    $ratings[2] = number_format($ratings[0]/$ratings[1], 2, '.', '');	// rating

                    return $ratings;
                }
            }

            return false;
        });
    }    
    
    /**
     * Check if user has commented given entity and return number of comments
     * 
     * @param type $entity_guid
     * @param type $user_guid
     * @return type
     */
    function userEntityComments($entity_guid, $user_guid) {
        return elgg_get_entities(array(
            'type' => 'object',
            'subtype' => 'comment',
            'container_guid' => $entity_guid,
            'owner_guid' => $user_guid,
            'limit' => 0,
            'count' => true,
         ));
    }
    
      
         
}
