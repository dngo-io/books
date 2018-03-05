//== Class definition
var Custom = function() {
    var markToggle = function () {
        $(".mark-toggle").hover(function () {
            $(this).addClass("mark")
        }, function () {
            $(this).removeClass("mark")
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

            markToggle();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Custom.init();


    //year slider
    $("#year-slider").ionRangeSlider({
        type: "double",
        min: 1900,
        max: 2018,
        grid: true,
        input: 'year'
    });

});