//== Class definition
var Steem = function() {

    var Parser = {
        //== Slug parser
        slug: function (slug) {
            var $slug   = slug.split("/");
            var $author = $slug[0].substring(1);

            return {
                author: $author,
                slug  : $slug[1]
            }
        }
    }

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