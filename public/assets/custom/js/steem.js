//== Class definition
var Steem = function() {

    return {
        //== Init demos
        init: function() {

        },

        upvote: function (slug) {
            var $url   = SITE_URL + '/action/upvote/' + slug + '/100';

            return Custom.GET($url, function (success) {
                return success.success;
            });
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Steem.init();
});