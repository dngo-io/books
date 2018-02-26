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

    return {
        //== Init
        init: function() {
            clickReject();
            clickApprove();
        }
    };
}();

//== Class initialization on page load
jQuery(document).ready(function() {
    Moderation.init();
});