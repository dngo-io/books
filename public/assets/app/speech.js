
function isset(variable){
    return variable !== typeof undefined;
}

var Dngo = function (config, module)
{
    if (!isset(config)) {
        throw new Error("no config found for dngo speech api");
    }

    var language = isset(config['language']) ? config['language'] : "en-GB";

    var recognizing = false;

    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.interimResults = true;

    /**
     * While user is speaking, this event catches speech as text
     * @param event
     */
    recognition.onresult = function(event) {
        var interim_transcript = '';
        if (typeof(event.results) == 'undefined') {
            recognition.onend = null;
            recognition.stop();
            upgrade();
            return;
        }

        //write what user said to somewhere
        for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
                var createdText =jQuery('<input />')
                    .attr("type", "hidden")
                    .attr("class", "dngo-dynamic-speech")
                    .attr("name", "dngo-dynamic-speech");
                createdText.val(event.results[i][0].transcript);
            }
        }
    };

    /**
     * When speech is done this event will run and do some action
     * @param event
     */
    recognition.onend = function(event) {
        var whatUserSaid = jQuery.(".dngo-dynamic-speech").val();

        doSomeAction(whatUserSaid, function(actions){

            jQuery.each(actions, function(key,value) {
                //oku, yaradanın adıyla oku.
                if (value['do'] == "read") {
                    //burda selectorun tüm elementlerini al, innerText'lerini oku.
                    jQuery(value['action']).each(function(index) {
                        var text = jQuery(this).innerText();
                        var speech = new SpeechSynthesisUtterance(text);
                        speech.lang = language;
                        window.speechSynthesis.speak(speech);
                    });
                }

                //log here
                if (value['do'] == "log") {
                    console.log(value['action']);
                }

                //click action
                if (value['do'] == "click") {
                    jQuery(value['action']).click();
                }
            });

        });
    };


    /**
     * Start webkitSpeech
     * @param event
     */
    var start = function (event) {
        recognition.language = config[language];
        recognition.start();
    }

    /**
     * Stops webkitSpeech
     * @param event
     */
    var stop =  function (event){
        recognition.stop();
    }

    /**
     * this is the function that we will use on recognition end event.
     * dngo robot will find something to say (or do) based on module (feed, book, listen pages etc)
     * @param iSaid
     * @param callback
     */
    var doSomeAction = function(iSaid,callback) {
        //here will be some special replies or actions based on module (feed, book, listen pages etc)
        str = question.toLowerCase();
        jQuery.ajax({
            url : SITE_URL + "/api/speech?text="+ encodeURI(question)+ "&language=" + language +"&module="+ module,
            dataType :  "json",
            async: false,
            success: function(response){
                callback(response.actions);
            }
        });


        callback("dngo action will be here");
    }

}


var config = {"language" : "en-GB"};
console.log(config);
dngo  = new Dngo(config, "feed");
dngo.start();