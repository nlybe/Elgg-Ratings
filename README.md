Ratings & Comments
==================

![Elgg 2.3](https://img.shields.io/badge/Elgg-2.3-orange.svg?style=flat-square)

## Important: This repository has been moved to https://github.com/nlybe/ratings

Advanced rating and comment functions for Elgg.

This plugin can replaces the default comment form and with a new one, including star ratings for Elgg objects. 

The default comment form of Elgg is not replaced automatically but some custom code can be used in order to show the ratings plugin forms.


## How to use it

### Returns rendered comments and a comment form for an entity

```php
$vars['rate_label'] = elgg_echo('custom:rate:title');
$vars['comment_label'] = elgg_echo('custom:comment:label');
echo RatingsOptions::ratings_elgg_view_comments($entity, $add_comment, $vars);

/* @param \ElggEntity $entity      The entity to view comments of
 * @param bool        $add_comment Include a form to add comments?
 * @param array       $vars        Variables to pass to comment view
 */
```

### Display star ratings

```php
elgg_view('ratings/ratings', ['entity' => $entity]);
```



## Improvements
- Add option to replace the default comment form with ratings form in selected entities
- Move max value from RatingsOptions to plugin settings in admin area
- Replace the ratings js component

