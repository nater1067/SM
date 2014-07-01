TipJar = (function() {
    var thisObj,
        tipButton = function () {
        thisObj.tip($(this).data("amount"));
    };
    return {
        init: function (options_dom) {
            thisObj = this;
            $(options_dom).on("click", "button", tipButton);
        },
        tip: function (amount, model_id) {
            console.log('tipped ' + amount + '!');
        }
    }
}());