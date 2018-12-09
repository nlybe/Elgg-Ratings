<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

class RatingsOptions {

    const PLUGIN_ID = 'ratings';    // current plugin ID
//    const RATINGS_ICONS = 'mod/ratings/vendors/jRating/jquery/icons/';  //   elgg_get_site_url()
//    const RATINGS_EXPIRATION_DAYS = 10;       // set no of days expiration for custom comments and rating
//    const RATINGS_NOTIFICATION_DAYS = 3;      // set no of days notification for custom comments and rating
//    const RATINGS_REVIEW = 'ratings_review';    // define annotation string for star reviews of ads
    const RATINGS_ANNOTATION = 'ratings_star_rating';	// define annotation string for star rating of ads
    const RATINGS_RATEMAX = 10;                  // define max star rating rating for ads
        
    /**
     * Get star ratings for a given entity
     * 
     * @param type $entity
     * @return boolean
     */
    Public Static function getEntityRatings($entity) {
        if (!($entity instanceof ElggEntity)) {
            return false;
        }

        // set ignore access for loading all entries
        $ia = elgg_get_ignore_access();
        elgg_set_ignore_access(true);

        $ratings = array();
        $options = array(
            'guid' => $entity->getGUID(),
            'annotation_name' => RatingsOptions::RATINGS_ANNOTATION,
            'limit' => 0,
        );

        $stars = elgg_get_annotations($options);

        // restore ignore access
        elgg_set_ignore_access($ia);

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
    }    
    
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
    Public Static function ratings_elgg_view_comments($entity, $add_comment = true, $vars = []) {
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
