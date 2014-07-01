TipJar = (function() {
    var thisObj,
        tipButton = function () {
        thisObj.tip($(this).data("modelid"), $(this).data("amount"));
    };
    return {
        init: function (options_dom) {
            thisObj = this;
            $(options_dom).on("click", "button", tipButton);
        },
        tip: function (model_id, amount) {
            $.ajax(
                {
                    type: "GET",
                    url: model_id+"/tip/"+amount,
                    success: function (msg) {
                        console.log(msg);
                    }
                }
            )
        }
    }
}());