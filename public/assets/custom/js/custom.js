//== Class definition
var Custom = function() {
    var markToggle = function () {
        $(".mark-toggle").hover(function () {
            $(this).addClass("mark")
        }, function () {
            $(this).removeClass("mark")
        });
    }

    var initQuicksearch = function() {
        var qs = $('#topbar_quicksearch');
        qs.mQuicksearch({
            type: qs.data('search-type'), // quick search type
            source: 'http://127.0.0.1:8000/action/topbar',
            spinner: 'm-loader m-loader--skin-light m-loader--right',

            input: '#topbar_quicksearch_input',
            iconClose: '#topbar_quicksearch_close',
            iconCancel: '#topbar_quicksearch_cancel',
            iconSearch: '#topbar_quicksearch_search',

            hasResultClass: 'm-list-search--has-result',
            minLength: 1,
            templates: {
                error: function(qs) {
                    return '<div class="m-search-results m-search-results--skin-light"><span class="m-search-result__message">Something went wrong</div></div>';
                }
            }
        });
    }

    var Parser = {
        //== Sparkline Chart helper function
        sentence: function () {
            $("p[data-parse='sentence']").each(function () {
                var replacementP = $("<p />");
                var lines = $(this).text().split(".");
                var split = "";

                $(lines).each(function () {

                    split = this.trim().split(' ');

                    var span;

                    if (split[0] !== "") {
                        span = $("<span />", {
                            "text": this.trim() + ". ",
                            "class": "mark-toggle"
                        });
                    }

                    replacementP.append(span);
                });

                $(this).replaceWith(replacementP);
            });
        }
    }

    return {
        //== Init demos
        init: function() {
            // init charts
            Parser.sentence();
            initQuicksearch();
            markToggle();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Custom.init();
});