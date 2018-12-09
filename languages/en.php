<?php
/**
 * Elgg Ratings & Comments plugin
 * @package ratings
 */

$lang = array(

    'ratings' => "Advanced rating and comment functions for Elgg",
    
    'ratings:comments' => "Reviews",
    'ratings:comments:post' => "Post review & rating",
    'ratings:comments:add:label' => "Rate this entity ",
//    'ratings:comments:add:rating' => "Rate the product: ",
//    'ratings:comments:add:rating:shop' => "Rate the shop: ",
    'ratings:comments:add:review' => "Write a review",
    'ratings:comments:rating:failure' => "An unexpected error occurred when adding your rating.",
    'ratings:comments:review:failure' => "An unexpected error occurred when adding your review.",
    'ratings:comments:notify_buyer:subject' => "Successful comment addition",
    'ratings:comments:rating:blank' => "Sorry, you need to rate this item before we can post it.",
    'ratings:comments:review:blank' => "Sorry, you need to put something in your review before we can save it.",
    'ratings:comments:notify_buyer:body' => "You have received a new comment on item \"%s\" It reads:

    %s<br />

    To reply or view the original item, click here:

    %s

    You cannot reply to this email.",

    'ratings:comments:notify_buyer:summary' => "You have received a new comment on item \"%s\"",
    'ratings:comments:notify:subject' => "Add review and rating for your purchase",
    'ratings:comments:notify:body' => "Dear buyer, you recently purchased the item %s. 

    Please take some time to rate the product and add a review for this purchase by clicking on %s.
    
    Also you can rate and review the shop %s by clicking on %s.

    You cannot reply to this email.",
    
    'ratings:comments:stars_caption' => "%s/%s stars (%s votes)",
    'generic_comments:latest' => "Latest reviews",

    
    // settings
    'ratings:settings:buyers' => 'Reviews and ratings for buyers',
//    'ratings:settings:buyers_expire' => 'Expiration days: ',
//    'ratings:settings:buyers_expire:note' => '  Enter expiration period for reviews and ratings in days. Value must be numeric.',
    'ratings:settings:users_notify' => 'Notification days: ',
    'ratings:settings:users_notify:note' => '  Enter notification time after event triggered (e.g. purchase) in days for review and rating. Value must be numeric.',
    'ratings:settings:users_notify_by' => 'Send notification by: ',
    'ratings:settings:users_notify_by:note' => '  Enter a username who is supposed to send the notifications. Normally it will be a site administrator.',


);

add_translation("en", $lang);
