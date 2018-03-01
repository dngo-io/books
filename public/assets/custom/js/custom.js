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



    Amplitude.init({
        "songs": [
            {
                "name": "Risin' High (feat Raashan Ahmad)",
                "artist": "Ancient Astronauts",
                "album": "We Are to Answer",
                "url": "assets/2Cellos - Hurt.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            },
            {
                "name": "The Gun",
                "artist": "Lorn",
                "album": "Ask The Dust",
                "url": "../songs/08 The Gun.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/ask-the-dust.jpg"
            },
            {
                "name": "Anvil",
                "artist": "Lorn",
                "album": "Anvil",
                "url": "../songs/LORN - ANVIL.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/anvil.jpg"
            },
            {
                "name": "I Came Running",
                "artist": "Ancient Astronauts",
                "album": "We Are to Answer",
                "url": "../songs/ICameRunning-AncientAstronauts.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            },
            {
                "name": "First Snow",
                "artist": "Emancipator",
                "album": "Soon It Will Be Cold Enough",
                "url": "../songs/FirstSnow-Emancipator.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/soon-it-will-be-cold-enough.jpg"
            },
            {
                "name": "Terrain",
                "artist": "pg.lost",
                "album": "Key",
                "url": "../songs/Terrain-pglost.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/key.jpg"
            },
            {
                "name": "Vorel",
                "artist": "Russian Circles",
                "album": "Guidance",
                "url": "../songs/Vorel-RussianCircles.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/guidance.jpg"
            },
            {
                "name": "Intro / Sweet Glory",
                "artist": "Jimkata",
                "album": "Die Digital",
                "url": "../songs/IntroSweetGlory-Jimkata.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/die-digital.jpg"
            },
            {
                "name": "Offcut #6",
                "artist": "Little People",
                "album": "We Are But Hunks of Wood Remixes",
                "url": "../songs/Offcut6-LittlePeople.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/we-are-but-hunks-of-wood.jpg"
            },
            {
                "name": "Dusk To Dawn",
                "artist": "Emancipator",
                "album": "Dusk To Dawn",
                "url": "../songs/DuskToDawn-Emancipator.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/from-dusk-to-dawn.jpg"
            },
            {
                "name": "Anthem",
                "artist": "Emancipator",
                "album": "Soon It Will Be Cold Enough",
                "url": "../songs/Anthem-Emancipator.mp3",
                "cover_art_url": "assets/custom/plugins/amplitudejs/examples/album-art/soon-it-will-be-cold-enough.jpg"
            }
        ]
    });


});