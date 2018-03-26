//== Class definition
var Moderation = function() {
    
    var clickReject = function () {
        $("#mod-reject-button").click(function () {
            $("#mod-readable-zone, #mod-controls").hide();
            $("#mod-reject").removeClass("d-none");
        });
    }
    var clickApprove = function () {

        $("#mod-approve-button").click(function () {
            $("#mod-readable-zone, #mod-controls").hide();
            $("#mod-approve").removeClass("d-none");
        });
    }

    var modalActivator = function () {
        $(".mod-check").each(function () {
            $(this).click(function (e) {
                mApp.blockPage({
                    overlayColor: '#000000',
                    type: 'loader',
                    state: 'success',
                    message: 'Please wait...'
                });

                e.preventDefault();
                Custom.GET($(this).data("href"), function (success) {
                    mApp.unblockPage();
                    console.log(success.data);

                    Amplitude.init({
                        "songs": [
                            {
                                "name": success.data.audio.name,
                                "artist": success.data.author.name,
                                "album": success.data.book.name,
                                "url": success.data.audio.file
                            }
                        ]
                    });
                    $(".csrf_field").attr("name", success.csrf);
                    $("#moderation-reject").attr("action", $("#moderation-action").val() + '/' + success.data.audio.id + '/2');
                    $("#moderation-approve").attr("action", $("#moderation-action").val() + '/' + success.data.audio.id + '/1');

                    $("#moderation-modal-body").html(success.data.audio.body);
                    $("#moderation-book-name").html(success.data.book.name);
                    $("#moderation-book-author").html(success.data.author.name);
                    $("#mod-modal").modal("show");
                });
                return false;
            });
        });
    }

    return {
        //== Init
        init: function() {
            clickReject();
            clickApprove();
            modalActivator();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Moderation.init();
});