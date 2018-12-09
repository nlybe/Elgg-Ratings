define(function (require) {
    var elgg = require('elgg');
    var $ = require('jquery');
    require('jratings');
       
    $(document).ready(function() {
        $('.rate_stars').jRating({
            step: true,
            type: $('#rate_stars_data').attr('data-type'),
            length: $('#rate_stars_data').attr('data-length'),
            rateMax: $('#rate_stars_data').attr('data-rateMax'),
            bigStarsPath: $('#rate_stars_data').attr('data-bigStarsPath'),
            smallStarsPath: $('#rate_stars_data').attr('data-smallStarsPath')
        });       
        
        $('.xstars').jRating({
            step: true,
            length: $('#xstars_data').attr('data-length'),
            rateMax: $('#xstars_data').attr('data-rateMax'),
            bigStarsPath: $('#xstars_data').attr('data-bigStarsPath'),
            smallStarsPath: $('#xstars_data').attr('data-smallStarsPath'),
            isDisabled: true
        }); 
    });
    
});
